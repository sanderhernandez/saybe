

//variables globales
var NomProyecto;
var fechaInicio;
var FechaFinal;
var FechaRegistro;
var ProyectoAbrev;
var Ubicacion;

function activarTabla(){
	tabla_proyectos = $('#tablaMuestras').DataTable({
			        "scrollY":        "250px",
			        "scrollCollapse": true,
			        "paging":         false
			    });

} 

function activarProyecto(){ 
	$('btnEstado').addClass("btn-success");
	$('btnEstado').removeClass("btn-warning"); 
}

function desactivarProyecto(){
	$('btnEstado').addClass("btn-warning"); 
	$('btnEstado').removeClass("btn-success");
}


function saveEdit(){
	updateProject();
}

function updateProject()
{
	var parametros = "codProyecto="+$('#txtCodProyecto').val()+"&"
					+"NomProyecto="+$('#txtNomProyecto').val()+"&"
					+"fechaInicio="+$('#txtfechaInicio').val()+"&"
					+"FechaFinal="+$('#txtFechaFinal').val()+"&"
					+"FechaRegistro="+$('#txtFechaRegistro').val()+"&"
					+"ProyectoAbrev="+$('#txtProyectoAbrev').val()+"&"
					+"Ubicacion="+$('#txtUbicacion').val()+"&"
					+"activo=0";
	$.ajax({
		url: "../controles-php/updateProject.php",
        data: parametros,
        method:"POST",
        success:function(respuesta){
        	alert(respuesta);
        	bloquearCampos();
        },
        error:function(){
        	alert(respuesta);
        }
	});
}

function cancelEdit(){
	bloquearCampos();
	$('#txtNomProyecto').val(NomProyecto);
	$('#txtfechaInicio').val(fechaInicio);
	$('#txtFechaFinal').val(FechaFinal);
	$('#txtFechaRegistro').val(FechaRegistro);
	$('#txtProyectoAbrev').val(ProyectoAbrev);
	$('#txtUbicacion').val(Ubicacion);

}

function activarDatePicker(){ 
	$('#txtFechaFinal').datepicker({ dateFormat: 'yy-mm-dd' });
	$( "#txtFechaRegistro" ).datepicker({ dateFormat: 'yy-mm-dd' });
	$( "#txtfechaInicio" ).datepicker({ dateFormat: 'yy-mm-dd' });
}

function editarProyecto(){
 	NomProyecto = $('#txtNomProyecto').val();
 	fechaInicio = $('#txtfechaInicio').val();
 	FechaFinal = $('#txtFechaFinal').val();
 	FechaRegistro = $('#txtFechaRegistro').val();
 	ProyectoAbrev = $('#txtProyectoAbrev').val();
 	Ubicacion = $('#txtUbicacion').val();	
 	limpiarCampos();
}


function limpiarCampos(){
	$('#txtNomProyecto').attr("readonly", false );
	$('#txtfechaInicio').attr("readonly", false );
	$('#txtFechaFinal').attr("readonly", false );
	$('#txtFechaRegistro').attr("readonly", false ); 
	$('#txtProyectoAbrev').attr("readonly", false );
	$('#txtUbicacion').attr("readonly", false );
	$('#editGroup').removeClass("hidden");
	activarDatePicker();
}

function bloquearCampos(){
	$('#txtNomProyecto').attr("readonly", true );
	$('#txtfechaInicio').attr("readonly", true );
	$('#txtFechaFinal').attr("readonly", true );
	$('#txtFechaRegistro').attr("readonly", true );
	$('#txtProyectoAbrev').attr("readonly", true );
	$('#txtUbicacion').attr("readonly", true );
	$('#editGroup').addClass("hidden");
}

function volver(){
	window.location.assign("http://localhost/saybe/lab/");

}


////************ funciones de index *****************//////

function activarTablaProyectos(){
	tabla_proyectos = $('#tablaProyectos').DataTable({
					"scrollY":        "250px",
			        "scrollCollapse": true,
			        "paging":         false
		});

    $('#tablaProyectos tbody').on( 'click', 'tr', function () {
    if ( $(this).hasClass('selected') ) {
        $(this).removeClass('selected');
    }
    else {
        tabla_proyectos.$('tr.selected').removeClass('selected');
        $(this).addClass('selected');
    }
	}); 

	$('#tablaProyectos tbody').on( 'click', 'td', function () { 
       valor = tabla_proyectos.cell( this ).data(); 
        if( valor.length <6 ) {  
       		$('#txtCodProyecto').val(valor);
		}
	});	

} 

function codProyectoVacio(){ 
	if ($('#txtCodProyecto').val() == '') {
		alert('Necesita indicar el código del proyecto');
		return true;
	}else 
		return false;
}

function txtOrdenvacio(){
	if ($('#txtOrden').val() == '') {
		alert('Necesita indicar el numero de orden de trabajo');
		return true;
	}else  
		return false;
}

function descargaR1(){
	if( codProyectoVacio()==false && txtOrdenvacio()==false){
		var url1 = "reporteControlMuestraConcreto.php?codProyecto="+$('#txtCodProyecto').val()+"&ordenTrabajo="+$('#txtOrden').val(); 
		window.location.href = url1;
	}			
}

function descargaR2(){
	if( codProyectoVacio()==false  ){
		var url1 = "reporteRupturaDeVigas.php?codProyecto="+$('#txtCodProyecto').val(); 
		window.location.href = url1;
	}			
}

function descargaR3(){
	if( codProyectoVacio()==false  ){
		var url1 = "reporteRupturaCilindros.php?codProyecto="+$('#txtCodProyecto').val(); 
		window.location.href = url1;
	}			
}

function editar(){
	alert('modificar proyecto')
}


function descargar(){ 
	var opcion = $('select[name=tiposReporte]').val(); 
	switch(opcion){
		case '1':
			alert(opcion);
			descargaR1();
			break;
		case '2': 
			descargaR2();
			break;
		case '3':
			descargaR3();
			break;
	} 
}

function verDetalles(){
	if ($('#txtCodProyecto').val()!= '') {
		window.location.assign("http://localhost/saybe/lab/proyecto.php?codProyecto="+$('#txtCodProyecto').val());
	}else
		alert("Seleccione un proyecto porfavor");
}

function addProject(codigo, nombre, local){
	tabla_proyectos.row.add( [ codigo,
							nombre, 
							local, "detalles"] ).draw( false );
}

function saveNewProject()
{
	var parametros = "cliente="+$('#txtmCliente').val()+"&"
					+"NomProyecto="+$('#txtmNombreProyecto').val()+"&"
					+"codProyecto="+$('#txtmCodProyecto').val()+"&"
					+"fechaInicio="+$('#txtmFechaInicio').val()+"&"
					+"FechaFinal="+$('#txtmFechaFinal').val()+"&" 
					+"ProyectoAbrev="+$('#txtmNombreAbrev').val()+"&"
					+"Ubicacion="+$('#txtmUbicacion').val()+"&"
					+"activo=1";
	$.ajax({
		url: "../controles-php/saveNewProject.php",
        data: parametros,
        method:"POST",
        success:function(respuesta){
        	alert(respuesta); 
        	
        },
        error:function(){
        	alert(respuesta);
        }
	}); 
	window.location.assign("http://localhost/saybe/lab/");
	
}