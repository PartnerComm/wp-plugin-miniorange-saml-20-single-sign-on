<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


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
    public function __construct(DOMElement $jn = NULL)
    {
        $this->tagName = "\114\157\147\157\165\164\122\145\161\x75\145\163\x74";
        $this->id = SAMLSPUtilities::generateID();
        $this->issueInstant = time();
        $this->certificates = array();
        $this->validators = array();
        if (!($jn === NULL)) {
            goto oa;
        }
        return;
        oa:
        if ($jn->hasAttribute("\x49\x44")) {
            goto Nq;
        }
        throw new Exception("\115\x69\163\163\x69\156\x67\40\111\x44\40\141\x74\x74\162\x69\x62\x75\164\x65\x20\157\156\40\123\x41\x4d\x4c\40\x6d\x65\x73\x73\x61\147\145\56");
        Nq:
        $this->id = $jn->getAttribute("\111\x44");
        if (!($jn->getAttribute("\126\x65\162\163\151\x6f\156") !== "\x32\56\60")) {
            goto i4;
        }
        throw new Exception("\x55\x6e\x73\x75\160\x70\157\162\164\x65\x64\40\166\145\x72\x73\x69\157\156\x3a\x20" . $jn->getAttribute("\126\145\x72\x73\151\x6f\x6e"));
        i4:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($jn->getAttribute("\x49\163\163\x75\145\111\156\163\164\x61\x6e\x74"));
        if (!$jn->hasAttribute("\104\145\163\164\x69\156\x61\x74\x69\x6f\x6e")) {
            goto hE;
        }
        $this->destination = $jn->getAttribute("\x44\145\x73\x74\151\156\x61\x74\x69\x6f\156");
        hE:
        $Og = SAMLSPUtilities::xpQuery($jn, "\56\x2f\x73\x61\x6d\154\137\141\x73\x73\x65\x72\164\x69\157\156\x3a\111\163\x73\165\x65\x72");
        if (empty($Og)) {
            goto uB;
        }
        $this->issuer = trim($Og[0]->textContent);
        uB:
        try {
            $Uz = SAMLSPUtilities::validateElement($jn);
            if (!($Uz !== FALSE)) {
                goto tr;
            }
            $this->certificates = $Uz["\x43\x65\162\164\x69\x66\x69\143\x61\x74\x65\163"];
            $this->validators[] = array("\106\165\156\x63\164\151\157\156" => array("\x55\164\151\154\x69\x74\x69\145\x73", "\166\x61\x6c\151\144\141\x74\x65\123\151\147\156\x61\164\165\162\x65"), "\x44\x61\x74\x61" => $Uz);
            tr:
        } catch (Exception $cN) {
        }
        $this->sessionIndexes = array();
        if (!$jn->hasAttribute("\116\x6f\x74\117\156\117\x72\x41\146\164\x65\162")) {
            goto Tx;
        }
        $this->notOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($jn->getAttribute("\x4e\157\164\x4f\156\x4f\162\101\x66\x74\145\x72"));
        Tx:
        $Ag = SAMLSPUtilities::xpQuery($jn, "\x2e\57\x73\x61\155\154\x5f\x61\163\x73\x65\162\164\151\x6f\x6e\72\116\x61\155\145\x49\x44\x20\174\40\x2e\x2f\x73\141\155\154\137\141\x73\163\x65\x72\164\x69\x6f\x6e\x3a\x45\x6e\x63\162\171\x70\164\145\x64\111\x44\57\x78\x65\156\x63\x3a\105\156\143\162\171\160\164\x65\x64\104\x61\164\141");
        if (empty($Ag)) {
            goto k9;
        }
        if (count($Ag) > 1) {
            goto eV;
        }
        goto ag;
        k9:
        throw new Exception("\x4d\x69\x73\163\151\156\147\40\x3c\163\141\x6d\154\72\x4e\x61\x6d\x65\111\x44\76\x20\157\x72\x20\x3c\163\x61\155\154\x3a\105\156\x63\x72\171\160\x74\x65\144\111\104\x3e\x20\x69\x6e\x20\x3c\163\141\155\x6c\160\x3a\114\x6f\x67\x6f\165\164\122\145\x71\x75\x65\163\164\76\x2e");
        goto ag;
        eV:
        throw new Exception("\115\x6f\162\145\x20\164\150\x61\x6e\x20\157\x6e\x65\x20\x3c\163\x61\x6d\154\x3a\x4e\141\155\x65\111\x44\76\40\157\162\40\x3c\x73\141\155\154\x3a\105\x6e\143\162\x79\x70\164\x65\x64\x44\x3e\x20\x69\156\40\74\163\141\x6d\x6c\x70\72\x4c\x6f\147\x6f\x75\x74\122\145\x71\165\145\163\164\x3e\x2e");
        ag:
        $Ag = $Ag[0];
        if ($Ag->localName === "\x45\156\143\162\171\x70\x74\145\144\104\141\x74\x61") {
            goto YH;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($Ag);
        goto Q2;
        YH:
        $this->encryptedNameId = $Ag;
        Q2:
        $i3 = SAMLSPUtilities::xpQuery($jn, "\x2e\57\x73\x61\x6d\154\x5f\x70\x72\x6f\164\157\143\157\x6c\72\123\x65\163\163\151\157\x6e\x49\x6e\x64\145\170");
        foreach ($i3 as $bZ) {
            $this->sessionIndexes[] = trim($bZ->textContent);
            Pl:
        }
        iO:
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($WB)
    {
        $this->notOnOrAfter = $WB;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto Kc;
        }
        return TRUE;
        Kc:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $mr)
    {
        $GD = new DOMDocument();
        $Z0 = $GD->createElement("\162\x6f\157\x74");
        $GD->appendChild($Z0);
        SAML2_Utils::addNameId($Z0, $this->nameId);
        $Ag = $Z0->firstChild;
        SAML2_Utils::getContainer()->debugMessage($Ag, "\x65\x6e\143\x72\171\160\x74");
        $tM = new XMLSecEnc();
        $tM->setNode($Ag);
        $tM->type = XMLSecEnc::Element;
        $Y0 = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $Y0->generateSessionKey();
        $tM->encryptKey($mr, $Y0);
        $this->encryptedNameId = $tM->encryptNode($Y0);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $mr, array $a6 = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto P8;
        }
        return;
        P8:
        $Ag = SAML2_Utils::decryptElement($this->encryptedNameId, $mr, $a6);
        SAML2_Utils::getContainer()->debugMessage($Ag, "\x64\145\x63\x72\171\160\164");
        $this->nameId = SAML2_Utils::parseNameId($Ag);
        $this->encryptedNameId = NULL;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto oQ;
        }
        throw new Exception("\101\x74\x74\x65\155\160\x74\145\x64\x20\x74\x6f\x20\162\145\x74\162\151\x65\x76\x65\40\x65\x6e\143\x72\x79\x70\164\145\144\x20\116\x61\155\145\x49\x44\40\167\151\164\150\157\165\x74\x20\144\145\x63\x72\x79\x70\x74\x69\156\147\40\151\164\x20\x66\151\x72\163\x74\56");
        oQ:
        return $this->nameId;
    }
    public function setNameId($Ag)
    {
        $this->nameId = $Ag;
    }
    public function getSessionIndexes()
    {
        return $this->sessionIndexes;
    }
    public function setSessionIndexes(array $i3)
    {
        $this->sessionIndexes = $i3;
    }
    public function getSessionIndex()
    {
        if (!empty($this->sessionIndexes)) {
            goto Qm;
        }
        return NULL;
        Qm:
        return $this->sessionIndexes[0];
    }
    public function setSessionIndex($bZ)
    {
        if (is_null($bZ)) {
            goto KH;
        }
        $this->sessionIndexes = array($bZ);
        goto AX;
        KH:
        $this->sessionIndexes = array();
        AX:
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($Vc)
    {
        $this->id = $Vc;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($ok)
    {
        $this->issueInstant = $ok;
    }
    public function getDestination()
    {
        return $this->destination;
    }
    public function setDestination($Mp)
    {
        $this->destination = $Mp;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($Og)
    {
        $this->issuer = $Og;
    }
}
