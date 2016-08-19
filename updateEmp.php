<html>
<img src="./images/b.gif" width=100px text-align:center/>
<hr>
<h1>修改雇员信息</h1>
<?php
     require_once 'EmployeeService.class.php';
 
     $id=$_GET['id'];
     
     $employeeService=new EmployeeService();
     
     $arr=$employeeService->getEmpByID($id);//二次封装 $emp=$employeeService->getEmpByID($id);
     
     //echo $arr[0]['name'];
     
?>
<form action="empProcess.php" method="post"> 
<table>
<tr><td >ID</td><td><input readonly="readonly" type="text" name="id"  value="<?php echo $arr[0]['id']?>"></td></tr>
<tr><td >名字</td><td><input type="text" name="name"  value="<?php echo $arr[0]['name']?>"></td></tr>
<tr><td>级别</td><td><input type="text" name="level" value="<?php echo $arr[0]['level']?>"></td></tr>
<tr><td>电邮</td><td><input type="text" name="email" value="<?php echo $arr[0]['email']?>"></td></tr>
<tr><td>薪水</td><td><input type="text" name="salary" value="<?php echo $arr[0]['salary']?>"></td></tr>
<tr><input type="hidden" name="flag" value="updateemp"/></tr><!--标志位的使用，以区分到底是之前的删除还是现在的增加-->
<tr><td><input type="submit" value="修改用户"></td></tr>
<tr><td><input type="reset" value="重新填写"></td></tr>
</table>
</form>
<hr>
<img src="./images/mylogo.png" width=150px/>
</html>   
     
     
   
     
   
