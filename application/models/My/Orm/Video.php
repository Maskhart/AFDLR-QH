<?php

/**
 * My_Orm_Video
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class My_Orm_Video extends My_Entity_Video
{    
    public static function find($pIdentifiant)
    {
        $oVideo = Doctrine::getTable('My_Orm_Video')
                            ->createQuery('v')
                            ->where('v.Identifiant = ?',$pIdentifiant)
                            ->fetchOne();
                            
        if ($oVideo == false){
            return null;
        }
        
        return $oVideo;
    }
    
    public static function findAll()
    {
        $aVideo = Doctrine::getTable('My_Orm_Video')
                            ->createQuery('v')
                            ->fetchArray();
                            
        if ($aVideo == false){
            return null;
        }
        
        return $aVideo;
    }
}