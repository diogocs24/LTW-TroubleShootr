<?php
  declare(strict_types = 1);

  class Department{
    public int $idDepartment;
    public string $name;

    public function __construct(
        int $idDepartment, string $name
      )
    {
      $this->idDepartment = $idDepartment;
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
    static function getDepartments(PDO $db, string $name) : Department {
      $stmt = $db->prepare('SELECT d.idDepartment, d.name FROM Department d WHERE name = ?');
      
      $stmt->execute(array($name));
  
      $department = $stmt->fetch();
  
      return new Department(
        (int) $department['idDepartment'], 
        $department['name']
        );

      }
  
      static function getDepartmentName(PDO $db, int $id) : string {
        $stmt = $db->prepare('SELECT d.name FROM Department d WHERE idDepartment = ?');
       
        $stmt->execute(array($id));
    
        $department = $stmt->fetch();
    
        return $department['name'];
  
        }
  }
 
?>