<?php


namespace RobRichards\XMLSecLibs;

use DOMDocument;
use DOMNode;
use DOMXPath;
use Exception;
use RobRichards\XMLSecLibs\Utils\XPath;
class XMLSecEnc
{
    const template = "\x3c\x78\145\156\x63\72\x45\156\x63\x72\x79\160\x74\x65\x64\104\x61\x74\141\40\x78\x6d\154\156\163\72\170\145\156\143\75\x27\150\x74\164\x70\x3a\x2f\x2f\x77\x77\x77\56\x77\63\56\157\162\x67\57\62\60\60\61\57\x30\x34\57\x78\x6d\x6c\145\156\x63\43\x27\x3e\12\40\40\40\74\170\x65\156\x63\72\x43\151\x70\150\x65\162\x44\141\x74\x61\x3e\xa\x20\40\x20\x20\40\40\x3c\170\x65\156\143\x3a\103\x69\160\x68\x65\x72\126\141\x6c\165\145\76\x3c\x2f\x78\x65\x6e\x63\72\103\151\x70\x68\x65\x72\126\141\154\165\145\76\12\x20\x20\40\74\57\170\x65\156\143\72\x43\x69\x70\x68\145\162\104\x61\164\x61\76\xa\x3c\x2f\x78\145\x6e\143\72\x45\156\x63\162\171\x70\164\x65\x64\x44\x61\x74\x61\x3e";
    const Element = "\x68\164\x74\160\x3a\57\x2f\167\x77\x77\56\167\x33\x2e\157\x72\x67\x2f\x32\60\60\x31\57\60\x34\x2f\x78\x6d\x6c\x65\x6e\x63\43\105\x6c\x65\155\145\x6e\164";
    const Content = "\150\164\164\160\72\57\57\167\167\x77\x2e\167\x33\x2e\x6f\x72\x67\57\62\x30\x30\x31\57\60\x34\x2f\x78\155\154\145\x6e\143\x23\103\157\156\164\145\x6e\164";
    const URI = 3;
    const XMLENCNS = "\150\164\x74\160\72\57\x2f\x77\167\167\56\x77\63\56\157\x72\x67\x2f\x32\x30\60\61\57\60\x34\57\x78\x6d\154\x65\x6e\x63\x23";
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
    public function addReference($vd, $pu, $rj)
    {
        if ($pu instanceof DOMNode) {
            goto qb6;
        }
        throw new Exception("\44\156\x6f\144\145\x20\x69\x73\40\156\x6f\x74\40\x6f\x66\x20\164\171\x70\145\x20\104\117\x4d\116\157\144\145");
        qb6:
        $kx = $this->encdoc;
        $this->_resetTemplate();
        $w1 = $this->encdoc;
        $this->encdoc = $kx;
        $WB = XMLSecurityDSig::generateGUID();
        $WC = $w1->documentElement;
        $WC->setAttribute("\111\x64", $WB);
        $this->references[$vd] = array("\156\157\144\145" => $pu, "\x74\x79\x70\145" => $rj, "\145\156\x63\156\157\x64\x65" => $w1, "\162\145\146\165\x72\151" => $WB);
    }
    public function setNode($pu)
    {
        $this->rawNode = $pu;
    }
    public function encryptNode($MM, $Xq = true)
    {
        $aS = '';
        if (!empty($this->rawNode)) {
            goto k8A;
        }
        throw new Exception("\116\x6f\144\x65\40\164\157\40\x65\156\x63\162\171\160\x74\40\x68\x61\163\40\156\157\x74\40\142\145\145\x6e\x20\163\145\164");
        k8A:
        if ($MM instanceof XMLSecurityKey) {
            goto x9Z;
        }
        throw new Exception("\111\x6e\166\x61\154\151\144\x20\113\145\x79");
        x9Z:
        $tW = $this->rawNode->ownerDocument;
        $Li = new DOMXPath($this->encdoc);
        $YS = $Li->query("\x2f\170\145\156\143\x3a\105\x6e\x63\x72\171\160\164\145\144\x44\141\x74\141\57\170\x65\x6e\x63\72\103\151\160\x68\x65\x72\104\141\164\x61\57\170\x65\156\143\x3a\x43\x69\160\x68\145\x72\126\x61\x6c\x75\145");
        $uT = $YS->item(0);
        if (!($uT == null)) {
            goto UIL;
        }
        throw new Exception("\x45\162\162\157\x72\x20\x6c\157\143\141\x74\151\x6e\x67\40\103\x69\160\150\145\162\x56\x61\x6c\165\x65\x20\x65\154\145\155\x65\x6e\x74\40\x77\x69\x74\x68\151\x6e\40\164\x65\x6d\x70\154\141\164\145");
        UIL:
        switch ($this->type) {
            case self::Element:
                $aS = $tW->saveXML($this->rawNode);
                $this->encdoc->documentElement->setAttribute("\x54\171\160\145", self::Element);
                goto NrK;
            case self::Content:
                $Tl = $this->rawNode->childNodes;
                foreach ($Tl as $M1) {
                    $aS .= $tW->saveXML($M1);
                    dQD:
                }
                JFr:
                $this->encdoc->documentElement->setAttribute("\x54\171\x70\145", self::Content);
                goto NrK;
            default:
                throw new Exception("\x54\171\x70\x65\40\x69\163\40\x63\x75\162\162\x65\x6e\x74\x6c\171\40\156\x6f\x74\x20\163\x75\x70\x70\x6f\162\164\145\x64");
        }
        F0n:
        NrK:
        $iU = $this->encdoc->documentElement->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\145\x6e\143\72\105\x6e\x63\162\171\x70\x74\151\x6f\156\x4d\x65\x74\x68\157\144"));
        $iU->setAttribute("\101\x6c\x67\x6f\x72\151\x74\x68\x6d", $MM->getAlgorithm());
        $uT->parentNode->parentNode->insertBefore($iU, $uT->parentNode->parentNode->firstChild);
        $Rz = base64_encode($MM->encryptData($aS));
        $Iy = $this->encdoc->createTextNode($Rz);
        $uT->appendChild($Iy);
        if ($Xq) {
            goto sUk;
        }
        return $this->encdoc->documentElement;
        goto Gil;
        sUk:
        switch ($this->type) {
            case self::Element:
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto xn0;
                }
                return $this->encdoc;
                xn0:
                $nI = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                $this->rawNode->parentNode->replaceChild($nI, $this->rawNode);
                return $nI;
            case self::Content:
                $nI = $this->rawNode->ownerDocument->importNode($this->encdoc->documentElement, true);
                jA9:
                if (!$this->rawNode->firstChild) {
                    goto PWE;
                }
                $this->rawNode->removeChild($this->rawNode->firstChild);
                goto jA9;
                PWE:
                $this->rawNode->appendChild($nI);
                return $nI;
        }
        wJ5:
        Tys:
        Gil:
    }
    public function encryptReferences($MM)
    {
        $xW = $this->rawNode;
        $Ao = $this->type;
        foreach ($this->references as $vd => $U7) {
            $this->encdoc = $U7["\x65\x6e\143\156\157\144\x65"];
            $this->rawNode = $U7["\156\157\x64\145"];
            $this->type = $U7["\x74\x79\160\145"];
            try {
                $lJ = $this->encryptNode($MM);
                $this->references[$vd]["\145\x6e\x63\156\x6f\144\145"] = $lJ;
            } catch (Exception $xr) {
                $this->rawNode = $xW;
                $this->type = $Ao;
                throw $xr;
            }
            si1:
        }
        IG0:
        $this->rawNode = $xW;
        $this->type = $Ao;
    }
    public function getCipherValue()
    {
        if (!empty($this->rawNode)) {
            goto RDK;
        }
        throw new Exception("\116\x6f\x64\x65\40\164\157\40\x64\x65\143\162\171\x70\164\x20\150\141\x73\x20\156\157\x74\40\142\145\x65\x6e\40\163\x65\164");
        RDK:
        $tW = $this->rawNode->ownerDocument;
        $Li = new DOMXPath($tW);
        $Li->registerNamespace("\x78\x6d\154\x65\x6e\x63\162", self::XMLENCNS);
        $C8 = "\56\x2f\170\x6d\154\x65\156\x63\162\x3a\x43\151\x70\x68\145\x72\x44\x61\x74\141\x2f\170\x6d\x6c\x65\156\x63\162\72\x43\151\160\150\x65\162\126\x61\x6c\x75\x65";
        $B_ = $Li->query($C8, $this->rawNode);
        $pu = $B_->item(0);
        if ($pu) {
            goto Hz1;
        }
        return null;
        Hz1:
        return base64_decode($pu->nodeValue);
    }
    public function decryptNode($MM, $Xq = true)
    {
        if ($MM instanceof XMLSecurityKey) {
            goto bC3;
        }
        throw new Exception("\x49\156\166\141\x6c\x69\144\40\113\145\171");
        bC3:
        $gE = $this->getCipherValue();
        if ($gE) {
            goto f0j;
        }
        throw new Exception("\103\141\x6e\x6e\x6f\164\x20\154\157\x63\141\164\145\40\x65\x6e\x63\x72\171\160\x74\145\144\40\x64\x61\164\141");
        goto mOi;
        f0j:
        $q4 = $MM->decryptData($gE);
        if ($Xq) {
            goto oQ7;
        }
        return $q4;
        goto Wk3;
        oQ7:
        switch ($this->type) {
            case self::Element:
                $lr = new DOMDocument();
                $lr->loadXML($q4);
                if (!($this->rawNode->nodeType == XML_DOCUMENT_NODE)) {
                    goto QX9;
                }
                return $lr;
                QX9:
                $nI = $this->rawNode->ownerDocument->importNode($lr->documentElement, true);
                $this->rawNode->parentNode->replaceChild($nI, $this->rawNode);
                return $nI;
            case self::Content:
                if ($this->rawNode->nodeType == XML_DOCUMENT_NODE) {
                    goto n2x;
                }
                $tW = $this->rawNode->ownerDocument;
                goto kxy;
                n2x:
                $tW = $this->rawNode;
                kxy:
                $kj = $tW->createDocumentFragment();
                $kj->appendXML($q4);
                $jA = $this->rawNode->parentNode;
                $jA->replaceChild($kj, $this->rawNode);
                return $jA;
            default:
                return $q4;
        }
        Rzj:
        kwQ:
        Wk3:
        mOi:
    }
    public function encryptKey($Zj, $yP, $UF = true)
    {
        if (!(!$Zj instanceof XMLSecurityKey || !$yP instanceof XMLSecurityKey)) {
            goto QFQ;
        }
        throw new Exception("\x49\156\166\141\x6c\x69\x64\40\x4b\145\171");
        QFQ:
        $v8 = base64_encode($Zj->encryptData($yP->key));
        $wP = $this->encdoc->documentElement;
        $bt = $this->encdoc->createElementNS(self::XMLENCNS, "\170\145\156\x63\72\x45\156\143\x72\171\160\164\145\144\x4b\145\x79");
        if ($UF) {
            goto doC;
        }
        $this->encKey = $bt;
        goto kOF;
        doC:
        $DZ = $wP->insertBefore($this->encdoc->createElementNS("\x68\164\x74\160\72\x2f\x2f\167\167\167\x2e\x77\x33\56\157\x72\x67\57\62\60\60\x30\x2f\x30\71\x2f\170\x6d\154\x64\x73\151\147\x23", "\144\x73\x69\147\72\113\145\x79\111\156\146\157"), $wP->firstChild);
        $DZ->appendChild($bt);
        kOF:
        $iU = $bt->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\x65\156\143\72\x45\x6e\143\162\171\x70\164\x69\157\156\x4d\x65\x74\150\157\144"));
        $iU->setAttribute("\x41\x6c\147\157\162\x69\x74\x68\155", $Zj->getAlgorith());
        if (empty($Zj->name)) {
            goto UBA;
        }
        $DZ = $bt->appendChild($this->encdoc->createElementNS("\x68\164\x74\160\72\57\x2f\167\x77\167\56\x77\x33\56\x6f\x72\147\x2f\62\60\x30\x30\57\60\71\x2f\x78\155\154\x64\163\151\x67\43", "\x64\x73\151\147\72\113\145\x79\111\156\146\157"));
        $DZ->appendChild($this->encdoc->createElementNS("\x68\164\x74\x70\72\x2f\57\167\167\167\56\167\63\56\x6f\162\147\x2f\x32\60\60\60\x2f\60\x39\57\x78\x6d\x6c\x64\x73\151\x67\43", "\x64\x73\151\x67\x3a\113\145\x79\x4e\x61\x6d\x65", $Zj->name));
        UBA:
        $Zh = $bt->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\145\156\143\x3a\103\x69\x70\x68\x65\162\x44\x61\164\x61"));
        $Zh->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\145\156\143\72\103\x69\160\x68\x65\162\126\141\x6c\x75\x65", $v8));
        if (!(is_array($this->references) && count($this->references) > 0)) {
            goto L13;
        }
        $Qp = $bt->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\x78\x65\156\143\72\122\145\x66\x65\162\x65\x6e\x63\x65\x4c\151\x73\x74"));
        foreach ($this->references as $vd => $U7) {
            $WB = $U7["\x72\145\x66\x75\162\x69"];
            $Qd = $Qp->appendChild($this->encdoc->createElementNS(self::XMLENCNS, "\170\x65\x6e\143\72\104\x61\x74\141\x52\145\146\x65\x72\145\156\x63\145"));
            $Qd->setAttribute("\x55\122\111", "\x23" . $WB);
            lqV:
        }
        H7j:
        L13:
        return;
    }
    public function decryptKey($bt)
    {
        if ($bt->isEncrypted) {
            goto jmD;
        }
        throw new Exception("\x4b\x65\171\40\x69\163\40\156\x6f\x74\40\x45\156\143\162\x79\x70\x74\145\x64");
        jmD:
        if (!empty($bt->key)) {
            goto B6G;
        }
        throw new Exception("\x4b\x65\171\x20\151\x73\x20\x6d\151\163\163\151\156\147\40\x64\141\x74\x61\40\164\157\x20\160\x65\162\146\157\162\155\40\x74\x68\x65\40\144\x65\x63\162\x79\160\164\x69\x6f\156");
        B6G:
        return $this->decryptNode($bt, false);
    }
    public function locateEncryptedData($WC)
    {
        if ($WC instanceof DOMDocument) {
            goto IaH;
        }
        $tW = $WC->ownerDocument;
        goto daQ;
        IaH:
        $tW = $WC;
        daQ:
        if (!$tW) {
            goto lmB;
        }
        $w5 = new DOMXPath($tW);
        $C8 = "\57\57\x2a\x5b\x6c\x6f\x63\x61\x6c\x2d\156\x61\155\145\x28\x29\75\x27\x45\156\143\162\171\x70\x74\x65\144\104\x61\x74\x61\x27\x20\x61\156\144\40\x6e\141\155\x65\163\160\x61\x63\x65\x2d\x75\x72\x69\50\51\x3d\47" . self::XMLENCNS . "\x27\135";
        $B_ = $w5->query($C8);
        return $B_->item(0);
        lmB:
        return null;
    }
    public function locateKey($pu = null)
    {
        if (!empty($pu)) {
            goto Sp9;
        }
        $pu = $this->rawNode;
        Sp9:
        if ($pu instanceof DOMNode) {
            goto si2;
        }
        return null;
        si2:
        if (!($tW = $pu->ownerDocument)) {
            goto wiV;
        }
        $w5 = new DOMXPath($tW);
        $w5->registerNamespace("\170\x6d\154\x73\145\143\145\x6e\143", self::XMLENCNS);
        $C8 = "\x2e\x2f\57\x78\x6d\154\x73\x65\143\x65\x6e\143\x3a\x45\156\x63\162\171\x70\164\x69\x6f\156\x4d\145\x74\150\157\x64";
        $B_ = $w5->query($C8, $pu);
        if (!($B1 = $B_->item(0))) {
            goto UGi;
        }
        $DY = $B1->getAttribute("\x41\154\x67\x6f\x72\x69\164\x68\x6d");
        try {
            $MM = new XMLSecurityKey($DY, array("\x74\x79\x70\145" => "\x70\162\151\x76\x61\x74\x65"));
        } catch (Exception $xr) {
            return null;
        }
        return $MM;
        UGi:
        wiV:
        return null;
    }
    public static function staticLocateKeyInfo($zu = null, $pu = null)
    {
        if (!(empty($pu) || !$pu instanceof DOMNode)) {
            goto puJ;
        }
        return null;
        puJ:
        $tW = $pu->ownerDocument;
        if ($tW) {
            goto hXZ;
        }
        return null;
        hXZ:
        $w5 = new DOMXPath($tW);
        $w5->registerNamespace("\170\155\x6c\x73\145\143\145\156\x63", self::XMLENCNS);
        $w5->registerNamespace("\x78\x6d\x6c\163\x65\x63\144\163\x69\x67", XMLSecurityDSig::XMLDSIGNS);
        $C8 = "\56\x2f\170\x6d\x6c\x73\145\x63\144\163\x69\147\x3a\x4b\145\171\111\156\x66\157";
        $B_ = $w5->query($C8, $pu);
        $B1 = $B_->item(0);
        if ($B1) {
            goto O6T;
        }
        return $zu;
        O6T:
        foreach ($B1->childNodes as $M1) {
            switch ($M1->localName) {
                case "\x4b\x65\x79\116\x61\x6d\145":
                    if (empty($zu)) {
                        goto cPV;
                    }
                    $zu->name = $M1->nodeValue;
                    cPV:
                    goto ZA6;
                case "\x4b\145\x79\126\x61\154\x75\145":
                    foreach ($M1->childNodes as $qX) {
                        switch ($qX->localName) {
                            case "\104\123\x41\113\x65\171\x56\141\154\x75\145":
                                throw new Exception("\x44\x53\101\113\145\x79\x56\x61\154\165\145\x20\x63\x75\162\162\x65\156\x74\x6c\x79\x20\156\x6f\x74\40\163\x75\160\x70\157\162\164\145\144");
                            case "\122\123\x41\x4b\x65\171\126\141\154\165\x65":
                                $pO = null;
                                $Zx = null;
                                if (!($Ff = $qX->getElementsByTagName("\115\157\x64\165\x6c\x75\x73")->item(0))) {
                                    goto w7p;
                                }
                                $pO = base64_decode($Ff->nodeValue);
                                w7p:
                                if (!($pB = $qX->getElementsByTagName("\x45\x78\x70\x6f\156\145\156\x74")->item(0))) {
                                    goto Nvc;
                                }
                                $Zx = base64_decode($pB->nodeValue);
                                Nvc:
                                if (!(empty($pO) || empty($Zx))) {
                                    goto oQz;
                                }
                                throw new Exception("\115\x69\163\163\151\x6e\147\x20\115\x6f\x64\165\154\x75\x73\x20\157\162\x20\105\170\160\x6f\x6e\145\156\x74");
                                oQz:
                                $qu = XMLSecurityKey::convertRSA($pO, $Zx);
                                $zu->loadKey($qu);
                                goto J2D;
                        }
                        VcD:
                        J2D:
                        VGj:
                    }
                    YEg:
                    goto ZA6;
                case "\x52\145\x74\x72\151\x65\166\141\154\x4d\145\x74\150\x6f\x64":
                    $rj = $M1->getAttribute("\124\x79\160\145");
                    if (!($rj !== "\x68\x74\x74\160\72\x2f\57\167\x77\167\56\167\x33\x2e\157\x72\x67\57\62\x30\x30\x31\x2f\x30\x34\x2f\170\155\154\x65\156\x63\43\105\156\143\162\171\x70\164\x65\x64\x4b\x65\x79")) {
                        goto wiO;
                    }
                    goto ZA6;
                    wiO:
                    $sV = $M1->getAttribute("\x55\x52\111");
                    if (!($sV[0] !== "\x23")) {
                        goto MfZ;
                    }
                    goto ZA6;
                    MfZ:
                    $am = substr($sV, 1);
                    $C8 = "\57\x2f\170\x6d\x6c\x73\145\143\145\156\x63\72\x45\156\143\162\171\160\x74\x65\x64\113\x65\171\x5b\x40\111\x64\75\42" . XPath::filterAttrValue($am, XPath::DOUBLE_QUOTE) . "\x22\x5d";
                    $iv = $w5->query($C8)->item(0);
                    if ($iv) {
                        goto n2z;
                    }
                    throw new Exception("\125\x6e\141\142\x6c\145\x20\x74\157\40\x6c\x6f\x63\141\164\x65\x20\x45\156\x63\162\171\160\164\x65\144\113\145\171\40\167\151\x74\x68\40\100\111\x64\x3d\47{$am}\47\x2e");
                    n2z:
                    return XMLSecurityKey::fromEncryptedKeyElement($iv);
                case "\105\x6e\x63\162\x79\160\164\145\144\113\x65\x79":
                    return XMLSecurityKey::fromEncryptedKeyElement($M1);
                case "\x58\x35\60\71\104\x61\164\141":
                    if (!($k_ = $M1->getElementsByTagName("\130\65\60\x39\x43\x65\162\x74\151\146\x69\143\141\x74\x65"))) {
                        goto Ini;
                    }
                    if (!($k_->length > 0)) {
                        goto RBv;
                    }
                    $yp = $k_->item(0)->textContent;
                    $yp = str_replace(array("\15", "\xa", "\40"), '', $yp);
                    $yp = "\x2d\55\55\x2d\55\102\105\107\x49\x4e\40\x43\105\122\124\111\x46\x49\103\x41\x54\x45\55\55\55\x2d\x2d\xa" . chunk_split($yp, 64, "\xa") . "\55\x2d\x2d\x2d\55\105\116\x44\x20\103\105\122\x54\111\x46\x49\103\101\x54\105\x2d\x2d\55\55\55\xa";
                    $zu->loadKey($yp, false, true);
                    RBv:
                    Ini:
                    goto ZA6;
            }
            RSt:
            ZA6:
            wT8:
        }
        Ogb:
        return $zu;
    }
    public function locateKeyInfo($zu = null, $pu = null)
    {
        if (!empty($pu)) {
            goto TR3;
        }
        $pu = $this->rawNode;
        TR3:
        return self::staticLocateKeyInfo($zu, $pu);
    }
}
