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
    public string $ticket_priority;
    public string $created_at;
    public string $updated_at;
    public function __construct(int $idTicket, int $idDepartment, int $idClient, int $idAgent,
    string $ticket_message, string $title,string $ticket_status, string $ticket_priority, string $created_at, string $updated_at)
    {
        $this->idTicket = $idTicket;
        $this->idDepartment = $idDepartment;
        $this->idClient = $idClient;
        $this->idAgent = $idAgent;
        $this->title = $title;
        $this->ticket_message = $ticket_message;
        $this->ticket_status = $ticket_status;
        $this->ticket_priority = $ticket_priority;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public function insert(PDO $db): void {
        if ($this->idTicket === 0) {
            $stmt = $db->prepare('INSERT INTO TICKET (idDepartment, idClient, idAgent, title, ticket_message, ticket_status, ticket_priority, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute([$this->idDepartment, $this->idClient, $this->idAgent, $this->title, $this->ticket_message, $this->ticket_status, $this->ticket_priority, $this->created_at, $this->updated_at]);
            $this->idTicket = intval($db->lastInsertId());
        }
        else {
            $stmt = $db->prepare('UPDATE TICKET SET idDepartment = ?, idClient = ?, idAgent = ?, title = ?, ticket_message = ?, ticket_status = ?, ticket_priority = ?, created_at = ?, updated_at = ? WHERE idTicket = ?');
            $stmt->execute([$this->idDepartment, $this->idClient, $this->idAgent, $this->title, $this->ticket_message, $this->ticket_status, $this->ticket_priority, $this->created_at, $this->updated_at]);
        }
    }

    static function getTicketsFromUser(PDO $db, int $id) : array {
        $stmt = $db->prepare('
            SELECT t.idTicket, t.idClient, t.idAgent, t.idDepartment, t.title, t.ticket_message, t.ticket_status, t.ticket_priority, t.created_at, t.updated_at
            FROM TICKET t
            WHERE t.idClient = ?
            GROUP BY 1;
        ');
        $stmt->execute(array($id));
        $tickets_array = array();

        while ($ticket = $stmt->fetch()) {
            
            $tickets_array[] = new Ticket(
                (int) $ticket['idTicket'], 
                (int) $ticket['idClient'],
                (int) $ticket['idAgent'],
                (int) $ticket['idDepartment'],
                $ticket['title'],
                $ticket['ticket_message'],
                $ticket['ticket_status'],
                $ticket['ticket_priority'],
                $ticket['created_at'],
                $ticket['updated_at']
            );
            
        }
        
        return $tickets_array;
    }

    static function getTicketsResolvedFromUser(PDO $db, int $id) : array {
        $stmt = $db->prepare('
          SELECT t.idTicket, t.idUser,
           t.idDepartment, t.idAgent, t.title, t.ticket_message,
            t.ticket_status, t.ticket_priority, t.created_at, t.updated_at
          FROM TICKET t
          WHERE t.idClient = ? AND t.ticket_status = "done"
          GROUP BY 1;
        ');
        $stmt->execute(array($id));
    
        $tickets_array = array();
    
        while ($ticket = $stmt->fetch()) {
          $tickets_array[] = new Ticket(
            $ticket['idTicket'], 
            $ticket['idUser'],
            $ticket['idDepartment'],
            $ticket['idAgent'],
            $ticket['title'],
            $ticket['ticket_message'],
            $ticket['ticket_status'],
            $ticket['ticket_priority'],
            $ticket['created_at'],
            $ticket['updated_at']
          );
        }
    
        return $tickets_array;
      }

      static function getTicketsNotOpened(PDO $db, int $id) : array {
        $stmt = $db->prepare('
          SELECT t.idTicket, t.idUser,
           t.idDepartment, t.idAgent, t.title, t.ticket_message,
            t.ticket_status, t.ticket_priority, t.created_at, t.updated_at
          FROM TICKET t
          WHERE t.idClient = ? AND t.ticket_status = "not_opened"
          GROUP BY 1;
        ');
        $stmt->execute(array($id));
    
        $tickets_array = array();
    
        while ($ticket = $stmt->fetch()) {
          $tickets_array[] = new Ticket(
            $ticket['idTicket'], 
            $ticket['idUser'],
            $ticket['idDepartment'],
            $ticket['idAgent'],
            $ticket['title'],
            $ticket['ticket_message'],
            $ticket['ticket_status'],
            $ticket['ticket_priority'],
            $ticket['created_at'],
            $ticket['updated_at']
          );
        }
    
        return $tickets_array;
      }
      static function getAllTickets(PDO $db) : array {
        $stmt = $db->prepare('
          SELECT t.idTicket, t.idClient, t.idAgent,
           t.idDepartment, t.idAgent, t.title, t.ticket_message,
            t.ticket_status, t.ticket_priority, t.created_at, t.updated_at
          FROM TICKET t
        ');
        $stmt->execute(array());
    
        $tickets_array = array();
    
        while ($ticket = $stmt->fetch()) {
            $tickets_array[] = new Ticket(
              (int) $ticket['idTicket'], 
              (int) $ticket['idUser'],
              (int) $ticket['idDepartment'],
              (int) $ticket['idAgent'],
              $ticket['title'],
              $ticket['ticket_message'],
              $ticket['ticket_status'],
              $ticket['ticket_priority'],
              $ticket['created_at'],
              $ticket['updated_at']
            );
          }
    
        return $tickets_array;
      }
      static function getTicketsFromDepartment(PDO $db, int $id) : array {
        $stmt = $db->prepare('
            SELECT t.idTicket, t.idClient, t.idAgent, t.idDepartment, t.title, t.ticket_message, t.ticket_status, t.ticket_priority, t.created_at, t.updated_at
            FROM TICKET t
            WHERE t.idDepartment = ?
            GROUP BY 1;
        ');
        $stmt->execute(array($id));
        $tickets_array = array();

        while ($ticket = $stmt->fetch()) {
            
            $tickets_array[] = new Ticket(
                (int) $ticket['idTicket'], 
                (int) $ticket['idClient'],
                (int) $ticket['idAgent'],
                (int) $ticket['idDepartment'],
                $ticket['title'],
                $ticket['ticket_message'],
                $ticket['ticket_status'],
                $ticket['ticket_priority'],
                $ticket['created_at'],
                $ticket['updated_at']
            );
            
        }
        
        return $tickets_array;
    }
}
?>
