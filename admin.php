<?php
$page_title = "Administration";
include("includes/header.php");
if(!isset($_SESSION['username'])){
   header("location: login.php?message=Du måste vara inloggad");
}
?>
<a id="logout" href="logout.php">Logga ut</a>

<h2 id="admin">Administration</h2>
<p>Denna sida ska endast kunna nås om du är inloggad.</p>

<?php
/** Ny instans av klass */
$post = new Post();
/** Raderar inlägg */
if (isset($_REQUEST['delPost'])) {

    $delPost = $_REQUEST['delPost'];
    $post->removePost($delPost);

    header("Location: admin.php");
}
?>
<div class=posts-printed>
<?php
/** Skriver ut inläggen */
foreach($post->getPosts() as $val){
    echo "<p><strong>" . $val['username'] . "</strong>" . $val['post'] . "<br>" . $val['postdate'] . " &nbsp <a href='admin.php?delPost=" . $val['id'] . "'>Radera </a></p>";
}
?>
</div>
<?php include("includes/footer.php") ?>