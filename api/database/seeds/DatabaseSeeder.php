<?php

use Illuminate\Database\Seeder;
use App\Events;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //set the seed database to  input some real scenario of courses
        $courses=['English','Math','Science','Grammer','Programming','Accounting'];
        $users=['Tom','Sally','Lilly','John','Ben','Thomas'];

        foreach($users as $user){
            $current_time=date('U');
            //assume all user will start/complete all courses  and have 4 questions assuming each question takes 20-90 secs
            //stop is triggered after anserwing 4th question
            foreach($courses as $course)
            for($i=0;$i<5;$i++){
                if($i==0){
                    $name="start";
                }
                else if($i===4){
                    $name="stop";
                }
                else {
                    $name="next";
                }
                //random time elapsed
                $data=['name'=>$name,'timestamp'=>$current_time,'user_id'=>$user,'activity_id'=>$course];
                Events::create($data);
                $time_taken=rand(20,90);
                $current_time=$current_time+$time_taken;
            }

        }

    }
}
