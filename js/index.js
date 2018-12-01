$(document).ready(function(){
	$('.modal').modal();

    $(document).on('click','.done',function(){
        $(this).css({'color':'green'});
        $(this).siblings().css({'color':'gray'});
    })

    $(document).on('click','.clear',function(){
        $(this).css({'color':'red'});
        $(this).siblings().css({'color':'gray'});
    })


    $(document).on('click','.listButton',function(){
        // Logica del boton de listar
    })

	$('select').on('change', function (e) {
	    var optionSelected = $("option:selected", this);
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
