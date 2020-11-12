<?php
include_once(dirname(__FILE__) . "/dataBase/dataBase.php");

$fact = DataBase::Instance();
$fact->connect();
$cities = $fact->getAllClients();
$row = pg_fetch_assoc($cities);
echo "<table>";
	echo "<tr>";
	echo "<th>Name</th><th>Phone</th>";

	echo "</tr>";

	$row = pg_fetch_assoc($cities);

	while (isset($row["id"])) {
		echo "<tr>";
			echo "<td>".$row['name']."</td>";
			echo "<td>".$row['phone']."</td>";

		echo "</tr>";

		$row = pg_fetch_assoc($cities);
	}
	echo "</table>";

$cities = $fact->getAllStudent();
$row = pg_fetch_assoc($cities);
echo "<table>";
echo "<tr>";
echo "<th>Name</th><th>Grade</th>";

echo "</tr>";

$row = pg_fetch_assoc($cities);
while (isset($row["username"])) {
    echo "<tr>";
    echo "<td>".$row['username']."</td>";
    echo "<td>".$row['grade']."</td>";

    echo "</tr>";

    $row = pg_fetch_assoc($cities);
}
echo "</table>";
echo "TESTEEE"."<br>";


$cities2 = $fact->getAllStudentsTeacher("fabiouds");
$row = pg_fetch_assoc($cities2);
while (isset($row["username"])) {
    echo "<br>".$row['username'];
    $row = pg_fetch_assoc($cities2);
}

?>