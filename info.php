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
    <link rel="stylesheet" href="assets/css/style.css">
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
<body class="bg-azul">
    <?php

    $server   = "localhost";
    $username = "root";
    $password = "";
    $database = "medisys";
    $mysqli = mysqli_connect($server, $username, $password, $database);

    if ($mysqli->connect_error) {
        die('error'.$mysqli->connect_error);
    }

    if (!isset($_GET['id'])) {
      header("Location: main.php?module=search");
    }
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM areas AS a INNER JOIN profesionistas AS p ON a.id_area = p.id_area WHERE p.id_profesionista = $id";

    $query = mysqli_query($mysqli, $sql);

    $data = mysqli_fetch_assoc($query);

    $id_profesionista = $data['id_profesionista'];
    $nombre_profesionista = $data['nombre'];
    $apellidos = $data['apellidos'];
    $nombre_area = $data['nombre_area'];
    $descripcion = $data['descripcion'];
    $telefono = $data['telefono'];
    $horario_atencion = $data['horario_consulta'];
    $precio_consulta = $data['precios_consulta'];
    $ubicacion = $data['ubicacion'];


    $var = "<iframe id='if' src='$ubicacion' class='' width='100%' height='400' style='border:0;' allowfullscreen='' loading='lazy' referrerpolicy='no-referrer-when-downgrade'></iframe>";
    ?>

    <div class="container-fluid">
        <div class="row" id="main">

          <div class="col-xs-12 col-sm-12 col-sm-6 col-md-6" style="margin: 15px 0;">
            <?php echo $var; ?>
          </div>

          <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="login-box-body"  style="border-radius: 25px;">
              <h2><strong>Datos del profesional: </strong></h2>
              <h3 class="login-box-msg"><strong>Nombre: </strong><?php echo $nombre_profesionista . " " . $apellidos; ?></h4>
              <h3 class="login-box-msg"><strong>Área: </strong><?php echo $nombre_area; ?></h4>
              <h3 class="login-box-msg"><strong>Descripción: </strong><?php echo $descripcion; ?></h4>
              <h3 class="login-box-msg"><strong>Teléfono: </strong><?php echo $telefono; ?></h4>
              <h3 class="login-box-msg"><strong>Horario de atención: </strong><?php echo $horario_atencion; ?></h4>
              <h3 class="login-box-msg"><strong>Precio de consulta (estimado): </strong><?php echo $precio_consulta; ?></h4>
              <div class="text-center" style="margin: 15px 0 10px 0;">
                <a href='https://wa.me/+52$telefono/?text=Hola, se encuentra disponible?' target='_blank' class='bg-verde btn btn-lg'>Contactar</a>
              </div>
            </div> <!-- /.login-box-body -->
          </div>

        </div>
    </div>

</body>
</html>