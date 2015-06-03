<?php

My_Orm_Administrateur::checkAuthentification();

if (isset($_POST['id'])) {
        $oInformation = My_Orm_Information::find($_POST['id']);
        $supprimer = false;
        if ($oInformation != null) {
            $oInformation->delete();
            $supprimer = true;
            echo json_encode($supprimer);
            die;
        } else {
            echo json_encode($supprimer);
            die;
        }
} else {
    echo json_encode(null);
    die;
}


    