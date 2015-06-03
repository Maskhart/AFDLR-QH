<?php
My_Orm_Administrateur::checkAuthentification();

if (isset($_GET['id'])) {

    $oScene = Doctrine::getTable('My_Orm_Scene')
                    ->createQuery('s')
                    ->where('s.Identifiant = ?', $_GET['id'])
                    ->fetchArray();

    if($oScene == false){
        echo json_encode(null);die;
    }

    echo json_encode($oScene[0]);die;

} else {

    echo json_encode(null);die;
}


