<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Please Ask - Private Anonymous Review Platform</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">


        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
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

            .title2 {
                font-size: 45px;
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

            .m-b-md2 {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height"> 
            <div class="content">
                <div class="title m-b-md">
                    <b>Please Ask</b>
                </div>
                <div class="title2 m-b-md2">
                     Private Anonymous Review Platform
                </div>

                <div class="links">
                    <?php if(Route::has('login')): ?>
                        <?php if(Auth::check()): ?>
                            <a href="<?php echo e(url('/dashboard')); ?>">Home</a>
                        <?php else: ?>
                            <a href="<?php echo e(url('/register')); ?>">Register</a>
                            <a href="<?php echo e(url('/login')); ?>">Login</a>                            
                        <?php endif; ?>
                    <?php endif; ?>
                    <a href="/showtopics">Topics</a>
                    <a href="/showreviews">Review</a>
                    <a href="/help">Help</a>
                </div>
            </div>
        </div>
    </body>
</html>
