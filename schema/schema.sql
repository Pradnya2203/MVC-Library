
-- Host: db
-- Generation Time: Jul 17, 2022
-- PHP Version: 7.4.3


--
-- CREATE TABLE FOR client
--

CREATE TABLE client (
  name varchar(255) ,
  username varchar(255) NOT NULL PRIMARY KEY,
  password varchar(255),
  fine int DEFAULT 0,
  admin BIT DEFAULT 0
);


--
-- Insert login details and use password blahblah for both users
--

INSERT INTO client VALUES('Pradnya','artemis', 'b8dfd29b2dd922fd494fb63a427e519dfaabc4489a4ade985c8eaaaef051a0f52
72fd75ddda34211039997f8896b5f3693cd92eb75ea2bf786884aa0e31b9b36',0,1);

INSERT INTO client VALUES('Mayuri','mayuri', ' b8dfd29b2dd922fd494fb63a427e519dfaabc4489a4ade985c8eaaaef051a0f527
2fd75ddda34211039997f8896b5f3693cd92eb75ea2bf786884aa0e31b9b36',0,0);

--
-- CREATE TABLE books
--



CREATE TABLE record (
  ID int ,
  username varchar(255) ,
  status int DEFAULT 0,
  issued_on datetime,
  returned_on datetime
);
--
-- CREATE TABLE Book
--

CREATE TABLE Book (
  bookName varchar(255) ,
  quantity int DEFAULT 0,
  ID int NOT NULL PRIMARY KEY
);



INSERT INTO Book VALUES('Dune', 9,1);
INSERT INTO Book VALUES('Harry Potter', 10,2);
INSERT INTO Book VALUES('Paper towns', 8,3);
INSERT INTO Book VALUES('Percy Jackson', 13,4);
INSERT INTO Book VALUES('Mortal Instruments', 15,5);
INSERT INTO Book VALUES('Sapiens', 19,6);
INSERT INTO Book VALUES('Maze Runner', 12,7);
   
   
