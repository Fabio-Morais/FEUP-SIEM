
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
                <form class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2">
                    <i class="fas fa-search" aria-hidden="true"></i>
                    <input class="form-control form-control-sm ml-2 w-75" type="text" placeholder="Search" aria-label="Search" id="myInput">
                </form>
                <div class="d-flex flex-wrap no-gutters justify-content-around" id="jar" style="display:none">
                    <?php
                    if ($connected) :
                        $row = pg_fetch_assoc($users);
                        while (isset($row["username"])) {
                            /*Obter numero de cursos*/
                            $totalCourses = $db->getTotalCoursesStudent($row["username"]);
                            $row2 = pg_fetch_assoc($totalCourses);
                            $courses = "--";
                            if (isset($row2["count"]))
                                $courses = strval($row2["count"]);

                            /*Obter nota do estudante*/
                            $grade = $db->getStudentGrade($row["username"]);
                            $row3 = pg_fetch_assoc($grade);
                            $grade = "--";
                            if (isset($row3["grade"]) && $row3["grade"] > 0.0)
                                $grade = sprintf("%.1f", $row3["grade"]);
                                
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
<div class="modal fade " id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="card bg-light ">
                <article class="card-body mx-auto" style="max-width: 400px;">
                    <h4 class="card-title mt-3 text-center">Criar Conta</h4>
                    <form method = "POST" action = "/action/actionInsertUser.php">
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input name="name" class="form-control" placeholder="Nome Completo" type="text">
                        </div> <!-- form-group// -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                            </div>
                            <input name="email" class="form-control" placeholder="Email" type="email">
                        </div> <!-- form-group// -->

                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                            </div>
                            <select class="form-control" name="role">
                                <option selected="" value="0"> Aluno</option>
                                <option value="1">Professor</option>
                                <option value="2">Admin</option>
                            </select>
                        </div> <!-- form-group end.// -->
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                            </div>
                            <input class="form-control" placeholder="Username" type="text" name="userName">
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

<!--Botao de registar novo user-->
<button type="button" class="btn btn-success btn-circle btn-xl" id="addUser" data-toggle="modal" data-target="#modalRegisterForm"><i class="fas fa-plus"></i></button>

<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>