<?php
	class DB {
	
		/**
		* (PDO) Private database instance
		*/
		private $DBInstance;

		/**
		* (PDO) Database singleton instance
		*/
		private static $instance;
		
		public function __construct(){
			$this->DBInstance = new PDO('mysql:dbname='.DBConstant::DBNAME.';host='.DBConstant::DBHOST,DBConstant::DBUSER ,DBConstant::DBPASSWD);
			$this->DBInstance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		
		/**
		* Return the databse PDO instance
		* @return (PDO) databse PDO instance
		*/
		public static function getInstance(){
			if(is_null(self::$instance))
				self::$instance = new DB();
				
			return self::$instance;
		}

		/**
		* Execute a query
		* @param (string) query : query string to be executed
		* @return (array) : query result
		*/
		public function query($query){
			return $this->DBInstance->query($query);
		}
	}
?>