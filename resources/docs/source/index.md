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


<!-- START_c5eeb9023dc1635b186702dd41d834eb -->
## manifest.json
> Example request:

```bash
curl -X GET \
    -G "http://localhost/manifest.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/manifest.json"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

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
    "name": "OpenMeet",
    "short_name": "OpenMeet",
    "start_url": "http:\/\/localhost\/",
    "display": "standalone",
    "theme_color": "#000000",
    "background_color": "#ffffff",
    "orientation": "any",
    "splash": null,
    "icons": [
        {
            "src": "\/images\/icons\/icon-72x72.png",
            "type": "image\/png",
            "sizes": "72x72"
        },
        {
            "src": "\/images\/icons\/icon-96x96.png",
            "type": "image\/png",
            "sizes": "96x96"
        },
        {
            "src": "\/images\/icons\/icon-128x128.png",
            "type": "image\/png",
            "sizes": "128x128"
        },
        {
            "src": "\/images\/icons\/icon-144x144.png",
            "type": "image\/png",
            "sizes": "144x144"
        },
        {
            "src": "\/images\/icons\/icon-152x152.png",
            "type": "image\/png",
            "sizes": "152x152"
        },
        {
            "src": "\/images\/icons\/icon-192x192.png",
            "type": "image\/png",
            "sizes": "192x192"
        },
        {
            "src": "\/images\/icons\/icon-384x384.png",
            "type": "image\/png",
            "sizes": "384x384"
        },
        {
            "src": "\/images\/icons\/icon-512x512.png",
            "type": "image\/png",
            "sizes": "512x512"
        }
    ]
}
```

### HTTP Request
`GET manifest.json`


<!-- END_c5eeb9023dc1635b186702dd41d834eb -->

<!-- START_1a15e4b23b93ad961be7edc60d2ad8fd -->
## offline
> Example request:

```bash
curl -X GET \
    -G "http://localhost/offline" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/offline"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET offline`


<!-- END_1a15e4b23b93ad961be7edc60d2ad8fd -->

<!-- START_b9fa1394067cb984c58cf37d91ff5b7b -->
## api/v1/groups/subscribe/{userID}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/groups/subscribe/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/groups/subscribe/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 4,
        "state": true
    },
    {
        "id": 5,
        "state": false
    },
    {
        "id": 6,
        "state": false
    },
    {
        "id": 10,
        "state": false
    },
    {
        "id": 13,
        "state": true
    },
    {
        "id": 21,
        "state": true
    },
    {
        "id": 22,
        "state": true
    },
    {
        "id": 23,
        "state": false
    }
]
```

### HTTP Request
`GET api/v1/groups/subscribe/{userID}`


<!-- END_b9fa1394067cb984c58cf37d91ff5b7b -->

<!-- START_c6e9e1087f6cdcf37e78197cf4b74573 -->
## api/v1/groups/subscribe
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/groups/subscribe" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/groups/subscribe"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/groups/subscribe`


<!-- END_c6e9e1087f6cdcf37e78197cf4b74573 -->

<!-- START_dcfde3ba44f09c2e354dd2b70086cacc -->
## api/v1/groups/tags
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/groups/tags" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/groups/tags"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/v1/groups/tags`


<!-- END_dcfde3ba44f09c2e354dd2b70086cacc -->

<!-- START_63179f9819ada7547a1fd2852ffcfb76 -->
## api/v1/events/location
> Example request:

```bash
curl -X POST \
    "http://localhost/api/v1/events/location" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/events/location"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/v1/events/location`


<!-- END_63179f9819ada7547a1fd2852ffcfb76 -->

<!-- START_54fb48e456e2df7da3970792e725714e -->
## api/v1/groups/{token}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/groups/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET api/v1/groups/{token}`


<!-- END_54fb48e456e2df7da3970792e725714e -->

<!-- START_75fecd63e6f785c36c09f1f71ee44fe0 -->
## api/v1/events/{token}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/events/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET api/v1/events/{token}`


