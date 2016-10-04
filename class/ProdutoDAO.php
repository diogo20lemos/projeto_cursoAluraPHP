<?php

require_once("conecta.php");


class ProdutoDAO{

	private $conexao;

	function __construct($conexao){
		$this->conexao = $conexao;
		
	}

	function listaProdutos() {
		$produtos = array();
		$resultado = mysqli_query($this->conexao,"select p.*,c.nome as categoria_nome from produtos as p join categorias as c on c.id=p.categoria_id");
		while($produto_atual = mysqli_fetch_assoc($resultado)) {	
			$categoria = new Categoria;
			$categoria->nome = $produto_atual['categoria_nome'];

			
				$produto = new $produto_atual['tipoProduto'] ($produto_atual['nome'],$produto_atual['preco'],$produto_atual['descricao'],$categoria,$produto_atual['usado']);
				$produto->isbn = $produto_atual['isbn'];
			
			$produto->id = $produto_atual['id'];
			

			array_push($produtos, $produto);
		}
		return $produtos;
	}

	function insereProduto(Produto $produto) {

		if($produto->temIsbn()){
			$isbn = $produto->isbn;
		}else{
			$isbn=null;
		}

		$tipoProduto = get_class($produto);

		$query = "insert into produtos (nome, preco, descricao, categoria_id, usado, isbn,tipoProduto) values ('{$produto->nome}', {$produto->getPreco()}, '{$produto->descricao}', {$produto->categoria->id}, {$produto->usado},'{$isbn}','{$tipoProduto}')";
		
		return mysqli_query($this->conexao,$query);
	}
	function alteraProduto($id, $nome, $preco, $descricao, $categoria_id, $usado) {
		$query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}', categoria_id= {$categoria_id}, usado = {$usado} where id = '{$id}'";
		return mysqli_query($this->conexao, $query);
	}


	function buscaProduto($id) {
		$query = "select * from produtos where id = {$id}";
		$resultado = mysqli_query($this->conexao, $query);
		return mysqli_fetch_assoc($resultado);
	}

	function removeProduto($id) {
		$query = "delete from produtos where id = {$id}";
		return mysqli_query($this->conexao, $query);
	}

}