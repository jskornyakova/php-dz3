<?php


namespace app\modules;

use app\services\DB;

/**
 * Interface IPostRepository
 * @package app\modules
 */
class MySqlStorage implements IPostRepository
{
    protected $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }
    public function getDate(){
        $data = [];
        foreach ($this as $property => $value) {
            if ($property == 'db'){
                continue;
            }
            $data[$property] = $value;
        }
        return $data;
    }
    public function insert(){
        $tableName = $this->getTableName();
        $array = $this->getDate();

        unset($array[current(array_keys($array))]);
        $params = "`";
        $value = "'";
        $params .= implode("`, `", array_keys($array));
        $value .= implode("', '", array_values($array));
        $params .= "`";
        $value .= "'";
        var_dump($array);
        $sql = "INSERT INTO {$tableName}({$params}) VALUES ({$value})";
        var_dump($sql);
        return $this->db->exec($sql);
    }
    public function delete($id){
        $tableName = $this->getTableName();
        $sql = "DELETE FROM `{$tableName}` WHERE id = :id";
        $this->db->exec($sql, [':id' => $id]);
    }
    public function update($id)
    {
        $tableName = $this->getTableName();
        $array = $this->getDate();
        unset($array['id']);
        foreach ($array as $property => $value) {
            if (empty($value)) { //проверяем если пустое значение
                unset($array[$property]);
            }
        }
        $params ='';
        foreach ($array as $property => $value) {
            $params .= "`{$property}`='{$value}', ";
        }
        $params = substr($params,0,-2);
        $sql = "UPDATE `{$tableName}` SET {$params} WHERE id = :id";
        $this->db->exec($sql, [':id' => $id]);
    }
    public function save()
    {
        $array = $this->getDate();
        if((empty($array['id'])) || (!($this->getOne($array['id'])))){
            $this->insert();
        } else {
            $this->update($array['id']);
        }
    }
}