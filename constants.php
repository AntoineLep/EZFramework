<?php
    //Software
    define('PROGRAM_NAME','EZFramework');
    define('VERSION','1.0');
    define('AUTHOR','Antoine Leprevost');
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
        const DBNAME = 'mcs';
        const DBUSER = 'root';
        const DBPASSWD = '';
    }
?>