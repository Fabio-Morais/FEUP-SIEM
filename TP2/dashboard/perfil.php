<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>
<?php require_once(dirname(__FILE__) . "/includes/common/alerts.php"); ?>


<?php

$username = $_SESSION['user'];

include_once(dirname(__FILE__) . "/dataBase/dataBase.php");
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();
$user = "";
$connected = false;


$total['count'] = "--";
$grade['avg'] = "--";
if ($db->connect()) {
    /*$image = 'public/img/avatar1.png';
  $imageData = base64_encode(file_get_contents($image));
  $db->insert($imageData);*/
    $user = $db->getUser($username);
    $connected = true;
    $queryInfo = pg_fetch_assoc($user);
    if ($queryInfo["role"] == 0) {/*Aluno*/
        $totalQuery = $db->getTotalCoursesStudent($username);
        $gradeQuery = $db->getStudentAverage($username);
        $coursesQuery = $db->getCoursesStudent($username);
        $ordersQuery = $db->getOrdersByUser($username);

        $total = pg_fetch_assoc($totalQuery);
        $grade = pg_fetch_assoc($gradeQuery);
        $courses = pg_fetch_assoc($coursesQuery);
        $orders = pg_fetch_assoc($ordersQuery);
    } else if ($queryInfo["role"] == 1) {
        $totalQuery = $db->getTotalCoursesTeacher($username);
        $total = pg_fetch_assoc($totalQuery);
        $coursesQuery = $db->getCoursesTeacher($username);
        $courses = pg_fetch_assoc($coursesQuery);
    }
} else
    Alerts::showError(Alerts::DATABASEOFF);

?>
<?php
function role($var)
{
    if ($var == 0) {
        return "Aluno";
    } else if ($var == 1) {
        return "Professor";
    } else if ($var == 2) {
        return "Admin";
    }
};
$title = basename($_SERVER['SCRIPT_NAME']);

?>
<?php if ($connected) : ?>
    <div class="container-fluid">
        <div class="justify-content-center m-4">
            <?php if (isset($_SESSION['add']))
                echo $_SESSION['add'];
            $_SESSION['add'] = NULL; ?>
            <div class="row">
                <div class="col-lg-4 m-1">
                    <div class="profile-card-4 z-depth-3" >
                        <div class="card">
                            <div class="card-body text-center  rounded-top"  id="pr1">
                                <script src="includes/libs/jscolor.js"></script>
                                <form action=<?php echo "action/actionUpdateUser.php?originalUser=$username&page=$title"?> method="POST">
                                    <div class="d-flex flex-row ">
                                    <input name="color" class="m-1"data-jscolor="{onInput: 'update(this, \'#pr1\')',value:'<?php echo (empty($queryInfo["color"])) ? "#1B49C2" : $queryInfo["color"]?>'}" id="colorPick"></input>
                                    <input class="m-1 btn btn-outline-info" type="submit" id="colorPickButton" value="Guardar" name="SaveColor">
                                    </div>
                                </form>
                                <div class="user-box mb-4">
                                    <img src="public/img/users/<?php echo $queryInfo['image']?>" alt="user avatar" onerror="javascript:this.src='public/img/avatar.png'"/>
                                </div>
                                <h4 class="mb-2 textAdapt" ><?php echo  $queryInfo['name'] ?></h4>
                                <h6 class="mb-1 textAdapt" ><?php echo role($queryInfo['role']) ?></h6>
                            </div>
                            <div class="card-body">
                                <div class="list-group-item d-flex flex-row justify-content-center">

                                    <div class="list-details m-2 text-center">
                                        <i class="fas fa-phone"></i> <span><?php echo $queryInfo['phone'] ?></span>
                                    </div>

                                    <div class="list-details m-2 text-center">
                                        <i class="fa fa-envelope"></i><span> <?php echo $queryInfo['email'] ?></span>
                                    </div>
                                </div>
                                <div class="row text-center mt-4">
                                    <div class="col p-2">
                                        <h4 class="mb-1 line-height-5"> <?php echo $total['count'] ?></h4>
                                        <small class="mb-0 font-weight-bold">Cursos</small>
                                    </div>
                                    <div class="col p-2">
                                        <h4 class="mb-1 line-height-5"> <?php echo ($grade['avg'] != "") ? $grade['avg'] :"--" ?></h4>
                                        <small class="mb-0 font-weight-bold">Média</small>
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
                                    <a href="" data-target="#profile" data-toggle="pill" class="nav-link active show"><i class="icon-user"></i> <span class="hidden-xs">Perfil</span></a>
                                </li>

                                <li class="nav-item">
                                    <a href="" data-target="#edit" data-toggle="pill" class="nav-link"><i class="icon-note"></i> <span class="hidden-xs">Editar</span></a>
                                </li>
                            </ul>
                            <div class="tab-content p-3">
                                <div class="tab-pane active show" id="profile">
                                    <h5 class="mb-3">Perfil</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h6>Sobre</h6>
                                            <p>
                                                <?php echo (empty($queryInfo["about"])) ? "Não existe descrição adicionada." : $queryInfo["about"]?>
                                            </p>
                                            <h6>Atividades </h6>
                                            <p>
                                                <?php echo (empty($queryInfo["hobbies"])) ?  "Não existe atividades adicionadas." : $queryInfo["hobbies"]?>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <h6>Cursos:</h6>
                                            <?php while (isset($courses["coursename"])) {
                                                echo "<a class=\"badge badge-dark text-uppercase m-1\"> " . $courses['coursename'] . " </a>";
                                                $courses = pg_fetch_assoc($coursesQuery);
                                            }
                                            ?>


                                        </div>
                                        <?php if($queryInfo["role"]==0): ?>
                                        <div class="col-md-12">
                                            <h5 class="mt-2 mb-3"><i class="far fa-clock float-right"></i>Últimas 3 compras</h5>
                                            <table class="table table-hover table-striped">
                                                <tbody>
                                                   <?php
                                                   $count=3;
                                                   while(isset($orders["productname"]) && $count>0) {
                                                       $date = new DateTime($orders['purchasedate']);
                                                       echo "<tr>";
                                                           echo "<td>";
                                                           echo "<strong>Curso:</strong> ".$orders['productname'];
                                                           echo "</td>";
                                                           echo "<td>";
                                                           echo "<strong>Data de compra: </strong>".$date->format('d-m-Y');;
                                                           echo "</td>";
                                                       echo " </tr>";
                                                       $orders = pg_fetch_assoc($ordersQuery);
                                                       $count--;
                                                   }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                         <?php endif; ?>
                                    </div>
                                    <!--/row-->
                                </div>

                                <?php require_once(dirname(__FILE__) . "/templates/profile.php"); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
<?php endif; ?>
<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>

<script>

    function fileName(){
        var fullPath = document.getElementById('exampleInputFile').value;
        if (fullPath) {
            var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
            var filename = fullPath.substring(startIndex);
            if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                filename = filename.substring(1);
            }
            var fileLabel= document.getElementById('fileLabel');
            fileLabel.innerHTML=filename;
        }
    }


</script>

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
<?php
/*invalid password*/
if($_SESSION['errorForm']==1){
    echo "<script type=\"text/javascript\">$(document).ready(function() {\$('#passModal').modal('show');validatePass() });</script>" ;
    $_SESSION['errorForm']=0;
}
?>