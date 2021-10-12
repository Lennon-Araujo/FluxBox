function validarCarrinho() {
	let produto = document.getElementById("produto").value;
	let quantidade = document.getElementById("quantidade").value;
	let cliente = document.getElementById("cliente").value;
	let funcionario = document.getElementById("funcionario").value;

	if (produto == "" || quantidade == "" || cliente == "" || funcionario == "" ) {
		document.getElementById("erro-carrinho").removeAttribute("hidden");
	} else {
		document.getElementById("form-carrinho").removeAttribute("onsubmit");
	}
}

function incluirPreco() {
	let quant = document.getElementById("quantidade").value;
	if (quant == "") {
		document.getElementById("quantidade").value = 1;
	}
}
