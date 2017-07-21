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
       $result = insertar_seguro();
       if(is_array($result)){
           echo "<div class='alert alert-danger'> Has dejado campos vacios </div>";
           
       }
    }
?>
<div class="col-sm-3"></div>
<div class="bootstrap-iso">
 <div class="container-fluid">
  <div class="row">
   <div class="col-md-6 col-sm-6 col-xs-12">
    <form class="form-horizontal" method="post">
     <div class="form-group ">
      <label class="control-label col-sm-2 requiredField" for="name">
       Elemento Asegurado
      </label>
      <div class="col-sm-10">
       <input class="form-control" id="name" name="name" type="text" required>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label col-sm-2 requiredField" for="seguro">
       Marca Seguro
      </label>
      <div class="col-sm-10">
       <input class="form-control" id="seguro" name="seguro" type="text" required>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label col-sm-2 requiredField" for="select">
       Banco
      </label>
      <div class="col-sm-10">
       <select class="select form-control" id="select" name="banco">
        <option value="BBVA">
         BBVA
        </option>
        <option value="La Caixa">
         La Caixa
        </option>
       </select>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label col-sm-2 requiredField" for="poliza">
       Numero Poliza
      </label>
      <div class="col-sm-10">
       <input class="form-control" id="poliza" name="poliza" type="text" required>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label col-sm-2" for="price">
       Precio (en Euros)
      </label>
      <div class="col-sm-10">
       <input class="form-control" id="price" name="price" type="text" required/>
      </div>
     </div>
     <div class="form-group ">
      <label class="control-label col-sm-2" for="date">
       Fecha:
      </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="date" placeholder="yyyy-mm-dd" id="fecha" value="" required/>
      </div>
     </div>
 <div class="form-group">
      <div class="col-sm-10 col-sm-offset-2">
       <button class=" btn btn-block" id="create" name="crear" type="submit" value="submit">
        Crear
       </button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
</div>
<!-- Fin Formulario -->
<!-- Inicio tabla -->

<div class="container">  
  <div class="row">
  <div id="result"></div>
    <div class="col-md-12">
      <div class="scrolling outer">
        <div class="inner">
          <table class="table table-striped table-hover table-condensed">
            <tr>
              <th>Elemento Asegurado</th>
              <th>Marca</th>
              <th>Banco</th>
              <th>Nº Poliza</th>
              <th>Precio (€)</th>
              <th>Fecha (año-mes-dia)</th>
              <th></th>
            </tr>
            <?php 
            $seguros = get_seguros();
            if($seguros != 0){
                foreach ($seguros as $key => $value) {
                    echo "<tr>";
                    foreach ($value as $llave => $valor) {
                        if($llave != 'id'){
                            echo "<td>";
                            echo $valor;
                            echo "</td>";
                        }
                    }
                    ?>
                    <td>
                         <button class='btn btn-danger' data-table='seguros' data-id="<?= $value['id']?>">Borrar</button>
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

<!-- Fin Formulario -->

<script type="text/javascript" src="js/datepicker_spanish.js"></script>
<script type="text/javascript" src="js/deleater.js"></script>
<style>
#create{
    color:white;
    background-color:#5cb85c;
}
#create:hover{
    font-weight:bold;
    background-color:#47a447;
}
.scrolling .inner > table {
    table-layout: inherit;
 *margin-left: -100px;/*ie7*/
}
.scrolling td {
    vertical-align: top;
	padding: 10px;
	min-width: 100px;
}

.outer {
	position: relative
}
.inner {
	overflow-x: auto;
	overflow-y: visible;
	
}
tr:hover{
    background-color:#d8eaee !important;
}
</style>
</body>
</html>