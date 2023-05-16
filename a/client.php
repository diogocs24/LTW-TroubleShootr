<?php
  declare(strict_types = 1);

  class Client {
    public int $idUser;
    public string $username;
    public string $email;
    public string $password;
    public function __construct(int $idUser, 
    string $username, string $email, string $password)
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
      $stmt = $db->prepare('SELECT * FROM Clients WHERE email = ?');
      $stmt->execute(array(strtolower($email)));
      $user = $stmt->fetch();
      if ($user !== null && password_verify($password, $user['password'])) {
        echo ("PASSWORD PASSES");
        return new User(
          $user['idUser'],
          $user['username'],  
          $user['email'],
          $user['password']
        );
      } else return null;
    }

    static function getCurrentUser(PDO $db, int $id) : ?User {
      $stmt = $db->prepare('SELECT * FROM Clients WHERE user_id = ?');
      $stmt->execute(array($id));

      if($user = $stmt->fetch()) {
          return new User(
            $user['idUser'],
            $user['username'],  
            $user['email'],
            $user['password']);
      }
      else return null;
  }


    /*function get_avatar_path() : string{
      $file_extensions = ['jpg', 'jpeg', 'png', 'gif'];
      
      foreach ($file_extensions as $extension) {
        $file_path = "../images/$this->user_id.$extension";
        if (file_exists($file_path)) {
          return $file_path;
        }
      }
      
      return "../images/default-user-image.png";
    }*/

    public static function usernameAlreadyExists(PDO $db, string $username): bool {
      $stmt = $db->prepare('SELECT COUNT(*) FROM Clients WHERE username = ?');
      $stmt->execute([$username]);
      $result = $stmt->fetchColumn();
      return $result > 0;
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
        $stmt->execute([$username, $email, $hashedPassword, $this->user_id]);
      }

    /*public function save(PDO $db): void { //funçao para adicionar users quando dao register e para dar update (para dps dar update a roles etc.)
      if ($this->user_id === 0) {
        // quando cria um novo user no register cria com o id a 0, mas dá update a esse user-Id para ser igual à base de dados quando é inserido lá
        $stmt = $db->prepare('INSERT INTO Users (username, email, bio, password, role) VALUES (?, ?, ?, ?, ?)');
        // base de dados auto incrementa o user_id sozinha
        $stmt->execute([$this->username, $this->email, $this->bio, $this->password, $this->role]);
        $this->user_id = intval($db->lastInsertId());
        // meter o user_id da classe igual ao da base de dados (ainda n sei se funciona isto)
      } else {
        $stmt = $db->prepare('UPDATE Users SET username = ?, email = ?, bio = ?, password = ?, role = ? WHERE user_id = ?');
        $stmt->execute([$this->username, $this->email, $this->bio, $this->password, $this->role, $this->user_id]);
      }
    }*/
  }
?>