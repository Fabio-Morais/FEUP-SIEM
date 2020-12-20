<!--
**Template para a pagina alunos.php, ou para o admin ver o perfil dos users**

Parametros db:
    -$db

Parametros para perfil:
    -$queryInfo['name']
    -$queryInfo['phone']
    -$queryInfo['email']
    -$queryInfo['count']
    -$queryInfo['grade']
    -$courses['coursename']
    -$coursesQuery
-->

<?php
/*Informação do user*/
$user = $db->getUser($_GET['username']);
$queryInfo = pg_fetch_assoc($user);
$totalQuery = $db->getTotalCoursesStudent($_GET['username']);
$gradeQuery = $db->getStudentGrade($_GET['username']);
$coursesQuery = $db->getCoursesStudent($_GET['username']);
$total = pg_fetch_assoc($totalQuery);
$grade = pg_fetch_assoc($gradeQuery);
$courses = pg_fetch_assoc($coursesQuery);
?>

<div class="container-fluid" >
    <div class="justify-content-center m-4">
        <div class="row">
            <div class="col-lg-4 m-1">
                <div class="profile-card-4 z-depth-3">
                    <div class="card">
                        <div class="card-body text-center bg-primary rounded-top">
                            <div class="user-box">
                                <img  src="/public/img/users/<?php echo $queryInfo['image']?>" alt="user avatar">
                            </div>
                            <h5 class="mb-1 text-white"><?php echo  $queryInfo['name'] ?></h5>
                            <h6 class="text-light">Aluno</h6>
                        </div>
                        <div class="card-body">
                            <div class="list-group-item d-flex flex-row justify-content-center">

                                <div class="list-details m-2 text-center">
                                    <i class="fas fa-phone  fa-lg text-gray-300"></i> <span><?php echo $queryInfo['phone'] ?></span>
                                </div>

                                <div class="list-details m-2 text-center" >
                                    <i class="fa fa-envelope  fa-lg text-gray-300"></i><span> <?php echo $queryInfo['email'] ?></span>
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
                        </ul>
                        <div class="tab-content p-3">
                            <div class="tab-pane active show" id="profile">
                                <h5 class="mb-3">Perfil</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Username</h6>
                                        <p><?php echo $queryInfo['username'];?></p>
                                        <h6>About</h6>
                                        <p>
                                            Web Designer, UI/UX Engineer
                                        </p>
                                        <h6>Hobbies</h6>
                                        <p>
                                            Indie music, skiing and hiking. I love the great outdoors.
                                        </p>
                                        <h6>Data de nascimento</h6>
                                        <p><?php echo $queryInfo['birthdate']?></p>

                                    </div>
                                    <div class="col-md-6">
                                        <h6>Cursos:</h6>
                                        <?php while (isset($courses["coursename"])) {
                                            echo "<a class=\"badge badge-dark text-uppercase m-1\"> " . $courses['coursename'] . " </a>";
                                            $courses = pg_fetch_assoc($coursesQuery);
                                        }
                                        ?>
                                        <h6>Email</h6>
                                        <p><?php echo $queryInfo['email'] ?></p>
                                        <h6>Telemóvel</h6>
                                        <p>
                                            <?php echo $queryInfo['phone'] ?>
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
