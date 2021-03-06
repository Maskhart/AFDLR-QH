<?php

/**
 * My_Orm_Entity_Nationalite
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Identifiant
 * @property string $LibelleCourt
 * @property string $LibelleLong
 * @property Doctrine_Collection $Nationaliteartiste
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class My_Entity_Nationalite extends My_Base
{
    public function setTableDefinition()
    {
        $this->setTableName('nationalite');
        $this->hasColumn('Identifiant', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('LibelleCourt', 'string', 50, array(
             'type' => 'string',
             'length' => 50,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('LibelleLong', 'string', 100, array(
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
        $this->hasMany('My_Orm_NationaliteArtiste as NationaliteArtiste', array(
             'local' => 'Identifiant',
             'foreign' => 'IdentifiantNationalite'));
    }
}