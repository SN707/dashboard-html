<?php
	include ("DataProvider.php");
	//check_login('admin','admin');
	function check_login($name, $pass){
			$sql = "select * from CF_User where LoginName
		 = '".$name."' and UserPass= '".$pass."'";
			$result = DataProvider::ExcuteQuery($sql);
			 if ($result==true){
				 $sql = "select * from CF_User df INNER JOIN UserPosition us ON df.PositionID = us.PositionID where LoginName = '$name'";
				 $result = DataProvider::SelectQuery($sql);
				  echo json_encode($result);
				 }
			 else {echo "false";}
	}
	//create_user_role('Admin');
	function create_user_role ($rolename){
		$sql= "INSERT INTO User_role (RoleName) VALUES ('$rolename')";
			$result = DataProvider::ExcuteQuery($sql);
			if ($result == true) {
				// echo 'true';
			} else {
				echo 'false';
			}
	}
	// create users
	function create_user($name, $pass, $role_id) {

	}
	
	//--------------------------------------GET CONTEND---------------------------------------
	function get_contend ($table, $conmand1,$conmand2){
		$querry = "";
		switch ($table){

			case 'Unit':
								$querry = "Select * from PS_Unit where BlockId= $conmand1 and UnitFloor='$conmand2'";
								break;
			case 'ListUserRole':
								$querry = "select * from User_role";
								break;
			case 'ListContractor':
								$querry = "select * from PS_Contractor";
								break;
			default:
			echo "Wrong input! This {$table} is not exist!";
			}
			
			$result = DataProvider::SelectQuery($querry);

			if ($result != false ) {
					return $result;
				}
			else {
				echo "Empty";
				}
		}
	function get_contend_json ($table, $conmand1,$conmand2){
		$querry = "";
		switch ($table){

			case 'Unit':
								$querry = "Select * from PS_Unit where BlockId= $conmand1 and UnitFloor='$conmand2'";
								break;
			case 'ListUser':
								$querry = "Select UserID, FullName, PositionName,UserLevel, FullName,Email, RecordStatus
										From CF_User u
										INNER JOIN UserPosition p
										ON u.PositionID = p.PositionID
										where p.PositionName !='Admin'";
								break;
			default:
			echo "Wrong input! This {$table} is not exist!";
			}
			
			$result = DataProvider::SelectQuery($querry);

			if ($result != false ) {
					// set header is JSON
					header('Content-Type: application/json');
					// show result
					 echo json_encode($result);
				}
			else {
				echo "Empty";
				}
		
		}

	function get_time(){
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$time = date("Ymd_His");
		return $time;
	}
	
?>