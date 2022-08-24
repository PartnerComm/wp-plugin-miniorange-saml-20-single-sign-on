<?php


include "\101\163\x73\145\162\x74\151\x6f\156\56\x70\150\x70";
class SAML2SPResponse
{
    private $assertions;
    private $destination;
    private $certificates;
    private $signatureData;
    public function __construct(DOMElement $rS = NULL, $ym)
    {
        $this->assertions = array();
        $this->certificates = array();
        if (!($rS === NULL)) {
            goto CCr;
        }
        return;
        CCr:
        $le = SAMLSPUtilities::validateElement($rS);
        if (!($le !== FALSE)) {
            goto x2v;
        }
        $this->certificates = $le["\x43\145\x72\x74\151\x66\x69\143\141\164\x65\x73"];
        $this->signatureData = $le;
        x2v:
        if (!$rS->hasAttribute("\104\x65\x73\164\x69\156\x61\x74\151\157\156")) {
            goto ugo;
        }
        $this->destination = $rS->getAttribute("\x44\145\163\x74\151\x6e\141\x74\x69\x6f\156");
        ugo:
        $Ak = $rS->firstChild;
        QqT:
        if (!($Ak !== NULL)) {
            goto aJ8;
        }
        if (!($Ak->namespaceURI !== "\x75\x72\156\72\x6f\x61\163\151\x73\x3a\156\x61\155\x65\163\x3a\164\x63\72\x53\x41\x4d\x4c\72\x32\x2e\60\x3a\x61\x73\x73\145\x72\164\x69\x6f\x6e")) {
            goto I8t;
        }
        goto VSv;
        I8t:
        if (!($Ak->localName === "\101\163\x73\x65\162\164\151\157\x6e" || $Ak->localName === "\x45\x6e\x63\x72\x79\160\164\x65\x64\x41\163\x73\x65\x72\x74\151\157\x6e")) {
            goto rSy;
        }
        $this->assertions[] = new SAML2SPAssertion($Ak, $ym);
        rSy:
        VSv:
        $Ak = $Ak->nextSibling;
        goto QqT;
        aJ8:
    }
    public function getAssertions()
    {
        return $this->assertions;
    }
    public function setAssertions(array $Hj)
    {
        $this->assertions = $Hj;
    }
    public function getDestination()
    {
        return $this->destination;
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
