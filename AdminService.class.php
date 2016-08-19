<?php
   //该类是一个业务逻辑处理类，即完成对admin表格的业务逻辑操作
   require_once("SQLiTool.class.php");
   class AdminService{
       
       //以上的loginProcess就不进行验证以及业务逻辑处理的功能了
       //这边也要实现数据库验证用户是否合法的功能
       //传进两个参数即可，id和密码
           public function checkAdmin($id,$password){
           
           $sql="select password,name from admin where id=$id ";
           //创建一个SqliTool的对象
           $sqliTool=new SQLiTool();
           
           $res=$sqliTool->execute_dql($sql);
           
           if($row=$res->fetch_assoc()){
               
               if(md5($password)==($row['password'])){
                   
                   return $row['name'];     
               }
             }
             //资源释放
             $res->free_result();
          
             return false;
               
           }
            
       }
       
   
?>
