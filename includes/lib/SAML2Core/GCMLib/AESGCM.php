<?php


namespace AESGCM;

require_once "\x41\x73\163\145\162\x74\57\x41\163\163\x65\x72\164\151\x6f\156\x2e\x70\150\160";
use Assert\Assertion;
final class AESGCM
{
    public static function encrypt($fV, $g6, $fR = null, $cv = null, $A0 = 128)
    {
        Assertion::string($fV, "\x54\x68\x65\x20\x6b\145\171\x20\145\156\x63\x72\171\x70\x74\x69\157\x6e\40\153\x65\x79\40\155\x75\x73\164\40\x62\x65\x20\141\x20\x62\x69\156\x61\162\x79\40\x73\x74\x72\151\x6e\147\x2e");
        $Yh = mb_strlen($fV, "\70\x62\x69\164") * 8;
        Assertion::inArray($Yh, array(128, 192, 256), "\102\141\x64\x20\153\145\171\40\145\156\x63\x72\x79\x70\x74\x69\x6f\x6e\x20\153\x65\x79\40\x6c\145\156\147\164\x68\x2e");
        Assertion::string($g6, "\x54\x68\145\40\x49\156\x69\164\x69\141\154\151\172\141\164\151\157\x6e\x20\x56\x65\x63\x74\x6f\x72\40\155\165\163\x74\40\142\x65\x20\141\x20\x62\x69\156\x61\x72\171\40\x73\x74\x72\151\156\x67\56");
        Assertion::nullOrString($fR, "\x54\x68\145\40\x64\x61\164\x61\x20\164\157\x20\145\x6e\x63\x72\x79\160\164\x20\155\x75\163\164\40\x62\145\x20\156\x75\154\x6c\x20\x6f\x72\x20\141\40\142\151\x6e\x61\x72\171\x20\x73\x74\162\151\156\x67\x2e");
        Assertion::nullOrString($cv, "\x54\150\145\40\101\144\x64\151\164\151\157\x6e\141\154\x20\x41\x75\x74\150\x65\x6e\164\151\x63\x61\164\x69\x6f\156\x20\104\x61\164\x61\40\x6d\x75\x73\x74\x20\x62\x65\40\156\165\x6c\154\x20\x6f\x72\x20\141\40\x62\151\156\141\162\x79\x20\163\x74\x72\x69\156\147\x2e");
        Assertion::integer($A0, "\x49\156\x76\141\x6c\151\x64\x20\164\141\x67\x20\x6c\145\x6e\x67\164\150\x2e\40\x53\x75\160\160\157\162\164\145\x64\40\x76\141\x6c\165\145\x73\40\141\x72\145\x3a\40\x31\x32\x38\x2c\40\61\62\60\x2c\x20\61\61\62\x2c\x20\x31\60\64\x20\x61\156\x64\x20\x39\66\x2e");
        Assertion::inArray($A0, array(128, 120, 112, 104, 96), "\x49\156\166\x61\154\151\144\x20\164\141\x67\40\154\x65\x6e\147\164\x68\56\x20\123\165\x70\x70\157\x72\164\145\144\40\166\141\154\x75\145\163\40\141\162\x65\72\40\61\62\x38\54\x20\61\62\x30\54\x20\61\x31\x32\54\40\x31\60\x34\x20\141\156\x64\x20\71\x36\56");
        if (version_compare(PHP_VERSION, "\x37\x2e\x31\56\x30\x52\103\65") >= 0 && null !== $fR) {
            goto Qfy;
        }
        if (class_exists("\x5c\x43\162\171\x70\x74\157\x5c\103\151\x70\x68\x65\162")) {
            goto hbS;
        }
        goto iaL;
        Qfy:
        return self::encryptWithPHP71($fV, $Yh, $g6, $fR, $cv, $A0);
        goto iaL;
        hbS:
        return self::encryptWithCryptoExtension($fV, $Yh, $g6, $fR, $cv, $A0);
        iaL:
        return self::encryptWithPHP($fV, $Yh, $g6, $fR, $cv, $A0);
    }
    public static function encryptAndAppendTag($fV, $g6, $fR = null, $cv = null, $A0 = 128)
    {
        return implode(self::encrypt($fV, $g6, $fR, $cv, $A0));
    }
    private static function encryptWithPHP71($fV, $Yh, $g6, $fR = null, $cv = null, $A0 = 128)
    {
        $J7 = "\x61\145\x73\55" . $Yh . "\55\147\x63\x6d";
        $QI = null;
        $MY = openssl_encrypt($fR, $J7, $fV, OPENSSL_RAW_DATA, $g6, $QI, $cv, $A0 / 8);
        Assertion::true(false !== $MY, "\x55\x6e\x61\x62\154\145\40\x74\x6f\x20\145\156\x63\x72\x79\x70\x74\40\x74\150\145\x20\x64\x61\x74\x61\56");
        return array($MY, $QI);
    }
    private static function encryptWithPHP($fV, $Yh, $g6, $fR = null, $cv = null, $A0 = 128)
    {
        list($f4, $q6, $rh, $z0) = self::common($fV, $Yh, $g6, $cv);
        $MY = self::getGCTR($fV, $Yh, self::getInc(32, $f4), $fR);
        $Tv = self::calcVector($MY);
        $B6 = self::addPadding($MY);
        $yp = self::getHash($z0, $cv . str_pad('', $q6 / 8, "\0") . $MY . str_pad('', $Tv / 8, "\x0") . $rh . $B6);
        $QI = self::getMSB($A0, self::getGCTR($fV, $Yh, $f4, $yp));
        return array($MY, $QI);
    }
    private static function encryptWithCryptoExtension($fV, $Yh, $g6, $fR = null, $cv = null, $A0 = 128)
    {
        $yc = \Crypto\Cipher::aes(\Crypto\Cipher::MODE_GCM, $Yh);
        $yc->setAAD($cv);
        $yc->setTagLength($A0 / 8);
        $MY = $yc->encrypt($fR, $fV, $g6);
        $QI = $yc->getTag();
        return array($MY, $QI);
    }
    public static function decrypt($fV, $g6, $MY, $cv, $QI)
    {
        Assertion::string($fV, "\124\150\x65\x20\153\x65\171\x20\x65\x6e\143\162\x79\160\x74\151\157\156\x20\x6b\x65\x79\x20\155\165\x73\164\x20\x62\145\x20\x61\x20\x62\151\x6e\x61\162\171\x20\x73\x74\162\x69\156\x67\56");
        $Yh = mb_strlen($fV, "\70\142\151\x74") * 8;
        Assertion::inArray($Yh, array(128, 192, 256), "\102\141\144\40\153\145\171\40\145\156\x63\162\171\160\x74\x69\x6f\156\x20\153\145\x79\40\x6c\x65\156\147\164\150\x2e");
        Assertion::string($g6, "\x54\x68\x65\x20\111\156\x69\164\x69\141\154\x69\172\x61\x74\151\157\156\x20\126\x65\x63\x74\x6f\162\40\x6d\165\x73\x74\40\142\x65\x20\x61\40\142\151\156\x61\162\x79\40\163\164\162\151\x6e\x67\56");
        Assertion::nullOrString($MY, "\124\150\145\40\144\141\x74\x61\x20\x74\x6f\x20\x65\156\x63\x72\x79\x70\x74\40\x6d\x75\163\164\x20\x62\145\40\x6e\x75\154\x6c\x20\x6f\x72\40\141\40\x62\151\156\x61\x72\171\x20\x73\x74\162\x69\156\x67\x2e");
        Assertion::nullOrString($cv, "\x54\x68\145\x20\x41\x64\x64\151\x74\x69\157\156\141\x6c\x20\x41\x75\164\x68\x65\x6e\164\151\x63\141\164\x69\x6f\x6e\40\x44\x61\164\x61\x20\155\x75\163\x74\x20\x62\x65\40\x6e\165\154\x6c\40\157\x72\x20\141\x20\x62\x69\156\141\x72\x79\x20\163\x74\162\151\156\x67\56");
        $A0 = self::getLength($QI);
        Assertion::integer($A0, "\x49\156\x76\141\154\x69\x64\40\164\x61\x67\40\x6c\x65\156\147\164\150\56\40\123\x75\x70\160\157\x72\164\145\x64\40\x76\x61\x6c\165\145\163\40\x61\x72\x65\x3a\40\61\62\x38\x2c\40\61\62\60\x2c\40\x31\61\x32\x2c\x20\61\60\64\x20\141\156\144\x20\x39\66\56");
        Assertion::inArray($A0, array(128, 120, 112, 104, 96), "\x49\156\x76\x61\154\x69\144\x20\x74\x61\x67\x20\x6c\x65\x6e\147\164\150\x2e\40\123\x75\160\160\157\162\164\145\144\x20\x76\x61\x6c\165\145\x73\40\x61\x72\x65\72\40\61\x32\x38\x2c\40\x31\x32\60\54\x20\61\61\x32\54\x20\61\x30\64\40\141\x6e\x64\40\x39\66\x2e");
        if (version_compare(PHP_VERSION, "\x37\x2e\x31\x2e\60\x52\103\x35") >= 0 && null !== $MY) {
            goto t6r;
        }
        if (class_exists("\x5c\103\162\171\160\164\x6f\134\x43\151\160\150\145\162")) {
            goto c8y;
        }
        goto lIS;
        t6r:
        return self::decryptWithPHP71($fV, $Yh, $g6, $MY, $cv, $QI);
        goto lIS;
        c8y:
        return self::decryptWithCryptoExtension($fV, $Yh, $g6, $MY, $cv, $QI, $A0);
        lIS:
        return self::decryptWithPHP($fV, $Yh, $g6, $MY, $cv, $QI, $A0);
    }
    public static function decryptWithAppendedTag($fV, $g6, $CT = null, $cv = null, $A0 = 128)
    {
        $pp = $A0 / 8;
        $MY = mb_substr($CT, 0, -$pp, "\70\142\x69\x74");
        $QI = mb_substr($CT, -$pp, null, "\x38\x62\x69\164");
        return self::decrypt($fV, $g6, $MY, $cv, $QI);
    }
    private static function decryptWithPHP71($fV, $Yh, $g6, $MY, $cv, $QI)
    {
        $J7 = "\141\145\x73\55" . $Yh . "\55\147\143\x6d";
        $fR = openssl_decrypt(null === $MY ? '' : $MY, $J7, $fV, OPENSSL_RAW_DATA, $g6, $QI, null === $cv ? '' : $cv);
        Assertion::true(false !== $fR, "\x55\x6e\141\142\x6c\x65\x20\x74\x6f\40\x64\145\x63\x72\171\x70\x74\x20\x6f\162\x20\x74\157\40\166\145\162\x69\x66\x79\x20\164\x68\145\x20\x74\141\x67\x2e");
        return $fR;
    }
    private static function decryptWithPHP($fV, $Yh, $g6, $MY, $cv, $QI, $A0 = 128)
    {
        list($f4, $q6, $rh, $z0) = self::common($fV, $Yh, $g6, $cv);
        $fR = self::getGCTR($fV, $Yh, self::getInc(32, $f4), $MY);
        $Tv = self::calcVector($MY);
        $B6 = self::addPadding($MY);
        $yp = self::getHash($z0, $cv . str_pad('', $q6 / 8, "\0") . $MY . str_pad('', $Tv / 8, "\x0") . $rh . $B6);
        $Wi = self::getMSB($A0, self::getGCTR($fV, $Yh, $f4, $yp));
        Assertion::eq($Wi, $QI, "\x55\x6e\141\142\x6c\145\40\164\157\40\x64\x65\x63\162\x79\x70\164\40\157\x72\40\x74\x6f\40\x76\x65\162\151\x66\171\40\x74\150\x65\40\164\x61\147\56");
        return $fR;
    }
    private static function decryptWithCryptoExtension($fV, $Yh, $g6, $MY, $cv, $QI, $A0 = 128)
    {
        $yc = \Crypto\Cipher::aes(\Crypto\Cipher::MODE_GCM, $Yh);
        $yc->setTag($QI);
        $yc->setAAD($cv);
        $yc->setTagLength($A0 / 8);
        return $yc->decrypt($MY, $fV, $g6);
    }
    private static function common($fV, $Yh, $g6, $cv)
    {
        $z0 = openssl_encrypt(str_repeat("\x0", 16), "\x61\145\163\55" . $Yh . "\55\x65\x63\142", $fV, OPENSSL_NO_PADDING | OPENSSL_RAW_DATA);
        $Yd = self::getLength($g6);
        if (96 === $Yd) {
            goto rVh;
        }
        $kh = self::calcVector($g6);
        Assertion::eq(($kh + 64) % 8, 0, "\x55\x6e\x61\x62\154\145\x20\164\x6f\x20\144\145\143\x72\x79\x70\x74\40\157\162\x20\x74\x6f\x20\x76\x65\162\x69\x66\171\40\164\x68\x65\x20\x74\x61\x67\56");
        $Ex = pack("\116", $Yd);
        $rE = str_pad($Ex, 8, "\0", STR_PAD_LEFT);
        $QB = $g6 . str_pad('', ($kh + 64) / 8, "\x0") . $rE;
        $f4 = self::getHash($z0, $QB);
        goto cea;
        rVh:
        $f4 = $g6 . pack("\x48\52", "\60\60\60\x30\60\60\x30\61");
        cea:
        $q6 = self::calcVector($cv);
        $rh = self::addPadding($cv);
        return array($f4, $q6, $rh, $z0);
    }
    private static function calcVector($zw)
    {
        return 128 * ceil(self::getLength($zw) / 128) - self::getLength($zw);
    }
    private static function addPadding($zw)
    {
        return str_pad(pack("\116", self::getLength($zw)), 8, "\0", STR_PAD_LEFT);
    }
    private static function getLength($AE)
    {
        return mb_strlen($AE, "\70\x62\151\164") * 8;
    }
    private static function getMSB($qm, $AE)
    {
        $nk = $qm / 8;
        return mb_substr($AE, 0, $nk, "\70\x62\x69\164");
    }
    private static function getLSB($qm, $AE)
    {
        $nk = $qm / 8;
        return mb_substr($AE, -$nk, null, "\70\142\151\164");
    }
    private static function getInc($hL, $AE)
    {
        $OF = self::getLSB($hL, $AE);
        $Yb = self::toUInt32Bits($OF) + 1;
        $UO = self::getMSB(self::getLength($AE) - $hL, $AE) . pack("\116", $Yb);
        return $UO;
    }
    private static function toUInt32Bits($R0)
    {
        list(, $Gv, $u0) = unpack("\x6e\x2a", $R0);
        return $u0 + $Gv * 65536;
    }
    private static function getProduct($Yb, $kD)
    {
        $IB = pack("\x48\52", "\x45\x31") . str_pad('', 15, "\x0");
        $eZ = str_pad('', 16, "\x0");
        $Ff = $kD;
        $iV = str_split($Yb, 4);
        $AE = sprintf("\x25\60\63\62\x62\x25\60\63\62\142\x25\x30\63\x32\x62\45\x30\63\x32\x62", self::toUInt32Bits($iV[0]), self::toUInt32Bits($iV[1]), self::toUInt32Bits($iV[2]), self::toUInt32Bits($iV[3]));
        $LL = "\1";
        $lp = 0;
        Y5s:
        if (!($lp < 128)) {
            goto NbQ;
        }
        if (!$AE[$lp]) {
            goto pYq;
        }
        $eZ = self::getBitXor($eZ, $Ff);
        pYq:
        $D_ = mb_substr($Ff, -1, null, "\x38\142\151\x74");
        if (ord($D_ & $LL)) {
            goto J1m;
        }
        $Ff = self::shiftStringToRight($Ff);
        goto B99;
        J1m:
        $Ff = self::getBitXor(self::shiftStringToRight($Ff), $IB);
        B99:
        B5V:
        $lp++;
        goto Y5s;
        NbQ:
        return $eZ;
    }
    private static function shiftStringToRight($q3)
    {
        $eV = 4;
        $iV = array_map("\163\x65\154\x66\x3a\72\x74\x6f\x55\x49\x6e\164\63\x32\102\151\164\163", str_split($q3, $eV));
        $nS = count($iV);
        $lp = $nS - 1;
        SFM:
        if (!($lp >= 0)) {
            goto Onp;
        }
        if (!$lp) {
            goto Ukv;
        }
        $Xe = $iV[$lp - 1] & 1;
        if (!$Xe) {
            goto UPN;
        }
        $iV[$lp] = $iV[$lp] >> 1 | 2147483648;
        $iV[$lp] = pack("\116", $iV[$lp]);
        goto t1H;
        UPN:
        Ukv:
        $iV[$lp] = $iV[$lp] >> 1 & 2147483647;
        $iV[$lp] = pack("\x4e", $iV[$lp]);
        t1H:
        $lp--;
        goto SFM;
        Onp:
        $UO = implode('', $iV);
        return $UO;
    }
    private static function getHash($z0, $Yb)
    {
        $kD = array();
        $kD[0] = str_pad('', 16, "\x0");
        $Jj = (int) (mb_strlen($Yb, "\x38\x62\x69\164") / 16);
        $lp = 1;
        qRf:
        if (!($lp <= $Jj)) {
            goto H6s;
        }
        $kD[$lp] = self::getProduct(self::getBitXor($kD[$lp - 1], mb_substr($Yb, ($lp - 1) * 16, 16, "\70\142\x69\x74")), $z0);
        IIo:
        $lp++;
        goto qRf;
        H6s:
        return $kD[$Jj];
    }
    private static function getGCTR($fV, $Yh, $jf, $Yb)
    {
        if (!empty($Yb)) {
            goto eOS;
        }
        return '';
        eOS:
        $tU = (int) ceil(self::getLength($Yb) / 128);
        $mH = array();
        $kD = array();
        $mH[1] = $jf;
        $lp = 2;
        rnr:
        if (!($lp <= $tU)) {
            goto Ddp;
        }
        $mH[$lp] = self::getInc(32, $mH[$lp - 1]);
        RRh:
        $lp++;
        goto rnr;
        Ddp:
        $J7 = "\x61\145\x73\55" . $Yh . "\55\x65\x63\x62";
        $lp = 1;
        Wy_:
        if (!($lp < $tU)) {
            goto kJt;
        }
        $MY = openssl_encrypt($mH[$lp], $J7, $fV, OPENSSL_NO_PADDING | OPENSSL_RAW_DATA);
        $kD[$lp] = self::getBitXor(mb_substr($Yb, ($lp - 1) * 16, 16, "\x38\142\x69\164"), $MY);
        l9L:
        $lp++;
        goto Wy_;
        kJt:
        $lY = mb_substr($Yb, ($tU - 1) * 16, null, "\70\142\x69\164");
        $MY = openssl_encrypt($mH[$tU], $J7, $fV, OPENSSL_NO_PADDING | OPENSSL_RAW_DATA);
        $kD[$tU] = self::getBitXor($lY, self::getMSB(self::getLength($lY), $MY));
        return implode('', $kD);
    }
    private static function getBitXor($PN, $to)
    {
        $rD = PHP_INT_SIZE;
        $PN = str_split($PN, $rD);
        $to = str_split($to, $rD);
        $UO = '';
        $nS = count($PN);
        $lp = 0;
        Acb:
        if (!($lp < $nS)) {
            goto TPJ;
        }
        $UO .= $PN[$lp] ^ $to[$lp];
        oQu:
        $lp++;
        goto Acb;
        TPJ:
        return $UO;
    }
}
