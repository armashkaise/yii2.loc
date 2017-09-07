<?php
/**
 * Created by PhpStorm.
 * User: Карткужаков Арман
 * Date: 04.09.2017
 * Time: 16:47
 */

namespace app\models;

use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{

    public function addToCart($product, $qty = 1){
        if (isset($_SESSION['cart'][$product->id])){//если в сессии есть такой товар
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        } else {//если такого товара раньше не было
            $_SESSION['cart'][$product->id] = [
                    'qty' => $qty,
                    'name' => $product->name,
                    'price' => $product->price,
                    'img' => $product->img
                ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;

    }

    public function recalc($id){
        if (!isset($_SESSION['cart'][$id])) return false;
        $qtyMinus = $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty']*$_SESSION['cart'][$id]['price'];

        $_SESSION['cart.qty'] -= $qtyMinus;
        $_SESSION['cart.sum'] -= $sumMinus;
        unset($_SESSION['cart'][$id]);
    }

}