<?php
namespace src;

use src\interfaces\CollectionInterface;

class Collection implements CollectionInterface {

    private $elements;

    public function __construct(array $elements = [])
    {
        $this->elements = $elements;
    }

    public function isEmpty()
    {
        // TODO: Implement isEmpty() method.
        return empty($this->elements);
    }

    public function filter($callback)
    {
        // TODO: Implement filter() method.
    }

    public function clear()
    {
        // TODO: Implement clear() method.
        $this->elements = [];
        return $this->elements;
    }

    public function add($element)
    {
        // TODO: Implement add() method.
        array_push($this->elements, $element);
        return $this->elements;
    }

    public function first()
    {
        // TODO: Implement first() method.
        return reset($this->elements);
    }

    public function last()
    {
        // TODO: Implement last() method.
        return end($this->elements);
    }

    public function map($callback)
    {
        // TODO: Implement map() method.
    }

    public function toArray($array)
    {
        // TODO: Implement toArray() method.
        return $this->elements;
    }

    public function count(){
        return count($this->elements);
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }

    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
    }

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    public function getIterator()
    {
        // TODO: Implement getIterator() method.
    }
}