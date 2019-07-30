<?php

namespace App;

use App\Element;

class GildedRose
{
    public static $inventory = [];

    public static function addProduct(Element\Base $element) {
        array_push(self::inventory, $element);
        return $element->uuid;
    }

    public static function findByName($name) {
        foreach(self::inventory as $product) {
            if ($product->name == $name) {
                return $product;
            }
        }
    }

    public static function tick(){
        foreach(self::inventory as $product) {
            $product->tick();
        }
    }

}
