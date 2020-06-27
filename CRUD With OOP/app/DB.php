<?php


	abstract class DB{

		private $host = 'localhost';
		private $uname = 'root';
		private $db = 'regfromoop';
		private $pass = '';

		


		protected function getDbConn()
		{
			return new mysqli($this -> host,$this -> uname,$this -> pass,$this -> db);
		}




	}






?>