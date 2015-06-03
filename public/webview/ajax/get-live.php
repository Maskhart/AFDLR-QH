<?php

$oLive = Doctrine::getTable('My_Orm_Live')
        ->createQuery('l')
        ->innerJoin('l.PrestationMusique as pm')
        ->innerJoin('pm.Prestation as p')
        ->innerJoin('p.Scene as s')
        ->innerJoin('p.Artiste as a')
        ->innerJoin('pm.Musique as m')
        ->leftJoin('m.Video as v')
        ->fetchArray();

if ($oLive == false) {
    echo json_encode(null);
    die;
}

echo json_encode($oLive[0]);
die;