<?php


// array_change_key_case — Changes the case of all keys in an array
$input_array = array("FirSt" => 1, "SecOnd" => 4);
print_r(array_change_key_case($input_array, CASE_UPPER));

// array_chunk — Split an array into chunks
$input_array = array('a', 'b', 'c', 'd', 'e');
print_r(array_chunk($input_array, 2));
print_r(array_chunk($input_array, 2, true));

//array_column — Return the values from a single column in the input array
$records = array(
    array(
        'id' => 2135,
        'first_name' => 'John',
        'last_name' => 'Doe',
    ),
    array(
        'id' => 3245,
        'first_name' => 'Sally',
        'last_name' => 'Smith',
    ),
    array(
        'id' => 5342,
        'first_name' => 'Jane',
        'last_name' => 'Jones',
    ),
    array(
        'id' => 5623,
        'first_name' => 'Peter',
        'last_name' => 'Doe',
    )
);
$first_names = array_column($records, 'first_name');
print_r($first_names);

//array_combine — Creates an array by using one array for keys and another for its values
$a = array('green', 'red', 'yellow');
$b = array('avocado', 'apple', 'banana');
$c = array_combine($a, $b);
print_r($c);

// array_count_values — Counts all the values of an array
$array = array(1, "hello", 1, "world", "hello");
print_r(array_count_values($array));

// array_diff_assoc — Computes the difference of arrays with additional index check
//Example #1 array_diff_assoc() example
// In this example you see the "a" => "green" pair is present in both arrays and thus it is not in the output from the function. 
// Unlike this, the pair 0 => "red" is in the output because in the second argument "red" has key which is 1.
$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "green", "yellow", "red");
$result = array_diff_assoc($array1, $array2);
print_r($result);
/*The above example will output:
Array
(
    [b] => brown
    [c] => blue
    [0] => red
)
*/

//array_diff_key — Computes the difference of arrays using keys for comparison
//Return Values
//Returns an array containing all the entries from array1 whose keys are not present in any of the other arrays.
//Example #1 array_diff_key() example
// The two keys from the key => value pairs are considered equal only if (string) $key1 === (string) $key2 .
//In other words a strict type check is executed so the string representation must be the same.
$array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);
var_dump(array_diff_key($array1, $array2));
/*
The above example will output:

array(2) {
  ["red"]=>
  int(2)
  ["purple"]=>
  int(4)
}
*/

// array_diff_uassoc — Computes the difference of arrays with additional index check which is performed by a user supplied callback function
//Return Values
//Returns an array containing all the entries from array1 that are not present in any of the other arrays.
//Example #1 array_diff_uassoc() example
// The "a" => "green" pair is present in both arrays and thus it is not in the output from the function. Unlike this,
// the pair 0 => "red" is in the output because in the second argument "red" has key which is 1.
function key_compare_func($a, $b)
{
    if ($a === $b) {
        return 0;
    }
    return ($a > $b)? 1:-1;
}

$array1 = array("a" => "green", "b" => "brown", "c" => "blue", "red");
$array2 = array("a" => "green", "yellow", "red");
$result = array_diff_uassoc($array1, $array2, "key_compare_func");
print_r($result);
/*
The above example will output:

Array
(
    [b] => brown
    [c] => blue
    [0] => red
)

The equality of 2 indices is checked by the user supplied callback function.
*/


//array_diff_ukey — Computes the difference of arrays using a callback function on the keys for comparison
//Return Values
//Returns an array containing all the entries from array1 that are not present in any of the other arrays.
//Example #1 array_diff_ukey() example
function key_compare_func($key1, $key2)
{
    if ($key1 == $key2)
        return 0;
    else if ($key1 > $key2)
        return 1;
    else
        return -1;
}

$array1 = array('blue'  => 1, 'red'  => 2, 'green'  => 3, 'purple' => 4);
$array2 = array('green' => 5, 'blue' => 6, 'yellow' => 7, 'cyan'   => 8);

var_dump(array_diff_ukey($array1, $array2, 'key_compare_func'));
/*
The above example will output:

array(2) {
  ["red"]=>
  int(2)
  ["purple"]=>
  int(4)
}
*/


