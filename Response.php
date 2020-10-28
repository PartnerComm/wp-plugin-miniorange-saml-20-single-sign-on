<?php


include "\101\163\163\145\x72\164\151\157\156\x2e\160\x68\160";
class SAML2SPResponse
{
    private $assertions;
    private $destination;
    private $certificates;
    private $signatureData;
    public function __construct(DOMElement $aX = NULL, $ls)
    {
        $this->assertions = array();
        $this->certificates = array();
        if (!($aX === NULL)) {
            goto EW;
        }
        return;
        EW:
        $lf = SAMLSPUtilities::validateElement($aX);
        if (!($lf !== FALSE)) {
            goto LO;
        }
        $this->certificates = $lf["\x43\x65\162\x74\x69\146\151\143\x61\164\x65\163"];
        $this->signatureData = $lf;
        LO:
        if (!$aX->hasAttribute("\x44\145\163\164\x69\156\x61\164\151\157\156")) {
            goto Oi;
        }
        $this->destination = $aX->getAttribute("\x44\145\163\164\151\x6e\x61\164\151\157\156");
        Oi:
        $e3 = $aX->firstChild;
        bh:
        if (!($e3 !== NULL)) {
            goto dw;
        }
        if (!($e3->namespaceURI !== "\165\162\x6e\72\x6f\x61\x73\151\163\x3a\x6e\141\155\x65\x73\72\164\x63\72\123\101\115\x4c\72\x32\x2e\60\72\x61\x73\x73\145\x72\x74\151\x6f\156")) {
            goto vs;
        }
        goto GC;
        vs:
        if (!($e3->localName === "\101\x73\163\145\x72\164\x69\x6f\156" || $e3->localName === "\105\156\143\162\x79\x70\164\x65\144\x41\163\x73\x65\x72\164\151\x6f\156")) {
            goto tU;
        }
        $this->assertions[] = new SAML2SPAssertion($e3, $ls);
        tU:
        GC:
        $e3 = $e3->nextSibling;
        goto bh;
        dw:
    }
    public function getAssertions()
    {
        return $this->assertions;
    }
    public function setAssertions(array $WV)
    {
        $this->assertions = $WV;
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
