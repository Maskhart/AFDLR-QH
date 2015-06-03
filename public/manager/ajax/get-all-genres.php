<?php
My_Orm_Administrateur::checkAuthentification();


$aGenres = Doctrine::getTable('My_Orm_Genre')
        ->createQuery('g')
        ->fetchArray();

if ($aGenres == false) {
    echo json_encode(null);
    die;
}

echo json_encode($aGenres);
die;



