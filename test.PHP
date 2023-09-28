<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test de código</title>
    <style>
        body {
            flex-direction: row;
            align-items: center;
            flex-flow: column;
            f;;
        }
    </style>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
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
          /* display: block; */
        }
      }

      @media (max-width: 768px) {
        #if {          
          width: 100%;
          border: 1px solid red;
        }
      }
    </style>
</head>
<body>
    <?php

    $server   = "localhost";
    $username = "root";
    $password = "";
    $database = "medisys";
    $mysqli = mysqli_connect($server, $username, $password, $database);


    if ($mysqli->connect_error) {
        die('error'.$mysqli->connect_error);
    }

    $sql = "SELECT ubicacion FROM profesionistas where id_profesionista = 1";
    $query = mysqli_query($mysqli, $sql);

    $data = mysqli_fetch_assoc($query);

    $ubicacion = $data['ubicacion'];

    $var = "<iframe id='if' src='$ubicacion' class='' width='100%' height='400' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>";
    ?>

    <!-- <a href="https://wa.me/+529241787757/?text=Hola, se encuentra disponible?">Contactar</a> -->

    <div class="container-fluid">
        <div class="row" id="main">

          <div class="col-xs-12 col-sm-12 col-sm-6 col-md-6" style="margin: 15px 0;">
            <?php echo $var; ?>
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

    <!-- <iframe src="" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d59780.84063281146!2d-97.44490875!3d20.53479875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85da402e96adcadd%3A0x3df3849a7fd72027!2sRestaurante%20Ariguznaga!5e0!3m2!1ses-419!2smx!4v1695878097783!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
    <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15225.883268548561!2d-94.97677!3d17.44148!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c1d89f3c8aa4d3%3A0x578f6d61939984a9!2s96950%20Jes%C3%BAs%20Carranza%2C%20Ver.!5e0!3m2!1ses-419!2smx!4v1695878170718!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> -->
</body>
</html>