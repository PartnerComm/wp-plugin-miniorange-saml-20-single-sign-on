<?php


include_once "\125\x74\151\154\151\164\x69\145\x73\56\160\150\x70";
include_once "\x78\x6d\x6c\x73\145\143\154\x69\142\163\x2e\160\x68\160";
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
    public function __construct(DOMElement $wI = NULL)
    {
        $this->tagName = "\114\157\147\x6f\x75\164\x52\x65\161\x75\145\x73\164";
        $this->id = SAMLSPUtilities::generateID();
        $this->issueInstant = time();
        $this->certificates = array();
        $this->validators = array();
        if (!($wI === NULL)) {
            goto qr;
        }
        return;
        qr:
        if ($wI->hasAttribute("\111\104")) {
            goto v_;
        }
        throw new Exception("\x4d\151\x73\163\151\156\x67\x20\111\x44\40\x61\164\x74\x72\x69\x62\165\164\145\x20\x6f\156\x20\x53\101\x4d\x4c\40\x6d\x65\x73\163\x61\147\x65\x2e");
        v_:
        $this->id = $wI->getAttribute("\111\x44");
        if (!($wI->getAttribute("\x56\145\x72\163\x69\157\156") !== "\x32\x2e\60")) {
            goto eR;
        }
        throw new Exception("\125\156\163\165\160\160\157\162\164\145\x64\40\166\x65\162\x73\x69\x6f\156\x3a\40" . $wI->getAttribute("\126\145\x72\163\151\x6f\156"));
        eR:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($wI->getAttribute("\x49\163\163\x75\x65\x49\156\x73\164\x61\x6e\x74"));
        if (!$wI->hasAttribute("\x44\x65\x73\x74\151\156\x61\x74\151\157\156")) {
            goto gB;
        }
        $this->destination = $wI->getAttribute("\104\145\x73\x74\x69\156\141\x74\x69\x6f\x6e");
        gB:
        $rk = SAMLSPUtilities::xpQuery($wI, "\x2e\57\x73\141\x6d\x6c\137\x61\163\x73\145\162\x74\151\x6f\156\72\111\163\163\165\145\x72");
        if (empty($rk)) {
            goto ZT;
        }
        $this->issuer = trim($rk[0]->textContent);
        ZT:
        try {
            $fa = SAMLSPUtilities::validateElement($wI);
            if (!($fa !== FALSE)) {
                goto bl;
            }
            $this->certificates = $fa["\x43\145\x72\x74\151\146\151\x63\x61\164\145\163"];
            $this->validators[] = array("\106\x75\x6e\x63\x74\x69\x6f\156" => array("\125\x74\151\x6c\151\164\151\x65\163", "\166\141\x6c\151\x64\x61\164\145\123\x69\x67\x6e\141\x74\165\162\145"), "\104\x61\164\141" => $fa);
            bl:
        } catch (Exception $F5) {
        }
        $this->sessionIndexes = array();
        if (!$wI->hasAttribute("\x4e\157\164\117\156\117\x72\x41\146\164\x65\x72")) {
            goto Qk;
        }
        $this->notOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($wI->getAttribute("\x4e\157\x74\x4f\x6e\x4f\162\101\x66\x74\145\x72"));
        Qk:
        $vk = SAMLSPUtilities::xpQuery($wI, "\x2e\x2f\x73\x61\155\x6c\x5f\x61\163\x73\x65\162\164\151\x6f\x6e\72\116\141\155\145\x49\x44\x20\174\40\56\57\x73\x61\x6d\x6c\x5f\x61\x73\163\145\162\x74\151\x6f\156\72\105\156\x63\162\171\x70\164\145\x64\x49\104\x2f\170\145\156\143\72\105\x6e\143\162\171\160\164\145\x64\x44\141\164\x61");
        if (empty($vk)) {
            goto Ep;
        }
        if (count($vk) > 1) {
            goto sV;
        }
        goto ls;
        Ep:
        throw new Exception("\115\x69\x73\163\151\156\147\x20\74\x73\141\x6d\154\72\116\141\x6d\145\x49\x44\x3e\x20\x6f\162\x20\x3c\163\x61\x6d\x6c\x3a\x45\156\x63\x72\171\x70\164\x65\144\x49\104\x3e\x20\151\x6e\x20\74\x73\x61\155\x6c\160\72\x4c\x6f\x67\157\165\x74\x52\x65\161\x75\145\x73\x74\x3e\56");
        goto ls;
        sV:
        throw new Exception("\115\157\162\x65\x20\164\x68\x61\156\40\x6f\x6e\145\40\x3c\x73\141\x6d\154\x3a\116\141\x6d\145\x49\x44\76\40\157\x72\40\x3c\x73\x61\155\154\72\x45\156\x63\x72\171\160\x74\x65\144\104\x3e\40\151\x6e\x20\x3c\x73\x61\155\x6c\160\x3a\114\x6f\147\157\165\x74\x52\x65\161\165\x65\x73\x74\x3e\56");
        ls:
        $vk = $vk[0];
        if ($vk->localName === "\x45\x6e\x63\x72\171\x70\164\x65\144\104\x61\x74\x61") {
            goto qi;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($vk);
        goto Gk;
        qi:
        $this->encryptedNameId = $vk;
        Gk:
        $W7 = SAMLSPUtilities::xpQuery($wI, "\56\57\163\141\x6d\154\x5f\x70\x72\x6f\164\157\x63\157\x6c\x3a\x53\145\x73\x73\x69\157\x6e\111\156\x64\145\x78");
        foreach ($W7 as $U2) {
            $this->sessionIndexes[] = trim($U2->textContent);
            yd:
        }
        X9:
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($I3)
    {
        $this->notOnOrAfter = $I3;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto Rh;
        }
        return TRUE;
        Rh:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $U6)
    {
        $Ud = new DOMDocument();
        $gS = $Ud->createElement("\162\x6f\157\164");
        $Ud->appendChild($gS);
        SAML2_Utils::addNameId($gS, $this->nameId);
        $vk = $gS->firstChild;
        SAML2_Utils::getContainer()->debugMessage($vk, "\145\x6e\143\162\x79\x70\x74");
        $vv = new XMLSecEnc();
        $vv->setNode($vk);
        $vv->type = XMLSecEnc::Element;
        $Bt = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $Bt->generateSessionKey();
        $vv->encryptKey($U6, $Bt);
        $this->encryptedNameId = $vv->encryptNode($Bt);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $U6, array $XR = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto P7;
        }
        return;
        P7:
        $vk = SAML2_Utils::decryptElement($this->encryptedNameId, $U6, $XR);
        SAML2_Utils::getContainer()->debugMessage($vk, "\x64\x65\x63\162\171\x70\x74");
        $this->nameId = SAML2_Utils::parseNameId($vk);
        $this->encryptedNameId = NULL;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto Hc;
        }
        throw new Exception("\x41\x74\164\x65\x6d\160\164\x65\x64\x20\x74\x6f\40\162\x65\x74\162\x69\145\x76\145\x20\145\x6e\x63\x72\x79\160\164\x65\x64\x20\116\141\155\145\x49\104\40\x77\151\164\x68\x6f\165\x74\x20\144\x65\x63\162\171\x70\164\151\156\147\x20\151\x74\x20\146\x69\x72\163\164\x2e");
        Hc:
        return $this->nameId;
    }
    public function setNameId($vk)
    {
        $this->nameId = $vk;
    }
    public function getSessionIndexes()
    {
        return $this->sessionIndexes;
    }
    public function setSessionIndexes(array $W7)
    {
        $this->sessionIndexes = $W7;
    }
    public function getSessionIndex()
    {
        if (!empty($this->sessionIndexes)) {
            goto Er;
        }
        return NULL;
        Er:
        return $this->sessionIndexes[0];
    }
    public function setSessionIndex($U2)
    {
        if (is_null($U2)) {
            goto d1;
        }
        $this->sessionIndexes = array($U2);
        goto Tp;
        d1:
        $this->sessionIndexes = array();
        Tp:
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($Sy)
    {
        $this->id = $Sy;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($Oz)
    {
        $this->issueInstant = $Oz;
    }
    public function getDestination()
    {
        return $this->destination;
    }
    public function setDestination($P9)
    {
        $this->destination = $P9;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($rk)
    {
        $this->issuer = $rk;
    }
}
