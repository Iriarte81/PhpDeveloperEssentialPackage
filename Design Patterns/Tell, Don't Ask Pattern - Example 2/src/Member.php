<?php namespace Acme;

class Member {

	protected books = [];

	public function checkOut($book, Library $library)
	{

	// the member class' sole responsibility is to
	// checkout the book,
	// the library then receives the request to
	// check out...
		$library->checkOut($book);

		$this->books[] = $book;
	}	

}

?>