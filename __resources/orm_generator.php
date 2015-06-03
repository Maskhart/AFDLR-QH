<?php
require '..\__conf\bootstrap.php';

Doctrine::generateModelsFromDb('models', array('foinqhmobile'),
    array('classPrefixFiles' => false,
            'classPrefix' => 'My_Orm_',
            'baseClassPrefix' => 'Entity_',
            'baseClassesDirectory' => 'Entity',
            'packagesFolderName' => 'testpackage',
            'baseClassName' => 'Base_Entity'));

exit;
