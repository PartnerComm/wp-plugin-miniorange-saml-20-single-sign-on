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
    const XMLDSIGNS = "\x68\164\x74\160\72\x2f\x2f\167\x77\x77\x2e\167\x33\56\x6f\162\x67\57\x32\x30\60\x30\57\x30\71\x2f\170\155\154\x64\x73\x69\147\x23";
    const SHA1 = "\150\164\x74\160\x3a\57\57\x77\167\167\56\167\x33\x2e\157\x72\x67\x2f\x32\60\x30\x30\57\x30\71\57\x78\155\x6c\x64\163\151\147\43\x73\x68\x61\61";
    const SHA256 = "\x68\x74\x74\x70\72\x2f\x2f\167\167\167\56\167\63\56\157\162\x67\57\x32\x30\x30\61\x2f\60\x34\57\x78\x6d\x6c\x65\x6e\143\x23\x73\150\x61\62\x35\66";
    const SHA384 = "\150\164\x74\x70\72\57\57\x77\x77\167\x2e\167\63\x2e\157\x72\x67\x2f\62\60\x30\x31\x2f\60\64\57\170\155\x6c\x64\x73\151\147\x2d\x6d\x6f\162\145\43\x73\x68\x61\63\x38\64";
    const SHA512 = "\x68\164\164\160\x3a\57\57\167\x77\167\56\167\63\56\157\x72\147\57\62\60\60\61\57\x30\x34\57\x78\x6d\154\145\x6e\143\43\163\150\141\65\x31\62";
    const RIPEMD160 = "\x68\x74\x74\x70\x3a\57\x2f\167\167\x77\56\167\63\56\157\162\x67\57\62\60\x30\x31\x2f\60\64\57\170\x6d\x6c\145\156\x63\43\162\x69\160\145\155\144\61\x36\60";
    const C14N = "\150\164\x74\x70\72\x2f\x2f\167\x77\x77\56\167\x33\x2e\157\x72\x67\x2f\x54\122\x2f\x32\60\60\61\57\x52\x45\103\55\170\155\154\55\x63\x31\64\156\55\62\x30\60\x31\60\63\61\x35";
    const C14N_COMMENTS = "\150\164\x74\x70\72\x2f\57\167\x77\167\56\x77\x33\x2e\157\x72\147\x2f\124\122\x2f\x32\x30\x30\x31\57\x52\105\x43\55\x78\155\x6c\x2d\143\61\x34\x6e\x2d\62\x30\60\61\60\63\61\65\x23\x57\151\164\150\103\x6f\155\x6d\x65\x6e\x74\163";
    const EXC_C14N = "\x68\164\x74\x70\72\57\57\167\167\167\56\x77\63\56\157\162\x67\57\62\60\x30\x31\57\61\x30\57\x78\x6d\154\55\145\x78\143\x2d\143\x31\64\x6e\43";
    const EXC_C14N_COMMENTS = "\x68\164\x74\160\72\57\x2f\x77\x77\167\x2e\x77\x33\56\157\x72\x67\x2f\62\60\60\61\57\x31\x30\x2f\170\155\154\55\145\x78\x63\x2d\x63\x31\x34\156\43\x57\151\x74\x68\103\x6f\x6d\155\x65\x6e\x74\163";
    const template = "\74\x64\x73\x3a\123\x69\x67\156\141\x74\x75\162\x65\x20\x78\155\x6c\x6e\163\72\x64\x73\75\x22\150\x74\164\x70\x3a\57\57\x77\x77\x77\56\167\x33\x2e\x6f\162\x67\x2f\62\60\60\60\57\x30\x39\57\x78\x6d\x6c\x64\163\x69\147\43\42\x3e\12\40\40\x3c\x64\x73\x3a\x53\151\x67\x6e\x65\x64\111\156\x66\157\x3e\12\40\x20\x20\x20\74\144\x73\x3a\123\151\147\156\x61\x74\165\x72\145\115\x65\x74\150\x6f\x64\x20\x2f\x3e\xa\40\x20\74\x2f\x64\163\x3a\123\x69\147\156\145\144\x49\x6e\x66\157\x3e\12\74\x2f\144\x73\72\123\x69\147\156\141\164\x75\x72\145\76";
    const BASE_TEMPLATE = "\x3c\123\x69\x67\x6e\x61\164\165\x72\x65\x20\170\x6d\154\156\163\75\42\x68\164\x74\x70\x3a\x2f\57\x77\x77\167\x2e\x77\x33\56\157\162\147\x2f\62\x30\x30\x30\57\x30\71\x2f\170\155\154\144\x73\x69\147\x23\42\x3e\xa\40\40\x3c\x53\x69\x67\156\145\x64\111\x6e\146\x6f\x3e\12\40\x20\x20\x20\74\123\151\x67\156\x61\164\x75\162\145\115\145\164\150\157\144\x20\x2f\76\xa\40\x20\74\57\123\151\x67\156\x65\x64\111\156\146\157\x3e\xa\74\57\x53\x69\147\156\x61\x74\165\x72\145\76";
    public $sigNode = null;
    public $idKeys = array();
    public $idNS = array();
    private $signedInfo = null;
    private $xPathCtx = null;
    private $canonicalMethod = null;
    private $prefix = '';
    private $searchpfx = "\x73\145\143\144\163\151\x67";
    private $validatedNodes = null;
    public function __construct($z1 = "\144\163")
    {
        $TN = self::BASE_TEMPLATE;
        if (empty($z1)) {
            goto al;
        }
        $this->prefix = $z1 . "\x3a";
        $HQ = array("\74\x53", "\74\57\123", "\x78\x6d\154\x6e\x73\75");
        $Xq = array("\x3c{$z1}\x3a\x53", "\74\x2f{$z1}\x3a\123", "\x78\155\x6c\x6e\x73\x3a{$z1}\x3d");
        $TN = str_replace($HQ, $Xq, $TN);
        al:
        $L7 = new DOMDocument();
        $L7->loadXML($TN);
        $this->sigNode = $L7->documentElement;
    }
    private function resetXPathObj()
    {
        $this->xPathCtx = null;
    }
    private function getXPathObj()
    {
        if (!(empty($this->xPathCtx) && !empty($this->sigNode))) {
            goto BZ;
        }
        $w5 = new DOMXPath($this->sigNode->ownerDocument);
        $w5->registerNamespace("\x73\x65\x63\144\x73\x69\147", self::XMLDSIGNS);
        $this->xPathCtx = $w5;
        BZ:
        return $this->xPathCtx;
    }
    public static function generateGUID($z1 = "\160\x66\x78")
    {
        $wf = md5(uniqid(mt_rand(), true));
        $aX = $z1 . substr($wf, 0, 8) . "\55" . substr($wf, 8, 4) . "\x2d" . substr($wf, 12, 4) . "\x2d" . substr($wf, 16, 4) . "\55" . substr($wf, 20, 12);
        return $aX;
    }
    public static function generate_GUID($z1 = "\160\x66\170")
    {
        return self::generateGUID($z1);
    }
    public function locateSignature($bE, $cb = 0)
    {
        if ($bE instanceof DOMDocument) {
            goto PU;
        }
        $tW = $bE->ownerDocument;
        goto hL;
        PU:
        $tW = $bE;
        hL:
        if (!$tW) {
            goto Zo;
        }
        $w5 = new DOMXPath($tW);
        $w5->registerNamespace("\x73\145\143\144\x73\x69\147", self::XMLDSIGNS);
        $C8 = "\56\x2f\57\x73\x65\x63\x64\x73\151\x67\72\x53\x69\x67\x6e\x61\x74\x75\x72\x65";
        $B_ = $w5->query($C8, $bE);
        $this->sigNode = $B_->item($cb);
        return $this->sigNode;
        Zo:
        return null;
    }
    public function createNewSignNode($vd, $Iy = null)
    {
        $tW = $this->sigNode->ownerDocument;
        if (!is_null($Iy)) {
            goto KU;
        }
        $pu = $tW->createElementNS(self::XMLDSIGNS, $this->prefix . $vd);
        goto B3;
        KU:
        $pu = $tW->createElementNS(self::XMLDSIGNS, $this->prefix . $vd, $Iy);
        B3:
        return $pu;
    }
    public function setCanonicalMethod($N0)
    {
        switch ($N0) {
            case "\150\164\164\160\72\x2f\57\167\167\x77\56\x77\63\x2e\157\x72\x67\57\124\x52\57\x32\x30\60\x31\57\x52\105\x43\x2d\x78\x6d\154\55\143\61\x34\x6e\x2d\x32\60\60\61\x30\x33\x31\x35":
            case "\150\x74\164\x70\72\x2f\x2f\167\x77\167\x2e\x77\63\56\157\162\147\x2f\124\122\x2f\x32\60\x30\61\57\x52\105\103\55\170\155\154\x2d\x63\x31\x34\x6e\55\x32\x30\x30\x31\x30\x33\x31\x35\43\x57\x69\x74\150\x43\157\155\x6d\145\156\164\163":
            case "\x68\164\x74\160\x3a\57\x2f\167\167\167\x2e\x77\x33\x2e\x6f\x72\x67\57\x32\60\x30\61\57\x31\x30\57\x78\x6d\154\55\x65\x78\x63\x2d\x63\x31\64\x6e\x23":
            case "\x68\x74\x74\x70\72\57\57\x77\x77\167\x2e\x77\x33\56\x6f\162\147\57\62\x30\x30\61\x2f\x31\60\57\170\x6d\154\x2d\x65\x78\x63\x2d\143\x31\64\x6e\x23\x57\151\164\x68\x43\157\155\155\145\x6e\164\x73":
                $this->canonicalMethod = $N0;
                goto FT;
            default:
                throw new Exception("\x49\156\x76\x61\154\151\144\40\103\141\x6e\x6f\156\x69\x63\141\x6c\x20\x4d\x65\164\x68\157\144");
        }
        NH:
        FT:
        if (!($w5 = $this->getXPathObj())) {
            goto yh;
        }
        $C8 = "\56\x2f" . $this->searchpfx . "\x3a\123\x69\x67\x6e\145\144\x49\x6e\x66\x6f";
        $B_ = $w5->query($C8, $this->sigNode);
        if (!($AY = $B_->item(0))) {
            goto Ds;
        }
        $C8 = "\x2e\57" . $this->searchpfx . "\103\x61\156\157\156\151\x63\141\154\151\172\141\164\x69\x6f\156\115\x65\x74\150\x6f\x64";
        $B_ = $w5->query($C8, $AY);
        if ($mc = $B_->item(0)) {
            goto Ef;
        }
        $mc = $this->createNewSignNode("\x43\141\x6e\157\x6e\151\143\x61\154\151\172\x61\x74\x69\x6f\156\115\145\164\x68\x6f\144");
        $AY->insertBefore($mc, $AY->firstChild);
        Ef:
        $mc->setAttribute("\x41\x6c\x67\157\x72\151\164\150\155", $this->canonicalMethod);
        Ds:
        yh:
    }
    private function canonicalizeData($pu, $Xa, $WI = null, $cj = null)
    {
        $r_ = false;
        $sN = false;
        switch ($Xa) {
            case "\150\x74\164\x70\72\x2f\57\167\167\167\x2e\x77\x33\x2e\x6f\162\x67\57\x54\x52\x2f\62\60\x30\61\57\x52\105\x43\55\x78\155\x6c\55\143\x31\x34\x6e\x2d\x32\60\60\x31\60\63\x31\65":
                $r_ = false;
                $sN = false;
                goto h8;
            case "\x68\x74\x74\160\x3a\57\x2f\167\x77\x77\56\167\x33\56\157\x72\147\57\124\x52\x2f\x32\60\60\61\57\x52\x45\x43\55\x78\x6d\154\x2d\x63\x31\64\156\x2d\x32\60\60\61\x30\x33\x31\65\x23\x57\x69\164\x68\103\157\x6d\155\145\x6e\x74\x73":
                $sN = true;
                goto h8;
            case "\150\164\x74\x70\x3a\57\57\167\x77\x77\56\167\63\56\157\162\x67\57\62\60\x30\x31\x2f\x31\x30\x2f\x78\155\154\55\145\170\143\x2d\x63\61\64\156\x23":
                $r_ = true;
                goto h8;
            case "\150\x74\x74\x70\72\x2f\57\x77\167\x77\x2e\167\63\56\x6f\x72\147\57\x32\x30\x30\61\57\61\x30\x2f\x78\155\154\x2d\x65\x78\x63\x2d\x63\x31\x34\x6e\x23\x57\x69\x74\x68\x43\157\x6d\x6d\x65\156\164\x73":
                $r_ = true;
                $sN = true;
                goto h8;
        }
        bo:
        h8:
        if (!(is_null($WI) && $pu instanceof DOMNode && $pu->ownerDocument !== null && $pu->isSameNode($pu->ownerDocument->documentElement))) {
            goto wL;
        }
        $WC = $pu;
        ks:
        if (!($FM = $WC->previousSibling)) {
            goto aA;
        }
        if (!($FM->nodeType == XML_PI_NODE || $FM->nodeType == XML_COMMENT_NODE && $sN)) {
            goto vw;
        }
        goto aA;
        vw:
        $WC = $FM;
        goto ks;
        aA:
        if (!($FM == null)) {
            goto pS;
        }
        $pu = $pu->ownerDocument;
        pS:
        wL:
        return $pu->C14N($r_, $sN, $WI, $cj);
    }
    public function canonicalizeSignedInfo()
    {
        $tW = $this->sigNode->ownerDocument;
        $Xa = null;
        if (!$tW) {
            goto XG;
        }
        $w5 = $this->getXPathObj();
        $C8 = "\x2e\x2f\x73\x65\x63\x64\x73\x69\x67\72\x53\151\147\x6e\x65\144\x49\x6e\146\157";
        $B_ = $w5->query($C8, $this->sigNode);
        if (!($bi = $B_->item(0))) {
            goto oj;
        }
        $C8 = "\x2e\57\163\145\x63\144\163\151\x67\x3a\x43\141\156\157\x6e\x69\143\x61\154\151\x7a\x61\164\151\x6f\156\x4d\x65\164\x68\x6f\x64";
        $B_ = $w5->query($C8, $bi);
        if (!($mc = $B_->item(0))) {
            goto Xf;
        }
        $Xa = $mc->getAttribute("\x41\x6c\147\157\x72\151\x74\x68\x6d");
        Xf:
        $this->signedInfo = $this->canonicalizeData($bi, $Xa);
        return $this->signedInfo;
        oj:
        XG:
        return null;
    }
    public function calculateDigest($Q1, $aS, $aB = true)
    {
        switch ($Q1) {
            case self::SHA1:
                $Od = "\x73\x68\x61\61";
                goto Y7;
            case self::SHA256:
                $Od = "\163\x68\141\x32\x35\x36";
                goto Y7;
            case self::SHA384:
                $Od = "\x73\x68\x61\x33\x38\64";
                goto Y7;
            case self::SHA512:
                $Od = "\163\x68\141\65\x31\x32";
                goto Y7;
            case self::RIPEMD160:
                $Od = "\162\x69\160\x65\x6d\x64\61\x36\60";
                goto Y7;
            default:
                throw new Exception("\x43\x61\x6e\x6e\x6f\x74\40\166\x61\154\x69\144\141\x74\x65\40\x64\x69\147\x65\x73\x74\72\40\x55\156\x73\x75\x70\x70\x6f\162\164\145\144\x20\101\x6c\147\x6f\162\x69\164\x68\155\x20\x3c{$Q1}\x3e");
        }
        Bs:
        Y7:
        $VK = hash($Od, $aS, true);
        if (!$aB) {
            goto LX;
        }
        $VK = base64_encode($VK);
        LX:
        return $VK;
    }
    public function validateDigest($ZI, $aS)
    {
        $w5 = new DOMXPath($ZI->ownerDocument);
        $w5->registerNamespace("\x73\x65\143\144\x73\x69\x67", self::XMLDSIGNS);
        $C8 = "\163\x74\162\x69\x6e\x67\x28\56\57\163\x65\143\144\x73\151\x67\x3a\x44\151\147\x65\x73\164\x4d\145\164\x68\x6f\144\57\100\101\154\x67\157\x72\151\x74\x68\155\x29";
        $Q1 = $w5->evaluate($C8, $ZI);
        $bo = $this->calculateDigest($Q1, $aS, false);
        $C8 = "\x73\x74\x72\x69\x6e\x67\50\56\x2f\163\x65\143\x64\163\151\147\72\104\x69\147\x65\x73\x74\126\x61\x6c\x75\x65\x29";
        $mV = $w5->evaluate($C8, $ZI);
        return $bo === base64_decode($mV);
    }
    public function processTransforms($ZI, $u1, $cr = true)
    {
        $aS = $u1;
        $w5 = new DOMXPath($ZI->ownerDocument);
        $w5->registerNamespace("\x73\x65\143\x64\x73\x69\147", self::XMLDSIGNS);
        $C8 = "\x2e\57\x73\145\143\x64\163\x69\x67\x3a\x54\x72\141\156\163\146\x6f\162\x6d\163\x2f\x73\x65\143\x64\163\x69\x67\x3a\124\x72\141\x6e\163\x66\157\x72\x6d";
        $DE = $w5->query($C8, $ZI);
        $o9 = "\150\164\164\160\x3a\x2f\57\167\167\167\56\x77\x33\56\157\162\x67\57\x54\122\x2f\x32\60\60\61\57\x52\x45\x43\55\170\x6d\154\55\x63\61\x34\x6e\55\x32\x30\60\61\60\x33\x31\x35";
        $WI = null;
        $cj = null;
        foreach ($DE as $MQ) {
            $ox = $MQ->getAttribute("\101\x6c\147\x6f\x72\151\x74\150\155");
            switch ($ox) {
                case "\x68\x74\164\x70\72\57\57\x77\x77\167\56\x77\x33\x2e\157\162\147\57\x32\60\x30\x31\x2f\x31\60\57\x78\x6d\x6c\x2d\145\170\143\x2d\143\x31\64\156\x23":
                case "\x68\164\x74\160\72\57\57\x77\167\x77\x2e\167\x33\x2e\x6f\x72\147\57\x32\60\60\61\x2f\61\x30\57\170\x6d\154\55\x65\x78\143\x2d\x63\61\64\x6e\43\x57\151\164\x68\103\x6f\155\x6d\x65\156\164\x73":
                    if (!$cr) {
                        goto Wi;
                    }
                    $o9 = $ox;
                    goto k9;
                    Wi:
                    $o9 = "\150\x74\x74\x70\x3a\x2f\x2f\167\x77\x77\56\167\x33\x2e\x6f\x72\x67\x2f\x32\60\x30\x31\57\x31\60\57\170\x6d\x6c\55\145\170\143\55\143\x31\64\x6e\x23";
                    k9:
                    $pu = $MQ->firstChild;
                    mM:
                    if (!$pu) {
                        goto cl;
                    }
                    if (!($pu->localName == "\x49\156\143\154\x75\x73\x69\166\145\x4e\141\x6d\x65\163\160\141\143\x65\163")) {
                        goto wF;
                    }
                    if (!($W6 = $pu->getAttribute("\x50\162\145\146\x69\x78\114\x69\x73\x74"))) {
                        goto ph;
                    }
                    $wb = array();
                    $hc = explode("\x20", $W6);
                    foreach ($hc as $W6) {
                        $Ry = trim($W6);
                        if (empty($Ry)) {
                            goto qg;
                        }
                        $wb[] = $Ry;
                        qg:
                        Og:
                    }
                    aZ:
                    if (!(count($wb) > 0)) {
                        goto dr;
                    }
                    $cj = $wb;
                    dr:
                    ph:
                    goto cl;
                    wF:
                    $pu = $pu->nextSibling;
                    goto mM;
                    cl:
                    goto sm;
                case "\x68\x74\164\160\x3a\x2f\x2f\167\167\x77\x2e\167\x33\x2e\x6f\162\147\x2f\x54\x52\57\x32\60\x30\61\57\x52\105\x43\x2d\x78\155\x6c\x2d\x63\x31\x34\x6e\55\62\60\60\x31\60\x33\61\65":
                case "\x68\x74\x74\x70\72\57\x2f\x77\167\167\56\167\63\x2e\x6f\162\x67\57\124\x52\57\x32\60\60\61\57\x52\105\x43\x2d\170\155\x6c\x2d\x63\x31\x34\156\x2d\x32\x30\60\x31\60\x33\61\65\43\x57\151\x74\x68\103\x6f\x6d\x6d\145\x6e\164\163":
                    if (!$cr) {
                        goto SM;
                    }
                    $o9 = $ox;
                    goto Bm;
                    SM:
                    $o9 = "\150\x74\x74\x70\72\57\x2f\x77\x77\167\x2e\x77\63\56\157\162\147\57\x54\122\x2f\62\x30\x30\61\x2f\122\x45\103\55\x78\x6d\x6c\55\x63\61\64\156\x2d\x32\60\x30\x31\60\63\61\x35";
                    Bm:
                    goto sm;
                case "\150\164\164\160\72\57\x2f\x77\x77\167\x2e\x77\63\56\x6f\162\x67\57\x54\122\x2f\61\x39\x39\71\x2f\122\105\x43\x2d\170\x70\x61\x74\150\55\x31\x39\x39\71\x31\x31\61\x36":
                    $pu = $MQ->firstChild;
                    yf:
                    if (!$pu) {
                        goto X7;
                    }
                    if (!($pu->localName == "\130\x50\141\164\x68")) {
                        goto jZ;
                    }
                    $WI = array();
                    $WI["\x71\165\x65\162\171"] = "\50\56\x2f\x2f\x2e\40\x7c\x20\56\x2f\x2f\x40\x2a\x20\x7c\40\x2e\x2f\57\x6e\141\x6d\x65\163\160\141\143\x65\x3a\x3a\52\x29\x5b" . $pu->nodeValue . "\x5d";
                    $Z0["\156\x61\x6d\145\x73\x70\x61\x63\x65\x73"] = array();
                    $RS = $w5->query("\x2e\57\x6e\x61\x6d\145\163\160\x61\143\x65\72\x3a\52", $pu);
                    foreach ($RS as $JM) {
                        if (!($JM->localName != "\x78\155\x6c")) {
                            goto vV;
                        }
                        $WI["\156\x61\x6d\145\x73\x70\x61\x63\145\163"][$JM->localName] = $JM->nodeValue;
                        vV:
                        Bw:
                    }
                    ci:
                    goto X7;
                    jZ:
                    $pu = $pu->nextSibling;
                    goto yf;
                    X7:
                    goto sm;
            }
            vD:
            sm:
            Ne:
        }
        sy:
        if (!$aS instanceof DOMNode) {
            goto XK;
        }
        $aS = $this->canonicalizeData($u1, $o9, $WI, $cj);
        XK:
        return $aS;
    }
    public function processRefNode($ZI)
    {
        $fe = null;
        $cr = true;
        if ($sV = $ZI->getAttribute("\x55\x52\111")) {
            goto Qx;
        }
        $cr = false;
        $fe = $ZI->ownerDocument;
        goto OU;
        Qx:
        $Xe = parse_url($sV);
        if (!empty($Xe["\x70\141\x74\150"])) {
            goto Ru;
        }
        if ($u0 = $Xe["\146\x72\141\147\x6d\145\x6e\164"]) {
            goto dR;
        }
        $fe = $ZI->ownerDocument;
        goto jA;
        dR:
        $cr = false;
        $Li = new DOMXPath($ZI->ownerDocument);
        if (!($this->idNS && is_array($this->idNS))) {
            goto Ar;
        }
        foreach ($this->idNS as $Xl => $w9) {
            $Li->registerNamespace($Xl, $w9);
            j7:
        }
        cZ:
        Ar:
        $Pg = "\100\x49\144\75\x22" . XPath::filterAttrValue($u0, XPath::DOUBLE_QUOTE) . "\42";
        if (!is_array($this->idKeys)) {
            goto GN;
        }
        foreach ($this->idKeys as $Jq) {
            $Pg .= "\40\157\162\x20\100" . XPath::filterAttrName($Jq) . "\75\42" . XPath::filterAttrValue($u0, XPath::DOUBLE_QUOTE) . "\42";
            HG:
        }
        vx:
        GN:
        $C8 = "\57\x2f\x2a\133" . $Pg . "\135";
        $fe = $Li->query($C8)->item(0);
        jA:
        Ru:
        OU:
        $aS = $this->processTransforms($ZI, $fe, $cr);
        if ($this->validateDigest($ZI, $aS)) {
            goto Z4;
        }
        return false;
        Z4:
        if (!$fe instanceof DOMNode) {
            goto xl;
        }
        if (!empty($u0)) {
            goto jJ;
        }
        $this->validatedNodes[] = $fe;
        goto xY;
        jJ:
        $this->validatedNodes[$u0] = $fe;
        xY:
        xl:
        return true;
    }
    public function getRefNodeID($ZI)
    {
        if (!($sV = $ZI->getAttribute("\x55\x52\x49"))) {
            goto o8;
        }
        $Xe = parse_url($sV);
        if (!empty($Xe["\160\141\x74\150"])) {
            goto n9;
        }
        if (!($u0 = $Xe["\x66\x72\x61\x67\155\145\x6e\x74"])) {
            goto j6;
        }
        return $u0;
        j6:
        n9:
        o8:
        return null;
    }
    public function getRefIDs()
    {
        $ss = array();
        $w5 = $this->getXPathObj();
        $C8 = "\56\x2f\163\x65\x63\144\x73\x69\x67\x3a\123\151\x67\156\145\x64\x49\156\146\157\x2f\x73\x65\143\144\163\x69\x67\72\122\145\x66\x65\x72\145\156\143\145";
        $B_ = $w5->query($C8, $this->sigNode);
        if (!($B_->length == 0)) {
            goto Mw;
        }
        throw new Exception("\x52\x65\x66\145\x72\x65\156\x63\145\x20\x6e\x6f\x64\x65\163\x20\156\157\164\x20\x66\x6f\x75\x6e\144");
        Mw:
        foreach ($B_ as $ZI) {
            $ss[] = $this->getRefNodeID($ZI);
            Tb:
        }
        Ee:
        return $ss;
    }
    public function validateReference()
    {
        $PN = $this->sigNode->ownerDocument->documentElement;
        if ($PN->isSameNode($this->sigNode)) {
            goto TK;
        }
        if (!($this->sigNode->parentNode != null)) {
            goto Da;
        }
        $this->sigNode->parentNode->removeChild($this->sigNode);
        Da:
        TK:
        $w5 = $this->getXPathObj();
        $C8 = "\x2e\x2f\163\x65\143\144\163\x69\147\x3a\123\x69\147\156\x65\x64\x49\x6e\x66\157\x2f\163\145\143\144\163\151\147\72\x52\145\x66\145\162\x65\x6e\143\145";
        $B_ = $w5->query($C8, $this->sigNode);
        if (!($B_->length == 0)) {
            goto La;
        }
        throw new Exception("\x52\145\146\x65\162\x65\156\143\145\40\x6e\x6f\144\x65\163\x20\x6e\157\164\x20\x66\x6f\x75\x6e\144");
        La:
        $this->validatedNodes = array();
        foreach ($B_ as $ZI) {
            if ($this->processRefNode($ZI)) {
                goto Jo;
            }
            $this->validatedNodes = null;
            throw new Exception("\122\145\146\x65\162\145\x6e\143\145\40\166\x61\x6c\151\x64\141\x74\x69\157\x6e\x20\146\141\151\x6c\x65\x64");
            Jo:
            oW:
        }
        xA:
        return true;
    }
    private function addRefInternal($Eb, $pu, $ox, $xe = null, $fB = null)
    {
        $z1 = null;
        $Eq = null;
        $zs = "\x49\x64";
        $ek = true;
        $q3 = false;
        if (!is_array($fB)) {
            goto S1;
        }
        $z1 = empty($fB["\160\x72\x65\x66\151\x78"]) ? null : $fB["\160\x72\x65\146\151\x78"];
        $Eq = empty($fB["\160\162\145\146\x69\x78\x5f\156\x73"]) ? null : $fB["\160\162\145\146\x69\x78\137\156\163"];
        $zs = empty($fB["\151\144\x5f\x6e\141\155\145"]) ? "\111\144" : $fB["\x69\x64\x5f\x6e\x61\x6d\x65"];
        $ek = !isset($fB["\x6f\x76\145\x72\167\x72\151\164\145"]) ? true : (bool) $fB["\157\x76\x65\x72\167\x72\151\x74\145"];
        $q3 = !isset($fB["\x66\157\162\143\145\137\x75\x72\x69"]) ? false : (bool) $fB["\146\157\162\143\x65\137\x75\x72\151"];
        S1:
        $Rn = $zs;
        if (empty($z1)) {
            goto KK;
        }
        $Rn = $z1 . "\x3a" . $Rn;
        KK:
        $ZI = $this->createNewSignNode("\122\145\146\145\x72\145\x6e\143\x65");
        $Eb->appendChild($ZI);
        if (!$pu instanceof DOMDocument) {
            goto NR;
        }
        if ($q3) {
            goto zM;
        }
        goto CG;
        NR:
        $sV = null;
        if ($ek) {
            goto XF;
        }
        $sV = $Eq ? $pu->getAttributeNS($Eq, $zs) : $pu->getAttribute($zs);
        XF:
        if (!empty($sV)) {
            goto ma;
        }
        $sV = self::generateGUID();
        $pu->setAttributeNS($Eq, $Rn, $sV);
        ma:
        $ZI->setAttribute("\125\x52\x49", "\x23" . $sV);
        goto CG;
        zM:
        $ZI->setAttribute("\125\122\x49", '');
        CG:
        $Im = $this->createNewSignNode("\124\x72\x61\x6e\163\x66\157\162\x6d\163");
        $ZI->appendChild($Im);
        if (is_array($xe)) {
            goto qs;
        }
        if (!empty($this->canonicalMethod)) {
            goto Dk;
        }
        goto tx;
        qs:
        foreach ($xe as $MQ) {
            $q0 = $this->createNewSignNode("\124\x72\x61\156\x73\x66\x6f\162\155");
            $Im->appendChild($q0);
            if (is_array($MQ) && !empty($MQ["\150\x74\x74\160\x3a\x2f\57\167\167\167\56\x77\x33\x2e\x6f\x72\147\x2f\124\x52\57\x31\71\71\x39\57\122\x45\103\x2d\x78\160\x61\164\150\x2d\x31\71\71\71\x31\61\61\66"]) && !empty($MQ["\150\164\x74\x70\x3a\57\57\167\x77\167\x2e\167\63\56\x6f\x72\x67\57\124\122\57\x31\x39\71\x39\57\122\105\x43\x2d\x78\x70\x61\164\x68\x2d\x31\71\x39\71\x31\61\x31\x36"]["\x71\x75\145\162\171"])) {
                goto V_;
            }
            $q0->setAttribute("\x41\154\x67\x6f\162\x69\x74\x68\x6d", $MQ);
            goto CE;
            V_:
            $q0->setAttribute("\101\x6c\147\x6f\x72\x69\164\150\x6d", "\150\x74\x74\160\x3a\57\x2f\x77\167\x77\x2e\167\x33\56\157\x72\147\57\124\x52\x2f\61\x39\71\x39\x2f\x52\105\x43\x2d\170\160\141\164\150\55\x31\71\71\71\x31\61\61\66");
            $t8 = $this->createNewSignNode("\130\120\141\164\150", $MQ["\x68\164\x74\160\x3a\57\57\167\x77\167\56\x77\x33\x2e\157\162\x67\x2f\124\x52\x2f\x31\71\x39\71\x2f\122\105\x43\x2d\170\160\x61\x74\150\55\61\x39\71\71\x31\61\61\x36"]["\x71\x75\145\x72\x79"]);
            $q0->appendChild($t8);
            if (empty($MQ["\x68\x74\164\x70\72\x2f\57\167\x77\x77\x2e\167\x33\x2e\157\x72\147\x2f\x54\x52\57\x31\71\71\71\57\x52\x45\103\x2d\x78\x70\141\x74\x68\x2d\61\71\71\71\61\61\x31\x36"]["\x6e\x61\x6d\145\x73\x70\141\x63\x65\163"])) {
                goto SL;
            }
            foreach ($MQ["\x68\x74\x74\x70\72\57\x2f\x77\167\167\x2e\x77\63\x2e\x6f\x72\147\x2f\x54\x52\57\61\71\x39\x39\x2f\x52\x45\x43\55\170\x70\141\x74\x68\x2d\61\71\71\x39\x31\x31\61\x36"]["\x6e\x61\155\145\x73\160\141\x63\x65\163"] as $z1 => $lL) {
                $t8->setAttributeNS("\x68\164\x74\160\x3a\x2f\57\167\x77\x77\56\x77\x33\56\157\162\147\57\62\60\x30\60\57\x78\155\x6c\x6e\x73\57", "\170\155\154\x6e\163\72{$z1}", $lL);
                Zr:
            }
            L0:
            SL:
            CE:
            zD:
        }
        lH:
        goto tx;
        Dk:
        $q0 = $this->createNewSignNode("\124\x72\141\x6e\163\146\x6f\x72\155");
        $Im->appendChild($q0);
        $q0->setAttribute("\x41\x6c\x67\157\x72\151\x74\x68\x6d", $this->canonicalMethod);
        tx:
        $z8 = $this->processTransforms($ZI, $pu);
        $bo = $this->calculateDigest($ox, $z8);
        $IH = $this->createNewSignNode("\104\151\x67\x65\163\164\115\145\164\150\157\x64");
        $ZI->appendChild($IH);
        $IH->setAttribute("\x41\x6c\x67\x6f\162\151\164\x68\x6d", $ox);
        $mV = $this->createNewSignNode("\104\151\147\145\163\164\126\141\x6c\x75\x65", $bo);
        $ZI->appendChild($mV);
    }
    public function addReference($pu, $ox, $xe = null, $fB = null)
    {
        if (!($w5 = $this->getXPathObj())) {
            goto YP;
        }
        $C8 = "\x2e\x2f\x73\145\143\x64\163\151\x67\72\123\x69\147\x6e\x65\144\111\x6e\x66\x6f";
        $B_ = $w5->query($C8, $this->sigNode);
        if (!($rY = $B_->item(0))) {
            goto I5;
        }
        $this->addRefInternal($rY, $pu, $ox, $xe, $fB);
        I5:
        YP:
    }
    public function addReferenceList($NY, $ox, $xe = null, $fB = null)
    {
        if (!($w5 = $this->getXPathObj())) {
            goto Rs;
        }
        $C8 = "\56\x2f\x73\x65\143\144\163\151\147\x3a\x53\x69\x67\x6e\x65\144\x49\x6e\146\157";
        $B_ = $w5->query($C8, $this->sigNode);
        if (!($rY = $B_->item(0))) {
            goto Qu;
        }
        foreach ($NY as $pu) {
            $this->addRefInternal($rY, $pu, $ox, $xe, $fB);
            S0:
        }
        Yo:
        Qu:
        Rs:
    }
    public function addObject($aS, $OZ = null, $E3 = null)
    {
        $f_ = $this->createNewSignNode("\117\x62\x6a\x65\x63\x74");
        $this->sigNode->appendChild($f_);
        if (empty($OZ)) {
            goto K6;
        }
        $f_->setAttribute("\115\x69\155\x65\124\171\x70\x65", $OZ);
        K6:
        if (empty($E3)) {
            goto xj;
        }
        $f_->setAttribute("\105\x6e\143\x6f\x64\151\x6e\x67", $E3);
        xj:
        if ($aS instanceof DOMElement) {
            goto D1;
        }
        $tU = $this->sigNode->ownerDocument->createTextNode($aS);
        goto cC;
        D1:
        $tU = $this->sigNode->ownerDocument->importNode($aS, true);
        cC:
        $f_->appendChild($tU);
        return $f_;
    }
    public function locateKey($pu = null)
    {
        if (!empty($pu)) {
            goto KB;
        }
        $pu = $this->sigNode;
        KB:
        if ($pu instanceof DOMNode) {
            goto fB;
        }
        return null;
        fB:
        if (!($tW = $pu->ownerDocument)) {
            goto Sv;
        }
        $w5 = new DOMXPath($tW);
        $w5->registerNamespace("\163\145\143\144\163\151\x67", self::XMLDSIGNS);
        $C8 = "\163\x74\x72\x69\x6e\147\50\x2e\57\163\145\143\x64\x73\151\x67\72\123\151\147\156\145\144\111\156\146\x6f\x2f\x73\x65\x63\x64\163\151\147\x3a\123\x69\147\x6e\141\x74\165\x72\145\x4d\x65\164\x68\x6f\144\57\x40\x41\x6c\x67\x6f\162\x69\164\x68\155\x29";
        $ox = $w5->evaluate($C8, $pu);
        if (!$ox) {
            goto fx;
        }
        try {
            $MM = new XMLSecurityKey($ox, array("\164\171\x70\145" => "\160\165\142\154\151\143"));
        } catch (Exception $xr) {
            return null;
        }
        return $MM;
        fx:
        Sv:
        return null;
    }
    public function verify($MM)
    {
        $tW = $this->sigNode->ownerDocument;
        $w5 = new DOMXPath($tW);
        $w5->registerNamespace("\163\145\143\x64\x73\151\x67", self::XMLDSIGNS);
        $C8 = "\x73\164\162\x69\x6e\x67\50\x2e\x2f\163\145\143\x64\x73\151\x67\72\123\151\147\x6e\x61\164\165\x72\x65\x56\x61\x6c\x75\x65\x29";
        $wd = $w5->evaluate($C8, $this->sigNode);
        if (!empty($wd)) {
            goto qZ;
        }
        throw new Exception("\125\x6e\x61\x62\x6c\x65\40\164\x6f\x20\x6c\x6f\143\x61\x74\x65\40\123\x69\x67\x6e\141\164\165\x72\x65\126\x61\154\165\145");
        qZ:
        return $MM->verifySignature($this->signedInfo, base64_decode($wd));
    }
    public function signData($MM, $aS)
    {
        return $MM->signData($aS);
    }
    public function sign($MM, $jq = null)
    {
        if (!($jq != null)) {
            goto aj;
        }
        $this->resetXPathObj();
        $this->appendSignature($jq);
        $this->sigNode = $jq->lastChild;
        aj:
        if (!($w5 = $this->getXPathObj())) {
            goto nP;
        }
        $C8 = "\x2e\x2f\x73\x65\x63\144\163\151\x67\72\123\x69\147\x6e\x65\x64\x49\156\x66\157";
        $B_ = $w5->query($C8, $this->sigNode);
        if (!($rY = $B_->item(0))) {
            goto Qb;
        }
        $C8 = "\x2e\x2f\x73\145\x63\x64\x73\x69\147\72\123\151\x67\x6e\x61\x74\x75\162\145\x4d\145\x74\150\157\x64";
        $B_ = $w5->query($C8, $rY);
        $s3 = $B_->item(0);
        $s3->setAttribute("\101\154\147\157\x72\x69\164\x68\x6d", $MM->type);
        $aS = $this->canonicalizeData($rY, $this->canonicalMethod);
        $wd = base64_encode($this->signData($MM, $aS));
        $Br = $this->createNewSignNode("\x53\x69\147\156\141\164\x75\162\x65\126\x61\154\165\145", $wd);
        if ($ta = $rY->nextSibling) {
            goto Jz;
        }
        $this->sigNode->appendChild($Br);
        goto mz;
        Jz:
        $ta->parentNode->insertBefore($Br, $ta);
        mz:
        Qb:
        nP:
    }
    public function appendCert()
    {
    }
    public function appendKey($MM, $jA = null)
    {
        $MM->serializeKey($jA);
    }
    public function insertSignature($pu, $xt = null)
    {
        $vq = $pu->ownerDocument;
        $rQ = $vq->importNode($this->sigNode, true);
        if ($xt == null) {
            goto ko;
        }
        return $pu->insertBefore($rQ, $xt);
        goto DZ;
        ko:
        return $pu->insertBefore($rQ);
        DZ:
    }
    public function appendSignature($pV, $UN = false)
    {
        $xt = $UN ? $pV->firstChild : null;
        return $this->insertSignature($pV, $xt);
    }
    public static function get509XCert($dJ, $S0 = true)
    {
        $EU = self::staticGet509XCerts($dJ, $S0);
        if (empty($EU)) {
            goto jQ;
        }
        return $EU[0];
        jQ:
        return '';
    }
    public static function staticGet509XCerts($EU, $S0 = true)
    {
        if ($S0) {
            goto RD;
        }
        return array($EU);
        goto pu;
        RD:
        $aS = '';
        $VE = array();
        $OP = explode("\12", $EU);
        $qE = false;
        foreach ($OP as $T1) {
            if (!$qE) {
                goto hn;
            }
            if (!(strncmp($T1, "\55\x2d\55\x2d\x2d\105\116\104\40\x43\x45\x52\124\x49\106\111\103\x41\x54\105", 20) == 0)) {
                goto qm;
            }
            $qE = false;
            $VE[] = $aS;
            $aS = '';
            goto MW;
            qm:
            $aS .= trim($T1);
            goto jg;
            hn:
            if (!(strncmp($T1, "\x2d\x2d\55\x2d\x2d\x42\x45\107\111\116\40\103\x45\122\x54\111\106\111\103\x41\124\105", 22) == 0)) {
                goto qu;
            }
            $qE = true;
            qu:
            jg:
            MW:
        }
        Pp:
        return $VE;
        pu:
    }
    public static function staticAdd509Cert($z4, $dJ, $S0 = true, $RK = false, $w5 = null, $fB = null)
    {
        if (!$RK) {
            goto Om;
        }
        $dJ = file_get_contents($dJ);
        Om:
        if ($z4 instanceof DOMElement) {
            goto i9;
        }
        throw new Exception("\111\156\166\x61\x6c\151\x64\40\x70\x61\x72\145\156\164\x20\116\157\x64\x65\40\160\141\162\x61\x6d\145\164\x65\162");
        i9:
        $kT = $z4->ownerDocument;
        if (!empty($w5)) {
            goto zx;
        }
        $w5 = new DOMXPath($z4->ownerDocument);
        $w5->registerNamespace("\x73\x65\x63\x64\163\x69\147", self::XMLDSIGNS);
        zx:
        $C8 = "\x2e\x2f\x73\x65\143\144\163\151\147\72\x4b\145\171\111\156\146\157";
        $B_ = $w5->query($C8, $z4);
        $DZ = $B_->item(0);
        $bv = '';
        if (!$DZ) {
            goto fX;
        }
        $W6 = $DZ->lookupPrefix(self::XMLDSIGNS);
        if (empty($W6)) {
            goto Tp;
        }
        $bv = $W6 . "\72";
        Tp:
        goto HK;
        fX:
        $W6 = $z4->lookupPrefix(self::XMLDSIGNS);
        if (empty($W6)) {
            goto Au;
        }
        $bv = $W6 . "\72";
        Au:
        $xQ = false;
        $DZ = $kT->createElementNS(self::XMLDSIGNS, $bv . "\113\x65\171\x49\156\146\157");
        $C8 = "\56\57\163\x65\143\x64\x73\x69\147\x3a\117\x62\x6a\x65\143\x74";
        $B_ = $w5->query($C8, $z4);
        if (!($KL = $B_->item(0))) {
            goto JP;
        }
        $KL->parentNode->insertBefore($DZ, $KL);
        $xQ = true;
        JP:
        if ($xQ) {
            goto vZ;
        }
        $z4->appendChild($DZ);
        vZ:
        HK:
        $EU = self::staticGet509XCerts($dJ, $S0);
        $WJ = $kT->createElementNS(self::XMLDSIGNS, $bv . "\130\x35\60\x39\104\x61\164\141");
        $DZ->appendChild($WJ);
        $KU = false;
        $rF = false;
        if (!is_array($fB)) {
            goto Q9;
        }
        if (empty($fB["\151\x73\x73\x75\x65\162\123\145\x72\151\141\x6c"])) {
            goto Ai;
        }
        $KU = true;
        Ai:
        if (empty($fB["\163\165\x62\x6a\x65\143\x74\116\141\x6d\145"])) {
            goto S8;
        }
        $rF = true;
        S8:
        Q9:
        foreach ($EU as $Ub) {
            if (!($KU || $rF)) {
                goto rg;
            }
            if (!($Mz = openssl_x509_parse("\x2d\55\x2d\55\55\102\105\x47\111\116\x20\x43\x45\122\124\111\x46\x49\103\101\124\x45\55\55\55\x2d\55\xa" . chunk_split($Ub, 64, "\12") . "\x2d\55\55\x2d\55\105\x4e\x44\40\103\105\122\124\x49\106\x49\x43\x41\x54\105\x2d\x2d\x2d\55\x2d\12"))) {
                goto Hc;
            }
            if (!($rF && !empty($Mz["\x73\x75\x62\152\145\x63\164"]))) {
                goto vr;
            }
            if (is_array($Mz["\x73\165\x62\152\x65\x63\164"])) {
                goto l5;
            }
            $WX = $Mz["\151\x73\163\165\x65\x72"];
            goto x4;
            l5:
            $EG = array();
            foreach ($Mz["\x73\x75\x62\x6a\x65\x63\x74"] as $Kn => $Iy) {
                if (is_array($Iy)) {
                    goto R9;
                }
                array_unshift($EG, "{$Kn}\x3d{$Iy}");
                goto HO;
                R9:
                foreach ($Iy as $AT) {
                    array_unshift($EG, "{$Kn}\x3d{$AT}");
                    bD:
                }
                GO:
                HO:
                x7:
            }
            Ge:
            $WX = implode("\54", $EG);
            x4:
            $nZ = $kT->createElementNS(self::XMLDSIGNS, $bv . "\130\65\x30\71\123\165\142\152\x65\143\x74\x4e\x61\155\x65", $WX);
            $WJ->appendChild($nZ);
            vr:
            if (!($KU && !empty($Mz["\151\163\163\165\x65\x72"]) && !empty($Mz["\163\145\162\x69\x61\154\116\165\155\142\145\x72"]))) {
                goto Td;
            }
            if (is_array($Mz["\x69\163\163\x75\145\162"])) {
                goto vv;
            }
            $w0 = $Mz["\151\x73\163\x75\x65\x72"];
            goto Wy;
            vv:
            $EG = array();
            foreach ($Mz["\x69\x73\x73\165\145\x72"] as $Kn => $Iy) {
                array_unshift($EG, "{$Kn}\75{$Iy}");
                T1:
            }
            fU:
            $w0 = implode("\54", $EG);
            Wy:
            $I5 = $kT->createElementNS(self::XMLDSIGNS, $bv . "\x58\x35\x30\x39\111\x73\163\165\x65\x72\x53\x65\x72\x69\141\154");
            $WJ->appendChild($I5);
            $na = $kT->createElementNS(self::XMLDSIGNS, $bv . "\130\65\60\x39\x49\163\163\x75\x65\162\x4e\141\155\x65", $w0);
            $I5->appendChild($na);
            $na = $kT->createElementNS(self::XMLDSIGNS, $bv . "\130\x35\60\x39\x53\145\162\151\x61\154\x4e\165\155\x62\x65\x72", $Mz["\163\145\x72\x69\x61\x6c\116\165\155\x62\145\162"]);
            $I5->appendChild($na);
            Td:
            Hc:
            rg:
            $s4 = $kT->createElementNS(self::XMLDSIGNS, $bv . "\x58\x35\x30\71\103\x65\162\164\151\146\151\x63\141\164\x65", $Ub);
            $WJ->appendChild($s4);
            TH:
        }
        un:
    }
    public function add509Cert($dJ, $S0 = true, $RK = false, $fB = null)
    {
        if (!($w5 = $this->getXPathObj())) {
            goto iB;
        }
        self::staticAdd509Cert($this->sigNode, $dJ, $S0, $RK, $w5, $fB);
        iB:
    }
    public function appendToKeyInfo($pu)
    {
        $z4 = $this->sigNode;
        $kT = $z4->ownerDocument;
        $w5 = $this->getXPathObj();
        if (!empty($w5)) {
            goto sJ;
        }
        $w5 = new DOMXPath($z4->ownerDocument);
        $w5->registerNamespace("\x73\x65\x63\x64\x73\151\x67", self::XMLDSIGNS);
        sJ:
        $C8 = "\56\x2f\x73\x65\143\144\163\x69\147\x3a\x4b\x65\x79\x49\156\x66\157";
        $B_ = $w5->query($C8, $z4);
        $DZ = $B_->item(0);
        if ($DZ) {
            goto xD;
        }
        $bv = '';
        $W6 = $z4->lookupPrefix(self::XMLDSIGNS);
        if (empty($W6)) {
            goto D3;
        }
        $bv = $W6 . "\x3a";
        D3:
        $xQ = false;
        $DZ = $kT->createElementNS(self::XMLDSIGNS, $bv . "\x4b\145\171\x49\x6e\146\x6f");
        $C8 = "\56\57\163\x65\143\x64\163\151\x67\72\x4f\142\x6a\145\x63\164";
        $B_ = $w5->query($C8, $z4);
        if (!($KL = $B_->item(0))) {
            goto D0;
        }
        $KL->parentNode->insertBefore($DZ, $KL);
        $xQ = true;
        D0:
        if ($xQ) {
            goto h4;
        }
        $z4->appendChild($DZ);
        h4:
        xD:
        $DZ->appendChild($pu);
        return $DZ;
    }
    public function getValidatedNodes()
    {
        return $this->validatedNodes;
    }
}
