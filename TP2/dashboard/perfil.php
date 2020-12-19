<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>
<?php require_once(dirname(__FILE__) . "/includes/common/alerts.php"); ?>


<?php

$username = $aux['username'];

include_once(dirname(__FILE__) . "/dataBase/dataBase.php");
/*Para retirar a visibilidade do erro*/
/*error_reporting(E_ERROR | E_PARSE);*/
$db = DataBase::Instance();
$user = "";
$connected = false;


$total['count'] = "--";
$grade['grade'] = "--";

if ($db->connect()) {
  /*$image = 'public/img/avatar1.png';
$imageData = base64_encode(file_get_contents($image));
$db->insert($imageData);*/
  $user = $db->getUser($username);
  $connected = true;
  $queryInfo = pg_fetch_assoc($user);
  if ($queryInfo["role"] == 0) {/*Aluno*/
    $totalQuery = $db->getTotalCoursesStudent($username);
    $gradeQuery = $db->getStudentGrade($username);
    $coursesQuery = $db->getCoursesStudent($username);
    $total = pg_fetch_assoc($totalQuery);
    $grade = pg_fetch_assoc($gradeQuery);
    $courses = pg_fetch_assoc($coursesQuery);
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
?>

<?php if ($connected) : ?>
  <div class="container-fluid">
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