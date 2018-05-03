<?php
namespace Models;

use Models\Db\DB;

class Mark extends DB
{
    public $studentNo = null;
    public $moduleCode = null;
    public $mark = null;

    public function __construct($studentNo, $moduleCode, $mark)
    {
        $this->studentNo = $studentNo;
        $this->moduleCode = $moduleCode;
        $this->mark = $mark;
    }
    public function save(){
        $sql = "INSERT INTO marks (student_no, module_code, mark) VALUES (:student_no, :module_code, :mark)";
        $data = [
            'student_no' => $this->studentNo,
            'module_code' => $this->moduleCode,
            'mark' => $this->mark,
        ];
        parent::query($sql,$data);
    }
}