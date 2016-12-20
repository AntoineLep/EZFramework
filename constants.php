<?php
    //Software
    define('PROGRAM_NAME','EZFramework');
    define('PROGRAM_TITLE','EZ Program title');
    define('VERSION','1.0');
    define('AUTHOR','Antoine Leprevost');
    define('EMAIL_BASE', '@antlab.fr');
    define('PROTOCOL', isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http');
    define('BASE_URL', PROTOCOL . '://' . $_SERVER['SERVER_NAME'] . '/' . 'EZFramework');

    //Folders
    define('DS', DIRECTORY_SEPARATOR);
    define('ROOT', dirname(__FILE__));

    define('APP_FOLDER', ROOT . DS . 'app');
    define('CORE_FOLDER', ROOT . DS . 'core');

    define('CLASS_FOLDER', APP_FOLDER . DS . 'class');
    define('CONTROLLER_FOLDER', APP_FOLDER . DS . 'controller');
    define('MODEL_FOLDER', APP_FOLDER . DS . 'model');
    define('MIDDLEWARE_FOLDER', APP_FOLDER . DS . 'middleware');
    define('VIEW_FOLDER', APP_FOLDER . DS. 'view');
    define('ASSETS_FOLDER', APP_FOLDER . DS . 'assets');

    define('TEMPLATE_FOLDER', VIEW_FOLDER . DS . 'template');

    //Extensions
    class Extension {
        /**
        * (array) Supported php file exetensions
        */
        static $supportedPhpExtensions = array('.class.php', '.php');
    }

    //Database constants
    class DBConstant {
        const DBHOST = 'localhost';
        const DBNAME = '';
        const DBUSER = '';
        const DBPASSWD = '';
    }
?>