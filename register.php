<?php
$page_title = "Skapa Konto";
include("includes/header.php");

?>
<h3>Skapa ett konto</h3>

<?php
if (isset($_REQUEST['username'])) {
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];

    /** Koppling till db */
    $db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
    /** Query - Kollar om användarnamnet redan finns i db */
    $dbusers = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($db, $dbusers);

    /** Lägger in användarnamn+lösen i db om inga matchningar hittades */
    if (mysqli_num_rows($result) < 1) {
        $sql = "INSERT INTO user(username, password)VALUES('$username', '$password')";
        $db->query($sql);
        header("Location: login.php");
    } else {
        /** Om matchning hittades skriv felmedd ut */
        echo "Användarnamet finns redan";
    }
}
?>

<form class="post" method="post">
    <label for="username">Användarnamn: </label>
    <input type="text" name="username" id="username">
    <label for="password">Lösenord: </label>
    <input type="password" name="password" id="password">
    <input id="submit" type="submit" value="Skapa konto">
</form>

<?php include("includes/footer.php") ?>