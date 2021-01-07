<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>

<?php 

$username = $_GET['username'];

include_once(dirname(__FILE__) . "/dataBase/dataBase.php");
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();
$user = "";
$connected = false;

$total['count']="--";
$grade['avg']="--";
if ($db->connect()) {

    $user = $db->getUser($username);
    $connected = true;
    $queryInfo = pg_fetch_assoc($user);
    if($queryInfo["role"] == 0){/*Aluno*/
        $totalQuery = $db->getTotalCoursesStudent($username);
        $gradeQuery = $db->getStudentAverage($username);
        $total = pg_fetch_assoc($totalQuery);
        if(!isset($total['count']))
            $total['count']="--";
        $grade = pg_fetch_assoc($gradeQuery);
    }else if($queryInfo["role"] == 1){
        $totalQuery2 = $db->getTotalCoursesTeacher($username);
        $total2 = pg_fetch_assoc($totalQuery2);
        if(!isset($total2['count']))
            $total2['count']="--";
        else
            $total['count'] = $total2['count'];//pass total courses teacher
    }
} else
    Alerts::showError(Alerts::DATABASEOFF);

?>
<?php

$title = basename($_SERVER['SCRIPT_NAME']);

?>

<div class="container-fluid">
    <div class="justify-content-center m-4">

        <div class="row">
            <div class="col-lg-4 m-1">
                <div class="profile-card-4 z-depth-3">
                    <div class="card">
                        <div class="card-body text-center  rounded-top" id="pr1">
                            <script src="includes/libs/jscolor.js"></script>
                            <form action=<?php echo "action/actionUpdateUser.php?originalUser=$username&page=$title"?> method="POST">
                                <div class="d-flex flex-row ">
                                    <input name="color" class="m-1"data-jscolor="{onInput: 'update(this, \'#pr1\')',value:'<?php echo (empty($queryInfo["color"])) ? "#1B49C2" : $queryInfo["color"]?>'}" id="colorPick"></input>
                                    <input class="m-1 btn btn-outline-info" type="submit" id="colorPickButton" value="Guardar" name="SaveColor">
                                </div>
                            </form>
                            <div class="user-box  mb-4">
                                <img src="public/img/<?php echo getImage($queryInfo)?>" onerror="javascript:this.src='public/img/avatar.png'" alt="user avatar">
                            </div>
                            <h5 class="mb-2 textAdapt"><?php echo $queryInfo['name']?></h5>
                            <h6 class="mb-1 textAdapt"><?php echo role($queryInfo['role']) ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="list-group-item d-flex flex-wrap flex-row justify-content-center" >

                                <div class="list-details m-2 text-center d-flex flex-row flex-wrap justify-content-center" >
                                    <div class="mr-2"><i class="fas fa-phone fa-lg"></i></div>
                                    <div class="mr-2 mt-2"><span><?php echo $queryInfo['phone'] ?></span></div>
                                </div>

                                <div class="list-details m-2 text-center d-flex flex-row flex-wrap justify-content-center" >
                                    <div class="ml-2"><i class="fa fa-envelope fa-lg"></i></div>
                                    <div class="ml-2 mt-2"><span> <?php echo $queryInfo['email'] ?></span></div>
                                </div>
                            </div>
                           
                            <div class="row text-center mt-4">
                                <div class="col p-2">
                                    <h4 class="mb-1 line-height-5"><?php echo $total['count'];?></h4>
                                    <small class="mb-0 font-weight-bold">Cursos</small>
                                </div>
                                <div class="col p-2">
                                    <h4 class="mb-1 line-height-5"><?php echo ($grade['avg'])!=null ? $grade['avg'] : "--";?></h4>
                                    <small class="mb-0 font-weight-bold">Nota</small>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-7 m-1">
                <div class="card z-depth-3">
                    <div class="card-body">
                        <ul class="nav nav-pills nav-pills-primary nav-justified">
                            <li class="nav-item">
                                <a href="" data-target="#edit" data-toggle="pill" class="nav-link active"><i class="icon-note"></i> <span class="hidden-xs">Editar</span></a>
                            </li>
                        </ul>
                        <div class="tab-content p-3">

                        <?php require_once(dirname(__FILE__) . "/templates/profile.php"); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>
<script>
    var lastColor=null;

    $('#pr1').bind("mouseenter focus ",
        function(event) { document.getElementById("colorPick").style.display = "block";document.getElementById("colorPickButton").style.display = "block"; });
    $('#pr1').bind("focusout  mouseleave",
        function(event) { document.getElementById("colorPick").style.display = "none";document.getElementById("colorPickButton").style.display = "none"; });

    function update(picker, selector) {
        document.querySelector(selector).style.background = picker.toBackground()
        setContrast(picker)
    }

    // triggers 'onInput' and 'onChange' on all color pickers when they are ready
    jscolor.trigger('input change');
</script>

