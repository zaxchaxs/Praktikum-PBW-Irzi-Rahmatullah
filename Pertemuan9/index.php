<?php

class Book {
    private $code_book;
    private $name;
    private $qty;

    public function __construct($code_book, $name, $qty) {
        $this->setCodeBook($code_book);
        $this->name = $name;
        $this->setQty($qty);
    }

    // Getter code_book
    public function getCodeBook() {
        return $this->code_book;
    }

    // Getter qty
    public function getQty() {
        return $this->qty;
    }

    // Setter code_book
    private function setCodeBook($code_book) {
        if (preg_match('/^[A-Z]{2}[0-9]{2}$/', $code_book)) {
            $this->code_book = $code_book;
        } else {
            echo "Error: Format code_book harus dalam format 'BB00' (2 huruf besar dan 2 angka).\n";
        }
    }

    // Setter qty
    private function setQty($qty) {
        if (is_int($qty) && $qty > 0) {
            $this->qty = $qty;
        } else {
            echo "Error: Qty harus berupa bilangan bulat positif.\n";
        }
    }
}

$book1 = new Book("AB12", "PBW", 5);
echo "Code Book: ". $book1->getCodeBook();
echo "\n";
echo "Qty Book: " . $book1->getQty();
echo "\n";
echo "\n";

$book2 = new Book("aB12", "Salah Format", -3);