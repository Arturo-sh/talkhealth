
<?php  
if (isset($_SESSION['id_user'])) {

  $query = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE id_user='$_SESSION[id_user]'") 
                                  or die('error: '.mysqli_error($mysqli));
  $data  = mysqli_fetch_assoc($query);
} 
?>


<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Perfil de Usuario
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
    <li class="active"> Perfil de Usuario</li>
  </ol>
</section>


<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  
  
    if (empty($_GET['alert'])) {
      echo "";
    } 
 
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
         Perfil de usuario cambiado correctamente.
            </div>";
    }

    elseif ($_GET['alert'] == 2) {
    echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='fa fa-check-circle'></i> Error!</strong> Asegúrese de que el archivo que se sube es correcto.
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
    echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='fa fa-check-circle'></i> Error!</strong> Asegúrese de que la imagen no es más de 1 MB.
            </div>";
    }

    elseif ($_GET['alert'] == 4) {
    echo "  <div class='alert alert-danger alert-dismissible' role='alert'>
              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                  <span aria-hidden='true'>&times;</span>
              </button>
              <strong><i class='fa fa-check-circle'></i> Error!</strong> Asegúrese de que el tipo de archivo subido *.JPG, *.JPEG, *.PNG.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <!-- form start -->
        <form role="form" class="form-horizontal" method="POST" action="?module=form_profile" enctype="multipart/form-data">
          <div class="box-body">

            <input type="hidden" name="id_user" value="<?php echo $data['id_user']; ?>">
            
            <div class="form-group">
              <label class="col-sm-2 control-label">
              <?php  
              if ($data['foto']=="") { ?>
                <img style="border:1px solid #eaeaea;border-radius:50px;" src="images/user/user-default.png" width="75">
              <?php
              }
              else { ?>
                <img style="border:1px solid #eaeaea;border-radius:50px;" src="images/user/<?php echo $data['foto']; ?>" width="75">
              <?php
              }
              ?>
              </label>
              <label style="font-size:25px;margin-top:10px;" class="col-sm-8"><?php echo $data['name_user']; ?></label>
            </div>
            <hr>
            <div class="form-group">
              <label class="col-sm-2 control-label">Nombre de Usuario</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['username']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Email</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['email']; ?></label>
            </div>
          
            <div class="form-group">
              <label class="col-sm-2 control-label">Telefono</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['telefono']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Permisos de acceso</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['permisos_acceso']; ?></label>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Status</label>
              <label style="text-align:left" class="col-sm-8 control-label">: <?php echo $data['status']; ?></label>
            </div>
          </div><!-- /.box body -->

          <div class="box-footer">
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-primary btn-submit" name="Modificar" value="Modificar">
              </div>
            </div>
          </div><!-- /.box footer -->
        </form>
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content