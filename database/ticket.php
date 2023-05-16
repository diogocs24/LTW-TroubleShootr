<?php
declare(strict_types = 1);

class User {
    public int $ticket_id;
    public int $department_id;
    public int $client_id;
    public int $agent_id;
    public string $message;
    public string $title;
    public string $hashtag;
    public function __construct(int $ticket_id, int $department_id, int $client_id, int $agent_id,
    string $message, string $title,string $hashtag)
    {
        $this->ticket_id = $ticket_id;
        $this->department_id = $department_id;
        $this->client_id = $client_id;
        $this->agent_id = $agent_id;
        $this->title = $title;
        $this->message = $message;
        $this->hashtag = $hashtag;
    }
}
?>