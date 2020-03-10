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
    const XMLDSIGNS = "\x68\x74\164\x70\72\57\57\167\x77\167\56\x77\63\56\157\x72\x67\57\x32\x30\x30\x30\57\x30\71\x2f\170\155\154\144\x73\x69\x67\x23";
    const SHA1 = "\x68\164\x74\160\x3a\57\x2f\167\x77\167\56\167\x33\56\157\x72\x67\57\62\60\60\60\57\x30\x39\57\170\155\x6c\x64\163\151\x67\43\x73\x68\141\x31";
    const SHA256 = "\150\x74\164\160\x3a\57\x2f\167\x77\x77\56\167\x33\x2e\157\162\147\57\62\60\60\x31\x2f\x30\x34\x2f\x78\155\x6c\x65\156\143\x23\163\150\141\x32\x35\66";
    const SHA384 = "\x68\164\x74\x70\72\57\57\x77\167\167\56\x77\63\x2e\x6f\162\147\57\x32\x30\x30\61\57\60\x34\57\x78\155\154\x64\x73\151\x67\x2d\x6d\157\x72\145\43\163\150\141\x33\70\x34";
    const SHA512 = "\150\164\x74\x70\72\57\x2f\167\x77\x77\x2e\x77\x33\56\157\162\x67\57\62\60\60\x31\x2f\60\x34\57\170\155\154\x65\x6e\x63\43\163\150\x61\x35\x31\x32";
    const RIPEMD160 = "\150\164\164\x70\72\57\57\x77\x77\x77\56\167\63\56\x6f\x72\x67\x2f\x32\60\60\x31\57\60\x34\57\x78\155\154\145\156\x63\43\162\x69\160\x65\x6d\x64\x31\66\x30";
    const C14N = "\150\x74\164\x70\72\x2f\57\167\x77\167\x2e\167\63\56\157\x72\x67\x2f\124\x52\x2f\62\x30\60\x31\57\x52\105\x43\55\x78\155\154\55\143\x31\64\x6e\55\62\60\60\x31\x30\x33\61\x35";
    const C14N_COMMENTS = "\150\164\164\x70\x3a\x2f\57\x77\167\x77\56\x77\x33\x2e\x6f\162\x67\x2f\124\122\x2f\62\x30\x30\x31\x2f\122\x45\x43\x2d\x78\x6d\x6c\55\x63\x31\64\x6e\55\62\x30\x30\61\60\63\61\65\x23\x57\151\x74\150\103\157\155\x6d\145\156\164\163";
    const EXC_C14N = "\150\164\164\160\72\57\x2f\x77\x77\x77\x2e\x77\x33\x2e\157\162\x67\x2f\x32\60\x30\61\x2f\x31\x30\x2f\x78\155\154\55\x65\170\143\55\x63\61\64\x6e\43";
    const EXC_C14N_COMMENTS = "\150\164\164\160\x3a\x2f\57\x77\167\x77\56\x77\x33\56\157\x72\147\57\x32\x30\x30\x31\57\61\x30\x2f\170\155\154\x2d\x65\170\143\x2d\x63\61\x34\x6e\x23\x57\x69\164\x68\x43\157\x6d\155\145\x6e\164\163";
    const template = "\x3c\144\x73\x3a\123\151\x67\x6e\141\164\x75\x72\x65\40\170\x6d\154\156\163\x3a\x64\163\x3d\x22\150\x74\x74\x70\72\x2f\x2f\167\167\167\56\x77\x33\x2e\x6f\162\x67\x2f\62\x30\x30\60\x2f\x30\x39\57\170\x6d\x6c\x64\x73\151\147\x23\x22\x3e\12\40\x20\74\x64\x73\x3a\123\151\x67\x6e\x65\x64\111\x6e\x66\x6f\76\12\x20\x20\x20\x20\74\x64\x73\72\123\x69\147\x6e\x61\164\x75\162\x65\115\145\x74\150\x6f\x64\x20\x2f\x3e\12\40\40\74\57\x64\x73\x3a\x53\151\147\156\145\144\111\156\x66\x6f\76\12\x3c\57\x64\x73\72\x53\151\x67\156\x61\164\165\x72\x65\76";
    const BASE_TEMPLATE = "\x3c\123\x69\x67\156\141\x74\165\162\145\40\170\155\x6c\x6e\163\75\42\150\x74\164\160\72\x2f\x2f\x77\x77\167\x2e\167\x33\x2e\157\162\x67\57\x32\x30\x30\60\x2f\60\71\57\x78\155\154\144\163\151\147\43\x22\76\12\40\x20\x3c\123\x69\x67\x6e\x65\x64\x49\x6e\146\x6f\76\12\x20\40\x20\40\x3c\x53\x69\x67\x6e\141\164\165\162\x65\115\x65\164\x68\157\144\x20\x2f\x3e\xa\x20\x20\x3c\57\123\151\x67\156\x65\144\x49\156\x66\157\76\12\74\57\x53\x69\147\156\x61\164\165\162\145\x3e";
    public $sigNode = null;
    public $idKeys = array();
    public $idNS = array();
    private $signedInfo = null;
    private $xPathCtx = null;
    private $canonicalMethod = null;
    private $prefix = '';
    private $searchpfx = "\163\x65\x63\144\163\151\147";
    private $validatedNodes = null;
    public function __construct($It = "\x64\x73")
    {
        $it = self::BASE_TEMPLATE;
        if (empty($It)) {
            goto g2r;
        }
        $this->prefix = $It . "\x3a";
        $zx = array("\74\x53", "\74\x2f\x53", "\x78\x6d\x6c\156\163\x3d");
        $b8 = array("\74{$It}\72\x53", "\x3c\57{$It}\x3a\123", "\170\x6d\x6c\x6e\163\72{$It}\x3d");
        $it = str_replace($zx, $b8, $it);
        g2r:
        $aL = new DOMDocument();
        $aL->loadXML($it);
        $this->sigNode = $aL->documentElement;
    }
    private function resetXPathObj()
    {
        $this->xPathCtx = null;
    }
    private function getXPathObj()
    {
        if (!(empty($this->xPathCtx) && !empty($this->sigNode))) {
            goto x3X;
        }
        $TB = new DOMXPath($this->sigNode->ownerDocument);
        $TB->registerNamespace("\163\145\143\x64\x73\x69\147", self::XMLDSIGNS);
        $this->xPathCtx = $TB;
        x3X:
        return $this->xPathCtx;
    }
    public static function generateGUID($It = "\x70\x66\170")
    {
        $wW = md5(uniqid(mt_rand(), true));
        $Mu = $It . substr($wW, 0, 8) . "\x2d" . substr($wW, 8, 4) . "\x2d" . substr($wW, 12, 4) . "\x2d" . substr($wW, 16, 4) . "\x2d" . substr($wW, 20, 12);
        return $Mu;
    }
    public static function generate_GUID($It = "\x70\x66\x78")
    {
        return self::generateGUID($It);
    }
    public function locateSignature($ln, $la = 0)
    {
        if ($ln instanceof DOMDocument) {
            goto mKi;
        }
        $pf = $ln->ownerDocument;
        goto Uc0;
        mKi:
        $pf = $ln;
        Uc0:
        if (!$pf) {
            goto Qgg;
        }
        $TB = new DOMXPath($pf);
        $TB->registerNamespace("\x73\145\x63\x64\163\151\147", self::XMLDSIGNS);
        $Gy = "\56\57\57\163\x65\x63\x64\163\x69\147\72\x53\x69\147\x6e\141\x74\165\162\x65";
        $Un = $TB->query($Gy, $ln);
        $this->sigNode = $Un->item($la);
        return $this->sigNode;
        Qgg:
        return null;
    }
    public function createNewSignNode($eB, $zw = null)
    {
        $pf = $this->sigNode->ownerDocument;
        if (!is_null($zw)) {
            goto Gbd;
        }
        $pi = $pf->createElementNS(self::XMLDSIGNS, $this->prefix . $eB);
        goto C6b;
        Gbd:
        $pi = $pf->createElementNS(self::XMLDSIGNS, $this->prefix . $eB, $zw);
        C6b:
        return $pi;
    }
    public function setCanonicalMethod($CG)
    {
        switch ($CG) {
            case "\x68\x74\164\160\x3a\x2f\57\167\167\x77\x2e\x77\63\56\x6f\162\147\x2f\124\122\57\x32\60\x30\61\x2f\122\105\x43\x2d\x78\x6d\x6c\55\143\61\x34\x6e\x2d\62\60\60\61\60\x33\x31\x35":
            case "\150\164\x74\160\72\57\x2f\x77\167\167\56\167\x33\x2e\x6f\162\x67\57\124\x52\57\x32\x30\x30\x31\57\x52\x45\103\55\170\155\154\x2d\x63\x31\x34\156\55\62\x30\60\61\60\63\x31\x35\43\x57\151\164\150\103\157\155\155\x65\156\164\x73":
            case "\x68\164\164\160\x3a\57\57\167\167\x77\56\x77\63\56\x6f\x72\147\x2f\62\60\60\x31\57\61\x30\x2f\170\155\154\x2d\145\170\143\x2d\x63\61\x34\x6e\x23":
            case "\150\164\164\160\x3a\x2f\57\x77\x77\167\x2e\167\x33\56\x6f\x72\x67\x2f\62\x30\60\61\57\x31\x30\x2f\170\155\154\55\145\x78\x63\55\x63\61\x34\x6e\43\127\151\164\x68\x43\x6f\155\x6d\x65\x6e\164\x73":
                $this->canonicalMethod = $CG;
                goto nip;
            default:
                throw new Exception("\111\x6e\166\141\x6c\151\x64\40\x43\141\x6e\x6f\x6e\151\143\141\154\x20\x4d\x65\x74\x68\157\x64");
        }
        FMW:
        nip:
        if (!($TB = $this->getXPathObj())) {
            goto tA2;
        }
        $Gy = "\56\x2f" . $this->searchpfx . "\72\123\151\x67\156\145\x64\x49\x6e\x66\x6f";
        $Un = $TB->query($Gy, $this->sigNode);
        if (!($gp = $Un->item(0))) {
            goto T80;
        }
        $Gy = "\56\57" . $this->searchpfx . "\x43\141\x6e\x6f\x6e\x69\x63\141\x6c\151\x7a\x61\164\151\157\156\115\x65\164\150\x6f\x64";
        $Un = $TB->query($Gy, $gp);
        if ($C7 = $Un->item(0)) {
            goto Ouo;
        }
        $C7 = $this->createNewSignNode("\x43\141\x6e\x6f\x6e\x69\x63\x61\154\x69\172\141\x74\151\157\x6e\115\x65\164\150\x6f\x64");
        $gp->insertBefore($C7, $gp->firstChild);
        Ouo:
        $C7->setAttribute("\101\154\147\157\162\x69\164\x68\155", $this->canonicalMethod);
        T80:
        tA2:
    }
    private function canonicalizeData($pi, $S8, $YW = null, $ud = null)
    {
        $ER = false;
        $Oy = false;
        switch ($S8) {
            case "\150\164\164\x70\72\x2f\x2f\x77\167\x77\x2e\167\63\x2e\157\x72\147\57\x54\122\x2f\62\60\x30\x31\x2f\122\x45\103\55\170\155\x6c\55\143\x31\x34\x6e\x2d\x32\60\60\61\x30\x33\x31\x35":
                $ER = false;
                $Oy = false;
                goto GnH;
            case "\150\164\x74\160\x3a\x2f\x2f\167\x77\x77\56\x77\63\56\157\162\147\x2f\x54\x52\57\x32\x30\x30\x31\x2f\x52\105\x43\x2d\x78\155\x6c\55\143\61\x34\156\x2d\x32\x30\x30\x31\60\x33\61\65\x23\127\x69\164\x68\103\157\155\x6d\145\x6e\164\x73":
                $Oy = true;
                goto GnH;
            case "\x68\164\x74\x70\72\57\57\x77\167\167\56\167\63\56\157\x72\147\x2f\62\60\x30\61\x2f\61\x30\x2f\x78\x6d\154\x2d\x65\170\143\x2d\x63\x31\64\x6e\x23":
                $ER = true;
                goto GnH;
            case "\x68\164\x74\x70\x3a\x2f\x2f\x77\167\x77\x2e\167\63\56\x6f\x72\147\x2f\62\60\60\x31\57\61\x30\57\x78\155\x6c\x2d\x65\170\x63\55\x63\x31\x34\156\43\127\151\164\x68\103\157\155\155\x65\156\x74\163":
                $ER = true;
                $Oy = true;
                goto GnH;
        }
        QXS:
        GnH:
        if (!(is_null($YW) && $pi instanceof DOMNode && $pi->ownerDocument !== null && $pi->isSameNode($pi->ownerDocument->documentElement))) {
            goto MuT;
        }
        $kF = $pi;
        DHv:
        if (!($Io = $kF->previousSibling)) {
            goto JZ8;
        }
        if (!($Io->nodeType == XML_PI_NODE || $Io->nodeType == XML_COMMENT_NODE && $Oy)) {
            goto UV2;
        }
        goto JZ8;
        UV2:
        $kF = $Io;
        goto DHv;
        JZ8:
        if (!($Io == null)) {
            goto R_X;
        }
        $pi = $pi->ownerDocument;
        R_X:
        MuT:
        return $pi->C14N($ER, $Oy, $YW, $ud);
    }
    public function canonicalizeSignedInfo()
    {
        $pf = $this->sigNode->ownerDocument;
        $S8 = null;
        if (!$pf) {
            goto PJb;
        }
        $TB = $this->getXPathObj();
        $Gy = "\56\x2f\163\145\143\x64\x73\x69\x67\72\x53\x69\147\156\145\x64\111\x6e\146\157";
        $Un = $TB->query($Gy, $this->sigNode);
        if (!($za = $Un->item(0))) {
            goto sno;
        }
        $Gy = "\x2e\x2f\163\x65\143\x64\163\x69\147\72\x43\141\x6e\157\156\151\143\x61\154\151\172\141\x74\x69\x6f\x6e\115\145\164\150\x6f\144";
        $Un = $TB->query($Gy, $za);
        if (!($C7 = $Un->item(0))) {
            goto MHq;
        }
        $S8 = $C7->getAttribute("\101\154\147\157\x72\x69\164\150\155");
        MHq:
        $this->signedInfo = $this->canonicalizeData($za, $S8);
        return $this->signedInfo;
        sno:
        PJb:
        return null;
    }
    public function calculateDigest($Os, $Qk, $vf = true)
    {
        switch ($Os) {
            case self::SHA1:
                $WP = "\163\150\x61\61";
                goto Di3;
            case self::SHA256:
                $WP = "\163\150\141\x32\65\x36";
                goto Di3;
            case self::SHA384:
                $WP = "\163\x68\x61\63\70\x34";
                goto Di3;
            case self::SHA512:
                $WP = "\x73\x68\141\x35\61\62";
                goto Di3;
            case self::RIPEMD160:
                $WP = "\x72\x69\160\x65\x6d\144\x31\x36\x30";
                goto Di3;
            default:
                throw new Exception("\x43\141\x6e\156\157\164\40\x76\x61\154\x69\x64\141\x74\145\x20\144\x69\x67\145\x73\x74\x3a\40\x55\x6e\x73\x75\x70\x70\157\x72\164\x65\x64\40\x41\x6c\x67\157\162\151\x74\150\x6d\40\x3c{$Os}\76");
        }
        w8_:
        Di3:
        $Nw = hash($WP, $Qk, true);
        if (!$vf) {
            goto J9q;
        }
        $Nw = base64_encode($Nw);
        J9q:
        return $Nw;
    }
    public function validateDigest($S4, $Qk)
    {
        $TB = new DOMXPath($S4->ownerDocument);
        $TB->registerNamespace("\163\x65\x63\144\x73\151\x67", self::XMLDSIGNS);
        $Gy = "\163\x74\162\x69\156\x67\x28\x2e\x2f\163\x65\x63\144\x73\x69\x67\72\104\x69\147\x65\x73\x74\x4d\x65\x74\x68\x6f\x64\x2f\x40\101\x6c\147\157\x72\x69\164\x68\155\51";
        $Os = $TB->evaluate($Gy, $S4);
        $oN = $this->calculateDigest($Os, $Qk, false);
        $Gy = "\x73\x74\162\151\x6e\147\50\56\57\163\x65\x63\144\x73\x69\147\x3a\104\151\x67\145\x73\x74\126\141\x6c\x75\145\51";
        $mw = $TB->evaluate($Gy, $S4);
        return $oN === base64_decode($mw);
    }
    public function processTransforms($S4, $Q2, $pN = true)
    {
        $Qk = $Q2;
        $TB = new DOMXPath($S4->ownerDocument);
        $TB->registerNamespace("\x73\x65\x63\144\x73\x69\147", self::XMLDSIGNS);
        $Gy = "\56\x2f\x73\x65\143\144\163\151\x67\x3a\x54\x72\141\x6e\163\146\157\x72\155\163\57\163\145\x63\144\x73\x69\147\72\124\162\141\x6e\x73\146\x6f\x72\155";
        $U8 = $TB->query($Gy, $S4);
        $bd = "\x68\x74\164\x70\72\57\57\167\167\x77\56\x77\63\56\157\x72\x67\57\x54\x52\57\62\60\x30\61\57\122\x45\x43\55\x78\155\154\x2d\143\61\x34\x6e\55\62\60\60\x31\x30\63\x31\x35";
        $YW = null;
        $ud = null;
        foreach ($U8 as $dW) {
            $wl = $dW->getAttribute("\101\154\147\157\x72\x69\x74\150\155");
            switch ($wl) {
                case "\150\164\164\x70\72\x2f\57\167\167\167\x2e\x77\63\x2e\x6f\162\147\57\x32\60\x30\x31\x2f\x31\60\57\x78\155\x6c\55\x65\170\x63\x2d\x63\x31\x34\156\x23":
                case "\150\164\164\160\72\x2f\x2f\167\x77\167\56\x77\63\56\157\162\147\x2f\x32\x30\60\61\x2f\x31\x30\57\170\155\x6c\55\x65\170\143\x2d\x63\x31\x34\x6e\x23\127\x69\164\x68\x43\157\x6d\x6d\x65\156\164\163":
                    if (!$pN) {
                        goto VVP;
                    }
                    $bd = $wl;
                    goto VEz;
                    VVP:
                    $bd = "\x68\x74\x74\160\72\x2f\57\167\167\167\x2e\167\x33\x2e\157\162\147\57\62\x30\60\61\57\x31\60\x2f\x78\155\x6c\55\145\x78\143\55\x63\x31\x34\156\43";
                    VEz:
                    $pi = $dW->firstChild;
                    YzG:
                    if (!$pi) {
                        goto JOH;
                    }
                    if (!($pi->localName == "\x49\156\143\x6c\165\163\151\166\145\x4e\141\155\x65\x73\x70\141\x63\145\163")) {
                        goto jF5;
                    }
                    if (!($qI = $pi->getAttribute("\120\162\145\x66\x69\x78\x4c\x69\163\164"))) {
                        goto F28;
                    }
                    $Dt = array();
                    $dq = explode("\x20", $qI);
                    foreach ($dq as $qI) {
                        $N_ = trim($qI);
                        if (empty($N_)) {
                            goto HXK;
                        }
                        $Dt[] = $N_;
                        HXK:
                        jEJ:
                    }
                    N1E:
                    if (!(count($Dt) > 0)) {
                        goto E35;
                    }
                    $ud = $Dt;
                    E35:
                    F28:
                    goto JOH;
                    jF5:
                    $pi = $pi->nextSibling;
                    goto YzG;
                    JOH:
                    goto qn3;
                case "\150\x74\164\160\72\x2f\57\x77\167\167\56\x77\x33\x2e\157\162\147\x2f\124\x52\57\62\x30\x30\x31\57\122\105\x43\x2d\x78\x6d\154\55\143\x31\64\x6e\55\62\60\60\61\x30\x33\x31\x35":
                case "\x68\x74\164\160\72\57\x2f\167\167\167\x2e\x77\63\x2e\x6f\x72\147\57\124\x52\x2f\x32\60\x30\x31\57\x52\105\103\x2d\x78\x6d\x6c\x2d\143\61\x34\156\x2d\x32\x30\x30\61\x30\63\61\65\x23\x57\151\164\x68\103\x6f\155\155\x65\x6e\164\x73":
                    if (!$pN) {
                        goto o4Q;
                    }
                    $bd = $wl;
                    goto KJ3;
                    o4Q:
                    $bd = "\x68\x74\x74\160\72\57\57\167\x77\x77\56\x77\x33\x2e\157\162\x67\x2f\x54\x52\x2f\62\x30\x30\61\x2f\122\105\103\x2d\x78\155\154\55\143\61\64\x6e\x2d\x32\60\x30\61\x30\x33\61\x35";
                    KJ3:
                    goto qn3;
                case "\x68\x74\x74\x70\72\57\x2f\167\x77\x77\56\x77\63\56\157\x72\x67\x2f\124\122\x2f\61\71\71\71\57\x52\105\103\x2d\170\x70\141\x74\x68\x2d\x31\71\x39\71\61\x31\x31\x36":
                    $pi = $dW->firstChild;
                    Cyp:
                    if (!$pi) {
                        goto Gx4;
                    }
                    if (!($pi->localName == "\x58\x50\141\x74\150")) {
                        goto FEf;
                    }
                    $YW = array();
                    $YW["\161\165\145\x72\171"] = "\50\56\57\57\56\40\174\40\56\x2f\x2f\100\52\40\174\40\56\x2f\x2f\156\141\x6d\145\x73\160\141\143\x65\x3a\x3a\52\51\x5b" . $pi->nodeValue . "\135";
                    $fa["\156\141\x6d\x65\x73\x70\141\143\x65\x73"] = array();
                    $CY = $TB->query("\x2e\57\156\x61\x6d\x65\x73\160\x61\143\145\72\72\x2a", $pi);
                    foreach ($CY as $Dq) {
                        if (!($Dq->localName != "\170\x6d\154")) {
                            goto trZ;
                        }
                        $YW["\x6e\141\155\145\x73\x70\x61\x63\x65\163"][$Dq->localName] = $Dq->nodeValue;
                        trZ:
                        Bia:
                    }
                    bND:
                    goto Gx4;
                    FEf:
                    $pi = $pi->nextSibling;
                    goto Cyp;
                    Gx4:
                    goto qn3;
            }
            kJC:
            qn3:
            uNr:
        }
        Gto:
        if (!$Qk instanceof DOMNode) {
            goto YXG;
        }
        $Qk = $this->canonicalizeData($Q2, $bd, $YW, $ud);
        YXG:
        return $Qk;
    }
    public function processRefNode($S4)
    {
        $ul = null;
        $pN = true;
        if ($Xz = $S4->getAttribute("\125\x52\x49")) {
            goto QQj;
        }
        $pN = false;
        $ul = $S4->ownerDocument;
        goto zaY;
        QQj:
        $ew = parse_url($Xz);
        if (!empty($ew["\x70\141\164\x68"])) {
            goto cHK;
        }
        if ($xg = $ew["\x66\x72\141\147\x6d\145\x6e\164"]) {
            goto m5B;
        }
        $ul = $S4->ownerDocument;
        goto xHb;
        m5B:
        $pN = false;
        $d8 = new DOMXPath($S4->ownerDocument);
        if (!($this->idNS && is_array($this->idNS))) {
            goto zpd;
        }
        foreach ($this->idNS as $a7 => $FP) {
            $d8->registerNamespace($a7, $FP);
            SPi:
        }
        l3O:
        zpd:
        $gR = "\100\111\144\75\42" . XPath::filterAttrValue($xg, XPath::DOUBLE_QUOTE) . "\x22";
        if (!is_array($this->idKeys)) {
            goto UPV;
        }
        foreach ($this->idKeys as $a8) {
            $gR .= "\40\x6f\x72\40\100" . XPath::filterAttrName($a8) . "\75\42" . XPath::filterAttrValue($xg, XPath::DOUBLE_QUOTE) . "\x22";
            Vrp:
        }
        b00:
        UPV:
        $Gy = "\x2f\x2f\x2a\x5b" . $gR . "\135";
        $ul = $d8->query($Gy)->item(0);
        xHb:
        cHK:
        zaY:
        $Qk = $this->processTransforms($S4, $ul, $pN);
        if ($this->validateDigest($S4, $Qk)) {
            goto zfC;
        }
        return false;
        zfC:
        if (!$ul instanceof DOMNode) {
            goto Z91;
        }
        if (!empty($xg)) {
            goto BSi;
        }
        $this->validatedNodes[] = $ul;
        goto L3J;
        BSi:
        $this->validatedNodes[$xg] = $ul;
        L3J:
        Z91:
        return true;
    }
    public function getRefNodeID($S4)
    {
        if (!($Xz = $S4->getAttribute("\125\x52\111"))) {
            goto YTa;
        }
        $ew = parse_url($Xz);
        if (!empty($ew["\x70\141\x74\150"])) {
            goto xhz;
        }
        if (!($xg = $ew["\146\162\x61\147\x6d\145\156\x74"])) {
            goto vnU;
        }
        return $xg;
        vnU:
        xhz:
        YTa:
        return null;
    }
    public function getRefIDs()
    {
        $ES = array();
        $TB = $this->getXPathObj();
        $Gy = "\56\57\x73\145\x63\144\x73\151\x67\x3a\x53\151\147\x6e\x65\144\111\156\x66\157\x2f\x73\145\x63\x64\x73\151\147\x3a\122\x65\146\145\162\145\x6e\143\145";
        $Un = $TB->query($Gy, $this->sigNode);
        if (!($Un->length == 0)) {
            goto IDa;
        }
        throw new Exception("\122\145\x66\145\x72\x65\x6e\x63\x65\40\156\x6f\144\145\x73\x20\156\x6f\164\40\x66\x6f\x75\x6e\x64");
        IDa:
        foreach ($Un as $S4) {
            $ES[] = $this->getRefNodeID($S4);
            Uri:
        }
        E5C:
        return $ES;
    }
    public function validateReference()
    {
        $Vh = $this->sigNode->ownerDocument->documentElement;
        if ($Vh->isSameNode($this->sigNode)) {
            goto BN1;
        }
        if (!($this->sigNode->parentNode != null)) {
            goto iWd;
        }
        $this->sigNode->parentNode->removeChild($this->sigNode);
        iWd:
        BN1:
        $TB = $this->getXPathObj();
        $Gy = "\x2e\x2f\x73\145\x63\144\x73\x69\147\72\x53\x69\x67\156\x65\x64\x49\156\x66\x6f\57\x73\x65\x63\x64\x73\151\x67\72\122\145\146\145\x72\x65\x6e\x63\145";
        $Un = $TB->query($Gy, $this->sigNode);
        if (!($Un->length == 0)) {
            goto S0T;
        }
        throw new Exception("\122\x65\146\145\162\x65\x6e\143\x65\x20\156\157\144\x65\x73\40\x6e\x6f\164\x20\146\157\165\x6e\144");
        S0T:
        $this->validatedNodes = array();
        foreach ($Un as $S4) {
            if ($this->processRefNode($S4)) {
                goto d5F;
            }
            $this->validatedNodes = null;
            throw new Exception("\122\145\146\145\x72\145\156\143\145\40\x76\141\x6c\x69\144\x61\x74\x69\x6f\x6e\x20\146\141\151\154\145\144");
            d5F:
            nna:
        }
        RBH:
        return true;
    }
    private function addRefInternal($Y3, $pi, $wl, $co = null, $M4 = null)
    {
        $It = null;
        $qe = null;
        $Gb = "\111\144";
        $MW = true;
        $ZI = false;
        if (!is_array($M4)) {
            goto esF;
        }
        $It = empty($M4["\x70\x72\145\146\151\x78"]) ? null : $M4["\160\x72\x65\x66\151\170"];
        $qe = empty($M4["\x70\162\x65\146\x69\170\137\x6e\163"]) ? null : $M4["\x70\162\x65\146\151\x78\137\x6e\163"];
        $Gb = empty($M4["\151\x64\137\156\141\155\145"]) ? "\x49\x64" : $M4["\151\x64\x5f\x6e\141\x6d\x65"];
        $MW = !isset($M4["\x6f\x76\145\162\x77\x72\151\164\145"]) ? true : (bool) $M4["\157\x76\145\x72\x77\162\151\x74\145"];
        $ZI = !isset($M4["\x66\x6f\x72\x63\145\x5f\x75\162\151"]) ? false : (bool) $M4["\x66\x6f\x72\143\145\x5f\165\162\x69"];
        esF:
        $HM = $Gb;
        if (empty($It)) {
            goto Ekr;
        }
        $HM = $It . "\x3a" . $HM;
        Ekr:
        $S4 = $this->createNewSignNode("\122\x65\146\145\x72\x65\x6e\x63\145");
        $Y3->appendChild($S4);
        if (!$pi instanceof DOMDocument) {
            goto uoR;
        }
        if ($ZI) {
            goto fEl;
        }
        goto AEt;
        uoR:
        $Xz = null;
        if ($MW) {
            goto fc1;
        }
        $Xz = $qe ? $pi->getAttributeNS($qe, $Gb) : $pi->getAttribute($Gb);
        fc1:
        if (!empty($Xz)) {
            goto f20;
        }
        $Xz = self::generateGUID();
        $pi->setAttributeNS($qe, $HM, $Xz);
        f20:
        $S4->setAttribute("\125\122\x49", "\x23" . $Xz);
        goto AEt;
        fEl:
        $S4->setAttribute("\125\122\111", '');
        AEt:
        $XH = $this->createNewSignNode("\124\162\x61\x6e\x73\146\x6f\162\x6d\x73");
        $S4->appendChild($XH);
        if (is_array($co)) {
            goto f2E;
        }
        if (!empty($this->canonicalMethod)) {
            goto kJn;
        }
        goto doS;
        f2E:
        foreach ($co as $dW) {
            $kU = $this->createNewSignNode("\x54\x72\141\156\x73\x66\157\162\155");
            $XH->appendChild($kU);
            if (is_array($dW) && !empty($dW["\150\164\x74\160\x3a\57\57\x77\167\167\x2e\167\63\56\x6f\x72\x67\57\124\x52\57\x31\x39\71\x39\x2f\122\x45\103\55\170\x70\x61\164\x68\55\x31\x39\x39\x39\61\61\61\x36"]) && !empty($dW["\x68\164\164\x70\x3a\57\57\167\x77\x77\56\167\63\56\x6f\162\x67\57\124\122\57\61\71\71\71\x2f\122\x45\x43\x2d\x78\x70\x61\164\x68\55\61\71\71\x39\x31\61\x31\66"]["\161\x75\x65\162\171"])) {
                goto yTv;
            }
            $kU->setAttribute("\101\154\147\x6f\162\x69\x74\150\x6d", $dW);
            goto TBH;
            yTv:
            $kU->setAttribute("\101\x6c\x67\x6f\162\x69\164\150\x6d", "\x68\164\x74\x70\x3a\x2f\57\167\167\x77\56\x77\x33\56\x6f\162\x67\57\124\122\57\x31\71\x39\x39\x2f\x52\x45\x43\55\x78\x70\141\x74\x68\55\61\x39\x39\x39\61\x31\61\66");
            $pC = $this->createNewSignNode("\x58\x50\141\164\x68", $dW["\150\164\x74\x70\x3a\57\x2f\x77\x77\167\x2e\x77\63\56\157\162\147\57\124\x52\x2f\x31\x39\x39\x39\x2f\122\105\103\x2d\170\x70\x61\164\x68\55\61\71\x39\71\x31\x31\61\x36"]["\x71\165\x65\x72\171"]);
            $kU->appendChild($pC);
            if (empty($dW["\x68\164\x74\x70\x3a\x2f\57\167\167\167\x2e\x77\x33\x2e\x6f\162\x67\x2f\124\122\x2f\x31\71\71\x39\57\x52\x45\103\x2d\x78\x70\x61\x74\150\55\x31\x39\71\71\61\61\x31\66"]["\156\141\155\x65\163\x70\x61\143\145\x73"])) {
                goto B8V;
            }
            foreach ($dW["\150\164\x74\x70\72\57\57\x77\x77\x77\56\x77\x33\56\157\x72\147\x2f\124\122\x2f\x31\71\71\71\57\x52\x45\x43\55\x78\160\141\x74\x68\55\x31\71\71\x39\x31\x31\x31\x36"]["\x6e\x61\155\x65\x73\160\141\143\x65\x73"] as $It => $oO) {
                $pC->setAttributeNS("\150\x74\x74\x70\72\57\57\167\x77\167\x2e\167\x33\x2e\157\x72\x67\57\x32\x30\60\60\x2f\x78\x6d\154\x6e\163\x2f", "\x78\x6d\154\156\163\72{$It}", $oO);
                rqw:
            }
            OVg:
            B8V:
            TBH:
            Dc4:
        }
        R57:
        goto doS;
        kJn:
        $kU = $this->createNewSignNode("\124\162\141\156\x73\146\x6f\x72\155");
        $XH->appendChild($kU);
        $kU->setAttribute("\101\x6c\x67\x6f\x72\151\x74\150\x6d", $this->canonicalMethod);
        doS:
        $hz = $this->processTransforms($S4, $pi);
        $oN = $this->calculateDigest($wl, $hz);
        $U4 = $this->createNewSignNode("\x44\151\147\x65\163\x74\115\x65\x74\x68\x6f\x64");
        $S4->appendChild($U4);
        $U4->setAttribute("\x41\x6c\147\157\162\x69\x74\150\155", $wl);
        $mw = $this->createNewSignNode("\x44\151\147\145\163\164\x56\141\154\x75\x65", $oN);
        $S4->appendChild($mw);
    }
    public function addReference($pi, $wl, $co = null, $M4 = null)
    {
        if (!($TB = $this->getXPathObj())) {
            goto DI1;
        }
        $Gy = "\56\57\163\145\x63\144\163\x69\147\x3a\x53\x69\x67\x6e\x65\144\x49\156\146\157";
        $Un = $TB->query($Gy, $this->sigNode);
        if (!($nN = $Un->item(0))) {
            goto vzN;
        }
        $this->addRefInternal($nN, $pi, $wl, $co, $M4);
        vzN:
        DI1:
    }
    public function addReferenceList($OQ, $wl, $co = null, $M4 = null)
    {
        if (!($TB = $this->getXPathObj())) {
            goto mFg;
        }
        $Gy = "\56\x2f\x73\145\x63\x64\x73\151\x67\x3a\123\x69\147\x6e\x65\144\x49\x6e\x66\x6f";
        $Un = $TB->query($Gy, $this->sigNode);
        if (!($nN = $Un->item(0))) {
            goto UQ0;
        }
        foreach ($OQ as $pi) {
            $this->addRefInternal($nN, $pi, $wl, $co, $M4);
            wvv:
        }
        Zix:
        UQ0:
        mFg:
    }
    public function addObject($Qk, $DY = null, $Gz = null)
    {
        $Kg = $this->createNewSignNode("\117\142\152\x65\x63\164");
        $this->sigNode->appendChild($Kg);
        if (empty($DY)) {
            goto yv3;
        }
        $Kg->setAttribute("\115\151\155\x65\x54\171\x70\x65", $DY);
        yv3:
        if (empty($Gz)) {
            goto eIU;
        }
        $Kg->setAttribute("\x45\x6e\143\x6f\144\x69\x6e\x67", $Gz);
        eIU:
        if ($Qk instanceof DOMElement) {
            goto Oxm;
        }
        $Wj = $this->sigNode->ownerDocument->createTextNode($Qk);
        goto Dzq;
        Oxm:
        $Wj = $this->sigNode->ownerDocument->importNode($Qk, true);
        Dzq:
        $Kg->appendChild($Wj);
        return $Kg;
    }
    public function locateKey($pi = null)
    {
        if (!empty($pi)) {
            goto Rwi;
        }
        $pi = $this->sigNode;
        Rwi:
        if ($pi instanceof DOMNode) {
            goto P2d;
        }
        return null;
        P2d:
        if (!($pf = $pi->ownerDocument)) {
            goto T2U;
        }
        $TB = new DOMXPath($pf);
        $TB->registerNamespace("\x73\x65\143\x64\x73\x69\147", self::XMLDSIGNS);
        $Gy = "\x73\164\x72\151\x6e\147\50\56\x2f\x73\145\x63\x64\163\x69\147\x3a\x53\151\147\156\145\144\x49\156\146\x6f\57\163\x65\x63\144\x73\x69\147\x3a\123\151\x67\156\x61\x74\165\x72\x65\115\x65\x74\x68\x6f\x64\57\x40\x41\x6c\x67\x6f\x72\x69\164\x68\155\x29";
        $wl = $TB->evaluate($Gy, $pi);
        if (!$wl) {
            goto Uvd;
        }
        try {
            $c8 = new XMLSecurityKey($wl, array("\164\171\x70\x65" => "\160\165\x62\x6c\x69\x63"));
        } catch (Exception $sL) {
            return null;
        }
        return $c8;
        Uvd:
        T2U:
        return null;
    }
    public function verify($c8)
    {
        $pf = $this->sigNode->ownerDocument;
        $TB = new DOMXPath($pf);
        $TB->registerNamespace("\x73\x65\x63\x64\163\151\x67", self::XMLDSIGNS);
        $Gy = "\163\x74\x72\151\x6e\x67\x28\56\x2f\x73\x65\143\x64\163\x69\x67\72\x53\151\147\x6e\x61\164\x75\x72\x65\x56\141\154\165\x65\51";
        $uM = $TB->evaluate($Gy, $this->sigNode);
        if (!empty($uM)) {
            goto Dpc;
        }
        throw new Exception("\x55\x6e\x61\x62\154\x65\x20\164\x6f\x20\x6c\x6f\143\141\164\x65\x20\123\151\x67\156\141\x74\165\162\145\126\x61\154\165\x65");
        Dpc:
        return $c8->verifySignature($this->signedInfo, base64_decode($uM));
    }
    public function signData($c8, $Qk)
    {
        return $c8->signData($Qk);
    }
    public function sign($c8, $TU = null)
    {
        if (!($TU != null)) {
            goto eNs;
        }
        $this->resetXPathObj();
        $this->appendSignature($TU);
        $this->sigNode = $TU->lastChild;
        eNs:
        if (!($TB = $this->getXPathObj())) {
            goto y_A;
        }
        $Gy = "\56\57\x73\x65\x63\x64\163\151\x67\x3a\123\151\x67\x6e\x65\x64\111\156\x66\x6f";
        $Un = $TB->query($Gy, $this->sigNode);
        if (!($nN = $Un->item(0))) {
            goto aQt;
        }
        $Gy = "\x2e\57\x73\145\x63\144\163\x69\147\72\x53\x69\147\x6e\x61\x74\165\162\145\115\x65\x74\150\157\x64";
        $Un = $TB->query($Gy, $nN);
        $lD = $Un->item(0);
        $lD->setAttribute("\x41\x6c\x67\157\162\151\164\x68\x6d", $c8->type);
        $Qk = $this->canonicalizeData($nN, $this->canonicalMethod);
        $uM = base64_encode($this->signData($c8, $Qk));
        $Z2 = $this->createNewSignNode("\123\x69\x67\x6e\141\x74\x75\x72\x65\126\x61\154\165\x65", $uM);
        if ($qM = $nN->nextSibling) {
            goto l1j;
        }
        $this->sigNode->appendChild($Z2);
        goto cmP;
        l1j:
        $qM->parentNode->insertBefore($Z2, $qM);
        cmP:
        aQt:
        y_A:
    }
    public function appendCert()
    {
    }
    public function appendKey($c8, $UF = null)
    {
        $c8->serializeKey($UF);
    }
    public function insertSignature($pi, $Fm = null)
    {
        $X8 = $pi->ownerDocument;
        $FK = $X8->importNode($this->sigNode, true);
        if ($Fm == null) {
            goto GZ0;
        }
        return $pi->insertBefore($FK, $Fm);
        goto WrT;
        GZ0:
        return $pi->insertBefore($FK);
        WrT:
    }
    public function appendSignature($Ik, $zP = false)
    {
        $Fm = $zP ? $Ik->firstChild : null;
        return $this->insertSignature($Ik, $Fm);
    }
    public static function get509XCert($em, $Ke = true)
    {
        $Y0 = self::staticGet509XCerts($em, $Ke);
        if (empty($Y0)) {
            goto LQN;
        }
        return $Y0[0];
        LQN:
        return '';
    }
    public static function staticGet509XCerts($Y0, $Ke = true)
    {
        if ($Ke) {
            goto Me2;
        }
        return array($Y0);
        goto XfB;
        Me2:
        $Qk = '';
        $Sh = array();
        $iN = explode("\12", $Y0);
        $vB = false;
        foreach ($iN as $cs) {
            if (!$vB) {
                goto ieD;
            }
            if (!(strncmp($cs, "\x2d\x2d\x2d\x2d\55\105\x4e\x44\x20\x43\x45\122\124\x49\x46\111\x43\101\x54\x45", 20) == 0)) {
                goto Ige;
            }
            $vB = false;
            $Sh[] = $Qk;
            $Qk = '';
            goto TJg;
            Ige:
            $Qk .= trim($cs);
            goto vMh;
            ieD:
            if (!(strncmp($cs, "\x2d\55\55\x2d\x2d\x42\x45\x47\x49\x4e\x20\103\x45\122\x54\111\106\111\x43\101\124\105", 22) == 0)) {
                goto m2s;
            }
            $vB = true;
            m2s:
            vMh:
            TJg:
        }
        qWy:
        return $Sh;
        XfB:
    }
    public static function staticAdd509Cert($Th, $em, $Ke = true, $pw = false, $TB = null, $M4 = null)
    {
        if (!$pw) {
            goto iwe;
        }
        $em = file_get_contents($em);
        iwe:
        if ($Th instanceof DOMElement) {
            goto X7l;
        }
        throw new Exception("\x49\156\x76\141\x6c\x69\144\40\x70\x61\162\145\x6e\x74\40\x4e\157\144\x65\40\160\x61\x72\x61\x6d\145\164\145\162");
        X7l:
        $cA = $Th->ownerDocument;
        if (!empty($TB)) {
            goto k29;
        }
        $TB = new DOMXPath($Th->ownerDocument);
        $TB->registerNamespace("\x73\145\143\x64\163\x69\147", self::XMLDSIGNS);
        k29:
        $Gy = "\x2e\x2f\163\145\143\144\163\x69\x67\72\113\145\x79\x49\156\x66\157";
        $Un = $TB->query($Gy, $Th);
        $fL = $Un->item(0);
        $zR = '';
        if (!$fL) {
            goto o4s;
        }
        $qI = $fL->lookupPrefix(self::XMLDSIGNS);
        if (empty($qI)) {
            goto R1x;
        }
        $zR = $qI . "\72";
        R1x:
        goto PCV;
        o4s:
        $qI = $Th->lookupPrefix(self::XMLDSIGNS);
        if (empty($qI)) {
            goto sHo;
        }
        $zR = $qI . "\x3a";
        sHo:
        $GO = false;
        $fL = $cA->createElementNS(self::XMLDSIGNS, $zR . "\113\145\171\111\x6e\x66\x6f");
        $Gy = "\56\57\x73\x65\x63\144\x73\x69\147\72\117\x62\x6a\145\143\164";
        $Un = $TB->query($Gy, $Th);
        if (!($fN = $Un->item(0))) {
            goto ITy;
        }
        $fN->parentNode->insertBefore($fL, $fN);
        $GO = true;
        ITy:
        if ($GO) {
            goto jzK;
        }
        $Th->appendChild($fL);
        jzK:
        PCV:
        $Y0 = self::staticGet509XCerts($em, $Ke);
        $Oe = $cA->createElementNS(self::XMLDSIGNS, $zR . "\x58\65\x30\x39\x44\141\x74\141");
        $fL->appendChild($Oe);
        $CS = false;
        $VO = false;
        if (!is_array($M4)) {
            goto L3o;
        }
        if (empty($M4["\151\163\163\165\145\162\x53\145\x72\151\x61\x6c"])) {
            goto ZjC;
        }
        $CS = true;
        ZjC:
        if (empty($M4["\163\x75\142\x6a\145\143\x74\116\x61\x6d\145"])) {
            goto kBS;
        }
        $VO = true;
        kBS:
        L3o:
        foreach ($Y0 as $Pk) {
            if (!($CS || $VO)) {
                goto OlI;
            }
            if (!($qB = openssl_x509_parse("\x2d\55\55\x2d\x2d\x42\105\107\111\116\40\x43\105\x52\124\111\x46\111\x43\101\124\x45\55\55\55\x2d\x2d\xa" . chunk_split($Pk, 64, "\xa") . "\55\55\x2d\55\55\105\x4e\x44\x20\x43\x45\122\124\111\x46\111\103\101\124\105\x2d\55\55\x2d\55\xa"))) {
                goto ehc;
            }
            if (!($VO && !empty($qB["\x73\165\x62\152\145\x63\164"]))) {
                goto lfJ;
            }
            if (is_array($qB["\163\165\142\x6a\x65\x63\x74"])) {
                goto U3u;
            }
            $QF = $qB["\151\x73\163\x75\145\162"];
            goto G0c;
            U3u:
            $iV = array();
            foreach ($qB["\x73\x75\142\x6a\145\x63\164"] as $k3 => $zw) {
                if (is_array($zw)) {
                    goto O3k;
                }
                array_unshift($iV, "{$k3}\x3d{$zw}");
                goto xrI;
                O3k:
                foreach ($zw as $wc) {
                    array_unshift($iV, "{$k3}\75{$wc}");
                    gcC:
                }
                wac:
                xrI:
                R3D:
            }
            yTh:
            $QF = implode("\54", $iV);
            G0c:
            $uX = $cA->createElementNS(self::XMLDSIGNS, $zR . "\x58\x35\60\71\123\165\x62\152\x65\143\x74\x4e\x61\x6d\145", $QF);
            $Oe->appendChild($uX);
            lfJ:
            if (!($CS && !empty($qB["\x69\163\x73\165\145\x72"]) && !empty($qB["\x73\x65\x72\x69\141\x6c\116\x75\155\x62\x65\162"]))) {
                goto WlG;
            }
            if (is_array($qB["\x69\163\x73\165\145\x72"])) {
                goto nsb;
            }
            $Tf = $qB["\x69\163\163\165\x65\x72"];
            goto pXV;
            nsb:
            $iV = array();
            foreach ($qB["\151\x73\163\x75\x65\162"] as $k3 => $zw) {
                array_unshift($iV, "{$k3}\x3d{$zw}");
                vE2:
            }
            wLc:
            $Tf = implode("\x2c", $iV);
            pXV:
            $j8 = $cA->createElementNS(self::XMLDSIGNS, $zR . "\130\65\x30\71\x49\x73\163\x75\x65\x72\123\145\x72\151\x61\x6c");
            $Oe->appendChild($j8);
            $oK = $cA->createElementNS(self::XMLDSIGNS, $zR . "\x58\65\60\x39\x49\163\163\165\x65\162\x4e\141\x6d\145", $Tf);
            $j8->appendChild($oK);
            $oK = $cA->createElementNS(self::XMLDSIGNS, $zR . "\130\x35\x30\71\123\145\162\x69\141\154\116\165\155\142\145\162", $qB["\x73\145\162\151\141\154\x4e\x75\x6d\x62\x65\162"]);
            $j8->appendChild($oK);
            WlG:
            ehc:
            OlI:
            $Gd = $cA->createElementNS(self::XMLDSIGNS, $zR . "\x58\x35\x30\x39\103\x65\x72\x74\151\x66\151\143\x61\x74\x65", $Pk);
            $Oe->appendChild($Gd);
            gBd:
        }
        Tvo:
    }
    public function add509Cert($em, $Ke = true, $pw = false, $M4 = null)
    {
        if (!($TB = $this->getXPathObj())) {
            goto fVX;
        }
        self::staticAdd509Cert($this->sigNode, $em, $Ke, $pw, $TB, $M4);
        fVX:
    }
    public function appendToKeyInfo($pi)
    {
        $Th = $this->sigNode;
        $cA = $Th->ownerDocument;
        $TB = $this->getXPathObj();
        if (!empty($TB)) {
            goto p0U;
        }
        $TB = new DOMXPath($Th->ownerDocument);
        $TB->registerNamespace("\163\x65\143\144\x73\151\x67", self::XMLDSIGNS);
        p0U:
        $Gy = "\56\57\x73\x65\143\144\x73\x69\147\x3a\x4b\145\x79\111\x6e\x66\157";
        $Un = $TB->query($Gy, $Th);
        $fL = $Un->item(0);
        if ($fL) {
            goto P4p;
        }
        $zR = '';
        $qI = $Th->lookupPrefix(self::XMLDSIGNS);
        if (empty($qI)) {
            goto gBD;
        }
        $zR = $qI . "\72";
        gBD:
        $GO = false;
        $fL = $cA->createElementNS(self::XMLDSIGNS, $zR . "\113\x65\x79\111\156\x66\x6f");
        $Gy = "\x2e\x2f\163\145\x63\144\x73\x69\147\72\117\142\152\145\143\x74";
        $Un = $TB->query($Gy, $Th);
        if (!($fN = $Un->item(0))) {
            goto U3U;
        }
        $fN->parentNode->insertBefore($fL, $fN);
        $GO = true;
        U3U:
        if ($GO) {
            goto xrn;
        }
        $Th->appendChild($fL);
        xrn:
        P4p:
        $fL->appendChild($pi);
        return $fL;
    }
    public function getValidatedNodes()
    {
        return $this->validatedNodes;
    }
}
