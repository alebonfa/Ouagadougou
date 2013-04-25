<?php
    require_once 'config/conexao.class.php';
	require_once 'config/crud.class.php';
	
	$con = new conexao();
	$con->connect();
	@$getId = $_GET['id'];
	if(@$getId) {
		$consulta = mysql_query("SELECT * FROM animal_categoria WHERE ID = + $getId");
		$campo = mysql_fetch_array($consulta);
	}
	
	if(isset($_POST['cadastrar'])) {
		$nome = $_POST['nome'];
		$crud = new crud('animal_categoria');
		$crud->inserir("nome", "'$nome'");
		header("Location: index.php");
	}
	
	if(isset($_POST['editar'])) {
		$nome = $_POST['nome'];
		$crud = new crud('animal_categoria');
		$crud->atualizar("nome='$nome'", "id='$getId'");
		header("Location: index.php");
	}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<form action="" method="post">
			<label>Nome</label>
			<input type="text" name="nome" value="<?php echo @$campo['nome']; ?>" />
			<br />
			<?php if(@!$campo['id']) { ?>
				<input type="submit" name="cadastrar" value="Cadastrar" />
			<?php } else { ?>
				<input type="submit" name="editar" value="Editar" />
			<?php } ?>
		</form>
	</body>
</html>