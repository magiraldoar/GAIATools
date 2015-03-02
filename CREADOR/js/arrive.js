$(document).ready(function(){
	$("#pregAbierta").show();
	$("#pregCerrada").hide();
	$("#pregvf").hide();
	$("#vf").hide();
	$("#cerradan").hide();
	$("#abierta").focus();
	$("#abierta").click(function(){
		$("#abierta").focus();
	//	$("#cerrada").css("background","blue");
		$("#pregAbierta").show();
		$("#pregCerrada").hide();
		$("#pregvf").hide();
		$("#vf").hide();
		$("#cerradan").hide();
	});
	$("#cerrada").click(function(){
		$("#cerrada").focus();
	//	$("#abierta").css("background","blue");
		$("#pregAbierta").hide();
		$("#pregCerrada").show();
		$("#cerradan").show();
		$("#vf").show();
	});
	$("#cerradan").click(function(){
		$("#cerradan").focus();
	//	$("#abierta").css("background","blue");
		$("#pregAbierta").hide();
		$("#pregCerrada").show();
		$("#pregvf").hide();
		$("#cerradan").show();
		$("#vf").show();
	});
	$("#vf").click(function(){
		$("#vf").focus();
	//	$("#abierta").css("background","blue");
		$("#pregAbierta").hide();
		$("#pregCerrada").hide();
		$("#pregvf").show();
		$("#cerradan").show();
		$("#vf").show();
	});

});