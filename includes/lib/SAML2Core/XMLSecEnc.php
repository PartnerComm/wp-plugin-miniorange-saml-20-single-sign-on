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
    const template = "\x3c\x78\x65\x6e\143\x3a\105\156\x63\162\x79\x70\164\x65\144\104\141\164\x61\40\x78\x6d\154\x6e\163\x3a\170\145\156\143\75\47\150\x74\164\160\72\x2f\57\x77\x77\x77\56\x77\63\56\x6f\162\x67\57\x32\x30\60\x31\57\x30\x34\x2f\170\x6d\x6c\x65\x6e\x63\x23\47\76\15\xa\40\x20\x20\x3c\170\x65\x6e\x63\x3a\103\x69\160\150\145\x72\104\x61\164\x61\76\xd\12\40\40\x20\40\x20\40\74\170\x65\x6e\143\72\103\x69\160\x68\145\x72\x56\141\x6c\x75\145\x3e\x3c\x2f\170\x65\156\x63\x3a\103\x69\160\150\x65\x72\x56\141\x6c\x75\145\x3e\xd\xa\x20\x20\x20\x3c\x2f\170\145\156\143\x3a\103\x69\x70\150\145\162\104\141\x74\141\76\xd\xa\74\x2f\170\x65\x6e\143\x3a\x45\x6e\143\x72\x79\160\x74\x65\144\104\141\164\x61\x3e";
    const Element = "\150\x74\164\x70\72\x2f\x2f\x77\167\167\x2e\167\63\56\x6f\x72\x67\x2f\62\x30\60\x31\x2f\x30\64\57\170\155\x6c\x65\x6e\143\x23\x45\154\145\155\145\156\164";
    const Content = "\150\x74\164\160\72\57\x2f\x77\167\167\x2e\x77\63\x2e\x6f\x72\x67\x2f\x32\60\x30\x31\x2f\60\64\57\x78\155\154\145\156\x63\x23\x43\x6f\156\x74\x65\x6e\164";
    const URI = 3;
    const XMLENCNS = "\x68\164\164\160\72\x2f\x2f\167\x77\167\56\x77\63\56\157\162\147\57\x32\60\x30\61\x2f\60\x34\57\x78\x6d\x6c\145\x6e\143\43";
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
    public function addReference($JI, $Fr, $HA)
    {
        if ($Fr instanceof DOMNode) {
            goto nl;
        }
        throw new Exception("\44\156\157\x64\x65\40\x69\x73\x20\156\x6f\164\x20\x6f\x66\x20\x74\x79\x70\x65\x20\104\117\x4d\x4e\157\x64\145");
        nl:
        $Kd = $this->encdoc;
        $this->_resetTemplate();
        $l_ = $this->encdoc;
        $this->encdoc = $Kd;
        $jV = XMLSecurityDSig::generateGUID();
        $gO = $l_->documentElement;
        $gO->setAttribute("\111\144", $jV);
        $this->references[$JI] = array("\x6e\157\144\145" => $Fr, "\x74\x79\x70\x65" => $HA, "\145\156\x63\156\157\x64\145" => $l_, "\x72\145\x66\165\162\151" => $jV);
    }
    public function setNode($Fr)
    {
        $this->rawNode = $Fr;
    }
    public function encryptNode($ie, $xj = true)
    {
        $WL = '';
        if (!empty($this->rawNode)) {
            goto DS;
        }
        throw new Exception("\x4e\157\144\145\x20\x74\x6f\40\145\156\x63\162\171\160\x74\40\150\141\x73\x20\x6e\157\164\40\x62\145\145\x6e\x20\163\145\x74");
        DS:
        if ($ie instanceof XMLSecurityKey) {
            goto bZ;
        }
        throw new Exception("\111\156\166\141\154\x69\x64\40\113\145\171");
        bZ:
        $Ud = $this->rawNode->ownerDocument;
        $qZ = new DOMXPath($this->encdoc);
        $Zf = $qZ->query("\x2f\170\145\x6e\x63\72\x45\156\x63\162\x79\160\164\145\144\104\x61\x74\x61\57\170\x65\156\143\72\x43\151\160\150\145\x72\x44\x61\x74\141\x2f\170\145\x6e\x63\x3a\x43\x69\x70\x68\x65\162\x56\x61\x6c\165\x65");
        $wa = $Zf->item(0);
        if (!($wa == null)) {
            goto jA;
        }
        throw new Exception("\105\162\x72\157\162\40\x6c\x6f\143\141\164\151\x6e\x67\x20\103\151\x70\x68\145\x72\126\x61\x6c\165\x65\40\x65\x6c\x65\155\145\x6e\164\x20\167\151\164\150\151\x6e\x20\164\145\155\160\154\141\x74\x65");
        jA:
        switch ($this->type) {
            case self::Element:
                $WL = $Ud->saveXML($this->rawNode);
                $this->encdoc->documentElement->setAttribute("\x54\171\x70\x65", self::Element);
                goto FO;
            case self::Content:
                $XF = $this->rawNode->childNodes;
                foreach ($XF as $qO) {
                    $WL .= $Ud->saveXML($qO);
                    oX:
                }
                xb:
                $this->encdoc->documentElement->setAttribute("\x54\171\160\x65", self::Content);
                goto FO;
            default:
                throw new Exception("\124\x79\160\145\x20\151\x73\40\143\165\x72\x72\145\x6e\x74\x6c\171\40\156\x6f\164\x20\163\165\x70\160\x6f\x72\x74\x65\x64");
        }
        oq:
        FO:
        $GN = $this->encdoc->documentElement->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\145\x6e\143\72\105\156\x63\162\x79\160\164\x69\x6f\x6e\115\x65\x74\x68\x6f\x64"));
        $GN->setAttribute("\x41\154\147\157\x72\151\164\x68\x6d", $ie->getAlgorithm());
        $wa->parentNode->parentNode->insertBefore($GN, $wa->parentNode->parentNode->firstChild);
        $Nj = base64_encode($ie->encryptData($WL));
        $St = $this->encdoc->createTextNode($Nj);
        $wa->appendChild($St);
        if ($xj) {
            goto I8;
        }
        return $this->encdoc->documentElement;
        goto u2;
        I8:
        switch ($this->type) {
            case self::Element:
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto oy;
                }
                return $this->encdoc;
                oy:
                $c2 = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                $this->rawNode->parentNode->replaceChild($c2, $this->rawNode);
                return $c2;
            case self::Content:
                $c2 = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                sq:
                if (!$this->rawNode->firstChild) {
                    goto De;
                }
                $this->rawNode->removeChild($this->rawNode->firstChild);
                goto sq;
                De:
                $this->rawNode->appendChild($c2);
                return $c2;
        }
        Ng:
        W5:
        u2:
    }
    public function encryptReferences($ie)
    {
        $Hh = $this->rawNode;
        $Za = $this->type;
        foreach ($this->references as $JI => $fj) {
            $this->encdoc = $fj["\x65\x6e\143\x6e\157\x64\145"];
            $this->rawNode = $fj["\156\157\x64\145"];
            $this->type = $fj["\164\x79\160\145"];
            try {
                $tb = $this->encryptNode($ie);
                $this->references[$JI]["\x65\x6e\x63\156\157\144\145"] = $tb;
            } catch (Exception $F5) {
                $this->rawNode = $Hh;
                $this->type = $Za;
                throw $F5;
            }
            tf:
        }
        mX:
        $this->rawNode = $Hh;
        $this->type = $Za;
    }
    public function getCipherValue()
    {
        if (!empty($this->rawNode)) {
            goto PB;
        }
        throw new Exception("\x4e\x6f\x64\145\40\x74\157\40\x64\145\x63\x72\171\x70\x74\x20\150\x61\x73\40\x6e\x6f\164\x20\142\x65\x65\156\40\x73\145\x74");
        PB:
        $Ud = $this->rawNode->ownerDocument;
        $qZ = new DOMXPath($Ud);
        $qZ->registerNamespace("\170\155\154\x65\x6e\x63\162", self::XMLENCNS);
        $qX = "\56\57\170\x6d\154\x65\156\143\x72\72\103\x69\160\150\x65\162\x44\x61\x74\141\57\x78\155\154\145\156\x63\162\x3a\x43\151\160\x68\145\162\x56\x61\x6c\165\x65";
        $fM = $qZ->query($qX, $this->rawNode);
        $Fr = $fM->item(0);
        if ($Fr) {
            goto T1;
        }
        return null;
        T1:
        return base64_decode($Fr->nodeValue);
    }
    public function decryptNode($ie, $xj = true)
    {
        if ($ie instanceof XMLSecurityKey) {
            goto F3;
        }
        throw new Exception("\x49\156\166\x61\154\x69\144\x20\x4b\x65\171");
        F3:
        $KT = $this->getCipherValue();
        if ($KT) {
            goto BH;
        }
        throw new Exception("\x43\x61\x6e\156\157\x74\40\154\157\x63\141\x74\x65\x20\145\x6e\143\162\x79\x70\164\145\144\40\x64\x61\164\141");
        goto MF;
        BH:
        $G4 = $ie->decryptData($KT);
        if ($xj) {
            goto sk;
        }
        return $G4;
        goto KN;
        sk:
        switch ($this->type) {
            case self::Element:
                $h9 = new DOMDocument();
                $h9->loadXML($G4);
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto sz;
                }
                return $h9;
                sz:
                $c2 = $this->rawNode->ownerDocument->importNode($h9->documentElement, true);
                $this->rawNode->parentNode->replaceChild($c2, $this->rawNode);
                return $c2;
            case self::Content:
                if ($this->rawNode->nodeType == XML_DOCUMENT_NODE) {
                    goto tR;
                }
                $Ud = $this->rawNode->ownerDocument;
                goto Kg;
                tR:
                $Ud = $this->rawNode;
                Kg:
                $Nz = $Ud->createDocumentFragment();
                $Nz->appendXML($G4);
                $oH = $this->rawNode->parentNode;
                $oH->replaceChild($Nz, $this->rawNode);
                return $oH;
            default:
                return $G4;
        }
        Hv:
        OK:
        KN:
        MF:
    }
    public function encryptKey($lD, $qj, $kb = true)
    {
        if (!(!$lD instanceof XMLSecurityKey || !$qj instanceof XMLSecurityKey)) {
            goto lG;
        }
        throw new Exception("\x49\x6e\166\141\x6c\151\144\x20\113\x65\171");
        lG:
        $Kr = base64_encode($lD->encryptData($qj->key));
        $gS = $this->encdoc->documentElement;
        $xJ = $this->encdoc->createElementNS(self::XMLENCNS, "\x78\x65\156\x63\x3a\105\156\143\162\x79\x70\164\145\x64\x4b\x65\171");
        if ($kb) {
            goto g5;
        }
        $this->encKey = $xJ;
        goto Vb;
        g5:
        $uG = $gS->insertBefore($this->encdoc->createElementNS("\150\164\x74\160\72\x2f\x2f\167\167\x77\x2e\167\63\56\157\x72\x67\57\62\x30\x30\x30\57\60\x39\x2f\x78\155\x6c\x64\x73\151\x67\x23", "\144\x73\x69\147\72\x4b\x65\x79\x49\x6e\x66\157"), $gS->firstChild);
        $uG->appendChild($xJ);
        Vb:
        $GN = $xJ->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\145\156\x63\72\105\156\143\x72\x79\160\x74\151\x6f\x6e\115\145\164\x68\157\x64"));
        $GN->setAttribute("\101\x6c\x67\x6f\162\151\164\x68\155", $lD->getAlgorith());
        if (empty($lD->name)) {
            goto j1;
        }
        $uG = $xJ->appendChild($this->encdoc->createElementNS("\x68\164\164\x70\72\57\x2f\x77\x77\x77\56\167\63\x2e\157\162\147\x2f\62\60\x30\x30\x2f\60\71\57\x78\155\154\144\x73\x69\x67\x23", "\x64\x73\151\x67\72\x4b\x65\171\111\156\x66\157"));
        $uG->appendChild($this->encdoc->createElementNS("\x68\x74\x74\x70\72\57\x2f\x77\x77\167\x2e\x77\x33\56\x6f\162\x67\x2f\x32\60\x30\60\x2f\x30\71\x2f\x78\x6d\154\x64\163\151\147\43", "\x64\163\x69\x67\x3a\x4b\145\x79\116\141\x6d\145", $lD->name));
        j1:
        $hG = $xJ->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\145\156\143\72\103\x69\x70\150\x65\162\104\141\x74\141"));
        $hG->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\x65\x6e\143\x3a\x43\151\160\x68\x65\x72\x56\x61\x6c\x75\x65", $Kr));
        if (!(is_array($this->references) && count($this->references) > 0)) {
            goto S1;
        }
        $ha = $xJ->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\145\156\143\72\122\x65\x66\145\162\x65\156\x63\145\x4c\151\x73\x74"));
        foreach ($this->references as $JI => $fj) {
            $jV = $fj["\x72\145\146\x75\x72\x69"];
            $uT = $ha->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\145\156\143\72\x44\141\x74\x61\122\145\x66\145\162\x65\156\143\x65"));
            $uT->setAttribute("\125\x52\x49", "\x23" . $jV);
            Ex:
        }
        Dq:
        S1:
        return;
    }
    public function decryptKey($xJ)
    {
        if ($xJ->isEncrypted) {
            goto rb;
        }
        throw new Exception("\x4b\145\171\40\151\163\x20\x6e\157\x74\x20\x45\156\x63\x72\x79\160\x74\145\x64");
        rb:
        if (!empty($xJ->key)) {
            goto V1;
        }
        throw new Exception("\113\x65\x79\x20\151\163\40\155\x69\163\163\x69\x6e\x67\x20\144\x61\164\141\40\164\157\40\x70\145\x72\x66\x6f\x72\155\x20\164\x68\x65\40\x64\x65\143\x72\x79\160\164\151\157\x6e");
        V1:
        return $this->decryptNode($xJ, false);
    }
    public function locateEncryptedData($gO)
    {
        if ($gO instanceof DOMDocument) {
            goto BD;
        }
        $Ud = $gO->ownerDocument;
        goto Xg;
        BD:
        $Ud = $gO;
        Xg:
        if (!$Ud) {
            goto wQ;
        }
        $PQ = new DOMXPath($Ud);
        $qX = "\57\x2f\52\133\x6c\157\x63\141\154\x2d\x6e\x61\x6d\x65\50\x29\75\47\105\x6e\143\x72\x79\x70\x74\x65\x64\x44\x61\x74\141\x27\40\x61\156\x64\40\x6e\141\x6d\145\163\160\x61\143\x65\x2d\x75\162\151\50\x29\75\x27" . self::XMLENCNS . "\x27\x5d";
        $fM = $PQ->query($qX);
        return $fM->item(0);
        wQ:
        return null;
    }
    public function locateKey($Fr = null)
    {
        if (!empty($Fr)) {
            goto Se;
        }
        $Fr = $this->rawNode;
        Se:
        if ($Fr instanceof DOMNode) {
            goto VC;
        }
        return null;
        VC:
        if (!($Ud = $Fr->ownerDocument)) {
            goto OI;
        }
        $PQ = new DOMXPath($Ud);
        $PQ->registerNamespace("\x78\155\x6c\x73\x65\143\x65\x6e\x63", self::XMLENCNS);
        $qX = "\x2e\57\x2f\x78\155\154\x73\145\x63\x65\x6e\x63\x3a\x45\x6e\x63\x72\171\160\x74\151\157\x6e\x4d\145\164\150\x6f\144";
        $fM = $PQ->query($qX, $Fr);
        if (!($BD = $fM->item(0))) {
            goto dn;
        }
        $GY = $BD->getAttribute("\101\x6c\147\157\162\151\x74\150\155");
        try {
            $ie = new XMLSecurityKey($GY, array("\164\171\x70\145" => "\x70\162\x69\x76\x61\x74\145"));
        } catch (Exception $F5) {
            return null;
        }
        return $ie;
        dn:
        OI:
        return null;
    }
    public static function staticLocateKeyInfo($zk = null, $Fr = null)
    {
        if (!(empty($Fr) || !$Fr instanceof DOMNode)) {
            goto gk;
        }
        return null;
        gk:
        $Ud = $Fr->ownerDocument;
        if ($Ud) {
            goto ge;
        }
        return null;
        ge:
        $PQ = new DOMXPath($Ud);
        $PQ->registerNamespace("\x78\155\154\x73\x65\x63\x65\x6e\143", self::XMLENCNS);
        $PQ->registerNamespace("\170\x6d\x6c\163\145\x63\x64\x73\x69\147", XMLSecurityDSig::XMLDSIGNS);
        $qX = "\56\57\170\x6d\x6c\163\x65\143\x64\x73\151\x67\72\113\145\x79\111\x6e\x66\x6f";
        $fM = $PQ->query($qX, $Fr);
        $BD = $fM->item(0);
        if ($BD) {
            goto sF;
        }
        return $zk;
        sF:
        foreach ($BD->childNodes as $qO) {
            switch ($qO->localName) {
                case "\113\145\171\x4e\x61\155\145":
                    if (empty($zk)) {
                        goto HE;
                    }
                    $zk->name = $qO->nodeValue;
                    HE:
                    goto TM;
                case "\x4b\x65\171\x56\x61\x6c\165\145":
                    foreach ($qO->childNodes as $Qf) {
                        switch ($Qf->localName) {
                            case "\104\x53\x41\x4b\x65\x79\x56\x61\154\165\x65":
                                throw new Exception("\104\x53\101\x4b\x65\x79\x56\141\x6c\165\x65\40\x63\165\162\x72\145\156\x74\154\171\40\156\157\x74\x20\x73\165\160\160\x6f\x72\x74\145\144");
                            case "\x52\123\101\113\x65\171\126\x61\x6c\165\x65":
                                $RO = null;
                                $nO = null;
                                if (!($SR = $Qf->getElementsByTagName("\x4d\x6f\x64\165\x6c\165\163")->item(0))) {
                                    goto kZ;
                                }
                                $RO = base64_decode($SR->nodeValue);
                                kZ:
                                if (!($FL = $Qf->getElementsByTagName("\x45\170\160\157\156\x65\156\164")->item(0))) {
                                    goto cm;
                                }
                                $nO = base64_decode($FL->nodeValue);
                                cm:
                                if (!(empty($RO) || empty($nO))) {
                                    goto Y0;
                                }
                                throw new Exception("\115\x69\x73\x73\151\156\147\x20\115\157\144\x75\x6c\165\163\x20\157\162\x20\105\170\160\157\156\x65\156\164");
                                Y0:
                                $vq = XMLSecurityKey::convertRSA($RO, $nO);
                                $zk->loadKey($vq);
                                goto Cp;
                        }
                        v2:
                        Cp:
                        Iv:
                    }
                    Y5:
                    goto TM;
                case "\122\145\x74\x72\151\x65\x76\x61\154\115\145\x74\x68\x6f\x64":
                    $HA = $qO->getAttribute("\x54\171\x70\x65");
                    if (!($HA !== "\x68\x74\x74\x70\72\x2f\x2f\167\167\x77\x2e\x77\63\x2e\x6f\x72\x67\57\x32\60\x30\61\57\x30\x34\x2f\170\155\x6c\145\156\143\43\x45\156\x63\x72\171\160\x74\145\144\x4b\145\x79")) {
                        goto LW;
                    }
                    goto TM;
                    LW:
                    $pM = $qO->getAttribute("\125\122\111");
                    if (!($pM[0] !== "\43")) {
                        goto Qf;
                    }
                    goto TM;
                    Qf:
                    $Sy = substr($pM, 1);
                    $qX = "\x2f\57\170\155\154\163\x65\143\x65\156\x63\72\105\x6e\143\162\171\x70\x74\x65\144\113\x65\171\133\x40\111\144\x3d\42" . XPath::filterAttrValue($Sy, XPath::DOUBLE_QUOTE) . "\42\x5d";
                    $nr = $PQ->query($qX)->item(0);
                    if ($nr) {
                        goto qj;
                    }
                    throw new Exception("\x55\156\141\x62\154\x65\x20\164\157\x20\154\x6f\143\141\x74\x65\40\105\x6e\x63\x72\171\160\164\x65\144\113\x65\x79\40\x77\x69\x74\x68\x20\100\111\144\75\x27{$Sy}\x27\56");
                    qj:
                    return XMLSecurityKey::fromEncryptedKeyElement($nr);
                case "\x45\156\x63\162\x79\160\x74\145\144\x4b\145\x79":
                    return XMLSecurityKey::fromEncryptedKeyElement($qO);
                case "\x58\65\x30\x39\104\x61\x74\141":
                    if (!($ly = $qO->getElementsByTagName("\130\65\x30\x39\x43\145\162\164\151\146\x69\143\x61\164\x65"))) {
                        goto Bj;
                    }
                    if (!($ly->length > 0)) {
                        goto mV;
                    }
                    $UU = $ly->item(0)->textContent;
                    $UU = str_replace(array("\15", "\12", "\x20"), '', $UU);
                    $UU = "\55\x2d\x2d\x2d\x2d\102\105\107\111\x4e\x20\103\105\x52\124\111\x46\111\103\x41\124\x45\x2d\x2d\x2d\x2d\x2d\xa" . chunk_split($UU, 64, "\xa") . "\55\55\x2d\55\55\105\116\x44\x20\103\105\x52\124\x49\106\111\x43\101\124\x45\x2d\55\55\x2d\x2d\xa";
                    $zk->loadKey($UU, false, true);
                    mV:
                    Bj:
                    goto TM;
            }
            GN:
            TM:
            q4:
        }
        Yo:
        return $zk;
    }
    public function locateKeyInfo($zk = null, $Fr = null)
    {
        if (!empty($Fr)) {
            goto sS;
        }
        $Fr = $this->rawNode;
        sS:
        return self::staticLocateKeyInfo($zk, $Fr);
    }
}
