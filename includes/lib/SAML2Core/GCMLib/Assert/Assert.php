<?php


namespace Assert;

abstract class Assert
{
    protected static $lazyAssertionExceptionClass = "\101\x73\x73\145\x72\164\134\x4c\141\x7a\171\x41\x73\163\x65\x72\x74\x69\157\x6e\105\170\143\x65\160\164\151\157\x6e";
    protected static $assertionClass = "\x41\x73\x73\x65\162\164\x5c\101\163\x73\145\162\164\x69\157\156";
    public static function that($DE, $K3 = null, $hG = null)
    {
        $IE = new AssertionChain($DE, $K3, $hG);
        return $IE->setAssertionClassName(static::$assertionClass);
    }
    public static function thatAll($XV, $K3 = null, $hG = null)
    {
        return static::that($XV, $K3, $hG)->all();
    }
    public static function thatNullOr($DE, $K3 = null, $hG = null)
    {
        return static::that($DE, $K3, $hG)->nullOr();
    }
    public static function lazy()
    {
        $tE = new LazyAssertion();
        return $tE->setAssertClass(\get_called_class())->setExceptionClass(static::$lazyAssertionExceptionClass);
    }
}
