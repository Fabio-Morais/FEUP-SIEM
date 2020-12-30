<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>

<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>

<?php include_once(dirname(__FILE__) . "/dataBase/dataBase.php");
$db = DataBase::Instance();
$user = "";
$connected = false;
if ($db->connect()) {
    $user = $db->getUser($_SESSION['user']);
    $queryInfo = pg_fetch_assoc($user);
}
$image = (!empty($queryInfo['image'])==true) ? "users/".$queryInfo['image'] : "";
if(empty($image)){
    if($queryInfo['gender']=='f')
        $image="avatarGirl.png";
}
?>


    <div class="container-fluid">
        <div class="justify-content-center m-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body"  >

                    <h1 class="h3 mb-3">Messages</h1>

                    <div class="card">
                        <div class="row g-0">
                            <div class="col-12 col-lg-5 col-xl-3 border-right">
                                <!-- SEARCH-->
                                <div class="px-4 d-none d-md-block">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <input type="text" class="form-control my-3" placeholder="Search...">
                                        </div>
                                    </div>
                                </div>
                                <!-- Names, left side-->
                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="badge bg-success float-right">5</div>
                                    <div class="d-flex align-items-start">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar5.png" class="rounded-circle mr-1" alt="Vanessa Tucker" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            Vanessa Tucker
                                        </div>
                                    </div>
                                </a>
                                <a href="#" class="list-group-item list-group-item-action border-0">
                                    <div class="badge bg-success float-right">2</div>
                                    <div class="d-flex align-items-start">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="rounded-circle mr-1" alt="William Harris" width="40" height="40">
                                        <div class="flex-grow-1 ml-3">
                                            William Harris
                                        </div>
                                    </div>
                                </a>

                                <hr class="d-block d-lg-none mt-1 mb-0">
                            </div>
                            <div class="col-12 col-lg-7 col-xl-9">
                                <div class="py-2 px-4 border-bottom d-none d-lg-block">
                                    <div class="d-flex align-items-center py-1">
                                        <div class="position-relative">
                                            <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                        </div>
                                        <div class="flex-grow-1 pl-3" >
                                            <strong>Fábio Morais</strong>
                                            <div class="text-muted small"><em></em></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="position-relative">
                                    <div class="chat-messages p-4" id="nameTo" data-from="fabio123" data-to="fabiouds" data-image="<?php echo $image ?>">

                                        <div class="chat-message-right pb-4">
                                            <div>
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="rounded-circle mr-1" alt="Chris Wood" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">2:33 am</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                <div class="font-weight-bold mb-1">You</div>
                                                Lorem ipsum dolor sit amet, vis erat denique in, dicunt prodesset te vix.
                                            </div>
                                        </div>

                                        <div class="chat-message-left pb-4">
                                            <div>
                                                <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="rounded-circle mr-1" alt="Sharon Lessman" width="40" height="40">
                                                <div class="text-muted small text-nowrap mt-2">2:34 am</div>
                                            </div>
                                            <div class="flex-shrink-1 bg-light rounded py-2 px-3 ml-3">
                                                <div class="font-weight-bold mb-1">Sharon Lessman</div>
                                                Sit meis deleniti eu, pri vidit meliore docendi ut, an eum erat animal commodo.
                                            </div>
                                        </div>





                                    </div>
                                </div>

                                <div class="flex-grow-0 py-3 px-4 border-top">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="textMessage" placeholder="Type your message">
                                        <button class="btn btn-primary" onclick="sendMessage()">Send</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


<?php require_once(dirname(__FILE__) . "/templates/common/footer.php"); ?>


