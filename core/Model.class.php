<?php
	class Model {

		/**
		* (PDO) Database PDO singleton instance
		*/
		protected static $db = null;

		public function __construct(){
			if(!self::$db)
				self::$db = DB::getInstance();
		}
	}
?>