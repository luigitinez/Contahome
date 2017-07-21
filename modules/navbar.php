<?php
function menu(){

 //index.php or controller
  //array que contiene todas las paginas que aparecen en el menu 
  $pages = array();
  
  $activePage = geturl();
 if(isset($_SESSION['usr'])){

   if($_SESSION['usr']){
        //aqui los links exclusivos del usuario logged
      $pages['index.php']     =   "INICIO";
      $pages['seguros.php']   =   "SEGUROS";
      $pages['vehiculos.php'] =   "VEHICULOS";
      
   }
 
 }else{
   //aqui los links exclusivos del usuario invitado
   
 }
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">ContaHome</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
<?php //menu.php
      foreach($pages as $url=>$title): ?>
            <li <?php if($url == $activePage):?>class="active"<?php endif;?> >
                 <a  href="<?php echo $url;?>">
                <?php echo $title;?>
                </a>
            </li>

<?php   endforeach;?>
   
        
      </ul>

<?php if(isset($_SESSION['usr'])){ ?>    
      <ul class="nav navbar-nav navbar-right">
        <li><a href="php/logout.php">Salir</a></li>
        
      </ul>
<?php } ?>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<?php 
}
?>