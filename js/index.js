$(document).ready(function(){
	$('.modal').modal();
	$('#listButton').click(function(){
		var estudiantes = [];
		var selecteds = $("input:checked");
		for(var i = 0; i < selecteds.length; i++){
			estudiantes.push(selecteds[i].name);
		};
		var tema = $('#tema').val();
		var fecha = $('#fecha').val();
		var inicio = $('#horaInicio').val();
		var final = $('#horaFinal').val();
		var idcurso = $('#id_curso').val();
		$.post("../controller/lista.php",
        {
			idcurso,
			estudiantes,
			tema,
			fecha,
			inicio,
			final
        },
        function(data, status){
			if(data==0){
				M.toast({html: 'hubo un error!'});

			}else if(data==1) {
				M.toast({html: 'se ha subido con exito'});
				location.reload(true);
			}
		});
	});

	$('select').on('change', function (e) {
		var valueSelected = this.value;
		$.ajax({
		    data: {"value" : valueSelected},
		    type: "POST",
		    url: "./../controller/listarCursos.php",
		}).done(function(data, textStatus, jqXHR ) {
			$('.estudiantesLista').html(data);
		});
	});


	$(document).on('submit','.passwordForm',function(e){
		e.preventDefault();
		$('#modal1').modal('close');
		$.ajax({
			data: {"newPassword" : $('#new_password').val()},
			type: "POST",
			url: "./../controller/changePassword.php",
		}).done(function(data, textStatus, jqXHR ) {
			console.log(data)
			//$('.estudiantesLista').html(data);
		});
	})

})
