<?php

My_Orm_Administrateur::checkAuthentification();

if (isset($_GET['id'])) {

    $oPrestation = Doctrine::getTable('My_Orm_Prestation')
            ->createQuery('p')
            ->leftJoin('p.Artiste as a')
            ->leftJoin('p.Edition as e')
            ->leftJoin('p.Scene as s')
            ->leftJoin('p.PrestationMusique as pm')
            ->leftJoin('pm.Musique as m')
            ->where('p.Identifiant = ?', $_GET['id'])
            ->fetchArray();

    if ($oPrestation == false) {
        echo json_encode(null);
        die;
    }

    echo json_encode($oPrestation[0]);
    die;
} else {

    echo json_encode(null);
    die;
}


