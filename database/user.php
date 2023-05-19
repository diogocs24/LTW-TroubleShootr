<?php
  declare(strict_types = 1);

  class User {
    public int $idUser;
    public string $username;
    public string $email;
    public string $password;
    public function __construct(int $idUser, 
    string $username, string $email,string $password)
    {
      $this->idUser = $idUser;
      $this->username = $username;
      $this->email = $email;
      $this->password = $password;
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
          $user['password']
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
            $user['password']);
      }
      else {
          return null;
      }
  }

    public function update(PDO $db, string $username, string $email, string $password): void {
        $stmt = $db->prepare('UPDATE Clients SET username = ?, email = ?, password = ? WHERE idUser = ?');
        if (!empty($password)){
          $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
        else{
          $hashedPassword = $this->password;
        }
        if (empty($username)){
          $username = $this->username;
        }
        if (empty($email)){
          $email = $this->email;
        }
        $stmt->execute([$username, $email, $hashedPassword,$this->idUser]);
      }

    public function insert(PDO $db): void { 
      if ($this->idUser === 0) {

        $stmt = $db->prepare('INSERT INTO Clients (username, email, [password]) VALUES (?, ?, ?)');

        $stmt->execute([$this->username, $this->email,  $this->password]);

        $this->idUser = intval($db->lastInsertId());

      } else {
        $stmt = $db->prepare('UPDATE Clients SET username = ?, email = ?, password = ? WHERE idUser = ?');
        $stmt->execute([$this->username, $this->email, $this->password, $this->idUser]);
      }
    }

  static function isAgent(PDO $db, int $id): bool {
    $stmt = $db->prepare('SELECT COUNT(*) FROM Agent WHERE idUser = ?');
    
    $stmt->execute(array($id));

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