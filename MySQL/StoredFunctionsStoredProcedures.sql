-- 02 stored functions
-- database: album

DROP FUNCTION IF EXISTS track_len;
CREATE FUNCTION track_len(seconds INT)
RETURNS VARCHAR(16) DETERMINISTIC
    RETURN CONCAT_WS(':', seconds DIV 60, LPAD(seconds MOD 60, 2, '0' ));

SELECT title, track_len(duration) FROM track;

SELECT a.artist AS artist,
    a.title AS album,
    t.title AS track,
    t.track_number AS trackno,
    track_len(t.duration) AS length
  FROM track AS t
  JOIN album AS a
    ON a.id = t.album_id
  ORDER BY artist, album, trackno
;

SELECT a.artist AS artist,
    a.title AS album,
    track_len(SUM(duration)) AS length
  FROM track AS t
  JOIN album AS a
    ON a.id = t.album_id
  GROUP BY a.id
  ORDER BY artist, album
;

-- 03 stored procedures
-- database: album

-- simple procedure
DROP PROCEDURE IF EXISTS list_albums;

DELIMITER //
CREATE PROCEDURE list_albums ()
BEGIN
    SELECT * FROM album;
END
//

DELIMITER ;
CALL list_albums();


-- with parameter
DROP PROCEDURE IF EXISTS list_albums;

DELIMITER //
CREATE PROCEDURE list_albums (a VARCHAR(255))
  BEGIN
    SELECT a.artist AS artist,
        a.title AS album,
        t.title AS track,
        t.track_number AS trackno,
        track_len(t.duration) AS length
      FROM track AS t
      JOIN album AS a
        ON a.id = t.album_id
      WHERE a.artist LIKE a
      ORDER BY artist, album, trackno
    ;
  END //

DELIMITER ;
CALL list_albums('%hendrix%');

-- with output parameter
DROP PROCEDURE IF EXISTS total_duration;

DELIMITER //
CREATE PROCEDURE total_duration (a VARCHAR(255), OUT d VARCHAR(255))
  BEGIN
    SELECT track_len(SUM(duration)) INTO d
      FROM track
      WHERE album_id IN (SELECT id FROM album WHERE artist LIKE a)
    ;
  END //

DELIMITER ;
CALL total_duration('%hendrix%', @dur);
SELECT @dur;

DROP FUNCTION IF EXISTS track_len;
DROP PROCEDURE IF EXISTS total_duration;

