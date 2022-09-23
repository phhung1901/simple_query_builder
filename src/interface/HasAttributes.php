<?php
namespace interfaces;

trait HasAttributes{
    protected $original;
    protected $casts;
    protected $attributes;
    protected $default_casts;

    public function __get($key)
    {
        // TODO: Implement __get() method.
        return $this->$key;
    }

    public function __set($key, $value)
    {
        // TODO: Implement __set() method.
        return $this->$key = $value;
    }

    public function setAttribute(array $attributes = []){
        foreach ($attributes as $key => $value){
            $this->$key = $value;
        }
        return $this;
    }

}