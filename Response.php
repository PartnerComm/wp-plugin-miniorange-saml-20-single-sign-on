<?php


include "\x41\x73\163\x65\162\164\151\157\156\56\x70\x68\160";
class SAML2SPResponse
{
    private $assertions;
    private $destination;
    private $certificates;
    private $signatureData;
    public function __construct(DOMElement $Ip = NULL)
    {
        $this->assertions = array();
        $this->certificates = array();
        if (!($Ip === NULL)) {
            goto gu;
        }
        return;
        gu:
        $qb = SAMLSPUtilities::validateElement($Ip);
        if (!($qb !== FALSE)) {
            goto fl;
        }
        $this->certificates = $qb["\103\x65\x72\164\x69\x66\151\143\x61\x74\145\x73"];
        $this->signatureData = $qb;
        fl:
        if (!$Ip->hasAttribute("\x44\145\163\x74\x69\x6e\x61\x74\151\157\x6e")) {
            goto tV;
        }
        $this->destination = $Ip->getAttribute("\104\x65\163\164\151\156\x61\x74\x69\157\156");
        tV:
        $pi = $Ip->firstChild;
        dD:
        if (!($pi !== NULL)) {
            goto cP;
        }
        if (!($pi->namespaceURI !== "\x75\x72\156\x3a\x6f\x61\x73\x69\163\x3a\x6e\141\x6d\x65\x73\72\164\143\x3a\x53\101\x4d\114\72\x32\x2e\60\x3a\141\163\163\x65\162\164\x69\x6f\x6e")) {
            goto wJ;
        }
        goto TK;
        wJ:
        if (!($pi->localName === "\101\163\163\145\162\x74\x69\x6f\x6e" || $pi->localName === "\105\156\x63\x72\x79\x70\164\x65\144\x41\163\163\145\x72\x74\x69\157\x6e")) {
            goto er;
        }
        $this->assertions[] = new SAML2SPAssertion($pi);
        er:
        TK:
        $pi = $pi->nextSibling;
        goto dD;
        cP:
    }
    public function getAssertions()
    {
        return $this->assertions;
    }
    public function setAssertions(array $ri)
    {
        $this->assertions = $ri;
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
