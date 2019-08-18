<?php


class Borrow
{
    public $id;
    public $studentId;
    public $bookId;
    public $loanDate;
    public $returnDate;

    public function __construct($studentId, $bookId, $loanDate, $returnDate)
    {
        $this->studentId = $studentId;
        $this->bookId = $bookId;
        $this->loanDate = $loanDate;
        $this->returnDate = $returnDate;
    }

    public function getStudentId()
    {
        return $this->studentId;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getBookId()
    {
        return $this->bookId;
    }

    public function getLoanDate()
    {
        return $this->loanDate;
    }

    public function getReturnDate()
    {
        return $this->returnDate;
    }

}
