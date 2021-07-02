<?php


namespace App\Models;


class Cart
{
    public $items;
    public $totalPrice;
    public $totalQuantity;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalPrice = $oldCart->totalPrice;
            $this->totalQuantity = $oldCart->totalQuantity;
        }
    }

    public function add($item, $id)
    {
        $storeItem = [
            'quantity' => 0,
            'price' => $item->unit_price,
            'item' => $item
        ];

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storeItem = $this->items[$id];
            }
        }
        $storeItem['quantity']++;
        $storeItem['price'] = $item->unit_price * $storeItem['quantity'];
        $this->items[$id] = $storeItem;
        $this->totalQuantity++;
        $this->totalPrice += $item->unit_price;
    }

    public function delete($ids)
    {
        if ($this->items) {
            $productsInCart = $this->items;
            for ($i = 0; $i < count($ids); $i++) {
                if (array_key_exists($ids[$i], $productsInCart)) {
                    $priceDelete = $productsInCart[$ids[$i]]['price'];
                    $this->totalPrice -= $priceDelete;
                    $this->totalQuantity -= $productsInCart[$ids[$i]]['quantity'];
                    unset($productsInCart[$ids[$i]]);
                    $this->items = $productsInCart;
                }
            }
        } else {
            $this->totalQuantity = 0;
        }
    }

    public function update($id, $amount)
    {
        if ($this->items) {
            $productInCart = $this->items;
            if (array_key_exists($id, $productInCart)) {
                $quantityUpdate = $amount - $productInCart[$id]['quantity'];
                $this->totalQuantity += $quantityUpdate;
                $priceUpdate = $productInCart[$id]['item']->unit_price * $amount - $productInCart[$id]['price'];
                $this->totalPrice += $priceUpdate;
                $productInCart[$id]['quantity'] = $amount;
                $productInCart[$id]['price'] = $productInCart[$id]['item']->unit_price * $amount;
                $this->items = $productInCart;
            }
        }
    }
}

