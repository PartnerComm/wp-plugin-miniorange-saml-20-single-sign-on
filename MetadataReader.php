<?php


include_once "\125\x74\151\154\151\164\x69\x65\163\x2e\x70\x68\160";
class IDPMetadataReader
{
    private $identityProviders;
    private $serviceProviders;
    public function __construct(DOMNode $aX = NULL)
    {
        $this->identityProviders = array();
        $this->serviceProviders = array();
        $e7 = SAMLSPUtilities::xpQuery($aX, "\x2e\x2f\x73\x61\x6d\x6c\x5f\x6d\145\164\x61\144\141\164\x61\x3a\105\156\164\x69\164\x69\145\x73\x44\x65\163\x63\162\151\x70\164\157\x72");
        if (!empty($e7)) {
            goto PV;
        }
        $Pf = SAMLSPUtilities::xpQuery($aX, "\56\x2f\x73\141\155\x6c\137\x6d\x65\x74\141\x64\141\x74\141\x3a\x45\x6e\x74\x69\x74\171\104\145\163\143\162\x69\160\x74\157\162");
        goto kG;
        PV:
        $Pf = SAMLSPUtilities::xpQuery($e7[0], "\56\57\x73\x61\x6d\154\x5f\155\x65\164\x61\x64\141\x74\141\x3a\105\156\x74\151\164\171\x44\x65\163\143\x72\x69\160\164\157\162");
        kG:
        foreach ($Pf as $He) {
            $Ne = SAMLSPUtilities::xpQuery($He, "\x2e\x2f\163\x61\155\x6c\x5f\x6d\145\x74\x61\144\x61\164\x61\72\111\104\120\123\123\x4f\104\x65\163\x63\x72\151\x70\x74\157\x72");
            if (!(isset($Ne) && !empty($Ne))) {
                goto lm;
            }
            array_push($this->identityProviders, new IdentityProviders($He));
            lm:
            rm:
        }
        nI:
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
    public function __construct(DOMElement $aX = NULL)
    {
        $this->idpName = '';
        $this->loginDetails = array();
        $this->logoutDetails = array();
        $this->signingCertificate = array();
        $this->encryptionCertificate = array();
        if (!$aX->hasAttribute("\x65\156\164\151\164\171\111\104")) {
            goto Vz;
        }
        $this->entityID = $aX->getAttribute("\x65\156\164\x69\164\x79\x49\104");
        Vz:
        if (!$aX->hasAttribute("\x57\141\156\x74\101\165\x74\150\x6e\x52\145\161\165\145\163\x74\163\123\x69\147\x6e\x65\144")) {
            goto jk;
        }
        $this->signedRequest = $aX->getAttribute("\x57\141\156\x74\101\x75\x74\x68\156\122\145\161\x75\x65\163\164\x73\x53\x69\147\156\145\144");
        jk:
        $Ne = SAMLSPUtilities::xpQuery($aX, "\x2e\x2f\163\x61\x6d\154\137\x6d\x65\x74\141\144\141\x74\141\x3a\x49\104\x50\123\123\117\x44\145\x73\143\x72\151\160\164\157\162");
        if (count($Ne) > 1) {
            goto TS;
        }
        if (empty($Ne)) {
            goto u3;
        }
        goto U6;
        TS:
        throw new Exception("\115\157\162\x65\x20\164\x68\x61\x6e\x20\x6f\x6e\145\40\74\x49\x44\120\x53\123\x4f\104\x65\163\x63\162\x69\160\x74\157\x72\76\x20\151\156\40\x3c\105\x6e\164\x69\x74\x79\x44\145\x73\x63\x72\x69\x70\164\x6f\162\76\56");
        goto U6;
        u3:
        throw new Exception("\x4d\x69\x73\x73\151\156\147\40\162\x65\x71\165\151\x72\x65\144\40\74\x49\104\120\x53\x53\117\x44\x65\163\x63\x72\151\160\x74\x6f\162\x3e\x20\151\156\x20\74\105\156\164\151\164\x79\x44\x65\163\143\x72\151\160\164\157\x72\76\x2e");
        U6:
        $TI = $Ne[0];
        $YX = SAMLSPUtilities::xpQuery($aX, "\x2e\57\x73\141\155\x6c\x5f\x6d\145\164\141\x64\x61\x74\x61\72\x45\x78\164\x65\x6e\x73\x69\157\156\x73");
        if (!$YX) {
            goto Dy;
        }
        $this->parseInfo($TI);
        Dy:
        $this->parseSSOService($TI);
        $this->parseSLOService($TI);
        $this->parsex509Certificate($TI);
    }
    private function parseInfo($aX)
    {
        $zw = SAMLSPUtilities::xpQuery($aX, "\56\x2f\155\144\165\x69\x3a\x55\x49\111\156\x66\157\57\155\144\x75\151\x3a\x44\x69\163\x70\x6c\x61\x79\x4e\x61\155\x65");
        foreach ($zw as $ly) {
            if (!($ly->hasAttribute("\x78\155\154\x3a\154\141\x6e\147") && $ly->getAttribute("\170\155\x6c\72\154\141\x6e\147") == "\145\x6e")) {
                goto K8;
            }
            $this->idpName = $ly->textContent;
            K8:
            v5:
        }
        QM:
    }
    private function parseSSOService($aX)
    {
        $s_ = SAMLSPUtilities::xpQuery($aX, "\x2e\57\163\141\155\x6c\137\155\145\x74\x61\x64\141\164\141\x3a\123\151\x6e\147\154\145\x53\x69\x67\156\117\156\x53\x65\162\x76\151\143\145");
        foreach ($s_ as $b2) {
            $df = str_replace("\165\162\x6e\x3a\x6f\141\x73\x69\x73\72\x6e\141\155\x65\x73\x3a\x74\x63\x3a\x53\101\115\114\72\x32\56\x30\72\142\x69\x6e\144\x69\x6e\x67\x73\72", '', $b2->getAttribute("\102\x69\156\x64\x69\x6e\x67"));
            $this->loginDetails = array_merge($this->loginDetails, array($df => $b2->getAttribute("\114\157\143\141\164\151\x6f\x6e")));
            Bb:
        }
        CJ:
    }
    private function parseSLOService($aX)
    {
        $f3 = SAMLSPUtilities::xpQuery($aX, "\x2e\57\163\x61\x6d\154\137\155\145\x74\141\x64\x61\164\x61\x3a\x53\x69\156\x67\x6c\x65\x4c\157\147\157\x75\164\x53\x65\x72\x76\x69\x63\145");
        if (!empty($f3)) {
            goto pJ;
        }
        $this->logoutDetails = array("\x48\x54\124\120\55\122\145\x64\x69\162\x65\x63\164" => '');
        goto tM;
        pJ:
        foreach ($f3 as $VV) {
            $df = str_replace("\x75\162\x6e\x3a\x6f\141\x73\x69\163\72\156\141\155\145\x73\72\164\x63\72\x53\101\x4d\x4c\x3a\x32\56\60\72\x62\151\156\144\151\156\147\x73\x3a", '', $VV->getAttribute("\x42\x69\x6e\144\151\156\x67"));
            $this->logoutDetails = array_merge($this->logoutDetails, array($df => $VV->getAttribute("\114\157\x63\141\164\x69\157\x6e")));
            j9:
        }
        vL:
        tM:
    }
    private function parsex509Certificate($aX)
    {
        foreach (SAMLSPUtilities::xpQuery($aX, "\x2e\57\x73\x61\x6d\154\137\x6d\145\164\141\144\x61\x74\x61\x3a\113\145\171\104\x65\163\x63\162\x69\x70\164\x6f\162") as $EV) {
            if ($EV->hasAttribute("\165\163\x65")) {
                goto kw;
            }
            $this->parseSigningCertificate($EV);
            goto hJ;
            kw:
            if ($EV->getAttribute("\165\163\145") == "\145\156\143\x72\171\160\x74\x69\157\x6e") {
                goto F2;
            }
            $this->parseSigningCertificate($EV);
            goto oX;
            F2:
            $this->parseEncryptionCertificate($EV);
            oX:
            hJ:
            Hw:
        }
        K1:
    }
    private function parseSigningCertificate($aX)
    {
        $F3 = SAMLSPUtilities::xpQuery($aX, "\x2e\57\144\x73\x3a\x4b\x65\171\111\x6e\146\157\57\144\163\72\130\x35\60\71\x44\141\x74\x61\x2f\144\163\x3a\130\x35\60\71\x43\x65\x72\x74\x69\146\x69\143\141\x74\x65");
        $xv = trim($F3[0]->textContent);
        $xv = str_replace(array("\xd", "\12", "\11", "\40"), '', $xv);
        if (empty($F3)) {
            goto uW;
        }
        array_push($this->signingCertificate, SAMLSPUtilities::sanitize_certificate($xv));
        uW:
    }
    private function parseEncryptionCertificate($aX)
    {
        $F3 = SAMLSPUtilities::xpQuery($aX, "\x2e\57\144\163\72\113\x65\171\111\x6e\146\157\x2f\144\163\72\130\65\x30\71\x44\x61\x74\x61\57\x64\x73\x3a\x58\x35\60\71\x43\x65\162\164\151\x66\x69\143\141\164\x65");
        $xv = trim($F3[0]->textContent);
        $xv = str_replace(array("\15", "\12", "\x9", "\x20"), '', $xv);
        if (empty($F3)) {
            goto dR;
        }
        array_push($this->encryptionCertificate, $xv);
        dR:
    }
    public function getIdpName()
    {
        return $this->idpName;
    }
    public function getEntityID()
    {
        return $this->entityID;
    }
    public function getLoginURL($df)
    {
        return $this->loginDetails[$df];
    }
    public function getLogoutURL($df)
    {
        return $this->logoutDetails[$df];
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
