<?php
/**
* Template usado para as paginas perfil.php e formEdit.php (quando se edita um user na pagina user.php)
*/


$show="active show";
/*caso esteja na pagina PERFIL.PHP*/
$title = basename($_SERVER['SCRIPT_NAME']);
if ($title == "perfil.php" ){
    $show="";
}

 echo "<div class=\"tab-pane $show\" id=\"edit\">"?>
 <form name="editUserProfile" method = "POST" action = "<?php echo "action/actionUpdateUser.php?originalUser=$username&page=$title"?>" enctype="multipart/form-data" onsubmit="return validateFormProfile()">
     <div class="form-group row">
         <label class="col-lg-3 col-form-label form-control-label">Username</label>
         <div class="col-lg-9">
             <input class="form-control" type="text"  name="username" value="<?php echo $queryInfo['username'];?>" disabled>
         </div>
     </div>
     <div class="form-group row">
         <label class="col-lg-3 col-form-label form-control-label">Nome</label>
         <div class="col-lg-9">
             <input class="form-control" type="text" name="name" value="<?php echo $queryInfo['name'];?>">
         </div>
     </div>
     <div class="form-group row">
         <label class="col-lg-3 col-form-label form-control-label">Email</label>
         <div class="col-lg-9">
             <input class="form-control" type="email"  name="email" value="<?php echo $queryInfo['email'];?>">
         </div>
     </div>
     <div class="form-group row">
         <label class="col-lg-3 col-form-label form-control-label">Mudar foto</label>
         <div class="col-lg-9">
             <div class="custom-file" id="customFile">
                 <input type="file" class="custom-file-input" name="image"  id="exampleInputFile" aria-describedby="fileHelp" onchange="fileName()">
                 <label class="custom-file-label" for="exampleInputFile" id="fileLabel">
                     Selecionar foto
                 </label>
             </div>
         </div>
     </div>

     <div class="form-group row">
         <label class="col-lg-3 col-form-label form-control-label">NIF</label>
         <div class="col-lg-9">
             <input class="form-control" type="text"  name="nif" value="<?php echo $queryInfo['nif'];?>" placeholder="NIF">
         </div>
     </div>

     <div class="form-group row">
         <label class="col-lg-3 col-form-label form-control-label">Telemóvel</label>
         <div class="col-lg-9">
             <input class="form-control" type="text"  name="phone" value="<?php echo $queryInfo['phone'];?>" placeholder="phone">
         </div>
     </div>

     <div class="form-group row">
         <label class="col-lg-3 col-form-label form-control-label">Data Nascimento</label>
         <div class="col-lg-9">
             <input  class="form-control" type="date"  name="birthDate" value="<?php echo $queryInfo['birthdate']?>"><!--YYYY-MM-DD-->
         </div>
     </div>

     <div class="form-group row">
         <label class="col-lg-3 col-form-label form-control-label">Sobre</label>
         <div class="col-lg-9">
             <textarea  class="form-control" type="text"  name="about"  placeholder="about"><?php echo $queryInfo['about'];?></textarea>
         </div>
     </div>

     <div class="form-group row">
         <label class="col-lg-3 col-form-label form-control-label">Atividades</label>
         <div class="col-lg-9">
             <textarea  class="form-control" type="text"  name="hobbies"  placeholder="hobbies"><?php echo $queryInfo['hobbies'];?></textarea>
         </div>
     </div>


     <div class="form-group row">
         <label class="col-lg-3 col-form-label form-control-label"></label>
         <div class="col-lg-9">
             <button type="reset" class="btn btn-secondary" value="Cancelar" onclick="location.href='index.php'"><i class="far fa-times-circle mr-2"></i> Cancelar</button>
             <button type="button" data-toggle="modal" data-target="#passModal" class="btn btn-primary"  ><i class="fas fa-lock mr-2"></i> Mudar Password</button>
             <button type="submit" class="btn btn-primary" value="Guardar" name="Guardar"><i class="fas fa-file-download mr-2"></i> Guardar</button>

         </div>
     </div>
 </form>
</div>


<!-- form card change password -->

<!-- Modal -->
<div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
                <div class=" card card-outline-secondary" >
                    <div class="card-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="mb-0">Alterar a Password</h3>
                    </div>

                    <div class="card-body">
                        <form class="form" role="form" autocomplete="off">
                            <div class="form-group">
                                <label for="inputPasswordOld">Password Atual</label>
                                <input type="password" class="form-control" id="inputPasswordOld" required="">
                            </div>
                            <div class="form-group">
                                <label for="inputPasswordNew">Nova Password</label>
                                <input type="password" class="form-control" id="inputPasswordNew" required="">
                                <span class="form-text small text-muted">
                                            A password deve de ter 8-20 caracteres, número e <em>não</em> conter espaços.
                                        </span>
                            </div>
                            <div class="form-group">
                                <label for="inputPasswordNewVerify">Repetir Password</label>
                                <input type="password" class="form-control" id="inputPasswordNewVerify" required="">
                                <span class="form-text small text-muted">
                                            Para confirmar, escrever a nova password outra vez.
                                        </span>
                            </div>
                            <div class="d-flex justify-content-between flex-row-reverse bd-highlight mb-3">
                                <div class="p-2 form-group">

                                    <button type="submit" class="btn btn-success btn-lg float-right">Alterar</button>
                                </div>
                                <div class="p-2" id="message">
                                    <h6>A password deve de ter:</h6>
                                    <p id="number" class="invalid" >Pelo menos um <b>numero</b>;</p>
                                    <p id="length" class="invalid " >Minimo de <b>8 characters</b> e máximo <b>20 characters</b>; </p>
                                    <p id="space" class="valid " >Não ter <b>espaços</b>;</p>

                                </div>

                            </div>


                        </form>

                    </div>


                </div>

        </div>
    </div>
</div>
<script>
    var myInput = document.getElementById("inputPasswordNew");
    var myInput2 = document.getElementById("inputPasswordNewVerify");

    var number = document.getElementById("number");
    var length = document.getElementById("length");
    var space = document.getElementById("space");


    // When the user clicks on the password field, show the message box
    myInput.onfocus = function() {
        document.getElementById("message").style.display = "block";
    }

    // When the user clicks outside of the password field, hide the message box
    myInput.onblur = function() {
        document.getElementById("message").style.display = "none";
    }

    // When the user starts to type something inside the password field
    myInput.onkeyup = function() {

        // Validate numbers
        var numbers = /[0-9]/g;
        if(myInput.value.match(numbers)) {
            number.classList.remove("invalid");
            number.classList.add("valid");
        } else {
            number.classList.remove("valid");
            number.classList.add("invalid");
        }

        // Validate length
        if(myInput.value.length >= 8 && myInput.value.length<=20) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }

        // Validate space
        if(myInput.value.indexOf(' ') < 0) {
            space.classList.remove("invalid");
            space.classList.add("valid");
        } else {
            space.classList.remove("valid");
            space.classList.add("invalid");
        }
    }

    // When the user starts to type something inside the password field
    myInput2.onkeyup = function() {

        if(myInput.value === myInput2.value) {
            myInput.classList.remove("is-invalid");
            myInput.classList.add("is-valid");
            myInput2.classList.remove("is-invalid");
            myInput2.classList.add("is-valid");
        } else {
            myInput.classList.remove("is-valid");
            myInput.classList.add("is-invalid");
            myInput2.classList.remove("is-valid");
            myInput2.classList.add("is-invalid");
        }


    }
</script>
<!-- /form card change password -->

