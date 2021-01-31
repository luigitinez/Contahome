$('.fila').click(function(){
    var name = $(this).children(":nth-child(1)").text();
    var model = $(this).children(":nth-child(2)").text();
    var id = $(this).children(":nth-child(3)").text();
    $("#titleModal").html(name+" - "+model);
    $('#itvModal').modal('show');
  })