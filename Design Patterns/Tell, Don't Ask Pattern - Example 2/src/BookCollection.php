<?php namespace Acme;

class BookCollection {

	protected books;

	function __construct($books) {

		$this->books = $books;
	}
	
	public function contains($book) {

		return in_array($book, $this->books);
	}

	public function remove($book) {

		// if library doesnt contain the book we want to
		// checkout
		if ( ! $this->contains($book))
		{
			throw new Exception($book . 'is not available.');
		}
		// what is the difference between
		// our current set of books and the one we are checking out
		// and return a new book collection without that book weve checked out
		return new self(array_diff($this->books, [$book]));	
	}
}

?>