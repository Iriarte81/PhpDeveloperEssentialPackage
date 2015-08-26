-- 01 Database integrity
-- transactions are a valuable tool for maintaing the
-- integrity of the database:
-- related queries are performed as a group,
-- and if they can't they are not performed
-- database: scratch

CREATE TABLE widgetInventory (
  id SERIAL,
  description VARCHAR(255),
  onhand INTEGER NOT NULL
);

CREATE TABLE widgetSales (
  id SERIAL,
  inv_id INTEGER,
  quan INTEGER,
  price INTEGER
);
-- the tables are connected with the inventory id

INSERT INTO widgetInventory ( description, onhand )
VALUES ( 'rock', 25 );
INSERT INTO widgetInventory ( description, onhand )
VALUES ( 'paper', 25 );
INSERT INTO widgetInventory ( description, onhand )
VALUES ( 'scissors', 25 );

SELECT * FROM widgetInventory;

-- step 2:

START TRANSACTION;

INSERT INTO widgetSales ( inv_id, quan, price )
VALUES ( 1, 5, 500 );

UPDATE widgetInventory
SET onhand = ( onhand - 5 )
WHERE id = 1;

COMMIT;

-- everything within the transaction must complete
-- successfully before being commited to the database

SELECT * FROM widgetInventory;
SELECT * FROM widgetSales;

-- step 3:

START TRANSACTION;

INSERT INTO widgetInventory ( description, onhand )
VALUES ( 'toy', 25 );

ROLLBACK;
-- this INSERT INTO is never committed to storage


SELECT * FROM widgetInventory;
SELECT * FROM widgetSales;

-- restore database
DROP TABLE IF EXISTS widgetInventory;
DROP TABLE IF EXISTS widgetSales;

-- 02 Database performance
-- database: scratch

CREATE TABLE test ( id SERIAL, data VARCHAR(256) );

-- copy / paste 1,000 of these ...
INSERT INTO test ( data ) VALUES ( 'this is a good sized line of text.' );

-- count the rows in the table
SELECT COUNT(*) FROM test;

-- put this before the 1,000 INSERT statements
START TRANSACTION;

-- put this after the 1,000 INSERT statements
COMMIT;

-- the transaction time required to do the query is much less
-- by wrapping the 1000 inserts into a transaction and commit
-- you improve the performance of a database.
-- restore database
DROP TABLE test;

