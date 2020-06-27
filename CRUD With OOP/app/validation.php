
<?php

	
	class validation extends DB{

		public function validate($name,$uname,$email,$cell){

			





			if(empty($name) || empty($uname) || empty($email) || empty($cell)){

				return '<div class="alert alert-warning alert-dismissible fade show" role="alert">
						  <p>Fields can not be empty</p>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>';

			}
			elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  				return '<div class="alert alert-warning alert-dismissible fade show" role="alert">
						  <p>Invalid Email Address</p>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>';
			}elseif (self::check($uname)) {
				return '<div class="alert alert-warning alert-dismissible fade show" role="alert">
						  <p>Username Already Exist</p>
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						    <span aria-hidden="true">&times;</span>
						  </button>
						</div>';
			}

			



		}

		private function check($uname)
			{
				$sql= "SELECT * from data WHERE username='$uname'";
				$data = parent::getDbConn() -> query($sql);
				
				$num = $data -> num_rows;
				if($num > 0){
					return True;
				}else{
					return False;
				}
			}


			public function valUpdate($name,$email,$cell)
				{
					if(empty($name) || empty($email) || empty($cell)){

					return '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <p>Fields can not be empty</p>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';

				}
				elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	  				return '<div class="alert alert-warning alert-dismissible fade show" role="alert">
							  <p>Invalid Email Address</p>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
				}
			}


	}




?>