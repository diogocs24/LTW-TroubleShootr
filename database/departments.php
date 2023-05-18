<?php
  declare(strict_types = 1);

  class Department{
    public int $department_id;
    public string $name;

    public function __construct(
        int $department_id, string $name
      )
    {
      $this->department_id = $department_id;
      $this->name = $name;
    }

      static function getAllDepartments(PDO $db) : array{
        $stmt = $db->prepare('
        SELECT idDepartment, name
        FROM Department
      ');
      $stmt->execute(array());

      $departments = array();
      while ($department=$stmt->fetch()){
        $departments[]=new Department(
          (int) $department['idDepartment'],
          $department['name']
        );

      }
      return $departments;
     
    }

  
  
  }
 
?>