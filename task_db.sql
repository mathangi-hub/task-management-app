CREATE DATABASE task_db;

USE task_db;

CREATE TABLE users(

id INT AUTO_INCREMENT PRIMARY KEY,

username VARCHAR(50),

email VARCHAR(100),

password VARCHAR(255)

);

CREATE TABLE tasks(

id INT AUTO_INCREMENT PRIMARY KEY,

user_id INT,

title VARCHAR(100),

status VARCHAR(20),

FOREIGN KEY(user_id)
REFERENCES users(id)

);
