<?php

	class MYSQL_SERVICE
	{
		private $_HOST;
		private $_USER;
		private $_PASSWORD;
		private $_DATABASE;

		private $_ERROR_CODE;

		function __construct($host, $user, $password, $database)
		{
			$this->_HOST = $host;
			$this->_USER = $user;
			$this->_PASSWORD = $password;
			$this->_DATABASE = $database;
			
			$this->_ERROR_CODE = 0;

			$mysql_connect = mysql_connect($_HOST, $_USER, $_PASSWORD);

			if(!$mysql_connect || mysqli_connect_errno())
			{
				$this->_ERROR_CODE = 1;
			}else
			{
				$mysql_select_db = mysql_select_db($this->_DATABASE);
				
				if(!$mysql_select_db)
				{
					$this->_ERROR_CODE = 2;
				}
			}
		}

		function error()
		{
			return $this->_ERROR_CODE;
		}
	}

?>
