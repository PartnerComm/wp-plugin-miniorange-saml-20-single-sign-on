<?php


include "\101\x73\x73\145\162\164\x69\157\156\x2e\x70\150\x70";
class SAML2SPResponse
{
    private $assertions;
    private $destination;
    private $certificates;
    private $signatureData;
    public function __construct(DOMElement $DG = NULL, $ou)
    {
        $this->assertions = array();
        $this->certificates = array();
        if (!($DG === NULL)) {
            goto YT;
        }
        return;
        YT:
        $uZ = SAMLSPUtilities::validateElement($DG);
        if (!($uZ !== FALSE)) {
            goto rA;
        }
        $this->certificates = $uZ["\103\x65\162\x74\151\146\x69\x63\x61\164\145\x73"];
        $this->signatureData = $uZ;
        rA:
        if (!$DG->hasAttribute("\104\x65\163\164\x69\156\x61\164\151\157\x6e")) {
            goto c6;
        }
        $this->destination = $DG->getAttribute("\104\x65\x73\x74\151\x6e\x61\x74\x69\157\156");
        c6:
        $gC = $DG->firstChild;
        p4:
        if (!($gC !== NULL)) {
            goto W4;
        }
        if (!($gC->namespaceURI !== "\x75\x72\156\72\x6f\141\x73\x69\163\x3a\156\x61\x6d\x65\x73\x3a\x74\143\x3a\123\x41\x4d\114\72\x32\x2e\60\72\x61\x73\163\x65\162\x74\151\157\x6e")) {
            goto bb;
        }
        goto u6;
        bb:
        if (!($gC->localName === "\101\x73\163\145\162\164\151\x6f\156" || $gC->localName === "\x45\x6e\x63\x72\171\x70\x74\145\x64\101\163\163\x65\x72\164\151\157\156")) {
            goto lA;
        }
        $this->assertions[] = new SAML2SPAssertion($gC, $ou);
        lA:
        u6:
        $gC = $gC->nextSibling;
        goto p4;
        W4:
    }
    public function getAssertions()
    {
        return $this->assertions;
    }
    public function setAssertions(array $tG)
    {
        $this->assertions = $tG;
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
