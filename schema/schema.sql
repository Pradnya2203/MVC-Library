-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jul 17, 2022
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


--
-- CREATE TABLE FOR client
--

CREATE TABLE client (
  name varchar(255) ,
  username varchar(255) ,
  password varchar(255),
  fine int DEFAULT 0
);

--
-- MAKE username AS PRIMARY KEY
--
ALTER TABLE client
  ADD PRIMARY KEY (username);

--
-- CREATE TABLE books
--
CREATE TABLE books (
  bookName varchar(255) ,
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
  number int DEFAULT 0
);

--
-- MAKE bookName AS PRIMARY KEY
--

ALTER TABLE Book
  ADD PRIMARY KEY (bookName);