<!-- END_75fecd63e6f785c36c09f1f71ee44fe0 -->

<!-- START_1c83b0de130fb36ed39b6f97385b3a50 -->
## api/v1/settings/{token}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/settings/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/settings/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET api/v1/settings/{token}`


<!-- END_1c83b0de130fb36ed39b6f97385b3a50 -->

<!-- START_0d4d7dcdefc46fb2731209b95abe0344 -->
## api/v1/users/{token}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/v1/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/v1/users/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": ""
}
```

### HTTP Request
`GET api/v1/users/{token}`


<!-- END_0d4d7dcdefc46fb2731209b95abe0344 -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## password/reset
> Example request:

```bash
curl -X POST \
    "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_b77aedc454e9471a35dcb175278ec997 -->
## Display the password confirmation view.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET password/confirm`


<!-- END_b77aedc454e9471a35dcb175278ec997 -->

<!-- START_54462d3613f2262e741142161c0e6fea -->
## Confirm the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/confirm`


<!-- END_54462d3613f2262e741142161c0e6fea -->

<!-- START_53be1e9e10a08458929a2e0ea70ddb86 -->
## Show the application dashboard.

> Example request:

```bash
curl -X GET \
    -G "http://localhost/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET /`


<!-- END_53be1e9e10a08458929a2e0ea70ddb86 -->

<!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
## home
> Example request:

```bash
curl -X GET \
    -G "http://localhost/home" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/home"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET home`


<!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->

<!-- START_ea855276779f6dab840093d1e77ee609 -->
## install
> Example request:

```bash
curl -X POST \
    "http://localhost/install" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/install"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST install`


<!-- END_ea855276779f6dab840093d1e77ee609 -->

<!-- START_a824fc42f761eee232ba6010c8f7641d -->
## search
> Example request:

```bash
curl -X POST \
    "http://localhost/search" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/search"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST search`


<!-- END_a824fc42f761eee232ba6010c8f7641d -->

<!-- START_3bcedda78ae45ef5c0f4c97a4963b7a1 -->
## user
> Example request:

```bash
curl -X GET \
    -G "http://localhost/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user`


<!-- END_3bcedda78ae45ef5c0f4c97a4963b7a1 -->

<!-- START_fc3ddccb78f0ee2099dc1f7bfb44ae97 -->
## user/show/{userID}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/show/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/show/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET user/show/{userID}`


<!-- END_fc3ddccb78f0ee2099dc1f7bfb44ae97 -->

<!-- START_26be7e289847815c95f9680c69fc471b -->
## user/edit
> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/edit`


<!-- END_26be7e289847815c95f9680c69fc471b -->

<!-- START_979cb37659aede3d127d7c9f0087f5ca -->
## user/edit
> Example request:

```bash
curl -X POST \
    "http://localhost/user/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST user/edit`


<!-- END_979cb37659aede3d127d7c9f0087f5ca -->

<!-- START_0d25ecb27b7d3660d20c1b6f2291e599 -->
## user/report/{userID}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/report/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/report/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/report/{userID}`


<!-- END_0d25ecb27b7d3660d20c1b6f2291e599 -->

<!-- START_a4ec6263563a165625b2b1b686b98b48 -->
## user/report
> Example request:

```bash
curl -X POST \
    "http://localhost/user/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/report"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST user/report`


<!-- END_a4ec6263563a165625b2b1b686b98b48 -->

<!-- START_2f931d4c2de88bb17c7733e094849395 -->
## user/groups
> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/groups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/groups`


<!-- END_2f931d4c2de88bb17c7733e094849395 -->

<!-- START_cfee3001fc8dcad6f47f117fff617485 -->
## user/groups/remove/all
> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/groups/remove/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/groups/remove/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/groups/remove/all`


<!-- END_cfee3001fc8dcad6f47f117fff617485 -->

