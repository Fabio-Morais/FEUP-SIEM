<?php
/**
 * Template usado para as paginas perfil.php
 * @param- $username, $title, $queryInfo, $total['count'], $grade['avg']
 */
?>
<div class="card">
    <?php if($title == "perfil.php"):?>
        <div class="card-body text-center  rounded-top"  id="pr1">
            <form action=<?php echo "action/actionUpdateUser.php?originalUser=$username&page=$title"?> method="POST">
                <div class="d-flex flex-row ">
                    <input name="color" class="m-1"data-jscolor="{onInput: 'updateColor(this, \'#pr1\')',value:'<?php echo (empty($queryInfo["color"])) ? "#1B49C2" : $queryInfo["color"]?>'}" id="colorPick"></input>
                    <input class="m-1 btn btn-outline-info" type="submit" id="colorPickButton" value="Guardar" name="SaveColor">
                </div>
            </form>
            <div class="user-box mb-4">
                <img src="public/img/<?php echo getImage($queryInfo)?>" alt="user avatar" onerror="javascript:this.src='public/img/avatar.png'"/>
            </div>
            <h4 class="mb-2 textAdapt" ><?php echo  $queryInfo['name'] ?></h4>
            <h6 class="mb-1 textAdapt" ><?php echo role($queryInfo['role']) ?></h6>
        </div>
    <?php endif;?>
    <div class="card-body">
        <div class="list-group-item d-flex flex-wrap flex-row justify-content-center" >

            <div class="list-details m-2 text-center d-flex flex-row flex-wrap justify-content-center" >
                <div class="mr-2"><i class="fas fa-phone fa-lg"></i></div>
                <div class="mr-2 mt-1"><span><?php echo ($queryInfo['phone']!=null) ? $queryInfo['phone'] : "- - - - - -" ?></span></div>
            </div>

            <div class="list-details m-2 text-center d-flex flex-row flex-wrap justify-content-center" >
                <div class="ml-2 "><i class="fa fa-envelope fa-lg"></i></div>
                <div class="ml-2 mt-1"><span> <?php echo ($queryInfo['email']!=null) ? $queryInfo['email'] : "- - - - - -" ?></span></div>
            </div>
        </div>
        <div class="row text-center mt-4">
            <div class="col p-2 customText">
                <h4 class="mb-1 line-height-5"> <?php echo $total['count'] ?></h4>
                <small class="mb-0 font-weight-bold">Cursos</small>
            </div>
            <div class="col p-2 customText">
                <h4 class="mb-1 line-height-5"> <?php echo ($grade['avg'] != "") ? $grade['avg'] :"--" ?></h4>
                <small class="mb-0 font-weight-bold">Média</small>
            </div>

        </div>
    </div>

</div>