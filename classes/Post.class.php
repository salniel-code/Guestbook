<?php

class Post
{

    private $db;

    function __construct()
    {
        /** Koppling till db */
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_errno > 0) {
            die("Fel vid anslutning: " . $this->db->connect_error);
        }
    }

    public function addPost($username, $post)
    {
        /** Lägger till post i db */
        $sql = "INSERT INTO guestbookposts(username, post)VALUES('$username', '$post')";
        $this->db->query($sql);
    }
    public function getPosts()
    {
        /** Hämta posts från db i datumordning */
        $sql = "SELECT * FROM guestbookposts ORDER BY postdate DESC";
        $result = $this->db->query($sql);

       $posts =  mysqli_fetch_all($result, MYSQLI_ASSOC);
       
        return $posts;
    }

    public function removePost($index)
    {
        /** Raderingsfunktion */
        $sql = "DELETE FROM guestbookposts WHERE id = '$index'";
        $this->db->query($sql);
    }
}
