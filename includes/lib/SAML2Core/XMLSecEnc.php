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
    const template = "\74\170\x65\x6e\143\72\105\x6e\143\x72\x79\x70\164\145\x64\104\x61\164\141\x20\170\155\x6c\156\163\x3a\x78\145\x6e\x63\x3d\x27\150\x74\x74\x70\72\x2f\x2f\x77\167\167\56\x77\63\x2e\x6f\162\147\57\x32\60\60\61\57\60\x34\57\170\x6d\154\x65\156\143\43\x27\76\xd\12\40\40\40\74\x78\145\x6e\143\x3a\x43\151\160\150\x65\x72\104\x61\x74\141\76\xd\xa\x20\40\x20\40\40\x20\x3c\x78\145\156\x63\72\x43\x69\x70\x68\145\x72\126\141\154\x75\145\76\x3c\x2f\x78\145\x6e\143\x3a\x43\151\x70\150\145\x72\126\141\154\165\145\x3e\15\12\40\x20\40\x3c\x2f\x78\x65\156\x63\72\103\x69\x70\150\145\x72\104\x61\x74\x61\76\15\12\74\x2f\x78\145\x6e\143\72\x45\x6e\x63\x72\x79\160\164\145\144\x44\x61\x74\141\x3e";
    const Element = "\150\164\164\160\72\57\57\167\167\x77\x2e\167\x33\x2e\x6f\x72\x67\x2f\62\x30\60\x31\x2f\60\x34\x2f\170\155\x6c\145\x6e\143\43\x45\154\145\x6d\x65\x6e\164";
    const Content = "\x68\164\164\160\x3a\57\57\167\167\x77\56\167\x33\x2e\157\162\x67\57\62\x30\x30\x31\x2f\60\x34\x2f\x78\155\154\x65\x6e\x63\43\103\x6f\x6e\164\x65\x6e\x74";
    const URI = 3;
    const XMLENCNS = "\x68\x74\164\x70\x3a\57\x2f\x77\x77\x77\x2e\167\x33\x2e\157\x72\147\57\62\60\60\x31\57\60\x34\x2f\170\x6d\x6c\x65\x6e\143\x23";
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
    public function addReference($YB, $Kp, $YE)
    {
        if ($Kp instanceof DOMNode) {
            goto uN;
        }
        throw new Exception("\44\156\x6f\x64\145\x20\151\163\40\x6e\x6f\164\40\157\x66\40\164\x79\160\x65\x20\x44\117\115\116\157\144\145");
        uN:
        $l9 = $this->encdoc;
        $this->_resetTemplate();
        $oF = $this->encdoc;
        $this->encdoc = $l9;
        $mH = XMLSecurityDSig::generateGUID();
        $SS = $oF->documentElement;
        $SS->setAttribute("\x49\144", $mH);
        $this->references[$YB] = array("\156\157\144\x65" => $Kp, "\164\x79\x70\x65" => $YE, "\x65\156\143\156\x6f\144\145" => $oF, "\162\x65\146\165\162\151" => $mH);
    }
    public function setNode($Kp)
    {
        $this->rawNode = $Kp;
    }
    public function encryptNode($Mj, $gO = true)
    {
        $h4 = '';
        if (!empty($this->rawNode)) {
            goto hk;
        }
        throw new Exception("\116\157\x64\145\40\x74\157\40\145\156\143\162\x79\x70\x74\40\x68\141\163\40\x6e\157\x74\40\142\x65\145\x6e\x20\x73\145\x74");
        hk:
        if ($Mj instanceof XMLSecurityKey) {
            goto Uu;
        }
        throw new Exception("\111\156\166\141\x6c\x69\144\40\x4b\x65\171");
        Uu:
        $ik = $this->rawNode->ownerDocument;
        $c_ = new DOMXPath($this->encdoc);
        $be = $c_->query("\57\170\145\x6e\143\x3a\x45\x6e\x63\162\x79\160\x74\145\144\x44\141\164\141\57\170\x65\x6e\x63\72\x43\151\x70\150\145\x72\x44\141\x74\141\x2f\x78\145\x6e\143\72\x43\151\x70\x68\x65\x72\126\141\154\165\x65");
        $O3 = $be->item(0);
        if (!($O3 == null)) {
            goto HT;
        }
        throw new Exception("\105\x72\x72\x6f\162\40\154\x6f\143\x61\164\151\x6e\147\40\103\x69\160\x68\145\162\x56\141\154\x75\145\x20\145\154\x65\155\145\156\x74\40\x77\151\164\x68\x69\156\40\x74\x65\155\160\x6c\141\x74\145");
        HT:
        switch ($this->type) {
            case self::Element:
                $h4 = $ik->saveXML($this->rawNode);
                $this->encdoc->documentElement->setAttribute("\124\x79\x70\145", self::Element);
                goto JN;
            case self::Content:
                $R6 = $this->rawNode->childNodes;
                foreach ($R6 as $m3) {
                    $h4 .= $ik->saveXML($m3);
                    yO:
                }
                EU:
                $this->encdoc->documentElement->setAttribute("\x54\x79\x70\x65", self::Content);
                goto JN;
            default:
                throw new Exception("\x54\x79\x70\145\x20\x69\163\x20\143\165\x72\162\145\156\164\x6c\x79\40\156\157\164\x20\x73\x75\x70\x70\157\x72\164\x65\144");
        }
        vP:
        JN:
        $FS = $this->encdoc->documentElement->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\145\156\x63\x3a\105\x6e\143\x72\x79\160\x74\151\157\x6e\115\145\x74\x68\157\x64"));
        $FS->setAttribute("\101\154\x67\157\162\151\x74\150\x6d", $Mj->getAlgorithm());
        $O3->parentNode->parentNode->insertBefore($FS, $O3->parentNode->parentNode->firstChild);
        $KD = base64_encode($Mj->encryptData($h4));
        $cK = $this->encdoc->createTextNode($KD);
        $O3->appendChild($cK);
        if ($gO) {
            goto yG;
        }
        return $this->encdoc->documentElement;
        goto bc;
        yG:
        switch ($this->type) {
            case self::Element:
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto R2;
                }
                return $this->encdoc;
                R2:
                $Lu = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                $this->rawNode->parentNode->replaceChild($Lu, $this->rawNode);
                return $Lu;
            case self::Content:
                $Lu = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                J7:
                if (!$this->rawNode->firstChild) {
                    goto vk;
                }
                $this->rawNode->removeChild($this->rawNode->firstChild);
                goto J7;
                vk:
                $this->rawNode->appendChild($Lu);
                return $Lu;
        }
        CF:
        vp:
        bc:
    }
    public function encryptReferences($Mj)
    {
        $Be = $this->rawNode;
        $rE = $this->type;
        foreach ($this->references as $YB => $p9) {
            $this->encdoc = $p9["\x65\156\x63\x6e\x6f\x64\x65"];
            $this->rawNode = $p9["\x6e\x6f\x64\145"];
            $this->type = $p9["\164\x79\x70\x65"];
            try {
                $g3 = $this->encryptNode($Mj);
                $this->references[$YB]["\x65\156\x63\156\x6f\144\145"] = $g3;
            } catch (Exception $qc) {
                $this->rawNode = $Be;
                $this->type = $rE;
                throw $qc;
            }
            YF:
        }
        UY:
        $this->rawNode = $Be;
        $this->type = $rE;
    }
    public function getCipherValue()
    {
        if (!empty($this->rawNode)) {
            goto Jp;
        }
        throw new Exception("\116\157\144\x65\x20\164\x6f\x20\144\145\x63\x72\x79\160\164\40\150\x61\x73\x20\x6e\157\x74\x20\142\145\145\156\40\163\145\164");
        Jp:
        $ik = $this->rawNode->ownerDocument;
        $c_ = new DOMXPath($ik);
        $c_->registerNamespace("\170\x6d\x6c\145\156\x63\162", self::XMLENCNS);
        $Ws = "\x2e\x2f\170\x6d\154\x65\156\143\162\x3a\x43\x69\x70\150\x65\162\x44\141\x74\141\57\x78\155\x6c\x65\x6e\143\162\72\x43\x69\160\150\x65\x72\126\x61\x6c\165\145";
        $e_ = $c_->query($Ws, $this->rawNode);
        $Kp = $e_->item(0);
        if ($Kp) {
            goto zE;
        }
        return null;
        zE:
        return base64_decode($Kp->nodeValue);
    }
    public function decryptNode($Mj, $gO = true)
    {
        if ($Mj instanceof XMLSecurityKey) {
            goto b7;
        }
        throw new Exception("\x49\x6e\x76\x61\x6c\151\144\40\x4b\x65\171");
        b7:
        $nT = $this->getCipherValue();
        if ($nT) {
            goto mr;
        }
        throw new Exception("\x43\x61\156\156\x6f\x74\x20\x6c\157\143\x61\x74\x65\x20\x65\156\x63\x72\x79\x70\164\x65\x64\x20\144\x61\164\x61");
        goto Vr;
        mr:
        $dK = $Mj->decryptData($nT);
        if ($gO) {
            goto Wm;
        }
        return $dK;
        goto zb;
        Wm:
        switch ($this->type) {
            case self::Element:
                $To = new DOMDocument();
                $To->loadXML($dK);
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto Ls;
                }
                return $To;
                Ls:
                $Lu = $this->rawNode->ownerDocument->importNode($To->documentElement, true);
                $this->rawNode->parentNode->replaceChild($Lu, $this->rawNode);
                return $Lu;
            case self::Content:
                if ($this->rawNode->nodeType == XML_DOCUMENT_NODE) {
                    goto Bn;
                }
                $ik = $this->rawNode->ownerDocument;
                goto LN;
                Bn:
                $ik = $this->rawNode;
                LN:
                $rY = $ik->createDocumentFragment();
                $rY->appendXML($dK);
                $Lb = $this->rawNode->parentNode;
                $Lb->replaceChild($rY, $this->rawNode);
                return $Lb;
            default:
                return $dK;
        }
        LB:
        f5:
        zb:
        Vr:
    }
    public function encryptKey($Jq, $s3, $sa = true)
    {
        if (!(!$Jq instanceof XMLSecurityKey || !$s3 instanceof XMLSecurityKey)) {
            goto Ey;
        }
        throw new Exception("\x49\156\166\141\x6c\x69\144\40\113\x65\171");
        Ey:
        $Nh = base64_encode($Jq->encryptData($s3->key));
        $Bf = $this->encdoc->documentElement;
        $gV = $this->encdoc->createElementNS(self::XMLENCNS, "\x78\145\x6e\143\x3a\105\x6e\143\162\171\160\164\x65\x64\113\x65\171");
        if ($sa) {
            goto LA;
        }
        $this->encKey = $gV;
        goto C7;
        LA:
        $I1 = $Bf->insertBefore($this->encdoc->createElementNS("\x68\x74\164\x70\x3a\57\57\x77\x77\x77\56\x77\63\x2e\x6f\x72\x67\57\x32\60\60\60\57\x30\x39\57\170\155\154\x64\x73\x69\x67\x23", "\x64\163\x69\147\72\x4b\x65\x79\111\156\146\157"), $Bf->firstChild);
        $I1->appendChild($gV);
        C7:
        $FS = $gV->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\x65\156\143\72\105\x6e\143\x72\171\x70\164\151\157\156\x4d\x65\x74\x68\157\x64"));
        $FS->setAttribute("\x41\x6c\x67\157\x72\151\x74\x68\155", $Jq->getAlgorith());
        if (empty($Jq->name)) {
            goto Cc;
        }
        $I1 = $gV->appendChild($this->encdoc->createElementNS("\x68\164\x74\160\x3a\x2f\x2f\x77\167\167\56\167\63\x2e\157\162\x67\57\62\x30\60\60\x2f\x30\x39\x2f\x78\x6d\154\x64\x73\x69\147\43", "\144\163\x69\x67\72\x4b\145\x79\111\x6e\146\157"));
        $I1->appendChild($this->encdoc->createElementNS("\150\x74\x74\x70\x3a\57\57\167\167\167\56\167\63\56\157\162\147\57\x32\x30\60\60\57\60\x39\x2f\170\x6d\x6c\144\x73\x69\x67\43", "\144\x73\151\x67\72\x4b\x65\x79\116\141\x6d\x65", $Jq->name));
        Cc:
        $SV = $gV->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\145\156\143\x3a\x43\151\160\x68\145\x72\x44\x61\164\141"));
        $SV->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\x65\156\x63\x3a\103\151\160\x68\145\x72\126\141\154\x75\145", $Nh));
        if (!(is_array($this->references) && count($this->references) > 0)) {
            goto qk;
        }
        $KO = $gV->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\x65\156\143\72\x52\145\x66\x65\x72\145\156\x63\145\x4c\151\163\164"));
        foreach ($this->references as $YB => $p9) {
            $mH = $p9["\162\x65\146\165\162\x69"];
            $Ct = $KO->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\145\x6e\143\72\104\141\164\141\x52\x65\146\145\162\x65\156\143\145"));
            $Ct->setAttribute("\x55\122\111", "\43" . $mH);
            qq:
        }
        Uh:
        qk:
        return;
    }
    public function decryptKey($gV)
    {
        if ($gV->isEncrypted) {
            goto ub;
        }
        throw new Exception("\113\x65\171\x20\151\163\x20\x6e\157\x74\x20\105\x6e\143\162\x79\160\164\145\x64");
        ub:
        if (!empty($gV->key)) {
            goto nI;
        }
        throw new Exception("\x4b\145\x79\x20\x69\163\40\155\151\163\163\151\156\147\x20\144\141\164\141\40\x74\x6f\40\160\x65\x72\146\157\162\155\x20\x74\x68\x65\x20\144\145\x63\162\171\x70\164\x69\157\156");
        nI:
        return $this->decryptNode($gV, false);
    }
    public function locateEncryptedData($SS)
    {
        if ($SS instanceof DOMDocument) {
            goto Fi;
        }
        $ik = $SS->ownerDocument;
        goto Kn;
        Fi:
        $ik = $SS;
        Kn:
        if (!$ik) {
            goto Xp;
        }
        $Lt = new DOMXPath($ik);
        $Ws = "\x2f\57\x2a\x5b\154\157\143\x61\154\55\156\141\x6d\x65\50\51\75\x27\x45\x6e\x63\162\171\x70\164\x65\144\104\x61\x74\x61\x27\40\141\156\x64\40\156\141\x6d\x65\x73\160\141\143\145\x2d\165\162\151\x28\x29\x3d\x27" . self::XMLENCNS . "\x27\x5d";
        $e_ = $Lt->query($Ws);
        return $e_->item(0);
        Xp:
        return null;
    }
    public function locateKey($Kp = null)
    {
        if (!empty($Kp)) {
            goto XR;
        }
        $Kp = $this->rawNode;
        XR:
        if ($Kp instanceof DOMNode) {
            goto BC;
        }
        return null;
        BC:
        if (!($ik = $Kp->ownerDocument)) {
            goto KH;
        }
        $Lt = new DOMXPath($ik);
        $Lt->registerNamespace("\x78\155\154\163\145\x63\145\156\x63", self::XMLENCNS);
        $Ws = "\x2e\57\57\x78\x6d\154\163\x65\143\145\x6e\x63\x3a\x45\x6e\143\162\x79\160\164\151\157\156\x4d\145\x74\x68\157\144";
        $e_ = $Lt->query($Ws, $Kp);
        if (!($wI = $e_->item(0))) {
            goto Q2;
        }
        $oX = $wI->getAttribute("\x41\154\147\x6f\162\x69\x74\x68\155");
        try {
            $Mj = new XMLSecurityKey($oX, array("\x74\171\160\145" => "\x70\x72\x69\x76\x61\x74\145"));
        } catch (Exception $qc) {
            return null;
        }
        return $Mj;
        Q2:
        KH:
        return null;
    }
    public static function staticLocateKeyInfo($zC = null, $Kp = null)
    {
        if (!(empty($Kp) || !$Kp instanceof DOMNode)) {
            goto fP;
        }
        return null;
        fP:
        $ik = $Kp->ownerDocument;
        if ($ik) {
            goto UM;
        }
        return null;
        UM:
        $Lt = new DOMXPath($ik);
        $Lt->registerNamespace("\x78\x6d\x6c\163\x65\143\145\x6e\x63", self::XMLENCNS);
        $Lt->registerNamespace("\170\155\x6c\163\145\143\x64\163\151\x67", XMLSecurityDSig::XMLDSIGNS);
        $Ws = "\x2e\57\x78\155\154\163\145\143\x64\163\x69\x67\72\x4b\145\171\111\156\146\157";
        $e_ = $Lt->query($Ws, $Kp);
        $wI = $e_->item(0);
        if ($wI) {
            goto vu;
        }
        return $zC;
        vu:
        foreach ($wI->childNodes as $m3) {
            switch ($m3->localName) {
                case "\113\x65\x79\116\x61\x6d\145":
                    if (empty($zC)) {
                        goto qs;
                    }
                    $zC->name = $m3->nodeValue;
                    qs:
                    goto Mg;
                case "\x4b\x65\x79\126\141\154\x75\x65":
                    foreach ($m3->childNodes as $aw) {
                        switch ($aw->localName) {
                            case "\x44\x53\x41\113\145\171\x56\x61\x6c\x75\x65":
                                throw new Exception("\104\x53\101\113\x65\171\x56\141\154\x75\145\x20\x63\x75\x72\162\x65\x6e\164\x6c\171\x20\156\157\x74\x20\163\165\160\160\157\162\164\145\x64");
                            case "\122\x53\x41\113\x65\x79\126\141\154\165\145":
                                $Sn = null;
                                $k6 = null;
                                if (!($b9 = $aw->getElementsByTagName("\115\x6f\144\165\154\165\x73")->item(0))) {
                                    goto dh;
                                }
                                $Sn = base64_decode($b9->nodeValue);
                                dh:
                                if (!($x9 = $aw->getElementsByTagName("\x45\x78\x70\157\x6e\145\x6e\x74")->item(0))) {
                                    goto FO;
                                }
                                $k6 = base64_decode($x9->nodeValue);
                                FO:
                                if (!(empty($Sn) || empty($k6))) {
                                    goto jI;
                                }
                                throw new Exception("\x4d\x69\x73\x73\151\x6e\x67\x20\115\x6f\x64\x75\154\x75\x73\x20\157\x72\x20\105\170\160\157\x6e\145\x6e\x74");
                                jI:
                                $U8 = XMLSecurityKey::convertRSA($Sn, $k6);
                                $zC->loadKey($U8);
                                goto zw;
                        }
                        Cu:
                        zw:
                        im:
                    }
                    lP:
                    goto Mg;
                case "\x52\145\164\x72\x69\145\166\x61\x6c\x4d\x65\164\x68\157\144":
                    $YE = $m3->getAttribute("\124\171\160\x65");
                    if (!($YE !== "\x68\x74\x74\x70\72\57\x2f\167\167\x77\56\x77\x33\x2e\x6f\x72\x67\x2f\x32\x30\x30\61\57\60\x34\57\170\x6d\x6c\x65\156\x63\43\x45\156\x63\x72\171\160\x74\145\144\x4b\x65\x79")) {
                        goto Pr;
                    }
                    goto Mg;
                    Pr:
                    $Ux = $m3->getAttribute("\125\122\111");
                    if (!($Ux[0] !== "\x23")) {
                        goto b2;
                    }
                    goto Mg;
                    b2:
                    $It = substr($Ux, 1);
                    $Ws = "\57\57\170\x6d\x6c\163\145\x63\x65\x6e\143\x3a\105\156\143\162\x79\160\164\145\x64\113\145\171\x5b\100\x49\144\x3d\x22" . XPath::filterAttrValue($It, XPath::DOUBLE_QUOTE) . "\x22\x5d";
                    $KV = $Lt->query($Ws)->item(0);
                    if ($KV) {
                        goto l9;
                    }
                    throw new Exception("\x55\x6e\x61\142\x6c\145\x20\164\x6f\x20\154\157\x63\x61\164\145\40\x45\156\x63\162\x79\x70\164\145\x64\x4b\x65\x79\x20\x77\151\x74\x68\40\x40\111\144\75\x27{$It}\47\x2e");
                    l9:
                    return XMLSecurityKey::fromEncryptedKeyElement($KV);
                case "\105\156\x63\x72\171\160\x74\x65\x64\113\x65\171":
                    return XMLSecurityKey::fromEncryptedKeyElement($m3);
                case "\130\x35\60\x39\x44\x61\164\x61":
                    if (!($ui = $m3->getElementsByTagName("\x58\65\60\71\x43\145\162\164\x69\x66\x69\143\x61\164\x65"))) {
                        goto FB;
                    }
                    if (!($ui->length > 0)) {
                        goto uO;
                    }
                    $W7 = $ui->item(0)->textContent;
                    $W7 = str_replace(array("\xd", "\12", "\40"), '', $W7);
                    $W7 = "\x2d\55\55\55\x2d\102\105\107\111\116\40\103\105\x52\124\x49\x46\x49\x43\x41\x54\105\55\55\55\x2d\55\xa" . chunk_split($W7, 64, "\xa") . "\x2d\55\x2d\55\55\105\116\x44\40\x43\x45\x52\x54\111\106\x49\103\101\124\105\55\55\55\x2d\x2d\12";
                    $zC->loadKey($W7, false, true);
                    uO:
                    FB:
                    goto Mg;
            }
            a4:
            Mg:
            hD:
        }
        sO:
        return $zC;
    }
    public function locateKeyInfo($zC = null, $Kp = null)
    {
        if (!empty($Kp)) {
            goto HD;
        }
        $Kp = $this->rawNode;
        HD:
        return self::staticLocateKeyInfo($zC, $Kp);
    }
}
