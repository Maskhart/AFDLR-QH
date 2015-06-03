<?php

My_Orm_Administrateur::checkAuthentification();

if (isset($_POST['id'])) {

    $oLive = My_Orm_Live::find();
    $ajouter = false;
    if ($oLive != null) {
        $oLive->IdentifiantPrestationMusique = $_POST['id'];
        $oLive->save();
        $ajouter = true;
        echo json_encode($ajouter);
        die;
    } else {
        echo json_encode($ajouter);
        die;
    }
} else {
    echo json_encode(null);
    die;
}

