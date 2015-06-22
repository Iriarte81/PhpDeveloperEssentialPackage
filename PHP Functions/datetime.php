<?php



checkdate();

// month
//     The month is between 1 and 12 inclusive.
// day
//     The day is within the allowed number of days for the given month. Leap years are taken into consideration.
// year
//     The year is between 1 and 32767 inclusive.

// Return Values ¶
// Returns TRUE if the date given is valid; otherwise returns FALSE.
// Examples ¶

// Example #1 checkdate() example

var_dump(checkdate(12, 31, 2000));
var_dump(checkdate(2, 29, 2001));



/*array date_parse ( string $date )

date
    Date in format accepted by strtotime().
Return Values ¶
Returns array with information about the parsed date on success or FALSE on failure.
Errors/Exceptions ¶
In case the date format has an error, the element 'errors' will contains the error messages.
Examples ¶
Example #1 A date_parse() example
*/
print_r(date_parse("2006-12-12 10:00:00.5"));
/*
The above example will output:

Array
(
    [year] => 2006
    [month] => 12
    [day] => 12
    [hour] => 10
    [minute] => 0
    [second] => 0
    [fraction] => 0.5
    [warning_count] => 0
    [warnings] => Array()
    [error_count] => 0
    [errors] => Array()
    [is_localtime] => 
)
*/

date() // check the manual for all parameter options

// Prints something like: Monday
echo date("l");

// Prints something like: Monday 8th of August 2005 03:12:46 PM
echo date('l jS \of F Y h:i:s A');

// Prints: July 1, 2000 is on a Saturday
echo "July 1, 2000 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2000));

/* use the constants in the format parameter */
// prints something like: Wed, 25 Sep 2013 15:28:57 -0700
echo date(DATE_RFC2822);

// prints something like: 2000-07-01T00:00:00+00:00
echo date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000));


gettimeofday();

print_r(gettimeofday());

echo gettimeofday(true);

/*
The above example will output something similar to:

Array
(
    [sec] => 1073504408
    [usec] => 238215
    [minuteswest] => 0
    [dsttime] => 1
)

1073504408.23910

*/

strtotime();

// strtotime — Parse about any English textual datetime description into a Unix timestamp


echo strtotime("now"), "\n";
echo strtotime("10 September 2000"), "\n";
echo strtotime("+1 day"), "\n";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n";


// mktime() returns the Unix timestamp of the arguments given. If the arguments
// are invalid, the function returns FALSE (before PHP 5.1 it returned -1). 


// Set the default timezone to use. Available as of PHP 5.1
date_default_timezone_set('UTC');

// Prints: July 1, 2000 is on a Saturday
echo "July 1, 2000 is on a " . date("l", mktime(0, 0, 0, 7, 1, 2000));

// Prints something like: 2006-04-05T01:02:03+00:00
echo date('c', mktime(1, 2, 3, 4, 5, 2006));


$today = getdate();
print_r($today);

/*The above example will output something similar to:

Array
(
    [seconds] => 40
    [minutes] => 58
    [hours]   => 21
    [mday]    => 17
    [wday]    => 2
    [mon]     => 6
    [year]    => 2003
    [yday]    => 167
    [weekday] => Tuesday
    [month]   => June
    [0]       => 1055901520
)
*/


$nextWeek = time() + (7 * 24 * 60 * 60);
                   // 7 days; 24 hours; 60 mins; 60 secs
echo 'Now:       '. date('Y-m-d') ."\n";
echo 'Next Week: '. date('Y-m-d', $nextWeek) ."\n";
// or using strtotime():
echo 'Next Week: '. date('Y-m-d', strtotime('+1 week')) ."\n";
/*
The above example will output something similar to:

Now:       2005-03-30
Next Week: 2005-04-06
Next Week: 2005-04-06

*/














?>