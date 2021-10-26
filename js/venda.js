async function validarVenda(teste) {
	document.getElementById("idPedido").value = await Number(teste);
	let funcionario = document.getElementById("funcionario").value;

	if (funcionario != "") {
		alert(document.getElementById("idPedido").value)
		document.getElementById("form-venda").removeAttribute("onsubmit");
	} else {
		document.getElementById("erro-confirma-venda").removeAttribute("hidden");
	}
}