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
/*****************************
alta curso
*****************************/

if ($('#carreras').val()=='') {
	$('.zonaValidacion').css('display', 'block');
	$('.valiCiclo').css('display', 'block');
};
if ($('#nombreCurso').val()=='') {
	$('.zonaValidacion').css('display', 'block');
	$('.valiCiclo').css('display', 'block');
};
if ($('#seccion').val()=='') {
	$('.zonaValidacion').css('display', 'block');
	$('.valiCiclo').css('display', 'block');
};
if ($('#nrc').val()=='') {
	$('.zonaValidacion').css('display', 'block');
	$('.valiCiclo').css('display', 'block');
};
if ($('#academia').val()=='') {
	$('.zonaValidacion').css('display', 'block');
	$('.valiCiclo').css('display', 'block');
};
if ($('#lunes').val()=='') {
	$('.zonaValidacion').css('display', 'block');
	$('.valiCiclo').css('display', 'block');
};
if ($('#martes').val()=='') {
	$('.zonaValidacion').css('display', 'block');
	$('#martes')
};
if ($('#miercoles').val()=='') {
	$('#miercoles')
};
if ($('#jueves').val()=='') {
	$('#jueves')
};
if ($('#viernes').val()=='') {
	$('#viernes')
};
if ($('#horas').val()=='') {
	$('#horas')
};
if ($('#horario').val()=='') {
	$('#horario')
};



}
