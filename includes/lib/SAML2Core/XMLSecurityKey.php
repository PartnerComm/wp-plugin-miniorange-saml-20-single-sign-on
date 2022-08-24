<?php


namespace RobRichards\XMLSecLibs;

use DOMElement;
use Exception;
class XMLSecurityKey
{
    const TRIPLEDES_CBC = "\150\164\x74\x70\x3a\57\57\167\167\167\56\167\63\56\157\162\147\x2f\x32\x30\x30\61\57\x30\64\57\x78\155\154\145\156\x63\x23\164\162\151\160\154\x65\144\145\x73\x2d\x63\142\143";
    const AES128_CBC = "\150\x74\164\160\x3a\57\57\x77\167\167\56\167\x33\56\x6f\x72\147\x2f\x32\60\x30\x31\x2f\x30\x34\57\170\155\154\x65\156\x63\x23\141\x65\163\61\x32\x38\x2d\x63\x62\x63";
    const AES192_CBC = "\150\164\164\x70\x3a\x2f\57\167\167\167\56\x77\63\56\157\x72\x67\x2f\x32\60\x30\x31\x2f\60\64\x2f\170\155\154\145\x6e\x63\x23\141\145\163\61\71\x32\55\x63\x62\143";
    const AES256_CBC = "\150\x74\x74\x70\72\57\57\x77\167\167\56\x77\x33\x2e\157\162\147\57\x32\60\60\61\x2f\60\64\x2f\x78\155\154\x65\x6e\x63\x23\141\x65\163\x32\65\66\55\x63\x62\143";
    const AES128_GCM = "\x68\x74\164\160\x3a\57\57\x77\x77\x77\56\167\63\56\157\162\147\57\x32\x30\x30\x39\x2f\170\x6d\x6c\x65\x6e\143\61\x31\x23\x61\145\163\x31\x32\70\55\147\143\x6d";
    const AES192_GCM = "\x68\x74\x74\x70\x3a\57\57\167\167\x77\56\x77\x33\56\157\162\147\57\x32\60\x30\71\57\170\x6d\154\145\156\143\x31\x31\43\x61\145\x73\x31\71\x32\x2d\147\x63\155";
    const AES256_GCM = "\150\x74\164\160\x3a\x2f\57\167\167\167\56\167\x33\56\157\162\x67\57\x32\x30\x30\71\x2f\170\155\154\145\x6e\x63\61\x31\x23\141\145\x73\62\x35\x36\x2d\x67\x63\x6d";
    const RSA_1_5 = "\x68\x74\164\x70\x3a\57\57\167\167\167\56\167\63\56\157\162\x67\x2f\x32\x30\x30\61\57\60\x34\x2f\170\x6d\154\x65\x6e\x63\x23\x72\163\141\55\61\x5f\65";
    const RSA_OAEP_MGF1P = "\x68\x74\x74\160\72\57\57\167\x77\167\56\x77\63\x2e\x6f\x72\x67\x2f\x32\60\60\x31\57\60\64\57\x78\155\154\x65\x6e\143\43\x72\163\x61\x2d\x6f\x61\145\x70\55\155\x67\x66\x31\x70";
    const RSA_OAEP = "\150\x74\164\160\x3a\x2f\x2f\167\x77\x77\56\x77\x33\x2e\157\x72\147\57\x32\x30\x30\71\x2f\170\x6d\x6c\145\x6e\x63\61\x31\x23\x72\x73\x61\55\157\x61\145\x70";
    const DSA_SHA1 = "\x68\164\x74\x70\72\x2f\x2f\167\167\167\56\167\x33\56\157\x72\147\x2f\62\x30\x30\x30\x2f\x30\71\x2f\170\x6d\x6c\x64\163\151\147\x23\x64\x73\x61\55\x73\150\141\61";
    const RSA_SHA1 = "\150\164\164\x70\72\57\57\x77\167\x77\56\167\63\x2e\x6f\162\147\x2f\x32\60\x30\x30\x2f\x30\x39\x2f\x78\x6d\x6c\x64\x73\151\x67\x23\x72\x73\141\55\x73\x68\141\x31";
    const RSA_SHA256 = "\x68\x74\164\x70\x3a\x2f\57\167\167\167\56\x77\63\56\x6f\x72\x67\x2f\x32\x30\x30\61\x2f\60\x34\x2f\x78\155\x6c\x64\x73\x69\x67\55\155\157\x72\145\x23\162\163\x61\x2d\163\x68\141\x32\x35\x36";
    const RSA_SHA384 = "\150\x74\x74\160\x3a\x2f\57\167\x77\167\x2e\167\63\56\157\162\147\x2f\62\60\x30\61\57\60\x34\x2f\x78\155\154\144\163\x69\x67\55\155\x6f\x72\x65\x23\x72\163\x61\55\x73\x68\141\63\70\64";
    const RSA_SHA512 = "\150\164\164\160\72\x2f\57\x77\x77\x77\56\x77\x33\56\x6f\162\147\x2f\62\x30\x30\61\57\60\64\57\170\155\154\x64\163\151\x67\55\x6d\x6f\x72\145\43\x72\x73\141\x2d\163\x68\x61\x35\x31\62";
    const HMAC_SHA1 = "\150\x74\164\160\x3a\x2f\57\167\167\x77\56\x77\63\x2e\x6f\x72\147\x2f\x32\60\60\x30\x2f\60\71\57\x78\x6d\x6c\144\163\x69\x67\x23\x68\155\x61\x63\x2d\163\x68\141\x31";
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
    public function __construct($nF, $Y2 = null)
    {
        switch ($nF) {
            case self::TRIPLEDES_CBC:
                $this->cryptParams["\154\151\x62\162\x61\162\x79"] = "\x6f\160\145\156\x73\x73\x6c";
                $this->cryptParams["\x63\151\160\x68\x65\162"] = "\144\145\163\55\145\x64\x65\x33\x2d\143\142\x63";
                $this->cryptParams["\164\x79\x70\145"] = "\x73\171\155\x6d\145\164\162\x69\x63";
                $this->cryptParams["\155\x65\x74\x68\157\144"] = "\x68\164\x74\x70\x3a\57\57\167\x77\x77\x2e\167\63\56\157\162\147\57\x32\60\x30\x31\57\x30\x34\57\x78\x6d\154\145\156\143\43\x74\162\151\x70\154\x65\x64\x65\163\55\x63\x62\x63";
                $this->cryptParams["\153\x65\171\163\x69\x7a\145"] = 24;
                $this->cryptParams["\142\x6c\157\x63\x6b\163\x69\x7a\x65"] = 8;
                goto oF;
            case self::AES128_CBC:
                $this->cryptParams["\154\151\142\x72\x61\x72\171"] = "\x6f\160\145\156\163\163\x6c";
                $this->cryptParams["\143\151\x70\x68\145\x72"] = "\x61\145\163\x2d\x31\x32\x38\x2d\x63\x62\143";
                $this->cryptParams["\x74\x79\160\x65"] = "\x73\x79\x6d\x6d\145\164\x72\x69\x63";
                $this->cryptParams["\x6d\145\164\x68\157\144"] = "\x68\164\x74\x70\72\57\57\x77\x77\167\56\x77\x33\x2e\x6f\162\147\57\62\x30\x30\x31\x2f\60\x34\x2f\x78\x6d\x6c\145\156\x63\43\141\145\x73\61\62\70\x2d\143\x62\x63";
                $this->cryptParams["\153\x65\171\163\x69\x7a\145"] = 16;
                $this->cryptParams["\142\154\x6f\x63\153\x73\x69\172\x65"] = 16;
                goto oF;
            case self::AES192_CBC:
                $this->cryptParams["\154\x69\142\x72\x61\x72\171"] = "\x6f\160\x65\156\x73\163\154";
                $this->cryptParams["\143\x69\x70\150\x65\162"] = "\141\x65\x73\x2d\x31\71\62\x2d\x63\x62\143";
                $this->cryptParams["\x74\x79\x70\145"] = "\x73\x79\155\155\x65\x74\162\151\x63";
                $this->cryptParams["\155\x65\164\x68\x6f\x64"] = "\x68\164\x74\x70\72\x2f\57\167\x77\167\56\167\63\56\x6f\x72\x67\57\62\x30\60\61\57\60\x34\x2f\170\x6d\x6c\x65\156\x63\x23\141\x65\163\x31\71\62\x2d\143\x62\143";
                $this->cryptParams["\153\145\171\163\151\x7a\x65"] = 24;
                $this->cryptParams["\x62\x6c\157\143\x6b\x73\x69\x7a\145"] = 16;
                goto oF;
            case self::AES256_CBC:
                $this->cryptParams["\x6c\x69\x62\162\x61\x72\x79"] = "\157\x70\145\x6e\163\163\x6c";
                $this->cryptParams["\x63\151\160\x68\145\x72"] = "\141\x65\163\55\62\65\x36\x2d\x63\x62\x63";
                $this->cryptParams["\164\171\160\x65"] = "\163\171\x6d\x6d\145\x74\162\151\x63";
                $this->cryptParams["\x6d\145\164\x68\x6f\144"] = "\x68\164\x74\x70\72\57\x2f\x77\x77\167\56\167\63\56\x6f\x72\x67\x2f\x32\60\x30\61\57\x30\x34\57\170\x6d\x6c\145\156\x63\43\141\145\163\x32\x35\x36\x2d\x63\x62\143";
                $this->cryptParams["\x6b\x65\x79\x73\x69\172\x65"] = 32;
                $this->cryptParams["\x62\x6c\157\143\153\x73\151\x7a\x65"] = 16;
                goto oF;
            case self::AES128_GCM:
                $this->cryptParams["\x6c\x69\x62\162\141\x72\x79"] = "\x6f\x70\145\x6e\x73\x73\x6c";
                $this->cryptParams["\x63\151\x70\150\145\x72"] = "\141\x65\163\x2d\61\62\70\55\147\143\x6d";
                $this->cryptParams["\164\x79\x70\145"] = "\x73\x79\x6d\x6d\x65\164\x72\x69\143";
                $this->cryptParams["\x6d\x65\x74\150\x6f\144"] = "\150\164\x74\x70\72\x2f\57\167\x77\167\x2e\x77\x33\x2e\x6f\x72\x67\57\62\x30\60\x39\x2f\170\x6d\x6c\x65\x6e\143\x31\x31\43\141\x65\x73\x31\62\x38\55\x67\x63\x6d";
                $this->cryptParams["\x6b\x65\171\x73\151\172\145"] = 16;
                $this->cryptParams["\x62\154\157\x63\153\x73\151\x7a\x65"] = 16;
                goto oF;
            case self::AES192_GCM:
                $this->cryptParams["\154\x69\142\162\141\162\x79"] = "\x6f\160\x65\156\x73\163\154";
                $this->cryptParams["\143\x69\160\x68\x65\x72"] = "\141\145\163\55\61\71\62\x2d\x67\143\155";
                $this->cryptParams["\x74\171\160\x65"] = "\x73\x79\155\x6d\145\164\x72\x69\x63";
                $this->cryptParams["\155\145\x74\x68\x6f\x64"] = "\x68\x74\164\x70\x3a\57\x2f\167\167\x77\x2e\x77\63\x2e\x6f\162\x67\57\62\x30\x30\71\x2f\x78\155\154\x65\x6e\143\61\x31\x23\141\x65\163\61\x39\62\55\147\143\155";
                $this->cryptParams["\x6b\x65\x79\x73\x69\172\x65"] = 24;
                $this->cryptParams["\x62\154\157\143\x6b\163\151\172\x65"] = 16;
                goto oF;
            case self::AES256_GCM:
                $this->cryptParams["\x6c\x69\x62\x72\x61\x72\x79"] = "\157\x70\x65\x6e\x73\163\154";
                $this->cryptParams["\x63\151\x70\x68\x65\162"] = "\141\x65\x73\x2d\62\65\x36\55\x67\143\x6d";
                $this->cryptParams["\x74\171\x70\145"] = "\x73\x79\155\x6d\145\x74\x72\151\x63";
                $this->cryptParams["\x6d\x65\164\x68\157\144"] = "\150\x74\x74\x70\x3a\57\57\167\167\x77\56\x77\63\x2e\x6f\162\x67\x2f\x32\x30\60\71\x2f\x78\x6d\154\145\x6e\143\x31\61\x23\x61\x65\163\x32\65\66\x2d\147\143\155";
                $this->cryptParams["\x6b\x65\171\x73\151\x7a\x65"] = 32;
                $this->cryptParams["\142\x6c\157\x63\x6b\x73\x69\172\x65"] = 16;
                goto oF;
            case self::RSA_1_5:
                $this->cryptParams["\154\x69\x62\162\x61\162\171"] = "\157\160\x65\x6e\x73\x73\154";
                $this->cryptParams["\160\141\144\x64\151\x6e\x67"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\155\x65\x74\x68\157\144"] = "\x68\164\164\160\x3a\57\57\167\167\x77\56\167\x33\56\x6f\162\147\x2f\x32\x30\x30\x31\57\60\x34\57\170\x6d\154\x65\156\x63\x23\x72\163\x61\x2d\61\x5f\65";
                if (!(is_array($Y2) && !empty($Y2["\164\171\160\x65"]))) {
                    goto h0;
                }
                if (!($Y2["\164\171\x70\145"] == "\160\x75\142\x6c\151\x63" || $Y2["\x74\x79\x70\145"] == "\160\162\x69\166\x61\164\145")) {
                    goto GB;
                }
                $this->cryptParams["\164\x79\160\145"] = $Y2["\x74\x79\x70\x65"];
                goto oF;
                GB:
                h0:
                throw new Exception("\x43\145\162\x74\x69\146\151\x63\141\x74\145\x20\x22\x74\171\x70\145\42\40\x28\160\162\x69\x76\141\164\x65\x2f\x70\165\142\x6c\151\143\51\x20\x6d\165\x73\x74\40\142\x65\x20\x70\x61\x73\x73\x65\x64\40\166\151\x61\40\x70\141\x72\141\x6d\x65\x74\x65\162\x73");
            case self::RSA_OAEP_MGF1P:
                $this->cryptParams["\x6c\x69\142\x72\x61\x72\x79"] = "\157\x70\145\156\x73\163\x6c";
                $this->cryptParams["\160\141\144\x64\x69\156\x67"] = OPENSSL_PKCS1_OAEP_PADDING;
                $this->cryptParams["\155\x65\x74\150\157\144"] = "\150\164\x74\x70\x3a\x2f\57\x77\167\x77\x2e\167\x33\x2e\157\x72\147\57\62\x30\x30\x31\x2f\x30\64\57\170\x6d\x6c\145\x6e\x63\x23\x72\163\141\55\157\141\x65\x70\55\x6d\x67\146\x31\160";
                $this->cryptParams["\150\x61\163\x68"] = null;
                if (!(is_array($Y2) && !empty($Y2["\x74\x79\160\x65"]))) {
                    goto TE;
                }
                if (!($Y2["\164\x79\x70\145"] == "\160\165\142\154\x69\x63" || $Y2["\x74\x79\x70\x65"] == "\160\162\151\x76\141\164\145")) {
                    goto a7;
                }
                $this->cryptParams["\164\x79\x70\145"] = $Y2["\x74\171\x70\x65"];
                goto oF;
                a7:
                TE:
                throw new Exception("\103\x65\162\164\x69\x66\x69\x63\141\x74\145\x20\x22\164\x79\x70\x65\42\40\50\x70\162\151\166\x61\164\145\x2f\x70\165\x62\x6c\x69\x63\51\40\155\x75\163\x74\x20\142\145\x20\x70\141\163\x73\145\144\40\x76\151\x61\40\x70\x61\x72\141\155\x65\164\145\x72\163");
            case self::RSA_OAEP:
                $this->cryptParams["\154\151\x62\x72\141\162\171"] = "\157\x70\x65\x6e\x73\x73\x6c";
                $this->cryptParams["\160\141\x64\144\x69\x6e\x67"] = OPENSSL_PKCS1_OAEP_PADDING;
                $this->cryptParams["\155\145\x74\150\157\x64"] = "\150\x74\164\160\x3a\57\57\x77\x77\x77\56\x77\63\x2e\157\162\147\x2f\62\x30\x30\71\57\170\x6d\154\x65\156\x63\x31\61\x23\162\163\141\55\157\x61\x65\160";
                $this->cryptParams["\150\141\163\x68"] = "\x68\x74\x74\160\x3a\57\x2f\167\167\167\x2e\x77\63\x2e\x6f\x72\147\x2f\62\x30\60\x39\x2f\170\155\x6c\x65\x6e\143\x31\61\x23\x6d\x67\146\61\163\x68\x61\61";
                if (!(is_array($Y2) && !empty($Y2["\x74\171\x70\145"]))) {
                    goto Ti;
                }
                if (!($Y2["\164\x79\160\x65"] == "\160\165\142\x6c\x69\143" || $Y2["\x74\x79\160\x65"] == "\160\162\x69\166\141\x74\145")) {
                    goto Ih;
                }
                $this->cryptParams["\x74\x79\x70\x65"] = $Y2["\164\x79\160\145"];
                goto oF;
                Ih:
                Ti:
                throw new Exception("\x43\x65\162\164\151\x66\x69\x63\x61\164\145\x20\x22\164\x79\160\x65\x22\40\50\x70\x72\151\x76\x61\164\x65\x2f\160\x75\142\154\151\x63\51\40\155\x75\x73\164\x20\142\x65\x20\x70\141\x73\x73\x65\144\40\166\151\x61\40\x70\x61\162\141\155\x65\x74\145\162\163");
            case self::RSA_SHA1:
                $this->cryptParams["\x6c\x69\142\162\x61\162\x79"] = "\157\x70\145\x6e\x73\163\x6c";
                $this->cryptParams["\155\x65\164\150\x6f\x64"] = "\x68\x74\x74\160\x3a\57\57\x77\167\x77\x2e\167\x33\x2e\x6f\162\147\x2f\x32\x30\x30\x30\57\60\x39\x2f\170\x6d\154\144\163\x69\x67\43\x72\x73\x61\55\163\150\141\x31";
                $this->cryptParams["\x70\141\144\x64\x69\x6e\x67"] = OPENSSL_PKCS1_PADDING;
                if (!(is_array($Y2) && !empty($Y2["\x74\171\160\x65"]))) {
                    goto dy;
                }
                if (!($Y2["\164\x79\160\x65"] == "\160\x75\142\x6c\x69\x63" || $Y2["\x74\171\x70\145"] == "\x70\x72\x69\x76\x61\x74\145")) {
                    goto JG;
                }
                $this->cryptParams["\x74\x79\x70\x65"] = $Y2["\x74\171\x70\145"];
                goto oF;
                JG:
                dy:
                throw new Exception("\x43\145\162\x74\x69\146\151\x63\141\164\x65\40\42\164\x79\x70\145\42\40\50\x70\x72\151\166\x61\x74\145\x2f\x70\x75\x62\154\x69\x63\51\40\155\x75\163\164\x20\142\x65\40\x70\x61\163\163\145\x64\40\x76\x69\141\x20\x70\x61\162\141\x6d\x65\x74\x65\162\163");
            case self::RSA_SHA256:
                $this->cryptParams["\154\x69\x62\x72\141\x72\x79"] = "\157\x70\145\x6e\x73\163\154";
                $this->cryptParams["\155\x65\x74\x68\157\144"] = "\x68\x74\x74\160\72\57\x2f\167\x77\x77\56\167\63\x2e\157\162\147\57\62\x30\60\x31\x2f\x30\64\57\170\155\x6c\144\x73\x69\x67\x2d\x6d\x6f\162\145\43\162\x73\141\55\x73\x68\141\x32\65\66";
                $this->cryptParams["\x70\x61\x64\144\x69\156\x67"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x64\x69\147\145\163\x74"] = "\x53\110\x41\x32\65\x36";
                if (!(is_array($Y2) && !empty($Y2["\164\171\x70\x65"]))) {
                    goto En;
                }
                if (!($Y2["\x74\171\x70\145"] == "\x70\x75\x62\154\151\143" || $Y2["\x74\x79\x70\145"] == "\x70\x72\151\166\x61\164\x65")) {
                    goto NG;
                }
                $this->cryptParams["\164\171\160\x65"] = $Y2["\x74\x79\x70\x65"];
                goto oF;
                NG:
                En:
                throw new Exception("\x43\145\162\164\151\146\151\143\x61\164\x65\40\42\x74\x79\x70\145\42\x20\50\160\x72\x69\166\141\x74\x65\x2f\160\x75\x62\x6c\151\x63\51\x20\155\165\163\164\x20\142\x65\x20\160\141\163\163\x65\144\40\166\x69\x61\40\160\141\162\x61\x6d\145\164\145\162\x73");
            case self::RSA_SHA384:
                $this->cryptParams["\x6c\x69\x62\162\x61\x72\171"] = "\x6f\160\145\x6e\x73\x73\x6c";
                $this->cryptParams["\x6d\x65\164\x68\157\x64"] = "\x68\x74\x74\x70\72\x2f\x2f\167\167\x77\56\167\63\x2e\157\162\147\x2f\x32\x30\x30\61\57\x30\64\57\x78\x6d\154\x64\163\151\x67\x2d\155\157\x72\x65\43\x72\163\x61\x2d\x73\150\141\63\x38\64";
                $this->cryptParams["\x70\141\x64\x64\x69\156\x67"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x64\x69\x67\145\163\x74"] = "\123\110\101\x33\x38\64";
                if (!(is_array($Y2) && !empty($Y2["\164\x79\160\145"]))) {
                    goto sd;
                }
                if (!($Y2["\164\x79\x70\x65"] == "\x70\165\x62\154\151\143" || $Y2["\164\x79\160\x65"] == "\160\162\151\x76\x61\x74\145")) {
                    goto dj;
                }
                $this->cryptParams["\164\x79\160\145"] = $Y2["\164\171\160\x65"];
                goto oF;
                dj:
                sd:
                throw new Exception("\103\145\x72\164\x69\146\151\x63\141\164\x65\x20\42\164\171\x70\x65\42\x20\50\x70\162\x69\166\141\x74\145\57\x70\x75\x62\x6c\x69\x63\x29\40\155\x75\x73\x74\x20\142\145\40\160\x61\163\x73\145\x64\x20\x76\x69\141\40\x70\141\162\141\x6d\x65\x74\x65\x72\163");
            case self::RSA_SHA512:
                $this->cryptParams["\x6c\x69\x62\162\141\x72\171"] = "\157\x70\145\156\163\163\154";
                $this->cryptParams["\x6d\145\164\x68\x6f\x64"] = "\x68\x74\x74\x70\x3a\x2f\57\x77\167\167\x2e\x77\63\56\157\162\147\x2f\62\60\x30\61\57\60\64\x2f\x78\155\154\144\163\x69\x67\x2d\x6d\x6f\162\145\x23\162\x73\x61\x2d\x73\150\141\65\61\x32";
                $this->cryptParams["\160\141\144\x64\x69\156\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\144\151\x67\x65\x73\164"] = "\x53\110\101\65\x31\x32";
                if (!(is_array($Y2) && !empty($Y2["\x74\171\160\145"]))) {
                    goto kl;
                }
                if (!($Y2["\x74\x79\x70\145"] == "\160\x75\x62\x6c\151\x63" || $Y2["\x74\x79\x70\145"] == "\160\x72\151\x76\x61\x74\x65")) {
                    goto pv;
                }
                $this->cryptParams["\x74\171\160\x65"] = $Y2["\164\x79\x70\145"];
                goto oF;
                pv:
                kl:
                throw new Exception("\x43\145\162\164\x69\x66\151\143\x61\164\x65\x20\42\x74\171\160\x65\x22\40\x28\160\162\151\x76\x61\x74\x65\x2f\160\165\x62\x6c\151\143\x29\x20\x6d\x75\163\164\x20\x62\x65\40\160\141\x73\163\145\x64\40\x76\x69\141\40\x70\x61\162\x61\x6d\145\x74\x65\x72\163");
            case self::HMAC_SHA1:
                $this->cryptParams["\x6c\151\x62\x72\x61\162\x79"] = $nF;
                $this->cryptParams["\155\145\164\150\x6f\144"] = "\x68\x74\x74\x70\72\x2f\x2f\167\167\x77\56\x77\63\x2e\157\x72\147\x2f\x32\x30\x30\60\x2f\x30\71\x2f\170\155\154\x64\x73\x69\147\43\150\x6d\141\143\x2d\x73\150\141\x31";
                goto oF;
            default:
                throw new Exception("\x49\156\166\x61\154\151\x64\40\x4b\x65\171\x20\x54\171\x70\145");
        }
        HM:
        oF:
        $this->type = $nF;
    }
    public function getSymmetricKeySize()
    {
        if (isset($this->cryptParams["\x6b\145\171\163\x69\x7a\145"])) {
            goto io;
        }
        return null;
        io:
        return $this->cryptParams["\153\145\171\x73\151\172\145"];
    }
    public function generateSessionKey()
    {
        if (isset($this->cryptParams["\153\145\x79\163\x69\172\145"])) {
            goto us;
        }
        throw new Exception("\125\x6e\x6b\x6e\157\167\x6e\x20\x6b\145\171\x20\x73\151\172\145\x20\146\x6f\162\x20\x74\x79\x70\x65\40\x22" . $this->type . "\42\x2e");
        us:
        $ln = $this->cryptParams["\x6b\145\x79\163\x69\x7a\x65"];
        $N5 = openssl_random_pseudo_bytes($ln);
        if (!($this->type === self::TRIPLEDES_CBC)) {
            goto cl;
        }
        $Sm = 0;
        O8:
        if (!($Sm < strlen($N5))) {
            goto rU;
        }
        $a7 = ord($N5[$Sm]) & 0xfe;
        $wP = 1;
        $KN = 1;
        YL:
        if (!($KN < 8)) {
            goto V_;
        }
        $wP ^= $a7 >> $KN & 1;
        pC:
        $KN++;
        goto YL;
        V_:
        $a7 |= $wP;
        $N5[$Sm] = chr($a7);
        Wo:
        $Sm++;
        goto O8;
        rU:
        cl:
        $this->key = $N5;
        return $N5;
    }
    public static function getRawThumbprint($V1)
    {
        $EQ = explode("\12", $V1);
        $pm = '';
        $yv = false;
        foreach ($EQ as $oY) {
            if (!$yv) {
                goto gm;
            }
            if (!(strncmp($oY, "\x2d\55\x2d\55\55\x45\116\x44\40\x43\x45\122\x54\111\x46\111\x43\101\x54\105", 20) == 0)) {
                goto SJ;
            }
            goto zm;
            SJ:
            $pm .= trim($oY);
            goto Iu;
            gm:
            if (!(strncmp($oY, "\x2d\x2d\55\55\55\x42\105\x47\111\x4e\x20\x43\105\x52\124\111\106\x49\103\101\124\105", 22) == 0)) {
                goto Qi;
            }
            $yv = true;
            Qi:
            Iu:
            kj:
        }
        zm:
        if (empty($pm)) {
            goto W8;
        }
        return strtolower(sha1(base64_decode($pm)));
        W8:
        return null;
    }
    public function loadKey($N5, $SE = false, $l1 = false)
    {
        if ($SE) {
            goto se;
        }
        $this->key = $N5;
        goto nW;
        se:
        $this->key = file_get_contents($N5);
        nW:
        if ($l1) {
            goto bu;
        }
        $this->x509Certificate = null;
        goto mV;
        bu:
        $this->key = openssl_x509_read($this->key);
        openssl_x509_export($this->key, $Nl);
        $this->x509Certificate = $Nl;
        $this->key = $Nl;
        mV:
        if (!($this->cryptParams["\154\151\x62\x72\x61\x72\171"] == "\157\x70\145\x6e\x73\x73\154")) {
            goto Zb;
        }
        switch ($this->cryptParams["\164\171\x70\x65"]) {
            case "\x70\x75\x62\154\151\x63":
                if (!$l1) {
                    goto Fs;
                }
                $this->X509Thumbprint = self::getRawThumbprint($this->key);
                Fs:
                $this->key = openssl_get_publickey($this->key);
                if ($this->key) {
                    goto Rq;
                }
                throw new Exception("\x55\x6e\x61\142\154\145\x20\164\x6f\40\145\170\164\x72\141\143\164\40\x70\165\x62\x6c\x69\x63\x20\153\x65\171");
                Rq:
                goto TA;
            case "\160\x72\x69\x76\141\164\x65":
                $this->key = openssl_get_privatekey($this->key, $this->passphrase);
                goto TA;
            case "\163\x79\x6d\x6d\x65\164\x72\x69\x63":
                if (!(strlen($this->key) < $this->cryptParams["\153\x65\171\x73\151\x7a\145"])) {
                    goto E1;
                }
                throw new Exception("\113\x65\171\x20\155\165\163\x74\x20\x63\157\156\x74\141\151\x6e\x20\x61\x74\x20\154\x65\141\x73\x74\x20" . $this->cryptParams["\x6b\x65\x79\163\x69\x7a\x65"] . "\x20\143\150\x61\162\141\143\164\145\x72\163\x20\x66\157\x72\40\164\x68\151\163\40\143\151\x70\x68\145\162\x2c\40\x63\157\x6e\164\x61\x69\156\163\x20" . strlen($this->key));
                E1:
                goto TA;
            default:
                throw new Exception("\x55\x6e\153\156\x6f\x77\156\x20\x74\x79\x70\x65");
        }
        fS:
        TA:
        Zb:
    }
    private function padISO10126($pm, $XQ)
    {
        if (!($XQ > 256)) {
            goto WV;
        }
        throw new Exception("\x42\x6c\157\143\153\40\x73\151\x7a\145\40\150\x69\x67\150\145\162\40\164\150\141\x6e\40\62\65\x36\x20\156\157\x74\x20\x61\154\x6c\157\x77\145\x64");
        WV:
        $IS = $XQ - strlen($pm) % $XQ;
        $Uu = chr($IS);
        return $pm . str_repeat($Uu, $IS);
    }
    private function unpadISO10126($pm)
    {
        $IS = substr($pm, -1);
        $fS = ord($IS);
        return substr($pm, 0, -$fS);
    }
    private function encryptSymmetric($pm)
    {
        $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cryptParams["\143\x69\x70\x68\145\162"]));
        $x4 = null;
        if (in_array($this->cryptParams["\x63\151\160\150\145\162"], ["\141\x65\x73\55\61\x32\70\55\x67\x63\155", "\141\145\x73\55\61\x39\62\x2d\x67\x63\155", "\141\x65\x73\55\62\65\66\x2d\147\x63\155"])) {
            goto cU;
        }
        $pm = $this->padISO10126($pm, $this->cryptParams["\x62\154\157\143\153\163\x69\172\x65"]);
        $el = openssl_encrypt($pm, $this->cryptParams["\x63\151\x70\x68\x65\x72"], $this->key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $this->iv);
        goto h3;
        cU:
        if (!(version_compare(PHP_VERSION, "\67\x2e\61\x2e\x30") < 0)) {
            goto Kb;
        }
        throw new Exception("\120\x48\120\40\x37\x2e\x31\56\60\40\151\x73\x20\162\x65\x71\x75\151\162\x65\x64\x20\x74\157\x20\165\163\x65\x20\x41\x45\123\x20\107\x43\115\x20\141\154\147\157\x72\x69\x74\x68\155\x73");
        Kb:
        $x4 = openssl_random_pseudo_bytes(self::AUTHTAG_LENGTH);
        $el = openssl_encrypt($pm, $this->cryptParams["\143\151\x70\150\145\162"], $this->key, OPENSSL_RAW_DATA, $this->iv, $x4);
        h3:
        if (!(false === $el)) {
            goto Cv;
        }
        throw new Exception("\106\141\151\154\x75\x72\145\40\x65\156\x63\162\x79\x70\164\151\x6e\x67\40\x44\141\x74\141\40\x28\x6f\x70\145\156\x73\x73\x6c\x20\163\x79\155\x6d\x65\164\162\x69\x63\x29\x20\55\x20" . openssl_error_string());
        Cv:
        return $this->iv . $el . $x4;
    }
    private function decryptSymmetric($pm)
    {
        $qq = openssl_cipher_iv_length($this->cryptParams["\143\151\160\150\145\x72"]);
        $this->iv = substr($pm, 0, $qq);
        $pm = substr($pm, $qq);
        $x4 = null;
        if (in_array($this->cryptParams["\x63\151\x70\150\145\162"], ["\141\x65\x73\55\x31\x32\x38\55\147\x63\155", "\141\x65\x73\x2d\x31\71\62\x2d\x67\143\155", "\x61\x65\163\55\x32\65\66\55\x67\143\155"])) {
            goto iO;
        }
        $Xs = openssl_decrypt($pm, $this->cryptParams["\x63\151\x70\150\x65\x72"], $this->key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $this->iv);
        goto Bl;
        iO:
        if (!(version_compare(PHP_VERSION, "\67\x2e\x31\56\60") < 0)) {
            goto MZ;
        }
        throw new Exception("\120\110\x50\40\67\x2e\x31\56\60\x20\151\163\40\162\x65\161\x75\151\162\x65\144\40\164\x6f\x20\x75\163\x65\x20\101\105\123\40\x47\x43\115\40\141\154\147\157\x72\151\164\150\155\x73");
        MZ:
        $Zl = 0 - self::AUTHTAG_LENGTH;
        $x4 = substr($pm, $Zl);
        $pm = substr($pm, 0, $Zl);
        $Xs = openssl_decrypt($pm, $this->cryptParams["\143\151\160\x68\145\x72"], $this->key, OPENSSL_RAW_DATA, $this->iv, $x4);
        Bl:
        if (!(false === $Xs)) {
            goto yT;
        }
        throw new Exception("\x46\141\151\x6c\x75\162\145\x20\x64\145\143\162\171\x70\x74\151\x6e\x67\40\x44\141\164\x61\40\50\157\x70\145\x6e\163\163\154\40\163\x79\155\x6d\145\164\162\x69\143\51\40\x2d\40" . openssl_error_string());
        yT:
        return null !== $x4 ? $Xs : $this->unpadISO10126($Xs);
    }
    private function encryptPublic($pm)
    {
        if (openssl_public_encrypt($pm, $el, $this->key, $this->cryptParams["\x70\141\144\144\x69\x6e\x67"])) {
            goto PJ;
        }
        throw new Exception("\x46\141\151\x6c\165\162\x65\40\145\156\x63\162\x79\160\x74\151\156\x67\x20\104\141\164\x61\x20\x28\157\160\145\x6e\163\163\x6c\40\160\165\142\x6c\x69\x63\x29\x20\55\40" . openssl_error_string());
        PJ:
        return $el;
    }
    private function decryptPublic($pm)
    {
        if (openssl_public_decrypt($pm, $Xs, $this->key, $this->cryptParams["\x70\141\144\x64\x69\x6e\x67"])) {
            goto JB;
        }
        throw new Exception("\106\141\151\154\x75\162\x65\40\x64\x65\x63\x72\171\160\x74\151\x6e\x67\x20\104\141\x74\141\40\x28\x6f\x70\x65\x6e\x73\163\154\x20\x70\x75\142\x6c\x69\143\51\40\55\40" . openssl_error_string());
        JB:
        return $Xs;
    }
    private function encryptPrivate($pm)
    {
        if (openssl_private_encrypt($pm, $el, $this->key, $this->cryptParams["\x70\x61\x64\x64\151\156\x67"])) {
            goto Uo;
        }
        throw new Exception("\x46\x61\x69\x6c\x75\x72\x65\40\145\x6e\x63\162\171\x70\x74\151\156\x67\40\x44\x61\164\141\x20\x28\x6f\x70\x65\156\x73\x73\x6c\x20\160\162\151\166\x61\x74\145\51\40\x2d\x20" . openssl_error_string());
        Uo:
        return $el;
    }
    private function decryptPrivate($pm)
    {
        if (openssl_private_decrypt($pm, $Xs, $this->key, $this->cryptParams["\x70\141\144\144\151\x6e\147"])) {
            goto Ue;
        }
        throw new Exception("\x46\141\151\x6c\x75\x72\x65\x20\144\x65\x63\162\171\x70\164\x69\156\x67\x20\x44\141\164\x61\40\x28\x6f\160\x65\x6e\163\163\x6c\x20\160\162\151\x76\141\x74\145\x29\40\x2d\x20" . openssl_error_string());
        Ue:
        return $Xs;
    }
    private function signOpenSSL($pm)
    {
        $WV = OPENSSL_ALGO_SHA1;
        if (empty($this->cryptParams["\144\151\147\x65\x73\x74"])) {
            goto xf;
        }
        $WV = $this->cryptParams["\144\151\x67\x65\163\x74"];
        xf:
        if (openssl_sign($pm, $Yp, $this->key, $WV)) {
            goto Ld;
        }
        throw new Exception("\106\141\x69\x6c\165\162\145\x20\x53\151\x67\x6e\x69\x6e\x67\x20\104\141\x74\x61\72\40" . openssl_error_string() . "\x20\x2d\x20" . $WV);
        Ld:
        return $Yp;
    }
    private function verifyOpenSSL($pm, $Yp)
    {
        $WV = OPENSSL_ALGO_SHA1;
        if (empty($this->cryptParams["\144\x69\147\x65\163\164"])) {
            goto TI;
        }
        $WV = $this->cryptParams["\144\151\x67\145\x73\x74"];
        TI:
        return openssl_verify($pm, $Yp, $this->key, $WV);
    }
    public function encryptData($pm)
    {
        if (!($this->cryptParams["\x6c\151\142\x72\141\x72\171"] === "\157\x70\145\156\163\163\154")) {
            goto F9;
        }
        switch ($this->cryptParams["\164\171\x70\145"]) {
            case "\x73\171\155\155\145\164\162\x69\x63":
                return $this->encryptSymmetric($pm);
            case "\x70\165\x62\154\151\143":
                return $this->encryptPublic($pm);
            case "\x70\x72\151\x76\x61\x74\x65":
                return $this->encryptPrivate($pm);
        }
        pJ:
        dw:
        F9:
    }
    public function decryptData($pm)
    {
        if (!($this->cryptParams["\x6c\x69\142\162\141\x72\171"] === "\x6f\x70\145\x6e\163\163\154")) {
            goto j2;
        }
        switch ($this->cryptParams["\164\x79\160\145"]) {
            case "\163\x79\x6d\x6d\145\164\162\151\x63":
                return $this->decryptSymmetric($pm);
            case "\160\165\x62\x6c\x69\x63":
                return $this->decryptPublic($pm);
            case "\160\x72\151\x76\141\164\x65":
                return $this->decryptPrivate($pm);
        }
        jr:
        q4:
        j2:
    }
    public function signData($pm)
    {
        switch ($this->cryptParams["\x6c\x69\142\x72\141\x72\171"]) {
            case "\x6f\x70\145\x6e\x73\x73\x6c":
                return $this->signOpenSSL($pm);
            case self::HMAC_SHA1:
                return hash_hmac("\x73\x68\141\x31", $pm, $this->key, true);
        }
        Oa:
        vd:
    }
    public function verifySignature($pm, $Yp)
    {
        switch ($this->cryptParams["\154\151\142\162\x61\162\x79"]) {
            case "\157\x70\x65\156\x73\163\x6c":
                return $this->verifyOpenSSL($pm, $Yp);
            case self::HMAC_SHA1:
                $E2 = hash_hmac("\x73\150\x61\x31", $pm, $this->key, true);
                return strcmp($Yp, $E2) == 0;
        }
        xD:
        hP:
    }
    public function getAlgorith()
    {
        return $this->getAlgorithm();
    }
    public function getAlgorithm()
    {
        return $this->cryptParams["\155\x65\164\x68\157\144"];
    }
    public static function makeAsnSegment($nF, $Fb)
    {
        switch ($nF) {
            case 0x2:
                if (!(ord($Fb) > 0x7f)) {
                    goto jH;
                }
                $Fb = chr(0) . $Fb;
                jH:
                goto Q2;
            case 0x3:
                $Fb = chr(0) . $Fb;
                goto Q2;
        }
        RX:
        Q2:
        $Cr = strlen($Fb);
        if ($Cr < 128) {
            goto FI;
        }
        if ($Cr < 0x100) {
            goto Ex;
        }
        if ($Cr < 0x10000) {
            goto Ua;
        }
        $Cy = null;
        goto Rt;
        Ua:
        $Cy = sprintf("\45\143\x25\x63\45\143\45\x63\x25\163", $nF, 0x82, $Cr / 0x100, $Cr % 0x100, $Fb);
        Rt:
        goto EI;
        Ex:
        $Cy = sprintf("\x25\x63\45\143\x25\143\x25\163", $nF, 0x81, $Cr, $Fb);
        EI:
        goto Cr;
        FI:
        $Cy = sprintf("\45\x63\x25\x63\x25\x73", $nF, $Cr, $Fb);
        Cr:
        return $Cy;
    }
    public static function convertRSA($E_, $Dg)
    {
        $cN = self::makeAsnSegment(0x2, $Dg);
        $GC = self::makeAsnSegment(0x2, $E_);
        $Aa = self::makeAsnSegment(0x30, $GC . $cN);
        $d6 = self::makeAsnSegment(0x3, $Aa);
        $gw = pack("\110\52", "\63\60\60\104\x30\66\x30\x39\x32\101\x38\66\64\70\70\66\106\67\x30\x44\60\x31\60\x31\60\61\x30\65\60\x30");
        $qY = self::makeAsnSegment(0x30, $gw . $d6);
        $pg = base64_encode($qY);
        $bJ = "\x2d\x2d\x2d\55\55\x42\x45\107\111\x4e\x20\120\125\102\x4c\x49\103\40\x4b\105\x59\55\x2d\55\55\x2d\xa";
        $Zl = 0;
        iq:
        if (!($rW = substr($pg, $Zl, 64))) {
            goto OD;
        }
        $bJ = $bJ . $rW . "\12";
        $Zl += 64;
        goto iq;
        OD:
        return $bJ . "\x2d\55\x2d\x2d\55\105\116\x44\40\120\x55\x42\114\x49\x43\x20\113\x45\131\x2d\55\55\x2d\55\xa";
    }
    public function serializeKey($Ig)
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
    public static function fromEncryptedKeyElement(DOMElement $lO)
    {
        $Zh = new XMLSecEnc();
        $Zh->setNode($lO);
        if ($mS = $Zh->locateKey()) {
            goto bH;
        }
        throw new Exception("\x55\x6e\141\x62\154\x65\40\164\157\40\154\157\143\x61\x74\x65\40\141\154\147\157\162\151\164\x68\155\40\x66\157\x72\40\164\x68\151\x73\40\x45\x6e\143\162\x79\x70\164\x65\144\x20\x4b\145\x79");
        bH:
        $mS->isEncrypted = true;
        $mS->encryptedCtx = $Zh;
        XMLSecEnc::staticLocateKeyInfo($mS, $lO);
        return $mS;
    }
}
