<?php


//     addcslashes — Quote string with slashes in a C style
echo addcslashes('foo[ ]', 'A..z');
// output:  \f\o\o\[ \]
// All upper and lower-case letters will be escaped
// ... but so will the [\]^_`


//     addslashes — Quote string with slashes
$str = "Is your name O'Reilly?";
// Outputs: Is your name O\'Reilly?
echo addslashes($str);


//     bin2hex — Convert binary data into hexadecimal representation
// This function is for converting binary data into a hexadecimal string representation.  
// This function is not for converting strings representing binary digits into hexadecimal.  
// If you want that functionality, you can simply do this:
$binary = "11111001";
$hex = dechex(bindec($binary));
echo $hex;
//This would output "f9".  Just remember that there is a very big difference between binary data and a string representation of binary.	

//     chop — Alias of rtrim
//Rather use rtrim(). Usage of chop() is not very clear nor consistent for people reading the code after you.


//     chr — Return a specific character
$str = "The string ends in escape: ";
$str .= chr(27); /* add an escape character at the end of $str */
/* Often this is more useful */
$str = sprintf("The string ends in escape: %c", 27);
// Another Example
function normalize_special_characters( $str )
{
    # Quotes cleanup
    $str = ereg_replace( chr(ord("`")), "'", $str );        # `
    $str = ereg_replace( chr(ord("´")), "'", $str );        # ´
    $str = ereg_replace( chr(ord("„")), ",", $str );        # „
    $str = ereg_replace( chr(ord("`")), "'", $str );        # `
    $str = ereg_replace( chr(ord("´")), "'", $str );        # ´
    $str = ereg_replace( chr(ord("“")), "\"", $str );        # “
    $str = ereg_replace( chr(ord("”")), "\"", $str );        # ”
    $str = ereg_replace( chr(ord("´")), "'", $str );        # ´

//     chunk_split — Split a string into smaller chunks
$string = '1234';
substr(chunk_split($string, 2, ':'), 0, -1);
// will return 12:34 


//     convert_cyr_string — Convert from one Cyrillic character set to another


//     convert_uudecode — Decode a uuencoded string
/* Can you imagine what this will print? :) */
echo convert_uudecode("+22!L;W9E(%!(4\"$`\n`");


//     convert_uuencode — Uuencode a string
$some_string = "test\ntext text\r\n";
echo convert_uuencode($some_string);

//     count_chars — Return information about characters used in a string
// Return Values
// Depending on mode count_chars() returns one of the following: 
/*
    0 - an array with the byte-value as key and the frequency of every byte as value.
    1 - same as 0 but only byte-values with a frequency greater than zero are listed.
    2 - same as 0 but only byte-values with a frequency equal to zero are listed.
    3 - a string containing all unique characters is returned.
    4 - a string containing all not used characters is returned.
*/
//Example #1 count_chars() example
$data = "Two Ts and one F.";
foreach (count_chars($data, 1) as $i => $val) {
   echo "There were $val instance(s) of \"" , chr($i) , "\" in the string.\n";
}


    crc32 — Calculates the crc32 polynomial of a string
    crypt — One-way string hashing
    echo — Output one or more strings
    explode — Split a string by string
    fprintf — Write a formatted string to a stream
    get_html_translation_table — Returns the translation table used by htmlspecialchars and htmlentities
    hebrev — Convert logical Hebrew text to visual text
    hebrevc — Convert logical Hebrew text to visual text with newline conversion
    hex2bin — Decodes a hexadecimally encoded binary string
    html_entity_decode — Convert all HTML entities to their applicable characters
    htmlentities — Convert all applicable characters to HTML entities
    htmlspecialchars_decode — Convert special HTML entities back to characters
    htmlspecialchars — Convert special characters to HTML entities
    implode — Join array elements with a string
    join — Alias of implode
    lcfirst — Make a string's first character lowercase
    levenshtein — Calculate Levenshtein distance between two strings
    localeconv — Get numeric formatting information
    ltrim — Strip whitespace (or other characters) from the beginning of a string
    md5_file — Calculates the md5 hash of a given file
    md5 — Calculate the md5 hash of a string
    metaphone — Calculate the metaphone key of a string
    money_format — Formats a number as a currency string
    nl_langinfo — Query language and locale information
    nl2br — Inserts HTML line breaks before all newlines in a string
    number_format — Format a number with grouped thousands
    ord — Return ASCII value of character
    parse_str — Parses the string into variables
    print — Output a string
    printf — Output a formatted string
    quoted_printable_decode — Convert a quoted-printable string to an 8 bit string
    quoted_printable_encode — Convert a 8 bit string to a quoted-printable string
    quotemeta — Quote meta characters
    rtrim — Strip whitespace (or other characters) from the end of a string
    setlocale — Set locale information
    sha1_file — Calculate the sha1 hash of a file
    sha1 — Calculate the sha1 hash of a string
    similar_text — Calculate the similarity between two strings
    soundex — Calculate the soundex key of a string
    sprintf — Return a formatted string
    sscanf — Parses input from a string according to a format
    str_getcsv — Parse a CSV string into an array
    str_ireplace — Case-insensitive version of str_replace.
    str_pad — Pad a string to a certain length with another string
    str_repeat — Repeat a string
    str_replace — Replace all occurrences of the search string with the replacement string
    str_rot13 — Perform the rot13 transform on a string
    str_shuffle — Randomly shuffles a string
    str_split — Convert a string to an array
    str_word_count — Return information about words used in a string
    strcasecmp — Binary safe case-insensitive string comparison
    strchr — Alias of strstr
    strcmp — Binary safe string comparison
    strcoll — Locale based string comparison
    strcspn — Find length of initial segment not matching mask
    strip_tags — Strip HTML and PHP tags from a string
    stripcslashes — Un-quote string quoted with addcslashes
    stripos — Find the position of the first occurrence of a case-insensitive substring in a string
    stripslashes — Un-quotes a quoted string
    stristr — Case-insensitive strstr
    strlen — Get string length
    strnatcasecmp — Case insensitive string comparisons using a "natural order" algorithm
    strnatcmp — String comparisons using a "natural order" algorithm
    strncasecmp — Binary safe case-insensitive string comparison of the first n characters
    strncmp — Binary safe string comparison of the first n characters
    strpbrk — Search a string for any of a set of characters
    strpos — Find the position of the first occurrence of a substring in a string
    strrchr — Find the last occurrence of a character in a string
    strrev — Reverse a string
    strripos — Find the position of the last occurrence of a case-insensitive substring in a string
    strrpos — Find the position of the last occurrence of a substring in a string
    strspn — Finds the length of the initial segment of a string consisting entirely of characters contained within a given mask.
    strstr — Find the first occurrence of a string
    strtok — Tokenize string
    strtolower — Make a string lowercase
    strtoupper — Make a string uppercase
    strtr — Translate characters or replace substrings
    substr_compare — Binary safe comparison of two strings from an offset, up to length characters
    substr_count — Count the number of substring occurrences
    substr_replace — Replace text within a portion of a string
    substr — Return part of a string
    trim — Strip whitespace (or other characters) from the beginning and end of a string
    ucfirst — Make a string's first character uppercase
    ucwords — Uppercase the first character of each word in a string
    vfprintf — Write a formatted string to a stream
    vprintf — Output a formatted string
    vsprintf — Return a formatted string
    wordwrap — Wraps a string to a given number of characters



?>