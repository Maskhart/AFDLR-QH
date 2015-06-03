<?php
My_Orm_Administrateur::checkAuthentification();

if (isset($_GET['id'])) {

    $oGenre = Doctrine::getTable('My_Orm_Genre')
                    ->createQuery('g')
                    ->where('g.Identifiant = ?', $_GET['id'])
                    ->fetchArray();

    if($oGenre == false){
        echo json_encode(null);die;
    }

    echo json_encode($oGenre[0]);die;

} else {

    echo json_encode(null);die;
}


