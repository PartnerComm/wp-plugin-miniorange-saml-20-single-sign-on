<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


namespace RobRichards\XMLSecLibs;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;
use Exception;
use RobRichards\XMLSecLibs\Utils\XPath as XPath;
class XMLSecEnc
{
    const template = "\74\170\x65\x6e\x63\72\105\156\143\162\x79\160\164\145\x64\104\141\164\141\x20\x78\x6d\x6c\156\x73\72\170\x65\156\x63\75\47\x68\164\x74\160\x3a\x2f\57\x77\167\167\x2e\167\63\56\157\162\147\x2f\x32\x30\60\x31\57\60\64\x2f\x78\x6d\x6c\145\156\143\43\x27\76\15\xa\40\x20\x20\x3c\170\x65\x6e\x63\72\x43\151\x70\x68\145\162\x44\x61\x74\x61\x3e\15\12\40\x20\40\x20\x20\x20\x3c\x78\x65\156\143\72\x43\x69\x70\x68\145\x72\126\x61\154\165\x65\x3e\74\x2f\x78\x65\156\x63\72\103\151\160\x68\x65\x72\126\141\x6c\165\145\x3e\15\xa\x20\x20\40\x3c\x2f\170\145\x6e\x63\x3a\x43\151\160\150\x65\162\104\141\x74\141\76\xd\xa\74\57\170\145\156\x63\72\x45\156\x63\162\171\x70\164\145\x64\x44\x61\x74\141\x3e";
    const Element = "\x68\164\x74\160\x3a\x2f\57\167\167\167\56\167\63\56\x6f\x72\147\57\x32\x30\x30\61\57\60\64\x2f\170\x6d\x6c\x65\x6e\x63\43\x45\x6c\145\155\x65\156\164";
    const Content = "\150\x74\164\160\x3a\x2f\57\x77\x77\x77\56\167\63\56\x6f\162\x67\57\62\60\x30\61\x2f\60\64\57\170\155\x6c\x65\x6e\x63\43\x43\157\x6e\164\x65\x6e\x74";
    const URI = 3;
    const XMLENCNS = "\150\164\x74\x70\72\57\x2f\167\167\167\x2e\x77\x33\x2e\157\162\147\57\x32\60\x30\61\57\60\64\x2f\170\x6d\154\x65\156\x63\43";
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
    public function addReference($Zz, $XX, $PU)
    {
        if ($XX instanceof DOMNode) {
            goto J3;
        }
        throw new Exception("\x24\156\157\144\x65\40\151\x73\x20\156\x6f\x74\40\x6f\x66\x20\x74\x79\x70\x65\x20\104\117\x4d\116\x6f\x64\x65");
        J3:
        $bI = $this->encdoc;
        $this->_resetTemplate();
        $A_ = $this->encdoc;
        $this->encdoc = $bI;
        $vx = XMLSecurityDSig::generateGUID();
        $LQ = $A_->documentElement;
        $LQ->setAttribute("\111\144", $vx);
        $this->references[$Zz] = array("\156\x6f\x64\x65" => $XX, "\x74\171\x70\145" => $PU, "\x65\156\x63\156\x6f\x64\x65" => $A_, "\x72\145\146\165\162\151" => $vx);
    }
    public function setNode($XX)
    {
        $this->rawNode = $XX;
    }
    public function encryptNode($VX, $Fn = true)
    {
        $iZ = '';
        if (!empty($this->rawNode)) {
            goto HQ;
        }
        throw new Exception("\x4e\157\144\x65\40\164\157\x20\x65\x6e\143\x72\x79\x70\x74\40\150\141\163\x20\156\x6f\x74\x20\x62\x65\x65\x6e\x20\163\x65\164");
        HQ:
        if ($VX instanceof XMLSecurityKey) {
            goto m8;
        }
        throw new Exception("\111\156\166\141\x6c\x69\144\x20\113\145\171");
        m8:
        $GD = $this->rawNode->ownerDocument;
        $JK = new DOMXPath($this->encdoc);
        $UO = $JK->query("\57\x78\x65\x6e\143\72\105\x6e\x63\162\171\x70\164\x65\x64\104\141\x74\141\x2f\170\145\x6e\x63\x3a\x43\x69\160\x68\145\162\104\141\164\x61\x2f\170\x65\156\x63\x3a\x43\x69\160\150\145\162\x56\141\x6c\165\145");
        $t5 = $UO->item(0);
        if (!($t5 == null)) {
            goto q8;
        }
        throw new Exception("\x45\162\x72\x6f\x72\40\x6c\157\x63\141\x74\151\156\x67\40\x43\x69\x70\150\145\x72\x56\x61\154\x75\x65\x20\x65\x6c\x65\155\x65\x6e\x74\x20\x77\x69\164\x68\151\156\x20\164\145\x6d\160\x6c\141\x74\x65");
        q8:
        switch ($this->type) {
            case self::Element:
                $iZ = $GD->saveXML($this->rawNode);
                $this->encdoc->documentElement->setAttribute("\x54\x79\160\x65", self::Element);
                goto Yw;
            case self::Content:
                $Dh = $this->rawNode->childNodes;
                foreach ($Dh as $CP) {
                    $iZ .= $GD->saveXML($CP);
                    T0:
                }
                B1:
                $this->encdoc->documentElement->setAttribute("\x54\x79\x70\145", self::Content);
                goto Yw;
            default:
                throw new Exception("\124\x79\160\x65\x20\x69\163\x20\143\165\x72\x72\145\x6e\164\154\x79\40\x6e\x6f\x74\x20\x73\165\x70\x70\x6f\162\164\145\x64");
        }
        Iq:
        Yw:
        $WD = $this->encdoc->documentElement->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\145\x6e\143\72\x45\156\143\x72\x79\x70\164\151\157\x6e\115\x65\164\x68\157\144"));
        $WD->setAttribute("\101\154\x67\157\x72\x69\164\x68\x6d", $VX->getAlgorithm());
        $t5->parentNode->parentNode->insertBefore($WD, $t5->parentNode->parentNode->firstChild);
        $j9 = base64_encode($VX->encryptData($iZ));
        $Wl = $this->encdoc->createTextNode($j9);
        $t5->appendChild($Wl);
        if ($Fn) {
            goto l4;
        }
        return $this->encdoc->documentElement;
        goto ga;
        l4:
        switch ($this->type) {
            case self::Element:
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto b_;
                }
                return $this->encdoc;
                b_:
                $EW = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                $this->rawNode->parentNode->replaceChild($EW, $this->rawNode);
                return $EW;
            case self::Content:
                $EW = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                CA:
                if (!$this->rawNode->firstChild) {
                    goto bm;
                }
                $this->rawNode->removeChild($this->rawNode->firstChild);
                goto CA;
                bm:
                $this->rawNode->appendChild($EW);
                return $EW;
        }
        jn:
        Bx:
        ga:
    }
    public function encryptReferences($VX)
    {
        $Jq = $this->rawNode;
        $r5 = $this->type;
        foreach ($this->references as $Zz => $tE) {
            $this->encdoc = $tE["\x65\156\x63\x6e\157\x64\x65"];
            $this->rawNode = $tE["\156\x6f\144\x65"];
            $this->type = $tE["\164\x79\x70\x65"];
            try {
                $fy = $this->encryptNode($VX);
                $this->references[$Zz]["\145\x6e\x63\x6e\157\x64\x65"] = $fy;
            } catch (Exception $cN) {
                $this->rawNode = $Jq;
                $this->type = $r5;
                throw $cN;
            }
            Hs:
        }
        v9:
        $this->rawNode = $Jq;
        $this->type = $r5;
    }
    public function getCipherValue()
    {
        if (!empty($this->rawNode)) {
            goto W_;
        }
        throw new Exception("\116\x6f\x64\145\40\x74\157\x20\x64\x65\143\162\171\160\164\x20\x68\x61\163\x20\x6e\x6f\164\x20\x62\145\x65\x6e\40\x73\145\x74");
        W_:
        $GD = $this->rawNode->ownerDocument;
        $JK = new DOMXPath($GD);
        $JK->registerNamespace("\170\x6d\x6c\x65\x6e\x63\x72", self::XMLENCNS);
        $CI = "\x2e\57\x78\x6d\x6c\145\x6e\x63\162\x3a\103\x69\160\x68\145\162\104\141\x74\x61\57\x78\x6d\x6c\145\156\x63\162\72\x43\x69\x70\x68\x65\x72\126\x61\154\165\145";
        $wG = $JK->query($CI, $this->rawNode);
        $XX = $wG->item(0);
        if ($XX) {
            goto Gf;
        }
        return null;
        Gf:
        return base64_decode($XX->nodeValue);
    }
    public function decryptNode($VX, $Fn = true)
    {
        if ($VX instanceof XMLSecurityKey) {
            goto u4;
        }
        throw new Exception("\111\156\166\x61\x6c\151\144\40\x4b\x65\x79");
        u4:
        $Hw = $this->getCipherValue();
        if ($Hw) {
            goto se;
        }
        throw new Exception("\103\x61\x6e\156\x6f\x74\40\x6c\157\x63\x61\164\x65\40\145\x6e\x63\x72\x79\x70\164\145\x64\x20\x64\x61\164\141");
        goto EM;
        se:
        $qQ = $VX->decryptData($Hw);
        if ($Fn) {
            goto wh;
        }
        return $qQ;
        goto p4;
        wh:
        switch ($this->type) {
            case self::Element:
                $j_ = new DOMDocument();
                $j_->loadXML($qQ);
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto Md;
                }
                return $j_;
                Md:
                $EW = $this->rawNode->ownerDocument->importNode($j_->documentElement, true);
                $this->rawNode->parentNode->replaceChild($EW, $this->rawNode);
                return $EW;
            case self::Content:
                if ($this->rawNode->nodeType == XML_DOCUMENT_NODE) {
                    goto cj;
                }
                $GD = $this->rawNode->ownerDocument;
                goto OG;
                cj:
                $GD = $this->rawNode;
                OG:
                $g3 = $GD->createDocumentFragment();
                $g3->appendXML($qQ);
                $TS = $this->rawNode->parentNode;
                $TS->replaceChild($g3, $this->rawNode);
                return $TS;
            default:
                return $qQ;
        }
        Yd:
        ty:
        p4:
        EM:
    }
    public function encryptKey($P5, $jm, $L1 = true)
    {
        if (!(!$P5 instanceof XMLSecurityKey || !$jm instanceof XMLSecurityKey)) {
            goto vE;
        }
        throw new Exception("\111\x6e\x76\141\154\x69\x64\x20\x4b\x65\x79");
        vE:
        $mX = base64_encode($P5->encryptData($jm->key));
        $Z0 = $this->encdoc->documentElement;
        $cQ = $this->encdoc->createElementNS(self::XMLENCNS, "\x78\145\x6e\x63\72\x45\x6e\143\x72\171\160\x74\x65\144\x4b\x65\x79");
        if ($L1) {
            goto WL;
        }
        $this->encKey = $cQ;
        goto uk;
        WL:
        $Tq = $Z0->insertBefore($this->encdoc->createElementNS("\150\164\164\x70\72\57\57\167\x77\x77\x2e\167\x33\56\157\x72\x67\57\x32\60\x30\x30\57\60\x39\57\x78\x6d\x6c\144\x73\151\147\x23", "\144\x73\x69\x67\72\x4b\145\171\x49\156\146\x6f"), $Z0->firstChild);
        $Tq->appendChild($cQ);
        uk:
        $WD = $cQ->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\x65\156\143\72\x45\x6e\x63\x72\171\160\x74\x69\x6f\x6e\115\x65\164\x68\157\144"));
        $WD->setAttribute("\x41\154\147\x6f\162\x69\x74\150\x6d", $P5->getAlgorith());
        if (empty($P5->name)) {
            goto LM;
        }
        $Tq = $cQ->appendChild($this->encdoc->createElementNS("\x68\x74\164\x70\72\57\57\x77\x77\167\x2e\167\63\56\157\162\x67\x2f\x32\x30\60\x30\x2f\60\71\57\x78\155\x6c\x64\163\x69\147\43", "\144\163\x69\147\72\x4b\x65\171\111\156\146\x6f"));
        $Tq->appendChild($this->encdoc->createElementNS("\150\x74\164\x70\72\x2f\x2f\x77\x77\x77\56\167\x33\56\157\162\x67\x2f\62\60\60\x30\57\x30\71\57\170\x6d\x6c\144\163\x69\x67\43", "\144\163\x69\147\x3a\x4b\x65\x79\x4e\x61\x6d\145", $P5->name));
        LM:
        $uX = $cQ->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\145\x6e\143\72\103\151\160\x68\x65\162\104\x61\x74\x61"));
        $uX->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\145\156\143\x3a\x43\151\160\x68\145\162\126\x61\x6c\x75\x65", $mX));
        if (!(is_array($this->references) && count($this->references) > 0)) {
            goto jx;
        }
        $Fx = $cQ->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\145\x6e\x63\x3a\x52\145\146\x65\x72\x65\x6e\x63\145\114\151\163\x74"));
        foreach ($this->references as $Zz => $tE) {
            $vx = $tE["\x72\x65\x66\165\162\x69"];
            $Aa = $Fx->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\x65\x6e\143\72\104\141\x74\141\x52\x65\146\145\162\145\x6e\143\145"));
            $Aa->setAttribute("\x55\122\111", "\x23" . $vx);
            zj:
        }
        RA:
        jx:
        return;
    }
    public function decryptKey($cQ)
    {
        if ($cQ->isEncrypted) {
            goto iD;
        }
        throw new Exception("\113\x65\x79\x20\x69\x73\x20\156\x6f\x74\x20\x45\x6e\143\162\x79\160\x74\x65\x64");
        iD:
        if (!empty($cQ->key)) {
            goto eu;
        }
        throw new Exception("\113\x65\171\40\x69\x73\40\x6d\151\163\x73\151\156\x67\40\x64\x61\164\x61\x20\x74\157\40\x70\x65\x72\x66\157\x72\x6d\x20\x74\150\145\x20\144\x65\143\162\x79\160\164\x69\157\156");
        eu:
        return $this->decryptNode($cQ, false);
    }
    public function locateEncryptedData($LQ)
    {
        if ($LQ instanceof DOMDocument) {
            goto da;
        }
        $GD = $LQ->ownerDocument;
        goto J8;
        da:
        $GD = $LQ;
        J8:
        if (!$GD) {
            goto e6;
        }
        $Kf = new DOMXPath($GD);
        $CI = "\57\x2f\x2a\133\x6c\x6f\x63\x61\154\55\x6e\141\155\x65\50\x29\x3d\47\x45\x6e\x63\x72\171\160\x74\x65\x64\104\141\x74\141\47\x20\141\x6e\144\x20\x6e\x61\155\145\163\x70\141\x63\x65\55\165\162\151\x28\x29\x3d\47" . self::XMLENCNS . "\x27\x5d";
        $wG = $Kf->query($CI);
        return $wG->item(0);
        e6:
        return null;
    }
    public function locateKey($XX = null)
    {
        if (!empty($XX)) {
            goto mx;
        }
        $XX = $this->rawNode;
        mx:
        if ($XX instanceof DOMNode) {
            goto Yn;
        }
        return null;
        Yn:
        if (!($GD = $XX->ownerDocument)) {
            goto e3;
        }
        $Kf = new DOMXPath($GD);
        $Kf->registerNamespace("\x78\x6d\x6c\x73\x65\143\x65\156\143", self::XMLENCNS);
        $CI = "\56\x2f\x2f\170\155\154\163\145\x63\x65\156\x63\72\105\x6e\143\162\171\160\x74\151\x6f\x6e\x4d\145\164\150\x6f\144";
        $wG = $Kf->query($CI, $XX);
        if (!($ts = $wG->item(0))) {
            goto NL;
        }
        $VN = $ts->getAttribute("\101\x6c\x67\157\162\151\164\150\155");
        try {
            $VX = new XMLSecurityKey($VN, array("\164\171\160\145" => "\x70\162\151\x76\x61\x74\145"));
        } catch (Exception $cN) {
            return null;
        }
        return $VX;
        NL:
        e3:
        return null;
    }
    public static function staticLocateKeyInfo($qE = null, $XX = null)
    {
        if (!(empty($XX) || !$XX instanceof DOMNode)) {
            goto DP;
        }
        return null;
        DP:
        $GD = $XX->ownerDocument;
        if ($GD) {
            goto ye;
        }
        return null;
        ye:
        $Kf = new DOMXPath($GD);
        $Kf->registerNamespace("\x78\155\x6c\163\145\x63\x65\156\143", self::XMLENCNS);
        $Kf->registerNamespace("\170\155\154\163\145\143\144\163\151\147", XMLSecurityDSig::XMLDSIGNS);
        $CI = "\56\x2f\170\x6d\154\163\145\x63\x64\x73\x69\147\x3a\113\x65\x79\x49\x6e\146\x6f";
        $wG = $Kf->query($CI, $XX);
        $ts = $wG->item(0);
        if ($ts) {
            goto E2;
        }
        return $qE;
        E2:
        foreach ($ts->childNodes as $CP) {
            switch ($CP->localName) {
                case "\113\145\x79\x4e\141\155\x65":
                    if (empty($qE)) {
                        goto gs;
                    }
                    $qE->name = $CP->nodeValue;
                    gs:
                    goto Dx;
                case "\113\145\x79\x56\x61\154\x75\145":
                    foreach ($CP->childNodes as $jT) {
                        switch ($jT->localName) {
                            case "\104\x53\x41\113\145\x79\x56\x61\154\165\x65":
                                throw new Exception("\x44\x53\x41\113\145\171\x56\141\x6c\x75\x65\x20\143\x75\x72\162\145\x6e\x74\154\171\40\156\x6f\x74\40\163\165\160\x70\157\162\x74\x65\144");
                            case "\x52\123\101\x4b\145\171\x56\x61\x6c\x75\x65":
                                $h6 = null;
                                $Oq = null;
                                if (!($YQ = $jT->getElementsByTagName("\x4d\157\144\165\154\x75\163")->item(0))) {
                                    goto lM;
                                }
                                $h6 = base64_decode($YQ->nodeValue);
                                lM:
                                if (!($uk = $jT->getElementsByTagName("\105\170\x70\157\156\x65\156\x74")->item(0))) {
                                    goto cb;
                                }
                                $Oq = base64_decode($uk->nodeValue);
                                cb:
                                if (!(empty($h6) || empty($Oq))) {
                                    goto ij;
                                }
                                throw new Exception("\x4d\151\163\x73\151\x6e\147\40\x4d\157\144\165\x6c\x75\x73\x20\157\x72\40\x45\x78\x70\157\x6e\x65\x6e\x74");
                                ij:
                                $CW = XMLSecurityKey::convertRSA($h6, $Oq);
                                $qE->loadKey($CW);
                                goto d2;
                        }
                        wm:
                        d2:
                        eC:
                    }
                    is:
                    goto Dx;
                case "\x52\x65\x74\162\151\145\166\141\154\115\x65\164\x68\157\x64":
                    $PU = $CP->getAttribute("\x54\x79\160\145");
                    if (!($PU !== "\x68\x74\164\x70\x3a\57\x2f\x77\x77\x77\56\x77\63\x2e\x6f\162\147\57\62\60\60\x31\57\60\x34\57\170\x6d\x6c\x65\156\x63\x23\x45\156\x63\162\171\160\x74\145\x64\x4b\x65\171")) {
                        goto mT;
                    }
                    goto Dx;
                    mT:
                    $w3 = $CP->getAttribute("\x55\x52\x49");
                    if (!($w3[0] !== "\x23")) {
                        goto V3;
                    }
                    goto Dx;
                    V3:
                    $Vc = substr($w3, 1);
                    $CI = "\x2f\x2f\170\155\x6c\163\145\x63\145\x6e\143\72\105\156\143\162\171\160\164\145\x64\113\145\171\x5b\x40\x49\x64\x3d\x22" . XPath::filterAttrValue($Vc, XPath::DOUBLE_QUOTE) . "\x22\135";
                    $Gk = $Kf->query($CI)->item(0);
                    if ($Gk) {
                        goto Tb;
                    }
                    throw new Exception("\x55\x6e\141\x62\x6c\145\x20\x74\x6f\40\x6c\157\143\141\x74\x65\40\105\156\x63\x72\171\x70\164\145\x64\113\x65\x79\x20\167\151\164\x68\40\x40\111\144\x3d\47{$Vc}\x27\56");
                    Tb:
                    return XMLSecurityKey::fromEncryptedKeyElement($Gk);
                case "\x45\x6e\x63\162\x79\160\x74\145\x64\x4b\x65\x79":
                    return XMLSecurityKey::fromEncryptedKeyElement($CP);
                case "\130\65\60\x39\x44\141\x74\x61":
                    if (!($UY = $CP->getElementsByTagName("\130\x35\60\71\103\145\162\164\x69\146\151\x63\141\x74\145"))) {
                        goto Gd;
                    }
                    if (!($UY->length > 0)) {
                        goto zv;
                    }
                    $oN = $UY->item(0)->textContent;
                    $oN = str_replace(array("\15", "\xa", "\40"), '', $oN);
                    $oN = "\55\x2d\55\55\x2d\102\x45\x47\111\116\x20\103\105\122\124\111\x46\111\x43\x41\x54\x45\55\x2d\x2d\x2d\55\xa" . chunk_split($oN, 64, "\12") . "\55\x2d\x2d\55\55\105\x4e\104\x20\103\x45\122\x54\x49\x46\111\103\101\x54\x45\x2d\55\x2d\55\x2d\xa";
                    $qE->loadKey($oN, false, true);
                    zv:
                    Gd:
                    goto Dx;
            }
            Ju:
            Dx:
            HC:
        }
        x0:
        return $qE;
    }
    public function locateKeyInfo($qE = null, $XX = null)
    {
        if (!empty($XX)) {
            goto PW;
        }
        $XX = $this->rawNode;
        PW:
        return self::staticLocateKeyInfo($qE, $XX);
    }
}
