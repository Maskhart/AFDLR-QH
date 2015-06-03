<?php
My_Orm_Administrateur::checkAuthentification();

if (isset($_GET['id'])) {

    $oMusique = Doctrine::getTable('My_Orm_Musique')
                    ->createQuery('m')
                    ->leftJoin('m.Video as v')
                    ->where('m.Identifiant = ?', $_GET['id'])
                    ->fetchArray();

    if($oMusique == false){
        echo json_encode(null);die;
    }

    echo json_encode($oMusique[0]);die;

} else {

    echo json_encode(null);die;
}

