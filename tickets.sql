CREATE TABLE question (
  idTicket INTEGER PRIMARY KEY,
  idDepartment INTEGER,
  idClient INTEGER,
  username TEXT NOT NULL,
  body TEXT NOT NULL,
  --createDate TIMESTAMP NOT NULL DEFAULT NOW()
);
