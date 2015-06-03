<?php
$oUser = My_Orm_Administrateur::checkAuthentification();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            <?php echo $title; ?>
        </title>
        <link rel="stylesheet" href="../css/style.css" />
        <script src="../js/jquery-1.11.2.min.js"></script>
    </head>
    <body class="background">
        <?php
        require 'banniere-menu.php';
        ?>