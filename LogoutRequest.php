<?php


include_once "\125\x74\151\154\x69\x74\151\145\x73\56\160\x68\x70";
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
    public function __construct(DOMElement $vw = NULL)
    {
        $this->tagName = "\114\157\x67\x6f\165\164\122\x65\161\x75\145\163\164";
        $this->id = SAMLSPUtilities::generateID();
        $this->issueInstant = time();
        $this->certificates = array();
        $this->validators = array();
        if (!($vw === NULL)) {
            goto XG;
        }
        return;
        XG:
        if ($vw->hasAttribute("\x49\104")) {
            goto Fa;
        }
        throw new Exception("\x4d\151\x73\x73\151\156\147\40\x49\x44\40\x61\164\x74\162\151\142\x75\x74\x65\40\x6f\x6e\x20\x53\x41\115\x4c\x20\155\x65\x73\x73\141\x67\x65\56");
        Fa:
        $this->id = $vw->getAttribute("\x49\x44");
        if (!($vw->getAttribute("\x56\145\162\163\151\157\156") !== "\62\56\x30")) {
            goto zV;
        }
        throw new Exception("\125\x6e\163\x75\160\160\157\x72\164\145\x64\40\166\145\x72\163\151\x6f\x6e\x3a\40" . $vw->getAttribute("\126\x65\162\x73\x69\157\156"));
        zV:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($vw->getAttribute("\x49\x73\x73\x75\x65\111\156\x73\164\x61\x6e\164"));
        if (!$vw->hasAttribute("\104\145\163\164\x69\156\x61\x74\151\x6f\x6e")) {
            goto lR;
        }
        $this->destination = $vw->getAttribute("\x44\x65\163\164\151\x6e\x61\x74\151\157\156");
        lR:
        $Ja = SAMLSPUtilities::xpQuery($vw, "\56\57\163\x61\155\x6c\137\x61\163\x73\145\x72\x74\x69\x6f\x6e\x3a\111\163\x73\165\x65\162");
        if (empty($Ja)) {
            goto va;
        }
        $this->issuer = trim($Ja[0]->textContent);
        va:
        try {
            $Yd = SAMLSPUtilities::validateElement($vw);
            if (!($Yd !== FALSE)) {
                goto yq;
            }
            $this->certificates = $Yd["\x43\145\x72\164\x69\x66\x69\143\x61\x74\x65\x73"];
            $this->validators[] = array("\106\165\156\143\164\x69\x6f\x6e" => array("\x55\x74\151\x6c\151\x74\x69\145\x73", "\x76\141\154\x69\144\x61\x74\x65\123\x69\x67\x6e\141\x74\x75\162\145"), "\104\141\164\141" => $Yd);
            yq:
        } catch (Exception $El) {
        }
        $this->sessionIndexes = array();
        if (!$vw->hasAttribute("\x4e\157\x74\117\156\117\162\x41\146\x74\x65\x72")) {
            goto ez;
        }
        $this->notOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($vw->getAttribute("\x4e\x6f\164\117\156\117\x72\101\x66\164\145\x72"));
        ez:
        $RM = SAMLSPUtilities::xpQuery($vw, "\56\x2f\x73\x61\x6d\154\137\141\x73\163\x65\162\x74\x69\x6f\156\x3a\116\141\x6d\145\111\x44\40\x7c\x20\56\x2f\163\x61\155\x6c\x5f\141\x73\163\145\162\164\151\157\x6e\72\105\156\x63\x72\171\x70\x74\145\144\111\104\57\x78\145\x6e\x63\72\x45\x6e\143\x72\x79\160\x74\x65\x64\x44\141\164\141");
        if (empty($RM)) {
            goto WL;
        }
        if (count($RM) > 1) {
            goto Kb;
        }
        goto JC;
        WL:
        throw new Exception("\x4d\151\163\x73\x69\x6e\x67\40\x3c\x73\x61\x6d\154\x3a\116\x61\x6d\145\x49\x44\x3e\40\157\162\x20\x3c\x73\141\155\x6c\x3a\x45\x6e\x63\x72\171\x70\x74\145\x64\x49\x44\76\x20\151\x6e\40\74\163\x61\155\x6c\x70\72\114\x6f\147\157\165\x74\122\145\161\x75\x65\163\x74\76\56");
        goto JC;
        Kb:
        throw new Exception("\x4d\157\162\x65\x20\164\150\x61\156\40\x6f\156\x65\x20\x3c\x73\x61\155\x6c\72\116\x61\x6d\x65\111\x44\76\x20\x6f\x72\40\x3c\163\x61\155\x6c\72\x45\156\143\x72\171\x70\x74\x65\x64\104\x3e\x20\x69\x6e\x20\x3c\163\x61\155\x6c\160\72\x4c\x6f\147\157\165\x74\x52\145\x71\165\x65\163\164\x3e\56");
        JC:
        $RM = $RM[0];
        if ($RM->localName === "\105\156\143\x72\171\x70\164\145\x64\x44\x61\164\x61") {
            goto QS;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($RM);
        goto WE;
        QS:
        $this->encryptedNameId = $RM;
        WE:
        $nn = SAMLSPUtilities::xpQuery($vw, "\56\x2f\x73\x61\155\x6c\137\x70\162\x6f\164\x6f\x63\x6f\x6c\x3a\x53\145\163\x73\151\x6f\x6e\111\156\x64\145\170");
        foreach ($nn as $yW) {
            $this->sessionIndexes[] = trim($yW->textContent);
            xT:
        }
        O6:
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($zn)
    {
        $this->notOnOrAfter = $zn;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto IS;
        }
        return TRUE;
        IS:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $nz)
    {
        $oL = new DOMDocument();
        $KQ = $oL->createElement("\x72\x6f\157\164");
        $oL->appendChild($KQ);
        SAML2_Utils::addNameId($KQ, $this->nameId);
        $RM = $KQ->firstChild;
        SAML2_Utils::getContainer()->debugMessage($RM, "\145\156\143\162\x79\160\x74");
        $Ds = new XMLSecEnc();
        $Ds->setNode($RM);
        $Ds->type = XMLSecEnc::Element;
        $Rk = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $Rk->generateSessionKey();
        $Ds->encryptKey($nz, $Rk);
        $this->encryptedNameId = $Ds->encryptNode($Rk);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $nz, array $hO = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto CM;
        }
        return;
        CM:
        $RM = SAML2_Utils::decryptElement($this->encryptedNameId, $nz, $hO);
        SAML2_Utils::getContainer()->debugMessage($RM, "\x64\x65\x63\162\171\x70\164");
        $this->nameId = SAML2_Utils::parseNameId($RM);
        $this->encryptedNameId = NULL;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto Dq;
        }
        throw new Exception("\101\164\164\145\x6d\x70\164\x65\x64\x20\164\x6f\x20\162\145\x74\162\x69\x65\x76\145\40\145\156\x63\162\171\160\164\x65\144\x20\x4e\x61\155\x65\x49\x44\40\167\x69\164\x68\157\165\164\40\x64\145\x63\x72\x79\160\164\151\156\x67\40\x69\x74\40\146\151\162\163\x74\x2e");
        Dq:
        return $this->nameId;
    }
    public function setNameId($RM)
    {
        $this->nameId = $RM;
    }
    public function getSessionIndexes()
    {
        return $this->sessionIndexes;
    }
    public function setSessionIndexes(array $nn)
    {
        $this->sessionIndexes = $nn;
    }
    public function getSessionIndex()
    {
        if (!empty($this->sessionIndexes)) {
            goto Wz;
        }
        return NULL;
        Wz:
        return $this->sessionIndexes[0];
    }
    public function setSessionIndex($yW)
    {
        if (is_null($yW)) {
            goto gU;
        }
        $this->sessionIndexes = array($yW);
        goto mL;
        gU:
        $this->sessionIndexes = array();
        mL:
    }
    public function toUnsignedXML()
    {
        $KQ = parent::toUnsignedXML();
        if (!($this->notOnOrAfter !== NULL)) {
            goto K2;
        }
        $KQ->setAttribute("\x4e\157\164\117\156\117\x72\x41\x66\x74\145\x72", gmdate("\131\x2d\x6d\55\x64\x5c\x54\110\x3a\151\72\163\134\x5a", $this->notOnOrAfter));
        K2:
        if ($this->encryptedNameId === NULL) {
            goto S9;
        }
        $fU = $KQ->ownerDocument->createElementNS(SAML2_Const::NS_SAML, "\x73\141\155\154\72" . "\105\x6e\143\162\171\x70\x74\145\x64\x49\x44");
        $KQ->appendChild($fU);
        $fU->appendChild($KQ->ownerDocument->importNode($this->encryptedNameId, TRUE));
        goto XP;
        S9:
        SAML2_Utils::addNameId($KQ, $this->nameId);
        XP:
        foreach ($this->sessionIndexes as $yW) {
            SAML2_Utils::addString($KQ, SAML2_Const::NS_SAMLP, "\123\145\x73\163\151\157\156\x49\156\x64\x65\170", $yW);
            IR:
        }
        p0:
        return $KQ;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($o1)
    {
        $this->id = $o1;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($J3)
    {
        $this->issueInstant = $J3;
    }
    public function getDestination()
    {
        return $this->destination;
    }
    public function setDestination($NE)
    {
        $this->destination = $NE;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($Ja)
    {
        $this->issuer = $Ja;
    }
}
