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
    $users = $db->getAllStudentsTeacher($aux['username']);
    $connected = true;

    /*Se tiver no link o ?username=....*/
    if($_GET){

    }

} else
    Alerts::showError(Alerts::DATABASEOFF);




?>

<!--Se tiver no link o ?username=.... mostra um modal para visualizar o perfil-->
<?php if($_GET && $connected):?>
    <!-- Modal -->
    <div class="modal fade "  id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog-full-width modal-dialog momodel modal-fluid modal-dialog-centered" role="document"  >
            <div class="modal-content-full-width modal-content "  >
                <div class="modal-header-full-width   modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="removeGetUrl()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" >
                    <!--Modal-->
                    <?php include_once(dirname(__FILE__) . "/templates/viewProfile.php");?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="removeGetUrl()">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php
endif;?>

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
                            echo                "<img class=\"rounded-circle\" src=\"public/img/users/".$row['image'] ."\" alt=\"User Avatar\">";/*AVATAR*/
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
                            echo         "<button data-toggle=\"tooltip\" data-placement=\"bottom\" title=\"Ver Perfil\" class=\"info btn btn-success btn-circle btn-md\" onclick=\"location.href='?username=".$row['username']."'\"><i class=\"fas fa-user-circle\" ></i></button>";
                            echo        "<span data-toggle='modal' data-target='#modalRegisterForm'>
                            <button  data-toggle='tooltip' data-placement='bottom' title='Atribuir Nota' onclick='myFunction(" . $count . ")' type='button' class='info btn btn-success btn-circle btn-md'  >
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
        console.log("ola")
        var x = document.getElementsByClassName("widget-user-username");
        document.getElementById('usernam').value = x[indice - 1].innerHTML;

    }
</script>

<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>

<script type='text/javascript'>
    $("#exampleModalLong").modal()

    function removeGetUrl(){
        window.history.replaceState(null, null, window.location.pathname);
    }
</script>