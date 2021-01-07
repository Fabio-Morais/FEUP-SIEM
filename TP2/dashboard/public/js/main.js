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

    /*select button*/
    if($('#outer').length>0 && $('.aulaClass').length>0){
        $(".all").hide();
        $('#outer').change(function () {
            $(".all").hide();
            $('.' + $(this).val()).show();
        })
    }



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

function fileName(){
    var fullPath = document.getElementById('exampleInputFile').value;
    if (fullPath) {
        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
        var filename = fullPath.substring(startIndex);
        if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
            filename = filename.substring(1);
        }
        var fileLabel= document.getElementById('fileLabel');
        fileLabel.innerHTML=filename;
    }
}
function initColorProfile(){
    $('#pr1').bind("mouseenter focus ",
        function(event) { document.getElementById("colorPick").style.display = "block";document.getElementById("colorPickButton").style.display = "block"; });
    $('#pr1').bind("focusout  mouseleave",
        function(event) { document.getElementById("colorPick").style.display = "none";document.getElementById("colorPickButton").style.display = "none"; });
    // triggers 'onInput' and 'onChange' on all color pickers when they are ready
    jscolor.trigger('input change');
}
function updateColor(picker, selector) {
    document.querySelector(selector).style.background = picker.toBackground()
    setContrast(picker)
}

function autoTextColor(){
    const rgb = [255, 0, 0];
    for(i=0; i<$(".widget-user-header").length; i++){
        aux = $(".widget-user-header")[i].style['backgroundColor'].replace(/[^\d,]/g, '').split(',');
        rgb[0] = Math.round(aux[0]);
        rgb[1] = Math.round(aux[1]);
        rgb[2] = Math.round(aux[2]);
        // http://www.w3.org/TR/AERT#color-contrast
        const brightness = Math.round(((parseInt(rgb[0]) * 299) +
            (parseInt(rgb[1]) * 587) +
            (parseInt(rgb[2]) * 114)) / 1000);
        const textColour = (brightness > 200) ? 'black' : 'white';
        $('.textAdapt').eq(i).css({'color': textColour});
    }
}