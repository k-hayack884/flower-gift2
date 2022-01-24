<?php

namespace App\Constants;

class Common
{
    const PRODUCT_SELL='0';
    const PRODUCT_TRANSACTION='1';
    const PRODUCT_SOLD='2';
    
    const PRODUCT_LIST=[
        
        'sell'=>self::PRODUCT_SELL,
        'transaction'=>self::PRODUCT_TRANSACTION,
        'sold'=>self::PRODUCT_SOLD];
}
