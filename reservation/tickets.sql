CREATE TABLE tickets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    representation_name VARCHAR(100) NOT NULL,
    seat_number INT NOT NULL,
    reserved_by VARCHAR(100) DEFAULT NULL
);

INSERT INTO tickets (representation_name, seat_number) 
VALUES
('Spectacle A', 1),
('Spectacle A', 2),
('Spectacle A', 3),
('Spectacle B', 1),
('Spectacle B', 2);