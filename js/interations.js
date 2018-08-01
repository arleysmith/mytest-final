// JavaScript Document
//esconder menu superior
function hide_menu(){
$('#navbar_menu01').removeClass('show');
		  }
//mostrar paginas
function show_all_f(id){
$('.collapse').removeClass('show');
$(id).addClass('show');
		  }
//mostrar modal status
function show_modal_status(msg){
	$('#Modal_status').modal('show');
	document.getElementById('info_status').innerHTML=msg;
}

