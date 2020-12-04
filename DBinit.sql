CREATE DATABASE SocialNetworkDB;
USE SocialNetworkDB;

CREATE TABLE users (
	user_id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
    user_email varchar(128) NOT NULL,
    user_firstname varchar(128) NOT NULL,
    user_lastname varchar(128) NOT NULL,
    user_password varchar(128) NOT NULL
);

CREATE TABLE login_details (
	login_details_id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
	user_id int NOT NULL,
	last_activity timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	is_type enum('no','yes') NOT NULL
);

CREATE TABLE chat_message (
	chat_message_id int PRIMARY KEY AUTO_INCREMENT NOT NULL,
	to_user_id int NOT NULL,
	from_user_id int NOT NULL,
	chat_message text NOT NULL,
	timestamp timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	status int NOT NULL
);