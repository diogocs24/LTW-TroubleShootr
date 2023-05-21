<?php 

declare(strict_types = 1);

class Ticket_hashtag{
    public int $idTicket;
    public int $tag;
    public function __construct(int $idTicket, int $tag)
    {
        $this->idTicket = $idTicket;
        $this->tag = $tag;
    }

    public function save(PDO $db): void {
        $stmt = $db->prepare('INSERT INTO TICKET_HASHTAG (idTicket, tag) VALUES (?, ?)');
        $stmt->execute([$this->idTicket, $this->tag]);
    }

    static function getHashtagsWithTickedId(PDO $db, int $id) : array {
        $stmt = $db->prepare('
        SELECT t.idTicket, t.tag
        FROM TICKET_HASHTAG t
        WHERE t.idTicket = ?
        ');
        $stmt->execute(array($id));
        $hashtags_array = array();
        
        while ($hashtag = $stmt->fetch()) {
            $hashtags_array[] = new Ticket_hashtag (
                $hashtag['idTicket'],
                $hashtag['tag']
            );
        }
        return $hashtags_array;
    }
}
?>