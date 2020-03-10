<?php


namespace RobRichards\XMLSecLibs;

use DOMDocument;
use DOMNode;
use DOMXPath;
use Exception;
use RobRichards\XMLSecLibs\Utils\XPath;
class XMLSecEnc
{
    const template = "\74\x78\x65\156\x63\72\x45\156\143\162\x79\x70\164\x65\x64\104\x61\164\141\40\x78\x6d\154\156\163\x3a\x78\145\156\143\x3d\47\x68\164\x74\x70\x3a\57\x2f\x77\x77\167\56\x77\x33\x2e\157\x72\147\57\x32\x30\60\x31\x2f\x30\64\x2f\x78\x6d\x6c\x65\156\143\x23\x27\76\xa\40\x20\40\74\x78\145\156\x63\72\x43\x69\160\x68\145\x72\104\141\164\x61\76\12\40\x20\x20\40\x20\x20\74\170\145\x6e\x63\72\x43\x69\x70\x68\145\162\x56\141\x6c\x75\x65\x3e\x3c\57\x78\145\156\x63\x3a\x43\x69\160\150\x65\162\126\x61\x6c\165\145\x3e\xa\x20\40\x20\x3c\57\170\145\x6e\x63\x3a\103\x69\x70\x68\x65\x72\104\141\164\141\76\xa\74\x2f\170\x65\156\143\72\105\156\143\162\x79\160\164\x65\x64\104\x61\x74\x61\x3e";
    const Element = "\150\x74\x74\160\x3a\x2f\57\167\167\x77\56\167\63\56\x6f\x72\x67\x2f\x32\x30\x30\61\57\60\x34\x2f\x78\x6d\154\x65\156\143\43\105\154\145\x6d\145\x6e\164";
    const Content = "\x68\x74\x74\160\x3a\57\x2f\x77\x77\167\56\167\x33\x2e\x6f\162\x67\x2f\x32\60\60\61\57\60\x34\x2f\x78\155\154\145\x6e\x63\43\x43\157\x6e\x74\145\x6e\164";
    const URI = 3;
    const XMLENCNS = "\150\164\x74\x70\72\x2f\x2f\x77\x77\x77\56\x77\x33\56\x6f\x72\147\x2f\62\x30\60\x31\57\x30\64\x2f\170\x6d\x6c\145\x6e\x63\43";
    private $encdoc = null;
    private $rawNode = null;
    public $type = null;
    public $encKey = null;
    private $references = array();
    public function __construct()
    {
        $this->_resetTemplate();
    }
    private function _resetTemplate()
    {
        $this->encdoc = new DOMDocument();
        $this->encdoc->loadXML(self::template);
    }
    public function addReference($eB, $pi, $ZL)
    {
        if ($pi instanceof DOMNode) {
            goto LoH;
        }
        throw new Exception("\44\x6e\x6f\x64\x65\x20\151\163\x20\156\157\164\40\157\146\40\164\171\160\x65\40\x44\117\x4d\x4e\157\144\145");
        LoH:
        $s1 = $this->encdoc;
        $this->_resetTemplate();
        $o7 = $this->encdoc;
        $this->encdoc = $s1;
        $W5 = XMLSecurityDSig::generateGUID();
        $kF = $o7->documentElement;
        $kF->setAttribute("\111\x64", $W5);
        $this->references[$eB] = array("\x6e\157\144\x65" => $pi, "\164\x79\160\x65" => $ZL, "\x65\156\x63\156\x6f\144\x65" => $o7, "\x72\x65\146\165\x72\x69" => $W5);
    }
    public function setNode($pi)
    {
        $this->rawNode = $pi;
    }
    public function encryptNode($c8, $b8 = true)
    {
        $Qk = '';
        if (!empty($this->rawNode)) {
            goto hU4;
        }
        throw new Exception("\116\x6f\144\145\x20\164\x6f\x20\x65\156\x63\x72\x79\160\x74\40\x68\141\163\40\156\x6f\x74\x20\142\x65\x65\156\40\163\x65\x74");
        hU4:
        if ($c8 instanceof XMLSecurityKey) {
            goto gOq;
        }
        throw new Exception("\111\156\166\141\x6c\x69\x64\x20\x4b\145\x79");
        gOq:
        $pf = $this->rawNode->ownerDocument;
        $d8 = new DOMXPath($this->encdoc);
        $Ln = $d8->query("\57\x78\145\156\x63\x3a\105\156\143\162\171\x70\164\145\x64\104\141\x74\x61\57\x78\145\x6e\143\72\x43\151\x70\x68\145\x72\x44\141\164\x61\x2f\x78\145\x6e\x63\72\x43\151\160\150\x65\x72\x56\x61\x6c\x75\x65");
        $DE = $Ln->item(0);
        if (!($DE == null)) {
            goto vdi;
        }
        throw new Exception("\105\x72\x72\157\x72\x20\x6c\x6f\x63\x61\x74\151\156\x67\x20\x43\x69\x70\x68\145\x72\x56\141\154\x75\145\x20\x65\x6c\x65\155\x65\156\x74\40\167\151\x74\x68\x69\x6e\x20\164\x65\x6d\x70\x6c\141\x74\x65");
        vdi:
        switch ($this->type) {
            case self::Element:
                $Qk = $pf->saveXML($this->rawNode);
                $this->encdoc->documentElement->setAttribute("\124\171\160\x65", self::Element);
                goto bbF;
            case self::Content:
                $qa = $this->rawNode->childNodes;
                foreach ($qa as $dv) {
                    $Qk .= $pf->saveXML($dv);
                    Zeq:
                }
                hp1:
                $this->encdoc->documentElement->setAttribute("\x54\171\x70\145", self::Content);
                goto bbF;
            default:
                throw new Exception("\x54\171\160\x65\40\x69\163\x20\143\x75\162\162\145\156\164\154\171\40\x6e\157\x74\x20\x73\165\x70\160\x6f\x72\164\x65\144");
        }
        Cee:
        bbF:
        $TC = $this->encdoc->documentElement->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\145\156\143\x3a\x45\156\143\x72\x79\160\x74\151\x6f\x6e\x4d\x65\164\x68\x6f\x64"));
        $TC->setAttribute("\x41\154\147\157\162\151\164\150\155", $c8->getAlgorithm());
        $DE->parentNode->parentNode->insertBefore($TC, $DE->parentNode->parentNode->firstChild);
        $pV = base64_encode($c8->encryptData($Qk));
        $zw = $this->encdoc->createTextNode($pV);
        $DE->appendChild($zw);
        if ($b8) {
            goto Lws;
        }
        return $this->encdoc->documentElement;
        goto OZS;
        Lws:
        switch ($this->type) {
            case self::Element:
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto fTN;
                }
                return $this->encdoc;
                fTN:
                $H0 = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                $this->rawNode->parentNode->replaceChild($H0, $this->rawNode);
                return $H0;
            case self::Content:
                $H0 = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                i4s:
                if (!$this->rawNode->firstChild) {
                    goto WQh;
                }
                $this->rawNode->removeChild($this->rawNode->firstChild);
                goto i4s;
                WQh:
                $this->rawNode->appendChild($H0);
                return $H0;
        }
        xaC:
        yxR:
        OZS:
    }
    public function encryptReferences($c8)
    {
        $tY = $this->rawNode;
        $pH = $this->type;
        foreach ($this->references as $eB => $wh) {
            $this->encdoc = $wh["\145\x6e\143\x6e\157\x64\x65"];
            $this->rawNode = $wh["\156\157\144\145"];
            $this->type = $wh["\164\x79\x70\145"];
            try {
                $lS = $this->encryptNode($c8);
                $this->references[$eB]["\145\x6e\x63\156\157\x64\x65"] = $lS;
            } catch (Exception $sL) {
                $this->rawNode = $tY;
                $this->type = $pH;
                throw $sL;
            }
            wXr:
        }
        JgR:
        $this->rawNode = $tY;
        $this->type = $pH;
    }
    public function getCipherValue()
    {
        if (!empty($this->rawNode)) {
            goto QVJ;
        }
        throw new Exception("\x4e\157\x64\x65\x20\x74\157\x20\144\x65\x63\162\x79\160\164\x20\x68\x61\x73\40\156\x6f\x74\40\x62\x65\145\x6e\40\163\145\164");
        QVJ:
        $pf = $this->rawNode->ownerDocument;
        $d8 = new DOMXPath($pf);
        $d8->registerNamespace("\170\155\154\x65\x6e\143\x72", self::XMLENCNS);
        $Gy = "\x2e\x2f\170\155\x6c\145\156\143\162\72\x43\151\160\150\x65\x72\x44\x61\x74\141\x2f\x78\x6d\x6c\x65\x6e\143\x72\x3a\x43\151\160\150\145\162\126\x61\154\x75\x65";
        $Un = $d8->query($Gy, $this->rawNode);
        $pi = $Un->item(0);
        if ($pi) {
            goto hkf;
        }
        return null;
        hkf:
        return base64_decode($pi->nodeValue);
    }
    public function decryptNode($c8, $b8 = true)
    {
        if ($c8 instanceof XMLSecurityKey) {
            goto xS3;
        }
        throw new Exception("\x49\156\x76\x61\x6c\151\144\x20\113\x65\x79");
        xS3:
        $u5 = $this->getCipherValue();
        if ($u5) {
            goto RhL;
        }
        throw new Exception("\x43\141\x6e\x6e\x6f\164\40\x6c\157\x63\141\x74\x65\40\x65\x6e\143\162\x79\x70\164\145\x64\x20\x64\141\164\141");
        goto N3o;
        RhL:
        $tg = $c8->decryptData($u5);
        if ($b8) {
            goto nsw;
        }
        return $tg;
        goto LLj;
        nsw:
        switch ($this->type) {
            case self::Element:
                $Hx = new DOMDocument();
                $Hx->loadXML($tg);
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto XCU;
                }
                return $Hx;
                XCU:
                $H0 = $this->rawNode->ownerDocument->importNode($Hx->documentElement, true);
                $this->rawNode->parentNode->replaceChild($H0, $this->rawNode);
                return $H0;
            case self::Content:
                if ($this->rawNode->nodeType == XML_DOCUMENT_NODE) {
                    goto rEJ;
                }
                $pf = $this->rawNode->ownerDocument;
                goto ayW;
                rEJ:
                $pf = $this->rawNode;
                ayW:
                $us = $pf->createDocumentFragment();
                $us->appendXML($tg);
                $UF = $this->rawNode->parentNode;
                $UF->replaceChild($us, $this->rawNode);
                return $UF;
            default:
                return $tg;
        }
        x2b:
        Y43:
        LLj:
        N3o:
    }
    public function encryptKey($Md, $fc, $Or = true)
    {
        if (!(!$Md instanceof XMLSecurityKey || !$fc instanceof XMLSecurityKey)) {
            goto coN;
        }
        throw new Exception("\x49\156\x76\x61\154\151\x64\40\x4b\x65\x79");
        coN:
        $pk = base64_encode($Md->encryptData($fc->key));
        $P2 = $this->encdoc->documentElement;
        $wU = $this->encdoc->createElementNS(self::XMLENCNS, "\170\x65\156\143\x3a\105\156\143\x72\x79\x70\x74\145\x64\x4b\x65\x79");
        if ($Or) {
            goto KHn;
        }
        $this->encKey = $wU;
        goto c08;
        KHn:
        $fL = $P2->insertBefore($this->encdoc->createElementNS("\x68\x74\164\160\72\x2f\57\167\x77\167\56\167\x33\56\157\x72\147\x2f\x32\60\60\x30\57\60\x39\57\x78\155\154\x64\x73\x69\147\x23", "\x64\163\151\x67\x3a\113\x65\171\111\x6e\146\x6f"), $P2->firstChild);
        $fL->appendChild($wU);
        c08:
        $TC = $wU->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\x65\156\143\72\105\156\143\x72\x79\160\164\x69\157\156\x4d\145\x74\150\157\144"));
        $TC->setAttribute("\x41\154\147\x6f\162\151\x74\x68\x6d", $Md->getAlgorith());
        if (empty($Md->name)) {
            goto J4W;
        }
        $fL = $wU->appendChild($this->encdoc->createElementNS("\x68\164\164\x70\x3a\x2f\x2f\x77\x77\x77\x2e\167\x33\56\157\162\x67\x2f\x32\x30\60\60\57\60\71\x2f\x78\x6d\154\x64\163\151\147\43", "\x64\163\x69\147\x3a\113\145\171\x49\x6e\x66\x6f"));
        $fL->appendChild($this->encdoc->createElementNS("\x68\x74\x74\x70\x3a\57\x2f\167\x77\x77\x2e\x77\x33\x2e\157\x72\x67\57\62\60\60\60\57\x30\x39\x2f\x78\155\154\144\x73\151\147\43", "\x64\x73\x69\x67\x3a\113\145\x79\x4e\141\x6d\145", $Md->name));
        J4W:
        $L5 = $wU->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\x65\156\143\72\x43\x69\160\150\x65\x72\x44\141\x74\x61"));
        $L5->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\145\156\143\x3a\103\x69\x70\150\145\162\126\141\x6c\x75\x65", $pk));
        if (!(is_array($this->references) && count($this->references) > 0)) {
            goto LZk;
        }
        $Ac = $wU->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\x65\x6e\x63\x3a\x52\145\146\145\x72\x65\156\143\145\114\151\x73\x74"));
        foreach ($this->references as $eB => $wh) {
            $W5 = $wh["\162\x65\146\x75\x72\151"];
            $qD = $Ac->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\x65\x6e\143\x3a\x44\x61\164\141\x52\x65\x66\145\x72\145\156\143\x65"));
            $qD->setAttribute("\x55\122\x49", "\43" . $W5);
            GHR:
        }
        Fbl:
        LZk:
        return;
    }
    public function decryptKey($wU)
    {
        if ($wU->isEncrypted) {
            goto c3x;
        }
        throw new Exception("\x4b\145\x79\40\151\163\x20\x6e\x6f\x74\40\x45\156\x63\x72\171\x70\x74\x65\144");
        c3x:
        if (!empty($wU->key)) {
            goto vjW;
        }
        throw new Exception("\113\x65\171\40\151\x73\40\155\151\163\163\x69\156\147\40\144\141\x74\141\40\x74\157\40\x70\145\162\146\x6f\x72\155\x20\x74\150\145\x20\144\145\x63\162\171\160\164\x69\x6f\156");
        vjW:
        return $this->decryptNode($wU, false);
    }
    public function locateEncryptedData($kF)
    {
        if ($kF instanceof DOMDocument) {
            goto GRp;
        }
        $pf = $kF->ownerDocument;
        goto ShO;
        GRp:
        $pf = $kF;
        ShO:
        if (!$pf) {
            goto vO3;
        }
        $TB = new DOMXPath($pf);
        $Gy = "\57\57\52\x5b\154\157\143\141\x6c\55\156\x61\x6d\x65\50\x29\x3d\x27\x45\x6e\x63\162\x79\x70\164\145\x64\x44\141\164\141\x27\x20\x61\156\144\x20\156\141\x6d\x65\x73\x70\x61\x63\x65\55\165\x72\x69\x28\51\x3d\47" . self::XMLENCNS . "\47\x5d";
        $Un = $TB->query($Gy);
        return $Un->item(0);
        vO3:
        return null;
    }
    public function locateKey($pi = null)
    {
        if (!empty($pi)) {
            goto lLe;
        }
        $pi = $this->rawNode;
        lLe:
        if ($pi instanceof DOMNode) {
            goto iWW;
        }
        return null;
        iWW:
        if (!($pf = $pi->ownerDocument)) {
            goto TWj;
        }
        $TB = new DOMXPath($pf);
        $TB->registerNamespace("\170\155\x6c\x73\x65\143\145\x6e\143", self::XMLENCNS);
        $Gy = "\x2e\57\57\170\x6d\154\x73\145\x63\145\156\x63\x3a\105\x6e\143\162\x79\x70\x74\x69\157\x6e\115\145\164\x68\x6f\144";
        $Un = $TB->query($Gy, $pi);
        if (!($aq = $Un->item(0))) {
            goto lXw;
        }
        $Uc = $aq->getAttribute("\x41\x6c\147\157\x72\x69\x74\x68\155");
        try {
            $c8 = new XMLSecurityKey($Uc, array("\164\x79\x70\x65" => "\x70\x72\151\166\141\164\145"));
        } catch (Exception $sL) {
            return null;
        }
        return $c8;
        lXw:
        TWj:
        return null;
    }
    public static function staticLocateKeyInfo($eQ = null, $pi = null)
    {
        if (!(empty($pi) || !$pi instanceof DOMNode)) {
            goto Ofv;
        }
        return null;
        Ofv:
        $pf = $pi->ownerDocument;
        if ($pf) {
            goto rDl;
        }
        return null;
        rDl:
        $TB = new DOMXPath($pf);
        $TB->registerNamespace("\170\x6d\x6c\x73\145\143\x65\x6e\x63", self::XMLENCNS);
        $TB->registerNamespace("\x78\155\154\163\x65\x63\144\163\x69\x67", XMLSecurityDSig::XMLDSIGNS);
        $Gy = "\56\57\x78\x6d\x6c\163\145\143\144\x73\x69\147\x3a\x4b\x65\171\111\156\x66\157";
        $Un = $TB->query($Gy, $pi);
        $aq = $Un->item(0);
        if ($aq) {
            goto vj5;
        }
        return $eQ;
        vj5:
        foreach ($aq->childNodes as $dv) {
            switch ($dv->localName) {
                case "\113\x65\171\116\x61\x6d\x65":
                    if (empty($eQ)) {
                        goto oWb;
                    }
                    $eQ->name = $dv->nodeValue;
                    oWb:
                    goto xOu;
                case "\x4b\145\171\126\x61\154\x75\x65":
                    foreach ($dv->childNodes as $Vp) {
                        switch ($Vp->localName) {
                            case "\x44\123\x41\113\x65\171\x56\x61\x6c\x75\x65":
                                throw new Exception("\104\123\101\113\145\171\x56\x61\x6c\165\x65\40\x63\x75\x72\162\x65\x6e\164\x6c\171\40\156\157\x74\x20\x73\165\160\160\x6f\162\x74\x65\x64");
                            case "\122\x53\x41\113\145\x79\126\141\x6c\x75\x65":
                                $st = null;
                                $SZ = null;
                                if (!($j1 = $Vp->getElementsByTagName("\115\x6f\x64\165\154\165\x73")->item(0))) {
                                    goto ced;
                                }
                                $st = base64_decode($j1->nodeValue);
                                ced:
                                if (!($Fj = $Vp->getElementsByTagName("\x45\170\x70\157\x6e\x65\x6e\164")->item(0))) {
                                    goto NTh;
                                }
                                $SZ = base64_decode($Fj->nodeValue);
                                NTh:
                                if (!(empty($st) || empty($SZ))) {
                                    goto P5B;
                                }
                                throw new Exception("\x4d\x69\163\x73\x69\156\x67\x20\115\x6f\144\x75\154\165\163\40\x6f\x72\x20\x45\x78\x70\157\156\145\x6e\x74");
                                P5B:
                                $Mo = XMLSecurityKey::convertRSA($st, $SZ);
                                $eQ->loadKey($Mo);
                                goto VBL;
                        }
                        HlE:
                        VBL:
                        RfQ:
                    }
                    siO:
                    goto xOu;
                case "\122\145\164\162\151\x65\x76\x61\154\115\145\164\x68\157\144":
                    $ZL = $dv->getAttribute("\x54\x79\x70\x65");
                    if (!($ZL !== "\x68\164\164\x70\72\x2f\x2f\x77\167\x77\x2e\x77\x33\56\157\x72\x67\57\x32\x30\60\x31\x2f\60\x34\x2f\x78\155\154\x65\x6e\x63\x23\x45\x6e\143\162\x79\160\164\145\x64\113\x65\x79")) {
                        goto c2v;
                    }
                    goto xOu;
                    c2v:
                    $Xz = $dv->getAttribute("\x55\x52\x49");
                    if (!($Xz[0] !== "\43")) {
                        goto ksI;
                    }
                    goto xOu;
                    ksI:
                    $zy = substr($Xz, 1);
                    $Gy = "\57\57\170\155\154\163\145\x63\x65\156\143\x3a\105\x6e\143\x72\x79\160\x74\x65\144\x4b\145\171\133\100\x49\x64\75\42" . XPath::filterAttrValue($zy, XPath::DOUBLE_QUOTE) . "\42\135";
                    $KP = $TB->query($Gy)->item(0);
                    if ($KP) {
                        goto zBk;
                    }
                    throw new Exception("\125\156\x61\142\154\145\x20\164\x6f\x20\x6c\x6f\x63\x61\164\145\40\x45\156\x63\162\x79\x70\164\145\144\x4b\145\x79\40\x77\x69\x74\x68\40\100\x49\144\75\47{$zy}\47\56");
                    zBk:
                    return XMLSecurityKey::fromEncryptedKeyElement($KP);
                case "\105\156\143\162\x79\x70\x74\x65\x64\113\x65\x79":
                    return XMLSecurityKey::fromEncryptedKeyElement($dv);
                case "\130\65\60\x39\104\141\164\141":
                    if (!($qY = $dv->getElementsByTagName("\130\65\60\x39\x43\x65\162\164\151\x66\151\x63\141\164\145"))) {
                        goto k5h;
                    }
                    if (!($qY->length > 0)) {
                        goto w2q;
                    }
                    $Bw = $qY->item(0)->textContent;
                    $Bw = str_replace(array("\15", "\xa", "\40"), '', $Bw);
                    $Bw = "\x2d\55\55\x2d\x2d\x42\105\107\x49\116\x20\x43\105\122\124\x49\106\111\103\x41\124\x45\55\55\x2d\55\55\xa" . chunk_split($Bw, 64, "\12") . "\55\x2d\x2d\55\x2d\x45\x4e\x44\40\x43\x45\122\124\x49\x46\x49\x43\x41\124\105\x2d\55\55\x2d\x2d\12";
                    $eQ->loadKey($Bw, false, true);
                    w2q:
                    k5h:
                    goto xOu;
            }
            l0I:
            xOu:
            AcV:
        }
        Gk9:
        return $eQ;
    }
    public function locateKeyInfo($eQ = null, $pi = null)
    {
        if (!empty($pi)) {
            goto EpL;
        }
        $pi = $this->rawNode;
        EpL:
        return self::staticLocateKeyInfo($eQ, $pi);
    }
}
