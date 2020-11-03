CREATE DATABASE SocialNetworkDB;
USE SocialNetworkDB;

CREATE TABLE users (
	usersId int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    usersEmail varchar(128) NOT NULL,
    usersFirstname varchar(128) NOT NULL,
    usersLastname varchar(128) NOT NULL,
    usersPassword varchar(128) NOT NULL
);