<?php

if (isset($_GET['load']))
{
    require_once "database.php";
    try {
        $pdo = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOEXCEPTION $e)
    {
        $msg = 'PDO error in ' . $e->getFile() . ' line' . $e->getLine() . ' : ' . $e->getMessage();
        exit($msg); 
    }
	// Write your setup script below
}
else
    echo '<a href="?load">Delete and recreate database</a>';

?>
