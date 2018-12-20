<!DOCTYPE html>
<html lang="en">
    <head> 
        <meta name="viewport" content="width=device-width, initial-scale=1">


        <!-- Website Font style -->
        <link rel="stylesheet" href="{{asset('public/registration/css/font-awesome.min.css')}}">
        <link href="{{asset('public/registration/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href='{{asset('public/registration/css/style.css')}}' rel='stylesheet' type='text/css'>

        <title>Event Registration</title>
    </head>
    <body>
        <div class="container">
            <div class="row main">
                <div class="main-login main-center" style="padding: 30px 0">
                    <div class="text-center">
                        <h3>Your Registration Completed Successfully</h3>
                        <p>We'll inform you through email within 24 hours</p>
                        <a href="{{ route('registration', ['event_number' => $event_number]) }}" class="btn btn-default">Back to Registration Form</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{asset('public/registration/js/jquery.min.js')}}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{asset('public/registration/js/bootstrap.min.js')}}"></script>
    </script>
</body>
</html>