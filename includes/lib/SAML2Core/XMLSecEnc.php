<?php


namespace RobRichards\XMLSecLibs;

use DOMDocument;
use DOMNode;
use DOMXPath;
use Exception;
use RobRichards\XMLSecLibs\Utils\XPath;
class XMLSecEnc
{
    const template = "\74\x78\145\156\143\72\105\x6e\143\162\x79\160\x74\145\144\x44\141\x74\x61\x20\x78\155\154\156\163\x3a\x78\145\x6e\x63\x3d\x27\x68\164\x74\160\72\x2f\x2f\167\167\167\56\167\x33\x2e\157\162\x67\x2f\62\x30\60\61\57\60\x34\x2f\170\155\x6c\145\156\x63\x23\47\x3e\xd\xa\40\x20\40\74\x78\x65\x6e\x63\x3a\x43\x69\160\x68\x65\162\x44\141\164\141\76\xd\12\x20\x20\x20\x20\x20\40\x3c\170\x65\156\x63\72\103\x69\x70\x68\x65\x72\126\x61\154\165\x65\x3e\74\x2f\x78\145\x6e\143\x3a\103\151\x70\150\145\162\126\x61\x6c\x75\x65\x3e\15\12\40\40\x20\x3c\57\170\x65\156\143\72\x43\151\x70\150\145\162\104\141\164\x61\x3e\xd\12\x3c\57\170\x65\x6e\143\x3a\105\156\143\x72\171\x70\x74\x65\144\104\x61\x74\141\76";
    const Element = "\150\164\x74\160\x3a\57\x2f\167\x77\x77\x2e\x77\x33\x2e\x6f\162\x67\57\x32\x30\x30\61\x2f\60\x34\x2f\170\155\x6c\145\156\x63\x23\105\x6c\145\x6d\x65\x6e\x74";
    const Content = "\150\164\164\x70\72\x2f\x2f\167\x77\167\56\x77\x33\x2e\157\x72\147\57\62\x30\60\x31\57\x30\64\57\170\155\154\145\x6e\143\x23\x43\x6f\156\x74\145\156\x74";
    const URI = 3;
    const XMLENCNS = "\150\164\164\x70\72\x2f\57\167\x77\x77\56\167\63\56\x6f\x72\x67\57\x32\x30\x30\61\57\60\64\x2f\170\155\x6c\145\156\143\43";
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
    public function addReference($ly, $e3, $VL)
    {
        if ($e3 instanceof DOMNode) {
            goto NU2;
        }
        throw new Exception("\44\156\x6f\144\x65\x20\151\x73\x20\156\x6f\x74\x20\157\146\40\164\171\160\145\x20\x44\117\115\116\x6f\x64\145");
        NU2:
        $fT = $this->encdoc;
        $this->_resetTemplate();
        $pw = $this->encdoc;
        $this->encdoc = $fT;
        $YI = XMLSecurityDSig::generateGUID();
        $Z9 = $pw->documentElement;
        $Z9->setAttribute("\111\144", $YI);
        $this->references[$ly] = array("\x6e\x6f\144\x65" => $e3, "\x74\171\x70\x65" => $VL, "\145\x6e\x63\156\x6f\x64\x65" => $pw, "\162\145\146\165\x72\x69" => $YI);
    }
    public function setNode($e3)
    {
        $this->rawNode = $e3;
    }
    public function encryptNode($dM, $VU = true)
    {
        $cd = '';
        if (!empty($this->rawNode)) {
            goto jpk;
        }
        throw new Exception("\116\157\144\x65\x20\x74\157\x20\145\x6e\x63\x72\171\160\164\x20\x68\141\163\40\x6e\x6f\164\40\x62\145\145\x6e\x20\163\x65\164");
        jpk:
        if ($dM instanceof XMLSecurityKey) {
            goto YzG;
        }
        throw new Exception("\111\156\x76\x61\x6c\x69\x64\x20\113\x65\171");
        YzG:
        $R0 = $this->rawNode->ownerDocument;
        $t8 = new DOMXPath($this->encdoc);
        $FS = $t8->query("\57\170\x65\156\x63\x3a\105\x6e\x63\x72\171\160\x74\145\144\104\x61\x74\x61\x2f\x78\x65\x6e\143\72\x43\x69\160\x68\145\x72\x44\141\164\141\x2f\170\x65\x6e\x63\x3a\x43\x69\x70\x68\x65\x72\x56\141\x6c\x75\145");
        $G2 = $FS->item(0);
        if (!($G2 == null)) {
            goto Ntf;
        }
        throw new Exception("\x45\162\x72\x6f\x72\40\154\x6f\143\141\x74\x69\x6e\147\x20\x43\x69\160\150\x65\162\126\141\154\x75\x65\x20\x65\x6c\x65\155\x65\156\x74\x20\x77\151\164\x68\x69\156\x20\x74\145\x6d\160\154\x61\x74\145");
        Ntf:
        switch ($this->type) {
            case self::Element:
                $cd = $R0->saveXML($this->rawNode);
                $this->encdoc->documentElement->setAttribute("\124\171\160\x65", self::Element);
                goto T__;
            case self::Content:
                $fM = $this->rawNode->childNodes;
                foreach ($fM as $Qg) {
                    $cd .= $R0->saveXML($Qg);
                    BRF:
                }
                E_M:
                $this->encdoc->documentElement->setAttribute("\x54\171\160\x65", self::Content);
                goto T__;
            default:
                throw new Exception("\124\x79\x70\x65\x20\x69\163\40\x63\x75\162\162\145\x6e\164\154\x79\x20\x6e\x6f\x74\40\x73\165\160\160\157\162\x74\145\144");
        }
        Wfb:
        T__:
        $XA = $this->encdoc->documentElement->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\x65\x6e\143\72\105\x6e\x63\162\x79\160\164\x69\x6f\x6e\x4d\145\164\150\x6f\x64"));
        $XA->setAttribute("\101\154\x67\x6f\162\151\x74\x68\155", $dM->getAlgorithm());
        $G2->parentNode->parentNode->insertBefore($XA, $G2->parentNode->parentNode->firstChild);
        $gU = base64_encode($dM->encryptData($cd));
        $DE = $this->encdoc->createTextNode($gU);
        $G2->appendChild($DE);
        if ($VU) {
            goto QYh;
        }
        return $this->encdoc->documentElement;
        goto yTx;
        QYh:
        switch ($this->type) {
            case self::Element:
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto avt;
                }
                return $this->encdoc;
                avt:
                $wr = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                $this->rawNode->parentNode->replaceChild($wr, $this->rawNode);
                return $wr;
            case self::Content:
                $wr = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                YT7:
                if (!$this->rawNode->firstChild) {
                    goto wL_;
                }
                $this->rawNode->removeChild($this->rawNode->firstChild);
                goto YT7;
                wL_:
                $this->rawNode->appendChild($wr);
                return $wr;
        }
        tDf:
        SyP:
        yTx:
    }
    public function encryptReferences($dM)
    {
        $vL = $this->rawNode;
        $Si = $this->type;
        foreach ($this->references as $ly => $Rd) {
            $this->encdoc = $Rd["\145\x6e\143\156\x6f\144\x65"];
            $this->rawNode = $Rd["\x6e\157\x64\x65"];
            $this->type = $Rd["\164\171\x70\x65"];
            try {
                $kq = $this->encryptNode($dM);
                $this->references[$ly]["\145\x6e\143\156\157\144\145"] = $kq;
            } catch (Exception $XE) {
                $this->rawNode = $vL;
                $this->type = $Si;
                throw $XE;
            }
            OSB:
        }
        jqC:
        $this->rawNode = $vL;
        $this->type = $Si;
    }
    public function getCipherValue()
    {
        if (!empty($this->rawNode)) {
            goto WiA;
        }
        throw new Exception("\x4e\x6f\x64\x65\40\x74\157\40\144\145\143\x72\171\x70\164\40\x68\141\163\40\156\157\x74\40\142\145\x65\x6e\x20\163\x65\164");
        WiA:
        $R0 = $this->rawNode->ownerDocument;
        $t8 = new DOMXPath($R0);
        $t8->registerNamespace("\170\x6d\x6c\x65\x6e\143\162", self::XMLENCNS);
        $IC = "\56\x2f\x78\x6d\154\145\x6e\x63\x72\x3a\x43\x69\x70\150\x65\x72\x44\141\164\141\57\170\155\x6c\145\156\143\x72\72\x43\x69\x70\x68\145\162\x56\x61\154\x75\145";
        $do = $t8->query($IC, $this->rawNode);
        $e3 = $do->item(0);
        if ($e3) {
            goto Pc6;
        }
        return null;
        Pc6:
        return base64_decode($e3->nodeValue);
    }
    public function decryptNode($dM, $VU = true)
    {
        if ($dM instanceof XMLSecurityKey) {
            goto TGo;
        }
        throw new Exception("\x49\156\166\x61\154\x69\144\x20\113\145\171");
        TGo:
        $OT = $this->getCipherValue();
        if ($OT) {
            goto S4E;
        }
        throw new Exception("\103\141\156\156\x6f\x74\x20\154\x6f\143\x61\x74\x65\40\145\x6e\143\162\171\160\x74\x65\x64\40\144\141\164\141");
        goto Jl9;
        S4E:
        $Aa = $dM->decryptData($OT);
        if ($VU) {
            goto Nbh;
        }
        return $Aa;
        goto A3c;
        Nbh:
        switch ($this->type) {
            case self::Element:
                $g9 = new DOMDocument();
                $g9->loadXML($Aa);
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto OOx;
                }
                return $g9;
                OOx:
                $wr = $this->rawNode->ownerDocument->importNode($g9->documentElement, true);
                $this->rawNode->parentNode->replaceChild($wr, $this->rawNode);
                return $wr;
            case self::Content:
                if ($this->rawNode->nodeType == XML_DOCUMENT_NODE) {
                    goto reu;
                }
                $R0 = $this->rawNode->ownerDocument;
                goto PoH;
                reu:
                $R0 = $this->rawNode;
                PoH:
                $VY = $R0->createDocumentFragment();
                $VY->appendXML($Aa);
                $T5 = $this->rawNode->parentNode;
                $T5->replaceChild($VY, $this->rawNode);
                return $T5;
            default:
                return $Aa;
        }
        Vec:
        uM2:
        A3c:
        Jl9:
    }
    public function encryptKey($kj, $oH, $PK = true)
    {
        if (!(!$kj instanceof XMLSecurityKey || !$oH instanceof XMLSecurityKey)) {
            goto wKi;
        }
        throw new Exception("\x49\156\166\x61\x6c\151\x64\40\113\x65\171");
        wKi:
        $o_ = base64_encode($kj->encryptData($oH->key));
        $z6 = $this->encdoc->documentElement;
        $b3 = $this->encdoc->createElementNS(self::XMLENCNS, "\170\145\156\x63\x3a\x45\156\143\x72\x79\160\x74\x65\144\x4b\145\171");
        if ($PK) {
            goto GkB;
        }
        $this->encKey = $b3;
        goto bzD;
        GkB:
        $au = $z6->insertBefore($this->encdoc->createElementNS("\x68\164\164\160\72\x2f\x2f\x77\167\167\x2e\x77\63\x2e\x6f\162\x67\x2f\x32\x30\60\x30\57\x30\x39\x2f\170\155\154\144\163\151\x67\43", "\x64\163\x69\x67\72\x4b\x65\x79\111\156\146\x6f"), $z6->firstChild);
        $au->appendChild($b3);
        bzD:
        $XA = $b3->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\x65\x6e\x63\x3a\x45\x6e\x63\x72\x79\160\x74\x69\157\x6e\115\x65\x74\150\157\x64"));
        $XA->setAttribute("\x41\x6c\147\x6f\x72\151\x74\150\x6d", $kj->getAlgorith());
        if (empty($kj->name)) {
            goto zER;
        }
        $au = $b3->appendChild($this->encdoc->createElementNS("\x68\x74\164\x70\x3a\57\57\167\167\167\56\x77\x33\x2e\157\x72\147\x2f\x32\60\60\x30\57\60\x39\57\170\x6d\x6c\x64\163\x69\x67\43", "\144\163\x69\x67\72\113\145\171\111\x6e\x66\157"));
        $au->appendChild($this->encdoc->createElementNS("\x68\x74\x74\160\72\57\x2f\167\167\167\56\x77\x33\56\157\x72\x67\x2f\x32\60\x30\x30\57\x30\71\57\x78\155\x6c\x64\x73\151\x67\43", "\144\x73\151\x67\72\113\145\x79\116\x61\x6d\145", $kj->name));
        zER:
        $qE = $b3->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\145\x6e\x63\72\103\x69\x70\150\x65\162\104\141\164\x61"));
        $qE->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\x65\156\x63\x3a\x43\151\x70\150\145\x72\x56\x61\x6c\x75\x65", $o_));
        if (!(is_array($this->references) && count($this->references) > 0)) {
            goto x4N;
        }
        $yC = $b3->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\x65\156\x63\x3a\122\x65\146\145\162\x65\x6e\x63\x65\114\x69\x73\x74"));
        foreach ($this->references as $ly => $Rd) {
            $YI = $Rd["\162\145\x66\165\x72\x69"];
            $A8 = $yC->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\145\156\143\72\104\x61\x74\x61\122\x65\146\x65\x72\145\x6e\x63\145"));
            $A8->setAttribute("\125\122\x49", "\43" . $YI);
            Jwj:
        }
        hgm:
        x4N:
        return;
    }
    public function decryptKey($b3)
    {
        if ($b3->isEncrypted) {
            goto ifh;
        }
        throw new Exception("\x4b\145\171\40\x69\163\40\156\157\x74\x20\105\x6e\x63\x72\171\160\x74\145\x64");
        ifh:
        if (!empty($b3->key)) {
            goto rAe;
        }
        throw new Exception("\x4b\145\171\40\x69\163\x20\x6d\x69\x73\x73\151\x6e\x67\40\144\x61\164\x61\x20\x74\x6f\x20\x70\145\162\x66\157\162\155\x20\x74\150\x65\40\144\145\x63\162\x79\160\x74\x69\157\156");
        rAe:
        return $this->decryptNode($b3, false);
    }
    public function locateEncryptedData($Z9)
    {
        if ($Z9 instanceof DOMDocument) {
            goto zRt;
        }
        $R0 = $Z9->ownerDocument;
        goto eTr;
        zRt:
        $R0 = $Z9;
        eTr:
        if (!$R0) {
            goto f_y;
        }
        $yJ = new DOMXPath($R0);
        $IC = "\57\x2f\52\x5b\x6c\x6f\143\x61\154\x2d\x6e\x61\x6d\x65\50\x29\75\47\x45\156\x63\162\171\x70\164\x65\144\104\x61\164\141\x27\x20\141\x6e\144\40\x6e\141\155\x65\163\160\141\x63\x65\x2d\x75\x72\x69\x28\51\x3d\47" . self::XMLENCNS . "\47\x5d";
        $do = $yJ->query($IC);
        return $do->item(0);
        f_y:
        return null;
    }
    public function locateKey($e3 = null)
    {
        if (!empty($e3)) {
            goto ujq;
        }
        $e3 = $this->rawNode;
        ujq:
        if ($e3 instanceof DOMNode) {
            goto Nsb;
        }
        return null;
        Nsb:
        if (!($R0 = $e3->ownerDocument)) {
            goto fnb;
        }
        $yJ = new DOMXPath($R0);
        $yJ->registerNamespace("\x78\155\154\x73\x65\x63\145\x6e\143", self::XMLENCNS);
        $IC = "\56\x2f\57\x78\155\154\163\x65\143\145\x6e\x63\72\x45\x6e\x63\162\x79\160\164\x69\157\x6e\115\x65\x74\150\157\144";
        $do = $yJ->query($IC, $e3);
        if (!($U5 = $do->item(0))) {
            goto tk2;
        }
        $bt = $U5->getAttribute("\x41\154\147\157\x72\151\164\x68\x6d");
        try {
            $dM = new XMLSecurityKey($bt, array("\164\171\x70\145" => "\160\162\151\166\141\x74\x65"));
        } catch (Exception $XE) {
            return null;
        }
        return $dM;
        tk2:
        fnb:
        return null;
    }
    public static function staticLocateKeyInfo($Oa = null, $e3 = null)
    {
        if (!(empty($e3) || !$e3 instanceof DOMNode)) {
            goto PZT;
        }
        return null;
        PZT:
        $R0 = $e3->ownerDocument;
        if ($R0) {
            goto ldZ;
        }
        return null;
        ldZ:
        $yJ = new DOMXPath($R0);
        $yJ->registerNamespace("\170\x6d\x6c\x73\145\x63\x65\156\143", self::XMLENCNS);
        $yJ->registerNamespace("\x78\x6d\154\x73\x65\x63\x64\163\151\x67", XMLSecurityDSig::XMLDSIGNS);
        $IC = "\x2e\57\170\155\x6c\163\x65\143\144\163\x69\147\72\x4b\x65\171\111\x6e\x66\157";
        $do = $yJ->query($IC, $e3);
        $U5 = $do->item(0);
        if ($U5) {
            goto ICi;
        }
        return $Oa;
        ICi:
        foreach ($U5->childNodes as $Qg) {
            switch ($Qg->localName) {
                case "\113\x65\171\116\141\155\145":
                    if (empty($Oa)) {
                        goto RvQ;
                    }
                    $Oa->name = $Qg->nodeValue;
                    RvQ:
                    goto uF3;
                case "\113\x65\171\x56\141\154\x75\x65":
                    foreach ($Qg->childNodes as $gA) {
                        switch ($gA->localName) {
                            case "\x44\x53\101\x4b\x65\171\x56\x61\x6c\165\x65":
                                throw new Exception("\x44\123\101\113\145\171\x56\141\154\165\145\40\x63\x75\x72\162\x65\156\x74\x6c\x79\40\156\157\x74\x20\x73\x75\x70\x70\x6f\x72\164\145\x64");
                            case "\x52\x53\101\x4b\145\171\126\x61\154\165\145":
                                $Mm = null;
                                $iQ = null;
                                if (!($oa = $gA->getElementsByTagName("\115\x6f\144\x75\x6c\x75\x73")->item(0))) {
                                    goto pZ1;
                                }
                                $Mm = base64_decode($oa->nodeValue);
                                pZ1:
                                if (!($hV = $gA->getElementsByTagName("\105\x78\x70\x6f\x6e\145\x6e\164")->item(0))) {
                                    goto pn4;
                                }
                                $iQ = base64_decode($hV->nodeValue);
                                pn4:
                                if (!(empty($Mm) || empty($iQ))) {
                                    goto d82;
                                }
                                throw new Exception("\x4d\x69\x73\x73\151\156\147\40\115\157\x64\x75\154\x75\x73\x20\157\162\x20\105\170\160\x6f\x6e\145\156\164");
                                d82:
                                $vu = XMLSecurityKey::convertRSA($Mm, $iQ);
                                $Oa->loadKey($vu);
                                goto pY6;
                        }
                        rXE:
                        pY6:
                        y5E:
                    }
                    UXe:
                    goto uF3;
                case "\122\x65\164\162\x69\145\x76\x61\x6c\x4d\145\164\150\x6f\x64":
                    $VL = $Qg->getAttribute("\124\171\x70\145");
                    if (!($VL !== "\150\164\164\160\x3a\57\57\167\167\x77\x2e\x77\x33\56\x6f\x72\147\x2f\62\x30\x30\61\57\60\x34\57\x78\x6d\x6c\145\x6e\143\x23\105\156\x63\x72\171\x70\x74\x65\x64\113\x65\171")) {
                        goto zId;
                    }
                    goto uF3;
                    zId:
                    $HA = $Qg->getAttribute("\125\x52\111");
                    if (!($HA[0] !== "\43")) {
                        goto iQ_;
                    }
                    goto uF3;
                    iQ_:
                    $uc = substr($HA, 1);
                    $IC = "\57\57\x78\x6d\x6c\163\145\143\x65\156\143\72\105\x6e\143\x72\x79\x70\164\x65\x64\113\x65\171\133\100\111\x64\75\x22" . XPath::filterAttrValue($uc, XPath::DOUBLE_QUOTE) . "\42\x5d";
                    $uA = $yJ->query($IC)->item(0);
                    if ($uA) {
                        goto BYL;
                    }
                    throw new Exception("\x55\x6e\141\142\154\x65\x20\x74\157\40\154\x6f\x63\141\x74\145\x20\x45\156\143\162\171\x70\x74\145\x64\x4b\x65\x79\40\167\x69\164\x68\40\x40\x49\144\75\x27{$uc}\x27\x2e");
                    BYL:
                    return XMLSecurityKey::fromEncryptedKeyElement($uA);
                case "\x45\156\143\x72\x79\160\164\145\x64\113\x65\x79":
                    return XMLSecurityKey::fromEncryptedKeyElement($Qg);
                case "\130\65\x30\x39\x44\x61\x74\141":
                    if (!($I1 = $Qg->getElementsByTagName("\130\x35\60\71\103\145\x72\x74\x69\146\151\x63\x61\x74\x65"))) {
                        goto p3C;
                    }
                    if (!($I1->length > 0)) {
                        goto gNa;
                    }
                    $kM = $I1->item(0)->textContent;
                    $kM = str_replace(array("\xd", "\12", "\x20"), '', $kM);
                    $kM = "\55\x2d\x2d\x2d\x2d\102\105\107\x49\x4e\x20\103\105\x52\124\111\x46\x49\103\101\124\x45\55\55\55\55\x2d\12" . chunk_split($kM, 64, "\xa") . "\55\55\x2d\x2d\55\105\116\x44\x20\x43\x45\x52\124\111\x46\x49\103\101\x54\x45\x2d\x2d\55\55\55\xa";
                    $Oa->loadKey($kM, false, true);
                    gNa:
                    p3C:
                    goto uF3;
            }
            Fct:
            uF3:
            qM_:
        }
        xsK:
        return $Oa;
    }
    public function locateKeyInfo($Oa = null, $e3 = null)
    {
        if (!empty($e3)) {
            goto Dck;
        }
        $e3 = $this->rawNode;
        Dck:
        return self::staticLocateKeyInfo($Oa, $e3);
    }
}
