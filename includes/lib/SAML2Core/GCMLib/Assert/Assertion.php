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
    protected static $exceptionClass = "\x41\x73\163\x65\162\x74\134\x49\x6e\166\141\x6c\151\x64\x41\x72\x67\165\155\145\x6e\164\x45\170\x63\x65\x70\x74\151\157\156";
    protected static function createException($zw, $Ew, $oZ, $YK = null, array $b6 = array())
    {
        $ss = static::$exceptionClass;
        return new $ss($Ew, $oZ, $YK, $zw, $b6);
    }
    public static function eq($zw, $zc, $Ew = null, $YK = null)
    {
        if (!($zw != $zc)) {
            goto sTI;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\141\154\x75\x65\x20\42\45\163\42\x20\x64\157\145\163\40\x6e\157\x74\40\145\161\x75\141\x6c\x20\145\x78\160\145\x63\x74\x65\144\40\166\141\154\x75\145\x20\42\x25\163\42\x2e"), static::stringify($zw), static::stringify($zc));
        throw static::createException($zw, $Ew, static::INVALID_EQ, $YK, array("\145\170\x70\145\x63\x74\145\144" => $zc));
        sTI:
        return true;
    }
    public static function same($zw, $zc, $Ew = null, $YK = null)
    {
        if (!($zw !== $zc)) {
            goto Zxa;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\x61\x6c\x75\x65\40\42\45\x73\x22\40\x69\x73\x20\156\157\164\x20\164\x68\145\x20\163\x61\155\x65\x20\141\x73\x20\x65\170\160\x65\143\164\x65\144\40\x76\141\x6c\x75\145\40\42\x25\163\x22\x2e"), static::stringify($zw), static::stringify($zc));
        throw static::createException($zw, $Ew, static::INVALID_SAME, $YK, array("\145\170\160\x65\x63\164\145\144" => $zc));
        Zxa:
        return true;
    }
    public static function notEq($Nu, $zc, $Ew = null, $YK = null)
    {
        if (!($Nu == $zc)) {
            goto wj4;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\x61\x6c\165\145\x20\42\45\x73\x22\40\x69\x73\40\x65\161\x75\141\x6c\40\164\x6f\x20\145\170\160\145\x63\x74\145\144\x20\x76\141\154\x75\x65\x20\x22\x25\x73\42\x2e"), static::stringify($Nu), static::stringify($zc));
        throw static::createException($Nu, $Ew, static::INVALID_NOT_EQ, $YK, array("\145\170\x70\x65\x63\164\145\x64" => $zc));
        wj4:
        return true;
    }
    public static function notSame($Nu, $zc, $Ew = null, $YK = null)
    {
        if (!($Nu === $zc)) {
            goto abR;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\141\154\165\x65\x20\x22\45\163\x22\x20\151\163\x20\x74\150\145\x20\x73\141\155\145\40\141\x73\40\x65\x78\x70\145\143\x74\x65\x64\40\166\x61\154\x75\145\x20\42\x25\x73\x22\56"), static::stringify($Nu), static::stringify($zc));
        throw static::createException($Nu, $Ew, static::INVALID_NOT_SAME, $YK, array("\x65\170\160\145\143\164\x65\144" => $zc));
        abR:
        return true;
    }
    public static function notInArray($zw, array $c_, $Ew = null, $YK = null)
    {
        if (!(true === \in_array($zw, $c_))) {
            goto b9x;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\141\x6c\x75\x65\x20\42\x25\x73\x22\40\151\163\x20\151\156\40\147\x69\166\x65\x6e\x20\42\x25\163\42\x2e"), static::stringify($zw), static::stringify($c_));
        throw static::createException($zw, $Ew, static::INVALID_VALUE_IN_ARRAY, $YK, array("\x63\150\157\x69\x63\145\x73" => $c_));
        b9x:
        return true;
    }
    public static function integer($zw, $Ew = null, $YK = null)
    {
        if (\is_int($zw)) {
            goto lK3;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\x61\x6c\165\145\x20\x22\x25\x73\42\x20\151\163\x20\x6e\x6f\164\40\x61\156\x20\x69\x6e\x74\x65\147\145\162\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_INTEGER, $YK);
        lK3:
        return true;
    }
    public static function float($zw, $Ew = null, $YK = null)
    {
        if (\is_float($zw)) {
            goto oOC;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\141\x6c\165\145\40\x22\45\x73\42\40\151\163\x20\x6e\x6f\x74\40\x61\x20\146\x6c\157\x61\164\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_FLOAT, $YK);
        oOC:
        return true;
    }
    public static function digit($zw, $Ew = null, $YK = null)
    {
        if (\ctype_digit((string) $zw)) {
            goto DxU;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\x61\154\x75\145\x20\42\45\163\x22\x20\151\163\40\156\x6f\164\40\x61\40\144\x69\x67\x69\x74\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_DIGIT, $YK);
        DxU:
        return true;
    }
    public static function integerish($zw, $Ew = null, $YK = null)
    {
        if (!(\is_resource($zw) || \is_object($zw) || \is_bool($zw) || \is_null($zw) || \is_array($zw) || \is_string($zw) && '' == $zw || \strval(\intval($zw)) !== \strval($zw) && \strval(\intval($zw)) !== \strval(\ltrim($zw, "\x30")) && '' !== \strval(\intval($zw)) && '' !== \strval(\ltrim($zw, "\60")))) {
            goto nw2;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\x61\x6c\165\145\x20\42\45\x73\42\40\151\163\40\x6e\157\x74\x20\141\156\40\151\156\164\145\147\x65\x72\x20\157\x72\x20\141\40\156\165\x6d\142\x65\x72\x20\143\x61\163\164\x61\142\x6c\145\x20\x74\157\40\x69\x6e\x74\145\147\x65\162\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_INTEGERISH, $YK);
        nw2:
        return true;
    }
    public static function boolean($zw, $Ew = null, $YK = null)
    {
        if (\is_bool($zw)) {
            goto aOj;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\141\x6c\165\145\x20\42\45\163\42\40\x69\x73\x20\156\x6f\x74\x20\141\40\142\157\157\154\145\141\156\56"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_BOOLEAN, $YK);
        aOj:
        return true;
    }
    public static function scalar($zw, $Ew = null, $YK = null)
    {
        if (\is_scalar($zw)) {
            goto hVA;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\141\x6c\x75\x65\40\42\45\x73\x22\x20\151\x73\40\156\157\x74\40\141\x20\163\143\x61\154\x61\162\56"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_SCALAR, $YK);
        hVA:
        return true;
    }
    public static function notEmpty($zw, $Ew = null, $YK = null)
    {
        if (!empty($zw)) {
            goto KI4;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\x61\x6c\165\x65\40\x22\x25\x73\42\40\151\163\x20\x65\155\160\x74\x79\x2c\x20\142\165\164\40\x6e\x6f\156\40\145\155\x70\164\171\x20\166\x61\x6c\x75\145\x20\x77\x61\163\x20\145\170\x70\x65\x63\x74\145\144\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::VALUE_EMPTY, $YK);
        KI4:
        return true;
    }
    public static function noContent($zw, $Ew = null, $YK = null)
    {
        if (empty($zw)) {
            goto bfu;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\141\x6c\x75\145\40\x22\x25\163\x22\x20\151\x73\40\156\157\164\40\x65\x6d\160\x74\171\54\40\x62\x75\x74\40\145\x6d\x70\x74\x79\40\x76\141\x6c\x75\x65\x20\x77\x61\163\x20\145\x78\x70\x65\x63\x74\145\x64\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::VALUE_NOT_EMPTY, $YK);
        bfu:
        return true;
    }
    public static function null($zw, $Ew = null, $YK = null)
    {
        if (!(null !== $zw)) {
            goto sl1;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\141\x6c\x75\x65\x20\42\x25\x73\x22\x20\151\x73\x20\x6e\157\x74\x20\156\165\154\x6c\54\x20\142\x75\x74\40\156\x75\154\x6c\x20\166\x61\154\x75\145\x20\x77\141\163\40\x65\x78\x70\x65\143\164\145\144\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::VALUE_NOT_NULL, $YK);
        sl1:
        return true;
    }
    public static function notNull($zw, $Ew = null, $YK = null)
    {
        if (!(null === $zw)) {
            goto shc;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\x61\154\x75\145\x20\x22\45\x73\42\x20\x69\x73\40\156\165\154\154\x2c\40\x62\x75\x74\x20\x6e\x6f\x6e\x20\156\x75\154\x6c\40\x76\x61\154\x75\x65\x20\x77\141\163\40\145\x78\160\145\143\164\x65\x64\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::VALUE_NULL, $YK);
        shc:
        return true;
    }
    public static function string($zw, $Ew = null, $YK = null)
    {
        if (\is_string($zw)) {
            goto PZt;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\141\x6c\165\x65\x20\42\x25\x73\x22\40\145\170\x70\x65\x63\x74\145\144\x20\x74\x6f\40\x62\x65\x20\x73\164\162\x69\x6e\147\54\x20\164\x79\x70\145\x20\45\x73\x20\147\x69\166\145\156\x2e"), static::stringify($zw), \gettype($zw));
        throw static::createException($zw, $Ew, static::INVALID_STRING, $YK);
        PZt:
        return true;
    }
    public static function regex($zw, $Y8, $Ew = null, $YK = null)
    {
        static::string($zw, $Ew, $YK);
        if (\preg_match($Y8, $zw)) {
            goto Q2k;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\x61\x6c\x75\x65\40\42\x25\x73\42\40\144\157\145\163\40\x6e\157\164\x20\155\141\164\143\150\40\x65\x78\160\162\145\x73\163\151\x6f\x6e\56"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_REGEX, $YK, array("\160\x61\164\x74\x65\162\x6e" => $Y8));
        Q2k:
        return true;
    }
    public static function length($zw, $SS, $Ew = null, $YK = null, $Gz = "\165\164\146\70")
    {
        static::string($zw, $Ew, $YK);
        if (!(\mb_strlen($zw, $Gz) !== $SS)) {
            goto IHC;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\x61\154\165\145\x20\42\45\163\42\x20\x68\141\163\x20\164\157\x20\x62\x65\x20\x25\x64\x20\x65\x78\x61\143\x74\x6c\x79\x20\143\x68\x61\x72\141\143\164\x65\x72\x73\40\154\x6f\156\x67\54\40\142\x75\164\x20\154\145\156\147\x74\x68\x20\x69\x73\40\45\x64\x2e"), static::stringify($zw), $SS, \mb_strlen($zw, $Gz));
        throw static::createException($zw, $Ew, static::INVALID_LENGTH, $YK, array("\x6c\145\x6e\147\164\150" => $SS, "\145\156\x63\x6f\x64\x69\156\x67" => $Gz));
        IHC:
        return true;
    }
    public static function minLength($zw, $xp, $Ew = null, $YK = null, $Gz = "\x75\164\x66\x38")
    {
        static::string($zw, $Ew, $YK);
        if (!(\mb_strlen($zw, $Gz) < $xp)) {
            goto P4w;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\141\x6c\165\145\x20\x22\45\163\x22\40\151\x73\x20\x74\x6f\x6f\40\163\x68\157\162\164\54\x20\151\x74\40\163\x68\x6f\x75\x6c\144\x20\x68\141\166\145\40\141\x74\40\x6c\x65\141\163\x74\40\x25\x64\40\143\150\141\162\x61\143\164\x65\x72\x73\54\x20\142\165\x74\40\157\x6e\x6c\x79\40\x68\141\x73\x20\45\144\x20\x63\150\x61\x72\x61\143\164\145\x72\x73\56"), static::stringify($zw), $xp, \mb_strlen($zw, $Gz));
        throw static::createException($zw, $Ew, static::INVALID_MIN_LENGTH, $YK, array("\x6d\151\x6e\x5f\x6c\145\156\x67\x74\150" => $xp, "\x65\x6e\143\x6f\144\x69\156\147" => $Gz));
        P4w:
        return true;
    }
    public static function maxLength($zw, $qX, $Ew = null, $YK = null, $Gz = "\165\x74\146\x38")
    {
        static::string($zw, $Ew, $YK);
        if (!(\mb_strlen($zw, $Gz) > $qX)) {
            goto bmz;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\141\x6c\x75\145\40\42\45\163\x22\40\151\163\40\164\157\x6f\40\154\x6f\x6e\x67\54\40\x69\164\x20\x73\x68\x6f\x75\x6c\144\40\x68\x61\x76\145\40\x6e\x6f\40\x6d\157\162\145\x20\x74\x68\x61\156\x20\x25\144\40\x63\150\141\162\141\x63\164\x65\162\x73\54\x20\142\x75\164\x20\x68\x61\x73\x20\45\144\x20\x63\150\141\162\x61\x63\x74\145\x72\x73\x2e"), static::stringify($zw), $qX, \mb_strlen($zw, $Gz));
        throw static::createException($zw, $Ew, static::INVALID_MAX_LENGTH, $YK, array("\155\141\170\x5f\154\x65\x6e\147\164\x68" => $qX, "\145\156\143\157\x64\151\156\147" => $Gz));
        bmz:
        return true;
    }
    public static function betweenLength($zw, $xp, $qX, $Ew = null, $YK = null, $Gz = "\165\164\x66\70")
    {
        static::string($zw, $Ew, $YK);
        static::minLength($zw, $xp, $Ew, $YK, $Gz);
        static::maxLength($zw, $qX, $Ew, $YK, $Gz);
        return true;
    }
    public static function startsWith($lR, $UE, $Ew = null, $YK = null, $Gz = "\165\x74\x66\70")
    {
        static::string($lR, $Ew, $YK);
        if (!(0 !== \mb_strpos($lR, $UE, null, $Gz))) {
            goto PZc;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\141\x6c\x75\145\x20\42\x25\163\42\40\144\157\145\163\40\156\157\164\40\163\x74\141\x72\164\40\x77\x69\164\x68\40\42\45\163\42\x2e"), static::stringify($lR), static::stringify($UE));
        throw static::createException($lR, $Ew, static::INVALID_STRING_START, $YK, array("\x6e\x65\145\x64\154\x65" => $UE, "\145\x6e\x63\157\x64\151\x6e\x67" => $Gz));
        PZc:
        return true;
    }
    public static function endsWith($lR, $UE, $Ew = null, $YK = null, $Gz = "\165\x74\x66\70")
    {
        static::string($lR, $Ew, $YK);
        $FV = \mb_strlen($lR, $Gz) - \mb_strlen($UE, $Gz);
        if (!(\mb_strripos($lR, $UE, null, $Gz) !== $FV)) {
            goto J9c;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\141\154\165\x65\x20\x22\x25\x73\x22\40\144\x6f\x65\x73\x20\156\157\164\40\x65\156\x64\x20\x77\151\x74\x68\40\x22\x25\x73\42\56"), static::stringify($lR), static::stringify($UE));
        throw static::createException($lR, $Ew, static::INVALID_STRING_END, $YK, array("\x6e\x65\145\x64\154\x65" => $UE, "\145\156\x63\x6f\144\x69\x6e\x67" => $Gz));
        J9c:
        return true;
    }
    public static function contains($lR, $UE, $Ew = null, $YK = null, $Gz = "\x75\164\x66\70")
    {
        static::string($lR, $Ew, $YK);
        if (!(false === \mb_strpos($lR, $UE, null, $Gz))) {
            goto SHi;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\141\x6c\165\x65\x20\x22\x25\163\x22\40\144\x6f\x65\x73\40\x6e\157\164\x20\143\x6f\156\x74\x61\x69\x6e\x20\42\45\x73\42\x2e"), static::stringify($lR), static::stringify($UE));
        throw static::createException($lR, $Ew, static::INVALID_STRING_CONTAINS, $YK, array("\x6e\145\145\144\154\x65" => $UE, "\145\x6e\x63\x6f\144\x69\156\x67" => $Gz));
        SHi:
        return true;
    }
    public static function choice($zw, array $c_, $Ew = null, $YK = null)
    {
        if (\in_array($zw, $c_, true)) {
            goto RhF;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\x61\154\165\145\40\x22\x25\x73\42\40\x69\x73\x20\156\157\164\40\x61\x6e\40\x65\x6c\x65\155\x65\156\164\x20\157\146\x20\x74\x68\x65\x20\x76\x61\154\x69\144\x20\x76\141\154\x75\x65\x73\x3a\40\x25\x73"), static::stringify($zw), \implode("\54\40", \array_map(array(\get_called_class(), "\x73\x74\162\151\156\147\x69\x66\171"), $c_)));
        throw static::createException($zw, $Ew, static::INVALID_CHOICE, $YK, array("\143\150\x6f\x69\x63\145\x73" => $c_));
        RhF:
        return true;
    }
    public static function inArray($zw, array $c_, $Ew = null, $YK = null)
    {
        return static::choice($zw, $c_, $Ew, $YK);
    }
    public static function numeric($zw, $Ew = null, $YK = null)
    {
        if (\is_numeric($zw)) {
            goto Zz9;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\141\x6c\165\145\x20\42\x25\x73\42\40\151\163\40\156\157\164\x20\156\165\155\x65\162\x69\x63\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_NUMERIC, $YK);
        Zz9:
        return true;
    }
    public static function isResource($zw, $Ew = null, $YK = null)
    {
        if (\is_resource($zw)) {
            goto HlI;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\x61\x6c\x75\x65\40\42\45\163\42\40\151\163\x20\x6e\x6f\x74\40\x61\x20\x72\x65\x73\157\165\x72\x63\x65\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_RESOURCE, $YK);
        HlI:
        return true;
    }
    public static function isArray($zw, $Ew = null, $YK = null)
    {
        if (\is_array($zw)) {
            goto My5;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\x61\154\x75\x65\40\x22\x25\163\x22\x20\151\x73\x20\x6e\x6f\164\40\x61\156\x20\141\x72\x72\x61\x79\56"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_ARRAY, $YK);
        My5:
        return true;
    }
    public static function isTraversable($zw, $Ew = null, $YK = null)
    {
        if (!(!\is_array($zw) && !$zw instanceof \Traversable)) {
            goto bUI;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\x61\154\165\145\40\42\x25\163\x22\x20\x69\163\40\156\157\164\40\141\156\x20\141\162\162\x61\171\40\141\x6e\x64\40\144\157\x65\x73\x20\156\157\164\x20\x69\155\x70\x6c\145\x6d\145\156\x74\40\x54\162\x61\166\x65\162\x73\141\x62\x6c\145\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_TRAVERSABLE, $YK);
        bUI:
        return true;
    }
    public static function isArrayAccessible($zw, $Ew = null, $YK = null)
    {
        if (!(!\is_array($zw) && !$zw instanceof \ArrayAccess)) {
            goto hDt;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\x61\154\165\x65\x20\x22\x25\x73\x22\40\151\x73\x20\156\x6f\164\40\x61\156\x20\141\162\162\x61\171\40\141\156\144\x20\x64\x6f\145\163\x20\156\157\164\x20\151\x6d\160\154\x65\155\x65\x6e\x74\x20\101\x72\x72\141\x79\x41\143\143\x65\163\x73\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_ARRAY_ACCESSIBLE, $YK);
        hDt:
        return true;
    }
    public static function keyExists($zw, $k3, $Ew = null, $YK = null)
    {
        static::isArray($zw, $Ew, $YK);
        if (\array_key_exists($k3, $zw)) {
            goto A4d;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\101\162\x72\x61\171\40\x64\157\145\163\x20\x6e\157\164\40\143\157\156\164\x61\151\x6e\40\x61\156\40\x65\x6c\x65\x6d\145\156\x74\40\x77\151\164\x68\x20\x6b\145\171\x20\42\x25\163\x22"), static::stringify($k3));
        throw static::createException($zw, $Ew, static::INVALID_KEY_EXISTS, $YK, array("\x6b\145\x79" => $k3));
        A4d:
        return true;
    }
    public static function keyNotExists($zw, $k3, $Ew = null, $YK = null)
    {
        static::isArray($zw, $Ew, $YK);
        if (!\array_key_exists($k3, $zw)) {
            goto hXX;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\101\162\x72\141\171\40\143\x6f\156\x74\x61\x69\x6e\x73\x20\141\156\40\x65\x6c\145\x6d\x65\x6e\164\x20\x77\151\164\x68\40\x6b\x65\171\40\42\45\x73\42"), static::stringify($k3));
        throw static::createException($zw, $Ew, static::INVALID_KEY_NOT_EXISTS, $YK, array("\x6b\x65\x79" => $k3));
        hXX:
        return true;
    }
    public static function keyIsset($zw, $k3, $Ew = null, $YK = null)
    {
        static::isArrayAccessible($zw, $Ew, $YK);
        if (isset($zw[$k3])) {
            goto lx0;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x54\x68\145\x20\x65\154\x65\155\145\156\164\x20\167\151\x74\150\40\x6b\145\171\40\42\x25\x73\42\40\x77\141\163\x20\x6e\157\164\40\x66\x6f\165\x6e\x64"), static::stringify($k3));
        throw static::createException($zw, $Ew, static::INVALID_KEY_ISSET, $YK, array("\x6b\x65\171" => $k3));
        lx0:
        return true;
    }
    public static function notEmptyKey($zw, $k3, $Ew = null, $YK = null)
    {
        static::keyIsset($zw, $k3, $Ew, $YK);
        static::notEmpty($zw[$k3], $Ew, $YK);
        return true;
    }
    public static function notBlank($zw, $Ew = null, $YK = null)
    {
        if (!(false === $zw || empty($zw) && "\x30" != $zw || \is_string($zw) && '' === \trim($zw))) {
            goto tth;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\141\154\x75\145\40\42\45\x73\42\x20\x69\x73\x20\x62\154\141\156\153\x2c\x20\x62\165\x74\40\x77\x61\163\40\x65\170\x70\x65\x63\164\x65\x64\40\164\157\x20\x63\157\156\x74\141\151\156\x20\141\x20\166\x61\154\x75\145\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_NOT_BLANK, $YK);
        tth:
        return true;
    }
    public static function isInstanceOf($zw, $B_, $Ew = null, $YK = null)
    {
        if ($zw instanceof $B_) {
            goto jh_;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x43\x6c\141\x73\163\40\x22\x25\x73\x22\40\x77\x61\163\40\145\x78\160\x65\143\x74\145\x64\40\x74\x6f\40\x62\x65\40\x69\156\x73\x74\x61\x6e\143\145\157\146\x20\157\x66\x20\x22\45\163\42\40\x62\165\x74\40\151\x73\40\156\x6f\164\x2e"), static::stringify($zw), $B_);
        throw static::createException($zw, $Ew, static::INVALID_INSTANCE_OF, $YK, array("\143\x6c\x61\163\x73" => $B_));
        jh_:
        return true;
    }
    public static function notIsInstanceOf($zw, $B_, $Ew = null, $YK = null)
    {
        if (!$zw instanceof $B_) {
            goto PER;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\103\154\x61\163\x73\40\x22\x25\x73\x22\40\x77\141\163\x20\x6e\x6f\x74\x20\x65\170\160\x65\143\x74\145\144\x20\x74\x6f\x20\x62\x65\40\151\156\163\x74\x61\156\x63\x65\157\x66\x20\x6f\146\x20\42\x25\x73\42\x2e"), static::stringify($zw), $B_);
        throw static::createException($zw, $Ew, static::INVALID_NOT_INSTANCE_OF, $YK, array("\143\x6c\141\x73\163" => $B_));
        PER:
        return true;
    }
    public static function subclassOf($zw, $B_, $Ew = null, $YK = null)
    {
        if (\is_subclass_of($zw, $B_)) {
            goto qEt;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x43\x6c\141\x73\163\40\42\x25\163\x22\40\x77\141\x73\x20\145\x78\x70\x65\143\164\x65\144\40\x74\x6f\x20\142\x65\x20\x73\165\x62\x63\154\141\x73\x73\x20\157\146\x20\42\45\x73\42\56"), static::stringify($zw), $B_);
        throw static::createException($zw, $Ew, static::INVALID_SUBCLASS_OF, $YK, array("\x63\154\141\x73\x73" => $B_));
        qEt:
        return true;
    }
    public static function range($zw, $cK, $fg, $Ew = null, $YK = null)
    {
        static::numeric($zw, $Ew, $YK);
        if (!($zw < $cK || $zw > $fg)) {
            goto ya1;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x4e\x75\155\142\145\162\x20\42\45\163\42\40\167\141\x73\40\x65\x78\160\x65\x63\164\x65\x64\40\164\157\40\x62\x65\x20\141\164\40\x6c\x65\141\x73\164\x20\x22\x25\x64\42\40\141\156\144\40\x61\x74\x20\x6d\157\x73\164\x20\42\x25\144\x22\x2e"), static::stringify($zw), static::stringify($cK), static::stringify($fg));
        throw static::createException($zw, $Ew, static::INVALID_RANGE, $YK, array("\155\x69\156" => $cK, "\x6d\141\170" => $fg));
        ya1:
        return true;
    }
    public static function min($zw, $cK, $Ew = null, $YK = null)
    {
        static::numeric($zw, $Ew, $YK);
        if (!($zw < $cK)) {
            goto Img;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x4e\165\155\x62\145\162\x20\x22\45\163\x22\x20\167\141\163\40\x65\170\160\145\143\164\x65\x64\40\x74\157\x20\142\145\40\x61\x74\40\154\145\141\163\164\x20\42\x25\x73\42\56"), static::stringify($zw), static::stringify($cK));
        throw static::createException($zw, $Ew, static::INVALID_MIN, $YK, array("\x6d\151\x6e" => $cK));
        Img:
        return true;
    }
    public static function max($zw, $fg, $Ew = null, $YK = null)
    {
        static::numeric($zw, $Ew, $YK);
        if (!($zw > $fg)) {
            goto vmd;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x4e\165\x6d\142\145\162\40\42\45\163\42\x20\x77\x61\x73\40\x65\170\x70\145\x63\x74\x65\x64\40\164\x6f\40\x62\145\x20\x61\164\40\x6d\x6f\163\164\40\42\x25\163\42\x2e"), static::stringify($zw), static::stringify($fg));
        throw static::createException($zw, $Ew, static::INVALID_MAX, $YK, array("\155\x61\x78" => $fg));
        vmd:
        return true;
    }
    public static function file($zw, $Ew = null, $YK = null)
    {
        static::string($zw, $Ew, $YK);
        static::notEmpty($zw, $Ew, $YK);
        if (\is_file($zw)) {
            goto Jtm;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x46\x69\154\145\x20\42\45\x73\42\40\x77\141\x73\40\x65\x78\x70\145\143\x74\x65\x64\40\x74\x6f\40\x65\170\151\x73\164\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_FILE, $YK);
        Jtm:
        return true;
    }
    public static function directory($zw, $Ew = null, $YK = null)
    {
        static::string($zw, $Ew, $YK);
        if (\is_dir($zw)) {
            goto i_y;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\120\141\x74\150\x20\42\x25\163\x22\x20\167\141\x73\40\145\170\160\x65\x63\x74\x65\144\x20\x74\157\40\142\x65\40\141\40\x64\x69\x72\x65\143\164\157\x72\x79\56"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_DIRECTORY, $YK);
        i_y:
        return true;
    }
    public static function readable($zw, $Ew = null, $YK = null)
    {
        static::string($zw, $Ew, $YK);
        if (\is_readable($zw)) {
            goto mkV;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\120\141\164\x68\40\x22\x25\x73\42\40\x77\141\163\x20\x65\170\160\x65\143\x74\x65\144\x20\164\x6f\x20\x62\x65\x20\x72\x65\x61\144\x61\142\154\145\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_READABLE, $YK);
        mkV:
        return true;
    }
    public static function writeable($zw, $Ew = null, $YK = null)
    {
        static::string($zw, $Ew, $YK);
        if (\is_writable($zw)) {
            goto lDz;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x50\141\x74\x68\x20\42\x25\163\x22\40\x77\141\163\40\145\x78\160\145\143\164\145\144\x20\164\157\x20\x62\x65\40\x77\162\x69\x74\145\141\142\154\x65\56"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_WRITEABLE, $YK);
        lDz:
        return true;
    }
    public static function email($zw, $Ew = null, $YK = null)
    {
        static::string($zw, $Ew, $YK);
        if (!\filter_var($zw, FILTER_VALIDATE_EMAIL)) {
            goto zSk;
        }
        $Lq = \substr($zw, \strpos($zw, "\x40") + 1);
        if (!(\version_compare(PHP_VERSION, "\65\56\63\56\x33", "\74") && false === \strpos($Lq, "\56"))) {
            goto r1s;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\x61\154\x75\145\40\42\x25\163\42\40\x77\141\x73\x20\145\170\x70\x65\143\164\145\144\40\164\x6f\x20\142\145\40\141\40\x76\x61\x6c\151\x64\40\x65\x2d\155\141\x69\154\40\x61\x64\144\162\145\163\x73\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_EMAIL, $YK);
        r1s:
        goto IgV;
        zSk:
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\141\x6c\x75\x65\40\42\45\163\42\40\x77\141\163\40\x65\170\x70\145\143\x74\x65\x64\40\164\x6f\40\142\x65\x20\x61\40\x76\141\x6c\x69\144\x20\x65\x2d\155\141\x69\154\40\x61\x64\144\162\x65\x73\163\56"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_EMAIL, $YK);
        IgV:
        return true;
    }
    public static function url($zw, $Ew = null, $YK = null)
    {
        static::string($zw, $Ew, $YK);
        $No = array("\x68\x74\x74\x70", "\150\x74\164\x70\163");
        $Y8 = "\x7e\x5e\12\x20\40\x20\x20\x20\x20\40\40\x20\40\x20\40\50\45\163\x29\72\57\57\x20\40\40\x20\x20\40\x20\x20\x20\40\40\40\x20\x20\40\x20\40\40\40\x20\40\40\40\40\40\40\40\x20\40\40\40\40\40\40\40\x20\40\43\40\160\x72\x6f\164\157\143\157\154\xa\40\x20\40\x20\40\x20\x20\40\x20\x20\x20\40\50\x28\x5b\134\x2e\134\x70\114\134\160\x4e\x2d\x5d\53\x3a\x29\77\50\133\134\56\134\x70\114\x5c\160\116\x2d\x5d\x2b\51\100\x29\77\x20\40\x20\x20\40\40\40\x20\40\40\43\40\x62\x61\163\151\143\40\141\165\x74\x68\xa\x20\x20\x20\x20\40\x20\x20\x20\x20\40\x20\40\50\xa\40\x20\40\40\40\x20\40\x20\x20\x20\x20\x20\40\40\40\x20\x28\x5b\134\x70\x4c\134\160\x4e\x5c\160\x53\55\x5c\x2e\x5d\51\x2b\50\134\56\x3f\x28\133\134\160\x4c\134\160\116\135\174\x78\x6e\x5c\x2d\134\x2d\x5b\134\x70\x4c\x5c\160\116\x2d\135\53\51\x2b\x5c\56\77\51\x20\43\40\141\x20\x64\x6f\155\141\x69\x6e\x20\156\141\155\145\xa\40\x20\x20\x20\x20\x20\40\x20\x20\40\x20\40\40\x20\x20\x20\x20\x20\40\x20\x7c\x20\x20\x20\40\40\x20\40\x20\40\x20\40\40\x20\x20\40\40\40\x20\40\40\40\x20\40\x20\40\x20\x20\40\x20\x20\x20\x20\x20\40\40\x20\40\x20\x20\40\40\x20\40\40\x20\40\40\40\40\43\40\x6f\162\12\40\x20\40\x20\40\40\x20\40\40\40\40\40\40\40\x20\x20\x5c\x64\x7b\61\x2c\63\175\x5c\x2e\134\x64\173\x31\x2c\63\x7d\x5c\x2e\x5c\144\173\61\x2c\63\x7d\x5c\56\134\144\x7b\x31\54\x33\175\40\x20\40\40\40\40\x20\x20\40\x20\x20\x20\40\40\40\x20\x20\x20\x20\x20\43\x20\x61\x6e\x20\111\x50\x20\x61\144\144\162\x65\x73\x73\xa\40\40\x20\x20\40\x20\x20\x20\40\x20\40\40\x20\x20\40\40\40\x20\x20\40\174\x20\40\40\x20\40\x20\x20\40\x20\x20\40\x20\40\x20\40\40\40\x20\40\x20\40\x20\x20\40\x20\x20\x20\x20\x20\x20\40\40\40\40\40\x20\x20\x20\40\x20\x20\x20\x20\40\40\40\40\x20\x20\x23\x20\x6f\162\12\40\40\x20\x20\x20\x20\x20\40\40\x20\x20\x20\x20\x20\x20\x20\134\133\xa\40\x20\40\x20\40\x20\x20\40\40\x20\40\40\x20\40\x20\40\40\x20\40\x20\x28\77\x3a\x28\77\x3a\50\x3f\x3a\x28\77\72\x28\x3f\x3a\x28\x3f\x3a\50\x3f\72\x5b\60\x2d\71\141\x2d\x66\x5d\173\61\54\64\175\x29\x29\72\x29\173\x36\x7d\51\50\77\x3a\50\x3f\72\50\77\x3a\x28\77\x3a\50\x3f\72\133\60\55\x39\x61\55\x66\x5d\x7b\x31\54\x34\175\x29\51\72\50\x3f\x3a\50\x3f\x3a\x5b\x30\55\x39\141\55\x66\135\173\61\x2c\x34\175\x29\51\51\174\x28\x3f\72\x28\x3f\x3a\50\x3f\x3a\50\77\x3a\50\x3f\72\x32\65\x5b\60\55\x35\135\x7c\x28\x3f\72\133\61\x2d\x39\135\x7c\x31\133\60\55\x39\x5d\x7c\x32\x5b\60\55\x34\x5d\x29\77\133\60\55\x39\135\51\51\x5c\x2e\51\173\63\175\50\77\x3a\50\x3f\x3a\62\x35\133\60\55\x35\x5d\x7c\x28\77\x3a\133\x31\55\71\x5d\x7c\61\133\60\x2d\71\x5d\174\62\x5b\x30\x2d\64\135\51\77\133\60\x2d\71\x5d\x29\x29\51\x29\51\51\x29\174\x28\x3f\x3a\50\77\x3a\x3a\72\x28\77\x3a\50\x3f\72\50\77\72\x5b\60\x2d\x39\x61\x2d\x66\135\173\x31\54\64\175\51\x29\72\x29\x7b\65\175\x29\x28\77\72\x28\77\x3a\x28\77\x3a\x28\x3f\x3a\x28\77\x3a\133\x30\x2d\71\x61\x2d\146\x5d\173\61\54\64\175\x29\51\x3a\x28\x3f\x3a\50\77\72\133\x30\55\x39\141\55\146\x5d\173\61\54\x34\175\51\51\51\x7c\x28\77\x3a\x28\77\72\x28\77\72\x28\77\72\50\77\x3a\x32\65\133\60\55\x35\x5d\x7c\x28\77\x3a\133\61\x2d\71\135\174\61\x5b\60\x2d\71\135\x7c\x32\x5b\60\x2d\64\x5d\51\77\133\x30\x2d\71\135\x29\51\134\56\51\x7b\63\x7d\x28\x3f\x3a\x28\77\72\x32\x35\x5b\60\x2d\65\135\x7c\x28\x3f\72\x5b\61\55\71\135\x7c\61\x5b\x30\x2d\x39\x5d\174\62\133\x30\55\64\135\51\77\133\60\55\71\135\x29\x29\51\x29\x29\x29\51\x7c\50\x3f\x3a\50\x3f\x3a\50\77\x3a\x28\77\x3a\50\x3f\72\x5b\x30\x2d\71\141\55\146\135\173\x31\54\x34\175\x29\51\x29\77\72\x3a\50\77\x3a\x28\x3f\x3a\50\77\72\x5b\x30\55\71\141\x2d\146\135\x7b\61\54\x34\175\51\51\72\51\x7b\64\x7d\x29\50\x3f\x3a\50\x3f\x3a\x28\x3f\72\50\77\x3a\x28\77\x3a\133\x30\x2d\71\141\55\146\135\173\61\54\x34\175\51\x29\72\50\77\x3a\x28\x3f\72\x5b\60\55\x39\141\x2d\x66\x5d\x7b\x31\54\64\175\x29\51\51\x7c\50\77\72\50\x3f\72\50\77\72\50\x3f\72\x28\x3f\72\62\65\x5b\x30\55\x35\135\x7c\x28\77\x3a\133\x31\55\71\x5d\x7c\61\x5b\60\x2d\x39\x5d\x7c\x32\133\x30\55\x34\x5d\51\x3f\133\x30\x2d\71\135\x29\51\x5c\x2e\51\173\x33\175\x28\77\x3a\x28\x3f\72\x32\x35\x5b\60\55\x35\135\174\50\x3f\72\133\x31\55\x39\135\x7c\x31\x5b\x30\x2d\x39\135\x7c\x32\133\60\x2d\x34\135\x29\77\133\60\55\x39\135\x29\x29\51\x29\x29\x29\x29\174\x28\x3f\x3a\50\x3f\72\x28\x3f\72\50\x3f\72\50\x3f\x3a\50\77\x3a\133\x30\x2d\x39\x61\x2d\146\135\173\61\x2c\64\175\x29\51\72\51\173\x30\54\x31\x7d\x28\x3f\x3a\x28\x3f\x3a\133\x30\x2d\x39\141\x2d\146\x5d\x7b\x31\x2c\64\x7d\51\x29\51\x3f\x3a\x3a\x28\x3f\x3a\50\x3f\x3a\x28\77\72\133\60\x2d\71\141\x2d\146\135\x7b\61\x2c\x34\175\x29\x29\x3a\x29\x7b\63\175\x29\x28\77\72\50\77\72\x28\x3f\72\x28\x3f\x3a\50\77\72\133\x30\55\x39\x61\55\x66\x5d\173\61\x2c\64\x7d\x29\51\72\x28\77\x3a\50\x3f\x3a\133\x30\x2d\71\x61\55\x66\135\x7b\61\x2c\64\x7d\51\x29\51\x7c\50\77\x3a\50\x3f\72\x28\77\x3a\x28\77\x3a\x28\77\x3a\62\65\133\60\55\65\x5d\174\50\x3f\x3a\x5b\61\55\x39\135\x7c\61\x5b\x30\x2d\71\x5d\174\x32\x5b\60\55\x34\135\51\x3f\133\x30\x2d\71\135\51\51\134\56\51\173\x33\x7d\50\x3f\x3a\50\77\72\x32\65\133\x30\x2d\65\135\x7c\x28\77\x3a\x5b\x31\55\x39\x5d\174\61\x5b\x30\55\x39\x5d\x7c\x32\x5b\x30\x2d\x34\135\51\77\133\x30\55\x39\x5d\51\x29\51\51\x29\x29\x29\174\50\x3f\x3a\x28\x3f\x3a\x28\77\x3a\50\x3f\72\x28\x3f\72\50\x3f\x3a\x5b\60\x2d\71\x61\x2d\146\135\173\61\x2c\x34\175\51\x29\x3a\x29\x7b\x30\54\62\x7d\50\x3f\x3a\50\77\72\x5b\60\55\71\x61\55\146\135\173\x31\x2c\x34\175\51\x29\51\77\72\72\x28\77\72\50\77\x3a\50\77\72\x5b\x30\x2d\71\141\55\146\x5d\173\x31\54\x34\175\x29\51\72\51\173\x32\175\51\x28\77\x3a\50\x3f\72\50\x3f\72\50\x3f\72\50\77\72\x5b\x30\x2d\71\141\x2d\146\x5d\x7b\x31\x2c\64\x7d\x29\51\72\x28\x3f\72\x28\77\x3a\133\x30\x2d\x39\141\55\146\135\173\61\54\64\175\51\51\51\174\x28\x3f\x3a\50\x3f\x3a\50\77\x3a\x28\x3f\x3a\50\77\72\62\65\133\x30\55\65\135\x7c\x28\77\72\x5b\x31\55\x39\135\174\x31\x5b\60\x2d\x39\135\x7c\x32\x5b\60\x2d\x34\x5d\51\77\133\x30\55\x39\135\51\x29\134\56\51\173\x33\175\x28\x3f\72\x28\77\x3a\x32\65\133\60\x2d\x35\x5d\174\x28\77\x3a\x5b\61\x2d\71\135\174\61\x5b\x30\x2d\71\x5d\x7c\62\x5b\x30\55\x34\x5d\x29\77\x5b\x30\55\71\135\51\x29\x29\51\51\x29\x29\174\x28\x3f\x3a\50\77\x3a\x28\x3f\72\x28\x3f\72\x28\77\x3a\x28\77\x3a\133\60\x2d\x39\141\55\146\135\x7b\61\54\64\175\51\x29\72\x29\x7b\60\54\x33\x7d\x28\x3f\x3a\x28\77\72\x5b\60\x2d\71\141\55\x66\x5d\x7b\61\54\64\175\51\51\51\x3f\x3a\x3a\x28\x3f\72\x28\77\x3a\x5b\60\55\x39\141\55\x66\x5d\x7b\x31\x2c\x34\175\x29\51\x3a\x29\x28\x3f\72\x28\x3f\x3a\50\x3f\x3a\x28\x3f\72\50\77\72\133\x30\55\71\x61\x2d\x66\135\173\61\54\64\x7d\51\51\x3a\50\x3f\x3a\x28\x3f\x3a\x5b\x30\55\x39\x61\55\x66\x5d\173\61\x2c\x34\x7d\51\x29\51\x7c\x28\x3f\x3a\x28\77\x3a\50\x3f\x3a\x28\77\72\x28\77\72\62\x35\133\x30\x2d\65\x5d\174\50\x3f\x3a\x5b\x31\55\71\135\x7c\x31\x5b\60\x2d\71\x5d\x7c\62\x5b\60\x2d\x34\135\x29\x3f\x5b\x30\x2d\71\135\x29\51\x5c\x2e\51\173\x33\175\x28\77\x3a\50\77\72\x32\x35\x5b\x30\x2d\x35\x5d\x7c\50\77\x3a\133\61\x2d\71\x5d\x7c\x31\133\60\x2d\x39\x5d\174\x32\133\60\55\x34\135\x29\77\133\x30\55\x39\135\51\51\51\51\x29\51\51\x7c\50\x3f\x3a\50\77\x3a\50\x3f\x3a\50\x3f\x3a\50\x3f\72\x28\77\x3a\133\x30\x2d\71\141\x2d\x66\135\x7b\x31\x2c\64\175\x29\x29\x3a\x29\173\x30\x2c\64\175\50\77\72\x28\x3f\x3a\133\60\x2d\x39\141\x2d\146\x5d\x7b\x31\54\64\175\51\x29\x29\x3f\x3a\x3a\x29\x28\x3f\72\50\77\x3a\x28\77\72\x28\x3f\72\50\77\72\133\60\55\x39\x61\55\x66\x5d\173\x31\x2c\64\x7d\51\51\x3a\x28\x3f\x3a\50\77\x3a\133\60\55\x39\x61\x2d\x66\x5d\x7b\61\54\x34\175\51\51\x29\x7c\50\x3f\72\50\77\72\50\77\x3a\x28\77\72\x28\77\72\62\x35\x5b\x30\x2d\x35\135\174\x28\77\72\133\x31\x2d\x39\135\x7c\61\133\x30\55\71\x5d\174\62\x5b\x30\55\x34\x5d\51\x3f\133\60\55\71\135\51\x29\134\x2e\x29\x7b\x33\x7d\x28\x3f\72\50\x3f\72\62\x35\x5b\x30\x2d\x35\135\x7c\x28\77\x3a\133\x31\x2d\x39\x5d\174\x31\133\60\x2d\x39\x5d\174\62\x5b\60\55\64\135\51\77\133\x30\x2d\71\135\51\51\51\51\51\51\51\174\x28\x3f\72\50\x3f\72\x28\77\72\50\x3f\72\x28\x3f\x3a\50\x3f\x3a\133\x30\x2d\71\141\x2d\x66\135\x7b\61\x2c\x34\175\x29\51\72\51\x7b\x30\54\65\x7d\x28\x3f\72\x28\77\72\133\x30\x2d\x39\141\x2d\146\x5d\x7b\61\54\x34\175\x29\51\51\x3f\72\x3a\51\50\x3f\72\50\77\72\x5b\x30\x2d\71\x61\x2d\146\135\173\x31\x2c\x34\175\x29\x29\51\x7c\x28\77\72\50\x3f\x3a\50\77\x3a\50\x3f\x3a\x28\77\72\50\77\x3a\133\x30\55\x39\x61\55\146\135\x7b\x31\54\x34\x7d\x29\x29\72\x29\x7b\x30\x2c\66\175\x28\x3f\x3a\50\x3f\x3a\x5b\x30\55\x39\x61\55\146\135\x7b\61\54\64\x7d\x29\51\51\x3f\x3a\72\51\51\x29\x29\xa\x20\x20\x20\x20\x20\40\40\40\40\40\x20\40\40\x20\x20\40\x5c\x5d\40\40\43\x20\141\156\40\111\x50\166\x36\x20\x61\144\x64\x72\145\163\x73\xa\40\x20\40\x20\40\40\40\40\40\x20\x20\x20\x29\12\x20\x20\x20\x20\40\40\x20\x20\40\x20\40\40\50\x3a\x5b\x30\x2d\x39\135\53\x29\77\x20\x20\40\x20\40\x20\40\x20\40\40\40\x20\40\40\40\40\40\40\40\x20\40\40\40\40\40\40\x20\40\x20\x20\x23\x20\141\x20\x70\x6f\162\x74\40\50\157\x70\x74\151\x6f\156\x61\154\51\12\40\40\x20\40\x20\40\40\40\40\40\40\x20\x28\x2f\77\x7c\x2f\x5c\x53\53\x7c\134\77\134\x53\x2a\174\134\43\x5c\x53\x2a\x29\x20\x20\40\40\40\40\40\x20\x20\x20\x20\40\40\40\40\x20\40\x20\x20\43\x20\141\40\x2f\x2c\x20\x6e\157\164\150\x69\x6e\147\x2c\40\x61\40\57\x20\167\x69\x74\x68\x20\163\x6f\x6d\145\164\x68\151\x6e\147\x2c\40\141\40\161\x75\145\162\x79\x20\x6f\x72\40\141\x20\x66\x72\x61\147\155\x65\156\164\xa\x20\40\40\x20\40\40\x20\40\44\176\x69\170\165";
        $Y8 = \sprintf($Y8, \implode("\x7c", $No));
        if (\preg_match($Y8, $zw)) {
            goto Quy;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\x61\x6c\x75\x65\x20\42\x25\x73\x22\x20\x77\141\163\x20\145\x78\160\145\x63\164\x65\x64\x20\164\x6f\x20\142\145\40\141\40\166\141\x6c\151\x64\x20\125\x52\x4c\40\x73\x74\x61\x72\x74\151\x6e\x67\40\x77\151\x74\x68\x20\150\x74\164\160\x20\x6f\162\40\x68\x74\x74\x70\163"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_URL, $YK);
        Quy:
        return true;
    }
    public static function alnum($zw, $Ew = null, $YK = null)
    {
        try {
            static::regex($zw, "\50\x5e\50\x5b\x61\x2d\x7a\x41\55\x5a\x5d\173\61\x7d\x5b\x61\55\x7a\101\55\x5a\60\x2d\x39\135\52\x29\44\x29", $Ew, $YK);
        } catch (AssertionFailedException $sL) {
            $Ew = \sprintf(static::generateMessage($Ew ?: "\126\x61\154\165\x65\x20\42\45\x73\42\40\x69\x73\x20\156\x6f\x74\x20\141\154\x70\150\141\156\165\x6d\145\162\151\x63\x2c\40\x73\x74\x61\x72\164\151\156\147\40\x77\x69\164\150\40\x6c\145\164\164\145\162\x73\40\141\156\144\40\143\157\156\x74\141\x69\x6e\151\156\x67\40\157\156\154\x79\40\154\145\164\164\145\162\x73\x20\141\156\x64\40\x6e\x75\155\142\x65\x72\x73\x2e"), static::stringify($zw));
            throw static::createException($zw, $Ew, static::INVALID_ALNUM, $YK);
        }
        return true;
    }
    public static function true($zw, $Ew = null, $YK = null)
    {
        if (!(true !== $zw)) {
            goto m6Y;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\141\154\165\145\40\42\45\163\x22\40\x69\163\40\156\x6f\164\40\x54\122\x55\x45\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_TRUE, $YK);
        m6Y:
        return true;
    }
    public static function false($zw, $Ew = null, $YK = null)
    {
        if (!(false !== $zw)) {
            goto ssu;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\141\x6c\x75\x65\40\x22\x25\x73\x22\40\151\163\x20\x6e\x6f\164\x20\106\101\114\123\x45\56"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_FALSE, $YK);
        ssu:
        return true;
    }
    public static function classExists($zw, $Ew = null, $YK = null)
    {
        if (\class_exists($zw)) {
            goto S1f;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\103\x6c\x61\163\x73\x20\x22\45\x73\42\x20\144\x6f\145\x73\x20\x6e\157\164\40\x65\170\x69\163\164\56"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_CLASS, $YK);
        S1f:
        return true;
    }
    public static function interfaceExists($zw, $Ew = null, $YK = null)
    {
        if (\interface_exists($zw)) {
            goto W_y;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\111\156\x74\x65\x72\146\x61\143\145\40\x22\45\x73\42\40\144\157\145\163\40\156\x6f\164\40\x65\170\x69\163\x74\56"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_INTERFACE, $YK);
        W_y:
        return true;
    }
    public static function implementsInterface($kk, $YQ, $Ew = null, $YK = null)
    {
        $cH = new \ReflectionClass($kk);
        if ($cH->implementsInterface($YQ)) {
            goto ndL;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\103\154\141\163\163\40\x22\x25\x73\42\x20\144\x6f\145\163\x20\x6e\157\164\x20\151\x6d\160\x6c\145\x6d\x65\x6e\x74\40\151\156\x74\145\162\x66\x61\x63\x65\40\42\x25\x73\x22\x2e"), static::stringify($kk), static::stringify($YQ));
        throw static::createException($kk, $Ew, static::INTERFACE_NOT_IMPLEMENTED, $YK, array("\151\x6e\x74\145\162\x66\141\143\x65" => $YQ));
        ndL:
        return true;
    }
    public static function isJsonString($zw, $Ew = null, $YK = null)
    {
        if (!(null === \json_decode($zw) && JSON_ERROR_NONE !== \json_last_error())) {
            goto RxT;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\141\154\x75\x65\40\x22\x25\163\42\40\151\163\40\156\x6f\164\40\141\40\x76\141\x6c\x69\x64\x20\112\x53\x4f\x4e\40\x73\164\162\151\156\147\56"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_JSON_STRING, $YK);
        RxT:
        return true;
    }
    public static function uuid($zw, $Ew = null, $YK = null)
    {
        $zw = \str_replace(array("\x75\x72\x6e\72", "\165\165\x69\144\x3a", "\173", "\x7d"), '', $zw);
        if (!("\x30\60\60\60\x30\60\x30\x30\55\60\60\60\60\x2d\60\60\60\60\x2d\60\60\x30\60\x2d\x30\60\60\60\60\60\x30\60\60\x30\60\60" === $zw)) {
            goto QOR;
        }
        return true;
        QOR:
        if (\preg_match("\57\136\x5b\x30\55\71\x41\x2d\106\141\x2d\x66\x5d\173\x38\x7d\55\133\x30\x2d\71\x41\x2d\106\x61\55\146\x5d\x7b\64\x7d\55\x5b\x30\x2d\71\101\x2d\x46\x61\55\146\135\x7b\64\x7d\x2d\133\x30\55\x39\101\x2d\x46\x61\x2d\x66\135\173\64\x7d\55\x5b\60\55\71\101\55\x46\141\55\146\135\173\x31\x32\x7d\44\57", $zw)) {
            goto ktq;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\x61\x6c\x75\145\40\42\x25\163\x22\x20\151\x73\40\156\157\x74\40\141\x20\x76\x61\154\151\144\x20\125\125\x49\x44\56"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_UUID, $YK);
        ktq:
        return true;
    }
    public static function e164($zw, $Ew = null, $YK = null)
    {
        if (\preg_match("\57\x5e\134\x2b\x3f\133\61\55\x39\x5d\x5c\x64\x7b\61\x2c\x31\x34\175\x24\x2f", $zw)) {
            goto KwM;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\141\154\165\145\x20\x22\45\x73\42\40\151\163\x20\x6e\x6f\164\40\x61\40\x76\141\154\151\x64\40\x45\x31\x36\x34\56"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_E164, $YK);
        KwM:
        return true;
    }
    public static function count($AF, $xF, $Ew = null, $YK = null)
    {
        if (!($xF !== \count($AF))) {
            goto SWp;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\114\x69\163\x74\40\x64\x6f\x65\163\x20\x6e\157\164\x20\143\x6f\x6e\x74\141\x69\x6e\40\145\x78\x61\143\164\x6c\x79\x20\45\x64\40\x65\x6c\145\155\145\x6e\x74\x73\40\50\x25\x64\x20\x67\x69\x76\145\x6e\51\x2e"), static::stringify($xF), static::stringify(\count($AF)));
        throw static::createException($AF, $Ew, static::INVALID_COUNT, $YK, array("\x63\157\x75\156\164" => $xF));
        SWp:
        return true;
    }
    public static function __callStatic($CG, $yL)
    {
        if (!(0 === \strpos($CG, "\x6e\x75\x6c\x6c\117\x72"))) {
            goto Yda;
        }
        if (\array_key_exists(0, $yL)) {
            goto aS1;
        }
        throw new BadMethodCallException("\115\151\x73\163\151\x6e\147\40\x74\x68\145\x20\x66\x69\x72\163\164\x20\141\x72\x67\165\x6d\145\156\164\56");
        aS1:
        if (!(null === $yL[0])) {
            goto hDc;
        }
        return true;
        hDc:
        $CG = \substr($CG, 6);
        return \call_user_func_array(array(\get_called_class(), $CG), $yL);
        Yda:
        if (!(0 === \strpos($CG, "\141\154\x6c"))) {
            goto Hsj;
        }
        if (\array_key_exists(0, $yL)) {
            goto rSb;
        }
        throw new BadMethodCallException("\115\151\x73\x73\x69\156\147\40\164\x68\145\40\x66\151\x72\x73\x74\40\x61\x72\147\165\x6d\145\156\164\56");
        rSb:
        static::isTraversable($yL[0]);
        $CG = \substr($CG, 3);
        $Uj = \array_shift($yL);
        $OH = \get_called_class();
        foreach ($Uj as $zw) {
            \call_user_func_array(array($OH, $CG), \array_merge(array($zw), $yL));
            r1v:
        }
        Cx2:
        return true;
        Hsj:
        throw new BadMethodCallException("\x4e\x6f\40\x61\x73\163\145\x72\x74\151\157\x6e\x20\101\163\163\145\162\164\151\157\156\x23" . $CG . "\40\x65\170\x69\163\x74\163\56");
    }
    public static function choicesNotEmpty(array $Uj, array $c_, $Ew = null, $YK = null)
    {
        static::notEmpty($Uj, $Ew, $YK);
        foreach ($c_ as $Db) {
            static::notEmptyKey($Uj, $Db, $Ew, $YK);
            sQD:
        }
        FT1:
        return true;
    }
    public static function methodExists($zw, $yr, $Ew = null, $YK = null)
    {
        static::isObject($yr, $Ew, $YK);
        if (\method_exists($yr, $zw)) {
            goto B9D;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x45\x78\160\x65\x63\164\145\x64\40\42\45\x73\x22\40\144\x6f\x65\x73\40\x6e\x6f\x74\x20\145\x78\151\x73\x74\40\151\x6e\40\160\162\157\x76\x69\144\145\144\x20\x6f\x62\152\x65\143\164\56"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_METHOD, $YK, array("\x6f\142\152\x65\x63\x74" => \get_class($yr)));
        B9D:
        return true;
    }
    public static function isObject($zw, $Ew = null, $YK = null)
    {
        if (\is_object($zw)) {
            goto V1f;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\120\x72\x6f\x76\151\x64\x65\x64\40\x22\x25\x73\x22\x20\x69\163\x20\156\157\164\x20\x61\x20\x76\x61\154\151\x64\40\157\142\x6a\x65\143\164\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_OBJECT, $YK);
        V1f:
        return true;
    }
    public static function lessThan($zw, $Je, $Ew = null, $YK = null)
    {
        if (!($zw >= $Je)) {
            goto dtp;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\120\x72\157\x76\151\144\x65\x64\x20\x22\x25\x73\x22\40\x69\163\x20\156\x6f\x74\40\154\145\163\x73\x20\164\x68\x61\156\x20\x22\x25\x73\x22\x2e"), static::stringify($zw), static::stringify($Je));
        throw static::createException($zw, $Ew, static::INVALID_LESS, $YK, array("\x6c\151\x6d\x69\164" => $Je));
        dtp:
        return true;
    }
    public static function lessOrEqualThan($zw, $Je, $Ew = null, $YK = null)
    {
        if (!($zw > $Je)) {
            goto oVw;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x50\x72\x6f\166\151\x64\x65\x64\40\x22\45\x73\42\40\x69\163\40\x6e\x6f\164\x20\x6c\x65\x73\x73\40\x6f\162\x20\145\x71\165\141\x6c\40\164\150\141\156\x20\x22\45\x73\x22\x2e"), static::stringify($zw), static::stringify($Je));
        throw static::createException($zw, $Ew, static::INVALID_LESS_OR_EQUAL, $YK, array("\x6c\x69\155\x69\164" => $Je));
        oVw:
        return true;
    }
    public static function greaterThan($zw, $Je, $Ew = null, $YK = null)
    {
        if (!($zw <= $Je)) {
            goto kbf;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\120\162\157\x76\x69\144\x65\x64\x20\42\45\x73\42\x20\151\163\40\x6e\157\164\x20\x67\162\x65\x61\164\145\x72\40\x74\x68\141\156\40\x22\x25\163\x22\56"), static::stringify($zw), static::stringify($Je));
        throw static::createException($zw, $Ew, static::INVALID_GREATER, $YK, array("\154\x69\x6d\x69\164" => $Je));
        kbf:
        return true;
    }
    public static function greaterOrEqualThan($zw, $Je, $Ew = null, $YK = null)
    {
        if (!($zw < $Je)) {
            goto WwV;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x50\x72\157\x76\x69\x64\x65\x64\x20\x22\45\163\x22\40\x69\x73\40\156\157\x74\40\147\162\145\x61\164\145\162\x20\157\162\x20\145\x71\165\141\154\40\164\150\141\x6e\40\42\x25\163\x22\56"), static::stringify($zw), static::stringify($Je));
        throw static::createException($zw, $Ew, static::INVALID_GREATER_OR_EQUAL, $YK, array("\154\x69\x6d\x69\x74" => $Je));
        WwV:
        return true;
    }
    public static function between($zw, $M_, $z1, $Ew = null, $YK = null)
    {
        if (!($M_ > $zw || $zw > $z1)) {
            goto shV;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x50\162\157\x76\151\x64\x65\144\x20\x22\45\x73\x22\40\151\163\40\156\145\x69\x74\150\145\x72\x20\147\162\x65\141\164\145\x72\40\164\x68\x61\156\40\x6f\162\40\145\x71\x75\141\154\40\x74\x6f\40\x22\x25\163\x22\40\156\157\162\x20\x6c\145\x73\163\40\164\150\141\x6e\x20\157\162\x20\x65\161\x75\141\154\40\x74\x6f\40\42\45\163\x22\x2e"), static::stringify($zw), static::stringify($M_), static::stringify($z1));
        throw static::createException($zw, $Ew, static::INVALID_BETWEEN, $YK, array("\154\157\167\145\162" => $M_, "\x75\x70\160\145\x72" => $z1));
        shV:
        return true;
    }
    public static function betweenExclusive($zw, $M_, $z1, $Ew = null, $YK = null)
    {
        if (!($M_ >= $zw || $zw >= $z1)) {
            goto SZJ;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x50\x72\x6f\166\151\144\x65\x64\40\42\45\x73\x22\40\151\x73\x20\x6e\145\x69\x74\150\145\162\40\147\x72\x65\141\x74\x65\162\x20\164\150\141\156\40\42\x25\x73\x22\40\156\x6f\162\x20\x6c\145\x73\x73\40\164\x68\141\156\40\x22\45\x73\42\x2e"), static::stringify($zw), static::stringify($M_), static::stringify($z1));
        throw static::createException($zw, $Ew, static::INVALID_BETWEEN_EXCLUSIVE, $YK, array("\x6c\157\167\145\x72" => $M_, "\x75\x70\x70\145\x72" => $z1));
        SZJ:
        return true;
    }
    public static function extensionLoaded($zw, $Ew = null, $YK = null)
    {
        if (\extension_loaded($zw)) {
            goto HLm;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x45\170\164\x65\x6e\x73\x69\157\156\x20\x22\x25\x73\42\x20\151\x73\40\162\x65\161\165\151\162\x65\x64\56"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_EXTENSION, $YK);
        HLm:
        return true;
    }
    public static function date($zw, $WY, $Ew = null, $YK = null)
    {
        static::string($zw, $Ew, $YK);
        static::string($WY, $Ew, $YK);
        $WD = \DateTime::createFromFormat("\41" . $WY, $zw);
        if (!(false === $WD || $zw !== $WD->format($WY))) {
            goto Z1V;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x44\141\x74\x65\40\x22\x25\x73\42\40\x69\x73\40\x69\156\166\141\154\151\144\40\157\x72\40\144\x6f\145\x73\x20\156\x6f\164\x20\x6d\x61\164\x63\150\40\x66\x6f\162\155\x61\x74\40\x22\x25\163\x22\56"), static::stringify($zw), static::stringify($WY));
        throw static::createException($zw, $Ew, static::INVALID_DATE, $YK, array("\146\x6f\x72\x6d\x61\x74" => $WY));
        Z1V:
        return true;
    }
    public static function objectOrClass($zw, $Ew = null, $YK = null)
    {
        if (\is_object($zw)) {
            goto bNq;
        }
        static::classExists($zw, $Ew, $YK);
        bNq:
        return true;
    }
    public static function propertyExists($zw, $RT, $Ew = null, $YK = null)
    {
        static::objectOrClass($zw);
        if (\property_exists($zw, $RT)) {
            goto R3e;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\103\154\141\163\x73\x20\x22\45\163\42\40\144\x6f\145\x73\x20\x6e\x6f\164\x20\x68\x61\x76\x65\40\160\162\x6f\x70\145\162\164\x79\40\x22\x25\x73\42\56"), static::stringify($zw), static::stringify($RT));
        throw static::createException($zw, $Ew, static::INVALID_PROPERTY, $YK, array("\160\162\x6f\160\145\162\164\x79" => $RT));
        R3e:
        return true;
    }
    public static function propertiesExist($zw, array $vC, $Ew = null, $YK = null)
    {
        static::objectOrClass($zw);
        static::allString($vC, $Ew, $YK);
        $G1 = array();
        foreach ($vC as $RT) {
            if (\property_exists($zw, $RT)) {
                goto uYx;
            }
            $G1[] = $RT;
            uYx:
            r9k:
        }
        nkN:
        if (!$G1) {
            goto xY2;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\103\x6c\141\x73\163\40\x22\x25\x73\x22\40\144\157\145\163\40\x6e\157\x74\40\x68\141\166\x65\x20\164\150\x65\163\145\40\160\162\x6f\x70\145\x72\164\151\x65\163\72\x20\x25\163\56"), static::stringify($zw), static::stringify(\implode("\54\x20", $G1)));
        throw static::createException($zw, $Ew, static::INVALID_PROPERTY, $YK, array("\160\162\x6f\x70\145\162\164\x69\145\163" => $vC));
        xY2:
        return true;
    }
    public static function version($Pd, $cl, $E1, $Ew = null, $YK = null)
    {
        static::notEmpty($cl, "\x76\145\162\x73\x69\x6f\156\x43\157\x6d\x70\141\162\145\40\x6f\x70\145\162\x61\x74\157\162\40\151\x73\x20\x72\x65\161\165\151\162\145\x64\40\141\156\x64\x20\x63\x61\x6e\x6e\x6f\x74\40\x62\x65\x20\x65\x6d\160\x74\171\x2e");
        if (!(true !== \version_compare($Pd, $E1, $cl))) {
            goto eIa;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\x65\162\x73\151\x6f\x6e\x20\x22\x25\x73\x22\40\x69\x73\x20\x6e\x6f\164\x20\42\x25\x73\x22\40\x76\x65\x72\163\x69\157\156\x20\x22\45\x73\x22\x2e"), static::stringify($Pd), static::stringify($cl), static::stringify($E1));
        throw static::createException($Pd, $Ew, static::INVALID_VERSION, $YK, array("\x6f\160\145\162\x61\x74\157\162" => $cl, "\166\145\162\163\151\157\x6e" => $E1));
        eIa:
        return true;
    }
    public static function phpVersion($cl, $mb, $Ew = null, $YK = null)
    {
        static::defined("\x50\110\120\137\x56\x45\x52\123\111\117\x4e");
        return static::version(PHP_VERSION, $cl, $mb, $Ew, $YK);
    }
    public static function extensionVersion($xV, $cl, $mb, $Ew = null, $YK = null)
    {
        static::extensionLoaded($xV, $Ew, $YK);
        return static::version(\phpversion($xV), $cl, $mb, $Ew, $YK);
    }
    public static function isCallable($zw, $Ew = null, $YK = null)
    {
        if (\is_callable($zw)) {
            goto hZH;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x50\162\x6f\166\x69\144\x65\x64\x20\42\45\x73\x22\40\151\x73\40\156\157\164\x20\141\40\x63\x61\x6c\x6c\x61\x62\x6c\x65\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_CALLABLE, $YK);
        hZH:
        return true;
    }
    public static function satisfy($zw, $J3, $Ew = null, $YK = null)
    {
        static::isCallable($J3);
        if (!(false === \call_user_func($J3, $zw))) {
            goto r_C;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\120\x72\x6f\166\151\x64\145\x64\40\x22\45\163\42\40\x69\163\40\x69\156\x76\x61\x6c\151\x64\x20\141\x63\143\x6f\x72\x64\x69\156\x67\40\x74\157\x20\x63\165\163\x74\x6f\155\40\162\x75\x6c\x65\56"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_SATISFY, $YK);
        r_C:
        return true;
    }
    public static function ip($zw, $T2 = null, $Ew = null, $YK = null)
    {
        static::string($zw, $Ew, $YK);
        if (\filter_var($zw, FILTER_VALIDATE_IP, $T2)) {
            goto Zaa;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\x61\154\165\145\40\42\45\x73\42\x20\167\141\163\x20\x65\170\160\x65\143\164\145\x64\x20\x74\157\x20\x62\x65\40\141\x20\x76\x61\x6c\x69\144\x20\x49\120\x20\x61\x64\x64\x72\145\x73\x73\x2e"), static::stringify($zw));
        throw static::createException($zw, $Ew, static::INVALID_IP, $YK, array("\x66\x6c\141\x67" => $T2));
        Zaa:
        return true;
    }
    public static function ipv4($zw, $T2 = null, $Ew = null, $YK = null)
    {
        static::ip($zw, $T2 | FILTER_FLAG_IPV4, static::generateMessage($Ew ?: "\126\x61\154\x75\145\40\x22\x25\163\x22\40\x77\141\x73\x20\145\x78\x70\145\x63\164\145\x64\x20\x74\x6f\x20\x62\145\40\141\x20\x76\141\154\x69\x64\40\111\x50\x76\x34\x20\x61\x64\144\x72\145\x73\163\56"), $YK);
        return true;
    }
    public static function ipv6($zw, $T2 = null, $Ew = null, $YK = null)
    {
        static::ip($zw, $T2 | FILTER_FLAG_IPV6, static::generateMessage($Ew ?: "\126\141\154\165\x65\x20\42\x25\163\x22\x20\167\141\163\x20\145\x78\160\x65\x63\x74\x65\x64\x20\164\157\x20\142\145\x20\141\x20\x76\x61\154\151\x64\40\x49\120\166\x36\x20\x61\144\144\162\145\163\x73\x2e"), $YK);
        return true;
    }
    protected static function stringify($zw)
    {
        $Dz = \gettype($zw);
        if (\is_bool($zw)) {
            goto AdW;
        }
        if (\is_scalar($zw)) {
            goto wmG;
        }
        if (\is_array($zw)) {
            goto REp;
        }
        if (\is_object($zw)) {
            goto nwm;
        }
        if (\is_resource($zw)) {
            goto ldd;
        }
        if (null === $zw) {
            goto NLG;
        }
        goto Iop;
        AdW:
        $Dz = $zw ? "\74\x54\x52\125\x45\x3e" : "\x3c\106\x41\114\123\105\x3e";
        goto Iop;
        wmG:
        $N_ = (string) $zw;
        if (!(\strlen($N_) > 100)) {
            goto rJk;
        }
        $N_ = \substr($N_, 0, 97) . "\x2e\x2e\x2e";
        rJk:
        $Dz = $N_;
        goto Iop;
        REp:
        $Dz = "\74\101\x52\x52\x41\x59\x3e";
        goto Iop;
        nwm:
        $Dz = \get_class($zw);
        goto Iop;
        ldd:
        $Dz = \get_resource_type($zw);
        goto Iop;
        NLG:
        $Dz = "\74\116\125\x4c\x4c\76";
        Iop:
        return $Dz;
    }
    public static function defined($hU, $Ew = null, $YK = null)
    {
        if (\defined($hU)) {
            goto q2Y;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\126\141\154\165\x65\40\x22\45\163\x22\40\x65\170\x70\145\x63\x74\x65\144\x20\164\157\40\142\x65\x20\x61\x20\144\x65\146\151\156\145\144\40\143\157\x6e\163\164\141\156\x74\x2e"), $hU);
        throw static::createException($hU, $Ew, static::INVALID_CONSTANT, $YK);
        q2Y:
        return true;
    }
    public static function base64($zw, $Ew = null, $YK = null)
    {
        if (!(false === \base64_decode($zw, true))) {
            goto XU9;
        }
        $Ew = \sprintf(static::generateMessage($Ew ?: "\x56\x61\x6c\x75\x65\x20\x22\45\163\x22\x20\151\x73\x20\156\x6f\164\40\141\40\166\x61\154\x69\144\40\142\141\163\145\x36\64\x20\x73\x74\162\x69\x6e\x67\56"), $zw);
        throw static::createException($zw, $Ew, static::INVALID_BASE64, $YK);
        XU9:
        return true;
    }
    protected static function generateMessage($Ew = null)
    {
        if (!\is_callable($Ew)) {
            goto Lwu;
        }
        $r3 = \debug_backtrace(0);
        $eC = array();
        $cH = new \ReflectionClass($r3[1]["\x63\x6c\x61\x73\163"]);
        $CG = $cH->getMethod($r3[1]["\x66\165\156\143\x74\151\157\156"]);
        foreach ($CG->getParameters() as $gs => $eP) {
            if (!("\155\145\163\x73\x61\147\x65" !== $eP->getName())) {
                goto otf;
            }
            $eC[$eP->getName()] = \array_key_exists($gs, $r3[1]["\141\162\x67\163"]) ? $r3[1]["\141\162\147\x73"][$gs] : $eP->getDefaultValue();
            otf:
            iR7:
        }
        pq9:
        $eC["\x3a\x3a\141\x73\x73\x65\x72\164\x69\157\x6e"] = \sprintf("\x25\x73\45\163\45\163", $r3[1]["\143\x6c\141\163\x73"], $r3[1]["\x74\x79\160\145"], $r3[1]["\146\165\x6e\x63\x74\x69\157\x6e"]);
        $Ew = \call_user_func_array($Ew, array($eC));
        Lwu:
        return \is_null($Ew) ? null : (string) $Ew;
    }
}
