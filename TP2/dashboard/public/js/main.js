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
    console.log("a entrar")
    for(i=0; i<$(".widget-user-header").length; i++){
        aux = $(".widget-user-header")[i].style['backgroundColor'].replace(/[^\d,]/g, '').split(',');
        console.log(aux)

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

function autoTextColorProfile(){
    const rgb = [255, 0, 0];
    console.log("a entrar2")
    for(i=0; i<$("#modalColor").length; i++){
        aux = $("#modalColor")[i].style['backgroundColor'].replace(/[^\d,]/g, '').split(',');
        console.log(aux)

        rgb[0] = Math.round(aux[0]);
        rgb[1] = Math.round(aux[1]);
        rgb[2] = Math.round(aux[2]);
        // http://www.w3.org/TR/AERT#color-contrast
        const brightness = Math.round(((parseInt(rgb[0]) * 299) +
            (parseInt(rgb[1]) * 587) +
            (parseInt(rgb[2]) * 114)) / 1000);
        const textColour = (brightness > 200) ? 'black' : 'white';
        $('.textAdapt2').eq(0).css({'color': textColour});
        $('.textAdapt2').eq(1).css({'color': textColour});

    }
}

function updateModalStudent(response){
    user = response[0]
    numCourses = response[1]['count']
    grade = response[2]['avg']
    courses = response[3]
    console.log(user['name'])
    /*BACK COLOR*/
    if(user['color']!=null){
        $("#modalColor").css("background-color",user['color'])
    }else{
        $("#modalColor").css("background-color","#8585d3")
    }
    /*IMAGE*/
    if(user['image'] != null){
        $(".user-box > img").attr('src',"public/img/users/"+user['image'])
    }else{
        if(user['gender']=='m')
            $(".user-box > img").attr('src',"public/img/avatar.png")
        else
            $(".user-box > img").attr('src',"public/img/avatarGirl.png")
    }
    /*NAME*/
    if(user['name'] != null){
        $("#name")[0].innerHTML = user['name']
    }else{
        $("#name")[0].innerHTML = ""
    }
    /*PHONE*/
    if(user['phone'] != null){
        $(".modalPhone")[0].innerHTML = user['phone']
        $(".modalPhone")[1].innerHTML = user['phone']
    }else{
        $(".modalPhone")[0].innerHTML = ""
        $(".modalPhone")[1].innerHTML = ""
    }
    /*EMAIL*/
    if(user['email'] != null){
        $(".modalEmail")[0].innerHTML = user['email']
        $(".modalEmail")[1].innerHTML = user['email']
    }else{
        $(".modalEmail")[0].innerHTML = ""
        $(".modalEmail")[1].innerHTML = ""
    }
    /*COUNT COURSES*/
    if(numCourses != 0){
        $("#countCourse")[0].innerHTML = numCourses
    }else{
        $("#countCourse")[0].innerHTML = "--"
    }
    /*GRADE*/
    if(grade != 0 && grade != null){
        $("#grade")[0].innerHTML = grade
    }else{
        $("#grade")[0].innerHTML = "--"
    }
    /*USERNAME*/
    if(user['username'] != null){
        $("#modalUser")[0].innerHTML = user['username']
    }else{
        $("#modalUser")[0].innerHTML = ""
    }
    /*ABOUT*/
    if(user['about'] != null){
        $("#modalAbout")[0].innerHTML = user['about']
    }else{
        $("#modalAbout")[0].innerHTML = "Não existe descrição adicionada."
    }
    /*HOBBIES*/
    if(user['hobbies'] != null){
        $("#modalHobbies")[0].innerHTML = user['hobbies']
    }else{
        $("#modalHobbies")[0].innerHTML = "Não existe atividades adicionadas."
    }
    /*BIRTH DATE*/
    if(user['birthdate'] != null){
        $("#modalDate")[0].innerHTML = user['birthdate']
    }else{
        $("#modalDate")[0].innerHTML = ""
    }
    /*BADGE COURSES*/
    $(".badge-dark").remove()//delete all badge
    for(i=0; i< courses.length; i++){
        if((courses[i]['coursegrade'])>-1){
            string = "<a class=\"badge badge-dark text-uppercase m-1 p-2\">"+courses[i]['coursename']+"<br><p class=\"mt-2 mb-0\"><b>"+(courses[i]['coursegrade'])+"</b></p></a>"
        }else{
            string = "<a class=\"badge badge-dark text-uppercase m-1 p-2\">"+courses[i]['coursename']+"</a>"

        }
        console.log(string)
        $(string).insertAfter("#modalCoursesBadge")
    }
    autoTextColorProfile()

}
