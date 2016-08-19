<html>
<img src="./images/b.gif" width=100px text-align:center/>
<hr>
<h1>添加雇员</h1>
<form action="empProcess.php" method="post"> 
<table>
<tr><td >名字</td><td><input type="text" name="name" ></td></tr>
<tr><td>级别</td><td><input type="text" name="level"></td></tr>
<tr><td>电邮</td><td><input type="text" name="email"></td></tr>
<tr><td>薪水</td><td><input type="text" name="salary"></td></tr>
<tr><input type="hidden" name="flag" value="addemp"/></tr><!--标志位的使用，以区分到底是之前的删除还是现在的增加-->
<tr><td><input type="submit" value="添加用户"></td></tr>
<tr><td><input type="reset" value="重新填写"></td></tr>
</table>
</form>
<?php
require_once 'commonFun.php';

checkUserValidate();
?>
<hr>
<img src="./images/mylogo.png" width=150px/>
</html>