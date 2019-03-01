<?php


include_once "\x55\164\x69\154\151\164\151\x65\x73\56\x70\x68\x70";
class IDPMetadataReader
{
    private $identityProviders;
    private $serviceProviders;
    public function __construct(DOMNode $vw = NULL)
    {
        $this->identityProviders = array();
        $this->serviceProviders = array();
        $Ru = SAMLSPUtilities::xpQuery($vw, "\x2e\57\163\141\x6d\x6c\x5f\155\145\164\x61\x64\141\164\141\72\x45\x6e\x74\151\x74\171\x44\145\x73\x63\162\151\160\x74\157\x72");
        foreach ($Ru as $UZ) {
            $Yv = SAMLSPUtilities::xpQuery($UZ, "\x2e\57\163\x61\x6d\x6c\137\x6d\145\164\141\x64\141\164\x61\72\111\104\120\123\123\x4f\x44\x65\163\x63\x72\x69\x70\x74\x6f\162");
            if (!(isset($Yv) && !empty($Yv))) {
                goto Nv;
            }
            array_push($this->identityProviders, new IdentityProviders($UZ));
            Nv:
            IE:
        }
        i8:
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
    public function __construct(DOMElement $vw = NULL)
    {
        $this->idpName = '';
        $this->loginDetails = array();
        $this->logoutDetails = array();
        $this->signingCertificate = array();
        $this->encryptionCertificate = array();
        if (!$vw->hasAttribute("\x65\156\x74\151\164\x79\x49\x44")) {
            goto Gq;
        }
        $this->entityID = $vw->getAttribute("\x65\156\x74\x69\164\x79\x49\104");
        Gq:
        if (!$vw->hasAttribute("\x57\141\x6e\x74\x41\165\x74\150\156\122\145\161\165\145\163\164\x73\x53\151\x67\x6e\x65\144")) {
            goto TA;
        }
        $this->signedRequest = $vw->getAttribute("\x57\x61\x6e\x74\x41\165\x74\x68\x6e\122\x65\x71\x75\145\x73\x74\163\x53\x69\147\x6e\x65\144");
        TA:
        $Yv = SAMLSPUtilities::xpQuery($vw, "\x2e\57\x73\x61\x6d\154\x5f\155\x65\164\x61\x64\141\x74\141\x3a\x49\104\120\x53\123\117\x44\145\x73\143\162\x69\160\164\x6f\x72");
        if (count($Yv) > 1) {
            goto I0;
        }
        if (empty($Yv)) {
            goto IU;
        }
        goto UB;
        I0:
        throw new Exception("\115\157\162\x65\x20\x74\x68\x61\x6e\40\157\156\x65\x20\74\x49\x44\x50\123\123\x4f\x44\145\x73\143\162\x69\x70\x74\x6f\162\76\40\x69\156\40\x3c\x45\156\164\151\164\x79\104\x65\x73\x63\162\x69\x70\164\157\162\76\56");
        goto UB;
        IU:
        throw new Exception("\115\x69\x73\x73\151\156\x67\x20\162\x65\x71\x75\151\162\x65\144\40\x3c\111\x44\120\123\x53\117\104\145\x73\143\162\x69\160\164\157\x72\x3e\x20\151\156\x20\74\x45\156\x74\151\164\x79\x44\145\163\x63\162\x69\x70\x74\157\162\x3e\x2e");
        UB:
        $xn = $Yv[0];
        $Hy = SAMLSPUtilities::xpQuery($vw, "\x2e\x2f\163\x61\x6d\154\x5f\x6d\145\x74\141\x64\x61\164\x61\x3a\x45\x78\164\x65\x6e\x73\151\x6f\156\163");
        if (!$Hy) {
            goto E2;
        }
        $this->parseInfo($xn);
        E2:
        $this->parseSSOService($xn);
        $this->parseSLOService($xn);
        $this->parsex509Certificate($xn);
    }
    private function parseInfo($vw)
    {
        $dj = SAMLSPUtilities::xpQuery($vw, "\56\57\155\x64\165\151\72\x55\x49\111\x6e\x66\x6f\57\x6d\144\x75\x69\72\x44\151\x73\x70\154\x61\171\x4e\x61\x6d\x65");
        foreach ($dj as $M7) {
            if (!($M7->hasAttribute("\170\155\x6c\x3a\154\x61\x6e\147") && $M7->getAttribute("\170\x6d\154\72\x6c\141\156\147") == "\145\156")) {
                goto Q5;
            }
            $this->idpName = $M7->textContent;
            Q5:
            jp:
        }
        Sh:
    }
    private function parseSSOService($vw)
    {
        $Pk = SAMLSPUtilities::xpQuery($vw, "\56\x2f\163\141\155\154\x5f\x6d\145\164\141\x64\x61\164\x61\72\123\151\156\147\x6c\145\x53\151\147\x6e\x4f\x6e\x53\x65\x72\x76\151\x63\x65");
        foreach ($Pk as $vm) {
            $hf = str_replace("\165\162\156\72\x6f\x61\163\x69\163\x3a\156\141\155\145\x73\x3a\x74\143\72\123\101\x4d\x4c\72\x32\x2e\x30\72\142\151\x6e\144\151\156\147\163\x3a", '', $vm->getAttribute("\102\151\156\x64\151\x6e\147"));
            $this->loginDetails = array_merge($this->loginDetails, array($hf => $vm->getAttribute("\x4c\157\143\141\x74\151\x6f\156")));
            O1:
        }
        h0:
    }
    private function parseSLOService($vw)
    {
        $jG = SAMLSPUtilities::xpQuery($vw, "\56\57\163\141\155\154\137\x6d\145\x74\x61\144\x61\x74\x61\72\x53\151\x6e\147\154\145\x4c\x6f\147\x6f\165\164\x53\x65\x72\x76\x69\143\145");
        foreach ($jG as $lv) {
            $hf = str_replace("\x75\162\156\72\x6f\141\163\x69\163\72\x6e\x61\155\x65\163\72\x74\143\x3a\123\x41\x4d\114\72\62\56\x30\x3a\142\x69\156\144\151\x6e\147\x73\x3a", '', $lv->getAttribute("\x42\151\156\x64\151\x6e\x67"));
            $this->logoutDetails = array_merge($this->logoutDetails, array($hf => $lv->getAttribute("\114\x6f\x63\x61\x74\x69\157\x6e")));
            BO:
        }
        Gi:
    }
    private function parsex509Certificate($vw)
    {
        foreach (SAMLSPUtilities::xpQuery($vw, "\x2e\x2f\163\x61\155\154\137\x6d\145\164\x61\144\141\164\x61\x3a\113\145\x79\104\x65\163\143\162\x69\x70\164\x6f\x72") as $xT) {
            if ($xT->hasAttribute("\x75\x73\145")) {
                goto k8;
            }
            $this->parseSigningCertificate($xT);
            goto EO;
            k8:
            if ($xT->getAttribute("\165\163\x65") == "\x65\x6e\x63\x72\x79\160\164\151\157\156") {
                goto tw;
            }
            $this->parseSigningCertificate($xT);
            goto sh;
            tw:
            $this->parseEncryptionCertificate($xT);
            sh:
            EO:
            Sr:
        }
        Cl:
    }
    private function parseSigningCertificate($vw)
    {
        $OG = SAMLSPUtilities::xpQuery($vw, "\x2e\x2f\144\163\72\113\x65\x79\x49\156\146\x6f\x2f\x64\x73\x3a\x58\x35\x30\x39\x44\x61\x74\141\x2f\x64\163\72\x58\x35\60\71\103\145\162\164\151\x66\x69\x63\x61\x74\x65");
        $bX = trim($OG[0]->textContent);
        $bX = str_replace(array("\xd", "\xa", "\11", "\40"), '', $bX);
        if (empty($OG)) {
            goto zf;
        }
        array_push($this->signingCertificate, SAMLSPUtilities::sanitize_certificate($bX));
        zf:
    }
    private function parseEncryptionCertificate($vw)
    {
        $OG = SAMLSPUtilities::xpQuery($vw, "\56\57\144\163\72\x4b\x65\171\x49\156\146\157\x2f\x64\163\72\x58\65\x30\71\x44\x61\164\x61\57\x64\x73\72\130\65\x30\x39\103\145\162\x74\151\146\151\x63\141\164\145");
        $bX = trim($OG[0]->textContent);
        $bX = str_replace(array("\xd", "\12", "\x9", "\40"), '', $bX);
        if (empty($OG)) {
            goto Dc;
        }
        array_push($this->encryptionCertificate, $bX);
        Dc:
    }
    public function getIdpName()
    {
        return $this->idpName;
    }
    public function getEntityID()
    {
        return $this->entityID;
    }
    public function getLoginURL($hf)
    {
        return $this->loginDetails[$hf];
    }
    public function getLogoutURL($hf)
    {
        return $this->logoutDetails[$hf];
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
