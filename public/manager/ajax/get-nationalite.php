<?php
My_Orm_Administrateur::checkAuthentification();

if (isset($_GET['id'])) {

    $oNationalite = Doctrine::getTable('My_Orm_Nationalite')
                    ->createQuery('n')
                    ->where('n.Identifiant = ?', $_GET['id'])
                    ->fetchArray();

    if($oNationalite == false){
        echo json_encode(null);die;
    }

    echo json_encode($oNationalite[0]);die;

} else {

    echo json_encode(null);die;
}


