function allOk(isOk, change){
    if (isOk.every(elem => elem === true)) {
        change.disabled = false;
    } else {
        change.disabled = true;
    }
}
function validatePass(){
    var myInputOld = document.getElementById("inputPasswordOld123");
    var myInput = document.getElementById("inputPasswordNew");
    var myInput2 = document.getElementById("inputPasswordNewVerify");
    var number = document.getElementById("number");
    var length = document.getElementById("length");
    var space = document.getElementById("space");
    var change = document.getElementById("buttonChangePass");

    var isOk = [false, false, false, false, false];
    change.disabled = true;
// When the user clicks on the password field, show the message box
    myInput.onfocus = function () {
        document.getElementById("message").style.display = "block";
    }

// When the user clicks outside of the password field, hide the message box
    myInput.onblur = function () {
        document.getElementById("message").style.display = "none";
    }

// When the user starts to type something inside the password field
    myInput.onkeyup = function () {

        // Validate numbers
        var numbers = /[0-9]/g;
        if (myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
            isOk[0] = true;
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
            isOk[0] = false;
        }

        // Validate length
        if (myInput.value.length >= 4 && myInput.value.length <= 20) {
            length.classList.remove("invalid");
            length.classList.add("valid");
            isOk[1] = true;
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
            isOk[1] = false;
        }

        // Validate space
        if (myInput.value.indexOf(' ') < 0) {
            space.classList.remove("invalid");
            space.classList.add("valid");
            isOk[2] = true;
        } else {
            space.classList.remove("valid");
            space.classList.add("invalid");
            isOk[2] = false;
        }
        if(isOk[0] && isOk[1] && isOk[2]){
            myInput.classList.remove("is-invalid");
            myInput.classList.add("is-valid");
        }else{
            myInput.classList.remove("is-valid");
            myInput.classList.add("is-invalid");
        }
        allOk(isOk, change)
    }

// When the user starts to type something inside the password field
    myInput2.onkeyup = function () {

        if (myInput.value === myInput2.value) {
            myInput2.classList.remove("is-invalid");
            myInput2.classList.add("is-valid");
            isOk[3] = true;

        } else {
            myInput2.classList.remove("is-valid");
            myInput2.classList.add("is-invalid");
            isOk[3] = false;
        }
        allOk(isOk, change)

    }
    /*Confirms if the old password is not blank*/
    myInputOld.onkeyup = function(){

        $("#wrongPass").css("display", "none");

        if (myInputOld.value) {
            myInputOld.classList.remove("is-invalid");
            myInputOld.classList.add("is-valid");
            isOk[4] = true;
        } else {
            myInputOld.classList.remove("is-valid");
            myInputOld.classList.add("is-invalid");
            isOk[4] = false;
        }
        allOk(isOk, change)

    }
}
