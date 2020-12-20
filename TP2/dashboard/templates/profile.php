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
 <form method = "POST" action =  <?php echo "/action/actionUpdateUser.php?originalUser=$username&page=$title"?> enctype="multipart/form-data">
     <div class="form-group row">
         <label class="col-lg-3 col-form-label form-control-label">Username</label>
         <div class="col-lg-9">
             <input class="form-control" type="text"  name="username" value="<?php echo $queryInfo['username'];?>">
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
             <input class="form-control" type="date"  name="birthDate" value="<?php echo $queryInfo['birthdate']?>"><!--YYYY-MM-DD-->
         </div>
     </div>



     <div class="form-group row">
         <label class="col-lg-3 col-form-label form-control-label"></label>
         <div class="col-lg-9">
             <button type="reset" class="btn btn-secondary" value="Cancelar" onclick="location.href='index.php'"><i class="far fa-times-circle mr-2"></i> Cancelar</button>
             <button type="submit" class="btn btn-primary" value="MudarPassword" name="Guardar"><i class="fas fa-lock mr-2"></i> Mudar Password</button>
             <button type="submit" class="btn btn-primary" value="Guardar" name="Guardar"><i class="fas fa-file-download mr-2"></i> Guardar</button>

         </div>
     </div>
 </form>
</div>

