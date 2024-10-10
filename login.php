<?php
$page_title = "Login";
include("includes/header.php");

?>

<h3>Logga in</h3>
<?php 
/** Logga in */
if(isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    /** Kopplar till db  */
    $db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
    /** query/frågar om det skrivna användarnamn och lösen finns i databasen */
    $dbusers = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($db, $dbusers);
    /** Om det finns en matchning så startar inloggningssessionen */
    if(mysqli_num_rows($result) > 0){
        $_SESSION['username'] = $username;
        header("Location: admin.php");
    } else {
        /** Om användarnamn+lösen inte fanns i databasen visas felmmedd */
        $message = "Felaktigt användarnamn/lösenord";
    }
} 
?>

<?php 
/** Om felmeddelandet finns, skriv ut: */
if(isset($message)){
    echo "<p> Error: " . $message . "</p>";

}
?>
<form class="post" method="post" action="login.php">
<label for="username">Användarnamn: </label>
<input type="text" name="username" id="username">
<label for="password">Lösenord: </label>
<input type="password" name="password" id="password">
<input id="submit" type="submit" value="Logga in">
</form>

<?php include("includes/footer.php") ?>