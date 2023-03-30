<?php


namespace RobRichards\XMLSecLibs;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;
use Exception;
use RobRichards\XMLSecLibs\Utils\XPath as XPath;
class XMLSecurityDSig
{
    const XMLDSIGNS = "\x68\164\164\160\72\x2f\x2f\x77\x77\x77\56\x77\x33\x2e\157\x72\147\57\x32\x30\60\x30\x2f\x30\71\x2f\x78\155\x6c\144\163\151\147\x23";
    const SHA1 = "\x68\x74\x74\x70\x3a\57\57\x77\167\x77\x2e\167\x33\x2e\157\x72\x67\57\62\60\60\x30\57\x30\x39\x2f\x78\x6d\x6c\144\x73\x69\147\43\163\150\141\61";
    const SHA256 = "\x68\164\164\160\x3a\x2f\x2f\x77\167\x77\56\x77\63\x2e\x6f\x72\147\57\62\60\x30\x31\57\x30\64\x2f\x78\x6d\x6c\x65\x6e\x63\43\163\150\141\62\x35\x36";
    const SHA384 = "\150\164\x74\x70\x3a\x2f\57\x77\167\167\x2e\167\x33\56\157\x72\147\x2f\62\x30\60\61\x2f\x30\64\57\170\155\154\x64\x73\x69\147\55\x6d\x6f\162\x65\43\163\x68\141\63\70\64";
    const SHA512 = "\x68\164\164\160\x3a\x2f\57\167\x77\x77\x2e\x77\x33\56\157\x72\147\x2f\62\60\x30\61\57\60\64\x2f\x78\x6d\154\x65\x6e\x63\x23\x73\150\141\x35\61\x32";
    const RIPEMD160 = "\150\164\x74\x70\x3a\x2f\x2f\x77\x77\x77\x2e\x77\x33\x2e\157\x72\147\57\x32\60\60\x31\x2f\60\64\57\170\x6d\x6c\145\156\143\43\x72\151\160\x65\155\x64\x31\66\x30";
    const C14N = "\x68\164\164\x70\72\57\57\167\167\x77\56\x77\x33\x2e\x6f\162\x67\57\x54\122\57\62\x30\60\x31\x2f\x52\x45\103\55\170\x6d\x6c\x2d\143\x31\64\x6e\55\x32\x30\60\61\60\63\x31\x35";
    const C14N_COMMENTS = "\x68\164\x74\160\72\57\x2f\167\x77\x77\56\167\x33\56\x6f\162\x67\x2f\x54\122\57\x32\x30\x30\x31\57\122\x45\x43\55\x78\155\x6c\x2d\x63\x31\x34\x6e\55\x32\x30\x30\61\x30\x33\61\65\x23\x57\x69\164\x68\x43\x6f\x6d\x6d\x65\156\164\x73";
    const EXC_C14N = "\150\x74\x74\x70\72\x2f\57\167\x77\167\x2e\167\x33\x2e\157\162\147\x2f\x32\60\60\x31\x2f\x31\x30\57\170\155\x6c\x2d\x65\x78\143\x2d\x63\x31\x34\x6e\43";
    const EXC_C14N_COMMENTS = "\150\164\164\160\x3a\57\x2f\167\x77\x77\56\x77\x33\56\x6f\x72\x67\57\62\60\x30\61\57\x31\60\x2f\170\155\x6c\55\145\x78\143\x2d\x63\61\x34\156\x23\x57\x69\164\150\x43\x6f\155\x6d\145\156\164\x73";
    const template = "\x3c\x64\163\x3a\123\x69\147\x6e\x61\x74\165\x72\x65\x20\x78\x6d\154\x6e\163\x3a\x64\163\x3d\42\x68\x74\164\160\x3a\x2f\57\x77\x77\x77\x2e\167\x33\x2e\x6f\x72\x67\x2f\x32\60\60\x30\57\x30\x39\x2f\170\155\x6c\x64\163\x69\x67\x23\42\x3e\12\40\x20\74\144\x73\x3a\x53\x69\x67\156\x65\144\111\x6e\x66\x6f\76\xa\x20\x20\x20\40\74\x64\163\72\x53\151\x67\x6e\x61\x74\x75\162\x65\115\145\164\150\x6f\x64\x20\x2f\x3e\12\x20\x20\74\x2f\144\163\x3a\123\x69\147\x6e\145\x64\x49\x6e\146\157\x3e\12\x3c\57\144\x73\72\123\x69\x67\x6e\x61\x74\x75\162\x65\76";
    const BASE_TEMPLATE = "\74\123\x69\147\156\x61\x74\165\x72\x65\40\x78\x6d\154\x6e\x73\75\42\150\164\x74\160\72\57\57\167\x77\x77\56\167\63\x2e\157\162\147\x2f\62\x30\60\x30\x2f\x30\71\x2f\x78\x6d\154\x64\163\151\147\x23\42\76\xa\x20\x20\x3c\x53\x69\x67\x6e\x65\x64\x49\x6e\146\157\76\xa\40\x20\x20\40\74\x53\x69\x67\156\141\164\165\x72\145\115\145\164\150\x6f\x64\40\x2f\76\12\x20\40\74\x2f\123\151\147\x6e\145\144\x49\x6e\146\157\76\xa\x3c\x2f\123\151\147\156\141\x74\165\162\x65\x3e";
    public $sigNode = null;
    public $idKeys = array();
    public $idNS = array();
    private $signedInfo = null;
    private $xPathCtx = null;
    private $canonicalMethod = null;
    private $prefix = '';
    private $searchpfx = "\x73\x65\143\144\x73\x69\x67";
    private $validatedNodes = null;
    public function __construct($w9 = "\144\x73")
    {
        $sx = self::BASE_TEMPLATE;
        if (empty($w9)) {
            goto Q0;
        }
        $this->prefix = $w9 . "\72";
        $jF = array("\74\x53", "\x3c\57\123", "\170\155\154\156\x73\x3d");
        $gO = array("\74{$w9}\72\123", "\74\x2f{$w9}\x3a\123", "\170\155\x6c\x6e\x73\72{$w9}\x3d");
        $sx = str_replace($jF, $gO, $sx);
        Q0:
        $Ol = new DOMDocument();
        $Ol->loadXML($sx);
        $this->sigNode = $Ol->documentElement;
    }
    private function resetXPathObj()
    {
        $this->xPathCtx = null;
    }
    private function getXPathObj()
    {
        if (!(empty($this->xPathCtx) && !empty($this->sigNode))) {
            goto EK;
        }
        $Lt = new DOMXPath($this->sigNode->ownerDocument);
        $Lt->registerNamespace("\163\x65\x63\x64\163\x69\147", self::XMLDSIGNS);
        $this->xPathCtx = $Lt;
        EK:
        return $this->xPathCtx;
    }
    public static function generateGUID($w9 = "\160\146\170")
    {
        $Tf = md5(uniqid(mt_rand(), true));
        $D0 = $w9 . substr($Tf, 0, 8) . "\x2d" . substr($Tf, 8, 4) . "\55" . substr($Tf, 12, 4) . "\55" . substr($Tf, 16, 4) . "\55" . substr($Tf, 20, 12);
        return $D0;
    }
    public static function generate_GUID($w9 = "\160\x66\x78")
    {
        return self::generateGUID($w9);
    }
    public function locateSignature($Dx, $ci = 0)
    {
        if ($Dx instanceof DOMDocument) {
            goto sm;
        }
        $ik = $Dx->ownerDocument;
        goto hb;
        sm:
        $ik = $Dx;
        hb:
        if (!$ik) {
            goto FZ;
        }
        $Lt = new DOMXPath($ik);
        $Lt->registerNamespace("\163\x65\143\144\163\151\x67", self::XMLDSIGNS);
        $Ws = "\x2e\x2f\57\x73\x65\143\144\x73\x69\147\72\x53\x69\x67\x6e\x61\x74\165\162\x65";
        $e_ = $Lt->query($Ws, $Dx);
        $this->sigNode = $e_->item($ci);
        $Ws = "\56\57\x73\x65\143\144\x73\151\147\x3a\x53\x69\x67\156\145\144\111\x6e\x66\157";
        $e_ = $Lt->query($Ws, $this->sigNode);
        if (!($e_->length > 1)) {
            goto ZE;
        }
        throw new Exception("\x49\156\166\141\x6c\x69\144\40\163\x74\162\x75\x63\x74\x75\x72\145\x20\55\40\x54\157\157\40\x6d\x61\x6e\171\x20\x53\x69\147\x6e\x65\144\111\156\x66\x6f\x20\145\x6c\145\155\145\156\x74\x73\40\x66\x6f\x75\156\x64");
        ZE:
        return $this->sigNode;
        FZ:
        return null;
    }
    public function createNewSignNode($YB, $cK = null)
    {
        $ik = $this->sigNode->ownerDocument;
        if (!is_null($cK)) {
            goto rI;
        }
        $Kp = $ik->createElementNS(self::XMLDSIGNS, $this->prefix . $YB);
        goto am;
        rI:
        $Kp = $ik->createElementNS(self::XMLDSIGNS, $this->prefix . $YB, $cK);
        am:
        return $Kp;
    }
    public function setCanonicalMethod($u0)
    {
        switch ($u0) {
            case "\150\x74\164\160\x3a\57\57\167\x77\x77\x2e\x77\63\56\157\162\x67\x2f\124\x52\57\62\x30\60\61\57\122\x45\x43\x2d\170\x6d\154\55\143\61\x34\156\55\x32\x30\x30\x31\x30\x33\x31\65":
            case "\150\164\164\x70\72\x2f\57\x77\167\167\x2e\x77\63\56\x6f\162\x67\57\x54\122\x2f\x32\x30\x30\x31\57\122\105\103\x2d\170\x6d\154\55\x63\x31\64\x6e\55\x32\x30\60\61\60\63\61\x35\43\127\x69\164\x68\103\157\155\155\145\156\x74\163":
            case "\x68\x74\164\160\72\57\x2f\167\x77\x77\x2e\167\63\56\157\162\x67\x2f\62\60\x30\61\57\61\60\57\x78\x6d\154\55\145\170\x63\55\x63\61\x34\156\x23":
            case "\150\x74\164\160\72\57\x2f\x77\x77\x77\56\x77\x33\56\157\162\147\x2f\62\x30\x30\x31\x2f\x31\x30\x2f\x78\x6d\x6c\x2d\145\170\143\x2d\143\61\x34\x6e\43\x57\x69\x74\150\x43\x6f\x6d\155\145\156\x74\x73":
                $this->canonicalMethod = $u0;
                goto xQ;
            default:
                throw new Exception("\x49\156\166\141\x6c\x69\x64\40\x43\141\156\x6f\156\x69\x63\141\154\40\115\145\164\150\x6f\144");
        }
        Bw:
        xQ:
        if (!($Lt = $this->getXPathObj())) {
            goto Bx;
        }
        $Ws = "\x2e\57" . $this->searchpfx . "\x3a\x53\x69\147\156\x65\x64\111\x6e\x66\x6f";
        $e_ = $Lt->query($Ws, $this->sigNode);
        if (!($eY = $e_->item(0))) {
            goto td;
        }
        $Ws = "\56\x2f" . $this->searchpfx . "\x43\x61\x6e\x6f\x6e\151\x63\141\x6c\x69\172\141\164\151\157\156\115\145\x74\150\157\144";
        $e_ = $Lt->query($Ws, $eY);
        if ($Xk = $e_->item(0)) {
            goto Lt;
        }
        $Xk = $this->createNewSignNode("\103\141\x6e\157\x6e\x69\143\x61\x6c\x69\x7a\141\x74\151\157\x6e\x4d\145\x74\x68\157\x64");
        $eY->insertBefore($Xk, $eY->firstChild);
        Lt:
        $Xk->setAttribute("\x41\x6c\147\157\x72\x69\164\150\155", $this->canonicalMethod);
        td:
        Bx:
    }
    private function canonicalizeData($Kp, $sM, $VX = null, $Xd = null)
    {
        $L4 = false;
        $n9 = false;
        switch ($sM) {
            case "\x68\x74\x74\x70\72\x2f\57\167\167\x77\x2e\x77\63\x2e\157\x72\x67\x2f\124\x52\x2f\62\x30\60\x31\x2f\x52\105\x43\x2d\x78\155\x6c\x2d\x63\61\64\x6e\x2d\62\x30\x30\x31\x30\x33\61\x35":
                $L4 = false;
                $n9 = false;
                goto yk;
            case "\x68\x74\x74\160\x3a\57\x2f\167\x77\x77\56\x77\63\56\x6f\x72\147\57\x54\122\x2f\62\x30\x30\61\57\122\x45\103\55\170\155\x6c\55\x63\x31\64\156\55\x32\60\60\x31\x30\63\61\65\x23\x57\x69\164\150\103\157\x6d\155\x65\156\164\163":
                $n9 = true;
                goto yk;
            case "\150\x74\164\x70\x3a\x2f\x2f\x77\x77\x77\x2e\x77\63\x2e\x6f\162\x67\x2f\62\x30\x30\x31\57\61\60\57\170\x6d\x6c\55\145\x78\143\55\x63\x31\64\x6e\x23":
                $L4 = true;
                goto yk;
            case "\150\164\x74\160\72\57\x2f\167\x77\x77\x2e\167\x33\56\x6f\x72\x67\x2f\62\x30\x30\61\57\x31\x30\57\x78\155\x6c\55\x65\x78\143\x2d\143\61\64\x6e\x23\x57\x69\x74\x68\103\157\155\155\x65\x6e\x74\163":
                $L4 = true;
                $n9 = true;
                goto yk;
        }
        AE:
        yk:
        if (!(is_null($VX) && $Kp instanceof DOMNode && $Kp->ownerDocument !== null && $Kp->isSameNode($Kp->ownerDocument->documentElement))) {
            goto oe;
        }
        $SS = $Kp;
        Sl:
        if (!($f2 = $SS->previousSibling)) {
            goto iT;
        }
        if (!($f2->nodeType == XML_PI_NODE || $f2->nodeType == XML_COMMENT_NODE && $n9)) {
            goto sl;
        }
        goto iT;
        sl:
        $SS = $f2;
        goto Sl;
        iT:
        if (!($f2 == null)) {
            goto pz;
        }
        $Kp = $Kp->ownerDocument;
        pz:
        oe:
        return $Kp->C14N($L4, $n9, $VX, $Xd);
    }
    public function canonicalizeSignedInfo()
    {
        $ik = $this->sigNode->ownerDocument;
        $sM = null;
        if (!$ik) {
            goto Md;
        }
        $Lt = $this->getXPathObj();
        $Ws = "\56\x2f\x73\145\x63\x64\163\151\147\72\123\x69\147\156\145\144\x49\156\x66\x6f";
        $e_ = $Lt->query($Ws, $this->sigNode);
        if (!($e_->length > 1)) {
            goto En;
        }
        throw new Exception("\x49\x6e\166\x61\x6c\151\144\x20\163\x74\x72\x75\143\164\165\x72\x65\x20\x2d\40\124\x6f\x6f\40\x6d\141\156\171\x20\123\x69\147\x6e\145\144\x49\156\146\x6f\x20\145\154\x65\155\x65\x6e\164\163\x20\146\157\x75\156\144");
        En:
        if (!($T2 = $e_->item(0))) {
            goto A5;
        }
        $Ws = "\56\57\x73\x65\143\144\163\x69\x67\x3a\x43\141\156\157\156\x69\143\141\154\151\172\x61\x74\151\x6f\x6e\x4d\x65\164\150\157\144";
        $e_ = $Lt->query($Ws, $T2);
        $Xd = null;
        if (!($Xk = $e_->item(0))) {
            goto mC;
        }
        $sM = $Xk->getAttribute("\x41\154\x67\157\x72\151\x74\150\155");
        foreach ($Xk->childNodes as $Kp) {
            if (!($Kp->localName == "\111\x6e\143\x6c\x75\x73\151\x76\x65\116\141\x6d\145\x73\x70\x61\143\x65\x73")) {
                goto e7;
            }
            if (!($l5 = $Kp->getAttribute("\x50\162\145\x66\x69\170\114\x69\x73\164"))) {
                goto Xy;
            }
            $S1 = array_filter(explode("\40", $l5));
            if (!(count($S1) > 0)) {
                goto Zm;
            }
            $Xd = array_merge($Xd ? $Xd : array(), $S1);
            Zm:
            Xy:
            e7:
            aI:
        }
        fh:
        mC:
        $this->signedInfo = $this->canonicalizeData($T2, $sM, null, $Xd);
        return $this->signedInfo;
        A5:
        Md:
        return null;
    }
    public function calculateDigest($yV, $h4, $tS = true)
    {
        switch ($yV) {
            case self::SHA1:
                $ar = "\163\x68\x61\x31";
                goto eY;
            case self::SHA256:
                $ar = "\x73\x68\141\x32\65\x36";
                goto eY;
            case self::SHA384:
                $ar = "\163\150\x61\x33\x38\x34";
                goto eY;
            case self::SHA512:
                $ar = "\x73\150\141\65\61\x32";
                goto eY;
            case self::RIPEMD160:
                $ar = "\x72\x69\x70\145\x6d\x64\61\x36\x30";
                goto eY;
            default:
                throw new Exception("\103\141\x6e\x6e\157\164\40\x76\x61\154\x69\x64\x61\x74\145\x20\144\151\147\x65\163\164\72\40\x55\156\x73\x75\160\160\x6f\162\164\145\144\40\x41\x6c\147\x6f\162\x69\x74\150\x6d\x20\74{$yV}\x3e");
        }
        vD:
        eY:
        $Rf = hash($ar, $h4, true);
        if (!$tS) {
            goto Ib;
        }
        $Rf = base64_encode($Rf);
        Ib:
        return $Rf;
    }
    public function validateDigest($q9, $h4)
    {
        $Lt = new DOMXPath($q9->ownerDocument);
        $Lt->registerNamespace("\x73\x65\x63\x64\x73\x69\147", self::XMLDSIGNS);
        $Ws = "\163\x74\162\x69\x6e\147\50\56\x2f\x73\x65\x63\x64\x73\x69\x67\72\104\x69\x67\145\163\x74\x4d\x65\164\150\x6f\x64\57\100\101\x6c\x67\x6f\162\x69\164\150\x6d\51";
        $yV = $Lt->evaluate($Ws, $q9);
        $qI = $this->calculateDigest($yV, $h4, false);
        $Ws = "\x73\164\162\x69\x6e\147\x28\56\x2f\163\145\x63\144\x73\x69\x67\72\104\151\147\145\163\164\x56\141\154\165\145\x29";
        $Nu = $Lt->evaluate($Ws, $q9);
        return $qI === base64_decode($Nu);
    }
    public function processTransforms($q9, $OG, $ut = true)
    {
        $h4 = $OG;
        $Lt = new DOMXPath($q9->ownerDocument);
        $Lt->registerNamespace("\x73\145\143\x64\x73\151\147", self::XMLDSIGNS);
        $Ws = "\x2e\x2f\x73\x65\x63\x64\163\x69\147\72\x54\x72\x61\x6e\x73\146\157\162\x6d\163\x2f\163\x65\143\x64\x73\151\x67\72\124\x72\141\156\x73\x66\157\x72\x6d";
        $Ae = $Lt->query($Ws, $q9);
        $vd = "\150\x74\x74\160\72\x2f\x2f\x77\x77\167\x2e\x77\x33\56\x6f\162\147\57\124\x52\x2f\x32\x30\x30\61\x2f\x52\x45\x43\55\170\x6d\x6c\x2d\143\61\x34\x6e\x2d\62\x30\x30\61\x30\63\61\x35";
        $VX = null;
        $Xd = null;
        foreach ($Ae as $rB) {
            $by = $rB->getAttribute("\x41\154\x67\x6f\x72\151\x74\x68\155");
            switch ($by) {
                case "\x68\x74\164\160\x3a\x2f\57\x77\167\x77\56\x77\63\x2e\x6f\x72\x67\x2f\62\60\60\61\57\61\60\57\170\155\x6c\x2d\145\170\143\x2d\143\x31\x34\x6e\43":
                case "\150\164\164\x70\x3a\x2f\57\167\167\x77\56\x77\x33\56\x6f\x72\147\x2f\x32\60\60\61\57\x31\x30\57\x78\x6d\154\55\145\170\143\55\143\61\x34\x6e\43\127\151\x74\150\x43\x6f\x6d\155\x65\156\164\x73":
                    if (!$ut) {
                        goto zf;
                    }
                    $vd = $by;
                    goto yp;
                    zf:
                    $vd = "\150\164\164\160\x3a\57\x2f\167\x77\x77\x2e\167\x33\56\157\x72\147\57\62\x30\x30\x31\x2f\61\60\57\170\x6d\154\55\x65\x78\x63\x2d\143\61\x34\x6e\43";
                    yp:
                    $Kp = $rB->firstChild;
                    YE:
                    if (!$Kp) {
                        goto dQ;
                    }
                    if (!($Kp->localName == "\111\156\143\x6c\x75\163\x69\x76\145\116\x61\x6d\145\x73\160\x61\143\145\x73")) {
                        goto Qi;
                    }
                    if (!($l5 = $Kp->getAttribute("\x50\162\x65\146\151\170\x4c\x69\163\164"))) {
                        goto NB;
                    }
                    $S1 = array();
                    $wK = explode("\40", $l5);
                    foreach ($wK as $l5) {
                        $nw = trim($l5);
                        if (empty($nw)) {
                            goto DY;
                        }
                        $S1[] = $nw;
                        DY:
                        GJ:
                    }
                    U9:
                    if (!(count($S1) > 0)) {
                        goto Rn;
                    }
                    $Xd = $S1;
                    Rn:
                    NB:
                    goto dQ;
                    Qi:
                    $Kp = $Kp->nextSibling;
                    goto YE;
                    dQ:
                    goto o_;
                case "\150\x74\164\160\x3a\57\x2f\x77\167\167\x2e\167\x33\x2e\x6f\162\x67\x2f\124\122\57\62\60\60\x31\57\122\x45\x43\55\x78\155\154\55\143\61\64\156\x2d\62\x30\60\61\x30\63\x31\65":
                case "\x68\164\x74\160\72\x2f\57\167\167\167\56\x77\x33\x2e\x6f\x72\147\57\124\122\x2f\62\60\x30\61\x2f\122\105\103\x2d\170\155\x6c\55\143\61\64\x6e\55\x32\60\x30\x31\x30\63\61\65\43\x57\151\164\150\103\x6f\155\x6d\x65\156\x74\163":
                    if (!$ut) {
                        goto D7;
                    }
                    $vd = $by;
                    goto l_;
                    D7:
                    $vd = "\x68\x74\x74\x70\x3a\x2f\57\x77\167\167\x2e\167\63\x2e\x6f\x72\x67\x2f\124\x52\x2f\62\x30\60\61\x2f\122\x45\103\55\170\x6d\x6c\55\143\x31\64\156\55\x32\60\60\61\60\63\61\x35";
                    l_:
                    goto o_;
                case "\x68\x74\164\160\72\x2f\57\x77\167\167\56\x77\x33\x2e\x6f\162\147\x2f\124\x52\57\61\x39\x39\x39\x2f\x52\105\x43\55\170\x70\141\x74\x68\55\61\71\71\x39\61\x31\61\x36":
                    $Kp = $rB->firstChild;
                    v4:
                    if (!$Kp) {
                        goto hj;
                    }
                    if (!($Kp->localName == "\130\x50\x61\x74\x68")) {
                        goto EG;
                    }
                    $VX = array();
                    $VX["\161\x75\x65\162\x79"] = "\x28\56\57\x2f\x2e\x20\174\x20\56\57\57\x40\x2a\x20\x7c\40\x2e\x2f\x2f\156\x61\x6d\145\x73\x70\141\x63\145\x3a\72\52\x29\133" . $Kp->nodeValue . "\135";
                    $VX["\156\x61\155\145\163\160\141\143\145\163"] = array();
                    $ix = $Lt->query("\x2e\57\156\141\155\145\x73\x70\141\143\145\72\x3a\52", $Kp);
                    foreach ($ix as $rV) {
                        if (!($rV->localName != "\x78\x6d\x6c")) {
                            goto on;
                        }
                        $VX["\x6e\x61\x6d\x65\x73\x70\x61\143\145\163"][$rV->localName] = $rV->nodeValue;
                        on:
                        Cv:
                    }
                    wk:
                    goto hj;
                    EG:
                    $Kp = $Kp->nextSibling;
                    goto v4;
                    hj:
                    goto o_;
            }
            sf:
            o_:
            V6:
        }
        Wo:
        if (!$h4 instanceof DOMNode) {
            goto xv;
        }
        $h4 = $this->canonicalizeData($OG, $vd, $VX, $Xd);
        xv:
        return $h4;
    }
    public function processRefNode($q9)
    {
        $fk = null;
        $ut = true;
        if ($Ux = $q9->getAttribute("\125\x52\111")) {
            goto oJ;
        }
        $ut = false;
        $fk = $q9->ownerDocument;
        goto bT;
        oJ:
        $Yj = parse_url($Ux);
        if (!empty($Yj["\160\141\164\150"])) {
            goto eW;
        }
        if ($CL = $Yj["\x66\x72\x61\x67\155\x65\156\x74"]) {
            goto gE;
        }
        $fk = $q9->ownerDocument;
        goto xp;
        gE:
        $ut = false;
        $c_ = new DOMXPath($q9->ownerDocument);
        if (!($this->idNS && is_array($this->idNS))) {
            goto MY;
        }
        foreach ($this->idNS as $qP => $rU) {
            $c_->registerNamespace($qP, $rU);
            Xt:
        }
        zx:
        MY:
        $wG = "\x40\x49\144\75\42" . XPath::filterAttrValue($CL, XPath::DOUBLE_QUOTE) . "\42";
        if (!is_array($this->idKeys)) {
            goto vV;
        }
        foreach ($this->idKeys as $rx) {
            $wG .= "\x20\x6f\x72\x20\100" . XPath::filterAttrName($rx) . "\75\42" . XPath::filterAttrValue($CL, XPath::DOUBLE_QUOTE) . "\42";
            RF:
        }
        dZ:
        vV:
        $Ws = "\57\x2f\52\133" . $wG . "\x5d";
        $fk = $c_->query($Ws)->item(0);
        xp:
        eW:
        bT:
        $h4 = $this->processTransforms($q9, $fk, $ut);
        if ($this->validateDigest($q9, $h4)) {
            goto Wx;
        }
        return false;
        Wx:
        if (!$fk instanceof DOMNode) {
            goto vf;
        }
        if (!empty($CL)) {
            goto CH;
        }
        $this->validatedNodes[] = $fk;
        goto Ap;
        CH:
        $this->validatedNodes[$CL] = $fk;
        Ap:
        vf:
        return true;
    }
    public function getRefNodeID($q9)
    {
        if (!($Ux = $q9->getAttribute("\x55\x52\x49"))) {
            goto Wc;
        }
        $Yj = parse_url($Ux);
        if (!empty($Yj["\160\x61\164\150"])) {
            goto z7;
        }
        if (!($CL = $Yj["\146\162\x61\x67\x6d\x65\156\164"])) {
            goto s3;
        }
        return $CL;
        s3:
        z7:
        Wc:
        return null;
    }
    public function getRefIDs()
    {
        $xE = array();
        $Lt = $this->getXPathObj();
        $Ws = "\x2e\57\163\145\x63\x64\x73\151\x67\72\x53\x69\x67\156\145\x64\111\156\x66\157\133\61\x5d\x2f\x73\x65\143\144\163\x69\147\x3a\x52\145\146\145\162\x65\x6e\x63\145";
        $e_ = $Lt->query($Ws, $this->sigNode);
        if (!($e_->length == 0)) {
            goto Iu;
        }
        throw new Exception("\x52\x65\146\x65\x72\145\156\x63\145\x20\156\157\x64\x65\163\x20\156\157\x74\x20\x66\x6f\165\x6e\144");
        Iu:
        foreach ($e_ as $q9) {
            $xE[] = $this->getRefNodeID($q9);
            NW:
        }
        O4:
        return $xE;
    }
    public function validateReference()
    {
        $EU = $this->sigNode->ownerDocument->documentElement;
        if ($EU->isSameNode($this->sigNode)) {
            goto WI;
        }
        if (!($this->sigNode->parentNode != null)) {
            goto Pm;
        }
        $this->sigNode->parentNode->removeChild($this->sigNode);
        Pm:
        WI:
        $Lt = $this->getXPathObj();
        $Ws = "\56\57\x73\145\x63\144\x73\151\147\72\x53\151\147\x6e\145\144\x49\156\146\x6f\x5b\61\135\57\x73\x65\x63\x64\163\151\147\x3a\122\145\x66\x65\x72\x65\x6e\143\145";
        $e_ = $Lt->query($Ws, $this->sigNode);
        if (!($e_->length == 0)) {
            goto WU;
        }
        throw new Exception("\x52\145\146\145\162\x65\156\143\x65\40\x6e\x6f\144\145\x73\x20\156\x6f\164\40\146\157\x75\156\144");
        WU:
        $this->validatedNodes = array();
        foreach ($e_ as $q9) {
            if ($this->processRefNode($q9)) {
                goto Yz;
            }
            $this->validatedNodes = null;
            throw new Exception("\x52\145\x66\x65\162\145\156\143\145\x20\166\x61\154\151\x64\x61\x74\x69\157\156\x20\146\141\151\x6c\145\x64");
            Yz:
            LL:
        }
        Mi:
        return true;
    }
    private function addRefInternal($S7, $Kp, $by, $F9 = null, $gW = null)
    {
        $w9 = null;
        $Sh = null;
        $zo = "\x49\144";
        $cA = true;
        $Du = false;
        if (!is_array($gW)) {
            goto a3;
        }
        $w9 = empty($gW["\160\162\x65\146\x69\x78"]) ? null : $gW["\160\162\145\x66\x69\170"];
        $Sh = empty($gW["\160\162\x65\x66\x69\x78\137\x6e\163"]) ? null : $gW["\x70\162\145\x66\x69\170\x5f\156\x73"];
        $zo = empty($gW["\x69\x64\x5f\x6e\141\x6d\145"]) ? "\111\x64" : $gW["\x69\x64\137\156\x61\155\x65"];
        $cA = empty($gW["\157\166\x65\x72\167\x72\x69\164\145"]) ? true : (bool) $gW["\157\166\x65\x72\167\162\x69\x74\145"];
        $Du = empty($gW["\146\x6f\162\143\145\137\165\x72\151"]) ? false : (bool) $gW["\x66\x6f\162\x63\145\x5f\x75\162\x69"];
        a3:
        $hY = $zo;
        if (empty($w9)) {
            goto db;
        }
        $hY = $w9 . "\72" . $hY;
        db:
        $q9 = $this->createNewSignNode("\122\x65\146\x65\x72\x65\x6e\x63\x65");
        $S7->appendChild($q9);
        if (!$Kp instanceof DOMDocument) {
            goto l6;
        }
        if ($Du) {
            goto iQ;
        }
        goto kx;
        l6:
        $Ux = null;
        if ($cA) {
            goto sH;
        }
        $Ux = $Sh ? $Kp->getAttributeNS($Sh, $zo) : $Kp->getAttribute($zo);
        sH:
        if (!empty($Ux)) {
            goto Lw;
        }
        $Ux = self::generateGUID();
        $Kp->setAttributeNS($Sh, $hY, $Ux);
        Lw:
        $q9->setAttribute("\x55\x52\111", "\x23" . $Ux);
        goto kx;
        iQ:
        $q9->setAttribute("\x55\122\x49", '');
        kx:
        $YT = $this->createNewSignNode("\x54\162\x61\156\163\x66\x6f\x72\155\x73");
        $q9->appendChild($YT);
        if (is_array($F9)) {
            goto u1;
        }
        if (!empty($this->canonicalMethod)) {
            goto OG;
        }
        goto f3;
        u1:
        foreach ($F9 as $rB) {
            $gp = $this->createNewSignNode("\124\162\x61\x6e\163\146\x6f\162\155");
            $YT->appendChild($gp);
            if (is_array($rB) && !empty($rB["\150\x74\164\160\x3a\57\57\167\x77\x77\56\x77\x33\x2e\157\x72\x67\x2f\x54\x52\57\x31\71\71\71\x2f\x52\105\x43\x2d\170\x70\x61\x74\150\55\61\x39\x39\71\x31\61\x31\x36"]) && !empty($rB["\x68\164\x74\x70\x3a\57\x2f\x77\x77\167\x2e\167\x33\x2e\x6f\162\147\x2f\x54\x52\x2f\61\x39\71\71\57\x52\105\x43\55\170\x70\x61\x74\x68\x2d\61\x39\x39\71\61\61\x31\x36"]["\161\165\x65\162\171"])) {
                goto XZ;
            }
            $gp->setAttribute("\x41\x6c\147\157\162\151\164\150\155", $rB);
            goto w1;
            XZ:
            $gp->setAttribute("\101\154\147\x6f\162\x69\164\150\155", "\150\x74\164\x70\x3a\x2f\x2f\167\x77\167\56\167\x33\56\x6f\x72\x67\57\124\x52\x2f\61\71\71\71\57\122\105\103\55\x78\x70\x61\164\x68\x2d\x31\x39\x39\71\x31\x31\x31\x36");
            $mh = $this->createNewSignNode("\130\x50\x61\x74\x68", $rB["\150\x74\164\x70\72\x2f\x2f\x77\167\x77\56\x77\x33\x2e\x6f\x72\x67\x2f\x54\122\x2f\61\71\71\x39\x2f\x52\x45\103\55\170\160\141\x74\150\x2d\x31\71\71\x39\61\61\61\x36"]["\x71\x75\145\x72\x79"]);
            $gp->appendChild($mh);
            if (empty($rB["\x68\164\x74\x70\x3a\57\57\x77\x77\167\x2e\167\x33\x2e\157\162\x67\x2f\x54\x52\x2f\x31\x39\71\x39\x2f\x52\x45\103\x2d\x78\x70\x61\164\150\x2d\x31\71\71\x39\61\x31\x31\x36"]["\156\x61\155\x65\x73\160\141\143\x65\x73"])) {
                goto GZ;
            }
            foreach ($rB["\150\164\164\160\x3a\x2f\57\167\x77\x77\x2e\167\x33\56\157\162\147\57\124\x52\x2f\x31\71\x39\71\x2f\122\105\x43\x2d\x78\x70\141\x74\x68\x2d\x31\71\x39\x39\61\x31\61\66"]["\x6e\141\x6d\145\x73\x70\x61\x63\145\163"] as $w9 => $kO) {
                $mh->setAttributeNS("\150\x74\x74\160\x3a\57\x2f\167\167\167\x2e\x77\x33\56\x6f\162\147\57\x32\60\60\x30\57\x78\x6d\x6c\156\163\57", "\x78\x6d\x6c\156\x73\x3a{$w9}", $kO);
                Vz:
            }
            SZ:
            GZ:
            w1:
            mO:
        }
        tc:
        goto f3;
        OG:
        $gp = $this->createNewSignNode("\x54\x72\x61\156\163\146\157\x72\x6d");
        $YT->appendChild($gp);
        $gp->setAttribute("\101\154\x67\x6f\x72\x69\164\x68\155", $this->canonicalMethod);
        f3:
        $Vx = $this->processTransforms($q9, $Kp);
        $qI = $this->calculateDigest($by, $Vx);
        $Fr = $this->createNewSignNode("\x44\x69\x67\145\x73\x74\115\145\x74\x68\157\x64");
        $q9->appendChild($Fr);
        $Fr->setAttribute("\x41\154\x67\x6f\162\x69\x74\150\x6d", $by);
        $Nu = $this->createNewSignNode("\x44\151\x67\145\163\x74\x56\x61\x6c\165\145", $qI);
        $q9->appendChild($Nu);
    }
    public function addReference($Kp, $by, $F9 = null, $gW = null)
    {
        if (!($Lt = $this->getXPathObj())) {
            goto Mt;
        }
        $Ws = "\x2e\57\x73\x65\143\144\x73\151\147\72\123\x69\147\156\x65\144\x49\x6e\146\157";
        $e_ = $Lt->query($Ws, $this->sigNode);
        if (!($Mq = $e_->item(0))) {
            goto y3;
        }
        $this->addRefInternal($Mq, $Kp, $by, $F9, $gW);
        y3:
        Mt:
    }
    public function addReferenceList($qF, $by, $F9 = null, $gW = null)
    {
        if (!($Lt = $this->getXPathObj())) {
            goto Su;
        }
        $Ws = "\56\x2f\x73\x65\143\x64\163\x69\147\x3a\x53\x69\x67\156\x65\x64\111\156\x66\157";
        $e_ = $Lt->query($Ws, $this->sigNode);
        if (!($Mq = $e_->item(0))) {
            goto wi;
        }
        foreach ($qF as $Kp) {
            $this->addRefInternal($Mq, $Kp, $by, $F9, $gW);
            Gr:
        }
        EN:
        wi:
        Su:
    }
    public function addObject($h4, $AG = null, $uP = null)
    {
        $iS = $this->createNewSignNode("\117\142\x6a\145\x63\x74");
        $this->sigNode->appendChild($iS);
        if (empty($AG)) {
            goto f9;
        }
        $iS->setAttribute("\x4d\151\155\145\x54\x79\x70\x65", $AG);
        f9:
        if (empty($uP)) {
            goto mw;
        }
        $iS->setAttribute("\105\x6e\143\157\x64\151\156\x67", $uP);
        mw:
        if ($h4 instanceof DOMElement) {
            goto rF;
        }
        $YH = $this->sigNode->ownerDocument->createTextNode($h4);
        goto Gd;
        rF:
        $YH = $this->sigNode->ownerDocument->importNode($h4, true);
        Gd:
        $iS->appendChild($YH);
        return $iS;
    }
    public function locateKey($Kp = null)
    {
        if (!empty($Kp)) {
            goto ho;
        }
        $Kp = $this->sigNode;
        ho:
        if ($Kp instanceof DOMNode) {
            goto Ms;
        }
        return null;
        Ms:
        if (!($ik = $Kp->ownerDocument)) {
            goto NE;
        }
        $Lt = new DOMXPath($ik);
        $Lt->registerNamespace("\163\x65\143\144\163\151\x67", self::XMLDSIGNS);
        $Ws = "\x73\x74\162\151\x6e\147\x28\x2e\57\163\145\x63\x64\x73\x69\x67\x3a\x53\x69\x67\x6e\x65\x64\111\156\x66\157\x2f\163\145\x63\144\x73\151\x67\x3a\123\151\x67\x6e\x61\x74\165\162\x65\115\x65\x74\150\157\x64\57\x40\101\154\147\x6f\162\151\x74\150\x6d\x29";
        $by = $Lt->evaluate($Ws, $Kp);
        if (!$by) {
            goto r4;
        }
        try {
            $Mj = new XMLSecurityKey($by, array("\x74\x79\x70\145" => "\160\165\142\x6c\151\143"));
        } catch (Exception $qc) {
            return null;
        }
        return $Mj;
        r4:
        NE:
        return null;
    }
    public function verify($Mj)
    {
        $ik = $this->sigNode->ownerDocument;
        $Lt = new DOMXPath($ik);
        $Lt->registerNamespace("\x73\145\143\x64\x73\x69\147", self::XMLDSIGNS);
        $Ws = "\163\x74\162\151\x6e\147\x28\x2e\x2f\x73\x65\143\144\163\x69\147\x3a\123\151\147\x6e\141\164\x75\162\145\126\x61\x6c\165\x65\x29";
        $xC = $Lt->evaluate($Ws, $this->sigNode);
        if (!empty($xC)) {
            goto cs;
        }
        throw new Exception("\125\x6e\141\x62\x6c\x65\x20\x74\x6f\40\154\x6f\x63\x61\164\x65\40\123\x69\x67\x6e\x61\164\165\x72\145\126\x61\x6c\x75\145");
        cs:
        return $Mj->verifySignature($this->signedInfo, base64_decode($xC));
    }
    public function signData($Mj, $h4)
    {
        return $Mj->signData($h4);
    }
    public function sign($Mj, $av = null)
    {
        if (!($av != null)) {
            goto UV;
        }
        $this->resetXPathObj();
        $this->appendSignature($av);
        $this->sigNode = $av->lastChild;
        UV:
        if (!($Lt = $this->getXPathObj())) {
            goto P0;
        }
        $Ws = "\x2e\x2f\x73\145\x63\144\x73\x69\147\x3a\x53\x69\x67\x6e\x65\144\111\156\146\x6f";
        $e_ = $Lt->query($Ws, $this->sigNode);
        if (!($Mq = $e_->item(0))) {
            goto hV;
        }
        $Ws = "\56\57\163\145\x63\x64\x73\151\x67\72\x53\x69\147\156\141\164\x75\x72\x65\115\145\164\x68\x6f\144";
        $e_ = $Lt->query($Ws, $Mq);
        $qr = $e_->item(0);
        $qr->setAttribute("\x41\x6c\147\x6f\x72\151\164\150\155", $Mj->type);
        $h4 = $this->canonicalizeData($Mq, $this->canonicalMethod);
        $xC = base64_encode($this->signData($Mj, $h4));
        $Pi = $this->createNewSignNode("\x53\x69\x67\x6e\x61\164\x75\162\x65\x56\x61\x6c\x75\145", $xC);
        if ($cF = $Mq->nextSibling) {
            goto Oh;
        }
        $this->sigNode->appendChild($Pi);
        goto nH;
        Oh:
        $cF->parentNode->insertBefore($Pi, $cF);
        nH:
        hV:
        P0:
    }
    public function appendCert()
    {
    }
    public function appendKey($Mj, $Lb = null)
    {
        $Mj->serializeKey($Lb);
    }
    public function insertSignature($Kp, $Eo = null)
    {
        $HL = $Kp->ownerDocument;
        $QF = $HL->importNode($this->sigNode, true);
        if ($Eo == null) {
            goto z5;
        }
        return $Kp->insertBefore($QF, $Eo);
        goto ey;
        z5:
        return $Kp->insertBefore($QF);
        ey:
    }
    public function appendSignature($nm, $Wh = false)
    {
        $Eo = $Wh ? $nm->firstChild : null;
        return $this->insertSignature($nm, $Eo);
    }
    public static function get509XCert($zM, $wW = true)
    {
        $zm = self::staticGet509XCerts($zM, $wW);
        if (empty($zm)) {
            goto sw;
        }
        return $zm[0];
        sw:
        return '';
    }
    public static function staticGet509XCerts($zm, $wW = true)
    {
        if ($wW) {
            goto tR;
        }
        return array($zm);
        goto uL;
        tR:
        $h4 = '';
        $NL = array();
        $PF = explode("\xa", $zm);
        $hG = false;
        foreach ($PF as $sc) {
            if (!$hG) {
                goto CP;
            }
            if (!(strncmp($sc, "\55\55\55\55\55\x45\116\104\40\103\x45\x52\124\111\106\x49\103\101\x54\105", 20) == 0)) {
                goto YP;
            }
            $hG = false;
            $NL[] = $h4;
            $h4 = '';
            goto LH;
            YP:
            $h4 .= trim($sc);
            goto Ug;
            CP:
            if (!(strncmp($sc, "\x2d\55\x2d\55\55\x42\x45\x47\x49\x4e\x20\x43\105\x52\x54\111\106\x49\x43\x41\x54\105", 22) == 0)) {
                goto SY;
            }
            $hG = true;
            SY:
            Ug:
            LH:
        }
        oL:
        return $NL;
        uL:
    }
    public static function staticAdd509Cert($jP, $zM, $wW = true, $o3 = false, $Lt = null, $gW = null)
    {
        if (!$o3) {
            goto kd;
        }
        $zM = file_get_contents($zM);
        kd:
        if ($jP instanceof DOMElement) {
            goto rs;
        }
        throw new Exception("\111\x6e\x76\x61\154\x69\x64\x20\x70\141\x72\x65\156\x74\40\x4e\157\x64\x65\40\x70\141\x72\x61\x6d\145\164\145\x72");
        rs:
        $XU = $jP->ownerDocument;
        if (!empty($Lt)) {
            goto zS;
        }
        $Lt = new DOMXPath($jP->ownerDocument);
        $Lt->registerNamespace("\x73\145\x63\x64\x73\x69\x67", self::XMLDSIGNS);
        zS:
        $Ws = "\56\x2f\163\145\143\144\x73\x69\147\72\113\145\x79\111\156\146\157";
        $e_ = $Lt->query($Ws, $jP);
        $I1 = $e_->item(0);
        $aJ = '';
        if (!$I1) {
            goto Sj;
        }
        $l5 = $I1->lookupPrefix(self::XMLDSIGNS);
        if (empty($l5)) {
            goto eR;
        }
        $aJ = $l5 . "\72";
        eR:
        goto wZ;
        Sj:
        $l5 = $jP->lookupPrefix(self::XMLDSIGNS);
        if (empty($l5)) {
            goto Kp;
        }
        $aJ = $l5 . "\x3a";
        Kp:
        $bQ = false;
        $I1 = $XU->createElementNS(self::XMLDSIGNS, $aJ . "\113\x65\x79\x49\156\146\x6f");
        $Ws = "\x2e\x2f\163\145\x63\x64\x73\151\x67\72\x4f\142\152\145\x63\164";
        $e_ = $Lt->query($Ws, $jP);
        if (!($fx = $e_->item(0))) {
            goto ZF;
        }
        $fx->parentNode->insertBefore($I1, $fx);
        $bQ = true;
        ZF:
        if ($bQ) {
            goto aH;
        }
        $jP->appendChild($I1);
        aH:
        wZ:
        $zm = self::staticGet509XCerts($zM, $wW);
        $hA = $XU->createElementNS(self::XMLDSIGNS, $aJ . "\x58\65\x30\x39\x44\141\164\x61");
        $I1->appendChild($hA);
        $Em = false;
        $Om = false;
        if (!is_array($gW)) {
            goto FD;
        }
        if (empty($gW["\x69\163\x73\x75\x65\x72\x53\145\x72\x69\141\154"])) {
            goto ZS;
        }
        $Em = true;
        ZS:
        if (empty($gW["\x73\x75\142\x6a\x65\x63\x74\116\x61\x6d\x65"])) {
            goto df;
        }
        $Om = true;
        df:
        FD:
        foreach ($zm as $EV) {
            if (!($Em || $Om)) {
                goto oA;
            }
            if (!($UN = openssl_x509_parse("\x2d\x2d\x2d\55\55\x42\x45\x47\x49\x4e\40\x43\105\122\x54\111\106\111\x43\x41\124\x45\x2d\55\x2d\x2d\x2d\xa" . chunk_split($EV, 64, "\12") . "\55\x2d\x2d\x2d\x2d\x45\x4e\x44\40\103\105\x52\x54\x49\106\111\x43\101\x54\x45\x2d\55\x2d\55\x2d\12"))) {
                goto no;
            }
            if (!($Om && !empty($UN["\x73\165\142\152\x65\x63\x74"]))) {
                goto Wr;
            }
            if (is_array($UN["\x73\165\x62\152\x65\x63\x74"])) {
                goto Li;
            }
            $Oy = $UN["\x69\163\x73\165\145\x72"];
            goto kQ;
            Li:
            $El = array();
            foreach ($UN["\x73\165\142\152\x65\x63\164"] as $WO => $cK) {
                if (is_array($cK)) {
                    goto J2;
                }
                array_unshift($El, "{$WO}\x3d{$cK}");
                goto Pe;
                J2:
                foreach ($cK as $Zb) {
                    array_unshift($El, "{$WO}\x3d{$Zb}");
                    dj:
                }
                tB:
                Pe:
                UA:
            }
            GQ:
            $Oy = implode("\x2c", $El);
            kQ:
            $W2 = $XU->createElementNS(self::XMLDSIGNS, $aJ . "\x58\65\60\x39\x53\x75\142\152\x65\143\x74\x4e\141\155\145", $Oy);
            $hA->appendChild($W2);
            Wr:
            if (!($Em && !empty($UN["\x69\163\163\x75\145\162"]) && !empty($UN["\x73\145\x72\x69\x61\x6c\116\165\155\x62\x65\x72"]))) {
                goto KQ;
            }
            if (is_array($UN["\151\x73\x73\165\x65\162"])) {
                goto XA;
            }
            $rr = $UN["\x69\x73\x73\x75\x65\x72"];
            goto sB;
            XA:
            $El = array();
            foreach ($UN["\x69\x73\x73\165\145\x72"] as $WO => $cK) {
                array_unshift($El, "{$WO}\75{$cK}");
                fc:
            }
            a1:
            $rr = implode("\x2c", $El);
            sB:
            $KL = $XU->createElementNS(self::XMLDSIGNS, $aJ . "\130\x35\60\x39\x49\163\x73\165\x65\162\123\145\x72\x69\x61\x6c");
            $hA->appendChild($KL);
            $oO = $XU->createElementNS(self::XMLDSIGNS, $aJ . "\130\x35\x30\x39\111\x73\163\165\x65\162\x4e\x61\x6d\145", $rr);
            $KL->appendChild($oO);
            $oO = $XU->createElementNS(self::XMLDSIGNS, $aJ . "\130\x35\x30\x39\x53\x65\162\x69\x61\x6c\116\x75\155\142\145\162", $UN["\163\145\x72\151\141\154\116\x75\155\x62\x65\162"]);
            $KL->appendChild($oO);
            KQ:
            no:
            oA:
            $JQ = $XU->createElementNS(self::XMLDSIGNS, $aJ . "\x58\65\60\x39\103\x65\x72\164\151\x66\x69\x63\x61\x74\145", $EV);
            $hA->appendChild($JQ);
            KV:
        }
        cA:
    }
    public function add509Cert($zM, $wW = true, $o3 = false, $gW = null)
    {
        if (!($Lt = $this->getXPathObj())) {
            goto yR;
        }
        self::staticAdd509Cert($this->sigNode, $zM, $wW, $o3, $Lt, $gW);
        yR:
    }
    public function appendToKeyInfo($Kp)
    {
        $jP = $this->sigNode;
        $XU = $jP->ownerDocument;
        $Lt = $this->getXPathObj();
        if (!empty($Lt)) {
            goto N5;
        }
        $Lt = new DOMXPath($jP->ownerDocument);
        $Lt->registerNamespace("\x73\x65\x63\144\163\x69\x67", self::XMLDSIGNS);
        N5:
        $Ws = "\56\x2f\x73\145\143\144\163\151\x67\x3a\113\145\x79\x49\x6e\146\x6f";
        $e_ = $Lt->query($Ws, $jP);
        $I1 = $e_->item(0);
        if ($I1) {
            goto h0;
        }
        $aJ = '';
        $l5 = $jP->lookupPrefix(self::XMLDSIGNS);
        if (empty($l5)) {
            goto uI;
        }
        $aJ = $l5 . "\72";
        uI:
        $bQ = false;
        $I1 = $XU->createElementNS(self::XMLDSIGNS, $aJ . "\113\145\171\x49\x6e\146\x6f");
        $Ws = "\56\57\x73\x65\x63\x64\163\151\x67\x3a\117\x62\152\145\x63\164";
        $e_ = $Lt->query($Ws, $jP);
        if (!($fx = $e_->item(0))) {
            goto dn;
        }
        $fx->parentNode->insertBefore($I1, $fx);
        $bQ = true;
        dn:
        if ($bQ) {
            goto R_;
        }
        $jP->appendChild($I1);
        R_:
        h0:
        $I1->appendChild($Kp);
        return $I1;
    }
    public function getValidatedNodes()
    {
        return $this->validatedNodes;
    }
}
