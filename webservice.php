<?php include("includes/config.php");
?>
<?php

$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);

$numrows = 999;
if(isset($_GET['antal'])){
    $numrows = intval($_GET['antal']);
}
$sql = "SELECT * FROM guestbookposts LIMIT $numrows";
$result = $db->query($sql);

$posts =  mysqli_fetch_all($result, MYSQLI_ASSOC);

$json = json_encode($posts, JSON_PRETTY_PRINT);

header("content-type: application/json; charset=utf-8");
header("access-control-allow-origin: *");

echo $json;