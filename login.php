<html>
<h1>管理员登录系统</h1>
<img src="./images/b.gif" width=100px/>
<hr>
<form action="loginProcess.php" method="post">
<table>
<tr><td>用户id</td><td><input type="text" name="id" value="<?php echo $_COOKIE['id'] ?>"></td></tr>
<tr><td>密 &nbsp;&nbsp;码</td><td><input type="password" name="password"></td></tr>
<tr><td>验证码</td><td><input type="text" name="checkcode"/>
<img src="checkCode2.php"  onclick="this.src='checkCode2.php?aa='+Math.random()"/>
</td></tr>
<tr><td colspan="2">是否保存用户id<input type="checkbox" name="keep">
<tr>
<td><input type="submit" value="用户登录"></td>
<td>&nbsp;<input type="reset" value="重新填写"></td>
</tr>
</table>
</form>
<?php
     
   
     if(isset($_GET['errno'])){
     
     	$errno=$_GET['errno'];
     
        if($errno==1){
     	
     	echo "</br><font color='red'>你的用户名或者密码出错</font>";
     	
     	
       }
    }
?>
<hr>
<img src="./images/mylogo.png" width=150px/>
</html>
