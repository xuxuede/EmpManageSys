<?php
   /*
    $mysqli=new MySQLi("localhost","root","","project");
    
    $sql="select * from admin";
    
    $res=$mysqli->query($sql);
    
    $row=$res->fetch_row();
    
    echo $row['password'][0];
    */
   /*  $rowCount=10;
    $pageSize=3;
    //取整函数
    echo ceil($rowCount/$pageSize); */

/* class SqlTool{

	public $conn;
	public $host="localhost";
	public $user="root";
	public $password="sss";
	public $dbname="project";
	 
	function SqlTool(){

		$this->conn=mysql_connect($this->host,$this->user,$this->password);
		if(!$this->conn){

			die("连接数据库出错".mysql.error());
		}
		mysql_select_db($this->dbname,$this->$conn);
		mysql_query("set names utf8");

	}
	//dql语句
	function execute_dql($sql){
		 
		$res=mysql_query($sql,$this->conn);//返回一个结果集

		if(!$res){

			die(mysql_error());
		}

		while($row=mysql_fetch_arrow($res)){

			foreach($row as $key=>$val){

				echo "--$val";
			}
			echo "</br>";

		}


	}
	 
	//dml语句
	function execute_dml($sql){
		 
		$b=mysql_query($sql,$this->conn);//返回一个bool值

		if(!$b){

			return 0;//表示失败
		}else{
			 
			if(mysql_affected_rows($this->conn)>0){

				return 1;//表示成功

			}else{

				return 2;//表示没有行数影响
			}

		}

		mysql_close($this->conn);

	}
	 
} */

      require_once 'SQLiTool.class.php';
      
      $sqliTool=new SQLiTool();
      
      $arr=$sqliTool->execute_dql2("select * from employee limit 0,20");
      
      print_r($arr);
  

?>