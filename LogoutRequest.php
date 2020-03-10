<?php


include_once "\x55\164\x69\154\151\164\x69\145\x73\x2e\x70\x68\x70";
include_once "\170\x6d\154\x73\145\x63\x6c\151\x62\x73\56\x70\x68\160";
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
    public function __construct(DOMElement $Ip = NULL)
    {
        $this->tagName = "\x4c\157\147\157\x75\x74\122\x65\161\x75\145\x73\x74";
        $this->id = SAMLSPUtilities::generateID();
        $this->issueInstant = time();
        $this->certificates = array();
        $this->validators = array();
        if (!($Ip === NULL)) {
            goto tE;
        }
        return;
        tE:
        if ($Ip->hasAttribute("\111\104")) {
            goto O0;
        }
        throw new Exception("\x4d\151\x73\163\151\x6e\x67\40\x49\x44\40\141\164\x74\162\151\142\165\x74\145\40\157\x6e\x20\x53\x41\115\114\x20\x6d\145\x73\163\x61\147\x65\56");
        O0:
        $this->id = $Ip->getAttribute("\111\x44");
        if (!($Ip->getAttribute("\126\x65\x72\x73\151\x6f\x6e") !== "\62\56\60")) {
            goto XP;
        }
        throw new Exception("\125\x6e\163\x75\160\x70\157\162\x74\145\144\40\x76\x65\x72\x73\x69\157\156\72\x20" . $Ip->getAttribute("\x56\x65\162\163\x69\157\156"));
        XP:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($Ip->getAttribute("\111\163\163\165\145\x49\156\x73\x74\x61\156\164"));
        if (!$Ip->hasAttribute("\104\x65\163\x74\151\x6e\x61\164\x69\x6f\x6e")) {
            goto y_;
        }
        $this->destination = $Ip->getAttribute("\104\145\163\x74\151\156\x61\x74\151\x6f\156");
        y_:
        $Z6 = SAMLSPUtilities::xpQuery($Ip, "\x2e\x2f\163\x61\x6d\x6c\x5f\141\163\x73\x65\162\164\151\x6f\156\72\111\x73\x73\165\x65\162");
        if (empty($Z6)) {
            goto qe;
        }
        $this->issuer = trim($Z6[0]->textContent);
        qe:
        try {
            $qb = SAMLSPUtilities::validateElement($Ip);
            if (!($qb !== FALSE)) {
                goto il;
            }
            $this->certificates = $qb["\x43\145\162\164\x69\146\x69\x63\141\164\145\x73"];
            $this->validators[] = array("\106\165\156\x63\x74\x69\157\x6e" => array("\125\x74\151\x6c\x69\164\x69\x65\163", "\166\141\154\x69\144\x61\164\x65\123\x69\x67\156\141\x74\x75\162\145"), "\104\141\164\x61" => $qb);
            il:
        } catch (Exception $sL) {
        }
        $this->sessionIndexes = array();
        if (!$Ip->hasAttribute("\116\157\164\x4f\x6e\x4f\x72\101\146\x74\145\162")) {
            goto jp;
        }
        $this->notOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($Ip->getAttribute("\116\157\x74\x4f\x6e\117\x72\x41\146\x74\145\162"));
        jp:
        $HI = SAMLSPUtilities::xpQuery($Ip, "\x2e\x2f\163\x61\155\154\x5f\141\163\x73\145\x72\x74\151\x6f\156\72\x4e\x61\155\145\x49\104\40\174\x20\x2e\57\163\x61\x6d\154\137\x61\x73\x73\145\x72\x74\x69\157\156\x3a\105\x6e\x63\x72\171\160\164\145\144\111\x44\57\170\x65\156\143\72\x45\x6e\x63\162\171\160\164\145\x64\x44\x61\x74\141");
        if (empty($HI)) {
            goto sL;
        }
        if (count($HI) > 1) {
            goto Ym;
        }
        goto wA;
        sL:
        throw new Exception("\x4d\x69\x73\x73\x69\156\x67\40\x3c\163\x61\x6d\154\72\x4e\141\155\145\111\104\76\40\157\x72\x20\x3c\163\x61\155\154\72\105\156\143\x72\x79\x70\164\x65\x64\111\104\x3e\40\x69\156\x20\x3c\163\x61\155\x6c\x70\x3a\x4c\x6f\147\157\165\x74\122\145\x71\x75\x65\163\164\x3e\x2e");
        goto wA;
        Ym:
        throw new Exception("\115\157\162\x65\40\x74\150\x61\x6e\40\x6f\156\x65\40\x3c\163\x61\x6d\x6c\x3a\116\x61\x6d\x65\x49\x44\x3e\x20\157\x72\40\74\163\141\155\154\x3a\x45\x6e\143\162\x79\x70\164\145\x64\x44\x3e\40\x69\x6e\x20\74\163\x61\x6d\154\160\x3a\x4c\x6f\x67\157\165\164\x52\x65\161\x75\x65\163\x74\76\x2e");
        wA:
        $HI = $HI[0];
        if ($HI->localName === "\x45\156\x63\x72\x79\x70\164\x65\x64\104\x61\x74\141") {
            goto we;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($HI);
        goto Dh;
        we:
        $this->encryptedNameId = $HI;
        Dh:
        $Z1 = SAMLSPUtilities::xpQuery($Ip, "\56\x2f\x73\141\x6d\154\137\x70\x72\157\x74\157\x63\157\154\72\x53\145\163\163\151\x6f\x6e\111\x6e\x64\145\x78");
        foreach ($Z1 as $bP) {
            $this->sessionIndexes[] = trim($bP->textContent);
            U2:
        }
        n8:
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($zl)
    {
        $this->notOnOrAfter = $zl;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto Cp;
        }
        return TRUE;
        Cp:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $k3)
    {
        $pf = new DOMDocument();
        $P2 = $pf->createElement("\162\157\x6f\x74");
        $pf->appendChild($P2);
        SAML2_Utils::addNameId($P2, $this->nameId);
        $HI = $P2->firstChild;
        SAML2_Utils::getContainer()->debugMessage($HI, "\x65\x6e\x63\162\x79\160\x74");
        $fq = new XMLSecEnc();
        $fq->setNode($HI);
        $fq->type = XMLSecEnc::Element;
        $lH = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $lH->generateSessionKey();
        $fq->encryptKey($k3, $lH);
        $this->encryptedNameId = $fq->encryptNode($lH);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $k3, array $tH = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto p1;
        }
        return;
        p1:
        $HI = SAML2_Utils::decryptElement($this->encryptedNameId, $k3, $tH);
        SAML2_Utils::getContainer()->debugMessage($HI, "\144\x65\143\x72\x79\x70\x74");
        $this->nameId = SAML2_Utils::parseNameId($HI);
        $this->encryptedNameId = NULL;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto MX;
        }
        throw new Exception("\101\164\164\145\155\160\164\145\x64\40\164\x6f\40\162\x65\x74\162\151\x65\x76\x65\40\x65\156\143\x72\x79\160\164\x65\x64\40\116\x61\155\x65\x49\x44\x20\x77\x69\x74\150\157\165\x74\40\x64\x65\x63\162\x79\x70\x74\x69\156\147\x20\x69\164\40\x66\151\x72\x73\164\x2e");
        MX:
        return $this->nameId;
    }
    public function setNameId($HI)
    {
        $this->nameId = $HI;
    }
    public function getSessionIndexes()
    {
        return $this->sessionIndexes;
    }
    public function setSessionIndexes(array $Z1)
    {
        $this->sessionIndexes = $Z1;
    }
    public function getSessionIndex()
    {
        if (!empty($this->sessionIndexes)) {
            goto Qr;
        }
        return NULL;
        Qr:
        return $this->sessionIndexes[0];
    }
    public function setSessionIndex($bP)
    {
        if (is_null($bP)) {
            goto Hb;
        }
        $this->sessionIndexes = array($bP);
        goto Mx;
        Hb:
        $this->sessionIndexes = array();
        Mx:
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($zy)
    {
        $this->id = $zy;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($aS)
    {
        $this->issueInstant = $aS;
    }
    public function getDestination()
    {
        return $this->destination;
    }
    public function setDestination($ch)
    {
        $this->destination = $ch;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($Z6)
    {
        $this->issuer = $Z6;
    }
}
