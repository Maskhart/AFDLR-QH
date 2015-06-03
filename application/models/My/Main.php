<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Main
 *
 * @author Tommy
 */
class My_Main
{
    const SESSION_INDEX_USER = 'foinqhmobile';

    public static function headerIn($pDest = null) {
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/' . $pDest);
        die;
    }

    public static function sessionUserStart() {
        session_name(My_Orm_Administrateur::SESSION_NAME);
        session_start();
    }

    public static function sessionUserDestroy() {
        session_destroy();
    }
}
