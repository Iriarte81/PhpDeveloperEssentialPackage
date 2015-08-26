-- 01 String functions
-- database: world

SELECT Name, LocalName, LENGTH(LocalName) AS len
FROM Country
WHERE Continent = 'Europe'
ORDER BY len DESC;
-- we get in the third column the lenght of the local name
-- accented characters count for an additional character
-- because in utf 8 it counts as an additional bite


SELECT Name, LocalName, LENGTH(LocalName) AS len, CHAR_LENGTH(LocalName) AS chars
FROM Country
WHERE Continent = 'Europe'
ORDER BY len DESC;
-- char_length will take a bit longer but will count the actual length

SELECT Name, LEFT(Name, 3), RIGHT(Name, 3), MID(Name, 2, 3)
FROM Country
WHERE Continent = 'Europe';
-- left and right will get the first 3 and last 3 letters,
-- mid will take starting in character 2, 3 characters


SELECT CONCAT(Name, LocalName )
FROM Country
WHERE Continent = 'Europe';
-- will concatenate name and local name into a column

SELECT CONCAT_WS(', ', Name, LocalName, Region, Continent )
FROM Country
WHERE Continent = 'Europe';
-- concat_ws will concatenate with separator


SELECT LOCATE('bar', 'foobarbaz');
-- will give us the character position, e.g. begins at 4th position


SELECT Name, LOCATE('stan', Name)
FROM Country
WHERE Name
LIKE '%stan%';
-- will return countries like pakistan turmekistan and so forth
-- locate is good for locating a string within a string

SELECT Name, LOCATE('k', Name)
FROM Country
WHERE Name
LIKE '%k%';
-- returns two columns name and a column giving the position in each row of the letter k
-- it will return only results where there's a k in the name


SELECT Name, UPPER(Name), LocalName, UPPER(LocalName)
FROM Country
WHERE Continent = 'Europe';

SELECT Name, LOWER(Name), LocalName, LOWER(LocalName)
FROM Country
WHERE Continent = 'Europe';
--  returns columns in all caps or all lower case


SELECT Name, REVERSE(Name), LocalName, REVERSE(LocalName)
FROM Country
WHERE Continent = 'Europe';
-- will return the reverse of a name

-- 02 Numeric functions and operators
-- database: world

SELECT 7 + 3;
SELECT 7 - 3;
SELECT 7 * 3;
SELECT 7 / 3; -- gets you a floating point number
SELECT 7 DIV 3; -- gets you an integer
SELECT 7 MOD 3; -- gets you an integer remember
SELECT 7 % 3; -- same as MOD

SELECT POWER(7, 3), 7 * 7 * 7; -- seven cubed or seven to the third power

SELECT ABS(7); -- absolute value
SELECT ABS(-7);
SELECT SIGN(7); -- returns 1
SELECT SIGN(-7); -- returns -1

SELECT CONV(57, 10, 16); -- converts 57 from base 10 to base 16
SELECT CONV(39, 16, 10); -- converts 39 from base 16 to base 10
SELECT CONV(57, 10, 32); -- will return a letter to represent a large number

SELECT PI();
SELECT ROUND(PI()); -- rounds pi to the nearest whole number
SELECT ROUND(PI(), 2); -- rounds for two significant digits after comma
SELECT ROUND(PI(), 3);
SELECT TRUNCATE(PI(), 3); -- instead of rounding cuts it off after 3 decimal digits
SELECT CEIL(PI()); -- ceil of pi is 4 - rounds it up
SELECT FLOOR(PI()); -- floor of pi is 3  - rounds it down

SELECT Name, RAND()
FROM Country
LIMIT 5;
-- gets five random numbers one for each name

SELECT Name, RAND(7)
FROM Country
LIMIT 5;
-- 7 is the seed to fix numbers from changing
-- every time rand is executed


-- 03 Date and time functions
-- database: none

