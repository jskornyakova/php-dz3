<?php


namespace app\modules;
use app\services\DB;

/**
 * Class Model
 * @package app\modules
 * @property string tableName
 */
abstract class Model
{
    /**
     * @var DB
     */

    protected $db;

    public function __construct()
    {
        $this->db = DB::getInstance();
    }

    /**
     * Возвращает имя таблицы в БД
     * @return string
     */
    abstract public function getTableName(): string;

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

    public function getOne($id){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryObject($sql, static::class, [':id' => $id]);
    }
    public function getAll(){
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryObjects($sql, static::class);
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
        $sql = "INSERT INTO {$tableName}({$params}) VALUES ({$value})";
        return $this->db->exec($sql);
    }

    public function delete($id)
    {
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
        var_dump($array);
        if((empty($array['id'])) || (!($this->getOne($array['id'])))){
            $this->insert();
        } else {
            $this->update($array['id']);
        }
    }
}