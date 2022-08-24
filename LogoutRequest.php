<?php


include_once "\125\x74\x69\154\x69\x74\x69\x65\163\56\x70\150\x70";
include_once "\x78\x6d\154\x73\x65\143\x6c\151\142\163\x2e\x70\x68\x70";
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
    public function __construct(DOMElement $rS = NULL)
    {
        $this->tagName = "\x4c\x6f\147\x6f\x75\x74\x52\145\x71\165\145\x73\164";
        $this->id = SAMLSPUtilities::generateID();
        $this->issueInstant = time();
        $this->certificates = array();
        $this->validators = array();
        if (!($rS === NULL)) {
            goto T8;
        }
        return;
        T8:
        if ($rS->hasAttribute("\111\104")) {
            goto y_;
        }
        throw new Exception("\115\x69\x73\163\x69\156\147\x20\111\104\40\x61\x74\x74\x72\151\142\165\x74\145\x20\x6f\156\40\x53\x41\x4d\x4c\x20\155\x65\x73\163\141\x67\145\x2e");
        y_:
        $this->id = $rS->getAttribute("\x49\x44");
        if (!($rS->getAttribute("\126\145\x72\163\x69\x6f\x6e") !== "\x32\x2e\60")) {
            goto fl;
        }
        throw new Exception("\x55\156\x73\x75\160\160\x6f\x72\164\x65\144\x20\x76\145\x72\163\151\157\x6e\x3a\x20" . $rS->getAttribute("\x56\145\x72\x73\151\157\156"));
        fl:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($rS->getAttribute("\x49\x73\163\165\x65\x49\x6e\x73\164\141\x6e\164"));
        if (!$rS->hasAttribute("\104\145\163\164\151\156\141\x74\151\x6f\156")) {
            goto Bx;
        }
        $this->destination = $rS->getAttribute("\x44\x65\163\x74\x69\156\x61\x74\151\157\x6e");
        Bx:
        $gu = SAMLSPUtilities::xpQuery($rS, "\x2e\57\163\141\155\x6c\x5f\x61\x73\163\145\162\164\151\x6f\156\72\x49\x73\163\165\145\x72");
        if (empty($gu)) {
            goto tM;
        }
        $this->issuer = trim($gu[0]->textContent);
        tM:
        try {
            $le = SAMLSPUtilities::validateElement($rS);
            if (!($le !== FALSE)) {
                goto nA;
            }
            $this->certificates = $le["\x43\145\162\x74\x69\x66\x69\x63\141\x74\145\x73"];
            $this->validators[] = array("\x46\165\156\x63\x74\x69\157\156" => array("\x55\164\x69\x6c\151\x74\x69\x65\163", "\x76\141\x6c\x69\x64\x61\x74\x65\123\151\x67\156\x61\164\x75\162\145"), "\x44\141\x74\x61" => $le);
            nA:
        } catch (Exception $Tr) {
        }
        $this->sessionIndexes = array();
        if (!$rS->hasAttribute("\x4e\x6f\x74\x4f\x6e\117\162\101\x66\x74\x65\162")) {
            goto be;
        }
        $this->notOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($rS->getAttribute("\x4e\x6f\164\x4f\156\117\x72\101\x66\x74\145\x72"));
        be:
        $vQ = SAMLSPUtilities::xpQuery($rS, "\56\x2f\x73\x61\155\154\137\x61\163\x73\145\x72\164\x69\x6f\156\72\116\141\155\x65\111\x44\x20\174\x20\x2e\x2f\x73\141\155\154\137\141\163\163\145\162\x74\151\x6f\x6e\x3a\x45\156\143\162\171\x70\x74\145\x64\x49\104\x2f\170\x65\156\x63\72\105\x6e\x63\x72\171\160\164\145\x64\104\141\x74\x61");
        if (empty($vQ)) {
            goto lV;
        }
        if (count($vQ) > 1) {
            goto rC;
        }
        goto yh;
        lV:
        throw new Exception("\115\x69\163\x73\x69\156\x67\40\x3c\163\141\155\x6c\x3a\116\x61\155\145\x49\x44\x3e\40\x6f\162\x20\74\163\141\x6d\154\72\105\156\x63\x72\x79\160\x74\145\144\111\104\76\40\x69\156\40\74\163\141\x6d\x6c\x70\x3a\114\x6f\147\x6f\165\164\122\145\161\x75\145\x73\x74\x3e\56");
        goto yh;
        rC:
        throw new Exception("\115\x6f\162\145\x20\x74\150\141\x6e\x20\x6f\x6e\x65\x20\x3c\163\141\x6d\154\72\116\x61\155\145\x49\104\x3e\x20\x6f\x72\x20\74\x73\x61\x6d\154\x3a\x45\x6e\x63\x72\171\x70\164\x65\144\x44\x3e\40\151\156\x20\74\163\141\x6d\154\160\x3a\x4c\x6f\x67\157\165\x74\x52\145\x71\165\x65\x73\x74\x3e\56");
        yh:
        $vQ = $vQ[0];
        if ($vQ->localName === "\105\156\x63\162\171\x70\x74\145\144\x44\x61\x74\141") {
            goto s1;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($vQ);
        goto kG;
        s1:
        $this->encryptedNameId = $vQ;
        kG:
        $LP = SAMLSPUtilities::xpQuery($rS, "\x2e\x2f\x73\x61\x6d\154\x5f\x70\162\x6f\164\x6f\x63\x6f\x6c\x3a\123\x65\163\x73\151\x6f\156\111\156\x64\145\170");
        foreach ($LP as $pK) {
            $this->sessionIndexes[] = trim($pK->textContent);
            nI:
        }
        EQ:
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($kq)
    {
        $this->notOnOrAfter = $kq;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto hl;
        }
        return TRUE;
        hl:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $N5)
    {
        $JR = new DOMDocument();
        $vS = $JR->createElement("\x72\x6f\157\x74");
        $JR->appendChild($vS);
        SAML2_Utils::addNameId($vS, $this->nameId);
        $vQ = $vS->firstChild;
        SAML2_Utils::getContainer()->debugMessage($vQ, "\x65\156\143\162\x79\160\x74");
        $zK = new XMLSecEnc();
        $zK->setNode($vQ);
        $zK->type = XMLSecEnc::Element;
        $VM = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $VM->generateSessionKey();
        $zK->encryptKey($N5, $VM);
        $this->encryptedNameId = $zK->encryptNode($VM);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $N5, array $EU = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto jy;
        }
        return;
        jy:
        $vQ = SAML2_Utils::decryptElement($this->encryptedNameId, $N5, $EU);
        SAML2_Utils::getContainer()->debugMessage($vQ, "\x64\145\143\162\x79\160\164");
        $this->nameId = SAML2_Utils::parseNameId($vQ);
        $this->encryptedNameId = NULL;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto Nf;
        }
        throw new Exception("\x41\164\164\145\155\x70\x74\145\x64\40\x74\157\x20\162\x65\164\x72\151\145\x76\145\x20\x65\156\143\x72\x79\160\164\145\x64\x20\116\x61\x6d\x65\x49\x44\40\x77\151\x74\150\157\x75\164\40\144\x65\x63\x72\x79\x70\x74\x69\156\x67\40\151\x74\40\x66\x69\x72\163\x74\x2e");
        Nf:
        return $this->nameId;
    }
    public function setNameId($vQ)
    {
        $this->nameId = $vQ;
    }
    public function getSessionIndexes()
    {
        return $this->sessionIndexes;
    }
    public function setSessionIndexes(array $LP)
    {
        $this->sessionIndexes = $LP;
    }
    public function getSessionIndex()
    {
        if (!empty($this->sessionIndexes)) {
            goto xw;
        }
        return NULL;
        xw:
        return $this->sessionIndexes[0];
    }
    public function setSessionIndex($pK)
    {
        if (is_null($pK)) {
            goto vM;
        }
        $this->sessionIndexes = array($pK);
        goto uA;
        vM:
        $this->sessionIndexes = array();
        uA:
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($M0)
    {
        $this->id = $M0;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($Ul)
    {
        $this->issueInstant = $Ul;
    }
    public function getDestination()
    {
        return $this->destination;
    }
    public function setDestination($uZ)
    {
        $this->destination = $uZ;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($gu)
    {
        $this->issuer = $gu;
    }
}
