
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Talkhealth</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="Aplicación de telemédicina orientada al público en general de toda la república mexicana">

    <!-- favicon -->
    <link rel="shortcut icon" href="assets/img/logo_app.jpg" />

    <!-- Bootstrap 3.3.2 -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="assets/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    <style>
      #main {
        display: flex; 
        justify-content: center; 
        align-items: center;
        flex-direction: column;
        margin: 6% 0;
      }

      @media (min-width: 768px) {
        #main {
          flex-direction: row;
        }
      }
    </style>
  </head>
  <body class="bg-menta">
    <div class="container-fluid">
        <div class="row" id="main">

          <div class="col-xs-6 col-sm-12 col-sm-6 col-md-4" style="margin: 15px 0;">
            <img class="img-responsive img-circle" src="assets/img/logo_app.jpg">
          </div>

          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="login-box-body"  style="border-radius: 25px;">
              <p class="login-box-msg">INICIO DE SESIÓN</p>
              <form action="login-check.php" method="POST">
                <div class="form-group has-feedback">
                  <input type="text" class="form-control" name="username" placeholder="Usuario" autocomplete="off" required />
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" name="password" placeholder="Contraseña" required />
                  <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div> <br/>
                <div class="row">
                  <div class="col-xs-12">
                    <input type="submit" class="btn btn-info btn-lg btn-block btn-flat" name="login" value="Continuar" />
                  </div> <!-- /.col -->
                </div>
                <div class="text-center" style="margin-top: 10px;">
                  <p>¿Aún no tienes cuenta? Crea una <a href="crear_cuenta.php">aquí</a></p>
                </div>
              </form>
            </div> <!-- /.login-box-body -->
          </div>

        </div>
    </div>

    <!-- jQuery 2.1.3 -->
    <script src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

  </body>
</html>