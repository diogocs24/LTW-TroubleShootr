CREATE TABLE question (
  idTicket INTEGER PRIMARY KEY,
  idDepartment INTEGER,
  idClient INTEGER,
  username TEXT NOT NULL,
  body TEXT NOT NULL,
  --createDate TIMESTAMP NOT NULL DEFAULT NOW()
);
CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  username varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  PRIMARY KEY (id),
  UNIQUE KEY username (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
