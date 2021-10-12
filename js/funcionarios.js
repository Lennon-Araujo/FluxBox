function validarFuncionario() {
    var nome = document.getElementById('nome').value;

    if(nome == "" ){
        document.getElementById('erro-funcionario').removeAttribute('hidden');
    }else{
        document.getElementById('form-funcionario').removeAttribute('onsubmit');
    }
}

function validarEdicaoFuncionario(){
    var nome = document.getElementById('nome').value;

    if(nome == ""){
        document.getElementById('erro-funcionario').removeAttribute('hidden');
    }else{
        document.getElementById('form-funcionario').removeAttribute('onsubmit');
    }
}