function validarCliente(){
    var cliente = document.getElementById('cliente').value;
    var endereco = document.getElementById('endereco').value;
    var telefone = document.getElementById('telefone').value;

    if(endereco == ""){
        document.getElementById('erro-clientes').removeAttribute('hidden');
    }else{
        document.getElementById('form-cliente').removeAttribute('onsubmit');

    }
}