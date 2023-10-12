<?php 
namespace App\Classes;
class Book
{
    private $title;
    private $author;
    private $isbn;
    private $available;


    public function __construct($title, $author, $isbn)
    {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
        $this->available = true;
    }

    public function getTitle(){
        return $this->title;
    }
    public function getAuthor(){
        return $this->author;
    }
    public function getISBN(){
        return $this->isbn;
    }
    public function getAvailable(){
        return $this->available;
    }

    public function borrow(){
        if($this->available){
            $this->available = false;
            return true;
        }
        return false;
    }

    public function returnBook(){
        return $this->available = true;
    }
}