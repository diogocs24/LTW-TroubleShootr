<?php
declare(strict_types = 1);

class FAQ {
    public int $ifFAQ;
    public string $title;
    public string $FAQmessage;
    public function __construct(int $idFAQ, string $title, string $FAQmessage)
    {
        $this->idFAQ = $idFAQ;
        $this->title = $title;
        $this->FAQmessage = $FAQmessage;
    }

    public function insert(PDO $db): void {
        if ($this->idFAQ === 0) {
            $stmt = $db->prepare('INSERT INTO FAQ (title, FAQmessage) VALUES (?, ?)');
            $stmt->execute([$this->title, $this->FAQmessage]);
            $this->idFAQ = intval($db->lastInsertId());
        }
        else {
            $stmt = $db->prepare('UPDATE FAQ SET title = ?, FAQmessage = ?');
            $stmt->execute([$this->title, $this->FAQmessage]);
        }
    }

    static function getQuestions(PDO $db) : array {
        $stmt = $db->prepare('
            SELECT f.idFAQ, f.title, f.FAQmessage
            FROM FAQ f
            GROUP BY 1;
        ');
        $stmt->execute();
        $faq = array();

        while ($question = $stmt->fetch()) {
            $faq[] = new FAQ(
                (int) $question['idFAQ'],
                $question['title'],
                $question['FAQmessage'],
            );
            
        }
        
        return $faq;
    }
}
?>
