<?php
	include_once "app/DB.php";

	class user extends DB {
		public function toDb($name,$uname,$email,$cell)
		{
			$sql= "INSERT INTO data (name,email,cell,username) VALUES ('$name','$email','$cell','$uname')";
			parent::getDbConn() -> query($sql);

			return '<div class="alert alert-success alert-dismissible fade show" role="alert">
						  <p>Form submission successful</p>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>';
		}
	

		public function showData()
		{
			$sql = "SELECT * FROM data";
			$data = parent::getDbConn() -> query($sql);
			return $data;
		}

		public function uDel($id)
		{
			
			parent::getDbConn() -> query("DELETE FROM data WHERE Sl=$id");
			return '<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center;">
						  <p>Data Delete Successful</p>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>';
		}

		public function singleData($id)
		{
			$sql = "SELECT * FROM data WHERE Sl=$id";
			$data = parent::getDbConn() -> query($sql);
			return $data;
		}

		public function update($name,$email,$cell,$id)
		{
			$sql = "UPDATE data SET

				name='$name',
				email='$email',
				cell='$cell'
				WHERE Sl=$id

			";
			 parent::getDbConn() -> query($sql);
			 $umess = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="text-align:center;">
						  <p>Update Successful</p>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>';

			session_start();
			$_SESSION['umess']=$umess;
		}

	}


?>