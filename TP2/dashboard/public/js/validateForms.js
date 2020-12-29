/**
 * Email validation
 * */
function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
/**
 * Verify if str is empty
 * */
function isEmpty(str) {
    return (str.length === 0 || !str.trim());
}

/**
 * Phone verification
 * */
function validePhone(phone) {
    var check = true;
    /* validar numeros moveis (91x, 92x, 93x, 96x) e fixos (2x) */
    var re = /^(9[1236]\d{7}|2\d{8})$/;

    if (phone == "")
        /* campo obrigatorio */
        check = false;
    else
    if(re.test(phone) == false)
        check = false;
    return check;
}


function valideDate(inputText) {
    var x = Date.parse(inputText)
    var inputDate = new Date(x)
    var d1 = new Date();



    return !(inputDate.getFullYear() >= d1.getFullYear()-5);
}

/**
 * Form validation of add user in user.php
 * */
function validateFormAddUser() {
    var name = document.forms["addUser"]["name"].value;
    var email = document.forms["addUser"]["email"].value;
    var username = document.forms["addUser"]["userName"].value;
    var isOk = true;
    $('.feedbackJs').remove();
    $('.valid-feedback').remove();

    /*NAME*/
    if (isEmpty(name)) {
        document.getElementsByName("name")[0].setAttribute("class", "form-control is-invalid");
        $("[name='name']").after('<div class="invalid-feedback feedbackJs">É necessário colocar um nome válido</div>');
        isOk &= false;
    } else {
        document.getElementsByName("name")[0].setAttribute("class", "form-control is-valid");
        $("[name='name']").after('<div class="valid-feedback ">Correto</div>');
        isOk &= true;
    }

    /*EMAIL*/
    if (!validateEmail(email)) {
        document.getElementsByName("email")[0].setAttribute("class", "form-control is-invalid");
        $("[name='email']").after('<div class="invalid-feedback feedbackJs">É necessário colocar um email válido</div>');
        isOk &= false;
    } else {
        document.getElementsByName("email")[0].setAttribute("class", "form-control is-valid");
        $("[name='email']").after('<div class="valid-feedback ">Correto</div>');
        isOk &= true;
    }

    /*USERNAME*/
    if (isEmpty(username)) {
        $('.invalid-feedback').remove();
        document.getElementsByName("userName")[0].setAttribute("class", "form-control is-invalid");
        $("[name='userName']").after('<div class="invalid-feedback feedbackJs">É necessário colocar um username válido</div>');
        isOk &= false;
    } else {
        document.getElementsByName("userName")[0].setAttribute("class", "form-control is-valid");
        $("[name='userName']").after('<div class="valid-feedback ">Correto</div>');
        isOk &= true;
    }

    return (isOk == 1);
}

/**
 * Form validation of edit user in perfil.php
 * */
 function validateFormProfile(option) {
     if(option =="users.php"){
         document.getElementById("profile").setAttribute("class", "tab-pane show");
         document.getElementById("edit").setAttribute("class", "tab-pane  active ");
     }

    var name = document.forms["editUserProfile"]["name"].value;
    var email = document.forms["editUserProfile"]["email"].value;
    var username = document.forms["editUserProfile"]["username"].value;
    var nif = document.forms["editUserProfile"]["nif"].value;
    var phone = document.forms["editUserProfile"]["phone"].value;
    var date = document.forms["editUserProfile"]["birthDate"].value;

    var isOk = true;
    $('.feedbackJs').remove();
    $('.valid-feedback').remove();

    /*NAME*/
    if (isEmpty(name)) {
        document.getElementsByName("name")[0].setAttribute("class", "form-control is-invalid");
        $("[name='name']").after('<div class="invalid-feedback feedbackJs">É necessário colocar um nome válido</div>');
        isOk &= false;
    } else {
        document.getElementsByName("name")[0].setAttribute("class", "form-control is-valid");
        $("[name='name']").after('<div class="valid-feedback ">Correto</div>');
        isOk &= true;
    }

    /*EMAIL*/
    if (!validateEmail(email)) {
        document.getElementsByName("email")[0].setAttribute("class", "form-control is-invalid");
        $("[name='email']").after('<div class="invalid-feedback feedbackJs">É necessário colocar um email válido</div>');
        isOk &= false;
    } else {
        document.getElementsByName("email")[0].setAttribute("class", "form-control is-valid");
        $("[name='email']").after('<div class="valid-feedback ">Correto</div>');
        isOk &= true;
    }


    /*NIF*/
    if (!valideNif(nif)) {
        document.getElementsByName("nif")[0].setAttribute("class", "form-control is-invalid");
        $("[name='nif']").after('<div class="invalid-feedback feedbackJs">É necessário colocar um nif válido</div>');
        isOk &= false;
    } else {
        document.getElementsByName("nif")[0].setAttribute("class", "form-control is-valid");
        $("[name='nif']").after('<div class="valid-feedback ">Correto</div>');
        isOk &= true;
    }

    /*PHONE*/
    if (!validePhone(phone)) {
        document.getElementsByName("phone")[0].setAttribute("class", "form-control is-invalid");
        $("[name='phone']").after('<div class="invalid-feedback feedbackJs">É necessário colocar um telemóvel válido</div>');
        isOk &= false;
    } else {
        document.getElementsByName("phone")[0].setAttribute("class", "form-control is-valid");
        $("[name='phone']").after('<div class="valid-feedback ">Correto</div>');
        isOk &= true;
    }

    /*USERNAME*/
    if (isEmpty(username)) {
        $('.invalid-feedback').remove();
        document.getElementsByName("username")[0].setAttribute("class", "form-control is-invalid");
        $("[name='username']").after('<div class="invalid-feedback feedbackJs">É necessário colocar um username válido</div>');
        isOk &= false;
    } else {
        document.getElementsByName("username")[0].setAttribute("class", "form-control is-valid");
        $("[name='username']").after('<div class="valid-feedback ">Correto</div>');
        isOk &= true;
    }

    /*DATE*/
    if (!valideDate(date)) {
        $('.invalid-feedback').remove();
        document.getElementsByName("birthDate")[0].setAttribute("class", "form-control is-invalid");
        $("[name='birthDate']").after('<div class="invalid-feedback feedbackJs">É necessário colocar uma data válida</div>');
        isOk &= false;
    } else {
        document.getElementsByName("birthDate")[0].setAttribute("class", "form-control is-valid");
        $("[name='birthDate']").after('<div class="valid-feedback ">Correto</div>');
        isOk &= true;
    }
    /*Don't need verification*/
    document.getElementsByName("about")[0].setAttribute("class", "form-control is-valid");
    $("[name='about']").after('<div class="valid-feedback ">Correto</div>');
    document.getElementsByName("hobbies")[0].setAttribute("class", "form-control is-valid");
    $("[name='hobbies']").after('<div class="valid-feedback ">Correto</div>');

    return (isOk==1);
}


/**
 * Form validation of register user in register.php
 * */
function validateFormRegister() {
    

    console.log("asdasd")
    return false;
    return (isOk==1);
}