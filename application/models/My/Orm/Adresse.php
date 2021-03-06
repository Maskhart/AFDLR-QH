<?php

/**
 * My_Orm_Adresse
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class My_Orm_Adresse extends My_Entity_Adresse {

    public function find($pIdentifiant) {

        $oAdresse = Doctrine::getTable('My_Orm_Adresse')
                ->createQuery('a')
                ->where('a.Identifiant = ?', $pIdentifiant)
                ->fetchOne();

        if ($oAdresse == false) {
            return null;
        }
        return $oAdresse;
    }

    public static function findAll() {

        $aAdresses = Doctrine::getTable('My_Orm_Adresse')
                ->createQuery('a')
                ->execute();

        if ($aAdresses == false) {
            return null;
        }

        return $aAdresses;
    }

}
