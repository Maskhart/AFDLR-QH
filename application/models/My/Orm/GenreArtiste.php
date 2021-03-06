<?php

/**
 * My_Orm_Genreartiste
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class My_Orm_GenreArtiste extends My_Entity_GenreArtiste
{
    public static function findAll($pIdentifiant){
        
        $aGenreArtistes = Doctrine::getTable('My_Orm_GenreArtiste')
                        ->createQuery('ga')
                        ->where('ga.IdentifiantArtiste = ?', $pIdentifiant)
                        ->execute();

        if($aGenreArtistes == false){
            return null;
        }

        return $aGenreArtistes;
    }
}