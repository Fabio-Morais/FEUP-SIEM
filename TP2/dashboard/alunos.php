<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>
<?php require_once(dirname(__FILE__) . "/includes/common/functions.php");
?>
<?php
$db = DataBase::Instance();
$users = "";
$courses = "";
$connected = false;
if ($db->connect()) {
    $users = $db->getAllStudentsTeacher($_SESSION['user']);
    $connected = true;
} else
    Alerts::showError(Alerts::DATABASEOFF);

?>


<?php


?>
<!--Lista de alunos-->
<div class="container-fluid">
    <div class="justify-content-center m-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <!--Barra de pesquisa-->
                <form class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2">
                    <i class="fas fa-search" aria-hidden="true"></i>
                    <input class="form-control form-control-sm ml-2 w-75" type="text" placeholder="Search" aria-label="Search" id="myInput">
                </form>
                <div class="d-flex flex-wrap no-gutters justify-content-start " id="jar" style="display:none">
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
                            if (isset($row2["count"]))
                                $courses = strval($row2["count"]);

                            /*Obter nota do estudante*/
                            $average = $db->getStudentAverage($row["username"]);
                            $row3 = pg_fetch_assoc($average);
                            $grade = "--";
                            if (isset($row3["avg"]) && $row3["avg"] > 0.0)
                                $grade = sprintf("%.1f", $row3["avg"]);


                            echo "<div class=\"p-2 m-3 content \">";
                            echo "   <div class=\"hovereffect\">";
                            echo       "<div class=\"contentSearch box box-widget widget-user\">";
                            echo            "<div class=\"widget-user-header\" style=\"background-color:". ((empty($row["color"])) ? "#8585d3" : $row["color"])."\">";
                            echo                "<h3 class=\"widget-user-username text-center textAdapt \">" . $row['username'] . "</h3>";/*USERNAME*/
                            echo            "</div>";
                            echo            "<div class=\"widget-user-image\">";
                            echo                "<img class=\"rounded-circle\" src=\"public/img/".getImage($row) ."\" alt=\"User Avatar\" onerror=\"javascript:this.src='public/img/avatar.png'\">"; /*AVATAR*/
                            echo            "</div>";
                            echo            "<div class=\"box-footer \">";
                            echo               "<h5 class=\"widget-user-desc text-center  \">" . "Aluno" . "</h5>";/*ALUNO/PROFESSOR/ADMIN*/
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
                            echo                         "<span class=\"description-text\">Média</span>";
                            echo                     "</div>";
                            echo                 "</div>";
                            echo             "</div>";
                            echo         "</div>";
                            echo     "</div>";
                            /*OVERLAY -> ao passar o rato*/
                            echo     "<div class=\"overlay\">";
                            echo         "<h2>" . $row['username'] . "</h2>";/*USERNAME*/
                            echo         "<span data-toggle='modal' data-target='#exampleModalLong'><button data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Ver Perfil\" class=\"info btn btn-success btn-circle btn-md\" onclick=\"showStudentInfo('". $row['username'] ."')\"><i class=\"fas fa-user-circle\" ></i></button></span>";
                            echo        "<span data-toggle='modal' data-target='#modalGradeForm'>
                            <button  data-toggle='tooltip' data-placement='bottom' title='Atribuir Nota' onclick='getStudent(\"".$_SESSION['user']."\",\"" . $row['username'] . "\")' type='button' class='info btn btn-success btn-circle btn-md'  >
                            <i class='far fa-edit'></i>
                            </button></span>";
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
<div class="modal fade " id="modalGradeForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <select class="form-control mb-3" name="course" id="courseOptions" required>
                            <!-- OPTIONS HERE -->

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

<!-- Modal Student -->
<div class="modal fade "  id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog-full-width modal-dialog momodel modal-fluid modal-dialog-centered" role="document"  >
        <div class="modal-content-full-width modal-content "  >
            <div class="modal-header-full-width   modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" >
                <!--Modal-->
                <div class="container-fluid" >
                    <div class="justify-content-center m-4">
                        <div class="row">
                            <div class="col-lg-4 m-1">
                                <div class="profile-card-4 z-depth-3">
                                    <div class="card">
                                        <div class="card-body text-center rounded-top" id="modalColor" style="background-color:#8585d3">
                                            <div class="user-box">
                                                <img  src="public/img/users/" alt="user avatar" onerror="javascript:this.src='public/img/avatar.png'">
                                            </div>
                                            <h5 class="mb-1 textAdapt "><!-- USERNAME HERE --></h5>
                                            <h6 class="textAdapt">Aluno</h6>
                                        </div>
                                        <div class="card-body">
                                            <div class="list-group-item d-flex flex-wrap flex-row justify-content-center" >

                                                <div class="list-details m-2 text-center d-flex flex-row flex-wrap justify-content-center" >
                                                    <div class="mr-2"><i class="fas fa-phone fa-lg"></i></div>
                                                    <div class="mr-2 mt-2"><span class="modalPhone"><!-- PHONE HERE --></span></div>
                                                </div>

                                                <div class="list-details m-2 text-center d-flex flex-row flex-wrap justify-content-center" >
                                                    <div class="ml-2"><i class="fa fa-envelope fa-lg"></i></div>
                                                    <div class="ml-2 mt-2"><span  class="modalEmail"> <!-- EMAIL HERE --></span></div>
                                                </div>
                                            </div>

                                            <div class="row text-center mt-4">
                                                <div class="col p-2">
                                                    <h4 class="mb-1 line-height-5" id="countCourse"> <!-- COUNT COURSE HERE --></h4>
                                                    <small class="mb-0 font-weight-bold">Cursos</small>
                                                </div>
                                                <div class="col p-2">
                                                    <h4 class="mb-1 line-height-5" id="grade"> <!-- GRADE HERE --></h4>
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
                                        </ul>
                                        <div class="tab-content p-3">
                                            <div class="tab-pane active show" id="profile">
                                                <h5 class="mb-3">Perfil</h5>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h6>Username</h6>
                                                        <p id="modalUser"><!-- USERNAME HERE --></p>
                                                        <h6>Sobre</h6>
                                                        <p id="modalAbout">
                                                            <!-- ABOUT HERE -->
                                                        </p>
                                                        <h6>Atividades</h6>
                                                        <p id="modalHobbies">
                                                            <!-- HOBBIES HERE -->
                                                        </p>
                                                        <h6>Data de nascimento</h6>
                                                        <p id="modalDate">teste</p>

                                                    </div>
                                                    <div class="col-md-6">
                                                        <h6 id="modalCoursesBadge">Cursos/Nota:</h6>

                                                        <h6 >Email</h6>
                                                        <p class="modalEmail"><!-- EMAIL HERE --></p>
                                                        <h6 >Telemóvel</h6>
                                                        <p class="modalPhone">
                                                            <!-- PHONE HERE -->
                                                        </p>
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


<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>
<script>
    autoTextColor();
    pagFunc(0)
</script>