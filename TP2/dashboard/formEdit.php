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
$grade['grade']="--";
if ($db->connect()) {
/*$image = 'public/img/avatar1.png';
$imageData = base64_encode(file_get_contents($image));
$db->insert($imageData);*/
    $user = $db->getUser($username);
    $connected = true;
    $queryInfo = pg_fetch_assoc($user);
    if($queryInfo["role"] == 0){/*Aluno*/
        $totalQuery = $db->getTotalCoursesStudent($username);
        $gradeQuery = $db->getStudentGrade($username);
        $total = pg_fetch_assoc($totalQuery);
        $grade = pg_fetch_assoc($gradeQuery);

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




?>

<div class="container-fluid">
    <div class="justify-content-center m-4">

        <div class="row">
            <div class="col-lg-4 m-1">
                <div class="profile-card-4 z-depth-3">
                    <div class="card">
                        <div class="card-body text-center bg-primary rounded-top">
                            <div class="user-box">
                            <?php if ($queryInfo['image']!=null){
                                $src = 'data:jpg;base64,'.$queryInfo['image'];
                                echo '<img src="'.$src.'">';
                            } else{
                                echo "<img src=\"/public/img/avatar.png\" alt=\"user avatar\">";
                            }?>
                            </div>
                            <h5 class="mb-1 text-white"><?php echo $queryInfo['name']?></h5>
                            <h6 class="text-light"><?php echo role($queryInfo['role']) ?></h6>
                        </div>
                        <div class="card-body">
                                <div class="list-group-item d-flex flex-row justify-content-center">
  
                                    <div class="list-details m-2">
                                    <i class="fas fa-phone"></i> <span><?php echo $queryInfo['phone']?></span>
                                    </div>

                                    <div class="list-details m-2">
                                    <i class="fa fa-envelope"></i><span> <?php echo $queryInfo['email']?></span>
                                    </div>
                                </div>
                           
                            <div class="row text-center mt-4">
                                <div class="col p-2">
                                    <h4 class="mb-1 line-height-5"><?php echo $total['count'];?></h4>
                                    <small class="mb-0 font-weight-bold">Cursos</small>
                                </div>
                                <div class="col p-2">
                                    <h4 class="mb-1 line-height-5"><?php echo $grade['grade'];?></h4>
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


