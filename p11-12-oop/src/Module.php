<?php
namespace Models;

use Models\Db\Db;

class Module extends DB
{
    public $moduleCode = null;
    public $moduleName = null;

    public function __construct($moduleCode, $moduleName)
    {
        $this->moduleCode = $moduleCode;
        $this->moduleName = $moduleName;
    }
    public function save(){
        $sql = "INSERT INTO modules (module_code, module_name) VALUES (:module_code, :module_name)";
        $data = [
            'module_code' => $this->moduleCode,
            'module_name' => $this->moduleName,
        ];
        parent::query($sql,$data);
    }
}