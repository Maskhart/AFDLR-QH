<?php
My_Orm_Administrateur::checkAuthentification();

if (isset($_GET['id'])) {

    $oArtiste = Doctrine::getTable('My_Orm_Artiste')
                    ->createQuery('a')
                    ->innerJoin('a.Image as i')
                    ->innerJoin('a.Video as v')
                    ->innerJoin('a.Miniature as m')
                    ->innerJoin('a.NationaliteArtiste na')
                    ->innerJoin('na.Nationalite n')
                    ->innerJoin('a.GenreArtiste ga')
                    ->innerJoin('ga.Genre g')
                    ->where('a.Identifiant = ?', $_GET['id'])
                    ->fetchArray();

    if($oArtiste == false){
        echo json_encode(null);die;
    }

    echo json_encode($oArtiste[0]);die;

} else {

    echo json_encode(null);die;
}


