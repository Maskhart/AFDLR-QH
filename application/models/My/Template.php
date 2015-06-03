<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Template
 *
 * @author Tommy
 */
class My_Template
{
    private $aCss;

    public function __construct()
    {
        $this->setCss('css/style.css');
    }

    public function getHeader() {
        $header = '<html>
                    <head>
                        <meta charset="UTF-8">';

        $header .= $this->getCss();
//        $header .= $this->getJs();


        $header .= '</head>';
    }

    public function getCss() {

        $result= '';
        foreach ($this->aCss as $css) {

            $result .= '<link rel="stylesheet/text" href="'.$css.'" />';
        }

        return $result;
    }

    public function setCss($css) {
        $this->aCss[] = $css;
    }
}
