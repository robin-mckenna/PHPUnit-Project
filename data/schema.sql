DROP TABLE album;

CREATE TABLE album (id INTEGER PRIMARY KEY AUTOINCREMENT, artist varchar(100) NOT NULL, title varchar(100) NOT NULL, date_founded date);
INSERT INTO album (artist, title) VALUES ('The Military Wives', 'In My Dreams', '2018-09-09');
INSERT INTO album (artist, title) VALUES ('Adele', '21', '2017-09-09');
INSERT INTO album (artist, title) VALUES ('Bruce Springsteen', 'Wrecking Ball (Deluxe)', '2016-09-09');
INSERT INTO album (artist, title) VALUES ('Lana Del Rey', 'Born To Die', '2015-09-09');
INSERT INTO album (artist, title) VALUES ('Gotye', 'Making Mirrors', '2014-09-09');