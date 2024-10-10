<?php
$page_title = "Startsida";
include("includes/header.php");

?>
<h2>Test av databaser</h2>

<?php
/** Ny instans av klassen Post */
$post = new Post();

/** Skapar nytt inkägg (om name/titel är satt och inlägget inte är tomt) */
if (isset($_POST['name']) && strlen($_POST['content']) > 0) {
    $name = $_POST['name'];
    $content = $_POST['content'];

    $post->addPost($name, $content);
    unset($_REQUEST['submit']);
}

?>
<form class="post" method="post">
    <label for="name">Titel: </label>
    <input type="text" name="name" id="title">
    <label for="content">Skriv ett inlägg: </label>
    <textarea type="text" name="content"></textarea>
    <input id="submit" type="submit" value="Lägg till">
</form>

<?php
/** Skriver ut inläggen */
foreach ($post->getPosts() as $val) {
    echo "<p><strong>" . $val['username'] . "</strong>" . $val['post'] . "<br>" . $val['postdate'] . "</p>";
}
?>
<?php include("includes/footer.php") ?>