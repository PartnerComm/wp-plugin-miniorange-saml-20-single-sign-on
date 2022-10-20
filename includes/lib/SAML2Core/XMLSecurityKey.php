<?php


namespace RobRichards\XMLSecLibs;

use DOMElement;
use Exception;
class XMLSecurityKey
{
    const TRIPLEDES_CBC = "\x68\164\x74\x70\72\x2f\57\x77\167\x77\56\167\63\56\x6f\162\x67\x2f\x32\x30\60\x31\x2f\60\64\x2f\x78\x6d\x6c\145\x6e\143\43\x74\x72\x69\160\154\x65\144\x65\x73\55\x63\142\x63";
    const AES128_CBC = "\x68\164\164\160\x3a\x2f\57\x77\x77\x77\x2e\x77\x33\x2e\157\x72\x67\x2f\x32\x30\x30\x31\57\x30\x34\57\170\x6d\x6c\145\156\143\43\141\x65\163\x31\x32\x38\x2d\143\x62\x63";
    const AES192_CBC = "\150\x74\164\160\72\57\57\x77\167\167\56\167\x33\x2e\157\162\x67\x2f\x32\x30\x30\61\57\x30\64\57\170\x6d\x6c\x65\x6e\x63\x23\141\145\x73\61\x39\62\x2d\143\142\143";
    const AES256_CBC = "\x68\x74\164\x70\x3a\57\57\x77\167\167\56\167\x33\56\157\162\147\57\62\x30\60\x31\57\x30\x34\x2f\170\x6d\x6c\x65\156\x63\x23\141\x65\163\x32\65\x36\55\x63\142\143";
    const AES128_GCM = "\150\164\164\160\72\57\57\x77\167\x77\x2e\167\63\56\157\x72\x67\57\x32\60\60\x39\57\170\155\x6c\145\156\143\x31\61\43\x61\x65\x73\x31\x32\70\55\147\143\x6d";
    const AES192_GCM = "\x68\x74\x74\160\72\57\x2f\x77\167\x77\56\167\63\56\x6f\162\147\57\62\60\x30\x39\x2f\x78\x6d\x6c\145\x6e\x63\x31\61\43\141\x65\163\x31\x39\x32\55\x67\143\x6d";
    const AES256_GCM = "\x68\164\x74\x70\x3a\57\x2f\x77\167\167\56\167\63\56\x6f\162\147\57\x32\x30\60\71\x2f\170\155\x6c\x65\156\143\61\x31\x23\x61\145\x73\x32\65\66\x2d\147\x63\x6d";
    const RSA_1_5 = "\150\x74\164\160\72\x2f\x2f\167\x77\x77\56\x77\x33\x2e\157\162\147\57\x32\60\x30\61\57\x30\64\x2f\170\155\154\145\x6e\143\43\x72\163\x61\x2d\x31\x5f\x35";
    const RSA_OAEP_MGF1P = "\x68\x74\x74\160\72\57\x2f\167\167\167\x2e\167\63\56\x6f\x72\147\x2f\x32\60\60\x31\x2f\60\64\57\170\x6d\x6c\x65\156\x63\43\162\163\141\x2d\157\141\x65\160\55\x6d\x67\146\61\160";
    const RSA_OAEP = "\150\164\x74\x70\72\x2f\57\167\x77\167\x2e\x77\63\56\157\x72\147\57\62\x30\x30\71\57\170\x6d\x6c\145\156\143\x31\x31\x23\162\163\x61\55\157\141\x65\x70";
    const DSA_SHA1 = "\150\x74\x74\x70\72\x2f\x2f\x77\167\x77\x2e\167\x33\x2e\x6f\x72\x67\x2f\x32\60\x30\60\57\60\71\57\x78\x6d\x6c\144\x73\x69\x67\x23\144\x73\141\55\x73\150\141\x31";
    const RSA_SHA1 = "\150\164\164\x70\x3a\x2f\57\167\x77\167\56\167\63\x2e\157\162\x67\57\x32\60\x30\x30\x2f\x30\x39\x2f\x78\x6d\154\144\163\x69\x67\x23\x72\163\x61\55\163\150\141\x31";
    const RSA_SHA256 = "\x68\164\164\x70\x3a\57\57\x77\x77\167\x2e\x77\x33\56\x6f\x72\147\x2f\x32\x30\60\x31\x2f\60\64\x2f\170\x6d\154\x64\x73\x69\x67\x2d\x6d\x6f\162\145\43\162\x73\141\x2d\x73\150\141\62\x35\x36";
    const RSA_SHA384 = "\x68\x74\x74\160\72\57\57\x77\x77\x77\x2e\x77\x33\56\157\162\147\x2f\x32\60\60\x31\x2f\x30\64\57\170\x6d\154\x64\163\x69\147\x2d\155\157\x72\x65\43\162\163\141\x2d\x73\150\141\63\70\x34";
    const RSA_SHA512 = "\150\164\x74\x70\x3a\57\57\x77\x77\167\56\167\63\x2e\x6f\x72\x67\57\62\x30\x30\61\57\60\x34\x2f\x78\155\x6c\144\163\x69\147\55\x6d\x6f\x72\145\43\x72\x73\x61\x2d\x73\150\x61\65\61\62";
    const HMAC_SHA1 = "\150\164\164\x70\72\x2f\x2f\x77\167\167\56\167\x33\x2e\x6f\x72\147\x2f\62\60\60\x30\57\60\71\x2f\x78\x6d\154\144\163\151\147\x23\150\155\141\x63\55\163\150\141\61";
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
    public function __construct($HA, $eS = null)
    {
        switch ($HA) {
            case self::TRIPLEDES_CBC:
                $this->cryptParams["\154\151\142\162\x61\x72\171"] = "\157\160\x65\156\163\163\x6c";
                $this->cryptParams["\143\151\x70\150\145\x72"] = "\x64\145\x73\55\145\144\145\63\55\143\x62\143";
                $this->cryptParams["\164\171\160\145"] = "\x73\171\x6d\x6d\x65\x74\x72\x69\143";
                $this->cryptParams["\x6d\145\164\150\x6f\x64"] = "\x68\164\x74\x70\x3a\x2f\x2f\167\167\x77\56\167\63\56\157\x72\147\x2f\62\x30\60\x31\x2f\60\64\x2f\x78\x6d\x6c\145\x6e\x63\x23\x74\x72\x69\x70\x6c\x65\x64\x65\x73\x2d\143\142\143";
                $this->cryptParams["\153\x65\171\163\x69\172\x65"] = 24;
                $this->cryptParams["\x62\154\157\143\x6b\x73\151\172\x65"] = 8;
                goto hG;
            case self::AES128_CBC:
                $this->cryptParams["\x6c\x69\142\162\x61\x72\171"] = "\x6f\160\x65\x6e\163\163\x6c";
                $this->cryptParams["\143\x69\160\150\x65\x72"] = "\141\145\x73\55\61\x32\x38\x2d\x63\x62\x63";
                $this->cryptParams["\x74\x79\x70\x65"] = "\163\x79\x6d\x6d\x65\164\x72\151\143";
                $this->cryptParams["\155\145\x74\150\x6f\144"] = "\150\x74\164\160\x3a\57\57\167\167\167\56\x77\63\x2e\157\162\147\x2f\62\x30\x30\61\x2f\60\64\57\x78\x6d\x6c\x65\x6e\x63\43\141\x65\x73\61\62\x38\x2d\x63\x62\x63";
                $this->cryptParams["\x6b\x65\171\x73\x69\x7a\x65"] = 16;
                $this->cryptParams["\142\154\157\x63\153\x73\151\x7a\145"] = 16;
                goto hG;
            case self::AES192_CBC:
                $this->cryptParams["\154\151\x62\x72\141\162\171"] = "\x6f\160\145\x6e\163\163\154";
                $this->cryptParams["\143\151\160\150\145\162"] = "\141\145\x73\55\61\71\x32\55\x63\x62\x63";
                $this->cryptParams["\x74\x79\x70\145"] = "\x73\171\155\x6d\x65\164\x72\x69\143";
                $this->cryptParams["\x6d\x65\x74\x68\157\x64"] = "\x68\164\x74\160\72\57\57\x77\167\x77\x2e\x77\x33\x2e\x6f\162\x67\57\62\x30\60\x31\57\x30\x34\x2f\x78\155\x6c\145\156\x63\x23\141\145\x73\61\71\x32\55\143\x62\x63";
                $this->cryptParams["\x6b\x65\x79\163\x69\x7a\145"] = 24;
                $this->cryptParams["\x62\x6c\157\x63\153\x73\x69\x7a\x65"] = 16;
                goto hG;
            case self::AES256_CBC:
                $this->cryptParams["\154\151\142\162\141\x72\171"] = "\x6f\x70\x65\156\163\163\x6c";
                $this->cryptParams["\143\151\160\x68\x65\162"] = "\141\145\x73\55\x32\65\66\55\x63\x62\143";
                $this->cryptParams["\x74\x79\160\x65"] = "\163\171\x6d\x6d\x65\x74\162\151\143";
                $this->cryptParams["\x6d\x65\164\x68\x6f\144"] = "\150\164\x74\x70\72\x2f\x2f\167\x77\167\x2e\x77\63\x2e\x6f\162\147\x2f\x32\x30\x30\61\57\x30\64\57\x78\155\x6c\x65\156\x63\x23\141\x65\163\62\x35\66\x2d\x63\142\143";
                $this->cryptParams["\153\145\x79\163\151\x7a\145"] = 32;
                $this->cryptParams["\x62\x6c\157\x63\153\x73\151\x7a\x65"] = 16;
                goto hG;
            case self::AES128_GCM:
                $this->cryptParams["\x6c\151\x62\x72\141\x72\x79"] = "\157\160\145\x6e\163\163\x6c";
                $this->cryptParams["\143\151\x70\x68\x65\x72"] = "\141\145\x73\x2d\61\62\x38\x2d\x67\143\x6d";
                $this->cryptParams["\x74\171\160\x65"] = "\163\171\155\155\x65\x74\162\151\143";
                $this->cryptParams["\x6d\145\164\150\157\144"] = "\150\x74\164\x70\x3a\57\57\167\167\167\56\167\63\x2e\157\x72\x67\x2f\x32\60\60\71\x2f\x78\155\x6c\145\156\x63\61\x31\x23\141\x65\163\61\62\70\55\x67\x63\155";
                $this->cryptParams["\153\145\171\163\x69\x7a\x65"] = 16;
                $this->cryptParams["\x62\154\x6f\x63\x6b\163\151\x7a\x65"] = 16;
                goto hG;
            case self::AES192_GCM:
                $this->cryptParams["\154\x69\142\x72\x61\162\x79"] = "\x6f\160\x65\x6e\x73\163\x6c";
                $this->cryptParams["\x63\151\160\x68\x65\162"] = "\141\x65\x73\55\61\71\x32\55\x67\143\x6d";
                $this->cryptParams["\164\171\x70\145"] = "\163\x79\x6d\155\x65\164\162\x69\143";
                $this->cryptParams["\155\145\x74\x68\157\x64"] = "\x68\x74\164\x70\72\x2f\x2f\167\x77\167\56\167\63\56\x6f\162\x67\57\x32\60\60\x39\57\x78\x6d\x6c\x65\156\143\61\x31\x23\x61\145\x73\61\71\x32\55\147\x63\x6d";
                $this->cryptParams["\153\145\x79\163\151\x7a\x65"] = 24;
                $this->cryptParams["\142\154\x6f\x63\x6b\x73\x69\x7a\x65"] = 16;
                goto hG;
            case self::AES256_GCM:
                $this->cryptParams["\154\x69\x62\x72\x61\x72\x79"] = "\157\160\x65\x6e\163\x73\x6c";
                $this->cryptParams["\x63\151\160\x68\x65\x72"] = "\x61\145\163\x2d\x32\x35\66\55\x67\x63\x6d";
                $this->cryptParams["\164\x79\x70\145"] = "\163\x79\155\155\145\164\x72\151\x63";
                $this->cryptParams["\x6d\145\x74\150\157\x64"] = "\150\164\x74\x70\72\57\57\x77\167\x77\x2e\x77\x33\56\157\162\x67\57\62\60\x30\x39\x2f\x78\x6d\x6c\145\156\x63\x31\x31\x23\141\x65\x73\x32\x35\66\55\147\143\x6d";
                $this->cryptParams["\x6b\x65\171\163\x69\172\145"] = 32;
                $this->cryptParams["\142\154\x6f\x63\153\163\x69\172\145"] = 16;
                goto hG;
            case self::RSA_1_5:
                $this->cryptParams["\154\151\x62\x72\x61\x72\171"] = "\157\160\145\x6e\x73\x73\x6c";
                $this->cryptParams["\160\141\x64\144\151\x6e\x67"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\155\x65\x74\150\157\144"] = "\150\x74\x74\160\72\57\57\x77\x77\167\56\x77\x33\56\x6f\x72\147\57\x32\60\60\x31\x2f\60\64\x2f\170\x6d\154\x65\156\143\x23\162\x73\141\x2d\61\137\x35";
                if (!(is_array($eS) && !empty($eS["\x74\171\x70\145"]))) {
                    goto Fc;
                }
                if (!($eS["\x74\171\x70\145"] == "\x70\165\142\154\151\x63" || $eS["\164\171\160\x65"] == "\x70\162\x69\x76\x61\164\145")) {
                    goto np;
                }
                $this->cryptParams["\x74\x79\x70\145"] = $eS["\164\171\x70\x65"];
                goto hG;
                np:
                Fc:
                throw new Exception("\103\x65\x72\164\151\146\x69\x63\141\164\145\x20\x22\x74\x79\160\x65\x22\40\50\160\x72\x69\x76\141\164\145\57\x70\x75\142\x6c\x69\x63\51\x20\x6d\165\x73\164\40\142\145\x20\x70\141\163\x73\145\x64\40\166\151\x61\40\x70\141\x72\x61\155\145\x74\145\x72\x73");
            case self::RSA_OAEP_MGF1P:
                $this->cryptParams["\154\151\x62\x72\141\x72\171"] = "\x6f\160\x65\x6e\163\x73\154";
                $this->cryptParams["\160\x61\x64\x64\151\156\147"] = OPENSSL_PKCS1_OAEP_PADDING;
                $this->cryptParams["\155\145\164\150\157\144"] = "\150\164\164\160\x3a\57\x2f\x77\167\x77\x2e\167\63\56\x6f\162\x67\57\62\x30\60\x31\x2f\x30\x34\57\x78\155\154\x65\156\x63\43\x72\x73\141\55\x6f\x61\145\160\55\x6d\147\x66\61\160";
                $this->cryptParams["\x68\141\163\x68"] = null;
                if (!(is_array($eS) && !empty($eS["\164\171\160\x65"]))) {
                    goto XE;
                }
                if (!($eS["\x74\x79\160\145"] == "\160\165\142\154\151\143" || $eS["\164\171\160\145"] == "\x70\x72\x69\x76\x61\x74\145")) {
                    goto Ed;
                }
                $this->cryptParams["\164\171\160\x65"] = $eS["\164\x79\x70\x65"];
                goto hG;
                Ed:
                XE:
                throw new Exception("\x43\145\162\164\151\x66\x69\x63\x61\164\145\x20\x22\164\171\160\145\x22\40\50\x70\x72\x69\x76\x61\x74\145\57\x70\x75\142\x6c\151\x63\x29\40\x6d\165\163\164\40\142\145\40\160\141\163\163\145\x64\x20\x76\151\141\x20\x70\141\x72\x61\155\145\164\145\x72\x73");
            case self::RSA_OAEP:
                $this->cryptParams["\154\151\x62\x72\x61\x72\171"] = "\157\160\145\x6e\163\x73\x6c";
                $this->cryptParams["\x70\x61\x64\144\151\x6e\147"] = OPENSSL_PKCS1_OAEP_PADDING;
                $this->cryptParams["\155\x65\164\x68\x6f\x64"] = "\x68\x74\164\160\72\57\x2f\167\167\167\56\167\63\56\157\x72\147\x2f\x32\x30\x30\x39\x2f\x78\155\x6c\x65\x6e\x63\x31\x31\x23\x72\163\x61\x2d\x6f\x61\145\x70";
                $this->cryptParams["\x68\141\163\150"] = "\x68\x74\x74\160\72\57\x2f\x77\167\x77\x2e\167\63\x2e\157\162\147\x2f\62\60\x30\71\57\170\x6d\x6c\x65\156\143\61\61\43\x6d\x67\146\61\x73\150\x61\x31";
                if (!(is_array($eS) && !empty($eS["\x74\x79\x70\145"]))) {
                    goto T3;
                }
                if (!($eS["\x74\171\x70\145"] == "\x70\165\142\x6c\x69\143" || $eS["\x74\171\160\x65"] == "\160\162\x69\x76\x61\164\x65")) {
                    goto ZR;
                }
                $this->cryptParams["\x74\171\160\145"] = $eS["\164\x79\160\x65"];
                goto hG;
                ZR:
                T3:
                throw new Exception("\x43\145\x72\x74\x69\x66\151\x63\x61\x74\x65\x20\x22\x74\171\160\x65\42\x20\50\x70\162\151\166\x61\164\145\x2f\x70\165\142\x6c\151\143\x29\x20\x6d\165\163\x74\40\x62\x65\40\160\141\x73\x73\145\144\x20\x76\x69\x61\x20\160\x61\x72\141\155\145\164\145\x72\163");
            case self::RSA_SHA1:
                $this->cryptParams["\154\x69\142\x72\x61\162\171"] = "\157\160\145\156\163\163\x6c";
                $this->cryptParams["\x6d\x65\x74\x68\x6f\144"] = "\x68\164\x74\160\72\57\x2f\167\167\x77\x2e\x77\x33\x2e\x6f\x72\x67\x2f\62\x30\60\x30\x2f\x30\x39\57\170\x6d\x6c\x64\163\x69\147\x23\162\163\141\55\x73\x68\141\x31";
                $this->cryptParams["\x70\x61\x64\144\x69\156\147"] = OPENSSL_PKCS1_PADDING;
                if (!(is_array($eS) && !empty($eS["\x74\171\160\145"]))) {
                    goto ZI;
                }
                if (!($eS["\x74\x79\x70\145"] == "\x70\165\x62\154\151\143" || $eS["\164\x79\160\145"] == "\x70\162\151\166\x61\x74\x65")) {
                    goto L9;
                }
                $this->cryptParams["\x74\x79\x70\x65"] = $eS["\164\x79\160\145"];
                goto hG;
                L9:
                ZI:
                throw new Exception("\x43\145\162\x74\151\x66\x69\x63\x61\164\145\x20\42\x74\171\x70\x65\42\40\x28\160\x72\x69\166\x61\164\145\57\160\x75\x62\x6c\151\x63\51\x20\x6d\x75\x73\x74\x20\142\145\40\x70\x61\163\163\x65\144\40\166\x69\141\40\160\x61\x72\141\x6d\x65\x74\x65\x72\x73");
            case self::RSA_SHA256:
                $this->cryptParams["\154\x69\142\x72\x61\162\171"] = "\x6f\x70\145\156\x73\x73\x6c";
                $this->cryptParams["\155\145\164\x68\x6f\144"] = "\150\x74\x74\160\x3a\x2f\x2f\167\167\167\56\x77\x33\x2e\x6f\x72\x67\57\x32\x30\x30\x31\57\60\64\x2f\170\155\x6c\x64\x73\x69\147\x2d\155\x6f\162\145\43\x72\x73\x61\x2d\163\150\141\x32\65\66";
                $this->cryptParams["\160\141\144\144\151\156\x67"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\144\x69\147\145\x73\164"] = "\123\110\x41\62\x35\66";
                if (!(is_array($eS) && !empty($eS["\x74\171\x70\x65"]))) {
                    goto YJ;
                }
                if (!($eS["\164\171\x70\x65"] == "\x70\165\x62\154\x69\x63" || $eS["\x74\171\160\145"] == "\160\x72\x69\x76\x61\x74\x65")) {
                    goto pd;
                }
                $this->cryptParams["\164\171\160\145"] = $eS["\164\171\x70\145"];
                goto hG;
                pd:
                YJ:
                throw new Exception("\x43\145\x72\164\x69\x66\x69\143\x61\x74\145\x20\42\164\x79\160\x65\x22\40\x28\x70\162\151\x76\141\x74\x65\x2f\x70\x75\142\x6c\151\143\x29\x20\155\x75\163\x74\x20\142\x65\x20\x70\x61\163\163\145\144\40\x76\151\x61\40\160\x61\162\x61\155\x65\x74\145\x72\x73");
            case self::RSA_SHA384:
                $this->cryptParams["\x6c\151\142\x72\141\162\171"] = "\157\160\x65\156\163\163\154";
                $this->cryptParams["\x6d\x65\x74\150\x6f\x64"] = "\x68\x74\164\160\x3a\x2f\57\x77\167\x77\x2e\x77\x33\56\x6f\x72\147\57\62\60\x30\x31\x2f\60\x34\x2f\170\155\154\144\163\151\147\55\x6d\x6f\162\x65\x23\x72\x73\141\55\163\150\x61\63\x38\64";
                $this->cryptParams["\160\141\x64\x64\x69\x6e\x67"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x64\151\147\x65\x73\164"] = "\x53\x48\101\x33\70\x34";
                if (!(is_array($eS) && !empty($eS["\x74\171\x70\x65"]))) {
                    goto RU;
                }
                if (!($eS["\164\171\160\x65"] == "\160\165\x62\154\x69\x63" || $eS["\x74\x79\x70\x65"] == "\160\x72\x69\x76\x61\x74\145")) {
                    goto iV;
                }
                $this->cryptParams["\x74\x79\x70\x65"] = $eS["\164\171\x70\x65"];
                goto hG;
                iV:
                RU:
                throw new Exception("\x43\x65\162\164\x69\146\151\x63\141\x74\145\x20\x22\164\171\160\x65\42\x20\x28\x70\162\x69\166\141\x74\145\x2f\160\x75\142\x6c\x69\143\51\40\x6d\165\x73\164\40\142\x65\x20\x70\x61\163\x73\x65\144\x20\166\x69\141\40\x70\x61\x72\x61\155\145\164\x65\162\163");
            case self::RSA_SHA512:
                $this->cryptParams["\x6c\x69\x62\x72\x61\x72\171"] = "\157\160\145\156\163\163\x6c";
                $this->cryptParams["\x6d\145\164\x68\157\144"] = "\150\x74\x74\160\72\57\x2f\167\167\167\x2e\167\x33\x2e\157\x72\147\57\x32\x30\60\x31\57\60\x34\57\x78\155\x6c\x64\x73\151\x67\x2d\155\x6f\162\x65\43\x72\163\x61\x2d\x73\x68\x61\x35\x31\x32";
                $this->cryptParams["\x70\141\x64\x64\x69\x6e\x67"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x64\151\x67\145\163\164"] = "\123\x48\x41\x35\61\x32";
                if (!(is_array($eS) && !empty($eS["\x74\171\160\145"]))) {
                    goto Fp;
                }
                if (!($eS["\164\x79\x70\x65"] == "\160\x75\x62\154\x69\x63" || $eS["\164\x79\x70\x65"] == "\160\x72\x69\166\x61\x74\x65")) {
                    goto hM;
                }
                $this->cryptParams["\164\171\160\x65"] = $eS["\x74\171\x70\x65"];
                goto hG;
                hM:
                Fp:
                throw new Exception("\x43\x65\162\x74\151\146\x69\x63\x61\x74\x65\40\42\164\171\160\x65\x22\40\50\x70\162\x69\166\x61\x74\x65\57\160\x75\x62\154\x69\143\x29\x20\x6d\x75\x73\164\40\x62\145\40\x70\141\163\163\145\x64\40\x76\151\x61\40\160\x61\162\x61\155\x65\x74\x65\x72\163");
            case self::HMAC_SHA1:
                $this->cryptParams["\x6c\151\142\x72\x61\162\171"] = $HA;
                $this->cryptParams["\x6d\145\164\150\157\144"] = "\150\164\x74\x70\72\x2f\x2f\167\x77\x77\x2e\167\63\56\x6f\x72\x67\57\62\60\60\60\57\x30\x39\57\x78\155\x6c\x64\163\151\x67\x23\150\x6d\141\143\x2d\x73\150\x61\61";
                goto hG;
            default:
                throw new Exception("\x49\x6e\166\141\154\x69\144\40\113\145\x79\x20\x54\171\160\145");
        }
        VO:
        hG:
        $this->type = $HA;
    }
    public function getSymmetricKeySize()
    {
        if (isset($this->cryptParams["\x6b\x65\x79\163\x69\x7a\145"])) {
            goto j0;
        }
        return null;
        j0:
        return $this->cryptParams["\153\x65\171\x73\151\172\x65"];
    }
    public function generateSessionKey()
    {
        if (isset($this->cryptParams["\153\x65\x79\163\151\x7a\x65"])) {
            goto V0;
        }
        throw new Exception("\125\156\153\156\157\167\156\x20\x6b\x65\171\x20\163\x69\x7a\x65\x20\x66\x6f\x72\40\164\x79\160\145\x20\42" . $this->type . "\x22\x2e");
        V0:
        $KZ = $this->cryptParams["\x6b\x65\x79\x73\151\x7a\x65"];
        $U6 = openssl_random_pseudo_bytes($KZ);
        if (!($this->type === self::TRIPLEDES_CBC)) {
            goto LC;
        }
        $jb = 0;
        E0:
        if (!($jb < strlen($U6))) {
            goto We;
        }
        $Te = ord($U6[$jb]) & 0xfe;
        $Rm = 1;
        $JT = 1;
        cM:
        if (!($JT < 8)) {
            goto J6;
        }
        $Rm ^= $Te >> $JT & 1;
        Ua:
        $JT++;
        goto cM;
        J6:
        $Te |= $Rm;
        $U6[$jb] = chr($Te);
        RD:
        $jb++;
        goto E0;
        We:
        LC:
        $this->key = $U6;
        return $U6;
    }
    public static function getRawThumbprint($eM)
    {
        $Kt = explode("\12", $eM);
        $WL = '';
        $Rq = false;
        foreach ($Kt as $p_) {
            if (!$Rq) {
                goto c9;
            }
            if (!(strncmp($p_, "\55\x2d\55\55\55\x45\x4e\104\x20\103\x45\x52\x54\x49\106\x49\103\101\124\105", 20) == 0)) {
                goto ri;
            }
            goto lx;
            ri:
            $WL .= trim($p_);
            goto e3;
            c9:
            if (!(strncmp($p_, "\55\x2d\55\55\x2d\x42\x45\107\111\x4e\40\x43\105\x52\x54\111\x46\111\103\101\124\x45", 22) == 0)) {
                goto dC;
            }
            $Rq = true;
            dC:
            e3:
            dI:
        }
        lx:
        if (empty($WL)) {
            goto Tu;
        }
        return strtolower(sha1(base64_decode($WL)));
        Tu:
        return null;
    }
    public function loadKey($U6, $IN = false, $j2 = false)
    {
        if ($IN) {
            goto ug;
        }
        $this->key = $U6;
        goto wb;
        ug:
        $this->key = file_get_contents($U6);
        wb:
        if ($j2) {
            goto Zj;
        }
        $this->x509Certificate = null;
        goto m2;
        Zj:
        $this->key = openssl_x509_read($this->key);
        openssl_x509_export($this->key, $j_);
        $this->x509Certificate = $j_;
        $this->key = $j_;
        m2:
        if (!($this->cryptParams["\x6c\x69\x62\162\141\162\171"] == "\x6f\160\x65\x6e\163\163\x6c")) {
            goto uM;
        }
        switch ($this->cryptParams["\x74\x79\x70\145"]) {
            case "\160\x75\x62\154\151\x63":
                if (!$j2) {
                    goto pZ;
                }
                $this->X509Thumbprint = self::getRawThumbprint($this->key);
                pZ:
                $this->key = openssl_get_publickey($this->key);
                if ($this->key) {
                    goto YS;
                }
                throw new Exception("\x55\156\141\142\154\x65\x20\x74\157\40\x65\170\x74\x72\x61\x63\x74\x20\160\x75\142\x6c\151\x63\x20\153\145\x79");
                YS:
                goto ww;
            case "\x70\162\x69\166\141\164\145":
                $this->key = openssl_get_privatekey($this->key, $this->passphrase);
                goto ww;
            case "\x73\x79\155\x6d\x65\164\x72\x69\143":
                if (!(strlen($this->key) < $this->cryptParams["\153\145\171\163\151\x7a\145"])) {
                    goto wg;
                }
                throw new Exception("\113\x65\x79\x20\155\x75\x73\164\40\x63\x6f\x6e\x74\141\x69\156\x20\141\164\x20\x6c\x65\x61\163\x74\40" . $this->cryptParams["\153\145\171\163\x69\172\145"] . "\x20\143\150\x61\x72\x61\143\x74\x65\x72\163\40\x66\157\162\x20\164\150\x69\x73\x20\x63\151\160\150\145\162\x2c\40\x63\x6f\x6e\x74\141\151\x6e\163\40" . strlen($this->key));
                wg:
                goto ww;
            default:
                throw new Exception("\x55\156\153\156\157\x77\x6e\40\164\171\160\145");
        }
        i6:
        ww:
        uM:
    }
    private function padISO10126($WL, $V_)
    {
        if (!($V_ > 256)) {
            goto EF;
        }
        throw new Exception("\102\154\157\143\153\40\x73\x69\x7a\x65\40\150\x69\x67\150\x65\x72\x20\164\150\x61\156\x20\62\x35\x36\40\156\x6f\164\x20\141\x6c\154\x6f\x77\x65\x64");
        EF:
        $F3 = $V_ - strlen($WL) % $V_;
        $Y5 = chr($F3);
        return $WL . str_repeat($Y5, $F3);
    }
    private function unpadISO10126($WL)
    {
        $F3 = substr($WL, -1);
        $w7 = ord($F3);
        return substr($WL, 0, -$w7);
    }
    private function encryptSymmetric($WL)
    {
        $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cryptParams["\x63\x69\160\150\145\x72"]));
        $um = null;
        if (in_array($this->cryptParams["\x63\x69\160\x68\145\162"], ["\141\x65\163\55\x31\62\x38\x2d\x67\143\155", "\x61\145\163\x2d\x31\x39\x32\x2d\x67\143\x6d", "\141\145\163\55\x32\65\x36\x2d\x67\x63\155"])) {
            goto oh;
        }
        $WL = $this->padISO10126($WL, $this->cryptParams["\x62\154\x6f\143\153\x73\x69\x7a\x65"]);
        $Rr = openssl_encrypt($WL, $this->cryptParams["\143\x69\160\x68\145\x72"], $this->key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $this->iv);
        goto yf;
        oh:
        if (!(version_compare(PHP_VERSION, "\67\x2e\61\56\60") < 0)) {
            goto Gg;
        }
        throw new Exception("\x50\110\120\x20\x37\x2e\61\x2e\x30\x20\151\x73\x20\162\145\161\165\151\x72\145\x64\40\x74\x6f\40\x75\163\x65\40\x41\x45\123\x20\x47\x43\115\40\141\x6c\147\157\162\151\x74\x68\155\163");
        Gg:
        $um = openssl_random_pseudo_bytes(self::AUTHTAG_LENGTH);
        $Rr = openssl_encrypt($WL, $this->cryptParams["\x63\151\x70\150\145\162"], $this->key, OPENSSL_RAW_DATA, $this->iv, $um);
        yf:
        if (!(false === $Rr)) {
            goto Ru;
        }
        throw new Exception("\x46\141\x69\154\165\x72\145\40\x65\x6e\143\162\x79\160\x74\x69\x6e\x67\x20\104\x61\164\x61\x20\50\x6f\x70\x65\156\163\x73\154\x20\x73\x79\155\x6d\x65\164\x72\x69\143\51\x20\x2d\x20" . openssl_error_string());
        Ru:
        return $this->iv . $Rr . $um;
    }
    private function decryptSymmetric($WL)
    {
        $ni = openssl_cipher_iv_length($this->cryptParams["\x63\x69\160\150\x65\x72"]);
        $this->iv = substr($WL, 0, $ni);
        $WL = substr($WL, $ni);
        $um = null;
        if (in_array($this->cryptParams["\143\151\160\x68\x65\x72"], ["\141\145\x73\55\61\62\x38\55\147\143\155", "\141\145\x73\x2d\61\71\62\x2d\147\143\155", "\141\x65\x73\55\62\x35\66\55\x67\143\155"])) {
            goto bT;
        }
        $G4 = openssl_decrypt($WL, $this->cryptParams["\143\x69\160\x68\145\x72"], $this->key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $this->iv);
        goto yN;
        bT:
        if (!(version_compare(PHP_VERSION, "\x37\x2e\61\56\60") < 0)) {
            goto QT;
        }
        throw new Exception("\x50\x48\120\x20\67\x2e\61\x2e\60\40\x69\x73\x20\x72\x65\x71\165\151\x72\145\x64\x20\164\x6f\40\x75\x73\x65\x20\x41\105\x53\x20\107\x43\115\40\x61\x6c\147\x6f\162\x69\x74\x68\x6d\163");
        QT:
        $Wx = 0 - self::AUTHTAG_LENGTH;
        $um = substr($WL, $Wx);
        $WL = substr($WL, 0, $Wx);
        $G4 = openssl_decrypt($WL, $this->cryptParams["\143\x69\x70\x68\x65\162"], $this->key, OPENSSL_RAW_DATA, $this->iv, $um);
        yN:
        if (!(false === $G4)) {
            goto jF;
        }
        throw new Exception("\106\x61\x69\x6c\x75\162\x65\x20\x64\145\143\x72\171\x70\164\x69\156\147\40\x44\x61\164\x61\40\x28\x6f\x70\x65\x6e\x73\163\154\40\163\171\x6d\155\x65\164\x72\x69\x63\51\40\55\40" . openssl_error_string());
        jF:
        return null !== $um ? $G4 : $this->unpadISO10126($G4);
    }
    private function encryptPublic($WL)
    {
        if (openssl_public_encrypt($WL, $Rr, $this->key, $this->cryptParams["\x70\x61\144\144\151\x6e\x67"])) {
            goto Vh;
        }
        throw new Exception("\106\141\x69\154\165\x72\145\x20\x65\156\143\162\171\160\x74\x69\156\x67\x20\104\141\164\x61\x20\50\157\x70\145\x6e\163\x73\x6c\x20\160\x75\x62\154\x69\143\x29\40\x2d\40" . openssl_error_string());
        Vh:
        return $Rr;
    }
    private function decryptPublic($WL)
    {
        if (openssl_public_decrypt($WL, $G4, $this->key, $this->cryptParams["\x70\141\x64\x64\151\156\147"])) {
            goto u3;
        }
        throw new Exception("\x46\141\151\154\165\x72\x65\x20\x64\x65\x63\x72\171\x70\x74\151\156\x67\40\x44\141\x74\141\x20\50\x6f\160\145\156\163\x73\154\x20\160\x75\142\154\x69\x63\51\x20\x2d\x20" . openssl_error_string());
        u3:
        return $G4;
    }
    private function encryptPrivate($WL)
    {
        if (openssl_private_encrypt($WL, $Rr, $this->key, $this->cryptParams["\160\x61\144\144\151\156\x67"])) {
            goto Su;
        }
        throw new Exception("\106\x61\x69\154\165\162\145\40\145\156\x63\162\171\160\164\151\x6e\147\x20\104\x61\x74\141\40\50\x6f\160\145\156\163\163\x6c\40\x70\162\151\166\x61\164\x65\x29\40\x2d\x20" . openssl_error_string());
        Su:
        return $Rr;
    }
    private function decryptPrivate($WL)
    {
        if (openssl_private_decrypt($WL, $G4, $this->key, $this->cryptParams["\x70\x61\x64\144\151\x6e\x67"])) {
            goto C5;
        }
        throw new Exception("\106\141\151\154\165\162\145\40\144\x65\x63\x72\171\160\164\151\x6e\x67\x20\x44\141\x74\x61\x20\x28\x6f\x70\145\x6e\163\x73\x6c\40\x70\162\151\x76\141\164\x65\x29\40\55\x20" . openssl_error_string());
        C5:
        return $G4;
    }
    private function signOpenSSL($WL)
    {
        $qv = OPENSSL_ALGO_SHA1;
        if (empty($this->cryptParams["\x64\x69\147\x65\163\164"])) {
            goto TB;
        }
        $qv = $this->cryptParams["\x64\151\x67\x65\163\x74"];
        TB:
        if (openssl_sign($WL, $Ju, $this->key, $qv)) {
            goto Nk;
        }
        throw new Exception("\x46\141\x69\154\165\x72\x65\x20\x53\x69\x67\x6e\x69\156\x67\40\104\141\164\x61\72\40" . openssl_error_string() . "\x20\55\40" . $qv);
        Nk:
        return $Ju;
    }
    private function verifyOpenSSL($WL, $Ju)
    {
        $qv = OPENSSL_ALGO_SHA1;
        if (empty($this->cryptParams["\144\151\x67\x65\163\164"])) {
            goto gQ;
        }
        $qv = $this->cryptParams["\144\151\x67\145\x73\x74"];
        gQ:
        return openssl_verify($WL, $Ju, $this->key, $qv);
    }
    public function encryptData($WL)
    {
        if (!($this->cryptParams["\154\x69\x62\162\141\x72\x79"] === "\x6f\x70\x65\x6e\163\163\154")) {
            goto Wz;
        }
        switch ($this->cryptParams["\164\x79\160\145"]) {
            case "\163\171\155\x6d\x65\x74\162\x69\x63":
                return $this->encryptSymmetric($WL);
            case "\x70\165\142\x6c\151\x63":
                return $this->encryptPublic($WL);
            case "\x70\x72\151\166\141\x74\x65":
                return $this->encryptPrivate($WL);
        }
        YX:
        jK:
        Wz:
    }
    public function decryptData($WL)
    {
        if (!($this->cryptParams["\154\x69\x62\162\141\x72\x79"] === "\x6f\160\x65\156\163\x73\154")) {
            goto hA;
        }
        switch ($this->cryptParams["\x74\x79\x70\145"]) {
            case "\x73\x79\x6d\x6d\145\164\162\x69\143":
                return $this->decryptSymmetric($WL);
            case "\x70\x75\142\x6c\151\143":
                return $this->decryptPublic($WL);
            case "\160\162\x69\x76\x61\x74\145":
                return $this->decryptPrivate($WL);
        }
        vO:
        HX:
        hA:
    }
    public function signData($WL)
    {
        switch ($this->cryptParams["\x6c\151\x62\162\141\162\x79"]) {
            case "\157\x70\x65\x6e\163\x73\154":
                return $this->signOpenSSL($WL);
            case self::HMAC_SHA1:
                return hash_hmac("\163\x68\141\x31", $WL, $this->key, true);
        }
        BN:
        mZ:
    }
    public function verifySignature($WL, $Ju)
    {
        switch ($this->cryptParams["\154\151\x62\162\141\x72\x79"]) {
            case "\157\160\145\156\163\163\154":
                return $this->verifyOpenSSL($WL, $Ju);
            case self::HMAC_SHA1:
                $mW = hash_hmac("\x73\x68\x61\x31", $WL, $this->key, true);
                return strcmp($Ju, $mW) == 0;
        }
        xd:
        dP:
    }
    public function getAlgorith()
    {
        return $this->getAlgorithm();
    }
    public function getAlgorithm()
    {
        return $this->cryptParams["\x6d\x65\164\x68\x6f\x64"];
    }
    public static function makeAsnSegment($HA, $sH)
    {
        switch ($HA) {
            case 0x2:
                if (!(ord($sH) > 0x7f)) {
                    goto LJ;
                }
                $sH = chr(0) . $sH;
                LJ:
                goto Ps;
            case 0x3:
                $sH = chr(0) . $sH;
                goto Ps;
        }
        qs:
        Ps:
        $wM = strlen($sH);
        if ($wM < 128) {
            goto b9;
        }
        if ($wM < 0x100) {
            goto Pk;
        }
        if ($wM < 0x10000) {
            goto gn;
        }
        $Bv = null;
        goto TD;
        gn:
        $Bv = sprintf("\45\x63\45\143\45\143\x25\x63\x25\163", $HA, 0x82, $wM / 0x100, $wM % 0x100, $sH);
        TD:
        goto aa;
        Pk:
        $Bv = sprintf("\45\143\45\x63\45\143\x25\x73", $HA, 0x81, $wM, $sH);
        aa:
        goto jQ;
        b9:
        $Bv = sprintf("\45\143\45\x63\x25\163", $HA, $wM, $sH);
        jQ:
        return $Bv;
    }
    public static function convertRSA($RO, $nO)
    {
        $r3 = self::makeAsnSegment(0x2, $nO);
        $WM = self::makeAsnSegment(0x2, $RO);
        $gw = self::makeAsnSegment(0x30, $WM . $r3);
        $ff = self::makeAsnSegment(0x3, $gw);
        $Bi = pack("\x48\52", "\x33\60\x30\x44\x30\x36\60\71\x32\x41\x38\66\64\70\x38\x36\106\x37\60\x44\60\x31\x30\61\60\61\60\65\x30\60");
        $sz = self::makeAsnSegment(0x30, $Bi . $ff);
        $X8 = base64_encode($sz);
        $xx = "\x2d\x2d\55\55\55\x42\105\x47\x49\116\40\120\125\x42\x4c\111\x43\40\113\x45\131\x2d\x2d\55\x2d\x2d\12";
        $Wx = 0;
        ZU:
        if (!($QC = substr($X8, $Wx, 64))) {
            goto y5;
        }
        $xx = $xx . $QC . "\xa";
        $Wx += 64;
        goto ZU;
        y5:
        return $xx . "\55\x2d\55\x2d\55\x45\x4e\x44\x20\x50\x55\x42\x4c\111\103\x20\x4b\x45\131\x2d\x2d\x2d\55\x2d\xa";
    }
    public function serializeKey($oH)
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
    public static function fromEncryptedKeyElement(DOMElement $gO)
    {
        $SC = new XMLSecEnc();
        $SC->setNode($gO);
        if ($ie = $SC->locateKey()) {
            goto P1;
        }
        throw new Exception("\125\x6e\141\142\x6c\x65\x20\x74\157\40\x6c\x6f\x63\x61\164\145\40\x61\154\147\157\162\151\x74\150\155\40\146\x6f\x72\x20\x74\150\x69\163\x20\105\x6e\143\162\x79\160\164\145\144\x20\113\x65\171");
        P1:
        $ie->isEncrypted = true;
        $ie->encryptedCtx = $SC;
        XMLSecEnc::staticLocateKeyInfo($ie, $gO);
        return $ie;
    }
}
