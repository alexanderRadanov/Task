<?php 
include "db_config.php";

	class User{
		public $db;
		public function __construct(){
			$this->db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);
			if(mysqli_connect_errno()) {
				echo "Error: Could not connect to database.";
			        exit;
			}
		}
			public function login($username, $password){
			$sql="SELECT id from users WHERE username='$username' AND password='$password'";
        	$result = mysqli_query($this->db,$sql);
        	$user_data = mysqli_fetch_array($result);
        	$count_row = $result->num_rows;

	        if ($count_row == 1) {
	            $_SESSION['login'] = true;
	            $_SESSION['id'] = $user_data['id'];
	            return true;
	        }
	        else{
			    return false;
			}
    	}
		public function AddInfo($name, $culture, $area){
			$real_sql="SELECT * FROM estates WHERE estate_name='$name'";
			$check =  $this->db->query($real_sql) ;
			$count_row1 = $check->num_rows;
			if ($count_row1 == 0){
				$real_sqll="INSERT INTO estates SET estate_name='$name', culture='$culture', area='$area'";
				$result1 = mysqli_query($this->db,$real_sqll) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result1;
			}
			else { return false;}
    	}
			public function AddInfoTractor($tractorName){
			$tractor_sql="SELECT * FROM tractors WHERE name='$tractorName'";
			$check_tractor =  $this->db->query($tractor_sql);
			$count_row_tractor = $check_tractor->num_rows;
			if ($count_row_tractor == 0){
				$tractor_sqll="INSERT INTO tractors SET name='$tractorName'";
				$result_tractor = mysqli_query($this->db,$tractor_sqll) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result_tractor;
			}
			else { return false;}
    	}
		public function AddInfoWorked($tractor, $estate, $date, $areaWorked){
				$culture_sql="SELECT culture FROM estates WHERE estate_name='$estate'";
				$result_culture =  $this->db->query($culture_sql);
				$data_culture = $result_culture->fetch_assoc();
				$cul_est=$data_culture['culture'];
				$worked_sqll="INSERT INTO estates_worked SET name='$estate', infoDate='$date', tractor='$tractor', area='$areaWorked', culture='$cul_est'";
				$result_worked = mysqli_query($this->db,$worked_sqll) or die(mysqli_connect_errno()."Data cannot inserted");
        		return $result_worked;
			}
		public function get_data_tractor(){
    		$sql3="SELECT id, name FROM tractors";
	        $result3 = mysqli_query($this->db,$sql3);
	        if($result3) {
				while($data_row = $result3->fetch_assoc()) {
				echo "<option value='".$data_row['name']."'>".$data_row['name'].'</option>';	
				}
	     	}
    	}
		public function get_data_estate(){
    		$sql4="SELECT id, estate_name, area, culture FROM estates";
	        $result4 = mysqli_query($this->db,$sql4);
	        if($result4) {
				while($data_row1 = $result4->fetch_assoc()) {
				echo "<option id=\"".$data_row1['culture']."\" value='".$data_row1['estate_name']."' data-max=\"".$data_row1['area']."\">".$data_row1['estate_name'].'</option>';	
				}
	     	}
    	}
		public function get_estate_worked(){
    		$sql5="SELECT id, name, culture, infoDate, tractor, area FROM estates_worked";
	        $result5 = mysqli_query($this->db,$sql5);
	        if($result5) {
				while($data_row2 = $result5->fetch_assoc()) {
				echo "<tr><td>".$data_row2['name']."</td><td>".$data_row2['culture']."</td><td>".$data_row2['infoDate']."</td><td>".$data_row2['tractor']."</td><td>".$data_row2['area']."</td></tr>";	
				}
	     	}
    	}
		public function filter($filtered){
    		$sql7="SELECT id, name, culture, infoDate, tractor, area FROM estates_worked WHERE name='$filtered' OR culture='$filtered' OR infoDate='$filtered' OR tractor='$filtered'";
	        $result7 = mysqli_query($this->db,$sql7);
	        if($result7) {
				while($data_rowF = $result7->fetch_assoc()) {
				echo "<td>".$data_rowF['name']."</td><td>".$data_rowF['culture']."</td><td>".$data_rowF['infoDate']."</td><td>".$data_rowF['tractor']."</td><td>".$data_rowF['area']."</td></tr>";	
				}
	     	}
    	}
		public function get_all_worked(){
    		$sql6="SELECT SUM(area) AS total FROM estates_worked";
	        $result6 = mysqli_query($this->db,$sql6);
	        if($result6) {
				while($data_row3 = $result6->fetch_assoc()) {
				echo "<td>".$data_row3['total']."</td>";	
				}
	     	}
    	}
    	public function get_session(){
	        return $_SESSION['login'];
	    }
	    public function user_logout() {
	        $_SESSION['login'] = FALSE;
	        session_destroy();
	    }

	}
?>
