<?php


namespace RobRichards\XMLSecLibs;

require_once "\107\103\x4d\114\x69\142" . DIRECTORY_SEPARATOR . "\101\105\x53\x47\103\115\56\x70\x68\160";
use AESGCM\AESGCM;
use DOMElement;
use Exception;
class XMLSecurityKey
{
    const TRIPLEDES_CBC = "\150\164\x74\160\72\57\57\x77\167\167\56\167\63\56\157\x72\x67\57\62\x30\60\61\57\60\x34\57\170\155\154\145\x6e\x63\x23\x74\162\x69\160\154\145\144\145\x73\x2d\x63\x62\143";
    const AES128_CBC = "\x68\x74\x74\x70\72\x2f\x2f\x77\x77\x77\56\x77\63\56\x6f\x72\147\57\x32\60\x30\61\x2f\60\64\57\x78\155\x6c\x65\156\143\x23\141\x65\163\x31\62\70\x2d\143\142\x63";
    const AES192_CBC = "\150\164\164\x70\72\57\x2f\x77\167\x77\56\167\x33\x2e\x6f\162\x67\57\x32\x30\x30\x31\x2f\x30\x34\x2f\170\155\154\145\x6e\x63\x23\141\x65\x73\x31\x39\62\55\x63\142\x63";
    const AES256_CBC = "\x68\x74\x74\x70\72\57\57\x77\x77\x77\56\x77\63\56\x6f\x72\147\x2f\62\x30\60\61\x2f\60\64\57\170\x6d\154\145\x6e\143\43\141\145\x73\62\x35\x36\x2d\x63\x62\x63";
    const RSA_1_5 = "\150\x74\x74\160\x3a\x2f\x2f\167\x77\x77\56\x77\63\x2e\x6f\162\x67\57\62\x30\x30\61\x2f\60\64\57\170\x6d\x6c\145\x6e\x63\43\x72\x73\141\x2d\x31\x5f\65";
    const RSA_OAEP_MGF1P = "\x68\x74\x74\x70\72\x2f\57\167\x77\167\x2e\167\x33\56\157\162\x67\x2f\x32\60\x30\x31\x2f\x30\x34\x2f\x78\x6d\154\x65\156\143\x23\162\x73\x61\x2d\157\141\x65\160\55\x6d\147\146\61\160";
    const DSA_SHA1 = "\150\164\x74\x70\x3a\57\x2f\x77\x77\167\x2e\167\63\56\x6f\162\x67\x2f\62\60\x30\60\x2f\60\71\x2f\x78\x6d\x6c\144\x73\x69\147\x23\x64\163\141\55\163\150\x61\61";
    const RSA_SHA1 = "\x68\x74\x74\160\x3a\x2f\x2f\x77\167\x77\x2e\x77\x33\x2e\x6f\x72\147\57\62\x30\x30\x30\57\60\x39\57\x78\x6d\x6c\x64\x73\x69\147\x23\162\x73\141\x2d\163\150\141\61";
    const RSA_SHA256 = "\150\x74\164\160\x3a\x2f\x2f\x77\x77\x77\56\167\63\x2e\x6f\x72\x67\x2f\x32\x30\60\x31\57\60\x34\x2f\170\x6d\154\x64\163\x69\147\55\x6d\x6f\162\x65\43\x72\x73\141\55\x73\x68\141\62\x35\x36";
    const RSA_SHA384 = "\150\x74\x74\x70\x3a\57\x2f\x77\x77\167\x2e\167\x33\x2e\x6f\x72\x67\x2f\x32\x30\x30\x31\x2f\60\x34\x2f\170\155\154\x64\163\x69\x67\55\155\157\162\x65\43\162\x73\x61\x2d\163\x68\141\x33\x38\64";
    const RSA_SHA512 = "\150\164\164\x70\72\57\x2f\167\167\167\x2e\x77\63\56\x6f\162\147\57\62\x30\x30\x31\x2f\x30\x34\x2f\x78\155\154\x64\163\x69\147\55\x6d\157\162\x65\x23\162\163\141\55\x73\150\x61\x35\x31\62";
    const HMAC_SHA1 = "\x68\x74\164\160\x3a\x2f\x2f\x77\x77\167\56\x77\63\x2e\157\162\147\57\62\x30\x30\x30\x2f\60\71\57\170\x6d\154\x64\x73\x69\x67\43\150\155\141\143\x2d\163\x68\141\x31";
    const AES128_GMC = "\150\x74\164\160\x3a\57\x2f\x77\x77\x77\56\167\63\56\157\162\147\x2f\x32\x30\x30\71\x2f\x78\x6d\x6c\x65\x6e\143\x31\61\x23\141\x65\163\61\62\x38\55\147\143\155";
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
    public function __construct($ZL, $N4 = null)
    {
        switch ($ZL) {
            case self::TRIPLEDES_CBC:
                $this->cryptParams["\154\151\142\x72\141\x72\x79"] = "\157\x70\x65\x6e\x73\x73\154";
                $this->cryptParams["\x63\151\160\150\145\162"] = "\x64\x65\163\55\x65\144\x65\63\x2d\x63\x62\x63";
                $this->cryptParams["\164\x79\x70\145"] = "\x73\171\x6d\x6d\x65\x74\162\151\143";
                $this->cryptParams["\155\x65\164\x68\x6f\x64"] = "\x68\164\164\x70\72\x2f\x2f\167\x77\x77\x2e\x77\x33\56\157\162\x67\x2f\62\x30\60\x31\x2f\60\x34\57\x78\155\154\x65\156\143\x23\x74\x72\x69\x70\x6c\145\x64\x65\x73\x2d\x63\142\143";
                $this->cryptParams["\153\x65\x79\x73\x69\172\145"] = 24;
                $this->cryptParams["\x62\154\157\x63\x6b\163\x69\x7a\145"] = 8;
                goto VRE;
            case self::AES128_GMC:
                $this->cryptParams["\154\x69\142\x72\141\162\x79"] = "\157\160\145\x6e\163\x73\x6c";
                $this->cryptParams["\143\151\x70\x68\x65\162"] = "\141\x65\163\x2d\x31\62\70\x2d\147\143\x6d";
                $this->cryptParams["\x74\171\160\145"] = "\x73\x79\x6d\x6d\145\164\162\151\143";
                $this->cryptParams["\155\x65\x74\150\157\144"] = "\x68\164\164\160\72\57\x2f\x77\x77\x77\x2e\x77\x33\x2e\x6f\x72\x67\x2f\x32\x30\60\71\57\170\x6d\x6c\x65\x6e\x63\x31\x31\x23\x61\x65\163\61\62\70\x2d\x67\x63\x6d";
                $this->cryptParams["\x6b\145\x79\163\151\x7a\x65"] = 16;
                $this->cryptParams["\142\x6c\x6f\x63\x6b\163\x69\x7a\145"] = 16;
                goto VRE;
            case self::AES128_CBC:
                $this->cryptParams["\154\x69\142\x72\x61\162\171"] = "\x6f\160\145\156\x73\x73\x6c";
                $this->cryptParams["\143\x69\160\150\x65\162"] = "\x61\x65\163\x2d\61\62\x38\55\x63\x62\143";
                $this->cryptParams["\x74\x79\x70\x65"] = "\163\171\155\x6d\x65\x74\162\x69\143";
                $this->cryptParams["\155\x65\164\x68\157\x64"] = "\x68\164\164\x70\x3a\x2f\x2f\167\167\167\x2e\x77\63\x2e\157\162\147\x2f\62\x30\x30\61\x2f\x30\64\x2f\x78\155\x6c\x65\x6e\x63\x23\x61\x65\x73\61\x32\70\55\143\142\143";
                $this->cryptParams["\x6b\x65\171\163\151\x7a\145"] = 16;
                $this->cryptParams["\142\154\x6f\143\153\x73\151\172\145"] = 16;
                goto VRE;
            case self::AES192_CBC:
                $this->cryptParams["\154\151\x62\x72\141\162\171"] = "\157\x70\145\156\163\163\x6c";
                $this->cryptParams["\x63\151\160\150\145\x72"] = "\x61\x65\163\55\x31\x39\62\55\143\x62\x63";
                $this->cryptParams["\x74\171\x70\145"] = "\163\171\155\x6d\x65\x74\162\x69\x63";
                $this->cryptParams["\x6d\145\164\150\157\144"] = "\150\x74\164\x70\72\x2f\57\x77\x77\x77\56\x77\63\56\157\x72\147\x2f\x32\x30\x30\x31\x2f\x30\64\x2f\x78\x6d\x6c\x65\x6e\143\x23\x61\x65\x73\x31\x39\x32\x2d\x63\142\x63";
                $this->cryptParams["\153\145\171\163\x69\x7a\145"] = 24;
                $this->cryptParams["\142\154\x6f\143\153\x73\151\x7a\x65"] = 16;
                goto VRE;
            case self::AES256_CBC:
                $this->cryptParams["\154\x69\x62\x72\141\162\171"] = "\x6f\160\x65\156\x73\x73\154";
                $this->cryptParams["\x63\x69\160\x68\145\162"] = "\x61\x65\x73\x2d\62\65\66\x2d\x63\142\143";
                $this->cryptParams["\x74\171\x70\x65"] = "\163\x79\155\155\145\x74\x72\151\x63";
                $this->cryptParams["\x6d\x65\164\150\157\144"] = "\150\x74\x74\160\x3a\x2f\x2f\x77\167\x77\56\x77\63\x2e\x6f\x72\x67\x2f\62\x30\x30\61\57\60\x34\x2f\170\155\x6c\x65\156\143\x23\141\145\x73\x32\65\66\55\143\x62\143";
                $this->cryptParams["\x6b\x65\171\163\151\172\145"] = 32;
                $this->cryptParams["\x62\x6c\157\143\153\x73\x69\172\x65"] = 16;
                goto VRE;
            case self::RSA_1_5:
                $this->cryptParams["\x6c\151\x62\162\141\x72\x79"] = "\157\160\x65\156\x73\x73\x6c";
                $this->cryptParams["\160\x61\x64\144\x69\x6e\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\155\145\164\x68\x6f\144"] = "\150\x74\164\160\x3a\57\x2f\167\167\167\56\x77\63\x2e\x6f\162\147\x2f\x32\60\60\61\57\x30\64\57\x78\x6d\x6c\x65\x6e\x63\43\x72\163\141\x2d\x31\137\x35";
                if (!(is_array($N4) && !empty($N4["\x74\171\160\x65"]))) {
                    goto zt3;
                }
                if (!($N4["\x74\171\x70\145"] == "\x70\165\x62\x6c\151\x63" || $N4["\164\x79\x70\x65"] == "\160\162\x69\x76\141\164\x65")) {
                    goto Ctb;
                }
                $this->cryptParams["\164\171\160\145"] = $N4["\164\171\x70\x65"];
                goto VRE;
                Ctb:
                zt3:
                throw new Exception("\x43\145\x72\x74\x69\x66\151\143\x61\x74\x65\x20\x22\164\171\x70\x65\42\40\50\x70\162\x69\x76\x61\x74\x65\x2f\160\165\142\154\x69\x63\51\x20\x6d\165\163\x74\40\x62\x65\40\160\141\163\163\145\144\x20\166\151\141\x20\160\x61\162\141\155\x65\164\x65\x72\163");
            case self::RSA_OAEP_MGF1P:
                $this->cryptParams["\x6c\151\142\x72\141\162\171"] = "\x6f\x70\145\x6e\x73\x73\154";
                $this->cryptParams["\x70\x61\144\x64\x69\x6e\x67"] = OPENSSL_PKCS1_OAEP_PADDING;
                $this->cryptParams["\x6d\145\164\x68\x6f\144"] = "\x68\x74\164\160\72\x2f\57\167\167\167\x2e\167\x33\x2e\x6f\162\x67\x2f\62\60\60\61\x2f\x30\x34\x2f\x78\x6d\154\145\156\143\43\x72\x73\141\x2d\157\141\x65\160\55\x6d\x67\x66\x31\x70";
                $this->cryptParams["\x68\x61\x73\150"] = null;
                if (!(is_array($N4) && !empty($N4["\164\x79\x70\x65"]))) {
                    goto V7s;
                }
                if (!($N4["\x74\x79\x70\x65"] == "\x70\165\142\x6c\x69\x63" || $N4["\164\x79\160\x65"] == "\x70\162\x69\166\141\x74\x65")) {
                    goto obO;
                }
                $this->cryptParams["\x74\171\x70\145"] = $N4["\x74\171\160\145"];
                goto VRE;
                obO:
                V7s:
                throw new Exception("\103\145\x72\164\151\x66\x69\143\141\x74\x65\40\x22\164\x79\160\145\42\x20\x28\x70\162\151\x76\141\x74\x65\x2f\x70\x75\x62\x6c\151\143\51\40\155\x75\x73\x74\x20\142\145\40\x70\x61\x73\163\145\x64\x20\166\151\141\x20\x70\x61\162\x61\155\145\164\145\162\x73");
            case self::RSA_SHA1:
                $this->cryptParams["\154\151\x62\x72\x61\x72\x79"] = "\x6f\x70\x65\x6e\163\x73\154";
                $this->cryptParams["\155\x65\164\150\x6f\x64"] = "\x68\164\164\160\72\x2f\x2f\167\167\167\x2e\x77\63\56\157\x72\147\x2f\x32\x30\x30\x30\57\60\71\57\x78\x6d\x6c\x64\163\x69\x67\43\x72\163\141\x2d\163\150\x61\x31";
                $this->cryptParams["\160\x61\x64\x64\x69\x6e\x67"] = OPENSSL_PKCS1_PADDING;
                if (!(is_array($N4) && !empty($N4["\164\171\x70\x65"]))) {
                    goto Xe1;
                }
                if (!($N4["\164\x79\x70\145"] == "\x70\x75\142\x6c\151\143" || $N4["\x74\x79\160\145"] == "\x70\x72\x69\x76\x61\x74\145")) {
                    goto ntO;
                }
                $this->cryptParams["\164\x79\160\145"] = $N4["\x74\171\160\145"];
                goto VRE;
                ntO:
                Xe1:
                throw new Exception("\103\145\x72\x74\151\146\151\x63\x61\164\145\x20\x22\164\171\x70\145\42\40\50\160\162\151\x76\141\x74\x65\57\x70\x75\x62\x6c\151\143\51\x20\155\165\163\x74\40\142\145\x20\160\141\163\x73\x65\144\40\x76\x69\141\x20\160\x61\x72\x61\155\145\164\x65\x72\163");
            case self::RSA_SHA256:
                $this->cryptParams["\x6c\151\x62\x72\x61\162\x79"] = "\x6f\x70\x65\x6e\163\163\x6c";
                $this->cryptParams["\155\x65\164\x68\157\144"] = "\x68\x74\x74\x70\x3a\x2f\x2f\x77\x77\x77\x2e\x77\63\x2e\157\162\147\57\x32\x30\x30\61\57\x30\x34\x2f\170\155\154\x64\163\151\147\55\155\157\x72\x65\43\x72\163\x61\55\x73\150\141\x32\65\66";
                $this->cryptParams["\160\141\x64\144\x69\156\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\144\151\x67\x65\163\x74"] = "\123\110\x41\x32\65\x36";
                if (!(is_array($N4) && !empty($N4["\x74\171\160\x65"]))) {
                    goto NoS;
                }
                if (!($N4["\164\x79\160\x65"] == "\160\165\142\x6c\151\x63" || $N4["\164\171\x70\x65"] == "\160\162\151\166\x61\164\x65")) {
                    goto UJT;
                }
                $this->cryptParams["\164\171\160\x65"] = $N4["\x74\171\160\x65"];
                goto VRE;
                UJT:
                NoS:
                throw new Exception("\x43\145\162\164\x69\x66\x69\143\x61\164\145\x20\x22\164\171\x70\x65\x22\x20\x28\x70\162\x69\x76\141\x74\145\x2f\160\165\142\154\151\x63\51\40\155\165\x73\x74\x20\142\x65\40\x70\141\163\x73\145\x64\x20\166\x69\141\x20\x70\141\x72\141\155\145\x74\x65\162\163");
            case self::RSA_SHA384:
                $this->cryptParams["\154\x69\142\x72\141\x72\171"] = "\157\x70\x65\x6e\163\x73\154";
                $this->cryptParams["\x6d\145\164\150\x6f\x64"] = "\x68\164\164\x70\x3a\x2f\x2f\x77\167\x77\56\x77\x33\56\157\x72\x67\57\62\60\x30\x31\57\x30\64\x2f\170\x6d\x6c\144\163\151\x67\x2d\155\157\x72\145\43\162\x73\x61\55\x73\x68\x61\x33\70\64";
                $this->cryptParams["\160\x61\x64\144\x69\x6e\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x64\x69\x67\145\163\164"] = "\123\x48\x41\63\70\x34";
                if (!(is_array($N4) && !empty($N4["\164\x79\x70\x65"]))) {
                    goto qqO;
                }
                if (!($N4["\x74\x79\160\x65"] == "\160\165\142\154\151\x63" || $N4["\164\x79\160\x65"] == "\160\x72\x69\x76\141\164\145")) {
                    goto shr;
                }
                $this->cryptParams["\x74\x79\160\x65"] = $N4["\x74\171\x70\x65"];
                goto VRE;
                shr:
                qqO:
                throw new Exception("\103\x65\x72\x74\x69\x66\x69\x63\141\164\145\40\x22\x74\x79\160\145\x22\40\50\160\x72\151\x76\141\164\145\x2f\160\165\142\x6c\x69\x63\51\40\155\x75\x73\x74\40\142\145\x20\160\141\163\x73\x65\144\x20\166\x69\141\40\160\x61\x72\141\x6d\145\x74\145\162\x73");
            case self::RSA_SHA512:
                $this->cryptParams["\x6c\x69\x62\x72\x61\162\171"] = "\x6f\x70\145\x6e\163\163\x6c";
                $this->cryptParams["\x6d\145\x74\x68\x6f\144"] = "\150\x74\164\x70\x3a\x2f\x2f\167\167\167\x2e\167\63\x2e\157\x72\x67\57\62\x30\60\61\x2f\60\64\57\170\155\154\x64\x73\x69\x67\55\x6d\157\162\145\x23\x72\x73\141\55\x73\150\141\65\61\62";
                $this->cryptParams["\160\x61\x64\144\151\x6e\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x64\151\x67\145\163\x74"] = "\123\x48\101\x35\61\62";
                if (!(is_array($N4) && !empty($N4["\x74\x79\x70\145"]))) {
                    goto Xv2;
                }
                if (!($N4["\164\x79\x70\x65"] == "\160\165\x62\x6c\x69\143" || $N4["\x74\x79\160\x65"] == "\160\x72\151\166\x61\x74\145")) {
                    goto o4q;
                }
                $this->cryptParams["\164\x79\x70\x65"] = $N4["\x74\171\160\145"];
                goto VRE;
                o4q:
                Xv2:
                throw new Exception("\x43\145\162\164\x69\146\x69\143\x61\164\x65\40\42\164\171\x70\145\x22\x20\50\160\162\151\x76\x61\x74\x65\x2f\x70\x75\x62\154\x69\x63\x29\x20\155\x75\x73\164\x20\x62\145\x20\160\141\163\x73\145\144\x20\x76\x69\141\x20\160\x61\162\x61\x6d\145\164\x65\162\163");
            case self::HMAC_SHA1:
                $this->cryptParams["\x6c\x69\142\162\x61\x72\171"] = $ZL;
                $this->cryptParams["\155\x65\164\x68\x6f\x64"] = "\150\x74\x74\160\72\57\x2f\x77\167\x77\56\x77\63\56\157\x72\x67\x2f\62\x30\x30\x30\x2f\x30\x39\x2f\170\x6d\x6c\x64\x73\151\147\x23\150\155\x61\143\x2d\x73\x68\141\x31";
                goto VRE;
            default:
                throw new Exception("\111\156\166\x61\154\151\x64\x20\113\x65\x79\40\124\171\x70\x65");
        }
        hxg:
        VRE:
        $this->type = $ZL;
    }
    public function getSymmetricKeySize()
    {
        if (isset($this->cryptParams["\153\145\171\163\x69\x7a\145"])) {
            goto Byl;
        }
        return null;
        Byl:
        return $this->cryptParams["\153\145\171\x73\x69\x7a\145"];
    }
    public function generateSessionKey()
    {
        if (isset($this->cryptParams["\153\145\171\163\151\172\145"])) {
            goto yaf;
        }
        throw new Exception("\125\x6e\x6b\156\x6f\x77\x6e\40\153\145\x79\x20\x73\151\172\145\x20\146\x6f\162\40\164\171\x70\x65\x20\x22" . $this->type . "\x22\x2e");
        yaf:
        $UQ = $this->cryptParams["\153\145\x79\163\x69\x7a\145"];
        $k3 = openssl_random_pseudo_bytes($UQ);
        if (!($this->type === self::TRIPLEDES_CBC)) {
            goto Rjj;
        }
        $lp = 0;
        xoy:
        if (!($lp < strlen($k3))) {
            goto lyh;
        }
        $jv = ord($k3[$lp]) & 254;
        $JL = 1;
        $aG = 1;
        EsL:
        if (!($aG < 8)) {
            goto ov3;
        }
        $JL ^= $jv >> $aG & 1;
        XnK:
        $aG++;
        goto EsL;
        ov3:
        $jv |= $JL;
        $k3[$lp] = chr($jv);
        E33:
        $lp++;
        goto xoy;
        lyh:
        Rjj:
        $this->key = $k3;
        return $k3;
    }
    public static function getRawThumbprint($em)
    {
        $iN = explode("\xa", $em);
        $Qk = '';
        $vB = false;
        foreach ($iN as $cs) {
            if (!$vB) {
                goto t3C;
            }
            if (!(strncmp($cs, "\x2d\55\x2d\x2d\x2d\x45\x4e\x44\x20\x43\105\x52\x54\x49\x46\x49\x43\x41\x54\105", 20) == 0)) {
                goto Z4C;
            }
            goto uHb;
            Z4C:
            $Qk .= trim($cs);
            goto kdb;
            t3C:
            if (!(strncmp($cs, "\x2d\x2d\55\x2d\55\102\x45\107\x49\116\40\x43\x45\122\124\x49\106\111\103\101\124\x45", 22) == 0)) {
                goto xF3;
            }
            $vB = true;
            xF3:
            kdb:
            HFS:
        }
        uHb:
        if (empty($Qk)) {
            goto zsg;
        }
        return strtolower(sha1(base64_decode($Qk)));
        zsg:
        return null;
    }
    public function loadKey($k3, $va = false, $fK = false)
    {
        if ($va) {
            goto J80;
        }
        $this->key = $k3;
        goto ocf;
        J80:
        $this->key = file_get_contents($k3);
        ocf:
        if ($fK) {
            goto BAj;
        }
        $this->x509Certificate = null;
        goto Jhx;
        BAj:
        $this->key = openssl_x509_read($this->key);
        openssl_x509_export($this->key, $UU);
        $this->x509Certificate = $UU;
        $this->key = $UU;
        Jhx:
        if (!($this->cryptParams["\154\151\x62\x72\141\162\171"] == "\x6f\160\145\x6e\163\x73\154")) {
            goto MQy;
        }
        switch ($this->cryptParams["\164\x79\160\145"]) {
            case "\x70\x75\142\x6c\x69\143":
                if (!$fK) {
                    goto Hew;
                }
                $this->X509Thumbprint = self::getRawThumbprint($this->key);
                Hew:
                $this->key = openssl_get_publickey($this->key);
                if ($this->key) {
                    goto Iwd;
                }
                throw new Exception("\x55\x6e\141\142\x6c\x65\x20\x74\157\x20\x65\x78\x74\162\141\x63\x74\x20\160\165\142\x6c\151\143\x20\153\x65\171");
                Iwd:
                goto l8T;
            case "\x70\x72\151\x76\x61\164\x65":
                $this->key = openssl_get_privatekey($this->key, $this->passphrase);
                goto l8T;
            case "\163\x79\155\x6d\x65\x74\162\x69\143":
                if (!(strlen($this->key) < $this->cryptParams["\x6b\145\x79\163\x69\x7a\x65"])) {
                    goto uz8;
                }
                throw new Exception("\113\145\x79\40\155\165\x73\164\x20\143\x6f\156\164\141\151\156\x20\141\164\40\154\145\141\x73\164\40\62\65\40\143\x68\141\x72\x61\x63\x74\x65\162\163\x20\x66\x6f\x72\x20\x74\x68\x69\x73\x20\143\151\x70\x68\x65\162");
                uz8:
                goto l8T;
            default:
                throw new Exception("\125\156\153\x6e\157\167\x6e\40\x74\x79\160\145");
        }
        KvB:
        l8T:
        MQy:
    }
    private function padISO10126($Qk, $M5)
    {
        if (!($M5 > 256)) {
            goto kK8;
        }
        throw new Exception("\102\x6c\x6f\143\153\x20\163\x69\x7a\145\40\150\151\x67\150\x65\162\x20\x74\x68\x61\x6e\40\62\x35\x36\x20\156\157\164\x20\141\x6c\154\x6f\x77\x65\x64");
        kK8:
        $Iy = $M5 - strlen($Qk) % $M5;
        $Y8 = chr($Iy);
        return $Qk . str_repeat($Y8, $Iy);
    }
    private function unpadISO10126($Qk)
    {
        $Iy = substr($Qk, -1);
        $De = ord($Iy);
        return substr($Qk, 0, -$De);
    }
    private function encryptSymmetric($Qk)
    {
        $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cryptParams["\143\151\160\x68\x65\162"]));
        $Qk = $this->padISO10126($Qk, $this->cryptParams["\142\154\157\x63\x6b\x73\x69\172\145"]);
        $Jn = openssl_encrypt($Qk, $this->cryptParams["\x63\x69\x70\150\145\x72"], $this->key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $this->iv);
        if (!(false === $Jn)) {
            goto Jt0;
        }
        throw new Exception("\x46\x61\x69\154\165\x72\x65\40\x65\156\x63\x72\x79\x70\164\x69\156\x67\x20\x44\141\x74\x61\40\50\157\x70\145\156\163\163\x6c\x20\x73\x79\155\x6d\145\164\x72\151\143\51\x20\55\x20" . openssl_error_string());
        Jt0:
        return $this->iv . $Jn;
    }
    private function decryptSymmetric($Qk)
    {
        if (!($this->cryptParams["\143\151\160\150\145\162"] === "\141\x65\x73\55\x31\x32\x38\x2d\x67\143\155")) {
            goto ipO;
        }
        return $this->decryptSymmetricAESGCM($Qk);
        ipO:
        $iI = openssl_cipher_iv_length($this->cryptParams["\x63\151\160\150\x65\162"]);
        $this->iv = substr($Qk, 0, $iI);
        $Qk = substr($Qk, $iI);
        $tg = openssl_decrypt($Qk, $this->cryptParams["\x63\151\x70\x68\145\162"], $this->key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $this->iv);
        if (!(false === $tg)) {
            goto xS1;
        }
        throw new Exception("\106\141\151\154\165\x72\x65\x20\144\145\143\x72\x79\x70\x74\151\156\x67\40\104\x61\x74\x61\x20\x28\x6f\160\145\x6e\x73\x73\154\40\163\x79\x6d\155\x65\164\162\x69\x63\51\40\x2d\40" . openssl_error_string());
        xS1:
        return $this->unpadISO10126($tg);
    }
    private function decryptSymmetricAESGCM($Qk)
    {
        $iI = openssl_cipher_iv_length($this->cryptParams["\143\x69\x70\x68\x65\x72"]);
        $this->iv = substr($Qk, 0, $iI);
        $Qk = substr($Qk, $iI);
        $tg = AESGCM::decryptWithAppendedTag($this->key, $this->iv, $Qk, null, 128);
        if (!(false === $tg)) {
            goto K0v;
        }
        throw new Exception("\x46\x61\151\x6c\x75\x72\145\x20\x64\145\143\x72\x79\x70\x74\151\x6e\x67\40\104\141\x74\x61\x20\50\x6f\160\145\x6e\x73\x73\x6c\40\163\171\x6d\155\145\x74\162\151\143\x29\x20\55\40" . openssl_error_string());
        K0v:
        return $tg;
    }
    private function encryptPublic($Qk)
    {
        if (openssl_public_encrypt($Qk, $Jn, $this->key, $this->cryptParams["\160\141\144\144\151\156\x67"])) {
            goto amN;
        }
        throw new Exception("\106\x61\151\154\165\x72\x65\x20\145\x6e\143\162\x79\x70\164\151\156\x67\x20\x44\x61\164\x61\40\50\x6f\x70\145\156\x73\x73\154\40\x70\165\142\x6c\151\x63\51\x20\55\x20" . openssl_error_string());
        amN:
        return $Jn;
    }
    private function decryptPublic($Qk)
    {
        if (openssl_public_decrypt($Qk, $tg, $this->key, $this->cryptParams["\x70\x61\144\144\151\156\x67"])) {
            goto aVR;
        }
        throw new Exception("\106\x61\x69\x6c\x75\x72\x65\40\x64\x65\x63\x72\x79\x70\x74\x69\x6e\x67\x20\104\141\x74\141\x20\x28\157\160\145\x6e\x73\x73\x6c\x20\160\165\x62\154\151\143\x29\x20\55\x20" . openssl_error_string());
        aVR:
        return $tg;
    }
    private function encryptPrivate($Qk)
    {
        if (openssl_private_encrypt($Qk, $Jn, $this->key, $this->cryptParams["\160\x61\x64\144\151\156\147"])) {
            goto kyJ;
        }
        throw new Exception("\x46\x61\x69\x6c\x75\x72\x65\x20\x65\156\x63\162\171\160\x74\151\156\x67\x20\104\141\x74\x61\40\50\157\160\x65\x6e\x73\x73\154\x20\x70\162\x69\166\141\x74\x65\51\x20\x2d\x20" . openssl_error_string());
        kyJ:
        return $Jn;
    }
    private function decryptPrivate($Qk)
    {
        if (openssl_private_decrypt($Qk, $tg, $this->key, $this->cryptParams["\x70\x61\x64\144\x69\x6e\147"])) {
            goto dd1;
        }
        throw new Exception("\x46\x61\x69\154\165\162\x65\x20\144\145\143\x72\171\160\164\x69\156\147\x20\104\x61\164\141\x20\x28\157\160\x65\156\163\163\x6c\40\160\x72\x69\166\x61\x74\x65\x29\40\x2d\x20" . openssl_error_string());
        dd1:
        return $tg;
    }
    private function signOpenSSL($Qk)
    {
        $sm = OPENSSL_ALGO_SHA1;
        if (empty($this->cryptParams["\144\151\x67\x65\x73\164"])) {
            goto ReG;
        }
        $sm = $this->cryptParams["\x64\x69\x67\145\x73\164"];
        ReG:
        if (openssl_sign($Qk, $bn, $this->key, $sm)) {
            goto w6x;
        }
        throw new Exception("\x46\141\151\x6c\x75\x72\145\x20\123\151\x67\156\x69\x6e\147\x20\x44\x61\x74\x61\72\40" . openssl_error_string() . "\x20\x2d\x20" . $sm);
        w6x:
        return $bn;
    }
    private function verifyOpenSSL($Qk, $bn)
    {
        $sm = OPENSSL_ALGO_SHA1;
        if (empty($this->cryptParams["\x64\151\x67\145\163\164"])) {
            goto QsD;
        }
        $sm = $this->cryptParams["\x64\151\x67\x65\x73\x74"];
        QsD:
        return openssl_verify($Qk, $bn, $this->key, $sm);
    }
    public function encryptData($Qk)
    {
        if (!($this->cryptParams["\x6c\151\142\162\141\162\x79"] === "\157\x70\145\156\x73\163\x6c")) {
            goto kju;
        }
        switch ($this->cryptParams["\x74\171\x70\145"]) {
            case "\163\x79\x6d\155\x65\x74\162\151\143":
                return $this->encryptSymmetric($Qk);
            case "\160\x75\142\154\x69\143":
                return $this->encryptPublic($Qk);
            case "\x70\x72\x69\166\141\164\x65":
                return $this->encryptPrivate($Qk);
        }
        uJX:
        iLM:
        kju:
    }
    public function decryptData($Qk)
    {
        if (!($this->cryptParams["\x6c\151\x62\x72\x61\x72\x79"] === "\x6f\160\x65\x6e\x73\163\154")) {
            goto QK5;
        }
        switch ($this->cryptParams["\x74\171\160\145"]) {
            case "\x73\x79\x6d\155\145\164\162\x69\x63":
                return $this->decryptSymmetric($Qk);
            case "\160\165\x62\154\151\143":
                return $this->decryptPublic($Qk);
            case "\x70\162\x69\x76\x61\x74\145":
                return $this->decryptPrivate($Qk);
        }
        EoP:
        N3g:
        QK5:
    }
    public function signData($Qk)
    {
        switch ($this->cryptParams["\154\151\142\162\141\x72\171"]) {
            case "\x6f\160\x65\x6e\x73\x73\x6c":
                return $this->signOpenSSL($Qk);
            case self::HMAC_SHA1:
                return hash_hmac("\x73\150\141\61", $Qk, $this->key, true);
        }
        vRZ:
        Vcx:
    }
    public function verifySignature($Qk, $bn)
    {
        switch ($this->cryptParams["\x6c\x69\x62\162\x61\162\171"]) {
            case "\x6f\160\x65\x6e\x73\163\154":
                return $this->verifyOpenSSL($Qk, $bn);
            case self::HMAC_SHA1:
                $sk = hash_hmac("\x73\x68\141\x31", $Qk, $this->key, true);
                return strcmp($bn, $sk) == 0;
        }
        qAZ:
        WF8:
    }
    public function getAlgorith()
    {
        return $this->getAlgorithm();
    }
    public function getAlgorithm()
    {
        return $this->cryptParams["\x6d\x65\x74\150\157\x64"];
    }
    public static function makeAsnSegment($ZL, $lR)
    {
        switch ($ZL) {
            case 2:
                if (!(ord($lR) > 127)) {
                    goto KFg;
                }
                $lR = chr(0) . $lR;
                KFg:
                goto NZk;
            case 3:
                $lR = chr(0) . $lR;
                goto NZk;
        }
        BFi:
        NZk:
        $SS = strlen($lR);
        if ($SS < 128) {
            goto ZDv;
        }
        if ($SS < 256) {
            goto EBr;
        }
        if ($SS < 65536) {
            goto VxN;
        }
        $so = null;
        goto ada;
        VxN:
        $so = sprintf("\x25\143\45\x63\x25\x63\x25\143\45\x73", $ZL, 130, $SS / 256, $SS % 256, $lR);
        ada:
        goto zRi;
        EBr:
        $so = sprintf("\x25\143\45\143\x25\x63\x25\x73", $ZL, 129, $SS, $lR);
        zRi:
        goto esq;
        ZDv:
        $so = sprintf("\45\x63\x25\x63\45\163", $ZL, $SS, $lR);
        esq:
        return $so;
    }
    public static function convertRSA($st, $SZ)
    {
        $JM = self::makeAsnSegment(2, $SZ);
        $P9 = self::makeAsnSegment(2, $st);
        $zG = self::makeAsnSegment(48, $P9 . $JM);
        $vH = self::makeAsnSegment(3, $zG);
        $WR = pack("\x48\52", "\x33\60\x30\x44\60\66\60\71\x32\101\x38\x36\64\x38\x38\x36\106\67\x30\x44\x30\61\x30\61\x30\x31\60\x35\60\x30");
        $RJ = self::makeAsnSegment(48, $WR . $vH);
        $Ml = base64_encode($RJ);
        $Gz = "\55\x2d\x2d\x2d\x2d\102\x45\x47\x49\x4e\x20\x50\x55\x42\114\x49\x43\x20\x4b\105\131\55\x2d\55\55\55\12";
        $CV = 0;
        ZuD:
        if (!($Jm = substr($Ml, $CV, 64))) {
            goto QgQ;
        }
        $Gz = $Gz . $Jm . "\12";
        $CV += 64;
        goto ZuD;
        QgQ:
        return $Gz . "\x2d\x2d\x2d\x2d\x2d\105\x4e\x44\40\x50\125\102\114\111\103\x20\x4b\x45\131\55\55\55\55\55\xa";
    }
    public function serializeKey($UF)
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
    public static function fromEncryptedKeyElement(DOMElement $kF)
    {
        $et = new XMLSecEnc();
        $et->setNode($kF);
        if ($c8 = $et->locateKey()) {
            goto RzX;
        }
        throw new Exception("\x55\x6e\141\142\x6c\145\x20\x74\x6f\40\154\x6f\143\x61\x74\145\x20\x61\154\147\x6f\x72\151\x74\150\x6d\40\x66\157\x72\x20\x74\x68\151\163\x20\x45\x6e\x63\x72\x79\x70\164\x65\x64\x20\x4b\145\x79");
        RzX:
        $c8->isEncrypted = true;
        $c8->encryptedCtx = $et;
        XMLSecEnc::staticLocateKeyInfo($c8, $kF);
        return $c8;
    }
}
