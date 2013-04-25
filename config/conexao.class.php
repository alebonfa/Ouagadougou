<?php

    class conexao
    {
    	
    	private $db_host='localhost';
		private $db_user='root';
		private $db_pass='';
		private $db_name='pec';
		
		private $con=FALSE;
		
		public function connect() {
			if(!$this->con) {
				$myconn = @mysql_connect($this->db_host, $this->db_user, $this->db_pass);
				if($myconn)	{
					$seldb = @mysql_select_db($this->db_name, $myconn);
					if ($seldb) {
						$this->con = TRUE;
						return TRUE;
					} else {
						return FALSE;
					}
				} else {
					return FALSE;
				}
			} else {
				return TRUE;
			}
		}
		
		public function disconnect() {
			if($this->con) {
				if(@mysql_close()) {
					$this->con = FALSE;
					return TRUE;
				} else {
					return FALSE;
				}
			}
		}
		
    }
?>