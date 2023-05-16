<?php
declare(strict_types = 1);

class Ticket {
    public int $idTicket;
    public int $idDepartment;
    public int $idClient;
    public int $idAgent;
    public string $message;
    public string $title;
    public string $status;
    public string $created_at;
    public string $updated_at;
    public function __construct(int $idTicket, int $idDepartment, int $idClient, int $idAgent,
    string $message, string $title,string $status, string $created_at, string $updated_at)
    {
        $this->ticket_id = $ticket_id;
        $this->department_id = $department_id;
        $this->client_id = $client_id;
        $this->agent_id = $agent_id;
        $this->title = $title;
        $this->message = $message;
        $this->status = $status;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function insert(PDO $db): void {

        if ($this->idTicket === 0) {
          $stmt = $db->prepare('INSERT INTO Ticket (idDepartment, idClient,
          idAgent, title, [message], [status], created_at, updated_at)
           VALUES ( ?, ?, ?, ?, ?, ?, ?, ?)');
          $stmt->execute([$this->idDepartment, $this->idClient, $this->idAgent, $this->title,
           $this->message, $this->status, $this->created_at, $this->updated_at]);
           $this->idTicket = intval($db->lastInsertId());
      }
      else {

      }
  }
}
?>