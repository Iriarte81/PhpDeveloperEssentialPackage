<?php
require 'vendor/composer.json';

use Acme\Book;
use Acme\KindleAdapter;
use Acme\Kindle;


class Person {
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}

(new Person)->read(new Book);

// this next implements the adapter so we can read the book
// the ereaderInterface and the Bookinterface require different analogous methods
// We want our person to be able to read our kindle and not a book
// We use the KindleAdapter which will allow us to read the book
// We create an adapter and have it implement the interface we are trying to adapt
// Then we inject our class and translate the original interfaces methods to the new one
// Kindle does no adhere to the contract we expect, so to fix this we wrap up kindle in an adapter
// and pass THAT to the read method. The adapter takes care of adapting the methods
// of one interface to those of the new interface.
(new Person)->read(new KindleAdapter(new Kindle));



