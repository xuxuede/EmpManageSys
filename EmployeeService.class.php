<?php
// 一个函数可获取总共有多少页
require_once 'SQLiTool.class.php';

class EmployeeService
{
    function getEmpByID($id){
        
       $sql="select * from employee where id=$id";
       
       $sqliTool = new SQLiTool();
       
       $arr=$sqliTool->execute_dql2($sql);
       
       return $arr;
       //如果严格按照oop 面向对象
       //创建Emp对象实例
       //$employee=new Employee();
       //$emp->setId($arr[0]['id']);
       //以此类推
       //最终不是返回数组，而是返回一个对象
       //在界面显示的时候 echo $emp->getId()即可。。。
      
        
    }
    
    function updateEmp($id,$name,$level,$email,$salary){
        
        $sql="update employee set name='$name',level='$level',email='$email',salary='$salary' where id=$id";
        
        $sqliTool=new SQLiTool();
        
        $res=$sqliTool->execute_dml($sql);
        
        
        
    }

    function getPageCount($pageSize)
    {
        $sql = "select count(id) from employee";
        
        $sqliTool = new SQLiTool();
        
        $res = $sqliTool->execute_dql($sql);
        
        if ($row = $res->fetch_row()) {
            
            $pageCount = ceil($row[0] / $pageSize);
        }
        return $pageCount;
        
        // $res->free();
        $sqliTool->close();
    }
    // A还需要一个页面显示雇员所有的信息
    function getEmpList($pageNow, $pageSize)
    {
        $sql = "select * from employee limit 
           " . ($pageNow - 1) * $pageSize . ",$pageSize";
        
        $sqliTool = new SQLiTool();
        // 这里的res不是结果集，而是一个二维数组
        $res = $sqliTool->execute_dql2($sql);
        
        // 释放资源，关闭连接，这里面的资源释放问题要深刻理解
        // 因为其他函数在调用的时候，过早的释放资源,将返回给调用者一个空集
        
        // 321`3的东西弄到数组里面，这样就可以尽早释放出数组里面的结果集
        
        // $res->free_result();
        
        return $res;
    }
    // B第二种使用封装的方式来完成的分页 （业务逻辑）
    function getPageDiv($pageDiv)
    {
        $sqliTool = new SQLiTool();
        
        $sql1 = "select * from employee limit 
             " . ($pageDiv->pageNow - 1) * $pageDiv->pageSize . ",$pageDiv->pageSize";
        $sql2 = "select count(id) from employee";
        
        $sqliTool->execute_dql_pageDiv($sql1, $sql2, $pageDiv);
        
        // $sqliTool->close();
    }
   
    function addEmp($name,$level,$email,$salary){
        
        $sqliTool = new SQLiTool();
        
        $sql = "insert into employee (name,level,email,salary)";
        $sql.="values('$name','$level','$email','$salary')";
        
        return $sqliTool->execute_dml($sql);//因为会返回0，1，2的值
        
        
    }

    function delByID($id)
    {
        $sqliTool = new SQLiTool();
        
        $sql = "delete from employee where id=$id ";
        
        return $sqliTool->execute_dml($sql);
    }
    
}
?>
