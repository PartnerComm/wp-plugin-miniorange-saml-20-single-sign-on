<?php


include 'Assertion.php';
class SAML2SPResponse
{
    private $assertions;
    private $destination;
    private $certificates;
    private $signatureData;
    public function __construct(DOMElement $l3 = NULL, $NI)
    {
        $this->assertions = array();
        $this->certificates = array();
        if (!($l3 === NULL)) {
            goto PT1;
        }
        return;
        PT1:
        $rl = SAMLSPUtilities::validateElement($l3);
        if (!($rl !== FALSE)) {
            goto GoF;
        }
        $this->certificates = $rl["\x43\x65\x72\164\x69\146\151\143\x61\x74\145\x73"];
        $this->signatureData = $rl;
        GoF:
        if (!$l3->hasAttribute("\x44\145\163\x74\x69\156\x61\x74\x69\157\x6e")) {
            goto x58;
        }
        $this->destination = $l3->getAttribute("\x44\145\163\x74\x69\156\x61\x74\x69\157\156");
        x58:
        $Kp = $l3->firstChild;
        pkH:
        if (!($Kp !== NULL)) {
            goto qlO;
        }
        if (!($Kp->namespaceURI !== "\x75\x72\156\x3a\x6f\141\163\151\163\72\156\141\155\145\x73\72\x74\143\72\x53\101\x4d\x4c\x3a\x32\56\60\x3a\x61\x73\x73\145\162\164\151\x6f\156")) {
            goto lCJ;
        }
        goto QxD;
        lCJ:
        if (!($Kp->localName === "\x41\x73\163\145\162\164\151\x6f\156" || $Kp->localName === "\105\x6e\143\x72\x79\160\164\145\x64\x41\163\x73\145\162\x74\x69\x6f\x6e")) {
            goto scq;
        }
        $this->assertions[] = new SAML2SPAssertion($Kp, $NI);
        scq:
        QxD:
        $Kp = $Kp->nextSibling;
        goto pkH;
        qlO:
    }
    public function getAssertions()
    {
        return $this->assertions;
    }
    public function setAssertions(array $bK)
    {
        $this->assertions = $bK;
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
