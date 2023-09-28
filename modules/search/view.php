<section class="content-header">
  <h1>
    <i class="fa fa-folder-o icon-title"></i> Profesiones
  </h1>
</section>

<section class="content">
  <div class="row">
    <div class="col-md-12">

      <div class="box box-primary">
        <div class="box-body">
    
        <!-- Formulario para buscar los profesionistar  -->
        <form class="form-inline" action="" method="POST">
          <div class="form-group">
            <label class="sr-only" for="exampleInputEmail3">Buscar por profesión:</label>
            <input type="text" class="form-control" id="exampleInputEmail3" placeholder="Ejemplo: Dentista" name="keyword">
          </div>
          <button type="submit" class="btn btn-default">Buscar</button>
        </form>
        <!-- Formulario para buscar los profesionistar  -->

        <?php
        if (!isset($_SESSION['id_user'])){
            echo "<div class='alert alert-danger alert-dismissable' style='margin-top: 15px;'>
                  <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                  <h4>  <i class='icon fa fa-times-circle'></i>Atención!</h4>
                  Si desea contactar a un doctor primero necesita iniciar sesión!
                  </div>";
        }

        if (isset($_POST['keyword'])) {
          $profesion = $_POST['keyword'];

          $sql = "SELECT * FROM areas AS a INNER JOIN profesionistas AS p ON a.id_area = p.id_area WHERE a.nombre_area LIKE '%$profesion%'";
          $query = mysqli_query($mysqli, $sql) or die('Error '.mysqli_error($mysqli));

          if(mysqli_num_rows($query) > 0) {
            
            echo "<div class='row'> <br>";

            while ($data = mysqli_fetch_array($query)) {
              $id_profesionista = $data['id_profesionista'];
              $nombre_profesionista = $data['nombre'];
              $apellidos = $data['apellidos'];
              $nombre_area = $data['nombre_area'];
              $descripcion = $data['descripcion'];
              $telefono = $data['telefono'];
              $horario_atencion = $data['horario_consulta'];
              $precio_consulta = $data['precios_consulta'];
              $ubicacion = $data['precios_consulta'];
             
            echo "      
            <div class='col-md-4'>
              <div class='panel panel-default'>
                <div class='panel-body'>
                  <p><strong>Nombre: </strong>: $nombre_profesionista $apellidos</p>
                  <p><strong>Area: </strong>: $nombre_area</p>
                  <p><strong>Horario de atención</strong>: $horario_atencion</p>
                  <p><strong>Precios </strong>: $precio_consulta</p>
                  <div class='text-center'>";
                  if (isset($_SESSION['id_user'])){
                    echo "
                    <a href='https://wa.me/+52$telefono/?text=Hola, se encuentra disponible?' class='bg-verde btn'>Contactar</a>
                    <a href='info.php?id=$id_profesionista' class='bg-menta btn'>Ver ubicación</a>
                    ";
                  }
                    echo "
                    </div>
                </div>
              </div>
            </div>";

            }
            echo "</div>";
          } 

        } else {
          $sql = "SELECT * FROM areas AS a INNER JOIN profesionistas AS p ON a.id_area = p.id_area";
        $query = mysqli_query($mysqli, $sql) or die('Error '.mysqli_error($mysqli));

        if(mysqli_num_rows($query) > 0) {
          
          echo "<div class='row'> <br>";

          while ($data = mysqli_fetch_array($query)) {
            $id_profesionista = $data['id_profesionista'];
            $nombre_profesionista = $data['nombre'];
            $apellidos = $data['apellidos'];
            $nombre_area = $data['nombre_area'];
            $descripcion = $data['descripcion'];
            $telefono = $data['telefono'];
            $horario_atencion = $data['horario_consulta'];
            $precio_consulta = $data['precios_consulta'];
            $ubicacion = $data['precios_consulta'];

           
          echo "      
          <div class='col-md-4'>
            <div class='panel panel-default'>
              <div class='panel-body'>
                <p><strong>Nombre: </strong>: $nombre_profesionista $apellidos</p>
                <p><strong>Area: </strong>: $nombre_area</p>
                <p><strong>Telefono</strong>: $telefono</p>
                <p><strong>Horario de atención</strong>: $horario_atencion</p>
                <p><strong>Precios </strong>: $precio_consulta</p>
                <div class='text-center'>";
                if (isset($_SESSION['id_user'])){
                  echo "
                  <a href='https://wa.me/+52$telefono/?text=Hola, se encuentra disponible?' target='_blank' class='bg-verde btn'>Contactar</a>
                  <a href='info.php?id=$id_profesionista' target='_blank' class='bg-menta btn'>Ver ubicación</a>
                  ";
                }
                  echo "
                  </div>
              </div>
            </div>
          </div>";
        }
      }
    }
        ?>

        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content