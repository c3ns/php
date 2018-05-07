<?php
namespace Models;

use Models\Db\Db;
use PDO;

abstract class DataTable extends DB
{
    private function selectData(){
        $sql = "SELECT content FROM chuck ORDER BY id DESC limit 10";

        return parent::query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    static public function printData(){
        $data = self::selectData();

        if(count($data) > 0):
            foreach($data as $d):?>
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <p class="card-text"><?php echo $d['content'] ?></p>
                    </div>
                </div>

            <?php
            endforeach;
        endif;
    }
}