/**
 * Main functions that are common in different pages
 * */

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
/*Clock*/
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

/*Delete all message after X seconds*/
async function demo() {
    await sleep(3000);
    $('#alertSucess').remove();
}
demo()

/*Tooltip activation */
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })

/*Update the text color depending on background color*/
function setContrast(picker) {
    const rgb = [255, 0, 0];
    rgb[0] = Math.round(picker.channel('R'));
    rgb[1] = Math.round(picker.channel('G'));
    rgb[2] = Math.round(picker.channel('B'));
    // http://www.w3.org/TR/AERT#color-contrast
    const brightness = Math.round(((parseInt(rgb[0]) * 299) +
        (parseInt(rgb[1]) * 587) +
        (parseInt(rgb[2]) * 114)) / 1000);
    const textColour = (brightness > 200) ? 'black' : 'white';
    $('.textAdapt').css('color', textColour);

}

