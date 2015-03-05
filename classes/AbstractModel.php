<?php
/**
 * Created by PhpStorm.
 * User: Олег
 * Date: 03.03.15
 * Time: 16:40
 */

require_once __DIR__.'/../models/db.php';

abstract class AbstractModel
{
   protected static $table = 'news';

   protected $data = [];

   public function __set($k, $v)
   {
       $this->data[$k] = $v;
   }

   public function __get($k)
   {
       return $this->data[$k];
   }

   public static function findAll()
   {
       $class = get_called_class();
       $sql = 'SELECT * FROM ' . static::$table;
       $db = new DB();
       $db->setClassName($class);
       return $db->query($sql);
   }

   public static function  findOneByPk($id)
   {
       $class = get_called_class();
       $sql = 'SELECT * FROM '. static::$table .' WHERE id = :id';

       $db = new DB();
       $db->setClassName($class);
       return  $db->query($sql, [':id'=>$id])[0];
   }

   public static function findByColumn($column, $value)
   {
       $class = get_called_class();
       $sql = 'SELECT * FROM '. static::$table .' WHERE ' .$column . '= :value ';
       $db = new DB();
       $db->setClassName($class);
       return  $db->query($sql, [':value'=>$value])[0];
   }

   public function insert()
   {
       $cols = array_keys($this->data);
       $data = [];

       foreach ($cols as $col){
           $data[':'.$col] = $this->data[$col];
       }

       $sql = 'INSERT INTO ' . static::$table . '(' .implode(', ',$cols). ')
                         VALUES (' .implode(', ', array_keys($data)). ')';

       $db = new DB;
       $db->execute($sql, $data);

       $class = get_called_class();
       $sql = 'SELECT * FROM '. static::$table . ' ORDER BY id DESC';
       $db->setClassName($class);
       return $db->query($sql)[0];
   }
   public function update($id)
   {
       $data = [':title'=>$this->data['title'],':text'=>$this->data['text'],':id'=>$id];

       $sql = 'UPDATE '. static::$table .  ' SET title = :title, text = :text WHERE id = :id ';

       $db = new DB;
       $db->execute($sql, $data);
   }

    public function delete($id)
    {
       $sql = 'DELETE FROM ' . static::$table . ' WHERE id = :id ';
       $db = new DB;
       $db->query($sql, [':id'=>$id]); // вместо id this->id

    }

} 