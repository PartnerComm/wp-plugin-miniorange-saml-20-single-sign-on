<?php


include "\101\163\163\145\x72\x74\x69\x6f\156\x2e\160\x68\160";
class SAML2SPResponse
{
    private $assertions;
    private $destination;
    private $certificates;
    private $signatureData;
    public function __construct(DOMElement $wI = NULL, $Xd)
    {
        $this->assertions = array();
        $this->certificates = array();
        if (!($wI === NULL)) {
            goto RAs;
        }
        return;
        RAs:
        $fa = SAMLSPUtilities::validateElement($wI);
        if (!($fa !== FALSE)) {
            goto etD;
        }
        $this->certificates = $fa["\103\145\162\164\x69\x66\151\x63\141\164\145\163"];
        $this->signatureData = $fa;
        etD:
        if (!$wI->hasAttribute("\x44\x65\x73\164\x69\x6e\x61\x74\151\157\156")) {
            goto c77;
        }
        $this->destination = $wI->getAttribute("\104\145\x73\x74\151\156\x61\x74\151\157\156");
        c77:
        $Fr = $wI->firstChild;
        pWS:
        if (!($Fr !== NULL)) {
            goto WJB;
        }
        if (!($Fr->namespaceURI !== "\165\x72\x6e\x3a\157\141\x73\x69\163\72\156\141\155\x65\x73\72\x74\143\72\123\101\x4d\114\72\x32\x2e\x30\72\141\163\x73\145\162\x74\x69\157\x6e")) {
            goto Nq_;
        }
        goto hOc;
        Nq_:
        if (!($Fr->localName === "\101\163\163\x65\162\164\151\x6f\156" || $Fr->localName === "\105\156\x63\x72\x79\x70\x74\x65\x64\x41\x73\163\x65\x72\164\151\x6f\x6e")) {
            goto KH8;
        }
        $this->assertions[] = new SAML2SPAssertion($Fr, $Xd);
        KH8:
        hOc:
        $Fr = $Fr->nextSibling;
        goto pWS;
        WJB:
    }
    public function getAssertions()
    {
        return $this->assertions;
    }
    public function setAssertions(array $Db)
    {
        $this->assertions = $Db;
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
