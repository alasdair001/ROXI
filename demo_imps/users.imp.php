<?php

	define('TABLE_USERS', 'USERS');

	class User extends ROXI_OBJECT
	{
		function __construct($id, $username, $email, $password)
		{
			$this->put('id', $id);
			$this->put('username', $username);
			$this->put('email', $email);
			$this->put('password', $password);
		}
		
		function push_data($key, $value)
		{
			$this->put($key, $value);
			
			try
			{
				$id = $this->get('id');
				
				$id = mysql_real_escape_string($id);
			
				if($id != false)
				{
					if(is_numeric($id))
					{
						$id = intval($id);
						
						$key = mysql_real_escape_string($key)
						$value = mysql_real_escape_string($value);
						
						if($key != false && $value != false)
						{
							$mysql_query = mysql_query("UPDATE `".TABLE_USERS."` SET `$key` = '$value' WHERE `$id` = $id;");
						}
					}
				}

			}catch(ROXI_NULL_EXCEPTION e) { }

			return false;
		}

	}
	
	function adv3h($a, $b, $c)
	{
		sha1(md5($a).$c.$b.ord($c));
	}
	
	function insert_user($username, $email, $password)
	{
		$username = mysql_real_escape_string($username);
		$email = mysql_real_escape_string($email);
		$password = mysql_real_escape_string(adv3h($password, $email, $username));
		
		if($username != false && $email != false && $password != false)
		{
			$mysql_query = mysql_query("INSERT INTO `".TABLE_USERS."` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password');");	
			
			
			return $mysql_query;
		}
		
		return false;
	}

?>
