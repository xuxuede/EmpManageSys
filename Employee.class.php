<?php
   //这个类的一个对象实例，表示一条雇员记录
   class Employee{
       
       private $id;
       private $name;
       private $level;
       private $email;
       private $salary;
    /**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return the $level
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return the $salary
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param field_type $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param field_type $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @param field_type $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @param field_type $salary
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;
    }

       
       
       
       
       
       
       
   }
?>
