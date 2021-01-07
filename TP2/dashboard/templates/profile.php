<?php
/**
 * Template usado para as paginas perfil.php e editUser.php (quando se edita um user na pagina user.php)
 * @param- $username, $title, $queryInfo
 */


$show = "active show";
/*caso esteja na pagina PERFIL.PHP*/
$title = basename($_SERVER['SCRIPT_NAME']);
if ($title == "perfil.php") {
    $show = "";
}

echo "<div class=\"tab-pane $show\" id=\"edit\">" ?>
<form name="editUserProfile" method="POST"
      action="<?php echo "action/actionUpdateUser.php?originalUser=$username&page=$title" ?>"
      enctype="multipart/form-data" onsubmit="return validateFormProfile('<?php echo $title ?>')">
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Username</label>
        <div class="col-lg-9">
            <input class="form-control" type="text" name="username" value="<?php echo $queryInfo['username']; ?>"
                   disabled>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Nome</label>
        <div class="col-lg-9">
            <input class="form-control" type="text" name="name" value="<?php echo $queryInfo['name']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Email</label>
        <div class="col-lg-9">
            <input class="form-control" type="email" name="email" value="<?php echo $queryInfo['email']; ?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Mudar foto</label>
        <div class="col-lg-9">
            <div class="custom-file" id="customFile">
                <input type="file" class="custom-file-input" name="image" id="exampleInputFile"
                       aria-describedby="fileHelp" onchange="fileName()">
                <label class="custom-file-label" for="exampleInputFile" id="fileLabel">
                    Selecionar foto
                </label>
            </div>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Sexo</label>
        <div class="col-lg-9">
            <label class="radio-inline m-1">
                <input type="radio" class="form-check-label m-1" name="gender" style="transform:scale(1.6);" value="f"
                    <?php echo ($queryInfo['gender']=="f") ? "checked" : ""; ?>> Mulher
            </label>
            <label class="radio-inline ml-4 m-1">
                <input type="radio" class="form-check-label m-1" name="gender" style="transform:scale(1.6);" value="m"
                    <?php echo ($queryInfo['gender']=="m") ? "checked" : ""; ?>>
                Homem
            </label>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">NIF</label>
        <div class="col-lg-9">
            <input class="form-control" type="text" name="nif" value="<?php echo $queryInfo['nif']; ?>"
                   placeholder="NIF">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Telemóvel</label>
        <div class="col-lg-9">
            <input class="form-control" type="text" name="phone" value="<?php echo $queryInfo['phone']; ?>"
                   placeholder="phone">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Data Nascimento</label>
        <div class="col-lg-9">
            <input class="form-control" type="date" name="birthDate" value="<?php echo $queryInfo['birthdate'] ?>">
            <!--YYYY-MM-DD-->
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Sobre</label>
        <div class="col-lg-9">
            <textarea class="form-control" type="text" name="about"
                      placeholder="about"><?php echo $queryInfo['about']; ?></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label">Atividades</label>
        <div class="col-lg-9">
            <textarea class="form-control" type="text" name="hobbies"
                      placeholder="hobbies"><?php echo $queryInfo['hobbies']; ?></textarea>
        </div>
    </div>


    <div class="form-group row">
        <label class="col-lg-3 col-form-label form-control-label"></label>
        <div class="col-lg-9">
            <?php
            $string = "perfil.php";
            if ($title == "editUser.php")
                $string = "users.php";
            ?>


        </div>
        <div class="d-flex flex-row flex-wrap justify-content-center" style="width:100%;">
            <div>
                <button type="reset" class="btn btn-secondary m-1" value="Cancelar"
                        onclick="location.href='<?php echo $string ?>'"><i
                            class="far fa-times-circle mr-2"></i> Cancelar
                </button>
            </div>
            <?php if ($title == "perfil.php"): ?>
                <div>
                    <button type="button" data-toggle="modal" onclick="validatePass()" data-target="#passModal"
                            class="btn btn-primary m-1"><i class="fas fa-lock mr-2"></i> Mudar Password
                    </button>
                </div>
            <?php endif; ?>
            <div>
                <button type="submit" class="btn btn-primary m-1" value="Guardar" name="Guardar"><i
                            class="fas fa-file-download mr-2"></i> Guardar
                </button>
            </div>
        </div>
    </div>
</form>
</div>


<!-- form card change password -->

<!-- Modal -->
<div class="modal fade" id="passModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class=" card card-outline-secondary">
                <div class="card-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="mb-0">Alterar a Password</h3>
                </div>

                <div class="card-body">
                    <form class="form" role="form" autocomplete="off"
                          action="action/actionChangePassword.php?username=<?php echo $username ?>" method="POST">
                        <div class="form-group">
                            <?php if (isset($_SESSION['errorPopUp']))
                                echo $_SESSION['errorPopUp'];
                            $_SESSION['errorPopUp'] = NULL; ?>
                            <label for="inputPasswordOldLabel">Password Atual</label>
                            <input type="password" class="form-control is-invalid" id="inputPasswordOld123" required=""
                                   name="passwordOld">
                            <?php if (!empty($_SESSION['errorText'])): ?>
                                <span class="form-text small text-danger" id="wrongPass">
                                     <?php echo $_SESSION['errorText'];
                                     $_SESSION['errorText'] = NULL ?>
                            </span>
                            <?php endif; ?>
                        </div>
                        <div class="form-group">
                            <label for="inputPasswordNew">Nova Password</label>
                            <input type="password" class="form-control" id="inputPasswordNew" required=""
                                   name="password">
                            <span class="form-text small text-muted">
                                     A password deve de ter 4-20 caracteres, número e <em>não</em> conter espaços.
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="inputPasswordNewVerify">Repetir Password</label>
                            <input type="password" class="form-control" id="inputPasswordNewVerify" required=""
                                   name="password2">
                            <span class="form-text small text-muted">
                                            Para confirmar, escrever a nova password outra vez.
                                        </span>
                        </div>
                        <div class="d-flex justify-content-between flex-row-reverse bd-highlight mb-3">
                            <div class="p-2 form-group">

                                <button type="submit" class="btn btn-success btn-lg float-right" id="buttonChangePass"
                                        name="buttonChange" value="buttonChange">Alterar
                                </button>
                            </div>
                            <div class="p-2" id="message">
                                <h6>A password deve de ter:</h6>
                                <p id="number" class="invalid">Pelo menos um <b>numero</b>;</p>
                                <p id="length" class="invalid ">Minimo de <b>4 characters</b> e máximo <b>20
                                        characters</b>; </p>
                                <p id="space" class="valid ">Não ter <b>espaços</b>;</p>
                            </div>

                        </div>


                    </form>

                </div>


            </div>

        </div>
    </div>
</div>

<!-- /form card change password -->

