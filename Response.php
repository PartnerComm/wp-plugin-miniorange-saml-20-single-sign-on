<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


require_once Mo_Saml_Plugin_Files::ASSERTION;
class SAML2SPResponse
{
    private $assertions;
    private $destination;
    private $certificates;
    private $signatureData;
    public function __construct(DOMElement $jn = NULL, $YS)
    {
        $this->assertions = array();
        $this->certificates = array();
        if (!($jn === NULL)) {
            goto xj_;
        }
        return;
        xj_:
        $Uz = SAMLSPUtilities::validateElement($jn);
        if (!($Uz !== FALSE)) {
            goto SxQ;
        }
        $this->certificates = $Uz["\x43\145\x72\164\151\x66\x69\x63\x61\164\x65\x73"];
        $this->signatureData = $Uz;
        SxQ:
        if (!$jn->hasAttribute("\104\145\x73\x74\x69\156\141\x74\151\157\156")) {
            goto yci;
        }
        $this->destination = $jn->getAttribute("\104\x65\163\164\x69\156\141\x74\151\x6f\156");
        yci:
        $XX = $jn->firstChild;
        aCl:
        if (!($XX !== NULL)) {
            goto IjI;
        }
        if (!($XX->namespaceURI !== "\165\x72\x6e\72\157\141\x73\x69\163\x3a\x6e\141\x6d\x65\x73\x3a\164\x63\72\x53\x41\115\x4c\72\x32\56\60\x3a\141\x73\x73\145\x72\x74\151\157\156")) {
            goto Pc9;
        }
        goto ppG;
        Pc9:
        if (!($XX->localName === "\101\x73\163\x65\x72\164\x69\157\156" || $XX->localName === "\x45\156\x63\x72\x79\x70\x74\145\144\101\x73\163\x65\162\164\x69\x6f\x6e")) {
            goto Ykl;
        }
        $this->assertions[] = new SAML2SPAssertion($XX, $YS);
        Ykl:
        ppG:
        $XX = $XX->nextSibling;
        goto aCl;
        IjI:
    }
    public function getAssertions()
    {
        return $this->assertions;
    }
    public function setAssertions(array $ya)
    {
        $this->assertions = $ya;
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
