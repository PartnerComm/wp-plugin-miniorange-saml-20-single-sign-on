<?php


include_once 'Utilities.php';
include_once 'xmlseclibs.php';
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
    public function __construct(DOMElement $l3 = NULL)
    {
        $this->tagName = "\114\x6f\147\x6f\165\x74\122\x65\x71\x75\x65\x73\x74";
        $this->id = SAMLSPUtilities::generateID();
        $this->issueInstant = time();
        $this->certificates = array();
        $this->validators = array();
        if (!($l3 === NULL)) {
            goto x4;
        }
        return;
        x4:
        if ($l3->hasAttribute("\x49\104")) {
            goto Wp;
        }
        throw new Exception("\115\x69\x73\x73\151\156\x67\x20\111\x44\x20\x61\164\x74\162\151\x62\165\x74\145\x20\157\156\x20\x53\x41\115\114\40\155\145\163\x73\141\x67\145\x2e");
        Wp:
        $this->id = $l3->getAttribute("\111\x44");
        if (!($l3->getAttribute("\x56\x65\x72\163\x69\157\x6e") !== "\62\x2e\x30")) {
            goto F1;
        }
        throw new Exception("\x55\x6e\x73\x75\160\x70\157\162\x74\145\144\40\166\145\x72\x73\x69\157\156\x3a\40" . $l3->getAttribute("\126\145\x72\x73\x69\157\x6e"));
        F1:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($l3->getAttribute("\111\163\163\x75\x65\x49\x6e\x73\164\141\156\x74"));
        if (!$l3->hasAttribute("\104\x65\163\x74\x69\x6e\x61\164\151\x6f\156")) {
            goto FK;
        }
        $this->destination = $l3->getAttribute("\x44\145\x73\x74\x69\x6e\141\x74\151\x6f\156");
        FK:
        $Ai = SAMLSPUtilities::xpQuery($l3, "\x2e\x2f\163\141\x6d\154\x5f\x61\163\163\x65\162\x74\151\157\156\x3a\111\163\x73\165\x65\x72");
        if (empty($Ai)) {
            goto H2;
        }
        $this->issuer = trim($Ai[0]->textContent);
        H2:
        try {
            $rl = SAMLSPUtilities::validateElement($l3);
            if (!($rl !== FALSE)) {
                goto ab;
            }
            $this->certificates = $rl["\103\145\x72\x74\151\x66\x69\x63\x61\x74\145\x73"];
            $this->validators[] = array("\106\165\x6e\x63\164\151\157\156" => array("\x55\164\151\154\151\164\x69\x65\163", "\166\141\154\151\144\141\x74\x65\123\151\x67\x6e\141\164\165\x72\x65"), "\104\x61\x74\x61" => $rl);
            ab:
        } catch (Exception $qc) {
        }
        $this->sessionIndexes = array();
        if (!$l3->hasAttribute("\x4e\157\x74\x4f\156\117\162\101\146\x74\145\x72")) {
            goto hi;
        }
        $this->notOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($l3->getAttribute("\116\x6f\x74\117\156\117\x72\x41\146\164\145\162"));
        hi:
        $OJ = SAMLSPUtilities::xpQuery($l3, "\56\57\163\141\x6d\x6c\137\x61\x73\163\x65\x72\164\151\x6f\x6e\x3a\116\141\155\145\x49\x44\40\174\x20\56\x2f\163\x61\x6d\x6c\137\141\163\163\x65\x72\x74\151\x6f\156\72\x45\x6e\143\162\171\x70\164\145\144\111\104\57\x78\145\x6e\143\72\105\156\x63\162\x79\x70\164\145\x64\104\x61\x74\x61");
        if (empty($OJ)) {
            goto gX;
        }
        if (count($OJ) > 1) {
            goto nK;
        }
        goto Ob;
        gX:
        throw new Exception("\115\x69\163\163\151\x6e\147\x20\74\163\x61\155\x6c\72\116\x61\x6d\145\x49\x44\76\40\157\162\40\x3c\x73\141\155\154\x3a\105\x6e\143\x72\171\160\164\x65\x64\111\104\x3e\40\x69\x6e\x20\x3c\163\141\x6d\154\x70\x3a\x4c\157\x67\157\165\x74\122\x65\x71\165\145\x73\x74\x3e\56");
        goto Ob;
        nK:
        throw new Exception("\115\x6f\162\x65\x20\164\x68\141\x6e\40\157\x6e\145\40\74\x73\x61\x6d\x6c\x3a\116\141\x6d\x65\111\104\76\40\x6f\162\40\x3c\x73\x61\155\x6c\x3a\x45\156\x63\162\x79\160\x74\x65\144\x44\x3e\40\x69\156\x20\x3c\163\141\x6d\x6c\160\72\x4c\x6f\147\x6f\165\164\122\x65\161\x75\145\163\164\x3e\56");
        Ob:
        $OJ = $OJ[0];
        if ($OJ->localName === "\x45\156\x63\162\171\x70\x74\145\144\104\141\x74\x61") {
            goto LR;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($OJ);
        goto B5;
        LR:
        $this->encryptedNameId = $OJ;
        B5:
        $lF = SAMLSPUtilities::xpQuery($l3, "\56\x2f\x73\141\x6d\154\x5f\160\162\157\x74\157\143\x6f\154\72\x53\145\163\163\x69\x6f\156\x49\x6e\144\x65\170");
        foreach ($lF as $VU) {
            $this->sessionIndexes[] = trim($VU->textContent);
            Yx:
        }
        WL:
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($ef)
    {
        $this->notOnOrAfter = $ef;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto dl;
        }
        return TRUE;
        dl:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $WO)
    {
        $ik = new DOMDocument();
        $Bf = $ik->createElement("\x72\x6f\x6f\164");
        $ik->appendChild($Bf);
        SAML2_Utils::addNameId($Bf, $this->nameId);
        $OJ = $Bf->firstChild;
        SAML2_Utils::getContainer()->debugMessage($OJ, "\x65\x6e\x63\x72\x79\x70\x74");
        $NA = new XMLSecEnc();
        $NA->setNode($OJ);
        $NA->type = XMLSecEnc::Element;
        $Z3 = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $Z3->generateSessionKey();
        $NA->encryptKey($WO, $Z3);
        $this->encryptedNameId = $NA->encryptNode($Z3);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $WO, array $io = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto Ih;
        }
        return;
        Ih:
        $OJ = SAML2_Utils::decryptElement($this->encryptedNameId, $WO, $io);
        SAML2_Utils::getContainer()->debugMessage($OJ, "\x64\x65\143\x72\x79\160\x74");
        $this->nameId = SAML2_Utils::parseNameId($OJ);
        $this->encryptedNameId = NULL;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto qf;
        }
        throw new Exception("\x41\x74\164\x65\155\x70\164\x65\x64\40\x74\157\40\162\x65\164\162\x69\145\166\x65\40\x65\x6e\143\x72\x79\x70\164\x65\144\40\116\141\155\x65\111\x44\x20\167\151\164\150\x6f\x75\x74\x20\x64\145\143\162\x79\160\x74\151\x6e\x67\x20\151\x74\x20\x66\151\x72\163\x74\x2e");
        qf:
        return $this->nameId;
    }
    public function setNameId($OJ)
    {
        $this->nameId = $OJ;
    }
    public function getSessionIndexes()
    {
        return $this->sessionIndexes;
    }
    public function setSessionIndexes(array $lF)
    {
        $this->sessionIndexes = $lF;
    }
    public function getSessionIndex()
    {
        if (!empty($this->sessionIndexes)) {
            goto xa;
        }
        return NULL;
        xa:
        return $this->sessionIndexes[0];
    }
    public function setSessionIndex($VU)
    {
        if (is_null($VU)) {
            goto PB;
        }
        $this->sessionIndexes = array($VU);
        goto cy;
        PB:
        $this->sessionIndexes = array();
        cy:
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($It)
    {
        $this->id = $It;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($kC)
    {
        $this->issueInstant = $kC;
    }
    public function getDestination()
    {
        return $this->destination;
    }
    public function setDestination($tG)
    {
        $this->destination = $tG;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($Ai)
    {
        $this->issuer = $Ai;
    }
}
