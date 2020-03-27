<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>API Reference</title>

    <link rel="stylesheet" href="/docs/css/style.css"/>
    <script src="/docs/js/all.js"></script>


    <script>
        $(function () {
            setupLanguages(["bash", "javascript"]);
        });
    </script>
</head>

<body class="">
<a href="#" id="nav-button">
      <span>
        NAV
        <img src="/docs/images/navbar.png"/>
      </span>
</a>
<div class="tocify-wrapper">
    <img src="/docs/images/logo.png"/>
    <div class="lang-selector">
        <a href="#" data-language-name="bash">bash</a>
        <a href="#" data-language-name="javascript">javascript</a>
    </div>
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>
    <ul class="search-results"></ul>
    <div id="toc">
    </div>
    <ul class="toc-footer">
        <li><a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a></li>
    </ul>
</div>
<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <!-- START_INFO -->
        <h1>Info</h1>
        <p>Welcome to the generated API reference.
            <a href="{{ route("apidoc", ["format" => ".json"]) }}">Get Postman Collection</a></p>
        <!-- END_INFO -->
        <h1>general</h1>
        <!-- START_c5eeb9023dc1635b186702dd41d834eb -->
        <h2>manifest.json</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/manifest.json" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (200):</p>
        </blockquote>
        <pre><code class="language-json">{
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
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET manifest.json</code></p>
        <!-- END_c5eeb9023dc1635b186702dd41d834eb -->
        <!-- START_1a15e4b23b93ad961be7edc60d2ad8fd -->
        <h2>offline</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/offline" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (200):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET offline</code></p>
        <!-- END_1a15e4b23b93ad961be7edc60d2ad8fd -->
        <!-- START_b9fa1394067cb984c58cf37d91ff5b7b -->
        <h2>api/v1/groups/subscribe/{userID}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/v1/groups/subscribe/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (200):</p>
        </blockquote>
        <pre><code class="language-json">[
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
]</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET api/v1/groups/subscribe/{userID}</code></p>
        <!-- END_b9fa1394067cb984c58cf37d91ff5b7b -->
        <!-- START_c6e9e1087f6cdcf37e78197cf4b74573 -->
        <h2>api/v1/groups/subscribe</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/api/v1/groups/subscribe" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST api/v1/groups/subscribe</code></p>
        <!-- END_c6e9e1087f6cdcf37e78197cf4b74573 -->
        <!-- START_dcfde3ba44f09c2e354dd2b70086cacc -->
        <h2>api/v1/groups/tags</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/v1/groups/tags" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (500):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET api/v1/groups/tags</code></p>
        <!-- END_dcfde3ba44f09c2e354dd2b70086cacc -->
        <!-- START_63179f9819ada7547a1fd2852ffcfb76 -->
        <h2>api/v1/events/location</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/api/v1/events/location" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST api/v1/events/location</code></p>
        <!-- END_63179f9819ada7547a1fd2852ffcfb76 -->
        <!-- START_54fb48e456e2df7da3970792e725714e -->
        <h2>api/v1/groups/{token}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/v1/groups/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (404):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": ""
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET api/v1/groups/{token}</code></p>
        <!-- END_54fb48e456e2df7da3970792e725714e -->
        <!-- START_75fecd63e6f785c36c09f1f71ee44fe0 -->
        <h2>api/v1/events/{token}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/v1/events/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (404):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": ""
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET api/v1/events/{token}</code></p>
        <!-- END_75fecd63e6f785c36c09f1f71ee44fe0 -->
        <!-- START_1c83b0de130fb36ed39b6f97385b3a50 -->
        <h2>api/v1/settings/{token}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/v1/settings/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (404):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": ""
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET api/v1/settings/{token}</code></p>
        <!-- END_1c83b0de130fb36ed39b6f97385b3a50 -->
        <!-- START_0d4d7dcdefc46fb2731209b95abe0344 -->
        <h2>api/v1/users/{token}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/api/v1/users/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (404):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": ""
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET api/v1/users/{token}</code></p>
        <!-- END_0d4d7dcdefc46fb2731209b95abe0344 -->
        <!-- START_66e08d3cc8222573018fed49e121e96d -->
        <h2>Show the application&#039;s login form.</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (200):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET login</code></p>
        <!-- END_66e08d3cc8222573018fed49e121e96d -->
        <!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
        <h2>Handle a login request to the application.</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST login</code></p>
        <!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->
        <!-- START_e65925f23b9bc6b93d9356895f29f80c -->
        <h2>Log the user out of the application.</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST logout</code></p>
        <!-- END_e65925f23b9bc6b93d9356895f29f80c -->
        <!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
        <h2>Show the application registration form.</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (200):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET register</code></p>
        <!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
        <!-- START_d7aad7b5ac127700500280d511a3db01 -->
        <h2>Handle a registration request for the application.</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST register</code></p>
        <!-- END_d7aad7b5ac127700500280d511a3db01 -->
        <!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
        <h2>Display the form to request a password reset link.</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (200):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET password/reset</code></p>
        <!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->
        <!-- START_feb40f06a93c80d742181b6ffb6b734e -->
        <h2>Send a reset link to the given user.</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST password/email</code></p>
        <!-- END_feb40f06a93c80d742181b6ffb6b734e -->
        <!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
        <h2>Display the password reset view for the given token.</h2>
        <p>If no token is present, display the link request form.</p>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (200):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET password/reset/{token}</code></p>
        <!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->
        <!-- START_cafb407b7a846b31491f97719bb15aef -->
        <h2>password/reset</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST password/reset</code></p>
        <!-- END_cafb407b7a846b31491f97719bb15aef -->
        <!-- START_b77aedc454e9471a35dcb175278ec997 -->
        <h2>Display the password confirmation view.</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET password/confirm</code></p>
        <!-- END_b77aedc454e9471a35dcb175278ec997 -->
        <!-- START_54462d3613f2262e741142161c0e6fea -->
        <h2>Confirm the given user&#039;s password.</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST password/confirm</code></p>
        <!-- END_54462d3613f2262e741142161c0e6fea -->
        <!-- START_53be1e9e10a08458929a2e0ea70ddb86 -->
        <h2>Show the application dashboard.</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (200):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET /</code></p>
        <!-- END_53be1e9e10a08458929a2e0ea70ddb86 -->
        <!-- START_cb859c8e84c35d7133b6a6c8eac253f8 -->
        <h2>home</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/home" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (200):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET home</code></p>
        <!-- END_cb859c8e84c35d7133b6a6c8eac253f8 -->
        <!-- START_ea855276779f6dab840093d1e77ee609 -->
        <h2>install</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/install" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST install</code></p>
        <!-- END_ea855276779f6dab840093d1e77ee609 -->
        <!-- START_a824fc42f761eee232ba6010c8f7641d -->
        <h2>search</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/search" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST search</code></p>
        <!-- END_a824fc42f761eee232ba6010c8f7641d -->
        <!-- START_3bcedda78ae45ef5c0f4c97a4963b7a1 -->
        <h2>user</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/user" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET user</code></p>
        <!-- END_3bcedda78ae45ef5c0f4c97a4963b7a1 -->
        <!-- START_fc3ddccb78f0ee2099dc1f7bfb44ae97 -->
        <h2>user/show/{userID}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/user/show/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (200):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET user/show/{userID}</code></p>
        <!-- END_fc3ddccb78f0ee2099dc1f7bfb44ae97 -->
        <!-- START_26be7e289847815c95f9680c69fc471b -->
        <h2>user/edit</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/user/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET user/edit</code></p>
        <!-- END_26be7e289847815c95f9680c69fc471b -->
        <!-- START_979cb37659aede3d127d7c9f0087f5ca -->
        <h2>user/edit</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/user/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST user/edit</code></p>
        <!-- END_979cb37659aede3d127d7c9f0087f5ca -->
        <!-- START_0d25ecb27b7d3660d20c1b6f2291e599 -->
        <h2>user/report/{userID}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/user/report/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET user/report/{userID}</code></p>
        <!-- END_0d25ecb27b7d3660d20c1b6f2291e599 -->
        <!-- START_a4ec6263563a165625b2b1b686b98b48 -->
        <h2>user/report</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/user/report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST user/report</code></p>
        <!-- END_a4ec6263563a165625b2b1b686b98b48 -->
        <!-- START_2f931d4c2de88bb17c7733e094849395 -->
        <h2>user/groups</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/user/groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET user/groups</code></p>
        <!-- END_2f931d4c2de88bb17c7733e094849395 -->
        <!-- START_cfee3001fc8dcad6f47f117fff617485 -->
        <h2>user/groups/remove/all</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/user/groups/remove/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET user/groups/remove/all</code></p>
        <!-- END_cfee3001fc8dcad6f47f117fff617485 -->
        <!-- START_974f45e68634d391decdb08d852c11a7 -->
        <h2>user/events</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/user/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET user/events</code></p>
        <!-- END_974f45e68634d391decdb08d852c11a7 -->
        <!-- START_a1827b9dd532c2e79f1abfac40d4147e -->
        <h2>user/events/remove/all</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/user/events/remove/all" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET user/events/remove/all</code></p>
        <!-- END_a1827b9dd532c2e79f1abfac40d4147e -->
        <!-- START_2ce7909c85a56e6bc4fe3b7b74088f0e -->
        <h2>user/generate/API/{user_id}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/user/generate/API/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET user/generate/API/{user_id}</code></p>
        <!-- END_2ce7909c85a56e6bc4fe3b7b74088f0e -->
        <!-- START_e40bc60a458a9740730202aaec04f818 -->
        <h2>admin</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET admin</code></p>
        <!-- END_e40bc60a458a9740730202aaec04f818 -->
        <!-- START_e1ace1ed6cfc2a2f823814fd4d9bbbaf -->
        <h2>admin/search</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/admin/search" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST admin/search</code></p>
        <!-- END_e1ace1ed6cfc2a2f823814fd4d9bbbaf -->
        <!-- START_46185391d8f2d3b00ad8f654e0247cb6 -->
        <h2>admin/edit/settings</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/admin/edit/settings" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST admin/edit/settings</code></p>
        <!-- END_46185391d8f2d3b00ad8f654e0247cb6 -->
        <!-- START_6cd3622a5681c98ae65902334b4ab362 -->
        <h2>admin/edit/theme</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/admin/edit/theme" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST admin/edit/theme</code></p>
        <!-- END_6cd3622a5681c98ae65902334b4ab362 -->
        <!-- START_c7861c22ddbdfa86095368f0e1d47811 -->
        <h2>admin/edit/views</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/admin/edit/views" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET admin/edit/views</code></p>
        <!-- END_c7861c22ddbdfa86095368f0e1d47811 -->
        <!-- START_4a3986d062e3b81031644c8efd593e09 -->
        <h2>admin/edit/views</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/admin/edit/views" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST admin/edit/views</code></p>
        <!-- END_4a3986d062e3b81031644c8efd593e09 -->
        <!-- START_90f64b3de496b98a46be64952d473ffe -->
        <h2>admin/edit/privacy</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/admin/edit/privacy" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST admin/edit/privacy</code></p>
        <!-- END_90f64b3de496b98a46be64952d473ffe -->
        <!-- START_7614490a3eef5fbcba402080d0369e6a -->
        <h2>admin/users</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/admin/users" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET admin/users</code></p>
        <!-- END_7614490a3eef5fbcba402080d0369e6a -->
        <!-- START_0bb47eabdf898d5368e3d2992a41014d -->
        <h2>admin/users/delete/{userID}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/admin/users/delete/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET admin/users/delete/{userID}</code></p>
        <!-- END_0bb47eabdf898d5368e3d2992a41014d -->
        <!-- START_bafd158b7a2cc09a02ce9186df362d23 -->
        <h2>admin/users/delete</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/admin/users/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST admin/users/delete</code></p>
        <!-- END_bafd158b7a2cc09a02ce9186df362d23 -->
        <!-- START_e700f7ff4c28d94e0fd4f092b815695d -->
        <h2>admin/groups</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/admin/groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET admin/groups</code></p>
        <!-- END_e700f7ff4c28d94e0fd4f092b815695d -->
        <!-- START_71a6be7f5ca5e33f8f6c87ba685e03cf -->
        <h2>admin/reports</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/admin/reports" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET admin/reports</code></p>
        <!-- END_71a6be7f5ca5e33f8f6c87ba685e03cf -->
        <!-- START_07ae97b259050a0b78cda25b307437ff -->
        <h2>admin/blocks</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/admin/blocks" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET admin/blocks</code></p>
        <!-- END_07ae97b259050a0b78cda25b307437ff -->
        <!-- START_5181eda935d22615997d0bcada9f7a3f -->
        <h2>admin/bans</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/admin/bans" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET admin/bans</code></p>
        <!-- END_5181eda935d22615997d0bcada9f7a3f -->
        <!-- START_5a2c2b2a7d0664e0be3af7a1efb24ace -->
        <h2>admin/events</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/admin/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET admin/events</code></p>
        <!-- END_5a2c2b2a7d0664e0be3af7a1efb24ace -->
        <!-- START_70dc8d6371dd0a786757bf4c8e0df99a -->
        <h2>admin/reports/show/{reportID}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/admin/reports/show/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET admin/reports/show/{reportID}</code></p>
        <!-- END_70dc8d6371dd0a786757bf4c8e0df99a -->
        <!-- START_5b050d59f831ce631f18c748e85bb70a -->
        <h2>admin/reports/delete/{reportID}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/admin/reports/delete/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET admin/reports/delete/{reportID}</code></p>
        <!-- END_5b050d59f831ce631f18c748e85bb70a -->
        <!-- START_e4f3f8570b9b48dd1329d9b3eaed5bfc -->
        <h2>notifications</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/notifications" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET notifications</code></p>
        <!-- END_e4f3f8570b9b48dd1329d9b3eaed5bfc -->
        <!-- START_b7599dbc3b03f971c22834a5a4b2faf6 -->
        <h2>notifications/readall</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/notifications/readall" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST notifications/readall</code></p>
        <!-- END_b7599dbc3b03f971c22834a5a4b2faf6 -->
        <!-- START_792dbb5dfd8db302bbad16e36921d1b0 -->
        <h2>messages</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/messages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET messages</code></p>
        <!-- END_792dbb5dfd8db302bbad16e36921d1b0 -->
        <!-- START_2acbaeb56376d5238139466cac5dda6b -->
        <h2>messages/{typeConversation}/{correspondant}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/messages/1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET messages/{typeConversation}/{correspondant}</code></p>
        <!-- END_2acbaeb56376d5238139466cac5dda6b -->
        <!-- START_f010b3f19187c8ea54194a62f8302a13 -->
        <h2>messages/create</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/messages/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST messages/create</code></p>
        <!-- END_f010b3f19187c8ea54194a62f8302a13 -->
        <!-- START_14f66109b8104c7b26919d0d565e1834 -->
        <h2>groups/show/{group_id}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/groups/show/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (500):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Server Error"
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET groups/show/{group_id}</code></p>
        <!-- END_14f66109b8104c7b26919d0d565e1834 -->
        <!-- START_ca04b9150880222b5255e4be13bc3211 -->
        <h2>groups/list</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/groups/list" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (200):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET groups/list</code></p>
        <!-- END_ca04b9150880222b5255e4be13bc3211 -->
        <!-- START_ba2881c4d6a4e6f99de5937c8ed6da3e -->
        <h2>groups/create</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/groups/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET groups/create</code></p>
        <!-- END_ba2881c4d6a4e6f99de5937c8ed6da3e -->
        <!-- START_9d065d80067e14ef529651f1aa8ea697 -->
        <h2>groups/create</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/groups/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST groups/create</code></p>
        <!-- END_9d065d80067e14ef529651f1aa8ea697 -->
        <!-- START_c3112e9f81160c75c2fb7c85d876ce22 -->
        <h2>groups/edit/{group_id}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/groups/edit/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (302):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET groups/edit/{group_id}</code></p>
        <!-- END_c3112e9f81160c75c2fb7c85d876ce22 -->
        <!-- START_04351e74edd794f6bf3fb36c1ca7e30d -->
        <h2>groups/edit</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/groups/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST groups/edit</code></p>
        <!-- END_04351e74edd794f6bf3fb36c1ca7e30d -->
        <!-- START_ba255f449b1f96cb10b40e4c1c7729fd -->
        <h2>groups/admin/{group_id}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/groups/admin/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (302):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET groups/admin/{group_id}</code></p>
        <!-- END_ba255f449b1f96cb10b40e4c1c7729fd -->
        <!-- START_c856a414268cfdb46ed0502ff2afd25c -->
        <h2>groups/admin</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/groups/admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST groups/admin</code></p>
        <!-- END_c856a414268cfdb46ed0502ff2afd25c -->
        <!-- START_1de4c7b7340b98b6b9158897430586db -->
        <h2>groups/delete/{group_id}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/groups/delete/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (302):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET groups/delete/{group_id}</code></p>
        <!-- END_1de4c7b7340b98b6b9158897430586db -->
        <!-- START_ffb8512dc5a9f2e75eb497f5e8015ba7 -->
        <h2>groups/delete</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/groups/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST groups/delete</code></p>
        <!-- END_ffb8512dc5a9f2e75eb497f5e8015ba7 -->
        <!-- START_f203f8c3c44ddd178048a2e16cd0d939 -->
        <h2>groups/subscribe/add</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/groups/subscribe/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST groups/subscribe/add</code></p>
        <!-- END_f203f8c3c44ddd178048a2e16cd0d939 -->
        <!-- START_e3269aa01eacb627ac2bfffa00eff1dd -->
        <h2>groups/subscribe/remove</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/groups/subscribe/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST groups/subscribe/remove</code></p>
        <!-- END_e3269aa01eacb627ac2bfffa00eff1dd -->
        <!-- START_2f4c28095c45aec2b5c48a90643b8e65 -->
        <h2>groups/admin</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/groups/admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET groups/admin</code></p>
        <!-- END_2f4c28095c45aec2b5c48a90643b8e65 -->
        <!-- START_2e39277e6c1b55501f6a84482c7a3cf1 -->
        <h2>groups/admin/subscriptions</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/groups/admin/subscriptions" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (302):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET groups/admin/subscriptions</code></p>
        <!-- END_2e39277e6c1b55501f6a84482c7a3cf1 -->
        <!-- START_4456e6e3159009447ad6609ed5dcdd34 -->
        <h2>groups/admin/groups</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/groups/admin/groups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (302):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET groups/admin/groups</code></p>
        <!-- END_4456e6e3159009447ad6609ed5dcdd34 -->
        <!-- START_dae9e8b638b862de566bf66809b678e1 -->
        <h2>groups/admin/reports</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/groups/admin/reports" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (302):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET groups/admin/reports</code></p>
        <!-- END_dae9e8b638b862de566bf66809b678e1 -->
        <!-- START_97ea9924ac60aab1fe37632ddba58df4 -->
        <h2>groups/admin/bans</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/groups/admin/bans" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (302):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET groups/admin/bans</code></p>
        <!-- END_97ea9924ac60aab1fe37632ddba58df4 -->
        <!-- START_aa1b5acd70b4e0db7dbf4eda5c798a67 -->
        <h2>groups/admin/events</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/groups/admin/events" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (302):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET groups/admin/events</code></p>
        <!-- END_aa1b5acd70b4e0db7dbf4eda5c798a67 -->
        <!-- START_ca3a38ba8fd9802569659874bb7796e6 -->
        <h2>events/show/{event_id}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/events/show/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (200):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET events/show/{event_id}</code></p>
        <!-- END_ca3a38ba8fd9802569659874bb7796e6 -->
        <!-- START_92b328319f49439288d157a4c5e241e1 -->
        <h2>events/create</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/events/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (302):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET events/create</code></p>
        <!-- END_92b328319f49439288d157a4c5e241e1 -->
        <!-- START_421dd5ccdba33e6e944a6d5f27b46bb3 -->
        <h2>events/create</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/events/create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST events/create</code></p>
        <!-- END_421dd5ccdba33e6e944a6d5f27b46bb3 -->
        <!-- START_f2aad3b218e055b7a4718e3ba61c4c80 -->
        <h2>events/edit/{event_id}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/events/edit/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (302):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET events/edit/{event_id}</code></p>
        <!-- END_f2aad3b218e055b7a4718e3ba61c4c80 -->
        <!-- START_362b8397ac1c439f4af8c245d1d25779 -->
        <h2>events/edit</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/events/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST events/edit</code></p>
        <!-- END_362b8397ac1c439f4af8c245d1d25779 -->
        <!-- START_779c0bdae582cbb7929d72176e6d61a3 -->
        <h2>events/delete/{event_id}</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/events/delete/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (302):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET events/delete/{event_id}</code></p>
        <!-- END_779c0bdae582cbb7929d72176e6d61a3 -->
        <!-- START_b12cc29017efed778fe8cf17cd98befe -->
        <h2>events/delete</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/events/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST events/delete</code></p>
        <!-- END_b12cc29017efed778fe8cf17cd98befe -->
        <!-- START_f95bf83d4bb5055ecd4c98284739dcf8 -->
        <h2>events/participate/add</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/events/participate/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST events/participate/add</code></p>
        <!-- END_f95bf83d4bb5055ecd4c98284739dcf8 -->
        <!-- START_15779650f075547b69b4f799acbb2e4f -->
        <h2>events/participate/remove</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/events/participate/remove" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST events/participate/remove</code></p>
        <!-- END_15779650f075547b69b4f799acbb2e4f -->
        <!-- START_b8a35d8871e8ed10b366e8088a0a8884 -->
        <h2>frommeetup/group</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/frommeetup/group" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET frommeetup/group</code></p>
        <!-- END_b8a35d8871e8ed10b366e8088a0a8884 -->
        <!-- START_f1168bd0b55112343b1d5ee307a5606f -->
        <h2>frommeetup/group</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/frommeetup/group" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST frommeetup/group</code></p>
        <!-- END_f1168bd0b55112343b1d5ee307a5606f -->
        <!-- START_f8af55c1cfa640e771f00b88560f15da -->
        <h2>frommeetup/event</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/frommeetup/event" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (401):</p>
        </blockquote>
        <pre><code class="language-json">{
    "message": "Unauthenticated."
}</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET frommeetup/event</code></p>
        <!-- END_f8af55c1cfa640e771f00b88560f15da -->
        <!-- START_edc018788fdba19ebef66e58236da608 -->
        <h2>frommeetup/event</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X POST \
    "http://localhost/frommeetup/event" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <h3>HTTP Request</h3>
        <p><code>POST frommeetup/event</code></p>
        <!-- END_edc018788fdba19ebef66e58236da608 -->
        <!-- START_5a6db709300cd6f04e2c1f4f016552f3 -->
        <h2>legal/cgu</h2>
        <blockquote>
            <p>Example request:</p>
        </blockquote>
        <pre><code class="language-bash">curl -X GET \
    -G "http://localhost/legal/cgu" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"</code></pre>
        <pre><code class="language-javascript">const url = new URL(
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
    .then(response =&gt; response.json())
    .then(json =&gt; console.log(json));</code></pre>
        <blockquote>
            <p>Example response (200):</p>
        </blockquote>
        <pre><code class="language-json">null</code></pre>
        <h3>HTTP Request</h3>
        <p><code>GET legal/cgu</code></p>
        <!-- END_5a6db709300cd6f04e2c1f4f016552f3 -->
    </div>
    <div class="dark-box">
        <div class="lang-selector">
            <a href="#" data-language-name="bash">bash</a>
            <a href="#" data-language-name="javascript">javascript</a>
        </div>
    </div>
</div>
</body>
</html>
