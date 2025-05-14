<?php

namespace App\Helpers;

use App\Models\Product;
use Illuminate\Support\Facades\Cookie;

class CartManagement
{
    static public function addItemToCart($product_id)
    {
        $cart_items = self::getCartItemFromCookie();
        $existing_item = null;

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $key;
                break;
            }
        }

        if ($existing_item !== null) {
            $cart_items[$existing_item]['quantity']++;
            $cart_items[$existing_item]['total_amount'] = self::calculateItemTotal($cart_items[$existing_item]);
        } else {
            $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'images']);
            if ($product) {
                $cart_items[] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->images[0] ?? null,
                    'quantity' => 1,
                    'unit_amount' => $product->price,
                    'total_amount' => $product->price,
                ];
            }
        }

        self::addCartItemToCookie($cart_items);
        return count($cart_items);
    }

    // add item to cart with qty
    static public function addItemToCartWithQty($product_id, $qty = 1)
    {
        $cart_items = self::getCartItemFromCookie();
        $existing_item = null;

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $existing_item = $key;
                break;
            }
        }

        if ($existing_item !== null) {
            $cart_items[$existing_item]['quantity'] = $qty;
            $cart_items[$existing_item]['total_amount'] = self::calculateItemTotal($cart_items[$existing_item]);
        } else {
            $product = Product::where('id', $product_id)->first(['id', 'name', 'price', 'images']);
            if ($product) {
                $cart_items[] = [
                    'product_id' => $product->id,
                    'name' => $product->name,
                    'image' => $product->images[0] ?? null,
                    'quantity' => $qty,
                    'unit_amount' => $product->price,
                    'total_amount' => $product->price,
                ];
            }
        }

        self::addCartItemToCookie($cart_items);
        return count($cart_items);
    }

    static public function removeItemFromCart($product_id)
    {
        $cart_items = self::getCartItemFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                unset($cart_items[$key]);
                break;
            }
        }

        self::addCartItemToCookie($cart_items);
        return $cart_items;
    }

    static public function addCartItemToCookie($cart_items)
    {
        Cookie::queue('cart_items', json_encode($cart_items), 60 * 24 * 30);
    }

    static public function clearCartItem()
    {
        Cookie::queue(Cookie::forget('cart_items'));
    }

    static public function getCartItemFromCookie()
    {
        $cart_items = json_decode(Cookie::get('cart_items'), true);
        return is_array($cart_items) ? $cart_items : [];
    }

    static public function incrementItemQuantityToCartItem($product_id)
    {
        $cart_items = self::getCartItemFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                $cart_items[$key]['quantity']++;
                $cart_items[$key]['total_amount'] = self::calculateItemTotal($cart_items[$key]);
                break;
            }
        }

        self::addCartItemToCookie($cart_items);
        return $cart_items;
    }

    static public function decrementItemQuantityToCartItem($product_id)
    {
        $cart_items = self::getCartItemFromCookie();

        foreach ($cart_items as $key => $item) {
            if ($item['product_id'] == $product_id) {
                if ($cart_items[$key]['quantity'] > 1) {
                    $cart_items[$key]['quantity']--;
                    $cart_items[$key]['total_amount'] = self::calculateItemTotal($cart_items[$key]);
                }
                break;
            }
        }

        self::addCartItemToCookie($cart_items);
        return $cart_items;
    }

    static private function calculateItemTotal($item)
    {
        return $item['quantity'] * $item['unit_amount'];
    }

    static public function calculateGrandTotal($items)
    {
        if (!is_array($items)) {
            return 0;
        }

        return array_sum(array_column($items, 'total_amount'));
    }

}