
 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <h1>  اهلا{{$user_data['name']}} في صفحتنا </h1>
    <p>شكرا لك لتسجيل <br> كلمه المرور هي {{$user_data['password']}}</p>
    <p>للوصل الى حسابك يرجى الظغط على  <a href="http://127.0.0.1:8000/login">تسجيل الدخول</a> </p>
 </body>
 </html>
