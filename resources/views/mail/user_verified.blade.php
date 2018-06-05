<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>User account verify</title>
    <style>
        p{
            color: #000;
            font-weight: 700;
        }
        span{
            color: red;
            font-style: italic;
            text-decoration: none;
            letter-spacing: 5px;
            background: #fff;
            padding: 10px;
            display: inline-block;
            margin:10px 0;

        }
        a.btn-log:hover{
            text-decoration: none;
            color: #fff;
            opacity: 0.7;
        }
        a.btn-log{
            display: inline-block;
            background: #603813;
            border-radius: 5px;
            padding: 10px;
            font-weight: 700;
            color: #fff;
        }
        img {
            height: auto;
            padding: 7px 0;
            width: 100px;
        }
        .mail{
            letter-spacing: normal;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center jumbotron">
            <a href="{{route('showHome')}}"><img src="http://multidimensionsystems.com/development/shaityoros/fontPage/images/logo.png" alt=""></a>
            <h5>সাহিত্যরস এর পক্ষ থেকে স্বাগত</h5><br>
            <p>জনাব {{$name}} আপনাকে সাহিত্যরস এর ওয়েব সাইটে ইউজার হবার জন্য ভেরিফাই করতে বলা হয়েছে

            </p>
            <a class="btn-log"  href="{{route('userVerify',$token)}}">Verify now</a>
        </div>
    </div>
</div>