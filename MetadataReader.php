<?php


include_once "\125\164\151\154\151\x74\151\145\x73\56\x70\x68\160";
class IDPMetadataReader
{
    private $identityProviders;
    private $serviceProviders;
    public function __construct(DOMNode $BO = NULL)
    {
        $this->identityProviders = array();
        $this->serviceProviders = array();
        $wB = SAMLSPUtilities::xpQuery($BO, "\56\x2f\163\141\155\154\137\x6d\x65\x74\141\x64\141\164\x61\x3a\x45\156\164\151\164\x79\104\145\x73\143\162\151\x70\164\157\162");
        foreach ($wB as $Fy) {
            $qA = SAMLSPUtilities::xpQuery($Fy, "\56\x2f\163\141\155\154\x5f\155\x65\164\x61\x64\141\164\141\72\x49\x44\x50\x53\123\x4f\x44\145\163\143\162\151\160\x74\157\x72");
            if (!(isset($qA) && !empty($qA))) {
                goto W1;
            }
            array_push($this->identityProviders, new IdentityProviders($Fy));
            W1:
            NE:
        }
        Yu:
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
    public function __construct(DOMElement $BO = NULL)
    {
        $this->idpName = '';
        $this->loginDetails = array();
        $this->logoutDetails = array();
        $this->signingCertificate = array();
        $this->encryptionCertificate = array();
        if (!$BO->hasAttribute("\x65\x6e\164\151\x74\171\111\104")) {
            goto rX;
        }
        $this->entityID = $BO->getAttribute("\x65\156\164\x69\x74\171\x49\104");
        rX:
        if (!$BO->hasAttribute("\127\x61\x6e\x74\101\x75\x74\150\x6e\122\145\161\165\x65\x73\164\163\x53\151\x67\x6e\145\144")) {
            goto S3;
        }
        $this->signedRequest = $BO->getAttribute("\x57\x61\156\164\101\165\164\150\x6e\122\145\x71\165\145\163\x74\x73\123\x69\147\156\145\144");
        S3:
        $qA = SAMLSPUtilities::xpQuery($BO, "\x2e\x2f\x73\141\x6d\x6c\x5f\155\145\164\x61\144\x61\x74\141\x3a\111\104\x50\x53\x53\x4f\104\145\163\143\x72\151\x70\164\x6f\162");
        if (count($qA) > 1) {
            goto Yc;
        }
        if (empty($qA)) {
            goto vz;
        }
        goto R8;
        Yc:
        throw new Exception("\x4d\x6f\162\145\x20\164\150\141\x6e\40\x6f\x6e\x65\40\74\111\104\x50\123\123\117\104\145\163\x63\162\151\160\x74\157\162\x3e\40\x69\156\x20\x3c\x45\x6e\x74\x69\x74\x79\x44\x65\163\x63\162\x69\160\x74\157\x72\x3e\x2e");
        goto R8;
        vz:
        throw new Exception("\115\151\x73\x73\151\x6e\x67\40\162\x65\x71\x75\151\162\x65\x64\x20\74\111\x44\120\123\123\117\104\145\x73\143\x72\151\160\164\157\x72\x3e\x20\151\156\x20\74\x45\x6e\x74\x69\x74\x79\x44\145\x73\143\x72\x69\160\164\157\162\x3e\x2e");
        R8:
        $Jd = $qA[0];
        $u5 = SAMLSPUtilities::xpQuery($BO, "\56\57\x73\141\x6d\154\137\x6d\x65\x74\141\144\141\x74\x61\72\105\170\x74\x65\x6e\163\x69\x6f\x6e\163");
        if (!$u5) {
            goto eC;
        }
        $this->parseInfo($Jd);
        eC:
        $this->parseSSOService($Jd);
        $this->parseSLOService($Jd);
        $this->parsex509Certificate($Jd);
    }
    private function parseInfo($BO)
    {
        $Et = SAMLSPUtilities::xpQuery($BO, "\x2e\57\x6d\144\x75\x69\x3a\x55\x49\111\x6e\146\157\x2f\155\x64\x75\151\72\x44\x69\x73\x70\x6c\141\x79\116\141\x6d\x65");
        foreach ($Et as $vd) {
            if (!($vd->hasAttribute("\x78\x6d\154\x3a\154\141\x6e\147") && $vd->getAttribute("\170\155\154\72\x6c\x61\156\147") == "\x65\156")) {
                goto RP;
            }
            $this->idpName = $vd->textContent;
            RP:
            a6:
        }
        FM:
    }
    private function parseSSOService($BO)
    {
        $jm = SAMLSPUtilities::xpQuery($BO, "\56\x2f\163\141\x6d\x6c\x5f\x6d\x65\164\141\144\141\164\x61\x3a\123\x69\x6e\x67\x6c\x65\x53\151\147\156\x4f\156\x53\x65\162\166\x69\143\x65");
        foreach ($jm as $pM) {
            $Yv = str_replace("\x75\162\x6e\x3a\157\141\x73\151\163\72\156\x61\155\145\163\72\x74\143\x3a\123\x41\x4d\x4c\x3a\x32\56\x30\x3a\x62\x69\x6e\x64\x69\x6e\x67\163\x3a", '', $pM->getAttribute("\102\151\x6e\x64\151\x6e\147"));
            $this->loginDetails = array_merge($this->loginDetails, array($Yv => $pM->getAttribute("\114\157\x63\x61\164\151\157\156")));
            Ci:
        }
        Sg:
    }
    private function parseSLOService($BO)
    {
        $vH = SAMLSPUtilities::xpQuery($BO, "\56\57\163\141\x6d\x6c\x5f\x6d\x65\x74\x61\144\x61\x74\141\72\x53\x69\x6e\147\x6c\145\114\x6f\x67\157\x75\x74\x53\145\x72\x76\151\143\145");
        if (!empty($vH)) {
            goto Zp;
        }
        $this->logoutDetails = array("\x48\x54\124\x50\55\122\145\144\x69\162\x65\x63\164" => '');
        goto D_;
        Zp:
        foreach ($vH as $Ku) {
            $Yv = str_replace("\x75\162\x6e\72\157\141\x73\x69\x73\72\x6e\141\155\x65\163\72\x74\x63\72\123\x41\115\x4c\x3a\62\x2e\x30\72\x62\x69\156\144\x69\x6e\x67\x73\x3a", '', $Ku->getAttribute("\102\x69\156\x64\151\x6e\147"));
            $this->logoutDetails = array_merge($this->logoutDetails, array($Yv => $Ku->getAttribute("\x4c\x6f\x63\141\164\151\157\156")));
            Dr:
        }
        NN:
        D_:
    }
    private function parsex509Certificate($BO)
    {
        foreach (SAMLSPUtilities::xpQuery($BO, "\56\x2f\x73\141\155\154\x5f\x6d\145\164\x61\x64\141\x74\x61\72\113\x65\x79\x44\x65\x73\143\x72\x69\x70\x74\157\162") as $OW) {
            if ($OW->hasAttribute("\x75\x73\145")) {
                goto qW;
            }
            $this->parseSigningCertificate($OW);
            goto bN;
            qW:
            if ($OW->getAttribute("\x75\x73\x65") == "\x65\156\143\x72\171\x70\164\151\157\x6e") {
                goto Ri;
            }
            $this->parseSigningCertificate($OW);
            goto DG;
            Ri:
            $this->parseEncryptionCertificate($OW);
            DG:
            bN:
            WW:
        }
        qF:
    }
    private function parseSigningCertificate($BO)
    {
        $pc = SAMLSPUtilities::xpQuery($BO, "\56\57\144\x73\x3a\113\145\x79\111\156\146\x6f\57\x64\163\x3a\130\x35\x30\x39\x44\x61\x74\x61\57\x64\x73\72\x58\x35\60\x39\x43\145\162\164\x69\146\151\x63\141\x74\145");
        $Mz = trim($pc[0]->textContent);
        $Mz = str_replace(array("\15", "\xa", "\x9", "\x20"), '', $Mz);
        if (empty($pc)) {
            goto OZ;
        }
        array_push($this->signingCertificate, SAMLSPUtilities::sanitize_certificate($Mz));
        OZ:
    }
    private function parseEncryptionCertificate($BO)
    {
        $pc = SAMLSPUtilities::xpQuery($BO, "\56\57\144\163\72\113\x65\171\x49\156\x66\157\x2f\x64\163\72\130\x35\60\71\104\x61\x74\141\57\x64\x73\x3a\x58\65\x30\71\x43\145\162\164\151\x66\151\x63\141\x74\x65");
        $Mz = trim($pc[0]->textContent);
        $Mz = str_replace(array("\xd", "\12", "\x9", "\x20"), '', $Mz);
        if (empty($pc)) {
            goto kD;
        }
        array_push($this->encryptionCertificate, $Mz);
        kD:
    }
    public function getIdpName()
    {
        return $this->idpName;
    }
    public function getEntityID()
    {
        return $this->entityID;
    }
    public function getLoginURL($Yv)
    {
        return $this->loginDetails[$Yv];
    }
    public function getLogoutURL($Yv)
    {
        return $this->logoutDetails[$Yv];
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
