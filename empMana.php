<html>
<img src="./images/b.gif" width=100px/>
<hr>
<?php
    
    require_once 'commonFun.php';
    
    checkUserValidate();
   
    getLastTime();
    

    echo "</br>欢迎".$_GET['name']."登录成功";
    echo "</br><a href='login.php'>返回主界面</a>";
  
    
    
?>
<h1>主界面</h1>
<a href="empList.php">管理用户</a></br>
<a href="addEmp.php">增加用户</a></br>
<a href="#">查询用户</a></br>
<a href="#">删除用户</a></br>
<hr>
<img src="./images/mylogo.png" width=150px/>
</html>