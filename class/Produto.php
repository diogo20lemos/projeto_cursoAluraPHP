<?php 
	
	abstract class Produto{

		public $id;
		public $nome;
		private $preco;
		public $descricao;
		public $categoria;
		public $usado;

		function __construct($nome="Produto Indefinido",$preco=99999,$descricao="Contate o administrador",Categoria $categoria,$usado="true"){
			$this->nome= $nome;
			$this->setPreco($preco);
			$this->descricao=$descricao;
			$this->categoria=$categoria;
			$this->usado=$usado;

		}

		abstract public function calculaPrecoDeVenda();


		public function calculaImposto(){

			return $this->getPreco()*0.195;
		}

		function __toString(){
			return $this->nome." : ".$this->preco."<br>";
		}

		public function temIsbn(){
			return $this instanceof Livro;
		}


		public function valorComDesconto($valor = 0.1){
			if($valor <= 0.5 && $valor > 0){
				$this->setPreco($this->preco - $this->preco * $valor);
			}
			return $this->preco;
		
		}

		public function setPreco($preco){
			if ($preco>0) {
				$this->preco = $preco;
			}
		}

		public function getPreco(){
			return $this->preco;
		}
		
	}


	
	


?>