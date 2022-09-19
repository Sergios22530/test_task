<?php

if (!function_exists('convertToNumberFormat')) {

    function convertToNumberFormat($value, $decimal = 2)
    {
        $value = preg_replace("/[^-0-9.]/", '', $value); // only digits and symbol .

        return number_format(bcdiv($value, 1, 3), $decimal);
    }

}
