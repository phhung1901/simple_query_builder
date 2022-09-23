<?php
namespace interfaces;

interface CollectionInterface extends Arrayable, ArrayAccess, IteratorAggregate, Countable {
    public function isEmpty();

    public function filter($callback);

    public function clear();

    public function add($element);

    public function first();

    public function last();

    public function map($callback);

}