<!-- START_974f45e68634d391decdb08d852c11a7 -->
## user/events
> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/events`


<!-- END_974f45e68634d391decdb08d852c11a7 -->

<!-- START_a1827b9dd532c2e79f1abfac40d4147e -->
## user/events/remove/all
> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/events/remove/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/events/remove/all"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/events/remove/all`


<!-- END_a1827b9dd532c2e79f1abfac40d4147e -->

<!-- START_2ce7909c85a56e6bc4fe3b7b74088f0e -->
## user/generate/API/{user_id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/generate/API/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/generate/API/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET user/generate/API/{user_id}`


<!-- END_2ce7909c85a56e6bc4fe3b7b74088f0e -->

<!-- START_e40bc60a458a9740730202aaec04f818 -->
## admin
> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin`


<!-- END_e40bc60a458a9740730202aaec04f818 -->

<!-- START_e1ace1ed6cfc2a2f823814fd4d9bbbaf -->
## admin/search
> Example request:

```bash
curl -X POST \
    "http://localhost/admin/search" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/search"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/search`


<!-- END_e1ace1ed6cfc2a2f823814fd4d9bbbaf -->

<!-- START_46185391d8f2d3b00ad8f654e0247cb6 -->
## admin/edit/settings
> Example request:

```bash
curl -X POST \
    "http://localhost/admin/edit/settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/edit/settings"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/edit/settings`


<!-- END_46185391d8f2d3b00ad8f654e0247cb6 -->

<!-- START_6cd3622a5681c98ae65902334b4ab362 -->
## admin/edit/theme
> Example request:

```bash
curl -X POST \
    "http://localhost/admin/edit/theme" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/edit/theme"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/edit/theme`


<!-- END_6cd3622a5681c98ae65902334b4ab362 -->

<!-- START_c7861c22ddbdfa86095368f0e1d47811 -->
## admin/edit/views
> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/edit/views" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/edit/views"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/edit/views`


<!-- END_c7861c22ddbdfa86095368f0e1d47811 -->

<!-- START_4a3986d062e3b81031644c8efd593e09 -->
## admin/edit/views
> Example request:

```bash
curl -X POST \
    "http://localhost/admin/edit/views" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/edit/views"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/edit/views`


<!-- END_4a3986d062e3b81031644c8efd593e09 -->

<!-- START_90f64b3de496b98a46be64952d473ffe -->
## admin/edit/privacy
> Example request:

```bash
curl -X POST \
    "http://localhost/admin/edit/privacy" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/edit/privacy"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/edit/privacy`


<!-- END_90f64b3de496b98a46be64952d473ffe -->

<!-- START_7614490a3eef5fbcba402080d0369e6a -->
## admin/users
> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/users"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/users`


<!-- END_7614490a3eef5fbcba402080d0369e6a -->

<!-- START_0bb47eabdf898d5368e3d2992a41014d -->
## admin/users/delete/{userID}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/users/delete/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/users/delete/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/users/delete/{userID}`


<!-- END_0bb47eabdf898d5368e3d2992a41014d -->

<!-- START_bafd158b7a2cc09a02ce9186df362d23 -->
## admin/users/delete
> Example request:

```bash
curl -X POST \
    "http://localhost/admin/users/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/users/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST admin/users/delete`


<!-- END_bafd158b7a2cc09a02ce9186df362d23 -->

<!-- START_e700f7ff4c28d94e0fd4f092b815695d -->
## admin/groups
> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/groups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/groups`


<!-- END_e700f7ff4c28d94e0fd4f092b815695d -->

<!-- START_71a6be7f5ca5e33f8f6c87ba685e03cf -->
## admin/reports
> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/reports" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/reports"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reports`


<!-- END_71a6be7f5ca5e33f8f6c87ba685e03cf -->

<!-- START_07ae97b259050a0b78cda25b307437ff -->
## admin/blocks
> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/blocks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/blocks"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/blocks`


<!-- END_07ae97b259050a0b78cda25b307437ff -->

