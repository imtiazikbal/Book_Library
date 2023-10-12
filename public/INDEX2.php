<?php 
class Book {
    private $title;
    private $author;
    private $isbn;
    private $available;

    public function __construct($title, $author, $isbn) {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->available = true;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getISBN() {
        return $this->isbn;
    }

    public function isAvailable() {
        return $this->available;
    }

    public function borrow() {
        if ($this->available) {
            $this->available = false;
            return true;
        } else {
            return false; // Book is already borrowed
        }
    }

    public function returnBook() {
        $this->available = true;
    }
}

class Library {
    private $books = [];

    public function addBook(Book $book) {
        $this->books[] = $book;
    }

    public function removeBook(Book $book) {
        foreach ($this->books as $key => $libraryBook) {
            if ($libraryBook->getISBN() === $book->getISBN()) {
                unset($this->books[$key]);
                return true;
            }
        }
        return false; // Book not found in the library
    }

    public function listAvailableBooks() {
        $availableBooks = [];
        foreach ($this->books as $book) {
            if ($book->isAvailable()) {
                $availableBooks[] = $book;
            }
        }
        return $availableBooks;
    }
}

// Usage example:

// Create some books
$book1 = new Book("The Great Gatsby", "F. Scott Fitzgerald", "978-0743273565");
$book2 = new Book("To Kill a Mockingbird", "Harper Lee", "978-0061120084");
$book3 = new Book("1984", "George Orwell", "978-0451524935");

// Create a library
$library = new Library();

// Add books to the library
$library->addBook($book1);
$library->addBook($book2);
$library->addBook($book3);

// List available books in the library
$availableBooks = $library->listAvailableBooks();
foreach ($availableBooks as $book) {
    echo "Title: " . $book->getTitle() . ", Author: " . $book->getAuthor() . "\n";
}

// Borrow a book
$book1->borrow();

// Try to borrow the same book again (it should fail)
$book1->borrow(); // This should return false

// Return the borrowed book
$book1->returnBook();

// List available books again
$availableBooks = $library->listAvailableBooks();
foreach ($availableBooks as $book) {
    echo "Title: " . $book->getTitle() . ", Author: " . $book->getAuthor() . "\n";
}

// Remove a book from the library
$library->removeBook($book2);

// List available books after removal
$availableBooks = $library->listAvailableBooks();
foreach ($availableBooks as $book) {
    echo "Title: " . $book->getTitle() . ", Author: " . $book->getAuthor() . "\n";
}
