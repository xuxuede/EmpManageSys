<?php
    function getLastTime(){
        
        if(!empty($_COOKIE['lastVisit'])){
             
            echo  "上次登陆的时间是：".$_COOKIE['lastVisit'];
        
            setcookie("lastVisit",date("Y-m-d H:i:s"),time()+3600*24*30);
             
        }else{
        
            echo "欢迎登陆";
        
            setcookie("lastVisit",date("Y-m-d H:i:s"),time()+3600*24*30);
        }
        
        
        
    }
     //将用户是否合法封装到一个函数当中去
    function checkUserValidate(){
        
        session_start();
        
        if(empty($_SESSION['loginUser'])){
        
            header("Location:login.php?errno=1");
        }
        
    } 
     
     
?>