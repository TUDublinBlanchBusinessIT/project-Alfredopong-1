USE game_backlog_db;

ALTER TABLE games
ADD COLUMN priority ENUM('Low', 'Medium', 'High') NOT NULL DEFAULT 'Medium',
ADD COLUMN genre VARCHAR(50) DEFAULT NULL;
