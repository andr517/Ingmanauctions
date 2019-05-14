<?php
session_start();
// Tar bort alla sessioner
if(session_destroy())
{
header("Location: login.php");
}
?>
