<?php


include_once "\125\x74\x69\154\x69\164\151\145\x73\x2e\x70\x68\x70";
include_once "\170\x6d\x6c\x73\145\143\x6c\x69\x62\x73\56\160\150\160";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
class SAML2SPLogoutRequest
{
    private $tagName;
    private $id;
    private $issuer;
    private $destination;
    private $issueInstant;
    private $certificates;
    private $validators;
    private $notOnOrAfter;
    private $encryptedNameId;
    private $nameId;
    private $sessionIndexes;
    public function __construct(DOMElement $aX = NULL)
    {
        $this->tagName = "\x4c\x6f\x67\157\165\x74\122\145\161\x75\145\163\x74";
        $this->id = SAMLSPUtilities::generateID();
        $this->issueInstant = time();
        $this->certificates = array();
        $this->validators = array();
        if (!($aX === NULL)) {
            goto VO;
        }
        return;
        VO:
        if ($aX->hasAttribute("\x49\x44")) {
            goto oJ;
        }
        throw new Exception("\x4d\x69\x73\x73\x69\x6e\x67\40\x49\x44\40\141\x74\x74\x72\x69\142\165\x74\x65\40\x6f\x6e\40\x53\101\x4d\x4c\40\x6d\145\163\x73\141\147\x65\56");
        oJ:
        $this->id = $aX->getAttribute("\x49\104");
        if (!($aX->getAttribute("\x56\145\162\x73\151\157\x6e") !== "\x32\56\60")) {
            goto lO;
        }
        throw new Exception("\125\156\163\x75\x70\x70\157\x72\164\145\144\40\x76\x65\162\x73\151\x6f\x6e\x3a\40" . $aX->getAttribute("\126\x65\162\x73\x69\x6f\x6e"));
        lO:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($aX->getAttribute("\x49\163\163\165\x65\111\156\163\x74\x61\x6e\x74"));
        if (!$aX->hasAttribute("\104\x65\163\164\151\156\x61\x74\x69\x6f\x6e")) {
            goto y1;
        }
        $this->destination = $aX->getAttribute("\104\x65\x73\x74\151\156\x61\x74\x69\157\x6e");
        y1:
        $Vs = SAMLSPUtilities::xpQuery($aX, "\56\x2f\x73\x61\155\x6c\x5f\141\x73\x73\145\x72\x74\x69\x6f\x6e\72\111\163\163\x75\x65\162");
        if (empty($Vs)) {
            goto iy;
        }
        $this->issuer = trim($Vs[0]->textContent);
        iy:
        try {
            $lf = SAMLSPUtilities::validateElement($aX);
            if (!($lf !== FALSE)) {
                goto oS;
            }
            $this->certificates = $lf["\103\x65\x72\x74\151\x66\151\x63\141\164\145\x73"];
            $this->validators[] = array("\x46\165\x6e\143\164\151\157\x6e" => array("\125\164\151\154\151\164\x69\145\x73", "\166\x61\154\151\x64\x61\x74\145\x53\x69\x67\156\141\x74\x75\x72\x65"), "\x44\141\164\141" => $lf);
            oS:
        } catch (Exception $XE) {
        }
        $this->sessionIndexes = array();
        if (!$aX->hasAttribute("\116\x6f\164\x4f\156\117\x72\101\146\x74\x65\162")) {
            goto xZ;
        }
        $this->notOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($aX->getAttribute("\116\157\x74\x4f\x6e\x4f\x72\x41\x66\x74\x65\162"));
        xZ:
        $Kt = SAMLSPUtilities::xpQuery($aX, "\x2e\57\x73\x61\155\154\137\141\x73\163\x65\x72\x74\151\157\156\72\116\x61\x6d\145\111\104\x20\x7c\x20\x2e\x2f\x73\141\155\154\137\x61\163\x73\x65\x72\164\151\157\x6e\x3a\105\x6e\x63\162\x79\160\164\145\144\x49\104\57\x78\x65\156\143\72\x45\156\x63\162\171\x70\x74\145\144\x44\141\x74\141");
        if (empty($Kt)) {
            goto KJ;
        }
        if (count($Kt) > 1) {
            goto uh;
        }
        goto Zi;
        KJ:
        throw new Exception("\x4d\151\163\x73\x69\156\x67\40\74\x73\141\x6d\154\x3a\x4e\141\x6d\x65\x49\104\x3e\40\x6f\162\40\x3c\163\x61\x6d\154\72\105\156\143\162\x79\x70\x74\145\144\111\x44\x3e\x20\151\156\40\74\x73\141\155\154\160\72\x4c\x6f\147\157\x75\x74\x52\145\161\165\x65\x73\x74\76\56");
        goto Zi;
        uh:
        throw new Exception("\x4d\157\x72\x65\40\x74\150\141\x6e\x20\157\x6e\145\x20\74\x73\141\155\x6c\x3a\x4e\141\155\x65\x49\104\x3e\40\x6f\x72\x20\x3c\x73\141\x6d\x6c\72\105\x6e\x63\x72\171\160\x74\145\x64\x44\76\x20\151\x6e\40\74\163\141\155\154\x70\72\x4c\157\147\x6f\165\x74\122\145\161\x75\x65\163\x74\76\56");
        Zi:
        $Kt = $Kt[0];
        if ($Kt->localName === "\x45\x6e\x63\x72\171\x70\164\x65\x64\x44\141\x74\x61") {
            goto Cl;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($Kt);
        goto lC;
        Cl:
        $this->encryptedNameId = $Kt;
        lC:
        $O9 = SAMLSPUtilities::xpQuery($aX, "\x2e\x2f\163\x61\x6d\154\137\x70\x72\x6f\x74\157\143\x6f\154\x3a\x53\x65\x73\163\x69\157\156\x49\x6e\144\x65\170");
        foreach ($O9 as $jO) {
            $this->sessionIndexes[] = trim($jO->textContent);
            TT:
        }
        MM:
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($BL)
    {
        $this->notOnOrAfter = $BL;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto L2;
        }
        return TRUE;
        L2:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $ES)
    {
        $R0 = new DOMDocument();
        $z6 = $R0->createElement("\162\157\x6f\x74");
        $R0->appendChild($z6);
        SAML2_Utils::addNameId($z6, $this->nameId);
        $Kt = $z6->firstChild;
        SAML2_Utils::getContainer()->debugMessage($Kt, "\145\x6e\143\x72\x79\160\x74");
        $e0 = new XMLSecEnc();
        $e0->setNode($Kt);
        $e0->type = XMLSecEnc::Element;
        $L0 = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $L0->generateSessionKey();
        $e0->encryptKey($ES, $L0);
        $this->encryptedNameId = $e0->encryptNode($L0);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $ES, array $Bn = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto hE;
        }
        return;
        hE:
        $Kt = SAML2_Utils::decryptElement($this->encryptedNameId, $ES, $Bn);
        SAML2_Utils::getContainer()->debugMessage($Kt, "\144\145\x63\x72\x79\160\x74");
        $this->nameId = SAML2_Utils::parseNameId($Kt);
        $this->encryptedNameId = NULL;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto f2;
        }
        throw new Exception("\101\164\164\145\x6d\x70\x74\145\x64\x20\164\157\40\x72\x65\164\x72\x69\x65\x76\145\x20\x65\x6e\143\162\x79\x70\x74\x65\x64\x20\x4e\141\155\x65\111\104\x20\167\x69\164\x68\x6f\165\164\40\144\145\143\162\x79\x70\x74\151\156\x67\40\x69\x74\40\146\151\x72\163\x74\x2e");
        f2:
        return $this->nameId;
    }
    public function setNameId($Kt)
    {
        $this->nameId = $Kt;
    }
    public function getSessionIndexes()
    {
        return $this->sessionIndexes;
    }
    public function setSessionIndexes(array $O9)
    {
        $this->sessionIndexes = $O9;
    }
    public function getSessionIndex()
    {
        if (!empty($this->sessionIndexes)) {
            goto Ef;
        }
        return NULL;
        Ef:
        return $this->sessionIndexes[0];
    }
    public function setSessionIndex($jO)
    {
        if (is_null($jO)) {
            goto ZK;
        }
        $this->sessionIndexes = array($jO);
        goto Xn;
        ZK:
        $this->sessionIndexes = array();
        Xn:
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($uc)
    {
        $this->id = $uc;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($Rk)
    {
        $this->issueInstant = $Rk;
    }
    public function getDestination()
    {
        return $this->destination;
    }
    public function setDestination($C2)
    {
        $this->destination = $C2;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($Vs)
    {
        $this->issuer = $Vs;
    }
}
