function validacion(){
	/*****************************
	alta usuario
	*****************************/
		if($('#nombre').val()=='')
			alert("hola")
		if($('#apellidop').val()=='')
			alert('nombre')
		if($('#apellidom').val()=='')
			alert("hola")
		if($('#carreras').val()=='')
			alert("hola")
		if($('#email').val()=='')
			alert("hola")
		if($('#celular').val()=='')
			alert("hola")
		if($('#github').val()=='')
			alert("hola")
		if($('#web').val()=='')
			alert("hola")
	
}

function ciclos(){
	$('#ciclo').click(function() {
			$( "#ciclo option" ).remove( ":contains('Selecciona')" );
	});

	$('#academia').click(function() {
			$( "#academia option" ).remove( ":contains('Selecciona')" );
	});
	contadorDias = 0;
	$('#agregaDia').click(function() {
		contadorDias++;
		$('#numeroDiasFestivos').val(contadorDias);
		$('#zonaDiasFestivos').append('<section><input type="date" Required name="diaf'+contadorDias+'" class="diaf"></section>');
	});	
}

function validaAltaCurso(){
	/*****************************
	alta curso
	*****************************/
	$('.zonaValidacion').css('display', 'none');
	$('.valiCiclo').css('display', 'none');
	$('.valiCurso').css('display', 'none');
	$('.valiSeccion').css('display', 'none');
	$('.valiNrc').css('display', 'none');
	$('.valiAcademia').css('display', 'none');
	$('.valiHoras').css('display', 'none');
	$('.valiHorario').css('display', 'none');
	eval=0;

	if ($('#ciclo').val()=='Selecciona el Ciclo') {
		$('.zonaValidacion').css('display', 'block');
		$('.valiCiclo').css('display', 'block');
		eval++;
	} 

	if ($('#nombreCurso').val()=='') {
		$('.zonaValidacion').css('display', 'block');
		$('.valiCurso').css('display', 'block');
		eval++;
	};
	if ($('#seccion').val()=='') {
		$('.zonaValidacion').css('display', 'block');
		$('.valiSeccion').css('display', 'block');
		eval++;
	};
	if ($('#nrc').val()=='') {
		$('.zonaValidacion').css('display', 'block');
		$('.valiNrc').css('display', 'block');
		eval++;
	};
	if ($('#academia').val()=='Selecciona la academia correspondiente') {
		$('.zonaValidacion').css('display', 'block');
		$('.valiAcademia').css('display', 'block');
		eval++;
	};
	if ($('#horas').val()=='') {
		$('.zonaValidacion').css('display', 'block');
		$('.valiHoras').css('display', 'block');
		eval++;
	};
	if ($('#horario').val()=='') {
		$('.zonaValidacion').css('display', 'block');
		$('.valiHorario').css('display', 'block');
		eval++;
	};

	if(eval==0){
		return true;
	}else return false
}
function validaAltaCiclo(){
	/*****************************
	alta ciclo
	*****************************/
	$('.zonaValidacion').css('display', 'none');
	$('.valiNombre').css('display', 'none');
	$('.valiFeInicio').css('display', 'none');
	$('.valiFeFin').css('display', 'none');
	$('.valiDiaFestivo').css('display', 'none');
	eval=0;

	if ($('#nombre').val()=='') {
		$('.zonaValidacion').css('display', 'block');
		$('.valiNombre').css('display', 'block');
		eval++;
	} 

	if ($('#fechainicio').val()=='') {
		$('.zonaValidacion').css('display', 'block');
		$('.valiFeInicio').css('display', 'block');
		eval++;
	};
	if ($('#fechafin').val()=='') {
		$('.zonaValidacion').css('display', 'block');
		$('.valiFeFin').css('display', 'block');
		eval++;
	};

	for (var i = 1; i <= contadorDias; i++) {
		enT = 'diasf'+i;
		if ($(enT).val()=='') {
			$('.zonaValidacion').css('display', 'block');
			$('.valiDiaFestivo').css('display', 'block');
			eval++;
	};

	};
	

	if(eval==0){
		return true;
	}else return false
}
function asistenciaAlumnos(){
	for (var i = 0; i < 10; i++) {
		$('.asis_G'+i).click(function(event) {
			$('.asis_'+i).click();
		});
	};
}