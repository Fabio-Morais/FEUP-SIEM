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
$courses = "";
$connected = false;
if ($db->connect()) {
    $users = $db->getAllStudentsTeacher("fabiouds");
    $connected = true;
} else
    Alerts::showError(Alerts::DATABASEOFF);


if($_GET){
    $user = $db->getUser($_GET['username']);
    $connected = true;
    $queryInfo = pg_fetch_assoc($user);
    if ($queryInfo["role"] == 0) {/*Aluno*/
        $totalQuery = $db->getTotalCoursesStudent($_GET['username']);
        $gradeQuery = $db->getStudentGrade($_GET['username']);
        $coursesQuery = $db->getCoursesStudent($_GET['username']);
        $total = pg_fetch_assoc($totalQuery);
        $grade = pg_fetch_assoc($gradeQuery);
        $courses = pg_fetch_assoc($coursesQuery);
    } else if ($queryInfo["role"] == 1) {
        $totalQuery = $db->getTotalCoursesTeacher($_GET['username']);
        $total = pg_fetch_assoc($totalQuery);
        $coursesQuery = $db->getCoursesTeacher($_GET['username']);
        $courses = pg_fetch_assoc($coursesQuery);
    }
}

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
<?php if($_GET):?>
    <!-- Modal -->
    <div class="modal fade "  id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document"  >
            <div class="modal-content-full-width modal-content "  >
                <div class="modal-header-full-width   modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <div class="container-fluid" >
                        <div class="justify-content-center m-4">
                            <div class="row">
                                <div class="col-lg-4 m-1">
                                    <div class="profile-card-4 z-depth-3">
                                        <div class="card">
                                            <div class="card-body text-center bg-primary rounded-top">
                                                <div class="user-box">
                                                    <img src="/public/img/avatar.png" alt="user avatar">
                                                </div>
                                                <h5 class="mb-1 text-white"><?php echo  $queryInfo['name'] ?></h5>
                                                <h6 class="text-light"><?php echo role($queryInfo['role']) ?></h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="list-group-item d-flex flex-row justify-content-center">

                                                    <div class="list-details m-2">
                                                        <i class="fas fa-phone"></i> <span><?php echo $queryInfo['phone'] ?></span>
                                                    </div>

                                                    <div class="list-details m-2">
                                                        <i class="fa fa-envelope"></i><span> <?php echo $queryInfo['email'] ?></span>
                                                    </div>
                                                </div>
                                                <div class="row text-center mt-4">
                                                    <div class="col p-2">
                                                        <h4 class="mb-1 line-height-5"> <?php echo $total['count'] ?></h4>
                                                        <small class="mb-0 font-weight-bold">Cursos</small>
                                                    </div>
                                                    <div class="col p-2">
                                                        <h4 class="mb-1 line-height-5"> <?php echo $grade['grade'] ?></h4>
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
                                                            <h6>About</h6>
                                                            <p>
                                                                Web Designer, UI/UX Engineer
                                                            </p>
                                                            <h6>Hobbies</h6>
                                                            <p>
                                                                Indie music, skiing and hiking. I love the great outdoors.
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
                                                        <div class="col-md-12">
                                                            <h5 class="mt-2 mb-3"><i class="far fa-clock float-right"></i> Recent Activity</h5>
                                                            <table class="table table-hover table-striped">
                                                                <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <strong>Abby</strong> joined ACME Project Team in <strong>`Collaboration`</strong>
                                                                    </td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <!--/row-->
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php
endif;?>


