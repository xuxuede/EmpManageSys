<?php 
    require_once 'AdminService.class.php';
    require_once 'checkcode2.php';
    
    echo $checkCode;
    
    //接收用户数据
    //id
    $id=$_POST['id'];
    //密码
    $password=$_POST['password'];
    $checkcode=$_POST['checkcode'];
    
    //session_start();
    
    //获取用户是否选择了保存id的勾
    if(isset($_POST['keep'])){
        
       setcookie("id",$id,time()+3600*24*14);
       
    }else{
      if(!empty($_COOKIE['id'])) {
      setcookie("id",$id,time()-1);
      }
        
    }
    //exit();
    
    
    //实例化一个adminService的方法
    $adminService=new AdminService();
    
    if($name=$adminService->checkAdmin($id, $password)&&$checkcode=$checkCode){
        
        session_start();
        $_SESSION['loginUser']=$name;
        
        header("Location:empMana.php?name=$name");
        exit();
        
    }else{
         header("Location:login.php?errno=1");
         exit();
    }
    
   /*  if($checkCode=="abc"){
        
        header("Location:empMana.php?name=$name");
        exit();
        
    }else{
        header("Location:login.php?errno=1");
        exit();
    } */
    
   
    
?>