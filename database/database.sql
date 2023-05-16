CREATE TABLE Ticket (
  idTicket INTEGER PRIMARY KEY,
  idDepartment INTEGER NOT NULL,
  idClient INTEGER NOT NULL,
  idAgent INTEGER,
  title TEXT NOT NULL,
  [message] TEXT NOT NULL,
  [status] TEXT NOT NULL,
  created_at DATETIME NOT NULL,
  updated_at DATETIME NOT NULL,
  FOREIGN KEY (idDepartment) REFERENCES Department(idDepartment) ON DELETE CASCADE,
  FOREIGN KEY (idClient) REFERENCES Clients(idUser) ON DELETE CASCADE,
  FOREIGN KEY (idAgent) REFERENCES Agent(idUser) ON DELETE SET NULL,
);

CREATE TABLE HASHTAG (
    idHashtag INTEGER PRIMARY KEY,
    tag TEXT
);

CREATE TABLE TICKET_HASHTAG (
    idTicket INTEGER NOT NULL,
    tag INTEGER NOT NULL,
    FOREIGN KEY (TICKET_ID) REFERENCES TICKET(ID),
    FOREIGN KEY (TAG) REFERENCES HASHTAG(ID)
);

CREATE TABLE Clients (
  idUser INTEGER PRIMARY KEY,
  username TEXT NOT NULL,
  [password] TEXT NOT NULL,
  email TEXT NOT NULL
);


CREATE TABLE Agent (
  idUser INTEGER PRIMARY KEY,
  idDepartment INTEGER,
  username TEXT,
  password TEXT,
  email TEXT,
  FOREIGN KEY (idDepartment) REFERENCES Department(idDepartment)
);

CREATE TABLE Admin (
  idUser INTEGER PRIMARY KEY,
  username TEXT,
  password TEXT,
  email TEXT
);

CREATE TABLE Department(
  idDepartment INTEGER PRIMARY KEY,
  name TEXT NOT NULL unique
);
