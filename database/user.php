<?php
  declare(strict_types = 1);

  class User {
    public int $idUser;
    public string $username;
    public string $email;
    public string $password;
    public string $role;
    public function __construct(int $idUser, 
    string $username, string $email,string $password, string $role)
    {
      $this->idUser = $idUser;
      $this->username = $username;
      $this->email = $email;
      $this->password = $password;
      $this->role = $role;
    }

    public static function userEmailAlreadyExists(PDO $db, string $email): bool {
      $stmt = $db->prepare('SELECT COUNT(*) FROM Clients WHERE email = ?');
      $stmt->execute([$email]);
      $result = $stmt->fetchColumn();
      return $result > 0;
    }
    
      

    static function getUserWithPassword(PDO $db, string $email, string $password) : ?User {
      $stmt = $db->prepare('SELECT * FROM Clients WHERE email = ?');
      $stmt->execute(array(strtolower($email)));
      $user = $stmt->fetch();
      // mudar -> so fazer password_verify se este user for null
      if ($user !== null && password_verify($password, $user['password'])) {
        echo ("PASSWORD PASSES");
        return new User(
          (int) $user['idUser'],
          $user['username'],  
          $user['email'],
          $user['password'],
          $user['role']
        );
      } else return null;
    }

    
public static function usernameAlreadyExists(PDO $db, string $username): bool {
  $stmt = $db->prepare('SELECT COUNT(*) FROM Clients WHERE username = ?');
  $stmt->execute([$username]);
  $result = $stmt->fetchColumn();
  return $result > 0;
}



function get_avatar_path() : string{
  $file_extensions = ['jpg', 'jpeg', 'png', 'gif'];
  
  foreach ($file_extensions as $extension) {
    $file_path = "../images/$this->idUser.$extension";
    if (file_exists($file_path)) {
      return $file_path;
    }
  }
  
  return "../images/default-user-image.png";
}


    static function getUser(PDO $db, int $id) : ?User {
      $stmt = $db->prepare('SELECT * FROM Clients WHERE idUser = ?');
      $stmt->execute(array($id));

      if($user = $stmt->fetch()) {
          return new User(
           (int) $user['idUser'],
            $user['username'],  
            $user['email'],
            $user['password'],
            $user['role']
          );
      }
      else {
          return null;
      }
  }
  static function getUserId(PDO $db, string $name) : int {
    $stmt = $db->prepare('SELECT c.idUser FROM Clients c WHERE c.username=?');

    $stmt ->execute(array($name));

    $user = $stmt->fetch();

    $idU = (int) $user['idUser'];

    return $idU;
  }

  static function getAllUsers(PDO $db) : array {
    $stmt = $db->prepare('SELECT c.idUser, c.username, c.email, c.password, c.role FROM Clients c WHERE role=?');
    $stmt->execute(array("user"));
    $users_array = array();

    while($user = $stmt->fetch()){
      $users_array[] = new User(
        (int) $user['idUser'],
        $user['username'],
        $user['email'],
        $user['password'],
        $user['role']
      );
    }
    return $users_array;
  }

    static public function updateRole(PDO $db, int $id): void {
        $stmt = $db->prepare('UPDATE Clients SET role=? WHERE idUser = ?');
        $stmt -> execute(["admin",$id]);
      }
      static public function updateUsername(PDO $db,string $username, int $id): void {
        $stmt = $db->prepare('UPDATE Clients SET username=? WHERE idUser = ?');
        $stmt -> execute([$username ,$id]);
      }

      static public function updateEmail(PDO $db,string $email, int $id): void {
        $stmt = $db->prepare('UPDATE Clients SET email=? WHERE idUser = ?');
        $stmt -> execute([$email ,$id]);
      }

    

    public function insert(PDO $db): void { 
      if ($this->idUser === 0) {

        $stmt = $db->prepare('INSERT INTO Clients (username, email, [password], role) VALUES (?, ?, ?, ?)');

        $stmt->execute([$this->username, $this->email,  $this->password, $this->role]);

        $this->idUser = intval($db->lastInsertId());

      } else {
        $stmt = $db->prepare('UPDATE Clients SET username = ?, email = ?, password = ? , role = ? WHERE idUser = ?');
        $stmt->execute([$this->username, $this->email, $this->password, $this->idUser, $this->role]);
      }
    }

  static function isAgent(PDO $db, int $id): bool {
    $stmt = $db->prepare('SELECT COUNT(*) FROM Agent WHERE idUser = ?');
    
    $stmt->execute(array($id));

    $result = $stmt->fetchColumn();

    return $result > 0;
    
  }
  static function isAdmin(PDO $db, int $id): bool {
    $stmt = $db->prepare('SELECT COUNT(*) FROM Clients WHERE idUser=? AND role=?');
    
    $stmt->execute(array($id, "admin"));

    $result = $stmt->fetchColumn();

    return $result > 0;
    
  }

  static function getAgentDepartment(PDO $db, int $id): int {
    $stmt = $db->prepare('SELECT idDepartment FROM Agent WHERE idUser = ?');
    
    $stmt->execute(array($id));

    $result = $stmt->fetch();

    return (int) $result['idDepartment'];
    
  }

  }

  
?>