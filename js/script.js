$(function (){
    //AJAX EM PROCESSO02 SEGURADORA
	$(document).on('click', '.value', function(e){
        e.preventDefault();

		var value = $(this).val();

		$.ajax({
            type: 'POST',
            url: 'ajax.php',
            data:{ value:value },
            success:function(data){
                let d = data.replace('"', '');
                let dd = d.replace('"','');

                if (dd == "pt") {
                    $('.alert').html('Português');
                    $('#home').html('Inicio');
                    $('#service').html('Serviço');
                    $('#contact').html('Contato');
                } else {
                    $('.alert').html('Inglês');
                    $('#home').html('Home');
                    $('#service').html('Service');
                    $('#contact').html('Contact');
                }
            }
        });
	});

});