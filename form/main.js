$(".loginin").click(function(){
    $("#formforreg").hide()
    $("#formforlog").show("slow")
    $('.loginin').css('background','rgb(247, 245, 243)')
    $('.singup').css('background','rgb(212, 212, 212)')
})

$(".singup").click(function(){
    $("#formforlog").hide()
    $("#formforreg").show("slow")
    $('.singup').css('background','rgb(247, 245, 243)')
    $('.loginin').css('background','rgb(212, 212, 212)')
})