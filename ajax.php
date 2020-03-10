<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_table";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//Receber a requisão da pesquisa 
$requestData = $_REQUEST;

$columns = array(
    array(0 => 'id'),
    array(1 => 'nome'),
    array(2 => 'nascimento'),
    array(3 => 'email')
);

//Obtendo registros de número total sem qualquer pesquisa
$result_user = "SELECT id, nome, nascimento, email FROM cad_atleta";
$resultado_user = mysqli_query($conn, $result_user);
$qnt_linhas = mysqli_num_rows($resultado_user);

//Obter os dados a serem apresentados
$result_usuarios = "SELECT id, nome, nascimento, email FROM cad_atleta WHERE 1=1";


if( !empty($requestData['search']['value']) ) {   
// se houver um parâmetro de pesquisa, $requestData['search']['value'] contém o parâmetro de pesquisa
	$result_usuarios.=" AND (id LIKE '".$requestData['search']['value']."%' ";    
	$result_usuarios.=" OR nome LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR nascimento LIKE '".$requestData['search']['value']."%' ";
	$result_usuarios.=" OR email LIKE '".$requestData['search']['value']."%' )";
}

//var_dump($result_usuarios);
//exit;

$resultado_usuarios = mysqli_query($conn, $result_usuarios);
$totalFiltered = mysqli_num_rows($resultado_usuarios);

//Ordenar o resultado
$result_usuarios .= " ORDER BY ". implode(' AND ', $columns[$requestData['order'][0]['column']])."   ".$requestData['order'][0]['dir']." LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
$resultado_usuarios=mysqli_query($conn, $result_usuarios);	

// Ler e criar o array de dados
$dados = array();
while($row_usuarios =mysqli_fetch_array($resultado_usuarios) ) {  
	$dado = array(); 
	$dado[] = $row_usuarios["id"];
	$dado[] = $row_usuarios["nome"];
	$dado[] = date('d/m/Y', strtotime($row_usuarios["nascimento"]));	
	$dado[] = $row_usuarios["email"];	
	$dados[] = $dado;
}

//Cria o array de informações a serem retornadas para o Javascript
$json_data = array(
	"draw" => intval( $requestData['draw'] ),//para cada requisição é enviado um número como parâmetro
	"recordsTotal" => intval( $qnt_linhas ),  //Quantidade de registros que há no banco de dados
	"recordsFiltered" => intval( $totalFiltered ), //Total de registros quando houver pesquisa
	"data" => $dados   //Array de dados completo dos dados retornados da tabela 
);

echo json_encode($json_data);  //enviar dados como formato json
?>