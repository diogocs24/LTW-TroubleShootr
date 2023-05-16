PRAGMA FOREIGN_KEYS = ON;

DROP TABLE IF EXISTS Ticket;
DROP TABLE IF EXISTS Clients;
DROP TABLE IF EXISTS Agent;
DROP TABLE IF EXISTS Admin;
DROP TABLE IF EXISTS Department;



CREATE TABLE Ticket (
  idTicket INTEGER PRIMARY KEY,
  idDepartment INTEGER,
  idClient INTEGER,
  idAgent INTEGER,
  message TEXT,
  FOREIGN KEY (idDepartment) REFERENCES Department(idDepartment),
  FOREIGN KEY (idClient) REFERENCES Clients(idUser),
  FOREIGN KEY (idAgent) REFERENCES Agent(idUser)
);

CREATE TABLE Clients (
  idUser INTEGER NOT NULL PRIMARY KEY,
  username TEXT NOT NULL,
  password TEXT NOT NULL,
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
  name TEXT 
);
