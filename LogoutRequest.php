<?php


include_once "\x55\164\x69\x6c\151\x74\x69\x65\163\56\x70\150\x70";
include_once "\170\x6d\154\x73\x65\x63\x6c\151\x62\x73\x2e\x70\150\x70";
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
    public function __construct(DOMElement $DG = NULL)
    {
        $this->tagName = "\x4c\x6f\x67\157\165\164\x52\145\x71\165\145\163\x74";
        $this->id = SAMLSPUtilities::generateID();
        $this->issueInstant = time();
        $this->certificates = array();
        $this->validators = array();
        if (!($DG === NULL)) {
            goto V8;
        }
        return;
        V8:
        if ($DG->hasAttribute("\111\x44")) {
            goto Qb;
        }
        throw new Exception("\115\x69\x73\163\151\156\147\x20\x49\104\40\141\164\x74\x72\151\x62\x75\164\x65\40\157\156\x20\x53\101\115\114\40\155\145\163\x73\141\x67\x65\x2e");
        Qb:
        $this->id = $DG->getAttribute("\111\x44");
        if (!($DG->getAttribute("\126\x65\162\x73\x69\157\x6e") !== "\x32\56\60")) {
            goto fE;
        }
        throw new Exception("\x55\156\x73\x75\x70\x70\157\162\164\145\x64\x20\166\x65\x72\x73\151\157\156\x3a\x20" . $DG->getAttribute("\126\145\x72\163\151\x6f\x6e"));
        fE:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($DG->getAttribute("\x49\163\163\165\x65\111\156\x73\164\141\156\164"));
        if (!$DG->hasAttribute("\x44\145\x73\x74\x69\x6e\x61\164\151\157\x6e")) {
            goto W0;
        }
        $this->destination = $DG->getAttribute("\104\x65\x73\x74\x69\x6e\141\x74\151\x6f\156");
        W0:
        $e8 = SAMLSPUtilities::xpQuery($DG, "\56\x2f\163\x61\155\154\x5f\141\163\163\145\162\164\x69\157\156\x3a\x49\x73\163\x75\145\162");
        if (empty($e8)) {
            goto hy;
        }
        $this->issuer = trim($e8[0]->textContent);
        hy:
        try {
            $uZ = SAMLSPUtilities::validateElement($DG);
            if (!($uZ !== FALSE)) {
                goto sR;
            }
            $this->certificates = $uZ["\103\x65\x72\164\x69\146\151\143\x61\164\x65\163"];
            $this->validators[] = array("\106\165\x6e\x63\x74\151\157\x6e" => array("\125\164\151\154\x69\x74\x69\145\163", "\x76\141\x6c\x69\x64\141\x74\145\x53\151\147\x6e\x61\164\165\162\145"), "\104\141\x74\141" => $uZ);
            sR:
        } catch (Exception $L2) {
        }
        $this->sessionIndexes = array();
        if (!$DG->hasAttribute("\116\x6f\x74\117\x6e\x4f\162\101\x66\164\145\x72")) {
            goto e4;
        }
        $this->notOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($DG->getAttribute("\x4e\157\x74\117\156\x4f\162\101\x66\164\x65\x72"));
        e4:
        $t0 = SAMLSPUtilities::xpQuery($DG, "\56\57\x73\141\155\x6c\x5f\x61\x73\x73\x65\162\x74\x69\157\x6e\x3a\x4e\141\x6d\145\111\104\40\x7c\x20\56\x2f\x73\x61\x6d\154\137\x61\163\x73\x65\x72\x74\x69\x6f\x6e\72\105\x6e\143\x72\171\160\x74\x65\144\x49\104\57\170\x65\x6e\x63\72\x45\156\x63\162\x79\160\164\x65\x64\104\141\164\141");
        if (empty($t0)) {
            goto Vz;
        }
        if (count($t0) > 1) {
            goto nh;
        }
        goto l2;
        Vz:
        throw new Exception("\115\x69\163\163\x69\x6e\x67\x20\x3c\163\x61\155\154\72\x4e\x61\155\x65\x49\x44\x3e\x20\x6f\x72\x20\x3c\163\x61\x6d\154\x3a\105\156\143\x72\171\x70\164\145\x64\111\104\x3e\40\151\156\40\74\x73\141\155\154\160\x3a\114\157\147\x6f\x75\x74\x52\x65\161\165\145\x73\x74\x3e\x2e");
        goto l2;
        nh:
        throw new Exception("\x4d\157\x72\x65\x20\164\x68\141\156\x20\x6f\x6e\x65\40\74\x73\141\x6d\154\x3a\x4e\141\155\145\111\104\76\x20\157\x72\40\74\x73\141\155\x6c\72\x45\x6e\x63\162\x79\160\x74\145\144\x44\x3e\40\151\156\x20\74\163\141\x6d\154\160\x3a\114\157\x67\x6f\165\164\x52\x65\161\165\x65\163\x74\76\x2e");
        l2:
        $t0 = $t0[0];
        if ($t0->localName === "\x45\x6e\143\x72\171\160\x74\145\x64\x44\x61\x74\x61") {
            goto NC;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($t0);
        goto El;
        NC:
        $this->encryptedNameId = $t0;
        El:
        $NP = SAMLSPUtilities::xpQuery($DG, "\56\x2f\x73\x61\x6d\x6c\137\160\162\157\x74\157\x63\157\x6c\72\123\145\163\x73\151\x6f\x6e\111\x6e\x64\x65\x78");
        foreach ($NP as $vq) {
            $this->sessionIndexes[] = trim($vq->textContent);
            ju:
        }
        cF:
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($uC)
    {
        $this->notOnOrAfter = $uC;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto SX;
        }
        return TRUE;
        SX:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $Ej)
    {
        $rq = new DOMDocument();
        $Kg = $rq->createElement("\162\x6f\157\164");
        $rq->appendChild($Kg);
        SAML2_Utils::addNameId($Kg, $this->nameId);
        $t0 = $Kg->firstChild;
        SAML2_Utils::getContainer()->debugMessage($t0, "\145\x6e\x63\162\171\160\x74");
        $pM = new XMLSecEnc();
        $pM->setNode($t0);
        $pM->type = XMLSecEnc::Element;
        $O8 = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $O8->generateSessionKey();
        $pM->encryptKey($Ej, $O8);
        $this->encryptedNameId = $pM->encryptNode($O8);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $Ej, array $xx = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto iJ;
        }
        return;
        iJ:
        $t0 = SAML2_Utils::decryptElement($this->encryptedNameId, $Ej, $xx);
        SAML2_Utils::getContainer()->debugMessage($t0, "\x64\145\143\162\x79\x70\x74");
        $this->nameId = SAML2_Utils::parseNameId($t0);
        $this->encryptedNameId = NULL;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto Qg;
        }
        throw new Exception("\101\164\164\x65\155\x70\x74\x65\x64\40\164\157\x20\x72\145\164\x72\151\x65\166\x65\40\x65\x6e\x63\x72\171\x70\x74\145\x64\40\116\141\x6d\145\x49\x44\x20\x77\151\164\x68\157\x75\x74\40\x64\x65\x63\162\x79\160\164\151\x6e\x67\40\151\x74\40\x66\151\162\x73\x74\56");
        Qg:
        return $this->nameId;
    }
    public function setNameId($t0)
    {
        $this->nameId = $t0;
    }
    public function getSessionIndexes()
    {
        return $this->sessionIndexes;
    }
    public function setSessionIndexes(array $NP)
    {
        $this->sessionIndexes = $NP;
    }
    public function getSessionIndex()
    {
        if (!empty($this->sessionIndexes)) {
            goto sK;
        }
        return NULL;
        sK:
        return $this->sessionIndexes[0];
    }
    public function setSessionIndex($vq)
    {
        if (is_null($vq)) {
            goto X7;
        }
        $this->sessionIndexes = array($vq);
        goto E3;
        X7:
        $this->sessionIndexes = array();
        E3:
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($zM)
    {
        $this->id = $zM;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($qq)
    {
        $this->issueInstant = $qq;
    }
    public function getDestination()
    {
        return $this->destination;
    }
    public function setDestination($qd)
    {
        $this->destination = $qd;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($e8)
    {
        $this->issuer = $e8;
    }
}
