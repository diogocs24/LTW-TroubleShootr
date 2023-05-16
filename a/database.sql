PRAGMA foreign_keys = ON;

DROP TABLE IF EXISTS Ticket;
DROP TABLE IF EXISTS User;
DROP TABLE IF EXISTS Clients;
DROP TABLE IF EXISTS Agent;
DROP TABLE IF EXISTS Admin;
DROP TABLE IF EXISTS Department;


CREATE TABLE Ticket (
  idTicket INTEGER PRIMARY KEY,
  FOREIGNKEY(idDepartment) references Department(idDepartment),
  FOREIGNKEY(idClient) references Client(idUser),
  FOREIGNKEY(idAgent) references Agent(idUser),
  message TEXT
);

CREATE TABLE User {
  id INTEGER  PRIMARY KEY,
  username TEXT NOT NULL UNIQUE,
  password TEXT NOT NULL,
  email TEXT NOT NULL UNIQUE
}

CREATE TABLE Clients {
  idUser INTEGER PRIMARY KEY,
  FOREIGN KEY (idUser) REFERENCES User(id) ON DELETE CASCADE
}

CREATE TABLE Agent{
  idUser INTEGER PRIMARY KEY,
  idDepartment INTEGER NOT NULL,
  FOREIGN KEY (idUser) REFERENCES User(id) ON DELETE CASCADE,
  FOREIGN KEY (idDepartment) REFERENCES Department(idDepartment)
}

CREATE TABLE Admin{
  idUser INTEGER PRIMARY KEY,
  FOREIGN KEY (idUser) REFERENCES User(id) ON DELETE CASCADE
}

CREATE TABLE Department{
  idDepartment INTEGER PRIMARY KEY,
  name TEXT NOT NULL UNIQUE
}

