
<?php
	require "class/Produto.php";


	$livro = new Produto;
	$livro->nome="Livro da casa do codigo";
	$livro->setPreco(10);

	$livro2 = new Produto;
	$livro2->nome="Livro da casa do codigo";
	$livro2->setPreco(10);

	$livro2 = $livro;

	if ($livro === $livro2) {
		echo "São iguais!";
	}else {
		echo "São diferentes";
	}


?>