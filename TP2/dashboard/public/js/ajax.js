/**
 * Ajax Functions
 * @author- Fábio and Fernando
 * */

function updateModalStudent(response){
    user = response[0]
    numCourses = response[1]['count']
    grade = response[2]['avg']
    courses = response[3]
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
        $("h5.text-white")[0].innerHTML = user['name']
    }else{
        $("h5.text-white")[0].innerHTML = ""
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

}

/*Alunos.php
* When the user press the button to see more informations about the user X
* */
function showStudentInfo(student){
    if (student == "") {
        return;
    }
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "webservices/getStudentInfo.php?username="+student, true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);//json encode to array
            updateModalStudent(response)
        }
    };

}

/*Chat.php
* Send the message to database
* */
function sendMessageDb(message, from, to){
    if (!message.trim() || !from.trim()  ||  !to.trim() ) {
        return false;
    }

    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "webservices/addMessage.php?message="+message+"&userFrom="+from+"&userTo="+to, true);
    xhttp.send();
    console.log(message + "->"+from+"->"+to)

    return true;
}

/*Chat.php
* Get all the messages from an user
* */
function getMessagesDb(userSession, to){
    if (!userSession.trim()  ||  !to.trim() ) {
        return false;
    }

    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "webservices/getAllMessagesFromUser.php?userFrom="+userSession+"&userTo="+to+"&option="+1, true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);//json encode to array
            updateConversation(response, userSession)
        }
    };

    return true;
}
function getNewMessagesDb(userSession, to, id){
    if (!userSession.trim()  ||  !to.trim() ) {
        return false;
    }
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "webservices/getAllMessagesFromUser.php?userFrom="+userSession+"&userTo="+to+"&option="+2+"&id="+id, true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);//json encode to array
            needToUpdateChange(response,userSession)
        }
    };

    return true;
}

function setMessagesToAlreadyRead(userSession, to){
    if (!userSession.trim()  ||  !to.trim() ) {
        return false;
    }
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "webservices/setMessagesToAlreadyRead.php?userFrom="+userSession+"&userTo="+to, true);
    xhttp.send();
    return true;
}
function getUnseenMessagesDb(userSession){
    if (!userSession.trim()  ) {
        return false;
    }
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "webservices/getUnseenMessagesDb.php?userFrom="+userSession, true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);//json encode to array
            unSeenMessagesWatch(response)
        }
    };

    return true;
}

function showProductDetail(course) {
    if (course == "") {
        return;
    }
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "webservices/getProductDetail.php?course=" + encodeURIComponent(course), true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);//json encode to array
            updateModal(response)
        }
    };
}

/*Update the value of #usernam for the modal #modalGradeForm*/
function getStudent(sessionUser,username) {
    document.getElementById('usernam').value = username;
    var xhttp;
    xhttp = new XMLHttpRequest();


    xhttp.open("GET", "webservices/getEnrolledStudentCourse.php?teacher="+sessionUser+"&student="+username, true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);//json encode to array
            $("#courseOptions > option").remove()//options reset
            for(i=0; i<response.length; i++){
                if(response[i]['coursegrade']<0){//courses that was not graded
                    string = " <option selected >"+response[i]['coursename']+"</option>"
                    $("#courseOptions").append(string)
                }else{
                    string = " <option disabled >'"+response[i]['coursename']+"' já avaliado</option>"
                    $("#courseOptions").append(string)
                }
            }
        }
    };
}

function getTotalCustomYearDb(year){
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "webservices/getGraphInfoByYear.php?year="+year+"&option="+1, true);

    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);//json encode to array
            changeGraphKPI(response,0)
        }
    };
}

function getSellsCoursesCustomYearDb(year, max){
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "webservices/getGraphInfoByYear.php?year="+year+"&option="+2+"&max="+max, true);

    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);//json encode to array
            changeGraphKPI(response,1)
        }
    };
}

function getSellsCoursesMoneyCustomYearDb(year, max){
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "webservices/getGraphInfoByYear.php?year="+year+"&option="+3+"&max="+max, true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);//json encode to array
            changeGraphKPI(response,2)
        }
    };
}

function getGendersDb(){
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "webservices/getGraphInfoByYear.php?year="+0+"&option="+4, true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);//json encode to array
            console.log(response)
            changeGraphKPI(response,3)
        }
    };
}

function getAverageByCourse(max){
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.open("GET", "webservices/getGraphInfoByYear.php?year="+0+"&option="+5+"&max="+max, true);
    xhttp.send();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);//json encode to array
            changeGraphKPI(response,4)
        }
    };
}