<?php 

require "class/Produto.php";

$livro = new Produto;
$ebook = new Produto;

$livro->nome= "Livro php";
$ebook->nome = "livro de php online";
echo "<pre>";
var_dump($livro);
var_dump($ebook);

echo "</pre>";

?>