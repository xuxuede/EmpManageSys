<html>
<title>雇员信息列表</title>
<img src="./images/b.gif" width=100px/>
<hr>
<h1>雇员信息列表</h1>
<script type="text/javascript">
   function confirmDelt(val){

         //window.alert("确定要删除id="+val+"的用户");
          return window.confirm("确定要删除id="+val+"的用户");
   }
</script>
<?php
   require_once 'EmployeeService.class.php';
  //显示所有用户的信息
  //查询数据
  require_once 'pageDiv.class.php';

  require_once 'commonFun.php';
  
  checkUserValidate();
   /* 
   $employeeService=new EmployeeService();
   
   if(!empty($_GET['flag'])){
       //不为空即需要删除用户
       $id=$_GET['id'];
       //echo "你希望删除的用户id号是".$id;
       $employeeService->delByID($id);
   } */
   
   //创建一个分页对象实例
   $pageDiv=new PageDiv();
   
   $pageDiv->pageNow=1;
   $pageDiv->pageSize=3;
   $pageDiv->gotoUrl="empList.php";
  
  /* $pageSize=8;
  $rowCount=0;//这个变量的值，从数据库获取
  $pageNow=1;//这是变量，默认为1，用户点击超链接获取,我们需要根据用户的点击，来更改这个值 */
  
  
  //我们需要根据是否有pagenow的值，判断，如果没有值，默认显示第一页
  if(!empty($_GET['pageNow'])){
  	
  	$pageDiv->pageNow=$_GET['pageNow'];
  }
  
  
  $employeeService = new EmployeeService();
  $employeeService->getPageDiv($pageDiv);//传一个对象即可
  //$pageCount=$employeeService->getPageCount($pageSize);
  //$pageCount=20;
  
   //$res2=$employeeService->getEmpList($pageNow,$pageSize);
  
  echo "<table border='1px' width=700 bordercolor='green' cellspacing=0>";
  
  echo "<tr><th>id</th><th>name</th><th>level</th><th>email</th>".
  "<th>salary</th><th>删除用户</th><th>修改用户</th></tr>";
  //这里我们需要循环显示相关用户的信息
  //这是结果集取出的方式，现在需要换成数组的取出方式
 /*  while($row=$res2->fetch_assoc()){
  	
  	echo"<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['level']}</td>".
    "<td>{$row['email']}</td><td>{$row['salary']}</td><td><a href='#'>删除用户</a>".
    "</td><td><a href='#'>修改用户</a></td></tr>";
  } */
  
   for($i=0;$i<count($pageDiv->res_array);$i++){
       
       $row=$pageDiv->res_array[$i];
       echo"<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['level']}</td>".
       "<td>{$row['email']}</td><td>{$row['salary']}</td><td><a onclick='return confirmDelt({$row['id']})' href='empProcess.php?flag=del&id={$row['id']}'>删除用户</a>".
       "</td><td><a href='updateEmp.php?id={$row['id']}'>修改用户</a></td></tr>";
       
   }
  
   echo "</table>";
   //打印出页码的超链接
    /* for($i=1;$i<=$pageCount;$i++){
   	
   	echo "<a href='empList.php?pageNow=$i'>$i</a> &nbsp;"; 	//这里的超链接应该向自身发送请求
   }  */
   //显示上一页以及下一页
   /* if($pageDiv->pageNow>1){
   	  $prePage=$pageDiv->pageNow-1;
      echo"<a href='empList.php?pageNow= $prePage'>上一页</a> &nbsp;";
   }
   if($pageDiv->pageNow<$pageDiv->pageCount){
   	 $nextPage=$pageDiv->pageNow+1;
   echo"<a href='empList.php?pageNow= $nextPage'>下一页</a> &nbsp;";
   } */
    echo  $pageDiv->navigate1;
    echo  $pageDiv->navigate2;
    echo  $pageDiv->navigate3;
   
   
   //前后翻10页，中间夹着页数
   //显示当前页面共有多少页
   
    //自定义整体翻多少页
    /* $page_Whole=10;
    $start=floor(($pageDiv->pageNow-1)/$page_Whole)*$page_Whole+1;
    $index=$start;
    //向前转10页
    if($pageDiv->pageNow>$page_Whole){
    echo "<a href='empList.php? $pageDiv->pageNow=".($start-1)."'><<</a>";
    }
       //向后转10页
    for(;$start<$index+$page_Whole;$start++){
     
    echo "<a href='empList.php?pageNow=$start'>[$start]</a>";
     
    }
    echo "<a href='empList.php?pageNow=$start'>>></a>";  */
   //以下这么做是从点击的地方后10页
  /*  $start=$pageNow;
   $index=$start;
   for($start=$pageNow;$start<$index+10;$start++){
       
       echo "<a href='empList.php? pageNow=$start'>[$start]</a>";
       
   }
   /* 
   echo "<a href=''>[1]</a>";
   echo "<a href=''>[1]</a>";
   echo "<a href=''>[2]</a>";
   echo "<a href=''>[3]</a>";
   echo "<a href=''>[4]</a>";
   echo "<a href=''>[5]</a>";
   echo "<a href=''>[6]</a>";
   echo "<a href=''>[7]</a>";
   echo "<a href=''>[8]</a>";
   echo "<a href=''>[9]</a>";
   echo "<a href=''>[10]</a>";
   echo "<a href=''>>></a>&nbsp;"; */
   

   echo "当前页{$pageDiv->pageNow}/共 {$pageDiv->pageCount}页";
   //指定跳转到某页
   echo "</br></br>";
  ?>
  <form action="empList.php">
  跳转到:<input type="text" name='pageNow'/>
  <input type="submit" value="GO">
  </form>
  
  <?php
     
    //以下资源不需要释放了，因为工具类采用数组显示方式的时候，已经释放了结果集
   //$res2->free_result();
   //$mysqli->close();
   
?>
<hr>
<img src="./images/mylogo.png" width=150px/>
</html>