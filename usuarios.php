<?php 
      include_once "includes.php";
    session_start();
?>
<!DOCTYPE html>
<html>
<?php include "modules/head.php";?>
<body>
<?php menu();?>
<div class="container">  
    <div class="row">
        <div id="result"></div>
            <div class="col-md-12">
                <div class="scrolling outer">
                    <div class="inner">
                        <table class="table table-striped table-hover table-condensed">
                            <tr>
                                <th>ID</th>
                                <th>NICK (login)</th>
                                <th>Name (Nombre bienvenida)</th>
                                <th>Ultimo Log-in</th>
                                <th></th>
                            </tr>
                            <?php 
                                $usuarios = get_usrs();
                                if($usuarios != 0){
                                    foreach ($usuarios as $key => $value) {
                                        echo "<tr>";
                                        foreach ($value as $llave => $valor) {
                                                echo "<td>";
                                                echo $valor;
                                                echo "</td>";
                                        }
                                        ?>
                                        <td>
                                            <button class='btn btn-danger' data-table='usuarios' data-id="<?= $value['id']?>">Borrar</button>
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
</div>

<!-- Fin Formulario -->

<script type="text/javascript" src="js/datepicker_spanish.js"></script>
<script type="text/javascript" src="js/deleater.js"></script>
</body>
</html>