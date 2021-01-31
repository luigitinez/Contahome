<?php 
  include_once "includes.php";
    session_start();
?>
<!DOCTYPE html>
<html>
<?php include "modules/head.php";?>

<body>
<?php menu();?>

<?php 
    if(isset($_POST['crear'])){
       $result = insertar_veh();
       if(!$result){
           echo "<div class='container'><div class='alert alert-danger'> No se pudo insertar el registro en la base de datos </div></div>";
          
       }
       if(is_array($result)){

           echo "<div class='container'><div class='alert alert-danger'> Has dejado campos vacios </div></div>";
           
       }
    }
?>
  <div class="container">
  <div class="row">
    <div class="col-md-3 col-sm-3 col-xs-1"></div>
    <div class="col-md-6 col-sm-6 col-xs-10">
      <form class="form-horizontal" method="post">
          <div class="form-group">
            <label>Marca:</label>
            <input type="text" class="form-control" name="marca">
          </div>
          <div class="form-group">
            <label>Modelo:</label>
            <input type="text" class="form-control" name="modelo">
          </div>
          <div class="form-group">
            <label>Matricula:</label>
            <input type="text" class="form-control" name="matricula">
          </div>
          <div class="form-group">
              <label>Fecha compra:</label>
              <input type="text" class="form-control" name="date" placeholder="yyyy-mm-dd" id="fecha" value="" required/>
          </div>
          <div class="form-group text-center">
            <input type="submit" class="btn btn-success btn-lg btn-block" name="crear" value="Crear">
          </div>
      </form>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-1"></div>
    </div>
  </div>
<!-- Inicio tabla -->
  <div class="container">  
  <div class="row">
  <div id="result"></div>
    <div class="col-md-12">
      <div class="scrolling outer">
        <div class="inner">
          <table class="table table-striped table-hover table-condensed">
            <tr>
              <th>Marca</th>
              <th>Modelo</th>
              <th>Matricula</th>
              <th>Fecha (año-mes-dia)</th>
              <th></th>
            </tr>
            <?php 
            $seguros = get_veh();
            if($seguros != 0){
                foreach ($seguros as $key => $value) {
                    echo "<tr class='fila'>";
                    foreach ($value as $llave => $valor) {
                        if($llave != 'id'){
                            echo "<td>";
                            echo $valor;
                            echo "</td>";
                        }
                    }
                    ?>
                    <td>
                         <button class='btn btn-danger' data-table='vehiculos' data-id="<?= $value['id']?>">Borrar</button>
                    </td>
                    <?php
                    echo "</tr>";
                }
            }else{
                echo "<h3>No hay registros</h3>";
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Fin Tabla-->
<!-- Button trigger modal -->
<!-- Boton lanzamodal-->

<!-- Modal -->
<div class="modal fade" id="itvModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleModal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- End Modal-->
</body>
</html>
<script type="text/javascript" src="js/datepicker_spanish.js"></script>
<script type="text/javascript" src="js/deleater.js"></script>
<script type="text/javascript" src="js/modal.js"> </script>
