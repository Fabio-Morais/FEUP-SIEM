$(document).ready(function () {
    if (localStorage.getItem('secc')) {

        var o = JSON.parse(localStorage.getItem('secc'));
        o['onChange'] =
            function (id) {
                clearTimeout(timer); //cancel the previous timer.
                timer = null;
                timer = setTimeout(function () {
                    var string
                    $('.PIApostit').each(function () {
                        string = JSON.stringify($(this).postitall('options'))
                    });
                    localStorage.setItem('secc', string)
                }, 1000);
            }
        o['onSelect'] = function (id) {
            var string
            $('.PIApostit').each(function () {
                string = JSON.stringify($(this).postitall('options'))
            });
            localStorage.setItem('secc', string)
        }
        setTimeout(function () {
            $('.idAddDemoPostit').postitall(o);
        }, 1000);
    } else {

        $.PostItAll.changeConfig('global', {
            randomColor: false,
            addArrow: 'all',
            resizable: true
        });

        $.PostItAll.changeConfig('note', {
            width: 160,
            height: 70,
            style: {
                backgroundcolor: '#fffa3c',
                textcolor: '#333333',
                tresd: true,
                fontfamily: 'verdana',
                fontsize: 'small',
                textshadow: false,
                arrow: 'none',
            },
            features: {
                randomColor: false,
            },
        });

    }

    var timer = 0;
    setTimeout(function () {
        $('.idAddDemoPostit').postitall({
            onChange: function (id) {
                clearTimeout(timer); //cancel the previous timer.
                timer = null;
                timer = setTimeout(function () {
                    var string
                    $('.PIApostit').each(function () {
                        string = JSON.stringify($(this).postitall('options'))
                    });
                    localStorage.setItem('secc', string)
                }, 1000);
            }

        });
    }, 1000);

});
