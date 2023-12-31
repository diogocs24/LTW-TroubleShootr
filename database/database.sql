PRAGMA FOREIGN_KEYS = ON;

DROP TABLE IF EXISTS TICKET_HASHTAG;
DROP TABLE IF EXISTS TICKET;
DROP TABLE IF EXISTS HASHTAG;
DROP TABLE IF EXISTS Clients;
DROP TABLE IF EXISTS Agent;
DROP TABLE IF EXISTS [Admin];
DROP TABLE IF EXISTS Department;
DROP TABLE IF EXISTS [MESSAGE];
DROP TABLE IF EXISTS FAQ;

CREATE TABLE Department(
  idDepartment INTEGER PRIMARY KEY,
  [name] TEXT NOT NULL UNIQUE
);

CREATE TABLE Clients (
  idUser INTEGER NOT NULL PRIMARY KEY,
  name TEXT NOT NULL,
  username TEXT NOT NULL,
  [password] TEXT NOT NULL,
  email TEXT NOT NULL,
  role TEXT NOT NULL
);

CREATE TABLE Agent (
  idUser INTEGER PRIMARY KEY,
  idDepartment INTEGER,
  FOREIGN KEY (idUser) REFERENCES Clients(idUser),
  FOREIGN KEY (idDepartment) REFERENCES Department(idDepartment)
);

CREATE TABLE HASHTAG (
  idHashtag INTEGER PRIMARY KEY,
  tag TEXT
);

CREATE TABLE TICKET (
  idTicket INTEGER PRIMARY KEY,
  idDepartment INTEGER NOT NULL,
  idClient INTEGER NOT NULL,
  idAgent INTEGER,
  title TEXT NOT NULL,
  ticket_message TEXT NOT NULL,
  ticket_status TEXT NOT NULL,
  ticket_priority TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TEXT NOT NULL,
  FOREIGN KEY (idDepartment) REFERENCES Department(idDepartment) ON DELETE CASCADE,
  FOREIGN KEY (idClient) REFERENCES Clients(idUser) ON DELETE CASCADE,
  FOREIGN KEY (idAgent) REFERENCES Agent(idUser) ON DELETE SET NULL
);

CREATE TABLE TICKET_HASHTAG (
  idTicket INTEGER NOT NULL,
  tag INTEGER NOT NULL,
  FOREIGN KEY (idTicket) REFERENCES TICKET(idTicket),
  FOREIGN KEY (tag) REFERENCES HASHTAG(idHashtag)
);

CREATE TABLE FAQ (
  idFAQ INTEGER NOT NULL PRIMARY KEY,
  title TEXT NOT NULL,
  FAQmessage TEXT NOT NULL
);

CREATE TABLE MESSAGE (
  idMessage INTEGER NOT NULL PRIMARY KEY,
  idTicket INTEGER NOT NULL,
  idUser INTEGER NOT NULL,
  [message] TEXT,
  created_at TIMESTAMP,
  FOREIGN KEY (idTicket) REFERENCES TICKET(idTicket),
  FOREIGN KEY (idUser) REFERENCES Clients(idUser)
);

INSERT INTO Department(idDepartment, [name]) VALUES (1, "Tecnologia Web");
INSERT INTO Department(idDepartment, [name]) VALUES (2, "Informática");
INSERT INTO Department(idDepartment, [name]) VALUES (3, "Física");
INSERT INTO Department(idDepartment, [name]) VALUES (4, "Química");
INSERT INTO Department(idDepartment, [name]) VALUES (5, "Arte");
INSERT INTO Department(idDepartment, [name]) VALUES (6, "Design");
INSERT INTO Department(idDepartment, [name]) VALUES (7, "História");
INSERT INTO Department(idDepartment, [name]) VALUES (8, "Geografia");


