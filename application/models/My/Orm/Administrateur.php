<?php

/**
 * My_Orm_Administrateur
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    ##PACKAGE##
 * @subpackage ##SUBPACKAGE##
 * @author     ##NAME## <##EMAIL##>
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
class My_Orm_Administrateur extends My_Entity_Administrateur
{
    const SESSION_NAME     = 'SUIDFOINQH';

    const salt = 'Foin-QH';

    public static function encryptPassword($pPass) {
        return hash('sha256', $pPass . self::salt);
    }

    public static function authentification($pLogin, $pPass) {
        
        $passwordEncrypt = self::encryptPassword($pPass);

        $oUser = Doctrine::getTable('My_Orm_Administrateur')
                        ->createQuery('a')
                        ->where('a.Login = ?', $pLogin)
                        ->andWhere('a.Password = ?', $passwordEncrypt)
                        ->fetchOne();

        if ($oUser == false) {
            return false;
        }

        My_Main::sessionUserStart();
        $_SESSION[My_Main::SESSION_INDEX_USER] = $oUser;

        return $oUser;
    }

    public static function checkAuthentification() {

        if (My_Orm_Administrateur::isAuthenticate() == false) {
            My_Main::headerIn();
        }

        return $_SESSION[My_Main::SESSION_INDEX_USER];
    }

    public static function isAuthenticate() {

        My_Main::sessionUserStart();

        if (isset($_SESSION[My_Main::SESSION_INDEX_USER]) == true) {
            return true;
        }

        My_Main::sessionUserDestroy();
        return false;
    }
}