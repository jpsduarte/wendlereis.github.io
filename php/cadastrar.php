<?php	
	function selecionaFuncao($name)
	{
		$params = func_get_args();

		foreach ($params as $name) {
			if (isset($_POST[$name])) {
				return $name;
			}
		}
	}
	
	switch (selecionaFuncao('inserir', 'limpar', 'cancelar', 'sair')) {
		case 'inserir':
			inserir();
			break;

		case 'limpar':
			//header('location:/lojavirtual/cadastrar.html');
			break;

		case 'cancelar':
			//header('location:/lojavirtual/cadastrar.html');
			break;
			
		case 'sair':
			header('location:/lojavirtual/inicio.html');
			break;

		default:
			//header('location:/lojavirtual/cadastrar.html');
	}
	
	function inserir(){
			$nome = $_POST['inputNome'];
			$categoria = $_POST['inputCate'];
			$preco = $_POST['inputPreco'];
						
			//Conec Database
			$strCon = mysqli_connect('localhost','root', '', 'loja') or die ("A conexão não foi executada com sucesso");

			//Inserir
			$strSql = "Insert Into produtos(nome_produto, categoria, preco) values('$nome', '$categoria', $preco)";
			
			//executar
			$resultado = mysqli_query($strCon,$strSql);
			
			header('location:/lojavirtual/cadastrar.html');
	}
?>


	