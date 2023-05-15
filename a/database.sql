CREATE TABLE Ticket (
  idTicket INTEGER PRIMARY KEY,
  FOREIGNKEY(idDepartment) references Department(idDepartment),
  FOREIGNKEY(idClient) references Client(idUser),
  FOREIGNKEY(idAgent) references Agent(idUser),
  message TEXT
);

CREATE TABLE Clients {
  idUser INTEGER  PRIMARY KEY,
  username VARCHAR ,
  password VARCHAR ,
  email VARCHAR
}


CREATE TABLE Agent{
idUser INTEGER PRIMARY KEY,
FOREIGNKEY(idDepartment) references Department(idDepartment),
username TEXT ,
password TEXT ,
e-mail TEXT 
}

CREATE TABLE Admin{
idUser INTEGER PRIMARY KEY,
username TEXT,
password TEXT ,
e-mail TEXT 

}

CREATE TABLE Department{
  idDepartment INTEGER PRIMARY KEY,
  name TEXT 
}

