/* -------------------------------------------------
--------------- COMMENTS ---------------------------
--------------------------------------------------*/

SELECT * FROM Album; -- this is a comment

/*
this is a 
multi-line
comment
 */

# this is a comment too but its usage is not recommended

/* -------------------------------------------------
--------------- SELECT STATEMENT --------------------
--------------------------------------------------*/


-- this returns the name, and the population divided by a million
SELECT Name, Population / 1000000 AS PopMM
FROM Country
WHERE Population >= 1000000
ORDER BY Population DESC;

SELECT 'Hello, World';
-- returns Hello, World

SELECT * FROM Country
ORDER BY Name;
-- get results from all columns from country table
-- order alphabetically by Name column

SELECT Name, LifeExpectancy AS 'Life Expectancy'
FROM Country;

-- AS changes the header of the column

SELECT COUNT(*)
FROM Country
ORDER BY Name;

-- get the count of all records from the Country
-- table ordered by column Name alphabetically.

SELECT *
FROM Country
ORDER BY Name
LIMIT 5 OFFSET 6;

-- will fetch the first five results after the sixth
-- result, ordered alphabetically
-- this is useful for paging applications


SELECT * FROM Country ORDER BY Code;
--  return all records from all columns

SELECT Name AS Country, Code, Region, Population
FROM Country
ORDER BY Code;

-- instead of Name as a header will return Country
-- as a header.
-- you may omit the AS clause, but it's recommended
-- it makes the code more readable.

SELECT Name
FROM Country
ORDER BY Name DESC;

-- returns all names of countries ordered alphabetically
-- in reverse order. Without DESC it is ordered by ASC
-- by default

SELECT Name, Continent
FROM Country
ORDER BY Continent, Name;

-- it will return names and continent ordered by
-- continent first and then within the results 
-- belonging to a continent it will order them
-- alphabetically by name is ascending order

SELECT Name, Continent, Region
FROM Country
ORDER BY Continent DESC, Region, Name;

-- returns records in name continent and region
-- columns ordered first by continent reversely,
-- within it by region, and within it by name
-- alphabetically and ascending.

/* -------------------------------------------------
--------------- WHERE CLAUSE --------------------
--------------------------------------------------*/

SELECT Name, Continent, Population
FROM Country
WHERE Population < 1000000
ORDER BY Population DESC;

-- only gets records where population is less
-- than 1000000.
-- where takes a boolean expression, rows are
-- returned only if boolean expression evaluates
-- to true.

SELECT Name, Continent, Population
FROM Country
WHERE Population < 1000000 OR Population IS NULL
ORDER BY Population DESC;

-- same as before but will also return records
-- where population is null.
-- the OR returns results where either is true
-- the AND returns results where both conditions
-- are true

SELECT Name, Continent, Population
FROM Country,
WHERE Name LIKE '%island%'
ORDER BY Name;

-- returns records where Name is equal to
-- something with island in the name
-- %island will return things ending in island
-- island% will return things begining in island
-- % means 0 or more elements in this place
-- '_a%' returns anything with a as the second
-- character and then 0 or more characters.

SELECT Name, Continent, Population
FROM Country,
WHERE Continent IN ('Europe', 'Asia')
ORDER BY Name;

-- the in operator is used to get results to
-- return elements within a list between parenthesis

/* -------------------------------------------------
--------------- REGULAR EXPRESSIONS ----------------
--------------------------------------------------*/

SELECT Name, Continent, Population
FROM Country,
WHERE Name REGEXP '^-[a-e].*'
ORDER BY Name;

-- select records from said columns where the name
-- matches the regex, which says the first
-- character could be anything then second
-- character a b c d or e, and then the next
-- character 0 or more of anything.

SELECT Name, Continent, Population
FROM Country,
WHERE Name REGEXP 'o.o'
ORDER BY Name;

-- matches anything wiht an o followed by a character
-- and then another o
-- 'oc+o' will match Morocco and Moroco, matches
-- 1 or more c in between the os, the asterisk
-- matches 0 or more, the question matches 0 or 1
-- of a type

SELECT Name, Continent, Population
FROM Country,
WHERE Name REGEXP '^.[aeiou].*$'
ORDER BY Name;

-- matches anything with a value as a second character

SELECT Name, Continent, Population
FROM Country,
WHERE Name REGEXP '[[:space:]]'
ORDER BY Name;

-- any strings with a space anywhere

-- other character classes like space include
-- alnum, alpha, blank (whitespace characters),
-- cntrl, digit, graph, lower, print, punct,
-- upper, and xdigit -- see documentation.

-- RLIKE is an alias for REGEXP

/* -------------------------------------------------
--------------- INSERT INTO -----------------------
--------------------------------------------------*/

CREATE TABLE test (a INT, b TEXT, c TEXT);
INSERT INTO test
VALUES ( 1, 'This', 'Right here!');
SELECT * FROM test;

-- insert into inserts a new row with given
-- VALUES

INSERT INTO test (b, c)
VALUES ('That', 'Over There!');

-- the a colum gets a NULL inserted in a new row
-- NULL is a special state that represents no value
-- its not 0

INSERT INTO test (a, b, c)
SELECT id, name, description
FROM item;

-- will take all rows from item, id, name and description
-- column and wil insert it into the test table
-- in rows a b and c.
-- the results of the select statement are being used
-- as the values for the insert into the test table

/* -------------------------------------------------
--------------- UPDATE STATEMENT -------------------
--------------------------------------------------*/

SELECT * FROM test
WHERE a = 2;
-- select only the row you want to update
-- might want to run before update to check
-- what you will be updateing
UPDATE test
SET c='Extra funny' WHERE a=2;


UPDATE test
SET c = NULL
WHERE a = 2;


/* -------------------------------------------------
--------------- DELETE STATEMENT -------------------
--------------------------------------------------*/

DELETE FROM test
WHERE a=2;

-- will delete the row where column a = 2.
-- it's a good idea to test first:

SELECT * FROM test WHERE a=2;
-- THEN DELETE

-- if you use
DELETE FROM test;

-- you will delete all rows

DROP TABLE test;

-- deltes the whole table


/* -------------------------------------------------
--------------- LITERAL STRINGS -------------------
--------------------------------------------------*/

SELECT 'hello, world';
SELECT 'hello' ', ' 'world';
-- will output hello, world, the second won't
-- work on other database systems.
SELECT "hello, world";
-- will work on sql, but double quotes won't
-- work on other database systems
SELECT 'hello, "world"';
SELECT 'hello, \'world\'';
SELECT 'hello, ''world''';
-- the third is standard practise in sql
-- don´t use the first two

/* -------------------------------------------------
--------------- NULL ------------------------------
--------------------------------------------------*/

CREATE TABLE test (a INT, b TEXT, c TEXT);
INSERT INTO test ( b, c) VALUES ( 'This', 'That');
SELECT * FROM test;
-- will insert NULL on a for that row

-- to test for null you ask not = NULL, but IS NULL

INSERT INTO test (a, b, c ) VALUES (0, NULL, '');
SELECT * FROM test WHERE b IS NULL;

-- will return the row
-- null is a state not a value

