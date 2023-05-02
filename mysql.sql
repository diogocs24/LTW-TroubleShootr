CREATE TABLE Ticket (
  idTicket INTEGER PRIMARY KEY,
  FOREIGNKEY(idDepartment) references Department(idDepartment),
  FOREIGNKEY(idClient) references Client(idUser),
  FOREIGNKEY(idAgent) references Agent(idUser),
  message TEXT NOT NULL,
  status TEXT NOT NULL CHECK(status=="open" || status=="not opened")
  --createDate TIMESTAMP NOT NULL DEFAULT NOW()
);

CREATE TABLE Clients {
  idUser INTEGER PRIMARY KEY,
  username TEXT NOT NULL,
  password TEXT NOT NULL,
  e-mail TEXT NOT NULL
}


CREATE TABLE Agent{
idUser INTEGER PRIMARY KEY,
FOREIGNKEY(idDepartment) references Department(idDepartment),
username TEXT NOT NULL,
password TEXT NOT NULL,
e-mail TEXT NOT NULL
}

CREATE TABLE Admin{
idUser INTEGER PRIMARY KEY,
username TEXT NOT NULL,
password TEXT NOT NULL,
e-mail TEXT NOT NULL

}

CREATE TABLE Department{
  idDepartment INTEGER PRIMARY KEY,
  name TEXT NOT NULL
}

