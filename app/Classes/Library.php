<?php 
namespace App\Classes;

use App\Classes\Book;

class Library 
{
    private $books = [];

    public function addBooks(Book $book){
        $this->books[] =$book;
    }


    public function removeBook(Book $book){
        foreach($this->books as $key => $libraryBook){
            if($libraryBook->getISBN() == $book->getISBN()){
                unset($this->books[$key]);
                return true;
            }
        }
        return false;

    }

    public function listAvailableBook(){
        $availableBooks = [];
        foreach($this->books as $book){
            if($book->getAvailable()){
                $availableBooks[] = $book;
            }
        }
        return $availableBooks;
        
    }


}

