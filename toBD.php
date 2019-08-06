<?php
require_once ('database.php');
$name = $_POST['name'];
try {
        $sql = "INSERT INTO NAMES (name) VALUES ('$name')";
        $sth = $db->query($sql);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }

