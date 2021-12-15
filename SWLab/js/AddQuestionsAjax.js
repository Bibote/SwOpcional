$(document).ready( function() {
    $("#enviar").click( function(){
        var formulario = $("#fquestion").serializeArray();
        $.ajax({
          type: "POST",
          dataType: 'json',
          url: "AddQuestion.php",
          data: formulario,
          complete: function() {
            $("#exito").delay(100).fadeIn("slow");
          },
        })
    });
});