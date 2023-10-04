<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


namespace RobRichards\XMLSecLibs;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;
use Exception;
use RobRichards\XMLSecLibs\Utils\XPath as XPath;
class XMLSecurityDSig
{
    const XMLDSIGNS = "\150\x74\164\x70\72\57\57\x77\167\167\x2e\x77\x33\x2e\157\x72\x67\x2f\62\60\x30\60\x2f\x30\x39\x2f\170\155\x6c\x64\163\151\x67\x23";
    const SHA1 = "\150\x74\x74\x70\x3a\57\x2f\x77\x77\167\x2e\x77\x33\x2e\157\x72\147\x2f\62\60\x30\60\x2f\60\71\x2f\170\x6d\154\x64\163\151\147\43\x73\x68\141\61";
    const SHA256 = "\x68\164\164\160\72\x2f\x2f\x77\x77\167\56\167\63\x2e\x6f\162\x67\57\62\60\x30\61\x2f\x30\x34\57\170\155\x6c\145\156\143\x23\163\150\141\62\65\66";
    const SHA384 = "\x68\x74\164\x70\x3a\x2f\x2f\167\x77\167\x2e\167\x33\x2e\157\x72\x67\57\62\x30\60\x31\x2f\x30\x34\x2f\x78\x6d\154\144\x73\151\147\55\x6d\x6f\x72\x65\43\163\150\x61\63\x38\64";
    const SHA512 = "\x68\x74\164\160\72\57\57\167\167\167\x2e\x77\x33\x2e\157\162\147\x2f\62\x30\60\61\57\x30\64\57\170\155\x6c\x65\156\143\43\163\x68\x61\65\x31\62";
    const RIPEMD160 = "\150\x74\x74\160\x3a\57\57\x77\167\167\x2e\x77\63\x2e\157\x72\x67\x2f\x32\x30\60\x31\x2f\x30\x34\57\170\155\154\145\x6e\x63\x23\162\151\x70\x65\x6d\x64\x31\x36\60";
    const C14N = "\150\x74\x74\x70\x3a\57\x2f\167\x77\167\x2e\167\63\56\157\x72\x67\57\124\x52\x2f\x32\x30\60\61\x2f\122\x45\x43\x2d\x78\x6d\x6c\x2d\x63\x31\64\156\x2d\62\x30\x30\x31\x30\63\x31\65";
    const C14N_COMMENTS = "\150\x74\x74\160\x3a\57\57\x77\x77\x77\x2e\167\63\56\157\162\x67\57\x54\122\x2f\62\x30\x30\61\57\x52\105\103\x2d\x78\x6d\154\x2d\x63\x31\x34\x6e\x2d\62\x30\x30\61\x30\x33\61\x35\x23\x57\151\x74\x68\x43\157\x6d\x6d\145\156\164\163";
    const EXC_C14N = "\150\x74\164\160\x3a\57\57\x77\x77\x77\56\x77\x33\x2e\157\162\x67\x2f\62\60\60\61\x2f\x31\60\57\170\155\154\x2d\x65\x78\x63\x2d\143\x31\64\156\x23";
    const EXC_C14N_COMMENTS = "\150\164\164\160\x3a\57\x2f\167\167\x77\56\x77\63\x2e\x6f\x72\x67\57\x32\60\x30\61\x2f\61\60\57\170\x6d\154\55\145\x78\143\55\143\61\64\x6e\x23\x57\151\164\150\x43\x6f\155\155\145\156\x74\x73";
    const template = "\74\144\163\72\x53\x69\x67\156\141\x74\165\x72\x65\40\170\x6d\x6c\156\163\x3a\144\x73\75\x22\x68\x74\164\160\72\57\57\x77\167\x77\x2e\167\63\x2e\157\162\147\57\62\x30\x30\x30\57\60\71\x2f\170\x6d\154\144\x73\x69\147\43\42\x3e\xd\xa\x20\40\x3c\144\x73\72\x53\151\147\x6e\145\x64\x49\x6e\x66\157\x3e\xd\xa\40\40\40\40\74\144\x73\72\123\151\147\x6e\141\164\x75\162\x65\115\145\x74\150\157\144\40\57\x3e\15\12\40\x20\74\57\144\163\72\123\151\147\156\x65\144\111\156\146\157\x3e\15\xa\x3c\57\144\163\x3a\x53\x69\x67\156\x61\164\x75\x72\x65\76";
    const BASE_TEMPLATE = "\74\123\x69\147\x6e\141\164\165\x72\145\40\x78\155\154\156\x73\75\x22\150\x74\164\x70\x3a\57\57\167\167\167\56\x77\63\56\x6f\162\x67\x2f\62\x30\x30\x30\x2f\60\x39\x2f\170\155\154\144\163\151\147\x23\42\x3e\15\12\40\x20\x3c\x53\x69\x67\x6e\145\144\111\x6e\146\157\76\xd\xa\x20\40\40\40\74\x53\151\147\x6e\x61\164\165\162\x65\115\145\164\150\157\x64\x20\x2f\x3e\xd\12\40\x20\x3c\57\123\151\147\156\145\144\x49\156\146\157\76\xd\xa\x3c\x2f\x53\x69\x67\x6e\x61\164\165\162\145\76";
    public $sigNode = null;
    public $idKeys = array();
    public $idNS = array();
    private $signedInfo = null;
    private $xPathCtx = null;
    private $canonicalMethod = null;
    private $prefix = '';
    private $searchpfx = "\163\145\x63\x64\x73\151\x67";
    private $validatedNodes = null;
    public function __construct($rG = "\x64\163")
    {
        $Ti = self::BASE_TEMPLATE;
        if (empty($rG)) {
            goto er;
        }
        $this->prefix = $rG . "\x3a";
        $RC = array("\74\x53", "\74\57\x53", "\x78\155\154\x6e\163\75");
        $Fn = array("\x3c{$rG}\72\x53", "\74\x2f{$rG}\x3a\x53", "\x78\155\154\156\163\72{$rG}\x3d");
        $Ti = str_replace($RC, $Fn, $Ti);
        er:
        $aG = new DOMDocument();
        $aG->loadXML($Ti);
        $this->sigNode = $aG->documentElement;
    }
    private function resetXPathObj()
    {
        $this->xPathCtx = null;
    }
    private function getXPathObj()
    {
        if (!(empty($this->xPathCtx) && !empty($this->sigNode))) {
            goto lR;
        }
        $Kf = new DOMXPath($this->sigNode->ownerDocument);
        $Kf->registerNamespace("\163\x65\143\144\163\151\147", self::XMLDSIGNS);
        $this->xPathCtx = $Kf;
        lR:
        return $this->xPathCtx;
    }
    public static function generateGUID($rG = "\160\146\170")
    {
        $Pm = md5(uniqid(mt_rand(), true));
        $zA = $rG . substr($Pm, 0, 8) . "\55" . substr($Pm, 8, 4) . "\55" . substr($Pm, 12, 4) . "\55" . substr($Pm, 16, 4) . "\x2d" . substr($Pm, 20, 12);
        return $zA;
    }
    public static function generate_GUID($rG = "\x70\146\170")
    {
        return self::generateGUID($rG);
    }
    public function locateSignature($tN, $K3 = 0)
    {
        if ($tN instanceof DOMDocument) {
            goto j9;
        }
        $GD = $tN->ownerDocument;
        goto P6;
        j9:
        $GD = $tN;
        P6:
        if (!$GD) {
            goto mW;
        }
        $Kf = new DOMXPath($GD);
        $Kf->registerNamespace("\x73\x65\x63\x64\x73\x69\147", self::XMLDSIGNS);
        $CI = "\56\57\x2f\x73\x65\143\144\163\x69\147\72\x53\151\x67\156\141\164\x75\162\145";
        $wG = $Kf->query($CI, $tN);
        $this->sigNode = $wG->item($K3);
        $CI = "\56\x2f\163\145\143\x64\x73\151\147\72\x53\151\147\x6e\x65\x64\x49\156\146\157";
        $wG = $Kf->query($CI, $this->sigNode);
        if (!($wG->length > 1)) {
            goto hn;
        }
        throw new Exception("\111\x6e\x76\x61\x6c\151\144\40\x73\x74\162\x75\x63\164\x75\162\145\x20\x2d\40\x54\x6f\157\40\155\x61\x6e\171\x20\123\151\147\156\145\144\111\156\146\x6f\40\x65\154\145\x6d\x65\156\x74\163\x20\146\157\165\x6e\x64");
        hn:
        return $this->sigNode;
        mW:
        return null;
    }
    public function createNewSignNode($Zz, $Wl = null)
    {
        $GD = $this->sigNode->ownerDocument;
        if (!is_null($Wl)) {
            goto ZG;
        }
        $XX = $GD->createElementNS(self::XMLDSIGNS, $this->prefix . $Zz);
        goto SN;
        ZG:
        $XX = $GD->createElementNS(self::XMLDSIGNS, $this->prefix . $Zz, $Wl);
        SN:
        return $XX;
    }
    public function setCanonicalMethod($YW)
    {
        switch ($YW) {
            case "\x68\164\x74\x70\72\57\57\167\x77\x77\x2e\x77\63\56\x6f\162\x67\x2f\124\122\x2f\62\60\x30\61\57\x52\105\103\55\x78\155\x6c\x2d\143\x31\x34\156\x2d\x32\x30\60\x31\x30\63\61\x35":
            case "\150\x74\x74\160\x3a\57\x2f\x77\x77\167\56\x77\x33\x2e\x6f\x72\147\x2f\124\122\57\62\60\x30\x31\x2f\122\x45\103\55\170\x6d\x6c\55\143\x31\x34\x6e\55\62\x30\60\61\x30\x33\x31\65\43\127\x69\164\150\x43\x6f\155\155\145\x6e\164\x73":
            case "\150\x74\164\x70\x3a\57\x2f\167\x77\167\56\167\63\56\157\x72\x67\x2f\62\x30\x30\x31\x2f\x31\60\57\x78\x6d\x6c\x2d\x65\170\x63\55\143\61\64\156\43":
            case "\x68\x74\164\160\x3a\x2f\57\167\167\167\56\x77\63\56\x6f\x72\x67\x2f\x32\60\60\x31\x2f\61\60\x2f\x78\155\x6c\x2d\145\x78\143\x2d\x63\61\64\x6e\x23\x57\151\164\x68\103\x6f\155\155\145\x6e\x74\163":
                $this->canonicalMethod = $YW;
                goto Sn;
            default:
                throw new Exception("\x49\x6e\166\141\154\151\x64\x20\x43\141\x6e\157\156\x69\143\x61\x6c\x20\115\145\164\x68\x6f\x64");
        }
        BO:
        Sn:
        if (!($Kf = $this->getXPathObj())) {
            goto Th;
        }
        $CI = "\56\57" . $this->searchpfx . "\x3a\x53\x69\147\x6e\145\144\x49\156\x66\157";
        $wG = $Kf->query($CI, $this->sigNode);
        if (!($og = $wG->item(0))) {
            goto qw;
        }
        $CI = "\x2e\x2f" . $this->searchpfx . "\103\x61\156\157\x6e\x69\x63\x61\x6c\x69\x7a\141\164\151\157\156\115\145\164\150\157\x64";
        $wG = $Kf->query($CI, $og);
        if ($LS = $wG->item(0)) {
            goto tF;
        }
        $LS = $this->createNewSignNode("\103\141\x6e\157\156\151\x63\141\x6c\151\172\x61\164\151\157\156\115\145\x74\150\157\144");
        $og->insertBefore($LS, $og->firstChild);
        tF:
        $LS->setAttribute("\x41\x6c\147\157\162\x69\x74\x68\x6d", $this->canonicalMethod);
        qw:
        Th:
    }
    private function canonicalizeData($XX, $ME, $zY = null, $hJ = null)
    {
        $mq = false;
        $jg = false;
        switch ($ME) {
            case "\150\164\x74\160\x3a\x2f\x2f\167\167\x77\x2e\x77\63\x2e\157\162\147\57\124\122\x2f\x32\60\60\x31\57\122\105\x43\55\170\x6d\154\55\x63\61\64\156\x2d\x32\x30\60\x31\x30\x33\x31\65":
                $mq = false;
                $jg = false;
                goto ZB;
            case "\x68\164\x74\x70\x3a\57\x2f\167\167\x77\56\167\63\56\157\162\147\x2f\124\x52\x2f\x32\x30\x30\61\x2f\122\x45\103\55\x78\x6d\154\55\143\x31\64\156\x2d\62\x30\60\61\60\x33\61\65\x23\x57\x69\164\150\x43\x6f\155\155\145\x6e\164\x73":
                $jg = true;
                goto ZB;
            case "\x68\x74\164\160\x3a\57\57\x77\x77\x77\x2e\167\x33\x2e\x6f\x72\147\57\x32\60\60\x31\x2f\61\60\x2f\170\155\x6c\55\x65\x78\143\x2d\143\x31\x34\156\x23":
                $mq = true;
                goto ZB;
            case "\150\x74\164\160\x3a\57\57\x77\167\167\x2e\x77\63\x2e\x6f\162\147\57\x32\x30\60\61\x2f\61\60\x2f\170\155\x6c\55\x65\x78\x63\55\143\61\64\156\x23\127\x69\164\150\x43\157\155\x6d\x65\x6e\164\x73":
                $mq = true;
                $jg = true;
                goto ZB;
        }
        T6:
        ZB:
        if (!(is_null($zY) && $XX instanceof DOMNode && $XX->ownerDocument !== null && $XX->isSameNode($XX->ownerDocument->documentElement))) {
            goto SC;
        }
        $LQ = $XX;
        Q6:
        if (!($t7 = $LQ->previousSibling)) {
            goto LQ;
        }
        if (!($t7->nodeType == XML_PI_NODE || $t7->nodeType == XML_COMMENT_NODE && $jg)) {
            goto oB;
        }
        goto LQ;
        oB:
        $LQ = $t7;
        goto Q6;
        LQ:
        if (!($t7 == null)) {
            goto K6;
        }
        $XX = $XX->ownerDocument;
        K6:
        SC:
        return $XX->C14N($mq, $jg, $zY, $hJ);
    }
    public function canonicalizeSignedInfo()
    {
        $GD = $this->sigNode->ownerDocument;
        $ME = null;
        if (!$GD) {
            goto b9;
        }
        $Kf = $this->getXPathObj();
        $CI = "\x2e\x2f\x73\x65\143\144\x73\x69\147\x3a\123\151\147\x6e\x65\144\111\x6e\x66\157";
        $wG = $Kf->query($CI, $this->sigNode);
        if (!($wG->length > 1)) {
            goto FE;
        }
        throw new Exception("\111\x6e\x76\x61\154\x69\144\x20\163\164\162\x75\x63\164\x75\x72\x65\x20\x2d\40\124\x6f\x6f\40\155\141\156\171\x20\123\151\147\x6e\x65\x64\111\x6e\x66\x6f\x20\145\x6c\145\x6d\145\156\164\163\40\146\x6f\x75\156\x64");
        FE:
        if (!($Di = $wG->item(0))) {
            goto h0;
        }
        $CI = "\x2e\x2f\163\x65\x63\x64\x73\151\147\72\x43\141\x6e\x6f\x6e\x69\x63\141\154\151\x7a\141\x74\x69\x6f\156\115\145\x74\150\x6f\x64";
        $wG = $Kf->query($CI, $Di);
        $hJ = null;
        if (!($LS = $wG->item(0))) {
            goto HM;
        }
        $ME = $LS->getAttribute("\x41\154\147\x6f\162\151\164\150\x6d");
        foreach ($LS->childNodes as $XX) {
            if (!($XX->localName == "\111\156\143\154\165\x73\x69\x76\145\x4e\x61\x6d\145\x73\x70\x61\143\145\163")) {
                goto nG;
            }
            if (!($jx = $XX->getAttribute("\x50\162\x65\146\x69\170\x4c\151\x73\164"))) {
                goto Ji;
            }
            $wo = array_filter(explode("\x20", $jx));
            if (!(count($wo) > 0)) {
                goto ma;
            }
            $hJ = array_merge($hJ ? $hJ : array(), $wo);
            ma:
            Ji:
            nG:
            qd:
        }
        Ie:
        HM:
        $this->signedInfo = $this->canonicalizeData($Di, $ME, null, $hJ);
        return $this->signedInfo;
        h0:
        b9:
        return null;
    }
    public function calculateDigest($sZ, $iZ, $L9 = true)
    {
        switch ($sZ) {
            case self::SHA1:
                $vd = "\x73\x68\141\61";
                goto PM;
            case self::SHA256:
                $vd = "\x73\x68\x61\x32\65\66";
                goto PM;
            case self::SHA384:
                $vd = "\x73\150\141\x33\70\x34";
                goto PM;
            case self::SHA512:
                $vd = "\163\x68\141\x35\x31\x32";
                goto PM;
            case self::RIPEMD160:
                $vd = "\x72\151\160\145\x6d\x64\61\66\x30";
                goto PM;
            default:
                throw new Exception("\103\141\x6e\156\157\x74\x20\x76\x61\154\151\144\x61\164\x65\40\144\x69\x67\145\x73\164\x3a\40\125\156\x73\165\x70\x70\157\162\164\145\144\40\x41\x6c\147\x6f\x72\151\x74\x68\155\x20\74{$sZ}\x3e");
        }
        tp:
        PM:
        $Pq = hash($vd, $iZ, true);
        if (!$L9) {
            goto AV;
        }
        $Pq = base64_encode($Pq);
        AV:
        return $Pq;
    }
    public function validateDigest($dH, $iZ)
    {
        $Kf = new DOMXPath($dH->ownerDocument);
        $Kf->registerNamespace("\163\145\143\144\163\x69\147", self::XMLDSIGNS);
        $CI = "\163\x74\x72\151\156\x67\x28\x2e\57\163\145\x63\x64\x73\151\x67\x3a\x44\151\147\x65\163\164\115\x65\164\150\157\144\57\x40\101\x6c\147\157\x72\151\x74\150\155\x29";
        $sZ = $Kf->evaluate($CI, $dH);
        $dE = $this->calculateDigest($sZ, $iZ, false);
        $CI = "\163\164\x72\151\x6e\x67\50\x2e\x2f\163\145\143\x64\x73\x69\147\72\104\151\x67\145\163\164\126\x61\x6c\x75\145\x29";
        $hB = $Kf->evaluate($CI, $dH);
        return $dE === base64_decode($hB);
    }
    public function processTransforms($dH, $iR, $qp = true)
    {
        $iZ = $iR;
        $Kf = new DOMXPath($dH->ownerDocument);
        $Kf->registerNamespace("\163\145\143\x64\163\151\147", self::XMLDSIGNS);
        $CI = "\56\x2f\163\x65\x63\144\x73\151\147\72\124\162\141\x6e\163\146\157\x72\155\x73\57\x73\x65\x63\x64\x73\x69\x67\x3a\124\x72\141\156\163\146\x6f\162\155";
        $mo = $Kf->query($CI, $dH);
        $HE = "\x68\x74\164\160\x3a\57\57\x77\167\x77\x2e\x77\x33\x2e\x6f\162\x67\57\124\x52\x2f\x32\60\x30\61\57\122\x45\x43\x2d\170\155\154\55\143\61\64\156\x2d\x32\60\60\x31\60\63\x31\65";
        $zY = null;
        $hJ = null;
        foreach ($mo as $jF) {
            $iL = $jF->getAttribute("\101\x6c\x67\157\162\151\x74\150\155");
            switch ($iL) {
                case "\150\x74\x74\x70\x3a\x2f\x2f\x77\x77\x77\x2e\x77\63\x2e\x6f\162\x67\x2f\x32\x30\60\61\57\x31\60\57\x78\x6d\x6c\x2d\145\170\x63\55\x63\61\x34\156\x23":
                case "\x68\x74\164\160\x3a\57\57\x77\167\x77\x2e\167\x33\56\157\x72\x67\57\62\60\x30\61\x2f\61\60\x2f\170\155\154\x2d\x65\x78\143\x2d\143\61\x34\156\x23\x57\151\x74\x68\x43\x6f\155\155\145\156\164\x73":
                    if (!$qp) {
                        goto Ov;
                    }
                    $HE = $iL;
                    goto kc;
                    Ov:
                    $HE = "\x68\x74\164\160\x3a\x2f\57\x77\x77\x77\x2e\x77\63\56\x6f\162\x67\57\62\60\60\x31\x2f\x31\x30\x2f\170\155\154\55\x65\170\143\55\143\61\64\156\43";
                    kc:
                    $XX = $jF->firstChild;
                    V9:
                    if (!$XX) {
                        goto XC;
                    }
                    if (!($XX->localName == "\111\x6e\x63\154\165\163\151\x76\x65\x4e\x61\x6d\x65\x73\160\x61\143\145\x73")) {
                        goto SQ;
                    }
                    if (!($jx = $XX->getAttribute("\120\162\145\x66\x69\170\x4c\x69\x73\164"))) {
                        goto t3;
                    }
                    $wo = array();
                    $Tv = explode("\40", $jx);
                    foreach ($Tv as $jx) {
                        $c2 = trim($jx);
                        if (empty($c2)) {
                            goto ly;
                        }
                        $wo[] = $c2;
                        ly:
                        ft:
                    }
                    o7:
                    if (!(count($wo) > 0)) {
                        goto yU;
                    }
                    $hJ = $wo;
                    yU:
                    t3:
                    goto XC;
                    SQ:
                    $XX = $XX->nextSibling;
                    goto V9;
                    XC:
                    goto cS;
                case "\150\164\x74\160\x3a\x2f\57\x77\x77\x77\56\x77\63\x2e\x6f\162\x67\57\124\122\57\62\x30\60\x31\57\x52\x45\103\x2d\170\155\154\55\143\61\64\x6e\x2d\62\x30\x30\x31\x30\x33\x31\65":
                case "\x68\164\x74\x70\72\57\57\167\167\167\x2e\x77\63\x2e\157\x72\x67\x2f\x54\122\57\62\60\x30\61\x2f\122\x45\103\55\170\155\x6c\55\x63\x31\x34\156\55\x32\x30\60\x31\60\x33\x31\x35\43\127\x69\164\150\x43\x6f\x6d\155\145\156\164\x73":
                    if (!$qp) {
                        goto iT;
                    }
                    $HE = $iL;
                    goto DU;
                    iT:
                    $HE = "\x68\x74\x74\x70\x3a\x2f\x2f\x77\167\167\56\167\63\x2e\x6f\x72\x67\57\124\x52\x2f\62\60\x30\x31\x2f\x52\x45\103\55\x78\155\x6c\x2d\x63\61\64\x6e\x2d\x32\x30\60\61\60\x33\x31\x35";
                    DU:
                    goto cS;
                case "\x68\164\164\x70\x3a\x2f\57\x77\x77\167\x2e\167\63\56\157\x72\147\57\x54\122\x2f\61\71\71\x39\57\x52\x45\103\x2d\170\x70\141\164\x68\55\x31\x39\71\71\61\61\x31\x36":
                    $XX = $jF->firstChild;
                    N7:
                    if (!$XX) {
                        goto N3;
                    }
                    if (!($XX->localName == "\130\120\141\x74\x68")) {
                        goto Nj;
                    }
                    $zY = array();
                    $zY["\x71\x75\x65\x72\x79"] = "\x28\56\x2f\x2f\x2e\x20\x7c\40\x2e\57\x2f\x40\x2a\x20\x7c\x20\x2e\x2f\57\x6e\x61\x6d\145\x73\x70\141\x63\145\72\72\x2a\51\133" . $XX->nodeValue . "\x5d";
                    $zY["\156\x61\155\145\163\160\x61\143\145\x73"] = array();
                    $o0 = $Kf->query("\x2e\x2f\x6e\x61\155\x65\163\160\x61\x63\145\72\72\52", $XX);
                    foreach ($o0 as $Dp) {
                        if (!($Dp->localName != "\x78\155\x6c")) {
                            goto EX;
                        }
                        $zY["\x6e\141\x6d\x65\x73\x70\x61\143\145\x73"][$Dp->localName] = $Dp->nodeValue;
                        EX:
                        h_:
                    }
                    RL:
                    goto N3;
                    Nj:
                    $XX = $XX->nextSibling;
                    goto N7;
                    N3:
                    goto cS;
            }
            Ko:
            cS:
            Xq:
        }
        aI:
        if (!$iZ instanceof DOMNode) {
            goto gM;
        }
        $iZ = $this->canonicalizeData($iR, $HE, $zY, $hJ);
        gM:
        return $iZ;
    }
    public function processRefNode($dH)
    {
        $SG = null;
        $qp = true;
        if ($w3 = $dH->getAttribute("\x55\122\111")) {
            goto jm;
        }
        $qp = false;
        $SG = $dH->ownerDocument;
        goto bw;
        jm:
        $q_ = parse_url($w3);
        if (!empty($q_["\160\x61\x74\x68"])) {
            goto UM;
        }
        if ($bs = $q_["\146\162\x61\x67\155\x65\156\164"]) {
            goto cY;
        }
        $SG = $dH->ownerDocument;
        goto b6;
        cY:
        $qp = false;
        $JK = new DOMXPath($dH->ownerDocument);
        if (!($this->idNS && is_array($this->idNS))) {
            goto dX;
        }
        foreach ($this->idNS as $bc => $Cm) {
            $JK->registerNamespace($bc, $Cm);
            rR:
        }
        iz:
        dX:
        $F5 = "\100\111\144\75\42" . XPath::filterAttrValue($bs, XPath::DOUBLE_QUOTE) . "\x22";
        if (!is_array($this->idKeys)) {
            goto aM;
        }
        foreach ($this->idKeys as $b2) {
            $F5 .= "\40\157\x72\x20\100" . XPath::filterAttrName($b2) . "\75\x22" . XPath::filterAttrValue($bs, XPath::DOUBLE_QUOTE) . "\x22";
            VB:
        }
        ha:
        aM:
        $CI = "\57\57\x2a\x5b" . $F5 . "\x5d";
        $SG = $JK->query($CI)->item(0);
        b6:
        UM:
        bw:
        $iZ = $this->processTransforms($dH, $SG, $qp);
        if ($this->validateDigest($dH, $iZ)) {
            goto LG;
        }
        return false;
        LG:
        if (!$SG instanceof DOMNode) {
            goto fI;
        }
        if (!empty($bs)) {
            goto Jj;
        }
        $this->validatedNodes[] = $SG;
        goto Cv;
        Jj:
        $this->validatedNodes[$bs] = $SG;
        Cv:
        fI:
        return true;
    }
    public function getRefNodeID($dH)
    {
        if (!($w3 = $dH->getAttribute("\125\x52\111"))) {
            goto i5;
        }
        $q_ = parse_url($w3);
        if (!empty($q_["\160\141\x74\150"])) {
            goto w2;
        }
        if (!($bs = $q_["\146\162\x61\147\155\x65\156\164"])) {
            goto at;
        }
        return $bs;
        at:
        w2:
        i5:
        return null;
    }
    public function getRefIDs()
    {
        $gu = array();
        $Kf = $this->getXPathObj();
        $CI = "\x2e\57\x73\145\x63\144\x73\151\147\72\123\151\x67\156\145\144\x49\156\146\157\133\61\135\57\x73\145\143\144\x73\x69\x67\x3a\x52\145\146\x65\x72\x65\156\x63\x65";
        $wG = $Kf->query($CI, $this->sigNode);
        if (!($wG->length == 0)) {
            goto Bc;
        }
        throw new Exception("\x52\x65\146\145\162\x65\x6e\143\x65\x20\x6e\157\144\x65\163\40\156\157\x74\40\146\x6f\165\156\x64");
        Bc:
        foreach ($wG as $dH) {
            $gu[] = $this->getRefNodeID($dH);
            dw:
        }
        iV:
        return $gu;
    }
    public function validateReference()
    {
        $De = $this->sigNode->ownerDocument->documentElement;
        if ($De->isSameNode($this->sigNode)) {
            goto A9;
        }
        if (!($this->sigNode->parentNode != null)) {
            goto rY;
        }
        $this->sigNode->parentNode->removeChild($this->sigNode);
        rY:
        A9:
        $Kf = $this->getXPathObj();
        $CI = "\x2e\57\163\x65\x63\144\x73\x69\147\x3a\x53\x69\x67\x6e\145\x64\111\x6e\x66\x6f\133\61\135\57\x73\145\143\x64\x73\151\x67\x3a\x52\x65\x66\x65\x72\145\x6e\143\145";
        $wG = $Kf->query($CI, $this->sigNode);
        if (!($wG->length == 0)) {
            goto SY;
        }
        throw new Exception("\x52\145\146\x65\x72\145\156\143\145\x20\156\x6f\144\145\x73\x20\x6e\x6f\x74\40\x66\x6f\x75\x6e\x64");
        SY:
        $this->validatedNodes = array();
        foreach ($wG as $dH) {
            if ($this->processRefNode($dH)) {
                goto jq;
            }
            $this->validatedNodes = null;
            throw new Exception("\x52\145\x66\x65\x72\145\x6e\x63\145\x20\x76\x61\154\x69\x64\x61\x74\151\157\156\x20\x66\141\x69\154\x65\x64");
            jq:
            b4:
        }
        uo:
        return true;
    }
    private function addRefInternal($od, $XX, $iL, $ic = null, $Px = null)
    {
        $rG = null;
        $EO = null;
        $Fd = "\111\144";
        $LK = true;
        $o1 = false;
        if (!is_array($Px)) {
            goto js;
        }
        $rG = empty($Px["\160\162\145\146\x69\x78"]) ? null : $Px["\160\x72\145\x66\151\170"];
        $EO = empty($Px["\160\x72\145\146\151\170\137\156\x73"]) ? null : $Px["\x70\x72\x65\146\x69\x78\137\x6e\163"];
        $Fd = empty($Px["\x69\144\137\156\x61\x6d\145"]) ? "\x49\144" : $Px["\151\144\137\156\141\155\x65"];
        $LK = empty($Px["\x6f\166\145\x72\167\162\151\164\145"]) ? true : (bool) $Px["\x6f\x76\x65\162\167\162\x69\164\x65"];
        $o1 = empty($Px["\x66\157\x72\143\145\x5f\165\x72\x69"]) ? false : (bool) $Px["\x66\x6f\162\143\x65\x5f\165\x72\x69"];
        js:
        $Xv = $Fd;
        if (empty($rG)) {
            goto Mv;
        }
        $Xv = $rG . "\x3a" . $Xv;
        Mv:
        $dH = $this->createNewSignNode("\122\145\146\x65\162\145\156\x63\x65");
        $od->appendChild($dH);
        if (!$XX instanceof DOMDocument) {
            goto rs;
        }
        if ($o1) {
            goto KA;
        }
        goto kZ;
        rs:
        $w3 = null;
        if ($LK) {
            goto ir;
        }
        $w3 = $EO ? $XX->getAttributeNS($EO, $Fd) : $XX->getAttribute($Fd);
        ir:
        if (!empty($w3)) {
            goto kf;
        }
        $w3 = self::generateGUID();
        $XX->setAttributeNS($EO, $Xv, $w3);
        kf:
        $dH->setAttribute("\125\x52\111", "\x23" . $w3);
        goto kZ;
        KA:
        $dH->setAttribute("\125\122\x49", '');
        kZ:
        $E2 = $this->createNewSignNode("\124\x72\x61\156\163\x66\157\162\x6d\163");
        $dH->appendChild($E2);
        if (is_array($ic)) {
            goto Bi;
        }
        if (!empty($this->canonicalMethod)) {
            goto Jg;
        }
        goto D2;
        Bi:
        foreach ($ic as $jF) {
            $ZX = $this->createNewSignNode("\x54\x72\141\156\x73\146\x6f\x72\155");
            $E2->appendChild($ZX);
            if (is_array($jF) && !empty($jF["\x68\164\164\x70\x3a\x2f\57\167\x77\167\56\167\x33\x2e\157\162\x67\x2f\x54\122\57\61\x39\71\x39\57\122\105\103\55\170\x70\x61\x74\150\x2d\61\71\x39\71\61\x31\x31\66"]) && !empty($jF["\150\x74\x74\x70\72\57\x2f\167\167\x77\x2e\x77\63\56\x6f\162\147\x2f\124\x52\x2f\61\x39\71\x39\x2f\x52\x45\103\55\170\x70\141\164\x68\55\x31\x39\71\x39\61\61\61\x36"]["\x71\x75\145\x72\x79"])) {
                goto Ns;
            }
            $ZX->setAttribute("\101\154\147\x6f\x72\x69\x74\150\x6d", $jF);
            goto gE;
            Ns:
            $ZX->setAttribute("\101\154\147\x6f\162\x69\x74\x68\x6d", "\x68\164\164\160\x3a\57\57\x77\x77\167\x2e\167\x33\x2e\157\162\147\x2f\x54\x52\57\61\x39\71\x39\x2f\122\x45\103\x2d\x78\160\x61\164\150\x2d\61\71\71\71\61\x31\61\66");
            $GV = $this->createNewSignNode("\130\120\x61\x74\150", $jF["\x68\164\164\160\x3a\57\57\167\x77\x77\x2e\167\63\x2e\157\x72\147\57\x54\x52\57\61\71\71\x39\x2f\122\x45\x43\55\170\x70\141\164\150\55\61\71\71\71\x31\x31\x31\66"]["\x71\x75\145\x72\171"]);
            $ZX->appendChild($GV);
            if (empty($jF["\x68\x74\x74\160\72\x2f\57\x77\x77\167\x2e\x77\63\56\157\162\x67\x2f\x54\122\57\61\71\x39\71\x2f\122\105\103\x2d\x78\160\x61\164\150\55\x31\71\x39\x39\x31\x31\61\x36"]["\156\x61\x6d\145\163\x70\x61\x63\145\163"])) {
                goto Xg;
            }
            foreach ($jF["\x68\164\x74\160\72\x2f\57\x77\x77\x77\56\167\x33\56\157\162\147\x2f\x54\122\57\x31\71\71\x39\x2f\x52\105\x43\55\x78\160\141\164\x68\55\x31\x39\x39\x39\x31\x31\61\66"]["\156\x61\x6d\x65\163\x70\x61\143\145\x73"] as $rG => $y3) {
                $GV->setAttributeNS("\150\x74\x74\x70\x3a\x2f\57\167\167\167\56\167\x33\56\x6f\x72\x67\x2f\62\60\60\x30\57\x78\155\154\156\163\57", "\170\x6d\x6c\x6e\x73\x3a{$rG}", $y3);
                lC:
            }
            r8:
            Xg:
            gE:
            E3:
        }
        wi:
        goto D2;
        Jg:
        $ZX = $this->createNewSignNode("\x54\x72\141\156\x73\x66\x6f\x72\x6d");
        $E2->appendChild($ZX);
        $ZX->setAttribute("\x41\154\x67\x6f\x72\x69\164\150\155", $this->canonicalMethod);
        D2:
        $vT = $this->processTransforms($dH, $XX);
        $dE = $this->calculateDigest($iL, $vT);
        $Nw = $this->createNewSignNode("\104\151\x67\145\x73\x74\x4d\145\x74\x68\157\144");
        $dH->appendChild($Nw);
        $Nw->setAttribute("\101\154\147\x6f\162\151\x74\x68\x6d", $iL);
        $hB = $this->createNewSignNode("\x44\x69\x67\x65\x73\164\126\x61\x6c\165\x65", $dE);
        $dH->appendChild($hB);
    }
    public function addReference($XX, $iL, $ic = null, $Px = null)
    {
        if (!($Kf = $this->getXPathObj())) {
            goto Ro;
        }
        $CI = "\x2e\57\x73\145\x63\x64\163\x69\x67\72\123\151\147\x6e\x65\x64\111\x6e\146\x6f";
        $wG = $Kf->query($CI, $this->sigNode);
        if (!($iB = $wG->item(0))) {
            goto C3;
        }
        $this->addRefInternal($iB, $XX, $iL, $ic, $Px);
        C3:
        Ro:
    }
    public function addReferenceList($sN, $iL, $ic = null, $Px = null)
    {
        if (!($Kf = $this->getXPathObj())) {
            goto Mr;
        }
        $CI = "\56\57\163\x65\143\144\163\151\x67\x3a\x53\151\x67\156\x65\144\x49\x6e\146\x6f";
        $wG = $Kf->query($CI, $this->sigNode);
        if (!($iB = $wG->item(0))) {
            goto eI;
        }
        foreach ($sN as $XX) {
            $this->addRefInternal($iB, $XX, $iL, $ic, $Px);
            ys:
        }
        gg:
        eI:
        Mr:
    }
    public function addObject($iZ, $JJ = null, $kB = null)
    {
        $Yh = $this->createNewSignNode("\117\x62\x6a\x65\x63\x74");
        $this->sigNode->appendChild($Yh);
        if (empty($JJ)) {
            goto SL;
        }
        $Yh->setAttribute("\x4d\151\155\x65\124\171\160\x65", $JJ);
        SL:
        if (empty($kB)) {
            goto wv;
        }
        $Yh->setAttribute("\105\x6e\143\157\x64\151\156\x67", $kB);
        wv:
        if ($iZ instanceof DOMElement) {
            goto rX;
        }
        $tV = $this->sigNode->ownerDocument->createTextNode($iZ);
        goto lr;
        rX:
        $tV = $this->sigNode->ownerDocument->importNode($iZ, true);
        lr:
        $Yh->appendChild($tV);
        return $Yh;
    }
    public function locateKey($XX = null)
    {
        if (!empty($XX)) {
            goto Zk;
        }
        $XX = $this->sigNode;
        Zk:
        if ($XX instanceof DOMNode) {
            goto pA;
        }
        return null;
        pA:
        if (!($GD = $XX->ownerDocument)) {
            goto ec;
        }
        $Kf = new DOMXPath($GD);
        $Kf->registerNamespace("\x73\145\143\144\163\x69\147", self::XMLDSIGNS);
        $CI = "\163\164\x72\151\156\x67\x28\56\x2f\163\145\x63\144\163\151\147\x3a\x53\x69\x67\156\x65\144\111\x6e\146\x6f\57\x73\145\x63\144\163\151\147\72\123\x69\x67\x6e\141\164\x75\162\x65\115\145\164\150\x6f\x64\x2f\100\101\154\147\157\162\151\164\150\155\x29";
        $iL = $Kf->evaluate($CI, $XX);
        if (!$iL) {
            goto vf;
        }
        try {
            $VX = new XMLSecurityKey($iL, array("\x74\x79\160\x65" => "\x70\165\142\154\151\x63"));
        } catch (Exception $cN) {
            return null;
        }
        return $VX;
        vf:
        ec:
        return null;
    }
    public function verify($VX)
    {
        $GD = $this->sigNode->ownerDocument;
        $Kf = new DOMXPath($GD);
        $Kf->registerNamespace("\x73\145\x63\x64\x73\x69\x67", self::XMLDSIGNS);
        $CI = "\163\x74\x72\x69\156\147\x28\56\x2f\x73\x65\143\x64\163\151\x67\72\123\x69\x67\156\x61\164\165\162\145\x56\x61\x6c\165\x65\x29";
        $vk = $Kf->evaluate($CI, $this->sigNode);
        if (!empty($vk)) {
            goto Ty;
        }
        throw new Exception("\125\156\x61\142\x6c\x65\40\x74\157\40\x6c\157\143\141\x74\x65\40\x53\x69\x67\x6e\x61\164\x75\162\x65\x56\x61\x6c\x75\145");
        Ty:
        return $VX->verifySignature($this->signedInfo, base64_decode($vk));
    }
    public function signData($VX, $iZ)
    {
        return $VX->signData($iZ);
    }
    public function sign($VX, $O9 = null)
    {
        if (!($O9 != null)) {
            goto I7;
        }
        $this->resetXPathObj();
        $this->appendSignature($O9);
        $this->sigNode = $O9->lastChild;
        I7:
        if (!($Kf = $this->getXPathObj())) {
            goto cT;
        }
        $CI = "\x2e\x2f\163\145\x63\144\x73\151\147\72\123\x69\x67\156\x65\x64\111\x6e\x66\157";
        $wG = $Kf->query($CI, $this->sigNode);
        if (!($iB = $wG->item(0))) {
            goto cr;
        }
        $CI = "\x2e\x2f\163\145\143\144\163\151\147\x3a\123\x69\147\x6e\141\x74\165\162\145\x4d\x65\164\150\x6f\144";
        $wG = $Kf->query($CI, $iB);
        $go = $wG->item(0);
        $go->setAttribute("\x41\154\x67\x6f\162\151\164\150\x6d", $VX->type);
        $iZ = $this->canonicalizeData($iB, $this->canonicalMethod);
        $vk = base64_encode($this->signData($VX, $iZ));
        $yZ = $this->createNewSignNode("\x53\151\x67\156\x61\x74\165\162\x65\x56\x61\x6c\165\x65", $vk);
        if ($N3 = $iB->nextSibling) {
            goto S8;
        }
        $this->sigNode->appendChild($yZ);
        goto Oa;
        S8:
        $N3->parentNode->insertBefore($yZ, $N3);
        Oa:
        cr:
        cT:
    }
    public function appendCert()
    {
    }
    public function appendKey($VX, $TS = null)
    {
        $VX->serializeKey($TS);
    }
    public function insertSignature($XX, $zn = null)
    {
        $tR = $XX->ownerDocument;
        $F_ = $tR->importNode($this->sigNode, true);
        if ($zn == null) {
            goto Yq;
        }
        return $XX->insertBefore($F_, $zn);
        goto pM;
        Yq:
        return $XX->insertBefore($F_);
        pM:
    }
    public function appendSignature($xr, $x5 = false)
    {
        $zn = $x5 ? $xr->firstChild : null;
        return $this->insertSignature($xr, $zn);
    }
    public static function get509XCert($sp, $co = true)
    {
        $u1 = self::staticGet509XCerts($sp, $co);
        if (empty($u1)) {
            goto V6;
        }
        return $u1[0];
        V6:
        return '';
    }
    public static function staticGet509XCerts($u1, $co = true)
    {
        if ($co) {
            goto le;
        }
        return array($u1);
        goto Ll;
        le:
        $iZ = '';
        $UP = array();
        $bo = explode("\12", $u1);
        $Yv = false;
        foreach ($bo as $XS) {
            if (!$Yv) {
                goto sd;
            }
            if (!(strncmp($XS, "\55\55\x2d\55\55\x45\x4e\x44\x20\x43\x45\122\124\x49\106\111\103\x41\124\105", 20) == 0)) {
                goto eO;
            }
            $Yv = false;
            $UP[] = $iZ;
            $iZ = '';
            goto JW;
            eO:
            $iZ .= trim($XS);
            goto Ef;
            sd:
            if (!(strncmp($XS, "\55\55\55\x2d\55\102\x45\x47\111\116\40\103\x45\x52\x54\111\x46\x49\103\x41\x54\x45", 22) == 0)) {
                goto Gw;
            }
            $Yv = true;
            Gw:
            Ef:
            JW:
        }
        DS:
        return $UP;
        Ll:
    }
    public static function staticAdd509Cert($Fi, $sp, $co = true, $zC = false, $Kf = null, $Px = null)
    {
        if (!$zC) {
            goto F7;
        }
        $sp = file_get_contents($sp);
        F7:
        if ($Fi instanceof DOMElement) {
            goto hW;
        }
        throw new Exception("\111\156\166\141\x6c\151\144\x20\x70\x61\x72\145\156\x74\40\116\x6f\144\x65\40\x70\x61\x72\x61\155\145\164\x65\x72");
        hW:
        $yA = $Fi->ownerDocument;
        if (!empty($Kf)) {
            goto d6;
        }
        $Kf = new DOMXPath($Fi->ownerDocument);
        $Kf->registerNamespace("\x73\145\143\144\163\x69\x67", self::XMLDSIGNS);
        d6:
        $CI = "\56\x2f\163\x65\143\144\163\x69\147\x3a\113\x65\171\x49\x6e\146\157";
        $wG = $Kf->query($CI, $Fi);
        $Tq = $wG->item(0);
        $cU = '';
        if (!$Tq) {
            goto zH;
        }
        $jx = $Tq->lookupPrefix(self::XMLDSIGNS);
        if (empty($jx)) {
            goto uC;
        }
        $cU = $jx . "\x3a";
        uC:
        goto Ab;
        zH:
        $jx = $Fi->lookupPrefix(self::XMLDSIGNS);
        if (empty($jx)) {
            goto b3;
        }
        $cU = $jx . "\x3a";
        b3:
        $XM = false;
        $Tq = $yA->createElementNS(self::XMLDSIGNS, $cU . "\113\145\x79\111\156\x66\157");
        $CI = "\56\x2f\x73\145\143\144\163\x69\x67\72\117\x62\x6a\145\143\164";
        $wG = $Kf->query($CI, $Fi);
        if (!($Fq = $wG->item(0))) {
            goto zK;
        }
        $Fq->parentNode->insertBefore($Tq, $Fq);
        $XM = true;
        zK:
        if ($XM) {
            goto OZ;
        }
        $Fi->appendChild($Tq);
        OZ:
        Ab:
        $u1 = self::staticGet509XCerts($sp, $co);
        $Lw = $yA->createElementNS(self::XMLDSIGNS, $cU . "\x58\x35\60\71\x44\141\x74\x61");
        $Tq->appendChild($Lw);
        $a1 = false;
        $W3 = false;
        if (!is_array($Px)) {
            goto SO;
        }
        if (empty($Px["\x69\163\163\165\145\x72\123\x65\162\x69\141\154"])) {
            goto Fc;
        }
        $a1 = true;
        Fc:
        if (empty($Px["\163\165\142\152\x65\143\164\116\141\x6d\145"])) {
            goto yH;
        }
        $W3 = true;
        yH:
        SO:
        foreach ($u1 as $pd) {
            if (!($a1 || $W3)) {
                goto Xr;
            }
            if (!($WZ = openssl_x509_parse("\55\55\55\x2d\x2d\x42\105\107\111\116\40\x43\x45\x52\124\x49\x46\111\x43\101\124\x45\x2d\55\x2d\x2d\x2d\12" . chunk_split($pd, 64, "\12") . "\x2d\55\x2d\55\55\x45\x4e\x44\40\x43\105\x52\124\111\x46\111\x43\101\x54\x45\55\x2d\55\x2d\55\xa"))) {
                goto Rz;
            }
            if (!($W3 && !empty($WZ["\163\165\142\x6a\145\x63\x74"]))) {
                goto hy;
            }
            if (is_array($WZ["\163\165\x62\x6a\145\143\164"])) {
                goto QH;
            }
            $q9 = $WZ["\x69\x73\x73\165\x65\x72"];
            goto Qy;
            QH:
            $KX = array();
            foreach ($WZ["\163\165\142\152\145\x63\x74"] as $mr => $Wl) {
                if (is_array($Wl)) {
                    goto XG;
                }
                array_unshift($KX, "{$mr}\75{$Wl}");
                goto gv;
                XG:
                foreach ($Wl as $Lc) {
                    array_unshift($KX, "{$mr}\x3d{$Lc}");
                    Gn:
                }
                S7:
                gv:
                nZ:
            }
            yi:
            $q9 = implode("\x2c", $KX);
            Qy:
            $lL = $yA->createElementNS(self::XMLDSIGNS, $cU . "\x58\x35\60\71\x53\x75\142\152\145\143\x74\x4e\141\155\x65", $q9);
            $Lw->appendChild($lL);
            hy:
            if (!($a1 && !empty($WZ["\x69\x73\x73\x75\x65\162"]) && !empty($WZ["\x73\x65\x72\151\x61\154\x4e\x75\x6d\x62\x65\162"]))) {
                goto Gx;
            }
            if (is_array($WZ["\x69\x73\x73\165\x65\x72"])) {
                goto Ey;
            }
            $pZ = $WZ["\151\x73\163\x75\145\162"];
            goto Cc;
            Ey:
            $KX = array();
            foreach ($WZ["\151\163\x73\165\145\162"] as $mr => $Wl) {
                array_unshift($KX, "{$mr}\x3d{$Wl}");
                Yr:
            }
            Tz:
            $pZ = implode("\54", $KX);
            Cc:
            $QT = $yA->createElementNS(self::XMLDSIGNS, $cU . "\130\x35\x30\x39\111\x73\163\x75\x65\162\x53\x65\x72\151\141\x6c");
            $Lw->appendChild($QT);
            $hq = $yA->createElementNS(self::XMLDSIGNS, $cU . "\130\x35\60\71\x49\163\x73\165\x65\x72\x4e\141\x6d\x65", $pZ);
            $QT->appendChild($hq);
            $hq = $yA->createElementNS(self::XMLDSIGNS, $cU . "\130\x35\60\71\123\145\x72\151\x61\154\116\165\x6d\142\145\162", $WZ["\x73\145\162\151\x61\x6c\116\165\155\x62\145\x72"]);
            $QT->appendChild($hq);
            Gx:
            Rz:
            Xr:
            $NW = $yA->createElementNS(self::XMLDSIGNS, $cU . "\130\65\60\x39\103\145\162\x74\x69\x66\151\143\x61\x74\x65", $pd);
            $Lw->appendChild($NW);
            pg:
        }
        pD:
    }
    public function add509Cert($sp, $co = true, $zC = false, $Px = null)
    {
        if (!($Kf = $this->getXPathObj())) {
            goto nd;
        }
        self::staticAdd509Cert($this->sigNode, $sp, $co, $zC, $Kf, $Px);
        nd:
    }
    public function appendToKeyInfo($XX)
    {
        $Fi = $this->sigNode;
        $yA = $Fi->ownerDocument;
        $Kf = $this->getXPathObj();
        if (!empty($Kf)) {
            goto QX;
        }
        $Kf = new DOMXPath($Fi->ownerDocument);
        $Kf->registerNamespace("\163\145\143\x64\163\151\147", self::XMLDSIGNS);
        QX:
        $CI = "\x2e\57\163\x65\143\144\x73\x69\147\x3a\x4b\145\x79\x49\156\x66\157";
        $wG = $Kf->query($CI, $Fi);
        $Tq = $wG->item(0);
        if ($Tq) {
            goto uK;
        }
        $cU = '';
        $jx = $Fi->lookupPrefix(self::XMLDSIGNS);
        if (empty($jx)) {
            goto Rh;
        }
        $cU = $jx . "\72";
        Rh:
        $XM = false;
        $Tq = $yA->createElementNS(self::XMLDSIGNS, $cU . "\113\x65\x79\x49\x6e\146\x6f");
        $CI = "\x2e\57\163\145\143\144\x73\x69\147\x3a\x4f\x62\x6a\x65\143\x74";
        $wG = $Kf->query($CI, $Fi);
        if (!($Fq = $wG->item(0))) {
            goto lQ;
        }
        $Fq->parentNode->insertBefore($Tq, $Fq);
        $XM = true;
        lQ:
        if ($XM) {
            goto Hf;
        }
        $Fi->appendChild($Tq);
        Hf:
        uK:
        $Tq->appendChild($XX);
        return $Tq;
    }
    public function getValidatedNodes()
    {
        return $this->validatedNodes;
    }
}