<!-- START_5181eda935d22615997d0bcada9f7a3f -->
## admin/bans
> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/bans" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/bans"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/bans`


<!-- END_5181eda935d22615997d0bcada9f7a3f -->

<!-- START_5a2c2b2a7d0664e0be3af7a1efb24ace -->
## admin/events
> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/events`


<!-- END_5a2c2b2a7d0664e0be3af7a1efb24ace -->

<!-- START_70dc8d6371dd0a786757bf4c8e0df99a -->
## admin/reports/show/{reportID}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/reports/show/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/reports/show/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reports/show/{reportID}`


<!-- END_70dc8d6371dd0a786757bf4c8e0df99a -->

<!-- START_5b050d59f831ce631f18c748e85bb70a -->
## admin/reports/delete/{reportID}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/reports/delete/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/reports/delete/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET admin/reports/delete/{reportID}`


<!-- END_5b050d59f831ce631f18c748e85bb70a -->

<!-- START_e4f3f8570b9b48dd1329d9b3eaed5bfc -->
## notifications
> Example request:

```bash
curl -X GET \
    -G "http://localhost/notifications" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/notifications"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET notifications`


<!-- END_e4f3f8570b9b48dd1329d9b3eaed5bfc -->

<!-- START_b7599dbc3b03f971c22834a5a4b2faf6 -->
## notifications/readall
> Example request:

```bash
curl -X POST \
    "http://localhost/notifications/readall" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/notifications/readall"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST notifications/readall`


<!-- END_b7599dbc3b03f971c22834a5a4b2faf6 -->

<!-- START_792dbb5dfd8db302bbad16e36921d1b0 -->
## messages
> Example request:

```bash
curl -X GET \
    -G "http://localhost/messages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/messages"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET messages`


<!-- END_792dbb5dfd8db302bbad16e36921d1b0 -->

<!-- START_2acbaeb56376d5238139466cac5dda6b -->
## messages/{typeConversation}/{correspondant}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/messages/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/messages/1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET messages/{typeConversation}/{correspondant}`


<!-- END_2acbaeb56376d5238139466cac5dda6b -->

<!-- START_f010b3f19187c8ea54194a62f8302a13 -->
## messages/create
> Example request:

```bash
curl -X POST \
    "http://localhost/messages/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/messages/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST messages/create`


<!-- END_f010b3f19187c8ea54194a62f8302a13 -->

<!-- START_14f66109b8104c7b26919d0d565e1834 -->
## groups/show/{group_id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/groups/show/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/show/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET groups/show/{group_id}`


<!-- END_14f66109b8104c7b26919d0d565e1834 -->

<!-- START_ca04b9150880222b5255e4be13bc3211 -->
## groups/list
> Example request:

```bash
curl -X GET \
    -G "http://localhost/groups/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/list"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET groups/list`


<!-- END_ca04b9150880222b5255e4be13bc3211 -->

<!-- START_ba2881c4d6a4e6f99de5937c8ed6da3e -->
## groups/create
> Example request:

```bash
curl -X GET \
    -G "http://localhost/groups/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET groups/create`


<!-- END_ba2881c4d6a4e6f99de5937c8ed6da3e -->

<!-- START_9d065d80067e14ef529651f1aa8ea697 -->
## groups/create
> Example request:

```bash
curl -X POST \
    "http://localhost/groups/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST groups/create`


<!-- END_9d065d80067e14ef529651f1aa8ea697 -->

<!-- START_c3112e9f81160c75c2fb7c85d876ce22 -->
## groups/edit/{group_id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/groups/edit/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/edit/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET groups/edit/{group_id}`


<!-- END_c3112e9f81160c75c2fb7c85d876ce22 -->

<!-- START_04351e74edd794f6bf3fb36c1ca7e30d -->
## groups/edit
> Example request:

```bash
curl -X POST \
    "http://localhost/groups/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST groups/edit`


