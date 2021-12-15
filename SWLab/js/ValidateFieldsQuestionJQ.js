$(function() {

  $.validator.addMethod(
    "regex",
    function(value, element, regexp) {
      var regexA = new RegExp('^[a-zA-Z]+[0-9]{3}@ikasle\.ehu\.((eus)|(es))$');
      var regexP = new RegExp('^[a-zA-Z][\.[a-zA-Z]+]*@ehu\.((eus)|(es))$');
      return this.optional(element) || regexA.test(value) || regexP.test(value);
    },
    "Please check your input."
  );

  $("form[name='fquestion']").validate({
    rules: {
      email: {
        required: true,
        regex: true
      },
      ePregunta: {
        required: true,
        minlength: 10
      },
      respuestaC: "required",
      respuesta2: "required",
      respuesta3: "required",
      respuesta4: "required",
      complejidad: "required",
      tema: "required",
    },
    messages: {
      email: "Introduce una direccion de email valida",
      ePregunta: "El enunciado debe tener como minimo 10 caracteres",
      respuestaC: "Introduce una respuesta correcta",
      respuesta2: "Introduce una respuesta incorrecta",
      respuesta3: "Introduce una respuesta incorrecta",
      respuesta4: "Introduce una respuesta incorrecta",
      complejidad: "Introduce un nivel de complejidad",
      tema: "Introduce un tema"
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});