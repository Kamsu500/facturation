<?php

function getPrice($priceInDecimals)
{
   $price=floatVal($priceInDecimals);

   return number_format($price,2,',','.');
}
