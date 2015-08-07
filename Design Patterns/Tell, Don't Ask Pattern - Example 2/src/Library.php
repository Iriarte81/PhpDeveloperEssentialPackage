<?php namespace Acme;

class Library {

	protected $books;

	// library depends on a BookCollection
	function __construct(BookCollection $books) {

		$this->books = $books;
	}

	public function books() {

		return $this->books;
	}

	public function checkOut($book) {

		// the library then removes the book
		$this->books = $this->books->remove($book);

	}
}

?>