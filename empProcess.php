<?php

   // 接收用户要删除的id
   require_once 'EmployeeService.class.php';
   $employeeService = new EmployeeService();
   
   //接收
   //此处将get方式改为request，因为里面既有get也有post
   
   
   if (! empty($_REQUEST['flag'])) {
      // 不为空即需要删除用户
       $flag=$_REQUEST['flag'];
       //执行删除请求
       if($flag=="del"){
       $id=$_REQUEST['id'];
      // echo "你希望删除的用户id号是".$id;
      if($employeeService->delByID($id)==1){
          
          header("Location:ok.php");
          exit();
          
      }else{
          
          header("Location:err.php");
          exit();
      }
     }else if($flag=="addemp"){
         //说明是执行添加雇员
         //接收数据
         $name=$_POST['name'];
         $level=$_POST['level'];
         $email=$_POST['email'];
         $salary=$_POST['salary'];
         //完成添加到数据库
         
         $res=$employeeService->addEmp($name, $level, $email, $salary);
         
         if($res==1){
             
             header("Location:ok.php");
             exit();
         }else{
             
             header("Location:ok.php");
             exit();
         }
         
     }else if($flag=="updateemp"){
         
         $id=$_POST['id'];
         $name=$_POST['name'];
         $level=$_POST['level'];
         $email=$_POST['email'];
         $salary=$_POST['salary'];
         
         $res=$employeeService->updateEmp($id, $name, $level, $email, $salary);
         
         if($res==1){
              
             header("Location:ok.php");
             exit();
         }else{
              
             header("Location:ok.php");
             exit();
         }
          
         
     }
  }

?>