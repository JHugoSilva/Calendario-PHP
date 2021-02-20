CREATE TABLE events(
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(500),
    color VARCHAR(50),
    start DATETIME,
    end DATETIME
);
INSERT INTO eventos_calendar.events(title, color, start, end)
VALUES('Hoje Tem','#FFD700','2021-01-01 15:00','2021-01-01 16:00'),
('Hoje Tem','#0071C5','2021-02-01 15:00','2021-02-01 13:00'),
('Hoje Não Tem','#0071C5','2021-02-03 11:00','2021-02-03 12:00'),
('Hoje Foi','#40E0D0','2021-02-04 10:00','2021-02-04 11:00'),
('Avisos do Mês','#0071C5','2021-03-01 15:00','2021-03-01 16:00'),
('Validação das Regras','#FFD700','2021-03-05 15:00','2021-03-05 16:00'),
('Dia da Maria','#FFD700','2021-03-08 15:00','2021-03-08 16:00'),
('Reuniao do Dia','#FFD700','2021-03-09 16:00','2021-05-09 17:00'),
('Reuniao Final','#40E0D0','2021-05-10 13:00','2021-05-10 14:00');