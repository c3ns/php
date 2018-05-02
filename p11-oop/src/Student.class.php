<?php
class Student extends DB
{
    public $studentNo = null;
    public $surname = null;
    public $forename = null;

    public function __construct($studentNo, $surname, $forename)
    {
        $this->studentNo = $studentNo;
        $this->surname = $surname;
        $this->forename = $forename;
    }
    public function save(){
        $sql = "INSERT INTO students (student_no, surname, forename) VALUES (:student_no, :surname, :forename)";
        $sth = parent::getDB()->prepare($sql);
        $data = [
            'student_no' => $this->studentNo,
            'surname' => $this->surname,
            'forename' => $this->forename,
        ];
        $sth->execute($data);
    }
}