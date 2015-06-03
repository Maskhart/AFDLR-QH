<?php
My_Orm_Administrateur::checkAuthentification();

if (isset($_GET['idEdition']) AND isset($_GET['jour']) AND isset($_GET['idScene'])) {
    if ($_GET['jour'] == "Vendredi" OR $_GET['jour'] == "Samedi") {

        $aPrestations = Doctrine::getTable('My_Orm_Prestation')
                ->createQuery('p')
                ->leftJoin('p.Artiste as a')
                ->leftJoin('p.Edition as e')
                ->leftJoin('p.Scene as s')
                ->where('e.Identifiant = ?', $_GET['idEdition'])
                ->andWhere('s.Identifiant = ?', $_GET['idScene'])
                ->andWhere('p.JourPassage = ?', $_GET['jour'])
                ->fetchArray();

        if ($aPrestations == false) {
            echo json_encode(null);
            die;
        }

        echo json_encode($aPrestations);
        die;
    }else{
        
    }
} else {

    echo json_encode(null);
    die;
}


