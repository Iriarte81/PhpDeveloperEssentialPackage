-- create a database

CREATE DATABASE NameOfTheDatabase

-- create a table

CREATE TABLE 'users' (
'name' VARCHAR(30),
'lastname' VARCHAR(30),
'dob' DATETIME,
'email' VARCHAR(30)
);

--insert

INSERT INTO users
VALUES (value1, value2)

INSERT INTO users (column1, column2)
VALUES (value1, value2)

INSERT INTO employees
VALUES (03, 'Charles', 'Smith')

--delete

DELETE FROM users
WHERE column1 > 1

DELETE *
FROM users

DELETE FROM employees
WHERE employee_id = 2

-- update

UPDATE salaries
SET amount = 2000
WHERE jobname = 'Programmer'

-- select

SELECT *
FROM users

SELECT amount
FROM salaries
WHERE jobname = 'Programmer'

SELECT amount
FROM salaries
WHERE ambount > 1000
AND|OR jobname = 'Programmer'
ORDER BY amount ASC|DESC

-- join

SELECT *
FROM books
JOIN publishinghouses
ON books.editorialcode = publishinghouses.code

SELECT *
FROM books
JOIN publishinghouses
-- without an ON clause we will get all
-- combinations of registries from both tables

SELECT *
FROM publishinghouses
LEFT JOIN books
ON publishinghouses.code = books.editorialcode
-- The LEFT JOIN keyword returns all the rows
-- from the left table (publishinghouses),
-- even if 
-- there are no matches in the right table 
-- (books).

SELECT title if(price>50,'expensive','cheap')
FROM books
-- returns expensive if price >50, or cheap if
-- price <=50 in the title column from the books
-- table


