<?php

/**
 * My_Orm_Prestationmusique
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class My_Orm_PrestationMusique extends My_Entity_PrestationMusique
{    
    public static function find($pIdentifiant)
    {
        $oPrestationMusique = Doctrine::getTable('My_Orm_Prestationmusique')
                            ->createQuery('p')
                            ->where('p.Identifiant = ?',$pIdentifiant)
                            ->fetchOne();
                            
        if ($oPrestationMusique == false){
            return null;
        }
        
        return $oPrestationMusique;
    }
        
    public static function findAll()
    {
        $aPrestationMusique = Doctrine::getTable('My_Orm_Prestationmusique')
                            ->createQuery('p')
                            ->execute();
                            
        if ($aPrestationMusique == false){
            return null;
        }
        
        return $aPrestationMusique;
    }
    
}