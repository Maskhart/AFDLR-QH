<?php

/**
 * My_Orm_Entity_Miniature
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Identifiant
 * @property string $Titre
 * @property string $Chemin
 * @property Doctrine_Collection $Artiste
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class My_Entity_Miniature extends My_Base
{
    public function setTableDefinition()
    {
        $this->setTableName('miniature');
        $this->hasColumn('Identifiant', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('Titre', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('Chemin', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasMany('My_Orm_Artiste as Artiste', array(
             'local' => 'Identifiant',
             'foreign' => 'IdentifiantMiniature'));
    }
}