<!-- END_04351e74edd794f6bf3fb36c1ca7e30d -->

<!-- START_ba255f449b1f96cb10b40e4c1c7729fd -->
## groups/admin/{group_id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/groups/admin/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/admin/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET groups/admin/{group_id}`


<!-- END_ba255f449b1f96cb10b40e4c1c7729fd -->

<!-- START_c856a414268cfdb46ed0502ff2afd25c -->
## groups/admin
> Example request:

```bash
curl -X POST \
    "http://localhost/groups/admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/admin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST groups/admin`


<!-- END_c856a414268cfdb46ed0502ff2afd25c -->

<!-- START_1de4c7b7340b98b6b9158897430586db -->
## groups/delete/{group_id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/groups/delete/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/delete/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET groups/delete/{group_id}`


<!-- END_1de4c7b7340b98b6b9158897430586db -->

<!-- START_ffb8512dc5a9f2e75eb497f5e8015ba7 -->
## groups/delete
> Example request:

```bash
curl -X POST \
    "http://localhost/groups/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST groups/delete`


<!-- END_ffb8512dc5a9f2e75eb497f5e8015ba7 -->

<!-- START_f203f8c3c44ddd178048a2e16cd0d939 -->
## groups/subscribe/add
> Example request:

```bash
curl -X POST \
    "http://localhost/groups/subscribe/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/subscribe/add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST groups/subscribe/add`


<!-- END_f203f8c3c44ddd178048a2e16cd0d939 -->

<!-- START_e3269aa01eacb627ac2bfffa00eff1dd -->
## groups/subscribe/remove
> Example request:

```bash
curl -X POST \
    "http://localhost/groups/subscribe/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/subscribe/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST groups/subscribe/remove`


<!-- END_e3269aa01eacb627ac2bfffa00eff1dd -->

<!-- START_2f4c28095c45aec2b5c48a90643b8e65 -->
## groups/admin
> Example request:

```bash
curl -X GET \
    -G "http://localhost/groups/admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/admin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET groups/admin`


<!-- END_2f4c28095c45aec2b5c48a90643b8e65 -->

<!-- START_2e39277e6c1b55501f6a84482c7a3cf1 -->
## groups/admin/subscriptions
> Example request:

```bash
curl -X GET \
    -G "http://localhost/groups/admin/subscriptions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/admin/subscriptions"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET groups/admin/subscriptions`


<!-- END_2e39277e6c1b55501f6a84482c7a3cf1 -->

<!-- START_4456e6e3159009447ad6609ed5dcdd34 -->
## groups/admin/groups
> Example request:

```bash
curl -X GET \
    -G "http://localhost/groups/admin/groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/admin/groups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET groups/admin/groups`


<!-- END_4456e6e3159009447ad6609ed5dcdd34 -->

<!-- START_dae9e8b638b862de566bf66809b678e1 -->
## groups/admin/reports
> Example request:

```bash
curl -X GET \
    -G "http://localhost/groups/admin/reports" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/admin/reports"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET groups/admin/reports`


<!-- END_dae9e8b638b862de566bf66809b678e1 -->

<!-- START_97ea9924ac60aab1fe37632ddba58df4 -->
## groups/admin/bans
> Example request:

```bash
curl -X GET \
    -G "http://localhost/groups/admin/bans" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/admin/bans"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET groups/admin/bans`


<!-- END_97ea9924ac60aab1fe37632ddba58df4 -->

<!-- START_aa1b5acd70b4e0db7dbf4eda5c798a67 -->
## groups/admin/events
> Example request:

```bash
curl -X GET \
    -G "http://localhost/groups/admin/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/groups/admin/events"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET groups/admin/events`


<!-- END_aa1b5acd70b4e0db7dbf4eda5c798a67 -->

<!-- START_ca3a38ba8fd9802569659874bb7796e6 -->
## events/show/{event_id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/events/show/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/events/show/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET events/show/{event_id}`


