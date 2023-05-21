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
    public function insert(PDO $db): void {
      if ($this->idDepartment === 0) {
          $stmt = $db->prepare('INSERT INTO Department (name) VALUES (?)');
          $stmt->execute([$this->name]);
          $this->idDepartment = intval($db->lastInsertId());
      }
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