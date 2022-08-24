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
    const XMLDSIGNS = "\x68\x74\x74\x70\72\57\x2f\167\x77\x77\x2e\x77\63\56\x6f\162\147\x2f\x32\60\x30\60\x2f\x30\71\x2f\170\155\x6c\144\163\x69\x67\43";
    const SHA1 = "\150\164\x74\160\72\57\x2f\167\167\167\56\167\63\56\157\x72\147\57\62\60\x30\60\57\x30\x39\x2f\x78\155\154\144\x73\151\147\x23\163\x68\x61\61";
    const SHA256 = "\x68\164\x74\x70\72\57\x2f\167\167\167\56\x77\x33\x2e\x6f\162\x67\57\x32\60\60\61\57\x30\x34\x2f\x78\x6d\x6c\x65\156\143\x23\x73\150\141\x32\x35\x36";
    const SHA384 = "\150\x74\x74\160\72\x2f\x2f\x77\x77\x77\56\x77\x33\56\157\162\147\x2f\x32\60\60\61\x2f\60\x34\57\x78\155\154\144\163\151\147\x2d\155\157\162\145\43\163\x68\x61\63\x38\x34";
    const SHA512 = "\150\164\164\160\72\x2f\x2f\167\x77\x77\x2e\167\63\x2e\157\x72\x67\57\x32\x30\60\x31\57\60\x34\57\170\155\154\145\156\x63\x23\163\x68\141\x35\61\x32";
    const RIPEMD160 = "\150\164\164\x70\x3a\57\x2f\167\167\167\56\x77\63\56\x6f\162\x67\x2f\x32\60\x30\61\57\60\64\x2f\x78\x6d\154\145\x6e\x63\x23\162\151\x70\x65\155\144\x31\x36\60";
    const C14N = "\150\x74\164\x70\x3a\x2f\57\167\167\167\x2e\167\x33\56\x6f\162\x67\x2f\124\122\x2f\x32\60\60\61\x2f\x52\x45\103\x2d\170\x6d\x6c\55\x63\x31\x34\x6e\55\x32\x30\x30\x31\x30\63\61\x35";
    const C14N_COMMENTS = "\x68\x74\x74\x70\72\57\x2f\167\x77\167\x2e\167\x33\x2e\x6f\162\147\57\124\122\x2f\x32\60\x30\61\x2f\122\x45\103\55\170\x6d\x6c\x2d\x63\61\x34\x6e\55\62\60\x30\x31\60\63\61\65\43\127\x69\x74\150\103\157\155\x6d\x65\x6e\164\x73";
    const EXC_C14N = "\150\x74\164\x70\72\x2f\57\167\167\167\56\167\x33\56\157\162\147\x2f\x32\60\x30\61\57\x31\x30\x2f\x78\155\x6c\55\x65\x78\143\55\143\61\x34\x6e\x23";
    const EXC_C14N_COMMENTS = "\x68\164\164\160\x3a\57\x2f\x77\167\x77\56\167\x33\x2e\157\162\147\x2f\x32\x30\x30\x31\x2f\x31\60\x2f\x78\155\x6c\55\145\170\x63\55\143\61\x34\x6e\x23\x57\151\x74\x68\x43\157\155\155\x65\x6e\164\163";
    const template = "\74\144\x73\x3a\x53\151\x67\x6e\141\164\x75\x72\145\40\170\x6d\154\156\163\72\x64\x73\x3d\x22\x68\164\164\160\x3a\57\x2f\167\167\x77\x2e\x77\63\x2e\157\x72\147\57\62\x30\x30\60\57\60\x39\57\x78\x6d\x6c\x64\x73\151\x67\x23\x22\x3e\15\12\40\40\x3c\x64\163\x3a\x53\151\x67\x6e\x65\x64\x49\156\146\x6f\x3e\15\12\x20\x20\40\40\74\144\163\72\x53\x69\147\x6e\x61\164\x75\162\x65\115\145\164\x68\157\x64\40\57\76\15\12\x20\40\74\57\x64\163\72\x53\151\147\156\145\144\111\156\146\x6f\76\xd\xa\74\57\x64\x73\72\123\x69\x67\x6e\x61\164\x75\162\145\x3e";
    const BASE_TEMPLATE = "\x3c\123\x69\147\x6e\141\x74\x75\162\x65\x20\170\155\154\156\x73\x3d\x22\x68\164\164\x70\72\57\x2f\x77\x77\167\x2e\x77\63\56\x6f\x72\x67\57\62\60\x30\x30\57\x30\71\x2f\170\155\154\x64\163\x69\147\43\42\x3e\xd\12\40\x20\74\123\x69\x67\156\145\x64\111\156\146\157\76\15\12\x20\40\40\40\74\123\151\147\x6e\141\164\x75\162\x65\115\x65\164\x68\157\x64\x20\57\x3e\xd\12\40\x20\x3c\57\x53\x69\x67\156\145\144\111\x6e\x66\x6f\x3e\xd\xa\x3c\x2f\x53\x69\147\156\141\164\x75\x72\145\76";
    public $sigNode = null;
    public $idKeys = array();
    public $idNS = array();
    private $signedInfo = null;
    private $xPathCtx = null;
    private $canonicalMethod = null;
    private $prefix = '';
    private $searchpfx = "\x73\x65\143\144\x73\x69\147";
    private $validatedNodes = null;
    public function __construct($DS = "\x64\163")
    {
        $eb = self::BASE_TEMPLATE;
        if (empty($DS)) {
            goto eJ;
        }
        $this->prefix = $DS . "\72";
        $ZE = array("\74\x53", "\x3c\x2f\123", "\170\155\x6c\x6e\x73\75");
        $qK = array("\74{$DS}\x3a\x53", "\74\57{$DS}\x3a\x53", "\170\x6d\x6c\x6e\x73\72{$DS}\75");
        $eb = str_replace($ZE, $qK, $eb);
        eJ:
        $ph = new DOMDocument();
        $ph->loadXML($eb);
        $this->sigNode = $ph->documentElement;
    }
    private function resetXPathObj()
    {
        $this->xPathCtx = null;
    }
    private function getXPathObj()
    {
        if (!(empty($this->xPathCtx) && !empty($this->sigNode))) {
            goto NB;
        }
        $lm = new DOMXPath($this->sigNode->ownerDocument);
        $lm->registerNamespace("\x73\x65\143\144\x73\151\x67", self::XMLDSIGNS);
        $this->xPathCtx = $lm;
        NB:
        return $this->xPathCtx;
    }
    public static function generateGUID($DS = "\x70\146\170")
    {
        $Sy = md5(uniqid(mt_rand(), true));
        $Ib = $DS . substr($Sy, 0, 8) . "\x2d" . substr($Sy, 8, 4) . "\x2d" . substr($Sy, 12, 4) . "\x2d" . substr($Sy, 16, 4) . "\x2d" . substr($Sy, 20, 12);
        return $Ib;
    }
    public static function generate_GUID($DS = "\x70\146\170")
    {
        return self::generateGUID($DS);
    }
    public function locateSignature($e8, $mi = 0)
    {
        if ($e8 instanceof DOMDocument) {
            goto nn;
        }
        $JR = $e8->ownerDocument;
        goto eg;
        nn:
        $JR = $e8;
        eg:
        if (!$JR) {
            goto No;
        }
        $lm = new DOMXPath($JR);
        $lm->registerNamespace("\163\145\143\x64\163\151\x67", self::XMLDSIGNS);
        $xK = "\56\x2f\57\x73\145\143\x64\163\x69\x67\72\x53\151\147\x6e\141\164\165\x72\x65";
        $PF = $lm->query($xK, $e8);
        $this->sigNode = $PF->item($mi);
        $xK = "\56\57\163\x65\x63\144\x73\151\147\x3a\x53\x69\x67\156\x65\x64\111\156\x66\157";
        $PF = $lm->query($xK, $this->sigNode);
        if (!($PF->length > 1)) {
            goto dq;
        }
        throw new Exception("\x49\x6e\166\141\x6c\151\144\40\163\x74\x72\165\143\164\x75\162\x65\40\x2d\x20\124\x6f\157\40\155\x61\156\171\40\123\151\147\156\145\x64\x49\156\146\157\40\x65\x6c\145\x6d\x65\x6e\x74\x73\x20\x66\157\x75\x6e\x64");
        dq:
        return $this->sigNode;
        No:
        return null;
    }
    public function createNewSignNode($lK, $x9 = null)
    {
        $JR = $this->sigNode->ownerDocument;
        if (!is_null($x9)) {
            goto F0;
        }
        $Ak = $JR->createElementNS(self::XMLDSIGNS, $this->prefix . $lK);
        goto QP;
        F0:
        $Ak = $JR->createElementNS(self::XMLDSIGNS, $this->prefix . $lK, $x9);
        QP:
        return $Ak;
    }
    public function setCanonicalMethod($Hu)
    {
        switch ($Hu) {
            case "\x68\164\164\160\72\57\57\x77\x77\x77\x2e\167\63\x2e\157\x72\147\x2f\x54\122\x2f\62\x30\x30\x31\57\x52\x45\103\x2d\170\155\154\55\143\x31\64\156\55\62\60\x30\x31\60\63\61\x35":
            case "\150\x74\164\x70\x3a\57\57\167\x77\x77\56\x77\63\56\157\x72\147\57\124\x52\x2f\x32\60\x30\x31\x2f\122\x45\x43\x2d\x78\155\154\x2d\143\x31\x34\x6e\55\x32\x30\x30\61\60\x33\61\x35\43\127\x69\164\150\x43\x6f\x6d\x6d\145\156\x74\163":
            case "\150\x74\164\160\72\57\x2f\x77\167\x77\56\167\63\56\x6f\x72\x67\57\x32\x30\x30\x31\57\x31\x30\x2f\170\155\x6c\x2d\145\170\x63\x2d\x63\x31\x34\156\43":
            case "\x68\164\164\x70\x3a\x2f\57\x77\x77\167\x2e\167\63\56\157\162\x67\57\x32\60\x30\61\x2f\61\60\57\x78\155\x6c\55\x65\170\x63\x2d\x63\61\64\156\x23\127\151\164\150\103\x6f\155\x6d\x65\x6e\164\x73":
                $this->canonicalMethod = $Hu;
                goto O_;
            default:
                throw new Exception("\111\x6e\166\141\x6c\151\x64\40\x43\141\x6e\x6f\x6e\x69\x63\141\154\40\115\145\x74\x68\157\x64");
        }
        Mv:
        O_:
        if (!($lm = $this->getXPathObj())) {
            goto nk;
        }
        $xK = "\56\57" . $this->searchpfx . "\72\123\x69\147\x6e\x65\144\111\x6e\x66\x6f";
        $PF = $lm->query($xK, $this->sigNode);
        if (!($FQ = $PF->item(0))) {
            goto X6;
        }
        $xK = "\56\x2f" . $this->searchpfx . "\x43\141\x6e\x6f\x6e\x69\143\141\154\x69\x7a\x61\x74\x69\x6f\x6e\x4d\145\164\x68\x6f\x64";
        $PF = $lm->query($xK, $FQ);
        if ($Rx = $PF->item(0)) {
            goto IQ;
        }
        $Rx = $this->createNewSignNode("\x43\x61\156\157\x6e\x69\x63\x61\154\x69\x7a\x61\x74\x69\157\x6e\115\x65\164\x68\157\144");
        $FQ->insertBefore($Rx, $FQ->firstChild);
        IQ:
        $Rx->setAttribute("\101\x6c\147\157\162\x69\x74\150\x6d", $this->canonicalMethod);
        X6:
        nk:
    }
    private function canonicalizeData($Ak, $sq, $w6 = null, $iT = null)
    {
        $q6 = false;
        $S0 = false;
        switch ($sq) {
            case "\150\164\164\160\72\x2f\x2f\167\x77\x77\56\167\63\x2e\157\x72\147\x2f\124\122\57\62\x30\60\61\57\122\105\x43\x2d\x78\x6d\154\x2d\143\61\x34\x6e\55\62\x30\x30\x31\60\63\61\x35":
                $q6 = false;
                $S0 = false;
                goto IU;
            case "\150\164\164\160\72\57\x2f\x77\x77\167\56\167\x33\56\x6f\162\147\x2f\x54\x52\57\62\60\x30\61\x2f\122\105\x43\x2d\170\155\x6c\55\143\x31\x34\156\55\x32\x30\x30\61\60\63\x31\x35\x23\127\x69\x74\x68\x43\157\155\x6d\x65\x6e\x74\x73":
                $S0 = true;
                goto IU;
            case "\150\x74\164\160\x3a\57\57\167\x77\167\x2e\167\x33\x2e\x6f\162\x67\57\62\x30\x30\61\x2f\61\x30\57\x78\155\x6c\x2d\145\170\143\55\143\61\64\x6e\43":
                $q6 = true;
                goto IU;
            case "\x68\x74\164\x70\72\x2f\57\167\167\167\x2e\x77\63\x2e\x6f\162\147\57\62\x30\x30\61\57\x31\x30\x2f\x78\x6d\x6c\x2d\x65\170\143\55\143\x31\64\x6e\x23\x57\x69\164\x68\103\157\x6d\x6d\145\x6e\164\x73":
                $q6 = true;
                $S0 = true;
                goto IU;
        }
        GD:
        IU:
        if (!(is_null($w6) && $Ak instanceof DOMNode && $Ak->ownerDocument !== null && $Ak->isSameNode($Ak->ownerDocument->documentElement))) {
            goto Ms;
        }
        $lO = $Ak;
        FC:
        if (!($Hn = $lO->previousSibling)) {
            goto fc;
        }
        if (!($Hn->nodeType == XML_PI_NODE || $Hn->nodeType == XML_COMMENT_NODE && $S0)) {
            goto Zw;
        }
        goto fc;
        Zw:
        $lO = $Hn;
        goto FC;
        fc:
        if (!($Hn == null)) {
            goto JR;
        }
        $Ak = $Ak->ownerDocument;
        JR:
        Ms:
        return $Ak->C14N($q6, $S0, $w6, $iT);
    }
    public function canonicalizeSignedInfo()
    {
        $JR = $this->sigNode->ownerDocument;
        $sq = null;
        if (!$JR) {
            goto L1;
        }
        $lm = $this->getXPathObj();
        $xK = "\x2e\x2f\163\x65\143\144\x73\x69\147\x3a\x53\151\x67\x6e\145\144\x49\x6e\146\157";
        $PF = $lm->query($xK, $this->sigNode);
        if (!($PF->length > 1)) {
            goto pV;
        }
        throw new Exception("\x49\x6e\x76\x61\154\151\x64\x20\163\x74\162\x75\x63\164\x75\162\x65\40\55\40\x54\157\157\40\155\141\x6e\171\40\123\151\147\156\145\x64\111\x6e\146\157\x20\x65\x6c\x65\x6d\x65\156\164\x73\40\x66\x6f\165\x6e\144");
        pV:
        if (!($mA = $PF->item(0))) {
            goto SG;
        }
        $xK = "\56\x2f\x73\x65\x63\x64\163\x69\x67\x3a\x43\141\x6e\157\156\x69\x63\x61\x6c\x69\172\x61\x74\151\157\156\x4d\x65\164\x68\x6f\144";
        $PF = $lm->query($xK, $mA);
        $iT = null;
        if (!($Rx = $PF->item(0))) {
            goto Fd;
        }
        $sq = $Rx->getAttribute("\x41\x6c\x67\157\162\x69\x74\150\x6d");
        foreach ($Rx->childNodes as $Ak) {
            if (!($Ak->localName == "\x49\156\143\154\165\163\151\x76\x65\116\141\155\x65\163\x70\141\x63\x65\x73")) {
                goto g3;
            }
            if (!($Qv = $Ak->getAttribute("\x50\162\x65\146\x69\170\x4c\x69\163\164"))) {
                goto f0;
            }
            $Ey = array_filter(explode("\40", $Qv));
            if (!(count($Ey) > 0)) {
                goto S3;
            }
            $iT = array_merge($iT ? $iT : array(), $Ey);
            S3:
            f0:
            g3:
            RE:
        }
        Jy:
        Fd:
        $this->signedInfo = $this->canonicalizeData($mA, $sq, null, $iT);
        return $this->signedInfo;
        SG:
        L1:
        return null;
    }
    public function calculateDigest($BW, $pm, $Rj = true)
    {
        switch ($BW) {
            case self::SHA1:
                $l6 = "\163\150\x61\x31";
                goto Iq;
            case self::SHA256:
                $l6 = "\x73\x68\x61\62\65\x36";
                goto Iq;
            case self::SHA384:
                $l6 = "\163\150\141\63\x38\x34";
                goto Iq;
            case self::SHA512:
                $l6 = "\163\150\x61\65\61\x32";
                goto Iq;
            case self::RIPEMD160:
                $l6 = "\162\151\160\145\155\x64\x31\66\x30";
                goto Iq;
            default:
                throw new Exception("\x43\x61\156\x6e\157\164\x20\166\141\154\151\x64\141\x74\x65\40\144\151\x67\x65\163\x74\x3a\40\125\156\163\165\x70\x70\157\162\164\x65\144\x20\x41\154\x67\157\162\151\164\150\x6d\40\74{$BW}\76");
        }
        og:
        Iq:
        $Kl = hash($l6, $pm, true);
        if (!$Rj) {
            goto GA;
        }
        $Kl = base64_encode($Kl);
        GA:
        return $Kl;
    }
    public function validateDigest($Qi, $pm)
    {
        $lm = new DOMXPath($Qi->ownerDocument);
        $lm->registerNamespace("\x73\145\143\144\163\151\147", self::XMLDSIGNS);
        $xK = "\163\164\162\151\156\x67\x28\56\57\x73\145\143\x64\x73\x69\147\x3a\104\151\x67\145\x73\x74\115\x65\164\x68\157\x64\x2f\100\101\x6c\147\x6f\x72\151\x74\150\155\x29";
        $BW = $lm->evaluate($xK, $Qi);
        $ZB = $this->calculateDigest($BW, $pm, false);
        $xK = "\x73\x74\x72\x69\156\147\50\56\57\x73\x65\143\144\x73\151\147\x3a\x44\151\x67\145\x73\164\126\141\154\165\x65\x29";
        $Qd = $lm->evaluate($xK, $Qi);
        return $ZB === base64_decode($Qd);
    }
    public function processTransforms($Qi, $Gb, $O2 = true)
    {
        $pm = $Gb;
        $lm = new DOMXPath($Qi->ownerDocument);
        $lm->registerNamespace("\x73\145\143\x64\x73\151\147", self::XMLDSIGNS);
        $xK = "\x2e\57\163\x65\143\144\x73\x69\147\72\124\162\141\156\163\x66\157\x72\155\x73\x2f\163\145\143\x64\163\151\147\72\x54\162\141\156\163\146\157\x72\155";
        $Q5 = $lm->query($xK, $Qi);
        $Qu = "\150\x74\164\160\72\x2f\57\x77\167\x77\x2e\x77\x33\56\x6f\x72\147\57\x54\x52\57\62\60\x30\61\57\122\x45\x43\55\x78\155\154\x2d\x63\x31\64\156\x2d\x32\60\60\61\60\x33\61\x35";
        $w6 = null;
        $iT = null;
        foreach ($Q5 as $XR) {
            $An = $XR->getAttribute("\x41\x6c\147\157\x72\x69\x74\150\x6d");
            switch ($An) {
                case "\x68\164\x74\x70\x3a\x2f\x2f\167\x77\x77\x2e\167\x33\x2e\157\162\147\57\62\60\x30\61\x2f\61\x30\x2f\x78\155\x6c\55\x65\170\143\x2d\143\x31\64\156\x23":
                case "\150\x74\164\x70\x3a\57\x2f\x77\167\x77\56\x77\x33\x2e\x6f\162\x67\57\x32\60\60\x31\x2f\61\60\x2f\170\x6d\154\55\x65\170\x63\x2d\x63\x31\x34\156\43\x57\x69\164\150\x43\x6f\x6d\x6d\x65\156\x74\163":
                    if (!$O2) {
                        goto wK;
                    }
                    $Qu = $An;
                    goto Rz;
                    wK:
                    $Qu = "\x68\164\x74\x70\72\57\57\x77\x77\x77\56\x77\63\x2e\157\x72\x67\57\x32\x30\x30\x31\x2f\x31\x30\57\x78\x6d\154\x2d\145\170\143\55\143\x31\x34\156\43";
                    Rz:
                    $Ak = $XR->firstChild;
                    rB:
                    if (!$Ak) {
                        goto iz;
                    }
                    if (!($Ak->localName == "\x49\156\143\x6c\x75\163\151\166\x65\x4e\141\155\x65\163\x70\141\143\145\163")) {
                        goto sf;
                    }
                    if (!($Qv = $Ak->getAttribute("\120\162\x65\146\151\x78\114\151\x73\164"))) {
                        goto bZ;
                    }
                    $Ey = array();
                    $Z4 = explode("\x20", $Qv);
                    foreach ($Z4 as $Qv) {
                        $wM = trim($Qv);
                        if (empty($wM)) {
                            goto jL;
                        }
                        $Ey[] = $wM;
                        jL:
                        Bc:
                    }
                    Pe:
                    if (!(count($Ey) > 0)) {
                        goto XA;
                    }
                    $iT = $Ey;
                    XA:
                    bZ:
                    goto iz;
                    sf:
                    $Ak = $Ak->nextSibling;
                    goto rB;
                    iz:
                    goto fK;
                case "\150\x74\164\160\x3a\x2f\57\167\x77\167\x2e\167\x33\x2e\157\162\147\x2f\x54\122\57\x32\x30\x30\61\57\x52\x45\x43\55\x78\155\154\55\143\x31\x34\156\55\x32\60\60\x31\x30\x33\61\65":
                case "\150\164\x74\x70\72\x2f\57\x77\x77\167\x2e\167\63\x2e\x6f\x72\147\57\x54\122\57\x32\x30\60\61\57\x52\x45\103\x2d\170\155\x6c\55\x63\61\x34\156\x2d\62\x30\60\61\60\63\61\x35\43\127\x69\164\150\103\157\155\155\145\156\164\x73":
                    if (!$O2) {
                        goto Vg;
                    }
                    $Qu = $An;
                    goto Tl;
                    Vg:
                    $Qu = "\150\x74\x74\160\x3a\x2f\57\167\167\167\x2e\167\x33\56\x6f\162\147\x2f\124\122\57\62\60\x30\61\57\122\x45\103\x2d\x78\x6d\x6c\x2d\143\x31\x34\156\55\62\60\60\x31\x30\63\61\x35";
                    Tl:
                    goto fK;
                case "\150\x74\x74\x70\x3a\57\57\x77\167\x77\56\167\63\56\x6f\x72\147\57\124\122\x2f\x31\x39\71\71\57\122\x45\103\55\x78\160\x61\164\150\x2d\x31\x39\71\71\61\x31\x31\x36":
                    $Ak = $XR->firstChild;
                    Rw:
                    if (!$Ak) {
                        goto i1;
                    }
                    if (!($Ak->localName == "\130\120\141\x74\x68")) {
                        goto cK;
                    }
                    $w6 = array();
                    $w6["\x71\x75\145\162\171"] = "\50\x2e\57\57\56\x20\x7c\x20\x2e\x2f\x2f\x40\x2a\x20\x7c\40\x2e\x2f\x2f\x6e\x61\155\x65\163\160\x61\143\145\72\x3a\x2a\x29\x5b" . $Ak->nodeValue . "\x5d";
                    $w6["\x6e\x61\x6d\x65\x73\x70\141\x63\x65\163"] = array();
                    $vP = $lm->query("\x2e\x2f\x6e\141\x6d\x65\163\x70\141\x63\145\x3a\72\x2a", $Ak);
                    foreach ($vP as $YM) {
                        if (!($YM->localName != "\x78\x6d\154")) {
                            goto fT;
                        }
                        $w6["\156\x61\155\x65\163\x70\141\143\x65\x73"][$YM->localName] = $YM->nodeValue;
                        fT:
                        jN:
                    }
                    Oc:
                    goto i1;
                    cK:
                    $Ak = $Ak->nextSibling;
                    goto Rw;
                    i1:
                    goto fK;
            }
            XM:
            fK:
            cq:
        }
        e8:
        if (!$pm instanceof DOMNode) {
            goto hr;
        }
        $pm = $this->canonicalizeData($Gb, $Qu, $w6, $iT);
        hr:
        return $pm;
    }
    public function processRefNode($Qi)
    {
        $G6 = null;
        $O2 = true;
        if ($AY = $Qi->getAttribute("\125\x52\x49")) {
            goto f6;
        }
        $O2 = false;
        $G6 = $Qi->ownerDocument;
        goto xZ;
        f6:
        $zE = parse_url($AY);
        if (!empty($zE["\x70\x61\164\150"])) {
            goto ae;
        }
        if ($PN = $zE["\146\162\x61\x67\155\x65\156\x74"]) {
            goto DT;
        }
        $G6 = $Qi->ownerDocument;
        goto kU;
        DT:
        $O2 = false;
        $Gy = new DOMXPath($Qi->ownerDocument);
        if (!($this->idNS && is_array($this->idNS))) {
            goto aK;
        }
        foreach ($this->idNS as $DE => $mW) {
            $Gy->registerNamespace($DE, $mW);
            jY:
        }
        hj:
        aK:
        $iW = "\x40\x49\144\x3d\42" . XPath::filterAttrValue($PN, XPath::DOUBLE_QUOTE) . "\42";
        if (!is_array($this->idKeys)) {
            goto Z_;
        }
        foreach ($this->idKeys as $LX) {
            $iW .= "\40\157\162\40\100" . XPath::filterAttrName($LX) . "\x3d\x22" . XPath::filterAttrValue($PN, XPath::DOUBLE_QUOTE) . "\x22";
            Xl:
        }
        xa:
        Z_:
        $xK = "\x2f\x2f\52\x5b" . $iW . "\x5d";
        $G6 = $Gy->query($xK)->item(0);
        kU:
        ae:
        xZ:
        $pm = $this->processTransforms($Qi, $G6, $O2);
        if ($this->validateDigest($Qi, $pm)) {
            goto CF;
        }
        return false;
        CF:
        if (!$G6 instanceof DOMNode) {
            goto Du;
        }
        if (!empty($PN)) {
            goto hR;
        }
        $this->validatedNodes[] = $G6;
        goto DF;
        hR:
        $this->validatedNodes[$PN] = $G6;
        DF:
        Du:
        return true;
    }
    public function getRefNodeID($Qi)
    {
        if (!($AY = $Qi->getAttribute("\x55\122\x49"))) {
            goto HO;
        }
        $zE = parse_url($AY);
        if (!empty($zE["\160\x61\x74\150"])) {
            goto es;
        }
        if (!($PN = $zE["\146\162\141\x67\155\145\x6e\164"])) {
            goto MQ;
        }
        return $PN;
        MQ:
        es:
        HO:
        return null;
    }
    public function getRefIDs()
    {
        $s1 = array();
        $lm = $this->getXPathObj();
        $xK = "\56\57\163\145\143\144\163\151\147\x3a\123\x69\x67\156\145\144\x49\156\146\157\133\x31\x5d\57\163\145\x63\x64\x73\x69\x67\72\122\x65\x66\x65\x72\x65\156\143\x65";
        $PF = $lm->query($xK, $this->sigNode);
        if (!($PF->length == 0)) {
            goto Wc;
        }
        throw new Exception("\122\x65\x66\x65\x72\145\156\x63\145\40\x6e\x6f\x64\145\x73\x20\x6e\x6f\x74\x20\146\x6f\x75\x6e\144");
        Wc:
        foreach ($PF as $Qi) {
            $s1[] = $this->getRefNodeID($Qi);
            Z1:
        }
        WK:
        return $s1;
    }
    public function validateReference()
    {
        $uW = $this->sigNode->ownerDocument->documentElement;
        if ($uW->isSameNode($this->sigNode)) {
            goto XR;
        }
        if (!($this->sigNode->parentNode != null)) {
            goto mj;
        }
        $this->sigNode->parentNode->removeChild($this->sigNode);
        mj:
        XR:
        $lm = $this->getXPathObj();
        $xK = "\56\x2f\x73\x65\x63\x64\x73\x69\147\72\123\x69\147\x6e\145\x64\111\156\146\x6f\x5b\x31\x5d\x2f\x73\x65\143\x64\163\x69\x67\x3a\x52\145\x66\145\x72\145\156\x63\x65";
        $PF = $lm->query($xK, $this->sigNode);
        if (!($PF->length == 0)) {
            goto wL;
        }
        throw new Exception("\x52\145\x66\145\x72\145\x6e\x63\x65\40\156\x6f\x64\x65\x73\x20\x6e\x6f\x74\40\x66\157\x75\156\144");
        wL:
        $this->validatedNodes = array();
        foreach ($PF as $Qi) {
            if ($this->processRefNode($Qi)) {
                goto lb;
            }
            $this->validatedNodes = null;
            throw new Exception("\x52\x65\146\145\x72\145\x6e\x63\x65\x20\x76\x61\154\x69\x64\x61\x74\x69\x6f\x6e\x20\146\141\x69\x6c\145\x64");
            lb:
            MI:
        }
        fZ:
        return true;
    }
    private function addRefInternal($cl, $Ak, $An, $vH = null, $Li = null)
    {
        $DS = null;
        $hg = null;
        $oq = "\111\144";
        $VN = true;
        $zQ = false;
        if (!is_array($Li)) {
            goto U2;
        }
        $DS = empty($Li["\x70\x72\145\x66\151\x78"]) ? null : $Li["\x70\162\x65\146\x69\170"];
        $hg = empty($Li["\160\x72\x65\146\x69\x78\x5f\156\x73"]) ? null : $Li["\x70\162\x65\x66\x69\x78\x5f\x6e\163"];
        $oq = empty($Li["\x69\x64\137\156\141\x6d\x65"]) ? "\111\144" : $Li["\x69\144\137\x6e\x61\155\x65"];
        $VN = !isset($Li["\157\166\145\x72\x77\x72\x69\x74\145"]) ? true : (bool) $Li["\157\x76\145\162\167\x72\151\x74\145"];
        $zQ = !isset($Li["\x66\157\162\x63\x65\137\165\x72\151"]) ? false : (bool) $Li["\x66\157\162\x63\x65\137\165\x72\151"];
        U2:
        $t7 = $oq;
        if (empty($DS)) {
            goto bc;
        }
        $t7 = $DS . "\x3a" . $t7;
        bc:
        $Qi = $this->createNewSignNode("\x52\x65\x66\x65\162\145\x6e\143\x65");
        $cl->appendChild($Qi);
        if (!$Ak instanceof DOMDocument) {
            goto Ck;
        }
        if ($zQ) {
            goto sS;
        }
        goto Ev;
        Ck:
        $AY = null;
        if ($VN) {
            goto Kg;
        }
        $AY = $hg ? $Ak->getAttributeNS($hg, $oq) : $Ak->getAttribute($oq);
        Kg:
        if (!empty($AY)) {
            goto y5;
        }
        $AY = self::generateGUID();
        $Ak->setAttributeNS($hg, $t7, $AY);
        y5:
        $Qi->setAttribute("\x55\122\x49", "\43" . $AY);
        goto Ev;
        sS:
        $Qi->setAttribute("\x55\x52\111", '');
        Ev:
        $sr = $this->createNewSignNode("\124\x72\x61\x6e\x73\146\x6f\162\x6d\163");
        $Qi->appendChild($sr);
        if (is_array($vH)) {
            goto Oj;
        }
        if (!empty($this->canonicalMethod)) {
            goto O3;
        }
        goto Kp;
        Oj:
        foreach ($vH as $XR) {
            $EO = $this->createNewSignNode("\x54\162\141\156\163\146\x6f\162\x6d");
            $sr->appendChild($EO);
            if (is_array($XR) && !empty($XR["\150\x74\x74\x70\72\x2f\57\167\x77\167\56\167\x33\56\157\x72\147\57\x54\122\x2f\61\x39\71\x39\x2f\122\x45\103\x2d\x78\x70\141\164\150\x2d\x31\x39\71\x39\x31\61\x31\66"]) && !empty($XR["\150\x74\x74\160\72\x2f\x2f\167\167\167\x2e\167\63\x2e\157\x72\147\57\x54\x52\x2f\61\x39\x39\71\57\122\x45\x43\55\170\x70\x61\x74\x68\x2d\x31\x39\x39\x39\x31\x31\61\x36"]["\161\165\x65\162\x79"])) {
                goto bS;
            }
            $EO->setAttribute("\x41\154\147\157\162\x69\x74\x68\155", $XR);
            goto pl;
            bS:
            $EO->setAttribute("\x41\x6c\x67\x6f\162\x69\164\x68\155", "\150\x74\164\x70\72\57\x2f\x77\x77\x77\56\167\63\56\157\x72\147\x2f\124\x52\x2f\61\71\71\x39\x2f\122\105\103\x2d\x78\160\141\164\x68\x2d\61\x39\x39\x39\x31\61\61\66");
            $pG = $this->createNewSignNode("\x58\x50\141\x74\150", $XR["\150\164\x74\x70\72\x2f\57\167\x77\167\x2e\x77\63\56\157\162\x67\x2f\x54\x52\x2f\61\x39\x39\71\57\x52\x45\x43\55\x78\160\141\164\150\x2d\x31\x39\71\71\61\x31\61\66"]["\x71\x75\145\x72\x79"]);
            $EO->appendChild($pG);
            if (empty($XR["\150\x74\164\160\x3a\57\57\x77\167\167\56\167\63\x2e\157\162\x67\x2f\x54\x52\x2f\x31\71\71\71\x2f\x52\105\103\x2d\x78\160\141\x74\x68\x2d\x31\71\x39\x39\61\x31\61\66"]["\x6e\x61\155\145\x73\x70\141\x63\145\163"])) {
                goto R_;
            }
            foreach ($XR["\x68\x74\x74\160\72\57\57\167\x77\167\56\x77\63\x2e\x6f\162\147\x2f\124\122\x2f\x31\71\71\x39\57\x52\105\103\55\170\x70\141\164\x68\55\61\71\71\x39\x31\x31\61\66"]["\x6e\x61\x6d\145\163\x70\x61\143\x65\x73"] as $DS => $lg) {
                $pG->setAttributeNS("\150\x74\x74\160\72\57\x2f\167\x77\x77\56\x77\63\56\x6f\x72\147\57\62\60\60\60\x2f\170\155\154\156\x73\57", "\x78\x6d\x6c\156\x73\72{$DS}", $lg);
                v1:
            }
            Mw:
            R_:
            pl:
            HN:
        }
        tJ:
        goto Kp;
        O3:
        $EO = $this->createNewSignNode("\124\162\141\156\163\146\157\x72\155");
        $sr->appendChild($EO);
        $EO->setAttribute("\101\x6c\x67\x6f\162\151\164\150\x6d", $this->canonicalMethod);
        Kp:
        $ob = $this->processTransforms($Qi, $Ak);
        $ZB = $this->calculateDigest($An, $ob);
        $s0 = $this->createNewSignNode("\x44\151\x67\x65\163\x74\x4d\145\164\x68\x6f\x64");
        $Qi->appendChild($s0);
        $s0->setAttribute("\101\154\147\x6f\162\x69\x74\150\155", $An);
        $Qd = $this->createNewSignNode("\x44\x69\147\145\163\x74\x56\x61\154\165\x65", $ZB);
        $Qi->appendChild($Qd);
    }
    public function addReference($Ak, $An, $vH = null, $Li = null)
    {
        if (!($lm = $this->getXPathObj())) {
            goto eR;
        }
        $xK = "\56\57\x73\x65\143\144\x73\x69\147\x3a\x53\x69\x67\x6e\145\144\111\x6e\x66\x6f";
        $PF = $lm->query($xK, $this->sigNode);
        if (!($AS = $PF->item(0))) {
            goto ui;
        }
        $this->addRefInternal($AS, $Ak, $An, $vH, $Li);
        ui:
        eR:
    }
    public function addReferenceList($E4, $An, $vH = null, $Li = null)
    {
        if (!($lm = $this->getXPathObj())) {
            goto ok;
        }
        $xK = "\x2e\57\163\145\x63\144\x73\x69\x67\72\123\151\147\x6e\145\x64\x49\156\146\157";
        $PF = $lm->query($xK, $this->sigNode);
        if (!($AS = $PF->item(0))) {
            goto Y6;
        }
        foreach ($E4 as $Ak) {
            $this->addRefInternal($AS, $Ak, $An, $vH, $Li);
            iZ:
        }
        u4:
        Y6:
        ok:
    }
    public function addObject($pm, $Mj = null, $bJ = null)
    {
        $O1 = $this->createNewSignNode("\117\x62\152\145\x63\x74");
        $this->sigNode->appendChild($O1);
        if (empty($Mj)) {
            goto Q9;
        }
        $O1->setAttribute("\x4d\x69\x6d\x65\x54\x79\160\x65", $Mj);
        Q9:
        if (empty($bJ)) {
            goto AC;
        }
        $O1->setAttribute("\x45\156\143\157\x64\x69\x6e\147", $bJ);
        AC:
        if ($pm instanceof DOMElement) {
            goto rl;
        }
        $G0 = $this->sigNode->ownerDocument->createTextNode($pm);
        goto Zp;
        rl:
        $G0 = $this->sigNode->ownerDocument->importNode($pm, true);
        Zp:
        $O1->appendChild($G0);
        return $O1;
    }
    public function locateKey($Ak = null)
    {
        if (!empty($Ak)) {
            goto Qs;
        }
        $Ak = $this->sigNode;
        Qs:
        if ($Ak instanceof DOMNode) {
            goto oP;
        }
        return null;
        oP:
        if (!($JR = $Ak->ownerDocument)) {
            goto WA;
        }
        $lm = new DOMXPath($JR);
        $lm->registerNamespace("\163\x65\143\144\x73\151\147", self::XMLDSIGNS);
        $xK = "\163\x74\x72\x69\x6e\147\50\x2e\57\x73\x65\143\x64\x73\x69\147\x3a\123\x69\147\156\145\144\x49\156\x66\x6f\x2f\163\x65\x63\x64\x73\151\x67\x3a\x53\151\147\x6e\141\x74\165\162\145\115\x65\164\x68\157\144\x2f\x40\101\x6c\x67\x6f\x72\151\x74\x68\155\51";
        $An = $lm->evaluate($xK, $Ak);
        if (!$An) {
            goto j1;
        }
        try {
            $mS = new XMLSecurityKey($An, array("\164\x79\160\145" => "\x70\165\142\154\x69\x63"));
        } catch (Exception $Tr) {
            return null;
        }
        return $mS;
        j1:
        WA:
        return null;
    }
    public function verify($mS)
    {
        $JR = $this->sigNode->ownerDocument;
        $lm = new DOMXPath($JR);
        $lm->registerNamespace("\163\145\x63\x64\163\151\x67", self::XMLDSIGNS);
        $xK = "\163\164\162\x69\x6e\x67\50\56\57\163\145\x63\x64\163\151\147\x3a\x53\151\147\156\141\x74\x75\x72\145\126\x61\154\165\145\51";
        $vE = $lm->evaluate($xK, $this->sigNode);
        if (!empty($vE)) {
            goto Ul;
        }
        throw new Exception("\125\x6e\141\x62\x6c\x65\40\x74\x6f\40\154\157\143\141\164\145\40\123\x69\147\156\141\x74\165\x72\145\x56\x61\154\x75\145");
        Ul:
        return $mS->verifySignature($this->signedInfo, base64_decode($vE));
    }
    public function signData($mS, $pm)
    {
        return $mS->signData($pm);
    }
    public function sign($mS, $so = null)
    {
        if (!($so != null)) {
            goto Of;
        }
        $this->resetXPathObj();
        $this->appendSignature($so);
        $this->sigNode = $so->lastChild;
        Of:
        if (!($lm = $this->getXPathObj())) {
            goto oK;
        }
        $xK = "\56\57\x73\x65\143\144\x73\x69\147\72\x53\151\x67\156\x65\144\x49\156\x66\157";
        $PF = $lm->query($xK, $this->sigNode);
        if (!($AS = $PF->item(0))) {
            goto Ib;
        }
        $xK = "\56\57\x73\x65\x63\144\x73\x69\x67\x3a\123\x69\147\x6e\x61\x74\x75\x72\x65\x4d\x65\164\150\x6f\x64";
        $PF = $lm->query($xK, $AS);
        $ul = $PF->item(0);
        $ul->setAttribute("\101\x6c\x67\x6f\x72\x69\164\150\x6d", $mS->type);
        $pm = $this->canonicalizeData($AS, $this->canonicalMethod);
        $vE = base64_encode($this->signData($mS, $pm));
        $GQ = $this->createNewSignNode("\x53\151\x67\x6e\x61\164\x75\x72\145\x56\x61\154\x75\x65", $vE);
        if ($ct = $AS->nextSibling) {
            goto sM;
        }
        $this->sigNode->appendChild($GQ);
        goto lP;
        sM:
        $ct->parentNode->insertBefore($GQ, $ct);
        lP:
        Ib:
        oK:
    }
    public function appendCert()
    {
    }
    public function appendKey($mS, $Ig = null)
    {
        $mS->serializeKey($Ig);
    }
    public function insertSignature($Ak, $Jf = null)
    {
        $yP = $Ak->ownerDocument;
        $HN = $yP->importNode($this->sigNode, true);
        if ($Jf == null) {
            goto K8;
        }
        return $Ak->insertBefore($HN, $Jf);
        goto Cg;
        K8:
        return $Ak->insertBefore($HN);
        Cg:
    }
    public function appendSignature($s6, $xV = false)
    {
        $Jf = $xV ? $s6->firstChild : null;
        return $this->insertSignature($s6, $Jf);
    }
    public static function get509XCert($V1, $oE = true)
    {
        $S2 = self::staticGet509XCerts($V1, $oE);
        if (empty($S2)) {
            goto Zl;
        }
        return $S2[0];
        Zl:
        return '';
    }
    public static function staticGet509XCerts($S2, $oE = true)
    {
        if ($oE) {
            goto UT;
        }
        return array($S2);
        goto vs;
        UT:
        $pm = '';
        $O3 = array();
        $EQ = explode("\12", $S2);
        $yv = false;
        foreach ($EQ as $oY) {
            if (!$yv) {
                goto d0;
            }
            if (!(strncmp($oY, "\x2d\x2d\x2d\55\x2d\105\116\x44\x20\x43\105\x52\124\x49\x46\111\x43\101\124\105", 20) == 0)) {
                goto NZ;
            }
            $yv = false;
            $O3[] = $pm;
            $pm = '';
            goto BE;
            NZ:
            $pm .= trim($oY);
            goto ml;
            d0:
            if (!(strncmp($oY, "\55\55\x2d\55\x2d\x42\x45\107\x49\116\40\x43\105\122\124\x49\106\111\103\x41\x54\105", 22) == 0)) {
                goto Um;
            }
            $yv = true;
            Um:
            ml:
            BE:
        }
        fo:
        return $O3;
        vs:
    }
    public static function staticAdd509Cert($qz, $V1, $oE = true, $hn = false, $lm = null, $Li = null)
    {
        if (!$hn) {
            goto lt;
        }
        $V1 = file_get_contents($V1);
        lt:
        if ($qz instanceof DOMElement) {
            goto Zf;
        }
        throw new Exception("\x49\x6e\166\x61\x6c\x69\144\40\x70\x61\162\x65\x6e\164\x20\x4e\157\x64\x65\x20\160\141\162\x61\155\x65\x74\145\x72");
        Zf:
        $N8 = $qz->ownerDocument;
        if (!empty($lm)) {
            goto l1;
        }
        $lm = new DOMXPath($qz->ownerDocument);
        $lm->registerNamespace("\x73\x65\143\x64\163\x69\x67", self::XMLDSIGNS);
        l1:
        $xK = "\x2e\57\163\x65\x63\x64\x73\151\147\x3a\113\x65\x79\x49\x6e\146\157";
        $PF = $lm->query($xK, $qz);
        $sO = $PF->item(0);
        $xH = '';
        if (!$sO) {
            goto pg;
        }
        $Qv = $sO->lookupPrefix(self::XMLDSIGNS);
        if (empty($Qv)) {
            goto rz;
        }
        $xH = $Qv . "\x3a";
        rz:
        goto mW;
        pg:
        $Qv = $qz->lookupPrefix(self::XMLDSIGNS);
        if (empty($Qv)) {
            goto uF;
        }
        $xH = $Qv . "\x3a";
        uF:
        $v6 = false;
        $sO = $N8->createElementNS(self::XMLDSIGNS, $xH . "\x4b\145\171\x49\x6e\x66\157");
        $xK = "\x2e\x2f\163\145\x63\x64\x73\x69\x67\72\117\x62\x6a\145\x63\164";
        $PF = $lm->query($xK, $qz);
        if (!($ts = $PF->item(0))) {
            goto JK;
        }
        $ts->parentNode->insertBefore($sO, $ts);
        $v6 = true;
        JK:
        if ($v6) {
            goto Mp;
        }
        $qz->appendChild($sO);
        Mp:
        mW:
        $S2 = self::staticGet509XCerts($V1, $oE);
        $rF = $N8->createElementNS(self::XMLDSIGNS, $xH . "\x58\x35\60\x39\104\x61\x74\x61");
        $sO->appendChild($rF);
        $w_ = false;
        $ub = false;
        if (!is_array($Li)) {
            goto nb;
        }
        if (empty($Li["\x69\163\x73\165\145\x72\x53\145\x72\151\141\x6c"])) {
            goto ff;
        }
        $w_ = true;
        ff:
        if (empty($Li["\163\x75\x62\x6a\145\x63\164\x4e\x61\x6d\x65"])) {
            goto WQ;
        }
        $ub = true;
        WQ:
        nb:
        foreach ($S2 as $nx) {
            if (!($w_ || $ub)) {
                goto xO;
            }
            if (!($ek = openssl_x509_parse("\x2d\55\55\x2d\55\x42\105\x47\x49\116\x20\x43\105\122\124\x49\106\111\103\101\x54\x45\x2d\x2d\x2d\55\x2d\12" . chunk_split($nx, 64, "\xa") . "\x2d\55\55\55\x2d\x45\116\x44\x20\103\105\122\124\111\x46\111\103\101\x54\105\x2d\x2d\x2d\x2d\x2d\12"))) {
                goto PW;
            }
            if (!($ub && !empty($ek["\163\165\142\x6a\145\x63\164"]))) {
                goto OM;
            }
            if (is_array($ek["\x73\x75\x62\152\x65\143\164"])) {
                goto Hl;
            }
            $CS = $ek["\151\163\163\165\x65\x72"];
            goto pN;
            Hl:
            $zG = array();
            foreach ($ek["\x73\x75\x62\x6a\x65\143\164"] as $N5 => $x9) {
                if (is_array($x9)) {
                    goto sn;
                }
                array_unshift($zG, "{$N5}\75{$x9}");
                goto In;
                sn:
                foreach ($x9 as $z1) {
                    array_unshift($zG, "{$N5}\75{$z1}");
                    hQ:
                }
                wf:
                In:
                fQ:
            }
            OA:
            $CS = implode("\x2c", $zG);
            pN:
            $Q8 = $N8->createElementNS(self::XMLDSIGNS, $xH . "\130\65\x30\71\x53\x75\x62\x6a\145\143\164\116\141\155\145", $CS);
            $rF->appendChild($Q8);
            OM:
            if (!($w_ && !empty($ek["\151\163\x73\x75\145\162"]) && !empty($ek["\x73\x65\162\x69\x61\x6c\116\x75\x6d\x62\x65\x72"]))) {
                goto WH;
            }
            if (is_array($ek["\151\163\x73\x75\145\x72"])) {
                goto Qe;
            }
            $YR = $ek["\x69\x73\163\x75\x65\x72"];
            goto Tr;
            Qe:
            $zG = array();
            foreach ($ek["\151\163\x73\165\x65\162"] as $N5 => $x9) {
                array_unshift($zG, "{$N5}\75{$x9}");
                UA:
            }
            NA:
            $YR = implode("\54", $zG);
            Tr:
            $Qy = $N8->createElementNS(self::XMLDSIGNS, $xH . "\130\65\60\71\x49\x73\163\x75\145\162\123\x65\162\x69\141\154");
            $rF->appendChild($Qy);
            $PY = $N8->createElementNS(self::XMLDSIGNS, $xH . "\x58\x35\60\71\x49\x73\x73\165\145\162\x4e\x61\x6d\145", $YR);
            $Qy->appendChild($PY);
            $PY = $N8->createElementNS(self::XMLDSIGNS, $xH . "\x58\x35\60\x39\x53\145\162\151\x61\154\116\165\155\142\x65\162", $ek["\163\145\162\151\x61\x6c\x4e\x75\x6d\x62\x65\x72"]);
            $Qy->appendChild($PY);
            WH:
            PW:
            xO:
            $y4 = $N8->createElementNS(self::XMLDSIGNS, $xH . "\130\x35\60\71\103\145\162\x74\151\x66\151\143\141\x74\145", $nx);
            $rF->appendChild($y4);
            Uu:
        }
        YG:
    }
    public function add509Cert($V1, $oE = true, $hn = false, $Li = null)
    {
        if (!($lm = $this->getXPathObj())) {
            goto ey;
        }
        self::staticAdd509Cert($this->sigNode, $V1, $oE, $hn, $lm, $Li);
        ey:
    }
    public function appendToKeyInfo($Ak)
    {
        $qz = $this->sigNode;
        $N8 = $qz->ownerDocument;
        $lm = $this->getXPathObj();
        if (!empty($lm)) {
            goto y9;
        }
        $lm = new DOMXPath($qz->ownerDocument);
        $lm->registerNamespace("\x73\x65\x63\144\x73\151\147", self::XMLDSIGNS);
        y9:
        $xK = "\x2e\57\x73\x65\143\x64\163\151\147\72\x4b\145\171\x49\x6e\x66\x6f";
        $PF = $lm->query($xK, $qz);
        $sO = $PF->item(0);
        if ($sO) {
            goto Vi;
        }
        $xH = '';
        $Qv = $qz->lookupPrefix(self::XMLDSIGNS);
        if (empty($Qv)) {
            goto vv;
        }
        $xH = $Qv . "\72";
        vv:
        $v6 = false;
        $sO = $N8->createElementNS(self::XMLDSIGNS, $xH . "\113\145\171\111\156\146\x6f");
        $xK = "\56\57\163\145\x63\144\x73\151\147\x3a\x4f\x62\152\x65\x63\164";
        $PF = $lm->query($xK, $qz);
        if (!($ts = $PF->item(0))) {
            goto pa;
        }
        $ts->parentNode->insertBefore($sO, $ts);
        $v6 = true;
        pa:
        if ($v6) {
            goto ht;
        }
        $qz->appendChild($sO);
        ht:
        Vi:
        $sO->appendChild($Ak);
        return $sO;
    }
    public function getValidatedNodes()
    {
        return $this->validatedNodes;
    }
}
