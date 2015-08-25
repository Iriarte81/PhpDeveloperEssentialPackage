-- 02 Numerics
-- database: scratch

-- INTEGER TYPES: TINYINT, SMALLINT, MEDIUMINT
-- INTEGER / INT, BIGINT, DECIMAL(precision, scale)
-- 1234567.89 is DECIMAL(9,2)
-- NUMERIC IS AN ALIAS OF DECIMAL
-- FLOAT / REAL VS DOUBLE
	-- FLOAT represent very large or very small values but sacrifice precision
	-- DOUBLE are more precise than floats.
	-- use DECIMAL for precise applications like
	-- applications dealing with money

DESCRIBE numerics;
SELECT * FROM numerics;
SELECT da + db, fa + fb FROM numerics; -- decimal numbers have guaranteed precision, floating numbers dont guarantee precision
SELECT da + db = .3 FROM numerics;
SELECT fa + fb = .3 FROM numerics;
SELECT fa + fb FROM numerics;

-- 03 Character Strings
CHAR(5) -- use for items of predictable size like zip code
VARCHAR(25)

-- 04 Date and Time
-- database: scratch

DROP TABLE IF EXISTS test;
CREATE TABLE test (
  id SERIAL,
  stamp TIMESTAMP, -- automatically creates a timestamp on every insert and update
  note VARCHAR(255)
);
INSERT INTO test ( note ) VALUES ( 'Pablo Picasso' );
INSERT INTO test ( note ) VALUES ( 'Henri Matisse' );
INSERT INTO test ( note ) VALUES ( 'Vincent Van Gogh' );
DESCRIBE test;
SHOW CREATE TABLE test;
SELECT * FROM test;

UPDATE test SET note = 'Jackson Pollock' WHERE id = 2;
SELECT * FROM test;

DROP TABLE IF EXISTS test;

SHOW VARIABLES LIKE '%time_zone%';
-- mysql specific command that shows mysql specific tables
SELECT NOW();
--- shows date and time now

SET time_zone = 'US/Eastern';
-- change the time zone in your application
SHOW VARIABLES LIKE '%time_zone%';
SELECT NOW();
-- see the effects of the time zone change

-- 05 BIT
-- the bit type is used to conserve space, convenient for small values
-- database: scratch

DROP TABLE IF EXISTS test;
CREATE TABLE test ( id SERIAL, a BIT(3), b BIT(5) ); -- three bit and five bit colums created
INSERT INTO test ( a, b ) VALUES ( 5, 29 );
INSERT INTO test ( a, b ) VALUES ( 6, 30 );
INSERT INTO test ( a, b ) VALUES ( 7, 31 ); -- the largest number you can express in 3 bits is a 7, and in 5 bits a 31
INSERT INTO test ( a, b ) VALUES ( 8, 32 );
INSERT INTO test ( a, b ) VALUES ( 9, 33 );
INSERT INTO test ( a, b ) VALUES ( 199, 199 );
SELECT * FROM test; -- will insert the rows but will insert only the maximum value possible for the bits in the column definition

DROP TABLE IF EXISTS test;

-- 06 BOOLEAN
-- the BOOLEAN / BOOL type maps to a TINYINT
-- TRUE AND FLASE are aliases for 1 and 0
-- database: scratch

DROP TABLE IF EXISTS test;
CREATE TABLE test ( a BOOLEAN, b BOOLEAN );
INSERT INTO test VALUES ( TRUE, FALSE );
SELECT * FROM test;
DESCRIBE test;
SHOW CREATE TABLE test;

SELECT a AND b FROM test; -- shows false because b is 0
SELECT a OR b FROM test; -- shows true because a is 1

DROP TABLE IF EXISTS test;

-- 07 ENUM and SET
-- unique types that work from lists of strings
-- database: scratch

-- ENUM

DROP TABLE IF EXISTS test;
CREATE TABLE test (
  id SERIAL,
  a ENUM( 'Pablo', 'Henri', 'Jackson' ) -- will asign numbers to each list item for easier later reference
);
INSERT INTO test ( a ) VALUES ( 'Pablo' ); -- what's actually being stored is 1, an index into the previously defined table of strings
INSERT INTO test ( a ) VALUES ( 'Henri' ); -- what's actually being stored is 2
INSERT INTO test ( a ) VALUES ( 'Jackson' ); -- what's actually being stored is 3
INSERT INTO test ( a ) VALUES ( 1 );
INSERT INTO test ( a ) VALUES ( 2 );
INSERT INTO test ( a ) VALUES ( 3 );

SELECT * FROM test;

-- SET
-- works similarly to ENUM
-- with SET each bit represents one of these strings
DROP TABLE IF EXISTS test;
CREATE TABLE test (
  id SERIAL,
  a SET( 'Pablo', 'Henri', 'Jackson' )
);
INSERT INTO test ( a ) VALUES ( 'Pablo' );
INSERT INTO test ( a ) VALUES ( 'Henri' );
INSERT INTO test ( a ) VALUES ( 'Jackson' );
INSERT INTO test ( a ) VALUES ( 'Pablo,Jackson,Henri,Henri,Henri' );
INSERT INTO test ( a ) VALUES ( 1 ); -- Pablo
INSERT INTO test ( a ) VALUES ( 2 ); -- Henri
INSERT INTO test ( a ) VALUES ( 3 ); -- Pablo and Henri
INSERT INTO test ( a ) VALUES ( 4 ); -- Jackson
INSERT INTO test ( a ) VALUES ( 5 ); -- first and third bit Pablo, Jackson
INSERT INTO test ( a ) VALUES ( 6 ); -- second and third bit
INSERT INTO test ( a ) VALUES ( 7 ); --  all three bits bit
--- each bit represents one of these strings
SELECT COUNT(*) FROM test;
SELECT * FROM test;
DESCRIBE test;
SHOW CREATE TABLE test;
