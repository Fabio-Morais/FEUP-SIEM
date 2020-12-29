function updateModalStudent(response){
    /**about: null
     birthdate: "1998-01-12"
     color: null
     email: "joao@hotmail.com"
     hobbies: null
     image: null
     name: "Joao Silva"
     nif: "233487875"
     phone: "915487895"
     role: "0"
     username: "joao12"*/
    user = response[0]
    numCourses = response[1]['count']
    grade = response[2]['avg']
    /**coursegrade: "0"
     coursename: "c++"
     username: "joao12"*/
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