<?php


include_once "\x55\x74\151\154\151\164\151\145\163\x2e\x70\150\160";
include_once "\x78\x6d\154\163\145\x63\x6c\x69\142\163\56\x70\150\x70";
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
    public function __construct(DOMElement $BO = NULL)
    {
        $this->tagName = "\x4c\157\x67\x6f\x75\x74\122\x65\161\165\x65\163\x74";
        $this->id = SAMLSPUtilities::generateID();
        $this->issueInstant = time();
        $this->certificates = array();
        $this->validators = array();
        if (!($BO === NULL)) {
            goto HW;
        }
        return;
        HW:
        if ($BO->hasAttribute("\x49\x44")) {
            goto Qp;
        }
        throw new Exception("\115\151\x73\163\x69\156\147\40\x49\x44\x20\141\164\x74\x72\151\x62\165\164\x65\x20\x6f\x6e\x20\x53\101\115\x4c\40\x6d\x65\163\x73\x61\147\145\x2e");
        Qp:
        $this->id = $BO->getAttribute("\111\104");
        if (!($BO->getAttribute("\126\145\162\163\x69\x6f\x6e") !== "\x32\56\60")) {
            goto nr;
        }
        throw new Exception("\125\156\x73\165\160\x70\157\162\164\145\144\x20\x76\145\162\x73\x69\x6f\156\x3a\40" . $BO->getAttribute("\126\145\x72\x73\151\x6f\x6e"));
        nr:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($BO->getAttribute("\111\163\x73\x75\x65\x49\x6e\x73\x74\x61\x6e\164"));
        if (!$BO->hasAttribute("\x44\145\163\x74\151\156\x61\x74\x69\x6f\x6e")) {
            goto jn;
        }
        $this->destination = $BO->getAttribute("\x44\145\x73\x74\x69\x6e\141\x74\x69\x6f\x6e");
        jn:
        $pY = SAMLSPUtilities::xpQuery($BO, "\x2e\57\163\141\x6d\154\137\141\x73\x73\x65\162\x74\x69\157\156\x3a\x49\x73\x73\165\x65\x72");
        if (empty($pY)) {
            goto Qr;
        }
        $this->issuer = trim($pY[0]->textContent);
        Qr:
        try {
            $XS = SAMLSPUtilities::validateElement($BO);
            if (!($XS !== FALSE)) {
                goto x8;
            }
            $this->certificates = $XS["\x43\x65\x72\164\151\146\151\x63\141\x74\145\x73"];
            $this->validators[] = array("\106\165\x6e\x63\164\x69\x6f\x6e" => array("\125\x74\151\154\151\x74\151\145\163", "\166\141\154\151\144\x61\x74\x65\x53\151\x67\156\x61\x74\165\162\x65"), "\x44\141\164\141" => $XS);
            x8:
        } catch (Exception $xr) {
        }
        $this->sessionIndexes = array();
        if (!$BO->hasAttribute("\116\x6f\x74\117\156\117\x72\101\x66\x74\145\162")) {
            goto HY;
        }
        $this->notOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($BO->getAttribute("\x4e\157\x74\x4f\156\117\x72\x41\x66\164\x65\x72"));
        HY:
        $rB = SAMLSPUtilities::xpQuery($BO, "\x2e\x2f\163\x61\x6d\154\137\x61\163\x73\x65\162\x74\151\x6f\156\x3a\x4e\x61\155\145\x49\x44\40\174\40\x2e\x2f\x73\141\155\x6c\x5f\x61\x73\163\x65\162\164\151\x6f\x6e\72\105\156\x63\162\x79\160\164\145\144\x49\x44\57\x78\145\156\x63\x3a\105\x6e\143\x72\171\x70\164\145\144\x44\x61\164\141");
        if (empty($rB)) {
            goto Re;
        }
        if (count($rB) > 1) {
            goto jj;
        }
        goto gz;
        Re:
        throw new Exception("\x4d\x69\x73\163\x69\x6e\147\40\x3c\163\x61\x6d\x6c\72\x4e\x61\x6d\x65\111\104\x3e\x20\x6f\x72\x20\x3c\x73\x61\155\x6c\x3a\x45\x6e\x63\x72\x79\x70\x74\145\144\111\104\76\40\x69\x6e\x20\x3c\x73\141\x6d\154\x70\72\114\157\147\x6f\165\164\x52\145\161\165\145\163\164\x3e\x2e");
        goto gz;
        jj:
        throw new Exception("\115\157\x72\145\x20\164\150\141\x6e\x20\157\156\x65\40\74\163\141\155\154\x3a\116\x61\155\x65\x49\x44\76\x20\x6f\162\40\74\163\x61\x6d\x6c\72\105\x6e\143\162\x79\160\x74\145\x64\104\x3e\x20\151\x6e\40\x3c\x73\141\x6d\x6c\160\x3a\x4c\157\x67\157\165\x74\122\x65\161\165\x65\x73\164\76\56");
        gz:
        $rB = $rB[0];
        if ($rB->localName === "\x45\x6e\143\x72\x79\x70\x74\x65\144\x44\141\x74\x61") {
            goto DK;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($rB);
        goto Mq;
        DK:
        $this->encryptedNameId = $rB;
        Mq:
        $Jz = SAMLSPUtilities::xpQuery($BO, "\x2e\57\163\x61\x6d\154\137\x70\x72\x6f\164\157\143\x6f\x6c\72\123\145\163\163\x69\x6f\x6e\x49\156\144\x65\x78");
        foreach ($Jz as $jk) {
            $this->sessionIndexes[] = trim($jk->textContent);
            y_:
        }
        Mi:
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($SN)
    {
        $this->notOnOrAfter = $SN;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto W3;
        }
        return TRUE;
        W3:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $Kn)
    {
        $tW = new DOMDocument();
        $wP = $tW->createElement("\162\157\x6f\164");
        $tW->appendChild($wP);
        SAML2_Utils::addNameId($wP, $this->nameId);
        $rB = $wP->firstChild;
        SAML2_Utils::getContainer()->debugMessage($rB, "\x65\x6e\143\x72\x79\x70\164");
        $YO = new XMLSecEnc();
        $YO->setNode($rB);
        $YO->type = XMLSecEnc::Element;
        $A2 = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $A2->generateSessionKey();
        $YO->encryptKey($Kn, $A2);
        $this->encryptedNameId = $YO->encryptNode($A2);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $Kn, array $El = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto n4;
        }
        return;
        n4:
        $rB = SAML2_Utils::decryptElement($this->encryptedNameId, $Kn, $El);
        SAML2_Utils::getContainer()->debugMessage($rB, "\144\145\143\x72\x79\160\164");
        $this->nameId = SAML2_Utils::parseNameId($rB);
        $this->encryptedNameId = NULL;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto gr;
        }
        throw new Exception("\101\164\x74\145\x6d\160\x74\x65\144\x20\164\x6f\x20\x72\x65\164\x72\151\x65\x76\145\40\145\156\x63\x72\x79\160\164\145\144\x20\116\141\x6d\x65\111\x44\x20\x77\151\x74\x68\x6f\x75\x74\40\x64\145\143\x72\x79\x70\164\x69\156\x67\x20\151\164\40\146\151\x72\163\164\x2e");
        gr:
        return $this->nameId;
    }
    public function setNameId($rB)
    {
        $this->nameId = $rB;
    }
    public function getSessionIndexes()
    {
        return $this->sessionIndexes;
    }
    public function setSessionIndexes(array $Jz)
    {
        $this->sessionIndexes = $Jz;
    }
    public function getSessionIndex()
    {
        if (!empty($this->sessionIndexes)) {
            goto WS;
        }
        return NULL;
        WS:
        return $this->sessionIndexes[0];
    }
    public function setSessionIndex($jk)
    {
        if (is_null($jk)) {
            goto a5;
        }
        $this->sessionIndexes = array($jk);
        goto Jp;
        a5:
        $this->sessionIndexes = array();
        Jp:
    }
    public function toUnsignedXML()
    {
        $wP = parent::toUnsignedXML();
        if (!($this->notOnOrAfter !== NULL)) {
            goto du;
        }
        $wP->setAttribute("\x4e\x6f\x74\117\156\117\x72\101\146\164\x65\x72", gmdate("\131\x2d\155\55\x64\134\124\110\x3a\x69\72\x73\x5c\x5a", $this->notOnOrAfter));
        du:
        if ($this->encryptedNameId === NULL) {
            goto Zn;
        }
        $ck = $wP->ownerDocument->createElementNS(SAML2_Const::NS_SAML, "\x73\141\155\154\x3a" . "\x45\156\x63\x72\171\160\x74\x65\144\111\x44");
        $wP->appendChild($ck);
        $ck->appendChild($wP->ownerDocument->importNode($this->encryptedNameId, TRUE));
        goto b5;
        Zn:
        SAML2_Utils::addNameId($wP, $this->nameId);
        b5:
        foreach ($this->sessionIndexes as $jk) {
            SAML2_Utils::addString($wP, SAML2_Const::NS_SAMLP, "\123\x65\163\163\151\x6f\156\111\x6e\144\x65\170", $jk);
            aF:
        }
        ZY:
        return $wP;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($am)
    {
        $this->id = $am;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($V1)
    {
        $this->issueInstant = $V1;
    }
    public function getDestination()
    {
        return $this->destination;
    }
    public function setDestination($Kx)
    {
        $this->destination = $Kx;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($pY)
    {
        $this->issuer = $pY;
    }
}