<!-- END_ca3a38ba8fd9802569659874bb7796e6 -->

<!-- START_92b328319f49439288d157a4c5e241e1 -->
## events/create
> Example request:

```bash
curl -X GET \
    -G "http://localhost/events/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/events/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET events/create`


<!-- END_92b328319f49439288d157a4c5e241e1 -->

<!-- START_421dd5ccdba33e6e944a6d5f27b46bb3 -->
## events/create
> Example request:

```bash
curl -X POST \
    "http://localhost/events/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/events/create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST events/create`


<!-- END_421dd5ccdba33e6e944a6d5f27b46bb3 -->

<!-- START_f2aad3b218e055b7a4718e3ba61c4c80 -->
## events/edit/{event_id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/events/edit/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/events/edit/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET events/edit/{event_id}`


<!-- END_f2aad3b218e055b7a4718e3ba61c4c80 -->

<!-- START_362b8397ac1c439f4af8c245d1d25779 -->
## events/edit
> Example request:

```bash
curl -X POST \
    "http://localhost/events/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/events/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST events/edit`


<!-- END_362b8397ac1c439f4af8c245d1d25779 -->

<!-- START_779c0bdae582cbb7929d72176e6d61a3 -->
## events/delete/{event_id}
> Example request:

```bash
curl -X GET \
    -G "http://localhost/events/delete/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/events/delete/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET events/delete/{event_id}`


<!-- END_779c0bdae582cbb7929d72176e6d61a3 -->

<!-- START_b12cc29017efed778fe8cf17cd98befe -->
## events/delete
> Example request:

```bash
curl -X POST \
    "http://localhost/events/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/events/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST events/delete`


<!-- END_b12cc29017efed778fe8cf17cd98befe -->

<!-- START_f95bf83d4bb5055ecd4c98284739dcf8 -->
## events/participate/add
> Example request:

```bash
curl -X POST \
    "http://localhost/events/participate/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/events/participate/add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST events/participate/add`


<!-- END_f95bf83d4bb5055ecd4c98284739dcf8 -->

<!-- START_15779650f075547b69b4f799acbb2e4f -->
## events/participate/remove
> Example request:

```bash
curl -X POST \
    "http://localhost/events/participate/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/events/participate/remove"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST events/participate/remove`


<!-- END_15779650f075547b69b4f799acbb2e4f -->

<!-- START_b8a35d8871e8ed10b366e8088a0a8884 -->
## frommeetup/group
> Example request:

```bash
curl -X GET \
    -G "http://localhost/frommeetup/group" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/frommeetup/group"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET frommeetup/group`


<!-- END_b8a35d8871e8ed10b366e8088a0a8884 -->

<!-- START_f1168bd0b55112343b1d5ee307a5606f -->
## frommeetup/group
> Example request:

```bash
curl -X POST \
    "http://localhost/frommeetup/group" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/frommeetup/group"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST frommeetup/group`


<!-- END_f1168bd0b55112343b1d5ee307a5606f -->

<!-- START_f8af55c1cfa640e771f00b88560f15da -->
## frommeetup/event
> Example request:

```bash
curl -X GET \
    -G "http://localhost/frommeetup/event" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/frommeetup/event"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET frommeetup/event`


<!-- END_f8af55c1cfa640e771f00b88560f15da -->

<!-- START_edc018788fdba19ebef66e58236da608 -->
## frommeetup/event
> Example request:

```bash
curl -X POST \
    "http://localhost/frommeetup/event" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/frommeetup/event"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST frommeetup/event`


<!-- END_edc018788fdba19ebef66e58236da608 -->

<!-- START_5a6db709300cd6f04e2c1f4f016552f3 -->
## legal/cgu
> Example request:

```bash
curl -X GET \
    -G "http://localhost/legal/cgu" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/legal/cgu"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET legal/cgu`


<!-- END_5a6db709300cd6f04e2c1f4f016552f3 -->


