<?php


namespace RobRichards\XMLSecLibs;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;
use Exception;
use RobRichards\XMLSecLibs\Utils\XPath;
class XMLSecurityDSig
{
    const XMLDSIGNS = "\x68\164\164\160\x3a\57\x2f\x77\167\167\x2e\x77\x33\x2e\157\x72\x67\x2f\62\x30\x30\x30\x2f\x30\71\x2f\170\x6d\154\144\x73\151\x67\43";
    const SHA1 = "\x68\164\164\160\x3a\57\x2f\x77\167\167\56\x77\x33\x2e\157\x72\x67\x2f\x32\60\x30\x30\57\x30\71\57\x78\x6d\154\144\x73\151\x67\43\x73\x68\x61\x31";
    const SHA256 = "\150\x74\x74\160\x3a\x2f\57\x77\167\x77\x2e\167\63\x2e\157\162\147\57\x32\x30\x30\x31\x2f\x30\64\57\x78\155\x6c\145\x6e\143\43\163\150\141\x32\x35\x36";
    const SHA384 = "\150\x74\164\160\72\57\x2f\167\167\x77\x2e\167\x33\x2e\157\x72\x67\57\x32\x30\60\x31\57\60\x34\57\x78\155\154\144\x73\x69\147\x2d\x6d\x6f\162\145\43\x73\150\141\x33\70\64";
    const SHA512 = "\x68\x74\x74\x70\72\x2f\x2f\167\x77\167\56\167\x33\x2e\157\x72\147\x2f\x32\60\x30\x31\x2f\x30\64\x2f\170\x6d\x6c\145\156\143\43\x73\x68\141\x35\x31\62";
    const RIPEMD160 = "\150\164\x74\160\x3a\x2f\57\167\x77\x77\56\x77\x33\x2e\x6f\162\147\x2f\x32\60\x30\61\57\60\x34\x2f\x78\x6d\x6c\x65\x6e\x63\43\x72\151\x70\145\x6d\x64\x31\66\60";
    const C14N = "\150\164\x74\160\72\x2f\57\x77\167\x77\56\167\x33\x2e\157\x72\x67\57\x54\122\x2f\x32\60\60\61\57\122\105\x43\55\x78\x6d\x6c\55\143\x31\x34\156\55\62\60\x30\x31\60\63\61\65";
    const C14N_COMMENTS = "\150\164\164\x70\72\x2f\x2f\x77\167\167\56\167\63\56\x6f\x72\147\57\124\122\57\62\x30\60\x31\x2f\122\105\x43\55\170\x6d\154\x2d\x63\x31\64\x6e\x2d\62\x30\x30\61\60\63\x31\x35\43\x57\x69\x74\x68\103\157\x6d\x6d\145\x6e\x74\163";
    const EXC_C14N = "\x68\164\x74\x70\x3a\x2f\57\x77\167\167\56\x77\x33\x2e\157\162\x67\57\x32\x30\x30\x31\57\61\60\57\x78\x6d\x6c\x2d\145\170\x63\x2d\x63\x31\x34\156\43";
    const EXC_C14N_COMMENTS = "\150\x74\x74\x70\x3a\57\x2f\x77\167\x77\x2e\167\x33\56\157\x72\x67\57\62\60\60\61\x2f\x31\x30\57\x78\x6d\154\55\x65\x78\x63\x2d\x63\x31\x34\156\43\x57\x69\164\150\x43\x6f\155\155\145\156\x74\163";
    const template = "\x3c\144\x73\72\x53\151\147\156\141\164\x75\162\145\40\x78\x6d\154\x6e\x73\x3a\x64\x73\75\42\150\164\164\160\x3a\x2f\x2f\x77\x77\167\56\x77\x33\56\157\x72\x67\x2f\x32\x30\60\60\x2f\60\x39\x2f\x78\155\x6c\144\163\x69\x67\43\x22\76\xd\xa\40\40\74\x64\x73\x3a\123\x69\147\x6e\x65\x64\111\x6e\146\x6f\x3e\xd\xa\x20\x20\x20\40\x3c\x64\x73\72\x53\151\x67\x6e\141\164\x75\x72\x65\x4d\145\x74\x68\x6f\144\40\x2f\x3e\xd\xa\x20\40\74\x2f\144\x73\72\123\x69\147\156\x65\x64\111\x6e\x66\x6f\x3e\15\xa\74\x2f\x64\163\72\x53\151\x67\x6e\x61\x74\165\162\x65\x3e";
    const BASE_TEMPLATE = "\x3c\123\151\147\x6e\141\x74\165\x72\x65\x20\x78\155\154\156\163\75\42\150\x74\164\160\x3a\57\57\x77\167\167\56\167\63\x2e\157\162\x67\x2f\62\60\x30\x30\x2f\x30\71\x2f\170\x6d\x6c\x64\163\151\147\x23\x22\76\15\12\x20\40\x3c\123\x69\147\x6e\145\144\x49\156\146\157\x3e\xd\12\40\x20\40\x20\74\x53\151\x67\x6e\141\164\x75\162\145\115\145\x74\x68\x6f\144\x20\x2f\76\xd\xa\x20\40\x3c\x2f\x53\x69\x67\156\x65\144\x49\x6e\146\x6f\x3e\15\xa\x3c\57\x53\x69\x67\156\x61\x74\165\162\145\x3e";
    public $sigNode = null;
    public $idKeys = array();
    public $idNS = array();
    private $signedInfo = null;
    private $xPathCtx = null;
    private $canonicalMethod = null;
    private $prefix = '';
    private $searchpfx = "\163\x65\143\144\163\x69\147";
    private $validatedNodes = null;
    public function __construct($L3 = "\144\x73")
    {
        $QY = self::BASE_TEMPLATE;
        if (empty($L3)) {
            goto ai;
        }
        $this->prefix = $L3 . "\72";
        $FZ = array("\x3c\123", "\74\57\123", "\170\x6d\x6c\x6e\x73\x3d");
        $VU = array("\x3c{$L3}\72\123", "\74\x2f{$L3}\72\x53", "\x78\155\154\156\x73\72{$L3}\x3d");
        $QY = str_replace($FZ, $VU, $QY);
        ai:
        $Vw = new DOMDocument();
        $Vw->loadXML($QY);
        $this->sigNode = $Vw->documentElement;
    }
    private function resetXPathObj()
    {
        $this->xPathCtx = null;
    }
    private function getXPathObj()
    {
        if (!(empty($this->xPathCtx) && !empty($this->sigNode))) {
            goto T_;
        }
        $yJ = new DOMXPath($this->sigNode->ownerDocument);
        $yJ->registerNamespace("\x73\145\x63\144\x73\x69\147", self::XMLDSIGNS);
        $this->xPathCtx = $yJ;
        T_:
        return $this->xPathCtx;
    }
    public static function generateGUID($L3 = "\x70\146\x78")
    {
        $gg = md5(uniqid(mt_rand(), true));
        $hk = $L3 . substr($gg, 0, 8) . "\55" . substr($gg, 8, 4) . "\55" . substr($gg, 12, 4) . "\x2d" . substr($gg, 16, 4) . "\x2d" . substr($gg, 20, 12);
        return $hk;
    }
    public static function generate_GUID($L3 = "\x70\146\x78")
    {
        return self::generateGUID($L3);
    }
    public function locateSignature($vR, $Vl = 0)
    {
        if ($vR instanceof DOMDocument) {
            goto CN;
        }
        $R0 = $vR->ownerDocument;
        goto U0;
        CN:
        $R0 = $vR;
        U0:
        if (!$R0) {
            goto zI;
        }
        $yJ = new DOMXPath($R0);
        $yJ->registerNamespace("\163\x65\143\144\163\151\147", self::XMLDSIGNS);
        $IC = "\56\x2f\57\163\145\x63\144\163\x69\x67\72\x53\x69\x67\x6e\x61\164\x75\162\x65";
        $do = $yJ->query($IC, $vR);
        $this->sigNode = $do->item($Vl);
        return $this->sigNode;
        zI:
        return null;
    }
    public function createNewSignNode($ly, $DE = null)
    {
        $R0 = $this->sigNode->ownerDocument;
        if (!is_null($DE)) {
            goto jZ;
        }
        $e3 = $R0->createElementNS(self::XMLDSIGNS, $this->prefix . $ly);
        goto s8;
        jZ:
        $e3 = $R0->createElementNS(self::XMLDSIGNS, $this->prefix . $ly, $DE);
        s8:
        return $e3;
    }
    public function setCanonicalMethod($XC)
    {
        switch ($XC) {
            case "\150\x74\x74\160\x3a\57\57\x77\x77\x77\56\x77\x33\56\157\162\x67\x2f\x54\x52\57\x32\x30\x30\61\57\x52\x45\x43\55\170\155\x6c\x2d\x63\x31\64\156\55\x32\60\x30\61\60\63\x31\x35":
            case "\x68\x74\x74\x70\72\57\x2f\x77\x77\x77\56\167\x33\56\157\162\x67\57\x54\x52\x2f\x32\60\x30\x31\x2f\x52\105\x43\x2d\170\155\x6c\55\x63\61\64\x6e\x2d\62\x30\x30\x31\x30\x33\x31\x35\43\127\x69\x74\150\103\x6f\x6d\155\145\156\164\163":
            case "\150\x74\x74\160\x3a\57\x2f\x77\x77\x77\x2e\167\63\x2e\x6f\x72\x67\x2f\x32\60\x30\61\57\x31\x30\x2f\170\155\x6c\55\x65\x78\143\55\143\61\64\156\x23":
            case "\150\164\164\160\72\57\x2f\167\x77\167\56\x77\63\x2e\x6f\x72\147\x2f\62\x30\x30\61\x2f\x31\x30\x2f\x78\155\x6c\x2d\x65\170\143\55\x63\x31\64\x6e\43\127\151\164\x68\x43\x6f\x6d\155\145\x6e\164\x73":
                $this->canonicalMethod = $XC;
                goto Eo;
            default:
                throw new Exception("\x49\156\x76\x61\154\151\144\x20\103\141\156\157\156\151\x63\x61\x6c\x20\x4d\x65\164\150\x6f\144");
        }
        ya:
        Eo:
        if (!($yJ = $this->getXPathObj())) {
            goto Hk;
        }
        $IC = "\56\x2f" . $this->searchpfx . "\x3a\x53\x69\147\156\145\144\x49\156\146\x6f";
        $do = $yJ->query($IC, $this->sigNode);
        if (!($o8 = $do->item(0))) {
            goto qC;
        }
        $IC = "\x2e\57" . $this->searchpfx . "\x43\x61\x6e\157\156\151\143\141\x6c\x69\172\x61\164\x69\x6f\156\115\145\164\x68\157\144";
        $do = $yJ->query($IC, $o8);
        if ($Q7 = $do->item(0)) {
            goto c1;
        }
        $Q7 = $this->createNewSignNode("\103\141\x6e\157\156\151\x63\141\154\x69\172\141\164\x69\157\156\115\145\164\150\157\x64");
        $o8->insertBefore($Q7, $o8->firstChild);
        c1:
        $Q7->setAttribute("\101\x6c\147\x6f\x72\x69\164\x68\155", $this->canonicalMethod);
        qC:
        Hk:
    }
    private function canonicalizeData($e3, $NX, $ML = null, $Xi = null)
    {
        $Ya = false;
        $H3 = false;
        switch ($NX) {
            case "\x68\x74\164\160\72\x2f\x2f\x77\167\x77\x2e\x77\63\56\157\162\x67\x2f\x54\122\57\62\60\60\x31\57\122\x45\x43\55\x78\x6d\154\x2d\143\x31\x34\x6e\55\x32\60\x30\61\x30\x33\61\65":
                $Ya = false;
                $H3 = false;
                goto u4;
            case "\x68\164\x74\160\x3a\57\x2f\167\167\167\56\167\x33\x2e\x6f\x72\x67\x2f\x54\122\x2f\62\60\x30\x31\57\122\x45\103\x2d\x78\x6d\x6c\55\143\61\x34\156\x2d\62\x30\x30\x31\60\x33\x31\65\43\127\151\x74\150\x43\157\x6d\155\145\156\164\x73":
                $H3 = true;
                goto u4;
            case "\x68\164\164\x70\x3a\x2f\57\x77\x77\x77\56\x77\63\56\157\162\x67\x2f\62\60\x30\61\57\61\x30\57\x78\x6d\154\x2d\x65\x78\x63\x2d\x63\x31\64\156\x23":
                $Ya = true;
                goto u4;
            case "\150\x74\x74\x70\x3a\x2f\x2f\167\167\x77\56\x77\63\x2e\x6f\162\x67\x2f\62\60\60\x31\x2f\61\60\57\170\x6d\154\x2d\145\170\143\x2d\143\x31\64\x6e\43\x57\151\164\150\103\x6f\155\x6d\x65\156\x74\x73":
                $Ya = true;
                $H3 = true;
                goto u4;
        }
        l3:
        u4:
        if (!(is_null($ML) && $e3 instanceof DOMNode && $e3->ownerDocument !== null && $e3->isSameNode($e3->ownerDocument->documentElement))) {
            goto KH;
        }
        $Z9 = $e3;
        nR:
        if (!($Uv = $Z9->previousSibling)) {
            goto ie;
        }
        if (!($Uv->nodeType == XML_PI_NODE || $Uv->nodeType == XML_COMMENT_NODE && $H3)) {
            goto wh;
        }
        goto ie;
        wh:
        $Z9 = $Uv;
        goto nR;
        ie:
        if (!($Uv == null)) {
            goto IO;
        }
        $e3 = $e3->ownerDocument;
        IO:
        KH:
        return $e3->C14N($Ya, $H3, $ML, $Xi);
    }
    public function canonicalizeSignedInfo()
    {
        $R0 = $this->sigNode->ownerDocument;
        $NX = null;
        if (!$R0) {
            goto ep;
        }
        $yJ = $this->getXPathObj();
        $IC = "\x2e\57\163\145\x63\144\163\151\147\72\x53\x69\x67\156\x65\x64\111\156\x66\157";
        $do = $yJ->query($IC, $this->sigNode);
        if (!($BR = $do->item(0))) {
            goto tV;
        }
        $IC = "\56\x2f\x73\x65\x63\x64\163\x69\x67\72\x43\141\156\x6f\156\151\143\141\x6c\151\x7a\x61\x74\151\157\x6e\x4d\145\164\x68\157\144";
        $do = $yJ->query($IC, $BR);
        if (!($Q7 = $do->item(0))) {
            goto f9;
        }
        $NX = $Q7->getAttribute("\101\154\147\157\x72\x69\164\x68\x6d");
        f9:
        $this->signedInfo = $this->canonicalizeData($BR, $NX);
        return $this->signedInfo;
        tV:
        ep:
        return null;
    }
    public function calculateDigest($RC, $cd, $i2 = true)
    {
        switch ($RC) {
            case self::SHA1:
                $rA = "\163\x68\x61\61";
                goto Tn;
            case self::SHA256:
                $rA = "\x73\x68\141\x32\x35\66";
                goto Tn;
            case self::SHA384:
                $rA = "\163\150\x61\63\x38\x34";
                goto Tn;
            case self::SHA512:
                $rA = "\163\x68\x61\65\61\62";
                goto Tn;
            case self::RIPEMD160:
                $rA = "\162\151\160\145\x6d\144\61\x36\x30";
                goto Tn;
            default:
                throw new Exception("\x43\x61\156\x6e\157\x74\x20\166\x61\154\x69\144\x61\x74\x65\x20\x64\x69\147\x65\163\x74\72\40\x55\x6e\163\x75\x70\x70\x6f\162\164\x65\x64\40\x41\154\147\x6f\162\x69\x74\x68\x6d\40\74{$RC}\76");
        }
        oF:
        Tn:
        $Tp = hash($rA, $cd, true);
        if (!$i2) {
            goto qP;
        }
        $Tp = base64_encode($Tp);
        qP:
        return $Tp;
    }
    public function validateDigest($kQ, $cd)
    {
        $yJ = new DOMXPath($kQ->ownerDocument);
        $yJ->registerNamespace("\163\x65\143\144\x73\151\147", self::XMLDSIGNS);
        $IC = "\163\164\162\x69\156\147\50\56\57\163\145\x63\144\163\151\x67\72\104\x69\x67\145\x73\x74\x4d\x65\x74\x68\x6f\144\x2f\100\x41\154\x67\x6f\162\151\164\150\x6d\x29";
        $RC = $yJ->evaluate($IC, $kQ);
        $lD = $this->calculateDigest($RC, $cd, false);
        $IC = "\x73\x74\162\151\x6e\147\x28\x2e\57\163\x65\x63\x64\x73\x69\147\x3a\x44\x69\147\x65\x73\x74\126\141\x6c\x75\x65\x29";
        $u8 = $yJ->evaluate($IC, $kQ);
        return $lD === base64_decode($u8);
    }
    public function processTransforms($kQ, $L9, $Kr = true)
    {
        $cd = $L9;
        $yJ = new DOMXPath($kQ->ownerDocument);
        $yJ->registerNamespace("\163\x65\143\144\163\x69\147", self::XMLDSIGNS);
        $IC = "\56\x2f\163\145\143\x64\x73\x69\147\x3a\x54\x72\x61\x6e\163\146\157\162\155\x73\57\x73\145\x63\144\163\x69\147\x3a\124\162\x61\x6e\163\146\157\x72\x6d";
        $k9 = $yJ->query($IC, $kQ);
        $oI = "\150\x74\164\160\72\x2f\x2f\167\167\167\x2e\167\x33\x2e\157\162\x67\x2f\124\x52\x2f\62\x30\60\61\x2f\122\105\x43\55\x78\x6d\x6c\55\x63\61\64\156\x2d\x32\60\x30\61\x30\63\x31\x35";
        $ML = null;
        $Xi = null;
        foreach ($k9 as $tN) {
            $gZ = $tN->getAttribute("\x41\x6c\147\157\x72\x69\x74\150\x6d");
            switch ($gZ) {
                case "\x68\x74\164\160\x3a\x2f\57\167\167\x77\x2e\x77\x33\56\x6f\162\x67\x2f\62\x30\x30\x31\57\61\60\x2f\170\155\154\x2d\x65\x78\143\x2d\143\61\64\x6e\x23":
                case "\x68\164\x74\x70\72\x2f\57\167\x77\167\x2e\167\x33\x2e\157\x72\147\x2f\x32\x30\x30\61\x2f\x31\60\57\170\x6d\154\55\145\170\x63\x2d\143\x31\64\156\43\x57\x69\164\150\x43\x6f\x6d\155\x65\x6e\164\x73":
                    if (!$Kr) {
                        goto TH;
                    }
                    $oI = $gZ;
                    goto ES;
                    TH:
                    $oI = "\150\164\164\160\x3a\57\57\167\167\x77\56\x77\63\x2e\157\x72\147\x2f\x32\x30\60\x31\x2f\x31\x30\x2f\x78\x6d\154\55\x65\170\143\55\143\x31\64\156\43";
                    ES:
                    $e3 = $tN->firstChild;
                    IU:
                    if (!$e3) {
                        goto Um;
                    }
                    if (!($e3->localName == "\x49\156\143\x6c\165\163\151\x76\145\x4e\141\x6d\145\x73\x70\x61\143\x65\x73")) {
                        goto BY;
                    }
                    if (!($yy = $e3->getAttribute("\x50\x72\145\146\151\x78\114\151\x73\164"))) {
                        goto EA;
                    }
                    $IK = array();
                    $ko = explode("\x20", $yy);
                    foreach ($ko as $yy) {
                        $VR = trim($yy);
                        if (empty($VR)) {
                            goto NM;
                        }
                        $IK[] = $VR;
                        NM:
                        wf:
                    }
                    sD:
                    if (!(count($IK) > 0)) {
                        goto rl;
                    }
                    $Xi = $IK;
                    rl:
                    EA:
                    goto Um;
                    BY:
                    $e3 = $e3->nextSibling;
                    goto IU;
                    Um:
                    goto E_;
                case "\150\164\x74\x70\72\57\x2f\x77\167\167\x2e\x77\x33\56\157\x72\x67\57\124\x52\57\x32\x30\60\61\x2f\122\x45\103\x2d\x78\155\154\x2d\x63\x31\64\x6e\x2d\x32\60\x30\x31\60\x33\x31\65":
                case "\x68\164\x74\160\x3a\57\x2f\x77\167\x77\x2e\x77\x33\56\157\x72\x67\x2f\124\x52\x2f\62\x30\60\61\x2f\122\x45\103\55\x78\x6d\154\x2d\x63\x31\64\156\x2d\62\60\60\x31\x30\x33\x31\x35\43\x57\151\164\150\103\157\x6d\x6d\145\x6e\164\163":
                    if (!$Kr) {
                        goto P0;
                    }
                    $oI = $gZ;
                    goto a1;
                    P0:
                    $oI = "\x68\164\164\x70\x3a\x2f\57\x77\x77\167\56\x77\x33\56\157\x72\x67\57\x54\122\57\x32\x30\x30\61\57\122\x45\x43\x2d\170\x6d\x6c\55\x63\61\64\156\x2d\x32\60\x30\x31\x30\x33\61\x35";
                    a1:
                    goto E_;
                case "\x68\x74\164\160\72\57\x2f\x77\x77\x77\x2e\167\x33\56\x6f\x72\x67\57\124\122\57\x31\x39\71\x39\x2f\122\105\103\x2d\170\160\x61\x74\150\55\61\x39\x39\x39\x31\61\x31\66":
                    $e3 = $tN->firstChild;
                    ws:
                    if (!$e3) {
                        goto Zo;
                    }
                    if (!($e3->localName == "\x58\120\141\x74\x68")) {
                        goto hi;
                    }
                    $ML = array();
                    $ML["\x71\x75\x65\x72\x79"] = "\50\56\x2f\x2f\x2e\40\x7c\x20\56\57\x2f\x40\x2a\40\x7c\x20\x2e\x2f\57\x6e\141\x6d\145\x73\160\x61\143\145\72\x3a\x2a\51\133" . $e3->nodeValue . "\135";
                    $kV["\x6e\x61\x6d\145\x73\x70\x61\143\145\163"] = array();
                    $sk = $yJ->query("\56\57\156\141\x6d\x65\163\x70\141\143\x65\72\72\52", $e3);
                    foreach ($sk as $sE) {
                        if (!($sE->localName != "\x78\x6d\154")) {
                            goto k9;
                        }
                        $ML["\156\x61\155\145\x73\160\x61\143\x65\163"][$sE->localName] = $sE->nodeValue;
                        k9:
                        Sl:
                    }
                    Vh:
                    goto Zo;
                    hi:
                    $e3 = $e3->nextSibling;
                    goto ws;
                    Zo:
                    goto E_;
            }
            GI:
            E_:
            e9:
        }
        BN:
        if (!$cd instanceof DOMNode) {
            goto cz;
        }
        $cd = $this->canonicalizeData($L9, $oI, $ML, $Xi);
        cz:
        return $cd;
    }
    public function processRefNode($kQ)
    {
        $w8 = null;
        $Kr = true;
        if ($HA = $kQ->getAttribute("\x55\122\x49")) {
            goto GG8;
        }
        $Kr = false;
        $w8 = $kQ->ownerDocument;
        goto O0A;
        GG8:
        $Y9 = parse_url($HA);
        if (!empty($Y9["\160\141\164\150"])) {
            goto iWo;
        }
        if ($Sx = $Y9["\146\162\x61\x67\155\x65\x6e\x74"]) {
            goto YEx;
        }
        $w8 = $kQ->ownerDocument;
        goto f1v;
        YEx:
        $Kr = false;
        $t8 = new DOMXPath($kQ->ownerDocument);
        if (!($this->idNS && is_array($this->idNS))) {
            goto N8;
        }
        foreach ($this->idNS as $rJ => $d7) {
            $t8->registerNamespace($rJ, $d7);
            X4:
        }
        yM:
        N8:
        $VD = "\100\111\144\x3d\42" . XPath::filterAttrValue($Sx, XPath::DOUBLE_QUOTE) . "\42";
        if (!is_array($this->idKeys)) {
            goto ykx;
        }
        foreach ($this->idKeys as $OD) {
            $VD .= "\x20\157\x72\40\100" . XPath::filterAttrName($OD) . "\75\x22" . XPath::filterAttrValue($Sx, XPath::DOUBLE_QUOTE) . "\x22";
            rSy:
        }
        gy:
        ykx:
        $IC = "\x2f\x2f\52\x5b" . $VD . "\135";
        $w8 = $t8->query($IC)->item(0);
        f1v:
        iWo:
        O0A:
        $cd = $this->processTransforms($kQ, $w8, $Kr);
        if ($this->validateDigest($kQ, $cd)) {
            goto duq;
        }
        return false;
        duq:
        if (!$w8 instanceof DOMNode) {
            goto qF2;
        }
        if (!empty($Sx)) {
            goto Z3r;
        }
        $this->validatedNodes[] = $w8;
        goto XX2;
        Z3r:
        $this->validatedNodes[$Sx] = $w8;
        XX2:
        qF2:
        return true;
    }
    public function getRefNodeID($kQ)
    {
        if (!($HA = $kQ->getAttribute("\x55\x52\111"))) {
            goto tzb;
        }
        $Y9 = parse_url($HA);
        if (!empty($Y9["\x70\141\x74\150"])) {
            goto zFE;
        }
        if (!($Sx = $Y9["\146\x72\141\147\x6d\145\x6e\x74"])) {
            goto opu;
        }
        return $Sx;
        opu:
        zFE:
        tzb:
        return null;
    }
    public function getRefIDs()
    {
        $Tz = array();
        $yJ = $this->getXPathObj();
        $IC = "\56\57\x73\145\x63\144\x73\x69\147\x3a\x53\x69\x67\x6e\145\x64\111\x6e\x66\157\57\163\x65\x63\144\x73\x69\x67\72\x52\145\146\145\162\145\x6e\143\x65";
        $do = $yJ->query($IC, $this->sigNode);
        if (!($do->length == 0)) {
            goto mhT;
        }
        throw new Exception("\x52\145\146\145\162\x65\156\143\x65\40\156\x6f\x64\x65\x73\40\156\157\164\x20\146\157\x75\156\144");
        mhT:
        foreach ($do as $kQ) {
            $Tz[] = $this->getRefNodeID($kQ);
            bC9:
        }
        Zqd:
        return $Tz;
    }
    public function validateReference()
    {
        $AI = $this->sigNode->ownerDocument->documentElement;
        if ($AI->isSameNode($this->sigNode)) {
            goto JZa;
        }
        if (!($this->sigNode->parentNode != null)) {
            goto ol2;
        }
        $this->sigNode->parentNode->removeChild($this->sigNode);
        ol2:
        JZa:
        $yJ = $this->getXPathObj();
        $IC = "\x2e\57\163\145\143\144\x73\151\147\72\123\151\147\x6e\145\144\x49\156\146\x6f\57\x73\145\143\x64\x73\x69\x67\72\122\x65\x66\x65\x72\145\156\x63\x65";
        $do = $yJ->query($IC, $this->sigNode);
        if (!($do->length == 0)) {
            goto A2P;
        }
        throw new Exception("\122\x65\146\145\162\x65\x6e\x63\x65\40\156\157\144\x65\x73\40\x6e\157\x74\40\x66\x6f\x75\156\144");
        A2P:
        $this->validatedNodes = array();
        foreach ($do as $kQ) {
            if ($this->processRefNode($kQ)) {
                goto EcN;
            }
            $this->validatedNodes = null;
            throw new Exception("\x52\x65\x66\x65\x72\x65\156\143\145\40\x76\x61\154\151\144\x61\164\151\x6f\x6e\x20\146\141\x69\154\x65\144");
            EcN:
            k9G:
        }
        NCV:
        return true;
    }
    private function addRefInternal($tT, $e3, $gZ, $Ty = null, $NZ = null)
    {
        $L3 = null;
        $KF = null;
        $K2 = "\111\144";
        $Tf = true;
        $bN = false;
        if (!is_array($NZ)) {
            goto HCO;
        }
        $L3 = empty($NZ["\160\162\x65\146\x69\x78"]) ? null : $NZ["\x70\162\145\x66\151\170"];
        $KF = empty($NZ["\160\x72\145\x66\151\170\x5f\156\x73"]) ? null : $NZ["\x70\x72\x65\x66\x69\170\x5f\156\x73"];
        $K2 = empty($NZ["\151\x64\137\x6e\141\x6d\x65"]) ? "\x49\x64" : $NZ["\x69\144\x5f\156\141\x6d\145"];
        $Tf = !isset($NZ["\x6f\x76\145\x72\167\162\151\164\145"]) ? true : (bool) $NZ["\x6f\x76\x65\x72\x77\x72\151\x74\x65"];
        $bN = !isset($NZ["\x66\157\x72\143\145\137\165\x72\151"]) ? false : (bool) $NZ["\x66\x6f\x72\x63\145\137\x75\162\151"];
        HCO:
        $nw = $K2;
        if (empty($L3)) {
            goto srk;
        }
        $nw = $L3 . "\72" . $nw;
        srk:
        $kQ = $this->createNewSignNode("\x52\145\146\x65\162\x65\x6e\x63\x65");
        $tT->appendChild($kQ);
        if (!$e3 instanceof DOMDocument) {
            goto OWr;
        }
        if ($bN) {
            goto Plj;
        }
        goto dXL;
        OWr:
        $HA = null;
        if ($Tf) {
            goto adA;
        }
        $HA = $KF ? $e3->getAttributeNS($KF, $K2) : $e3->getAttribute($K2);
        adA:
        if (!empty($HA)) {
            goto lTA;
        }
        $HA = self::generateGUID();
        $e3->setAttributeNS($KF, $nw, $HA);
        lTA:
        $kQ->setAttribute("\125\x52\x49", "\43" . $HA);
        goto dXL;
        Plj:
        $kQ->setAttribute("\125\122\x49", '');
        dXL:
        $V5 = $this->createNewSignNode("\x54\162\141\x6e\x73\x66\x6f\x72\155\x73");
        $kQ->appendChild($V5);
        if (is_array($Ty)) {
            goto JTp;
        }
        if (!empty($this->canonicalMethod)) {
            goto fte;
        }
        goto e9I;
        JTp:
        foreach ($Ty as $tN) {
            $Wb = $this->createNewSignNode("\124\x72\141\156\163\146\157\162\155");
            $V5->appendChild($Wb);
            if (is_array($tN) && !empty($tN["\x68\x74\x74\160\x3a\x2f\57\167\x77\167\x2e\167\63\x2e\157\x72\x67\57\x54\122\x2f\x31\x39\x39\71\57\122\x45\x43\x2d\170\x70\141\164\x68\55\x31\x39\71\71\x31\x31\61\66"]) && !empty($tN["\150\x74\164\x70\x3a\57\57\x77\x77\x77\56\x77\x33\x2e\x6f\x72\x67\57\x54\x52\57\x31\x39\71\71\57\x52\105\x43\x2d\170\160\x61\x74\150\x2d\61\x39\x39\x39\61\61\x31\x36"]["\x71\165\x65\162\x79"])) {
                goto Uf3;
            }
            $Wb->setAttribute("\x41\x6c\x67\157\162\x69\164\x68\155", $tN);
            goto cNK;
            Uf3:
            $Wb->setAttribute("\101\x6c\147\x6f\162\x69\164\150\155", "\x68\164\164\160\x3a\x2f\57\167\x77\x77\56\x77\x33\x2e\157\162\x67\x2f\124\x52\57\x31\71\x39\71\x2f\122\x45\103\55\170\x70\141\x74\150\55\x31\x39\x39\71\x31\x31\61\x36");
            $ZC = $this->createNewSignNode("\x58\120\141\164\150", $tN["\x68\x74\164\160\x3a\57\x2f\x77\167\167\56\167\63\56\157\x72\147\57\x54\x52\x2f\61\71\71\71\x2f\122\x45\x43\x2d\x78\160\x61\x74\x68\x2d\x31\71\71\71\x31\x31\61\66"]["\x71\165\145\162\171"]);
            $Wb->appendChild($ZC);
            if (empty($tN["\150\x74\x74\x70\x3a\57\x2f\167\167\x77\x2e\167\63\56\x6f\x72\x67\57\124\x52\x2f\61\x39\71\x39\x2f\122\x45\x43\x2d\x78\160\x61\164\150\55\61\71\71\71\61\61\x31\66"]["\x6e\141\x6d\x65\x73\160\141\x63\145\x73"])) {
                goto p42;
            }
            foreach ($tN["\x68\x74\164\x70\x3a\57\57\167\167\x77\x2e\x77\63\56\x6f\162\x67\57\x54\122\57\61\x39\x39\x39\x2f\122\x45\103\x2d\x78\160\141\164\150\55\61\x39\71\x39\x31\x31\61\66"]["\x6e\x61\x6d\x65\x73\x70\141\x63\145\x73"] as $L3 => $jY) {
                $ZC->setAttributeNS("\x68\x74\164\160\72\x2f\57\x77\167\x77\x2e\167\x33\56\x6f\x72\147\x2f\62\x30\x30\60\57\170\x6d\x6c\156\163\x2f", "\x78\x6d\154\156\163\x3a{$L3}", $jY);
                S5k:
            }
            rlm:
            p42:
            cNK:
            FFr:
        }
        Miu:
        goto e9I;
        fte:
        $Wb = $this->createNewSignNode("\124\x72\141\156\x73\x66\157\162\x6d");
        $V5->appendChild($Wb);
        $Wb->setAttribute("\x41\x6c\147\x6f\x72\151\164\x68\x6d", $this->canonicalMethod);
        e9I:
        $FC = $this->processTransforms($kQ, $e3);
        $lD = $this->calculateDigest($gZ, $FC);
        $QO = $this->createNewSignNode("\x44\x69\x67\145\163\x74\x4d\145\x74\x68\x6f\144");
        $kQ->appendChild($QO);
        $QO->setAttribute("\101\154\x67\x6f\x72\151\164\x68\x6d", $gZ);
        $u8 = $this->createNewSignNode("\104\151\x67\145\x73\164\126\141\154\x75\x65", $lD);
        $kQ->appendChild($u8);
    }
    public function addReference($e3, $gZ, $Ty = null, $NZ = null)
    {
        if (!($yJ = $this->getXPathObj())) {
            goto b6d;
        }
        $IC = "\56\x2f\x73\145\143\144\x73\151\147\x3a\x53\x69\147\156\145\x64\111\156\x66\x6f";
        $do = $yJ->query($IC, $this->sigNode);
        if (!($xF = $do->item(0))) {
            goto W6n;
        }
        $this->addRefInternal($xF, $e3, $gZ, $Ty, $NZ);
        W6n:
        b6d:
    }
    public function addReferenceList($Rh, $gZ, $Ty = null, $NZ = null)
    {
        if (!($yJ = $this->getXPathObj())) {
            goto AMG;
        }
        $IC = "\56\x2f\x73\x65\143\x64\x73\151\147\72\123\x69\147\x6e\x65\x64\x49\156\x66\157";
        $do = $yJ->query($IC, $this->sigNode);
        if (!($xF = $do->item(0))) {
            goto ti4;
        }
        foreach ($Rh as $e3) {
            $this->addRefInternal($xF, $e3, $gZ, $Ty, $NZ);
            toK:
        }
        OZi:
        ti4:
        AMG:
    }
    public function addObject($cd, $a6 = null, $J2 = null)
    {
        $Ox = $this->createNewSignNode("\x4f\x62\x6a\x65\x63\164");
        $this->sigNode->appendChild($Ox);
        if (empty($a6)) {
            goto wE3;
        }
        $Ox->setAttribute("\x4d\x69\x6d\145\124\x79\160\x65", $a6);
        wE3:
        if (empty($J2)) {
            goto JNC;
        }
        $Ox->setAttribute("\105\156\x63\x6f\x64\x69\x6e\147", $J2);
        JNC:
        if ($cd instanceof DOMElement) {
            goto hTo;
        }
        $Wu = $this->sigNode->ownerDocument->createTextNode($cd);
        goto S0q;
        hTo:
        $Wu = $this->sigNode->ownerDocument->importNode($cd, true);
        S0q:
        $Ox->appendChild($Wu);
        return $Ox;
    }
    public function locateKey($e3 = null)
    {
        if (!empty($e3)) {
            goto ySp;
        }
        $e3 = $this->sigNode;
        ySp:
        if ($e3 instanceof DOMNode) {
            goto phf;
        }
        return null;
        phf:
        if (!($R0 = $e3->ownerDocument)) {
            goto hXY;
        }
        $yJ = new DOMXPath($R0);
        $yJ->registerNamespace("\x73\145\x63\x64\163\x69\x67", self::XMLDSIGNS);
        $IC = "\x73\164\162\x69\x6e\147\x28\x2e\x2f\x73\145\143\144\x73\x69\x67\x3a\123\x69\x67\156\x65\x64\x49\x6e\x66\x6f\x2f\x73\145\143\144\x73\x69\x67\72\123\x69\x67\x6e\x61\x74\165\x72\x65\115\145\164\150\x6f\144\x2f\x40\x41\154\147\x6f\162\151\164\x68\x6d\51";
        $gZ = $yJ->evaluate($IC, $e3);
        if (!$gZ) {
            goto wXc;
        }
        try {
            $dM = new XMLSecurityKey($gZ, array("\164\171\x70\145" => "\160\165\142\x6c\151\x63"));
        } catch (Exception $XE) {
            return null;
        }
        return $dM;
        wXc:
        hXY:
        return null;
    }
    public function verify($dM)
    {
        $R0 = $this->sigNode->ownerDocument;
        $yJ = new DOMXPath($R0);
        $yJ->registerNamespace("\163\x65\x63\x64\163\151\x67", self::XMLDSIGNS);
        $IC = "\163\164\162\x69\x6e\x67\50\56\x2f\x73\145\x63\x64\x73\x69\147\72\123\151\147\x6e\141\x74\x75\162\145\x56\x61\x6c\165\145\x29";
        $Z_ = $yJ->evaluate($IC, $this->sigNode);
        if (!empty($Z_)) {
            goto wQR;
        }
        throw new Exception("\x55\x6e\x61\142\154\145\x20\x74\x6f\x20\x6c\x6f\143\141\x74\145\x20\x53\151\x67\156\x61\164\165\x72\x65\126\141\x6c\x75\145");
        wQR:
        return $dM->verifySignature($this->signedInfo, base64_decode($Z_));
    }
    public function signData($dM, $cd)
    {
        return $dM->signData($cd);
    }
    public function sign($dM, $Vh = null)
    {
        if (!($Vh != null)) {
            goto hI7;
        }
        $this->resetXPathObj();
        $this->appendSignature($Vh);
        $this->sigNode = $Vh->lastChild;
        hI7:
        if (!($yJ = $this->getXPathObj())) {
            goto cUQ;
        }
        $IC = "\56\x2f\163\145\x63\x64\163\x69\147\72\x53\151\147\156\x65\144\111\156\x66\157";
        $do = $yJ->query($IC, $this->sigNode);
        if (!($xF = $do->item(0))) {
            goto wyu;
        }
        $IC = "\56\x2f\x73\x65\143\x64\x73\151\147\72\123\151\147\x6e\x61\x74\x75\x72\x65\x4d\x65\164\150\x6f\x64";
        $do = $yJ->query($IC, $xF);
        $ZM = $do->item(0);
        $ZM->setAttribute("\101\x6c\x67\157\x72\151\x74\x68\x6d", $dM->type);
        $cd = $this->canonicalizeData($xF, $this->canonicalMethod);
        $Z_ = base64_encode($this->signData($dM, $cd));
        $LS = $this->createNewSignNode("\x53\151\x67\156\x61\164\x75\x72\145\x56\x61\x6c\165\145", $Z_);
        if ($W0 = $xF->nextSibling) {
            goto POU;
        }
        $this->sigNode->appendChild($LS);
        goto nfO;
        POU:
        $W0->parentNode->insertBefore($LS, $W0);
        nfO:
        wyu:
        cUQ:
    }
    public function appendCert()
    {
    }
    public function appendKey($dM, $T5 = null)
    {
        $dM->serializeKey($T5);
    }
    public function insertSignature($e3, $xj = null)
    {
        $qW = $e3->ownerDocument;
        $p5 = $qW->importNode($this->sigNode, true);
        if ($xj == null) {
            goto FWB;
        }
        return $e3->insertBefore($p5, $xj);
        goto iNB;
        FWB:
        return $e3->insertBefore($p5);
        iNB:
    }
    public function appendSignature($jK, $BF = false)
    {
        $xj = $BF ? $jK->firstChild : null;
        return $this->insertSignature($jK, $xj);
    }
    public static function get509XCert($Va, $Mw = true)
    {
        $nN = self::staticGet509XCerts($Va, $Mw);
        if (empty($nN)) {
            goto pya;
        }
        return $nN[0];
        pya:
        return '';
    }
    public static function staticGet509XCerts($nN, $Mw = true)
    {
        if ($Mw) {
            goto b_e;
        }
        return array($nN);
        goto x11;
        b_e:
        $cd = '';
        $cS = array();
        $QG = explode("\12", $nN);
        $HK = false;
        foreach ($QG as $aZ) {
            if (!$HK) {
                goto XcI;
            }
            if (!(strncmp($aZ, "\x2d\x2d\x2d\x2d\55\105\116\x44\40\x43\105\x52\x54\x49\106\111\103\101\x54\x45", 20) == 0)) {
                goto B_Q;
            }
            $HK = false;
            $cS[] = $cd;
            $cd = '';
            goto YC5;
            B_Q:
            $cd .= trim($aZ);
            goto RPS;
            XcI:
            if (!(strncmp($aZ, "\55\55\x2d\x2d\55\102\x45\x47\111\x4e\x20\103\105\122\124\x49\x46\111\x43\x41\124\105", 22) == 0)) {
                goto CCA;
            }
            $HK = true;
            CCA:
            RPS:
            YC5:
        }
        iHq:
        return $cS;
        x11:
    }
    public static function staticAdd509Cert($d9, $Va, $Mw = true, $CZ = false, $yJ = null, $NZ = null)
    {
        if (!$CZ) {
            goto w0r;
        }
        $Va = file_get_contents($Va);
        w0r:
        if ($d9 instanceof DOMElement) {
            goto COW;
        }
        throw new Exception("\111\156\166\141\154\151\x64\40\160\x61\x72\145\x6e\x74\40\x4e\157\144\145\x20\x70\141\x72\x61\x6d\145\x74\x65\x72");
        COW:
        $IQ = $d9->ownerDocument;
        if (!empty($yJ)) {
            goto GnP;
        }
        $yJ = new DOMXPath($d9->ownerDocument);
        $yJ->registerNamespace("\x73\145\143\144\163\151\x67", self::XMLDSIGNS);
        GnP:
        $IC = "\56\x2f\x73\x65\x63\x64\x73\x69\x67\x3a\113\x65\171\x49\156\146\x6f";
        $do = $yJ->query($IC, $d9);
        $au = $do->item(0);
        $u9 = '';
        if (!$au) {
            goto Wai;
        }
        $yy = $au->lookupPrefix(self::XMLDSIGNS);
        if (empty($yy)) {
            goto J6x;
        }
        $u9 = $yy . "\72";
        J6x:
        goto TtT;
        Wai:
        $yy = $d9->lookupPrefix(self::XMLDSIGNS);
        if (empty($yy)) {
            goto yNh;
        }
        $u9 = $yy . "\72";
        yNh:
        $le = false;
        $au = $IQ->createElementNS(self::XMLDSIGNS, $u9 . "\113\x65\x79\x49\x6e\146\x6f");
        $IC = "\56\57\x73\x65\143\x64\163\x69\147\72\117\x62\x6a\x65\143\x74";
        $do = $yJ->query($IC, $d9);
        if (!($ev = $do->item(0))) {
            goto BQK;
        }
        $ev->parentNode->insertBefore($au, $ev);
        $le = true;
        BQK:
        if ($le) {
            goto vR7;
        }
        $d9->appendChild($au);
        vR7:
        TtT:
        $nN = self::staticGet509XCerts($Va, $Mw);
        $cL = $IQ->createElementNS(self::XMLDSIGNS, $u9 . "\130\x35\60\71\104\x61\x74\x61");
        $au->appendChild($cL);
        $IY = false;
        $U7 = false;
        if (!is_array($NZ)) {
            goto LrT;
        }
        if (empty($NZ["\151\x73\x73\x75\145\x72\x53\x65\x72\x69\141\x6c"])) {
            goto L9U;
        }
        $IY = true;
        L9U:
        if (empty($NZ["\x73\165\x62\x6a\x65\143\x74\116\x61\x6d\145"])) {
            goto YOJ;
        }
        $U7 = true;
        YOJ:
        LrT:
        foreach ($nN as $JQ) {
            if (!($IY || $U7)) {
                goto yIl;
            }
            if (!($xv = openssl_x509_parse("\55\x2d\x2d\55\x2d\x42\x45\x47\x49\x4e\40\103\105\122\x54\111\x46\x49\103\101\124\105\x2d\x2d\55\x2d\55\xa" . chunk_split($JQ, 64, "\xa") . "\55\x2d\x2d\x2d\55\x45\116\x44\40\x43\x45\122\x54\111\106\111\103\101\124\105\x2d\x2d\x2d\55\x2d\12"))) {
                goto uWz;
            }
            if (!($U7 && !empty($xv["\x73\165\142\x6a\x65\143\x74"]))) {
                goto foS;
            }
            if (is_array($xv["\163\165\142\152\145\x63\164"])) {
                goto z1a;
            }
            $ds = $xv["\151\x73\x73\x75\145\x72"];
            goto pG4;
            z1a:
            $xc = array();
            foreach ($xv["\x73\x75\x62\152\145\x63\164"] as $ES => $DE) {
                if (is_array($DE)) {
                    goto Z7F;
                }
                array_unshift($xc, "{$ES}\75{$DE}");
                goto hYA;
                Z7F:
                foreach ($DE as $EA) {
                    array_unshift($xc, "{$ES}\x3d{$EA}");
                    vS7:
                }
                Iab:
                hYA:
                gCI:
            }
            M31:
            $ds = implode("\x2c", $xc);
            pG4:
            $RG = $IQ->createElementNS(self::XMLDSIGNS, $u9 . "\x58\x35\60\x39\x53\165\x62\152\145\143\x74\x4e\141\155\x65", $ds);
            $cL->appendChild($RG);
            foS:
            if (!($IY && !empty($xv["\151\163\163\x75\145\162"]) && !empty($xv["\163\145\x72\x69\141\154\116\165\155\x62\x65\x72"]))) {
                goto gJp;
            }
            if (is_array($xv["\x69\x73\163\165\145\162"])) {
                goto sbk;
            }
            $hs = $xv["\x69\x73\x73\165\145\x72"];
            goto uZY;
            sbk:
            $xc = array();
            foreach ($xv["\x69\163\163\x75\145\x72"] as $ES => $DE) {
                array_unshift($xc, "{$ES}\75{$DE}");
                JWg:
            }
            JYH:
            $hs = implode("\54", $xc);
            uZY:
            $hr = $IQ->createElementNS(self::XMLDSIGNS, $u9 . "\x58\x35\60\x39\111\x73\163\165\x65\x72\123\x65\162\x69\x61\154");
            $cL->appendChild($hr);
            $Mc = $IQ->createElementNS(self::XMLDSIGNS, $u9 . "\x58\65\x30\71\111\163\x73\165\145\x72\x4e\x61\155\145", $hs);
            $hr->appendChild($Mc);
            $Mc = $IQ->createElementNS(self::XMLDSIGNS, $u9 . "\x58\x35\60\71\x53\145\x72\151\141\154\116\x75\x6d\x62\145\x72", $xv["\163\145\x72\x69\141\x6c\x4e\x75\155\142\x65\x72"]);
            $hr->appendChild($Mc);
            gJp:
            uWz:
            yIl:
            $ze = $IQ->createElementNS(self::XMLDSIGNS, $u9 . "\x58\x35\60\71\x43\x65\x72\x74\151\146\151\x63\141\164\x65", $JQ);
            $cL->appendChild($ze);
            Qy8:
        }
        Lck:
    }
    public function add509Cert($Va, $Mw = true, $CZ = false, $NZ = null)
    {
        if (!($yJ = $this->getXPathObj())) {
            goto XK6;
        }
        self::staticAdd509Cert($this->sigNode, $Va, $Mw, $CZ, $yJ, $NZ);
        XK6:
    }
    public function appendToKeyInfo($e3)
    {
        $d9 = $this->sigNode;
        $IQ = $d9->ownerDocument;
        $yJ = $this->getXPathObj();
        if (!empty($yJ)) {
            goto PsF;
        }
        $yJ = new DOMXPath($d9->ownerDocument);
        $yJ->registerNamespace("\163\x65\x63\x64\163\x69\x67", self::XMLDSIGNS);
        PsF:
        $IC = "\x2e\57\163\145\x63\x64\x73\x69\x67\72\x4b\145\171\x49\x6e\x66\157";
        $do = $yJ->query($IC, $d9);
        $au = $do->item(0);
        if ($au) {
            goto ioT;
        }
        $u9 = '';
        $yy = $d9->lookupPrefix(self::XMLDSIGNS);
        if (empty($yy)) {
            goto iVU;
        }
        $u9 = $yy . "\72";
        iVU:
        $le = false;
        $au = $IQ->createElementNS(self::XMLDSIGNS, $u9 . "\x4b\145\171\111\x6e\146\x6f");
        $IC = "\x2e\x2f\x73\145\x63\x64\x73\151\x67\72\117\142\x6a\x65\x63\x74";
        $do = $yJ->query($IC, $d9);
        if (!($ev = $do->item(0))) {
            goto YZI;
        }
        $ev->parentNode->insertBefore($au, $ev);
        $le = true;
        YZI:
        if ($le) {
            goto bKY;
        }
        $d9->appendChild($au);
        bKY:
        ioT:
        $au->appendChild($e3);
        return $au;
    }
    public function getValidatedNodes()
    {
        return $this->validatedNodes;
    }
}
