<?php
My_Orm_Administrateur::checkAuthentification();

if (isset($_GET['idEdition']) AND isset ($_GET['idArtiste'])){

        $oPrestation = Doctrine::getTable('My_Orm_Prestation')
                ->createQuery('p')
                ->leftJoin('p.Artiste as a')
                ->leftJoin('p.Edition as e')
                ->leftJoin('p.Scene as s')
                ->where('a.Identifiant = ?', $_GET['idArtiste'])
                ->andWhere('e.Identifiant= ?', $_GET['idEdition'])
                ->fetchArray();

        if ($oPrestation == false) {
            echo json_encode(null);
            die;
        }

        echo json_encode($oPrestation[0]);
        die;
} else {

    echo json_encode(null);
    die;
}


