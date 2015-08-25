/* path to where databases are saved
xampp/mysql/data/

*/

-- 01 CREATE DATABASE
-- database: none

CREATE DATABASE foo;
USE foo;
CREATE TABLE foo ( a INT, b TEXT );
INSERT INTO foo VALUES ( 1, 'foo' );
SELECT * FROM foo;
DROP TABLE foo;
DROP DATABASE foo;

-- 02 CREATE TABLE
-- database: scratch

DROP TABLE IF EXISTS test;
CREATE TABLE test (
    id INTEGER,
    name VARCHAR(255),
    address VARCHAR(255),
    city VARCHAR(255),
    state CHAR(2),
    zip CHAR(10)
);

-- test is the name of the table, and inside
-- the parenthesis is the definition of the 
-- column in the table

DESCRIBE test;
-- describe shows a definition of the test
-- table
SHOW TABLE STATUS;
SHOW TABLE STATUS LIKE 'test';
-- show talbe status shows all the tables
-- in the databse, with like, we can show
-- only one specific table
SHOW CREATE TABLE test;
-- shows a create table statement for a table
-- that's been created

CREATE TABLE test (
    id INTEGER,
    name VARCHAR(255),
    address VARCHAR(255),
    city VARCHAR(255),
    state CHAR(2),
    zip CHAR(10)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- engine and default char set can be defined
-- when we create a table
-- InnoDB is the engine that is used now
-- supports transactions, can be rolled back,
-- it is a superior engine.

DROP TABLE test;
DROP TABLE IF EXISTS test;

-- IF EXISTS prevents an error from showing
-- if the table has already been deleted


-- 03 indexes
-- database: scratch

DROP TABLE IF EXISTS test;
CREATE TABLE test (
    id INTEGER,
    a VARCHAR(255),
    b VARCHAR(255)
);
INSERT INTO TEST ( id, a, b ) VALUES ( 1, 'one', 'two' );
INSERT INTO TEST ( id, a, b ) VALUES ( 2, 'two', 'three' );
INSERT INTO TEST ( id, a, b ) VALUES ( 3, 'three', 'four' );
SELECT * FROM test;
DESCRIBE test;
SHOW INDEXES FROM test;
-- won't show indexes because we haven't defined them

DROP TABLE IF EXISTS test;
CREATE TABLE test (
    id INTEGER,
    a VARCHAR(255),
    b VARCHAR(255),
    INDEX ab (a, b) -- ab is the optional name of the index
    INDEX(a),
    INDEX(b)
);
DESCRIBE test;
-- shows multiple keys MUL
SHOW INDEXES FROM test;
-- now the indexes are created and shown

DROP INDEX a ON test;
DROP INDEX ab ON test;
DROP TABLE IF EXISTS test;



-- 04 constraints
-- some constraints include 
	-- NOT NULL -- disallows null values, trying to insert a null value here will result in an integrity constraint violation
	-- DEFAULT 47-- assigns a default value of 47
	-- UNIQUE -- it creates an index to enforce uniqueness
-- database: scratch

DROP TABLE IF EXISTS test;
CREATE TABLE test (
    a INTEGER,
    b VARCHAR(255)
);
INSERT INTO TEST ( b ) VALUES ( 'one' );
DESCRIBE test;
SELECT * FROM test;

CREATE TABLE test (
    a INTEGER NOT NULL,
    b VARCHAR(255)
);

CREATE TABLE test (
    a INTEGER NOT NULL DEFAULT 47,
    b VARCHAR(255) UNIQUE
);

INSERT INTO TEST ( b ) VALUES ( NULL );
SHOW INDEX FROM test;

DROP TABLE IF EXISTS test;

-- 05 AUTO_INCREMENT
-- database: scratch
	-- PRIMARY KEY: provides NOT NULL and UNIQUE and PRIMARY KEY
	-- you'll get a constraint violation if you try to insert a row 
	-- with the same primary key.

	-- AUTO_INCREMENT PRIMARY KEY: and you don't insert
	-- anything on an id column, it will generate it automatically
	
	-- SERIAL: an alias for BIGINT UNSIGNED NOT NULL AUTO_INCREMENT UNIQUE -- allows for very large tables

DROP TABLE IF EXISTS test;
CREATE TABLE test (
    id INTEGER,
    a VARCHAR(255),
    b VARCHAR(255)
);
INSERT INTO TEST ( id, a, b ) VALUES ( 1, 'one', 'two' );
INSERT INTO TEST ( id, a, b ) VALUES ( 2, 'two', 'three' );
INSERT INTO TEST ( id, a, b ) VALUES ( 3, 'three', 'four' );
SELECT * FROM test;
DESCRIBE test;
SHOW TABLE STATUS like 'test';
SHOW CREATE TABLE test;
SHOW INDEXES FROM test;

DROP TABLE IF EXISTS test;
CREATE TABLE test (
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    a VARCHAR(255),
    b VARCHAR(255)
);
INSERT INTO TEST ( a, b ) VALUES ( 'one', 'two' );
INSERT INTO TEST ( a, b ) VALUES ( 'two', 'three' );
INSERT INTO TEST ( a, b ) VALUES ( 'three', 'four' );
SELECT * FROM test;
DESCRIBE test;
SHOW TABLE STATUS like 'test';
SHOW CREATE TABLE test;
SHOW INDEXES FROM test;

/* special function */
SELECT LAST_INSERT_ID();
-- what's the id of the last row inserted in the DB.

DROP TABLE IF EXISTS test;

-- 06 FOREIGN KEY
-- database: scratch
-- the FOREIGN KEY constraint:
-- lend table is a pivot table or junction table
-- it has two foreign key 


DROP TABLE IF EXISTS lend;
DROP TABLE IF EXISTS client;
DROP TABLE IF EXISTS book;

CREATE TABLE client (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO client ( name ) VALUES ( 'Freddy' );
INSERT INTO client ( name ) VALUES ( 'Karen' );
INSERT INTO client ( name ) VALUES ( 'Harry' );
SELECT * FROM client;

CREATE TABLE book (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO book ( title ) VALUES ( 'The Moon is a Harsh Mistress' );
INSERT INTO book ( title ) VALUES ( 'Rendezvous with Rama' );
INSERT INTO book ( title ) VALUES ( 'A Game of Thrones' );
SELECT * FROM book;

CREATE TABLE lend (
  id INT AUTO_INCREMENT PRIMARY KEY,
  stamp TIMESTAMP, 
  c_id INT,
  b_id INT
);

INSERT INTO lend ( c_id, b_id ) VALUES ( 1, 1 );
INSERT INTO lend ( c_id, b_id ) VALUES ( 1, 2 );
INSERT INTO lend ( c_id, b_id ) VALUES ( 3, 3 );
INSERT INTO lend ( c_id, b_id ) VALUES ( 2, 5 ); -- 5 won't work because it's supposed to be the primary key of another table (it is the foreign key)
SELECT * FROM lend;

SELECT l.id, l.stamp, c.name, b.title
  FROM lend AS l
  LEFT JOIN client AS c ON l.c_id = c.id
  LEFT JOIN book AS b ON l.b_id = b.id
;

-- lend table with FOREIGN KEY constraint

CREATE TABLE lend (
  id INT AUTO_INCREMENT PRIMARY KEY,
  stamp TIMESTAMP, 
  c_id INT,
  b_id INT,
  FOREIGN KEY (c_id) REFERENCES client(id),
  FOREIGN KEY (b_id) REFERENCES book(id)
);
 -- FOREIGN KEY (c_id) refers to client table column id.
 -- when we look at our join query the last
 -- insert that references 5 is not allowed.


-- drop tables

DROP TABLE IF EXISTS lend;
DROP TABLE IF EXISTS client;
DROP TABLE IF EXISTS book;
-- drop the pivot table or juncture table first

-- 07 ALTER TABLE
-- used to modify the definition of the table
-- after it's been defined and populated with
-- data.
-- database: scratch

CREATE TABLE test ( a VARCHAR(10), b VARCHAR(10), c VARCHAR(10) );
INSERT INTO test VALUES ( 'one', 'two', 'three');
INSERT INTO test VALUES ( 'two', 'three', 'four');
INSERT INTO test VALUES ( 'three', 'four', 'five');
SELECT * FROM test;

ALTER TABLE test ADD d INT;
ALTER TABLE test DROP d; -- will drop colum d and all its data
ALTER TABLE test DROP b;
ALTER TABLE test ADD bb VARCHAR(10) AFTER a; -- will add a column after column a
ALTER TABLE test ADD aa INT FIRST; -- will place it as teh first column
ALTER TABLE test ADD d VARCHAR(10) DEFAULT 'panda'; -- will add column d and fill out default values as panda
ALTER TABLE test ADD id SERIAL FIRST;
SHOW CREATE TABLE test;

DROP TABLE test;
