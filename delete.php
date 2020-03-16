<?php
if(empty($_GET['id'])){
	header('Location: index.php');
}
require 'config.php';

$id = addslashes($_GET['id']);
$sql = 'SELECT * FROM cad_atleta WHERE id = '.$id.'';
$sql = $db->query($sql);

if ($sql->rowCount() > 0) {
	$sql = 'DELETE FROM cad_atleta WHERE id = '.$id.'';
	$sql = $db->query($sql);
}

header('Location: index.php');
exit;