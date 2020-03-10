<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link href="star.png" rel="icon">
	<link rel="stylesheet" type="text/css" href="dataTable.css">
	<script src="jquery.min.js"></script>	
	<script type="text/javascript" src="datatable.min.js"></script>

	<script type="text/javascript">
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

<table id="example" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>Usuário</th>
            <th>Data de Nacimento</th>
            <th>E-mail</th>
        </tr>
    </thead>
</table>

</body>
</html>