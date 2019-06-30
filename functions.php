<?php

function sum($a, $b)
{
    return $a + $b;
}

function razn($a, $b)
{
    return $a - $b;
}

function division($a, $b)
{
    return ($b != 0) ? ($a / $b) : "Ошибка";
}

function multi($a, $b)
{
    return $a * $b;
}

function mathOperation($arg1, $arg2, $operation)
{
    switch ($operation) {
        case "+":
            return sum($arg1, $arg2);
            break;
        case "-":
            return razn($arg1, $arg2);
            break;
        case "*":
            return multi($arg1, $arg2);
            break;
        case "/":
            return division($arg1, $arg2);
            break;
    }
    return "Операция не определена...=(";
}
