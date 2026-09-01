-- Create database
CREATE DATABASE IF NOT EXISTS mvcblog
	CHARACTER SET utf8
	COLLATE utf8_unicode_ci;

-- Create user and grant privileges
CREATE USER IF NOT EXISTS 'mvcuser'@'localhost' IDENTIFIED BY 'mvcblogpass';
GRANT ALL PRIVILEGES ON mvcblog.* TO 'mvcuser'@'localhost';

-- Create tables
USE mvcblog;
CREATE TABLE IF NOT EXISTS users (
	username varchar(255) NOT NULL,
	passwd varchar(255) NOT NULL,

	primary key (username)
) ENGINE=INNODB
	DEFAULT CHARACTER SET = utf8
	COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS posts (
	id int auto_increment,
	title varchar(255) NOT NULL,
	content varchar(255) NOT NULL,
	author varchar(255) NOT NULL,

	primary key (id),
	foreign key (author) references users(username)
) ENGINE=INNODB
	DEFAULT CHARACTER SET = utf8
	COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS comments (
	id int auto_increment,
	content varchar(255) NOT NULL,
	author varchar(255) NOT NULL,
	post int NOT NULL,

	primary key (id),
	foreign key (author) references users(username),
	foreign key (post) references posts(id) on delete cascade
) ENGINE=INNODB
	DEFAULT CHARACTER SET = utf8
	COLLATE = utf8_unicode_ci;

-- Insert sample data
INSERT INTO users (username, passwd) VALUES ('pepe', 'pepe');
INSERT INTO users (username, passwd) VALUES ('ana', 'ana');
INSERT INTO posts (title, content, author) VALUES ('My first post', 'Hi, this is the first post!', 'pepe');
