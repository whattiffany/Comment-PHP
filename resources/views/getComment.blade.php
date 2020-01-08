<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.4.1.js"
             integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
             crossorigin="anonymous"></script>
        
        <title>getComment</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
             html, body {
                background-color: #FFC1E0;
                color: #D9006C;
                font-family: 'Microsoft JhengHei','Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
            .content {
                width:500px;
                margin:0 auto;
                font-weight:bold;
                padding-top:50px;
                text-align: center;
            }       
              
            #comments{
                margin:5px;
                text-align: left;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">         
            <div class="content">                                   
                    <div class="m-b-md"> 
                    <a href="{{ url('/') }}">回首頁<a>                                       
                    <h1>-----留言版-----<h1>          
                    </div> 
                    <br/>
                    <div id="comments"></div>                
            </div>
        </div>
    </body>
    <script>                                  
            $.ajax({
            url: 'http://127.0.0.1/web/public/api/getComments',
            type: 'POST',                                            
            data: {
                                                          
            },                                    
            dataType: 'json',                                      
            success: function(data){       
                $.each(data, function (i, val) {
                     var string = "<label>編號："+data[i].comment_id+"</label><br>"+
                     "<label>留言者："+data[i].name+"</label><br>"+
                     "<label>留言內容："+data[i].content+"</label><br>"+
                     "<label>留言時間："+data[i].created_at+"</label><br>"+
                     "------------------<br>";
                     $("#comments").append(string)  
                })             
                        
            },
            statusCode: {   
                200: function(res) {
                    console.log(res);                   
                },                                       
                400: function(res) {
                console.log(res.responseJSON[0]);
                alert( res.responseJSON[0]);
                }
            }
            })
        </script>
</html>
