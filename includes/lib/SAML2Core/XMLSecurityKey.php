<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


namespace RobRichards\XMLSecLibs;

use DOMElement;
use Exception;
class XMLSecurityKey
{
    const TRIPLEDES_CBC = "\150\164\164\160\72\x2f\57\x77\167\167\56\167\63\56\x6f\162\x67\57\x32\x30\x30\x31\x2f\x30\64\57\170\x6d\154\145\x6e\143\x23\164\162\151\160\154\145\x64\x65\x73\55\143\x62\x63";
    const AES128_CBC = "\150\164\x74\x70\x3a\57\57\x77\x77\x77\56\167\x33\x2e\x6f\x72\x67\x2f\x32\60\60\61\57\x30\x34\x2f\x78\155\154\145\156\x63\43\141\x65\163\61\x32\x38\55\x63\x62\x63";
    const AES192_CBC = "\x68\x74\x74\160\x3a\57\x2f\x77\167\167\56\167\x33\x2e\157\x72\147\57\62\60\60\x31\57\x30\64\57\x78\155\x6c\x65\156\143\43\141\145\163\61\71\62\x2d\143\x62\143";
    const AES256_CBC = "\150\164\x74\160\72\57\57\x77\x77\x77\56\x77\63\x2e\x6f\162\x67\57\x32\x30\60\x31\x2f\60\x34\x2f\x78\x6d\x6c\145\x6e\x63\43\141\145\x73\x32\65\66\x2d\x63\x62\143";
    const AES128_GCM = "\x68\164\x74\160\x3a\x2f\x2f\x77\x77\x77\56\x77\63\x2e\x6f\162\x67\x2f\x32\x30\x30\71\57\170\155\x6c\x65\156\x63\x31\x31\43\x61\x65\x73\x31\62\70\x2d\x67\143\155";
    const AES192_GCM = "\x68\x74\164\x70\72\x2f\57\x77\x77\167\56\167\x33\56\157\x72\147\x2f\62\60\x30\71\x2f\x78\155\154\x65\156\143\61\x31\43\x61\x65\x73\61\x39\x32\x2d\147\x63\x6d";
    const AES256_GCM = "\x68\164\164\x70\x3a\x2f\x2f\x77\x77\167\x2e\167\x33\x2e\x6f\162\147\57\x32\60\60\x39\57\170\x6d\154\x65\156\x63\61\x31\43\x61\x65\163\62\x35\x36\55\x67\x63\155";
    const RSA_1_5 = "\x68\164\x74\x70\x3a\x2f\57\167\167\167\x2e\x77\x33\56\x6f\x72\x67\57\62\x30\x30\61\x2f\60\64\57\170\x6d\x6c\x65\156\143\43\162\x73\141\55\x31\x5f\x35";
    const RSA_OAEP_MGF1P = "\150\164\x74\x70\72\x2f\57\167\167\x77\x2e\167\63\56\157\x72\x67\57\x32\60\60\61\57\60\x34\x2f\170\x6d\x6c\145\156\x63\43\x72\x73\141\x2d\x6f\141\145\x70\55\x6d\x67\x66\x31\x70";
    const RSA_OAEP = "\150\x74\x74\x70\72\57\57\x77\167\x77\x2e\x77\63\x2e\x6f\x72\147\x2f\x32\x30\60\x39\x2f\x78\155\154\x65\156\143\61\61\x23\x72\x73\141\x2d\x6f\141\145\x70";
    const DSA_SHA1 = "\x68\x74\x74\x70\x3a\57\x2f\167\167\167\x2e\167\x33\56\157\x72\x67\x2f\62\x30\x30\x30\57\x30\x39\x2f\x78\x6d\x6c\144\x73\151\147\43\x64\x73\x61\x2d\163\x68\141\61";
    const RSA_SHA1 = "\150\164\x74\x70\72\57\x2f\167\x77\167\56\x77\63\x2e\x6f\162\147\57\62\x30\x30\x30\57\x30\71\57\170\x6d\154\144\163\151\x67\x23\162\x73\141\x2d\x73\150\x61\x31";
    const RSA_SHA256 = "\150\164\164\160\72\x2f\57\167\167\x77\x2e\167\63\x2e\157\x72\x67\57\62\60\60\x31\x2f\60\64\57\x78\x6d\154\x64\163\x69\147\x2d\x6d\157\162\145\x23\162\x73\x61\55\x73\x68\141\x32\x35\x36";
    const RSA_SHA384 = "\x68\164\x74\160\x3a\57\57\x77\x77\x77\56\x77\x33\56\157\x72\x67\57\x32\x30\60\x31\57\x30\64\x2f\170\x6d\x6c\144\163\151\147\x2d\155\x6f\162\x65\43\162\x73\141\55\163\150\141\x33\x38\x34";
    const RSA_SHA512 = "\x68\x74\164\160\72\57\x2f\167\x77\167\x2e\167\63\x2e\x6f\x72\x67\x2f\x32\x30\x30\x31\57\60\x34\57\x78\155\x6c\144\x73\151\147\x2d\x6d\x6f\x72\145\43\162\163\x61\x2d\163\x68\x61\x35\x31\62";
    const HMAC_SHA1 = "\x68\164\x74\160\72\x2f\x2f\x77\167\167\x2e\167\63\x2e\x6f\x72\147\x2f\62\x30\60\x30\57\x30\x39\x2f\x78\155\154\144\x73\151\147\x23\150\x6d\141\x63\55\x73\x68\x61\x31";
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
    public function __construct($PU, $Cn = null)
    {
        switch ($PU) {
            case self::TRIPLEDES_CBC:
                $this->cryptParams["\154\x69\x62\162\141\162\x79"] = "\157\160\145\x6e\x73\163\154";
                $this->cryptParams["\143\x69\160\150\145\162"] = "\144\x65\x73\x2d\x65\144\145\x33\55\x63\142\x63";
                $this->cryptParams["\x74\171\x70\x65"] = "\163\x79\155\155\145\164\162\151\x63";
                $this->cryptParams["\155\x65\164\150\x6f\x64"] = "\x68\164\164\x70\x3a\x2f\57\167\167\167\x2e\167\x33\x2e\x6f\162\x67\57\x32\x30\x30\x31\57\x30\x34\57\170\155\x6c\145\x6e\143\x23\x74\x72\151\160\154\x65\x64\x65\x73\55\x63\x62\143";
                $this->cryptParams["\x6b\x65\x79\x73\x69\172\x65"] = 24;
                $this->cryptParams["\x62\x6c\157\143\x6b\163\x69\x7a\x65"] = 8;
                goto qs;
            case self::AES128_CBC:
                $this->cryptParams["\154\x69\x62\162\x61\162\x79"] = "\157\x70\145\x6e\163\163\x6c";
                $this->cryptParams["\x63\151\x70\150\145\x72"] = "\x61\x65\x73\x2d\61\x32\x38\x2d\143\142\x63";
                $this->cryptParams["\x74\171\x70\x65"] = "\163\171\x6d\155\145\164\x72\151\x63";
                $this->cryptParams["\x6d\145\x74\150\157\x64"] = "\150\x74\x74\x70\x3a\x2f\57\x77\x77\x77\x2e\x77\x33\56\x6f\x72\147\57\62\x30\60\61\x2f\60\64\x2f\x78\155\154\x65\x6e\x63\43\141\145\163\x31\62\x38\55\x63\142\x63";
                $this->cryptParams["\153\145\171\163\151\172\145"] = 16;
                $this->cryptParams["\x62\154\157\x63\x6b\x73\151\172\x65"] = 16;
                goto qs;
            case self::AES192_CBC:
                $this->cryptParams["\154\x69\x62\162\141\x72\171"] = "\157\160\145\156\x73\163\x6c";
                $this->cryptParams["\143\151\160\x68\145\162"] = "\x61\x65\x73\55\61\71\62\x2d\x63\142\143";
                $this->cryptParams["\164\x79\160\x65"] = "\163\x79\155\x6d\x65\164\x72\x69\143";
                $this->cryptParams["\155\x65\164\150\157\144"] = "\x68\164\x74\x70\x3a\x2f\x2f\x77\x77\x77\x2e\167\x33\56\157\x72\147\x2f\62\x30\60\x31\57\x30\64\57\x78\155\154\145\x6e\143\43\141\145\x73\61\71\x32\55\143\142\143";
                $this->cryptParams["\x6b\x65\171\x73\151\172\x65"] = 24;
                $this->cryptParams["\x62\154\157\x63\x6b\x73\x69\x7a\145"] = 16;
                goto qs;
            case self::AES256_CBC:
                $this->cryptParams["\154\x69\142\x72\141\162\x79"] = "\157\160\145\156\x73\x73\154";
                $this->cryptParams["\x63\x69\160\150\x65\162"] = "\141\145\163\x2d\x32\65\x36\55\143\x62\143";
                $this->cryptParams["\164\x79\160\x65"] = "\x73\171\155\x6d\x65\164\162\151\x63";
                $this->cryptParams["\155\x65\x74\x68\x6f\144"] = "\x68\164\x74\160\x3a\57\57\x77\x77\167\56\167\x33\x2e\x6f\x72\147\57\62\60\60\61\x2f\x30\64\x2f\x78\155\154\x65\156\x63\43\141\x65\x73\62\65\x36\x2d\143\x62\143";
                $this->cryptParams["\x6b\145\x79\x73\151\x7a\145"] = 32;
                $this->cryptParams["\x62\x6c\157\x63\153\x73\x69\x7a\145"] = 16;
                goto qs;
            case self::AES128_GCM:
                $this->cryptParams["\154\x69\142\162\141\162\171"] = "\157\160\x65\x6e\163\x73\154";
                $this->cryptParams["\143\x69\160\x68\x65\162"] = "\x61\145\x73\55\61\x32\x38\x2d\x67\x63\x6d";
                $this->cryptParams["\x74\171\160\145"] = "\163\171\x6d\155\145\x74\162\151\x63";
                $this->cryptParams["\x6d\145\x74\150\157\144"] = "\150\x74\164\160\72\57\x2f\167\x77\x77\x2e\x77\63\56\157\162\x67\57\62\x30\x30\x39\57\x78\x6d\154\x65\156\143\x31\x31\x23\x61\145\x73\x31\x32\70\55\x67\x63\155";
                $this->cryptParams["\x6b\x65\x79\163\151\172\145"] = 16;
                $this->cryptParams["\142\154\157\143\153\x73\x69\x7a\x65"] = 16;
                goto qs;
            case self::AES192_GCM:
                $this->cryptParams["\154\x69\142\162\141\x72\x79"] = "\x6f\160\145\x6e\x73\x73\154";
                $this->cryptParams["\x63\x69\160\x68\145\162"] = "\x61\145\x73\55\x31\71\62\55\147\143\155";
                $this->cryptParams["\x74\x79\160\145"] = "\163\x79\155\155\145\x74\x72\x69\x63";
                $this->cryptParams["\x6d\145\164\150\157\144"] = "\x68\x74\164\x70\72\57\x2f\x77\167\x77\56\x77\63\x2e\x6f\162\147\x2f\x32\60\x30\x39\57\x78\155\154\x65\156\143\61\x31\43\x61\x65\x73\61\x39\62\x2d\x67\143\x6d";
                $this->cryptParams["\153\145\171\x73\151\172\145"] = 24;
                $this->cryptParams["\x62\x6c\x6f\x63\x6b\163\151\x7a\x65"] = 16;
                goto qs;
            case self::AES256_GCM:
                $this->cryptParams["\154\x69\x62\x72\141\162\171"] = "\157\x70\x65\156\x73\163\154";
                $this->cryptParams["\x63\151\x70\x68\x65\162"] = "\141\x65\163\x2d\62\65\x36\55\x67\x63\x6d";
                $this->cryptParams["\x74\171\160\x65"] = "\x73\x79\x6d\155\x65\164\162\x69\143";
                $this->cryptParams["\x6d\145\164\150\x6f\x64"] = "\150\x74\164\160\72\57\57\x77\167\167\56\x77\x33\x2e\157\162\x67\57\x32\x30\x30\x39\57\x78\155\154\145\156\x63\x31\61\x23\141\x65\x73\62\65\66\x2d\x67\x63\155";
                $this->cryptParams["\x6b\145\171\x73\x69\x7a\x65"] = 32;
                $this->cryptParams["\142\x6c\157\x63\x6b\x73\x69\172\x65"] = 16;
                goto qs;
            case self::RSA_1_5:
                $this->cryptParams["\x6c\151\x62\162\141\x72\171"] = "\x6f\x70\145\156\163\163\x6c";
                $this->cryptParams["\x70\x61\x64\144\151\x6e\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x6d\x65\164\x68\x6f\x64"] = "\x68\164\164\160\x3a\x2f\57\167\167\167\56\167\63\x2e\157\x72\x67\x2f\62\60\x30\61\x2f\60\64\57\170\155\x6c\145\x6e\143\43\x72\x73\141\x2d\x31\x5f\x35";
                if (!(is_array($Cn) && !empty($Cn["\164\x79\160\145"]))) {
                    goto SW;
                }
                if (!($Cn["\x74\171\x70\x65"] == "\160\165\142\x6c\151\x63" || $Cn["\x74\171\160\x65"] == "\160\x72\x69\166\x61\x74\145")) {
                    goto Fz;
                }
                $this->cryptParams["\164\x79\160\145"] = $Cn["\x74\171\160\145"];
                goto qs;
                Fz:
                SW:
                throw new Exception("\x43\x65\x72\x74\151\x66\151\x63\x61\x74\145\40\x22\164\x79\x70\145\42\x20\50\x70\x72\151\x76\141\164\x65\57\160\x75\x62\154\x69\143\x29\x20\x6d\165\x73\x74\x20\x62\145\x20\x70\x61\163\x73\x65\x64\x20\x76\151\x61\x20\x70\x61\x72\x61\x6d\x65\164\145\x72\163");
            case self::RSA_OAEP_MGF1P:
                $this->cryptParams["\x6c\x69\142\x72\141\x72\171"] = "\x6f\x70\x65\x6e\x73\x73\x6c";
                $this->cryptParams["\160\x61\x64\x64\x69\x6e\x67"] = OPENSSL_PKCS1_OAEP_PADDING;
                $this->cryptParams["\x6d\x65\x74\x68\x6f\144"] = "\150\x74\164\160\x3a\x2f\57\x77\167\x77\x2e\167\x33\56\x6f\x72\x67\x2f\62\x30\x30\x31\x2f\60\64\x2f\170\x6d\x6c\145\156\x63\x23\x72\163\x61\x2d\157\141\145\160\55\155\147\146\x31\160";
                $this->cryptParams["\x68\141\163\x68"] = null;
                if (!(is_array($Cn) && !empty($Cn["\x74\171\160\x65"]))) {
                    goto NE;
                }
                if (!($Cn["\164\x79\160\x65"] == "\160\x75\142\x6c\x69\143" || $Cn["\x74\171\160\145"] == "\x70\x72\x69\x76\141\x74\145")) {
                    goto fc;
                }
                $this->cryptParams["\164\x79\160\145"] = $Cn["\x74\171\x70\x65"];
                goto qs;
                fc:
                NE:
                throw new Exception("\103\x65\x72\164\151\x66\151\143\x61\x74\145\40\42\x74\171\160\x65\x22\40\x28\x70\162\151\166\x61\x74\x65\x2f\x70\165\x62\x6c\151\x63\x29\40\155\165\x73\164\40\142\x65\40\x70\141\163\x73\145\x64\x20\166\x69\x61\x20\x70\141\x72\x61\155\145\164\145\162\x73");
            case self::RSA_OAEP:
                $this->cryptParams["\154\151\142\162\x61\x72\171"] = "\x6f\160\145\156\163\x73\x6c";
                $this->cryptParams["\x70\141\144\144\x69\156\147"] = OPENSSL_PKCS1_OAEP_PADDING;
                $this->cryptParams["\x6d\x65\x74\150\x6f\144"] = "\150\x74\x74\x70\72\x2f\x2f\167\167\167\x2e\x77\63\56\x6f\x72\147\57\x32\x30\60\x39\x2f\x78\x6d\x6c\x65\156\143\61\x31\x23\x72\163\x61\x2d\x6f\141\145\160";
                $this->cryptParams["\x68\x61\163\x68"] = "\150\164\x74\160\72\x2f\x2f\x77\167\x77\56\167\63\56\157\x72\x67\x2f\x32\60\x30\x39\57\170\x6d\154\x65\156\143\61\x31\43\x6d\147\x66\61\x73\x68\141\61";
                if (!(is_array($Cn) && !empty($Cn["\x74\x79\160\145"]))) {
                    goto SF;
                }
                if (!($Cn["\164\171\x70\x65"] == "\x70\x75\x62\x6c\x69\x63" || $Cn["\164\171\x70\x65"] == "\160\x72\151\166\141\x74\145")) {
                    goto lA;
                }
                $this->cryptParams["\x74\x79\160\x65"] = $Cn["\x74\171\x70\145"];
                goto qs;
                lA:
                SF:
                throw new Exception("\103\x65\162\x74\x69\146\151\x63\x61\x74\145\x20\42\x74\171\160\145\x22\40\50\160\x72\x69\166\141\164\x65\x2f\x70\x75\142\x6c\x69\x63\x29\x20\155\x75\163\x74\40\142\x65\x20\160\141\x73\x73\x65\x64\40\x76\151\141\x20\160\x61\162\141\155\x65\164\145\x72\x73");
            case self::RSA_SHA1:
                $this->cryptParams["\154\x69\142\x72\x61\x72\x79"] = "\x6f\x70\x65\x6e\x73\x73\x6c";
                $this->cryptParams["\155\x65\x74\150\157\x64"] = "\150\x74\x74\x70\72\x2f\x2f\167\167\x77\x2e\167\63\56\x6f\162\x67\57\x32\x30\60\60\57\x30\71\x2f\x78\x6d\x6c\144\163\151\147\43\x72\x73\141\x2d\x73\x68\x61\61";
                $this->cryptParams["\160\141\x64\x64\x69\156\x67"] = OPENSSL_PKCS1_PADDING;
                if (!(is_array($Cn) && !empty($Cn["\x74\x79\x70\145"]))) {
                    goto ed;
                }
                if (!($Cn["\164\x79\x70\145"] == "\x70\165\x62\x6c\151\x63" || $Cn["\164\171\x70\x65"] == "\160\162\151\x76\141\x74\145")) {
                    goto NG;
                }
                $this->cryptParams["\164\x79\160\x65"] = $Cn["\x74\171\160\x65"];
                goto qs;
                NG:
                ed:
                throw new Exception("\x43\x65\162\164\x69\146\151\143\x61\164\145\40\42\x74\171\x70\145\x22\x20\x28\x70\162\x69\x76\x61\164\x65\57\x70\x75\142\x6c\151\x63\51\x20\155\165\x73\164\x20\142\x65\x20\160\x61\x73\x73\145\x64\x20\x76\151\x61\40\160\x61\x72\x61\155\x65\164\145\x72\163");
            case self::RSA_SHA256:
                $this->cryptParams["\x6c\151\142\x72\x61\x72\171"] = "\x6f\160\x65\x6e\x73\x73\154";
                $this->cryptParams["\155\x65\164\x68\157\144"] = "\x68\x74\x74\160\72\x2f\x2f\x77\167\167\x2e\x77\63\56\157\x72\x67\x2f\x32\60\60\61\x2f\60\64\x2f\x78\155\x6c\x64\163\151\x67\x2d\x6d\x6f\162\x65\43\x72\163\x61\55\163\x68\141\x32\65\66";
                $this->cryptParams["\160\141\x64\x64\151\x6e\x67"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\144\151\x67\145\x73\x74"] = "\x53\x48\x41\x32\x35\66";
                if (!(is_array($Cn) && !empty($Cn["\x74\171\160\145"]))) {
                    goto YL;
                }
                if (!($Cn["\164\171\160\145"] == "\160\165\x62\154\151\x63" || $Cn["\x74\x79\160\x65"] == "\160\162\151\x76\x61\164\145")) {
                    goto gV;
                }
                $this->cryptParams["\164\x79\160\x65"] = $Cn["\x74\x79\160\x65"];
                goto qs;
                gV:
                YL:
                throw new Exception("\103\145\162\x74\x69\146\151\x63\x61\x74\x65\40\x22\x74\x79\160\x65\x22\40\50\x70\x72\151\x76\141\164\145\57\x70\x75\x62\x6c\x69\x63\51\40\x6d\165\x73\x74\40\x62\x65\40\160\x61\163\163\145\144\x20\x76\x69\x61\x20\x70\141\x72\141\155\x65\164\145\162\x73");
            case self::RSA_SHA384:
                $this->cryptParams["\x6c\x69\142\x72\141\x72\171"] = "\157\x70\145\156\x73\163\154";
                $this->cryptParams["\x6d\x65\164\x68\157\144"] = "\x68\164\x74\160\72\57\57\167\x77\x77\56\167\63\56\x6f\x72\147\57\62\60\60\61\x2f\60\64\57\170\x6d\x6c\144\x73\x69\147\55\x6d\157\162\x65\43\x72\x73\141\55\163\150\x61\63\x38\x34";
                $this->cryptParams["\160\141\x64\144\151\156\x67"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\144\151\147\x65\163\164"] = "\x53\110\101\x33\x38\64";
                if (!(is_array($Cn) && !empty($Cn["\x74\171\160\145"]))) {
                    goto Au;
                }
                if (!($Cn["\164\x79\160\x65"] == "\x70\165\x62\154\x69\143" || $Cn["\x74\171\160\145"] == "\160\162\x69\x76\141\x74\145")) {
                    goto qp;
                }
                $this->cryptParams["\164\171\160\145"] = $Cn["\164\x79\160\x65"];
                goto qs;
                qp:
                Au:
                throw new Exception("\x43\145\162\x74\x69\146\151\x63\141\164\x65\40\42\x74\171\x70\145\x22\x20\50\x70\x72\151\x76\141\x74\145\57\160\x75\142\x6c\151\143\x29\x20\x6d\x75\163\164\40\x62\145\40\160\x61\x73\163\x65\144\40\166\151\x61\40\x70\x61\x72\141\155\145\164\145\162\163");
            case self::RSA_SHA512:
                $this->cryptParams["\x6c\151\142\162\141\x72\x79"] = "\x6f\x70\x65\156\163\x73\x6c";
                $this->cryptParams["\x6d\x65\x74\x68\157\144"] = "\x68\164\x74\x70\x3a\x2f\57\x77\x77\167\x2e\x77\x33\56\x6f\162\147\57\62\x30\x30\x31\x2f\60\x34\57\170\155\154\144\x73\151\147\55\155\157\162\x65\43\x72\163\141\x2d\163\150\x61\65\61\62";
                $this->cryptParams["\x70\x61\144\x64\x69\x6e\147"] = OPENSSL_PKCS1_PADDING;
                $this->cryptParams["\x64\x69\x67\145\x73\164"] = "\123\x48\101\65\61\x32";
                if (!(is_array($Cn) && !empty($Cn["\164\171\160\x65"]))) {
                    goto SI;
                }
                if (!($Cn["\x74\x79\160\145"] == "\160\x75\x62\154\151\x63" || $Cn["\x74\x79\x70\145"] == "\160\162\151\166\x61\164\x65")) {
                    goto xR;
                }
                $this->cryptParams["\164\x79\x70\145"] = $Cn["\x74\171\x70\145"];
                goto qs;
                xR:
                SI:
                throw new Exception("\103\x65\162\164\151\x66\x69\x63\x61\x74\145\40\x22\164\x79\x70\145\42\x20\50\160\162\151\166\141\164\x65\x2f\x70\x75\142\154\151\143\51\40\x6d\165\163\x74\x20\x62\145\40\160\x61\163\163\145\x64\x20\166\x69\x61\40\x70\x61\162\x61\155\145\164\145\162\x73");
            case self::HMAC_SHA1:
                $this->cryptParams["\x6c\151\x62\162\x61\x72\171"] = $PU;
                $this->cryptParams["\155\x65\x74\150\157\144"] = "\x68\164\164\160\x3a\x2f\x2f\167\167\x77\56\x77\63\x2e\157\x72\x67\57\62\x30\x30\60\57\60\x39\x2f\x78\x6d\154\144\x73\151\147\43\x68\x6d\141\143\55\163\150\141\x31";
                goto qs;
            default:
                throw new Exception("\111\156\x76\x61\x6c\x69\x64\x20\113\145\x79\40\124\171\x70\x65");
        }
        Yv:
        qs:
        $this->type = $PU;
    }
    public function getSymmetricKeySize()
    {
        if (!empty($this->cryptParams["\x6b\x65\x79\163\151\x7a\145"])) {
            goto sK;
        }
        return null;
        sK:
        return $this->cryptParams["\x6b\x65\x79\163\151\172\145"];
    }
    public function generateSessionKey()
    {
        if (!empty($this->cryptParams["\153\x65\x79\x73\x69\x7a\x65"])) {
            goto zJ;
        }
        throw new Exception("\x55\156\x6b\x6e\x6f\167\x6e\x20\153\145\x79\x20\x73\x69\x7a\145\x20\146\157\x72\x20\164\171\160\x65\x20\42" . $this->type . "\42\56");
        zJ:
        $DT = $this->cryptParams["\x6b\x65\x79\x73\151\172\145"];
        $mr = openssl_random_pseudo_bytes($DT);
        if (!($this->type === self::TRIPLEDES_CBC)) {
            goto yo;
        }
        $p0 = 0;
        jo:
        if (!($p0 < strlen($mr))) {
            goto hF;
        }
        $nF = ord($mr[$p0]) & 0xfe;
        $wv = 1;
        $xv = 1;
        Cp:
        if (!($xv < 8)) {
            goto bc;
        }
        $wv ^= $nF >> $xv & 1;
        T9:
        $xv++;
        goto Cp;
        bc:
        $nF |= $wv;
        $mr[$p0] = chr($nF);
        Z7:
        $p0++;
        goto jo;
        hF:
        yo:
        $this->key = $mr;
        return $mr;
    }
    public static function getRawThumbprint($sp)
    {
        $bo = explode("\12", $sp);
        $iZ = '';
        $Yv = false;
        foreach ($bo as $XS) {
            if (!$Yv) {
                goto jO;
            }
            if (!(strncmp($XS, "\55\55\55\55\55\x45\116\104\40\103\x45\x52\124\111\106\x49\103\x41\124\105", 20) == 0)) {
                goto eE;
            }
            goto g2;
            eE:
            $iZ .= trim($XS);
            goto uN;
            jO:
            if (!(strncmp($XS, "\x2d\55\x2d\55\55\102\x45\x47\111\x4e\x20\x43\105\122\x54\x49\106\111\103\x41\x54\105", 22) == 0)) {
                goto Yh;
            }
            $Yv = true;
            Yh:
            uN:
            Dv:
        }
        g2:
        if (empty($iZ)) {
            goto Qk;
        }
        return strtolower(sha1(base64_decode($iZ)));
        Qk:
        return null;
    }
    public function loadKey($mr, $rJ = false, $Js = false)
    {
        if ($rJ) {
            goto XQ;
        }
        $this->key = $mr;
        goto En;
        XQ:
        $this->key = file_get_contents($mr);
        En:
        if ($Js) {
            goto Ap;
        }
        $this->x509Certificate = null;
        goto sg;
        Ap:
        $this->key = openssl_x509_read($this->key);
        openssl_x509_export($this->key, $JV);
        $this->x509Certificate = $JV;
        $this->key = $JV;
        sg:
        if (!($this->cryptParams["\154\151\142\x72\x61\x72\x79"] == "\157\160\145\x6e\163\x73\x6c")) {
            goto MT;
        }
        switch ($this->cryptParams["\x74\171\160\145"]) {
            case "\160\x75\142\x6c\151\x63":
                if (!$Js) {
                    goto HS;
                }
                $this->X509Thumbprint = self::getRawThumbprint($this->key);
                HS:
                $this->key = openssl_get_publickey($this->key);
                if ($this->key) {
                    goto LB;
                }
                throw new Exception("\125\x6e\x61\142\154\145\x20\x74\157\x20\145\170\164\x72\141\x63\164\40\x70\x75\142\x6c\151\143\40\x6b\145\x79");
                LB:
                goto CP;
            case "\x70\162\x69\166\x61\x74\145":
                $this->key = openssl_get_privatekey($this->key, $this->passphrase);
                goto CP;
            case "\163\x79\155\x6d\x65\x74\162\151\x63":
                if (!(strlen($this->key) < $this->cryptParams["\153\x65\171\163\x69\x7a\x65"])) {
                    goto e0;
                }
                throw new Exception("\x4b\x65\x79\40\155\165\163\x74\x20\x63\x6f\x6e\164\141\x69\x6e\40\x61\164\40\x6c\145\141\163\164\x20" . $this->cryptParams["\x6b\145\x79\163\151\172\x65"] . "\40\x63\x68\x61\162\141\143\x74\145\162\x73\x20\146\157\162\40\164\x68\151\163\40\143\x69\x70\x68\145\x72\x2c\40\143\x6f\156\x74\141\151\x6e\163\x20" . strlen($this->key));
                e0:
                goto CP;
            default:
                throw new Exception("\x55\156\x6b\x6e\157\x77\156\x20\164\171\160\145");
        }
        LY:
        CP:
        MT:
    }
    private function padISO10126($iZ, $EA)
    {
        if (!($EA > 256)) {
            goto rx;
        }
        throw new Exception("\x42\154\157\143\x6b\x20\x73\151\172\x65\x20\x68\151\147\150\145\x72\x20\x74\x68\141\x6e\40\x32\65\66\40\156\157\164\x20\141\154\x6c\x6f\x77\x65\x64");
        rx:
        $RH = $EA - strlen($iZ) % $EA;
        $Eh = chr($RH);
        return $iZ . str_repeat($Eh, $RH);
    }
    private function unpadISO10126($iZ)
    {
        $RH = substr($iZ, -1);
        $gN = ord($RH);
        return substr($iZ, 0, -$gN);
    }
    private function encryptSymmetric($iZ)
    {
        $this->iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($this->cryptParams["\143\x69\160\150\145\x72"]));
        $QE = null;
        if (in_array($this->cryptParams["\143\x69\x70\x68\x65\x72"], ["\x61\145\163\55\x31\x32\x38\x2d\147\x63\155", "\141\145\163\x2d\61\71\x32\x2d\x67\x63\x6d", "\141\x65\x73\x2d\x32\65\66\x2d\x67\143\x6d"])) {
            goto Xj;
        }
        $iZ = $this->padISO10126($iZ, $this->cryptParams["\x62\154\x6f\143\x6b\163\x69\172\145"]);
        $uF = openssl_encrypt($iZ, $this->cryptParams["\143\x69\160\x68\x65\162"], $this->key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $this->iv);
        goto E8;
        Xj:
        if (!(version_compare(PHP_VERSION, "\67\56\61\x2e\60") < 0)) {
            goto h7;
        }
        throw new Exception("\x50\x48\120\40\67\56\x31\x2e\x30\x20\x69\x73\40\162\x65\161\165\151\162\x65\x64\x20\164\x6f\x20\x75\163\145\x20\x41\105\123\40\107\103\115\x20\x61\154\147\x6f\x72\x69\164\150\x6d\x73");
        h7:
        $QE = openssl_random_pseudo_bytes(self::AUTHTAG_LENGTH);
        $uF = openssl_encrypt($iZ, $this->cryptParams["\143\x69\160\150\x65\x72"], $this->key, OPENSSL_RAW_DATA, $this->iv, $QE);
        E8:
        if (!(false === $uF)) {
            goto eU;
        }
        throw new Exception("\x46\141\151\154\165\x72\x65\40\145\x6e\143\162\x79\x70\164\x69\x6e\x67\40\104\141\164\x61\40\50\157\160\x65\156\163\x73\154\40\x73\171\x6d\x6d\x65\164\162\x69\143\51\40\55\40" . openssl_error_string());
        eU:
        return $this->iv . $uF . $QE;
    }
    private function decryptSymmetric($iZ)
    {
        $IW = openssl_cipher_iv_length($this->cryptParams["\143\x69\x70\150\x65\162"]);
        $this->iv = substr($iZ, 0, $IW);
        $iZ = substr($iZ, $IW);
        $QE = null;
        if (in_array($this->cryptParams["\x63\151\x70\x68\145\x72"], ["\141\145\163\55\61\x32\70\55\147\143\x6d", "\141\145\x73\55\61\x39\62\x2d\147\143\x6d", "\x61\145\163\x2d\x32\65\66\x2d\147\x63\155"])) {
            goto BJ;
        }
        $qQ = openssl_decrypt($iZ, $this->cryptParams["\x63\x69\160\150\145\x72"], $this->key, OPENSSL_RAW_DATA | OPENSSL_ZERO_PADDING, $this->iv);
        goto kB;
        BJ:
        if (!(version_compare(PHP_VERSION, "\67\56\61\56\x30") < 0)) {
            goto ef;
        }
        throw new Exception("\120\x48\120\40\x37\56\61\56\60\40\x69\x73\x20\x72\145\x71\x75\x69\x72\145\x64\x20\164\x6f\x20\165\x73\x65\x20\101\105\123\40\x47\103\x4d\40\141\154\147\x6f\x72\151\164\x68\155\163");
        ef:
        $nI = 0 - self::AUTHTAG_LENGTH;
        $QE = substr($iZ, $nI);
        $iZ = substr($iZ, 0, $nI);
        $qQ = openssl_decrypt($iZ, $this->cryptParams["\143\x69\160\150\145\162"], $this->key, OPENSSL_RAW_DATA, $this->iv, $QE);
        kB:
        if (!(false === $qQ)) {
            goto vI;
        }
        throw new Exception("\x46\141\151\x6c\165\162\x65\40\x64\x65\143\162\x79\160\x74\151\156\147\40\104\141\164\141\x20\50\157\x70\x65\156\x73\x73\154\40\x73\x79\155\x6d\x65\x74\162\x69\143\x29\40\x2d\x20" . openssl_error_string());
        vI:
        return null !== $QE ? $qQ : $this->unpadISO10126($qQ);
    }
    private function encryptPublic($iZ)
    {
        if (openssl_public_encrypt($iZ, $uF, $this->key, $this->cryptParams["\x70\x61\x64\x64\151\x6e\147"])) {
            goto MF;
        }
        throw new Exception("\106\x61\x69\154\165\162\145\40\145\x6e\x63\162\171\160\x74\151\x6e\x67\x20\x44\141\x74\141\x20\50\157\x70\145\156\x73\x73\154\x20\160\x75\x62\154\x69\143\51\x20\x2d\x20" . openssl_error_string());
        MF:
        return $uF;
    }
    private function decryptPublic($iZ)
    {
        if (openssl_public_decrypt($iZ, $qQ, $this->key, $this->cryptParams["\160\141\x64\144\151\156\147"])) {
            goto fj;
        }
        throw new Exception("\x46\x61\x69\x6c\165\x72\x65\40\144\145\x63\162\x79\160\164\151\156\147\40\104\141\x74\141\40\x28\157\160\145\x6e\x73\163\x6c\x20\160\x75\142\154\x69\x63\x29\x20\55\x20" . openssl_error_string());
        fj:
        return $qQ;
    }
    private function encryptPrivate($iZ)
    {
        if (openssl_private_encrypt($iZ, $uF, $this->key, $this->cryptParams["\160\x61\144\x64\151\156\x67"])) {
            goto K3;
        }
        throw new Exception("\x46\x61\x69\x6c\x75\x72\x65\40\x65\x6e\x63\x72\x79\x70\x74\x69\x6e\147\40\x44\141\x74\141\x20\x28\157\x70\145\156\x73\163\x6c\40\x70\x72\x69\166\x61\x74\x65\x29\x20\x2d\40" . openssl_error_string());
        K3:
        return $uF;
    }
    private function decryptPrivate($iZ)
    {
        if (openssl_private_decrypt($iZ, $qQ, $this->key, $this->cryptParams["\x70\x61\x64\x64\151\156\147"])) {
            goto GN;
        }
        throw new Exception("\x46\141\151\154\165\162\x65\40\144\x65\x63\x72\x79\160\x74\x69\x6e\x67\40\x44\x61\164\x61\40\x28\x6f\160\145\156\x73\163\154\x20\160\162\151\166\x61\164\145\51\40\x2d\x20" . openssl_error_string());
        GN:
        return $qQ;
    }
    private function signOpenSSL($iZ)
    {
        $qm = OPENSSL_ALGO_SHA1;
        if (empty($this->cryptParams["\144\x69\x67\145\163\164"])) {
            goto xM;
        }
        $qm = $this->cryptParams["\144\x69\x67\145\x73\x74"];
        xM:
        if (openssl_sign($iZ, $UR, $this->key, $qm)) {
            goto hb;
        }
        throw new Exception("\x46\141\x69\154\165\162\145\x20\x53\x69\x67\156\151\156\147\x20\104\141\x74\141\72\40" . openssl_error_string() . "\x20\55\40" . $qm);
        hb:
        return $UR;
    }
    private function verifyOpenSSL($iZ, $UR)
    {
        $qm = OPENSSL_ALGO_SHA1;
        if (empty($this->cryptParams["\x64\x69\147\x65\x73\x74"])) {
            goto uM;
        }
        $qm = $this->cryptParams["\x64\x69\x67\145\163\164"];
        uM:
        return openssl_verify($iZ, $UR, $this->key, $qm);
    }
    public function encryptData($iZ)
    {
        if (!($this->cryptParams["\154\151\142\x72\141\162\x79"] === "\x6f\160\x65\156\x73\x73\154")) {
            goto jD;
        }
        switch ($this->cryptParams["\164\171\160\x65"]) {
            case "\163\x79\x6d\155\145\164\x72\151\143":
                return $this->encryptSymmetric($iZ);
            case "\x70\165\x62\154\151\x63":
                return $this->encryptPublic($iZ);
            case "\160\162\x69\x76\x61\164\x65":
                return $this->encryptPrivate($iZ);
        }
        jI:
        pF:
        jD:
    }
    public function decryptData($iZ)
    {
        if (!($this->cryptParams["\154\x69\142\162\x61\x72\x79"] === "\x6f\x70\x65\x6e\163\163\x6c")) {
            goto I3;
        }
        switch ($this->cryptParams["\164\171\160\145"]) {
            case "\x73\x79\155\x6d\145\x74\x72\x69\x63":
                return $this->decryptSymmetric($iZ);
            case "\x70\x75\142\x6c\151\143":
                return $this->decryptPublic($iZ);
            case "\x70\162\151\x76\141\164\x65":
                return $this->decryptPrivate($iZ);
        }
        m7:
        oY:
        I3:
    }
    public function signData($iZ)
    {
        switch ($this->cryptParams["\154\x69\142\162\x61\162\171"]) {
            case "\x6f\160\x65\x6e\x73\163\x6c":
                return $this->signOpenSSL($iZ);
            case self::HMAC_SHA1:
                return hash_hmac("\x73\x68\141\x31", $iZ, $this->key, true);
        }
        jf:
        U1:
    }
    public function verifySignature($iZ, $UR)
    {
        switch ($this->cryptParams["\154\x69\x62\x72\141\x72\171"]) {
            case "\x6f\160\x65\156\163\163\154":
                return $this->verifyOpenSSL($iZ, $UR);
            case self::HMAC_SHA1:
                $gb = hash_hmac("\x73\150\141\61", $iZ, $this->key, true);
                return strcmp($UR, $gb) == 0;
        }
        Yo:
        HB:
    }
    public function getAlgorith()
    {
        return $this->getAlgorithm();
    }
    public function getAlgorithm()
    {
        return $this->cryptParams["\155\x65\x74\150\x6f\144"];
    }
    public static function makeAsnSegment($PU, $IE)
    {
        switch ($PU) {
            case 0x2:
                if (!(ord($IE) > 0x7f)) {
                    goto ZX;
                }
                $IE = chr(0) . $IE;
                ZX:
                goto RH;
            case 0x3:
                $IE = chr(0) . $IE;
                goto RH;
        }
        Xz:
        RH:
        $yW = strlen($IE);
        if ($yW < 128) {
            goto it;
        }
        if ($yW < 0x100) {
            goto Jo;
        }
        if ($yW < 0x10000) {
            goto A1;
        }
        $aJ = null;
        goto dz;
        A1:
        $aJ = sprintf("\45\143\45\143\45\143\x25\143\45\163", $PU, 0x82, $yW / 0x100, $yW % 0x100, $IE);
        dz:
        goto Ru;
        Jo:
        $aJ = sprintf("\x25\x63\x25\143\x25\143\45\x73", $PU, 0x81, $yW, $IE);
        Ru:
        goto a3;
        it:
        $aJ = sprintf("\45\143\45\143\x25\x73", $PU, $yW, $IE);
        a3:
        return $aJ;
    }
    public static function convertRSA($h6, $Oq)
    {
        $H7 = self::makeAsnSegment(0x2, $Oq);
        $uG = self::makeAsnSegment(0x2, $h6);
        $YV = self::makeAsnSegment(0x30, $uG . $H7);
        $UF = self::makeAsnSegment(0x3, $YV);
        $Jx = pack("\x48\52", "\63\x30\x30\104\60\66\60\x39\62\101\70\66\64\x38\70\66\106\67\60\x44\60\61\x30\x31\60\61\60\x35\60\x30");
        $U8 = self::makeAsnSegment(0x30, $Jx . $UF);
        $F1 = base64_encode($U8);
        $kB = "\x2d\x2d\x2d\x2d\55\x42\x45\x47\111\116\40\x50\x55\102\114\111\103\x20\x4b\x45\131\x2d\55\x2d\55\x2d\12";
        $nI = 0;
        S3:
        if (!($QJ = substr($F1, $nI, 64))) {
            goto jY;
        }
        $kB = $kB . $QJ . "\xa";
        $nI += 64;
        goto S3;
        jY:
        return $kB . "\55\55\55\x2d\55\105\116\104\40\120\125\x42\114\111\x43\x20\113\x45\x59\55\x2d\x2d\55\x2d\xa";
    }
    public function serializeKey($TS)
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
    public static function fromEncryptedKeyElement(DOMElement $LQ)
    {
        $CV = new XMLSecEnc();
        $CV->setNode($LQ);
        if ($VX = $CV->locateKey()) {
            goto C4;
        }
        throw new Exception("\125\x6e\141\x62\x6c\x65\40\164\x6f\x20\154\x6f\x63\x61\164\145\40\141\x6c\x67\x6f\x72\151\164\x68\155\40\146\x6f\x72\x20\x74\x68\151\163\x20\105\x6e\x63\x72\171\160\164\145\144\x20\x4b\x65\x79");
        C4:
        $VX->isEncrypted = true;
        $VX->encryptedCtx = $CV;
        XMLSecEnc::staticLocateKeyInfo($VX, $LQ);
        return $VX;
    }
}
