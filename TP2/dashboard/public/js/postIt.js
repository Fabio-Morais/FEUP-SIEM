$(document).ready(function() {

    $.PostItAll.changeConfig('global', {
        randomColor : false,
        addArrow : 'all',

    });
    $.PostItAll.changeConfig('note', {
        width : 160,
        height : 100,
        style : {
            backgroundcolor : '#fffa3c',
            textcolor       : '#333333',
            tresd           : true,
            fontfamily      : 'verdana',
            fontsize        : 'small',
            textshadow      : false,
            arrow           : 'none',
        },
        features : {
            randomColor     : false,
        },
    });
    var timer=0;
    setTimeout(function() { $('.idAddDemoPostit').postitall({
        onChange: function(id) {
            console.log("onChange");
            clearTimeout(timer); //cancel the previous timer.
            timer = null;
            timer =setTimeout(function() { createCookiePostIt();}, 1500);
        }

    }); }, 1000);




});

function createCookiePostIt(){
    console.log("entrou")
}