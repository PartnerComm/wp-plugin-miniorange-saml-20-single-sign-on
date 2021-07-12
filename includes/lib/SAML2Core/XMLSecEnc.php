<?php


namespace RobRichards\XMLSecLibs;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;
use Exception;
use RobRichards\XMLSecLibs\Utils\XPath;
class XMLSecEnc
{
    const template = "\74\170\x65\156\x63\72\105\x6e\x63\162\x79\x70\164\x65\x64\104\x61\x74\x61\x20\x78\155\154\x6e\x73\72\170\x65\156\x63\x3d\x27\150\x74\164\160\72\x2f\57\167\x77\x77\x2e\x77\x33\56\157\162\147\57\62\x30\x30\61\x2f\60\x34\57\x78\x6d\x6c\145\x6e\x63\x23\47\76\15\12\x20\40\40\74\x78\145\x6e\143\x3a\x43\x69\x70\150\145\162\x44\141\164\x61\76\xd\xa\40\x20\40\40\40\x20\x3c\x78\145\156\x63\x3a\x43\x69\x70\x68\145\x72\126\141\154\165\145\76\x3c\x2f\x78\145\156\x63\x3a\103\151\x70\x68\145\x72\126\141\x6c\165\x65\x3e\15\xa\40\x20\x20\x3c\57\170\x65\x6e\143\72\103\151\160\150\145\x72\104\141\x74\x61\x3e\15\12\x3c\x2f\x78\x65\x6e\x63\72\105\x6e\143\162\171\160\x74\145\144\x44\141\164\x61\x3e";
    const Element = "\x68\164\164\160\72\x2f\x2f\167\167\167\56\x77\x33\x2e\x6f\162\147\57\x32\60\x30\61\57\x30\64\x2f\x78\155\x6c\145\156\x63\43\x45\x6c\145\x6d\145\156\164";
    const Content = "\150\x74\x74\160\x3a\57\x2f\167\x77\x77\56\167\x33\x2e\157\x72\x67\x2f\62\x30\60\x31\x2f\x30\x34\x2f\x78\x6d\154\145\156\x63\43\x43\157\x6e\x74\145\156\164";
    const URI = 3;
    const XMLENCNS = "\150\x74\164\160\x3a\x2f\x2f\167\167\x77\x2e\167\63\x2e\x6f\x72\147\57\62\60\60\61\57\60\x34\x2f\170\155\154\x65\156\143\x23";
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
    public function addReference($Ze, $gC, $dQ)
    {
        if ($gC instanceof DOMNode) {
            goto tdC;
        }
        throw new Exception("\x24\156\157\x64\x65\x20\151\x73\40\x6e\157\x74\x20\157\x66\x20\x74\171\160\145\40\104\117\x4d\116\x6f\144\x65");
        tdC:
        $Bd = $this->encdoc;
        $this->_resetTemplate();
        $Sd = $this->encdoc;
        $this->encdoc = $Bd;
        $R_ = XMLSecurityDSig::generateGUID();
        $Kk = $Sd->documentElement;
        $Kk->setAttribute("\x49\x64", $R_);
        $this->references[$Ze] = array("\x6e\x6f\x64\145" => $gC, "\164\171\160\145" => $dQ, "\x65\x6e\143\156\157\x64\145" => $Sd, "\162\x65\146\x75\x72\151" => $R_);
    }
    public function setNode($gC)
    {
        $this->rawNode = $gC;
    }
    public function encryptNode($TN, $Pi = true)
    {
        $u_ = '';
        if (!empty($this->rawNode)) {
            goto he7;
        }
        throw new Exception("\116\x6f\144\x65\x20\x74\x6f\40\145\x6e\x63\162\171\x70\x74\40\150\141\x73\40\x6e\x6f\164\x20\x62\x65\x65\x6e\40\x73\x65\164");
        he7:
        if ($TN instanceof XMLSecurityKey) {
            goto JMK;
        }
        throw new Exception("\x49\156\x76\x61\x6c\151\144\x20\113\145\171");
        JMK:
        $rq = $this->rawNode->ownerDocument;
        $Tc = new DOMXPath($this->encdoc);
        $Ak = $Tc->query("\x2f\170\x65\x6e\x63\x3a\105\156\x63\x72\x79\160\x74\x65\x64\x44\x61\164\x61\57\170\145\x6e\x63\72\x43\x69\x70\150\x65\162\104\x61\x74\x61\57\170\x65\x6e\x63\72\x43\x69\x70\x68\145\x72\x56\141\154\165\x65");
        $vS = $Ak->item(0);
        if (!($vS == null)) {
            goto MlK;
        }
        throw new Exception("\105\162\x72\x6f\x72\x20\x6c\157\143\x61\164\151\x6e\147\x20\x43\x69\160\150\x65\162\126\141\x6c\165\145\x20\x65\154\145\155\145\156\164\40\x77\x69\164\x68\x69\x6e\x20\x74\x65\155\x70\x6c\x61\164\x65");
        MlK:
        switch ($this->type) {
            case self::Element:
                $u_ = $rq->saveXML($this->rawNode);
                $this->encdoc->documentElement->setAttribute("\x54\171\x70\x65", self::Element);
                goto wKz;
            case self::Content:
                $hG = $this->rawNode->childNodes;
                foreach ($hG as $kD) {
                    $u_ .= $rq->saveXML($kD);
                    jEe:
                }
                Ypg:
                $this->encdoc->documentElement->setAttribute("\124\x79\x70\x65", self::Content);
                goto wKz;
            default:
                throw new Exception("\124\x79\x70\x65\40\151\x73\x20\x63\x75\x72\x72\145\x6e\x74\x6c\171\x20\x6e\x6f\x74\x20\x73\x75\x70\160\157\x72\164\145\x64");
        }
        HL_:
        wKz:
        $ec = $this->encdoc->documentElement->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\145\x6e\x63\x3a\x45\x6e\x63\162\171\160\x74\151\x6f\156\115\x65\164\150\157\144"));
        $ec->setAttribute("\x41\154\147\x6f\x72\151\x74\x68\x6d", $TN->getAlgorithm());
        $vS->parentNode->parentNode->insertBefore($ec, $vS->parentNode->parentNode->firstChild);
        $su = base64_encode($TN->encryptData($u_));
        $j1 = $this->encdoc->createTextNode($su);
        $vS->appendChild($j1);
        if ($Pi) {
            goto Ftb;
        }
        return $this->encdoc->documentElement;
        goto xr4;
        Ftb:
        switch ($this->type) {
            case self::Element:
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto n5g;
                }
                return $this->encdoc;
                n5g:
                $Af = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                $this->rawNode->parentNode->replaceChild($Af, $this->rawNode);
                return $Af;
            case self::Content:
                $Af = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                kww:
                if (!$this->rawNode->firstChild) {
                    goto XcG;
                }
                $this->rawNode->removeChild($this->rawNode->firstChild);
                goto kww;
                XcG:
                $this->rawNode->appendChild($Af);
                return $Af;
        }
        eCj:
        p9e:
        xr4:
    }
    public function encryptReferences($TN)
    {
        $Ub = $this->rawNode;
        $vP = $this->type;
        foreach ($this->references as $Ze => $pE) {
            $this->encdoc = $pE["\x65\156\x63\x6e\157\144\x65"];
            $this->rawNode = $pE["\156\157\144\x65"];
            $this->type = $pE["\164\x79\x70\x65"];
            try {
                $AO = $this->encryptNode($TN);
                $this->references[$Ze]["\145\156\143\x6e\157\144\x65"] = $AO;
            } catch (Exception $L2) {
                $this->rawNode = $Ub;
                $this->type = $vP;
                throw $L2;
            }
            kU3:
        }
        g1H:
        $this->rawNode = $Ub;
        $this->type = $vP;
    }
    public function getCipherValue()
    {
        if (!empty($this->rawNode)) {
            goto Gu7;
        }
        throw new Exception("\116\x6f\x64\x65\40\x74\x6f\x20\x64\x65\143\162\x79\160\x74\40\x68\141\x73\x20\156\x6f\164\40\142\x65\x65\x6e\40\x73\x65\x74");
        Gu7:
        $rq = $this->rawNode->ownerDocument;
        $Tc = new DOMXPath($rq);
        $Tc->registerNamespace("\170\155\154\145\x6e\x63\x72", self::XMLENCNS);
        $mr = "\x2e\x2f\170\155\x6c\x65\156\143\162\x3a\103\x69\160\x68\x65\162\104\x61\x74\141\57\x78\x6d\x6c\145\156\143\x72\72\x43\x69\160\150\x65\x72\126\141\x6c\165\145";
        $AG = $Tc->query($mr, $this->rawNode);
        $gC = $AG->item(0);
        if ($gC) {
            goto jP3;
        }
        return null;
        jP3:
        return base64_decode($gC->nodeValue);
    }
    public function decryptNode($TN, $Pi = true)
    {
        if ($TN instanceof XMLSecurityKey) {
            goto bV_;
        }
        throw new Exception("\111\156\166\141\x6c\x69\144\x20\x4b\x65\x79");
        bV_:
        $J1 = $this->getCipherValue();
        if ($J1) {
            goto gn1;
        }
        throw new Exception("\x43\x61\156\x6e\x6f\x74\x20\154\157\x63\x61\164\x65\x20\145\156\143\x72\171\x70\x74\145\144\40\x64\x61\164\x61");
        goto wMv;
        gn1:
        $P8 = $TN->decryptData($J1);
        if ($Pi) {
            goto t26;
        }
        return $P8;
        goto J7T;
        t26:
        switch ($this->type) {
            case self::Element:
                $oe = new DOMDocument();
                $oe->loadXML($P8);
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto asv;
                }
                return $oe;
                asv:
                $Af = $this->rawNode->ownerDocument->importNode($oe->documentElement, true);
                $this->rawNode->parentNode->replaceChild($Af, $this->rawNode);
                return $Af;
            case self::Content:
                if ($this->rawNode->nodeType == XML_DOCUMENT_NODE) {
                    goto Lko;
                }
                $rq = $this->rawNode->ownerDocument;
                goto rPb;
                Lko:
                $rq = $this->rawNode;
                rPb:
                $rH = $rq->createDocumentFragment();
                $rH->appendXML($P8);
                $sT = $this->rawNode->parentNode;
                $sT->replaceChild($rH, $this->rawNode);
                return $sT;
            default:
                return $P8;
        }
        iUg:
        w3d:
        J7T:
        wMv:
    }
    public function encryptKey($yw, $pf, $tE = true)
    {
        if (!(!$yw instanceof XMLSecurityKey || !$pf instanceof XMLSecurityKey)) {
            goto ODx;
        }
        throw new Exception("\111\156\x76\x61\154\x69\x64\40\113\145\171");
        ODx:
        $A2 = base64_encode($yw->encryptData($pf->key));
        $Kg = $this->encdoc->documentElement;
        $uo = $this->encdoc->createElementNS(self::XMLENCNS, "\170\145\x6e\143\x3a\105\x6e\143\x72\x79\x70\x74\x65\144\113\145\171");
        if ($tE) {
            goto A4K;
        }
        $this->encKey = $uo;
        goto j1S;
        A4K:
        $X3 = $Kg->insertBefore($this->encdoc->createElementNS("\150\x74\x74\x70\72\x2f\57\x77\167\167\56\167\63\x2e\157\x72\x67\57\62\x30\x30\60\57\60\71\x2f\x78\155\x6c\144\163\151\x67\43", "\144\163\151\147\72\113\x65\x79\x49\156\x66\157"), $Kg->firstChild);
        $X3->appendChild($uo);
        j1S:
        $ec = $uo->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\x65\156\143\72\x45\156\x63\x72\171\x70\x74\151\157\x6e\115\x65\164\150\157\144"));
        $ec->setAttribute("\x41\154\147\x6f\x72\x69\164\150\155", $yw->getAlgorith());
        if (empty($yw->name)) {
            goto Ogk;
        }
        $X3 = $uo->appendChild($this->encdoc->createElementNS("\x68\164\x74\x70\72\x2f\57\x77\167\x77\56\167\63\56\157\162\147\x2f\62\x30\x30\x30\x2f\x30\71\x2f\170\x6d\154\144\163\151\x67\43", "\x64\x73\151\x67\72\113\x65\x79\x49\156\146\x6f"));
        $X3->appendChild($this->encdoc->createElementNS("\x68\164\164\160\72\57\x2f\167\167\167\x2e\167\63\56\x6f\x72\x67\x2f\62\60\x30\x30\x2f\60\71\57\x78\155\154\144\163\x69\x67\x23", "\144\163\x69\x67\x3a\113\x65\171\x4e\141\x6d\145", $yw->name));
        Ogk:
        $ED = $uo->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\145\x6e\x63\72\x43\x69\x70\150\x65\x72\104\x61\x74\141"));
        $ED->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\145\156\x63\72\x43\151\160\x68\145\x72\x56\x61\x6c\x75\x65", $A2));
        if (!(is_array($this->references) && count($this->references) > 0)) {
            goto vr8;
        }
        $b3 = $uo->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\145\156\143\72\x52\x65\x66\x65\x72\x65\156\x63\x65\114\151\x73\x74"));
        foreach ($this->references as $Ze => $pE) {
            $R_ = $pE["\x72\145\146\x75\162\x69"];
            $j7 = $b3->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\145\156\143\72\x44\141\x74\141\x52\x65\146\145\162\145\156\143\x65"));
            $j7->setAttribute("\125\x52\x49", "\43" . $R_);
            ZOp:
        }
        TTT:
        vr8:
        return;
    }
    public function decryptKey($uo)
    {
        if ($uo->isEncrypted) {
            goto leF;
        }
        throw new Exception("\113\x65\171\x20\x69\163\40\156\x6f\x74\40\105\x6e\143\162\x79\160\x74\145\x64");
        leF:
        if (!empty($uo->key)) {
            goto CYP;
        }
        throw new Exception("\x4b\145\171\x20\x69\x73\x20\155\x69\163\x73\x69\156\147\x20\144\141\164\x61\x20\164\x6f\40\160\x65\162\146\157\x72\155\x20\164\x68\145\40\x64\145\143\162\x79\160\x74\x69\157\x6e");
        CYP:
        return $this->decryptNode($uo, false);
    }
    public function locateEncryptedData($Kk)
    {
        if ($Kk instanceof DOMDocument) {
            goto H5P;
        }
        $rq = $Kk->ownerDocument;
        goto Y0r;
        H5P:
        $rq = $Kk;
        Y0r:
        if (!$rq) {
            goto r02;
        }
        $eM = new DOMXPath($rq);
        $mr = "\x2f\x2f\x2a\133\x6c\x6f\143\x61\154\x2d\x6e\x61\x6d\145\x28\51\x3d\x27\x45\x6e\x63\x72\171\x70\164\x65\144\x44\x61\x74\x61\x27\40\141\x6e\x64\40\156\141\x6d\145\x73\x70\x61\143\145\x2d\x75\x72\151\x28\x29\x3d\x27" . self::XMLENCNS . "\x27\135";
        $AG = $eM->query($mr);
        return $AG->item(0);
        r02:
        return null;
    }
    public function locateKey($gC = null)
    {
        if (!empty($gC)) {
            goto St_;
        }
        $gC = $this->rawNode;
        St_:
        if ($gC instanceof DOMNode) {
            goto WRD;
        }
        return null;
        WRD:
        if (!($rq = $gC->ownerDocument)) {
            goto BpC;
        }
        $eM = new DOMXPath($rq);
        $eM->registerNamespace("\x78\155\154\163\x65\143\x65\x6e\143", self::XMLENCNS);
        $mr = "\x2e\x2f\x2f\170\155\x6c\163\x65\x63\145\156\x63\72\105\156\x63\162\171\160\164\x69\x6f\156\x4d\x65\x74\x68\157\x64";
        $AG = $eM->query($mr, $gC);
        if (!($SS = $AG->item(0))) {
            goto E1V;
        }
        $Kc = $SS->getAttribute("\x41\154\147\157\162\x69\164\150\x6d");
        try {
            $TN = new XMLSecurityKey($Kc, array("\x74\171\160\145" => "\x70\x72\x69\166\141\x74\x65"));
        } catch (Exception $L2) {
            return null;
        }
        return $TN;
        E1V:
        BpC:
        return null;
    }
    public static function staticLocateKeyInfo($me = null, $gC = null)
    {
        if (!(empty($gC) || !$gC instanceof DOMNode)) {
            goto Fds;
        }
        return null;
        Fds:
        $rq = $gC->ownerDocument;
        if ($rq) {
            goto MHs;
        }
        return null;
        MHs:
        $eM = new DOMXPath($rq);
        $eM->registerNamespace("\170\155\154\163\145\143\145\156\143", self::XMLENCNS);
        $eM->registerNamespace("\x78\x6d\154\x73\145\143\x64\x73\x69\x67", XMLSecurityDSig::XMLDSIGNS);
        $mr = "\56\x2f\170\x6d\x6c\163\145\x63\x64\163\x69\147\x3a\x4b\x65\x79\x49\156\x66\x6f";
        $AG = $eM->query($mr, $gC);
        $SS = $AG->item(0);
        if ($SS) {
            goto jKS;
        }
        return $me;
        jKS:
        foreach ($SS->childNodes as $kD) {
            switch ($kD->localName) {
                case "\113\x65\171\x4e\x61\155\145":
                    if (empty($me)) {
                        goto ixP;
                    }
                    $me->name = $kD->nodeValue;
                    ixP:
                    goto bbF;
                case "\113\145\171\x56\141\154\x75\x65":
                    foreach ($kD->childNodes as $nd) {
                        switch ($nd->localName) {
                            case "\104\x53\101\113\145\171\126\141\154\x75\145":
                                throw new Exception("\104\x53\x41\x4b\145\x79\x56\x61\154\x75\145\x20\143\165\x72\162\x65\x6e\x74\x6c\171\x20\156\157\x74\40\163\165\x70\160\x6f\x72\x74\145\144");
                            case "\x52\x53\x41\x4b\x65\171\x56\x61\154\x75\x65":
                                $f1 = null;
                                $g0 = null;
                                if (!($kN = $nd->getElementsByTagName("\x4d\x6f\x64\165\154\165\163")->item(0))) {
                                    goto EDt;
                                }
                                $f1 = base64_decode($kN->nodeValue);
                                EDt:
                                if (!($Pg = $nd->getElementsByTagName("\105\x78\x70\157\156\145\156\164")->item(0))) {
                                    goto tEs;
                                }
                                $g0 = base64_decode($Pg->nodeValue);
                                tEs:
                                if (!(empty($f1) || empty($g0))) {
                                    goto hkZ;
                                }
                                throw new Exception("\x4d\x69\x73\163\x69\x6e\147\40\x4d\x6f\144\x75\x6c\x75\x73\x20\157\162\x20\105\170\160\x6f\156\x65\156\x74");
                                hkZ:
                                $Y1 = XMLSecurityKey::convertRSA($f1, $g0);
                                $me->loadKey($Y1);
                                goto Gnd;
                        }
                        I_e:
                        Gnd:
                        lmm:
                    }
                    cBW:
                    goto bbF;
                case "\122\145\164\162\151\x65\166\x61\x6c\x4d\x65\x74\150\157\144":
                    $dQ = $kD->getAttribute("\124\171\160\x65");
                    if (!($dQ !== "\x68\x74\164\x70\x3a\57\x2f\x77\167\x77\56\167\x33\x2e\x6f\x72\x67\x2f\x32\60\x30\61\57\60\x34\57\x78\x6d\154\x65\156\143\43\105\156\x63\162\171\x70\164\x65\x64\113\x65\171")) {
                        goto pyj;
                    }
                    goto bbF;
                    pyj:
                    $ie = $kD->getAttribute("\x55\122\x49");
                    if (!($ie[0] !== "\43")) {
                        goto sol;
                    }
                    goto bbF;
                    sol:
                    $zM = substr($ie, 1);
                    $mr = "\x2f\57\x78\x6d\154\163\145\x63\x65\156\143\72\x45\x6e\x63\162\x79\x70\164\145\x64\113\x65\x79\x5b\100\111\144\75\x22" . XPath::filterAttrValue($zM, XPath::DOUBLE_QUOTE) . "\x22\x5d";
                    $O0 = $eM->query($mr)->item(0);
                    if ($O0) {
                        goto RTT;
                    }
                    throw new Exception("\x55\156\141\142\x6c\145\x20\164\x6f\x20\x6c\x6f\x63\141\164\145\x20\x45\156\143\x72\x79\160\x74\x65\144\x4b\x65\x79\40\x77\x69\x74\150\40\x40\111\144\75\47{$zM}\47\x2e");
                    RTT:
                    return XMLSecurityKey::fromEncryptedKeyElement($O0);
                case "\105\x6e\x63\x72\x79\x70\164\145\144\113\x65\171":
                    return XMLSecurityKey::fromEncryptedKeyElement($kD);
                case "\x58\x35\60\x39\x44\141\x74\141":
                    if (!($xd = $kD->getElementsByTagName("\130\x35\x30\x39\103\145\x72\164\x69\146\x69\x63\141\x74\145"))) {
                        goto CF_;
                    }
                    if (!($xd->length > 0)) {
                        goto TMX;
                    }
                    $Gu = $xd->item(0)->textContent;
                    $Gu = str_replace(array("\15", "\xa", "\40"), '', $Gu);
                    $Gu = "\x2d\x2d\x2d\55\x2d\x42\x45\107\111\x4e\x20\x43\x45\122\124\111\106\x49\103\x41\x54\x45\55\x2d\x2d\x2d\x2d\12" . chunk_split($Gu, 64, "\12") . "\55\x2d\x2d\55\x2d\x45\116\104\40\103\105\122\x54\111\x46\111\x43\x41\124\105\x2d\x2d\x2d\55\55\xa";
                    $me->loadKey($Gu, false, true);
                    TMX:
                    CF_:
                    goto bbF;
            }
            hBb:
            bbF:
            dNw:
        }
        lZP:
        return $me;
    }
    public function locateKeyInfo($me = null, $gC = null)
    {
        if (!empty($gC)) {
            goto pmj;
        }
        $gC = $this->rawNode;
        pmj:
        return self::staticLocateKeyInfo($me, $gC);
    }
}
