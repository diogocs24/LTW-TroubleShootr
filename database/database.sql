CREATE TABLE Ticket (
  idTicket INTEGER PRIMARY KEY,
  idDepartment INTEGER,
  idClient INTEGER,
  idAgent INTEGER,
  title TEXT,
  message TEXT,
  hashtag VARCHAR,
  FOREIGN KEY (idDepartment) REFERENCES Department(idDepartment),
  FOREIGN KEY (idClient) REFERENCES Clients(idUser),
  FOREIGN KEY (idAgent) REFERENCES Agent(idUser)
);

CREATE TABLE Clients (
  idUser INTEGER PRIMARY KEY,
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
