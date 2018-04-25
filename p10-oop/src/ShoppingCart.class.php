<?php
class ShoppingCart
{
    private $items = [];
    private $date = null;

    public function addItem(ShoppingCartItem $item){
        array_push($this->items, $item);
    }
    public function getItem(){
       return $this->items;
    }
    public function deleteItem($id){
        if(count($this->items) > $id-1){
            array_splice($this->items, $id-1, 1);
        }

    }
}