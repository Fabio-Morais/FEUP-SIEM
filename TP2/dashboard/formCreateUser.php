<?php
$name="";
$email="";
$role=["selected=\"\"","",""];
$username="";
if(!empty($_SESSION['name']))
    $name=$_SESSION['name'];
if(!empty($_SESSION['email']))
    $email=$_SESSION['email'];
if(!empty($_SESSION['username'])){
    $username=$_SESSION['username'];
    $role[0]=$_SESSION['role'][0];
    $role[1]=$_SESSION['role'][1];
    $role[2]=$_SESSION['role'][2];
}
$_SESSION['name']=NULL;
$_SESSION['email']=NULL;
$_SESSION['username']=NULL;
$_SESSION['role']=NULL;
?>

<div class="modal fade " id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="card bg-light ">
                <article class="card-body mx-auto" style="max-width: 400px;">
                    <h4 class="card-title mt-3 text-center">Criar Conta</h4>
                    <form name="addUser" method = "POST" action = "/action/actionInsertUser.php" onsubmit="return validateFormAddUser()">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="name" class="form-control" placeholder="Nome Completo" type="text" value="<?php echo $name?>"">
                        </div> <!-- form-group// -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="email" class="form-control " placeholder="Email" type="email" value="<?php echo $email?>">
                        </div> <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                            </div>

                            <select class="form-control" name="role">
                                <option <?php echo $role[0] ?> value="0"> Aluno</option>
                                <option <?php echo $role[1] ?> value="1">Professor</option>
                                <option <?php echo $role[2] ?> value="2">Admin</option>
                            </select>
                        </div> <!-- form-group end.// -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input class="form-control <?php if(!empty($name)) echo "is-invalid"?>" placeholder="Username" type="text" name="userName" value="<?php echo $username?>">
                            <?php if(!empty($name)):?><div class="invalid-feedback">Este username já existe</div><?php endif;?>
                        </div> <!-- form-group// -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" name="criaConta" value="criaConta"> Criar Conta </button>
                        </div> <!-- form-group// -->
                    </form>
                </article>
            </div> <!-- card.// -->

        </div>
    </div>
</div>
