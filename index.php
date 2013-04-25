<?php
    require_once 'config/conexao.class.php';
	require_once 'config/crud.class.php';
	
	$con = new conexao();
	$con->connect();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<tile></tile>
	</head>
	<body>
		<?php
			if($con->connect() == true) {
				echo 'Conectou';
			} else {
				echo 'Não Conectou';
			}
		?>
		<a href="formulario.php">Novo</a>
		<table style="border: 1px solid red;">
			<thread>
				<tr>
					<th>
						Nome
					</th>
				</tr>
			</thread>
			<tbody>
				<?php
					$consulta = mysql_query("SELECT * FROM animal_categoria");
					while($campo = mysql_fetch_array($consulta)) {
				?>
				<tr>
					<td>
						<?php echo $campo['nome'] ?>;
					</td>
					<td>
						<a href="formulario.php?id=<?php echo $campo['id']; ?>">Editar</a>
					</td>
					<td>
						<a href="excluir.php?id=<?php echo $campo['id']; ?>">Excluir</a>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</body>
</html>