-- 01 Updating a table with a trigger
-- database: scratch
-- this examples shows you how to update a table when
-- a row is inserted into another table

CREATE TABLE widgetCustomer ( id SERIAL, name VARCHAR(255), last_order_id BIGINT );
CREATE TABLE widgetSale ( id SERIAL, item_id BIGINT, customer_id BIGINT, quan INT, price DECIMAL(9,2) );
-- customer id points to the customer table

INSERT INTO widgetCustomer (name) VALUES ('Bob');
INSERT INTO widgetCustomer (name) VALUES ('Sally');
INSERT INTO widgetCustomer (name) VALUES ('Fred');

SELECT * FROM widgetCustomer;

CREATE TRIGGER newWidgetSale AFTER INSERT ON widgetSale
    FOR EACH ROW
    UPDATE widgetCustomer
    SET last_order_id = NEW.id
    WHERE id = NEW.customer_id;
-- new.id refers to the id of the row that was just inserted into the widgetSale table


INSERT INTO widgetSale (item_id, customer_id, quan, price)
VALUES (1, 3, 5, 19.95);
INSERT INTO widgetSale (item_id, customer_id, quan, price)
VALUES (2, 2, 3, 14.95);
INSERT INTO widgetSale (item_id, customer_id, quan, price)
VALUES (3, 1, 1, 29.95);

SELECT * FROM widgetSale;
SELECT * FROM widgetCustomer;
-- so we'll get in WidgetCustomer table
--  in the colun last_order_id which was null before
-- the insertions into to the WidgetSale table
-- is now populated with the values that correspond
-- to the order each customer (row) placed


-- 02 Preventing automatic updates with a trigger
-- database: scratch
-- in this example when we update a table we launch a trigger
-- if the reconcile flag is set it allows or does not allow the update

DROP TABLE IF EXISTS widgetSale;

CREATE TABLE widgetSale ( id SERIAL, item_id BIGINT, customer_id BIGINT, quan INT, price DECIMAL(9,2), reconciled INT );
-- i set a flag which is reconciled, and we set it to 1 to prevent updating
INSERT INTO widgetSale (item_id, customer_id, quan, price, reconciled)
VALUES (1, 3, 5, 19.95, 0);
INSERT INTO widgetSale (item_id, customer_id, quan, price, reconciled)
VALUES (2, 2, 3, 14.95, 1);
INSERT INTO widgetSale (item_id, customer_id, quan, price, reconciled)
VALUES (3, 1, 1, 29.95, 0);

SELECT * FROM widgetSale;

DELIMITER //
CREATE TRIGGER updateWidgetSale BEFORE UPDATE ON widgetSale
    FOR EACH ROW
    BEGIN
        IF ( SELECT reconciled FROM widgetSale WHERE id = NEW.id ) > 0 THEN
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error: cannot update reconciled row in widgetSale';
        END IF;
    END
    -- begin and end block allows more than one statement to be in a trigger
    -- signal allows you to throw an error
//
DELIMITER ;
-- delimiter allows us to set the delimiter from ; to // or something else
-- we do this so we can have many statements within the trigger
-- in the end we set back the delimiter to ;
START TRANSACTION;
UPDATE widgetSale SET quan = quan + 9 WHERE id = 2;
COMMIT;

SELECT * FROM widgetSale;

-- Alternate error code for MySQL versions prior to 5.5
        IF ( SELECT reconciled FROM widgetSale WHERE id = NEW.id ) > 0 THEN
            UPDATE `Error: cannot update reconciled row in widgetSale` SET x=1;
        END IF;


-- 03 Logging transactions with a trigger
-- database: xxx

-- updating a log whenever a row is inserted into a table

DROP TABLE IF EXISTS widgetSale;

CREATE TABLE widgetSale ( id SERIAL, item_id BIGINT, customer_id BIGINT, quan INT, price DECIMAL(9,2) );
CREATE TABLE widgetLog ( id SERIAL, stamp TIMESTAMP, event VARCHAR(255), username VARCHAR(255),
    tablename VARCHAR(255), table_id BIGINT);
--- note we are using the Customer table from previous exercises.

DELIMITER //
CREATE TRIGGER stampSale AFTER INSERT ON widgetSale
    FOR EACH ROW
    BEGIN
        UPDATE widgetCustomer SET last_order_id = NEW.id
            WHERE widgetCustomer.id = NEW.customer_id;
        INSERT INTO widgetLog (event, username, tablename, table_id)
            VALUES ('INSERT', 'TRIGGER', 'widgetSale', NEW.id);
    END
//
DELIMITER ;
-- after inserting a row on widgetSale the trigger will be launched

INSERT INTO widgetSale (item_id, customer_id, quan, price)
VALUES (1, 3, 5, 19.95);
INSERT INTO widgetSale (item_id, customer_id, quan, price)
VALUES (2, 2, 3, 14.95);
INSERT INTO widgetSale (item_id, customer_id, quan, price)
VALUES (3, 1, 1, 29.95);

SELECT * FROM widgetSale;
SELECT * FROM widgetCustomer;
SELECT * FROM widgetLog;

-- restore database
DROP TRIGGER IF EXISTS newWidgetSale;
DROP TRIGGER IF EXISTS updateWidgetSale;
DROP TRIGGER IF EXISTS widgetLog;

DROP TABLE IF EXISTS widgetCustomer;
DROP TABLE IF EXISTS widgetSale;
DROP TABLE IF EXISTS widgetLog;

