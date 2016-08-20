<?php

	class ROXI_NULL_EXCEPTIOM extends Exception {}

	class ROXI_OBJECT
	{
		private $_VARS;

		functiom __construct()
		{
			$this->_VARS = array();
		}

		protected function put($key, $value)
		{
			$this->_VARS[strval($key)] = $value;
		}

		protected function get($key)
		{
			if(isset($this->_VARS[strval($key)]))
			{
				return $this->_VARS[strval($key)];
			}
			
			throw new ROXI_NULL_EXCEPTIOM();
		}

	}

	
?>
