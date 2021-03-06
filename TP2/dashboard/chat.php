<?php require_once(dirname(__FILE__) . "/templates/common/header.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/navbar.php"); ?>
<?php require_once(dirname(__FILE__) . "/templates/common/title.php"); ?>
<?php require_once(dirname(__FILE__) . "/includes/common/functions.php"); ?>

<?php
$db = DataBase::Instance();
$user = "";
$connected = false;
if ($db->connect()) {
    $user = $db->getUser($_SESSION['user']);
    $queryInfo = pg_fetch_assoc($user);
    if ($_SESSION['role'] == 0) {// if the user is a student
        $chatPeopleQuery = $db->getTeachersStudent($_SESSION['user']);//get all the teachers that have
    } else if ($_SESSION['role'] == 1) {//if a user is a teacher
        $chatPeopleQuery = $db->getAllStudentsTeacher($_SESSION['user']);//get all the students that have
    }
    $chatPeople = pg_fetch_assoc($chatPeopleQuery);
    if (isset($chatPeople)) {
        $firstElement = $chatPeople;
    }
} else
    Alerts::showError(Alerts::DATABASEOFF);


?>


<div class="container-fluid">
    <div class="justify-content-center m-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <h1 class="h3 mb-3">Mensagens</h1>
                <div class="card">
                    <div class="row g-0">
                        <div class="col-12 col-lg-5 col-xl-3 border-right usersSide customScrollBar">
                            <!-- SEARCH-->
                            <div class="px-4 d-none d-md-block">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <input type="text" class="form-control my-3" placeholder="Search..."
                                               id="searchUsers">
                                    </div>
                                </div>
                            </div>
                            <?php while (isset($chatPeople['username'])): ?>
                                <?php
                                $first = "";
                                /*add the class to the last element, with that we can select the first user that appear in the left chat*/
                                if (strcmp($chatPeople['username'], $firstElement['username']) == 0) {
                                    $first = " bg-light-custom";
                                } ?>
                                <!-- Names, left side-->
                                <a type="button" onclick="selectChat(this)"
                                   class="content list-group-item list-group-item-action border-0<?php echo $first ?>"
                                   data-username="<?php echo $chatPeople['username'] ?>"
                                   id="<?php echo $chatPeople['username'] ?>">
                                    <div class="badge float-right unseenMessages p-1 mt-2" style="display: none">0</div>
                                    <div class="d-flex align-items-start">
                                        <img src="public/img/<?php echo getImage($chatPeople) ?>"
                                             class="rounded-circle mr-1 userImageChat" width="40" height="40"
                                             onerror="javascript:this.src='public/img/avatar.png'">
                                        <div class="d-flex flex-column">
                                            <div class="flex-grow-1 ml-3 " id="nameLeftSide">
                                                <?php echo $chatPeople['name'] ?>
                                            </div>
                                            <div class="flex-grow-1 ml-3">
                                                (<?php echo $chatPeople['username'] ?>)
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <?php
                                $chatPeople = pg_fetch_assoc($chatPeopleQuery);
                            endwhile;
                            ?>
                            <hr class="d-block d-lg-none mt-1 mb-0">
                        </div>
                        <!-- CONVERSATION START HERE-->
                        <div class="col-12 col-lg-7 col-xl-9 ">
                            <div class="py-2 px-4 border-bottom d-none d-lg-block ">
                                <div class="d-flex align-items-center py-1">
                                    <div class="position-relative">
                                        <?php if(!isset($firstElement)):?>
                                        <img id="topImageUser" src="public/img/<?php echo getImage($firstElement) ?>"
                                             class="rounded-circle mr-1 userImageChat" width="40"
                                             height="40" onerror="javascript:this.src='public/img/avatar.png'">
                                        <?php endif;?>
                                    </div>
                                    <div class="flex-grow-1 pl-3">
                                        <strong><?php echo isset($firstElement['name']) ? $firstElement['name'] : "" ?></strong>
                                        <div class="text-muted small"><em></em></div>
                                    </div>
                                </div>
                            </div>
                            <div class="position-relative">
                                <div class="chat-messages p-4 customScrollBar " id="nameTo"
                                     data-from="<?php echo $_SESSION['user'] ?>"
                                     data-to="<?php echo $firstElement['username'] ?>"
                                     data-image="<?php echo getImage($queryInfo) ?>">
                                    <?php
                                    if(isset($firstElement['username'])){
                                        $messagesQuery = $db->getAllMessagesFromUser($_SESSION['user'], $firstElement['username']);
                                        $messages = pg_fetch_assoc($messagesQuery);
                                    }
                                    $id = 0;
                                    while (isset($messages['message'])):
                                        ?>
                                        <?php
                                        if (strcmp($messages['userfrom'], $_SESSION['user']) == 0) {
                                            $leftRitght = "chat-message-right";
                                            $from = "you";
                                            $image = getImage($queryInfo);
                                        } else {
                                            $leftRitght = "chat-message-left";
                                            $from = $firstElement['name'];
                                            $image = getImage($firstElement);
                                        }

                                        ?>
                                        <!-- PRINT ALL THE MESSAGES HERE-->
                                        <div class="<?php echo $leftRitght; ?> pb-4 chatMessage"
                                             id="<?php echo $messages['id'] ?>">
                                            <div>
                                                <img src="public/img/<?php echo $image ?>"
                                                     class="rounded-circle mr-1 userImageChat"
                                                     width="40" height="40"
                                                     onerror="javascript:this.src='public/img/avatar.png'">
                                            </div>
                                            <div>
                                                <div class="flex-shrink-1 bg-light rounded py-2 px-3 mr-3">
                                                    <div class="font-weight-bold mb-1"><?php echo $from ?></div>
                                                    <?php echo $messages['message'] ?>
                                                </div>
                                                <div class="text-muted small text-nowrap mt-2"><?php echo $messages['messagedate'] ?></div>
                                            </div>
                                        </div>


                                        <?php
                                        $messages = pg_fetch_assoc($messagesQuery);
                                    endwhile;
                                    ?>

                                </div>
                            </div>

                            <div class="flex-grow-0 py-3 px-4 border-top">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="textMessage"
                                           placeholder="Type your message">
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

<script>
    scrollDown()
    selectChat($('#<?php echo $firstElement['username']?>'))
    $("#<?php echo $firstElement['username']?>").find('.unseenMessages').hide()//remove the unseen message FOR THE FIRST ELEMENT
</script>
