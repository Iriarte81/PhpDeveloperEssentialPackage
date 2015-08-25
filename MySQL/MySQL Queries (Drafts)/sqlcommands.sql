
-- creating tables

CREATE TABLE users (
name varchar(20),
password varchar(20),
PRIMARY KEY(name)
);

CREATE TABLE vehicles (
licenseplate char(6) NOT NULL,
arrivaltime time NOT NULL,
departuretime time NOT NULL,
PRIMARY KEY (licenseplate, arrivaltime)
);

CREATE TABLE books (
isbncode INT AUTO_INCREMENT,
title varchar(20),
author varchar(30),
publisher varchar(15),
PRIMARY KEY (isbncode)
);

-- insert

INSERT INTO books (
title, author, publisher, price)
VALUES ('El Aleph', 'Borges', 'Planeta', NULL);

-- select

SELECT * 
FROM books 
WHERE price IS NULL;

SELECT isbncode, title, author, publisher, price
FROM books
ORDER BY title

SELECT isbncode, title, author, publisher, price
FROM books
ORDER BY 5
-- 5 refers to price

SELECT isbncode, title, author, publisher, price
FROM books
ORDER BY title DESC

SELECT isbncode, title, author, publisher, price
FROM books
ORDER BY title, publisher

SELECT isbncode, title, author, publisher, price
FROM books
ORDER BY title ASC, publisher DESC

SELECT title
FROM books
WHERE title REGEXP 'ma';

SELECT title
FROM books
WHERE title NOT REGEXP '[hkw]';

SELECT sum(quantity)
FROM books
-- the sum function returns the sum of the values
-- contained within the specified field

SELECT sum(quantity)
FROM books
WHERE publisher = 'Planeta';

SELECT max(price)
FROM books

SELECT min(price)
FROM books

SELECT avg(price)
FROM books
WHERE title LIKE '%php'
-- returns the average values of price from
-- books table where title %php

SELECT count(*)
FROM books
-- count counts the numbers of registries in
-- a table even those with null values

SELECT count(*)
FROM books
WHERE title LIKE '%php'
-- returns the count of numbers of registries
-- from books table where title %php

SELECT count(price)
FROM books
-- returns the number of registries that
-- have a price defined from the books table

SELECT title
FROM books
GROUP BY author

SELECT publisher
FROM books
WHERE price IS NOT NULL
GROUP BY publisher
HAVING publisher <>'Planeta'
-- just as WHERE allows us to select individual
-- registries, HAVING allows us to select
-- groups of registries

SELECT DISTINCT author
FROM books
GROUP BY publisher

-- returns authors (that are not duplicated)
-- from the books table grouped by publisher

SELECT *
FROM books
LIMIT 0,4
-- returns all registries from books table
-- from registry 0 to 4

SELECT *
FROM books
LIMIT 8
-- returns the first 8 registries from 
-- the books table

SELECT *
FROM books
LIMIT 6, 100000
-- to retrieve registries from 6 till the
-- end we can specify a very high number
-- as the end limit to retrive















--
