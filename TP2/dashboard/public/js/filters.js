jQuery.expr[':'].Contains = function(a,i,m){
    return jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase())>=0;
};
$(document).on('input', '.search',function(event) {
    var text = $(this).val();
    $('.content').hide();
    $('.content:Contains(' + text+ ')').show();

});

var min;
var max;
jQuery.expr[':'].priceMin = function(a,i,m){
    var price = jQuery(a).find(".price")[0].innerHTML.split("€")[0]
    min=parseInt(m[3]);
    return min <= parseInt(price) &&  parseInt(price) <= max;
};
jQuery.expr[':'].priceMax = function(a,i,m){//M É O QUE O USER METE
    var price = jQuery(a).find(".price")[0].innerHTML.split("€")[0]
    max=parseInt(m[3])
    return min <= parseInt(price) &&  parseInt(price) <= max;
};

$(document).on('change', '.minPrice',function(event) {
    var text = $(this).val();
    $('.content').hide();
    $('.content:priceMin(' + text+ ')').show();

});
$(document).on('change', '.maxPrice',function(event) {
    var text = $(this).val();
    $('.content').hide();
    $('.content:priceMax(' + text+ ')').show();

});