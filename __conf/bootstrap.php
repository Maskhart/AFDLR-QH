<?php

// -----------------------------------------------------------------------------
// Configuration
// -----------------------------------------------------------------------------
// À indiquer en dur pour les crons car $_SERVER['DOCUMENT_ROOT'] n'existe pas en PHP CLI
define('APP_PATH', realpath(__DIR__ . '/..'));
define('DOCUMENT_ROOT', realpath(APP_PATH . '/public'));

// Définit les répertoire de l'include path
set_include_path(get_include_path()
                . PATH_SEPARATOR . APP_PATH . '/__conf/'
                . PATH_SEPARATOR . APP_PATH . '/application/models/'
                . PATH_SEPARATOR . APP_PATH. '/library/');

// -----------------------------------------------------------------------------
// Autoloader
// -----------------------------------------------------------------------------

require 'Symfony/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

require 'Zend/Loader/Autoloader.php';
$oAutoloader = Zend_Loader_Autoloader::getInstance();
$oAutoloader->registerNamespace('My_');
$oAutoloader->registerNamespace('Conf_');
$oAutoloader->registerNamespace('Doctrine_');
Zend_Loader::loadClass('Doctrine');

ob_start();
register_shutdown_function(function() {
	$lastErreur = error_get_last();
	$isFatalErreur = $lastErreur != null && ($lastErreur['type'] & (E_ERROR | E_USER_ERROR | E_COMPILE_ERROR | E_RECOVERABLE_ERROR));
	if ($isFatalErreur) {
		error_log(
			date('Y-m-d H:i:s') . ' - ERROR - ' . $lastErreur['file'] . ' - Line ' . $lastErreur['line'] . ' - ' . $lastErreur['message'] . "\n",
			3,
			APP_PATH . '/__log/log_' . date('Y-m-d') . '.txt'
		);
		ob_end_clean();
	} else {
		ob_end_flush();
	}
});



// -----------------------------------------------------------------------------
// Doctrine - Instance de connexion à la base de données
// -----------------------------------------------------------------------------
try {
    // Connexion à la base de données
    $oPDO = new PDO('mysql:host=' . Conf_Bdd::HOST . ';dbname=' . Conf_Bdd::DB, Conf_Bdd::USER, Conf_Bdd::PASS);
    // Configuration des exceptions
    $oPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $oDCon = Doctrine_Manager::connection($oPDO);
    $oDCon->setCharset(Conf_Bdd::CHARSET);
    $oDCon->setAttribute(Doctrine::ATTR_PORTABILITY,    Doctrine::PORTABILITY_EMPTY_TO_NULL);
    $oDCon->setAttribute(Doctrine::ATTR_VALIDATE,       Doctrine::VALIDATE_ALL);
    $oDCon->setAttribute(Doctrine::ATTR_MODEL_LOADING,  Doctrine::MODEL_LOADING_CONSERVATIVE);
    $oDCon->setAttribute(Doctrine::ATTR_PORTABILITY,    Doctrine::PORTABILITY_RTRIM);
}
catch(Exception $e) {
    exit('Database error');
}

// -----------------------------------------------------------------------------
// Sendmail - Spécifique à Windows
// -----------------------------------------------------------------------------
ini_set('sendmail_from', 'tommy.calais@gmail.com');