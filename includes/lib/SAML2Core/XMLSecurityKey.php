<?php


namespace RobRichards\XMLSecLibs;

use DOMElement;
use Exception;
class XMLSecurityKey
{
    const TRIPLEDES_CBC = "\x68\164\x74\x70\x3a\57\57\x77\x77\167\56\x77\63\56\157\x72\147\57\62\x30\x30\x31\57\60\x34\57\x78\x6d\x6c\145\x6e\143\43\x74\x72\x69\x70\154\x65\x64\x65\163\x2d\143\x62\x63";
    const AES128_CBC = "\x68\164\164\160\x3a\57\57\x77\167\167\x2e\x77\x33\56\157\x72\147\x2f\62\x30\x30\x31\57\60\x34\57\x78\155\154\x65\x6e\143\43\x61\x65\163\61\x32\70\55\143\142\x63";
    const AES192_CBC = "\x68\x74\164\x70\72\x2f\x2f\167\167\x77\56\x77\x33\56\x6f\162\x67\x2f\62\60\x30\61\57\x30\64\x2f\170\x6d\x6c\145\156\143\x23\x61\145\163\61\71\62\55\143\142\x63";
    const AES256_CBC = "\150\x74\x74\x70\72\57\x2f\167\167\167\56\167\x33\x2e\157\x72\147\x2f\62\60\x30\x31\x2f\x30\64\x2f\170\x6d\154\x65\156\x63\43\141\x65\x73\62\x35\x36\55\x63\142\143";
    const AES128_GCM = "\x68\x74\164\x70\72\x2f\x2f\167\167\167\x2e\167\63\56\157\162\147\x2f\62\x30\60\71\x2f\x78\x6d\x6c\x65\156\143\61\x31\43\x61\x65\x73\61\x32\x38\55\147\x63\155";
    const AES192_GCM = "\x68\x74\164\x70\72\x2f\x2f\167\x77\x77\56\167\63\x2e\157\162\147\x2f\x32\x30\60\71\57\170\155\154\x65\x6e\x63\61\61\43\141\145\163\x31\71\62\55\147\143\x6d";
    const AES256_GCM = "\x68\x74\x74\x70\72\57\x2f\167\x77\167\x2e\x77\63\x2e\157\162\x67\x2f\x32\60\60\x39\x2f\170\155\154\x65\156\x63\x31\x31\43\x61\x65\163\x32\65\x36\55\x67\x63\x6d";
    const RSA_1_5 = "\150\164\164\160\x3a\x2f\x2f\167\x77\x77\x2e\x77\63\56\157\x72\147\57\62\60\60\x31\x2f\60\x34\57\170\155\x6c\x65\x6e\x63\x23\162\x73\x61\x2d\x31\137\65";
    const RSA_OAEP_MGF1P = "\150\164\x74\x70\72\x2f\x2f\x77\167\x77\x2e\167\x33\56\x6f\162\147\x2f\62\x30\60\x31\x2f\60\64\57\170\155\154\x65\x6e\x63\x23\x72\x73\x61\55\x6f\141\145\160\x2d\x6d\x67\x66\61\160";
    const RSA_OAEP = "\x68\x74\x74\160\72\57\x2f\x77\x77\167\56\167\63\56\157\x72\x67\57\62\60\60\x39\x2f\170\x6d\x6c\x65\156\x63\x31\61\x23\x72\163\141\55\157\141\145\x70";
    const DSA_SHA1 = "\x68\164\164\160\x3a\57\x2f\x77\x77\167\x2e\x77\x33\56\157\162\147\57\62\x30\x30\60\57\x30\x39\x2f\x78\155\x6c\144\163\x69\x67\43\144\x73\x61\x2d\163\x68\x61\61";
    const RSA_SHA1 = "\x68\x74\x74\160\72\x2f\x2f\x77\167\x77\56\167\63\x2e\x6f\162\147\x2f\62\x30\60\x30\x2f\x30\71\x2f\x78\155\154\x64\163\151\147\43\162\163\x61\55\163\x68\x61\x31";
    const RSA_SHA256 = "\x68\x74\x74\x70\x3a\x2f\x2f\167\167\167\56\167\63\56\x6f\162\147\x2f\x32\x30\x30\61\x2f\x30\64\57\170\x6d\x6c\144\163\x69\147\x2d\155\157\x72\x65\x23\162\163\x61\x2d\x73\150\141\x32\65\66";
    const RSA_SHA384 = "\x68\164\x74\x70\72\57\57\167\167\x77\56\167\x33\x2e\x6f\x72\147\x2f\x32\60\60\x31\x2f\x30\64\x2f\x78\x6d\154\x64\163\151\x67\x2d\155\x6f\x72\145\x23\162\163\x61\55\163\x68\141\63\x38\x34";
    const RSA_SHA512 = "\150\x74\x74\160\72\x2f\x2f\167\x77\x77\x2e\x77\63\56\x6f\x72\x67\57\x32\60\60\61\x2f\60\x34\57\170\x6d\x6c\144\163\x69\x67\55\x6d\x6f\162\x65\x23\x72\x73\x61\x2d\x73\x68\x61\x35\61\62";
    const HMAC_SHA1 = "\x68\164\x74\x70\x3a\57\57\x77\x77\167\x2e\167\63\56\x6f\x72\147\x2f\x32\60\x30\x30\x2f\60\x39\x2f\170\155\x6c\144\x73\151\x67\x23\x68\x6d\x61\143\x2d\x73\150\x61\x31";
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
    public function __construct($dQ, $ht = null)
    {
        switch ($dQ) {
            case self::TRIPLEDES_CBC:
                $this->cryptParams["\154\151\x62\x72\141\x72\171"] = "\x6f\x70\x65\156\x73\163\154";
                $this->cryptParams["\x63\151\160\x68\x65\x72"] = "\x64\145\163\x2d\145\x64\145\x33\x2d\143\x62\143";
                $this->cryptParams["\x74\x79\x70\x65"] = "\x73\x79\155\155\145\x74\x72\x69\143";
                $this->cryptParams["\155\x65\164\x68\x6f\144"] = "\x68\x74\x74\160\x3a\x2f\57\x77\x77\167\56\x77\63\x2e\x6f\162\147\57\x32\x30\60\x31\x2f\x30\64\x2f\x78\x6d\x6c\145\156\x63\x23\x74\x72\x69\160\154\145\144\145\x73\55\143\x62\143";
                $this->cryptParams["\153\x65\171\x73\x69\x7a\145"] = 24;
                $this->cryptParams["\142\x6c\x6f\x63\153\x73\x69\172\x65"] = 8;
                goto kMn;
            case self::AES128_CBC:
                $this->cryptParams["\x6c\151\x62\162\141\x72\171"] = "\x6f\x70\145\x6e\x73\x73\x6c";
                $this->cryptParams["\143\x69\x70\150\145\162"] = "\141\x65\163\55\x31\62\x38\x2d\143\x62\x63";
                $this->cryptParams["\164\x79\x70\x65"] = "\x73\x79\x6d\155\x65\164\162\x69\x63";
                $this->cryptParams["\x6d\x65\164\x68\x6f\x64"] = "\150\x74\x74\160\x3a\x2f\x2f\x77\x77\167\56\167\x33\56\157\162\147\57\x32\60\60\61\57\x30\x34\57\170\x6d\x6c\x65\156\143\43\x61\145\x73\x31\62\x38\x2d\143\142\143";
                $this->cryptParams["\x6b\x65\x79\163\151\x7a\x65"] = 16;
                $this->cryptParams["\142\154\x6f\143\x6b\163\x69\x7a\x65"] = 16;
                goto kMn;
            case self::AES192_CBC:
                $this->cryptParams["\x6c\151\142\x72\141\162\171"] = "\157\160\145\x6e\x73\x73\x6c";
                $this->cryptParams["\143\151\160\x68\145\x72"] = "\x61\x65\163\55\61\x39\x32\55\143\142\x63";
                $this->cryptParams["\164\171\160\x65"] = "\163\x79\x6d\155\145\164\x72\x69\x63";
                $this->cryptParams["\155\x65\164\150\x6f\x64"] = "\150\x74\x74\x70\x3a\x2f\57\x77\x77\x77\x2e\167\x33\x2e\x6f\x72\x67\57\62\60\x30\61\57\x30\x34\x2f\x78\x6d\154\x65\156\x63\x23\141\145\x73\x31\x39\x32\x2d\x63\142\143";
                $this->cryptParams["\153\145\x79\x73\x69\172\x65"] = 24;
                $this->cryptParams["\142\154\157\143\153\163\x69\172\x65"] = 16;
                goto kMn;
            case self::AES256_CBC:
                $this->cryptParams["\154\x69\142\162\x61\162\x79"] = "\157\160\x65\156\163\163\154";
                $this->cryptParams["\x63\151\160\x68\145\162"] = "\x61\x65\x73\55\62\65\66\55\143\142\x63";
                $this->cryptParams["\x74\171\x70\145"] = "\x73\x79\155\155\x65\164\162\151\143";
                $this->cryptParams["\155\145\164\150\157\x64"] = "\x68\x74\164\x70\72\57\x2f\x77\167\167\x2e\167\x33\x2e\157\x72\x67\57\62\x30\60\61\x2f\x30\64\x2f\170\155\x6c\145\x6e\x63\43\x61\145\163\x32\x35\66\55\143\142\143";
                $this->cryptParams["\x6b\145\171\163\151\x7a\x65"] = 32;
                $this->cryptParams["\x62\154\x6f\x63\153\x73\x69\x7a\x65"] = 16;
                goto kMn;
            case self::AES128_GCM:
                $this->cryptParams["\154\151\x62\x72\141\162\171"] = "\x6f\160\145\156\163\x73\x6c";
                $this->cryptParams["\143\151\160\x68\145\162"] = "\x61\145\x73\55\61\62\x38\55\147\143\155";
                $this->cryptParams["\x74\x79\160\145"] = "\163\171\155\x6d\145\164\162\151\143";
                $this->cryptParams["\155\145\x74\150\157\x64"] = "\x68\164\164\160\x3a\57\x2f\x77\167\167\56\167\63\56\x6f\x72\x67\57\62\x30\x30\x39\x2f\170\155\154\x65\x6e\x63\x31\x31\43\x61\x65\163\61\62\70\55\147\143\155";
                $this->cryptParams["\153\145\171\x73\x69\x7a\145"] = 16;
                $this->cryptParams["\x62\154\157\143\153\163\151\x7a\x65"] = 16;
                goto kMn;
            case self::AES192_GCM:
                $this->cryptParams["\154\x69\x62\162\141\x72\171"] = "\x6f\160\x65\156\x73\x73\x6c";
                $this->cryptParams["\x63\151\160\150\145\162"] = "\141\x65\x73\55\61\x39\62\x2d\x67\143\x6d";
                $this->cryptParams["\x74\171\x70\145"] = "\x73\171\x6d\x6d\x65\164\162\x69\143";
                $this->cryptParams["\155\x65\164\150\157\144"] = "\150\x74\164\160\72\x2f\57\167\167\167\x2e\167\x33\x2e\x6f\x72\x67\57\62\60\60\x39\57\170\x6d\154\145\156\143\x31\61\43\141\x65\163\61\x39\x32\55\x67\x63\155";
                $this->cryptParams["\153\x65\x79\x73\151\x7a\x65"] = 24;
                $this->cryptParams["\x62\154\x6f\143\x6b\x73\151\172\x65"] = 16;
                goto kMn;
            case self::AES256_GCM:
                $this->cryptParams["\154\151\x62\162\141\162\x79"] = "\x6f\x70\x65\156\x73\163\154";
                $this->cryptParams["\x63\151\160\150\x65\162"] = "\141\145\163\x2d\62\x35\66\55\147\143\x6d";
                $this->cryptParams["\x74\x79\x70\x65"] = "\163\x79\155\155\145\x74\x72\151\143";
                $this->cryptParams["\155\x65\164\150\157\144"] = "\150\x74\164\160\72\57\57\167\x77\167\56\167\63\x2e\157\x72\x67\x2f\62\x30\x30\x39\x2f\170\x6d\x6c\145\156\x63\x31\61\x23\x61\x65\163\62\x35\x36\x2d\x67\x63\155";
                $this->cryptParams["\153\x65\171\x73\x69\172\145"] = 32;
                $this->cryptParams["\x62\154\x6f\x63\153\163\x69\x7a\145"] = 16;
                goto kMn;
            case self::RSA_1_5:
                $this->cryptParams["\154\151\142\162\141\x72\x79"] = "\157\x70\145\x6e\163\x73\x6c";
                $this->cryptParams["\160\141\144\144\151\x6e\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x6d\145\164\150\157\x64"] = "\x68\x74\164\160\72\x2f\x2f\167\x77\x77\x2e\167\x33\56\x6f\x72\147\57\x32\x30\60\x31\57\x30\x34\x2f\170\x6d\154\x65\156\143\43\162\163\141\x2d\x31\x5f\x35";
                if (!(is_array($ht) && !empty($ht["\x74\x79\x70\x65"]))) {
                    goto A23;
                }
                if (!($ht["\x74\171\160\145"] == "\x70\165\142\154\x69\143" || $ht["\x74\171\160\145"] == "\x70\162\x69\x76\141\164\145")) {
                    goto e2J;
                }
                $this->cryptParams["\x74\x79\x70\145"] = $ht["\x74\171\x70\x65"];
                goto kMn;
                e2J:
                A23:
                throw new Exception("\103\145\162\164\151\146\x69\x63\x61\x74\x65\x20\x22\164\x79\x70\x65\42\40\50\x70\162\x69\166\x61\x74\x65\x2f\x70\165\x62\x6c\151\x63\51\x20\x6d\x75\163\x74\40\x62\145\40\x70\x61\x73\x73\x65\144\x20\166\x69\141\40\160\141\x72\141\155\145\x74\145\x72\x73");
            case self::RSA_OAEP_MGF1P:
                $this->cryptParams["\154\x69\x62\x72\141\162\x79"] = "\x6f\x70\145\156\x73\163\x6c";
                $this->cryptParams["\160\x61\x64\144\151\x6e\147"] = OPENSSL_PKCS1_OAEP_PADDING;
                $this->cryptParams["\x6d\x65\164\x68\157\x64"] = "\150\x74\x74\160\x3a\x2f\57\167\167\x77\56\x77\63\56\157\162\x67\57\x32\60\60\61\57\x30\64\x2f\170\155\154\x65\156\143\43\x72\163\x61\x2d\x6f\x61\145\x70\x2d\x6d\147\x66\x31\x70";
                $this->cryptParams["\x68\x61\x73\x68"] = null;
                if (!(is_array($ht) && !empty($ht["\x74\171\160\145"]))) {
                    goto oNJ;
                }
                if (!($ht["\164\171\160\x65"] == "\x70\165\x62\154\x69\x63" || $ht["\164\x79\x70\x65"] == "\x70\x72\151\x76\141\164\145")) {
                    goto H5G;
                }
                $this->cryptParams["\164\171\160\145"] = $ht["\x74\x79\160\x65"];
                goto kMn;
                H5G:
                oNJ:
                throw new Exception("\103\x65\x72\x74\x69\146\x69\143\141\x74\145\40\x22\164\171\x70\145\x22\x20\x28\x70\162\x69\x76\x61\x74\145\57\x70\x75\x62\x6c\151\x63\x29\40\155\x75\x73\x74\x20\x62\145\x20\x70\x61\163\163\145\x64\40\x76\x69\x61\40\x70\141\162\141\x6d\x65\x74\145\162\x73");
            case self::RSA_OAEP:
                $this->cryptParams["\x6c\x69\142\162\141\162\x79"] = "\157\160\x65\156\x73\x73\154";
                $this->cryptParams["\160\x61\144\x64\x69\x6e\147"] = OPENSSL_PKCS1_OAEP_PADDING;
                $this->cryptParams["\155\145\x74\150\157\144"] = "\150\x74\164\x70\72\57\57\x77\x77\x77\x2e\x77\x33\56\x6f\162\147\x2f\62\60\x30\71\x2f\170\x6d\154\x65\x6e\143\61\x31\43\x72\x73\x61\55\157\141\x65\160";
                $this->cryptParams["\150\x61\x73\x68"] = "\150\164\x74\x70\72\x2f\57\x77\x77\167\x2e\x77\63\56\157\x72\147\x2f\x32\x30\x30\x39\x2f\170\x6d\154\145\156\x63\61\61\x23\x6d\x67\146\x31\x73\150\141\61";
                if (!(is_array($ht) && !empty($ht["\x74\x79\x70\145"]))) {
                    goto hKM;
                }
                if (!($ht["\164\x79\160\x65"] == "\160\x75\142\154\151\x63" || $ht["\164\171\x70\x65"] == "\x70\x72\151\166\x61\164\145")) {
                    goto g1k;
                }
                $this->cryptParams["\164\171\x70\x65"] = $ht["\x74\x79\160\x65"];
                goto kMn;
                g1k:
                hKM:
                throw new Exception("\x43\x65\162\164\151\x66\x69\x63\141\x74\145\x20\42\x74\x79\160\145\42\40\50\x70\x72\x69\x76\141\x74\x65\x2f\x70\165\142\154\x69\x63\x29\x20\x6d\x75\x73\x74\x20\x62\x65\40\160\x61\x73\163\145\144\40\x76\151\141\40\160\x61\x72\141\x6d\145\164\x65\x72\163");
            case self::RSA_SHA1:
                $this->cryptParams["\x6c\151\x62\x72\141\x72\x79"] = "\x6f\160\145\156\x73\163\154";
                $this->cryptParams["\155\145\x74\x68\157\144"] = "\150\164\x74\160\72\x2f\57\x77\167\x77\x2e\x77\x33\x2e\157\x72\147\57\x32\x30\60\x30\x2f\60\71\x2f\170\155\x6c\144\163\151\x67\43\162\163\141\x2d\163\150\141\61";
                $this->cryptParams["\160\x61\x64\x64\151\156\147"] = OPENSSL_PKCS1_PADDING;
                if (!(is_array($ht) && !empty($ht["\164\171\160\x65"]))) {
                    goto GVn;
                }
                if (!($ht["\164\171\160\x65"] == "\160\165\142\x6c\151\x63" || $ht["\164\171\160\145"] == "\x70\162\x69\x76\141\164\x65")) {
                    goto jPo;
                }
                $this->cryptParams["\x74\171\x70\x65"] = $ht["\x74\x79\x70\x65"];
                goto kMn;
                jPo:
                GVn:
                throw new Exception("\x43\145\x72\x74\x69\x66\151\x63\x61\164\145\40\42\x74\171\x70\145\42\40\x28\160\162\151\166\141\x74\x65\x2f\160\165\142\154\x69\x63\51\40\155\x75\x73\x74\x20\142\145\40\160\x61\163\163\145\x64\x20\166\151\141\40\x70\141\162\141\x6d\145\x74\x65\x72\163");
            case self::RSA_SHA256:
                $this->cryptParams["\154\x69\x62\162\x61\162\x79"] = "\x6f\x70\145\x6e\x73\x73\x6c";
                $this->cryptParams["\x6d\145\x74\150\x6f\x64"] = "\150\x74\164\x70\x3a\x2f\57\x77\x77\167\x2e\x77\x33\x2e\157\162\x67\57\62\x30\x30\61\57\x30\64\57\x78\x6d\154\x64\x73\151\147\x2d\155\x6f\x72\x65\x23\162\x73\x61\55\x73\x68\x61\x32\65\66";
                $this->cryptParams["\160\141\x64\x64\x69\x6e\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\144\x69\147\145\x73\x74"] = "\x53\x48\101\62\65\66";
                if (!(is_array($ht) && !empty($ht["\x74\171\160\x65"]))) {
                    goto ugd;
                }
                if (!($ht["\x74\171\x70\x65"] == "\x70\x75\142\x6c\151\x63" || $ht["\164\x79\x70\x65"] == "\160\162\151\166\141\164\145")) {
                    goto GDj;
                }
                $this->cryptParams["\x74\x79\160\145"] = $ht["\x74\171\160\145"];
                goto kMn;
                GDj:
                ugd:
                throw new Exception("\x43\x65\x72\x74\151\146\x69\x63\141\164\145\x20\42\164\171\x70\x65\42\x20\50\x70\x72\x69\x76\141\x74\145\57\x70\x75\x62\x6c\x69\x63\x29\40\155\x75\x73\164\40\142\x65\x20\x70\141\x73\163\x65\x64\x20\166\x69\x61\x20\x70\x61\162\141\x6d\145\164\x65\162\x73");
            case self::RSA_SHA384:
                $this->cryptParams["\154\x69\x62\162\141\x72\171"] = "\x6f\x70\x65\156\163\163\x6c";
                $this->cryptParams["\x6d\x65\x74\150\157\144"] = "\150\164\x74\x70\72\x2f\x2f\x77\167\x77\56\167\x33\x2e\157\162\x67\x2f\x32\x30\60\x31\x2f\60\x34\x2f\170\155\x6c\144\163\x69\x67\x2d\x6d\x6f\x72\x65\x23\162\x73\x61\x2d\x73\x68\141\63\x38\x34";
                $this->cryptParams["\x70\141\144\x64\151\x6e\x67"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x64\151\147\x65\163\x74"] = "\x53\x48\x41\x33\70\64";
                if (!(is_array($ht) && !empty($ht["\164\x79\x70\145"]))) {
                    goto QbK;
                }
                if (!($ht["\164\171\160\x65"] == "\160\x75\142\x6c\x69\143" || $ht["\x74\171\x70\145"] == "\160\x72\x69\166\141\x74\x65")) {
                    goto XVh;
                }
                $this->cryptParams["\164\171\160\145"] = $ht["\x74\171\160\x65"];
                goto kMn;
                XVh:
                QbK:
                throw new Exception("\x43\145\x72\x74\151\146\x69\143\x61\164\x65\x20\42\x74\171\x70\x65\42\x20\50\160\x72\151\x76\141\x74\x65\x2f\160\x75\142\x6c\x69\x63\51\x20\155\165\x73\164\40\142\145\x20\x70\141\163\x73\x65\144\x20\x76\x69\x61\40\160\x61\162\x61\x6d\145\164\145\162\x73");
            case self::RSA_SHA512:
                $this->cryptParams["\x6c\x69\x62\x72\x61\x72\x79"] = "\157\160\145\x6e\x73\x73\154";
                $this->cryptParams["\155\x65\164\x68\x6f\144"] = "\150\164\x74\x70\72\57\57\167\167\x77\56\167\x33\56\x6f\x72\147\x2f\x32\60\x30\x31\57\x30\64\57\170\155\154\x64\163\x69\x67\x2d\155\157\162\x65\43\x72\163\x61\55\163\x68\141\x35\x31\62";
                $this->cryptParams["\160\x61\x64\144\151\156\x67"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\144\x69\147\145\x73\x74"] = "\123\110\101\x35\61\62";
                if (!(is_array($ht) && !empty($ht["\x74\171\x70\x65"]))) {
                    goto rav;
                }
                if (!($ht["\164\171\x70\x65"] == "\160\165\x62\x6c\151\143" || $ht["\x74\171\160\x65"] == "\x70\x72\151\166\x61\164\x65")) {
                    goto kjG;
                }
                $this->cryptParams["\164\x79\x70\x65"] = $ht["\164\171\160\145"];
                goto kMn;
                kjG:
                rav:
                throw new Exception("\x43\145\162\x74\151\x66\x69\x63\141\x74\x65\40\42\164\x79\x70\145\42\x20\50\x70\162\x69\x76\x61\164\145\57\x70\165\x62\154\x69\143\x29\40\x6d\165\x73\x74\x20\142\145\40\160\141\163\x73\x65\144\x20\x76\x69\x61\x20\x70\x61\162\141\x6d\145\164\145\x72\x73");
            case self::HMAC_SHA1:
                $this->cryptParams["\x6c\x69\142\162\141\162\171"] = $dQ;
                $this->cryptParams["\155\x65\x74\150\157\144"] = "\x68\164\164\x70\x3a\x2f\57\167\167\x77\56\x77\63\56\x6f\x72\147\x2f\x32\60\60\x30\x2f\60\x39\x2f\x78\x6d\x6c\x64\163\151\x67\43\x68\x6d\141\143\x2d\163\150\141\x31";
                goto kMn;
            default:
                throw new Exception("\x49\x6e\166\x61\x6c\x69\144\x20\113\x65\x79\x20\x54\x79\x70\x65");
        }
        OLc:
        kMn:
        $this->type = $dQ;
    }
    public function getSymmetricKeySize()
    {
        if (isset($this->cryptParams["\153\145\x79\x73\151\172\145"])) {
            goto U66;
        }
        return null;
        U66:
        return $this->cryptParams["\153\145\171\x73\x69\172\x65"];
    }
    public function generateSessionKey()
    {
        if (isset($this->cryptParams["\x6b\145\171\163\151\172\145"])) {
            goto KLG;
        }
        throw new Exception("\125\x6e\x6b\x6e\157\167\156\40\153\x65\171\40\163\x69\172\145\x20\146\157\162\x20\x74\171\x70\x65\x20\x22" . $this->type . "\42\x2e");
        KLG:
        $lQ = $this->cryptParams["\x6b\x65\x79\163\x69\x7a\x65"];
        $Ej = openssl_random_pseudo_bytes($lQ);
        if (!($this->type === self::TRIPLEDES_CBC)) {
            goto mZU;
        }
        $Eh = 0;
        XPZ:
        if (!($Eh < strlen($Ej))) {
            goto Di3;
        }
        $b1 = ord($Ej[$Eh]) & 254;
        $GX = 1;
        $K1 = 1;
        A3d:
        if (!($K1 < 8)) {
            goto dc2;
        }
        $GX ^= $b1 >> $K1 & 1;
        dYq:
        $K1++;
        goto A3d;
        dc2:
        $b1 |= $GX;
        $Ej[$Eh] = chr($b1);
        NQS:
        $Eh++;
        goto XPZ;
        Di3:
        mZU:
        $this->key = $Ej;
        return $Ej;
    }
    public static function getRawThumbprint($Km)
    {
        $ui = explode("\12", $Km);
        $u_ = '';
        $u3 = false;
        foreach ($ui as $hF) {
            if (!$u3) {
                goto BNR;
            }
            if (!(strncmp($hF, "\55\55\x2d\55\55\105\116\104\40\103\105\x52\x54\111\106\x49\103\x41\124\x45", 20) == 0)) {
                goto gW0;
            }
            goto uL4;
            gW0:
            $u_ .= trim($hF);
            goto Her;
            BNR:
            if (!(strncmp($hF, "\55\55\55\x2d\55\102\x45\x47\111\116\40\x43\105\x52\124\111\x46\111\103\101\124\x45", 22) == 0)) {
                goto VK2;
            }
            $u3 = true;
            VK2:
            Her:
            SbA:
        }
        uL4:
        if (empty($u_)) {
            goto jUT;
        }
        return strtolower(sha1(base64_decode($u_)));
        jUT:
        return null;
    }
    public function loadKey($Ej, $vU = false, $zQ = false)
    {
        if ($vU) {
            goto wTi;
        }
        $this->key = $Ej;
        goto DEZ;
        wTi:
        $this->key = file_get_contents($Ej);
        DEZ:
        if ($zQ) {
            goto swi;
        }
        $this->x509Certificate = null;
        goto zcX;
        swi:
        $this->key = openssl_x509_read($this->key);
        openssl_x509_export($this->key, $Ol);
        $this->x509Certificate = $Ol;
        $this->key = $Ol;
        zcX:
        if (!($this->cryptParams["\x6c\151\x62\162\x61\162\171"] == "\157\160\x65\x6e\x73\x73\x6c")) {
            goto HNT;
        }
        switch ($this->cryptParams["\x74\171\x70\145"]) {
            case "\x70\165\x62\154\x69\x63":
                if (!$zQ) {
                    goto Df0;
                }
                $this->X509Thumbprint = self::getRawThumbprint($this->key);
                Df0:
                $this->key = openssl_get_publickey($this->key);
                if ($this->key) {
                    goto g2o;
                }
                throw new Exception("\125\156\x61\x62\154\x65\x20\164\157\40\x65\170\164\x72\x61\143\x74\x20\160\x75\142\x6c\x69\143\x20\153\x65\171");
                g2o:
                goto mY_;
            case "\160\x72\151\166\141\164\x65":
                $this->key = openssl_get_privatekey($this->key, $this->passphrase);
                goto mY_;
            case "\x73\171\155\155\x65\x74\162\151\143":
                if (!(strlen($this->key) < $this->cryptParams["\153\145\171\x73\x69\172\145"])) {
                    goto Hmm;
                }
                throw new Exception("\x4b\x65\x79\40\155\x75\x73\164\x20\143\x6f\x6e\164\141\x69\x6e\x20\141\x74\40\154\x65\141\163\x74\x20" . $this->cryptParams["\x6b\x65\171\163\151\172\145"] . "\40\143\150\x61\x72\141\x63\164\x65\162\x73\x20\146\157\162\x20\164\x68\151\163\x20\143\151\x70\150\145\162\54\40\x63\157\x6e\164\x61\x69\156\163\40" . strlen($this->key));
                Hmm:
                goto mY_;
            default:
                throw new Exception("\x55\156\153\156\157\167\156\40\164\171\160\x65");
        }
        uhZ:
        mY_:
        HNT:
    }
    private function padISO10126($u_, $Fe)
    {
        if (!($Fe > 256)) {
            goto M7i;
        }
        throw new Exception("\102\x6c\x6f\143\x6b\40\163\x69\172\145\x20\x68\151\x67\x68\x65\162\40\x74\150\141\156\40\x32\x35\66\40\156\x6f\x74\x20\141\154\154\x6f\167\x65\144");
        M7i:
        $QN = $Fe - strlen($u_) % $Fe;
        $ud = chr($QN);
        return $u_ . str_repeat($ud, $QN);
    }
    private function unpadISO10126($u_)
    {
        $QN = substr($u_, -1);
        $Kw = ord($QN);
        return substr($u_, 0, -$Kw);
    }
    private function encryptSymmetric($u_)
    {
        $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cryptParams["\143\x69\x70\150\x65\x72"]));
        $E_ = null;
        if (in_array($this->cryptParams["\x63\151\x70\150\145\162"], array("\141\145\x73\x2d\61\62\x38\55\147\143\155", "\141\x65\x73\55\x31\71\x32\x2d\147\143\x6d", "\x61\145\163\55\x32\65\66\55\147\143\155"))) {
            goto O47;
        }
        $u_ = $this->padISO10126($u_, $this->cryptParams["\142\154\x6f\x63\x6b\x73\151\x7a\145"]);
        $Yf = openssl_encrypt($u_, $this->cryptParams["\x63\x69\160\x68\x65\162"], $this->key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $this->iv);
        goto vpy;
        O47:
        if (!(version_compare(PHP_VERSION, "\67\x2e\61\56\60") < 0)) {
            goto oy8;
        }
        throw new Exception("\120\x48\x50\40\67\x2e\x31\x2e\60\40\x69\x73\x20\162\145\x71\x75\x69\x72\x65\x64\40\x74\157\40\x75\x73\145\x20\x41\x45\123\x20\107\x43\x4d\x20\x61\x6c\147\x6f\x72\151\164\x68\x6d\x73");
        oy8:
        $E_ = openssl_random_pseudo_bytes(self::AUTHTAG_LENGTH);
        $Yf = openssl_encrypt($u_, $this->cryptParams["\x63\x69\x70\150\145\162"], $this->key, OPENSSL_RAW_DATA, $this->iv, $E_);
        vpy:
        if (!(false === $Yf)) {
            goto e3v;
        }
        throw new Exception("\106\x61\151\x6c\x75\162\145\40\x65\x6e\x63\162\171\x70\x74\151\x6e\x67\x20\104\x61\164\141\40\50\157\x70\x65\x6e\x73\163\154\x20\x73\171\x6d\155\145\164\x72\x69\x63\51\x20\x2d\40" . openssl_error_string());
        e3v:
        return $this->iv . $Yf . $E_;
    }
    private function decryptSymmetric($u_)
    {
        $SB = openssl_cipher_iv_length($this->cryptParams["\x63\x69\x70\x68\145\162"]);
        $this->iv = substr($u_, 0, $SB);
        $u_ = substr($u_, $SB);
        $E_ = null;
        if (in_array($this->cryptParams["\143\151\160\150\145\x72"], array("\x61\x65\163\x2d\61\62\70\55\x67\143\x6d", "\x61\145\163\55\x31\71\62\55\147\x63\155", "\x61\145\163\55\x32\65\x36\55\147\x63\x6d"))) {
            goto qrV;
        }
        $P8 = openssl_decrypt($u_, $this->cryptParams["\x63\x69\160\150\x65\x72"], $this->key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $this->iv);
        goto nje;
        qrV:
        if (!(version_compare(PHP_VERSION, "\67\x2e\61\x2e\60") < 0)) {
            goto b2r;
        }
        throw new Exception("\x50\x48\120\40\67\56\61\x2e\x30\x20\151\163\x20\x72\145\161\165\151\x72\145\x64\x20\x74\x6f\40\165\163\x65\40\101\x45\x53\x20\107\103\x4d\x20\x61\154\147\157\162\151\x74\150\155\x73");
        b2r:
        $xV = 0 - self::AUTHTAG_LENGTH;
        $E_ = substr($u_, $xV);
        $u_ = substr($u_, 0, $xV);
        $P8 = openssl_decrypt($u_, $this->cryptParams["\143\x69\160\x68\x65\x72"], $this->key, OPENSSL_RAW_DATA, $this->iv, $E_);
        nje:
        if (!(false === $P8)) {
            goto cMV;
        }
        throw new Exception("\x46\x61\x69\154\x75\x72\x65\40\x64\x65\x63\162\x79\x70\x74\x69\156\x67\40\104\x61\164\x61\40\50\157\x70\145\156\163\x73\154\40\x73\x79\x6d\x6d\145\x74\162\x69\143\51\x20\55\40" . openssl_error_string());
        cMV:
        return null !== $E_ ? $P8 : $this->unpadISO10126($P8);
    }
    private function encryptPublic($u_)
    {
        if (openssl_public_encrypt($u_, $Yf, $this->key, $this->cryptParams["\160\141\x64\144\x69\156\x67"])) {
            goto uLS;
        }
        throw new Exception("\x46\141\x69\154\165\162\145\40\145\x6e\x63\x72\171\x70\x74\x69\156\x67\x20\x44\141\x74\141\40\50\157\160\x65\156\163\163\x6c\40\160\x75\x62\x6c\151\143\51\x20\x2d\x20" . openssl_error_string());
        uLS:
        return $Yf;
    }
    private function decryptPublic($u_)
    {
        if (openssl_public_decrypt($u_, $P8, $this->key, $this->cryptParams["\x70\x61\x64\x64\x69\x6e\147"])) {
            goto XTu;
        }
        throw new Exception("\106\x61\151\x6c\x75\x72\x65\40\144\145\143\162\x79\160\164\x69\x6e\147\40\104\141\x74\x61\x20\x28\x6f\160\145\156\x73\x73\x6c\x20\x70\x75\142\x6c\151\x63\51\40\55\40" . openssl_error_string());
        XTu:
        return $P8;
    }
    private function encryptPrivate($u_)
    {
        if (openssl_private_encrypt($u_, $Yf, $this->key, $this->cryptParams["\160\x61\144\144\151\156\x67"])) {
            goto YU_;
        }
        throw new Exception("\x46\141\x69\154\165\x72\145\x20\x65\x6e\143\162\x79\x70\x74\151\156\x67\x20\x44\141\164\x61\40\50\x6f\160\x65\x6e\163\163\154\40\x70\162\x69\x76\x61\164\x65\x29\x20\x2d\x20" . openssl_error_string());
        YU_:
        return $Yf;
    }
    private function decryptPrivate($u_)
    {
        if (openssl_private_decrypt($u_, $P8, $this->key, $this->cryptParams["\160\141\x64\x64\151\156\x67"])) {
            goto yTT;
        }
        throw new Exception("\x46\x61\151\154\x75\x72\145\x20\144\x65\x63\x72\171\x70\x74\151\x6e\x67\40\104\141\x74\141\x20\50\x6f\x70\x65\x6e\x73\163\x6c\x20\160\162\151\166\141\x74\x65\x29\x20\x2d\x20" . openssl_error_string());
        yTT:
        return $P8;
    }
    private function signOpenSSL($u_)
    {
        $lM = OPENSSL_ALGO_SHA1;
        if (empty($this->cryptParams["\144\x69\x67\x65\163\x74"])) {
            goto Lfg;
        }
        $lM = $this->cryptParams["\144\151\147\145\163\x74"];
        Lfg:
        if (openssl_sign($u_, $xZ, $this->key, $lM)) {
            goto sXe;
        }
        throw new Exception("\106\141\x69\154\165\162\145\40\123\151\x67\156\x69\156\x67\40\104\x61\164\x61\72\40" . openssl_error_string() . "\x20\x2d\40" . $lM);
        sXe:
        return $xZ;
    }
    private function verifyOpenSSL($u_, $xZ)
    {
        $lM = OPENSSL_ALGO_SHA1;
        if (empty($this->cryptParams["\144\151\x67\145\x73\164"])) {
            goto omX;
        }
        $lM = $this->cryptParams["\x64\x69\x67\x65\163\x74"];
        omX:
        return openssl_verify($u_, $xZ, $this->key, $lM);
    }
    public function encryptData($u_)
    {
        if (!($this->cryptParams["\154\x69\142\162\x61\x72\171"] === "\x6f\160\x65\156\163\163\x6c")) {
            goto Sc2;
        }
        switch ($this->cryptParams["\x74\171\x70\145"]) {
            case "\163\171\155\x6d\145\164\x72\x69\x63":
                return $this->encryptSymmetric($u_);
            case "\160\165\142\x6c\x69\x63":
                return $this->encryptPublic($u_);
            case "\x70\162\x69\166\141\x74\145":
                return $this->encryptPrivate($u_);
        }
        fN3:
        B7i:
        Sc2:
    }
    public function decryptData($u_)
    {
        if (!($this->cryptParams["\154\x69\142\162\141\162\171"] === "\x6f\x70\x65\156\163\163\x6c")) {
            goto PKV;
        }
        switch ($this->cryptParams["\x74\x79\160\145"]) {
            case "\163\x79\155\155\145\164\162\x69\x63":
                return $this->decryptSymmetric($u_);
            case "\160\165\x62\x6c\x69\x63":
                return $this->decryptPublic($u_);
            case "\x70\162\x69\166\141\164\x65":
                return $this->decryptPrivate($u_);
        }
        M6Z:
        owH:
        PKV:
    }
    public function signData($u_)
    {
        switch ($this->cryptParams["\154\151\142\x72\x61\162\x79"]) {
            case "\157\160\145\156\163\163\154":
                return $this->signOpenSSL($u_);
            case self::HMAC_SHA1:
                return hash_hmac("\163\x68\141\x31", $u_, $this->key, true);
        }
        tPP:
        QsF:
    }
    public function verifySignature($u_, $xZ)
    {
        switch ($this->cryptParams["\x6c\151\x62\162\x61\x72\x79"]) {
            case "\157\x70\145\x6e\x73\x73\154":
                return $this->verifyOpenSSL($u_, $xZ);
            case self::HMAC_SHA1:
                $u8 = hash_hmac("\163\x68\141\61", $u_, $this->key, true);
                return strcmp($xZ, $u8) == 0;
        }
        LgW:
        U24:
    }
    public function getAlgorith()
    {
        return $this->getAlgorithm();
    }
    public function getAlgorithm()
    {
        return $this->cryptParams["\155\145\x74\150\157\144"];
    }
    public static function makeAsnSegment($dQ, $lS)
    {
        switch ($dQ) {
            case 2:
                if (!(ord($lS) > 127)) {
                    goto Rl2;
                }
                $lS = chr(0) . $lS;
                Rl2:
                goto ekB;
            case 3:
                $lS = chr(0) . $lS;
                goto ekB;
        }
        Tjr:
        ekB:
        $eq = strlen($lS);
        if ($eq < 128) {
            goto pIx;
        }
        if ($eq < 256) {
            goto F3q;
        }
        if ($eq < 65536) {
            goto wqJ;
        }
        $ZW = null;
        goto oja;
        wqJ:
        $ZW = sprintf("\45\143\x25\x63\x25\x63\45\143\45\163", $dQ, 130, $eq / 256, $eq % 256, $lS);
        oja:
        goto UwD;
        F3q:
        $ZW = sprintf("\x25\143\x25\143\45\143\x25\163", $dQ, 129, $eq, $lS);
        UwD:
        goto MXh;
        pIx:
        $ZW = sprintf("\45\143\45\143\x25\x73", $dQ, $eq, $lS);
        MXh:
        return $ZW;
    }
    public static function convertRSA($f1, $g0)
    {
        $v2 = self::makeAsnSegment(2, $g0);
        $ZJ = self::makeAsnSegment(2, $f1);
        $fk = self::makeAsnSegment(48, $ZJ . $v2);
        $HH = self::makeAsnSegment(3, $fk);
        $Pw = pack("\110\x2a", "\x33\x30\x30\x44\x30\66\x30\71\62\101\x38\x36\x34\70\x38\66\106\x37\x30\x44\x30\61\x30\x31\x30\x31\60\x35\60\60");
        $gw = self::makeAsnSegment(48, $Pw . $HH);
        $d1 = base64_encode($gw);
        $e4 = "\55\x2d\55\x2d\x2d\102\x45\x47\111\x4e\40\120\x55\102\x4c\x49\x43\x20\113\105\x59\55\55\x2d\55\55\12";
        $xV = 0;
        B_b:
        if (!($sg = substr($d1, $xV, 64))) {
            goto Z56;
        }
        $e4 = $e4 . $sg . "\12";
        $xV += 64;
        goto B_b;
        Z56:
        return $e4 . "\55\x2d\x2d\x2d\55\105\x4e\x44\x20\x50\125\102\114\111\x43\x20\x4b\x45\x59\55\x2d\55\x2d\x2d\xa";
    }
    public function serializeKey($sT)
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
    public static function fromEncryptedKeyElement(DOMElement $Kk)
    {
        $Bw = new XMLSecEnc();
        $Bw->setNode($Kk);
        if ($TN = $Bw->locateKey()) {
            goto Tbu;
        }
        throw new Exception("\x55\156\x61\142\x6c\x65\x20\164\x6f\40\x6c\157\143\141\164\145\x20\x61\154\x67\157\x72\x69\x74\x68\x6d\40\x66\x6f\162\40\164\x68\151\163\40\105\x6e\x63\162\x79\160\164\x65\144\40\x4b\x65\171");
        Tbu:
        $TN->isEncrypted = true;
        $TN->encryptedCtx = $Bw;
        XMLSecEnc::staticLocateKeyInfo($TN, $Kk);
        return $TN;
    }
}
