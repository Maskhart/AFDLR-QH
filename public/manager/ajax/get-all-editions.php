<?php
My_Orm_Administrateur::checkAuthentification();


$aEditions = Doctrine::getTable('My_Orm_Edition')
        ->createQuery('e')
        ->fetchArray();

if ($aEditions == false) {
    echo json_encode(null);
    die;
}

echo json_encode($aEditions);
die;



