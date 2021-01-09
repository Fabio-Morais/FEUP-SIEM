/**
 * ESTATISTICAS.PHP
 * @author- Fábio e Fernando
 * */

/*auxiliar function that returns the right name for the json*/
function namesOfJson(type){
    if(type === 0){
        return ['price','date']
    }else if(type === 1){
        return ['count','productname']
    }else if(type === 2){
        return ['sum','productname']
    }else if(type === 3){
        return ['count','gender']
    }else if(type === 4){
        return ['round','coursename']
    }
}

/*Generate the graph depending on the json and the type of the graph*/
function changeGraphKPI(json, type){
    var data = [];
    var label =[];
    for(i=0; i<json.length; i++){
        data.push(json[i][namesOfJson(type)[0]])
        label.push(json[i][namesOfJson(type)[1]])
    }
    if(data.length === 0){
        data=[0]
        label=[""]
    }
    if(type === 0){
        let chart = new ChartBuild(0, "myAreaChart", data, "Lucro", label);
        chart.labelTextAxis("Data", "Lucro (€)");
        chart.execute();
    }else if(type === 1){
        let chart = new ChartBuild(1, "myPieChart", data, "Lucro", label);
        chart.execute();
    }else if(type === 2){
        let chart = new ChartBuild(2, "myBarChart", data, "Lucro", label);
        chart.labelTextAxis("Curso", "Lucro (€)")
        chart.setSpecialSymbol(0)
        chart.execute();
    }else if(type === 3){
        let chart = new ChartBuild(1, "myPieChart", data, "Genero", label);
        chart.colorsPieGenders()
        chart.execute();
    }else if(type === 4){
        let chart = new ChartBuild(2, "myBarChart", data, "Nota", label);
        chart.labelTextAxis("Curso", "Nota")
        chart.setSpecialSymbol(1)
        chart.setLimitXGrade()
        chart.execute();
    }

}

function updateTimeGraph(){
    $(".card-footer");
    var currentdate = new Date();
    var datetime = "Atualizado a: " + ('0' + currentdate.getDate()).slice(-2) + "-"
        + ('0' + currentdate.getMonth()+1).slice(-2)  + "-"
        + currentdate.getFullYear() + " - "
        +  ('0' + currentdate.getUTCHours()).slice(-2) + ":"
        +  ('0' + currentdate.getMinutes()).slice(-2) + ":"
        +  ('0' + currentdate.getSeconds()).slice(-2);
    $(".card-footer")[0].innerHTML=datetime
}

var graphType = $("#outer").val()
var year = $("#outer2").val()
var max = $("#outer3").val()
/*When the user change the selection option this will run to get a new graph*/
function selectRightGrpah(){
    updateTimeGraph()
    $("#myAreaChart").remove()
    $("#myPieChart").remove()
    $("#myBarChart").remove()
    if(graphType==="option1"){
        $(".card-header")[0].innerHTML="<i class=\"fas fa-chart-area mr-1\"></i>Lucro total"
        $('.canvasClass').append('<canvas id="myAreaChart" width="100%" height="30"></canvas>');
        getTotalCustomYearDb(year)
    }else if(graphType==="option2"){
        $(".card-header")[0].innerHTML="<i class=\"fas fa-chart-pie mr-1\"></i>Número de vendas por curso"
        $('.canvasClass').append('<canvas id="myPieChart" width="100%" height="30"></canvas>');
        getSellsCoursesCustomYearDb(year, max)
    }else if(graphType==="option3"){
        $(".card-header")[0].innerHTML="<i class=\"fas fa-chart-bar mr-1\"></i>Lucro de vendas por curso"
        $('.canvasClass').append('<canvas id="myBarChart" width="100%" height="30"></canvas>');
        getSellsCoursesMoneyCustomYearDb(year, max)
    }else if(graphType==="option4"){
        $(".card-header")[0].innerHTML="<i class=\"fas fa-chart-pie mr-1\"></i>Comparação entre gêneros"
        $('.canvasClass').append('<canvas id="myPieChart" width="100%" height="30"></canvas>');
        getGendersDb()
    }else if(graphType==="option5"){
        $(".card-header")[0].innerHTML="<i class=\"fas fa-chart-bar mr-1\"></i>Media por curso"
        $('.canvasClass').append('<canvas id="myBarChart" width="100%" height="30"></canvas>');
        getAverageByCourse(max)
    }
}


$(document).ready(function () {
    getTotalCustomYearDb(year)//get the first element
    $("#outer3").hide()
    $(".outer3Text").hide()
    /*year selection*/
    $('#outer').change(function () {
        graphType=$(this).val()
        selectRightGrpah()
        $(".card-header")[0].innerText
        if(graphType==="option4" || graphType==="option5" ){
            $('#outer2').hide()
            $('.outer2Text').hide()
        }else{
            $('#outer2').show()
            $('.outer2Text').show()
        }
        if(graphType==="option2" || graphType==="option3" || graphType==="option5" ){
            $("#outer3").show()
            $(".outer3Text").show()
        }else{
            $("#outer3").hide()
            $(".outer3Text").hide()
        }

    })
    /*graph type selection*/
    $('#outer2').change(function () {
        year=$(this).val()
        selectRightGrpah()
    })
    /*graph max selection*/
    $('#outer3').change(function () {
        max=$(this).val()
        selectRightGrpah()
    })
});