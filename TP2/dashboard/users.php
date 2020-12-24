<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>

<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>
<?php require_once(dirname(__FILE__) . "/includes/common/alerts.php");
?>

<?php include_once(dirname(__FILE__) . "/dataBase/dataBase.php");
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();
$users = "";
$connected = false;

if ($db->connect()) {
    $users = $db->getAllUsers();
    $connected = true;
} else
    Alerts::showError(Alerts::DATABASEOFF);
if(isset($_SESSION['add']))
    echo $_SESSION['add'];
    $_SESSION['add']=NULL;
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
}
?>

<div class="container-fluid">
    <div class="justify-content-center m-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <!--Barra de pesquisa-->
                <div class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2">
                    <i class="fas fa-search" aria-hidden="true"></i>
                    <input class="form-control form-control-sm ml-2 w-75" type="text" placeholder="Search" aria-label="Search" id="myInput" name="search">
                </div>
                <div class="d-flex flex-wrap no-gutters justify-content-around" id="jar" style="display:none">
                    <?php
                    if ($connected) :
                        $row = pg_fetch_assoc($users);
                        while (isset($row["username"])) {
                            /*Obter numero de cursos*/
                            $courses = "--";
                            if($row["role"]==0){
                                $totalCourses = $db->getTotalCoursesStudent($row["username"]);
                                $row2 = pg_fetch_assoc($totalCourses);
                                if (isset($row2["count"]))
                                    $courses = strval($row2["count"]);
                            }
                             if($row["role"]==1) {
                                 $totalQuery = $db->getTotalCoursesTeacher($row["username"]);
                                 $total = pg_fetch_assoc($totalQuery);
                                 $courses=$total['count'];
                             }
                            /*Obter nota do estudante*/
                            $grade = $db->getStudentGrade($row["username"]);
                            $row3 = pg_fetch_assoc($grade);
                            $grade = "--";
                            if (isset($row3["grade"]) && $row3["grade"] > 0.0)
                                $grade = sprintf("%.1f", $row3["grade"]);

                            echo "<div class=\"p-2 m-3 content\">";
                            echo "   <div class=\"hovereffect\">";
                            echo       "<div class=\"contentSearch box box-widget widget-user\">";
                            echo            "<div class=\"widget-user-header \" style=\"background-color:".((empty($row["color"])) ? "#8585d3" : $row["color"])."\">";
                            echo                "<h3 class=\"widget-user-username text-center\">" . $row['username'] . "</h3>";/*USERNAME*/
                            echo            "</div>";
                            echo            "<div class=\"widget-user-image\">";
                            echo                "<img class=\"rounded-circle\" src=\"public/img/users/".$row['image'] ."\" alt=\"User Avatar\" onerror=\"javascript:this.src='public/img/avatar.png'\">";/*AVATAR*/
                            echo            "</div>";
                            echo            "<div class=\"box-footer \">";
                            echo               "<h5 class=\"widget-user-desc text-center \">" . role($row['role']) . "</h5>";/*ALUNO/PROFESSOR/ADMIN*/
                            echo                "<div class=\"row\">";
                            echo                    "<div class=\"col-sm\">";
                            echo                        "<div class=\"description-block text-center\">";
                            echo                            "<h5 class=\"description-header\">" . $courses . "</h5>";/*CURSOS*/
                            echo                            "<span class=\"description-text\">Cursos</span>";
                            echo                       "</div>";
                            echo                 "</div>";

                            echo                 "<div class=\"col-sm\">";
                            echo                     "<div class=\"description-block\">";
                            echo                         "<h5 class=\"description-header\">" . $grade . "</h5>";/*NOTA*/
                            echo                         "<span class=\"description-text\">Nota</span>";
                            echo                     "</div>";
                            echo                 "</div>";
                            echo             "</div>";
                            echo         "</div>";
                            echo     "</div>";
                            echo     "<div class=\"overlay\">";
                            echo         "<h2>" . $row['username'] . "</h2>";/*USERNAME*/
                            echo         "<button class=\"info btn btn-success btn-circle btn-md\" onclick=\"location.href='formEdit.php?username=".$row['username']."'\"><i class=\"fas fa-pencil-alt\"></i></button>";
                            echo         "<button class=\"info btn btn-danger btn-circle btn-xl\" onclick=\"location.href='action/actionDeleteUser.php?username=".$row['username']."'\"><i class=\"far fa-trash-alt\"></i></button>";

                            echo     "</div>";
                            echo "</div>";


                            echo "</div>";
                            $row = pg_fetch_assoc($users);
                        }
                    endif;
                    ?>

                </div>
                <div class="pagination">
                </div>
            </div>
        </div>
    </div>
</div>

<!--Modal de registar novo user-->
<?php include_once(dirname(__FILE__) . "/formCreateUser.php"); ?>


<!--Botao de registar novo user-->
<button type="button" class="btn btn-success btn-circle btn-xl" id="addUser" data-toggle="modal" data-target="#modalRegisterForm"><i class="fas fa-plus"></i></button>

<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>
<?php
if($_SESSION['errorForm']==1){
    echo "<script type=\"text/javascript\">$(document).ready(function() {\$('#modalRegisterForm').modal('show'); });</script>" ;
    $_SESSION['errorForm']=0;
}
?>
