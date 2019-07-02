<?php


namespace AESGCM;

require_once "\x41\x73\x73\x65\x72\164\57\x41\163\163\145\162\x74\151\157\156\x2e\x70\150\x70";
use Assert\Assertion;
final class AESGCM
{
    public static function encrypt($mj, $Hv, $SU = null, $NK = null, $OE = 128)
    {
        Assertion::string($mj, "\124\150\145\40\x6b\145\171\x20\145\x6e\x63\162\x79\x70\164\151\157\156\40\153\x65\x79\40\155\x75\x73\x74\40\142\x65\40\141\40\142\x69\156\141\x72\171\x20\x73\x74\x72\151\156\x67\x2e");
        $uI = mb_strlen($mj, "\70\x62\x69\x74") * 8;
        Assertion::inArray($uI, array(128, 192, 256), "\102\x61\x64\x20\153\x65\171\40\x65\x6e\x63\162\x79\x70\x74\151\x6f\156\x20\x6b\145\x79\40\154\x65\x6e\x67\x74\x68\x2e");
        Assertion::string($Hv, "\124\x68\x65\40\111\156\151\164\x69\x61\154\x69\172\x61\164\151\x6f\156\40\x56\145\x63\164\x6f\x72\x20\x6d\x75\163\164\40\x62\145\40\x61\x20\142\x69\156\141\162\x79\40\163\x74\162\151\x6e\147\56");
        Assertion::nullOrString($SU, "\x54\150\145\40\x64\141\164\141\x20\x74\x6f\40\x65\156\143\162\x79\x70\x74\40\x6d\x75\x73\164\x20\142\145\40\x6e\165\154\x6c\x20\x6f\x72\x20\141\40\x62\x69\x6e\x61\162\x79\x20\163\164\162\151\156\147\56");
        Assertion::nullOrString($NK, "\x54\x68\x65\40\x41\x64\144\151\164\x69\157\x6e\x61\154\x20\101\x75\164\150\x65\156\x74\x69\143\x61\x74\151\x6f\156\x20\x44\x61\x74\x61\40\x6d\x75\163\x74\x20\x62\x65\x20\156\x75\154\x6c\x20\x6f\162\40\x61\x20\x62\x69\x6e\x61\x72\171\x20\163\x74\162\151\156\x67\56");
        Assertion::integer($OE, "\x49\156\166\141\x6c\x69\x64\40\164\141\x67\x20\x6c\x65\x6e\x67\164\150\56\40\123\165\160\160\x6f\162\164\145\144\40\x76\141\154\165\145\x73\40\x61\x72\145\x3a\x20\x31\x32\x38\54\x20\61\x32\60\54\x20\x31\61\x32\x2c\40\61\x30\x34\x20\141\x6e\144\x20\71\x36\x2e");
        Assertion::inArray($OE, array(128, 120, 112, 104, 96), "\111\156\x76\x61\x6c\151\x64\40\164\141\147\x20\154\x65\x6e\x67\x74\x68\x2e\40\123\165\160\160\157\162\x74\x65\144\40\166\141\x6c\x75\x65\163\40\141\162\x65\x3a\40\61\62\70\x2c\40\x31\x32\60\54\x20\61\61\x32\x2c\40\x31\60\x34\40\x61\x6e\x64\40\x39\66\x2e");
        if (version_compare(PHP_VERSION, "\67\x2e\61\56\x30\x52\103\x35") >= 0 && null !== $SU) {
            goto ff;
        }
        if (class_exists("\x5c\x43\x72\171\x70\x74\157\x5c\103\151\160\x68\x65\162")) {
            goto oK;
        }
        goto Gu;
        ff:
        return self::encryptWithPHP71($mj, $uI, $Hv, $SU, $NK, $OE);
        goto Gu;
        oK:
        return self::encryptWithCryptoExtension($mj, $uI, $Hv, $SU, $NK, $OE);
        Gu:
        return self::encryptWithPHP($mj, $uI, $Hv, $SU, $NK, $OE);
    }
    public static function encryptAndAppendTag($mj, $Hv, $SU = null, $NK = null, $OE = 128)
    {
        return implode(self::encrypt($mj, $Hv, $SU, $NK, $OE));
    }
    private static function encryptWithPHP71($mj, $uI, $Hv, $SU = null, $NK = null, $OE = 128)
    {
        $gj = "\x61\x65\x73\x2d" . $uI . "\x2d\147\143\x6d";
        $E8 = null;
        $ap = openssl_encrypt($SU, $gj, $mj, OPENSSL_RAW_DATA, $Hv, $E8, $NK, $OE / 8);
        Assertion::true(false !== $ap, "\125\x6e\x61\142\154\x65\40\164\157\x20\x65\156\x63\162\171\160\x74\x20\x74\x68\145\x20\x64\x61\x74\x61\x2e");
        return array($ap, $E8);
    }
    private static function encryptWithPHP($mj, $uI, $Hv, $SU = null, $NK = null, $OE = 128)
    {
        list($Wn, $U8, $U2, $CR) = self::common($mj, $uI, $Hv, $NK);
        $ap = self::getGCTR($mj, $uI, self::getInc(32, $Wn), $SU);
        $o_ = self::calcVector($ap);
        $Ae = self::addPadding($ap);
        $m4 = self::getHash($CR, $NK . str_pad('', $U8 / 8, "\0") . $ap . str_pad('', $o_ / 8, "\0") . $U2 . $Ae);
        $E8 = self::getMSB($OE, self::getGCTR($mj, $uI, $Wn, $m4));
        return array($ap, $E8);
    }
    private static function encryptWithCryptoExtension($mj, $uI, $Hv, $SU = null, $NK = null, $OE = 128)
    {
        $KY = \Crypto\Cipher::aes(\Crypto\Cipher::MODE_GCM, $uI);
        $KY->setAAD($NK);
        $KY->setTagLength($OE / 8);
        $ap = $KY->encrypt($SU, $mj, $Hv);
        $E8 = $KY->getTag();
        return array($ap, $E8);
    }
    public static function decrypt($mj, $Hv, $ap, $NK, $E8)
    {
        Assertion::string($mj, "\x54\150\145\x20\153\x65\171\x20\x65\x6e\143\162\171\x70\164\x69\157\156\40\153\145\171\x20\155\x75\163\164\x20\x62\x65\x20\141\40\x62\151\x6e\x61\x72\x79\40\x73\164\162\x69\156\x67\x2e");
        $uI = mb_strlen($mj, "\70\x62\x69\164") * 8;
        Assertion::inArray($uI, array(128, 192, 256), "\102\x61\x64\x20\x6b\x65\x79\x20\x65\x6e\143\162\x79\x70\164\151\x6f\x6e\40\153\x65\x79\40\x6c\145\156\x67\164\x68\x2e");
        Assertion::string($Hv, "\x54\150\x65\40\111\x6e\151\164\151\141\x6c\151\x7a\141\164\x69\157\156\x20\x56\x65\143\164\x6f\162\x20\155\x75\x73\x74\40\x62\x65\x20\141\x20\142\x69\156\141\x72\x79\40\163\x74\162\x69\156\x67\x2e");
        Assertion::nullOrString($ap, "\124\150\145\40\x64\x61\x74\141\40\164\157\40\145\156\x63\x72\171\x70\164\40\155\165\x73\x74\x20\142\145\x20\156\x75\154\x6c\x20\x6f\x72\40\x61\x20\x62\x69\x6e\141\162\171\x20\x73\164\162\151\156\147\56");
        Assertion::nullOrString($NK, "\x54\150\x65\40\101\144\144\151\x74\x69\157\x6e\x61\154\x20\101\165\164\150\145\x6e\164\x69\x63\x61\x74\151\x6f\156\x20\x44\141\x74\141\x20\x6d\x75\163\x74\x20\x62\x65\40\x6e\165\x6c\154\40\157\x72\40\141\40\142\x69\x6e\141\x72\x79\40\x73\x74\x72\x69\x6e\147\56");
        $OE = self::getLength($E8);
        Assertion::integer($OE, "\111\156\166\141\154\x69\x64\x20\164\x61\x67\40\154\145\x6e\x67\164\x68\x2e\x20\x53\x75\x70\x70\157\x72\164\145\x64\40\166\x61\154\165\145\x73\x20\x61\x72\x65\x3a\40\61\x32\70\x2c\40\61\62\x30\54\x20\x31\61\x32\x2c\x20\61\60\x34\40\141\156\x64\40\x39\x36\x2e");
        Assertion::inArray($OE, array(128, 120, 112, 104, 96), "\x49\156\x76\141\x6c\151\144\x20\x74\141\x67\x20\x6c\145\156\147\164\150\56\x20\x53\165\160\160\x6f\x72\164\145\x64\x20\166\141\154\x75\x65\x73\40\141\x72\x65\x3a\40\x31\x32\70\54\40\61\x32\60\54\40\61\61\62\54\40\61\60\x34\40\141\156\144\40\x39\66\x2e");
        if (version_compare(PHP_VERSION, "\x37\56\x31\56\x30\122\103\65") >= 0 && null !== $ap) {
            goto C2;
        }
        if (class_exists("\134\103\162\171\160\x74\x6f\134\103\x69\160\150\x65\162")) {
            goto z0;
        }
        goto Fq;
        C2:
        return self::decryptWithPHP71($mj, $uI, $Hv, $ap, $NK, $E8);
        goto Fq;
        z0:
        return self::decryptWithCryptoExtension($mj, $uI, $Hv, $ap, $NK, $E8, $OE);
        Fq:
        return self::decryptWithPHP($mj, $uI, $Hv, $ap, $NK, $E8, $OE);
    }
    public static function decryptWithAppendedTag($mj, $Hv, $WT = null, $NK = null, $OE = 128)
    {
        $Sf = $OE / 8;
        $ap = mb_substr($WT, 0, -$Sf, "\x38\142\x69\x74");
        $E8 = mb_substr($WT, -$Sf, null, "\70\142\151\164");
        return self::decrypt($mj, $Hv, $ap, $NK, $E8);
    }
    private static function decryptWithPHP71($mj, $uI, $Hv, $ap, $NK, $E8)
    {
        $gj = "\141\145\163\x2d" . $uI . "\x2d\x67\143\155";
        $SU = openssl_decrypt(null === $ap ? '' : $ap, $gj, $mj, OPENSSL_RAW_DATA, $Hv, $E8, null === $NK ? '' : $NK);
        Assertion::true(false !== $SU, "\x55\x6e\x61\x62\154\145\x20\164\157\x20\144\x65\x63\162\171\160\164\x20\x6f\x72\40\x74\157\40\x76\x65\162\x69\x66\171\x20\x74\150\x65\40\164\141\147\56");
        return $SU;
    }
    private static function decryptWithPHP($mj, $uI, $Hv, $ap, $NK, $E8, $OE = 128)
    {
        list($Wn, $U8, $U2, $CR) = self::common($mj, $uI, $Hv, $NK);
        $SU = self::getGCTR($mj, $uI, self::getInc(32, $Wn), $ap);
        $o_ = self::calcVector($ap);
        $Ae = self::addPadding($ap);
        $m4 = self::getHash($CR, $NK . str_pad('', $U8 / 8, "\0") . $ap . str_pad('', $o_ / 8, "\0") . $U2 . $Ae);
        $DD = self::getMSB($OE, self::getGCTR($mj, $uI, $Wn, $m4));
        Assertion::eq($DD, $E8, "\x55\x6e\141\x62\x6c\145\x20\x74\x6f\40\x64\145\143\162\171\x70\x74\40\157\x72\40\164\x6f\40\166\145\x72\x69\x66\x79\40\x74\x68\145\40\164\141\x67\x2e");
        return $SU;
    }
    private static function decryptWithCryptoExtension($mj, $uI, $Hv, $ap, $NK, $E8, $OE = 128)
    {
        $KY = \Crypto\Cipher::aes(\Crypto\Cipher::MODE_GCM, $uI);
        $KY->setTag($E8);
        $KY->setAAD($NK);
        $KY->setTagLength($OE / 8);
        return $KY->decrypt($ap, $mj, $Hv);
    }
    private static function common($mj, $uI, $Hv, $NK)
    {
        $CR = openssl_encrypt(str_repeat("\x0", 16), "\x61\x65\163\x2d" . $uI . "\55\145\143\142", $mj, OPENSSL_NO_PADDING | OPENSSL_RAW_DATA);
        $Xn = self::getLength($Hv);
        if (96 === $Xn) {
            goto i3;
        }
        $hY = self::calcVector($Hv);
        Assertion::eq(($hY + 64) % 8, 0, "\x55\156\x61\142\154\145\x20\x74\157\x20\144\x65\143\162\171\160\x74\40\157\162\x20\x74\x6f\40\x76\x65\x72\x69\146\171\40\x74\150\x65\40\164\x61\147\x2e");
        $Dx = pack("\116", $Xn);
        $gH = str_pad($Dx, 8, "\0", STR_PAD_LEFT);
        $Rs = $Hv . str_pad('', ($hY + 64) / 8, "\x0") . $gH;
        $Wn = self::getHash($CR, $Rs);
        goto F2;
        i3:
        $Wn = $Hv . pack("\x48\x2a", "\60\60\60\x30\60\x30\60\61");
        F2:
        $U8 = self::calcVector($NK);
        $U2 = self::addPadding($NK);
        return array($Wn, $U8, $U2, $CR);
    }
    private static function calcVector($Iy)
    {
        return 128 * ceil(self::getLength($Iy) / 128) - self::getLength($Iy);
    }
    private static function addPadding($Iy)
    {
        return str_pad(pack("\116", self::getLength($Iy)), 8, "\0", STR_PAD_LEFT);
    }
    private static function getLength($Tt)
    {
        return mb_strlen($Tt, "\x38\x62\151\x74") * 8;
    }
    private static function getMSB($v7, $Tt)
    {
        $Mc = $v7 / 8;
        return mb_substr($Tt, 0, $Mc, "\70\x62\151\x74");
    }
    private static function getLSB($v7, $Tt)
    {
        $Mc = $v7 / 8;
        return mb_substr($Tt, -$Mc, null, "\x38\x62\x69\164");
    }
    private static function getInc($EC, $Tt)
    {
        $Cr = self::getLSB($EC, $Tt);
        $MG = self::toUInt32Bits($Cr) + 1;
        $sR = self::getMSB(self::getLength($Tt) - $EC, $Tt) . pack("\x4e", $MG);
        return $sR;
    }
    private static function toUInt32Bits($tq)
    {
        list(, $tF, $Gc) = unpack("\x6e\x2a", $tq);
        return $Gc + $tF * 65536;
    }
    private static function getProduct($MG, $yS)
    {
        $fZ = pack("\110\52", "\x45\61") . str_pad('', 15, "\0");
        $Ho = str_pad('', 16, "\x0");
        $cu = $yS;
        $EG = str_split($MG, 4);
        $Tt = sprintf("\x25\x30\x33\62\x62\45\60\x33\x32\142\45\60\x33\62\142\x25\x30\63\62\x62", self::toUInt32Bits($EG[0]), self::toUInt32Bits($EG[1]), self::toUInt32Bits($EG[2]), self::toUInt32Bits($EG[3]));
        $Ir = "\1";
        $W0 = 0;
        JD:
        if (!($W0 < 128)) {
            goto Rp;
        }
        if (!$Tt[$W0]) {
            goto R4;
        }
        $Ho = self::getBitXor($Ho, $cu);
        R4:
        $Q9 = mb_substr($cu, -1, null, "\x38\x62\x69\164");
        if (ord($Q9 & $Ir)) {
            goto Ts;
        }
        $cu = self::shiftStringToRight($cu);
        goto Vy;
        Ts:
        $cu = self::getBitXor(self::shiftStringToRight($cu), $fZ);
        Vy:
        Ke:
        $W0++;
        goto JD;
        Rp:
        return $Ho;
    }
    private static function shiftStringToRight($EX)
    {
        $Go = 4;
        $EG = array_map("\x73\145\154\x66\72\x3a\164\157\125\111\x6e\x74\x33\x32\102\151\164\x73", str_split($EX, $Go));
        $H0 = count($EG);
        $W0 = $H0 - 1;
        ZD:
        if (!($W0 >= 0)) {
            goto XT;
        }
        if (!$W0) {
            goto P8;
        }
        $uX = $EG[$W0 - 1] & 1;
        if (!$uX) {
            goto YR;
        }
        $EG[$W0] = $EG[$W0] >> 1 | 2147483648;
        $EG[$W0] = pack("\x4e", $EG[$W0]);
        goto Wv;
        YR:
        P8:
        $EG[$W0] = $EG[$W0] >> 1 & 2147483647;
        $EG[$W0] = pack("\x4e", $EG[$W0]);
        Wv:
        $W0--;
        goto ZD;
        XT:
        $sR = implode('', $EG);
        return $sR;
    }
    private static function getHash($CR, $MG)
    {
        $yS = array();
        $yS[0] = str_pad('', 16, "\x0");
        $zh = (int) (mb_strlen($MG, "\70\142\x69\164") / 16);
        $W0 = 1;
        Hg:
        if (!($W0 <= $zh)) {
            goto uk;
        }
        $yS[$W0] = self::getProduct(self::getBitXor($yS[$W0 - 1], mb_substr($MG, ($W0 - 1) * 16, 16, "\x38\142\151\164")), $CR);
        T2:
        $W0++;
        goto Hg;
        uk:
        return $yS[$zh];
    }
    private static function getGCTR($mj, $uI, $Lu, $MG)
    {
        if (!empty($MG)) {
            goto NI;
        }
        return '';
        NI:
        $lI = (int) ceil(self::getLength($MG) / 128);
        $JO = array();
        $yS = array();
        $JO[1] = $Lu;
        $W0 = 2;
        ZN:
        if (!($W0 <= $lI)) {
            goto kU;
        }
        $JO[$W0] = self::getInc(32, $JO[$W0 - 1]);
        qK:
        $W0++;
        goto ZN;
        kU:
        $gj = "\x61\x65\163\x2d" . $uI . "\55\145\x63\x62";
        $W0 = 1;
        KM:
        if (!($W0 < $lI)) {
            goto kf;
        }
        $ap = openssl_encrypt($JO[$W0], $gj, $mj, OPENSSL_NO_PADDING | OPENSSL_RAW_DATA);
        $yS[$W0] = self::getBitXor(mb_substr($MG, ($W0 - 1) * 16, 16, "\70\142\x69\164"), $ap);
        hA:
        $W0++;
        goto KM;
        kf:
        $Vz = mb_substr($MG, ($lI - 1) * 16, null, "\x38\x62\151\x74");
        $ap = openssl_encrypt($JO[$lI], $gj, $mj, OPENSSL_NO_PADDING | OPENSSL_RAW_DATA);
        $yS[$lI] = self::getBitXor($Vz, self::getMSB(self::getLength($Vz), $ap));
        return implode('', $yS);
    }
    private static function getBitXor($Up, $ev)
    {
        $js = PHP_INT_SIZE;
        $Up = str_split($Up, $js);
        $ev = str_split($ev, $js);
        $sR = '';
        $H0 = count($Up);
        $W0 = 0;
        pL:
        if (!($W0 < $H0)) {
            goto n6;
        }
        $sR .= $Up[$W0] ^ $ev[$W0];
        y9:
        $W0++;
        goto pL;
        n6:
        return $sR;
    }
}
