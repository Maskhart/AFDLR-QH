<?php

/**
 * My_Orm_Entity_Scene
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Identifiant
 * @property string $Libelle
 * @property Doctrine_Collection $Prestation
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class My_Entity_Scene extends My_Base
{
    public function setTableDefinition()
    {
        $this->setTableName('scene');
        $this->hasColumn('Identifiant', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('Libelle', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
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
        $this->hasMany('My_Orm_Prestation as Prestation', array(
             'local' => 'Identifiant',
             'foreign' => 'IdentifiantScene'));
    }
}