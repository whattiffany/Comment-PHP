<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.4.1.js"
             integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
             crossorigin="anonymous"></script>
        
        <title>Login</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
             html, body {
                background-color: #114680;
                color: #fff;
                font-family: 'Microsoft JhengHei','Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .content {
                font-weight:bold;
                text-align: center;
                padding-top:50px;
                
            }         
            input{
                margin:5px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">         
            <div class="content"> 
                <h1>Login</h1>               
                    <div class="register m-b-md">
                    帳號：<input id="account" type="text"/>
                    <br/>                    
                    密碼：<input id="password" type="text"/>
                    <br/>                                
                    <button onclick="login()">送出</button>
                    </div>               
            </div>
        </div>
    </body>
    <script>        
         function login(){
            var account=$("#account").val();
            var password=$("#password").val();              
            $.ajax({
            url: 'http://127.0.0.1/web/public/api/login', 
            type: 'POST',                                            
            data: {
                "account":account,                                           
                "password":password,   
            },                                    
            dataType: 'json',                                      
            success: function(data){                                
                console.log(data);               
            },
            statusCode: {   
                200: function(res) {
                    console.log(res);
                    alert( "登入成功" );
                },                                       
                400: function(res) {
                console.log(res.responseJSON[0]);
                alert( res.responseJSON[0]);
                }
            }
            })}
        </script>
</html>
