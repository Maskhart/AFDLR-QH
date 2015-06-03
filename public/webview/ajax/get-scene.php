<?php
        $aPrestation = Doctrine::getTable('My_Orm_Scene')
                            ->createQuery('s')
                            ->fetchArray();

    if($aPrestation == false){
        echo json_encode(null);die;
    }

    echo json_encode($aPrestation);die;
