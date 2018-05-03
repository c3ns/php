<?php
namespace Models;

use Models\Db\Db;
use PDO;

abstract class DataTable extends DB
{
    private function selectData(){
        $sql = "SELECT t1.mark as mark,
            t2.module_name as module_name,
            t3.surname as surname,
            t3.forename as forename
            FROM marks t1 
                LEFT JOIN modules t2
                    ON t1.module_code = t2.module_code
                LEFT JOIN students t3
                    ON t1.student_no = t3.student_no";

       return parent::query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function printData(){
        $data = self::selectData();

        if(count($data) > 0):
            foreach($data as $d):?>
                <tr>
                <td><?php echo $d['mark'] ?></td>
                <td><?php echo $d['module_name'] ?></td>
                <td><?php echo $d['surname'] ?></td>
                <td><?php echo $d['forename'] ?></td>
                </tr><?php
            endforeach;
        endif;
    }
}