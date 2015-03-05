<?php

class View
    implements Iterator
{
    public $position;
    public $data =[];
    public $name;

    public function __construct()
    {
        $this->position = 0;
    }

    public function __set($k, $v)
    {
        $this->data[$k] = $v;
    }

    public function __get($k)
    {
        return $this->data[$k];
    }

    public function assign($name, $value)
    {
        $this->data[$name] = $value;
        $this->name = $name;
    }

    public function display($template)
    {
        foreach ($this->data as $key=>$value) {

            $$key = $value;
        }
        include __DIR__.'/news/'.$template;
    }

    public function display2($template)
    {
        foreach ($this->data as $value){

            $item = $value;
        }
        include __DIR__.'/news/'.$template;
    }

    public function displayAll()
    {
        foreach ($this->data[$this->name] as $item){
            $items[] = $item;
        }
        include_once __DIR__ . '/news/all.php';
        die;
    }

    public function displayOne()
    {
        $item = $this->data[$this->name];
        include_once __DIR__ . '/news/one.php';
        die;
    }

    public function displayEditor()
    {
        include_once __DIR__ . '/admin/editor.php';
    }

    public function current()
    {
        return $this->data[$this->name][$this->position];
    }

    public function next()
    {
        echo 'valid()<br>';
        ++$this->position;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        echo 'valid()<br>';
        if ($this->position >=2){
            return false;
        }
        return isset($this->data[$this->name][$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }
}

/*$view = new View();
$view->assign('items', News::getAll());

foreach ($view as $key=>$value){
    var_dump($value);
    echo '<br>';
}*/