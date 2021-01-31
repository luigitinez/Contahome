<?php
include_once "../db/DataSource.php";

$itvs = get_itvs_by_reg($_REQUEST['id']);
?>
<table class="table">
    <thead>       
        <tr><th>Fecha</th><tr>
    </thead>
    <tbody>
<?php
    foreach($itvs as $itv){
        echo '<tr><td>'.$itv['fecha'].'</td></tr>';
    }
?>
    </tbody>
</table>