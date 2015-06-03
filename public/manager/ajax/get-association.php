<?php

My_Orm_Administrateur::checkAuthentification();

if (isset($_GET['id'])) {

    $oAssociation = Doctrine::getTable('My_Orm_Association')
            ->createQuery('a')
            ->leftJoin('a.Information as i')
            ->leftJoin('a.Action as ac')
            ->where('a.Identifiant = ?', $_GET['id'])
            ->fetchArray();

    if ($oAssociation == false) {
        echo json_encode(null);die;
    }

    echo json_encode($oAssociation[0]);die;
    
} else {
    echo json_encode(null);die;
}


