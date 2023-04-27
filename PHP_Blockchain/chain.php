<?php
class Chain
{

    private array $data;

    public function __construct()
    {
        $this->data = [];
    }

    public function getLastBlock(): ?Block
    {
        if(empty($this->data)){
            return '';
        }
        return $this->data[count($this->data)-1];
    }

    public function addBlock(Block $block)
    {
        $block->setId(count($this->data));
        $newHash = $block->generateHash(
            $this->getLastBlock() instanceof Block
            ? $this->getLastBlock()->getHash()
            : ''
        );
        $block-setHash($newHash);
        $this->data[] = $block;   
    }
}