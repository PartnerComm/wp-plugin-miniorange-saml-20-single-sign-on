<?php


namespace Assert;

use BadMethodCallException;
class Assertion
{
    const INVALID_FLOAT = 9;
    const INVALID_INTEGER = 10;
    const INVALID_DIGIT = 11;
    const INVALID_INTEGERISH = 12;
    const INVALID_BOOLEAN = 13;
    const VALUE_EMPTY = 14;
    const VALUE_NULL = 15;
    const VALUE_NOT_NULL = 25;
    const INVALID_STRING = 16;
    const INVALID_REGEX = 17;
    const INVALID_MIN_LENGTH = 18;
    const INVALID_MAX_LENGTH = 19;
    const INVALID_STRING_START = 20;
    const INVALID_STRING_CONTAINS = 21;
    const INVALID_CHOICE = 22;
    const INVALID_NUMERIC = 23;
    const INVALID_ARRAY = 24;
    const INVALID_KEY_EXISTS = 26;
    const INVALID_NOT_BLANK = 27;
    const INVALID_INSTANCE_OF = 28;
    const INVALID_SUBCLASS_OF = 29;
    const INVALID_RANGE = 30;
    const INVALID_ALNUM = 31;
    const INVALID_TRUE = 32;
    const INVALID_EQ = 33;
    const INVALID_SAME = 34;
    const INVALID_MIN = 35;
    const INVALID_MAX = 36;
    const INVALID_LENGTH = 37;
    const INVALID_FALSE = 38;
    const INVALID_STRING_END = 39;
    const INVALID_UUID = 40;
    const INVALID_COUNT = 41;
    const INVALID_NOT_EQ = 42;
    const INVALID_NOT_SAME = 43;
    const INVALID_TRAVERSABLE = 44;
    const INVALID_ARRAY_ACCESSIBLE = 45;
    const INVALID_KEY_ISSET = 46;
    const INVALID_VALUE_IN_ARRAY = 47;
    const INVALID_E164 = 48;
    const INVALID_BASE64 = 49;
    const INVALID_DIRECTORY = 101;
    const INVALID_FILE = 102;
    const INVALID_READABLE = 103;
    const INVALID_WRITEABLE = 104;
    const INVALID_CLASS = 105;
    const INVALID_INTERFACE = 106;
    const INVALID_EMAIL = 201;
    const INTERFACE_NOT_IMPLEMENTED = 202;
    const INVALID_URL = 203;
    const INVALID_NOT_INSTANCE_OF = 204;
    const VALUE_NOT_EMPTY = 205;
    const INVALID_JSON_STRING = 206;
    const INVALID_OBJECT = 207;
    const INVALID_METHOD = 208;
    const INVALID_SCALAR = 209;
    const INVALID_LESS = 210;
    const INVALID_LESS_OR_EQUAL = 211;
    const INVALID_GREATER = 212;
    const INVALID_GREATER_OR_EQUAL = 213;
    const INVALID_DATE = 214;
    const INVALID_CALLABLE = 215;
    const INVALID_KEY_NOT_EXISTS = 216;
    const INVALID_SATISFY = 217;
    const INVALID_IP = 218;
    const INVALID_BETWEEN = 219;
    const INVALID_BETWEEN_EXCLUSIVE = 220;
    const INVALID_EXTENSION = 222;
    const INVALID_CONSTANT = 221;
    const INVALID_VERSION = 223;
    const INVALID_PROPERTY = 224;
    const INVALID_RESOURCE = 225;
    protected static $exceptionClass = "\101\x73\x73\145\162\164\x5c\111\156\x76\141\154\x69\144\x41\x72\x67\x75\x6d\145\156\164\x45\170\143\x65\x70\x74\x69\157\156";
    protected static function createException($Iy, $Nr, $ug, $m7 = null, array $uU = array())
    {
        $ES = static::$exceptionClass;
        return new $ES($Nr, $ug, $m7, $Iy, $uU);
    }
    public static function eq($Iy, $ho, $Nr = null, $m7 = null)
    {
        if (!($Iy != $ho)) {
            goto T9;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\x61\x6c\165\145\40\x22\x25\x73\x22\40\144\x6f\145\x73\40\x6e\x6f\x74\40\145\x71\165\x61\154\40\145\x78\x70\145\x63\x74\145\144\x20\x76\x61\x6c\x75\145\x20\x22\45\x73\x22\x2e"), static::stringify($Iy), static::stringify($ho));
        throw static::createException($Iy, $Nr, static::INVALID_EQ, $m7, array("\x65\x78\x70\145\x63\x74\x65\x64" => $ho));
        T9:
        return true;
    }
    public static function same($Iy, $ho, $Nr = null, $m7 = null)
    {
        if (!($Iy !== $ho)) {
            goto wC;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\141\154\165\145\x20\x22\45\x73\x22\x20\x69\x73\40\x6e\x6f\164\40\164\150\145\x20\163\x61\155\x65\40\141\x73\40\145\170\x70\x65\143\x74\145\x64\40\x76\141\154\165\145\40\42\x25\163\x22\x2e"), static::stringify($Iy), static::stringify($ho));
        throw static::createException($Iy, $Nr, static::INVALID_SAME, $m7, array("\145\x78\x70\145\x63\164\x65\144" => $ho));
        wC:
        return true;
    }
    public static function notEq($BC, $ho, $Nr = null, $m7 = null)
    {
        if (!($BC == $ho)) {
            goto V1;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\141\x6c\x75\145\x20\x22\45\x73\x22\x20\151\163\40\145\x71\x75\141\154\40\x74\x6f\x20\x65\x78\x70\x65\143\x74\x65\x64\x20\166\x61\154\x75\x65\x20\x22\45\163\42\56"), static::stringify($BC), static::stringify($ho));
        throw static::createException($BC, $Nr, static::INVALID_NOT_EQ, $m7, array("\x65\170\160\x65\143\x74\145\x64" => $ho));
        V1:
        return true;
    }
    public static function notSame($BC, $ho, $Nr = null, $m7 = null)
    {
        if (!($BC === $ho)) {
            goto W5;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\x61\x6c\x75\145\x20\42\x25\x73\x22\40\151\x73\x20\x74\150\x65\x20\x73\141\155\145\40\x61\163\40\145\x78\x70\145\x63\x74\x65\x64\x20\166\141\x6c\x75\145\x20\x22\x25\x73\42\56"), static::stringify($BC), static::stringify($ho));
        throw static::createException($BC, $Nr, static::INVALID_NOT_SAME, $m7, array("\145\x78\x70\x65\x63\x74\x65\x64" => $ho));
        W5:
        return true;
    }
    public static function notInArray($Iy, array $hO, $Nr = null, $m7 = null)
    {
        if (!(true === \in_array($Iy, $hO))) {
            goto rx;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\141\154\165\145\40\x22\45\163\42\x20\151\x73\40\151\156\40\147\151\x76\145\156\x20\x22\x25\x73\42\x2e"), static::stringify($Iy), static::stringify($hO));
        throw static::createException($Iy, $Nr, static::INVALID_VALUE_IN_ARRAY, $m7, array("\143\150\157\151\143\x65\x73" => $hO));
        rx:
        return true;
    }
    public static function integer($Iy, $Nr = null, $m7 = null)
    {
        if (\is_int($Iy)) {
            goto mD;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\141\x6c\x75\145\40\x22\45\x73\42\40\x69\x73\x20\x6e\x6f\x74\40\141\156\x20\x69\x6e\164\x65\147\x65\x72\x2e"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_INTEGER, $m7);
        mD:
        return true;
    }
    public static function float($Iy, $Nr = null, $m7 = null)
    {
        if (\is_float($Iy)) {
            goto AA;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\x61\154\165\145\40\x22\45\x73\x22\40\x69\163\x20\x6e\x6f\164\x20\x61\40\146\x6c\x6f\141\164\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_FLOAT, $m7);
        AA:
        return true;
    }
    public static function digit($Iy, $Nr = null, $m7 = null)
    {
        if (\ctype_digit((string) $Iy)) {
            goto Vi;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\141\x6c\165\x65\40\x22\45\163\42\40\x69\x73\40\156\x6f\164\x20\x61\40\x64\x69\x67\x69\x74\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_DIGIT, $m7);
        Vi:
        return true;
    }
    public static function integerish($Iy, $Nr = null, $m7 = null)
    {
        if (!(\is_resource($Iy) || \is_object($Iy) || \is_bool($Iy) || \is_null($Iy) || \is_array($Iy) || \is_string($Iy) && '' == $Iy || \strval(\intval($Iy)) !== \strval($Iy) && \strval(\intval($Iy)) !== \strval(\ltrim($Iy, "\x30")) && '' !== \strval(\intval($Iy)) && '' !== \strval(\ltrim($Iy, "\60")))) {
            goto jw;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\141\x6c\165\x65\x20\x22\45\163\42\40\x69\x73\x20\156\157\x74\x20\x61\156\x20\151\x6e\164\145\147\145\162\40\x6f\x72\x20\x61\40\156\165\155\142\x65\162\x20\x63\141\163\x74\141\142\154\145\x20\164\157\40\x69\156\x74\145\147\145\x72\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_INTEGERISH, $m7);
        jw:
        return true;
    }
    public static function boolean($Iy, $Nr = null, $m7 = null)
    {
        if (\is_bool($Iy)) {
            goto RT;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\x61\154\x75\x65\40\x22\45\163\x22\x20\x69\163\40\x6e\157\x74\x20\x61\x20\x62\x6f\x6f\x6c\x65\x61\156\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_BOOLEAN, $m7);
        RT:
        return true;
    }
    public static function scalar($Iy, $Nr = null, $m7 = null)
    {
        if (\is_scalar($Iy)) {
            goto sd;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\141\x6c\165\145\40\42\x25\163\x22\x20\x69\x73\40\x6e\x6f\x74\40\x61\40\163\143\x61\154\141\x72\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_SCALAR, $m7);
        sd:
        return true;
    }
    public static function notEmpty($Iy, $Nr = null, $m7 = null)
    {
        if (!empty($Iy)) {
            goto Xz;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\141\x6c\x75\x65\40\x22\x25\x73\x22\40\x69\x73\x20\x65\155\x70\x74\x79\54\40\142\165\164\40\156\x6f\x6e\x20\x65\x6d\160\x74\x79\x20\x76\141\154\x75\x65\x20\x77\141\163\40\x65\170\160\145\143\164\145\144\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::VALUE_EMPTY, $m7);
        Xz:
        return true;
    }
    public static function noContent($Iy, $Nr = null, $m7 = null)
    {
        if (empty($Iy)) {
            goto G_;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\x61\154\165\145\40\42\45\163\x22\x20\x69\163\x20\156\157\x74\40\x65\155\x70\164\x79\x2c\x20\x62\165\164\x20\x65\155\x70\164\171\40\x76\x61\154\x75\x65\40\167\141\163\40\x65\170\x70\x65\x63\x74\x65\144\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::VALUE_NOT_EMPTY, $m7);
        G_:
        return true;
    }
    public static function null($Iy, $Nr = null, $m7 = null)
    {
        if (!(null !== $Iy)) {
            goto wd;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\141\154\165\x65\40\42\x25\x73\42\x20\151\163\40\x6e\x6f\x74\x20\x6e\165\154\x6c\54\x20\142\x75\x74\x20\156\165\154\x6c\40\x76\x61\x6c\165\145\40\167\x61\x73\40\145\x78\x70\x65\143\x74\145\x64\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::VALUE_NOT_NULL, $m7);
        wd:
        return true;
    }
    public static function notNull($Iy, $Nr = null, $m7 = null)
    {
        if (!(null === $Iy)) {
            goto WY;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\x61\154\165\145\x20\x22\45\163\x22\x20\x69\x73\40\156\165\154\154\x2c\40\142\x75\x74\x20\156\x6f\156\40\x6e\165\x6c\x6c\40\x76\141\x6c\x75\145\x20\x77\141\163\40\145\x78\160\145\x63\164\145\x64\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::VALUE_NULL, $m7);
        WY:
        return true;
    }
    public static function string($Iy, $Nr = null, $m7 = null)
    {
        if (\is_string($Iy)) {
            goto e23;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\141\x6c\165\145\x20\x22\45\x73\42\x20\145\170\x70\145\143\x74\x65\x64\40\x74\x6f\x20\x62\x65\40\163\164\x72\x69\x6e\x67\54\x20\x74\x79\x70\145\40\x25\163\x20\147\x69\166\145\x6e\x2e"), static::stringify($Iy), \gettype($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_STRING, $m7);
        e23:
        return true;
    }
    public static function regex($Iy, $I0, $Nr = null, $m7 = null)
    {
        static::string($Iy, $Nr, $m7);
        if (\preg_match($I0, $Iy)) {
            goto aXq;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\x61\154\165\145\40\x22\x25\x73\42\40\144\157\x65\x73\x20\x6e\157\x74\40\155\x61\x74\x63\150\40\x65\170\160\x72\145\163\x73\151\x6f\156\x2e"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_REGEX, $m7, array("\160\x61\x74\164\x65\162\x6e" => $I0));
        aXq:
        return true;
    }
    public static function length($Iy, $oE, $Nr = null, $m7 = null, $E3 = "\165\x74\146\x38")
    {
        static::string($Iy, $Nr, $m7);
        if (!(\mb_strlen($Iy, $E3) !== $oE)) {
            goto w8u;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\x61\x6c\165\x65\x20\x22\45\163\42\x20\150\x61\x73\40\x74\x6f\x20\x62\145\x20\x25\x64\40\x65\x78\141\x63\x74\154\x79\40\x63\x68\141\x72\x61\143\x74\145\x72\x73\x20\154\x6f\156\147\54\x20\x62\x75\x74\x20\154\x65\156\147\x74\x68\x20\x69\x73\x20\45\144\x2e"), static::stringify($Iy), $oE, \mb_strlen($Iy, $E3));
        throw static::createException($Iy, $Nr, static::INVALID_LENGTH, $m7, array("\x6c\145\156\147\x74\x68" => $oE, "\145\x6e\143\x6f\144\151\156\147" => $E3));
        w8u:
        return true;
    }
    public static function minLength($Iy, $l8, $Nr = null, $m7 = null, $E3 = "\x75\164\146\x38")
    {
        static::string($Iy, $Nr, $m7);
        if (!(\mb_strlen($Iy, $E3) < $l8)) {
            goto FuR;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\x61\x6c\165\145\40\x22\x25\163\x22\x20\x69\x73\40\164\157\x6f\40\163\x68\157\x72\x74\54\40\151\x74\40\x73\x68\157\x75\x6c\x64\x20\x68\x61\166\x65\40\x61\x74\40\x6c\145\141\163\x74\x20\45\144\x20\x63\x68\141\162\141\143\x74\x65\162\163\x2c\40\142\x75\x74\x20\157\156\x6c\171\x20\150\141\x73\x20\45\144\x20\x63\150\x61\162\x61\x63\164\145\x72\163\56"), static::stringify($Iy), $l8, \mb_strlen($Iy, $E3));
        throw static::createException($Iy, $Nr, static::INVALID_MIN_LENGTH, $m7, array("\x6d\x69\156\x5f\154\x65\x6e\147\164\x68" => $l8, "\x65\x6e\143\x6f\x64\151\156\147" => $E3));
        FuR:
        return true;
    }
    public static function maxLength($Iy, $OC, $Nr = null, $m7 = null, $E3 = "\x75\x74\x66\70")
    {
        static::string($Iy, $Nr, $m7);
        if (!(\mb_strlen($Iy, $E3) > $OC)) {
            goto IIS;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\x61\154\165\145\40\x22\x25\x73\42\40\151\163\40\x74\x6f\x6f\x20\154\157\156\147\x2c\x20\x69\x74\x20\x73\150\157\x75\x6c\x64\40\150\141\166\145\x20\156\157\40\155\x6f\162\x65\40\164\x68\141\x6e\x20\x25\x64\40\143\150\x61\162\141\x63\x74\145\162\163\x2c\40\142\165\164\40\x68\x61\163\40\45\144\40\143\150\x61\x72\x61\143\x74\x65\162\163\56"), static::stringify($Iy), $OC, \mb_strlen($Iy, $E3));
        throw static::createException($Iy, $Nr, static::INVALID_MAX_LENGTH, $m7, array("\x6d\141\x78\x5f\154\145\156\x67\164\x68" => $OC, "\145\156\143\x6f\144\x69\156\x67" => $E3));
        IIS:
        return true;
    }
    public static function betweenLength($Iy, $l8, $OC, $Nr = null, $m7 = null, $E3 = "\165\164\x66\x38")
    {
        static::string($Iy, $Nr, $m7);
        static::minLength($Iy, $l8, $Nr, $m7, $E3);
        static::maxLength($Iy, $OC, $Nr, $m7, $E3);
        return true;
    }
    public static function startsWith($cV, $i0, $Nr = null, $m7 = null, $E3 = "\x75\164\x66\70")
    {
        static::string($cV, $Nr, $m7);
        if (!(0 !== \mb_strpos($cV, $i0, null, $E3))) {
            goto T12;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\141\154\x75\x65\40\x22\45\x73\42\x20\144\x6f\145\163\x20\156\x6f\x74\x20\x73\164\x61\162\164\40\167\151\164\150\40\42\45\x73\42\x2e"), static::stringify($cV), static::stringify($i0));
        throw static::createException($cV, $Nr, static::INVALID_STRING_START, $m7, array("\156\x65\x65\144\x6c\145" => $i0, "\x65\x6e\x63\157\x64\x69\x6e\x67" => $E3));
        T12:
        return true;
    }
    public static function endsWith($cV, $i0, $Nr = null, $m7 = null, $E3 = "\165\164\x66\x38")
    {
        static::string($cV, $Nr, $m7);
        $KN = \mb_strlen($cV, $E3) - \mb_strlen($i0, $E3);
        if (!(\mb_strripos($cV, $i0, null, $E3) !== $KN)) {
            goto aEN;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\141\154\x75\x65\40\x22\45\x73\42\x20\144\x6f\145\163\x20\156\157\x74\x20\x65\156\144\x20\167\x69\164\150\40\x22\45\x73\42\x2e"), static::stringify($cV), static::stringify($i0));
        throw static::createException($cV, $Nr, static::INVALID_STRING_END, $m7, array("\156\145\145\x64\x6c\145" => $i0, "\145\156\x63\x6f\144\x69\x6e\x67" => $E3));
        aEN:
        return true;
    }
    public static function contains($cV, $i0, $Nr = null, $m7 = null, $E3 = "\165\x74\x66\70")
    {
        static::string($cV, $Nr, $m7);
        if (!(false === \mb_strpos($cV, $i0, null, $E3))) {
            goto m41;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\141\x6c\165\x65\x20\x22\45\x73\x22\40\144\x6f\145\163\40\x6e\x6f\164\x20\x63\x6f\156\x74\x61\151\156\x20\x22\45\x73\x22\56"), static::stringify($cV), static::stringify($i0));
        throw static::createException($cV, $Nr, static::INVALID_STRING_CONTAINS, $m7, array("\156\145\145\x64\154\x65" => $i0, "\x65\156\x63\157\x64\x69\156\147" => $E3));
        m41:
        return true;
    }
    public static function choice($Iy, array $hO, $Nr = null, $m7 = null)
    {
        if (\in_array($Iy, $hO, true)) {
            goto jSK;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\141\x6c\x75\145\40\42\x25\x73\x22\40\151\x73\40\156\x6f\x74\40\141\x6e\40\x65\154\x65\x6d\145\156\x74\x20\157\146\x20\x74\150\x65\40\166\141\x6c\151\144\40\166\x61\x6c\165\x65\x73\x3a\x20\45\163"), static::stringify($Iy), \implode("\54\40", \array_map(array(\get_called_class(), "\x73\x74\x72\x69\156\147\x69\x66\x79"), $hO)));
        throw static::createException($Iy, $Nr, static::INVALID_CHOICE, $m7, array("\x63\x68\157\151\x63\x65\x73" => $hO));
        jSK:
        return true;
    }
    public static function inArray($Iy, array $hO, $Nr = null, $m7 = null)
    {
        return static::choice($Iy, $hO, $Nr, $m7);
    }
    public static function numeric($Iy, $Nr = null, $m7 = null)
    {
        if (\is_numeric($Iy)) {
            goto mEB;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\141\x6c\165\x65\40\42\45\x73\x22\x20\x69\163\x20\156\157\x74\x20\x6e\165\x6d\x65\162\x69\143\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_NUMERIC, $m7);
        mEB:
        return true;
    }
    public static function isResource($Iy, $Nr = null, $m7 = null)
    {
        if (\is_resource($Iy)) {
            goto rgN;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\141\154\165\145\x20\42\x25\163\42\40\151\163\x20\156\157\164\x20\x61\40\x72\145\x73\157\x75\162\x63\145\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_RESOURCE, $m7);
        rgN:
        return true;
    }
    public static function isArray($Iy, $Nr = null, $m7 = null)
    {
        if (\is_array($Iy)) {
            goto rh_;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\x61\x6c\165\145\x20\x22\x25\x73\42\x20\151\163\40\156\x6f\x74\x20\x61\156\x20\141\162\x72\141\171\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_ARRAY, $m7);
        rh_:
        return true;
    }
    public static function isTraversable($Iy, $Nr = null, $m7 = null)
    {
        if (!(!\is_array($Iy) && !$Iy instanceof \Traversable)) {
            goto pLi;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\x61\x6c\x75\145\x20\x22\x25\x73\x22\40\151\x73\x20\156\157\x74\x20\x61\156\40\x61\162\x72\x61\x79\x20\x61\x6e\x64\40\x64\x6f\x65\x73\40\156\157\x74\x20\151\x6d\160\x6c\145\155\145\x6e\x74\40\124\162\141\166\145\162\x73\x61\x62\x6c\145\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_TRAVERSABLE, $m7);
        pLi:
        return true;
    }
    public static function isArrayAccessible($Iy, $Nr = null, $m7 = null)
    {
        if (!(!\is_array($Iy) && !$Iy instanceof \ArrayAccess)) {
            goto lBs;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\x61\x6c\165\x65\x20\x22\45\x73\x22\40\x69\163\40\156\157\x74\40\141\156\40\141\162\162\x61\171\x20\141\156\x64\x20\x64\157\145\163\40\x6e\x6f\x74\x20\x69\x6d\160\154\x65\155\x65\156\x74\x20\x41\162\162\x61\171\x41\x63\143\x65\x73\x73\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_ARRAY_ACCESSIBLE, $m7);
        lBs:
        return true;
    }
    public static function keyExists($Iy, $Kn, $Nr = null, $m7 = null)
    {
        static::isArray($Iy, $Nr, $m7);
        if (\array_key_exists($Kn, $Iy)) {
            goto SRJ;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x41\162\162\x61\171\40\144\157\x65\x73\40\x6e\x6f\x74\x20\x63\157\x6e\164\141\151\x6e\40\141\156\40\x65\x6c\145\x6d\x65\156\164\x20\x77\151\x74\150\x20\153\145\x79\x20\42\45\163\x22"), static::stringify($Kn));
        throw static::createException($Iy, $Nr, static::INVALID_KEY_EXISTS, $m7, array("\153\145\x79" => $Kn));
        SRJ:
        return true;
    }
    public static function keyNotExists($Iy, $Kn, $Nr = null, $m7 = null)
    {
        static::isArray($Iy, $Nr, $m7);
        if (!\array_key_exists($Kn, $Iy)) {
            goto Khy;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x41\162\x72\141\x79\40\143\x6f\156\164\x61\x69\156\x73\x20\141\156\x20\x65\x6c\x65\155\145\x6e\164\x20\167\x69\x74\150\x20\153\145\x79\x20\42\x25\163\x22"), static::stringify($Kn));
        throw static::createException($Iy, $Nr, static::INVALID_KEY_NOT_EXISTS, $m7, array("\153\145\x79" => $Kn));
        Khy:
        return true;
    }
    public static function keyIsset($Iy, $Kn, $Nr = null, $m7 = null)
    {
        static::isArrayAccessible($Iy, $Nr, $m7);
        if (isset($Iy[$Kn])) {
            goto QHX;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\124\x68\145\40\x65\x6c\145\155\145\x6e\x74\x20\x77\x69\164\x68\40\153\145\171\x20\x22\x25\x73\42\40\167\x61\163\40\x6e\x6f\x74\x20\x66\157\x75\x6e\144"), static::stringify($Kn));
        throw static::createException($Iy, $Nr, static::INVALID_KEY_ISSET, $m7, array("\153\145\171" => $Kn));
        QHX:
        return true;
    }
    public static function notEmptyKey($Iy, $Kn, $Nr = null, $m7 = null)
    {
        static::keyIsset($Iy, $Kn, $Nr, $m7);
        static::notEmpty($Iy[$Kn], $Nr, $m7);
        return true;
    }
    public static function notBlank($Iy, $Nr = null, $m7 = null)
    {
        if (!(false === $Iy || empty($Iy) && "\x30" != $Iy || \is_string($Iy) && '' === \trim($Iy))) {
            goto p50;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\141\x6c\165\x65\40\x22\45\163\42\40\x69\163\x20\x62\154\x61\156\153\x2c\x20\142\165\164\40\167\x61\x73\x20\x65\x78\160\145\143\164\145\144\x20\x74\157\x20\143\157\x6e\164\x61\x69\156\40\141\x20\x76\x61\154\x75\x65\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_NOT_BLANK, $m7);
        p50:
        return true;
    }
    public static function isInstanceOf($Iy, $ai, $Nr = null, $m7 = null)
    {
        if ($Iy instanceof $ai) {
            goto NKU;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x43\x6c\141\x73\163\x20\42\x25\163\42\x20\167\x61\163\x20\x65\x78\x70\x65\143\164\x65\144\40\164\157\x20\142\x65\x20\x69\x6e\x73\x74\141\156\x63\x65\x6f\x66\40\x6f\146\40\x22\x25\163\42\40\142\x75\164\x20\x69\x73\40\156\157\164\x2e"), static::stringify($Iy), $ai);
        throw static::createException($Iy, $Nr, static::INVALID_INSTANCE_OF, $m7, array("\x63\154\141\163\x73" => $ai));
        NKU:
        return true;
    }
    public static function notIsInstanceOf($Iy, $ai, $Nr = null, $m7 = null)
    {
        if (!$Iy instanceof $ai) {
            goto mDS;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x43\x6c\141\163\163\x20\42\x25\x73\42\40\167\141\163\40\156\x6f\164\40\145\170\x70\145\x63\164\145\x64\40\164\157\x20\142\x65\40\151\156\163\164\141\x6e\x63\145\x6f\x66\40\157\x66\x20\x22\x25\163\x22\x2e"), static::stringify($Iy), $ai);
        throw static::createException($Iy, $Nr, static::INVALID_NOT_INSTANCE_OF, $m7, array("\143\x6c\x61\163\163" => $ai));
        mDS:
        return true;
    }
    public static function subclassOf($Iy, $ai, $Nr = null, $m7 = null)
    {
        if (\is_subclass_of($Iy, $ai)) {
            goto KnO;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\103\154\x61\163\x73\x20\42\45\163\x22\x20\x77\x61\163\x20\x65\170\x70\x65\x63\x74\x65\x64\40\164\x6f\40\x62\x65\40\x73\x75\x62\x63\154\141\163\163\x20\x6f\146\40\x22\x25\163\42\56"), static::stringify($Iy), $ai);
        throw static::createException($Iy, $Nr, static::INVALID_SUBCLASS_OF, $m7, array("\x63\x6c\x61\163\x73" => $ai));
        KnO:
        return true;
    }
    public static function range($Iy, $N7, $mk, $Nr = null, $m7 = null)
    {
        static::numeric($Iy, $Nr, $m7);
        if (!($Iy < $N7 || $Iy > $mk)) {
            goto yAa;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x4e\x75\x6d\142\x65\x72\40\x22\45\x73\42\40\167\141\x73\40\x65\x78\x70\x65\143\x74\x65\144\x20\164\157\x20\x62\x65\40\x61\164\x20\x6c\x65\x61\163\164\40\x22\x25\x64\x22\40\x61\156\x64\x20\141\x74\40\155\x6f\163\164\40\x22\45\x64\x22\56"), static::stringify($Iy), static::stringify($N7), static::stringify($mk));
        throw static::createException($Iy, $Nr, static::INVALID_RANGE, $m7, array("\x6d\151\156" => $N7, "\155\x61\x78" => $mk));
        yAa:
        return true;
    }
    public static function min($Iy, $N7, $Nr = null, $m7 = null)
    {
        static::numeric($Iy, $Nr, $m7);
        if (!($Iy < $N7)) {
            goto TMG;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\116\165\x6d\x62\145\x72\x20\x22\45\163\42\x20\x77\141\163\40\145\x78\x70\145\x63\x74\145\x64\40\x74\157\40\x62\145\x20\141\164\40\154\x65\x61\163\x74\x20\42\45\x73\x22\x2e"), static::stringify($Iy), static::stringify($N7));
        throw static::createException($Iy, $Nr, static::INVALID_MIN, $m7, array("\155\151\156" => $N7));
        TMG:
        return true;
    }
    public static function max($Iy, $mk, $Nr = null, $m7 = null)
    {
        static::numeric($Iy, $Nr, $m7);
        if (!($Iy > $mk)) {
            goto r89;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x4e\165\x6d\142\145\x72\x20\x22\x25\163\42\x20\167\141\163\x20\145\x78\160\x65\x63\x74\145\x64\40\164\x6f\40\142\145\40\141\x74\40\155\157\x73\x74\x20\x22\x25\163\42\x2e"), static::stringify($Iy), static::stringify($mk));
        throw static::createException($Iy, $Nr, static::INVALID_MAX, $m7, array("\x6d\x61\x78" => $mk));
        r89:
        return true;
    }
    public static function file($Iy, $Nr = null, $m7 = null)
    {
        static::string($Iy, $Nr, $m7);
        static::notEmpty($Iy, $Nr, $m7);
        if (\is_file($Iy)) {
            goto l20;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\106\x69\154\145\x20\42\x25\163\x22\40\x77\x61\163\40\x65\x78\160\x65\x63\x74\x65\144\40\x74\x6f\x20\x65\x78\151\x73\x74\x2e"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_FILE, $m7);
        l20:
        return true;
    }
    public static function directory($Iy, $Nr = null, $m7 = null)
    {
        static::string($Iy, $Nr, $m7);
        if (\is_dir($Iy)) {
            goto cqJ;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\120\141\x74\x68\40\x22\45\x73\x22\40\x77\x61\x73\40\x65\x78\x70\145\x63\x74\145\144\40\x74\157\40\142\x65\40\x61\x20\x64\151\x72\145\143\164\x6f\x72\171\x2e"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_DIRECTORY, $m7);
        cqJ:
        return true;
    }
    public static function readable($Iy, $Nr = null, $m7 = null)
    {
        static::string($Iy, $Nr, $m7);
        if (\is_readable($Iy)) {
            goto QqU;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\120\141\x74\x68\40\x22\x25\163\x22\x20\167\141\x73\40\145\x78\160\145\143\x74\145\144\x20\164\x6f\x20\142\145\40\x72\x65\x61\x64\141\142\x6c\x65\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_READABLE, $m7);
        QqU:
        return true;
    }
    public static function writeable($Iy, $Nr = null, $m7 = null)
    {
        static::string($Iy, $Nr, $m7);
        if (\is_writable($Iy)) {
            goto i3P;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x50\141\x74\150\x20\42\45\x73\42\x20\x77\141\x73\x20\x65\x78\160\145\x63\x74\x65\x64\40\164\157\x20\x62\x65\x20\167\162\x69\164\x65\x61\142\154\x65\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_WRITEABLE, $m7);
        i3P:
        return true;
    }
    public static function email($Iy, $Nr = null, $m7 = null)
    {
        static::string($Iy, $Nr, $m7);
        if (!\filter_var($Iy, FILTER_VALIDATE_EMAIL)) {
            goto op3;
        }
        $Cz = \substr($Iy, \strpos($Iy, "\100") + 1);
        if (!(\version_compare(PHP_VERSION, "\x35\56\x33\56\63", "\74") && false === \strpos($Cz, "\x2e"))) {
            goto Dyy;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\x61\x6c\165\145\x20\x22\x25\x73\42\x20\167\141\163\x20\x65\x78\x70\x65\x63\164\x65\144\40\164\x6f\40\142\x65\x20\141\40\x76\x61\154\151\x64\40\x65\x2d\x6d\141\151\154\40\141\144\144\x72\145\x73\x73\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_EMAIL, $m7);
        Dyy:
        goto BnK;
        op3:
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\x61\154\165\145\x20\x22\x25\163\x22\40\x77\141\163\40\x65\170\x70\145\143\x74\x65\x64\x20\164\157\x20\142\145\40\141\x20\x76\141\154\x69\x64\40\145\x2d\155\x61\151\x6c\x20\x61\144\144\162\x65\163\163\x2e"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_EMAIL, $m7);
        BnK:
        return true;
    }
    public static function url($Iy, $Nr = null, $m7 = null)
    {
        static::string($Iy, $Nr, $m7);
        $f0 = array("\150\164\164\x70", "\150\x74\164\x70\163");
        $I0 = "\176\x5e\12\x20\x20\x20\40\40\x20\x20\40\40\x20\40\x20\x28\x25\163\51\72\57\57\x20\x20\40\x20\x20\x20\40\40\x20\40\40\x20\40\x20\x20\x20\40\40\x20\x20\40\40\x20\40\40\40\x20\x20\x20\x20\40\40\x20\x20\40\40\40\x23\x20\x70\162\x6f\164\x6f\x63\x6f\x6c\12\40\40\x20\40\x20\40\x20\x20\40\x20\40\x20\50\x28\133\x5c\x2e\134\160\114\x5c\160\x4e\x2d\x5d\x2b\72\x29\x3f\50\x5b\134\56\134\160\x4c\134\x70\116\x2d\x5d\53\51\x40\x29\x3f\x20\x20\40\40\x20\40\x20\x20\x20\x20\x23\40\142\x61\163\x69\x63\x20\x61\165\x74\150\12\40\40\x20\40\40\x20\40\40\40\40\40\x20\50\12\40\x20\40\x20\40\40\x20\x20\x20\x20\40\40\40\40\x20\x20\50\133\x5c\x70\114\x5c\160\x4e\134\160\x53\x2d\134\x2e\x5d\51\53\50\x5c\56\77\50\133\134\160\114\134\160\x4e\135\174\x78\156\x5c\x2d\x5c\55\133\x5c\x70\114\134\160\x4e\x2d\135\53\51\x2b\134\56\x3f\x29\40\x23\40\141\40\x64\x6f\155\141\x69\156\40\156\141\x6d\x65\xa\x20\40\x20\40\40\x20\40\40\40\x20\x20\40\x20\x20\x20\40\40\40\40\x20\x7c\x20\x20\40\x20\x20\x20\x20\x20\x20\40\x20\x20\x20\40\40\x20\40\x20\40\40\x20\x20\x20\40\40\x20\x20\x20\40\x20\40\x20\40\x20\40\40\40\x20\40\x20\40\40\40\x20\40\x20\x20\40\40\43\40\x6f\x72\12\x20\40\x20\40\x20\40\x20\40\x20\40\40\40\x20\x20\x20\40\134\144\x7b\61\54\x33\x7d\134\56\134\x64\173\61\54\63\175\134\x2e\134\144\173\x31\x2c\x33\175\x5c\x2e\x5c\x64\173\61\x2c\x33\x7d\x20\40\x20\40\x20\40\40\x20\x20\x20\x20\x20\40\x20\x20\x20\40\x20\x20\40\x23\40\x61\156\x20\x49\120\x20\141\144\144\162\145\x73\163\xa\40\x20\x20\40\x20\x20\40\x20\40\x20\x20\40\40\40\40\x20\40\40\x20\40\x7c\40\40\40\40\x20\x20\40\40\40\40\40\40\40\x20\40\40\x20\40\x20\x20\x20\40\40\x20\x20\x20\40\x20\x20\40\x20\x20\40\x20\40\x20\40\40\x20\40\x20\x20\x20\40\40\40\40\x20\40\x23\x20\157\x72\12\40\40\40\40\40\40\x20\x20\40\40\40\x20\x20\40\40\40\x5c\x5b\xa\40\x20\40\x20\x20\40\40\x20\x20\x20\40\40\x20\x20\40\40\40\x20\x20\40\x28\77\72\x28\x3f\x3a\x28\77\72\x28\x3f\72\50\77\x3a\x28\x3f\x3a\x28\77\72\x5b\60\55\x39\141\x2d\146\135\173\x31\x2c\x34\x7d\x29\x29\72\51\173\x36\x7d\51\x28\77\72\50\x3f\72\50\x3f\72\x28\x3f\x3a\x28\77\x3a\x5b\60\x2d\71\x61\x2d\146\x5d\x7b\x31\x2c\x34\x7d\51\x29\x3a\50\x3f\x3a\50\x3f\x3a\133\x30\55\71\141\x2d\x66\x5d\173\x31\x2c\x34\175\x29\51\51\x7c\x28\77\x3a\x28\77\72\x28\x3f\x3a\50\77\x3a\x28\77\72\x32\x35\133\x30\x2d\65\135\x7c\50\77\x3a\x5b\61\x2d\x39\135\x7c\61\x5b\60\x2d\x39\135\174\x32\x5b\x30\x2d\x34\135\51\x3f\x5b\x30\x2d\x39\135\x29\x29\x5c\x2e\x29\x7b\63\175\50\x3f\72\x28\x3f\x3a\62\x35\133\x30\55\x35\135\x7c\50\77\x3a\x5b\x31\x2d\x39\135\174\61\133\x30\x2d\x39\135\174\62\133\x30\55\64\x5d\x29\x3f\x5b\x30\x2d\71\135\x29\x29\51\51\x29\51\51\x7c\x28\77\x3a\50\x3f\x3a\x3a\72\50\77\x3a\x28\77\x3a\x28\77\72\133\60\55\x39\x61\55\x66\135\173\61\x2c\64\x7d\x29\51\x3a\51\173\x35\175\51\x28\77\x3a\x28\77\72\x28\77\72\x28\x3f\72\x28\x3f\72\x5b\x30\55\x39\x61\55\x66\x5d\173\x31\54\64\175\x29\x29\72\50\x3f\72\x28\x3f\72\133\x30\x2d\71\141\55\146\135\x7b\x31\54\x34\x7d\x29\51\51\174\50\x3f\x3a\50\x3f\72\50\77\72\50\77\72\50\x3f\72\x32\65\133\x30\55\x35\x5d\174\x28\77\72\133\61\x2d\71\135\174\61\133\x30\x2d\71\x5d\x7c\x32\x5b\x30\55\x34\135\x29\x3f\133\x30\x2d\x39\135\x29\51\x5c\56\x29\x7b\63\175\50\x3f\x3a\x28\77\x3a\62\x35\x5b\x30\x2d\65\135\174\50\77\72\133\61\55\71\135\174\x31\x5b\60\x2d\71\135\x7c\62\133\x30\x2d\64\135\51\x3f\133\60\x2d\x39\135\51\51\x29\51\51\x29\x29\x7c\x28\77\72\x28\x3f\72\50\x3f\72\50\77\x3a\50\x3f\72\133\x30\55\71\141\x2d\146\x5d\x7b\61\x2c\x34\175\x29\x29\x29\x3f\x3a\72\x28\77\x3a\50\77\x3a\x28\77\x3a\x5b\x30\55\x39\141\x2d\x66\x5d\x7b\x31\54\64\x7d\x29\51\x3a\x29\x7b\x34\175\x29\50\x3f\x3a\50\x3f\72\x28\77\72\50\77\x3a\50\77\72\x5b\60\x2d\71\141\55\146\135\x7b\x31\x2c\64\175\51\x29\x3a\x28\77\x3a\50\x3f\x3a\133\x30\55\71\x61\55\x66\x5d\x7b\x31\x2c\x34\175\x29\x29\51\174\x28\77\72\50\x3f\72\50\x3f\x3a\x28\x3f\x3a\50\x3f\x3a\62\65\133\x30\x2d\65\x5d\x7c\x28\77\72\133\x31\55\x39\x5d\x7c\x31\x5b\60\55\71\x5d\x7c\62\133\x30\x2d\x34\135\51\77\x5b\60\x2d\x39\x5d\51\x29\134\x2e\51\x7b\x33\175\50\77\x3a\50\x3f\72\x32\x35\x5b\x30\55\65\x5d\174\x28\x3f\72\x5b\61\55\x39\135\174\61\x5b\x30\x2d\x39\135\x7c\x32\x5b\60\55\64\135\x29\x3f\133\x30\x2d\x39\x5d\x29\51\x29\x29\51\x29\x29\x7c\50\x3f\x3a\50\77\x3a\x28\77\72\50\77\x3a\50\77\72\50\77\72\133\60\55\x39\x61\55\146\135\x7b\x31\54\64\x7d\51\51\x3a\51\173\60\x2c\x31\175\50\77\x3a\x28\77\x3a\x5b\x30\x2d\x39\x61\55\146\135\173\x31\x2c\64\x7d\x29\x29\x29\x3f\x3a\x3a\50\x3f\x3a\x28\77\x3a\50\x3f\72\133\60\x2d\x39\141\x2d\146\135\x7b\61\54\64\175\x29\51\72\51\x7b\63\x7d\51\x28\77\x3a\x28\x3f\x3a\x28\x3f\72\50\x3f\x3a\50\77\x3a\x5b\x30\55\71\141\x2d\x66\x5d\173\x31\54\x34\x7d\x29\x29\72\50\x3f\72\x28\x3f\x3a\133\60\x2d\71\x61\x2d\146\x5d\173\61\x2c\64\175\x29\x29\x29\174\x28\x3f\x3a\x28\77\x3a\x28\x3f\72\50\x3f\x3a\x28\77\x3a\62\x35\133\60\x2d\x35\135\x7c\x28\x3f\72\133\61\55\71\x5d\174\61\x5b\60\x2d\71\135\x7c\62\133\60\x2d\64\135\x29\x3f\x5b\60\55\71\135\x29\x29\x5c\56\x29\173\x33\175\x28\77\72\x28\77\72\x32\65\133\x30\55\65\x5d\x7c\x28\x3f\x3a\x5b\61\55\71\135\x7c\x31\x5b\x30\x2d\x39\x5d\174\62\x5b\x30\x2d\64\135\x29\77\x5b\60\x2d\71\135\51\x29\x29\51\x29\51\x29\174\50\x3f\x3a\x28\77\x3a\50\x3f\x3a\x28\77\72\50\77\x3a\x28\77\x3a\133\x30\x2d\71\141\x2d\146\x5d\x7b\x31\x2c\x34\175\x29\x29\x3a\51\x7b\60\54\x32\175\50\x3f\72\50\x3f\72\x5b\x30\55\x39\x61\x2d\x66\135\173\x31\54\64\175\51\51\51\x3f\x3a\x3a\x28\x3f\x3a\x28\77\x3a\50\x3f\x3a\133\60\55\71\141\x2d\146\135\173\x31\x2c\x34\175\51\51\72\51\x7b\x32\x7d\x29\x28\77\72\x28\77\72\x28\77\x3a\50\77\x3a\50\77\x3a\x5b\x30\x2d\71\x61\x2d\146\135\173\61\x2c\64\175\51\51\72\x28\x3f\72\x28\77\x3a\133\60\x2d\x39\x61\x2d\146\135\x7b\61\x2c\x34\x7d\x29\x29\51\x7c\50\x3f\72\x28\77\72\x28\77\72\x28\77\x3a\x28\77\72\x32\x35\133\60\55\65\135\174\50\77\72\x5b\x31\x2d\x39\x5d\174\61\x5b\60\x2d\71\x5d\x7c\x32\133\x30\55\x34\x5d\x29\x3f\x5b\x30\x2d\71\x5d\x29\x29\x5c\56\x29\173\63\175\x28\x3f\x3a\50\x3f\72\x32\x35\133\60\55\x35\135\174\50\x3f\x3a\x5b\x31\x2d\x39\135\174\x31\x5b\60\x2d\x39\135\x7c\x32\x5b\x30\x2d\x34\x5d\51\x3f\133\60\x2d\71\x5d\51\51\x29\51\x29\x29\x29\x7c\50\77\72\50\x3f\x3a\50\x3f\x3a\x28\x3f\72\x28\x3f\72\x28\x3f\x3a\133\60\55\x39\x61\x2d\146\135\173\x31\x2c\64\175\51\51\72\51\173\x30\54\x33\175\x28\77\x3a\50\77\72\x5b\60\x2d\71\x61\55\146\135\x7b\61\x2c\64\x7d\51\51\51\x3f\72\x3a\x28\x3f\x3a\50\x3f\x3a\x5b\60\55\x39\141\x2d\x66\x5d\x7b\x31\54\64\175\x29\x29\72\51\50\x3f\x3a\50\77\x3a\x28\x3f\72\x28\77\72\50\x3f\x3a\x5b\x30\x2d\71\x61\55\x66\135\x7b\61\54\x34\x7d\x29\x29\x3a\x28\x3f\72\x28\x3f\72\133\x30\x2d\x39\141\55\x66\x5d\x7b\x31\54\64\x7d\51\51\51\x7c\50\x3f\x3a\x28\x3f\x3a\x28\77\72\x28\77\72\50\x3f\x3a\62\x35\133\60\55\65\x5d\174\x28\77\72\133\x31\55\71\x5d\x7c\61\x5b\60\x2d\71\x5d\174\x32\x5b\x30\x2d\x34\x5d\51\x3f\x5b\x30\55\71\x5d\x29\51\134\56\x29\x7b\x33\x7d\x28\x3f\x3a\50\77\72\x32\x35\x5b\60\x2d\65\x5d\174\50\x3f\72\x5b\x31\x2d\71\x5d\x7c\61\x5b\x30\55\x39\135\x7c\x32\x5b\x30\55\64\x5d\x29\77\133\60\x2d\71\x5d\51\51\51\x29\x29\51\x29\x7c\50\77\72\x28\77\72\50\x3f\72\50\x3f\x3a\x28\x3f\x3a\x28\77\x3a\x5b\60\x2d\x39\141\55\x66\135\x7b\61\x2c\x34\x7d\51\51\x3a\x29\x7b\x30\x2c\x34\175\x28\x3f\x3a\x28\77\72\133\60\55\71\x61\x2d\146\x5d\173\61\54\64\175\51\51\51\x3f\72\x3a\x29\50\x3f\x3a\x28\x3f\x3a\x28\x3f\72\50\x3f\x3a\x28\x3f\x3a\x5b\x30\55\x39\141\55\x66\x5d\173\61\x2c\x34\175\51\x29\x3a\50\77\72\x28\x3f\72\133\x30\55\71\x61\55\x66\x5d\173\61\x2c\64\175\51\51\x29\x7c\50\x3f\x3a\50\x3f\x3a\50\x3f\x3a\x28\77\72\50\x3f\x3a\62\x35\133\60\x2d\65\x5d\x7c\50\77\x3a\133\61\x2d\71\135\x7c\61\133\60\x2d\x39\x5d\x7c\x32\133\x30\x2d\64\x5d\x29\77\x5b\x30\x2d\71\135\51\x29\x5c\x2e\51\173\63\175\x28\77\72\x28\77\x3a\x32\65\x5b\60\x2d\x35\x5d\174\50\77\72\x5b\61\x2d\x39\x5d\x7c\x31\x5b\60\x2d\71\x5d\x7c\x32\133\x30\x2d\64\x5d\51\77\x5b\60\x2d\71\x5d\51\x29\x29\x29\51\x29\x29\174\x28\77\72\x28\x3f\72\x28\77\72\x28\x3f\72\50\x3f\x3a\50\x3f\72\133\60\55\71\141\55\x66\x5d\x7b\61\x2c\64\175\51\x29\x3a\51\173\60\54\65\175\50\77\x3a\x28\77\72\133\60\x2d\x39\141\x2d\146\135\x7b\x31\54\64\x7d\x29\x29\x29\x3f\x3a\x3a\x29\x28\77\72\50\x3f\x3a\133\x30\x2d\x39\141\x2d\146\x5d\173\x31\54\64\x7d\x29\51\x29\x7c\50\77\72\x28\x3f\72\x28\x3f\72\50\77\x3a\x28\77\72\x28\77\72\133\60\55\71\x61\55\x66\x5d\x7b\x31\x2c\64\175\x29\x29\72\x29\173\x30\54\x36\x7d\x28\77\x3a\50\x3f\x3a\x5b\x30\55\x39\141\x2d\146\135\173\x31\x2c\x34\x7d\x29\51\x29\x3f\x3a\72\x29\51\51\x29\12\x20\x20\40\x20\x20\40\40\40\40\40\40\x20\40\40\x20\x20\x5c\x5d\40\x20\43\40\141\156\x20\x49\x50\x76\x36\40\141\144\144\162\x65\163\x73\12\x20\x20\40\x20\40\x20\40\x20\40\40\x20\x20\x29\12\40\x20\x20\40\40\40\x20\40\40\40\40\x20\x28\x3a\x5b\x30\x2d\71\x5d\53\51\x3f\x20\x20\40\x20\x20\40\x20\x20\40\40\x20\x20\40\x20\40\40\40\x20\x20\40\40\40\40\40\x20\x20\40\40\40\40\43\40\141\40\x70\x6f\x72\164\x20\x28\x6f\x70\x74\x69\157\x6e\141\x6c\51\12\x20\40\40\x20\40\40\x20\x20\x20\40\x20\x20\50\57\x3f\x7c\57\x5c\123\53\174\134\77\134\x53\x2a\x7c\134\x23\134\x53\52\x29\x20\x20\40\x20\40\40\40\40\x20\40\x20\40\x20\x20\40\x20\40\40\40\x23\40\x61\x20\57\54\40\156\157\x74\150\151\156\x67\54\40\x61\40\57\40\167\151\x74\150\40\163\157\155\145\164\x68\x69\156\147\54\x20\141\40\161\165\x65\x72\x79\x20\x6f\162\x20\x61\x20\x66\x72\x61\147\155\145\x6e\164\12\40\x20\x20\x20\x20\x20\40\40\44\x7e\151\170\x75";
        $I0 = \sprintf($I0, \implode("\174", $f0));
        if (\preg_match($I0, $Iy)) {
            goto mef;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\x61\154\165\x65\x20\x22\45\163\42\40\x77\x61\163\40\x65\x78\160\x65\x63\x74\x65\144\x20\164\157\x20\142\145\40\141\x20\x76\x61\x6c\x69\x64\40\125\122\114\x20\163\x74\141\x72\164\x69\x6e\x67\x20\167\x69\164\150\40\150\164\164\x70\40\x6f\x72\x20\150\164\164\160\x73"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_URL, $m7);
        mef:
        return true;
    }
    public static function alnum($Iy, $Nr = null, $m7 = null)
    {
        try {
            static::regex($Iy, "\50\x5e\50\x5b\141\x2d\172\101\55\x5a\135\x7b\61\x7d\133\141\55\x7a\x41\x2d\132\60\x2d\x39\x5d\x2a\x29\x24\51", $Nr, $m7);
        } catch (AssertionFailedException $xr) {
            $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\x61\x6c\x75\145\40\x22\45\163\42\40\151\163\40\x6e\157\x74\x20\x61\x6c\x70\150\x61\156\x75\155\145\162\151\143\x2c\x20\x73\164\141\162\x74\151\156\147\40\167\x69\x74\x68\40\x6c\145\x74\164\145\x72\163\x20\x61\156\x64\x20\143\157\x6e\x74\141\x69\x6e\x69\x6e\147\x20\157\x6e\154\171\x20\154\145\x74\x74\x65\162\163\x20\141\x6e\144\40\156\165\x6d\142\x65\x72\163\56"), static::stringify($Iy));
            throw static::createException($Iy, $Nr, static::INVALID_ALNUM, $m7);
        }
        return true;
    }
    public static function true($Iy, $Nr = null, $m7 = null)
    {
        if (!(true !== $Iy)) {
            goto UFk;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\141\x6c\165\x65\x20\x22\45\x73\x22\x20\151\x73\40\156\157\x74\x20\x54\122\x55\105\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_TRUE, $m7);
        UFk:
        return true;
    }
    public static function false($Iy, $Nr = null, $m7 = null)
    {
        if (!(false !== $Iy)) {
            goto sLU;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\141\154\x75\x65\40\x22\x25\x73\42\40\151\x73\x20\156\157\x74\40\106\x41\114\123\105\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_FALSE, $m7);
        sLU:
        return true;
    }
    public static function classExists($Iy, $Nr = null, $m7 = null)
    {
        if (\class_exists($Iy)) {
            goto PsH;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\103\x6c\x61\x73\x73\x20\42\x25\x73\42\x20\144\x6f\145\x73\x20\156\157\164\x20\x65\x78\151\163\x74\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_CLASS, $m7);
        PsH:
        return true;
    }
    public static function interfaceExists($Iy, $Nr = null, $m7 = null)
    {
        if (\interface_exists($Iy)) {
            goto VpP;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\111\156\x74\145\162\146\x61\143\x65\40\42\x25\x73\x22\40\144\x6f\x65\163\40\156\x6f\164\40\145\x78\x69\163\164\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_INTERFACE, $m7);
        VpP:
        return true;
    }
    public static function implementsInterface($AS, $Q4, $Nr = null, $m7 = null)
    {
        $vL = new \ReflectionClass($AS);
        if ($vL->implementsInterface($Q4)) {
            goto HNi;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x43\x6c\x61\163\x73\x20\42\45\163\42\40\x64\157\x65\163\40\x6e\157\164\x20\151\155\x70\154\145\155\145\x6e\x74\x20\x69\156\x74\x65\162\146\x61\x63\x65\x20\42\x25\163\x22\56"), static::stringify($AS), static::stringify($Q4));
        throw static::createException($AS, $Nr, static::INTERFACE_NOT_IMPLEMENTED, $m7, array("\x69\156\164\x65\162\146\141\x63\145" => $Q4));
        HNi:
        return true;
    }
    public static function isJsonString($Iy, $Nr = null, $m7 = null)
    {
        if (!(null === \json_decode($Iy) && JSON_ERROR_NONE !== \json_last_error())) {
            goto VSk;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\141\x6c\x75\145\x20\x22\45\163\42\40\151\163\40\x6e\157\164\40\141\40\x76\141\154\x69\x64\x20\112\x53\x4f\x4e\x20\163\164\x72\x69\x6e\147\x2e"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_JSON_STRING, $m7);
        VSk:
        return true;
    }
    public static function uuid($Iy, $Nr = null, $m7 = null)
    {
        $Iy = \str_replace(array("\165\x72\156\72", "\x75\x75\x69\144\72", "\x7b", "\x7d"), '', $Iy);
        if (!("\60\60\60\x30\x30\60\x30\60\55\60\60\x30\x30\x2d\x30\60\x30\x30\55\60\60\x30\60\x2d\60\x30\x30\60\x30\x30\x30\x30\x30\60\60\x30" === $Iy)) {
            goto cWK;
        }
        return true;
        cWK:
        if (\preg_match("\x2f\136\133\60\55\x39\x41\x2d\x46\141\55\x66\135\x7b\x38\175\x2d\133\x30\55\x39\x41\55\x46\141\x2d\146\x5d\173\64\175\x2d\x5b\x30\x2d\x39\x41\55\106\141\55\146\135\x7b\64\x7d\55\x5b\x30\55\x39\101\55\106\141\x2d\x66\135\x7b\x34\x7d\55\133\x30\x2d\x39\x41\55\106\141\x2d\x66\135\173\61\62\x7d\44\x2f", $Iy)) {
            goto T_u;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\141\154\x75\x65\40\42\45\x73\x22\40\x69\x73\x20\156\x6f\164\x20\x61\40\166\141\x6c\151\144\40\x55\x55\x49\x44\x2e"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_UUID, $m7);
        T_u:
        return true;
    }
    public static function e164($Iy, $Nr = null, $m7 = null)
    {
        if (\preg_match("\x2f\x5e\x5c\x2b\77\133\x31\55\x39\x5d\134\144\x7b\x31\x2c\61\x34\175\44\57", $Iy)) {
            goto a1q;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\141\154\165\x65\40\x22\x25\163\42\x20\151\163\x20\156\x6f\x74\x20\x61\40\x76\141\154\x69\144\x20\105\x31\x36\64\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_E164, $m7);
        a1q:
        return true;
    }
    public static function count($bP, $WM, $Nr = null, $m7 = null)
    {
        if (!($WM !== \count($bP))) {
            goto oDb;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x4c\151\163\x74\40\x64\x6f\145\x73\x20\x6e\x6f\164\x20\x63\x6f\156\x74\x61\151\156\40\145\x78\141\143\x74\x6c\x79\x20\45\x64\x20\145\x6c\145\155\x65\156\x74\x73\40\x28\45\x64\x20\147\x69\x76\x65\x6e\51\x2e"), static::stringify($WM), static::stringify(\count($bP)));
        throw static::createException($bP, $Nr, static::INVALID_COUNT, $m7, array("\143\x6f\165\x6e\164" => $WM));
        oDb:
        return true;
    }
    public static function __callStatic($N0, $WK)
    {
        if (!(0 === \strpos($N0, "\156\x75\x6c\x6c\x4f\162"))) {
            goto HLG;
        }
        if (\array_key_exists(0, $WK)) {
            goto E2P;
        }
        throw new BadMethodCallException("\115\x69\163\163\x69\x6e\147\x20\x74\x68\145\40\146\151\162\x73\164\x20\141\x72\x67\165\x6d\145\x6e\x74\56");
        E2P:
        if (!(null === $WK[0])) {
            goto oww;
        }
        return true;
        oww:
        $N0 = \substr($N0, 6);
        return \call_user_func_array(array(\get_called_class(), $N0), $WK);
        HLG:
        if (!(0 === \strpos($N0, "\x61\154\154"))) {
            goto MrL;
        }
        if (\array_key_exists(0, $WK)) {
            goto nCU;
        }
        throw new BadMethodCallException("\115\x69\x73\163\151\156\147\x20\x74\150\x65\x20\146\x69\162\x73\x74\x20\141\162\147\165\155\145\x6e\x74\x2e");
        nCU:
        static::isTraversable($WK[0]);
        $N0 = \substr($N0, 3);
        $o0 = \array_shift($WK);
        $PB = \get_called_class();
        foreach ($o0 as $Iy) {
            \call_user_func_array(array($PB, $N0), \array_merge(array($Iy), $WK));
            Mg1:
        }
        rva:
        return true;
        MrL:
        throw new BadMethodCallException("\116\x6f\x20\x61\x73\163\145\162\x74\x69\x6f\x6e\40\101\163\x73\145\162\x74\x69\x6f\x6e\x23" . $N0 . "\40\x65\170\151\x73\x74\x73\56");
    }
    public static function choicesNotEmpty(array $o0, array $hO, $Nr = null, $m7 = null)
    {
        static::notEmpty($o0, $Nr, $m7);
        foreach ($hO as $Ur) {
            static::notEmptyKey($o0, $Ur, $Nr, $m7);
            pMC:
        }
        F4E:
        return true;
    }
    public static function methodExists($Iy, $cc, $Nr = null, $m7 = null)
    {
        static::isObject($cc, $Nr, $m7);
        if (\method_exists($cc, $Iy)) {
            goto S4G;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x45\x78\x70\145\x63\164\145\x64\x20\x22\45\x73\42\40\x64\x6f\x65\x73\x20\156\157\x74\x20\145\170\x69\x73\x74\40\x69\156\40\160\x72\x6f\166\x69\144\x65\144\x20\157\142\x6a\145\x63\x74\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_METHOD, $m7, array("\157\142\x6a\x65\x63\164" => \get_class($cc)));
        S4G:
        return true;
    }
    public static function isObject($Iy, $Nr = null, $m7 = null)
    {
        if (\is_object($Iy)) {
            goto QWt;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\120\x72\157\166\x69\x64\145\144\x20\x22\45\x73\x22\x20\x69\163\x20\156\157\x74\x20\x61\x20\x76\x61\x6c\x69\x64\x20\x6f\142\152\145\143\164\x2e"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_OBJECT, $m7);
        QWt:
        return true;
    }
    public static function lessThan($Iy, $Td, $Nr = null, $m7 = null)
    {
        if (!($Iy >= $Td)) {
            goto f60;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x50\162\157\166\151\x64\x65\x64\x20\42\45\x73\x22\x20\151\x73\x20\x6e\x6f\x74\x20\154\145\163\x73\x20\164\150\x61\156\x20\x22\x25\x73\x22\x2e"), static::stringify($Iy), static::stringify($Td));
        throw static::createException($Iy, $Nr, static::INVALID_LESS, $m7, array("\154\151\x6d\x69\x74" => $Td));
        f60:
        return true;
    }
    public static function lessOrEqualThan($Iy, $Td, $Nr = null, $m7 = null)
    {
        if (!($Iy > $Td)) {
            goto NYb;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\120\162\x6f\166\151\144\145\x64\x20\42\45\163\42\x20\151\x73\40\156\157\x74\40\154\x65\x73\x73\40\157\x72\x20\x65\x71\x75\141\x6c\40\x74\x68\141\x6e\40\42\45\x73\42\x2e"), static::stringify($Iy), static::stringify($Td));
        throw static::createException($Iy, $Nr, static::INVALID_LESS_OR_EQUAL, $m7, array("\x6c\151\155\x69\164" => $Td));
        NYb:
        return true;
    }
    public static function greaterThan($Iy, $Td, $Nr = null, $m7 = null)
    {
        if (!($Iy <= $Td)) {
            goto cgw;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x50\162\157\x76\x69\x64\145\x64\40\42\x25\x73\42\40\x69\x73\x20\156\x6f\164\40\x67\x72\x65\141\x74\145\162\40\x74\x68\141\156\40\x22\x25\x73\42\x2e"), static::stringify($Iy), static::stringify($Td));
        throw static::createException($Iy, $Nr, static::INVALID_GREATER, $m7, array("\x6c\x69\x6d\x69\164" => $Td));
        cgw:
        return true;
    }
    public static function greaterOrEqualThan($Iy, $Td, $Nr = null, $m7 = null)
    {
        if (!($Iy < $Td)) {
            goto V0L;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\120\162\x6f\166\151\144\x65\144\40\42\x25\x73\x22\40\x69\x73\40\156\x6f\164\40\x67\162\x65\141\x74\145\x72\40\157\x72\x20\x65\161\x75\x61\x6c\x20\164\150\x61\156\x20\x22\45\x73\x22\56"), static::stringify($Iy), static::stringify($Td));
        throw static::createException($Iy, $Nr, static::INVALID_GREATER_OR_EQUAL, $m7, array("\154\151\x6d\x69\164" => $Td));
        V0L:
        return true;
    }
    public static function between($Iy, $zR, $HC, $Nr = null, $m7 = null)
    {
        if (!($zR > $Iy || $Iy > $HC)) {
            goto Tou;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\120\x72\x6f\166\151\144\x65\144\40\42\45\163\x22\x20\x69\163\x20\156\145\151\164\150\x65\162\x20\x67\162\145\141\x74\145\x72\40\x74\x68\141\156\x20\x6f\162\40\x65\161\165\141\154\x20\x74\x6f\40\42\x25\x73\x22\x20\156\157\162\40\154\x65\x73\x73\x20\164\x68\141\156\x20\157\x72\x20\x65\x71\165\141\x6c\40\x74\157\40\42\45\x73\x22\x2e"), static::stringify($Iy), static::stringify($zR), static::stringify($HC));
        throw static::createException($Iy, $Nr, static::INVALID_BETWEEN, $m7, array("\x6c\157\167\x65\162" => $zR, "\165\x70\x70\145\x72" => $HC));
        Tou:
        return true;
    }
    public static function betweenExclusive($Iy, $zR, $HC, $Nr = null, $m7 = null)
    {
        if (!($zR >= $Iy || $Iy >= $HC)) {
            goto CJa;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x50\x72\x6f\166\x69\144\x65\144\x20\42\x25\x73\42\40\151\163\40\x6e\145\151\164\x68\145\x72\x20\147\x72\x65\x61\164\x65\162\x20\x74\x68\x61\x6e\40\x22\45\x73\42\40\x6e\x6f\x72\x20\x6c\145\163\163\x20\x74\150\141\x6e\40\42\x25\163\42\x2e"), static::stringify($Iy), static::stringify($zR), static::stringify($HC));
        throw static::createException($Iy, $Nr, static::INVALID_BETWEEN_EXCLUSIVE, $m7, array("\x6c\157\167\x65\x72" => $zR, "\x75\x70\x70\145\x72" => $HC));
        CJa:
        return true;
    }
    public static function extensionLoaded($Iy, $Nr = null, $m7 = null)
    {
        if (\extension_loaded($Iy)) {
            goto YqN;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x45\x78\x74\x65\x6e\x73\x69\x6f\156\x20\x22\45\163\42\x20\x69\163\x20\162\x65\161\x75\x69\162\x65\x64\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_EXTENSION, $m7);
        YqN:
        return true;
    }
    public static function date($Iy, $t_, $Nr = null, $m7 = null)
    {
        static::string($Iy, $Nr, $m7);
        static::string($t_, $Nr, $m7);
        $w3 = \DateTime::createFromFormat("\x21" . $t_, $Iy);
        if (!(false === $w3 || $Iy !== $w3->format($t_))) {
            goto wda;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x44\141\x74\145\40\42\x25\x73\x22\x20\x69\x73\40\x69\156\x76\141\x6c\151\144\40\157\x72\40\144\x6f\145\x73\x20\156\157\x74\40\x6d\141\x74\143\x68\40\x66\x6f\162\x6d\x61\x74\40\x22\45\x73\x22\56"), static::stringify($Iy), static::stringify($t_));
        throw static::createException($Iy, $Nr, static::INVALID_DATE, $m7, array("\146\x6f\x72\155\141\x74" => $t_));
        wda:
        return true;
    }
    public static function objectOrClass($Iy, $Nr = null, $m7 = null)
    {
        if (\is_object($Iy)) {
            goto N2M;
        }
        static::classExists($Iy, $Nr, $m7);
        N2M:
        return true;
    }
    public static function propertyExists($Iy, $s5, $Nr = null, $m7 = null)
    {
        static::objectOrClass($Iy);
        if (\property_exists($Iy, $s5)) {
            goto AQI;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\103\x6c\141\163\x73\40\x22\x25\163\x22\40\144\157\145\x73\x20\x6e\157\x74\x20\150\141\166\x65\40\160\x72\x6f\x70\145\x72\x74\x79\x20\42\x25\163\42\56"), static::stringify($Iy), static::stringify($s5));
        throw static::createException($Iy, $Nr, static::INVALID_PROPERTY, $m7, array("\x70\x72\x6f\x70\x65\x72\164\x79" => $s5));
        AQI:
        return true;
    }
    public static function propertiesExist($Iy, array $za, $Nr = null, $m7 = null)
    {
        static::objectOrClass($Iy);
        static::allString($za, $Nr, $m7);
        $e1 = array();
        foreach ($za as $s5) {
            if (\property_exists($Iy, $s5)) {
                goto oTp;
            }
            $e1[] = $s5;
            oTp:
            K0d:
        }
        Ktb:
        if (!$e1) {
            goto v9j;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x43\154\141\163\163\40\x22\45\x73\x22\40\x64\157\x65\x73\40\x6e\157\x74\40\150\x61\x76\145\40\164\x68\145\x73\145\40\x70\162\157\x70\x65\162\164\151\145\x73\72\40\x25\x73\56"), static::stringify($Iy), static::stringify(\implode("\54\40", $e1)));
        throw static::createException($Iy, $Nr, static::INVALID_PROPERTY, $m7, array("\x70\x72\x6f\x70\x65\162\164\x69\145\163" => $za));
        v9j:
        return true;
    }
    public static function version($nV, $G5, $NX, $Nr = null, $m7 = null)
    {
        static::notEmpty($G5, "\x76\145\x72\x73\151\x6f\156\x43\x6f\155\160\141\x72\145\x20\157\x70\x65\x72\x61\x74\157\162\x20\151\x73\40\162\x65\161\165\x69\162\x65\144\40\x61\156\144\40\x63\x61\x6e\x6e\x6f\164\x20\142\145\x20\x65\x6d\160\x74\171\56");
        if (!(true !== \version_compare($nV, $NX, $G5))) {
            goto Fem;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\145\x72\163\151\x6f\x6e\40\42\x25\x73\x22\40\x69\x73\40\156\x6f\164\40\42\45\x73\x22\x20\x76\x65\x72\x73\x69\x6f\x6e\x20\42\45\163\42\x2e"), static::stringify($nV), static::stringify($G5), static::stringify($NX));
        throw static::createException($nV, $Nr, static::INVALID_VERSION, $m7, array("\157\x70\145\162\x61\164\x6f\x72" => $G5, "\166\x65\162\163\x69\157\x6e" => $NX));
        Fem:
        return true;
    }
    public static function phpVersion($G5, $QF, $Nr = null, $m7 = null)
    {
        static::defined("\120\110\x50\x5f\x56\105\122\x53\111\x4f\116");
        return static::version(PHP_VERSION, $G5, $QF, $Nr, $m7);
    }
    public static function extensionVersion($FR, $G5, $QF, $Nr = null, $m7 = null)
    {
        static::extensionLoaded($FR, $Nr, $m7);
        return static::version(\phpversion($FR), $G5, $QF, $Nr, $m7);
    }
    public static function isCallable($Iy, $Nr = null, $m7 = null)
    {
        if (\is_callable($Iy)) {
            goto xfv;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x50\x72\157\x76\151\144\x65\144\40\42\45\x73\x22\40\x69\x73\40\x6e\157\164\40\141\40\143\141\x6c\x6c\x61\x62\x6c\x65\56"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_CALLABLE, $m7);
        xfv:
        return true;
    }
    public static function satisfy($Iy, $oI, $Nr = null, $m7 = null)
    {
        static::isCallable($oI);
        if (!(false === \call_user_func($oI, $Iy))) {
            goto LRV;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x50\x72\x6f\166\x69\144\145\x64\40\x22\45\x73\42\40\151\x73\x20\x69\x6e\166\x61\154\x69\x64\40\141\143\x63\x6f\x72\x64\x69\x6e\x67\x20\164\157\40\x63\165\163\x74\x6f\x6d\40\x72\165\154\145\x2e"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_SATISFY, $m7);
        LRV:
        return true;
    }
    public static function ip($Iy, $ee = null, $Nr = null, $m7 = null)
    {
        static::string($Iy, $Nr, $m7);
        if (\filter_var($Iy, FILTER_VALIDATE_IP, $ee)) {
            goto Bw3;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\x61\x6c\x75\x65\40\42\45\x73\42\40\x77\x61\x73\40\145\x78\160\x65\143\164\145\144\x20\x74\157\x20\x62\145\40\141\40\x76\141\x6c\x69\x64\x20\111\x50\x20\141\x64\x64\162\x65\163\x73\x2e"), static::stringify($Iy));
        throw static::createException($Iy, $Nr, static::INVALID_IP, $m7, array("\146\x6c\x61\147" => $ee));
        Bw3:
        return true;
    }
    public static function ipv4($Iy, $ee = null, $Nr = null, $m7 = null)
    {
        static::ip($Iy, $ee | FILTER_FLAG_IPV4, static::generateMessage($Nr ?: "\x56\141\x6c\x75\145\40\x22\45\x73\42\40\167\141\x73\40\x65\170\x70\145\x63\x74\145\144\40\164\x6f\x20\142\x65\40\141\40\166\x61\154\151\x64\x20\x49\x50\166\x34\x20\141\144\144\x72\x65\x73\x73\56"), $m7);
        return true;
    }
    public static function ipv6($Iy, $ee = null, $Nr = null, $m7 = null)
    {
        static::ip($Iy, $ee | FILTER_FLAG_IPV6, static::generateMessage($Nr ?: "\x56\141\154\165\x65\x20\x22\45\163\x22\x20\167\141\x73\40\145\170\160\x65\143\164\x65\x64\x20\x74\x6f\40\142\x65\x20\x61\x20\x76\x61\x6c\151\144\40\x49\120\x76\66\x20\141\x64\144\162\145\x73\x73\56"), $m7);
        return true;
    }
    protected static function stringify($Iy)
    {
        $cz = \gettype($Iy);
        if (\is_bool($Iy)) {
            goto ib3;
        }
        if (\is_scalar($Iy)) {
            goto Xrc;
        }
        if (\is_array($Iy)) {
            goto qrN;
        }
        if (\is_object($Iy)) {
            goto t2w;
        }
        if (\is_resource($Iy)) {
            goto y5M;
        }
        if (null === $Iy) {
            goto L9S;
        }
        goto qOk;
        ib3:
        $cz = $Iy ? "\x3c\124\x52\x55\105\x3e" : "\x3c\106\101\x4c\123\105\x3e";
        goto qOk;
        Xrc:
        $Ry = (string) $Iy;
        if (!(\strlen($Ry) > 100)) {
            goto s8C;
        }
        $Ry = \substr($Ry, 0, 97) . "\56\x2e\x2e";
        s8C:
        $cz = $Ry;
        goto qOk;
        qrN:
        $cz = "\x3c\x41\x52\x52\101\131\76";
        goto qOk;
        t2w:
        $cz = \get_class($Iy);
        goto qOk;
        y5M:
        $cz = \get_resource_type($Iy);
        goto qOk;
        L9S:
        $cz = "\74\116\125\x4c\x4c\76";
        qOk:
        return $cz;
    }
    public static function defined($Ok, $Nr = null, $m7 = null)
    {
        if (\defined($Ok)) {
            goto KFa;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\126\141\154\x75\145\40\42\45\163\x22\x20\x65\170\160\x65\x63\x74\145\x64\40\x74\x6f\40\x62\x65\40\141\40\144\145\146\x69\156\x65\144\40\x63\157\156\x73\x74\141\x6e\x74\56"), $Ok);
        throw static::createException($Ok, $Nr, static::INVALID_CONSTANT, $m7);
        KFa:
        return true;
    }
    public static function base64($Iy, $Nr = null, $m7 = null)
    {
        if (!(false === \base64_decode($Iy, true))) {
            goto AO2;
        }
        $Nr = \sprintf(static::generateMessage($Nr ?: "\x56\141\154\x75\x65\x20\x22\45\163\42\x20\151\163\x20\156\x6f\x74\x20\x61\40\x76\141\x6c\x69\144\x20\142\x61\163\x65\x36\64\40\163\x74\162\x69\x6e\147\56"), $Iy);
        throw static::createException($Iy, $Nr, static::INVALID_BASE64, $m7);
        AO2:
        return true;
    }
    protected static function generateMessage($Nr = null)
    {
        if (!\is_callable($Nr)) {
            goto w37;
        }
        $cl = \debug_backtrace(0);
        $Kp = array();
        $vL = new \ReflectionClass($cl[1]["\x63\154\141\163\163"]);
        $N0 = $vL->getMethod($cl[1]["\146\x75\x6e\x63\164\151\x6f\156"]);
        foreach ($N0->getParameters() as $ml => $l_) {
            if (!("\x6d\145\x73\x73\141\147\x65" !== $l_->getName())) {
                goto Ufl;
            }
            $Kp[$l_->getName()] = \array_key_exists($ml, $cl[1]["\x61\x72\147\x73"]) ? $cl[1]["\x61\x72\147\163"][$ml] : $l_->getDefaultValue();
            Ufl:
            sIJ:
        }
        MFw:
        $Kp["\72\x3a\141\x73\163\145\162\x74\x69\157\x6e"] = \sprintf("\x25\x73\45\x73\x25\x73", $cl[1]["\143\x6c\141\163\x73"], $cl[1]["\x74\x79\x70\x65"], $cl[1]["\x66\x75\x6e\x63\164\x69\x6f\x6e"]);
        $Nr = \call_user_func_array($Nr, array($Kp));
        w37:
        return \is_null($Nr) ? null : (string) $Nr;
    }
}
