
<?php
//作用是完成对数据库的操作
    class SQLiTool{
    	
    	public $mysqli;
    	public $db="project";
    	public $username="root";
    	public $password="sss";
    	public $host="localhost";
    	
    	public function __construct() {
    		
              $this->mysqli=new MySQLi($this->host,$this->username,$this->password,$this->db);
    		  
              if($this->mysqli->connect_error){
              	
              	die("连接出错".$this->mysqli->connect_error);
              }
    	}
    	//引用传值 &$pageDiv
    	public function execute_dql_pageDiv($sql1,$sql2,$pageDiv){
    	    //考虑分页情况的查询，这是一个比较通用的并体现oop编程思想的代码（面向对象对象）
    	    //sql1是显示数据库相关信息
    	    //sql2是查询count(id)即row的总数目
    	    
    	    $res=$this->mysqli->query($sql1) or die($mysqli->error());
    	    //将res的东西转到数组里
    	    $arr=array();
    	    while($row=$res->fetch_assoc()){
    	        
    	        $arr[]=$row;
    	    }
    	    $res->free();
    	    
    	    $res2=$this->mysqli->query($sql2) or die($mysqli->error());
    	    
    	    if($row=$res2->fetch_row()){
    	        
    	        $pageDiv->pageCount=ceil($row[0]/$pageDiv->pageSize);
    	        $pageDiv->rowCount=$row[0];
    	    }
    	    $res2->free();
    	    
    	    //封装上一页、下一页
    	    //$navigate="";
    	    if($pageDiv->pageNow>1){
   	              $prePage=$pageDiv->pageNow-1;
                  $navigate1="<a href='{$pageDiv->gotoUrl}?pageNow=$prePage'>上一页</a> &nbsp;";
            }
            if($pageDiv->pageNow<$pageDiv->pageCount){
                $nextPage=$pageDiv->pageNow+1;
                $navigate2="<a href='{$pageDiv->gotoUrl}?pageNow=$nextPage'>下一页</a> &nbsp;";
            }
            $page_Whole=10;
            $start=floor(($pageDiv->pageNow-1)/$page_Whole)*$page_Whole+1;
            $index=$start;
            //向前转10页
            if($pageDiv->pageNow>$page_Whole){
                $navigate3.= "<a href='{$pageDiv->gotoUrl}?pageNow=".($start-1)."'><<</a>";
            }
            //向后转10页
            for(;$start<$index+$page_Whole;$start++){
                 
                $navigate3.= "<a href='{$pageDiv->gotoUrl}?pageNow=$start'>[$start]</a>";
                 
            }
                $navigate3.= "<a href='{$pageDiv->gotoUrl}?pageNow=$start'>>></a>";
            
            //前后翻10页，中间夹着页数
            //显示当前页面共有多少页
             
          
    	    //把封装好的数组赋给分页对象
    	    $pageDiv->res_array=$arr; 
    	    $pageDiv->navigate1= $navigate1;
    	    $pageDiv->navigate2= $navigate2;
    	    $pageDiv->navigate3= $navigate3;
    	   
    	    
    	    
    	   
    	    
    	    
    	}
    	
    	public function execute_dql($sql){
    		
    		$res=$this->mysqli->query($sql);
    		
    		
    		/* while($row=$res->fetch_row()){
    			
    			foreach ($row as $key=>$value){
    				
    				echo "--$value";
    			}
    			echo "</br>";
    		} */
    		
    		return $res;
    		
    		
    	}
    	//执行dql语句，但是返回一个数组
    	public function execute_dql2($sql){
    	    
    	    $arr=array();
    	    $res=$this->mysqli->query($sql);
    	    //$i=0;如果此处用$i=0,下面的数组默认用arr[$i++]，因为这是默认的
    	    //将$res里面的内容折腾进数组里面，以尽快释放数据库的资源
    	    while($row=$res->fetch_assoc()){
    	        
    	        $arr[]=$row;
    	    }
    	    //这里就可以马上关闭资源
    	    $res->free_result();
    	    return $arr;
    	    
    	}
    	public function execute_dml($sql){
    		
    		$b=$this->mysqli->query($sql);
    		
    		if(!$b){
    			
    			return 0;//fail
    		}else{
    			if($this->mysqli->affected_rows>0){
    				
    				return 1;//success
    			}else{
    				
    				return 2;//no effect
    			}
    			
    			
    		}
    		
    		
    	}
    	
    	
    }
?>