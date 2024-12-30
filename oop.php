<?php

// TODO: Add properties as Private
class Book {

    private $title;
    private $availableCopies;

    public function __construct($title, $availableCopies) {
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAvailableCopies() {
        return $this->availableCopies;
    }

    public function borrowBook() {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;

            return true;
        } else {
            return false;
        }
    }

    public function returnBook() {
        $this->availableCopies++;
    }
}

// TODO: Add properties as Private
class Member {

    private $name;
    private $borrowedBooks;

    public function __construct($name) {
        $this->name = $name;
        $this->borrowedBooks = [];
    }

    public function getName() {
        return $this->name;
    }

    public function borrowBook($book) {
        if ($book->borrowBook()) {
            $this->borrowedBooks[] = $book;
            return true;
        } else {
            return false;
        }
    }

    public function returnBook($Book) {
        $key = array_search($Book, $this->borrowedBooks);

        if (!$key === false) {
            $Book->returnBook();
            unset($this->borrowedBooks[$key]);
            return true;
        } else {
            return false;
        }
    }
}

// Usage

$book1 = new Book("The great Gatsby", 5);
$book2 = new Book("To kill a Mockingbird", 3);

$member1 = new Member("John Doe");
$member2 = new Member("Jane smith");

$member1->borrowBook($book1);
$member2->borrowBook($book2);

// Output must look like this:

echo "Available Copies of '" .
$book1->getTitle() . "': " .
$book1->getAvailableCopies() . "\n";

echo "Available Copies of '" .
$book2->getTitle() . "': " .
$book2->getAvailableCopies() . "\n";