<?php
  declare(strict_types = 1);

  date_default_timezone_set('Europe/Lisbon');


  class Message{
    public int $idMessage;
    public int $idTicket;
    public int $idUser;
    public string $message;
    public string $created_at;
    public function __construct(int $idMessage, 
    int $idTicket, int $idUser,string $message, string $created_at)
    {
      $this->idMessage = $idMessage;
      $this->idTicket = $idTicket;      
       $this->idUser = $idUser;
      $this->message = $message;
      $this->created_at=$created_at;
    }

    static public function getMessages(PDO $db,int $idTicket):array{
        $stmt = $db->prepare('
        SELECT idMessage, idUser, idTicket, message, created_at
        FROM MESSAGE
        WHERE idTicket = ?
      ');

      $stmt->execute(array($idTicket));
      $messages = array();
      while ($message=$stmt->fetch()){
        $messages[]=new Message(
          (int) $message['idMessage'],
          (int) $message['idTicket'],
          (int) $message['idUser'],
          $message['message'],
          $message['created_at']
        );

      }
      return $messages;
    }

    public function insert(PDO $db): void {
        if ($this->idMessage === 0) {
          $stmt = $db->prepare('INSERT INTO [MESSAGE] (idTicket, idUser,[message],created_at) VALUES (?, ?, ?,?)');
          $createdAt = date('H:i:s');
          $stmt->execute([$this->idTicket, $this->idUser, $this->message, $createdAt]);
           $this->idMessage = intval($db->lastInsertId());
      }
  }

}