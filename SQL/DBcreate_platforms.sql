USE game_backlog_db;

CREATE TABLE IF NOT EXISTS platforms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

INSERT INTO platforms (name) VALUES
('PS5'),
('PS4'),
('Xbox Series X'),
('Xbox One'),
('PC'),
('Nintendo Switch'),
('Steam Deck');
