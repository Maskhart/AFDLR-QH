<?php
My_Orm_Administrateur::checkAuthentification();

if (isset($_GET['id'])) {

    $oEdition = Doctrine::getTable('My_Orm_Edition')
                    ->createQuery('e')
                    ->where('e.Identifiant = ?', $_GET['id'])
                    ->fetchArray();

    if($oEdition == false){
        echo json_encode(null);die;
    }

    echo json_encode($oEdition[0]);die;

} else {

    echo json_encode(null);die;
}


