<?php


namespace Assert;

abstract class Assert
{
    protected static $lazyAssertionExceptionClass = "\101\163\x73\x65\x72\164\x5c\114\141\x7a\x79\x41\163\x73\x65\x72\x74\x69\x6f\156\x45\170\143\145\x70\164\151\157\x6e";
    protected static $assertionClass = "\x41\163\x73\145\162\164\x5c\x41\163\163\x65\x72\164\x69\157\156";
    public static function that($Iy, $cx = null, $Oi = null)
    {
        $zY = new AssertionChain($Iy, $cx, $Oi);
        return $zY->setAssertionClassName(static::$assertionClass);
    }
    public static function thatAll($o0, $cx = null, $Oi = null)
    {
        return static::that($o0, $cx, $Oi)->all();
    }
    public static function thatNullOr($Iy, $cx = null, $Oi = null)
    {
        return static::that($Iy, $cx, $Oi)->nullOr();
    }
    public static function lazy()
    {
        $rA = new LazyAssertion();
        return $rA->setAssertClass(\get_called_class())->setExceptionClass(static::$lazyAssertionExceptionClass);
    }
}
