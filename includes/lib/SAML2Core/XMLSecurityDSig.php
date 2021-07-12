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
    const XMLDSIGNS = "\x68\164\164\160\72\x2f\x2f\167\167\x77\56\x77\x33\x2e\x6f\x72\x67\x2f\x32\60\x30\x30\x2f\x30\x39\57\x78\155\154\x64\x73\151\147\x23";
    const SHA1 = "\x68\164\x74\x70\72\57\57\167\x77\x77\56\x77\x33\x2e\x6f\162\147\57\x32\60\60\60\57\60\71\57\x78\x6d\154\144\x73\151\x67\x23\x73\x68\141\x31";
    const SHA256 = "\x68\164\164\160\x3a\x2f\57\167\x77\x77\x2e\x77\x33\56\157\162\x67\x2f\62\60\60\x31\57\x30\64\x2f\170\155\154\145\x6e\x63\43\x73\150\141\62\x35\x36";
    const SHA384 = "\150\x74\x74\160\72\x2f\57\167\167\167\x2e\x77\x33\56\157\x72\x67\x2f\62\x30\x30\x31\x2f\x30\x34\x2f\x78\155\154\x64\x73\151\x67\55\x6d\x6f\162\145\43\x73\x68\x61\x33\x38\64";
    const SHA512 = "\x68\x74\164\160\x3a\x2f\57\167\167\167\56\x77\x33\x2e\157\x72\147\57\62\x30\60\61\x2f\60\x34\57\x78\x6d\x6c\x65\156\143\x23\163\150\x61\x35\61\x32";
    const RIPEMD160 = "\x68\x74\x74\x70\72\x2f\57\x77\167\167\x2e\x77\x33\56\x6f\x72\x67\57\62\x30\x30\x31\x2f\60\64\57\170\x6d\154\145\156\143\x23\162\x69\160\145\155\x64\x31\66\60";
    const C14N = "\x68\x74\164\160\x3a\x2f\x2f\167\x77\167\56\167\x33\56\x6f\x72\147\57\124\x52\x2f\x32\60\x30\61\x2f\x52\x45\103\x2d\170\x6d\x6c\x2d\143\61\x34\156\55\62\x30\60\x31\60\x33\x31\x35";
    const C14N_COMMENTS = "\150\164\164\160\72\57\x2f\167\167\167\x2e\167\x33\56\157\162\147\x2f\x54\x52\x2f\x32\x30\x30\61\57\122\x45\103\x2d\x78\x6d\x6c\x2d\143\x31\x34\156\55\62\60\60\x31\x30\x33\61\65\x23\x57\151\164\150\x43\157\x6d\155\x65\x6e\164\163";
    const EXC_C14N = "\x68\x74\x74\160\72\57\57\167\167\x77\56\x77\x33\56\x6f\x72\x67\57\62\60\60\61\57\x31\60\57\x78\155\154\55\x65\x78\x63\55\x63\61\64\x6e\x23";
    const EXC_C14N_COMMENTS = "\x68\164\x74\160\72\57\x2f\167\x77\x77\x2e\x77\x33\56\x6f\162\x67\57\62\x30\60\61\57\x31\x30\x2f\x78\x6d\x6c\x2d\x65\x78\143\x2d\143\61\64\x6e\x23\127\151\x74\150\103\157\155\155\x65\x6e\x74\163";
    const template = "\x3c\144\x73\72\123\x69\147\x6e\141\164\x75\x72\145\40\x78\155\154\x6e\x73\x3a\x64\x73\x3d\x22\150\x74\164\x70\x3a\57\57\167\167\167\56\167\x33\x2e\157\162\147\x2f\62\60\x30\60\x2f\60\x39\x2f\170\x6d\154\x64\x73\151\147\x23\x22\76\15\12\40\40\x3c\144\x73\x3a\123\151\147\156\x65\144\111\x6e\146\157\76\15\xa\x20\x20\x20\40\74\144\163\x3a\x53\151\x67\x6e\141\x74\x75\162\145\115\145\164\150\157\x64\x20\57\76\xd\12\x20\40\x3c\57\x64\x73\x3a\123\x69\147\x6e\x65\x64\x49\x6e\146\157\x3e\xd\12\x3c\x2f\x64\x73\72\x53\151\x67\156\141\x74\165\162\x65\76";
    const BASE_TEMPLATE = "\74\x53\x69\147\x6e\x61\x74\165\x72\x65\x20\170\x6d\154\156\163\x3d\x22\x68\164\x74\160\x3a\x2f\x2f\x77\x77\167\56\x77\x33\x2e\157\x72\147\57\62\x30\60\60\x2f\60\x39\x2f\170\x6d\154\144\x73\151\x67\43\42\x3e\15\xa\40\x20\74\x53\151\x67\x6e\145\144\x49\x6e\x66\157\76\15\xa\40\40\x20\x20\74\123\151\x67\x6e\141\164\165\162\x65\x4d\x65\164\x68\157\144\x20\57\76\15\xa\40\40\74\57\123\x69\x67\x6e\x65\x64\x49\156\x66\157\x3e\15\xa\74\x2f\x53\151\147\156\x61\x74\x75\x72\x65\76";
    public $sigNode = null;
    public $idKeys = array();
    public $idNS = array();
    private $signedInfo = null;
    private $xPathCtx = null;
    private $canonicalMethod = null;
    private $prefix = '';
    private $searchpfx = "\163\145\143\x64\x73\x69\147";
    private $validatedNodes = null;
    public function __construct($YN = "\x64\163")
    {
        $bB = self::BASE_TEMPLATE;
        if (empty($YN)) {
            goto QPv;
        }
        $this->prefix = $YN . "\72";
        $Tr = array("\x3c\x53", "\74\57\x53", "\170\155\x6c\156\163\75");
        $Pi = array("\74{$YN}\x3a\123", "\x3c\x2f{$YN}\x3a\x53", "\170\155\x6c\x6e\x73\x3a{$YN}\75");
        $bB = str_replace($Tr, $Pi, $bB);
        QPv:
        $eg = new DOMDocument();
        $eg->loadXML($bB);
        $this->sigNode = $eg->documentElement;
    }
    private function resetXPathObj()
    {
        $this->xPathCtx = null;
    }
    private function getXPathObj()
    {
        if (!(empty($this->xPathCtx) && !empty($this->sigNode))) {
            goto opc;
        }
        $eM = new DOMXPath($this->sigNode->ownerDocument);
        $eM->registerNamespace("\x73\145\x63\144\163\x69\x67", self::XMLDSIGNS);
        $this->xPathCtx = $eM;
        opc:
        return $this->xPathCtx;
    }
    public static function generateGUID($YN = "\x70\x66\x78")
    {
        $PO = md5(uniqid(mt_rand(), true));
        $W4 = $YN . substr($PO, 0, 8) . "\x2d" . substr($PO, 8, 4) . "\x2d" . substr($PO, 12, 4) . "\x2d" . substr($PO, 16, 4) . "\55" . substr($PO, 20, 12);
        return $W4;
    }
    public static function generate_GUID($YN = "\160\146\170")
    {
        return self::generateGUID($YN);
    }
    public function locateSignature($JP, $Bj = 0)
    {
        if ($JP instanceof DOMDocument) {
            goto N2z;
        }
        $rq = $JP->ownerDocument;
        goto X1b;
        N2z:
        $rq = $JP;
        X1b:
        if (!$rq) {
            goto G0g;
        }
        $eM = new DOMXPath($rq);
        $eM->registerNamespace("\163\145\x63\144\x73\151\x67", self::XMLDSIGNS);
        $mr = "\56\57\57\163\145\x63\144\x73\151\x67\x3a\123\151\147\156\x61\x74\x75\x72\145";
        $AG = $eM->query($mr, $JP);
        $this->sigNode = $AG->item($Bj);
        $mr = "\x2e\57\163\145\143\144\163\151\x67\72\x53\x69\x67\156\145\144\x49\156\x66\157";
        $AG = $eM->query($mr, $this->sigNode);
        if (!($AG->length > 1)) {
            goto mWD;
        }
        throw new Exception("\111\x6e\x76\x61\154\x69\x64\40\x73\164\162\165\143\164\x75\x72\x65\x20\55\40\124\x6f\157\x20\155\x61\156\171\40\123\x69\x67\156\145\144\x49\156\x66\x6f\x20\x65\154\145\155\x65\156\x74\163\x20\x66\x6f\165\x6e\144");
        mWD:
        return $this->sigNode;
        G0g:
        return null;
    }
    public function createNewSignNode($Ze, $j1 = null)
    {
        $rq = $this->sigNode->ownerDocument;
        if (!is_null($j1)) {
            goto xzU;
        }
        $gC = $rq->createElementNS(self::XMLDSIGNS, $this->prefix . $Ze);
        goto VxL;
        xzU:
        $gC = $rq->createElementNS(self::XMLDSIGNS, $this->prefix . $Ze, $j1);
        VxL:
        return $gC;
    }
    public function setCanonicalMethod($De)
    {
        switch ($De) {
            case "\150\x74\x74\x70\72\57\x2f\x77\x77\x77\56\167\x33\56\157\x72\147\57\x54\122\57\x32\60\x30\61\57\122\105\103\x2d\170\155\154\x2d\x63\61\x34\x6e\55\62\x30\x30\61\60\63\x31\x35":
            case "\150\x74\164\160\72\x2f\x2f\167\167\167\56\167\x33\x2e\157\162\147\x2f\124\x52\x2f\62\60\x30\61\x2f\122\x45\103\55\x78\x6d\154\55\143\x31\x34\156\55\x32\x30\60\x31\60\63\61\x35\43\127\x69\x74\x68\x43\157\x6d\155\x65\156\x74\x73":
            case "\150\x74\164\x70\72\x2f\x2f\167\167\167\x2e\x77\63\56\x6f\162\147\57\62\60\60\61\x2f\x31\60\x2f\x78\155\x6c\55\x65\x78\x63\x2d\143\61\64\x6e\43":
            case "\x68\x74\164\x70\72\57\57\167\167\167\56\x77\63\56\x6f\162\147\x2f\x32\x30\x30\61\x2f\61\x30\x2f\x78\155\x6c\x2d\x65\x78\143\55\x63\x31\x34\x6e\43\x57\151\164\150\103\x6f\155\155\145\156\x74\x73":
                $this->canonicalMethod = $De;
                goto dIL;
            default:
                throw new Exception("\111\x6e\166\141\x6c\151\x64\x20\103\141\x6e\x6f\156\x69\x63\141\x6c\x20\x4d\145\164\x68\157\x64");
        }
        ITr:
        dIL:
        if (!($eM = $this->getXPathObj())) {
            goto Ldu;
        }
        $mr = "\x2e\x2f" . $this->searchpfx . "\72\x53\151\x67\156\x65\144\x49\156\x66\157";
        $AG = $eM->query($mr, $this->sigNode);
        if (!($mn = $AG->item(0))) {
            goto LG6;
        }
        $mr = "\56\x2f" . $this->searchpfx . "\x43\x61\x6e\157\x6e\x69\x63\x61\x6c\x69\172\x61\x74\151\157\156\115\x65\x74\150\157\x64";
        $AG = $eM->query($mr, $mn);
        if ($Hs = $AG->item(0)) {
            goto hft;
        }
        $Hs = $this->createNewSignNode("\x43\x61\156\157\x6e\x69\143\x61\x6c\151\x7a\x61\164\151\157\156\x4d\145\164\150\x6f\144");
        $mn->insertBefore($Hs, $mn->firstChild);
        hft:
        $Hs->setAttribute("\101\x6c\x67\157\x72\151\x74\150\x6d", $this->canonicalMethod);
        LG6:
        Ldu:
    }
    private function canonicalizeData($gC, $Uh, $WI = null, $Cy = null)
    {
        $F0 = false;
        $Xz = false;
        switch ($Uh) {
            case "\150\164\x74\x70\72\x2f\57\167\x77\167\x2e\167\63\56\157\x72\x67\x2f\124\x52\57\x32\x30\x30\x31\57\122\105\103\55\170\155\x6c\x2d\x63\x31\x34\156\x2d\x32\x30\x30\x31\x30\x33\x31\65":
                $F0 = false;
                $Xz = false;
                goto afe;
            case "\150\164\164\160\x3a\x2f\x2f\x77\167\x77\56\x77\63\x2e\157\x72\x67\x2f\124\x52\x2f\x32\x30\60\61\57\122\105\103\55\x78\x6d\154\55\x63\61\x34\156\x2d\62\60\x30\x31\60\63\61\x35\x23\x57\x69\164\150\x43\157\155\155\145\156\164\163":
                $Xz = true;
                goto afe;
            case "\150\x74\x74\160\x3a\x2f\x2f\x77\x77\x77\x2e\167\x33\x2e\x6f\x72\x67\x2f\x32\60\x30\x31\x2f\x31\60\57\170\155\x6c\55\x65\x78\x63\55\143\61\x34\156\43":
                $F0 = true;
                goto afe;
            case "\150\x74\164\x70\x3a\x2f\x2f\x77\167\x77\56\167\63\56\x6f\x72\147\x2f\x32\x30\x30\x31\x2f\x31\x30\57\x78\x6d\x6c\55\145\170\143\x2d\143\61\x34\156\43\x57\151\164\150\x43\157\x6d\x6d\145\x6e\164\163":
                $F0 = true;
                $Xz = true;
                goto afe;
        }
        bwy:
        afe:
        if (!(is_null($WI) && $gC instanceof DOMNode && $gC->ownerDocument !== null && $gC->isSameNode($gC->ownerDocument->documentElement))) {
            goto d3N;
        }
        $Kk = $gC;
        FcG:
        if (!($vh = $Kk->previousSibling)) {
            goto OvQ;
        }
        if (!($vh->nodeType == XML_PI_NODE || $vh->nodeType == XML_COMMENT_NODE && $Xz)) {
            goto FEZ;
        }
        goto OvQ;
        FEZ:
        $Kk = $vh;
        goto FcG;
        OvQ:
        if (!($vh == null)) {
            goto sBQ;
        }
        $gC = $gC->ownerDocument;
        sBQ:
        d3N:
        return $gC->C14N($F0, $Xz, $WI, $Cy);
    }
    public function canonicalizeSignedInfo()
    {
        $rq = $this->sigNode->ownerDocument;
        $Uh = null;
        if (!$rq) {
            goto Ob7;
        }
        $eM = $this->getXPathObj();
        $mr = "\56\x2f\163\145\x63\144\163\x69\147\72\x53\x69\147\x6e\x65\x64\x49\156\x66\x6f";
        $AG = $eM->query($mr, $this->sigNode);
        if (!($AG->length > 1)) {
            goto gYu;
        }
        throw new Exception("\111\x6e\166\141\154\x69\144\40\163\x74\x72\165\x63\164\165\162\x65\40\x2d\x20\x54\x6f\x6f\40\155\x61\156\x79\40\x53\151\x67\x6e\145\144\x49\x6e\x66\x6f\x20\x65\x6c\145\155\x65\156\x74\163\x20\146\x6f\165\156\x64");
        gYu:
        if (!($KF = $AG->item(0))) {
            goto Z7e;
        }
        $mr = "\x2e\57\163\145\x63\x64\x73\151\x67\x3a\x43\x61\156\x6f\156\151\143\x61\x6c\x69\172\x61\164\151\157\x6e\115\x65\164\150\x6f\144";
        $AG = $eM->query($mr, $KF);
        $Cy = null;
        if (!($Hs = $AG->item(0))) {
            goto z3i;
        }
        $Uh = $Hs->getAttribute("\x41\x6c\147\157\x72\x69\x74\x68\155");
        foreach ($Hs->childNodes as $gC) {
            if (!($gC->localName == "\111\x6e\x63\154\165\163\x69\166\145\116\x61\x6d\145\x73\x70\x61\143\x65\x73")) {
                goto WaQ;
            }
            if (!($bG = $gC->getAttribute("\120\162\145\146\151\170\114\x69\x73\x74"))) {
                goto t41;
            }
            $rt = array_filter(explode("\40", $bG));
            if (!(count($rt) > 0)) {
                goto hGR;
            }
            $Cy = array_merge($Cy ? $Cy : array(), $rt);
            hGR:
            t41:
            WaQ:
            ovG:
        }
        n1C:
        z3i:
        $this->signedInfo = $this->canonicalizeData($KF, $Uh, null, $Cy);
        return $this->signedInfo;
        Z7e:
        Ob7:
        return null;
    }
    public function calculateDigest($jx, $u_, $iJ = true)
    {
        switch ($jx) {
            case self::SHA1:
                $Sa = "\x73\150\x61\61";
                goto ff7;
            case self::SHA256:
                $Sa = "\x73\150\x61\x32\x35\x36";
                goto ff7;
            case self::SHA384:
                $Sa = "\163\150\x61\63\70\x34";
                goto ff7;
            case self::SHA512:
                $Sa = "\163\150\141\x35\x31\x32";
                goto ff7;
            case self::RIPEMD160:
                $Sa = "\162\x69\x70\x65\x6d\x64\x31\x36\60";
                goto ff7;
            default:
                throw new Exception("\103\x61\x6e\156\157\164\40\x76\x61\154\x69\144\x61\x74\145\40\x64\x69\147\145\x73\164\x3a\x20\125\156\163\165\x70\x70\157\162\x74\145\x64\x20\101\x6c\x67\x6f\x72\151\x74\x68\x6d\x20\x3c{$jx}\x3e");
        }
        Cuk:
        ff7:
        $IP = hash($Sa, $u_, true);
        if (!$iJ) {
            goto FwP;
        }
        $IP = base64_encode($IP);
        FwP:
        return $IP;
    }
    public function validateDigest($Jc, $u_)
    {
        $eM = new DOMXPath($Jc->ownerDocument);
        $eM->registerNamespace("\x73\145\143\x64\163\151\x67", self::XMLDSIGNS);
        $mr = "\x73\x74\x72\x69\156\x67\50\56\x2f\163\x65\x63\x64\163\x69\147\x3a\x44\x69\147\145\x73\x74\x4d\x65\x74\x68\157\144\57\100\101\154\147\x6f\162\x69\x74\x68\155\x29";
        $jx = $eM->evaluate($mr, $Jc);
        $dR = $this->calculateDigest($jx, $u_, false);
        $mr = "\163\x74\162\151\x6e\147\x28\x2e\57\163\x65\x63\x64\x73\x69\147\x3a\x44\x69\147\145\163\164\x56\x61\x6c\x75\x65\51";
        $H0 = $eM->evaluate($mr, $Jc);
        return $dR === base64_decode($H0);
    }
    public function processTransforms($Jc, $V6, $hy = true)
    {
        $u_ = $V6;
        $eM = new DOMXPath($Jc->ownerDocument);
        $eM->registerNamespace("\x73\x65\143\x64\x73\151\x67", self::XMLDSIGNS);
        $mr = "\56\57\163\x65\143\x64\x73\151\147\72\x54\162\141\156\163\146\157\162\155\163\x2f\x73\145\143\x64\163\x69\147\72\x54\162\x61\x6e\x73\x66\157\162\155";
        $mH = $eM->query($mr, $Jc);
        $Ok = "\150\164\x74\x70\72\57\57\x77\167\x77\56\167\x33\56\x6f\x72\147\57\x54\122\x2f\62\60\60\61\57\122\105\103\55\x78\155\x6c\x2d\143\61\x34\156\x2d\x32\x30\x30\61\60\x33\x31\x35";
        $WI = null;
        $Cy = null;
        foreach ($mH as $om) {
            $uK = $om->getAttribute("\x41\x6c\x67\x6f\162\151\x74\150\155");
            switch ($uK) {
                case "\x68\164\x74\160\x3a\x2f\57\167\x77\x77\x2e\167\63\56\x6f\x72\147\x2f\62\60\x30\61\57\x31\60\x2f\170\x6d\x6c\x2d\x65\170\x63\55\x63\x31\x34\156\x23":
                case "\150\164\x74\160\x3a\x2f\57\167\167\x77\56\x77\63\56\x6f\162\147\57\62\x30\x30\61\x2f\61\x30\x2f\x78\x6d\154\55\x65\170\143\55\x63\x31\x34\156\43\x57\x69\164\150\103\x6f\155\x6d\x65\x6e\x74\163":
                    if (!$hy) {
                        goto S_7;
                    }
                    $Ok = $uK;
                    goto GKV;
                    S_7:
                    $Ok = "\150\x74\164\160\x3a\57\x2f\167\x77\x77\56\x77\x33\56\157\162\x67\x2f\x32\x30\x30\61\x2f\61\60\x2f\x78\x6d\154\55\x65\x78\x63\55\143\61\64\x6e\43";
                    GKV:
                    $gC = $om->firstChild;
                    Sua:
                    if (!$gC) {
                        goto gTO;
                    }
                    if (!($gC->localName == "\111\156\143\x6c\165\163\x69\x76\x65\x4e\x61\155\145\163\x70\x61\143\x65\x73")) {
                        goto Vwu;
                    }
                    if (!($bG = $gC->getAttribute("\x50\162\x65\x66\151\x78\114\x69\x73\164"))) {
                        goto Iuo;
                    }
                    $rt = array();
                    $qv = explode("\40", $bG);
                    foreach ($qv as $bG) {
                        $a0 = trim($bG);
                        if (empty($a0)) {
                            goto bNZ;
                        }
                        $rt[] = $a0;
                        bNZ:
                        y2W:
                    }
                    U1W:
                    if (!(count($rt) > 0)) {
                        goto OBv;
                    }
                    $Cy = $rt;
                    OBv:
                    Iuo:
                    goto gTO;
                    Vwu:
                    $gC = $gC->nextSibling;
                    goto Sua;
                    gTO:
                    goto wHJ;
                case "\x68\164\x74\160\72\57\x2f\167\167\167\56\167\63\x2e\157\x72\147\x2f\124\122\x2f\62\60\x30\x31\x2f\122\105\x43\x2d\170\155\154\55\x63\x31\64\x6e\x2d\x32\60\x30\61\60\x33\x31\65":
                case "\x68\164\x74\x70\x3a\57\x2f\x77\167\167\x2e\167\63\56\157\x72\x67\x2f\124\x52\x2f\x32\x30\60\x31\x2f\122\105\x43\55\170\x6d\154\x2d\143\61\64\x6e\x2d\x32\60\x30\61\60\63\61\x35\43\127\151\x74\150\x43\157\155\155\145\x6e\164\x73":
                    if (!$hy) {
                        goto ecd;
                    }
                    $Ok = $uK;
                    goto Weo;
                    ecd:
                    $Ok = "\x68\164\164\160\x3a\57\57\167\x77\x77\56\x77\63\56\157\x72\147\57\124\122\57\62\x30\60\61\57\122\105\103\55\x78\155\154\55\143\61\x34\x6e\x2d\62\x30\x30\61\x30\x33\x31\65";
                    Weo:
                    goto wHJ;
                case "\150\164\x74\x70\72\57\57\167\x77\x77\56\x77\63\56\x6f\x72\x67\57\x54\x52\57\61\x39\x39\x39\57\122\x45\x43\55\170\160\141\x74\150\55\61\x39\71\71\x31\x31\61\66":
                    $gC = $om->firstChild;
                    p9g:
                    if (!$gC) {
                        goto GFu;
                    }
                    if (!($gC->localName == "\x58\120\x61\x74\x68")) {
                        goto iZf;
                    }
                    $WI = array();
                    $WI["\x71\165\x65\162\x79"] = "\x28\56\57\57\56\40\174\40\56\x2f\57\x40\x2a\x20\174\40\x2e\57\57\x6e\141\x6d\145\163\x70\141\143\x65\72\x3a\52\51\x5b" . $gC->nodeValue . "\x5d";
                    $WI["\x6e\x61\x6d\145\163\x70\x61\143\145\x73"] = array();
                    $bx = $eM->query("\56\57\156\x61\x6d\145\163\x70\141\x63\145\x3a\x3a\x2a", $gC);
                    foreach ($bx as $m4) {
                        if (!($m4->localName != "\x78\x6d\154")) {
                            goto CmJ;
                        }
                        $WI["\x6e\141\x6d\x65\163\160\x61\x63\145\163"][$m4->localName] = $m4->nodeValue;
                        CmJ:
                        S7L:
                    }
                    XlA:
                    goto GFu;
                    iZf:
                    $gC = $gC->nextSibling;
                    goto p9g;
                    GFu:
                    goto wHJ;
            }
            r22:
            wHJ:
            sWQ:
        }
        ekj:
        if (!$u_ instanceof DOMNode) {
            goto x20;
        }
        $u_ = $this->canonicalizeData($V6, $Ok, $WI, $Cy);
        x20:
        return $u_;
    }
    public function processRefNode($Jc)
    {
        $kx = null;
        $hy = true;
        if ($ie = $Jc->getAttribute("\125\122\x49")) {
            goto DBL;
        }
        $hy = false;
        $kx = $Jc->ownerDocument;
        goto f1X;
        DBL:
        $Ua = parse_url($ie);
        if (!empty($Ua["\160\141\164\150"])) {
            goto XtQ;
        }
        if ($Q0 = $Ua["\146\162\x61\147\155\x65\x6e\x74"]) {
            goto aRi;
        }
        $kx = $Jc->ownerDocument;
        goto Sv8;
        aRi:
        $hy = false;
        $Tc = new DOMXPath($Jc->ownerDocument);
        if (!($this->idNS && is_array($this->idNS))) {
            goto vW8;
        }
        foreach ($this->idNS as $wx => $Ei) {
            $Tc->registerNamespace($wx, $Ei);
            bH7:
        }
        xFs:
        vW8:
        $Yy = "\x40\x49\x64\75\x22" . XPath::filterAttrValue($Q0, XPath::DOUBLE_QUOTE) . "\42";
        if (!is_array($this->idKeys)) {
            goto maD;
        }
        foreach ($this->idKeys as $L5) {
            $Yy .= "\40\157\x72\40\x40" . XPath::filterAttrName($L5) . "\75\42" . XPath::filterAttrValue($Q0, XPath::DOUBLE_QUOTE) . "\x22";
            kBm:
        }
        MzV:
        maD:
        $mr = "\57\57\52\x5b" . $Yy . "\x5d";
        $kx = $Tc->query($mr)->item(0);
        Sv8:
        XtQ:
        f1X:
        $u_ = $this->processTransforms($Jc, $kx, $hy);
        if ($this->validateDigest($Jc, $u_)) {
            goto vpb;
        }
        return false;
        vpb:
        if (!$kx instanceof DOMNode) {
            goto dEf;
        }
        if (!empty($Q0)) {
            goto eKQ;
        }
        $this->validatedNodes[] = $kx;
        goto BLn;
        eKQ:
        $this->validatedNodes[$Q0] = $kx;
        BLn:
        dEf:
        return true;
    }
    public function getRefNodeID($Jc)
    {
        if (!($ie = $Jc->getAttribute("\x55\122\x49"))) {
            goto oOS;
        }
        $Ua = parse_url($ie);
        if (!empty($Ua["\x70\141\164\150"])) {
            goto AQ4;
        }
        if (!($Q0 = $Ua["\146\x72\141\147\x6d\145\x6e\164"])) {
            goto TMK;
        }
        return $Q0;
        TMK:
        AQ4:
        oOS:
        return null;
    }
    public function getRefIDs()
    {
        $QL = array();
        $eM = $this->getXPathObj();
        $mr = "\x2e\57\x73\x65\143\x64\163\x69\x67\x3a\x53\x69\x67\x6e\145\x64\111\156\x66\x6f\x5b\61\135\57\163\x65\143\x64\163\151\x67\x3a\122\145\x66\x65\x72\x65\x6e\143\145";
        $AG = $eM->query($mr, $this->sigNode);
        if (!($AG->length == 0)) {
            goto n_L;
        }
        throw new Exception("\122\x65\146\145\162\x65\x6e\143\145\x20\x6e\x6f\x64\x65\163\x20\156\157\164\x20\x66\x6f\x75\156\x64");
        n_L:
        foreach ($AG as $Jc) {
            $QL[] = $this->getRefNodeID($Jc);
            GkL:
        }
        OO5:
        return $QL;
    }
    public function validateReference()
    {
        $vJ = $this->sigNode->ownerDocument->documentElement;
        if ($vJ->isSameNode($this->sigNode)) {
            goto aVP;
        }
        if (!($this->sigNode->parentNode != null)) {
            goto mRl;
        }
        $this->sigNode->parentNode->removeChild($this->sigNode);
        mRl:
        aVP:
        $eM = $this->getXPathObj();
        $mr = "\x2e\57\x73\145\143\144\163\x69\x67\x3a\x53\x69\147\x6e\x65\144\111\156\x66\x6f\133\61\135\x2f\163\x65\x63\144\163\x69\147\72\x52\x65\x66\145\162\x65\156\143\145";
        $AG = $eM->query($mr, $this->sigNode);
        if (!($AG->length == 0)) {
            goto bMN;
        }
        throw new Exception("\x52\x65\x66\x65\162\x65\156\x63\145\x20\x6e\x6f\x64\x65\163\40\x6e\157\x74\40\146\x6f\x75\x6e\x64");
        bMN:
        $this->validatedNodes = array();
        foreach ($AG as $Jc) {
            if ($this->processRefNode($Jc)) {
                goto SAV;
            }
            $this->validatedNodes = null;
            throw new Exception("\122\x65\146\x65\162\x65\x6e\143\x65\40\x76\x61\154\151\144\141\x74\151\x6f\156\x20\146\x61\x69\x6c\x65\x64");
            SAV:
            G7G:
        }
        tBr:
        return true;
    }
    private function addRefInternal($uH, $gC, $uK, $Vi = null, $Pr = null)
    {
        $YN = null;
        $Zb = null;
        $SH = "\x49\144";
        $n3 = true;
        $nl = false;
        if (!is_array($Pr)) {
            goto UC1;
        }
        $YN = empty($Pr["\160\162\145\x66\x69\170"]) ? null : $Pr["\160\162\x65\x66\x69\170"];
        $Zb = empty($Pr["\160\162\x65\146\x69\170\x5f\x6e\x73"]) ? null : $Pr["\x70\x72\145\146\x69\x78\137\156\163"];
        $SH = empty($Pr["\x69\144\x5f\156\141\155\145"]) ? "\x49\x64" : $Pr["\151\144\x5f\x6e\141\x6d\x65"];
        $n3 = !isset($Pr["\x6f\166\x65\x72\x77\162\151\164\145"]) ? true : (bool) $Pr["\157\166\145\x72\x77\162\x69\164\145"];
        $nl = !isset($Pr["\x66\x6f\x72\143\145\x5f\x75\162\151"]) ? false : (bool) $Pr["\146\157\162\143\x65\x5f\x75\x72\x69"];
        UC1:
        $e2 = $SH;
        if (empty($YN)) {
            goto Ven;
        }
        $e2 = $YN . "\72" . $e2;
        Ven:
        $Jc = $this->createNewSignNode("\x52\x65\146\x65\x72\x65\156\x63\145");
        $uH->appendChild($Jc);
        if (!$gC instanceof DOMDocument) {
            goto n17;
        }
        if ($nl) {
            goto Wn3;
        }
        goto v2P;
        n17:
        $ie = null;
        if ($n3) {
            goto Uch;
        }
        $ie = $Zb ? $gC->getAttributeNS($Zb, $SH) : $gC->getAttribute($SH);
        Uch:
        if (!empty($ie)) {
            goto ZeC;
        }
        $ie = self::generateGUID();
        $gC->setAttributeNS($Zb, $e2, $ie);
        ZeC:
        $Jc->setAttribute("\x55\x52\x49", "\43" . $ie);
        goto v2P;
        Wn3:
        $Jc->setAttribute("\125\122\111", '');
        v2P:
        $BA = $this->createNewSignNode("\124\x72\141\156\x73\146\x6f\x72\x6d\163");
        $Jc->appendChild($BA);
        if (is_array($Vi)) {
            goto TAQ;
        }
        if (!empty($this->canonicalMethod)) {
            goto aaf;
        }
        goto KOo;
        TAQ:
        foreach ($Vi as $om) {
            $mh = $this->createNewSignNode("\124\x72\x61\156\x73\x66\x6f\x72\155");
            $BA->appendChild($mh);
            if (is_array($om) && !empty($om["\150\x74\x74\160\x3a\57\x2f\167\x77\167\56\167\63\56\x6f\162\147\57\x54\122\x2f\61\71\x39\x39\x2f\x52\105\x43\x2d\x78\160\x61\x74\x68\x2d\x31\71\71\x39\x31\x31\x31\x36"]) && !empty($om["\x68\x74\164\x70\72\57\57\167\167\167\56\167\x33\x2e\x6f\x72\147\57\124\122\x2f\61\x39\x39\71\57\122\105\x43\x2d\x78\x70\141\164\150\x2d\61\71\71\x39\61\x31\61\66"]["\x71\x75\145\x72\x79"])) {
                goto OpK;
            }
            $mh->setAttribute("\101\154\x67\157\x72\151\x74\150\x6d", $om);
            goto F8K;
            OpK:
            $mh->setAttribute("\x41\x6c\147\157\162\151\164\150\155", "\150\164\164\x70\72\x2f\x2f\167\167\x77\x2e\x77\63\x2e\x6f\x72\147\57\124\122\57\61\x39\x39\x39\x2f\122\105\x43\55\x78\x70\x61\x74\150\x2d\x31\x39\x39\x39\61\61\61\66");
            $Lc = $this->createNewSignNode("\x58\120\x61\164\150", $om["\150\x74\164\160\72\57\57\167\x77\x77\x2e\x77\x33\x2e\x6f\x72\x67\57\x54\x52\57\61\71\x39\71\57\122\105\x43\x2d\170\x70\141\x74\150\55\61\x39\71\71\61\61\x31\66"]["\161\x75\x65\162\x79"]);
            $mh->appendChild($Lc);
            if (empty($om["\x68\164\x74\160\x3a\x2f\x2f\167\x77\167\56\167\63\x2e\157\x72\x67\x2f\x54\122\57\61\71\71\x39\x2f\x52\x45\x43\x2d\x78\160\141\x74\x68\55\61\x39\71\x39\61\x31\x31\x36"]["\x6e\141\155\145\x73\x70\x61\x63\145\x73"])) {
                goto oLm;
            }
            foreach ($om["\150\x74\x74\160\72\x2f\57\x77\x77\167\56\x77\x33\56\157\162\147\57\124\x52\x2f\x31\x39\x39\x39\57\122\x45\103\x2d\x78\160\x61\x74\150\x2d\x31\71\71\71\x31\61\61\x36"]["\156\141\x6d\145\x73\x70\x61\143\145\163"] as $YN => $XL) {
                $Lc->setAttributeNS("\150\164\x74\x70\x3a\x2f\x2f\x77\x77\167\x2e\x77\x33\56\157\x72\147\57\x32\x30\x30\x30\57\x78\x6d\x6c\x6e\163\57", "\x78\x6d\x6c\x6e\163\x3a{$YN}", $XL);
                L12:
            }
            ADP:
            oLm:
            F8K:
            qb9:
        }
        clF:
        goto KOo;
        aaf:
        $mh = $this->createNewSignNode("\124\x72\141\156\163\x66\x6f\x72\155");
        $BA->appendChild($mh);
        $mh->setAttribute("\101\154\x67\157\x72\x69\x74\150\x6d", $this->canonicalMethod);
        KOo:
        $SY = $this->processTransforms($Jc, $gC);
        $dR = $this->calculateDigest($uK, $SY);
        $Lk = $this->createNewSignNode("\104\151\147\145\x73\164\115\x65\x74\x68\157\x64");
        $Jc->appendChild($Lk);
        $Lk->setAttribute("\101\154\x67\157\162\151\x74\x68\x6d", $uK);
        $H0 = $this->createNewSignNode("\x44\x69\147\145\163\164\126\141\x6c\x75\x65", $dR);
        $Jc->appendChild($H0);
    }
    public function addReference($gC, $uK, $Vi = null, $Pr = null)
    {
        if (!($eM = $this->getXPathObj())) {
            goto srs;
        }
        $mr = "\x2e\x2f\163\145\x63\144\163\x69\x67\72\123\151\x67\156\x65\x64\111\x6e\x66\157";
        $AG = $eM->query($mr, $this->sigNode);
        if (!($Em = $AG->item(0))) {
            goto orn;
        }
        $this->addRefInternal($Em, $gC, $uK, $Vi, $Pr);
        orn:
        srs:
    }
    public function addReferenceList($pG, $uK, $Vi = null, $Pr = null)
    {
        if (!($eM = $this->getXPathObj())) {
            goto qSQ;
        }
        $mr = "\56\57\163\x65\143\144\163\151\x67\x3a\123\151\147\156\145\x64\x49\156\146\157";
        $AG = $eM->query($mr, $this->sigNode);
        if (!($Em = $AG->item(0))) {
            goto U8r;
        }
        foreach ($pG as $gC) {
            $this->addRefInternal($Em, $gC, $uK, $Vi, $Pr);
            Xj0:
        }
        swc:
        U8r:
        qSQ:
    }
    public function addObject($u_, $PF = null, $e4 = null)
    {
        $qH = $this->createNewSignNode("\x4f\x62\x6a\x65\x63\164");
        $this->sigNode->appendChild($qH);
        if (empty($PF)) {
            goto Br_;
        }
        $qH->setAttribute("\115\x69\x6d\145\124\x79\160\145", $PF);
        Br_:
        if (empty($e4)) {
            goto F75;
        }
        $qH->setAttribute("\105\156\x63\x6f\144\x69\x6e\147", $e4);
        F75:
        if ($u_ instanceof DOMElement) {
            goto nsC;
        }
        $bS = $this->sigNode->ownerDocument->createTextNode($u_);
        goto tpK;
        nsC:
        $bS = $this->sigNode->ownerDocument->importNode($u_, true);
        tpK:
        $qH->appendChild($bS);
        return $qH;
    }
    public function locateKey($gC = null)
    {
        if (!empty($gC)) {
            goto gGA;
        }
        $gC = $this->sigNode;
        gGA:
        if ($gC instanceof DOMNode) {
            goto UjI;
        }
        return null;
        UjI:
        if (!($rq = $gC->ownerDocument)) {
            goto ap3;
        }
        $eM = new DOMXPath($rq);
        $eM->registerNamespace("\x73\x65\x63\x64\163\x69\x67", self::XMLDSIGNS);
        $mr = "\163\164\162\151\156\147\50\56\57\163\x65\143\144\163\x69\147\72\x53\151\x67\x6e\x65\144\x49\x6e\146\157\57\163\x65\x63\x64\x73\151\x67\x3a\123\151\147\x6e\x61\164\x75\x72\x65\x4d\145\164\150\x6f\x64\57\x40\101\x6c\147\157\162\151\164\150\155\51";
        $uK = $eM->evaluate($mr, $gC);
        if (!$uK) {
            goto kii;
        }
        try {
            $TN = new XMLSecurityKey($uK, array("\164\x79\x70\x65" => "\x70\165\142\154\151\143"));
        } catch (Exception $L2) {
            return null;
        }
        return $TN;
        kii:
        ap3:
        return null;
    }
    public function verify($TN)
    {
        $rq = $this->sigNode->ownerDocument;
        $eM = new DOMXPath($rq);
        $eM->registerNamespace("\163\x65\x63\144\163\151\147", self::XMLDSIGNS);
        $mr = "\163\164\162\151\x6e\x67\50\56\57\163\x65\143\144\163\x69\x67\72\123\151\147\156\141\164\x75\162\145\126\x61\154\x75\145\x29";
        $Av = $eM->evaluate($mr, $this->sigNode);
        if (!empty($Av)) {
            goto NvF;
        }
        throw new Exception("\125\156\141\142\x6c\x65\40\x74\x6f\x20\x6c\157\143\x61\164\x65\x20\123\x69\147\156\141\x74\165\162\145\126\x61\x6c\165\145");
        NvF:
        return $TN->verifySignature($this->signedInfo, base64_decode($Av));
    }
    public function signData($TN, $u_)
    {
        return $TN->signData($u_);
    }
    public function sign($TN, $mY = null)
    {
        if (!($mY != null)) {
            goto lW3;
        }
        $this->resetXPathObj();
        $this->appendSignature($mY);
        $this->sigNode = $mY->lastChild;
        lW3:
        if (!($eM = $this->getXPathObj())) {
            goto e4i;
        }
        $mr = "\x2e\57\x73\145\x63\x64\x73\151\x67\72\x53\151\x67\x6e\x65\144\111\x6e\x66\x6f";
        $AG = $eM->query($mr, $this->sigNode);
        if (!($Em = $AG->item(0))) {
            goto OIj;
        }
        $mr = "\56\x2f\163\145\143\x64\x73\151\x67\x3a\123\x69\147\x6e\141\164\x75\x72\145\x4d\145\164\x68\157\144";
        $AG = $eM->query($mr, $Em);
        $oI = $AG->item(0);
        $oI->setAttribute("\101\154\x67\157\x72\x69\164\x68\x6d", $TN->type);
        $u_ = $this->canonicalizeData($Em, $this->canonicalMethod);
        $Av = base64_encode($this->signData($TN, $u_));
        $I_ = $this->createNewSignNode("\x53\151\147\x6e\x61\164\x75\162\x65\x56\x61\154\165\145", $Av);
        if ($n8 = $Em->nextSibling) {
            goto PmD;
        }
        $this->sigNode->appendChild($I_);
        goto GXG;
        PmD:
        $n8->parentNode->insertBefore($I_, $n8);
        GXG:
        OIj:
        e4i:
    }
    public function appendCert()
    {
    }
    public function appendKey($TN, $sT = null)
    {
        $TN->serializeKey($sT);
    }
    public function insertSignature($gC, $ew = null)
    {
        $eB = $gC->ownerDocument;
        $A3 = $eB->importNode($this->sigNode, true);
        if ($ew == null) {
            goto b0m;
        }
        return $gC->insertBefore($A3, $ew);
        goto rPI;
        b0m:
        return $gC->insertBefore($A3);
        rPI:
    }
    public function appendSignature($N9, $uT = false)
    {
        $ew = $uT ? $N9->firstChild : null;
        return $this->insertSignature($N9, $ew);
    }
    public static function get509XCert($Km, $Jl = true)
    {
        $sE = self::staticGet509XCerts($Km, $Jl);
        if (empty($sE)) {
            goto iUl;
        }
        return $sE[0];
        iUl:
        return '';
    }
    public static function staticGet509XCerts($sE, $Jl = true)
    {
        if ($Jl) {
            goto JTU;
        }
        return array($sE);
        goto jUC;
        JTU:
        $u_ = '';
        $g9 = array();
        $ui = explode("\xa", $sE);
        $u3 = false;
        foreach ($ui as $hF) {
            if (!$u3) {
                goto akz;
            }
            if (!(strncmp($hF, "\55\55\55\x2d\x2d\105\116\x44\40\x43\105\x52\x54\111\x46\111\x43\101\x54\x45", 20) == 0)) {
                goto la5;
            }
            $u3 = false;
            $g9[] = $u_;
            $u_ = '';
            goto oVN;
            la5:
            $u_ .= trim($hF);
            goto ijD;
            akz:
            if (!(strncmp($hF, "\55\55\x2d\55\x2d\x42\x45\107\x49\116\40\x43\x45\122\x54\111\x46\x49\103\x41\124\x45", 22) == 0)) {
                goto J6T;
            }
            $u3 = true;
            J6T:
            ijD:
            oVN:
        }
        ONF:
        return $g9;
        jUC:
    }
    public static function staticAdd509Cert($y5, $Km, $Jl = true, $mV = false, $eM = null, $Pr = null)
    {
        if (!$mV) {
            goto U4H;
        }
        $Km = file_get_contents($Km);
        U4H:
        if ($y5 instanceof DOMElement) {
            goto s8M;
        }
        throw new Exception("\x49\x6e\x76\x61\x6c\151\144\x20\160\x61\162\x65\x6e\164\40\x4e\157\x64\x65\40\x70\x61\162\141\155\145\164\x65\162");
        s8M:
        $sG = $y5->ownerDocument;
        if (!empty($eM)) {
            goto f2D;
        }
        $eM = new DOMXPath($y5->ownerDocument);
        $eM->registerNamespace("\163\145\143\144\x73\151\x67", self::XMLDSIGNS);
        f2D:
        $mr = "\56\x2f\163\x65\143\144\163\151\147\x3a\x4b\x65\x79\111\156\x66\x6f";
        $AG = $eM->query($mr, $y5);
        $X3 = $AG->item(0);
        $rp = '';
        if (!$X3) {
            goto Dvt;
        }
        $bG = $X3->lookupPrefix(self::XMLDSIGNS);
        if (empty($bG)) {
            goto Wze;
        }
        $rp = $bG . "\x3a";
        Wze:
        goto CG6;
        Dvt:
        $bG = $y5->lookupPrefix(self::XMLDSIGNS);
        if (empty($bG)) {
            goto cQz;
        }
        $rp = $bG . "\x3a";
        cQz:
        $H5 = false;
        $X3 = $sG->createElementNS(self::XMLDSIGNS, $rp . "\x4b\145\x79\x49\156\x66\x6f");
        $mr = "\x2e\x2f\x73\145\x63\x64\163\151\x67\72\x4f\x62\x6a\x65\143\164";
        $AG = $eM->query($mr, $y5);
        if (!($jO = $AG->item(0))) {
            goto PSr;
        }
        $jO->parentNode->insertBefore($X3, $jO);
        $H5 = true;
        PSr:
        if ($H5) {
            goto RVZ;
        }
        $y5->appendChild($X3);
        RVZ:
        CG6:
        $sE = self::staticGet509XCerts($Km, $Jl);
        $L4 = $sG->createElementNS(self::XMLDSIGNS, $rp . "\130\65\x30\x39\104\x61\164\141");
        $X3->appendChild($L4);
        $sf = false;
        $io = false;
        if (!is_array($Pr)) {
            goto ydJ;
        }
        if (empty($Pr["\x69\x73\x73\165\x65\162\123\x65\162\x69\x61\154"])) {
            goto dbb;
        }
        $sf = true;
        dbb:
        if (empty($Pr["\x73\x75\142\x6a\x65\x63\164\x4e\141\155\145"])) {
            goto K4r;
        }
        $io = true;
        K4r:
        ydJ:
        foreach ($sE as $OP) {
            if (!($sf || $io)) {
                goto nhc;
            }
            if (!($T9 = openssl_x509_parse("\x2d\55\55\x2d\55\102\105\107\x49\x4e\x20\103\x45\122\124\x49\106\111\x43\x41\x54\x45\x2d\x2d\55\55\55\xa" . chunk_split($OP, 64, "\12") . "\55\x2d\x2d\55\55\105\x4e\x44\40\x43\x45\x52\124\x49\106\111\x43\x41\124\105\55\x2d\55\55\x2d\12"))) {
                goto npt;
            }
            if (!($io && !empty($T9["\x73\165\x62\152\x65\143\x74"]))) {
                goto thO;
            }
            if (is_array($T9["\163\165\x62\152\x65\143\x74"])) {
                goto ZQd;
            }
            $Vh = $T9["\151\163\163\x75\145\162"];
            goto rx3;
            ZQd:
            $M5 = array();
            foreach ($T9["\x73\165\142\152\145\143\164"] as $Ej => $j1) {
                if (is_array($j1)) {
                    goto sdf;
                }
                array_unshift($M5, "{$Ej}\75{$j1}");
                goto Lu6;
                sdf:
                foreach ($j1 as $Fh) {
                    array_unshift($M5, "{$Ej}\x3d{$Fh}");
                    oP0:
                }
                PCI:
                Lu6:
                CvN:
            }
            wok:
            $Vh = implode("\x2c", $M5);
            rx3:
            $bL = $sG->createElementNS(self::XMLDSIGNS, $rp . "\x58\65\x30\x39\x53\165\x62\152\145\143\164\x4e\141\x6d\x65", $Vh);
            $L4->appendChild($bL);
            thO:
            if (!($sf && !empty($T9["\x69\x73\x73\x75\145\x72"]) && !empty($T9["\163\x65\162\x69\x61\x6c\x4e\165\155\x62\145\x72"]))) {
                goto HFE;
            }
            if (is_array($T9["\x69\163\x73\165\x65\162"])) {
                goto jKU;
            }
            $KK = $T9["\151\163\x73\x75\x65\x72"];
            goto Z3H;
            jKU:
            $M5 = array();
            foreach ($T9["\151\x73\x73\x75\x65\162"] as $Ej => $j1) {
                array_unshift($M5, "{$Ej}\75{$j1}");
                jlq:
            }
            oxy:
            $KK = implode("\x2c", $M5);
            Z3H:
            $Gr = $sG->createElementNS(self::XMLDSIGNS, $rp . "\x58\x35\60\x39\111\x73\x73\x75\145\162\x53\x65\162\151\141\x6c");
            $L4->appendChild($Gr);
            $ig = $sG->createElementNS(self::XMLDSIGNS, $rp . "\x58\65\60\71\111\163\x73\165\x65\x72\x4e\141\155\145", $KK);
            $Gr->appendChild($ig);
            $ig = $sG->createElementNS(self::XMLDSIGNS, $rp . "\130\x35\60\x39\123\x65\x72\151\x61\x6c\116\x75\155\142\x65\x72", $T9["\163\x65\x72\x69\141\x6c\x4e\x75\155\x62\145\x72"]);
            $Gr->appendChild($ig);
            HFE:
            npt:
            nhc:
            $hZ = $sG->createElementNS(self::XMLDSIGNS, $rp . "\x58\65\60\71\103\x65\x72\164\151\x66\x69\143\141\164\145", $OP);
            $L4->appendChild($hZ);
            t3D:
        }
        djy:
    }
    public function add509Cert($Km, $Jl = true, $mV = false, $Pr = null)
    {
        if (!($eM = $this->getXPathObj())) {
            goto p4T;
        }
        self::staticAdd509Cert($this->sigNode, $Km, $Jl, $mV, $eM, $Pr);
        p4T:
    }
    public function appendToKeyInfo($gC)
    {
        $y5 = $this->sigNode;
        $sG = $y5->ownerDocument;
        $eM = $this->getXPathObj();
        if (!empty($eM)) {
            goto K9B;
        }
        $eM = new DOMXPath($y5->ownerDocument);
        $eM->registerNamespace("\x73\145\x63\144\163\151\x67", self::XMLDSIGNS);
        K9B:
        $mr = "\56\x2f\163\145\x63\x64\x73\x69\147\x3a\113\145\171\111\156\146\157";
        $AG = $eM->query($mr, $y5);
        $X3 = $AG->item(0);
        if ($X3) {
            goto g6Q;
        }
        $rp = '';
        $bG = $y5->lookupPrefix(self::XMLDSIGNS);
        if (empty($bG)) {
            goto Bwm;
        }
        $rp = $bG . "\72";
        Bwm:
        $H5 = false;
        $X3 = $sG->createElementNS(self::XMLDSIGNS, $rp . "\113\x65\171\111\156\x66\x6f");
        $mr = "\56\x2f\x73\x65\143\144\163\151\x67\72\117\142\x6a\x65\x63\164";
        $AG = $eM->query($mr, $y5);
        if (!($jO = $AG->item(0))) {
            goto Y02;
        }
        $jO->parentNode->insertBefore($X3, $jO);
        $H5 = true;
        Y02:
        if ($H5) {
            goto Xoi;
        }
        $y5->appendChild($X3);
        Xoi:
        g6Q:
        $X3->appendChild($gC);
        return $X3;
    }
    public function getValidatedNodes()
    {
        return $this->validatedNodes;
    }
}
