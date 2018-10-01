$(document).ready(function(){
	$("#butforlog").click(function(){
	$("#etxt").load("log.php","log="+$("#log").val()+"&pass="+$("#pass").val())
	$("#error").show()	
	})
	});
