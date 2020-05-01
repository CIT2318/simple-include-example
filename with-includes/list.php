<?php
//include conn.pgp so we don't have duplicate code in list.php and details.php
include("conn.php");

//select all the films
$query = "SELECT films.id as id, films.title as title, certificates.name as name  FROM films
INNER JOIN certificates ON films.certificate_id=certificates.id";
$resultset = $conn->query($query);
$films = $resultset->fetchAll();
$conn=NULL;

?>


<!DOCTYPE HTML>
<html>
<head>
<title>List the films</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<?php

//loop over the array of films
foreach ($films as $film) {
    echo "<p>";
    echo "<a href='details.php?id={$film["id"]}'>";
    echo "{$film["title"]}({$film["name"]})";
    echo "</a>";
    echo "</p>";
}

?>
</body>
</html>
