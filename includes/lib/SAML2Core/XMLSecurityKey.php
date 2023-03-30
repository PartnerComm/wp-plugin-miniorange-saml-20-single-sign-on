<?php


namespace RobRichards\XMLSecLibs;

use DOMElement;
use Exception;
class XMLSecurityKey
{
    const TRIPLEDES_CBC = "\x68\164\x74\160\72\x2f\57\167\167\167\56\167\x33\x2e\x6f\x72\147\57\x32\x30\x30\61\x2f\60\x34\x2f\170\155\x6c\x65\156\143\x23\164\x72\151\160\x6c\145\144\x65\163\55\143\142\x63";
    const AES128_CBC = "\150\x74\164\x70\72\57\x2f\x77\167\167\x2e\167\x33\56\157\x72\147\57\62\x30\x30\61\57\60\x34\x2f\170\x6d\154\x65\156\x63\x23\x61\x65\x73\61\62\70\x2d\x63\x62\x63";
    const AES192_CBC = "\150\x74\x74\x70\72\x2f\x2f\x77\x77\167\x2e\167\x33\x2e\157\162\x67\x2f\62\60\60\61\x2f\60\64\57\x78\155\154\145\x6e\143\43\141\145\163\x31\71\62\x2d\143\x62\x63";
    const AES256_CBC = "\x68\164\x74\160\x3a\57\x2f\167\x77\167\x2e\167\63\56\x6f\162\147\57\x32\x30\x30\x31\x2f\x30\x34\x2f\x78\155\x6c\145\156\x63\x23\x61\x65\x73\x32\x35\x36\x2d\x63\142\143";
    const AES128_GCM = "\x68\x74\x74\x70\x3a\x2f\57\167\167\x77\x2e\x77\x33\56\157\162\147\57\x32\x30\60\71\57\x78\x6d\154\145\156\143\x31\61\x23\x61\x65\163\61\x32\x38\55\147\143\x6d";
    const AES192_GCM = "\x68\x74\x74\x70\72\x2f\x2f\167\x77\x77\x2e\167\x33\x2e\157\x72\147\x2f\x32\x30\x30\71\x2f\170\x6d\x6c\x65\x6e\143\61\x31\43\141\x65\x73\61\x39\62\x2d\147\x63\155";
    const AES256_GCM = "\x68\164\x74\160\72\57\57\x77\x77\167\56\167\63\56\157\x72\x67\57\62\60\x30\x39\x2f\170\155\x6c\145\x6e\143\61\x31\x23\141\145\x73\x32\x35\66\x2d\x67\x63\x6d";
    const RSA_1_5 = "\150\x74\x74\x70\x3a\x2f\x2f\167\x77\167\56\x77\63\56\x6f\162\147\57\62\x30\x30\61\x2f\60\x34\x2f\170\x6d\x6c\145\156\x63\43\x72\x73\141\x2d\61\x5f\65";
    const RSA_OAEP_MGF1P = "\x68\x74\164\x70\x3a\57\57\x77\x77\167\56\x77\x33\56\x6f\162\x67\57\62\x30\60\61\x2f\60\x34\57\x78\155\x6c\145\156\x63\43\162\x73\x61\x2d\157\x61\x65\x70\x2d\155\x67\146\x31\160";
    const RSA_OAEP = "\x68\x74\164\x70\x3a\x2f\57\x77\167\x77\56\x77\63\x2e\157\x72\147\x2f\x32\x30\60\x39\57\x78\155\x6c\x65\x6e\143\x31\61\43\162\163\141\x2d\157\141\145\160";
    const DSA_SHA1 = "\150\164\x74\160\72\x2f\57\x77\x77\167\56\167\63\x2e\157\162\147\x2f\x32\60\60\x30\57\60\x39\x2f\170\155\x6c\144\163\151\x67\43\144\x73\x61\x2d\x73\x68\x61\61";
    const RSA_SHA1 = "\150\x74\x74\160\x3a\57\x2f\167\167\x77\56\167\63\x2e\157\162\x67\57\62\60\x30\60\57\60\71\x2f\170\x6d\x6c\144\163\x69\147\x23\162\163\141\x2d\x73\x68\x61\61";
    const RSA_SHA256 = "\150\164\164\x70\72\57\57\x77\167\167\56\167\x33\x2e\157\x72\x67\x2f\x32\x30\60\61\57\60\x34\x2f\170\x6d\x6c\144\163\x69\147\55\155\x6f\162\x65\x23\162\x73\x61\55\x73\150\x61\62\x35\66";
    const RSA_SHA384 = "\x68\x74\x74\x70\72\x2f\57\x77\x77\x77\56\167\x33\56\x6f\x72\147\57\x32\x30\x30\x31\x2f\60\64\57\x78\155\x6c\144\163\x69\147\55\x6d\x6f\162\145\x23\x72\x73\141\x2d\163\x68\141\x33\x38\64";
    const RSA_SHA512 = "\150\164\x74\x70\72\57\x2f\x77\x77\x77\56\167\63\56\157\x72\x67\x2f\x32\x30\x30\x31\57\60\x34\57\170\155\x6c\x64\163\x69\x67\55\x6d\157\162\x65\x23\x72\x73\141\55\x73\150\x61\65\x31\62";
    const HMAC_SHA1 = "\x68\x74\164\160\x3a\57\x2f\167\167\167\56\167\63\x2e\157\x72\x67\x2f\62\60\60\x30\x2f\x30\x39\x2f\x78\x6d\154\x64\163\151\x67\x23\150\155\141\143\55\x73\x68\141\x31";
    const AUTHTAG_LENGTH = 16;
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
    public function __construct($YE, $E7 = null)
    {
        switch ($YE) {
            case self::TRIPLEDES_CBC:
                $this->cryptParams["\x6c\x69\x62\162\141\162\171"] = "\x6f\160\x65\x6e\x73\163\x6c";
                $this->cryptParams["\143\151\160\x68\145\x72"] = "\x64\145\x73\55\145\x64\x65\63\x2d\x63\142\143";
                $this->cryptParams["\x74\171\160\x65"] = "\x73\171\x6d\155\x65\x74\162\151\x63";
                $this->cryptParams["\x6d\145\x74\150\157\x64"] = "\150\164\x74\160\x3a\57\x2f\x77\x77\167\x2e\167\63\x2e\157\x72\147\x2f\x32\60\60\x31\x2f\60\64\57\170\155\154\145\156\x63\x23\164\x72\151\x70\154\145\144\x65\163\55\x63\142\x63";
                $this->cryptParams["\153\x65\x79\x73\x69\x7a\x65"] = 24;
                $this->cryptParams["\142\154\x6f\x63\x6b\x73\x69\172\x65"] = 8;
                goto pX;
            case self::AES128_CBC:
                $this->cryptParams["\154\x69\142\x72\141\x72\x79"] = "\x6f\x70\x65\x6e\163\163\x6c";
                $this->cryptParams["\x63\151\x70\150\145\162"] = "\x61\145\x73\x2d\61\62\x38\55\143\x62\143";
                $this->cryptParams["\x74\x79\x70\145"] = "\x73\x79\x6d\155\x65\164\x72\151\x63";
                $this->cryptParams["\155\x65\x74\x68\x6f\x64"] = "\150\x74\164\x70\72\x2f\x2f\x77\167\x77\56\167\x33\x2e\157\x72\147\57\62\60\60\x31\x2f\x30\x34\57\x78\x6d\154\x65\x6e\143\x23\x61\x65\x73\61\x32\70\x2d\x63\142\x63";
                $this->cryptParams["\x6b\145\x79\163\x69\172\145"] = 16;
                $this->cryptParams["\142\154\x6f\143\153\x73\151\172\145"] = 16;
                goto pX;
            case self::AES192_CBC:
                $this->cryptParams["\154\151\x62\162\x61\162\171"] = "\157\x70\x65\156\x73\163\x6c";
                $this->cryptParams["\143\151\x70\150\145\162"] = "\x61\145\x73\x2d\x31\x39\62\55\143\142\x63";
                $this->cryptParams["\x74\171\x70\x65"] = "\163\171\x6d\155\x65\x74\x72\151\143";
                $this->cryptParams["\155\145\x74\150\x6f\144"] = "\x68\x74\x74\x70\72\x2f\57\167\167\x77\x2e\167\x33\56\157\162\147\x2f\62\60\60\61\x2f\x30\x34\57\170\155\x6c\145\x6e\143\43\141\x65\x73\61\71\62\x2d\x63\x62\x63";
                $this->cryptParams["\153\145\x79\163\151\x7a\x65"] = 24;
                $this->cryptParams["\142\x6c\x6f\x63\x6b\163\x69\x7a\145"] = 16;
                goto pX;
            case self::AES256_CBC:
                $this->cryptParams["\x6c\x69\142\x72\141\x72\x79"] = "\x6f\x70\145\156\163\163\x6c";
                $this->cryptParams["\x63\151\x70\x68\145\162"] = "\x61\x65\163\x2d\62\x35\66\55\x63\142\143";
                $this->cryptParams["\x74\171\160\145"] = "\163\x79\155\x6d\x65\x74\162\x69\x63";
                $this->cryptParams["\155\145\x74\x68\157\x64"] = "\150\164\164\x70\x3a\x2f\57\167\x77\x77\56\167\x33\56\x6f\162\x67\x2f\62\x30\x30\x31\x2f\x30\64\x2f\170\x6d\154\145\x6e\x63\x23\x61\x65\x73\62\x35\x36\55\143\142\143";
                $this->cryptParams["\153\x65\x79\163\151\x7a\145"] = 32;
                $this->cryptParams["\142\x6c\x6f\143\153\163\x69\172\145"] = 16;
                goto pX;
            case self::AES128_GCM:
                $this->cryptParams["\154\x69\142\x72\x61\x72\x79"] = "\157\x70\145\x6e\x73\x73\x6c";
                $this->cryptParams["\143\151\160\150\145\162"] = "\141\x65\163\x2d\x31\62\70\55\x67\x63\155";
                $this->cryptParams["\x74\171\160\x65"] = "\x73\x79\155\155\x65\x74\162\151\143";
                $this->cryptParams["\x6d\x65\164\x68\157\x64"] = "\x68\164\164\160\x3a\x2f\57\167\167\x77\x2e\167\x33\x2e\x6f\x72\x67\57\x32\60\60\71\x2f\x78\x6d\x6c\x65\156\x63\x31\61\43\x61\x65\163\61\62\x38\x2d\x67\143\x6d";
                $this->cryptParams["\x6b\x65\x79\163\x69\x7a\145"] = 16;
                $this->cryptParams["\x62\154\x6f\143\153\x73\151\172\145"] = 16;
                goto pX;
            case self::AES192_GCM:
                $this->cryptParams["\x6c\x69\x62\x72\x61\x72\171"] = "\157\x70\x65\156\x73\x73\154";
                $this->cryptParams["\143\x69\x70\150\145\162"] = "\x61\x65\x73\55\61\71\62\55\x67\143\x6d";
                $this->cryptParams["\x74\171\160\x65"] = "\x73\x79\x6d\x6d\x65\164\162\151\x63";
                $this->cryptParams["\x6d\x65\164\x68\x6f\x64"] = "\x68\x74\x74\x70\x3a\x2f\57\x77\167\167\56\167\63\x2e\x6f\162\147\x2f\x32\60\60\71\x2f\170\155\154\x65\x6e\143\61\x31\x23\x61\145\x73\x31\71\x32\55\x67\143\155";
                $this->cryptParams["\x6b\145\x79\163\x69\x7a\x65"] = 24;
                $this->cryptParams["\142\x6c\x6f\x63\153\x73\x69\x7a\145"] = 16;
                goto pX;
            case self::AES256_GCM:
                $this->cryptParams["\x6c\151\x62\162\141\x72\171"] = "\157\160\145\x6e\163\163\154";
                $this->cryptParams["\143\x69\x70\x68\x65\x72"] = "\x61\x65\x73\55\62\x35\x36\x2d\147\143\x6d";
                $this->cryptParams["\x74\x79\x70\x65"] = "\x73\x79\x6d\155\145\x74\162\x69\x63";
                $this->cryptParams["\155\145\x74\x68\157\144"] = "\x68\164\164\x70\x3a\57\x2f\167\167\167\x2e\167\63\56\x6f\x72\147\57\x32\60\x30\x39\x2f\170\x6d\154\145\x6e\143\61\61\43\x61\x65\163\x32\65\66\55\x67\x63\x6d";
                $this->cryptParams["\x6b\x65\x79\163\x69\172\x65"] = 32;
                $this->cryptParams["\x62\154\157\143\153\163\x69\172\x65"] = 16;
                goto pX;
            case self::RSA_1_5:
                $this->cryptParams["\x6c\x69\x62\x72\141\162\171"] = "\157\x70\x65\156\x73\x73\x6c";
                $this->cryptParams["\160\141\144\144\151\x6e\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x6d\x65\x74\x68\157\144"] = "\150\x74\164\160\72\x2f\x2f\x77\167\167\x2e\167\x33\x2e\x6f\x72\147\57\62\60\60\x31\x2f\x30\64\x2f\x78\155\154\145\156\x63\43\162\x73\x61\55\x31\137\x35";
                if (!(is_array($E7) && !empty($E7["\x74\171\160\x65"]))) {
                    goto tU;
                }
                if (!($E7["\164\x79\x70\x65"] == "\160\165\x62\154\x69\143" || $E7["\164\171\x70\145"] == "\160\x72\151\x76\x61\x74\145")) {
                    goto yJ;
                }
                $this->cryptParams["\164\171\160\145"] = $E7["\x74\x79\160\145"];
                goto pX;
                yJ:
                tU:
                throw new Exception("\103\145\x72\x74\x69\x66\x69\x63\x61\x74\x65\40\42\x74\x79\160\x65\x22\x20\50\x70\x72\x69\x76\141\164\x65\x2f\160\x75\x62\154\151\x63\51\x20\x6d\165\x73\x74\40\142\145\x20\x70\141\x73\163\145\144\40\x76\x69\x61\x20\160\141\162\x61\x6d\x65\164\x65\x72\x73");
            case self::RSA_OAEP_MGF1P:
                $this->cryptParams["\x6c\x69\x62\x72\141\162\171"] = "\x6f\x70\x65\156\x73\x73\154";
                $this->cryptParams["\160\141\144\x64\151\x6e\x67"] = OPENSSL_PKCS1_OAEP_PADDING;
                $this->cryptParams["\x6d\x65\164\150\x6f\144"] = "\x68\x74\x74\160\72\57\57\x77\167\x77\56\167\63\x2e\x6f\x72\147\x2f\62\60\x30\x31\57\60\x34\x2f\x78\x6d\x6c\145\x6e\143\43\x72\x73\x61\55\157\141\x65\x70\x2d\x6d\x67\x66\61\x70";
                $this->cryptParams["\150\x61\163\x68"] = null;
                if (!(is_array($E7) && !empty($E7["\164\171\x70\145"]))) {
                    goto hX;
                }
                if (!($E7["\x74\171\160\145"] == "\160\x75\x62\154\151\x63" || $E7["\164\171\160\145"] == "\160\x72\151\166\141\164\145")) {
                    goto gf;
                }
                $this->cryptParams["\x74\171\160\x65"] = $E7["\164\171\160\145"];
                goto pX;
                gf:
                hX:
                throw new Exception("\103\x65\x72\164\x69\x66\x69\x63\141\164\x65\x20\x22\x74\171\160\145\x22\40\x28\x70\x72\x69\x76\141\164\x65\57\x70\x75\142\x6c\151\x63\x29\40\155\165\163\164\40\x62\x65\40\160\141\x73\x73\145\x64\40\x76\x69\x61\40\160\141\x72\141\x6d\x65\x74\145\162\x73");
            case self::RSA_OAEP:
                $this->cryptParams["\x6c\x69\x62\162\141\x72\171"] = "\157\160\145\156\163\x73\x6c";
                $this->cryptParams["\160\x61\x64\x64\x69\x6e\x67"] = OPENSSL_PKCS1_OAEP_PADDING;
                $this->cryptParams["\x6d\145\x74\x68\157\144"] = "\150\x74\x74\160\72\57\x2f\x77\x77\x77\x2e\167\x33\x2e\157\x72\147\x2f\x32\60\60\x39\57\170\155\x6c\145\156\143\x31\x31\x23\x72\x73\x61\x2d\x6f\141\x65\x70";
                $this->cryptParams["\150\141\x73\x68"] = "\150\164\x74\160\x3a\57\57\x77\x77\x77\x2e\x77\63\56\x6f\x72\147\57\62\x30\60\71\57\x78\155\154\145\x6e\x63\x31\x31\x23\155\x67\x66\x31\163\150\x61\x31";
                if (!(is_array($E7) && !empty($E7["\164\x79\160\x65"]))) {
                    goto pl;
                }
                if (!($E7["\x74\x79\x70\x65"] == "\x70\x75\142\154\x69\x63" || $E7["\164\171\160\x65"] == "\x70\x72\151\166\141\164\x65")) {
                    goto pc;
                }
                $this->cryptParams["\164\171\160\x65"] = $E7["\x74\x79\160\145"];
                goto pX;
                pc:
                pl:
                throw new Exception("\103\145\x72\x74\151\x66\x69\143\141\x74\145\40\x22\x74\171\x70\145\x22\40\x28\160\x72\151\166\x61\164\x65\57\x70\165\x62\x6c\151\x63\51\40\155\x75\x73\x74\40\x62\145\x20\x70\141\163\x73\145\144\x20\166\x69\x61\x20\x70\x61\162\141\x6d\145\x74\x65\x72\x73");
            case self::RSA_SHA1:
                $this->cryptParams["\x6c\151\x62\x72\141\x72\171"] = "\x6f\x70\145\x6e\x73\163\x6c";
                $this->cryptParams["\155\x65\164\x68\x6f\144"] = "\x68\164\x74\160\x3a\x2f\x2f\167\x77\x77\x2e\167\63\x2e\x6f\x72\147\x2f\62\x30\x30\60\x2f\x30\x39\57\x78\x6d\154\x64\163\x69\147\43\162\x73\141\x2d\x73\x68\141\61";
                $this->cryptParams["\x70\141\x64\144\x69\156\x67"] = OPENSSL_PKCS1_PADDING;
                if (!(is_array($E7) && !empty($E7["\164\171\160\145"]))) {
                    goto M6;
                }
                if (!($E7["\164\171\160\145"] == "\160\165\142\x6c\x69\x63" || $E7["\164\171\160\145"] == "\x70\162\x69\166\x61\x74\x65")) {
                    goto Lo;
                }
                $this->cryptParams["\x74\x79\160\x65"] = $E7["\x74\171\160\145"];
                goto pX;
                Lo:
                M6:
                throw new Exception("\103\x65\162\x74\x69\146\151\143\141\164\145\40\42\164\171\160\x65\42\40\x28\160\x72\151\x76\141\164\145\57\x70\165\142\x6c\x69\x63\51\x20\155\x75\163\x74\x20\142\145\40\x70\141\x73\163\145\144\40\x76\x69\x61\x20\x70\x61\162\141\155\145\164\145\x72\163");
            case self::RSA_SHA256:
                $this->cryptParams["\154\151\142\x72\141\162\171"] = "\157\x70\145\x6e\163\163\x6c";
                $this->cryptParams["\x6d\x65\x74\x68\157\144"] = "\x68\164\x74\x70\x3a\x2f\57\167\x77\167\x2e\x77\63\56\x6f\x72\x67\57\62\60\x30\61\x2f\x30\x34\57\170\155\x6c\x64\x73\x69\147\55\x6d\x6f\162\x65\43\x72\x73\141\x2d\x73\x68\141\x32\x35\x36";
                $this->cryptParams["\x70\x61\x64\x64\x69\x6e\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x64\x69\x67\145\x73\x74"] = "\x53\110\x41\62\x35\66";
                if (!(is_array($E7) && !empty($E7["\164\x79\x70\145"]))) {
                    goto ID;
                }
                if (!($E7["\164\x79\160\145"] == "\160\x75\142\154\151\x63" || $E7["\x74\171\160\145"] == "\x70\x72\x69\166\141\x74\145")) {
                    goto mE;
                }
                $this->cryptParams["\x74\171\x70\145"] = $E7["\164\x79\160\x65"];
                goto pX;
                mE:
                ID:
                throw new Exception("\x43\x65\162\164\151\146\151\x63\141\164\145\40\42\x74\171\160\x65\42\x20\x28\x70\162\x69\166\x61\x74\145\57\x70\x75\142\154\151\x63\51\x20\x6d\165\163\x74\40\x62\x65\40\x70\x61\x73\x73\145\144\40\x76\151\x61\x20\x70\x61\162\x61\155\145\164\x65\162\163");
            case self::RSA_SHA384:
                $this->cryptParams["\x6c\151\142\x72\141\162\x79"] = "\157\x70\x65\x6e\x73\x73\x6c";
                $this->cryptParams["\x6d\x65\164\150\x6f\144"] = "\150\164\164\x70\72\57\57\167\167\167\x2e\167\x33\x2e\157\162\147\x2f\62\x30\60\61\57\x30\x34\x2f\170\x6d\154\144\163\151\147\55\x6d\x6f\x72\x65\x23\162\163\141\55\163\150\x61\63\x38\x34";
                $this->cryptParams["\160\141\144\144\x69\x6e\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x64\151\x67\x65\x73\164"] = "\x53\x48\101\x33\x38\64";
                if (!(is_array($E7) && !empty($E7["\x74\x79\x70\x65"]))) {
                    goto Ht;
                }
                if (!($E7["\164\x79\160\x65"] == "\160\x75\x62\154\x69\x63" || $E7["\164\171\x70\145"] == "\160\162\151\166\141\x74\x65")) {
                    goto Gs;
                }
                $this->cryptParams["\164\x79\x70\x65"] = $E7["\x74\171\x70\145"];
                goto pX;
                Gs:
                Ht:
                throw new Exception("\103\x65\x72\x74\x69\146\x69\143\x61\164\145\40\42\164\x79\160\145\42\40\x28\160\x72\x69\166\141\x74\145\x2f\x70\x75\x62\x6c\151\143\x29\40\x6d\165\x73\x74\x20\x62\145\x20\160\141\163\163\x65\x64\40\166\151\x61\40\x70\x61\x72\x61\155\145\x74\x65\x72\x73");
            case self::RSA_SHA512:
                $this->cryptParams["\154\151\x62\x72\141\162\x79"] = "\x6f\x70\x65\x6e\x73\x73\154";
                $this->cryptParams["\155\x65\x74\x68\157\144"] = "\150\164\x74\160\x3a\x2f\57\x77\x77\167\x2e\167\63\56\157\x72\147\x2f\x32\60\x30\x31\x2f\60\x34\x2f\170\x6d\154\x64\163\151\x67\x2d\155\x6f\162\145\43\162\x73\x61\55\x73\150\x61\65\x31\62";
                $this->cryptParams["\x70\141\x64\x64\151\156\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x64\x69\x67\145\163\x74"] = "\123\110\x41\x35\x31\62";
                if (!(is_array($E7) && !empty($E7["\164\x79\x70\x65"]))) {
                    goto rZ;
                }
                if (!($E7["\x74\171\x70\145"] == "\160\165\x62\x6c\151\x63" || $E7["\x74\x79\160\x65"] == "\x70\162\x69\166\x61\x74\x65")) {
                    goto WJ;
                }
                $this->cryptParams["\x74\171\160\x65"] = $E7["\164\x79\x70\145"];
                goto pX;
                WJ:
                rZ:
                throw new Exception("\x43\145\x72\164\x69\146\x69\143\x61\x74\x65\40\x22\x74\x79\x70\x65\x22\40\x28\160\162\x69\x76\x61\164\x65\x2f\x70\x75\142\154\151\x63\51\40\x6d\x75\163\164\40\x62\145\x20\160\141\x73\163\145\144\x20\166\151\x61\40\x70\141\162\x61\155\x65\x74\x65\162\x73");
            case self::HMAC_SHA1:
                $this->cryptParams["\x6c\151\142\x72\141\162\171"] = $YE;
                $this->cryptParams["\x6d\x65\x74\x68\x6f\x64"] = "\x68\x74\x74\x70\x3a\57\x2f\167\x77\167\56\x77\63\56\x6f\x72\147\x2f\62\60\60\60\57\x30\x39\x2f\x78\155\154\x64\x73\x69\x67\43\150\x6d\x61\x63\55\x73\150\x61\x31";
                goto pX;
            default:
                throw new Exception("\x49\x6e\x76\x61\x6c\151\144\40\113\x65\x79\x20\x54\171\160\x65");
        }
        iV:
        pX:
        $this->type = $YE;
    }
    public function getSymmetricKeySize()
    {
        if (!empty($this->cryptParams["\153\145\x79\x73\151\172\145"])) {
            goto Vs;
        }
        return null;
        Vs:
        return $this->cryptParams["\153\145\171\x73\151\x7a\x65"];
    }
    public function generateSessionKey()
    {
        if (!empty($this->cryptParams["\x6b\x65\171\x73\151\172\x65"])) {
            goto vY;
        }
        throw new Exception("\x55\156\153\156\x6f\x77\156\40\x6b\x65\x79\x20\163\151\x7a\x65\40\146\x6f\x72\x20\164\171\160\145\x20\x22" . $this->type . "\x22\x2e");
        vY:
        $ct = $this->cryptParams["\153\145\171\x73\x69\172\145"];
        $WO = openssl_random_pseudo_bytes($ct);
        if (!($this->type === self::TRIPLEDES_CBC)) {
            goto G2;
        }
        $lw = 0;
        DW:
        if (!($lw < strlen($WO))) {
            goto xS;
        }
        $hT = ord($WO[$lw]) & 0xfe;
        $hK = 1;
        $H2 = 1;
        B3:
        if (!($H2 < 8)) {
            goto WX;
        }
        $hK ^= $hT >> $H2 & 1;
        Wl:
        $H2++;
        goto B3;
        WX:
        $hT |= $hK;
        $WO[$lw] = chr($hT);
        BA:
        $lw++;
        goto DW;
        xS:
        G2:
        $this->key = $WO;
        return $WO;
    }
    public static function getRawThumbprint($zM)
    {
        $PF = explode("\xa", $zM);
        $h4 = '';
        $hG = false;
        foreach ($PF as $sc) {
            if (!$hG) {
                goto KL;
            }
            if (!(strncmp($sc, "\x2d\55\55\55\x2d\105\116\104\x20\x43\x45\122\x54\111\x46\111\x43\101\124\105", 20) == 0)) {
                goto vh;
            }
            goto un;
            vh:
            $h4 .= trim($sc);
            goto O5;
            KL:
            if (!(strncmp($sc, "\55\x2d\55\55\x2d\102\x45\107\x49\x4e\40\103\x45\122\124\x49\106\x49\x43\x41\124\x45", 22) == 0)) {
                goto mV;
            }
            $hG = true;
            mV:
            O5:
            Ro:
        }
        un:
        if (empty($h4)) {
            goto W6;
        }
        return strtolower(sha1(base64_decode($h4)));
        W6:
        return null;
    }
    public function loadKey($WO, $ja = false, $Nw = false)
    {
        if ($ja) {
            goto ur;
        }
        $this->key = $WO;
        goto Yn;
        ur:
        $this->key = file_get_contents($WO);
        Yn:
        if ($Nw) {
            goto mZ;
        }
        $this->x509Certificate = null;
        goto a6;
        mZ:
        $this->key = openssl_x509_read($this->key);
        openssl_x509_export($this->key, $Wd);
        $this->x509Certificate = $Wd;
        $this->key = $Wd;
        a6:
        if (!($this->cryptParams["\154\x69\142\x72\x61\x72\171"] == "\x6f\x70\145\x6e\x73\163\154")) {
            goto gw;
        }
        switch ($this->cryptParams["\x74\x79\160\x65"]) {
            case "\160\x75\142\154\151\x63":
                if (!$Nw) {
                    goto z1;
                }
                $this->X509Thumbprint = self::getRawThumbprint($this->key);
                z1:
                $this->key = openssl_get_publickey($this->key);
                if ($this->key) {
                    goto TU;
                }
                throw new Exception("\x55\x6e\x61\x62\154\145\x20\x74\x6f\x20\x65\170\x74\162\x61\143\x74\x20\160\x75\x62\x6c\x69\143\40\x6b\x65\171");
                TU:
                goto vJ;
            case "\x70\162\151\x76\x61\x74\145":
                $this->key = openssl_get_privatekey($this->key, $this->passphrase);
                goto vJ;
            case "\x73\x79\155\x6d\145\x74\162\x69\x63":
                if (!(strlen($this->key) < $this->cryptParams["\153\145\x79\163\151\172\145"])) {
                    goto qQ;
                }
                throw new Exception("\x4b\x65\171\x20\x6d\165\163\164\40\x63\157\156\164\x61\x69\156\40\x61\x74\40\154\x65\x61\x73\164\40" . $this->cryptParams["\153\145\171\163\151\172\x65"] . "\40\143\150\x61\162\141\x63\x74\145\x72\163\40\146\x6f\x72\40\x74\150\x69\163\40\143\151\x70\150\145\x72\x2c\40\143\x6f\x6e\164\x61\151\x6e\163\40" . strlen($this->key));
                qQ:
                goto vJ;
            default:
                throw new Exception("\x55\x6e\153\x6e\x6f\x77\x6e\x20\x74\171\160\x65");
        }
        kp:
        vJ:
        gw:
    }
    private function padISO10126($h4, $Wx)
    {
        if (!($Wx > 256)) {
            goto Yq;
        }
        throw new Exception("\x42\x6c\x6f\x63\x6b\40\163\151\172\145\x20\x68\151\x67\150\145\162\40\164\x68\x61\x6e\40\62\65\x36\40\x6e\157\164\x20\141\154\154\157\x77\x65\x64");
        Yq:
        $u8 = $Wx - strlen($h4) % $Wx;
        $JO = chr($u8);
        return $h4 . str_repeat($JO, $u8);
    }
    private function unpadISO10126($h4)
    {
        $u8 = substr($h4, -1);
        $DW = ord($u8);
        return substr($h4, 0, -$DW);
    }
    private function encryptSymmetric($h4)
    {
        $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cryptParams["\x63\151\160\x68\x65\x72"]));
        $Zp = null;
        if (in_array($this->cryptParams["\x63\151\x70\150\x65\162"], ["\141\x65\x73\x2d\x31\x32\70\55\x67\143\155", "\141\145\x73\55\61\71\62\55\x67\x63\x6d", "\x61\145\163\x2d\x32\65\66\55\147\143\155"])) {
            goto t3;
        }
        $h4 = $this->padISO10126($h4, $this->cryptParams["\142\x6c\157\x63\153\163\x69\x7a\145"]);
        $xK = openssl_encrypt($h4, $this->cryptParams["\x63\151\x70\x68\x65\x72"], $this->key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $this->iv);
        goto Uq;
        t3:
        if (!(version_compare(PHP_VERSION, "\67\x2e\x31\x2e\60") < 0)) {
            goto rT;
        }
        throw new Exception("\120\110\x50\40\67\x2e\61\56\x30\40\151\163\40\162\x65\x71\x75\x69\162\145\144\40\x74\157\x20\165\163\145\40\x41\x45\123\40\x47\103\x4d\40\141\154\x67\157\162\x69\x74\150\155\x73");
        rT:
        $Zp = openssl_random_pseudo_bytes(self::AUTHTAG_LENGTH);
        $xK = openssl_encrypt($h4, $this->cryptParams["\143\x69\x70\150\145\162"], $this->key, OPENSSL_RAW_DATA, $this->iv, $Zp);
        Uq:
        if (!(false === $xK)) {
            goto f0;
        }
        throw new Exception("\106\x61\151\154\x75\x72\x65\40\x65\x6e\143\x72\171\x70\x74\151\156\147\x20\104\x61\164\141\x20\50\157\160\x65\x6e\163\163\154\40\163\171\155\155\x65\164\162\x69\x63\x29\x20\55\40" . openssl_error_string());
        f0:
        return $this->iv . $xK . $Zp;
    }
    private function decryptSymmetric($h4)
    {
        $SX = openssl_cipher_iv_length($this->cryptParams["\143\151\160\x68\145\162"]);
        $this->iv = substr($h4, 0, $SX);
        $h4 = substr($h4, $SX);
        $Zp = null;
        if (in_array($this->cryptParams["\143\x69\x70\x68\145\x72"], ["\141\x65\163\x2d\x31\x32\x38\x2d\147\143\x6d", "\141\145\163\x2d\61\x39\x32\55\x67\143\x6d", "\141\x65\x73\55\62\65\66\x2d\147\x63\155"])) {
            goto Un;
        }
        $dK = openssl_decrypt($h4, $this->cryptParams["\143\x69\160\x68\x65\162"], $this->key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $this->iv);
        goto jd;
        Un:
        if (!(version_compare(PHP_VERSION, "\67\56\61\x2e\x30") < 0)) {
            goto YM;
        }
        throw new Exception("\120\x48\120\40\x37\56\x31\x2e\60\40\151\x73\40\162\145\161\x75\151\x72\145\x64\40\x74\x6f\x20\x75\x73\145\40\x41\x45\123\x20\x47\103\115\40\141\154\x67\157\162\151\x74\150\x6d\163");
        YM:
        $dT = 0 - self::AUTHTAG_LENGTH;
        $Zp = substr($h4, $dT);
        $h4 = substr($h4, 0, $dT);
        $dK = openssl_decrypt($h4, $this->cryptParams["\143\x69\160\150\x65\x72"], $this->key, OPENSSL_RAW_DATA, $this->iv, $Zp);
        jd:
        if (!(false === $dK)) {
            goto fo;
        }
        throw new Exception("\x46\141\x69\154\165\x72\145\x20\x64\x65\143\x72\171\160\x74\x69\x6e\x67\40\104\x61\x74\x61\40\x28\157\x70\145\156\x73\x73\x6c\40\x73\171\155\155\x65\x74\x72\151\143\x29\40\55\x20" . openssl_error_string());
        fo:
        return null !== $Zp ? $dK : $this->unpadISO10126($dK);
    }
    private function encryptPublic($h4)
    {
        if (openssl_public_encrypt($h4, $xK, $this->key, $this->cryptParams["\x70\x61\x64\144\x69\156\147"])) {
            goto aN;
        }
        throw new Exception("\x46\x61\151\x6c\x75\162\x65\x20\145\x6e\143\x72\171\160\x74\x69\x6e\x67\x20\x44\141\x74\x61\40\50\157\x70\145\x6e\163\163\x6c\x20\x70\x75\142\154\151\x63\x29\40\x2d\40" . openssl_error_string());
        aN:
        return $xK;
    }
    private function decryptPublic($h4)
    {
        if (openssl_public_decrypt($h4, $dK, $this->key, $this->cryptParams["\x70\x61\x64\144\x69\156\x67"])) {
            goto w9;
        }
        throw new Exception("\x46\141\x69\x6c\x75\x72\x65\40\144\x65\x63\162\x79\x70\x74\x69\156\147\40\x44\141\164\141\40\50\157\160\145\x6e\x73\163\x6c\x20\160\x75\x62\154\x69\143\51\40\55\x20" . openssl_error_string());
        w9:
        return $dK;
    }
    private function encryptPrivate($h4)
    {
        if (openssl_private_encrypt($h4, $xK, $this->key, $this->cryptParams["\160\x61\x64\x64\x69\156\147"])) {
            goto ug;
        }
        throw new Exception("\106\x61\x69\154\165\162\x65\40\145\156\143\162\171\x70\x74\x69\x6e\x67\40\x44\141\164\x61\x20\x28\x6f\x70\145\x6e\x73\x73\154\40\160\x72\151\166\141\x74\145\51\40\x2d\40" . openssl_error_string());
        ug:
        return $xK;
    }
    private function decryptPrivate($h4)
    {
        if (openssl_private_decrypt($h4, $dK, $this->key, $this->cryptParams["\160\141\x64\144\151\156\x67"])) {
            goto Zk;
        }
        throw new Exception("\x46\141\151\154\x75\162\145\40\x64\x65\143\162\x79\160\x74\151\156\x67\40\x44\141\x74\141\40\50\x6f\160\145\156\163\163\x6c\x20\x70\x72\151\166\141\164\x65\51\x20\55\x20" . openssl_error_string());
        Zk:
        return $dK;
    }
    private function signOpenSSL($h4)
    {
        $yu = OPENSSL_ALGO_SHA1;
        if (empty($this->cryptParams["\144\x69\147\x65\163\164"])) {
            goto wr;
        }
        $yu = $this->cryptParams["\x64\151\x67\x65\x73\164"];
        wr:
        if (openssl_sign($h4, $MA, $this->key, $yu)) {
            goto QH;
        }
        throw new Exception("\106\141\151\154\165\162\145\x20\123\151\147\x6e\151\156\x67\x20\104\x61\x74\x61\72\40" . openssl_error_string() . "\x20\x2d\x20" . $yu);
        QH:
        return $MA;
    }
    private function verifyOpenSSL($h4, $MA)
    {
        $yu = OPENSSL_ALGO_SHA1;
        if (empty($this->cryptParams["\x64\x69\x67\x65\x73\x74"])) {
            goto V1;
        }
        $yu = $this->cryptParams["\x64\151\x67\x65\x73\164"];
        V1:
        return openssl_verify($h4, $MA, $this->key, $yu);
    }
    public function encryptData($h4)
    {
        if (!($this->cryptParams["\x6c\151\142\162\141\162\171"] === "\x6f\160\x65\156\163\x73\x6c")) {
            goto K6;
        }
        switch ($this->cryptParams["\164\171\x70\x65"]) {
            case "\163\x79\155\155\x65\x74\x72\151\143":
                return $this->encryptSymmetric($h4);
            case "\x70\165\142\x6c\151\x63":
                return $this->encryptPublic($h4);
            case "\160\162\x69\166\x61\164\x65":
                return $this->encryptPrivate($h4);
        }
        Er:
        mx:
        K6:
    }
    public function decryptData($h4)
    {
        if (!($this->cryptParams["\x6c\x69\142\x72\x61\162\171"] === "\157\x70\145\156\x73\x73\x6c")) {
            goto aJ;
        }
        switch ($this->cryptParams["\164\x79\x70\x65"]) {
            case "\x73\171\155\x6d\145\x74\162\x69\x63":
                return $this->decryptSymmetric($h4);
            case "\160\165\142\x6c\x69\143":
                return $this->decryptPublic($h4);
            case "\x70\x72\x69\x76\141\x74\145":
                return $this->decryptPrivate($h4);
        }
        PH:
        cl:
        aJ:
    }
    public function signData($h4)
    {
        switch ($this->cryptParams["\154\x69\142\x72\141\x72\x79"]) {
            case "\157\x70\145\x6e\x73\163\x6c":
                return $this->signOpenSSL($h4);
            case self::HMAC_SHA1:
                return hash_hmac("\x73\x68\x61\x31", $h4, $this->key, true);
        }
        OC:
        E3:
    }
    public function verifySignature($h4, $MA)
    {
        switch ($this->cryptParams["\x6c\151\142\162\x61\x72\x79"]) {
            case "\x6f\160\145\156\x73\163\154":
                return $this->verifyOpenSSL($h4, $MA);
            case self::HMAC_SHA1:
                $YP = hash_hmac("\163\x68\141\61", $h4, $this->key, true);
                return strcmp($MA, $YP) == 0;
        }
        Cm:
        Oj:
    }
    public function getAlgorith()
    {
        return $this->getAlgorithm();
    }
    public function getAlgorithm()
    {
        return $this->cryptParams["\x6d\145\164\150\157\x64"];
    }
    public static function makeAsnSegment($YE, $rd)
    {
        switch ($YE) {
            case 0x2:
                if (!(ord($rd) > 0x7f)) {
                    goto TN;
                }
                $rd = chr(0) . $rd;
                TN:
                goto Au;
            case 0x3:
                $rd = chr(0) . $rd;
                goto Au;
        }
        pa:
        Au:
        $PB = strlen($rd);
        if ($PB < 128) {
            goto zF;
        }
        if ($PB < 0x100) {
            goto xE;
        }
        if ($PB < 0x10000) {
            goto FS;
        }
        $WW = null;
        goto Aw;
        FS:
        $WW = sprintf("\x25\x63\x25\143\x25\143\x25\x63\45\163", $YE, 0x82, $PB / 0x100, $PB % 0x100, $rd);
        Aw:
        goto WP;
        xE:
        $WW = sprintf("\x25\143\45\143\x25\x63\45\x73", $YE, 0x81, $PB, $rd);
        WP:
        goto jZ;
        zF:
        $WW = sprintf("\x25\x63\x25\143\45\163", $YE, $PB, $rd);
        jZ:
        return $WW;
    }
    public static function convertRSA($Sn, $k6)
    {
        $k3 = self::makeAsnSegment(0x2, $k6);
        $IA = self::makeAsnSegment(0x2, $Sn);
        $Se = self::makeAsnSegment(0x30, $IA . $k3);
        $wr = self::makeAsnSegment(0x3, $Se);
        $HT = pack("\x48\52", "\63\x30\x30\104\60\x36\60\x39\62\x41\70\66\64\x38\70\x36\x46\67\60\x44\60\61\60\61\60\x31\60\65\x30\x30");
        $pl = self::makeAsnSegment(0x30, $HT . $wr);
        $oq = base64_encode($pl);
        $uP = "\55\55\55\x2d\55\102\x45\x47\111\x4e\40\120\125\102\x4c\111\103\40\x4b\105\x59\x2d\x2d\55\x2d\55\12";
        $dT = 0;
        gu:
        if (!($mJ = substr($oq, $dT, 64))) {
            goto PE;
        }
        $uP = $uP . $mJ . "\12";
        $dT += 64;
        goto gu;
        PE:
        return $uP . "\55\x2d\55\55\55\105\x4e\x44\40\x50\125\x42\114\x49\103\40\113\105\x59\55\x2d\55\55\x2d\xa";
    }
    public function serializeKey($Lb)
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
    public static function fromEncryptedKeyElement(DOMElement $SS)
    {
        $Nn = new XMLSecEnc();
        $Nn->setNode($SS);
        if ($Mj = $Nn->locateKey()) {
            goto z8;
        }
        throw new Exception("\x55\x6e\x61\x62\154\145\40\164\157\40\154\x6f\143\141\164\x65\40\x61\x6c\x67\157\162\151\x74\x68\x6d\40\x66\x6f\162\x20\x74\x68\151\x73\x20\x45\156\x63\x72\171\x70\x74\145\144\40\x4b\145\171");
        z8:
        $Mj->isEncrypted = true;
        $Mj->encryptedCtx = $Nn;
        XMLSecEnc::staticLocateKeyInfo($Mj, $SS);
        return $Mj;
    }
}
