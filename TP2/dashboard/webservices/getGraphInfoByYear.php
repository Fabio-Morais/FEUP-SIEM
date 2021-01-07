<?php require_once(dirname(__FILE__) . "/../dataBase/dataBase.php"); ?>
<?php


$db = DataBase::Instance();
$connected = $db->connect();
if($connected){
    if($_GET['option'] == 1)
        $query = $db->getTotalCustomYearProfit($_GET['year']);
    else if($_GET['option'] == 2)
        $query = $db->getSellsCoursesByYear($_GET['year']);
    else if($_GET['option'] == 3)
        $query = $db->getSellsCoursesMoneyYear($_GET['year']);
    else if($_GET['option'] == 4)
        $query = $db->getGender();
    else if($_GET['option'] == 5)
        $query = $db->getAverageByCourse();
}
$i=0;
while($data[$i++] = pg_fetch_assoc($query));
array_splice($data, --$i, 1);
echo json_encode($data)
?>