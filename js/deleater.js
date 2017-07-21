$(document).ready(function(){
    $(".btn-danger").click(function(){

    var btn = $(this);
    console.log($(this).data("id"));
   
        $.post("php/ajax_req.php",
        {
          id: $(this).data("id"),
          table: $(this).data("table"),           
        },function(data,status){
            if(data == 'exito'){
               btn.parent().parent().remove();
               //if($('.alert ').length == 0) {
                $( ".alert" ).removeClass( "alert alert-success alert-danger" )
                $("#result").attr('class', 'alert alert-success');
                $("#result").append("Se borró con éxito el registro.");
                alert("Se eliminó correctamente el elemento");
                
            }else{
                $( ".alert" ).removeClass( "alert alert-success alert-danger" )
                $("#result").attr('class', 'alert alert-danger');                
                $("#result").append("No se pudo borrar el elemento.");
                alert("Por desgracia no se pudo eliminar el registro");      
            }
        });
    });
});