$(document).ready(function() {
    var json_str = getCookie('postIt');
    var arr=[]
    if(json_str)
        arr = JSON.parse(json_str);

    $.PostItAll.changeConfig('global', {
        randomColor : false,
        addArrow : 'all',

    });

    $.PostItAll.changeConfig('note', {
        width : 160,
        height : 70,
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
        content : arr[0],
        onChange: function(id) {
            clearTimeout(timer); //cancel the previous timer.
            timer = null;
            timer =setTimeout(function() { createCookiePostIt(id)}, 1500);
        }

    }); }, 1000);




});

function createCookiePostIt(id){
    var arr=[];
    arr.push($(id)[0].innerText)
    var result = JSON.stringify(arr)
    createCookie('postIt', result, 1, 'day')
}