<?php

if (!function_exists('money')) {
    function money(float $value): string
    {
        return number_format($value, 2)."€";
    }
}
