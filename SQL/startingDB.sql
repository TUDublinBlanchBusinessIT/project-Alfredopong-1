

CREATE DATABASE IF NOT EXISTS game_backlog_db;
USE game_backlog_db;

CREATE TABLE IF NOT EXISTS games (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    platform VARCHAR(50) NOT NULL,
    status VARCHAR(30) NOT NULL,
    target_finish_date DATE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);
