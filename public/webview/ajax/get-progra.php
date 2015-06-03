<?php

$Edition = My_Orm_Edition::findByYear(date('Y'));

$aPrestation = Doctrine::getTable('My_Orm_Prestation')
        ->createQuery('p')
        ->innerJoin('p.Scene as s')
        ->innerJoin('p.Edition as e')
        ->innerJoin('p.Artiste as a')
        ->innerJoin('a.Image as i')
        ->innerJoin('a.Video as v')
        ->leftJoin('p.PrestationMusique as pm')
        ->leftJoin('pm.Musique as m')
        ->innerJoin('a.GenreArtiste as ga')
        ->innerJoin('ga.Genre as g')
        ->innerJoin('a.NationaliteArtiste as na')
        ->innerJoin('na.Nationalite as n')
        ->where('p.IdentifiantEdition = ?', $Edition->Identifiant)
		->orderBy('p.OrdrePassage')
        ->fetchArray();




if ($aPrestation == false) {
    echo json_encode(null);
    die;
}

echo json_encode($aPrestation);
die;



                                                
