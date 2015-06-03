<?php
$Edition = My_Orm_Edition::findByYear(date('Y'));

if (isset($_GET['id'])) {

        $aPrestation = Doctrine::getTable('My_Orm_Prestation')
                            ->createQuery('p')
                            ->innerJoin('p.Scene as s')
                            ->innerJoin('p.Artiste as a')
                            ->innerJoin('a.GenreArtiste as ga')
                            ->innerJoin('ga.Genre as g')
                            ->innerJoin('a.NationaliteArtiste as na')
                            ->innerJoin('na.Nationalite as n')
                            ->innerJoin('p.PrestationMusique as pm')
                            ->leftJoin('pm.Musique as m')
                            ->where('p.IdentifiantEdition = ?',$Edition->Identifiant)
                            ->andWhere('g.Identifiant = ?',$_GET['id'])
                            ->fetchArray();

    if($aPrestation == false){
        echo json_encode(null);die;
    }

    echo json_encode($aPrestation);die;

} else {

    echo json_encode(null);die;
}
