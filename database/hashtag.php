<?php 

declare(strict_types = 1);

class Hashtag{
    public int $idHashtag;
    public string $tag;
    public function __construct(int $idHashtag, string $tag)
    {
        $this->idHashtag = $idHashtag;
        $this->tag = $tag;
    }

    public function save(PDO $db): void {
        if ($this->idHashtag === 0) {
            $stmt = $db->prepare('INSERT INTO HASHTAG (tag) VALUES (?)');
            $stmt->execute([$this->tag]);
            $this->idHashtag = intval($db->lastInsertId());
        }
        else {
            $stmt = $db->prepare('UPDATE HASHTAG SET tag = ?, idClient = ? WHERE idHashtag = ?');
            $stmt->execute([$this->tag]);
        }
    }

    static function checkNotTag(PDO $db, string $tag) {
        
        $stmt = $db->prepare('
            SELECT COUNT(h.idHashtag)
            FROM HASHTAG h
            WHERE h.tag = :tag
        ');
        
        $stmt->execute(array(':tag' => $tag));
        $count = $stmt->fetchColumn();

        if($count > 0) {
            return false;
        } else {
            return true;
        }
    }

    static function getHashtagName(PDO $db, int $id) : string {
        $stmt = $db->prepare('
        SELECT h.idHashtag, h.tag
        FROM HASHTAG h
        WHERE h.idHashtag = ?
        GROUP BY 1;
        ');
        $stmt->execute(array($id));
        $hashtags_array = array();
        
        $hashtag = $stmt->fetch();
        return $hashtag['tag'];
    }

    static function getHashtagWithName(PDO $db, string $tag) : int {
        $stmt = $db->prepare('
        SELECT h.idHashtag, h.tag
        FROM HASHTAG h
        WHERE h.tag = :tag
        ');
        $stmt->execute(array(':tag' => $tag));        
        $hashtag = $stmt->fetch();
        return (int) $hashtag['idHashtag'];
    }
}
?>