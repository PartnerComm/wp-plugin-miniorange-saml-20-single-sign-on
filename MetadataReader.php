<?php


include_once "\x55\164\151\154\x69\x74\x69\145\x73\56\160\150\x70";
class IDPMetadataReader
{
    private $identityProviders;
    private $serviceProviders;
    public function __construct(DOMNode $DG = NULL)
    {
        $this->identityProviders = array();
        $this->serviceProviders = array();
        $OI = SAMLSPUtilities::xpQuery($DG, "\x2e\x2f\x73\141\155\154\x5f\155\145\x74\141\x64\x61\164\141\72\105\156\164\x69\164\x69\145\163\104\x65\163\x63\x72\x69\x70\164\x6f\162");
        if (!empty($OI)) {
            goto P2w;
        }
        $I4 = SAMLSPUtilities::xpQuery($DG, "\56\x2f\163\x61\x6d\x6c\137\155\145\x74\x61\x64\141\x74\x61\x3a\x45\x6e\164\151\164\x79\104\x65\x73\143\162\151\160\x74\157\x72");
        goto kNl;
        P2w:
        $I4 = SAMLSPUtilities::xpQuery($OI[0], "\x2e\x2f\x73\x61\155\x6c\137\x6d\x65\164\141\144\x61\x74\x61\72\105\x6e\164\151\164\x79\104\x65\163\143\x72\151\160\x74\x6f\162");
        kNl:
        foreach ($I4 as $o1) {
            $x3 = SAMLSPUtilities::xpQuery($o1, "\56\x2f\163\x61\x6d\154\x5f\x6d\x65\164\x61\144\x61\164\x61\72\x49\104\120\123\x53\117\104\x65\163\x63\x72\x69\160\164\x6f\162");
            if (!(isset($x3) && !empty($x3))) {
                goto UFg;
            }
            array_push($this->identityProviders, new IdentityProviders($o1));
            UFg:
            aIM:
        }
        rLg:
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
    public function __construct(DOMElement $DG = NULL)
    {
        $this->idpName = '';
        $this->loginDetails = array();
        $this->logoutDetails = array();
        $this->signingCertificate = array();
        $this->encryptionCertificate = array();
        if (!$DG->hasAttribute("\x65\x6e\x74\151\164\171\x49\104")) {
            goto Uqn;
        }
        $this->entityID = $DG->getAttribute("\x65\156\x74\x69\164\171\x49\x44");
        Uqn:
        if (!$DG->hasAttribute("\x57\x61\156\164\x41\165\164\150\156\x52\x65\161\165\145\163\164\x73\x53\x69\147\156\x65\144")) {
            goto SXJ;
        }
        $this->signedRequest = $DG->getAttribute("\127\141\156\164\101\x75\164\150\x6e\x52\x65\161\x75\145\x73\164\x73\123\x69\147\156\x65\x64");
        SXJ:
        $x3 = SAMLSPUtilities::xpQuery($DG, "\x2e\57\x73\141\155\x6c\x5f\155\x65\164\x61\x64\x61\164\141\72\x49\104\120\x53\x53\117\x44\x65\x73\143\162\x69\x70\164\x6f\162");
        if (count($x3) > 1) {
            goto k_W;
        }
        if (empty($x3)) {
            goto qg_;
        }
        goto V6L;
        k_W:
        throw new Exception("\x4d\157\162\x65\x20\x74\x68\141\156\40\x6f\x6e\145\x20\x3c\111\104\x50\x53\123\x4f\x44\x65\x73\x63\162\151\x70\x74\x6f\x72\76\40\151\156\40\x3c\x45\156\164\x69\164\171\x44\145\x73\143\162\151\160\x74\157\x72\x3e\56");
        goto V6L;
        qg_:
        throw new Exception("\115\151\163\163\x69\x6e\147\40\162\145\x71\x75\151\x72\145\144\40\x3c\111\x44\x50\x53\x53\x4f\104\145\x73\x63\162\151\x70\164\157\x72\76\40\x69\156\x20\74\x45\156\x74\151\164\171\x44\x65\x73\143\x72\151\x70\164\x6f\x72\76\x2e");
        V6L:
        $JK = $x3[0];
        $Da = SAMLSPUtilities::xpQuery($DG, "\x2e\x2f\163\141\x6d\x6c\x5f\155\145\164\x61\x64\141\x74\141\72\105\170\164\145\156\x73\151\x6f\156\x73");
        if (!$Da) {
            goto d_F;
        }
        $this->parseInfo($JK);
        d_F:
        $this->parseSSOService($JK);
        $this->parseSLOService($JK);
        $this->parsex509Certificate($JK);
    }
    private function parseInfo($DG)
    {
        $oD = SAMLSPUtilities::xpQuery($DG, "\x2e\x2f\x6d\x64\165\x69\x3a\125\111\x49\156\x66\157\x2f\155\x64\x75\151\x3a\104\x69\163\160\154\x61\171\116\x61\155\145");
        foreach ($oD as $Ze) {
            if (!($Ze->hasAttribute("\x78\155\154\72\154\x61\x6e\x67") && $Ze->getAttribute("\x78\155\x6c\72\154\x61\x6e\147") == "\145\x6e")) {
                goto ZI7;
            }
            $this->idpName = $Ze->textContent;
            ZI7:
            ya_:
        }
        sQl:
    }
    private function parseSSOService($DG)
    {
        $Jw = SAMLSPUtilities::xpQuery($DG, "\56\x2f\163\141\x6d\154\137\155\145\x74\x61\x64\141\164\141\x3a\123\151\156\147\x6c\145\x53\x69\x67\x6e\x4f\156\x53\x65\x72\x76\x69\x63\145");
        foreach ($Jw as $RU) {
            $SE = str_replace("\165\162\156\72\157\141\163\x69\x73\72\x6e\x61\x6d\145\163\x3a\x74\x63\x3a\123\101\x4d\x4c\x3a\x32\56\x30\72\x62\151\156\x64\151\x6e\147\x73\x3a", '', $RU->getAttribute("\102\151\156\144\x69\156\x67"));
            $this->loginDetails = array_merge($this->loginDetails, array($SE => $RU->getAttribute("\x4c\157\x63\141\x74\151\x6f\x6e")));
            TbW:
        }
        xmj:
    }
    private function parseSLOService($DG)
    {
        $zS = SAMLSPUtilities::xpQuery($DG, "\56\57\163\141\155\x6c\x5f\x6d\x65\x74\x61\x64\x61\164\x61\x3a\123\x69\156\x67\154\145\x4c\157\x67\x6f\165\164\x53\145\x72\166\x69\x63\x65");
        if (!empty($zS)) {
            goto TsG;
        }
        $this->logoutDetails = array("\x48\x54\124\x50\x2d\122\145\x64\x69\x72\145\143\164" => '');
        goto HJn;
        TsG:
        foreach ($zS as $kG) {
            $SE = str_replace("\x75\162\x6e\x3a\x6f\x61\163\151\163\72\156\141\155\145\x73\72\x74\143\72\x53\x41\x4d\114\x3a\62\56\60\72\x62\151\x6e\144\151\156\x67\163\x3a", '', $kG->getAttribute("\x42\151\x6e\x64\151\156\147"));
            $this->logoutDetails = array_merge($this->logoutDetails, array($SE => $kG->getAttribute("\114\x6f\x63\141\x74\151\x6f\x6e")));
            PAW:
        }
        VAJ:
        HJn:
    }
    private function parsex509Certificate($DG)
    {
        foreach (SAMLSPUtilities::xpQuery($DG, "\x2e\57\163\x61\x6d\x6c\137\155\145\164\x61\x64\x61\x74\141\x3a\113\145\171\104\x65\x73\x63\x72\x69\x70\x74\157\x72") as $Yd) {
            if ($Yd->hasAttribute("\165\x73\x65")) {
                goto KHe;
            }
            $this->parseSigningCertificate($Yd);
            goto C4O;
            KHe:
            if ($Yd->getAttribute("\x75\x73\x65") == "\x65\x6e\143\162\171\160\164\x69\157\156") {
                goto wON;
            }
            $this->parseSigningCertificate($Yd);
            goto WkK;
            wON:
            $this->parseEncryptionCertificate($Yd);
            WkK:
            C4O:
            fWc:
        }
        E24:
    }
    private function parseSigningCertificate($DG)
    {
        $gD = SAMLSPUtilities::xpQuery($DG, "\x2e\57\144\163\72\113\x65\x79\x49\156\x66\157\x2f\x64\x73\x3a\x58\x35\x30\71\x44\x61\x74\x61\57\144\163\72\130\65\x30\71\x43\145\x72\x74\x69\146\x69\x63\141\164\x65");
        $T9 = trim($gD[0]->textContent);
        $T9 = str_replace(array("\15", "\xa", "\11", "\40"), '', $T9);
        if (empty($gD)) {
            goto Cfu;
        }
        array_push($this->signingCertificate, SAMLSPUtilities::sanitize_certificate($T9));
        Cfu:
    }
    private function parseEncryptionCertificate($DG)
    {
        $gD = SAMLSPUtilities::xpQuery($DG, "\x2e\57\x64\163\72\113\145\171\x49\156\146\x6f\x2f\x64\163\72\x58\x35\x30\x39\104\141\164\141\x2f\144\163\72\x58\x35\60\x39\x43\145\162\x74\151\x66\151\x63\141\164\x65");
        $T9 = trim($gD[0]->textContent);
        $T9 = str_replace(array("\15", "\12", "\11", "\40"), '', $T9);
        if (empty($gD)) {
            goto iR3;
        }
        array_push($this->encryptionCertificate, $T9);
        iR3:
    }
    public function getIdpName()
    {
        return $this->idpName;
    }
    public function getEntityID()
    {
        return $this->entityID;
    }
    public function getLoginURL($SE)
    {
        return $this->loginDetails[$SE];
    }
    public function getLogoutURL($SE)
    {
        return $this->logoutDetails[$SE];
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
