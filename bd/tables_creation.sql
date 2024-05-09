CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    passwordProtected BOOLEAN NOT NULL,
    BurnAfterRead BOOLEAN NOT NULL,
    Author VARCHAR(100) NOT NULL,
    Language VARCHAR(11),
    author_id INT NOT NULL,
    Post TEXT,
    password VARCHAR(100) 
);

CREATE TABLE post_author_association (
    idPostare INT NOT NULL,
    idAuthor INT NOT NULL,
    PRIMARY KEY (idPostare, IdAuthor)
);
