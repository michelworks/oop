<?php
        include_once '../../models/database.php';
        $dal = new database();
	if(isset($_GET['pageNr']))
	{
            $id = $_GET['level'];
            $nr = $_GET['pageNr'];
            $pageNr = $dal->query("AU_HINTS", "levelID ='".$id."' and Answer = '".$nr."' order by levelID"); 
            if($pageNr == 1) echo $id."1";
            else echo false;
	}
?>