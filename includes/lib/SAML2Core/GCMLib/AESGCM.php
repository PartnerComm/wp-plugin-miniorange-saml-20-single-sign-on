<?php


namespace AESGCM;

require_once "\101\163\163\x65\162\x74\x2f\x41\163\163\x65\x72\x74\151\157\156\x2e\160\x68\x70";
use Assert\Assertion;
final class AESGCM
{
    public static function encrypt($uM, $tF, $Lp = null, $fK = null, $IO = 128)
    {
        Assertion::string($uM, "\x54\150\x65\40\x6b\x65\x79\40\x65\x6e\x63\x72\x79\160\x74\x69\x6f\156\x20\153\145\171\40\x6d\165\x73\x74\x20\x62\x65\40\141\40\x62\151\156\x61\162\171\x20\163\x74\x72\151\156\147\x2e");
        $Jm = mb_strlen($uM, "\x38\x62\x69\x74") * 8;
        Assertion::inArray($Jm, array(128, 192, 256), "\102\141\144\x20\x6b\145\171\40\x65\x6e\x63\x72\x79\x70\x74\151\157\156\40\153\x65\x79\x20\x6c\x65\x6e\x67\164\x68\x2e");
        Assertion::string($tF, "\x54\150\x65\x20\x49\156\x69\x74\x69\141\154\151\172\141\164\x69\x6f\x6e\x20\x56\x65\143\164\157\162\40\155\x75\163\164\x20\142\145\x20\x61\x20\x62\151\x6e\141\x72\x79\x20\x73\164\162\x69\x6e\147\56");
        Assertion::nullOrString($Lp, "\124\150\145\40\144\141\x74\141\40\x74\157\40\x65\156\x63\x72\x79\x70\x74\40\155\165\x73\164\40\142\145\40\156\x75\154\x6c\x20\157\x72\x20\141\x20\x62\x69\156\141\162\x79\x20\163\x74\x72\151\x6e\x67\56");
        Assertion::nullOrString($fK, "\124\150\145\40\x41\144\144\x69\164\151\x6f\x6e\141\154\x20\101\165\x74\150\145\156\x74\151\143\x61\x74\151\x6f\156\x20\104\x61\164\141\40\x6d\165\163\x74\40\x62\x65\x20\156\165\x6c\154\x20\157\162\40\141\x20\x62\x69\156\141\x72\171\40\163\x74\x72\x69\x6e\147\x2e");
        Assertion::integer($IO, "\111\156\166\x61\154\x69\144\x20\164\141\x67\x20\154\145\x6e\147\164\x68\56\40\x53\165\x70\160\x6f\162\164\145\144\x20\166\x61\x6c\x75\x65\163\x20\141\162\145\x3a\x20\61\x32\70\x2c\40\x31\x32\x30\x2c\40\x31\61\x32\x2c\x20\61\60\64\40\141\156\144\40\71\x36\x2e");
        Assertion::inArray($IO, array(128, 120, 112, 104, 96), "\111\156\x76\141\154\151\144\40\x74\x61\x67\40\154\x65\x6e\x67\x74\150\56\40\123\x75\x70\x70\x6f\x72\164\x65\x64\x20\166\141\x6c\x75\145\163\x20\141\x72\x65\72\40\61\x32\70\54\x20\x31\x32\60\x2c\40\61\x31\x32\x2c\x20\61\60\64\x20\141\x6e\144\40\x39\x36\56");
        if (version_compare(PHP_VERSION, "\67\x2e\x31\56\60\x52\103\x35") >= 0 && null !== $Lp) {
            goto xhC;
        }
        if (class_exists("\x5c\x43\162\171\160\x74\x6f\134\x43\x69\160\150\145\x72")) {
            goto psI;
        }
        goto s6Z;
        xhC:
        return self::encryptWithPHP71($uM, $Jm, $tF, $Lp, $fK, $IO);
        goto s6Z;
        psI:
        return self::encryptWithCryptoExtension($uM, $Jm, $tF, $Lp, $fK, $IO);
        s6Z:
        return self::encryptWithPHP($uM, $Jm, $tF, $Lp, $fK, $IO);
    }
    public static function encryptAndAppendTag($uM, $tF, $Lp = null, $fK = null, $IO = 128)
    {
        return implode(self::encrypt($uM, $tF, $Lp, $fK, $IO));
    }
    private static function encryptWithPHP71($uM, $Jm, $tF, $Lp = null, $fK = null, $IO = 128)
    {
        $nV = "\141\x65\163\55" . $Jm . "\55\x67\x63\x6d";
        $vT = null;
        $ii = openssl_encrypt($Lp, $nV, $uM, OPENSSL_RAW_DATA, $tF, $vT, $fK, $IO / 8);
        Assertion::true(false !== $ii, "\125\156\x61\x62\x6c\145\x20\164\157\x20\x65\x6e\143\162\x79\160\x74\40\164\x68\x65\x20\x64\x61\x74\141\x2e");
        return array($ii, $vT);
    }
    private static function encryptWithPHP($uM, $Jm, $tF, $Lp = null, $fK = null, $IO = 128)
    {
        list($MW, $oA, $BG, $oO) = self::common($uM, $Jm, $tF, $fK);
        $ii = self::getGCTR($uM, $Jm, self::getInc(32, $MW), $Lp);
        $ih = self::calcVector($ii);
        $hH = self::addPadding($ii);
        $CC = self::getHash($oO, $fK . str_pad('', $oA / 8, "\x0") . $ii . str_pad('', $ih / 8, "\0") . $BG . $hH);
        $vT = self::getMSB($IO, self::getGCTR($uM, $Jm, $MW, $CC));
        return array($ii, $vT);
    }
    private static function encryptWithCryptoExtension($uM, $Jm, $tF, $Lp = null, $fK = null, $IO = 128)
    {
        $BT = \Crypto\Cipher::aes(\Crypto\Cipher::MODE_GCM, $Jm);
        $BT->setAAD($fK);
        $BT->setTagLength($IO / 8);
        $ii = $BT->encrypt($Lp, $uM, $tF);
        $vT = $BT->getTag();
        return array($ii, $vT);
    }
    public static function decrypt($uM, $tF, $ii, $fK, $vT)
    {
        Assertion::string($uM, "\124\x68\145\x20\153\x65\171\x20\x65\x6e\143\x72\171\160\x74\x69\x6f\x6e\40\x6b\145\171\x20\155\165\x73\x74\40\142\145\x20\x61\x20\x62\x69\x6e\141\162\x79\40\163\x74\162\x69\156\147\x2e");
        $Jm = mb_strlen($uM, "\x38\x62\x69\164") * 8;
        Assertion::inArray($Jm, array(128, 192, 256), "\x42\141\x64\40\x6b\145\171\40\145\156\x63\x72\171\160\164\151\x6f\x6e\40\153\x65\x79\x20\x6c\x65\156\147\164\150\x2e");
        Assertion::string($tF, "\x54\150\x65\40\x49\156\x69\164\151\x61\154\151\x7a\x61\164\151\x6f\156\x20\126\x65\143\164\x6f\x72\x20\155\x75\163\164\40\142\145\x20\x61\40\142\151\156\141\x72\x79\40\163\164\x72\x69\x6e\147\56");
        Assertion::nullOrString($ii, "\x54\150\145\x20\144\x61\164\x61\x20\x74\x6f\x20\x65\x6e\143\162\171\160\164\40\x6d\165\x73\x74\x20\142\145\x20\156\x75\154\x6c\40\x6f\x72\40\141\40\x62\x69\156\x61\x72\171\40\163\x74\162\x69\x6e\x67\x2e");
        Assertion::nullOrString($fK, "\124\x68\x65\x20\101\x64\x64\151\x74\151\157\156\x61\x6c\x20\101\x75\164\x68\x65\156\164\151\143\x61\164\151\x6f\x6e\40\x44\x61\164\141\40\x6d\x75\163\x74\x20\142\145\x20\x6e\x75\x6c\154\40\157\x72\x20\x61\x20\x62\151\156\x61\x72\171\40\163\x74\162\x69\x6e\147\56");
        $IO = self::getLength($vT);
        Assertion::integer($IO, "\111\x6e\166\x61\x6c\x69\x64\x20\164\x61\x67\40\x6c\x65\156\147\x74\x68\x2e\x20\x53\165\160\160\157\x72\164\x65\x64\40\166\141\154\165\x65\x73\x20\x61\162\145\x3a\x20\x31\x32\x38\x2c\40\x31\62\x30\54\x20\61\61\62\x2c\40\x31\x30\x34\40\x61\x6e\x64\40\71\66\56");
        Assertion::inArray($IO, array(128, 120, 112, 104, 96), "\111\156\x76\141\154\151\x64\40\164\x61\x67\x20\x6c\x65\156\x67\164\150\x2e\x20\x53\165\x70\160\157\162\x74\145\144\x20\x76\141\154\x75\145\163\40\141\162\145\x3a\x20\61\x32\70\54\x20\61\62\x30\x2c\x20\x31\61\62\54\40\61\60\64\40\x61\x6e\144\x20\71\x36\56");
        if (version_compare(PHP_VERSION, "\67\56\61\x2e\60\x52\103\65") >= 0 && null !== $ii) {
            goto nzn;
        }
        if (class_exists("\134\103\x72\x79\x70\164\157\x5c\103\x69\160\x68\145\162")) {
            goto CrZ;
        }
        goto PyU;
        nzn:
        return self::decryptWithPHP71($uM, $Jm, $tF, $ii, $fK, $vT);
        goto PyU;
        CrZ:
        return self::decryptWithCryptoExtension($uM, $Jm, $tF, $ii, $fK, $vT, $IO);
        PyU:
        return self::decryptWithPHP($uM, $Jm, $tF, $ii, $fK, $vT, $IO);
    }
    public static function decryptWithAppendedTag($uM, $tF, $hw = null, $fK = null, $IO = 128)
    {
        $ph = $IO / 8;
        $ii = mb_substr($hw, 0, -$ph, "\x38\x62\x69\164");
        $vT = mb_substr($hw, -$ph, null, "\x38\x62\x69\164");
        return self::decrypt($uM, $tF, $ii, $fK, $vT);
    }
    private static function decryptWithPHP71($uM, $Jm, $tF, $ii, $fK, $vT)
    {
        $nV = "\x61\x65\x73\x2d" . $Jm . "\55\147\x63\x6d";
        $Lp = openssl_decrypt(null === $ii ? '' : $ii, $nV, $uM, OPENSSL_RAW_DATA, $tF, $vT, null === $fK ? '' : $fK);
        Assertion::true(false !== $Lp, "\x55\156\x61\142\154\x65\x20\164\x6f\x20\144\x65\143\x72\171\160\164\40\157\x72\x20\x74\157\x20\166\145\162\151\x66\x79\x20\x74\150\x65\40\164\141\x67\x2e");
        return $Lp;
    }
    private static function decryptWithPHP($uM, $Jm, $tF, $ii, $fK, $vT, $IO = 128)
    {
        list($MW, $oA, $BG, $oO) = self::common($uM, $Jm, $tF, $fK);
        $Lp = self::getGCTR($uM, $Jm, self::getInc(32, $MW), $ii);
        $ih = self::calcVector($ii);
        $hH = self::addPadding($ii);
        $CC = self::getHash($oO, $fK . str_pad('', $oA / 8, "\x0") . $ii . str_pad('', $ih / 8, "\0") . $BG . $hH);
        $pc = self::getMSB($IO, self::getGCTR($uM, $Jm, $MW, $CC));
        Assertion::eq($pc, $vT, "\125\156\141\142\154\x65\40\x74\157\40\144\145\143\162\x79\x70\x74\40\x6f\x72\x20\x74\x6f\40\x76\x65\x72\151\146\171\x20\164\x68\145\x20\164\141\147\56");
        return $Lp;
    }
    private static function decryptWithCryptoExtension($uM, $Jm, $tF, $ii, $fK, $vT, $IO = 128)
    {
        $BT = \Crypto\Cipher::aes(\Crypto\Cipher::MODE_GCM, $Jm);
        $BT->setTag($vT);
        $BT->setAAD($fK);
        $BT->setTagLength($IO / 8);
        return $BT->decrypt($ii, $uM, $tF);
    }
    private static function common($uM, $Jm, $tF, $fK)
    {
        $oO = openssl_encrypt(str_repeat("\x0", 16), "\141\x65\x73\x2d" . $Jm . "\55\x65\x63\142", $uM, OPENSSL_NO_PADDING | OPENSSL_RAW_DATA);
        $Lt = self::getLength($tF);
        if (96 === $Lt) {
            goto u6H;
        }
        $n0 = self::calcVector($tF);
        Assertion::eq(($n0 + 64) % 8, 0, "\x55\156\141\x62\x6c\145\x20\x74\x6f\40\x64\x65\x63\162\x79\x70\x74\40\157\162\40\164\157\40\x76\x65\x72\151\146\x79\40\164\x68\x65\40\164\141\147\56");
        $gL = pack("\116", $Lt);
        $jg = str_pad($gL, 8, "\x0", STR_PAD_LEFT);
        $gE = $tF . str_pad('', ($n0 + 64) / 8, "\x0") . $jg;
        $MW = self::getHash($oO, $gE);
        goto H6v;
        u6H:
        $MW = $tF . pack("\x48\x2a", "\x30\x30\60\60\x30\x30\60\x31");
        H6v:
        $oA = self::calcVector($fK);
        $BG = self::addPadding($fK);
        return array($MW, $oA, $BG, $oO);
    }
    private static function calcVector($DE)
    {
        return 128 * ceil(self::getLength($DE) / 128) - self::getLength($DE);
    }
    private static function addPadding($DE)
    {
        return str_pad(pack("\x4e", self::getLength($DE)), 8, "\x0", STR_PAD_LEFT);
    }
    private static function getLength($cM)
    {
        return mb_strlen($cM, "\x38\x62\x69\x74") * 8;
    }
    private static function getMSB($GO, $cM)
    {
        $B7 = $GO / 8;
        return mb_substr($cM, 0, $B7, "\70\142\151\x74");
    }
    private static function getLSB($GO, $cM)
    {
        $B7 = $GO / 8;
        return mb_substr($cM, -$B7, null, "\70\x62\x69\x74");
    }
    private static function getInc($Up, $cM)
    {
        $ef = self::getLSB($Up, $cM);
        $Me = self::toUInt32Bits($ef) + 1;
        $l8 = self::getMSB(self::getLength($cM) - $Up, $cM) . pack("\x4e", $Me);
        return $l8;
    }
    private static function toUInt32Bits($rr)
    {
        list(, $kb, $NB) = unpack("\x6e\x2a", $rr);
        return $NB + $kb * 65536;
    }
    private static function getProduct($Me, $b5)
    {
        $BY = pack("\110\52", "\x45\x31") . str_pad('', 15, "\x0");
        $gq = str_pad('', 16, "\x0");
        $A9 = $b5;
        $xc = str_split($Me, 4);
        $cM = sprintf("\x25\x30\x33\62\x62\45\60\63\62\x62\45\x30\63\62\142\45\x30\63\x32\142", self::toUInt32Bits($xc[0]), self::toUInt32Bits($xc[1]), self::toUInt32Bits($xc[2]), self::toUInt32Bits($xc[3]));
        $UW = "\1";
        $gJ = 0;
        Kyi:
        if (!($gJ < 128)) {
            goto KfR;
        }
        if (!$cM[$gJ]) {
            goto bLX;
        }
        $gq = self::getBitXor($gq, $A9);
        bLX:
        $eu = mb_substr($A9, -1, null, "\x38\142\151\164");
        if (ord($eu & $UW)) {
            goto ylq;
        }
        $A9 = self::shiftStringToRight($A9);
        goto up0;
        ylq:
        $A9 = self::getBitXor(self::shiftStringToRight($A9), $BY);
        up0:
        Bgw:
        $gJ++;
        goto Kyi;
        KfR:
        return $gq;
    }
    private static function shiftStringToRight($Dm)
    {
        $jE = 4;
        $xc = array_map("\163\145\x6c\146\72\x3a\x74\x6f\x55\x49\x6e\x74\x33\x32\x42\x69\164\163", str_split($Dm, $jE));
        $w5 = count($xc);
        $gJ = $w5 - 1;
        qvk:
        if (!($gJ >= 0)) {
            goto WiW;
        }
        if (!$gJ) {
            goto eF3;
        }
        $XZ = $xc[$gJ - 1] & 1;
        if (!$XZ) {
            goto yxC;
        }
        $xc[$gJ] = $xc[$gJ] >> 1 | 2147483648;
        $xc[$gJ] = pack("\116", $xc[$gJ]);
        goto STR;
        yxC:
        eF3:
        $xc[$gJ] = $xc[$gJ] >> 1 & 2147483647;
        $xc[$gJ] = pack("\x4e", $xc[$gJ]);
        STR:
        $gJ--;
        goto qvk;
        WiW:
        $l8 = implode('', $xc);
        return $l8;
    }
    private static function getHash($oO, $Me)
    {
        $b5 = array();
        $b5[0] = str_pad('', 16, "\0");
        $NT = (int) (mb_strlen($Me, "\x38\x62\151\x74") / 16);
        $gJ = 1;
        MpB:
        if (!($gJ <= $NT)) {
            goto qzR;
        }
        $b5[$gJ] = self::getProduct(self::getBitXor($b5[$gJ - 1], mb_substr($Me, ($gJ - 1) * 16, 16, "\x38\x62\151\x74")), $oO);
        J69:
        $gJ++;
        goto MpB;
        qzR:
        return $b5[$NT];
    }
    private static function getGCTR($uM, $Jm, $qB, $Me)
    {
        if (!empty($Me)) {
            goto mRr;
        }
        return '';
        mRr:
        $bG = (int) ceil(self::getLength($Me) / 128);
        $zS = array();
        $b5 = array();
        $zS[1] = $qB;
        $gJ = 2;
        OXa:
        if (!($gJ <= $bG)) {
            goto wX8;
        }
        $zS[$gJ] = self::getInc(32, $zS[$gJ - 1]);
        nf9:
        $gJ++;
        goto OXa;
        wX8:
        $nV = "\141\145\x73\x2d" . $Jm . "\x2d\145\x63\142";
        $gJ = 1;
        jAW:
        if (!($gJ < $bG)) {
            goto rwD;
        }
        $ii = openssl_encrypt($zS[$gJ], $nV, $uM, OPENSSL_NO_PADDING | OPENSSL_RAW_DATA);
        $b5[$gJ] = self::getBitXor(mb_substr($Me, ($gJ - 1) * 16, 16, "\70\x62\151\164"), $ii);
        bhc:
        $gJ++;
        goto jAW;
        rwD:
        $qe = mb_substr($Me, ($bG - 1) * 16, null, "\70\142\x69\164");
        $ii = openssl_encrypt($zS[$bG], $nV, $uM, OPENSSL_NO_PADDING | OPENSSL_RAW_DATA);
        $b5[$bG] = self::getBitXor($qe, self::getMSB(self::getLength($qe), $ii));
        return implode('', $b5);
    }
    private static function getBitXor($Nu, $Qq)
    {
        $I3 = PHP_INT_SIZE;
        $Nu = str_split($Nu, $I3);
        $Qq = str_split($Qq, $I3);
        $l8 = '';
        $w5 = count($Nu);
        $gJ = 0;
        MAc:
        if (!($gJ < $w5)) {
            goto BGd;
        }
        $l8 .= $Nu[$gJ] ^ $Qq[$gJ];
        e_v:
        $gJ++;
        goto MAc;
        BGd:
        return $l8;
    }
}
