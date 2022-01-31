<?php

namespace App\Constants;

class Common
{
    const PRODUCT_SELL = '0';
    const PRODUCT_TRANSACTION = '1';
    const PRODUCT_SOLD = '2';

    const PRODUCT_LIST = [

        'sell' => self::PRODUCT_SELL,
        'transaction' => self::PRODUCT_TRANSACTION,
        'sold' => self::PRODUCT_SOLD
    ];

    const ORDER_LATER = '0';
    const ORDER_OLDER = '1';
    const ORDER_LIKE = '2';
    const ORDER_SELL = '3';

    const ORDER_LIST = [

        'later' => self::ORDER_LATER,
        'older' => self::ORDER_OLDER,
        'like' => self::ORDER_LIKE,
        'sell' => self::ORDER_SELL
    ];

    const TRADE_DIRECT = '0';
    const TRADE_PAYMENT = '1';
    const TRADE_PREPAYMENT = '2';

    const TRADE_LIST = [

        'direct' => self::TRADE_DIRECT,
        'payment' => self::TRADE_PAYMENT,
        'prepayment' => self::TRADE_PREPAYMENT,
    ];
}
