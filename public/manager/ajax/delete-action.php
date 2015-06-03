<?php

My_Orm_Administrateur::checkAuthentification();

if (isset($_POST['id'])) {
        $oAction = My_Orm_Action::find($_POST['id']);
        $supprimer = false;
        if ($oAction != null) {
            $oAction->delete();
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


    