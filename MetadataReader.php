<?php


include_once "\x55\x74\x69\154\x69\x74\151\x65\163\56\160\150\160";
class IDPMetadataReader
{
    private $identityProviders;
    private $serviceProviders;
    public function __construct(DOMNode $wI = NULL)
    {
        $this->identityProviders = array();
        $this->serviceProviders = array();
        $W0 = SAMLSPUtilities::xpQuery($wI, "\x2e\x2f\x73\141\155\x6c\137\155\145\164\x61\x64\x61\164\141\72\105\x6e\164\151\x74\151\x65\163\x44\145\x73\143\162\151\x70\x74\157\x72");
        if (!empty($W0)) {
            goto fM;
        }
        $aX = SAMLSPUtilities::xpQuery($wI, "\x2e\x2f\163\x61\155\x6c\137\155\145\x74\x61\x64\141\164\x61\72\x45\x6e\164\151\x74\171\104\145\x73\143\162\x69\160\164\x6f\162");
        goto P4;
        fM:
        $aX = SAMLSPUtilities::xpQuery($W0[0], "\x2e\57\x73\x61\155\x6c\x5f\x6d\x65\164\141\x64\x61\164\141\x3a\105\x6e\164\151\164\x79\x44\145\163\x63\x72\151\160\x74\x6f\162");
        P4:
        foreach ($aX as $Hz) {
            $M3 = SAMLSPUtilities::xpQuery($Hz, "\x2e\57\x73\x61\155\x6c\x5f\155\145\x74\x61\x64\141\164\x61\72\x49\104\x50\x53\x53\x4f\104\145\163\x63\162\x69\160\164\157\162");
            if (!(isset($M3) && !empty($M3))) {
                goto cc;
            }
            array_push($this->identityProviders, new IdentityProviders($Hz));
            cc:
            fm:
        }
        Pj:
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
    public function __construct(DOMElement $wI = NULL)
    {
        $this->idpName = '';
        $this->loginDetails = array();
        $this->logoutDetails = array();
        $this->signingCertificate = array();
        $this->encryptionCertificate = array();
        if (!$wI->hasAttribute("\x65\x6e\x74\x69\x74\x79\111\x44")) {
            goto ht;
        }
        $this->entityID = $wI->getAttribute("\145\156\164\151\164\x79\111\x44");
        ht:
        if (!$wI->hasAttribute("\127\x61\x6e\x74\x41\165\x74\x68\156\122\x65\x71\x75\x65\x73\164\x73\123\151\x67\156\145\x64")) {
            goto w0;
        }
        $this->signedRequest = $wI->getAttribute("\x57\x61\x6e\x74\x41\165\x74\x68\x6e\122\x65\x71\165\x65\163\164\x73\x53\151\147\x6e\145\x64");
        w0:
        $M3 = SAMLSPUtilities::xpQuery($wI, "\x2e\x2f\x73\141\155\x6c\137\x6d\145\164\x61\144\141\x74\141\72\111\104\x50\123\x53\x4f\x44\145\x73\143\x72\151\x70\x74\x6f\162");
        if (count($M3) > 1) {
            goto y7;
        }
        if (empty($M3)) {
            goto dz;
        }
        goto Sk;
        y7:
        throw new Exception("\x4d\x6f\x72\145\x20\164\x68\x61\156\x20\x6f\156\145\40\74\111\x44\120\x53\123\117\x44\145\163\x63\x72\x69\160\x74\157\162\x3e\x20\x69\x6e\40\74\x45\156\x74\x69\164\171\104\145\x73\x63\162\x69\x70\x74\x6f\162\76\x2e");
        goto Sk;
        dz:
        throw new Exception("\x4d\x69\163\163\151\156\147\x20\162\x65\161\x75\x69\162\145\144\40\x3c\111\x44\x50\x53\x53\x4f\x44\x65\x73\143\x72\x69\160\164\x6f\x72\76\40\x69\156\40\74\x45\x6e\x74\x69\x74\x79\104\x65\x73\143\x72\151\x70\x74\x6f\x72\76\56");
        Sk:
        $HZ = $M3[0];
        $KY = SAMLSPUtilities::xpQuery($wI, "\x2e\57\x73\141\x6d\x6c\x5f\155\145\164\141\x64\141\164\x61\x3a\x45\x78\x74\x65\x6e\163\151\x6f\156\x73");
        if (!$KY) {
            goto X2;
        }
        $this->parseInfo($HZ);
        X2:
        $this->parseSSOService($HZ);
        $this->parseSLOService($HZ);
        $this->parsex509Certificate($HZ);
    }
    private function parseInfo($wI)
    {
        $od = SAMLSPUtilities::xpQuery($wI, "\56\x2f\155\x64\165\151\x3a\125\x49\111\x6e\x66\157\57\155\144\x75\151\72\x44\151\x73\x70\154\x61\x79\x4e\x61\155\x65");
        foreach ($od as $JI) {
            if (!($JI->hasAttribute("\170\x6d\x6c\x3a\x6c\x61\x6e\147") && $JI->getAttribute("\170\155\154\72\154\x61\156\x67") == "\145\x6e")) {
                goto NL;
            }
            $this->idpName = $JI->textContent;
            NL:
            Is:
        }
        Md:
    }
    private function parseSSOService($wI)
    {
        $ey = SAMLSPUtilities::xpQuery($wI, "\56\57\163\x61\x6d\154\x5f\x6d\145\x74\141\144\x61\164\x61\72\x53\151\156\x67\x6c\145\123\151\147\156\x4f\156\x53\x65\x72\x76\151\143\x65");
        foreach ($ey as $Gx) {
            $cb = str_replace("\165\x72\156\x3a\x6f\141\x73\151\x73\72\156\x61\x6d\145\163\72\164\x63\x3a\123\x41\115\x4c\x3a\62\x2e\60\x3a\142\x69\x6e\144\151\156\147\x73\x3a", '', $Gx->getAttribute("\102\x69\156\144\151\156\x67"));
            $this->loginDetails = array_merge($this->loginDetails, array($cb => $Gx->getAttribute("\114\157\x63\141\x74\151\x6f\156")));
            Ph:
        }
        Le:
    }
    private function parseSLOService($wI)
    {
        $sa = SAMLSPUtilities::xpQuery($wI, "\x2e\57\163\x61\155\x6c\137\x6d\x65\x74\x61\144\x61\x74\x61\72\x53\x69\156\x67\x6c\145\x4c\x6f\x67\157\165\164\123\x65\x72\166\151\143\x65");
        if (!empty($sa)) {
            goto IU;
        }
        $this->logoutDetails = array("\110\x54\124\x50\55\122\x65\x64\151\x72\x65\x63\164" => '');
        goto GX;
        IU:
        foreach ($sa as $VH) {
            $cb = str_replace("\165\x72\156\x3a\x6f\x61\x73\x69\163\72\156\x61\x6d\145\163\x3a\164\143\72\123\101\115\114\72\62\x2e\x30\x3a\x62\151\x6e\x64\x69\x6e\x67\163\x3a", '', $VH->getAttribute("\102\x69\x6e\144\x69\x6e\147"));
            $this->logoutDetails = array_merge($this->logoutDetails, array($cb => $VH->getAttribute("\x4c\x6f\143\x61\x74\x69\x6f\x6e")));
            u4:
        }
        k1:
        GX:
    }
    private function parsex509Certificate($wI)
    {
        foreach (SAMLSPUtilities::xpQuery($wI, "\56\57\x73\141\x6d\x6c\137\x6d\145\164\141\x64\x61\x74\x61\72\113\145\x79\x44\x65\163\143\x72\151\160\x74\157\162") as $AK) {
            if ($AK->hasAttribute("\x75\163\145")) {
                goto qd;
            }
            $this->parseSigningCertificate($AK);
            goto K_;
            qd:
            if ($AK->getAttribute("\165\163\145") == "\x65\x6e\x63\162\x79\x70\x74\x69\x6f\x6e") {
                goto CB;
            }
            $this->parseSigningCertificate($AK);
            goto Oq;
            CB:
            $this->parseEncryptionCertificate($AK);
            Oq:
            K_:
            pN:
        }
        yq:
    }
    private function parseSigningCertificate($wI)
    {
        $N9 = SAMLSPUtilities::xpQuery($wI, "\56\x2f\144\163\x3a\x4b\145\x79\x49\x6e\x66\x6f\x2f\144\x73\x3a\x58\65\60\71\x44\141\x74\141\57\x64\163\x3a\x58\x35\x30\x39\103\145\x72\x74\151\146\x69\143\141\x74\x65");
        $BI = trim($N9[0]->textContent);
        $BI = str_replace(array("\xd", "\12", "\x9", "\x20"), '', $BI);
        if (empty($N9)) {
            goto kr;
        }
        array_push($this->signingCertificate, SAMLSPUtilities::sanitize_certificate($BI));
        kr:
    }
    private function parseEncryptionCertificate($wI)
    {
        $N9 = SAMLSPUtilities::xpQuery($wI, "\56\x2f\144\163\72\113\145\x79\x49\x6e\146\157\x2f\144\x73\72\x58\65\60\x39\x44\x61\x74\141\57\144\x73\72\x58\x35\60\x39\x43\145\162\x74\151\x66\x69\x63\141\164\145");
        $BI = trim($N9[0]->textContent);
        $BI = str_replace(array("\xd", "\xa", "\11", "\40"), '', $BI);
        if (empty($N9)) {
            goto CD;
        }
        array_push($this->encryptionCertificate, $BI);
        CD:
    }
    public function getIdpName()
    {
        return $this->idpName;
    }
    public function getEntityID()
    {
        return $this->entityID;
    }
    public function getLoginURL($cb)
    {
        return $this->loginDetails[$cb];
    }
    public function getLogoutURL($cb)
    {
        return $this->logoutDetails[$cb];
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
