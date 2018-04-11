
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
     <link rel="icon" type="image/png" href="dist/img/low-temperature.png" sizes="96x96" /> 
    <title>Sensor | Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />

    <script src="https://use.fontawesome.com/91e35a934b.js"></script>
    
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo text-center">
        <i class="fa fa-thermometer-half"></i><b> Sensor - DEV</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Effettua il login per iniziare</p>
		<?php 
		if (isset($_GET['err'])) { ?>
			<p class="login-box-msg">Credenziali non valide</p>
		<?php }
		?>
        <form action="?page=login" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Nome utente" name="username"/>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-4">
              <button type="submit" class="btn btn-success btn-block btn-flat">Entra</button>
            </div><!-- /.col -->
          </div>
        </form>
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.3 -->
    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  </body>
</html>