function validarProduto() {
    var nome = document.getElementById('nome').value;
    var preco = document.getElementById('preco').value;
    var quantidade = document.getElementById('quantidade').value;

    if(nome == "" || preco == "" || quantidade == "" ){
        document.getElementById('erro-produto').removeAttribute('hidden');
    }else{
        document.getElementById('form-produto').removeAttribute('onsubmit');
    }
}

function validarEdicaoProduto(){
    var nome = document.getElementById('nome').value;
    var preco = document.getElementById('preco').value;
    var quantidade = document.getElementById('quantidade').value;


    if(nome == "" || preco == "" || quantidade == ""){
        document.getElementById('erro-produto').removeAttribute('hidden');
    }else{
        document.getElementById('form-produto').removeAttribute('onsubmit');
    }
}