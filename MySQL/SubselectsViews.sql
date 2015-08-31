-- 01 simple subselect
-- database: world

DROP TABLE IF EXISTS t;
CREATE TABLE t ( a VARCHAR(6), b VARCHAR(6) ) DEFAULT CHARSET=utf8;
INSERT INTO t VALUES ( 'NY0123', 'US4567' );
INSERT INTO t VALUES ( 'AZ9437', 'GB1234' );
INSERT INTO t VALUES ( 'CA1279', 'FR5678' );
SELECT * FROM t;

SELECT SUBSTR(a, 1, 2) AS State, SUBSTR(a, 3) AS SCode, SUBSTR(b, 1, 2) AS Country,
  SUBSTR(b, 3) AS CCode FROM t;

SELECT co.Name, ss.CCode FROM (
    SELECT SUBSTR(a, 1, 2) AS State, SUBSTR(a, 3) AS SCode,
      SUBSTR(b, 1, 2) AS Country, SUBSTR(b, 3) AS CCode FROM t
  ) AS ss
  JOIN Country AS co
    ON co.Code2 = ss.Country
;

DROP TABLE t;

-- 02 searching within a result set
-- database: album

SELECT DISTINCT album_id FROM track WHERE duration <= 90;

SELECT * FROM album
  WHERE id IN (SELECT DISTINCT album_id FROM track WHERE duration <= 90)
;

SELECT a.title AS album, a.artist, t.track_number AS seq, t.title, t.duration AS secs
  FROM album AS a
  JOIN track AS t
    ON t.album_id = a.id
  WHERE a.id IN (SELECT DISTINCT album_id FROM track WHERE duration <= 90)
  ORDER BY a.title, t.track_number
;

SELECT a.title AS album, a.artist, t.track_number AS seq, t.title, t.duration AS secs
  FROM album AS a
  JOIN (
    SELECT album_id, track_number, duration, title
      FROM track
      WHERE duration <= 90
  ) AS t
    ON t.album_id = a.id
  ORDER BY a.title, t.track_number
;

-- 03 Creating a view
-- database: album

SELECT id, album_id, title, track_number, duration DIV 60 AS m, duration MOD 60 AS s
  FROM track;

CREATE VIEW trackView AS
  SELECT id, album_id, title, track_number, duration DIV 60 AS m, duration MOD 60 AS s
    FROM track;
SELECT * FROM trackView;

SELECT a.title AS album, a.artist, t.track_number AS seq, t.title, t.m, t.s
  FROM album AS a
  JOIN trackView AS t
    ON t.album_id = a.id
  ORDER BY a.title, t.track_number
;

DROP VIEW IF EXISTS trackView;

-- 04 Joined view
-- database: album

SELECT a.artist AS artist,
    a.title AS album,
    t.title AS track,
    t.track_number AS trackno,
    t.duration DIV 60 AS m,
    t.duration MOD 60 AS s
  FROM track AS t
  JOIN album AS a
    ON a.id = t.album_id
;


CREATE VIEW joinedAlbum AS
  SELECT a.artist AS artist,
      a.title AS album,
      t.title AS track,
      t.track_number AS trackno,
      t.duration DIV 60 AS m,
      t.duration MOD 60 AS s
    FROM track AS t
    JOIN album AS a
      ON a.id = t.album_id
;

SELECT * FROM joinedAlbum;
SELECT * FROM joinedAlbum WHERE artist = 'Jimi Hendrix';

SELECT artist, album, track, trackno, 
  CONCAT_WS(':', m, LPAD(s, 2, '0')) AS duration
  FROM joinedAlbum
;

DROP VIEW IF EXISTS joinedAlbum;

