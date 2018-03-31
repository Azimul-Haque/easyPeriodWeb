<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    {!!Html::style('css/stylesheet.css')!!}
    <style type="text/css">
        body {
            background-image: url("{{ asset('images/background.jpg') }}");
            background-repeat: no-repeat;
            background-position: right top;
            background-attachment: fixed;
        }
    </style>
</head>

<body>

<div class="container-fluid">
  <br/>
  <br/>
  <br/>
  <center><h1 class="bodyh1"><b>EasyPeriod</b></h1></center>
  <div class="col-md-6 col-md-offset-3">
      <div class="well bodywell">
          <center><h3>Get a help for your <i>menstrual cycles...</i></h3></center>
          <center><h3>Use this app on this website or on your android device</h3></center>
          <br>
          <center>
              @if (Auth::guest())
                  <a type="button" class="btn btn-success" href="{{ url('/login') }}"><i class="fa fa-sign-in"></i> Log in</a>
                  <a type="button" class="btn btn-default" href="{{ url('/register') }}"><i class="fa fa-user-plus"></i> Sign up</a>
              @else
                  You are logged in!<br/>
                  <a href="{{ url('/dashboard') }}" class="btn btn-success"><i class="fa fa-dashboard"></i> Go to Dashboard</a>
              @endif
          </center>
      </div>
      <br/>
      <center><footer style="color: #FFFFFF;text-shadow: 3px 0px 4px #000000;">An <a href="http://orbachinujbuk.com" style="color: #FFFFFF;">Orbachin Ujbuk</a> production. &copy; <?php echo date('Y'); ?> Copyright reserved.</footer></center>
  </div>
</div>
</body>
</html>