<?php
require_once 'config/conexao.class.php';
require_once 'config/crud.class.php';

$con = new conexao();
$con -> connect();
@$getId = $_GET['id'];
if (@$getId) {
	$consulta = mysql_query("SELECT * FROM animal_categoria WHERE ID = + $getId");
	$campo = mysql_fetch_array($consulta);
}

if (isset($_POST['cadastrar'])) {
	$nome = $_POST['nome'];
	$crud = new crud('animal_categoria');
	$crud -> inserir("nome", "'$nome'");
	header("Location: cadastros.php");
}

if (isset($_POST['editar'])) {
	$nome = $_POST['nome'];
	$crud = new crud('animal_categoria');
	$crud -> atualizar("nome='$nome'", "id='$getId'");
	header("Location: cadastros.php");
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>pec.inClouds</title>

		<link rel="stylesheet" href="style.css" type="text/css" media="screen" />

		<script type="text/javascript" src="jquery.js"></script>
		<script type="text/javascript" src="script.js"></script>
		<style type="text/css">
			.art-post .layout-item-0 {
				padding-right: 10px;
			}
			.art-post .layout-item-1 {
				padding-right: 10px;
				padding-left: 10px;
			}
			.art-post .layout-item-2 {
				padding-left: 10px;
			}
			.ie7 .art-post .art-layout-cell {
				border: none !important;
				padding: 0 !important;
			}
			.ie6 .art-post .art-layout-cell {
				border: none !important;
				padding: 0 !important;
			}
		</style>

	</head>
	<body>
		<div id="art-main">
			<div class="cleared reset-box"></div>
			<div class="art-header">
				<div class="art-header-position">
					<div class="art-header-wrapper">
						<div class="cleared reset-box"></div>
						<div class="art-header-inner">
							<div class="art-headerobject"></div>
							<div class="art-logo">
								<h1 class="art-logo-name"><a href="./index.html">Controle seu Gado nas Nuvens</a></h1>
								<h2 class="art-logo-text">pec.inClouds</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cleared reset-box"></div>
			<div class="art-bar art-nav">
				<div class="art-nav-outer">
					<div class="art-nav-wrapper">
						<div class="art-nav-inner">
							<div class="art-nav-center">
								<ul class="art-hmenu">
									<li>
										<a href="./index.html">Mural</a>
									</li>
									<li>
										<a href="./cadastros.html" class="active">Cadastros</a>
									</li>
									<li>
										<a href="./movimentacoes.html">Movimentações</a>
									</li>
									<li>
										<a href="./resultados.html">Resultados</a>
									</li>
									<li>
										<a href="./sobre.html">Sobre</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cleared reset-box"></div>
			<div class="art-box art-sheet">
				<div class="art-box-body art-sheet-body">
					<form action="" method="post">
						<label>Nome</label>
						<input type="text" name="nome" value="<?php echo @$campo['nome']; ?>" />
						<br />
						<?php if(@!$campo['id']) {
						?>
						<input type="submit" name="cadastrar" value="Cadastrar" />
						<?php } else { ?>
						<input type="submit" name="editar" value="Alterar" />
						<?php } ?>

						<table style="border: 1px solid red;">
							<thread>
								<tr>
									<th> Nome </th>
								</tr>
							</thread>
							<tbody>
								<?php
									$consulta = mysql_query("SELECT * FROM animal_categoria");
									while($campo = mysql_fetch_array($consulta)) {
								?>
								<tr>
									<td><?php echo $campo['nome'] ?>;
									</td>
									<td><a href="cadastros.php?id=<?php echo $campo['id']; ?>">Editar</a></td>
									<td><a href="excluir.php?id=<?php echo $campo['id']; ?>">Excluir</a></td>
								</tr>
								<?php
								}
								?>
							</tbody>
						</table>

					</form>
				</div>
			</div>
			<div class="art-footer">
				<div class="art-footer-body">
					<div class="art-footer-center">
						<div class="art-footer-wrapper">
							<div class="art-footer-text">
								<p>
									Copyright © 2013. inClouds Agência Digital. Todos os Direitos Reservados.
								</p>
								<div class="cleared"></div>
								<p class="art-page-footer">
									<a href="http://www.artisteer.com/?p=website_templates" target="_blank">Website Template</a> created with Artisteer.
								</p>
							</div>
						</div>
					</div>
					<div class="cleared"></div>
				</div>
			</div>
			<div class="cleared"></div>
		</div>

	</body>
</html>
