const email=document.getElementById('email');
const enunciado=document.getElementById('ePregunta');
const form=document.getElementById('fquestion');
const respuestac=document.getElementById('respuestaC')
const respuesta2=document.getElementById('respuesta2')
const respuesta3=document.getElementById('respuesta3')
const respuesta4=document.getElementById('respuesta4')
const tema=document.getElementById('tema')
let regexA = new RegExp('^[a-zA-Z]+[0-9]{3}@ikasle\.ehu\.((eus)|(es))$')
let regexP = new RegExp('^[a-zA-Z][\.[a-zA-Z]+]*@ehu\.((eus)|(es))$')

form.addEventListener('submit', (e)=> {
    if(!regexA.test(email.value) && !regexP.test(email.value)) {
        e.preventDefault()
        alert("El email no es valido")
    }
    if(enunciado.value.length<10) {
        e.preventDefault()
        alert("Enunciado demasiado corto")
    }
    if(respuestaC.value.length<1) {
        e.preventDefault()
        alert("Introduce una respuesta correcta")
    }
    if(respuesta2.value.length<1) {
        e.preventDefault()
        alert("Introduce una respuesta incorrecta")
    }
    if(respuesta3.value.length<1) {
        e.preventDefault()
        alert("Introduce una respuesta incorrecta")
    }
    if(respuesta4.value.length<1) {
        e.preventDefault()
        alert("Introduce una respuesta incorrecta")
    }
    if(tema.value.length<1) {
        e.preventDefault()
        alert("Introduce un tema")
    }
  
    
})