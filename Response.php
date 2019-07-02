<?php


include "\101\163\163\x65\x72\x74\x69\157\156\x2e\x70\x68\x70";
class SAML2SPResponse
{
    private $assertions;
    private $destination;
    private $certificates;
    private $signatureData;
    public function __construct(DOMElement $BO = NULL)
    {
        $this->assertions = array();
        $this->certificates = array();
        if (!($BO === NULL)) {
            goto Zh;
        }
        return;
        Zh:
        $XS = SAMLSPUtilities::validateElement($BO);
        if (!($XS !== FALSE)) {
            goto x5;
        }
        $this->certificates = $XS["\103\x65\162\x74\151\146\151\x63\141\164\145\x73"];
        $this->signatureData = $XS;
        x5:
        if (!$BO->hasAttribute("\104\145\x73\x74\151\156\141\164\x69\157\156")) {
            goto vA;
        }
        $this->destination = $BO->getAttribute("\104\x65\163\164\151\156\141\x74\151\157\x6e");
        vA:
        $pu = $BO->firstChild;
        DR:
        if (!($pu !== NULL)) {
            goto Dv;
        }
        if (!($pu->namespaceURI !== "\x75\162\x6e\x3a\157\141\163\151\x73\x3a\156\x61\155\145\163\x3a\164\x63\x3a\x53\x41\115\x4c\72\62\x2e\60\x3a\x61\163\x73\x65\162\164\151\157\156")) {
            goto D2;
        }
        goto iO;
        D2:
        if (!($pu->localName === "\x41\163\x73\145\162\164\x69\x6f\x6e" || $pu->localName === "\x45\156\x63\162\171\x70\x74\x65\144\101\163\163\x65\x72\x74\x69\157\x6e")) {
            goto kR;
        }
        $this->assertions[] = new SAML2SPAssertion($pu);
        kR:
        iO:
        $pu = $pu->nextSibling;
        goto DR;
        Dv:
    }
    public function getAssertions()
    {
        return $this->assertions;
    }
    public function setAssertions(array $oW)
    {
        $this->assertions = $oW;
    }
    public function getDestination()
    {
        return $this->destination;
    }
    public function toUnsignedXML()
    {
        $wP = parent::toUnsignedXML();
        foreach ($this->assertions as $XP) {
            $XP->toXML($wP);
            p_:
        }
        Eo:
        return $wP;
    }
    public function getCertificates()
    {
        return $this->certificates;
    }
    public function getSignatureData()
    {
        return $this->signatureData;
    }
}
