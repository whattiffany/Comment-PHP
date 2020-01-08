<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.4.1.js"
             integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
             crossorigin="anonymous"></script>
        <title>Index</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Microsoft JhengHei','Raleway', sans-serif;
                font-weight: 500;
                height: 100vh;
                margin: 0;
                background: -webkit-linear-gradient(left,#114680,#fff);
                background: -o-linear-gradient(right,#114680,#fff);
                background: -moz-linear-gradient(right,#114680,#fff);
                background: linear-gradient(to right,#114680,#fff);
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">                               
            <div class="content">
                <div class="title m-b-md">
                    *Welcome*                
                </div>
                <br/>
                    <a href="{{ url('/login') }}">Login</a>
                        |
                    <a href="{{ url('/register') }}">Register</a>
                        |
                    <a href="{{ url('/comment') }}">Go Comments</a>
                        |
                    <a href="{{ url('/getComment') }}">See Comments</a>
                        |
                    <a onclick="logout()">logOut</a>
            </div>
        </div>
    </body>
    <script> 
         var token = localStorage.getItem("token");  
         function logout(){                       
            $.ajax({
            url: 'http://127.0.0.1/web/public/api/logout',
            headers: {
            'Authorization': `Bearer ${token}`,
            }, 
            type: 'POST',                                                                             
            dataType: 'json',                                      
            statusCode: {   
                200: function(res) {
                    console.log(res);
                    alert( res );
                    localStorage.clear();
                },                                       
                400: function(res) {
                console.log(res.responseJSON[0]);
                alert( res.responseJSON[0]);
                }
            }
            })}
        </script>
</html>
