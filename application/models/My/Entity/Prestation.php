<?php

/**
 * My_Orm_Entity_Prestation
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $Identifiant
 * @property string $JourPassage
 * @property time $HeureDebut
 * @property time $HeureFin
 * @property integer $OrdrePassage
 * @property integer $IdentifiantArtiste
 * @property integer $IdentifiantEdition
 * @property integer $IdentifiantScene
 * @property My_Orm_Edition $Edition
 * @property My_Orm_Artiste $Artiste
 * @property My_Orm_Scene $Scene
 * @property Doctrine_Collection $Prestationmusique
 * 
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class My_Entity_Prestation extends My_Base
{
    public function setTableDefinition()
    {
        $this->setTableName('prestation');
        $this->hasColumn('Identifiant', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => true,
             'autoincrement' => true,
             ));
        $this->hasColumn('JourPassage', 'string', 100, array(
             'type' => 'string',
             'length' => 100,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('HeureDebut', 'time', null, array(
             'type' => 'time',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('HeureFin', 'time', null, array(
             'type' => 'time',
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('OrdrePassage', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => false,
             'autoincrement' => false,
             ));
        $this->hasColumn('IdentifiantArtiste', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('IdentifiantEdition', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
             'fixed' => false,
             'unsigned' => false,
             'primary' => false,
             'notnull' => true,
             'autoincrement' => false,
             ));
        $this->hasColumn('IdentifiantScene', 'integer', 4, array(
             'type' => 'integer',
             'length' => 4,
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
        $this->hasOne('My_Orm_Edition as Edition', array(
             'local' => 'IdentifiantEdition',
             'foreign' => 'Identifiant'));

        $this->hasOne('My_Orm_Artiste as Artiste', array(
             'local' => 'IdentifiantArtiste',
             'foreign' => 'Identifiant'));

        $this->hasOne('My_Orm_Scene as Scene', array(
             'local' => 'IdentifiantScene',
             'foreign' => 'Identifiant'));

        $this->hasMany('My_Orm_PrestationMusique as PrestationMusique', array(
             'local' => 'Identifiant',
             'foreign' => 'IdentifiantPrestation'));
    }
}