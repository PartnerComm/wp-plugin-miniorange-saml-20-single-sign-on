<?php


include_once "\125\x74\x69\154\151\164\151\x65\163\56\x70\x68\160";
class IDPMetadataReader
{
    private $identityProviders;
    private $serviceProviders;
    public function __construct(DOMNode $rS = NULL)
    {
        $this->identityProviders = array();
        $this->serviceProviders = array();
        $Fq = SAMLSPUtilities::xpQuery($rS, "\x2e\x2f\163\x61\x6d\154\x5f\155\145\164\141\x64\141\x74\141\72\105\156\x74\x69\164\151\x65\163\104\x65\163\x63\162\x69\x70\x74\x6f\x72");
        if (!empty($Fq)) {
            goto wU;
        }
        $XM = SAMLSPUtilities::xpQuery($rS, "\x2e\57\x73\141\x6d\x6c\x5f\x6d\x65\164\x61\144\141\x74\141\x3a\105\156\164\151\x74\x79\104\145\x73\143\x72\x69\160\x74\157\162");
        goto y3;
        wU:
        $XM = SAMLSPUtilities::xpQuery($Fq[0], "\x2e\57\x73\x61\155\154\137\x6d\x65\164\141\144\141\164\x61\x3a\x45\x6e\x74\151\x74\171\104\x65\163\x63\x72\151\160\164\157\x72");
        y3:
        foreach ($XM as $yu) {
            $hf = SAMLSPUtilities::xpQuery($yu, "\56\57\x73\x61\155\154\137\x6d\x65\x74\x61\144\141\164\141\x3a\x49\x44\x50\123\x53\x4f\x44\145\163\143\x72\x69\160\164\x6f\162");
            if (!(isset($hf) && !empty($hf))) {
                goto eS;
            }
            array_push($this->identityProviders, new IdentityProviders($yu));
            eS:
            Hq:
        }
        B5:
    }
    public function getIdentityProviders()
    {
        return $this->identityProviders;
    }
    public function getServiceProviders()
    {
        return $this->serviceProviders;
    }
}
class IdentityProviders
{
    private $idpName;
    private $entityID;
    private $loginDetails;
    private $logoutDetails;
    private $signingCertificate;
    private $encryptionCertificate;
    private $signedRequest;
    public function __construct(DOMElement $rS = NULL)
    {
        $this->idpName = '';
        $this->loginDetails = array();
        $this->logoutDetails = array();
        $this->signingCertificate = array();
        $this->encryptionCertificate = array();
        if (!$rS->hasAttribute("\x65\156\x74\151\x74\x79\111\104")) {
            goto CH;
        }
        $this->entityID = $rS->getAttribute("\145\x6e\164\x69\164\171\x49\104");
        CH:
        if (!$rS->hasAttribute("\x57\141\156\164\101\165\x74\x68\156\122\145\x71\x75\x65\x73\x74\x73\123\151\x67\156\x65\144")) {
            goto sg;
        }
        $this->signedRequest = $rS->getAttribute("\127\141\x6e\164\x41\x75\164\x68\156\122\145\x71\x75\x65\x73\164\x73\x53\x69\147\x6e\145\144");
        sg:
        $hf = SAMLSPUtilities::xpQuery($rS, "\x2e\57\163\x61\155\x6c\137\155\145\x74\141\144\141\x74\141\x3a\111\104\x50\x53\123\117\104\x65\163\x63\x72\151\x70\x74\157\x72");
        if (count($hf) > 1) {
            goto F5;
        }
        if (empty($hf)) {
            goto XJ;
        }
        goto QK;
        F5:
        throw new Exception("\x4d\157\162\145\x20\x74\150\x61\x6e\40\x6f\x6e\145\40\x3c\x49\x44\x50\123\x53\117\x44\145\163\143\x72\x69\x70\164\157\x72\x3e\40\x69\156\x20\x3c\105\156\164\151\164\171\104\145\163\143\162\151\160\x74\157\162\x3e\x2e");
        goto QK;
        XJ:
        throw new Exception("\115\x69\x73\x73\151\156\x67\x20\x72\x65\x71\x75\x69\x72\x65\x64\40\x3c\111\104\x50\123\123\117\104\x65\163\143\x72\x69\x70\164\x6f\162\x3e\x20\x69\x6e\40\74\105\x6e\164\x69\164\171\104\145\x73\x63\162\151\x70\x74\x6f\162\76\56");
        QK:
        $wO = $hf[0];
        $Pz = SAMLSPUtilities::xpQuery($rS, "\56\x2f\x73\141\x6d\154\137\155\145\164\x61\144\x61\x74\x61\x3a\105\x78\x74\145\x6e\163\151\x6f\156\x73");
        if (!$Pz) {
            goto l3;
        }
        $this->parseInfo($wO);
        l3:
        $this->parseSSOService($wO);
        $this->parseSLOService($wO);
        $this->parsex509Certificate($wO);
    }
    private function parseInfo($rS)
    {
        $mM = SAMLSPUtilities::xpQuery($rS, "\x2e\57\x6d\x64\x75\151\x3a\125\x49\x49\156\x66\x6f\x2f\x6d\x64\x75\151\x3a\x44\x69\163\160\154\x61\171\116\x61\x6d\145");
        foreach ($mM as $lK) {
            if (!($lK->hasAttribute("\170\155\154\x3a\x6c\141\156\x67") && $lK->getAttribute("\170\x6d\x6c\x3a\x6c\x61\x6e\147") == "\145\156")) {
                goto FZ;
            }
            $this->idpName = $lK->textContent;
            FZ:
            L0:
        }
        JV:
    }
    private function parseSSOService($rS)
    {
        $YI = SAMLSPUtilities::xpQuery($rS, "\56\57\163\x61\x6d\154\x5f\155\x65\x74\141\x64\141\x74\141\72\123\151\x6e\x67\154\145\x53\x69\147\156\x4f\x6e\123\x65\162\166\151\x63\x65");
        foreach ($YI as $Lf) {
            $q1 = str_replace("\165\162\156\72\x6f\141\x73\151\163\x3a\156\x61\155\145\x73\72\x74\143\72\123\x41\115\x4c\72\x32\56\x30\x3a\142\x69\x6e\x64\x69\x6e\x67\163\72", '', $Lf->getAttribute("\x42\151\156\144\x69\156\147"));
            $this->loginDetails = array_merge($this->loginDetails, array($q1 => $Lf->getAttribute("\x4c\x6f\143\141\164\x69\x6f\156")));
            kH:
        }
        q6:
    }
    private function parseSLOService($rS)
    {
        $dx = SAMLSPUtilities::xpQuery($rS, "\56\x2f\x73\141\155\x6c\x5f\155\145\164\x61\x64\x61\164\x61\72\x53\151\x6e\147\x6c\x65\114\x6f\147\x6f\x75\x74\x53\x65\x72\166\151\x63\145");
        if (!empty($dx)) {
            goto oi;
        }
        $this->logoutDetails = array("\x48\124\x54\x50\55\122\145\144\x69\x72\145\143\x74" => '');
        goto BP;
        oi:
        foreach ($dx as $wD) {
            $q1 = str_replace("\x75\x72\x6e\72\157\x61\x73\x69\163\72\x6e\x61\x6d\145\x73\x3a\x74\143\x3a\123\x41\115\114\x3a\x32\x2e\60\x3a\x62\x69\156\x64\151\x6e\x67\x73\72", '', $wD->getAttribute("\102\151\156\144\151\156\147"));
            $this->logoutDetails = array_merge($this->logoutDetails, array($q1 => $wD->getAttribute("\114\x6f\x63\x61\164\x69\157\x6e")));
            Cm:
        }
        LC:
        BP:
    }
    private function parsex509Certificate($rS)
    {
        foreach (SAMLSPUtilities::xpQuery($rS, "\56\57\163\141\x6d\x6c\137\155\x65\164\x61\144\x61\x74\141\x3a\113\145\171\x44\145\x73\143\162\151\160\164\x6f\x72") as $Xx) {
            if ($Xx->hasAttribute("\165\x73\145")) {
                goto xG;
            }
            $this->parseSigningCertificate($Xx);
            goto Gn;
            xG:
            if ($Xx->getAttribute("\x75\x73\145") == "\145\x6e\143\x72\171\160\x74\151\157\x6e") {
                goto qt;
            }
            $this->parseSigningCertificate($Xx);
            goto y1;
            qt:
            $this->parseEncryptionCertificate($Xx);
            y1:
            Gn:
            re:
        }
        vB:
    }
    private function parseSigningCertificate($rS)
    {
        $wm = SAMLSPUtilities::xpQuery($rS, "\56\x2f\144\163\72\113\x65\x79\111\x6e\146\157\x2f\x64\x73\x3a\130\65\x30\x39\104\141\164\141\x2f\144\163\x3a\130\65\60\71\103\x65\162\x74\151\x66\x69\143\141\x74\145");
        $ek = trim($wm[0]->textContent);
        $ek = str_replace(array("\15", "\xa", "\x9", "\x20"), '', $ek);
        if (empty($wm)) {
            goto Gs;
        }
        array_push($this->signingCertificate, SAMLSPUtilities::sanitize_certificate($ek));
        Gs:
    }
    private function parseEncryptionCertificate($rS)
    {
        $wm = SAMLSPUtilities::xpQuery($rS, "\56\x2f\144\x73\72\113\145\171\111\156\146\157\x2f\x64\x73\x3a\x58\65\60\x39\x44\x61\x74\141\x2f\144\x73\x3a\130\65\x30\71\103\x65\x72\x74\151\x66\151\143\141\x74\145");
        $ek = trim($wm[0]->textContent);
        $ek = str_replace(array("\15", "\12", "\11", "\x20"), '', $ek);
        if (empty($wm)) {
            goto go;
        }
        array_push($this->encryptionCertificate, $ek);
        go:
    }
    public function getIdpName()
    {
        return $this->idpName;
    }
    public function getEntityID()
    {
        return $this->entityID;
    }
    public function getLoginURL($q1)
    {
        return $this->loginDetails[$q1];
    }
    public function getLogoutURL($q1)
    {
        return $this->logoutDetails[$q1];
    }
    public function getLoginDetails()
    {
        return $this->loginDetails;
    }
    public function getLogoutDetails()
    {
        return $this->logoutDetails;
    }
    public function getSigningCertificate()
    {
        return $this->signingCertificate;
    }
    public function getEncryptionCertificate()
    {
        return $this->encryptionCertificate[0];
    }
    public function isRequestSigned()
    {
        return $this->signedRequest;
    }
}
class ServiceProviders
{
}
