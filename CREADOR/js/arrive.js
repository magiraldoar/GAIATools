$(document).ready(function(){
	$("#pregAbierta").show();
	$("#pregCerrada").hide();
	$("#abierta").focus();
	$("#abierta").click(function(){
		$("#abierta").focus();
	//	$("#cerrada").css("background","blue");
		$("#pregAbierta").show();
		$("#pregCerrada").hide();
	});
	$("#cerrada").click(function(){
		$("#cerrada").focus();
	//	$("#abierta").css("background","blue");
		$("#pregAbierta").hide();
		$("#pregCerrada").show();
	});

});