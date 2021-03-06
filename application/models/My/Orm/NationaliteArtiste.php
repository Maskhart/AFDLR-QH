<?php

/**
 * My_Orm_Nationaliteartiste
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class My_Orm_NationaliteArtiste extends My_Entity_NationaliteArtiste {

    public static function findAll($pIdentifiant) {

        $aNationaliteArtistes = Doctrine::getTable('My_Orm_NationaliteArtiste')
                ->createQuery('na')
                ->where('na.IdentifiantArtiste = ?', $pIdentifiant)
                ->execute();

        if ($aNationaliteArtistes == false) {
            return null;
        }

        return $aNationaliteArtistes;
    }

}
