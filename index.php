<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="star.png" rel="icon">
	<link rel="stylesheet" type="text/css" href="dataTable.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<script src="jquery.min.js"></script>	
	<script type="text/javascript" src="datatable.min.js"></script>

	<script type="text/javascript">
		$(function (){
			$(document).on('click', '.confirm', function(){
				let v = confirm("Tem certeza que deseja excluir?");
				if (v == true) {
					window.location.href = $(this).val();
				}
			})
			
		});
		$(document).ready(function (){
		    $('#example').DataTable({
		        "processing": true,
		        "serverSide": true,
		        "ajax": {
		            "url": "ajax.php",
		            "type": "POST"
		        }
		    });
		});
	</script>

</head>
<body>
<br>

<div class="container">
	<table id="example" class="display" style="width:100%">
	    <thead>
	        <tr>
	            <th>ID</th>
	            <th>Usuário</th>
	            <th>Data de Nacimento</th>
	            <th>E-mail</th>
	            <th width="115">Ação</th>
	        </tr>
	    </thead>
	</table>
</div>


<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>