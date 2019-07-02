<?php


namespace RobRichards\XMLSecLibs;

require_once "\107\x43\115\x4c\x69\x62" . DIRECTORY_SEPARATOR . "\101\105\123\107\103\115\56\x70\x68\x70";
use AESGCM\AESGCM;
use DOMElement;
use Exception;
class XMLSecurityKey
{
    const TRIPLEDES_CBC = "\150\x74\164\x70\72\x2f\57\167\x77\167\56\x77\x33\56\157\162\147\57\x32\60\60\x31\57\60\x34\57\x78\x6d\x6c\145\156\x63\43\x74\162\x69\160\154\145\144\145\x73\x2d\143\142\143";
    const AES128_CBC = "\x68\164\x74\160\x3a\x2f\57\x77\x77\x77\x2e\167\x33\56\157\x72\x67\x2f\x32\60\x30\61\x2f\60\64\57\170\155\154\145\156\143\x23\x61\145\163\x31\62\x38\x2d\x63\142\143";
    const AES192_CBC = "\x68\x74\x74\160\x3a\x2f\57\x77\x77\167\56\167\63\56\x6f\162\147\x2f\x32\x30\x30\61\x2f\x30\x34\x2f\x78\155\x6c\145\156\143\43\141\x65\x73\x31\71\62\55\x63\142\x63";
    const AES256_CBC = "\150\164\164\x70\72\57\x2f\x77\167\x77\56\167\x33\56\x6f\x72\147\x2f\62\60\x30\x31\57\60\64\x2f\x78\x6d\x6c\x65\156\x63\x23\141\145\x73\x32\65\66\x2d\x63\142\143";
    const RSA_1_5 = "\x68\x74\x74\160\x3a\57\57\167\x77\167\x2e\x77\63\56\x6f\162\x67\57\x32\x30\x30\61\x2f\60\x34\x2f\170\155\x6c\145\156\x63\x23\x72\x73\141\55\x31\137\65";
    const RSA_OAEP_MGF1P = "\150\164\x74\160\x3a\57\57\167\x77\x77\x2e\167\x33\x2e\x6f\162\x67\57\x32\60\x30\x31\57\x30\x34\57\170\155\x6c\145\x6e\143\x23\162\163\141\55\x6f\141\145\160\55\155\147\146\x31\160";
    const DSA_SHA1 = "\x68\x74\x74\x70\72\57\57\167\167\x77\56\167\63\56\x6f\162\147\57\62\x30\60\x30\57\60\71\57\170\155\x6c\x64\x73\x69\147\43\x64\x73\x61\x2d\x73\150\141\61";
    const RSA_SHA1 = "\x68\164\x74\x70\x3a\57\x2f\x77\x77\167\56\x77\x33\x2e\x6f\162\147\57\62\60\x30\60\57\60\x39\57\x78\x6d\x6c\144\x73\151\147\43\162\163\141\55\163\x68\x61\61";
    const RSA_SHA256 = "\150\164\x74\160\x3a\57\57\x77\167\x77\x2e\167\x33\x2e\x6f\x72\x67\x2f\x32\x30\60\61\57\60\64\57\170\155\x6c\x64\163\x69\147\x2d\155\x6f\x72\145\43\x72\163\x61\x2d\x73\150\141\62\65\66";
    const RSA_SHA384 = "\150\164\164\160\x3a\57\57\167\x77\167\56\167\x33\x2e\x6f\162\147\x2f\62\x30\x30\61\x2f\x30\64\57\x78\155\x6c\144\x73\151\x67\55\x6d\x6f\162\145\43\x72\x73\141\x2d\163\x68\x61\x33\x38\64";
    const RSA_SHA512 = "\150\164\x74\160\72\57\57\167\167\167\x2e\x77\63\x2e\x6f\x72\x67\57\x32\x30\60\x31\57\60\64\57\x78\x6d\154\x64\x73\151\x67\55\155\157\162\145\43\x72\x73\141\55\163\150\x61\x35\x31\62";
    const HMAC_SHA1 = "\150\x74\164\160\x3a\x2f\x2f\167\167\167\x2e\x77\63\56\157\x72\147\x2f\62\60\x30\x30\57\x30\71\x2f\x78\155\154\144\x73\x69\147\43\x68\x6d\141\143\x2d\163\150\x61\x31";
    const AES128_GMC = "\150\x74\x74\x70\x3a\x2f\x2f\167\167\x77\56\167\x33\x2e\x6f\162\x67\x2f\x32\x30\x30\x39\57\170\155\x6c\145\156\143\x31\x31\43\x61\x65\163\x31\62\70\x2d\147\143\155";
    private $cryptParams = array();
    public $type = 0;
    public $key = null;
    public $passphrase = '';
    public $iv = null;
    public $name = null;
    public $keyChain = null;
    public $isEncrypted = false;
    public $encryptedCtx = null;
    public $guid = null;
    private $x509Certificate = null;
    private $X509Thumbprint = null;
    public function __construct($rj, $kF = null)
    {
        switch ($rj) {
            case self::TRIPLEDES_CBC:
                $this->cryptParams["\154\x69\142\x72\x61\162\171"] = "\157\x70\145\156\163\x73\154";
                $this->cryptParams["\x63\151\x70\x68\x65\x72"] = "\144\x65\163\55\145\x64\145\x33\x2d\x63\142\143";
                $this->cryptParams["\x74\x79\x70\145"] = "\x73\x79\x6d\x6d\145\x74\162\x69\143";
                $this->cryptParams["\x6d\145\x74\150\157\x64"] = "\150\164\x74\x70\72\57\57\x77\167\x77\56\167\63\x2e\x6f\x72\147\x2f\x32\x30\60\x31\57\x30\64\57\x78\x6d\154\x65\x6e\143\43\x74\162\x69\160\154\145\x64\145\163\x2d\143\142\x63";
                $this->cryptParams["\153\x65\171\163\151\x7a\x65"] = 24;
                $this->cryptParams["\x62\154\x6f\143\153\163\x69\x7a\x65"] = 8;
                goto e4;
            case self::AES128_GMC:
                $this->cryptParams["\x6c\x69\142\x72\141\x72\171"] = "\157\x70\x65\x6e\163\163\x6c";
                $this->cryptParams["\x63\151\x70\150\x65\162"] = "\x61\145\x73\x2d\x31\x32\x38\x2d\x67\143\155";
                $this->cryptParams["\x74\171\x70\x65"] = "\x73\x79\155\155\x65\164\162\x69\x63";
                $this->cryptParams["\155\x65\164\150\157\144"] = "\150\164\164\160\x3a\x2f\x2f\167\167\167\x2e\167\x33\x2e\x6f\162\147\57\x32\60\60\71\57\170\155\x6c\145\x6e\x63\61\x31\x23\x61\145\163\x31\62\x38\55\x67\143\155";
                $this->cryptParams["\x6b\145\x79\163\151\x7a\x65"] = 16;
                $this->cryptParams["\x62\154\x6f\x63\153\163\x69\172\145"] = 16;
                goto e4;
            case self::AES128_CBC:
                $this->cryptParams["\154\151\x62\x72\141\x72\x79"] = "\x6f\x70\x65\x6e\163\x73\x6c";
                $this->cryptParams["\143\x69\x70\150\145\162"] = "\141\x65\x73\55\61\x32\70\x2d\143\x62\x63";
                $this->cryptParams["\164\171\x70\x65"] = "\x73\x79\x6d\x6d\145\x74\x72\151\x63";
                $this->cryptParams["\155\145\164\x68\157\144"] = "\150\164\x74\x70\72\x2f\57\167\x77\167\x2e\167\63\56\157\162\147\57\62\x30\60\61\57\60\64\57\x78\155\x6c\x65\156\143\x23\141\x65\x73\x31\x32\x38\x2d\143\142\x63";
                $this->cryptParams["\153\x65\171\x73\x69\172\145"] = 16;
                $this->cryptParams["\x62\x6c\157\x63\153\163\x69\172\x65"] = 16;
                goto e4;
            case self::AES192_CBC:
                $this->cryptParams["\x6c\151\x62\162\x61\162\x79"] = "\157\160\145\156\163\x73\154";
                $this->cryptParams["\143\x69\160\150\x65\162"] = "\141\x65\x73\55\x31\x39\x32\x2d\143\142\x63";
                $this->cryptParams["\164\x79\160\145"] = "\163\171\x6d\x6d\145\x74\x72\x69\x63";
                $this->cryptParams["\x6d\x65\164\x68\x6f\144"] = "\x68\x74\x74\x70\x3a\x2f\x2f\x77\x77\167\56\x77\63\x2e\x6f\162\x67\57\62\x30\60\x31\57\x30\x34\x2f\170\x6d\x6c\145\x6e\143\x23\141\x65\163\61\71\x32\55\x63\142\143";
                $this->cryptParams["\x6b\x65\171\163\x69\172\145"] = 24;
                $this->cryptParams["\142\154\x6f\143\153\x73\x69\172\x65"] = 16;
                goto e4;
            case self::AES256_CBC:
                $this->cryptParams["\154\151\142\x72\x61\162\x79"] = "\x6f\x70\x65\x6e\163\163\x6c";
                $this->cryptParams["\x63\151\x70\x68\x65\x72"] = "\x61\x65\x73\x2d\62\x35\x36\x2d\x63\142\143";
                $this->cryptParams["\164\x79\x70\145"] = "\163\171\155\x6d\x65\164\162\151\x63";
                $this->cryptParams["\155\x65\164\x68\x6f\144"] = "\150\164\164\x70\72\57\57\x77\167\x77\x2e\167\63\x2e\x6f\x72\147\x2f\62\x30\60\x31\57\60\64\57\x78\x6d\x6c\145\156\x63\43\x61\x65\163\x32\x35\x36\55\143\x62\143";
                $this->cryptParams["\153\x65\171\163\151\172\x65"] = 32;
                $this->cryptParams["\142\154\x6f\143\x6b\163\x69\x7a\x65"] = 16;
                goto e4;
            case self::RSA_1_5:
                $this->cryptParams["\x6c\151\142\x72\141\162\x79"] = "\157\x70\145\x6e\163\x73\x6c";
                $this->cryptParams["\160\x61\144\144\x69\x6e\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\155\145\x74\x68\x6f\144"] = "\150\x74\x74\x70\72\57\57\x77\x77\167\x2e\167\63\x2e\x6f\x72\147\57\x32\60\60\x31\57\60\64\x2f\x78\x6d\154\x65\x6e\x63\43\162\163\141\55\x31\137\65";
                if (!(is_array($kF) && !empty($kF["\164\x79\x70\145"]))) {
                    goto Gt;
                }
                if (!($kF["\164\x79\160\x65"] == "\160\165\142\x6c\x69\143" || $kF["\164\x79\x70\145"] == "\x70\162\x69\x76\141\164\145")) {
                    goto E4;
                }
                $this->cryptParams["\x74\x79\x70\145"] = $kF["\x74\171\x70\145"];
                goto e4;
                E4:
                Gt:
                throw new Exception("\103\145\162\x74\x69\146\x69\x63\x61\x74\145\x20\x22\164\171\x70\145\x22\40\x28\160\162\x69\166\141\x74\145\57\x70\165\x62\154\151\143\x29\x20\x6d\x75\x73\x74\40\142\x65\x20\160\x61\163\x73\x65\x64\x20\166\151\x61\40\x70\141\162\141\155\x65\x74\x65\x72\163");
            case self::RSA_OAEP_MGF1P:
                $this->cryptParams["\x6c\x69\x62\162\x61\162\x79"] = "\157\160\x65\156\x73\163\154";
                $this->cryptParams["\160\141\144\x64\x69\x6e\147"] = OPENSSL_PKCS1_OAEP_PADDING;
                $this->cryptParams["\155\145\x74\x68\157\x64"] = "\x68\164\x74\x70\x3a\57\x2f\x77\x77\167\56\x77\x33\56\x6f\x72\147\57\62\x30\60\x31\x2f\60\64\57\x78\155\154\x65\156\143\x23\162\x73\x61\55\157\141\145\160\x2d\155\x67\146\x31\160";
                $this->cryptParams["\150\x61\163\150"] = null;
                if (!(is_array($kF) && !empty($kF["\x74\x79\x70\x65"]))) {
                    goto uU;
                }
                if (!($kF["\164\171\160\x65"] == "\160\x75\x62\x6c\151\143" || $kF["\x74\x79\x70\145"] == "\x70\x72\x69\166\x61\164\145")) {
                    goto ms;
                }
                $this->cryptParams["\x74\171\x70\x65"] = $kF["\164\171\x70\x65"];
                goto e4;
                ms:
                uU:
                throw new Exception("\x43\x65\x72\x74\x69\x66\151\x63\x61\x74\x65\40\x22\164\x79\160\145\42\40\x28\x70\162\151\166\141\164\145\x2f\160\165\x62\x6c\x69\x63\51\40\155\x75\x73\164\40\x62\145\40\x70\x61\x73\163\145\x64\x20\x76\151\141\x20\x70\x61\x72\141\x6d\x65\x74\x65\162\x73");
            case self::RSA_SHA1:
                $this->cryptParams["\x6c\151\142\x72\x61\x72\171"] = "\157\160\x65\156\163\x73\x6c";
                $this->cryptParams["\155\145\x74\x68\157\144"] = "\x68\164\164\160\72\x2f\x2f\167\x77\167\x2e\167\63\x2e\157\162\147\57\62\x30\x30\x30\x2f\x30\x39\57\170\155\x6c\144\x73\x69\x67\x23\x72\x73\141\x2d\163\150\x61\x31";
                $this->cryptParams["\x70\141\x64\144\x69\x6e\x67"] = OPENSSL_PKCS1_PADDING;
                if (!(is_array($kF) && !empty($kF["\164\x79\x70\x65"]))) {
                    goto lc;
                }
                if (!($kF["\x74\171\x70\145"] == "\x70\165\x62\154\x69\143" || $kF["\x74\171\x70\x65"] == "\160\162\x69\x76\x61\164\145")) {
                    goto xe;
                }
                $this->cryptParams["\x74\171\x70\x65"] = $kF["\x74\171\x70\x65"];
                goto e4;
                xe:
                lc:
                throw new Exception("\x43\145\x72\164\x69\x66\151\x63\141\164\145\40\42\164\171\x70\x65\x22\40\x28\160\x72\x69\166\x61\164\x65\57\x70\x75\142\x6c\x69\x63\x29\40\x6d\x75\163\x74\40\142\145\x20\x70\141\x73\163\x65\144\x20\x76\151\x61\40\x70\141\x72\141\x6d\x65\x74\x65\x72\163");
            case self::RSA_SHA256:
                $this->cryptParams["\154\151\x62\162\x61\162\x79"] = "\157\x70\x65\x6e\163\x73\x6c";
                $this->cryptParams["\155\145\x74\x68\157\144"] = "\150\164\x74\160\x3a\57\57\167\x77\x77\56\167\x33\x2e\x6f\x72\147\57\62\x30\60\x31\x2f\60\64\57\x78\155\154\x64\163\151\x67\x2d\155\157\x72\x65\43\162\163\x61\55\x73\x68\x61\62\65\x36";
                $this->cryptParams["\160\141\144\144\x69\x6e\x67"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\144\151\x67\x65\x73\164"] = "\x53\110\101\62\65\66";
                if (!(is_array($kF) && !empty($kF["\164\x79\x70\x65"]))) {
                    goto kt;
                }
                if (!($kF["\x74\x79\x70\145"] == "\x70\x75\x62\154\x69\143" || $kF["\x74\171\160\145"] == "\160\162\x69\x76\141\x74\x65")) {
                    goto wm;
                }
                $this->cryptParams["\x74\x79\x70\145"] = $kF["\164\x79\x70\x65"];
                goto e4;
                wm:
                kt:
                throw new Exception("\103\x65\162\x74\x69\x66\151\x63\x61\x74\145\x20\42\x74\171\x70\x65\42\40\50\160\162\x69\x76\141\164\x65\x2f\160\165\x62\154\151\143\51\40\155\165\x73\x74\x20\142\145\x20\160\141\x73\x73\145\x64\40\166\x69\x61\40\160\141\x72\141\x6d\x65\x74\145\x72\163");
            case self::RSA_SHA384:
                $this->cryptParams["\154\x69\x62\x72\141\162\x79"] = "\x6f\x70\x65\x6e\x73\163\154";
                $this->cryptParams["\155\x65\x74\150\157\144"] = "\x68\x74\164\x70\x3a\x2f\x2f\x77\167\x77\56\x77\63\56\157\x72\x67\57\x32\x30\x30\x31\x2f\60\64\57\x78\x6d\x6c\144\x73\151\x67\x2d\155\x6f\x72\145\x23\x72\163\x61\x2d\163\150\x61\x33\x38\x34";
                $this->cryptParams["\160\x61\x64\144\x69\x6e\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x64\151\x67\145\163\164"] = "\x53\x48\x41\x33\x38\x34";
                if (!(is_array($kF) && !empty($kF["\x74\x79\160\145"]))) {
                    goto at;
                }
                if (!($kF["\164\171\x70\145"] == "\160\165\142\154\x69\x63" || $kF["\164\171\160\145"] == "\x70\162\x69\x76\x61\x74\x65")) {
                    goto R6;
                }
                $this->cryptParams["\164\171\x70\x65"] = $kF["\164\x79\x70\145"];
                goto e4;
                R6:
                at:
                throw new Exception("\x43\145\x72\x74\x69\146\151\143\141\x74\x65\40\x22\164\171\160\145\x22\x20\50\x70\x72\x69\166\x61\164\x65\57\x70\165\142\154\151\143\51\40\x6d\x75\x73\x74\x20\142\x65\x20\x70\141\x73\163\145\144\40\x76\151\141\40\160\x61\x72\x61\155\145\164\x65\162\163");
            case self::RSA_SHA512:
                $this->cryptParams["\154\x69\x62\x72\x61\162\x79"] = "\x6f\160\145\x6e\x73\x73\154";
                $this->cryptParams["\x6d\x65\164\x68\157\144"] = "\x68\x74\164\x70\72\57\57\x77\x77\x77\x2e\x77\x33\x2e\157\162\147\57\62\x30\x30\x31\57\x30\x34\57\170\155\x6c\144\163\x69\147\55\155\x6f\x72\145\x23\x72\163\x61\x2d\163\150\x61\65\x31\x32";
                $this->cryptParams["\160\141\x64\x64\151\156\x67"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x64\151\147\x65\x73\164"] = "\x53\110\x41\65\61\x32";
                if (!(is_array($kF) && !empty($kF["\x74\171\160\x65"]))) {
                    goto Y8;
                }
                if (!($kF["\164\x79\160\x65"] == "\160\165\x62\154\151\x63" || $kF["\164\x79\x70\x65"] == "\160\162\151\x76\141\164\145")) {
                    goto HH;
                }
                $this->cryptParams["\x74\x79\160\x65"] = $kF["\164\x79\160\145"];
                goto e4;
                HH:
                Y8:
                throw new Exception("\103\145\162\x74\x69\146\x69\x63\141\164\x65\x20\42\x74\x79\x70\145\42\x20\50\x70\x72\151\x76\141\164\145\57\x70\165\142\x6c\151\x63\51\x20\155\165\163\164\x20\x62\x65\40\x70\141\x73\x73\145\144\40\x76\x69\x61\40\x70\x61\162\141\155\x65\x74\145\162\163");
            case self::HMAC_SHA1:
                $this->cryptParams["\x6c\x69\142\x72\141\x72\171"] = $rj;
                $this->cryptParams["\x6d\x65\164\x68\157\x64"] = "\150\x74\x74\x70\72\57\x2f\x77\167\167\56\167\63\x2e\x6f\162\147\57\x32\60\60\x30\x2f\60\x39\x2f\x78\x6d\154\144\x73\x69\x67\43\150\155\141\143\55\163\x68\141\61";
                goto e4;
            default:
                throw new Exception("\x49\x6e\x76\x61\154\x69\x64\x20\113\145\171\x20\x54\x79\160\x65");
        }
        lJ:
        e4:
        $this->type = $rj;
    }
    public function getSymmetricKeySize()
    {
        if (isset($this->cryptParams["\x6b\145\x79\x73\x69\172\145"])) {
            goto qi;
        }
        return null;
        qi:
        return $this->cryptParams["\x6b\x65\171\163\151\172\x65"];
    }
    public function generateSessionKey()
    {
        if (isset($this->cryptParams["\x6b\x65\171\x73\151\x7a\x65"])) {
            goto b9;
        }
        throw new Exception("\125\156\x6b\x6e\157\167\156\x20\153\145\171\x20\x73\x69\x7a\145\40\146\x6f\x72\40\x74\171\x70\145\x20\42" . $this->type . "\42\x2e");
        b9:
        $aG = $this->cryptParams["\153\145\171\x73\151\172\x65"];
        $Kn = openssl_random_pseudo_bytes($aG);
        if (!($this->type === self::TRIPLEDES_CBC)) {
            goto pb;
        }
        $W0 = 0;
        T4:
        if (!($W0 < strlen($Kn))) {
            goto mK;
        }
        $G_ = ord($Kn[$W0]) & 254;
        $i2 = 1;
        $Fa = 1;
        ka:
        if (!($Fa < 8)) {
            goto iT;
        }
        $i2 ^= $G_ >> $Fa & 1;
        JT:
        $Fa++;
        goto ka;
        iT:
        $G_ |= $i2;
        $Kn[$W0] = chr($G_);
        V9:
        $W0++;
        goto T4;
        mK:
        pb:
        $this->key = $Kn;
        return $Kn;
    }
    public static function getRawThumbprint($dJ)
    {
        $OP = explode("\xa", $dJ);
        $aS = '';
        $qE = false;
        foreach ($OP as $T1) {
            if (!$qE) {
                goto WI;
            }
            if (!(strncmp($T1, "\x2d\x2d\55\x2d\x2d\x45\116\104\x20\x43\x45\x52\x54\x49\106\111\x43\x41\124\105", 20) == 0)) {
                goto MO;
            }
            goto hI;
            MO:
            $aS .= trim($T1);
            goto xK;
            WI:
            if (!(strncmp($T1, "\55\55\x2d\x2d\x2d\x42\x45\107\111\116\40\x43\105\x52\124\x49\x46\x49\x43\101\x54\x45", 22) == 0)) {
                goto Pr;
            }
            $qE = true;
            Pr:
            xK:
            OP:
        }
        hI:
        if (empty($aS)) {
            goto HZ;
        }
        return strtolower(sha1(base64_decode($aS)));
        HZ:
        return null;
    }
    public function loadKey($Kn, $g5 = false, $S9 = false)
    {
        if ($g5) {
            goto oJ;
        }
        $this->key = $Kn;
        goto e0;
        oJ:
        $this->key = file_get_contents($Kn);
        e0:
        if ($S9) {
            goto OY;
        }
        $this->x509Certificate = null;
        goto xQ;
        OY:
        $this->key = openssl_x509_read($this->key);
        openssl_x509_export($this->key, $py);
        $this->x509Certificate = $py;
        $this->key = $py;
        xQ:
        if (!($this->cryptParams["\154\x69\142\x72\141\x72\x79"] == "\x6f\160\145\x6e\163\x73\x6c")) {
            goto yk;
        }
        switch ($this->cryptParams["\x74\171\160\145"]) {
            case "\x70\165\142\154\151\x63":
                if (!$S9) {
                    goto Z2;
                }
                $this->X509Thumbprint = self::getRawThumbprint($this->key);
                Z2:
                $this->key = openssl_get_publickey($this->key);
                if ($this->key) {
                    goto nQ;
                }
                throw new Exception("\125\156\141\x62\x6c\145\40\x74\x6f\40\145\170\x74\x72\x61\x63\164\x20\160\165\142\x6c\x69\x63\40\153\145\171");
                nQ:
                goto pW;
            case "\160\x72\151\x76\x61\x74\x65":
                $this->key = openssl_get_privatekey($this->key, $this->passphrase);
                goto pW;
            case "\163\171\x6d\x6d\x65\x74\162\151\x63":
                if (!(strlen($this->key) < $this->cryptParams["\x6b\145\x79\163\151\172\145"])) {
                    goto PK;
                }
                throw new Exception("\x4b\145\171\40\155\165\x73\164\40\x63\157\x6e\164\x61\151\156\x20\141\x74\40\154\x65\141\x73\164\40\x32\x35\40\143\x68\141\162\141\x63\164\x65\x72\163\40\x66\x6f\x72\x20\x74\150\151\x73\40\143\x69\160\150\x65\x72");
                PK:
                goto pW;
            default:
                throw new Exception("\125\156\x6b\156\x6f\167\156\40\164\x79\x70\x65");
        }
        aO:
        pW:
        yk:
    }
    private function padISO10126($aS, $KW)
    {
        if (!($KW > 256)) {
            goto OG;
        }
        throw new Exception("\102\154\x6f\x63\153\40\163\x69\172\145\40\150\151\147\x68\x65\x72\x20\x74\x68\141\156\x20\x32\65\x36\40\156\x6f\164\x20\x61\x6c\154\x6f\x77\145\144");
        OG:
        $eI = $KW - strlen($aS) % $KW;
        $I0 = chr($eI);
        return $aS . str_repeat($I0, $eI);
    }
    private function unpadISO10126($aS)
    {
        $eI = substr($aS, -1);
        $WP = ord($eI);
        return substr($aS, 0, -$WP);
    }
    private function encryptSymmetric($aS)
    {
        $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cryptParams["\x63\x69\160\x68\145\x72"]));
        $aS = $this->padISO10126($aS, $this->cryptParams["\x62\154\x6f\x63\153\163\x69\172\x65"]);
        $h0 = openssl_encrypt($aS, $this->cryptParams["\x63\151\160\150\145\x72"], $this->key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $this->iv);
        if (!(false === $h0)) {
            goto e7;
        }
        throw new Exception("\x46\141\x69\x6c\165\x72\x65\x20\145\x6e\143\x72\x79\x70\164\151\x6e\x67\40\104\141\x74\141\x20\x28\x6f\x70\x65\156\x73\163\154\40\x73\171\x6d\155\145\164\162\x69\143\51\x20\x2d\x20" . openssl_error_string());
        e7:
        return $this->iv . $h0;
    }
    private function decryptSymmetric($aS)
    {
        if (!($this->cryptParams["\x63\x69\x70\150\x65\162"] === "\141\145\163\55\61\x32\x38\x2d\147\x63\155")) {
            goto Oo;
        }
        return $this->decryptSymmetricAESGCM($aS);
        Oo:
        $l5 = openssl_cipher_iv_length($this->cryptParams["\x63\x69\x70\x68\145\x72"]);
        $this->iv = substr($aS, 0, $l5);
        $aS = substr($aS, $l5);
        $q4 = openssl_decrypt($aS, $this->cryptParams["\x63\x69\x70\x68\145\x72"], $this->key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $this->iv);
        if (!(false === $q4)) {
            goto zb;
        }
        throw new Exception("\x46\x61\x69\154\165\x72\x65\40\144\145\143\x72\171\x70\x74\x69\156\147\40\104\141\x74\141\x20\x28\157\x70\145\156\163\163\x6c\x20\163\x79\x6d\155\145\x74\x72\151\x63\x29\40\55\x20" . openssl_error_string());
        zb:
        return $this->unpadISO10126($q4);
    }
    private function decryptSymmetricAESGCM($aS)
    {
        $l5 = openssl_cipher_iv_length($this->cryptParams["\x63\151\x70\x68\x65\x72"]);
        $this->iv = substr($aS, 0, $l5);
        $aS = substr($aS, $l5);
        $q4 = AESGCM::decryptWithAppendedTag($this->key, $this->iv, $aS, null, 128);
        if (!(false === $q4)) {
            goto At;
        }
        throw new Exception("\x46\x61\x69\x6c\165\162\145\40\x64\x65\143\x72\x79\160\x74\x69\x6e\147\x20\104\x61\164\x61\x20\x28\157\x70\145\156\163\x73\154\40\163\x79\155\x6d\x65\x74\x72\x69\143\x29\40\55\40" . openssl_error_string());
        At:
        return $q4;
    }
    private function encryptPublic($aS)
    {
        if (openssl_public_encrypt($aS, $h0, $this->key, $this->cryptParams["\x70\x61\x64\x64\151\x6e\147"])) {
            goto Xp;
        }
        throw new Exception("\x46\x61\151\154\x75\x72\145\40\145\156\x63\162\171\x70\x74\x69\x6e\147\40\104\x61\164\141\40\50\157\x70\x65\156\x73\x73\154\40\160\165\142\154\x69\x63\x29\x20\55\x20" . openssl_error_string());
        Xp:
        return $h0;
    }
    private function decryptPublic($aS)
    {
        if (openssl_public_decrypt($aS, $q4, $this->key, $this->cryptParams["\x70\141\144\144\151\x6e\x67"])) {
            goto ti;
        }
        throw new Exception("\x46\x61\151\154\x75\x72\x65\x20\x64\145\x63\x72\171\160\164\151\156\x67\40\x44\x61\164\x61\40\x28\157\x70\145\156\163\163\154\x20\160\165\142\x6c\x69\143\x29\x20\x2d\40" . openssl_error_string());
        ti:
        return $q4;
    }
    private function encryptPrivate($aS)
    {
        if (openssl_private_encrypt($aS, $h0, $this->key, $this->cryptParams["\160\x61\x64\x64\x69\156\147"])) {
            goto d8;
        }
        throw new Exception("\x46\141\x69\154\x75\x72\145\x20\x65\156\x63\162\x79\160\164\x69\156\147\40\x44\x61\x74\x61\40\x28\157\x70\x65\x6e\163\163\x6c\x20\x70\x72\x69\x76\141\164\x65\51\x20\55\x20" . openssl_error_string());
        d8:
        return $h0;
    }
    private function decryptPrivate($aS)
    {
        if (openssl_private_decrypt($aS, $q4, $this->key, $this->cryptParams["\x70\x61\144\144\151\156\147"])) {
            goto cE;
        }
        throw new Exception("\x46\141\151\154\165\162\145\x20\x64\x65\x63\x72\x79\x70\164\x69\156\x67\40\x44\141\x74\141\40\50\157\x70\145\156\x73\x73\154\x20\160\162\151\166\x61\x74\x65\x29\x20\55\x20" . openssl_error_string());
        cE:
        return $q4;
    }
    private function signOpenSSL($aS)
    {
        $H3 = OPENSSL_ALGO_SHA1;
        if (empty($this->cryptParams["\x64\x69\147\x65\x73\x74"])) {
            goto N0;
        }
        $H3 = $this->cryptParams["\144\151\x67\x65\163\x74"];
        N0:
        if (openssl_sign($aS, $Xy, $this->key, $H3)) {
            goto Ap;
        }
        throw new Exception("\x46\141\151\x6c\165\x72\x65\40\x53\x69\x67\156\x69\156\147\40\x44\141\164\141\x3a\40" . openssl_error_string() . "\40\x2d\x20" . $H3);
        Ap:
        return $Xy;
    }
    private function verifyOpenSSL($aS, $Xy)
    {
        $H3 = OPENSSL_ALGO_SHA1;
        if (empty($this->cryptParams["\x64\151\147\x65\x73\164"])) {
            goto t9;
        }
        $H3 = $this->cryptParams["\144\x69\x67\145\x73\164"];
        t9:
        return openssl_verify($aS, $Xy, $this->key, $H3);
    }
    public function encryptData($aS)
    {
        if (!($this->cryptParams["\x6c\x69\x62\162\141\162\171"] === "\x6f\x70\145\156\163\163\154")) {
            goto ON;
        }
        switch ($this->cryptParams["\164\x79\x70\145"]) {
            case "\163\x79\x6d\155\145\164\x72\151\x63":
                return $this->encryptSymmetric($aS);
            case "\x70\x75\142\x6c\151\143":
                return $this->encryptPublic($aS);
            case "\x70\162\x69\166\141\x74\x65":
                return $this->encryptPrivate($aS);
        }
        es:
        y5:
        ON:
    }
    public function decryptData($aS)
    {
        if (!($this->cryptParams["\154\x69\x62\162\x61\162\x79"] === "\157\x70\x65\156\x73\x73\154")) {
            goto MC;
        }
        switch ($this->cryptParams["\x74\171\160\145"]) {
            case "\163\x79\x6d\x6d\145\x74\162\151\x63":
                return $this->decryptSymmetric($aS);
            case "\x70\x75\x62\x6c\x69\143":
                return $this->decryptPublic($aS);
            case "\160\x72\x69\x76\141\164\145":
                return $this->decryptPrivate($aS);
        }
        C8:
        dS:
        MC:
    }
    public function signData($aS)
    {
        switch ($this->cryptParams["\x6c\x69\142\162\141\162\x79"]) {
            case "\x6f\x70\145\x6e\163\163\154":
                return $this->signOpenSSL($aS);
            case self::HMAC_SHA1:
                return hash_hmac("\163\x68\x61\61", $aS, $this->key, true);
        }
        Yw:
        Ax:
    }
    public function verifySignature($aS, $Xy)
    {
        switch ($this->cryptParams["\154\x69\142\162\141\162\171"]) {
            case "\157\x70\145\156\x73\163\x6c":
                return $this->verifyOpenSSL($aS, $Xy);
            case self::HMAC_SHA1:
                $j0 = hash_hmac("\x73\x68\x61\x31", $aS, $this->key, true);
                return strcmp($Xy, $j0) == 0;
        }
        cm:
        Nz:
    }
    public function getAlgorith()
    {
        return $this->getAlgorithm();
    }
    public function getAlgorithm()
    {
        return $this->cryptParams["\155\145\x74\x68\157\x64"];
    }
    public static function makeAsnSegment($rj, $cV)
    {
        switch ($rj) {
            case 2:
                if (!(ord($cV) > 127)) {
                    goto yo;
                }
                $cV = chr(0) . $cV;
                yo:
                goto mA;
            case 3:
                $cV = chr(0) . $cV;
                goto mA;
        }
        b_:
        mA:
        $oE = strlen($cV);
        if ($oE < 128) {
            goto Pq;
        }
        if ($oE < 256) {
            goto pC;
        }
        if ($oE < 65536) {
            goto QI;
        }
        $uq = null;
        goto Ft;
        QI:
        $uq = sprintf("\45\x63\45\143\45\143\45\143\45\163", $rj, 130, $oE / 256, $oE % 256, $cV);
        Ft:
        goto NL;
        pC:
        $uq = sprintf("\x25\143\x25\143\x25\143\x25\x73", $rj, 129, $oE, $cV);
        NL:
        goto Vn;
        Pq:
        $uq = sprintf("\x25\143\x25\x63\45\x73", $rj, $oE, $cV);
        Vn:
        return $uq;
    }
    public static function convertRSA($pO, $Zx)
    {
        $fU = self::makeAsnSegment(2, $Zx);
        $I2 = self::makeAsnSegment(2, $pO);
        $ks = self::makeAsnSegment(48, $I2 . $fU);
        $ei = self::makeAsnSegment(3, $ks);
        $Nm = pack("\110\52", "\x33\x30\x30\104\x30\66\60\x39\62\x41\x38\x36\x34\x38\70\x36\106\x37\x30\x44\x30\61\x30\x31\x30\x31\x30\65\x30\x30");
        $Pw = self::makeAsnSegment(48, $Nm . $ei);
        $wp = base64_encode($Pw);
        $E3 = "\x2d\x2d\55\55\x2d\102\105\107\111\x4e\x20\x50\x55\x42\x4c\111\103\x20\113\x45\131\55\55\55\x2d\55\12";
        $RA = 0;
        It:
        if (!($SS = substr($wp, $RA, 64))) {
            goto Rd;
        }
        $E3 = $E3 . $SS . "\12";
        $RA += 64;
        goto It;
        Rd:
        return $E3 . "\x2d\55\x2d\x2d\x2d\105\x4e\104\x20\120\x55\102\x4c\x49\103\x20\113\105\131\55\55\55\x2d\55\12";
    }
    public function serializeKey($jA)
    {
    }
    public function getX509Certificate()
    {
        return $this->x509Certificate;
    }
    public function getX509Thumbprint()
    {
        return $this->X509Thumbprint;
    }
    public static function fromEncryptedKeyElement(DOMElement $WC)
    {
        $mJ = new XMLSecEnc();
        $mJ->setNode($WC);
        if ($MM = $mJ->locateKey()) {
            goto LF;
        }
        throw new Exception("\125\156\x61\x62\154\x65\x20\164\157\40\x6c\x6f\x63\141\164\x65\40\x61\154\147\x6f\x72\151\164\150\x6d\x20\x66\157\162\x20\x74\150\151\163\40\105\156\x63\x72\171\160\x74\x65\144\40\113\145\171");
        LF:
        $MM->isEncrypted = true;
        $MM->encryptedCtx = $mJ;
        XMLSecEnc::staticLocateKeyInfo($MM, $WC);
        return $MM;
    }
}
