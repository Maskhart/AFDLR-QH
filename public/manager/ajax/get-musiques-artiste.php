<?php
My_Orm_Administrateur::checkAuthentification();

if (isset($_GET['id'])) {

    $aMusiques = Doctrine::getTable('My_Orm_Musique')
                    ->createQuery('m')
                    ->leftJoin('m.Video as v')
                    ->where('m.IdentifiantArtiste = ?', $_GET['id'])
                    ->fetchArray();

    if($aMusiques == false){
        echo json_encode(null);die;
    }

    echo json_encode($aMusiques);die;

} else {

    echo json_encode(null);die;
}

