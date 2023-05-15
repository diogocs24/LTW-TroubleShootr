<?php
  declare(strict_types = 1);

  class User {
    public int $user_id;
    public string $username;
    public string $email;
    public string $password;
    public function __construct(int $user_id, 
    string $username, string $email,string $password)
    {
      $this->user_id = $user_id;
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
      $stmt = $db->prepare('SELECT * FROM Users WHERE email = ?');
      $stmt->execute(array(strtolower($email)));
      $user = $stmt->fetch();
      // mudar -> so fazer password_verify se este user for null
      if ($user !== null && password_verify($password, $user['password'])) {
        echo ("PASSWORD PASSES");
        return new User(
          $user['user_id'],
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
    $file_path = "../images/$this->user_id.$extension";
    if (file_exists($file_path)) {
      return $file_path;
    }
  }
  
  return "../images/default-user-image.png";
}


    static function getUser(PDO $db, int $id) : ?User {
      $stmt = $db->prepare('SELECT * FROM Users WHERE user_id = ?');
      $stmt->execute(array($id));

      if($user = $stmt->fetch()) {
          return new User(
            $user['user_id'],
            $user['username'],  
            $user['email'],
            $user['password'],);
      }
      else {
          return null;
      }
  }



    public function update(PDO $db, string $username, string $email, string $password): void {
        $stmt = $db->prepare('UPDATE Clients SET username = ?, email = ?, password = ? WHERE user_id = ?');
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
        $stmt->execute([$username, $email, $bio, $hashedPassword,$this->user_id]);
      }

    public function insert(PDO $db): void { 
      if ($this->user_id === 0) {

        $stmt = $db->prepare('INSERT INTO Clients (username, email, password) VALUES (?, ?, ?)');

        $stmt->execute([$this->username, $this->email,  $this->password]);

      } else {
        $stmt = $db->prepare('UPDATE Users SET username = ?, email = ?, bio = ?, password = ?, role = ? WHERE user_id = ?');
        $stmt->execute([$this->username, $this->email, $this->password, $this->user_id]);
      }
    }
  }
?>