<?php
declare(strict_types = 1);

class Ticket {
    public int $idTicket;
    public int $idDepartment;
    public int $idClient;
    public int $idAgent;
    public string $ticket_message;
    public string $title;
    public string $ticket_status;
    public string $created_at;
    public string $updated_at;
    public function __construct(int $idTicket, int $idDepartment, int $idClient, int $idAgent,
    string $ticket_message, string $title,string $ticket_status, string $created_at, string $updated_at)
    {
        $this->idTicket = $idTicket;
        $this->idDepartment = $idDepartment;
        $this->idClient = $idClient;
        $this->idAgent = $idAgent;
        $this->title = $title;
        $this->ticket_message = $ticket_message;
        $this->ticket_status = $ticket_status;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function insert(PDO $db): void {
        if ($this->idTicket === 0) {
            $stmt = $db->prepare('INSERT INTO TICKET (idDepartment, idClient, idAgent, title, ticket_message, ticket_status, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([$this->idDepartment, $this->idClient, $this->idAgent, $this->title, $this->ticket_message, $this->ticket_status, $this->created_at, $this->updated_at]);
            $this->idTicket = intval($db->lastInsertId());
        }
        else {
            $stmt = $db->prepare('UPDATE TICKET SET idDepartment = ?, idClient = ?, idAgent = ?, title = ?, ticket_message = ?, ticket_status = ?, created_at = ?, updated_at = ? WHERE idTicket = ?');
            $stmt->execute([$this->idDepartment, $this->idClient, $this->idAgent, $this->title, $this->ticket_message, $this->ticket_status, $this->created_at, $this->updated_at]);
        }
    }
}
?>