
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Alta de profesionista
    </h1>

    <div class='alert alert-danger alert-dismissable' style='margin-top: 15px;'>
      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
      <h4><i class='icon fa fa-times-circle'></i>Atención!</h4>
      Mandar los datos de ubicación (donde labora) al siguiente correo: supporttalkhealth@gmail.com para proceso de registro  
    </div>
  </section>

  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/profesions/proses.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">

              <div class="form-group">
                <label class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nombre" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Apellidos</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="apellidos" autocomplete="off" required>
                </div>
              </div>


              <?php
              require_once "config/database.php";
              
              $sql = "SELECT id_area,nombre_area FROM areas";
              $query = mysqli_query($mysqli, $sql);
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Área de especialización</label>
                <div class="col-sm-5">
                  <select name='especialidad' class="form-control">
                  <?php
                    while ($row = mysqli_fetch_array($query)) {
                      $id_area = $row['id_area'];
                      $area = $row['nombre_area'];
      
                      echo "<option value='$id_area'>$area</option>";
                    }
                  ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Teléfono</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="telefono" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Horario consulta</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="horario_consulta" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Precios consulta (estimado)</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="precios_consulta" autocomplete="off" required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="?module=user" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->


