function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
$(document).ready(function() {
    setInterval( function() {
        var hours = new Date().getHours();
        $(".hours").html(( hours < 10 ? "0" : "" ) + hours);
    }, 1000);
    setInterval( function() {
        var minutes = new Date().getMinutes();
        $(".min").html(( minutes < 10 ? "0" : "" ) + minutes);
    },1000);
    setInterval( function() {
        var seconds = new Date().getSeconds();
        $(".sec").html(( seconds < 10 ? "0" : "" ) + seconds);
    },1000);




});

/*Elimina as mensagens de Sucesso passado X segundos*/
async function demo() {
    console.log('Taking a break...');
    await sleep(3000);
    $('#alertSucess').remove();
}
demo()

/*Ativa a tooltip do bootstrap*/
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })