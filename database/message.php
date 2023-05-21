<?php
  declare(strict_types = 1);

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

    public function save(PDO $db): void {
        if ($this->idMessage === 0) {
          $stmt = $db->prepare('INSERT INTO Comments (idTicket, idUser,[message],created_at) VALUES (?, ?, ?,?)');
          $stmt->execute([$this->idTicket, $this->idUser, $this->message, $this->created_at]);
           $this->idMessage = intval($db->lastInsertId());
      }
  }

}