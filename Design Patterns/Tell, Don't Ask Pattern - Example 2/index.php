<?php

/*
 * Tell, Don't Ask.
 * 
 * As much as possible and when it's appropriate
 * we want to tell our objects what to do rather
 * than querying them for info on their state
 * and then make decisions as to what they should
 * do next.
 *
 * We want to tell objects what to do, rather
 * than querying them and acting on their behalf.
 */

require 'vendor/autoload.php';

$books = [
	'Harry Potter', 
	'Lord of the Rings',
	'Total Recall'
];

// new Acme\Library depends on a book collection
$library = new Acme\Library(new Acme\BookCollection($books));

$jeffrey = new Acme\Member;

$jeffrey->checkOut('Harry Potter', $library);
$jeffrey->checkOut('Total Recall', $library);

var_dump($library->books());