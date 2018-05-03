<?php
namespace Models\Components;

use Models\Db\DB;
use PDO;

abstract class SelectList extends DB
{
    static public function studentSelectList(){
        $sql = "SELECT student_no, surname, forename  FROM students";

        $data = parent::query($sql)->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $row){
            $stNo = $row['student_no'];
            $sn = $row['surname'];
            $fn = $row['forename'];

            echo "<option value='". $stNo ."'>". $stNo ." (". $sn ." ". $fn .")</option>";
        }
    }

    static public function moduleSelectList(){
        $sql = "SELECT module_name, module_code FROM modules";

        $data = parent::query($sql)->fetchAll(PDO::FETCH_ASSOC);

        foreach($data as $row){
            echo "<option value='". $row['module_code'] ."'>". $row['module_name'] ." (".$row['module_code'].")</option>";
        }
    }
}