<div class="container-fluid">
    <div class="justify-content-center m-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <!--Barra de pesquisa-->
                <form class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2">
                    <i class="fas fa-search" aria-hidden="true"></i>
                    <input class="form-control form-control-sm ml-2 w-75" type="text" placeholder="Search" aria-label="Search" id="myInput">
                </form>
                <div class="d-flex flex-wrap no-gutters justify-content-around" id="jar" style="display:none">
                    <?php
                    if ($connected) :
                        $row = pg_fetch_assoc($users);
                        $count = 0;
                        while (isset($row["username"])) {
                            $count++;
                            /*Obter numero de cursos*/
                            $totalCourses = $db->getTotalCoursesStudent($row["username"]);
                            $row2 = pg_fetch_assoc($totalCourses);
                            $courses = "--";
                            if (isset($row3["count"]))
                                $courses = strval($row3["count"]);


                            echo "<div class=\"p-2 m-3 content\">";
                            echo "   <div class=\"hovereffect\">";
                            echo       "<div class=\"box box-widget widget-user\">";
                            echo            "<div class=\"widget-user-header bg-aqua\">";
                            echo                "<h3 class=\"widget-user-username text-center\">" . $row['username'] . "</h3>";/*USERNAME*/
                            echo            "</div>";
                            echo            "<div class=\"widget-user-image\">";
                            echo                "<img class=\"rounded-circle\" src=\"https://bootdey.com/img/Content/avatar/avatar1.png\" alt=\"User Avatar\">";/*AVATAR*/
                            echo            "</div>";
                            echo            "<div class=\"box-footer \">";
                            echo               "<h5 class=\"widget-user-desc text-center \">" . "Aluno" . "</h5>";/*ALUNO/PROFESSOR/ADMIN*/
                            echo                "<div class=\"row\">";
                            echo                    "<div class=\"col-sm\">";
                            echo                        "<div class=\"description-block text-center\">";
                            echo                            "<h5 class=\"description-header\">" . $courses . "</h5>";/*CURSOS*/
                            echo                            "<span class=\"description-text\">Cursos</span>";
                            echo                       "</div>";
                            echo                 "</div>";

                            echo                 "<div class=\"col-sm\">";
                            echo                     "<div class=\"description-block\">";
                            echo                         "<h5 class=\"description-header\">" . $row["grade"] . "</h5>";/*NOTA*/
                            echo                         "<span class=\"description-text\">Nota</span>";
                            echo                     "</div>";
                            echo                 "</div>";
                            echo             "</div>";
                            echo         "</div>";
                            echo     "</div>";
                            /*OVERLAY -> ao passar o rato*/
                            echo     "<div class=\"overlay\">";
                            echo         "<h2>" . $row['username'] . "</h2>";/*USERNAME*/
                            echo         "<button class=\"info btn btn-success btn-circle btn-md\" onclick=\"location.href='?username=".$row['username']."'\"><i class=\"fas fa-user-circle\"></i></button>";
                            echo         "<button onclick=\"myFunction(" . $count . ")\" type=\"button\" class=\"info btn btn-success btn-circle btn-md\"  data-toggle=\"modal\" data-target=\"#modalRegisterForm\"><i class=\"far fa-edit\"></i></button>";
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
<div class="modal fade " id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="card bg-light ">
                <article class="card-body mx-auto ">
                    <h4 class="card-title mt-3 text-center">Atribuir Nota </h4>
                    <form method="POST" action="action/actionAddGradeStudent.php">
                        <div class="form-group input-group mt-3 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fas fa-user"></i> </span>
                            </div>
                            <input name="user" class="form-control" placeholder="Nota" type="text" id="usernam" readonly="readonly" >

                        </div>
                        <div class="form-group input-group mt-3 ">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fas fa-user-graduate"></i> </span>
                            </div>
                            <input name="grade" class="form-control" placeholder="Nota" type="number" min="0" max="20" required>
                        </div>
                        <select class="form-control mb-3" name="course">
                            <?php

                                $coursesTeacer = $db->getCoursesTeacher("fabiouds");
                                $row = pg_fetch_assoc($coursesTeacer);
                                while (isset($row["coursename"])) {
                                    echo " <option  selected>" . $row['coursename'] . "</option>";
                                    $row = pg_fetch_assoc($coursesTeacer);
                                }


                            ?>

                        </select>


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Enviar Nota </button>
                        </div>
                    </form>
                </article>
            </div> <!-- card.// -->

        </div>
    </div>
</div>
<script>
    function myFunction(indice) {
        var x = document.getElementsByClassName("widget-user-username");
        document.getElementById('usernam').value = x[indice - 1].innerHTML;

    }
</script>

<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>

<script type='text/javascript'>
    $("#exampleModalLong").modal()
</script>