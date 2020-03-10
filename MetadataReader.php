<?php


include_once "\125\164\151\154\x69\x74\151\x65\x73\56\160\150\x70";
class IDPMetadataReader
{
    private $identityProviders;
    private $serviceProviders;
    public function __construct(DOMNode $Ip = NULL)
    {
        $this->identityProviders = array();
        $this->serviceProviders = array();
        $Gr = SAMLSPUtilities::xpQuery($Ip, "\56\x2f\163\141\x6d\x6c\x5f\x6d\145\x74\141\144\x61\x74\141\72\105\156\164\151\x74\x79\x44\x65\163\143\162\x69\x70\x74\x6f\162");
        foreach ($Gr as $LA) {
            $Fi = SAMLSPUtilities::xpQuery($LA, "\x2e\57\x73\141\155\x6c\137\x6d\145\x74\141\144\x61\164\141\72\111\x44\120\123\x53\117\104\x65\x73\143\162\151\x70\x74\157\x72");
            if (!(isset($Fi) && !empty($Fi))) {
                goto GqL;
            }
            array_push($this->identityProviders, new IdentityProviders($LA));
            GqL:
            XAd:
        }
        k3N:
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
    public function __construct(DOMElement $Ip = NULL)
    {
        $this->idpName = '';
        $this->loginDetails = array();
        $this->logoutDetails = array();
        $this->signingCertificate = array();
        $this->encryptionCertificate = array();
        if (!$Ip->hasAttribute("\145\x6e\x74\151\164\x79\111\104")) {
            goto Ijq;
        }
        $this->entityID = $Ip->getAttribute("\145\156\x74\x69\164\x79\x49\x44");
        Ijq:
        if (!$Ip->hasAttribute("\x57\x61\x6e\x74\x41\x75\164\x68\x6e\x52\x65\x71\x75\x65\x73\164\x73\x53\151\147\156\x65\144")) {
            goto s14;
        }
        $this->signedRequest = $Ip->getAttribute("\x57\x61\x6e\x74\101\x75\164\x68\x6e\x52\x65\x71\x75\x65\x73\164\x73\123\x69\x67\156\145\144");
        s14:
        $Fi = SAMLSPUtilities::xpQuery($Ip, "\56\x2f\163\x61\155\154\x5f\155\145\164\141\x64\x61\x74\x61\72\111\x44\120\x53\123\x4f\104\145\163\143\162\151\160\164\157\162");
        if (count($Fi) > 1) {
            goto m2d;
        }
        if (empty($Fi)) {
            goto shx;
        }
        goto SAk;
        m2d:
        throw new Exception("\x4d\x6f\x72\x65\x20\164\150\x61\156\x20\157\156\145\40\74\x49\x44\120\x53\x53\x4f\x44\x65\x73\x63\162\151\160\164\157\162\76\40\x69\156\x20\74\x45\x6e\x74\x69\164\x79\104\145\163\143\162\x69\x70\164\157\x72\x3e\56");
        goto SAk;
        shx:
        throw new Exception("\x4d\x69\163\x73\x69\x6e\147\x20\162\145\161\x75\151\x72\145\144\x20\x3c\111\x44\120\123\x53\x4f\104\x65\163\x63\x72\x69\160\164\x6f\162\x3e\x20\x69\x6e\40\74\x45\x6e\164\151\164\171\104\145\x73\x63\x72\x69\160\164\157\x72\76\x2e");
        SAk:
        $Vu = $Fi[0];
        $FZ = SAMLSPUtilities::xpQuery($Ip, "\56\57\x73\x61\155\154\x5f\155\145\164\141\144\141\164\141\72\x45\x78\164\145\x6e\163\151\x6f\156\x73");
        if (!$FZ) {
            goto cg_;
        }
        $this->parseInfo($Vu);
        cg_:
        $this->parseSSOService($Vu);
        $this->parseSLOService($Vu);
        $this->parsex509Certificate($Vu);
    }
    private function parseInfo($Ip)
    {
        $Ch = SAMLSPUtilities::xpQuery($Ip, "\x2e\57\155\144\x75\x69\72\125\x49\x49\156\146\157\x2f\155\x64\165\x69\72\104\151\163\x70\154\x61\x79\116\x61\155\x65");
        foreach ($Ch as $eB) {
            if (!($eB->hasAttribute("\170\155\154\x3a\154\141\156\x67") && $eB->getAttribute("\170\x6d\x6c\x3a\x6c\141\156\x67") == "\145\156")) {
                goto ipJ;
            }
            $this->idpName = $eB->textContent;
            ipJ:
            Dg4:
        }
        C9e:
    }
    private function parseSSOService($Ip)
    {
        $x3 = SAMLSPUtilities::xpQuery($Ip, "\x2e\x2f\x73\x61\155\x6c\x5f\x6d\x65\x74\141\x64\141\164\141\72\x53\x69\156\x67\154\145\x53\x69\x67\x6e\x4f\156\123\145\x72\x76\x69\x63\145");
        foreach ($x3 as $hS) {
            $ir = str_replace("\165\x72\156\72\x6f\x61\163\x69\163\x3a\156\141\155\145\x73\x3a\164\143\x3a\123\x41\x4d\114\x3a\62\x2e\60\x3a\x62\151\x6e\144\x69\156\x67\163\x3a", '', $hS->getAttribute("\102\151\156\x64\151\156\x67"));
            $this->loginDetails = array_merge($this->loginDetails, array($ir => $hS->getAttribute("\x4c\157\143\x61\164\x69\157\156")));
            jvC:
        }
        Yin:
    }
    private function parseSLOService($Ip)
    {
        $Vk = SAMLSPUtilities::xpQuery($Ip, "\x2e\x2f\x73\x61\155\x6c\137\155\145\164\x61\x64\x61\x74\141\72\x53\151\156\x67\x6c\x65\x4c\157\147\x6f\x75\x74\x53\x65\x72\166\x69\143\145");
        if (!empty($Vk)) {
            goto a4X;
        }
        $this->logoutDetails = array("\x48\124\x54\x50\x2d\x52\145\144\x69\x72\x65\x63\164" => '');
        goto FkG;
        a4X:
        foreach ($Vk as $ly) {
            $ir = str_replace("\x75\x72\156\x3a\x6f\141\x73\151\163\72\x6e\141\x6d\x65\163\72\164\143\72\123\x41\x4d\114\72\x32\56\x30\72\x62\x69\156\x64\151\156\147\x73\x3a", '', $ly->getAttribute("\x42\x69\156\x64\151\156\147"));
            $this->logoutDetails = array_merge($this->logoutDetails, array($ir => $ly->getAttribute("\114\157\143\x61\x74\151\x6f\156")));
            Fgj:
        }
        ON2:
        FkG:
    }
    private function parsex509Certificate($Ip)
    {
        foreach (SAMLSPUtilities::xpQuery($Ip, "\56\57\163\141\x6d\154\x5f\x6d\145\164\141\x64\x61\164\x61\72\113\x65\171\104\x65\163\x63\x72\x69\160\164\x6f\162") as $l1) {
            if ($l1->hasAttribute("\165\163\145")) {
                goto ORu;
            }
            $this->parseSigningCertificate($l1);
            goto iRZ;
            ORu:
            if ($l1->getAttribute("\x75\x73\x65") == "\x65\156\143\x72\x79\x70\x74\x69\x6f\x6e") {
                goto fvw;
            }
            $this->parseSigningCertificate($l1);
            goto LZM;
            fvw:
            $this->parseEncryptionCertificate($l1);
            LZM:
            iRZ:
            zf7:
        }
        tq2:
    }
    private function parseSigningCertificate($Ip)
    {
        $vq = SAMLSPUtilities::xpQuery($Ip, "\56\x2f\144\163\x3a\x4b\145\171\x49\x6e\146\x6f\x2f\x64\163\72\x58\65\x30\x39\104\x61\164\x61\x2f\x64\x73\72\130\65\x30\x39\103\x65\x72\x74\151\x66\x69\143\141\164\x65");
        $qB = trim($vq[0]->textContent);
        $qB = str_replace(array("\15", "\12", "\x9", "\x20"), '', $qB);
        if (empty($vq)) {
            goto tJh;
        }
        array_push($this->signingCertificate, SAMLSPUtilities::sanitize_certificate($qB));
        tJh:
    }
    private function parseEncryptionCertificate($Ip)
    {
        $vq = SAMLSPUtilities::xpQuery($Ip, "\56\x2f\x64\163\72\113\x65\x79\x49\x6e\x66\x6f\x2f\144\163\x3a\130\65\60\x39\x44\x61\x74\141\x2f\144\163\72\130\x35\x30\71\x43\x65\162\x74\x69\x66\151\143\x61\x74\x65");
        $qB = trim($vq[0]->textContent);
        $qB = str_replace(array("\15", "\12", "\11", "\40"), '', $qB);
        if (empty($vq)) {
            goto kHH;
        }
        array_push($this->encryptionCertificate, $qB);
        kHH:
    }
    public function getIdpName()
    {
        return $this->idpName;
    }
    public function getEntityID()
    {
        return $this->entityID;
    }
    public function getLoginURL($ir)
    {
        return $this->loginDetails[$ir];
    }
    public function getLogoutURL($ir)
    {
        return $this->logoutDetails[$ir];
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
