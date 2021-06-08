CREATE DATABASE php_login_app;

USE php_login_app;

CREATE TABLE tb_users
(
	user_id int PRIMARY KEY AUTO_INCREMENT,
	user_name VARCHAR (50) NOT NULL,
	email_address VARCHAR (50) NOT NULL UNIQUE,
	password VARCHAR (100) NOT NULL
);