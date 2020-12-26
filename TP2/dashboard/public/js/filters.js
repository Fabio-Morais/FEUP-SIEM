/**
 * Filters implementation
 * Features: search by name, search by price range
 * */

var min=0;
var max=300;
var input="";
var category="";
function priceRange(min, max, price) {
    return min <= price && price <= max;
}
function uploadNumberCourses(number) {
    var string = number + " Cursos encontrados"
    if (number == 1)
        string = number + " Curso encontrado"
    $("#numberCourses")[0].innerHTML = string
}

jQuery.expr[':'].Contains = function (a, i, m) {
    price = jQuery(a).find(".price")[0].innerHTML.split("€")[0]
    input = m[3].toUpperCase();
    if(category != "")
        return jQuery(a).find(".fix-height a").text().toUpperCase().indexOf(input) >= 0 && priceRange(min, max, parseInt(price)) && jQuery(a)[0].closest('.'+category) != null;
    else
        return jQuery(a).find(".fix-height a").text().toUpperCase().indexOf(input) >= 0 && priceRange(min, max, parseInt(price)) ;
};
jQuery.expr[':'].priceMin = function (a, i, m) {
    var price = jQuery(a).find(".price")[0].innerHTML.split("€")[0]
    min = parseInt(m[3]);
    if(category != "")
        return jQuery(a).text().toUpperCase().indexOf(input) >= 0 && priceRange(min, max, parseInt(price)) && jQuery(a)[0].closest('.'+category) != null;
    else
        return jQuery(a).text().toUpperCase().indexOf(input) >= 0 && priceRange(min, max, parseInt(price));

};
jQuery.expr[':'].priceMax = function (a, i, m) {
    var price = jQuery(a).find(".price")[0].innerHTML.split("€")[0]
    max = parseInt(m[3])
    if(category != "")
        return jQuery(a).text().toUpperCase().indexOf(input) >= 0 && priceRange(min, max, parseInt(price)) && jQuery(a)[0].closest('.'+category) != null;
    else
        return jQuery(a).text().toUpperCase().indexOf(input) >= 0 && priceRange(min, max, parseInt(price));};

$(document).on('input', '.search', function (event) {
    var text = $(this).val();
    $('.content').hide();
    var number = $('.content:Contains(' + text + ')').length;
    uploadNumberCourses(number)
    $('.content:Contains(' + text + ')').show();

});
$(document).on('change', '.minPrice', function (event) {
    var text = $(this).val();
    $('.content').hide();
    var number = $('.content:priceMin(' + text + ')').length;
    uploadNumberCourses(number)
    $('.content:priceMin(' + text + ')').show();

});
$(document).on('change', '.maxPrice', function (event) {
    var text = $(this).val();
    $('.content').hide();
    var number = $('.content:priceMax(' + text + ')').length;
    uploadNumberCourses(number)
    $('.content:priceMax(' + text + ')').show();

});



/*
* From API https://jqueryui.com/slider/#range with some changes to our code
* */
$( function() {
    $( "#slider-range" ).slider({
        range: true,
        min: 0,
        max: 50,
        values: [ 0, 50 ],
        slide: function( event, ui ) {
            //$( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            $('input[name=minPrice]').val(ui.values[ 0 ])
            $('input[name=maxPrice]').val(ui.values[ 1 ])
            if(min != ui.values[ 0 ]){
                min=ui.values[ 0 ]
                $("input[name=minPrice]").change()
            }
            if(max != ui.values[ 1 ]){
                max=ui.values[ 1 ]
                $("input[name=maxPrice]").change()
            }

        }
    });

} );

/*change color and weigth of the font when the user clicks*/
function categoryFunction(event){
    $('.menuCategory').removeClass("text-primary font-weight-bold")
    $(event).addClass("text-primary font-weight-bold")
    $(".content").hide()
    $('.'+$(event).data('value')).show();
    uploadNumberCourses($('.'+$(event).data('value')).length)
    category=$(event).data('value')
}

