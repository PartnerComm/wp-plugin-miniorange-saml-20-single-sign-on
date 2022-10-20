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
    const XMLDSIGNS = "\150\164\x74\x70\72\x2f\57\167\x77\167\x2e\x77\63\56\157\162\147\x2f\x32\x30\60\60\57\x30\71\x2f\x78\x6d\154\x64\x73\x69\x67\x23";
    const SHA1 = "\x68\x74\x74\160\x3a\57\57\x77\x77\167\x2e\167\63\x2e\157\x72\x67\57\x32\x30\60\x30\57\60\x39\x2f\x78\155\154\x64\x73\x69\147\43\163\150\x61\x31";
    const SHA256 = "\x68\x74\x74\x70\72\57\x2f\x77\167\x77\56\167\x33\x2e\x6f\162\147\57\x32\x30\60\61\x2f\x30\64\x2f\x78\x6d\154\x65\156\x63\43\x73\x68\x61\62\x35\x36";
    const SHA384 = "\150\x74\x74\160\x3a\x2f\x2f\167\x77\167\x2e\x77\x33\x2e\x6f\162\x67\x2f\62\60\x30\x31\57\x30\64\57\170\x6d\x6c\144\163\151\147\55\x6d\x6f\162\x65\x23\x73\150\141\63\70\x34";
    const SHA512 = "\x68\x74\x74\160\72\x2f\x2f\x77\167\x77\x2e\167\63\56\157\x72\147\x2f\62\x30\x30\61\x2f\60\64\57\x78\x6d\x6c\145\156\x63\x23\163\x68\141\65\61\62";
    const RIPEMD160 = "\x68\164\164\x70\72\57\x2f\x77\x77\x77\56\x77\x33\x2e\x6f\x72\x67\57\62\x30\x30\61\x2f\60\64\x2f\x78\x6d\x6c\x65\x6e\x63\x23\162\151\x70\145\155\x64\x31\x36\60";
    const C14N = "\150\x74\x74\160\x3a\x2f\x2f\x77\167\167\x2e\x77\x33\56\x6f\162\x67\57\124\122\x2f\x32\60\60\x31\57\122\x45\x43\55\x78\x6d\x6c\55\143\x31\64\x6e\55\62\x30\60\x31\60\x33\x31\x35";
    const C14N_COMMENTS = "\x68\x74\164\x70\x3a\x2f\57\167\167\167\x2e\167\x33\56\x6f\162\x67\57\x54\122\x2f\x32\x30\x30\61\57\122\x45\x43\55\x78\x6d\154\x2d\x63\x31\64\156\55\62\60\60\61\60\x33\x31\x35\x23\x57\x69\164\150\103\157\x6d\x6d\145\x6e\x74\x73";
    const EXC_C14N = "\x68\x74\x74\x70\72\x2f\57\x77\x77\x77\56\x77\63\56\157\162\x67\57\x32\x30\60\x31\x2f\61\x30\x2f\170\155\x6c\55\x65\x78\x63\x2d\143\61\x34\156\x23";
    const EXC_C14N_COMMENTS = "\150\x74\x74\x70\72\x2f\x2f\x77\x77\x77\x2e\x77\63\x2e\157\x72\147\x2f\62\x30\x30\61\x2f\x31\60\x2f\x78\155\154\55\x65\x78\x63\55\143\61\64\156\43\x57\151\x74\150\x43\x6f\155\x6d\x65\x6e\x74\x73";
    const template = "\x3c\x64\x73\x3a\x53\x69\147\x6e\x61\164\x75\162\145\x20\x78\x6d\x6c\x6e\x73\x3a\144\163\x3d\x22\150\x74\x74\x70\x3a\57\x2f\x77\167\x77\x2e\x77\x33\56\157\x72\x67\x2f\x32\60\60\x30\57\60\71\57\170\155\x6c\144\163\151\147\43\42\76\xd\12\40\40\74\144\x73\72\123\x69\x67\x6e\x65\x64\x49\156\x66\x6f\76\xd\12\x20\40\x20\x20\74\144\x73\72\123\151\x67\156\x61\164\x75\162\x65\x4d\x65\164\x68\157\x64\x20\x2f\76\15\12\x20\40\x3c\57\144\x73\72\123\x69\147\x6e\x65\144\111\x6e\x66\157\x3e\xd\xa\74\57\x64\x73\72\123\x69\147\156\x61\x74\165\162\x65\76";
    const BASE_TEMPLATE = "\x3c\123\x69\x67\x6e\141\x74\165\162\145\40\170\x6d\154\x6e\x73\x3d\x22\x68\x74\164\x70\72\x2f\x2f\167\167\167\56\167\63\x2e\157\162\147\x2f\62\60\60\60\x2f\x30\71\57\x78\155\154\144\163\151\147\x23\42\x3e\15\xa\x20\x20\74\123\151\x67\x6e\x65\x64\111\x6e\x66\157\x3e\xd\12\x20\x20\40\x20\74\123\151\147\x6e\141\x74\x75\162\145\115\x65\164\150\x6f\x64\40\57\x3e\15\xa\x20\40\x3c\x2f\123\151\147\156\x65\144\111\x6e\146\x6f\x3e\15\12\x3c\57\x53\151\x67\x6e\141\x74\x75\x72\x65\x3e";
    public $sigNode = null;
    public $idKeys = array();
    public $idNS = array();
    private $signedInfo = null;
    private $xPathCtx = null;
    private $canonicalMethod = null;
    private $prefix = '';
    private $searchpfx = "\x73\x65\x63\144\x73\x69\x67";
    private $validatedNodes = null;
    public function __construct($DX = "\144\x73")
    {
        $lS = self::BASE_TEMPLATE;
        if (empty($DX)) {
            goto AN;
        }
        $this->prefix = $DX . "\x3a";
        $Sp = array("\74\x53", "\74\57\x53", "\x78\x6d\x6c\x6e\x73\75");
        $xj = array("\74{$DX}\x3a\x53", "\74\x2f{$DX}\72\x53", "\170\155\154\x6e\163\x3a{$DX}\75");
        $lS = str_replace($Sp, $xj, $lS);
        AN:
        $RM = new DOMDocument();
        $RM->loadXML($lS);
        $this->sigNode = $RM->documentElement;
    }
    private function resetXPathObj()
    {
        $this->xPathCtx = null;
    }
    private function getXPathObj()
    {
        if (!(empty($this->xPathCtx) && !empty($this->sigNode))) {
            goto lF;
        }
        $PQ = new DOMXPath($this->sigNode->ownerDocument);
        $PQ->registerNamespace("\163\x65\143\x64\x73\x69\147", self::XMLDSIGNS);
        $this->xPathCtx = $PQ;
        lF:
        return $this->xPathCtx;
    }
    public static function generateGUID($DX = "\160\146\170")
    {
        $M2 = md5(uniqid(mt_rand(), true));
        $Mm = $DX . substr($M2, 0, 8) . "\55" . substr($M2, 8, 4) . "\x2d" . substr($M2, 12, 4) . "\x2d" . substr($M2, 16, 4) . "\55" . substr($M2, 20, 12);
        return $Mm;
    }
    public static function generate_GUID($DX = "\x70\x66\170")
    {
        return self::generateGUID($DX);
    }
    public function locateSignature($hg, $y5 = 0)
    {
        if ($hg instanceof DOMDocument) {
            goto wD;
        }
        $Ud = $hg->ownerDocument;
        goto FB;
        wD:
        $Ud = $hg;
        FB:
        if (!$Ud) {
            goto Ka;
        }
        $PQ = new DOMXPath($Ud);
        $PQ->registerNamespace("\163\145\143\x64\163\151\147", self::XMLDSIGNS);
        $qX = "\56\x2f\57\163\145\143\144\163\x69\147\x3a\x53\x69\147\156\x61\x74\165\162\145";
        $fM = $PQ->query($qX, $hg);
        $this->sigNode = $fM->item($y5);
        $qX = "\x2e\x2f\x73\x65\x63\x64\163\x69\x67\72\x53\151\x67\156\x65\x64\x49\156\146\157";
        $fM = $PQ->query($qX, $this->sigNode);
        if (!($fM->length > 1)) {
            goto gz;
        }
        throw new Exception("\x49\x6e\166\x61\x6c\151\x64\x20\x73\164\162\x75\x63\x74\165\x72\145\x20\55\x20\124\x6f\x6f\40\x6d\x61\x6e\x79\40\123\151\147\x6e\145\x64\x49\x6e\x66\157\40\x65\x6c\145\155\x65\x6e\164\x73\x20\146\157\165\x6e\x64");
        gz:
        return $this->sigNode;
        Ka:
        return null;
    }
    public function createNewSignNode($JI, $St = null)
    {
        $Ud = $this->sigNode->ownerDocument;
        if (!is_null($St)) {
            goto ZX;
        }
        $Fr = $Ud->createElementNS(self::XMLDSIGNS, $this->prefix . $JI);
        goto EO;
        ZX:
        $Fr = $Ud->createElementNS(self::XMLDSIGNS, $this->prefix . $JI, $St);
        EO:
        return $Fr;
    }
    public function setCanonicalMethod($Hl)
    {
        switch ($Hl) {
            case "\x68\164\x74\160\x3a\x2f\57\x77\167\167\x2e\167\63\56\157\x72\x67\x2f\x54\x52\57\62\60\x30\61\57\x52\105\103\x2d\170\x6d\x6c\55\x63\61\64\x6e\55\x32\60\x30\x31\x30\63\x31\65":
            case "\150\164\x74\160\x3a\57\57\x77\x77\167\56\167\x33\56\x6f\x72\x67\57\124\122\57\62\x30\x30\61\57\122\105\103\x2d\170\x6d\154\x2d\x63\61\x34\x6e\x2d\62\60\60\x31\x30\63\x31\65\x23\x57\x69\164\150\103\157\155\155\x65\x6e\x74\163":
            case "\150\164\x74\x70\72\x2f\x2f\167\167\167\56\x77\x33\56\x6f\162\147\57\62\x30\x30\61\57\61\x30\57\170\155\x6c\x2d\x65\x78\143\55\x63\x31\64\x6e\43":
            case "\x68\164\x74\x70\x3a\57\57\x77\167\167\56\167\x33\56\157\162\x67\57\x32\x30\60\61\57\61\x30\57\170\155\154\55\x65\170\x63\55\143\x31\x34\x6e\43\x57\151\164\x68\x43\157\155\155\145\156\164\163":
                $this->canonicalMethod = $Hl;
                goto Tw;
            default:
                throw new Exception("\x49\156\166\141\154\151\x64\x20\x43\141\x6e\x6f\156\151\143\x61\x6c\x20\115\x65\164\x68\x6f\144");
        }
        vb:
        Tw:
        if (!($PQ = $this->getXPathObj())) {
            goto JW;
        }
        $qX = "\x2e\x2f" . $this->searchpfx . "\x3a\123\x69\x67\156\x65\144\111\x6e\x66\157";
        $fM = $PQ->query($qX, $this->sigNode);
        if (!($L1 = $fM->item(0))) {
            goto ek;
        }
        $qX = "\x2e\57" . $this->searchpfx . "\x43\x61\x6e\x6f\156\x69\x63\141\x6c\151\x7a\x61\x74\x69\x6f\156\115\x65\x74\x68\x6f\144";
        $fM = $PQ->query($qX, $L1);
        if ($gI = $fM->item(0)) {
            goto xV;
        }
        $gI = $this->createNewSignNode("\103\x61\x6e\x6f\156\x69\143\x61\154\151\x7a\x61\x74\151\x6f\x6e\115\x65\x74\150\x6f\144");
        $L1->insertBefore($gI, $L1->firstChild);
        xV:
        $gI->setAttribute("\101\154\x67\157\x72\x69\x74\x68\x6d", $this->canonicalMethod);
        ek:
        JW:
    }
    private function canonicalizeData($Fr, $PK, $rj = null, $rR = null)
    {
        $wL = false;
        $PB = false;
        switch ($PK) {
            case "\x68\x74\164\160\72\x2f\57\x77\167\x77\56\167\x33\56\157\162\x67\x2f\124\x52\57\x32\x30\60\61\57\122\105\103\x2d\170\155\154\55\x63\61\64\156\x2d\x32\60\x30\61\x30\63\x31\65":
                $wL = false;
                $PB = false;
                goto H7;
            case "\x68\164\164\160\72\x2f\x2f\167\x77\167\56\167\x33\56\x6f\x72\147\x2f\x54\x52\x2f\62\x30\x30\61\x2f\x52\105\103\55\x78\x6d\154\55\143\61\x34\156\x2d\x32\x30\60\61\x30\x33\x31\x35\43\127\x69\164\x68\x43\x6f\x6d\155\x65\x6e\164\x73":
                $PB = true;
                goto H7;
            case "\x68\164\x74\160\x3a\57\57\167\167\167\56\x77\63\56\x6f\162\x67\57\x32\60\60\x31\57\x31\x30\57\170\x6d\154\x2d\145\170\143\x2d\143\61\64\156\x23":
                $wL = true;
                goto H7;
            case "\x68\164\x74\x70\x3a\x2f\57\167\167\x77\56\167\x33\x2e\x6f\162\x67\57\x32\60\60\61\57\61\60\x2f\170\155\x6c\55\x65\170\143\55\143\61\x34\x6e\43\127\x69\x74\150\x43\157\155\x6d\145\156\x74\163":
                $wL = true;
                $PB = true;
                goto H7;
        }
        af:
        H7:
        if (!(is_null($rj) && $Fr instanceof DOMNode && $Fr->ownerDocument !== null && $Fr->isSameNode($Fr->ownerDocument->documentElement))) {
            goto BY;
        }
        $gO = $Fr;
        ew:
        if (!($CR = $gO->previousSibling)) {
            goto Qr;
        }
        if (!($CR->nodeType == XML_PI_NODE || $CR->nodeType == XML_COMMENT_NODE && $PB)) {
            goto nu;
        }
        goto Qr;
        nu:
        $gO = $CR;
        goto ew;
        Qr:
        if (!($CR == null)) {
            goto Gs;
        }
        $Fr = $Fr->ownerDocument;
        Gs:
        BY:
        return $Fr->C14N($wL, $PB, $rj, $rR);
    }
    public function canonicalizeSignedInfo()
    {
        $Ud = $this->sigNode->ownerDocument;
        $PK = null;
        if (!$Ud) {
            goto wE;
        }
        $PQ = $this->getXPathObj();
        $qX = "\x2e\57\x73\x65\143\144\163\x69\147\72\x53\151\x67\156\x65\x64\111\x6e\146\157";
        $fM = $PQ->query($qX, $this->sigNode);
        if (!($fM->length > 1)) {
            goto hC;
        }
        throw new Exception("\x49\x6e\166\141\x6c\x69\144\x20\163\x74\162\x75\143\164\165\162\145\x20\55\x20\124\157\x6f\40\155\x61\x6e\x79\x20\123\151\x67\156\145\x64\x49\156\146\x6f\40\145\x6c\145\x6d\x65\x6e\164\163\40\x66\x6f\x75\156\144");
        hC:
        if (!($ch = $fM->item(0))) {
            goto zp;
        }
        $qX = "\56\57\x73\145\143\144\x73\151\x67\x3a\x43\141\x6e\157\x6e\x69\143\x61\154\151\172\141\164\x69\157\156\115\145\x74\150\x6f\144";
        $fM = $PQ->query($qX, $ch);
        $rR = null;
        if (!($gI = $fM->item(0))) {
            goto yx;
        }
        $PK = $gI->getAttribute("\101\x6c\147\x6f\x72\151\164\150\x6d");
        foreach ($gI->childNodes as $Fr) {
            if (!($Fr->localName == "\x49\156\143\154\x75\x73\x69\166\145\x4e\141\x6d\x65\x73\x70\x61\x63\145\163")) {
                goto n9;
            }
            if (!($vy = $Fr->getAttribute("\x50\x72\145\x66\151\x78\114\x69\163\x74"))) {
                goto qW;
            }
            $eV = array_filter(explode("\x20", $vy));
            if (!(count($eV) > 0)) {
                goto Yl;
            }
            $rR = array_merge($rR ? $rR : array(), $eV);
            Yl:
            qW:
            n9:
            mU:
        }
        Rq:
        yx:
        $this->signedInfo = $this->canonicalizeData($ch, $PK, null, $rR);
        return $this->signedInfo;
        zp:
        wE:
        return null;
    }
    public function calculateDigest($Ex, $WL, $vd = true)
    {
        switch ($Ex) {
            case self::SHA1:
                $pL = "\x73\x68\141\x31";
                goto h4;
            case self::SHA256:
                $pL = "\x73\x68\x61\x32\x35\x36";
                goto h4;
            case self::SHA384:
                $pL = "\x73\150\x61\x33\70\x34";
                goto h4;
            case self::SHA512:
                $pL = "\163\x68\141\x35\x31\x32";
                goto h4;
            case self::RIPEMD160:
                $pL = "\162\151\160\x65\x6d\x64\x31\66\60";
                goto h4;
            default:
                throw new Exception("\x43\x61\156\x6e\157\x74\40\x76\141\x6c\151\144\x61\164\145\40\144\x69\x67\x65\163\x74\72\40\125\x6e\163\165\160\x70\157\162\164\145\x64\40\x41\154\147\x6f\x72\151\x74\150\155\x20\x3c{$Ex}\x3e");
        }
        y_:
        h4:
        $Nu = hash($pL, $WL, true);
        if (!$vd) {
            goto j_;
        }
        $Nu = base64_encode($Nu);
        j_:
        return $Nu;
    }
    public function validateDigest($wP, $WL)
    {
        $PQ = new DOMXPath($wP->ownerDocument);
        $PQ->registerNamespace("\x73\145\143\144\x73\151\147", self::XMLDSIGNS);
        $qX = "\x73\x74\162\151\156\x67\50\56\57\163\145\x63\144\163\x69\147\x3a\104\151\x67\x65\x73\x74\x4d\145\x74\x68\157\x64\57\x40\101\x6c\147\x6f\162\x69\x74\150\155\x29";
        $Ex = $PQ->evaluate($qX, $wP);
        $Xr = $this->calculateDigest($Ex, $WL, false);
        $qX = "\163\x74\162\151\x6e\x67\50\x2e\x2f\x73\145\143\144\x73\x69\x67\x3a\x44\151\x67\145\163\x74\x56\141\154\165\145\x29";
        $vt = $PQ->evaluate($qX, $wP);
        return $Xr === base64_decode($vt);
    }
    public function processTransforms($wP, $zf, $tl = true)
    {
        $WL = $zf;
        $PQ = new DOMXPath($wP->ownerDocument);
        $PQ->registerNamespace("\163\x65\x63\144\163\151\147", self::XMLDSIGNS);
        $qX = "\56\x2f\x73\145\x63\144\x73\x69\x67\x3a\124\162\x61\x6e\163\146\157\162\155\163\x2f\x73\x65\143\x64\x73\x69\147\72\x54\x72\x61\x6e\163\146\157\x72\x6d";
        $xY = $PQ->query($qX, $wP);
        $Lf = "\x68\x74\x74\x70\x3a\57\x2f\167\x77\x77\x2e\x77\x33\x2e\x6f\x72\x67\57\124\x52\x2f\x32\x30\x30\61\57\x52\x45\103\x2d\x78\155\x6c\x2d\x63\61\x34\x6e\x2d\x32\x30\x30\61\x30\63\x31\65";
        $rj = null;
        $rR = null;
        foreach ($xY as $dM) {
            $OT = $dM->getAttribute("\101\x6c\x67\157\x72\151\164\x68\155");
            switch ($OT) {
                case "\150\164\x74\x70\x3a\57\x2f\167\167\167\x2e\x77\x33\x2e\x6f\x72\x67\x2f\x32\60\60\x31\x2f\x31\x30\x2f\x78\x6d\154\55\145\170\x63\x2d\x63\x31\64\156\43":
                case "\150\x74\x74\160\x3a\x2f\57\x77\167\x77\x2e\x77\63\x2e\157\162\x67\x2f\x32\x30\x30\61\57\x31\x30\57\170\155\154\x2d\145\170\143\55\143\61\x34\156\43\x57\x69\x74\150\x43\x6f\x6d\155\145\x6e\164\x73":
                    if (!$tl) {
                        goto IS;
                    }
                    $Lf = $OT;
                    goto mt;
                    IS:
                    $Lf = "\150\x74\164\x70\x3a\x2f\x2f\x77\167\x77\x2e\x77\63\56\157\x72\x67\57\62\x30\60\x31\57\x31\x30\x2f\x78\155\x6c\x2d\x65\x78\x63\x2d\x63\x31\64\x6e\43";
                    mt:
                    $Fr = $dM->firstChild;
                    X0:
                    if (!$Fr) {
                        goto WF;
                    }
                    if (!($Fr->localName == "\111\x6e\x63\154\x75\x73\x69\166\145\116\x61\155\145\x73\160\141\x63\145\163")) {
                        goto Xm;
                    }
                    if (!($vy = $Fr->getAttribute("\x50\x72\x65\x66\151\170\114\x69\163\164"))) {
                        goto G8;
                    }
                    $eV = array();
                    $f0 = explode("\x20", $vy);
                    foreach ($f0 as $vy) {
                        $aa = trim($vy);
                        if (empty($aa)) {
                            goto RC;
                        }
                        $eV[] = $aa;
                        RC:
                        Rj:
                    }
                    Hp:
                    if (!(count($eV) > 0)) {
                        goto U0;
                    }
                    $rR = $eV;
                    U0:
                    G8:
                    goto WF;
                    Xm:
                    $Fr = $Fr->nextSibling;
                    goto X0;
                    WF:
                    goto fw;
                case "\150\x74\164\160\x3a\57\57\x77\x77\x77\x2e\167\x33\56\157\x72\147\57\x54\122\57\x32\x30\x30\x31\x2f\x52\105\103\55\x78\155\x6c\x2d\x63\61\64\x6e\x2d\62\x30\60\61\60\x33\61\x35":
                case "\150\164\x74\160\72\57\x2f\167\167\167\56\167\x33\x2e\157\x72\147\57\x54\x52\57\x32\x30\x30\61\x2f\122\x45\x43\x2d\170\155\154\55\143\61\64\x6e\55\62\60\x30\x31\x30\x33\61\65\x23\x57\151\164\150\x43\157\x6d\x6d\x65\x6e\164\163":
                    if (!$tl) {
                        goto AX;
                    }
                    $Lf = $OT;
                    goto uJ;
                    AX:
                    $Lf = "\x68\164\164\x70\x3a\x2f\57\167\x77\167\x2e\x77\63\56\157\x72\147\x2f\124\x52\57\62\60\60\x31\57\122\105\x43\x2d\x78\x6d\x6c\x2d\143\x31\64\x6e\x2d\62\60\60\61\60\63\x31\x35";
                    uJ:
                    goto fw;
                case "\150\164\x74\x70\72\x2f\x2f\x77\x77\x77\x2e\167\x33\x2e\157\x72\147\57\x54\122\x2f\61\71\x39\71\57\x52\x45\x43\x2d\x78\x70\141\164\x68\x2d\61\71\71\x39\x31\61\x31\66":
                    $Fr = $dM->firstChild;
                    I3:
                    if (!$Fr) {
                        goto Hy;
                    }
                    if (!($Fr->localName == "\130\120\141\164\150")) {
                        goto E8;
                    }
                    $rj = array();
                    $rj["\161\x75\x65\162\171"] = "\x28\56\x2f\57\x2e\40\174\x20\x2e\57\x2f\100\x2a\x20\174\40\56\57\x2f\x6e\141\x6d\145\x73\x70\x61\143\145\72\x3a\x2a\51\133" . $Fr->nodeValue . "\135";
                    $rj["\x6e\x61\155\145\163\x70\x61\x63\145\163"] = array();
                    $eB = $PQ->query("\x2e\57\x6e\141\x6d\x65\x73\x70\141\x63\145\72\x3a\x2a", $Fr);
                    foreach ($eB as $sv) {
                        if (!($sv->localName != "\170\x6d\154")) {
                            goto ua;
                        }
                        $rj["\x6e\x61\155\145\x73\160\141\143\145\163"][$sv->localName] = $sv->nodeValue;
                        ua:
                        XL:
                    }
                    B8:
                    goto Hy;
                    E8:
                    $Fr = $Fr->nextSibling;
                    goto I3;
                    Hy:
                    goto fw;
            }
            Q7:
            fw:
            dr:
        }
        vv:
        if (!$WL instanceof DOMNode) {
            goto LH;
        }
        $WL = $this->canonicalizeData($zf, $Lf, $rj, $rR);
        LH:
        return $WL;
    }
    public function processRefNode($wP)
    {
        $Tc = null;
        $tl = true;
        if ($pM = $wP->getAttribute("\x55\122\x49")) {
            goto MY;
        }
        $tl = false;
        $Tc = $wP->ownerDocument;
        goto U6;
        MY:
        $ij = parse_url($pM);
        if (!empty($ij["\160\x61\x74\150"])) {
            goto pq;
        }
        if ($Nn = $ij["\x66\x72\141\147\155\145\156\x74"]) {
            goto zK;
        }
        $Tc = $wP->ownerDocument;
        goto XH;
        zK:
        $tl = false;
        $qZ = new DOMXPath($wP->ownerDocument);
        if (!($this->idNS && is_array($this->idNS))) {
            goto fH;
        }
        foreach ($this->idNS as $gZ => $Eh) {
            $qZ->registerNamespace($gZ, $Eh);
            Mm:
        }
        wf:
        fH:
        $ca = "\x40\x49\x64\x3d\x22" . XPath::filterAttrValue($Nn, XPath::DOUBLE_QUOTE) . "\x22";
        if (!is_array($this->idKeys)) {
            goto NV;
        }
        foreach ($this->idKeys as $Pb) {
            $ca .= "\x20\157\162\x20\x40" . XPath::filterAttrName($Pb) . "\75\42" . XPath::filterAttrValue($Nn, XPath::DOUBLE_QUOTE) . "\x22";
            K5:
        }
        RW:
        NV:
        $qX = "\x2f\x2f\x2a\133" . $ca . "\x5d";
        $Tc = $qZ->query($qX)->item(0);
        XH:
        pq:
        U6:
        $WL = $this->processTransforms($wP, $Tc, $tl);
        if ($this->validateDigest($wP, $WL)) {
            goto A8;
        }
        return false;
        A8:
        if (!$Tc instanceof DOMNode) {
            goto TG;
        }
        if (!empty($Nn)) {
            goto XZ;
        }
        $this->validatedNodes[] = $Tc;
        goto Y4;
        XZ:
        $this->validatedNodes[$Nn] = $Tc;
        Y4:
        TG:
        return true;
    }
    public function getRefNodeID($wP)
    {
        if (!($pM = $wP->getAttribute("\125\122\x49"))) {
            goto L8;
        }
        $ij = parse_url($pM);
        if (!empty($ij["\160\x61\x74\150"])) {
            goto PW;
        }
        if (!($Nn = $ij["\x66\x72\141\x67\155\145\156\164"])) {
            goto Mk;
        }
        return $Nn;
        Mk:
        PW:
        L8:
        return null;
    }
    public function getRefIDs()
    {
        $lk = array();
        $PQ = $this->getXPathObj();
        $qX = "\56\57\x73\145\x63\144\163\151\147\x3a\x53\x69\147\x6e\145\x64\x49\156\x66\x6f\133\61\x5d\x2f\163\145\143\144\163\151\x67\72\122\145\146\145\162\x65\156\x63\x65";
        $fM = $PQ->query($qX, $this->sigNode);
        if (!($fM->length == 0)) {
            goto ee;
        }
        throw new Exception("\122\145\x66\145\x72\x65\x6e\x63\x65\40\156\x6f\x64\145\x73\x20\x6e\157\164\x20\x66\157\165\156\144");
        ee:
        foreach ($fM as $wP) {
            $lk[] = $this->getRefNodeID($wP);
            IJ:
        }
        xW:
        return $lk;
    }
    public function validateReference()
    {
        $AA = $this->sigNode->ownerDocument->documentElement;
        if ($AA->isSameNode($this->sigNode)) {
            goto Ms;
        }
        if (!($this->sigNode->parentNode != null)) {
            goto mm;
        }
        $this->sigNode->parentNode->removeChild($this->sigNode);
        mm:
        Ms:
        $PQ = $this->getXPathObj();
        $qX = "\56\x2f\163\x65\x63\144\x73\x69\x67\72\123\151\x67\156\145\144\x49\156\146\157\133\x31\x5d\57\x73\x65\x63\144\163\151\147\72\122\145\x66\145\x72\145\x6e\143\145";
        $fM = $PQ->query($qX, $this->sigNode);
        if (!($fM->length == 0)) {
            goto P3;
        }
        throw new Exception("\122\145\x66\145\x72\x65\156\143\145\x20\x6e\x6f\x64\x65\163\40\x6e\157\x74\40\x66\x6f\165\156\x64");
        P3:
        $this->validatedNodes = array();
        foreach ($fM as $wP) {
            if ($this->processRefNode($wP)) {
                goto q_;
            }
            $this->validatedNodes = null;
            throw new Exception("\x52\x65\x66\x65\162\x65\x6e\x63\145\x20\166\x61\x6c\151\144\x61\164\x69\157\156\40\x66\141\151\154\145\x64");
            q_:
            yE:
        }
        e0:
        return true;
    }
    private function addRefInternal($HB, $Fr, $OT, $Cd = null, $d4 = null)
    {
        $DX = null;
        $X9 = null;
        $UR = "\111\x64";
        $gJ = true;
        $zd = false;
        if (!is_array($d4)) {
            goto kx;
        }
        $DX = empty($d4["\x70\x72\x65\146\151\x78"]) ? null : $d4["\x70\x72\x65\146\x69\170"];
        $X9 = empty($d4["\160\162\x65\x66\151\170\137\x6e\x73"]) ? null : $d4["\x70\x72\x65\x66\x69\170\x5f\156\163"];
        $UR = empty($d4["\x69\x64\x5f\156\x61\155\x65"]) ? "\111\144" : $d4["\151\144\x5f\156\141\155\x65"];
        $gJ = !isset($d4["\x6f\x76\x65\x72\x77\162\151\164\145"]) ? true : (bool) $d4["\157\x76\145\x72\167\x72\151\164\x65"];
        $zd = !isset($d4["\x66\157\162\143\x65\137\165\x72\x69"]) ? false : (bool) $d4["\146\157\162\143\x65\x5f\x75\x72\x69"];
        kx:
        $R2 = $UR;
        if (empty($DX)) {
            goto y3;
        }
        $R2 = $DX . "\x3a" . $R2;
        y3:
        $wP = $this->createNewSignNode("\122\x65\x66\145\162\x65\x6e\x63\x65");
        $HB->appendChild($wP);
        if (!$Fr instanceof DOMDocument) {
            goto Q8;
        }
        if ($zd) {
            goto xx;
        }
        goto lC;
        Q8:
        $pM = null;
        if ($gJ) {
            goto Hs;
        }
        $pM = $X9 ? $Fr->getAttributeNS($X9, $UR) : $Fr->getAttribute($UR);
        Hs:
        if (!empty($pM)) {
            goto yX;
        }
        $pM = self::generateGUID();
        $Fr->setAttributeNS($X9, $R2, $pM);
        yX:
        $wP->setAttribute("\125\122\x49", "\x23" . $pM);
        goto lC;
        xx:
        $wP->setAttribute("\125\x52\x49", '');
        lC:
        $E2 = $this->createNewSignNode("\x54\162\141\x6e\x73\x66\x6f\162\155\x73");
        $wP->appendChild($E2);
        if (is_array($Cd)) {
            goto IQ;
        }
        if (!empty($this->canonicalMethod)) {
            goto Xh;
        }
        goto gY;
        IQ:
        foreach ($Cd as $dM) {
            $u5 = $this->createNewSignNode("\x54\x72\x61\156\163\146\x6f\x72\x6d");
            $E2->appendChild($u5);
            if (is_array($dM) && !empty($dM["\150\164\x74\x70\x3a\57\x2f\x77\x77\167\x2e\167\x33\x2e\157\162\x67\x2f\x54\x52\57\x31\x39\x39\x39\x2f\122\x45\x43\55\x78\x70\x61\164\150\55\61\71\x39\71\x31\61\x31\66"]) && !empty($dM["\x68\164\x74\160\x3a\57\x2f\x77\167\167\56\167\63\x2e\x6f\162\x67\57\124\x52\x2f\61\71\71\x39\57\x52\x45\103\x2d\170\x70\x61\164\150\x2d\61\71\x39\x39\61\x31\x31\66"]["\161\165\x65\x72\171"])) {
                goto T2;
            }
            $u5->setAttribute("\101\x6c\x67\157\162\151\164\150\155", $dM);
            goto cz;
            T2:
            $u5->setAttribute("\101\x6c\x67\x6f\162\x69\x74\x68\155", "\x68\x74\x74\160\x3a\57\x2f\x77\167\x77\x2e\167\x33\x2e\x6f\x72\147\x2f\124\122\57\61\x39\71\71\57\122\105\103\55\170\160\141\x74\x68\55\x31\71\x39\71\x31\x31\61\66");
            $rQ = $this->createNewSignNode("\130\x50\141\164\150", $dM["\150\164\x74\160\x3a\x2f\x2f\167\x77\x77\x2e\167\x33\56\x6f\162\x67\57\x54\x52\57\61\x39\x39\x39\57\122\105\103\55\x78\160\141\x74\x68\55\61\71\71\x39\61\61\x31\66"]["\x71\x75\145\x72\x79"]);
            $u5->appendChild($rQ);
            if (empty($dM["\x68\x74\x74\x70\72\57\x2f\x77\x77\x77\x2e\x77\63\56\x6f\162\147\x2f\x54\x52\x2f\x31\x39\71\x39\57\122\105\103\x2d\x78\160\x61\x74\x68\55\x31\71\71\x39\x31\61\x31\x36"]["\x6e\141\x6d\x65\x73\160\x61\x63\145\x73"])) {
                goto k7;
            }
            foreach ($dM["\150\x74\164\x70\x3a\57\57\167\167\x77\56\x77\x33\x2e\x6f\162\147\57\x54\122\57\61\x39\x39\x39\57\x52\105\103\55\x78\160\141\x74\x68\x2d\x31\x39\x39\71\x31\x31\x31\x36"]["\156\x61\x6d\145\163\160\141\x63\x65\x73"] as $DX => $NT) {
                $rQ->setAttributeNS("\150\164\164\x70\72\57\x2f\167\167\167\56\x77\x33\56\x6f\162\x67\57\62\x30\x30\60\x2f\170\x6d\x6c\156\x73\57", "\x78\155\154\156\163\72{$DX}", $NT);
                Ha:
            }
            In:
            k7:
            cz:
            E1:
        }
        io:
        goto gY;
        Xh:
        $u5 = $this->createNewSignNode("\124\x72\141\x6e\x73\x66\x6f\x72\x6d");
        $E2->appendChild($u5);
        $u5->setAttribute("\x41\x6c\x67\x6f\162\x69\164\x68\x6d", $this->canonicalMethod);
        gY:
        $pm = $this->processTransforms($wP, $Fr);
        $Xr = $this->calculateDigest($OT, $pm);
        $GM = $this->createNewSignNode("\104\x69\x67\145\x73\164\115\x65\x74\150\157\144");
        $wP->appendChild($GM);
        $GM->setAttribute("\x41\154\147\x6f\162\x69\164\150\155", $OT);
        $vt = $this->createNewSignNode("\104\x69\147\x65\163\x74\x56\x61\154\x75\x65", $Xr);
        $wP->appendChild($vt);
    }
    public function addReference($Fr, $OT, $Cd = null, $d4 = null)
    {
        if (!($PQ = $this->getXPathObj())) {
            goto NP;
        }
        $qX = "\56\57\x73\145\x63\144\x73\151\147\x3a\123\x69\x67\156\145\x64\111\x6e\146\x6f";
        $fM = $PQ->query($qX, $this->sigNode);
        if (!($kt = $fM->item(0))) {
            goto FV;
        }
        $this->addRefInternal($kt, $Fr, $OT, $Cd, $d4);
        FV:
        NP:
    }
    public function addReferenceList($nS, $OT, $Cd = null, $d4 = null)
    {
        if (!($PQ = $this->getXPathObj())) {
            goto pU;
        }
        $qX = "\x2e\x2f\x73\x65\143\144\163\x69\x67\72\123\x69\147\156\x65\x64\111\x6e\x66\x6f";
        $fM = $PQ->query($qX, $this->sigNode);
        if (!($kt = $fM->item(0))) {
            goto xz;
        }
        foreach ($nS as $Fr) {
            $this->addRefInternal($kt, $Fr, $OT, $Cd, $d4);
            kz:
        }
        l7:
        xz:
        pU:
    }
    public function addObject($WL, $bh = null, $xx = null)
    {
        $S9 = $this->createNewSignNode("\117\142\x6a\x65\x63\164");
        $this->sigNode->appendChild($S9);
        if (empty($bh)) {
            goto AZ;
        }
        $S9->setAttribute("\115\x69\x6d\x65\x54\171\x70\x65", $bh);
        AZ:
        if (empty($xx)) {
            goto SO;
        }
        $S9->setAttribute("\x45\x6e\x63\x6f\x64\x69\x6e\x67", $xx);
        SO:
        if ($WL instanceof DOMElement) {
            goto n2;
        }
        $qs = $this->sigNode->ownerDocument->createTextNode($WL);
        goto Yb;
        n2:
        $qs = $this->sigNode->ownerDocument->importNode($WL, true);
        Yb:
        $S9->appendChild($qs);
        return $S9;
    }
    public function locateKey($Fr = null)
    {
        if (!empty($Fr)) {
            goto Kh;
        }
        $Fr = $this->sigNode;
        Kh:
        if ($Fr instanceof DOMNode) {
            goto Rg;
        }
        return null;
        Rg:
        if (!($Ud = $Fr->ownerDocument)) {
            goto GQ;
        }
        $PQ = new DOMXPath($Ud);
        $PQ->registerNamespace("\163\x65\143\x64\163\151\147", self::XMLDSIGNS);
        $qX = "\163\164\162\151\156\147\x28\x2e\57\163\x65\x63\x64\163\151\147\x3a\x53\151\x67\x6e\145\x64\111\156\x66\157\57\163\145\x63\x64\163\151\x67\x3a\x53\151\x67\x6e\x61\x74\x75\x72\145\x4d\145\x74\150\x6f\x64\57\100\x41\154\x67\x6f\162\x69\164\x68\x6d\51";
        $OT = $PQ->evaluate($qX, $Fr);
        if (!$OT) {
            goto iR;
        }
        try {
            $ie = new XMLSecurityKey($OT, array("\164\x79\x70\x65" => "\160\x75\x62\154\151\x63"));
        } catch (Exception $F5) {
            return null;
        }
        return $ie;
        iR:
        GQ:
        return null;
    }
    public function verify($ie)
    {
        $Ud = $this->sigNode->ownerDocument;
        $PQ = new DOMXPath($Ud);
        $PQ->registerNamespace("\163\145\x63\x64\163\x69\x67", self::XMLDSIGNS);
        $qX = "\163\x74\x72\151\x6e\147\50\56\57\x73\145\x63\144\x73\x69\x67\72\x53\x69\x67\156\x61\x74\x75\162\x65\x56\141\x6c\165\x65\51";
        $E1 = $PQ->evaluate($qX, $this->sigNode);
        if (!empty($E1)) {
            goto Xp;
        }
        throw new Exception("\x55\x6e\141\x62\x6c\x65\x20\164\157\x20\x6c\x6f\x63\141\164\x65\40\x53\151\147\x6e\141\x74\x75\162\x65\126\x61\154\165\x65");
        Xp:
        return $ie->verifySignature($this->signedInfo, base64_decode($E1));
    }
    public function signData($ie, $WL)
    {
        return $ie->signData($WL);
    }
    public function sign($ie, $Gh = null)
    {
        if (!($Gh != null)) {
            goto An;
        }
        $this->resetXPathObj();
        $this->appendSignature($Gh);
        $this->sigNode = $Gh->lastChild;
        An:
        if (!($PQ = $this->getXPathObj())) {
            goto Xx;
        }
        $qX = "\x2e\x2f\163\145\x63\x64\x73\x69\x67\72\123\x69\x67\x6e\145\x64\x49\x6e\146\x6f";
        $fM = $PQ->query($qX, $this->sigNode);
        if (!($kt = $fM->item(0))) {
            goto IB;
        }
        $qX = "\x2e\x2f\x73\145\143\x64\x73\151\147\72\123\x69\147\156\x61\x74\x75\x72\x65\115\145\164\150\157\144";
        $fM = $PQ->query($qX, $kt);
        $YF = $fM->item(0);
        $YF->setAttribute("\x41\154\x67\157\162\151\x74\150\155", $ie->type);
        $WL = $this->canonicalizeData($kt, $this->canonicalMethod);
        $E1 = base64_encode($this->signData($ie, $WL));
        $Ld = $this->createNewSignNode("\x53\x69\147\156\141\x74\x75\162\x65\x56\141\154\165\145", $E1);
        if ($l3 = $kt->nextSibling) {
            goto W2;
        }
        $this->sigNode->appendChild($Ld);
        goto aM;
        W2:
        $l3->parentNode->insertBefore($Ld, $l3);
        aM:
        IB:
        Xx:
    }
    public function appendCert()
    {
    }
    public function appendKey($ie, $oH = null)
    {
        $ie->serializeKey($oH);
    }
    public function insertSignature($Fr, $yS = null)
    {
        $QQ = $Fr->ownerDocument;
        $cZ = $QQ->importNode($this->sigNode, true);
        if ($yS == null) {
            goto os;
        }
        return $Fr->insertBefore($cZ, $yS);
        goto Qd;
        os:
        return $Fr->insertBefore($cZ);
        Qd:
    }
    public function appendSignature($tf, $Hj = false)
    {
        $yS = $Hj ? $tf->firstChild : null;
        return $this->insertSignature($tf, $yS);
    }
    public static function get509XCert($eM, $eZ = true)
    {
        $eG = self::staticGet509XCerts($eM, $eZ);
        if (empty($eG)) {
            goto hT;
        }
        return $eG[0];
        hT:
        return '';
    }
    public static function staticGet509XCerts($eG, $eZ = true)
    {
        if ($eZ) {
            goto sy;
        }
        return array($eG);
        goto HI;
        sy:
        $WL = '';
        $Zg = array();
        $Kt = explode("\12", $eG);
        $Rq = false;
        foreach ($Kt as $p_) {
            if (!$Rq) {
                goto m7;
            }
            if (!(strncmp($p_, "\55\55\x2d\55\55\105\116\x44\x20\103\105\122\x54\x49\x46\111\103\x41\x54\105", 20) == 0)) {
                goto bj;
            }
            $Rq = false;
            $Zg[] = $WL;
            $WL = '';
            goto lr;
            bj:
            $WL .= trim($p_);
            goto rK;
            m7:
            if (!(strncmp($p_, "\x2d\55\55\x2d\x2d\x42\x45\x47\111\x4e\x20\103\x45\122\x54\111\x46\111\x43\x41\124\x45", 22) == 0)) {
                goto XO;
            }
            $Rq = true;
            XO:
            rK:
            lr:
        }
        JB:
        return $Zg;
        HI:
    }
    public static function staticAdd509Cert($Sr, $eM, $eZ = true, $XT = false, $PQ = null, $d4 = null)
    {
        if (!$XT) {
            goto fZ;
        }
        $eM = file_get_contents($eM);
        fZ:
        if ($Sr instanceof DOMElement) {
            goto J2;
        }
        throw new Exception("\x49\x6e\x76\x61\154\x69\144\40\160\141\x72\145\x6e\x74\40\x4e\157\x64\x65\x20\160\141\162\141\x6d\x65\164\x65\162");
        J2:
        $KL = $Sr->ownerDocument;
        if (!empty($PQ)) {
            goto kl;
        }
        $PQ = new DOMXPath($Sr->ownerDocument);
        $PQ->registerNamespace("\163\x65\143\x64\x73\151\x67", self::XMLDSIGNS);
        kl:
        $qX = "\x2e\x2f\x73\145\143\144\163\x69\x67\x3a\x4b\145\x79\111\156\146\157";
        $fM = $PQ->query($qX, $Sr);
        $uG = $fM->item(0);
        $dx = '';
        if (!$uG) {
            goto V2;
        }
        $vy = $uG->lookupPrefix(self::XMLDSIGNS);
        if (empty($vy)) {
            goto oa;
        }
        $dx = $vy . "\x3a";
        oa:
        goto rR;
        V2:
        $vy = $Sr->lookupPrefix(self::XMLDSIGNS);
        if (empty($vy)) {
            goto mD;
        }
        $dx = $vy . "\72";
        mD:
        $s1 = false;
        $uG = $KL->createElementNS(self::XMLDSIGNS, $dx . "\113\x65\171\111\x6e\x66\x6f");
        $qX = "\56\x2f\x73\x65\x63\x64\163\x69\x67\72\x4f\x62\x6a\145\143\164";
        $fM = $PQ->query($qX, $Sr);
        if (!($U0 = $fM->item(0))) {
            goto ed;
        }
        $U0->parentNode->insertBefore($uG, $U0);
        $s1 = true;
        ed:
        if ($s1) {
            goto Yq;
        }
        $Sr->appendChild($uG);
        Yq:
        rR:
        $eG = self::staticGet509XCerts($eM, $eZ);
        $w5 = $KL->createElementNS(self::XMLDSIGNS, $dx . "\x58\65\x30\71\x44\141\x74\x61");
        $uG->appendChild($w5);
        $Cy = false;
        $QX = false;
        if (!is_array($d4)) {
            goto c2;
        }
        if (empty($d4["\151\163\x73\165\145\162\x53\145\162\x69\141\x6c"])) {
            goto Wo;
        }
        $Cy = true;
        Wo:
        if (empty($d4["\x73\165\142\x6a\x65\x63\x74\x4e\141\x6d\145"])) {
            goto ml;
        }
        $QX = true;
        ml:
        c2:
        foreach ($eG as $U3) {
            if (!($Cy || $QX)) {
                goto KS;
            }
            if (!($BI = openssl_x509_parse("\x2d\x2d\x2d\x2d\x2d\102\105\107\x49\116\x20\103\105\122\x54\x49\106\x49\103\x41\124\x45\x2d\55\55\55\55\12" . chunk_split($U3, 64, "\12") . "\x2d\x2d\55\x2d\x2d\105\116\x44\40\103\x45\x52\x54\x49\x46\111\103\101\124\105\x2d\x2d\x2d\55\x2d\12"))) {
                goto LF;
            }
            if (!($QX && !empty($BI["\x73\x75\142\x6a\145\143\164"]))) {
                goto Hf;
            }
            if (is_array($BI["\x73\165\x62\x6a\145\143\164"])) {
                goto t8;
            }
            $OG = $BI["\x69\163\x73\165\x65\x72"];
            goto cQ;
            t8:
            $gU = array();
            foreach ($BI["\x73\x75\142\152\x65\x63\164"] as $U6 => $St) {
                if (is_array($St)) {
                    goto Pt;
                }
                array_unshift($gU, "{$U6}\x3d{$St}");
                goto oW;
                Pt:
                foreach ($St as $y8) {
                    array_unshift($gU, "{$U6}\75{$y8}");
                    qu:
                }
                sl:
                oW:
                pH:
            }
            Fv:
            $OG = implode("\x2c", $gU);
            cQ:
            $Xn = $KL->createElementNS(self::XMLDSIGNS, $dx . "\x58\x35\60\71\123\165\x62\152\x65\143\x74\x4e\x61\155\x65", $OG);
            $w5->appendChild($Xn);
            Hf:
            if (!($Cy && !empty($BI["\x69\x73\x73\x75\145\x72"]) && !empty($BI["\163\145\x72\151\x61\x6c\116\x75\155\142\145\x72"]))) {
                goto No;
            }
            if (is_array($BI["\151\x73\x73\x75\145\x72"])) {
                goto Fs;
            }
            $UT = $BI["\x69\x73\163\x75\x65\x72"];
            goto Zw;
            Fs:
            $gU = array();
            foreach ($BI["\x69\x73\163\x75\x65\x72"] as $U6 => $St) {
                array_unshift($gU, "{$U6}\75{$St}");
                sR:
            }
            yk:
            $UT = implode("\x2c", $gU);
            Zw:
            $qQ = $KL->createElementNS(self::XMLDSIGNS, $dx . "\x58\65\x30\71\111\163\x73\165\145\x72\123\145\x72\151\x61\154");
            $w5->appendChild($qQ);
            $zh = $KL->createElementNS(self::XMLDSIGNS, $dx . "\x58\65\x30\71\x49\x73\x73\x75\145\x72\x4e\x61\x6d\x65", $UT);
            $qQ->appendChild($zh);
            $zh = $KL->createElementNS(self::XMLDSIGNS, $dx . "\x58\x35\x30\71\x53\145\x72\x69\141\154\116\x75\x6d\x62\145\x72", $BI["\163\x65\x72\151\141\x6c\x4e\x75\155\x62\x65\162"]);
            $qQ->appendChild($zh);
            No:
            LF:
            KS:
            $qV = $KL->createElementNS(self::XMLDSIGNS, $dx . "\130\65\x30\x39\x43\x65\162\x74\151\146\x69\143\141\164\x65", $U3);
            $w5->appendChild($qV);
            Wh:
        }
        gh:
    }
    public function add509Cert($eM, $eZ = true, $XT = false, $d4 = null)
    {
        if (!($PQ = $this->getXPathObj())) {
            goto Ym;
        }
        self::staticAdd509Cert($this->sigNode, $eM, $eZ, $XT, $PQ, $d4);
        Ym:
    }
    public function appendToKeyInfo($Fr)
    {
        $Sr = $this->sigNode;
        $KL = $Sr->ownerDocument;
        $PQ = $this->getXPathObj();
        if (!empty($PQ)) {
            goto Jt;
        }
        $PQ = new DOMXPath($Sr->ownerDocument);
        $PQ->registerNamespace("\x73\145\143\x64\x73\151\147", self::XMLDSIGNS);
        Jt:
        $qX = "\x2e\x2f\x73\145\143\144\x73\151\x67\x3a\x4b\145\x79\x49\156\146\157";
        $fM = $PQ->query($qX, $Sr);
        $uG = $fM->item(0);
        if ($uG) {
            goto kW;
        }
        $dx = '';
        $vy = $Sr->lookupPrefix(self::XMLDSIGNS);
        if (empty($vy)) {
            goto XU;
        }
        $dx = $vy . "\x3a";
        XU:
        $s1 = false;
        $uG = $KL->createElementNS(self::XMLDSIGNS, $dx . "\113\x65\171\111\x6e\x66\157");
        $qX = "\x2e\x2f\x73\145\143\144\x73\x69\147\72\x4f\142\152\x65\143\164";
        $fM = $PQ->query($qX, $Sr);
        if (!($U0 = $fM->item(0))) {
            goto Vz;
        }
        $U0->parentNode->insertBefore($uG, $U0);
        $s1 = true;
        Vz:
        if ($s1) {
            goto iu;
        }
        $Sr->appendChild($uG);
        iu:
        kW:
        $uG->appendChild($Fr);
        return $uG;
    }
    public function getValidatedNodes()
    {
        return $this->validatedNodes;
    }
}
