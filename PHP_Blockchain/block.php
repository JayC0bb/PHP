<?php
class Block {
    private int $id
    private $value
    private $hash
}

public function __construct(string $value = '')
    $this->id = 0;
    $this->value = '';
    $this->hash = '';

function _setid($id):static
{
    $this->id = $id;
    return $this;
}
function _setvalue($id):string
{
    $this->value = $value;
    return $this;
}
function _sethash($id):static
{
    $this->hash = $hash;
    return $this;
}



function _getid()
{
    return $this->id;
}
function _getvalue()
{
    return $this->value;
}
function _gethash()
{
    return $this->hash;
}

public static function generateHash(string $previousHash):string
{
    return hash("SHA512", $this->id . $this->value . $previousHash)
}