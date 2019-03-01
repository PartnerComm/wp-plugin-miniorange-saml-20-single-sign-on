<?php


include "\101\x73\x73\x65\x72\x74\151\x6f\x6e\56\x70\150\x70";
class SAML2SPResponse
{
    private $assertions;
    private $destination;
    private $certificates;
    private $signatureData;
    public function __construct(DOMElement $vw = NULL)
    {
        $this->assertions = array();
        $this->certificates = array();
        if (!($vw === NULL)) {
            goto HZ;
        }
        return;
        HZ:
        $Yd = SAMLSPUtilities::validateElement($vw);
        if (!($Yd !== FALSE)) {
            goto Tj;
        }
        $this->certificates = $Yd["\x43\x65\x72\x74\151\146\151\x63\x61\x74\145\163"];
        $this->signatureData = $Yd;
        Tj:
        if (!$vw->hasAttribute("\x44\145\x73\x74\x69\156\141\164\x69\x6f\x6e")) {
            goto cf;
        }
        $this->destination = $vw->getAttribute("\104\x65\x73\164\x69\156\x61\x74\151\157\156");
        cf:
        $Ua = $vw->firstChild;
        Kx:
        if (!($Ua !== NULL)) {
            goto Pu;
        }
        if (!($Ua->namespaceURI !== "\x75\x72\x6e\72\157\141\163\x69\163\x3a\x6e\141\155\x65\163\x3a\x74\x63\72\x53\x41\x4d\x4c\72\x32\56\60\x3a\141\163\163\x65\162\164\151\x6f\x6e")) {
            goto Yc;
        }
        goto g2;
        Yc:
        if (!($Ua->localName === "\x41\163\163\x65\x72\x74\x69\157\156" || $Ua->localName === "\105\x6e\143\162\171\160\x74\x65\x64\x41\163\163\145\162\x74\x69\157\156")) {
            goto qg;
        }
        $this->assertions[] = new SAML2SPAssertion($Ua);
        qg:
        g2:
        $Ua = $Ua->nextSibling;
        goto Kx;
        Pu:
    }
    public function getAssertions()
    {
        return $this->assertions;
    }
    public function setAssertions(array $fM)
    {
        $this->assertions = $fM;
    }
    public function getDestination()
    {
        return $this->destination;
    }
    public function toUnsignedXML()
    {
        $KQ = parent::toUnsignedXML();
        foreach ($this->assertions as $U1) {
            $U1->toXML($KQ);
            fI:
        }
        iZ:
        return $KQ;
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
