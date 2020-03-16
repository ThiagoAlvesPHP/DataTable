<?php 
if(empty($_GET['id'])){
	header('Location: index.php');
}
$config = array();
$config['dbname'] = 'data_table';
$config['host'] = 'localhost';
$config['dbuser'] = 'root';
$config['dbpass'] = '';
$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);

$id = addslashes($_GET['id']);
$sql = 'SELECT * FROM cad_atleta WHERE id = '.$id.'';
$sql = $db->query($sql);
$sql = $sql->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="star.png" rel="icon">
	<link rel="stylesheet" type="text/css" href="dataTable.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="jquery.min.js"></script>
</head>
<body>
	<br>
	<div class="container">
		<a href="index.php">Home</a>
		<hr>
		<label>Nome:</label>
		<input type="text" name="nome" class="form-control" value="<?=$sql['nome']; ?>" readonly="">
		<label>Data de Nascimento:</label>
		<input type="date" name="data" class="form-control" value="<?=$sql['nascimento']; ?>" readonly="">
		<label>E-mail:</label>
		<input type="email" name="email" class="form-control" value="<?=$sql['email']; ?>" readonly="">
	</div>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>