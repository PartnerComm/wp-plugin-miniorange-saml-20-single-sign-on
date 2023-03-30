<?php


include_once 'Utilities.php';
class IDPMetadataReader
{
    private $identityProviders;
    private $serviceProviders;
    public function __construct(DOMNode $l3 = NULL)
    {
        $this->identityProviders = array();
        $this->serviceProviders = array();
        $v4 = SAMLSPUtilities::xpQuery($l3, "\x2e\x2f\163\x61\155\x6c\137\x6d\145\164\141\144\x61\164\141\x3a\x45\x6e\164\151\164\x69\x65\163\104\145\x73\143\162\x69\x70\164\157\162");
        if (!empty($v4)) {
            goto F_;
        }
        $la = SAMLSPUtilities::xpQuery($l3, "\56\57\163\x61\155\154\137\x6d\145\x74\141\x64\141\164\141\72\x45\156\x74\x69\x74\171\104\145\163\x63\x72\151\x70\x74\x6f\x72");
        goto Gh;
        F_:
        $la = SAMLSPUtilities::xpQuery($v4[0], "\56\57\x73\141\155\154\137\155\x65\x74\x61\x64\141\x74\x61\72\x45\156\x74\151\x74\x79\104\x65\x73\143\162\x69\x70\x74\x6f\162");
        Gh:
        foreach ($la as $W_) {
            $wX = SAMLSPUtilities::xpQuery($W_, "\56\x2f\x73\x61\155\154\x5f\155\x65\164\x61\144\141\164\141\72\111\x44\x50\x53\123\x4f\x44\x65\x73\143\x72\x69\x70\164\157\x72");
            if (empty($wX)) {
                goto Rr;
            }
            array_push($this->identityProviders, new IdentityProviders($W_));
            Rr:
            NR:
        }
        Tb:
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
    public function __construct(DOMElement $l3 = NULL)
    {
        $this->idpName = '';
        $this->loginDetails = array();
        $this->logoutDetails = array();
        $this->signingCertificate = array();
        $this->encryptionCertificate = array();
        if (!$l3->hasAttribute("\145\156\164\151\x74\x79\x49\x44")) {
            goto W9;
        }
        $this->entityID = $l3->getAttribute("\x65\x6e\x74\151\164\171\x49\x44");
        W9:
        if (!$l3->hasAttribute("\127\x61\x6e\x74\101\x75\x74\150\156\122\x65\161\165\x65\163\164\163\x53\x69\147\156\145\x64")) {
            goto i3;
        }
        $this->signedRequest = $l3->getAttribute("\127\x61\x6e\x74\101\x75\164\150\156\122\x65\161\165\145\163\164\163\x53\x69\x67\156\145\144");
        i3:
        $wX = SAMLSPUtilities::xpQuery($l3, "\x2e\x2f\163\x61\x6d\x6c\137\x6d\x65\164\x61\x64\141\164\x61\x3a\111\104\x50\123\x53\x4f\104\145\163\143\162\151\x70\x74\157\x72");
        if (count($wX) > 1) {
            goto cj;
        }
        if (empty($wX)) {
            goto nY;
        }
        goto o6;
        cj:
        throw new Exception("\115\x6f\x72\145\x20\x74\150\141\x6e\40\x6f\156\145\40\x3c\111\104\x50\123\123\117\x44\145\x73\143\x72\x69\x70\164\x6f\162\x3e\x20\x69\x6e\40\74\105\x6e\x74\151\x74\171\x44\145\163\x63\162\151\160\164\157\162\76\56");
        goto o6;
        nY:
        throw new Exception("\115\151\163\x73\x69\x6e\x67\40\x72\145\161\x75\151\162\x65\x64\x20\74\x49\x44\120\x53\x53\117\104\145\163\x63\x72\x69\160\x74\x6f\x72\76\40\x69\x6e\40\x3c\105\156\164\151\x74\171\x44\145\x73\143\162\x69\160\x74\157\162\76\x2e");
        o6:
        $oR = $wX[0];
        $Yx = SAMLSPUtilities::xpQuery($l3, "\56\57\163\x61\x6d\x6c\x5f\x6d\145\164\141\x64\141\164\x61\72\x45\x78\164\x65\x6e\163\151\x6f\x6e\163");
        if (!$Yx) {
            goto yX;
        }
        $this->parseInfo($oR);
        yX:
        $this->parseSSOService($oR);
        $this->parseSLOService($oR);
        $this->parsex509Certificate($oR);
    }
    private function parseInfo($l3)
    {
        $ZA = SAMLSPUtilities::xpQuery($l3, "\x2e\57\x6d\x64\x75\x69\72\125\x49\x49\156\x66\x6f\57\155\x64\x75\151\x3a\104\x69\x73\x70\x6c\141\171\116\141\x6d\145");
        foreach ($ZA as $YB) {
            if (!($YB->hasAttribute("\170\x6d\154\72\154\x61\156\147") && $YB->getAttribute("\170\155\154\x3a\x6c\141\x6e\147") == "\x65\x6e")) {
                goto j6;
            }
            $this->idpName = $YB->textContent;
            j6:
            ay:
        }
        qn:
    }
    private function parseSSOService($l3)
    {
        $Zi = SAMLSPUtilities::xpQuery($l3, "\x2e\57\x73\x61\155\154\x5f\x6d\x65\x74\x61\144\x61\x74\x61\x3a\x53\x69\x6e\x67\x6c\145\123\151\147\156\117\156\123\x65\162\166\151\x63\145");
        foreach ($Zi as $cu) {
            $HH = str_replace("\165\162\x6e\72\x6f\141\163\x69\163\x3a\x6e\141\155\145\163\x3a\164\x63\72\x53\101\x4d\114\72\62\x2e\x30\x3a\x62\x69\156\144\151\x6e\x67\x73\x3a", '', $cu->getAttribute("\x42\151\x6e\x64\151\x6e\x67"));
            $this->loginDetails = array_merge($this->loginDetails, array($HH => $cu->getAttribute("\114\157\x63\141\164\151\x6f\156")));
            DQ:
        }
        jT:
    }
    private function parseSLOService($l3)
    {
        $Xf = SAMLSPUtilities::xpQuery($l3, "\x2e\x2f\163\141\x6d\154\137\x6d\145\x74\x61\144\141\164\141\x3a\123\x69\156\147\154\145\x4c\x6f\147\157\165\164\x53\x65\x72\166\x69\143\x65");
        if (!empty($Xf)) {
            goto Ka;
        }
        $this->logoutDetails = array("\110\x54\x54\120\x2d\122\145\144\x69\162\145\143\x74" => '');
        goto UF;
        Ka:
        foreach ($Xf as $Fb) {
            $HH = str_replace("\165\x72\x6e\x3a\x6f\141\163\x69\163\x3a\156\141\x6d\145\163\72\x74\x63\72\123\x41\115\x4c\x3a\x32\x2e\x30\x3a\x62\x69\x6e\144\x69\x6e\x67\163\72", '', $Fb->getAttribute("\102\151\x6e\x64\x69\x6e\147"));
            $this->logoutDetails = array_merge($this->logoutDetails, array($HH => $Fb->getAttribute("\x4c\x6f\143\x61\164\x69\x6f\x6e")));
            Ri:
        }
        t_:
        UF:
    }
    private function parsex509Certificate($l3)
    {
        foreach (SAMLSPUtilities::xpQuery($l3, "\56\x2f\163\141\155\154\137\155\x65\x74\141\x64\141\x74\141\72\113\145\171\104\x65\163\143\x72\151\160\164\x6f\x72") as $rF) {
            if ($rF->hasAttribute("\165\x73\x65")) {
                goto H_;
            }
            $this->parseSigningCertificate($rF);
            goto F2;
            H_:
            if ($rF->getAttribute("\x75\163\x65") == "\x65\x6e\x63\162\x79\x70\164\x69\x6f\156") {
                goto Gg;
            }
            $this->parseSigningCertificate($rF);
            goto op;
            Gg:
            $this->parseEncryptionCertificate($rF);
            op:
            F2:
            MN:
        }
        F9:
    }
    private function parseSigningCertificate($l3)
    {
        $dy = SAMLSPUtilities::xpQuery($l3, "\x2e\57\144\x73\72\x4b\145\x79\111\x6e\146\157\57\x64\x73\x3a\130\65\60\x39\104\141\164\141\x2f\144\163\72\x58\x35\x30\x39\x43\145\x72\x74\151\x66\151\143\141\x74\x65");
        $UN = trim($dy[0]->textContent);
        $UN = str_replace(array("\xd", "\xa", "\11", "\40"), '', $UN);
        if (empty($dy)) {
            goto XH;
        }
        array_push($this->signingCertificate, SAMLSPUtilities::sanitize_certificate($UN));
        XH:
    }
    private function parseEncryptionCertificate($l3)
    {
        $dy = SAMLSPUtilities::xpQuery($l3, "\56\x2f\x64\163\x3a\x4b\145\171\111\x6e\x66\x6f\x2f\x64\163\x3a\130\65\x30\x39\x44\x61\164\141\x2f\x64\x73\x3a\x58\x35\x30\71\x43\x65\x72\164\151\x66\151\x63\141\x74\x65");
        $UN = trim($dy[0]->textContent);
        $UN = str_replace(array("\xd", "\xa", "\11", "\40"), '', $UN);
        if (empty($dy)) {
            goto JA;
        }
        array_push($this->encryptionCertificate, $UN);
        JA:
    }
    public function getIdpName()
    {
        return $this->idpName;
    }
    public function getEntityID()
    {
        return $this->entityID;
    }
    public function getLoginURL($HH)
    {
        return $this->loginDetails[$HH];
    }
    public function getLogoutURL($HH)
    {
        return $this->logoutDetails[$HH];
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