SELECT NOW(); -- returns current date and time
SELECT CURRENT_TIMESTAMP(); --  alias for now
SELECT UNIX_TIMESTAMP(); -- an integer that represents the number of seconds since jan 1 1970 midnight
SELECT UTC_TIMESTAMP();

SELECT DAYNAME(NOW()); -- get todays day name
SELECT DAYOFMONTH(NOW()); -- get day of the month and so on
SELECT DAYOFWEEK(NOW());
SELECT DAYOFYEAR(NOW());
SELECT MONTHNAME(NOW());

SELECT TIME_TO_SEC('00:03:00'); --gives us the number of seconds that represents
SELECT SEC_TO_TIME(180); -- will give you 30 minutes back

SELECT ADDTIME('1:00:00', '00:29:45'); -- adds times
SELECT SUBTIME('1:30:00', '00:15:00'); -- subtracts times

SELECT ADDDATE('2008-01-02', INTERVAL 31 DAY); -- adds dates
SELECT SUBDATE('2008-01-02', INTERVAL 31 DAY); -- subtracts dates

-- 04 Time zone support
-- database: none

SHOW VARIABLES LIKE '%time_zone%';
SELECT NOW();
SET time_zone = 'US/Eastern'; -- see a full list of tz database time zones in wikipedia
SHOW VARIABLES LIKE '%time_zone%';
SELECT NOW();

-- 05 DATE_FORMAT
-- database: none

SELECT DATE_FORMAT(NOW(), '%W, %D of %M, %Y'); -- reformats the current date
SELECT DATE_FORMAT(NOW(), '%Y-%m-%d %T'); -- formats current time into SQL time
-- format specifiers for dates in the documentation

-- 06 Aggregates
-- database: world

SELECT COUNT(*)
FROM Country;
-- returns a cell with the count of the number of rows for the whole table

SELECT COUNT(Population)
FROM Country;
-- returns a cell with the number of non null values in population

SELECT Continent, COUNT(*) AS Count
FROM Country
GROUP BY Continent
ORDER BY Count DESC;
-- groups rows with aggregate functions and gives a count for each group


SELECT COUNT(DISTINCT Continent)
FROM Country ;
-- tells us how many distinct continents there are in this table

SELECT GROUP_CONCAT(Name)
FROM Country
WHERE Region = 'Western Europe';
-- concatenates values in a cell eg. Austrial, belgium, etc..

SELECT GROUP_CONCAT(Name)
FROM Country
GROUP BY Region;
-- will concatenate names in each cell one for each region


SELECT GROUP_CONCAT(DISTINCT Continent ORDER BY Continent SEPARATOR '/')
FROM Country;
-- will return a concatenated list of continents separated by a /

SELECT AVG(Population)
FROM Country
WHERE Region = 'Western Europe';

SELECT MIN(Population), MAX(Population)
FROM Country
WHERE Region = 'Western Europe';

SELECT SUM(Population), STD(Population)
FROM Country WHERE Region = 'Western Europe';

-- 07 CASE
-- database: scratch

DROP TABLE IF EXISTS booltest;
CREATE TABLE booltest (a INTEGER, b INTEGER);
INSERT INTO booltest VALUES (1, 0);
SELECT * FROM booltest;


-- two different syntaxes for CASE:
SELECT
    CASE WHEN a THEN 'true' ELSE 'false' END as boolA,
    CASE WHEN b THEN 'true' ELSE 'false' END as boolB
    FROM booltest
;
 -- like the ternary operator in php
 -- returns two columns, one row, with true and false as values 
 -- for columsn boolA or boolB respectively

SELECT
  CASE a WHEN 1 THEN 'true' ELSE 'false' END AS boolA,
  CASE b WHEN 1 THEN 'true' ELSE 'false' END AS boolB 
  FROM booltest
;
-- returns the same, two columns one row with true and false

DROP TABLE IF EXISTS booltest;