//array_diff — Computes the difference of arrays
//Return Values
//Returns an array containing all the entries from array1 that are not present in any of the other arrays.
//Example #1 array_diff() example
$array1 = array("a" => "green", "red", "blue", "red");
$array2 = array("b" => "green", "yellow", "red");
$result = array_diff($array1, $array2);

print_r($result);

//Multiple occurrences in $array1 are all treated the same way. This will output :
/*
Array
(
    [1] => blue
)
*/


    array_fill_keys — Fill an array with values, specifying keys
    array_fill — Fill an array with values
    array_filter — Filters elements of an array using a callback function
    array_flip — Exchanges all keys with their associated values in an array
    array_intersect_assoc — Computes the intersection of arrays with additional index check
    array_intersect_key — Computes the intersection of arrays using keys for comparison
    array_intersect_uassoc — Computes the intersection of arrays with additional index check, compares indexes by a callback function
    array_intersect_ukey — Computes the intersection of arrays using a callback function on the keys for comparison
    array_intersect — Computes the intersection of arrays
    array_key_exists — Checks if the given key or index exists in the array
    



    array_keys — Return all the keys or a subset of the keys of an array
    array_map — Applies the callback to the elements of the given arrays
    array_merge_recursive — Merge two or more arrays recursively
    array_merge — Merge one or more arrays
    array_multisort — Sort multiple or multi-dimensional arrays
    array_pad — Pad array to the specified length with a value
    array_pop — Pop the element off the end of array
    array_product — Calculate the product of values in an array
    array_push — Push one or more elements onto the end of array
    array_rand — Pick one or more random entries out of an array
    array_reduce — Iteratively reduce the array to a single value using a callback function
    array_replace_recursive — Replaces elements from passed arrays into the first array recursively
    array_replace — Replaces elements from passed arrays into the first array
    array_reverse — Return an array with elements in reverse order
    array_search — Searches the array for a given value and returns the corresponding key if successful
    array_shift — Shift an element off the beginning of array
    array_slice — Extract a slice of the array
    array_splice — Remove a portion of the array and replace it with something else
    array_sum — Calculate the sum of values in an array
    array_udiff_assoc — Computes the difference of arrays with additional index check, compares data by a callback function
    array_udiff_uassoc — Computes the difference of arrays with additional index check, compares data and indexes by a callback function
    array_udiff — Computes the difference of arrays by using a callback function for data comparison
    array_uintersect_assoc — Computes the intersection of arrays with additional index check, compares data by a callback function
    array_uintersect_uassoc — Computes the intersection of arrays with additional index check, compares data and indexes by separate callback functions
    array_uintersect — Computes the intersection of arrays, compares data by a callback function
    array_unique — Removes duplicate values from an array
    array_unshift — Prepend one or more elements to the beginning of an array
    array_values — Return all the values of an array
    array_walk_recursive — Apply a user function recursively to every member of an array
    array_walk — Apply a user supplied function to every member of an array
    array — Create an array
    arsort — Sort an array in reverse order and maintain index association
    asort — Sort an array and maintain index association
    compact — Create array containing variables and their values
    count — Count all elements in an array, or something in an object
    current — Return the current element in an array
    each — Return the current key and value pair from an array and advance the array cursor
    end — Set the internal pointer of an array to its last element
    extract — Import variables into the current symbol table from an array
    in_array — Checks if a value exists in an array
    key_exists — Alias of array_key_exists
    key — Fetch a key from an array
    krsort — Sort an array by key in reverse order
    ksort — Sort an array by key
    list — Assign variables as if they were an array
    natcasesort — Sort an array using a case insensitive "natural order" algorithm
    natsort — Sort an array using a "natural order" algorithm
    next — Advance the internal array pointer of an array
    pos — Alias of current
    prev — Rewind the internal array pointer
    range — Create an array containing a range of elements
    reset — Set the internal pointer of an array to its first element
    rsort — Sort an array in reverse order
    shuffle — Shuffle an array
    sizeof — Alias of count
    sort — Sort an array
    uasort — Sort an array with a user-defined comparison function and maintain index association
    uksort — Sort an array by keys using a user-defined comparison function
    usort — Sort an array by values using a user-defined comparison function

*/