<?php


namespace Assert;

abstract class Assert
{
    protected static $lazyAssertionExceptionClass = "\x41\163\163\x65\162\164\x5c\x4c\x61\x7a\x79\x41\x73\163\145\x72\x74\151\x6f\x6e\x45\x78\143\145\160\164\x69\x6f\156";
    protected static $assertionClass = "\101\163\163\145\x72\x74\134\x41\163\x73\x65\162\x74\151\157\156";
    public static function that($zw, $dx = null, $mi = null)
    {
        $ds = new AssertionChain($zw, $dx, $mi);
        return $ds->setAssertionClassName(static::$assertionClass);
    }
    public static function thatAll($Uj, $dx = null, $mi = null)
    {
        return static::that($Uj, $dx, $mi)->all();
    }
    public static function thatNullOr($zw, $dx = null, $mi = null)
    {
        return static::that($zw, $dx, $mi)->nullOr();
    }
    public static function lazy()
    {
        $v3 = new LazyAssertion();
        return $v3->setAssertClass(\get_called_class())->setExceptionClass(static::$lazyAssertionExceptionClass);
    }
}
