<?php


namespace RobRichards\XMLSecLibs;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;
use Exception;
use RobRichards\XMLSecLibs\Utils\XPath as XPath;
class XMLSecEnc
{
    const template = "\74\x78\145\156\143\x3a\105\x6e\143\162\x79\x70\164\145\x64\104\141\x74\141\x20\170\x6d\154\x6e\x73\x3a\170\145\x6e\x63\x3d\x27\150\x74\164\160\x3a\57\57\x77\167\167\x2e\167\x33\x2e\x6f\x72\x67\x2f\62\x30\x30\61\x2f\60\64\x2f\170\155\154\145\x6e\x63\x23\x27\76\15\xa\40\x20\x20\x3c\x78\145\x6e\143\72\103\151\x70\x68\145\162\104\x61\x74\x61\x3e\xd\xa\x20\x20\x20\40\x20\40\74\x78\145\156\x63\x3a\103\x69\160\x68\x65\162\126\x61\154\165\145\x3e\74\x2f\170\x65\x6e\143\x3a\x43\151\x70\x68\145\162\x56\141\x6c\165\x65\76\15\12\40\x20\40\x3c\57\170\145\156\x63\x3a\x43\x69\x70\x68\145\162\104\x61\x74\141\76\15\12\x3c\57\170\x65\156\x63\72\x45\x6e\x63\162\171\x70\164\145\144\104\x61\164\x61\x3e";
    const Element = "\150\x74\x74\160\x3a\x2f\x2f\x77\x77\167\56\167\63\x2e\157\x72\x67\57\x32\60\60\61\x2f\60\x34\x2f\170\155\x6c\145\156\143\x23\x45\x6c\x65\x6d\145\x6e\164";
    const Content = "\150\x74\x74\160\x3a\57\x2f\167\x77\x77\x2e\167\63\56\x6f\162\x67\57\62\x30\60\61\57\60\x34\x2f\170\155\x6c\145\156\x63\43\103\157\x6e\164\x65\x6e\164";
    const URI = 3;
    const XMLENCNS = "\x68\x74\164\160\72\x2f\57\x77\167\167\x2e\167\63\x2e\x6f\x72\x67\x2f\x32\x30\60\x31\x2f\60\x34\57\170\x6d\154\145\x6e\143\43";
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
    public function addReference($lK, $Ak, $nF)
    {
        if ($Ak instanceof DOMNode) {
            goto j6;
        }
        throw new Exception("\44\156\x6f\144\145\40\151\x73\x20\156\157\164\x20\157\x66\x20\164\171\x70\145\40\104\117\115\116\x6f\x64\145");
        j6:
        $CX = $this->encdoc;
        $this->_resetTemplate();
        $aw = $this->encdoc;
        $this->encdoc = $CX;
        $Vk = XMLSecurityDSig::generateGUID();
        $lO = $aw->documentElement;
        $lO->setAttribute("\111\144", $Vk);
        $this->references[$lK] = array("\x6e\x6f\x64\x65" => $Ak, "\x74\x79\160\145" => $nF, "\x65\x6e\143\x6e\x6f\x64\x65" => $aw, "\x72\x65\x66\x75\162\151" => $Vk);
    }
    public function setNode($Ak)
    {
        $this->rawNode = $Ak;
    }
    public function encryptNode($mS, $qK = true)
    {
        $pm = '';
        if (!empty($this->rawNode)) {
            goto cO;
        }
        throw new Exception("\x4e\x6f\144\x65\40\x74\x6f\40\x65\156\x63\162\x79\160\x74\40\x68\141\x73\40\x6e\157\164\40\142\145\x65\x6e\40\x73\145\x74");
        cO:
        if ($mS instanceof XMLSecurityKey) {
            goto C9;
        }
        throw new Exception("\111\156\x76\x61\154\x69\x64\x20\x4b\x65\x79");
        C9:
        $JR = $this->rawNode->ownerDocument;
        $Gy = new DOMXPath($this->encdoc);
        $kN = $Gy->query("\57\x78\145\156\143\x3a\105\156\143\162\x79\x70\x74\145\x64\104\x61\164\141\x2f\x78\145\156\143\72\103\x69\160\x68\x65\x72\104\x61\164\141\x2f\170\x65\156\x63\x3a\x43\151\x70\x68\145\x72\126\x61\154\x75\x65");
        $AC = $kN->item(0);
        if (!($AC == null)) {
            goto fE;
        }
        throw new Exception("\105\x72\162\x6f\162\40\x6c\157\143\141\164\151\156\x67\40\103\x69\x70\x68\x65\162\x56\141\154\165\x65\40\145\154\x65\155\x65\156\x74\40\x77\151\x74\x68\151\156\x20\x74\145\x6d\x70\154\x61\164\145");
        fE:
        switch ($this->type) {
            case self::Element:
                $pm = $JR->saveXML($this->rawNode);
                $this->encdoc->documentElement->setAttribute("\x54\x79\x70\145", self::Element);
                goto gB;
            case self::Content:
                $Bm = $this->rawNode->childNodes;
                foreach ($Bm as $KV) {
                    $pm .= $JR->saveXML($KV);
                    Rp:
                }
                Pj:
                $this->encdoc->documentElement->setAttribute("\x54\171\160\145", self::Content);
                goto gB;
            default:
                throw new Exception("\124\171\x70\x65\40\x69\x73\x20\143\165\x72\x72\145\x6e\164\154\171\x20\x6e\x6f\164\x20\x73\165\x70\x70\x6f\x72\164\145\144");
        }
        D8:
        gB:
        $yI = $this->encdoc->documentElement->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\145\x6e\143\72\105\x6e\x63\x72\171\x70\x74\151\x6f\156\x4d\145\164\150\x6f\144"));
        $yI->setAttribute("\x41\154\147\x6f\162\151\164\150\155", $mS->getAlgorithm());
        $AC->parentNode->parentNode->insertBefore($yI, $AC->parentNode->parentNode->firstChild);
        $wv = base64_encode($mS->encryptData($pm));
        $x9 = $this->encdoc->createTextNode($wv);
        $AC->appendChild($x9);
        if ($qK) {
            goto yN;
        }
        return $this->encdoc->documentElement;
        goto Bo;
        yN:
        switch ($this->type) {
            case self::Element:
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto Nv;
                }
                return $this->encdoc;
                Nv:
                $Ls = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                $this->rawNode->parentNode->replaceChild($Ls, $this->rawNode);
                return $Ls;
            case self::Content:
                $Ls = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                P7:
                if (!$this->rawNode->firstChild) {
                    goto Es;
                }
                $this->rawNode->removeChild($this->rawNode->firstChild);
                goto P7;
                Es:
                $this->rawNode->appendChild($Ls);
                return $Ls;
        }
        YS:
        Nc:
        Bo:
    }
    public function encryptReferences($mS)
    {
        $I8 = $this->rawNode;
        $tr = $this->type;
        foreach ($this->references as $lK => $hI) {
            $this->encdoc = $hI["\x65\156\x63\156\157\x64\145"];
            $this->rawNode = $hI["\x6e\157\144\145"];
            $this->type = $hI["\x74\x79\x70\x65"];
            try {
                $Sz = $this->encryptNode($mS);
                $this->references[$lK]["\x65\x6e\143\156\x6f\144\x65"] = $Sz;
            } catch (Exception $Tr) {
                $this->rawNode = $I8;
                $this->type = $tr;
                throw $Tr;
            }
            B_:
        }
        mA:
        $this->rawNode = $I8;
        $this->type = $tr;
    }
    public function getCipherValue()
    {
        if (!empty($this->rawNode)) {
            goto Tx;
        }
        throw new Exception("\116\x6f\144\145\x20\x74\157\40\144\x65\143\x72\171\x70\x74\40\x68\x61\163\40\156\157\x74\40\x62\x65\145\156\x20\163\x65\164");
        Tx:
        $JR = $this->rawNode->ownerDocument;
        $Gy = new DOMXPath($JR);
        $Gy->registerNamespace("\x78\x6d\154\x65\156\143\x72", self::XMLENCNS);
        $xK = "\56\57\x78\155\154\x65\156\x63\x72\72\103\x69\x70\x68\145\162\x44\141\x74\141\57\170\x6d\x6c\145\x6e\x63\162\x3a\103\151\x70\x68\x65\162\126\x61\x6c\165\x65";
        $PF = $Gy->query($xK, $this->rawNode);
        $Ak = $PF->item(0);
        if ($Ak) {
            goto DW;
        }
        return null;
        DW:
        return base64_decode($Ak->nodeValue);
    }
    public function decryptNode($mS, $qK = true)
    {
        if ($mS instanceof XMLSecurityKey) {
            goto rD;
        }
        throw new Exception("\111\156\x76\x61\154\x69\x64\40\x4b\x65\171");
        rD:
        $N1 = $this->getCipherValue();
        if ($N1) {
            goto SQ;
        }
        throw new Exception("\103\141\156\x6e\157\x74\x20\x6c\157\x63\141\164\145\x20\145\156\x63\x72\171\x70\x74\145\x64\x20\x64\x61\x74\x61");
        goto sc;
        SQ:
        $Xs = $mS->decryptData($N1);
        if ($qK) {
            goto cH;
        }
        return $Xs;
        goto wN;
        cH:
        switch ($this->type) {
            case self::Element:
                $of = new DOMDocument();
                $of->loadXML($Xs);
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto fe;
                }
                return $of;
                fe:
                $Ls = $this->rawNode->ownerDocument->importNode($of->documentElement, true);
                $this->rawNode->parentNode->replaceChild($Ls, $this->rawNode);
                return $Ls;
            case self::Content:
                if ($this->rawNode->nodeType == XML_DOCUMENT_NODE) {
                    goto Mq;
                }
                $JR = $this->rawNode->ownerDocument;
                goto Co;
                Mq:
                $JR = $this->rawNode;
                Co:
                $Nd = $JR->createDocumentFragment();
                $Nd->appendXML($Xs);
                $Ig = $this->rawNode->parentNode;
                $Ig->replaceChild($Nd, $this->rawNode);
                return $Ig;
            default:
                return $Xs;
        }
        kv:
        dL:
        wN:
        sc:
    }
    public function encryptKey($Ww, $Jg, $TL = true)
    {
        if (!(!$Ww instanceof XMLSecurityKey || !$Jg instanceof XMLSecurityKey)) {
            goto i6;
        }
        throw new Exception("\111\x6e\166\x61\154\151\144\x20\x4b\145\171");
        i6:
        $NT = base64_encode($Ww->encryptData($Jg->key));
        $vS = $this->encdoc->documentElement;
        $oc = $this->encdoc->createElementNS(self::XMLENCNS, "\170\x65\x6e\143\72\105\156\143\162\x79\160\x74\145\144\113\x65\171");
        if ($TL) {
            goto cN;
        }
        $this->encKey = $oc;
        goto Hj;
        cN:
        $sO = $vS->insertBefore($this->encdoc->createElementNS("\x68\164\164\x70\x3a\x2f\57\x77\167\x77\x2e\x77\63\x2e\x6f\x72\x67\x2f\x32\60\x30\x30\57\60\x39\57\x78\155\154\x64\x73\x69\x67\x23", "\x64\163\151\x67\x3a\113\145\x79\x49\156\x66\x6f"), $vS->firstChild);
        $sO->appendChild($oc);
        Hj:
        $yI = $oc->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\x65\156\143\x3a\x45\x6e\x63\x72\x79\x70\164\151\x6f\x6e\115\145\x74\150\x6f\x64"));
        $yI->setAttribute("\x41\154\x67\157\162\151\x74\150\155", $Ww->getAlgorith());
        if (empty($Ww->name)) {
            goto rc;
        }
        $sO = $oc->appendChild($this->encdoc->createElementNS("\150\164\164\x70\x3a\57\57\167\167\x77\x2e\167\63\56\157\x72\147\x2f\x32\60\60\60\57\60\x39\57\x78\155\x6c\x64\x73\151\x67\43", "\x64\x73\151\147\x3a\113\145\x79\111\156\146\x6f"));
        $sO->appendChild($this->encdoc->createElementNS("\150\x74\x74\x70\72\x2f\x2f\x77\167\167\x2e\x77\63\x2e\157\x72\147\57\x32\60\x30\60\x2f\x30\x39\x2f\x78\155\x6c\x64\163\151\147\x23", "\144\163\151\x67\x3a\113\145\171\116\x61\x6d\145", $Ww->name));
        rc:
        $r_ = $oc->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\x65\156\x63\x3a\x43\x69\x70\150\145\x72\x44\141\x74\141"));
        $r_->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\x65\x6e\143\72\103\x69\x70\x68\x65\162\x56\141\154\x75\x65", $NT));
        if (!(is_array($this->references) && count($this->references) > 0)) {
            goto SE;
        }
        $R7 = $oc->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\x65\156\x63\72\122\x65\146\x65\x72\145\156\x63\x65\x4c\151\163\164"));
        foreach ($this->references as $lK => $hI) {
            $Vk = $hI["\162\x65\x66\x75\162\x69"];
            $UJ = $R7->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\x65\156\143\72\104\141\x74\x61\122\x65\146\x65\x72\x65\156\x63\145"));
            $UJ->setAttribute("\125\x52\x49", "\43" . $Vk);
            aw:
        }
        eN:
        SE:
        return;
    }
    public function decryptKey($oc)
    {
        if ($oc->isEncrypted) {
            goto EN;
        }
        throw new Exception("\113\145\171\x20\x69\x73\x20\156\x6f\x74\40\105\156\x63\162\x79\x70\x74\x65\x64");
        EN:
        if (!empty($oc->key)) {
            goto tH;
        }
        throw new Exception("\113\x65\171\40\151\163\x20\x6d\151\x73\163\x69\156\x67\x20\x64\x61\164\141\x20\x74\x6f\x20\x70\x65\x72\x66\x6f\x72\155\x20\x74\150\x65\40\x64\145\143\x72\x79\160\164\151\x6f\x6e");
        tH:
        return $this->decryptNode($oc, false);
    }
    public function locateEncryptedData($lO)
    {
        if ($lO instanceof DOMDocument) {
            goto f7;
        }
        $JR = $lO->ownerDocument;
        goto om;
        f7:
        $JR = $lO;
        om:
        if (!$JR) {
            goto mg;
        }
        $lm = new DOMXPath($JR);
        $xK = "\x2f\x2f\x2a\133\x6c\x6f\x63\141\x6c\55\156\x61\x6d\145\x28\51\75\x27\x45\156\x63\162\x79\160\164\145\144\x44\141\164\x61\47\x20\x61\x6e\x64\40\x6e\141\155\145\x73\x70\x61\143\x65\55\x75\162\151\x28\51\x3d\x27" . self::XMLENCNS . "\x27\x5d";
        $PF = $lm->query($xK);
        return $PF->item(0);
        mg:
        return null;
    }
    public function locateKey($Ak = null)
    {
        if (!empty($Ak)) {
            goto gd;
        }
        $Ak = $this->rawNode;
        gd:
        if ($Ak instanceof DOMNode) {
            goto Ip;
        }
        return null;
        Ip:
        if (!($JR = $Ak->ownerDocument)) {
            goto CA;
        }
        $lm = new DOMXPath($JR);
        $lm->registerNamespace("\x78\155\154\x73\x65\143\x65\x6e\143", self::XMLENCNS);
        $xK = "\x2e\x2f\x2f\x78\155\154\163\145\143\x65\156\x63\72\105\156\143\162\171\x70\164\151\x6f\x6e\x4d\x65\164\x68\x6f\x64";
        $PF = $lm->query($xK, $Ak);
        if (!($BN = $PF->item(0))) {
            goto Gm;
        }
        $rR = $BN->getAttribute("\101\154\147\x6f\x72\151\x74\150\x6d");
        try {
            $mS = new XMLSecurityKey($rR, array("\164\x79\x70\x65" => "\160\x72\151\x76\141\164\145"));
        } catch (Exception $Tr) {
            return null;
        }
        return $mS;
        Gm:
        CA:
        return null;
    }
    public static function staticLocateKeyInfo($tk = null, $Ak = null)
    {
        if (!(empty($Ak) || !$Ak instanceof DOMNode)) {
            goto eG;
        }
        return null;
        eG:
        $JR = $Ak->ownerDocument;
        if ($JR) {
            goto Y1;
        }
        return null;
        Y1:
        $lm = new DOMXPath($JR);
        $lm->registerNamespace("\x78\x6d\x6c\163\x65\x63\145\x6e\143", self::XMLENCNS);
        $lm->registerNamespace("\170\x6d\154\x73\x65\143\144\163\151\x67", XMLSecurityDSig::XMLDSIGNS);
        $xK = "\56\x2f\x78\155\154\163\x65\x63\x64\x73\151\x67\72\x4b\145\171\x49\x6e\146\x6f";
        $PF = $lm->query($xK, $Ak);
        $BN = $PF->item(0);
        if ($BN) {
            goto pq;
        }
        return $tk;
        pq:
        foreach ($BN->childNodes as $KV) {
            switch ($KV->localName) {
                case "\x4b\145\x79\x4e\141\x6d\145":
                    if (empty($tk)) {
                        goto LG;
                    }
                    $tk->name = $KV->nodeValue;
                    LG:
                    goto Ax;
                case "\113\x65\x79\126\141\154\x75\x65":
                    foreach ($KV->childNodes as $tu) {
                        switch ($tu->localName) {
                            case "\x44\123\x41\113\145\171\126\141\x6c\165\145":
                                throw new Exception("\104\x53\101\x4b\145\171\x56\x61\154\165\145\x20\x63\165\x72\162\145\x6e\164\x6c\x79\40\156\x6f\x74\x20\x73\x75\160\160\x6f\162\x74\x65\144");
                            case "\x52\123\x41\113\x65\x79\x56\x61\x6c\x75\x65":
                                $E_ = null;
                                $Dg = null;
                                if (!($zn = $tu->getElementsByTagName("\x4d\x6f\x64\x75\154\165\163")->item(0))) {
                                    goto WO;
                                }
                                $E_ = base64_decode($zn->nodeValue);
                                WO:
                                if (!($aV = $tu->getElementsByTagName("\x45\170\160\x6f\x6e\x65\x6e\164")->item(0))) {
                                    goto BS;
                                }
                                $Dg = base64_decode($aV->nodeValue);
                                BS:
                                if (!(empty($E_) || empty($Dg))) {
                                    goto Vu;
                                }
                                throw new Exception("\115\151\x73\163\151\x6e\x67\40\115\x6f\144\x75\154\165\163\x20\157\x72\x20\x45\170\160\x6f\156\145\156\x74");
                                Vu:
                                $J3 = XMLSecurityKey::convertRSA($E_, $Dg);
                                $tk->loadKey($J3);
                                goto Od;
                        }
                        Bf:
                        Od:
                        Oi:
                    }
                    xx:
                    goto Ax;
                case "\122\x65\x74\162\x69\145\166\141\154\115\x65\x74\150\x6f\x64":
                    $nF = $KV->getAttribute("\124\171\x70\x65");
                    if (!($nF !== "\x68\x74\164\160\x3a\57\x2f\167\x77\167\x2e\x77\63\x2e\157\x72\x67\x2f\62\x30\60\61\x2f\60\x34\57\170\155\x6c\x65\x6e\143\43\105\156\x63\162\171\x70\x74\x65\144\113\x65\x79")) {
                        goto fk;
                    }
                    goto Ax;
                    fk:
                    $AY = $KV->getAttribute("\125\x52\x49");
                    if (!($AY[0] !== "\x23")) {
                        goto nj;
                    }
                    goto Ax;
                    nj:
                    $M0 = substr($AY, 1);
                    $xK = "\57\x2f\170\x6d\x6c\163\x65\x63\x65\156\143\72\105\156\143\162\x79\x70\164\145\144\x4b\145\171\133\100\111\144\75\42" . XPath::filterAttrValue($M0, XPath::DOUBLE_QUOTE) . "\42\x5d";
                    $UT = $lm->query($xK)->item(0);
                    if ($UT) {
                        goto oo;
                    }
                    throw new Exception("\125\156\141\x62\154\x65\40\x74\157\x20\154\157\143\x61\x74\145\x20\x45\x6e\143\162\x79\160\x74\x65\x64\113\x65\171\40\x77\151\x74\150\x20\100\111\144\75\x27{$M0}\x27\56");
                    oo:
                    return XMLSecurityKey::fromEncryptedKeyElement($UT);
                case "\105\156\x63\162\171\x70\164\145\x64\x4b\x65\x79":
                    return XMLSecurityKey::fromEncryptedKeyElement($KV);
                case "\130\65\x30\71\104\141\164\141":
                    if (!($X4 = $KV->getElementsByTagName("\x58\65\x30\71\103\x65\x72\164\151\146\151\x63\141\164\145"))) {
                        goto me;
                    }
                    if (!($X4->length > 0)) {
                        goto cn;
                    }
                    $qu = $X4->item(0)->textContent;
                    $qu = str_replace(array("\xd", "\xa", "\x20"), '', $qu);
                    $qu = "\55\x2d\x2d\55\x2d\x42\x45\x47\111\x4e\x20\103\105\x52\124\x49\x46\x49\103\101\124\105\x2d\x2d\55\x2d\55\xa" . chunk_split($qu, 64, "\12") . "\x2d\x2d\55\x2d\55\x45\x4e\104\x20\103\105\122\124\111\106\111\x43\x41\124\x45\55\x2d\55\x2d\55\12";
                    $tk->loadKey($qu, false, true);
                    cn:
                    me:
                    goto Ax;
            }
            KW:
            Ax:
            hT:
        }
        lI:
        return $tk;
    }
    public function locateKeyInfo($tk = null, $Ak = null)
    {
        if (!empty($Ak)) {
            goto oQ;
        }
        $Ak = $this->rawNode;
        oQ:
        return self::staticLocateKeyInfo($tk, $Ak);
    }
}
