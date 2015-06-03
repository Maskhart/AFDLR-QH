<?php
My_Orm_Administrateur::checkAuthentification();


$aNationalites = Doctrine::getTable('My_Orm_Nationalite')
        ->createQuery('n')
        ->fetchArray();

if ($aNationalites == false) {
    echo json_encode(null);
    die;
}

echo json_encode($aNationalites);
die;



