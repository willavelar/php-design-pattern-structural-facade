<?php

namespace DesignPattern\Right;

interface Log
{
    public function save(string $info) : void;
}