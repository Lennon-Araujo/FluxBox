function validarPost(){    
    titulo = document.getElementById('titulo').value;
    texto = document.getElementById('texto').value;

    if(titulo == "" || texto == ""){
        document.getElementById('erro-posts').removeAttribute('hidden');
    }else{
        document.getElementById('form-post').removeAttribute('onsubmit');
    }    
}

$(document).ready(function(){
    $('#cpf').mask("000.000.000-00");
})