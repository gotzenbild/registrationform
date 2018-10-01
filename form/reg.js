$(document).ready(function(){
	$("#butforreg").click(function(){
	$("#etxt").load("reg.php","logr="+$("#logr").val()+"&passr="+$("#passr").val()+"&passrc="+$("#passrc").val()+"&namer="+$("#namer").val()+"&surr="+$("#surr").val()+"&mailr="+$("#mailr").val() )
    $("#error").show()

    })
    });    
