<?php

namespace App\Http\Controllers;
use App\Events;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class EventsController extends Controller
{

    public function index()
    {
        return Events::all();
    }

    public function show($id)
    {
        return Events::find($id);
    }

    public function store(Request $request)
    {
        $response_data=$request->json()->all();
        $event_data=$response_data['events'];
        $event_data=array_map(function ($a) { return array_merge($a,['created_at'=> Carbon::now(),'updated_at'=> Carbon::now()]); }, $event_data);
        if(Events::insert($event_data)){
            return 'success';
        }
        else{
            return 'failure';
        }
    }


    public function activitySql(){
        $sql="SELECT
                  A.num as question,A.id,
                  B.timestamp-A.timestamp as time_taken,            
                  A.activity_id,
                  A.user_id            
                  FROM
                        (
                        SELECT 
                            (@row_number:=@row_number + 1) AS num, name, activity_id,user_id,timestamp,id
                        FROM
                            events,(SELECT @row_number:=0) AS t order by activity_id,user_id,timestamp
                        )A
                            
                       JOIN 
                        (
                         SELECT 
                             (@row_number_1:=@row_number_1 + 1) AS num, name, activity_id,user_id,timestamp,id
                        FROM
                            events,(SELECT @row_number_1:=0) AS t order by activity_id,user_id,timestamp
                        )B
                       ON(A.num=B.num-1 and A.activity_id=B.activity_id and A.user_id=B.user_id)";
        return $sql;
    }

    public function studentActivityReport(Request $request){
        //header('Content-Type: application/json');
        $response_data=$request->json()->all();
        $activity_id=$response_data['activity_id'];
        $user_id=$response_data['user_ids'];
        array_push($user_id,$activity_id);

        $params=str_repeat("?",count($user_id)-1);
        $arr=str_split($params);
        $params=implode(",",$arr);

        $inner_sql=$this->activitySql();
        $wrapper_sql="SELECT * FROM (".$inner_sql.") tmp  WHERE user_id IN (".$params.") AND  activity_id = ?";
        $results = DB::select( DB::raw($wrapper_sql), $user_id);
        $array = json_decode(json_encode($results), True);
        return json_encode(array("results"=>$array));

    }

    public function getMaxActivity(){
        $inner_sql=$this->activitySql();
        $wrapper_sql="SELECT activity_time,activity_id
                            FROM
                            (
                            SELECT SUM(time_taken) as activity_time,activity_id
                            FROM
                            (
                                ".$inner_sql."
                       )X group by activity_id
                       )Y order by activity_time desc LIMIT 1";
        $results = DB::select( DB::raw($wrapper_sql));
        $array = json_decode(json_encode($results), True);
        return $array;

    }

    public function getMaxActivityReport(){
       // header('Content-Type: application/json');
        $max_activity=$this->getMaxActivity();
        $activity_id= $max_activity[0]['activity_id'];
        $inner_sql=$this->activitySql();
        $wrapper_sql="SELECT SUM(time_taken) as activity_time,user_id
                        FROM
                            (
                            ".$inner_sql."
                            )X where activity_id=? group by user_id";
              $results = DB::select( DB::raw($wrapper_sql), [$activity_id]);
              $array = json_decode(json_encode($results), True);
              $final_response=array("results"=>array("activity_id"=>$activity_id,"time_taken"=>$array));
              return json_encode($final_response);
    }




}
