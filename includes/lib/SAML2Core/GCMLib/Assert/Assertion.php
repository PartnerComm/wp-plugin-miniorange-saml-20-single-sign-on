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
    protected static $exceptionClass = "\x41\x73\163\145\162\164\134\x49\156\x76\x61\x6c\151\144\x41\162\x67\x75\155\x65\156\x74\x45\170\143\x65\160\164\x69\157\x6e";
    protected static function createException($DE, $tj, $CT, $Tn = null, array $qY = array())
    {
        $NR = static::$exceptionClass;
        return new $NR($tj, $CT, $Tn, $DE, $qY);
    }
    public static function eq($DE, $J6, $tj = null, $Tn = null)
    {
        if (!($DE != $J6)) {
            goto NXc;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\141\154\x75\145\40\x22\45\163\42\x20\144\157\145\163\40\x6e\x6f\164\40\x65\x71\165\141\154\x20\x65\x78\x70\145\x63\164\x65\x64\40\166\x61\154\165\145\x20\x22\x25\163\x22\x2e"), static::stringify($DE), static::stringify($J6));
        throw static::createException($DE, $tj, static::INVALID_EQ, $Tn, array("\145\x78\x70\145\143\164\x65\x64" => $J6));
        NXc:
        return true;
    }
    public static function same($DE, $J6, $tj = null, $Tn = null)
    {
        if (!($DE !== $J6)) {
            goto p4O;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\x61\x6c\x75\x65\x20\x22\x25\163\42\40\151\x73\40\156\x6f\164\40\x74\150\145\40\163\x61\155\145\x20\x61\163\x20\145\170\160\x65\143\x74\x65\x64\x20\166\x61\x6c\165\x65\40\x22\45\x73\x22\x2e"), static::stringify($DE), static::stringify($J6));
        throw static::createException($DE, $tj, static::INVALID_SAME, $Tn, array("\145\x78\160\x65\143\x74\145\x64" => $J6));
        p4O:
        return true;
    }
    public static function notEq($M3, $J6, $tj = null, $Tn = null)
    {
        if (!($M3 == $J6)) {
            goto x1q;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\x61\x6c\x75\145\40\42\45\x73\x22\x20\x69\x73\40\145\161\165\x61\x6c\40\x74\x6f\x20\145\x78\160\145\x63\164\145\144\40\x76\x61\154\x75\x65\x20\42\x25\x73\42\56"), static::stringify($M3), static::stringify($J6));
        throw static::createException($M3, $tj, static::INVALID_NOT_EQ, $Tn, array("\x65\170\x70\x65\143\164\x65\x64" => $J6));
        x1q:
        return true;
    }
    public static function notSame($M3, $J6, $tj = null, $Tn = null)
    {
        if (!($M3 === $J6)) {
            goto M6h;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\141\154\x75\x65\40\42\x25\163\42\x20\x69\163\x20\x74\150\x65\x20\163\141\155\145\x20\141\163\40\x65\170\x70\x65\143\x74\x65\144\40\x76\141\x6c\165\x65\x20\42\45\x73\x22\x2e"), static::stringify($M3), static::stringify($J6));
        throw static::createException($M3, $tj, static::INVALID_NOT_SAME, $Tn, array("\145\x78\x70\145\143\x74\145\144" => $J6));
        M6h:
        return true;
    }
    public static function notInArray($DE, array $oL, $tj = null, $Tn = null)
    {
        if (!(true === \in_array($DE, $oL))) {
            goto BCk;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\x61\x6c\x75\145\x20\x22\x25\x73\x22\40\151\163\x20\x69\156\x20\147\x69\x76\145\x6e\x20\x22\45\x73\x22\56"), static::stringify($DE), static::stringify($oL));
        throw static::createException($DE, $tj, static::INVALID_VALUE_IN_ARRAY, $Tn, array("\143\x68\157\x69\x63\x65\x73" => $oL));
        BCk:
        return true;
    }
    public static function integer($DE, $tj = null, $Tn = null)
    {
        if (\is_int($DE)) {
            goto brP;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\x61\154\x75\145\x20\x22\45\x73\42\40\151\x73\40\x6e\x6f\x74\x20\x61\156\40\x69\x6e\164\x65\x67\145\x72\x2e"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_INTEGER, $Tn);
        brP:
        return true;
    }
    public static function float($DE, $tj = null, $Tn = null)
    {
        if (\is_float($DE)) {
            goto g2A;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\x61\154\x75\145\40\42\45\x73\x22\x20\151\163\x20\x6e\157\x74\40\141\x20\x66\x6c\x6f\x61\164\x2e"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_FLOAT, $Tn);
        g2A:
        return true;
    }
    public static function digit($DE, $tj = null, $Tn = null)
    {
        if (\ctype_digit((string) $DE)) {
            goto VOo;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\141\x6c\165\x65\x20\x22\x25\163\42\40\151\x73\40\156\x6f\164\x20\141\40\x64\x69\147\151\x74\x2e"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_DIGIT, $Tn);
        VOo:
        return true;
    }
    public static function integerish($DE, $tj = null, $Tn = null)
    {
        if (!(\is_resource($DE) || \is_object($DE) || \is_bool($DE) || \is_null($DE) || \is_array($DE) || \is_string($DE) && '' == $DE || \strval(\intval($DE)) !== \strval($DE) && \strval(\intval($DE)) !== \strval(\ltrim($DE, "\x30")) && '' !== \strval(\intval($DE)) && '' !== \strval(\ltrim($DE, "\60")))) {
            goto AGG;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\141\154\165\x65\40\x22\x25\x73\x22\40\151\x73\x20\x6e\157\164\40\x61\156\40\151\156\x74\x65\x67\145\x72\40\157\162\40\x61\40\x6e\x75\x6d\142\145\x72\40\x63\141\x73\x74\x61\x62\x6c\x65\x20\x74\157\40\x69\156\x74\145\x67\x65\162\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_INTEGERISH, $Tn);
        AGG:
        return true;
    }
    public static function boolean($DE, $tj = null, $Tn = null)
    {
        if (\is_bool($DE)) {
            goto wil;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\x61\154\x75\145\40\x22\x25\163\x22\40\x69\x73\x20\156\x6f\164\40\141\40\x62\x6f\157\x6c\145\x61\156\x2e"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_BOOLEAN, $Tn);
        wil:
        return true;
    }
    public static function scalar($DE, $tj = null, $Tn = null)
    {
        if (\is_scalar($DE)) {
            goto dzz;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\141\154\165\x65\40\42\45\x73\x22\40\x69\x73\40\x6e\x6f\164\x20\141\40\x73\143\141\154\141\x72\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_SCALAR, $Tn);
        dzz:
        return true;
    }
    public static function notEmpty($DE, $tj = null, $Tn = null)
    {
        if (!empty($DE)) {
            goto Zdf;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\x61\x6c\165\145\x20\x22\x25\163\x22\40\151\x73\40\145\155\x70\164\x79\54\x20\142\165\x74\40\x6e\x6f\x6e\40\145\x6d\x70\164\x79\x20\x76\x61\154\x75\145\40\x77\141\x73\x20\x65\170\160\145\143\164\145\144\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::VALUE_EMPTY, $Tn);
        Zdf:
        return true;
    }
    public static function noContent($DE, $tj = null, $Tn = null)
    {
        if (empty($DE)) {
            goto mWJ;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\x61\x6c\165\x65\40\42\45\x73\x22\x20\151\x73\x20\156\157\x74\40\x65\155\x70\164\171\54\40\x62\165\x74\40\x65\155\160\164\171\40\x76\x61\x6c\x75\145\x20\167\x61\163\x20\x65\x78\160\x65\x63\x74\145\144\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::VALUE_NOT_EMPTY, $Tn);
        mWJ:
        return true;
    }
    public static function null($DE, $tj = null, $Tn = null)
    {
        if (!(null !== $DE)) {
            goto kJd;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\141\x6c\x75\x65\40\42\45\x73\x22\40\x69\x73\40\x6e\157\x74\40\156\x75\154\x6c\x2c\40\142\x75\x74\40\156\165\154\154\x20\166\x61\154\x75\145\40\x77\141\163\x20\x65\170\160\x65\143\x74\145\144\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::VALUE_NOT_NULL, $Tn);
        kJd:
        return true;
    }
    public static function notNull($DE, $tj = null, $Tn = null)
    {
        if (!(null === $DE)) {
            goto hX6;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\x61\154\x75\x65\40\42\45\163\x22\40\151\x73\x20\x6e\x75\x6c\x6c\54\x20\142\165\164\x20\x6e\x6f\x6e\40\156\x75\x6c\154\40\166\141\x6c\x75\145\x20\167\141\x73\x20\x65\170\x70\145\143\x74\x65\x64\x2e"), static::stringify($DE));
        throw static::createException($DE, $tj, static::VALUE_NULL, $Tn);
        hX6:
        return true;
    }
    public static function string($DE, $tj = null, $Tn = null)
    {
        if (\is_string($DE)) {
            goto wxh;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\x61\x6c\165\145\x20\x22\45\x73\x22\40\145\170\160\x65\x63\x74\x65\x64\x20\164\157\40\142\x65\x20\x73\164\x72\x69\156\147\x2c\40\x74\171\160\x65\40\45\163\40\147\151\x76\x65\156\56"), static::stringify($DE), \gettype($DE));
        throw static::createException($DE, $tj, static::INVALID_STRING, $Tn);
        wxh:
        return true;
    }
    public static function regex($DE, $K0, $tj = null, $Tn = null)
    {
        static::string($DE, $tj, $Tn);
        if (\preg_match($K0, $DE)) {
            goto Hm1;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\141\154\x75\x65\40\42\45\x73\x22\x20\x64\x6f\145\163\x20\156\x6f\x74\40\x6d\141\164\x63\150\40\x65\x78\x70\162\145\x73\163\x69\x6f\x6e\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_REGEX, $Tn, array("\160\141\164\x74\x65\162\x6e" => $K0));
        Hm1:
        return true;
    }
    public static function length($DE, $TC, $tj = null, $Tn = null, $J2 = "\x75\164\146\x38")
    {
        static::string($DE, $tj, $Tn);
        if (!(\mb_strlen($DE, $J2) !== $TC)) {
            goto bJb;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\141\x6c\x75\145\40\x22\x25\163\42\x20\x68\141\163\40\164\x6f\40\x62\145\x20\45\144\x20\145\x78\x61\x63\164\x6c\171\40\143\150\x61\162\141\x63\164\145\x72\x73\x20\154\157\156\147\54\40\x62\x75\x74\x20\x6c\145\156\x67\164\150\x20\x69\163\x20\45\144\x2e"), static::stringify($DE), $TC, \mb_strlen($DE, $J2));
        throw static::createException($DE, $tj, static::INVALID_LENGTH, $Tn, array("\x6c\x65\156\x67\x74\x68" => $TC, "\145\156\143\157\x64\x69\156\147" => $J2));
        bJb:
        return true;
    }
    public static function minLength($DE, $lW, $tj = null, $Tn = null, $J2 = "\x75\x74\x66\x38")
    {
        static::string($DE, $tj, $Tn);
        if (!(\mb_strlen($DE, $J2) < $lW)) {
            goto dnF;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\141\154\x75\x65\40\42\45\163\42\x20\151\163\40\x74\x6f\157\x20\x73\x68\x6f\162\x74\54\40\x69\164\40\163\x68\x6f\x75\154\144\40\x68\x61\x76\x65\x20\141\164\40\x6c\x65\x61\x73\x74\x20\x25\144\40\143\150\141\x72\141\x63\164\145\x72\x73\x2c\x20\142\165\x74\x20\157\x6e\154\171\40\150\x61\163\40\45\x64\40\143\x68\x61\x72\x61\x63\x74\145\x72\163\x2e"), static::stringify($DE), $lW, \mb_strlen($DE, $J2));
        throw static::createException($DE, $tj, static::INVALID_MIN_LENGTH, $Tn, array("\x6d\x69\x6e\x5f\x6c\145\x6e\x67\x74\150" => $lW, "\x65\x6e\143\157\144\x69\x6e\x67" => $J2));
        dnF:
        return true;
    }
    public static function maxLength($DE, $nK, $tj = null, $Tn = null, $J2 = "\x75\x74\x66\x38")
    {
        static::string($DE, $tj, $Tn);
        if (!(\mb_strlen($DE, $J2) > $nK)) {
            goto jRb;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\141\x6c\165\145\40\42\45\163\x22\x20\x69\x73\40\x74\x6f\x6f\x20\x6c\157\156\x67\x2c\x20\151\164\x20\x73\x68\157\x75\154\x64\x20\x68\x61\166\145\x20\x6e\157\40\x6d\157\162\145\40\x74\150\141\156\40\45\144\40\x63\150\141\x72\141\x63\164\x65\x72\163\x2c\40\x62\x75\x74\x20\150\x61\x73\40\45\x64\x20\x63\x68\141\x72\141\x63\164\145\162\x73\x2e"), static::stringify($DE), $nK, \mb_strlen($DE, $J2));
        throw static::createException($DE, $tj, static::INVALID_MAX_LENGTH, $Tn, array("\155\x61\170\137\154\145\156\147\x74\150" => $nK, "\x65\x6e\x63\x6f\x64\x69\x6e\x67" => $J2));
        jRb:
        return true;
    }
    public static function betweenLength($DE, $lW, $nK, $tj = null, $Tn = null, $J2 = "\165\x74\146\x38")
    {
        static::string($DE, $tj, $Tn);
        static::minLength($DE, $lW, $tj, $Tn, $J2);
        static::maxLength($DE, $nK, $tj, $Tn, $J2);
        return true;
    }
    public static function startsWith($vf, $AD, $tj = null, $Tn = null, $J2 = "\165\164\x66\70")
    {
        static::string($vf, $tj, $Tn);
        if (!(0 !== \mb_strpos($vf, $AD, null, $J2))) {
            goto wFe;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\141\154\165\x65\40\x22\45\x73\x22\40\x64\157\145\163\40\156\x6f\164\40\x73\164\141\x72\x74\40\x77\151\164\x68\40\x22\x25\x73\x22\x2e"), static::stringify($vf), static::stringify($AD));
        throw static::createException($vf, $tj, static::INVALID_STRING_START, $Tn, array("\156\x65\x65\144\154\145" => $AD, "\x65\156\143\x6f\x64\x69\x6e\x67" => $J2));
        wFe:
        return true;
    }
    public static function endsWith($vf, $AD, $tj = null, $Tn = null, $J2 = "\x75\x74\x66\70")
    {
        static::string($vf, $tj, $Tn);
        $Rq = \mb_strlen($vf, $J2) - \mb_strlen($AD, $J2);
        if (!(\mb_strripos($vf, $AD, null, $J2) !== $Rq)) {
            goto Nvy;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\141\x6c\165\145\40\42\x25\163\42\40\144\x6f\145\x73\x20\x6e\x6f\x74\x20\x65\x6e\144\x20\x77\x69\x74\x68\x20\x22\45\163\x22\x2e"), static::stringify($vf), static::stringify($AD));
        throw static::createException($vf, $tj, static::INVALID_STRING_END, $Tn, array("\x6e\x65\145\x64\x6c\145" => $AD, "\x65\x6e\x63\x6f\x64\151\x6e\x67" => $J2));
        Nvy:
        return true;
    }
    public static function contains($vf, $AD, $tj = null, $Tn = null, $J2 = "\165\x74\x66\70")
    {
        static::string($vf, $tj, $Tn);
        if (!(false === \mb_strpos($vf, $AD, null, $J2))) {
            goto Ekf;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\141\x6c\x75\x65\x20\42\x25\163\x22\x20\x64\157\145\x73\x20\x6e\157\164\x20\143\157\x6e\x74\x61\x69\156\40\x22\x25\163\42\56"), static::stringify($vf), static::stringify($AD));
        throw static::createException($vf, $tj, static::INVALID_STRING_CONTAINS, $Tn, array("\156\x65\145\144\154\x65" => $AD, "\x65\x6e\x63\157\144\x69\156\x67" => $J2));
        Ekf:
        return true;
    }
    public static function choice($DE, array $oL, $tj = null, $Tn = null)
    {
        if (\in_array($DE, $oL, true)) {
            goto R3B;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\x61\x6c\x75\145\x20\x22\x25\x73\42\x20\x69\163\40\156\157\164\x20\141\156\x20\x65\x6c\145\155\x65\x6e\x74\x20\157\x66\x20\x74\x68\x65\x20\166\x61\154\x69\x64\x20\166\x61\x6c\165\x65\x73\72\x20\x25\x73"), static::stringify($DE), \implode("\x2c\x20", \array_map(array(\get_called_class(), "\163\164\x72\x69\156\x67\x69\x66\171"), $oL)));
        throw static::createException($DE, $tj, static::INVALID_CHOICE, $Tn, array("\143\150\x6f\151\x63\x65\x73" => $oL));
        R3B:
        return true;
    }
    public static function inArray($DE, array $oL, $tj = null, $Tn = null)
    {
        return static::choice($DE, $oL, $tj, $Tn);
    }
    public static function numeric($DE, $tj = null, $Tn = null)
    {
        if (\is_numeric($DE)) {
            goto kki;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\141\x6c\x75\145\x20\42\45\x73\x22\x20\x69\163\40\156\x6f\164\x20\156\165\155\x65\162\151\143\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_NUMERIC, $Tn);
        kki:
        return true;
    }
    public static function isResource($DE, $tj = null, $Tn = null)
    {
        if (\is_resource($DE)) {
            goto Ctx;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\x61\x6c\165\x65\x20\42\x25\163\x22\x20\x69\163\x20\x6e\x6f\164\x20\x61\x20\162\x65\163\157\165\x72\x63\x65\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_RESOURCE, $Tn);
        Ctx:
        return true;
    }
    public static function isArray($DE, $tj = null, $Tn = null)
    {
        if (\is_array($DE)) {
            goto NNC;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\x61\154\x75\x65\40\x22\x25\163\42\x20\151\163\40\x6e\x6f\164\x20\x61\156\40\141\x72\162\x61\171\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_ARRAY, $Tn);
        NNC:
        return true;
    }
    public static function isTraversable($DE, $tj = null, $Tn = null)
    {
        if (!(!\is_array($DE) && !$DE instanceof \Traversable)) {
            goto vIy;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\x61\x6c\165\145\40\x22\45\x73\x22\x20\x69\163\x20\156\x6f\x74\x20\x61\x6e\40\x61\x72\x72\141\x79\40\x61\x6e\x64\x20\x64\x6f\x65\x73\40\156\157\x74\40\151\x6d\160\154\x65\155\x65\x6e\x74\40\124\x72\x61\x76\x65\x72\x73\x61\142\154\145\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_TRAVERSABLE, $Tn);
        vIy:
        return true;
    }
    public static function isArrayAccessible($DE, $tj = null, $Tn = null)
    {
        if (!(!\is_array($DE) && !$DE instanceof \ArrayAccess)) {
            goto BZN;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\141\x6c\165\x65\x20\42\x25\163\x22\40\x69\163\40\x6e\157\164\x20\141\156\x20\x61\162\162\141\171\40\x61\156\144\40\144\x6f\145\x73\x20\156\x6f\x74\x20\x69\x6d\160\154\x65\155\145\x6e\164\x20\101\162\x72\141\171\x41\x63\143\145\x73\x73\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_ARRAY_ACCESSIBLE, $Tn);
        BZN:
        return true;
    }
    public static function keyExists($DE, $ES, $tj = null, $Tn = null)
    {
        static::isArray($DE, $tj, $Tn);
        if (\array_key_exists($ES, $DE)) {
            goto MPE;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\101\x72\x72\141\x79\x20\144\x6f\145\163\x20\156\157\x74\x20\143\x6f\156\x74\x61\151\x6e\40\141\x6e\40\x65\x6c\x65\x6d\145\x6e\164\x20\167\x69\x74\150\40\153\145\171\x20\42\45\x73\42"), static::stringify($ES));
        throw static::createException($DE, $tj, static::INVALID_KEY_EXISTS, $Tn, array("\x6b\x65\171" => $ES));
        MPE:
        return true;
    }
    public static function keyNotExists($DE, $ES, $tj = null, $Tn = null)
    {
        static::isArray($DE, $tj, $Tn);
        if (!\array_key_exists($ES, $DE)) {
            goto m0C;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x41\162\162\x61\171\40\143\157\156\164\141\151\x6e\x73\x20\141\156\x20\x65\154\145\155\x65\156\x74\40\167\151\164\150\x20\x6b\x65\x79\40\x22\45\x73\42"), static::stringify($ES));
        throw static::createException($DE, $tj, static::INVALID_KEY_NOT_EXISTS, $Tn, array("\x6b\x65\171" => $ES));
        m0C:
        return true;
    }
    public static function keyIsset($DE, $ES, $tj = null, $Tn = null)
    {
        static::isArrayAccessible($DE, $tj, $Tn);
        if (isset($DE[$ES])) {
            goto rzK;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\124\150\145\x20\x65\x6c\x65\x6d\x65\156\x74\40\167\151\x74\x68\40\x6b\x65\171\40\42\x25\163\x22\x20\x77\x61\163\x20\156\x6f\164\x20\x66\157\165\x6e\x64"), static::stringify($ES));
        throw static::createException($DE, $tj, static::INVALID_KEY_ISSET, $Tn, array("\153\x65\171" => $ES));
        rzK:
        return true;
    }
    public static function notEmptyKey($DE, $ES, $tj = null, $Tn = null)
    {
        static::keyIsset($DE, $ES, $tj, $Tn);
        static::notEmpty($DE[$ES], $tj, $Tn);
        return true;
    }
    public static function notBlank($DE, $tj = null, $Tn = null)
    {
        if (!(false === $DE || empty($DE) && "\60" != $DE || \is_string($DE) && '' === \trim($DE))) {
            goto dHR;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\141\x6c\x75\x65\x20\x22\x25\163\42\40\151\163\x20\142\154\141\x6e\x6b\54\x20\142\x75\x74\x20\167\x61\163\x20\145\170\160\145\x63\164\145\144\40\x74\157\x20\143\x6f\156\x74\141\x69\x6e\x20\x61\x20\x76\141\x6c\x75\145\x2e"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_NOT_BLANK, $Tn);
        dHR:
        return true;
    }
    public static function isInstanceOf($DE, $LI, $tj = null, $Tn = null)
    {
        if ($DE instanceof $LI) {
            goto Lsj;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\103\x6c\x61\163\163\x20\42\45\x73\42\40\167\x61\x73\40\145\170\x70\145\x63\x74\145\x64\40\164\x6f\40\142\x65\x20\x69\156\x73\x74\141\x6e\143\x65\157\146\x20\157\146\x20\x22\x25\163\42\40\142\165\x74\40\151\163\40\156\157\164\56"), static::stringify($DE), $LI);
        throw static::createException($DE, $tj, static::INVALID_INSTANCE_OF, $Tn, array("\x63\x6c\141\x73\163" => $LI));
        Lsj:
        return true;
    }
    public static function notIsInstanceOf($DE, $LI, $tj = null, $Tn = null)
    {
        if (!$DE instanceof $LI) {
            goto f6o;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x43\154\141\x73\163\40\42\x25\x73\42\40\x77\x61\163\40\x6e\157\164\40\145\x78\x70\145\x63\164\145\x64\x20\164\x6f\40\142\x65\40\x69\x6e\163\164\x61\156\x63\x65\x6f\x66\40\x6f\146\x20\x22\x25\x73\x22\56"), static::stringify($DE), $LI);
        throw static::createException($DE, $tj, static::INVALID_NOT_INSTANCE_OF, $Tn, array("\143\x6c\x61\163\163" => $LI));
        f6o:
        return true;
    }
    public static function subclassOf($DE, $LI, $tj = null, $Tn = null)
    {
        if (\is_subclass_of($DE, $LI)) {
            goto Q_R;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\103\x6c\141\163\163\x20\42\45\163\x22\x20\x77\x61\163\40\x65\170\x70\145\143\164\x65\x64\x20\164\157\x20\142\145\x20\x73\x75\142\143\154\x61\163\x73\x20\x6f\146\40\x22\45\163\x22\x2e"), static::stringify($DE), $LI);
        throw static::createException($DE, $tj, static::INVALID_SUBCLASS_OF, $Tn, array("\143\x6c\141\x73\163" => $LI));
        Q_R:
        return true;
    }
    public static function range($DE, $j3, $n5, $tj = null, $Tn = null)
    {
        static::numeric($DE, $tj, $Tn);
        if (!($DE < $j3 || $DE > $n5)) {
            goto Lei;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x4e\165\x6d\142\x65\162\40\42\45\163\42\x20\167\x61\163\x20\145\x78\160\145\143\164\145\144\x20\x74\x6f\x20\x62\145\x20\141\x74\40\x6c\145\141\163\x74\x20\x22\45\x64\x22\40\141\x6e\x64\x20\x61\x74\x20\x6d\157\163\x74\40\42\45\x64\x22\x2e"), static::stringify($DE), static::stringify($j3), static::stringify($n5));
        throw static::createException($DE, $tj, static::INVALID_RANGE, $Tn, array("\x6d\151\x6e" => $j3, "\155\x61\x78" => $n5));
        Lei:
        return true;
    }
    public static function min($DE, $j3, $tj = null, $Tn = null)
    {
        static::numeric($DE, $tj, $Tn);
        if (!($DE < $j3)) {
            goto x5H;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x4e\x75\x6d\142\145\162\x20\x22\45\x73\x22\x20\x77\141\163\40\x65\x78\160\145\x63\164\x65\144\40\x74\x6f\40\142\145\40\x61\x74\x20\154\145\x61\163\x74\40\x22\x25\163\x22\56"), static::stringify($DE), static::stringify($j3));
        throw static::createException($DE, $tj, static::INVALID_MIN, $Tn, array("\155\x69\x6e" => $j3));
        x5H:
        return true;
    }
    public static function max($DE, $n5, $tj = null, $Tn = null)
    {
        static::numeric($DE, $tj, $Tn);
        if (!($DE > $n5)) {
            goto qn3;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\116\x75\155\x62\145\162\40\42\45\x73\x22\40\167\x61\x73\40\x65\170\x70\x65\x63\x74\x65\x64\x20\164\157\40\x62\145\40\141\164\40\155\x6f\163\x74\x20\42\45\x73\x22\x2e"), static::stringify($DE), static::stringify($n5));
        throw static::createException($DE, $tj, static::INVALID_MAX, $Tn, array("\x6d\141\170" => $n5));
        qn3:
        return true;
    }
    public static function file($DE, $tj = null, $Tn = null)
    {
        static::string($DE, $tj, $Tn);
        static::notEmpty($DE, $tj, $Tn);
        if (\is_file($DE)) {
            goto iPB;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\106\x69\154\x65\40\42\45\163\x22\40\x77\141\163\x20\145\x78\160\145\x63\164\x65\144\x20\164\x6f\x20\145\x78\x69\x73\164\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_FILE, $Tn);
        iPB:
        return true;
    }
    public static function directory($DE, $tj = null, $Tn = null)
    {
        static::string($DE, $tj, $Tn);
        if (\is_dir($DE)) {
            goto tVP;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x50\x61\x74\150\40\42\x25\163\x22\40\167\x61\x73\x20\145\x78\160\145\143\x74\x65\x64\x20\x74\x6f\40\x62\145\x20\x61\40\144\151\x72\145\143\x74\x6f\162\x79\x2e"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_DIRECTORY, $Tn);
        tVP:
        return true;
    }
    public static function readable($DE, $tj = null, $Tn = null)
    {
        static::string($DE, $tj, $Tn);
        if (\is_readable($DE)) {
            goto h86;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x50\141\164\x68\x20\x22\x25\163\42\40\x77\x61\x73\40\145\170\160\145\143\x74\145\144\x20\x74\157\40\142\x65\x20\162\145\x61\x64\x61\x62\154\145\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_READABLE, $Tn);
        h86:
        return true;
    }
    public static function writeable($DE, $tj = null, $Tn = null)
    {
        static::string($DE, $tj, $Tn);
        if (\is_writable($DE)) {
            goto ABW;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\120\141\164\150\x20\42\x25\163\x22\40\167\x61\x73\40\145\170\160\145\143\x74\145\x64\40\x74\x6f\x20\x62\x65\40\167\162\151\x74\x65\141\x62\154\145\x2e"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_WRITEABLE, $Tn);
        ABW:
        return true;
    }
    public static function email($DE, $tj = null, $Tn = null)
    {
        static::string($DE, $tj, $Tn);
        if (!\filter_var($DE, FILTER_VALIDATE_EMAIL)) {
            goto sCj;
        }
        $HC = \substr($DE, \strpos($DE, "\x40") + 1);
        if (!(\version_compare(PHP_VERSION, "\x35\56\x33\x2e\x33", "\74") && false === \strpos($HC, "\56"))) {
            goto sqS;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\x61\x6c\x75\x65\40\x22\45\x73\x22\40\167\141\x73\40\145\x78\160\145\x63\x74\145\144\x20\x74\x6f\x20\x62\145\40\141\40\x76\141\154\151\144\x20\145\x2d\155\x61\x69\154\x20\x61\144\144\162\x65\x73\x73\x2e"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_EMAIL, $Tn);
        sqS:
        goto gma;
        sCj:
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\x61\154\x75\x65\40\x22\45\163\x22\x20\x77\141\163\40\x65\x78\160\145\143\x74\145\x64\x20\x74\157\40\x62\145\x20\141\x20\166\141\154\x69\x64\x20\x65\55\155\141\x69\154\40\x61\x64\144\x72\x65\163\x73\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_EMAIL, $Tn);
        gma:
        return true;
    }
    public static function url($DE, $tj = null, $Tn = null)
    {
        static::string($DE, $tj, $Tn);
        $U2 = array("\x68\x74\164\x70", "\x68\164\164\160\x73");
        $K0 = "\x7e\x5e\xd\12\40\40\x20\x20\x20\x20\x20\x20\40\x20\40\x20\50\45\163\51\72\57\x2f\x20\40\40\x20\40\40\40\40\x20\40\x20\40\x20\x20\x20\40\x20\x20\x20\40\x20\40\x20\x20\40\x20\40\40\x20\x20\40\40\40\40\x20\x20\40\x23\x20\160\162\x6f\x74\157\143\157\154\xd\xa\x20\40\40\x20\40\40\40\40\x20\40\x20\x20\50\50\133\134\x2e\x5c\x70\114\x5c\x70\116\x2d\x5d\53\72\x29\x3f\50\133\x5c\x2e\x5c\160\114\134\x70\x4e\55\135\53\51\x40\x29\x3f\40\x20\x20\40\x20\x20\x20\x20\x20\40\x23\40\142\141\163\151\143\x20\141\165\x74\150\xd\xa\40\40\x20\40\40\x20\40\40\x20\x20\x20\x20\50\15\xa\x20\x20\x20\x20\x20\40\40\x20\x20\40\40\40\40\40\x20\x20\50\x5b\x5c\x70\x4c\x5c\160\116\x5c\160\x53\x2d\x5c\x2e\x5d\51\53\50\x5c\56\77\x28\133\x5c\x70\114\134\x70\x4e\135\x7c\170\156\134\55\134\55\x5b\134\x70\114\134\160\x4e\x2d\135\53\51\53\x5c\x2e\x3f\51\x20\43\40\141\40\144\x6f\x6d\141\x69\x6e\x20\156\141\155\x65\15\12\x20\40\40\40\x20\x20\x20\40\40\x20\40\x20\x20\x20\40\x20\x20\40\40\40\x7c\40\40\40\40\40\40\x20\40\40\x20\40\x20\40\x20\x20\40\x20\x20\x20\x20\40\x20\40\x20\40\40\x20\x20\40\x20\x20\40\x20\x20\x20\40\x20\40\40\x20\x20\x20\x20\x20\40\40\40\40\x20\x23\40\x6f\162\xd\xa\x20\40\x20\x20\40\40\40\x20\40\40\40\x20\x20\x20\40\40\134\x64\x7b\61\54\x33\x7d\x5c\56\x5c\144\x7b\61\54\63\x7d\134\x2e\x5c\x64\173\x31\x2c\63\x7d\134\56\x5c\x64\173\x31\54\x33\x7d\40\40\x20\x20\x20\40\40\x20\40\x20\x20\x20\x20\x20\x20\x20\40\x20\40\x20\x23\x20\x61\156\40\111\120\40\141\144\144\x72\145\163\x73\15\12\40\40\x20\40\x20\x20\x20\40\x20\40\40\x20\40\x20\x20\x20\x20\40\40\x20\174\x20\40\x20\40\40\40\40\x20\x20\x20\x20\40\40\40\x20\40\40\x20\40\40\x20\40\40\40\40\40\x20\40\40\x20\x20\40\40\x20\40\40\40\x20\40\40\40\x20\x20\40\x20\x20\40\x20\x20\43\40\x6f\x72\xd\12\40\40\40\40\x20\x20\x20\40\x20\x20\x20\x20\40\40\40\40\x5c\133\15\12\40\x20\x20\40\x20\40\x20\x20\x20\x20\40\40\40\x20\x20\40\40\40\40\x20\x28\x3f\x3a\50\77\x3a\x28\77\72\x28\x3f\x3a\x28\77\x3a\x28\x3f\72\50\77\72\x5b\x30\55\x39\x61\x2d\x66\x5d\x7b\61\x2c\x34\175\x29\x29\72\x29\173\66\x7d\51\50\77\72\x28\77\x3a\50\77\x3a\x28\77\x3a\50\77\72\133\x30\55\71\141\x2d\146\135\173\x31\x2c\x34\175\51\51\x3a\x28\x3f\72\50\77\72\133\60\55\71\141\x2d\x66\x5d\x7b\61\54\64\x7d\x29\51\x29\174\50\77\x3a\50\x3f\x3a\x28\77\72\50\x3f\72\x28\x3f\x3a\62\x35\133\x30\55\65\x5d\174\x28\x3f\72\133\61\55\71\x5d\174\61\133\60\x2d\x39\135\174\62\x5b\60\x2d\64\135\51\77\x5b\x30\x2d\71\135\51\x29\134\56\51\173\x33\175\x28\77\72\50\x3f\x3a\x32\65\133\x30\x2d\x35\x5d\x7c\x28\x3f\72\x5b\x31\x2d\x39\135\174\x31\133\60\x2d\x39\135\174\62\133\x30\x2d\64\x5d\51\x3f\x5b\60\x2d\x39\x5d\x29\x29\x29\x29\51\51\51\174\50\x3f\72\50\x3f\72\x3a\72\x28\x3f\72\x28\x3f\x3a\50\x3f\72\133\60\x2d\71\x61\55\x66\x5d\173\61\x2c\64\175\x29\x29\x3a\51\173\65\175\51\x28\x3f\72\x28\x3f\72\x28\77\x3a\x28\x3f\x3a\50\x3f\x3a\x5b\x30\x2d\x39\141\x2d\146\135\x7b\x31\x2c\x34\x7d\51\51\72\50\77\x3a\x28\x3f\x3a\133\60\55\71\x61\55\x66\135\173\61\54\64\x7d\x29\51\x29\174\x28\x3f\x3a\x28\x3f\x3a\50\x3f\72\x28\77\x3a\50\77\x3a\x32\65\x5b\x30\55\x35\x5d\174\x28\x3f\x3a\133\x31\x2d\x39\135\174\61\x5b\60\x2d\x39\135\x7c\62\133\60\55\64\x5d\x29\77\133\x30\55\x39\135\51\51\134\x2e\x29\x7b\x33\x7d\50\77\72\x28\x3f\x3a\x32\65\x5b\60\x2d\x35\135\174\50\x3f\x3a\133\x31\x2d\x39\x5d\174\61\x5b\x30\x2d\x39\x5d\174\62\133\x30\55\64\135\x29\77\133\x30\55\x39\135\x29\x29\51\51\x29\51\x29\x7c\50\77\x3a\50\x3f\x3a\x28\x3f\72\x28\x3f\72\x28\77\72\x5b\x30\x2d\71\x61\55\146\135\x7b\x31\x2c\x34\x7d\51\x29\51\77\x3a\x3a\50\77\x3a\x28\77\72\x28\77\x3a\133\x30\55\x39\141\55\x66\x5d\x7b\61\x2c\x34\x7d\51\x29\72\51\173\x34\175\51\x28\77\x3a\x28\x3f\x3a\x28\77\72\x28\x3f\72\x28\77\x3a\133\60\55\71\x61\x2d\146\x5d\173\x31\54\64\x7d\51\51\72\50\x3f\72\x28\x3f\x3a\133\60\55\x39\141\55\146\x5d\x7b\61\54\x34\175\51\51\x29\x7c\x28\77\72\x28\77\x3a\50\77\x3a\x28\77\x3a\50\x3f\72\62\x35\133\x30\55\x35\x5d\174\50\x3f\72\133\61\x2d\x39\x5d\174\61\133\x30\55\71\135\x7c\x32\x5b\60\x2d\x34\x5d\x29\77\x5b\x30\x2d\x39\135\x29\x29\134\x2e\51\173\63\175\50\77\72\x28\x3f\x3a\62\x35\133\x30\55\65\x5d\x7c\x28\x3f\x3a\133\x31\55\x39\x5d\x7c\61\133\x30\55\71\135\x7c\x32\x5b\60\x2d\64\135\51\77\133\60\x2d\x39\135\x29\x29\x29\x29\51\x29\x29\174\50\77\72\x28\77\72\50\x3f\x3a\50\77\72\50\x3f\72\x28\x3f\72\x5b\x30\x2d\x39\141\x2d\x66\x5d\x7b\x31\54\64\175\x29\51\x3a\x29\x7b\x30\x2c\x31\x7d\x28\x3f\x3a\50\77\72\x5b\x30\x2d\71\141\x2d\x66\x5d\x7b\x31\x2c\64\x7d\x29\51\51\x3f\x3a\72\50\77\72\50\x3f\72\50\77\x3a\x5b\60\x2d\x39\x61\x2d\x66\x5d\173\61\54\x34\x7d\x29\51\72\51\x7b\63\x7d\x29\50\77\x3a\50\77\72\50\77\x3a\50\77\72\x28\77\72\133\60\x2d\71\141\x2d\x66\135\173\61\x2c\64\175\x29\51\72\50\x3f\72\50\77\x3a\x5b\60\x2d\71\x61\x2d\146\x5d\x7b\61\x2c\64\x7d\x29\51\x29\x7c\x28\x3f\72\50\x3f\72\x28\77\72\50\x3f\72\x28\77\72\x32\65\133\x30\55\x35\x5d\x7c\x28\77\x3a\x5b\61\55\x39\x5d\174\61\133\60\x2d\71\x5d\174\62\x5b\x30\55\x34\135\x29\x3f\x5b\x30\55\x39\135\51\51\134\x2e\x29\x7b\x33\x7d\x28\x3f\x3a\x28\x3f\x3a\62\x35\x5b\60\55\65\135\x7c\x28\77\72\133\x31\55\x39\x5d\174\x31\133\60\x2d\x39\135\x7c\x32\133\x30\55\64\x5d\x29\x3f\133\x30\55\71\135\x29\x29\x29\51\x29\51\x29\174\x28\x3f\72\50\x3f\72\x28\77\x3a\50\77\72\x28\77\x3a\x28\77\72\133\x30\x2d\x39\141\55\146\x5d\x7b\61\x2c\x34\x7d\x29\51\x3a\x29\173\x30\x2c\x32\175\50\77\x3a\50\77\72\133\60\55\71\x61\x2d\146\135\173\x31\54\x34\x7d\51\51\51\77\x3a\x3a\50\77\72\x28\x3f\x3a\x28\77\72\x5b\x30\x2d\71\141\55\146\135\173\x31\54\x34\175\51\x29\x3a\51\x7b\62\175\51\50\77\72\x28\77\72\50\x3f\x3a\50\x3f\x3a\x28\x3f\x3a\133\x30\x2d\x39\141\55\x66\x5d\x7b\x31\54\64\175\51\x29\x3a\50\77\x3a\x28\x3f\x3a\x5b\x30\55\71\x61\x2d\x66\135\x7b\x31\x2c\x34\175\x29\x29\51\174\50\x3f\x3a\x28\x3f\x3a\50\77\72\x28\77\72\50\77\x3a\x32\x35\133\60\x2d\x35\135\x7c\50\77\x3a\133\61\55\x39\x5d\174\x31\133\x30\x2d\x39\135\174\x32\x5b\x30\x2d\x34\x5d\51\77\x5b\x30\55\x39\135\51\x29\134\x2e\51\173\x33\x7d\50\x3f\x3a\x28\x3f\x3a\62\x35\133\x30\55\x35\x5d\x7c\x28\77\72\x5b\x31\x2d\71\x5d\174\61\x5b\60\x2d\x39\x5d\x7c\62\133\60\55\x34\x5d\x29\77\x5b\x30\x2d\x39\135\x29\x29\51\x29\51\51\51\x7c\50\x3f\x3a\50\x3f\72\50\77\72\50\77\x3a\x28\x3f\72\50\77\72\133\60\55\71\x61\x2d\146\135\173\61\x2c\64\175\51\51\x3a\x29\173\60\x2c\x33\x7d\x28\77\72\50\x3f\x3a\x5b\x30\55\71\141\55\x66\135\x7b\x31\54\x34\x7d\x29\x29\x29\77\72\x3a\x28\x3f\72\50\77\72\x5b\x30\x2d\71\x61\x2d\146\135\x7b\x31\x2c\x34\x7d\x29\51\72\x29\50\77\x3a\50\77\72\x28\x3f\72\x28\77\72\50\77\72\133\x30\x2d\71\141\55\146\x5d\173\61\54\x34\175\x29\51\x3a\x28\x3f\72\50\77\x3a\x5b\x30\55\71\x61\55\146\x5d\x7b\61\54\x34\x7d\51\51\x29\174\x28\77\72\50\x3f\x3a\50\77\72\x28\77\72\x28\x3f\72\x32\x35\133\60\x2d\65\135\174\x28\77\72\x5b\61\x2d\71\135\x7c\x31\x5b\60\55\71\x5d\x7c\x32\133\60\55\x34\135\51\x3f\x5b\x30\55\x39\135\x29\x29\134\x2e\x29\x7b\x33\175\50\x3f\x3a\x28\x3f\72\x32\x35\133\60\55\65\135\174\50\x3f\72\133\61\x2d\x39\135\174\61\x5b\x30\55\x39\x5d\174\x32\x5b\60\x2d\64\135\x29\77\x5b\x30\55\x39\135\x29\x29\51\x29\x29\51\x29\x7c\50\x3f\x3a\x28\77\x3a\50\x3f\x3a\x28\x3f\72\50\x3f\x3a\x28\x3f\x3a\x5b\x30\x2d\71\141\55\146\x5d\173\x31\54\64\x7d\51\51\x3a\51\173\x30\54\x34\x7d\50\x3f\x3a\x28\77\72\133\x30\55\71\141\55\x66\135\x7b\x31\54\x34\x7d\x29\x29\x29\77\x3a\72\x29\50\x3f\72\x28\77\x3a\50\77\72\x28\x3f\72\x28\x3f\72\133\x30\x2d\71\141\55\x66\x5d\x7b\61\54\64\175\x29\x29\72\x28\77\x3a\x28\77\x3a\133\x30\x2d\71\141\x2d\146\x5d\173\61\x2c\x34\175\51\51\x29\174\50\77\72\x28\77\x3a\x28\77\x3a\50\x3f\x3a\x28\x3f\72\x32\65\x5b\x30\x2d\x35\135\x7c\50\77\72\x5b\x31\55\x39\135\x7c\x31\133\60\55\71\x5d\x7c\x32\133\x30\x2d\64\x5d\x29\77\133\60\x2d\x39\135\51\x29\134\56\51\173\63\175\50\x3f\x3a\50\x3f\72\62\x35\133\60\x2d\65\x5d\x7c\50\77\x3a\x5b\x31\x2d\71\x5d\x7c\61\133\x30\x2d\71\135\x7c\62\133\x30\x2d\64\135\51\x3f\133\x30\55\71\135\x29\51\51\51\51\x29\x29\174\x28\77\72\x28\77\x3a\50\x3f\x3a\x28\x3f\72\x28\x3f\72\50\x3f\x3a\x5b\x30\55\71\x61\55\x66\135\x7b\x31\54\x34\175\51\x29\72\x29\x7b\60\x2c\x35\x7d\50\x3f\72\50\77\72\133\60\55\x39\x61\x2d\x66\135\173\61\x2c\x34\x7d\x29\x29\51\x3f\x3a\x3a\51\50\77\72\50\x3f\x3a\133\x30\55\71\x61\55\146\x5d\173\x31\54\x34\175\51\51\x29\174\50\x3f\72\x28\77\72\50\x3f\72\x28\77\x3a\50\x3f\72\x28\x3f\72\x5b\x30\x2d\x39\x61\x2d\146\x5d\x7b\x31\x2c\64\x7d\51\x29\72\51\173\60\54\x36\x7d\50\77\72\50\x3f\72\133\60\x2d\71\141\55\146\x5d\173\61\x2c\x34\x7d\51\51\51\77\72\x3a\x29\x29\x29\51\15\12\x20\40\40\40\x20\x20\40\40\x20\40\40\x20\x20\x20\40\40\x5c\135\40\40\43\x20\x61\x6e\40\111\120\x76\x36\x20\x61\x64\x64\162\145\163\163\15\xa\40\x20\x20\40\x20\40\40\x20\40\40\x20\40\51\xd\12\x20\40\40\x20\40\40\x20\x20\40\x20\40\40\x28\72\133\x30\x2d\71\x5d\x2b\51\77\40\x20\x20\40\40\x20\40\x20\x20\40\40\x20\x20\x20\40\x20\x20\40\40\40\x20\40\40\x20\40\40\40\x20\x20\x20\x23\40\141\x20\x70\x6f\x72\164\x20\x28\157\160\x74\151\x6f\x6e\141\x6c\x29\15\xa\x20\x20\x20\x20\x20\40\40\40\x20\x20\x20\40\50\x2f\77\x7c\x2f\x5c\x53\53\174\x5c\x3f\x5c\x53\52\174\134\x23\x5c\123\x2a\51\x20\40\x20\40\x20\x20\x20\x20\x20\x20\x20\x20\x20\40\x20\x20\x20\x20\x20\43\40\141\x20\57\x2c\40\156\x6f\x74\150\x69\156\x67\x2c\x20\141\x20\x2f\x20\x77\x69\164\x68\x20\x73\157\155\x65\x74\x68\x69\x6e\x67\x2c\40\141\40\x71\x75\x65\162\x79\x20\157\x72\40\x61\40\x66\162\x61\x67\x6d\145\x6e\164\xd\12\40\40\x20\40\40\x20\40\x20\44\x7e\x69\x78\x75";
        $K0 = \sprintf($K0, \implode("\x7c", $U2));
        if (\preg_match($K0, $DE)) {
            goto ZDr;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\141\154\165\x65\40\42\x25\163\42\x20\x77\x61\x73\40\145\170\160\145\x63\x74\x65\x64\x20\164\157\x20\x62\x65\40\141\x20\x76\x61\x6c\x69\144\x20\x55\x52\x4c\40\x73\x74\x61\162\x74\x69\x6e\x67\40\x77\x69\164\150\x20\150\x74\164\160\x20\157\162\x20\x68\164\x74\x70\163"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_URL, $Tn);
        ZDr:
        return true;
    }
    public static function alnum($DE, $tj = null, $Tn = null)
    {
        try {
            static::regex($DE, "\50\x5e\50\x5b\141\55\x7a\x41\55\x5a\135\x7b\61\175\x5b\141\55\x7a\101\55\132\x30\x2d\x39\135\x2a\51\44\51", $tj, $Tn);
        } catch (AssertionFailedException $XE) {
            $tj = \sprintf(static::generateMessage($tj ?: "\126\x61\154\165\145\x20\x22\45\x73\42\x20\151\163\x20\x6e\x6f\x74\40\141\x6c\160\150\141\156\165\x6d\145\x72\x69\x63\54\x20\x73\x74\141\162\164\x69\156\147\x20\x77\x69\x74\150\40\x6c\x65\x74\164\145\x72\x73\40\141\156\144\40\x63\x6f\156\164\x61\x69\156\151\x6e\x67\x20\x6f\156\154\x79\x20\154\x65\x74\164\x65\x72\x73\40\141\x6e\144\40\156\x75\155\142\145\x72\163\x2e"), static::stringify($DE));
            throw static::createException($DE, $tj, static::INVALID_ALNUM, $Tn);
        }
        return true;
    }
    public static function true($DE, $tj = null, $Tn = null)
    {
        if (!(true !== $DE)) {
            goto RLn;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\141\x6c\165\145\40\42\x25\163\42\40\x69\x73\x20\x6e\157\164\x20\x54\122\x55\x45\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_TRUE, $Tn);
        RLn:
        return true;
    }
    public static function false($DE, $tj = null, $Tn = null)
    {
        if (!(false !== $DE)) {
            goto a1q;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\141\x6c\165\x65\40\x22\45\163\x22\x20\x69\163\x20\x6e\x6f\164\x20\x46\101\114\x53\x45\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_FALSE, $Tn);
        a1q:
        return true;
    }
    public static function classExists($DE, $tj = null, $Tn = null)
    {
        if (\class_exists($DE)) {
            goto fNJ;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x43\x6c\141\x73\163\40\42\45\x73\x22\40\144\x6f\x65\163\40\156\x6f\x74\40\x65\x78\151\163\164\x2e"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_CLASS, $Tn);
        fNJ:
        return true;
    }
    public static function interfaceExists($DE, $tj = null, $Tn = null)
    {
        if (\interface_exists($DE)) {
            goto E3k;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\111\156\164\145\x72\146\x61\x63\145\x20\x22\x25\163\42\x20\144\x6f\145\163\40\156\x6f\164\40\x65\x78\x69\x73\164\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_INTERFACE, $Tn);
        E3k:
        return true;
    }
    public static function implementsInterface($BP, $it, $tj = null, $Tn = null)
    {
        $uf = new \ReflectionClass($BP);
        if ($uf->implementsInterface($it)) {
            goto dU4;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\103\x6c\141\163\x73\40\x22\x25\x73\42\x20\x64\x6f\145\x73\x20\156\x6f\164\40\151\155\x70\154\x65\155\145\156\164\x20\x69\x6e\x74\x65\162\x66\x61\143\145\40\x22\45\x73\42\x2e"), static::stringify($BP), static::stringify($it));
        throw static::createException($BP, $tj, static::INTERFACE_NOT_IMPLEMENTED, $Tn, array("\151\156\164\145\x72\x66\141\143\x65" => $it));
        dU4:
        return true;
    }
    public static function isJsonString($DE, $tj = null, $Tn = null)
    {
        if (!(null === \json_decode($DE) && JSON_ERROR_NONE !== \json_last_error())) {
            goto PDX;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\141\x6c\x75\145\x20\x22\x25\163\x22\x20\151\163\40\x6e\x6f\x74\x20\x61\40\x76\141\154\x69\x64\40\x4a\x53\117\x4e\x20\163\x74\162\151\x6e\x67\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_JSON_STRING, $Tn);
        PDX:
        return true;
    }
    public static function uuid($DE, $tj = null, $Tn = null)
    {
        $DE = \str_replace(array("\x75\162\156\72", "\x75\x75\x69\144\x3a", "\173", "\x7d"), '', $DE);
        if (!("\x30\60\60\60\60\x30\60\60\x2d\x30\x30\x30\60\x2d\x30\x30\60\x30\x2d\60\60\x30\60\x2d\x30\60\x30\x30\x30\60\60\x30\x30\x30\60\60" === $DE)) {
            goto aSP;
        }
        return true;
        aSP:
        if (\preg_match("\57\136\x5b\60\x2d\71\101\x2d\x46\x61\55\146\135\173\70\x7d\55\133\60\x2d\71\101\x2d\x46\141\x2d\146\x5d\x7b\x34\x7d\55\x5b\60\x2d\x39\101\x2d\106\x61\x2d\x66\135\x7b\64\175\x2d\x5b\60\x2d\x39\101\x2d\x46\141\x2d\x66\135\173\x34\175\55\x5b\x30\x2d\x39\101\55\106\141\55\x66\x5d\173\61\62\x7d\44\x2f", $DE)) {
            goto sJF;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\141\154\165\145\x20\42\x25\163\42\x20\151\x73\40\156\x6f\x74\40\141\x20\166\141\x6c\151\x64\40\125\125\x49\x44\x2e"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_UUID, $Tn);
        sJF:
        return true;
    }
    public static function e164($DE, $tj = null, $Tn = null)
    {
        if (\preg_match("\57\x5e\134\x2b\x3f\133\61\x2d\x39\x5d\x5c\144\x7b\x31\x2c\x31\x34\175\x24\x2f", $DE)) {
            goto gCB;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\141\154\x75\x65\40\42\45\x73\x22\40\x69\x73\x20\156\157\164\x20\x61\x20\166\141\x6c\x69\x64\40\x45\61\66\64\x2e"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_E164, $Tn);
        gCB:
        return true;
    }
    public static function count($w1, $xI, $tj = null, $Tn = null)
    {
        if (!($xI !== \count($w1))) {
            goto gcC;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x4c\151\163\164\40\x64\157\x65\163\40\156\x6f\x74\x20\143\x6f\156\x74\141\x69\156\40\x65\170\141\x63\164\x6c\171\x20\x25\144\x20\x65\x6c\x65\155\x65\156\x74\x73\40\50\x25\144\x20\x67\151\166\x65\156\51\56"), static::stringify($xI), static::stringify(\count($w1)));
        throw static::createException($w1, $tj, static::INVALID_COUNT, $Tn, array("\143\157\165\x6e\164" => $xI));
        gcC:
        return true;
    }
    public static function __callStatic($XC, $Ib)
    {
        if (!(0 === \strpos($XC, "\x6e\165\154\x6c\117\x72"))) {
            goto OdD;
        }
        if (\array_key_exists(0, $Ib)) {
            goto D4K;
        }
        throw new BadMethodCallException("\115\x69\x73\163\151\x6e\147\40\164\x68\x65\x20\146\151\162\x73\164\40\141\162\147\165\x6d\x65\156\164\x2e");
        D4K:
        if (!(null === $Ib[0])) {
            goto SD1;
        }
        return true;
        SD1:
        $XC = \substr($XC, 6);
        return \call_user_func_array(array(\get_called_class(), $XC), $Ib);
        OdD:
        if (!(0 === \strpos($XC, "\141\x6c\154"))) {
            goto Jlo;
        }
        if (\array_key_exists(0, $Ib)) {
            goto dv7;
        }
        throw new BadMethodCallException("\x4d\x69\x73\x73\151\156\147\40\x74\x68\x65\40\146\x69\x72\x73\x74\40\x61\162\x67\165\155\145\x6e\x74\x2e");
        dv7:
        static::isTraversable($Ib[0]);
        $XC = \substr($XC, 3);
        $XV = \array_shift($Ib);
        $wS = \get_called_class();
        foreach ($XV as $DE) {
            \call_user_func_array(array($wS, $XC), \array_merge(array($DE), $Ib));
            cDi:
        }
        WjW:
        return true;
        Jlo:
        throw new BadMethodCallException("\x4e\x6f\40\141\x73\163\145\162\x74\x69\x6f\x6e\x20\101\163\163\x65\x72\164\151\x6f\x6e\x23" . $XC . "\40\x65\x78\x69\x73\164\x73\x2e");
    }
    public static function choicesNotEmpty(array $XV, array $oL, $tj = null, $Tn = null)
    {
        static::notEmpty($XV, $tj, $Tn);
        foreach ($oL as $Bk) {
            static::notEmptyKey($XV, $Bk, $tj, $Tn);
            Lk0:
        }
        P6Z:
        return true;
    }
    public static function methodExists($DE, $Hp, $tj = null, $Tn = null)
    {
        static::isObject($Hp, $tj, $Tn);
        if (\method_exists($Hp, $DE)) {
            goto F7t;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\105\170\x70\145\x63\164\145\144\x20\x22\45\x73\42\40\144\x6f\x65\163\40\x6e\157\164\x20\145\170\151\163\164\x20\151\156\x20\x70\162\x6f\166\x69\144\145\x64\x20\157\142\152\145\x63\164\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_METHOD, $Tn, array("\157\142\152\145\x63\164" => \get_class($Hp)));
        F7t:
        return true;
    }
    public static function isObject($DE, $tj = null, $Tn = null)
    {
        if (\is_object($DE)) {
            goto IM7;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\120\162\157\x76\x69\144\x65\144\40\x22\x25\x73\42\40\151\163\40\x6e\157\164\40\141\x20\x76\x61\154\x69\x64\40\157\142\x6a\x65\x63\164\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_OBJECT, $Tn);
        IM7:
        return true;
    }
    public static function lessThan($DE, $oh, $tj = null, $Tn = null)
    {
        if (!($DE >= $oh)) {
            goto mQF;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\120\162\x6f\x76\151\144\145\144\x20\x22\x25\163\x22\x20\151\x73\x20\x6e\x6f\x74\x20\154\145\163\x73\x20\x74\150\141\156\x20\x22\45\x73\x22\56"), static::stringify($DE), static::stringify($oh));
        throw static::createException($DE, $tj, static::INVALID_LESS, $Tn, array("\x6c\x69\155\151\164" => $oh));
        mQF:
        return true;
    }
    public static function lessOrEqualThan($DE, $oh, $tj = null, $Tn = null)
    {
        if (!($DE > $oh)) {
            goto o44;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x50\x72\157\x76\151\x64\145\x64\x20\x22\45\163\x22\x20\151\x73\40\156\157\x74\40\154\x65\163\163\x20\157\162\x20\145\x71\165\141\154\40\164\x68\141\x6e\x20\42\x25\163\x22\x2e"), static::stringify($DE), static::stringify($oh));
        throw static::createException($DE, $tj, static::INVALID_LESS_OR_EQUAL, $Tn, array("\x6c\151\x6d\x69\x74" => $oh));
        o44:
        return true;
    }
    public static function greaterThan($DE, $oh, $tj = null, $Tn = null)
    {
        if (!($DE <= $oh)) {
            goto qkl;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\120\x72\x6f\x76\151\x64\x65\144\x20\x22\x25\x73\x22\x20\x69\x73\40\156\x6f\164\40\x67\x72\145\x61\164\145\x72\x20\x74\150\141\156\x20\42\45\163\42\x2e"), static::stringify($DE), static::stringify($oh));
        throw static::createException($DE, $tj, static::INVALID_GREATER, $Tn, array("\x6c\151\x6d\x69\x74" => $oh));
        qkl:
        return true;
    }
    public static function greaterOrEqualThan($DE, $oh, $tj = null, $Tn = null)
    {
        if (!($DE < $oh)) {
            goto ZdR;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x50\x72\x6f\x76\x69\144\x65\x64\40\42\45\163\42\40\151\x73\40\x6e\157\x74\x20\x67\162\145\x61\164\145\162\x20\157\162\x20\x65\161\165\141\154\40\164\x68\141\x6e\x20\x22\x25\x73\42\56"), static::stringify($DE), static::stringify($oh));
        throw static::createException($DE, $tj, static::INVALID_GREATER_OR_EQUAL, $Tn, array("\x6c\x69\x6d\151\x74" => $oh));
        ZdR:
        return true;
    }
    public static function between($DE, $am, $za, $tj = null, $Tn = null)
    {
        if (!($am > $DE || $DE > $za)) {
            goto yJ6;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x50\162\x6f\x76\x69\x64\145\x64\40\x22\x25\163\x22\x20\x69\x73\x20\156\145\151\x74\150\x65\162\x20\147\x72\145\141\164\x65\x72\x20\164\150\x61\156\x20\157\162\40\145\161\165\x61\x6c\x20\x74\157\40\x22\45\x73\42\40\x6e\x6f\x72\40\x6c\145\x73\163\40\x74\x68\141\x6e\40\157\162\x20\x65\161\x75\x61\x6c\x20\164\x6f\x20\42\x25\x73\42\x2e"), static::stringify($DE), static::stringify($am), static::stringify($za));
        throw static::createException($DE, $tj, static::INVALID_BETWEEN, $Tn, array("\x6c\x6f\x77\145\162" => $am, "\x75\x70\160\145\162" => $za));
        yJ6:
        return true;
    }
    public static function betweenExclusive($DE, $am, $za, $tj = null, $Tn = null)
    {
        if (!($am >= $DE || $DE >= $za)) {
            goto D8T;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\120\162\x6f\166\x69\x64\145\144\40\42\45\163\42\x20\151\163\40\x6e\145\151\x74\150\x65\162\x20\147\x72\145\x61\x74\145\x72\40\164\150\141\x6e\x20\42\45\x73\42\x20\156\157\162\x20\x6c\145\163\x73\40\164\150\141\x6e\x20\42\45\x73\x22\x2e"), static::stringify($DE), static::stringify($am), static::stringify($za));
        throw static::createException($DE, $tj, static::INVALID_BETWEEN_EXCLUSIVE, $Tn, array("\154\157\x77\x65\x72" => $am, "\165\x70\x70\x65\x72" => $za));
        D8T:
        return true;
    }
    public static function extensionLoaded($DE, $tj = null, $Tn = null)
    {
        if (\extension_loaded($DE)) {
            goto xBq;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\105\170\164\x65\x6e\163\151\157\x6e\x20\42\x25\x73\x22\x20\151\x73\40\162\x65\x71\165\x69\162\x65\x64\x2e"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_EXTENSION, $Tn);
        xBq:
        return true;
    }
    public static function date($DE, $gD, $tj = null, $Tn = null)
    {
        static::string($DE, $tj, $Tn);
        static::string($gD, $tj, $Tn);
        $Dj = \DateTime::createFromFormat("\x21" . $gD, $DE);
        if (!(false === $Dj || $DE !== $Dj->format($gD))) {
            goto Dte;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\104\141\x74\x65\x20\42\x25\163\42\40\151\163\40\151\x6e\x76\141\154\151\144\40\157\162\40\144\x6f\145\163\x20\156\x6f\164\40\155\x61\164\143\x68\40\146\x6f\x72\x6d\x61\164\40\42\x25\163\42\x2e"), static::stringify($DE), static::stringify($gD));
        throw static::createException($DE, $tj, static::INVALID_DATE, $Tn, array("\146\x6f\162\155\141\164" => $gD));
        Dte:
        return true;
    }
    public static function objectOrClass($DE, $tj = null, $Tn = null)
    {
        if (\is_object($DE)) {
            goto J4F;
        }
        static::classExists($DE, $tj, $Tn);
        J4F:
        return true;
    }
    public static function propertyExists($DE, $fR, $tj = null, $Tn = null)
    {
        static::objectOrClass($DE);
        if (\property_exists($DE, $fR)) {
            goto qIb;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x43\x6c\x61\163\x73\40\x22\x25\163\42\40\x64\x6f\x65\163\x20\x6e\x6f\164\x20\x68\x61\x76\x65\x20\160\162\157\x70\145\x72\164\171\x20\x22\45\x73\x22\x2e"), static::stringify($DE), static::stringify($fR));
        throw static::createException($DE, $tj, static::INVALID_PROPERTY, $Tn, array("\x70\x72\157\160\145\162\x74\x79" => $fR));
        qIb:
        return true;
    }
    public static function propertiesExist($DE, array $CY, $tj = null, $Tn = null)
    {
        static::objectOrClass($DE);
        static::allString($CY, $tj, $Tn);
        $wM = array();
        foreach ($CY as $fR) {
            if (\property_exists($DE, $fR)) {
                goto iTf;
            }
            $wM[] = $fR;
            iTf:
            IRb:
        }
        DLp:
        if (!$wM) {
            goto N3I;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x43\154\141\x73\x73\x20\x22\x25\163\42\40\144\x6f\145\x73\x20\x6e\157\164\40\150\141\x76\145\40\x74\x68\145\163\x65\x20\x70\x72\x6f\x70\145\x72\164\151\145\x73\x3a\40\x25\x73\56"), static::stringify($DE), static::stringify(\implode("\54\40", $wM)));
        throw static::createException($DE, $tj, static::INVALID_PROPERTY, $Tn, array("\160\x72\157\160\145\x72\x74\x69\x65\x73" => $CY));
        N3I:
        return true;
    }
    public static function version($Sz, $iP, $DN, $tj = null, $Tn = null)
    {
        static::notEmpty($iP, "\166\x65\x72\163\x69\157\x6e\103\157\155\160\x61\x72\x65\x20\x6f\x70\145\162\141\x74\x6f\x72\x20\151\x73\40\x72\x65\x71\165\151\162\145\144\40\141\156\x64\40\143\141\156\x6e\157\x74\x20\142\x65\40\x65\155\x70\164\x79\x2e");
        if (!(true !== \version_compare($Sz, $DN, $iP))) {
            goto rqz;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\x65\162\x73\151\157\x6e\40\42\45\163\x22\40\151\x73\x20\x6e\157\164\x20\42\45\x73\42\x20\x76\x65\x72\163\x69\157\x6e\40\x22\x25\163\42\56"), static::stringify($Sz), static::stringify($iP), static::stringify($DN));
        throw static::createException($Sz, $tj, static::INVALID_VERSION, $Tn, array("\x6f\160\x65\162\x61\x74\x6f\162" => $iP, "\166\x65\162\x73\151\x6f\x6e" => $DN));
        rqz:
        return true;
    }
    public static function phpVersion($iP, $NW, $tj = null, $Tn = null)
    {
        static::defined("\x50\110\x50\137\126\x45\x52\x53\x49\x4f\x4e");
        return static::version(PHP_VERSION, $iP, $NW, $tj, $Tn);
    }
    public static function extensionVersion($zr, $iP, $NW, $tj = null, $Tn = null)
    {
        static::extensionLoaded($zr, $tj, $Tn);
        return static::version(\phpversion($zr), $iP, $NW, $tj, $Tn);
    }
    public static function isCallable($DE, $tj = null, $Tn = null)
    {
        if (\is_callable($DE)) {
            goto UUR;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\120\x72\157\166\x69\x64\145\144\x20\x22\x25\163\x22\40\x69\163\40\x6e\157\164\x20\141\40\x63\141\x6c\154\x61\x62\x6c\145\x2e"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_CALLABLE, $Tn);
        UUR:
        return true;
    }
    public static function satisfy($DE, $y5, $tj = null, $Tn = null)
    {
        static::isCallable($y5);
        if (!(false === \call_user_func($y5, $DE))) {
            goto g1l;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x50\x72\x6f\x76\x69\144\145\x64\40\42\45\163\x22\x20\151\x73\x20\x69\x6e\x76\141\x6c\x69\144\x20\141\x63\143\x6f\162\x64\x69\156\x67\x20\164\x6f\40\x63\165\163\164\157\x6d\x20\162\165\x6c\145\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_SATISFY, $Tn);
        g1l:
        return true;
    }
    public static function ip($DE, $UI = null, $tj = null, $Tn = null)
    {
        static::string($DE, $tj, $Tn);
        if (\filter_var($DE, FILTER_VALIDATE_IP, $UI)) {
            goto iLu;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\141\x6c\x75\x65\40\42\x25\x73\x22\40\x77\x61\x73\x20\x65\170\x70\x65\x63\164\145\x64\x20\164\x6f\x20\142\x65\x20\x61\x20\x76\141\154\x69\144\40\111\x50\40\141\144\144\x72\145\163\163\56"), static::stringify($DE));
        throw static::createException($DE, $tj, static::INVALID_IP, $Tn, array("\x66\x6c\x61\147" => $UI));
        iLu:
        return true;
    }
    public static function ipv4($DE, $UI = null, $tj = null, $Tn = null)
    {
        static::ip($DE, $UI | FILTER_FLAG_IPV4, static::generateMessage($tj ?: "\x56\x61\154\165\145\40\x22\x25\163\42\40\x77\x61\x73\x20\x65\x78\160\145\x63\x74\x65\x64\x20\164\x6f\x20\142\x65\x20\x61\x20\166\x61\x6c\151\144\40\111\120\166\64\x20\141\x64\144\162\145\163\163\x2e"), $Tn);
        return true;
    }
    public static function ipv6($DE, $UI = null, $tj = null, $Tn = null)
    {
        static::ip($DE, $UI | FILTER_FLAG_IPV6, static::generateMessage($tj ?: "\126\141\x6c\x75\145\x20\42\45\163\42\40\167\141\163\40\x65\x78\160\x65\143\x74\x65\x64\40\x74\157\40\x62\x65\x20\141\40\x76\141\154\x69\x64\x20\x49\x50\166\x36\40\x61\144\x64\x72\x65\x73\163\56"), $Tn);
        return true;
    }
    protected static function stringify($DE)
    {
        $kN = \gettype($DE);
        if (\is_bool($DE)) {
            goto VPD;
        }
        if (\is_scalar($DE)) {
            goto hmP;
        }
        if (\is_array($DE)) {
            goto gRc;
        }
        if (\is_object($DE)) {
            goto Q0e;
        }
        if (\is_resource($DE)) {
            goto yFV;
        }
        if (null === $DE) {
            goto wZs;
        }
        goto usn;
        VPD:
        $kN = $DE ? "\x3c\124\x52\125\x45\76" : "\74\106\101\114\x53\105\x3e";
        goto usn;
        hmP:
        $VR = (string) $DE;
        if (!(\strlen($VR) > 100)) {
            goto a7L;
        }
        $VR = \substr($VR, 0, 97) . "\56\x2e\x2e";
        a7L:
        $kN = $VR;
        goto usn;
        gRc:
        $kN = "\x3c\x41\122\x52\x41\x59\76";
        goto usn;
        Q0e:
        $kN = \get_class($DE);
        goto usn;
        yFV:
        $kN = \get_resource_type($DE);
        goto usn;
        wZs:
        $kN = "\74\x4e\x55\114\x4c\76";
        usn:
        return $kN;
    }
    public static function defined($WI, $tj = null, $Tn = null)
    {
        if (\defined($WI)) {
            goto v4m;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\x56\x61\x6c\x75\x65\40\x22\x25\x73\x22\40\x65\170\x70\x65\x63\x74\145\144\x20\164\157\40\142\x65\x20\141\40\144\x65\146\151\156\145\144\x20\143\157\x6e\163\164\141\156\x74\56"), $WI);
        throw static::createException($WI, $tj, static::INVALID_CONSTANT, $Tn);
        v4m:
        return true;
    }
    public static function base64($DE, $tj = null, $Tn = null)
    {
        if (!(false === \base64_decode($DE, true))) {
            goto VEW;
        }
        $tj = \sprintf(static::generateMessage($tj ?: "\126\141\154\165\x65\x20\42\x25\163\42\40\151\x73\40\156\157\164\40\x61\40\166\141\154\x69\144\40\x62\x61\x73\145\66\x34\40\x73\x74\x72\151\x6e\147\56"), $DE);
        throw static::createException($DE, $tj, static::INVALID_BASE64, $Tn);
        VEW:
        return true;
    }
    protected static function generateMessage($tj = null)
    {
        if (!\is_callable($tj)) {
            goto aky;
        }
        $T1 = \debug_backtrace(0);
        $ov = array();
        $uf = new \ReflectionClass($T1[1]["\x63\154\x61\x73\x73"]);
        $XC = $uf->getMethod($T1[1]["\x66\165\156\x63\x74\x69\157\156"]);
        foreach ($XC->getParameters() as $Ub => $D0) {
            if (!("\155\145\x73\x73\x61\147\145" !== $D0->getName())) {
                goto O9l;
            }
            $ov[$D0->getName()] = \array_key_exists($Ub, $T1[1]["\x61\x72\x67\x73"]) ? $T1[1]["\141\x72\147\163"][$Ub] : $D0->getDefaultValue();
            O9l:
            vRk:
        }
        eZc:
        $ov["\72\x3a\x61\163\x73\x65\162\x74\151\157\x6e"] = \sprintf("\x25\163\45\x73\45\163", $T1[1]["\143\x6c\x61\163\x73"], $T1[1]["\x74\171\160\145"], $T1[1]["\x66\x75\x6e\143\x74\151\157\x6e"]);
        $tj = \call_user_func_array($tj, array($ov));
        aky:
        return \is_null($tj) ? null : (string) $tj;
    }
}
