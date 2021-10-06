<?php
class database{
	private $host;
	private $dbuser;
	private $dbpass;
	private $dbname;
	public $con;
	 function __construct(){
		$this->host='localhost';
		$this->dbuser='siddhesh';
		$this->dbpass='siddhesh123';
		$this->dbname='croop';
		$this->con=new mysqli($this->host,$this->dbuser,$this->dbpass,$this->dbname);
		// print_r($con);

		$this->con->autocommit(FALSE);

		// $result = $con->query("SELECT @@autocommit");
		// $row = $result->fetch_row();
		// printf("Autocommit is %s\n", $row[0]);
		// exit;
		return $this->con;
	}
}

class query extends database{
	// public function getData($table,$field='*',$condition_arr='',$order_by_field='',$order_by_type='desc',$limit=''){
	// 	$sql="select $field from $table ";
	// 	if($condition_arr!=''){
	// 		$sql.=' where ';
	// 		$c=count($condition_arr);	
	// 		$i=1;
	// 		foreach($condition_arr as $key=>$val){
	// 			if($i==$c){
	// 				$sql.="$key='$val'";
	// 			}else{
	// 				$sql.="$key='$val' and ";
	// 			}
	// 			$i++;
	// 		}
	// 	}
	// 	if($order_by_field!=''){
	// 		$sql.=" order by $order_by_field $order_by_type ";
	// 	}
		
	// 	if($limit!=''){
	// 		$sql.=" limit $limit ";
	// 	}
	// 	//die($sql);
	// 	$result=$this->connect()->query($sql);
	// 	if($result->num_rows>0){
	// 		$arr=array();
	// 		while($row=$result->fetch_assoc()){
	// 			$arr[]=$row;
	// 			// echo $row['id'];
	// 			// echo $row['name'];
	// 		}
	// 		return $arr;
	// 	}else{
	// 		return 0;
	// 	}
	// }

	function getData($limit, $offset) 
	{
		// $result = $this->connect()->query("SELECT @@autocommit");
		// $row = $result->fetch_row();
		// printf("Autocommit is %s\n", $row[0]);
		// exit;
		// var_dump(parent::$con->begin_transaction());
		// exit;
		$this->con->begin_transaction();
	try{
			$sql = "SELECT * FROM user LIMIT $offset, $limit";
			// echo $sql;
			$result = $this->con->query($sql);
			$data = [];

			if($result->num_rows > 0) {
				while($row = $result -> fetch_assoc()) {
					array_push($data, $row);
				}
			}
			$this->con->commit();
			return $data;
			// print_r($data);
		}
	
		catch(Exception $e){
            $this->con->rollback();
            throw $e;
			}
	}
	
	public function insertData($table,$condition_arr){
		$this->con->begin_transaction();
		try{
			if($condition_arr!=''){
				foreach($condition_arr as $key=>$val){
					$fieldArr[]=$key;
					$valueArr[]=$val;
				}
				$field=implode(",",$fieldArr);
				$value=implode("','",$valueArr);
				$value="'".$value."'";			
				$sql="insert into $table($field) values($value) ";
				
				$result=$this->con->query($sql);
				$this->con->commit();
			}
		}
		catch(Exception $e){
            $this->con->rollback();
            throw $e;
			}
	}
	
	public function deleteData($table,$condition_arr){
		$this->con->begin_transaction();
		try{
			if($condition_arr!=''){
				$sql="delete from $table where ";
				$c=count($condition_arr);	
				$i=1;
				foreach($condition_arr as $key=>$val){
					if($i==$c){
						$sql.="$key='$val'";
					}else{
						$sql.="$key='$val' and ";
					}
					$i++;
				}
				$this->con->query($sql);
				// return true;
			}
			$this->con->commit();
		}
		catch(Exception $e){
            $this->con->rollback();
            throw $e;
			}
	}
	
	public function updateData($table,$condition_arr,$where_field,$where_value){
		$this->con->begin_transaction();
		try{
			if($condition_arr!=''){
				$sql="update $table set ";
				$c=count($condition_arr);	
				$i=1;
				foreach($condition_arr as $key=>$val){
					if($i==$c){
						$sql.="$key='$val'";
					}else{
						$sql.="$key='$val', ";
					}
					$i++;
				}
				$sql.=" where $where_field='$where_value' ";
				$result=$this->con->query($sql);
				$this->con->commit();
			}
			}
			catch(Exception $e){
				$this->con->rollback();
				throw $e;
				}
	}

	public function pagination($limit){
        $sql = "select * from user";
        $result = $this->con-> query($sql);
        $total_record = $result -> num_rows;
        $total_pages = ceil($total_record/$limit);

		// echo $total_record;
		// echo $total_pages;

        return $total_pages;
        
    }

	
	public function get_safe_str($str){
		if($str!=''){
			return mysqli_real_escape_string($this->con,$str);
		}
	}

	// function getPageCount() {
	// 	$sql = "SELECT * FROM user";
	// 	$result  = $this->connect()->query($sql);
	// 	$numRows = $result->num_rows;
	// 	$pageCount = $numRows / $limit;
	// }
}


?>