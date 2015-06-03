<?php
My_Orm_Administrateur::checkAuthentification();


$aScenes = Doctrine::getTable('My_Orm_Scene')
        ->createQuery('s')
        ->fetchArray();

if ($aScenes == false) {
    echo json_encode(null);
    die;
}

echo json_encode($aScenes);
die;



