---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_f13e2bf56821bacf4aefd4da133ab971 -->
## api/api/receive
> Example request:

```bash
curl -X POST "http://localhost/api/api/receive" 
```

```javascript
const url = new URL("http://localhost/api/api/receive");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/api/receive`


<!-- END_f13e2bf56821bacf4aefd4da133ab971 -->

<!-- START_b72a3eb725241056aea5037ba1a31392 -->
## api/receive
> Example request:

```bash
curl -X POST "http://localhost/api/receive" 
```

```javascript
const url = new URL("http://localhost/api/receive");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/receive`


<!-- END_b72a3eb725241056aea5037ba1a31392 -->

<!-- START_31ed3058bac6edd4115a43f8bff9a602 -->
## api/studentActivityReport
> Example request:

```bash
curl -X POST "http://localhost/api/studentActivityReport" 
```

```javascript
const url = new URL("http://localhost/api/studentActivityReport");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


### HTTP Request
`POST api/studentActivityReport`


<!-- END_31ed3058bac6edd4115a43f8bff9a602 -->

<!-- START_e71ef6336b49460f59fd8b087b2ba497 -->
## api/getMaxActivityReport
> Example request:

```bash
curl -X GET -G "http://localhost/api/getMaxActivityReport" 
```

```javascript
const url = new URL("http://localhost/api/getMaxActivityReport");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response (200):

```json
{
    "results": {
        "activity_id": "Accounting",
        "time_taken": [
            {
                "activity_time": "199",
                "user_id": "Ben"
            },
            {
                "activity_time": "287",
                "user_id": "John"
            },
            {
                "activity_time": "275",
                "user_id": "Lilly"
            },
            {
                "activity_time": "199",
                "user_id": "Sally"
            },
            {
                "activity_time": "232",
                "user_id": "Thomas"
            },
            {
                "activity_time": "276",
                "user_id": "Tom"
            }
        ]
    }
}
```

### HTTP Request
`GET api/getMaxActivityReport`


<!-- END_e71ef6336b49460f59fd8b087b2ba497 -->


