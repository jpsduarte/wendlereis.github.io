<!DOCTYPE html>
<html>
    <head>
        <title>Loja - Virtual</title>
        <!-- Incluindo o CSS do Bootstrap -->
		<meta charset="utf-8">
        <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
         <link href="css/estilo.css" rel="stylesheet">
    </head>
    <body>
        <header>
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  </button>
                  <a class="navbar-brand" href="inicio.php">Loja Virtual</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                    <li><a href="faleconosco.php">Fale Conosco</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                    <form class="navbar-form navbar-right" method="post" action="inicio.php">
                    <div class="form-group">
                      <input name="inputEmail" type="email" class="form-control" placeholder="E-mail">
                      <input name="inputPass" type="password" class="form-control" placeholder="Senha">
                    </div>
                    <button type="submit" value="Enviar" class="btn btn-danger">Entrar</button>
                  </form>
                  </ul>
                </div><!-- /.navbar-collapse -->
               </div><!-- /.container-fluid -->
            </nav>
        </header>
		<section class="jumbotron">
			<div class="container">
				<h1>Loja Virtual</h1>
				<p>
					Nosso site é um exemplo de uma simples loja virtual, foi requisitado como projeto extra
					valendo 1 ponto na prova semestral da disciplina de Games e Soluções para Web.
				</p>
				<p>
					<a class="btn btn-danger btn-lg" href="sobre.php" role="button">Saiba Mais »</a>
				</p>
			</div>
		</section>
		<article class="col-md-4">
			<h2>Precisa de Pontos na PS ?</h2>
			<p>
				Construa um site com exemplos simples de conexão com o banco de dados.
			</p>
		</article>
		<article class="col-md-4">
			<h2>Bootstrap, CSS Fácil</h2>
			<p>
				Essa ferramenta torna mais simples o uso da responsividade e fornece alguns padrões de estilo para controles HTML.
			</p>
			<a class="btn btn-danger btn-lg" href="http://getbootstrap.com/" role="button" target="blank">Visite o site »</a>
		</article>
		<article class="col-md-4">
			<h2>É funcionário ?</h2>
			<p>
				Faça o login e gerencie os produtos da Loja Virtual.
			</p>
		</article>
		
		<?php
			if($_POST){
				$email = $_POST['inputEmail'];				
				$senha = $_POST['inputPass'];
				
				//Conexao
				$strCon = mysqli_connect('localhost','root', '') or die ("A conexão não foi executada com sucesso");
				
				mysqli_select_db($strCon, 'loja');
				
				//Cosulta
				$strSql = "Select * From funcionarios where email = '$email' and senha = '$senha'";
				
				$resultado = mysqli_query($strCon, $strSql);
						 
				if($resultado->num_rows > 0) {		
					header('location:/lojavirtual/lista.php'); 
				}
				else{
					echo"<script language='javascript' type='text/javascript'>window.location.href='/lojavirtual/inicio.php'; alert('Login e/ou senha incorretos');</script>";
				}
			}
		?>
    </body>
</html>