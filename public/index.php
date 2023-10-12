<?php 

use App\Classes\Book;
use App\Classes\Library;
include 'autoload.php';



$book1 = new Book("The Great Gatsby", "F. Scott Fitzgerald", "978-0743273565");
$book2 = new Book("To Kill a Mockingbird", "Harper Lee", "978-0061120084");
$book3 = new Book("1984", "George Orwell", "978-0451524935");


$library = new Library();
$library->addBooks($book1);
$library->addBooks($book2);
$library->addBooks($book3);



//list available book

$availableBooks = $library->listAvailableBook();
foreach($availableBooks as $book){
    echo "Title: " . $book->getTitle() . ", Author: " . $book->getAuthor() . "\n";
}

$book1 ->borrow();
$book2 ->borrow();
$book3 ->borrow();

$book1->returnBook();

$availableBooks = $library->listAvailableBook();
foreach($availableBooks as $book){
    echo "Title: " . $book->getTitle() . ", Author: " . $book->getAuthor() . "\n";
}

$library->removeBook($book2);
$availableBooks = $library->listAvailableBook();
foreach ($availableBooks as $book) {
    echo "Title: " . $book->getTitle() . ", Author: " . $book->getAuthor() . "\n";
}