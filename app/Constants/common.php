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

    const ORDER_LIST = [

        'later' => self::PRODUCT_LATER,
        'older' => self::PRODUCT_OLDER,
        'like' => self::PRODUCT_LIKE
    ];
}
