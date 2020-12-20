/**
 * Email validation
 * */
function validateEmail(email) {
    const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}

function isEmpty(str) {
    return (str.length === 0 || !str.trim());
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