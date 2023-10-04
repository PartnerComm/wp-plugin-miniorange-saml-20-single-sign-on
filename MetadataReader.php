<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


class IDPMetadataReader
{
    private $identityProviders;
    private $serviceProviders;
    public function __construct(DOMNode $jn = NULL)
    {
        $this->identityProviders = array();
        $this->serviceProviders = array();
        $cL = SAMLSPUtilities::xpQuery($jn, "\x2e\x2f\163\141\155\x6c\x5f\155\145\x74\141\144\x61\x74\141\x3a\105\x6e\164\x69\164\151\x65\x73\104\x65\x73\x63\162\151\x70\x74\x6f\x72");
        if (!empty($cL)) {
            goto aG;
        }
        $kT = SAMLSPUtilities::xpQuery($jn, "\x2e\x2f\x73\x61\155\x6c\137\155\145\x74\x61\x64\x61\x74\x61\x3a\x45\x6e\x74\x69\x74\x79\104\x65\x73\x63\162\151\160\x74\157\162");
        goto yY;
        aG:
        $kT = SAMLSPUtilities::xpQuery($cL[0], "\56\x2f\x73\x61\x6d\x6c\x5f\155\145\x74\141\144\141\x74\x61\x3a\105\x6e\164\151\x74\x79\x44\x65\x73\x63\x72\x69\x70\164\x6f\x72");
        yY:
        foreach ($kT as $Sy) {
            $Dy = SAMLSPUtilities::xpQuery($Sy, "\x2e\57\163\141\155\154\x5f\x6d\x65\164\141\144\141\164\141\x3a\x49\x44\120\x53\123\x4f\x44\x65\163\143\x72\151\x70\x74\157\162");
            if (empty($Dy)) {
                goto gx;
            }
            array_push($this->identityProviders, new IdentityProviders($Sy));
            gx:
            sr:
        }
        G2:
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
    public function __construct(DOMElement $jn = NULL)
    {
        $this->idpName = '';
        $this->loginDetails = array();
        $this->logoutDetails = array();
        $this->signingCertificate = array();
        $this->encryptionCertificate = array();
        if (!$jn->hasAttribute("\145\x6e\164\151\x74\x79\111\104")) {
            goto MX;
        }
        $this->entityID = $jn->getAttribute("\145\x6e\x74\151\164\x79\111\x44");
        MX:
        if (!$jn->hasAttribute("\x57\x61\156\164\x41\165\164\150\156\122\x65\161\x75\145\163\164\163\123\x69\x67\156\145\144")) {
            goto jP;
        }
        $this->signedRequest = $jn->getAttribute("\127\x61\156\x74\101\165\164\150\x6e\x52\x65\x71\x75\x65\x73\164\x73\123\151\147\156\145\144");
        jP:
        $Dy = SAMLSPUtilities::xpQuery($jn, "\x2e\x2f\x73\x61\155\154\x5f\155\x65\164\141\x64\x61\164\141\x3a\x49\x44\120\x53\x53\117\x44\x65\163\x63\x72\151\x70\x74\x6f\x72");
        if (count($Dy) > 1) {
            goto mB;
        }
        if (empty($Dy)) {
            goto za;
        }
        goto Cz;
        mB:
        throw new Exception("\115\157\162\x65\40\164\150\x61\x6e\40\x6f\x6e\145\x20\x3c\111\104\120\x53\123\x4f\x44\145\x73\x63\x72\x69\160\x74\x6f\162\76\40\x69\156\x20\74\105\x6e\x74\x69\x74\x79\104\145\x73\x63\x72\151\160\x74\157\162\76\56");
        goto Cz;
        za:
        throw new Exception("\x4d\x69\163\x73\151\156\147\x20\x72\x65\161\x75\x69\162\x65\x64\x20\x3c\x49\x44\120\123\x53\x4f\x44\145\163\143\162\151\160\x74\157\162\x3e\x20\x69\156\40\x3c\x45\156\164\151\x74\x79\x44\x65\x73\143\x72\151\160\x74\x6f\x72\x3e\x2e");
        Cz:
        $bx = $Dy[0];
        $fj = SAMLSPUtilities::xpQuery($jn, "\56\x2f\x73\x61\x6d\154\137\x6d\x65\x74\x61\x64\141\x74\x61\72\105\170\x74\145\x6e\163\151\x6f\x6e\x73");
        if (!$fj) {
            goto mF;
        }
        $this->parseInfo($bx);
        mF:
        $this->parseSSOService($bx);
        $this->parseSLOService($bx);
        $this->parsex509Certificate($bx);
    }
    private function parseInfo($jn)
    {
        $PD = SAMLSPUtilities::xpQuery($jn, "\56\57\155\x64\165\151\72\125\111\x49\156\146\157\57\x6d\x64\x75\151\72\x44\151\163\160\154\x61\171\116\x61\x6d\145");
        foreach ($PD as $Zz) {
            if (!($Zz->hasAttribute("\170\x6d\x6c\72\x6c\x61\156\147") && $Zz->getAttribute("\x78\155\x6c\x3a\154\x61\x6e\x67") == "\x65\156")) {
                goto KC;
            }
            $this->idpName = $Zz->textContent;
            KC:
            a1:
        }
        W6:
    }
    private function parseSSOService($jn)
    {
        $S4 = SAMLSPUtilities::xpQuery($jn, "\x2e\57\x73\141\x6d\154\x5f\155\145\x74\141\144\141\164\141\x3a\x53\151\156\147\x6c\x65\x53\x69\x67\x6e\117\x6e\123\145\x72\x76\x69\143\x65");
        foreach ($S4 as $wE) {
            $eS = str_replace("\165\x72\x6e\x3a\157\x61\163\x69\163\72\156\141\x6d\145\163\72\164\143\x3a\x53\101\x4d\114\x3a\62\x2e\60\x3a\142\151\x6e\144\x69\x6e\147\x73\x3a", '', $wE->getAttribute("\x42\x69\x6e\x64\x69\156\147"));
            $this->loginDetails = array_merge($this->loginDetails, array($eS => $wE->getAttribute("\114\157\143\141\x74\151\x6f\x6e")));
            WF:
        }
        xy:
    }
    private function parseSLOService($jn)
    {
        $s7 = SAMLSPUtilities::xpQuery($jn, "\56\x2f\x73\x61\x6d\154\x5f\155\145\164\x61\x64\141\x74\141\72\123\x69\x6e\147\154\145\x4c\157\x67\x6f\165\x74\123\145\x72\166\x69\x63\x65");
        if (!empty($s7)) {
            goto Ny;
        }
        $this->logoutDetails = array("\x48\124\x54\120\x2d\122\x65\x64\x69\x72\x65\143\x74" => '');
        goto Bk;
        Ny:
        foreach ($s7 as $vA) {
            $eS = str_replace("\x75\x72\x6e\x3a\x6f\x61\163\151\x73\72\156\x61\x6d\145\163\72\x74\x63\x3a\x53\101\115\114\x3a\62\56\x30\72\x62\151\x6e\144\151\156\x67\163\x3a", '', $vA->getAttribute("\x42\x69\156\144\x69\156\x67"));
            $this->logoutDetails = array_merge($this->logoutDetails, array($eS => $vA->getAttribute("\114\157\143\x61\x74\x69\x6f\156")));
            rC:
        }
        Xx:
        Bk:
    }
    private function parsex509Certificate($jn)
    {
        foreach (SAMLSPUtilities::xpQuery($jn, "\56\x2f\163\x61\x6d\154\x5f\x6d\145\x74\141\144\x61\164\x61\72\113\x65\x79\x44\145\x73\143\162\151\x70\164\x6f\162") as $U0) {
            if ($U0->hasAttribute("\165\x73\x65")) {
                goto uG;
            }
            $this->parseSigningCertificate($U0);
            goto h2;
            uG:
            if ($U0->getAttribute("\165\x73\x65") == "\145\x6e\x63\162\x79\x70\x74\151\x6f\156") {
                goto vn;
            }
            $this->parseSigningCertificate($U0);
            goto g5;
            vn:
            $this->parseEncryptionCertificate($U0);
            g5:
            h2:
            w9:
        }
        HL:
    }
    private function parseSigningCertificate($jn)
    {
        $Sx = SAMLSPUtilities::xpQuery($jn, "\56\57\144\163\72\x4b\x65\x79\111\156\x66\157\57\x64\x73\72\x58\x35\x30\x39\104\141\164\x61\x2f\x64\163\72\x58\65\60\x39\x43\x65\162\164\x69\146\151\x63\141\164\145");
        $WZ = trim($Sx[0]->textContent);
        $WZ = str_replace(array("\xd", "\xa", "\x9", "\x20"), '', $WZ);
        if (empty($Sx)) {
            goto Zp;
        }
        array_push($this->signingCertificate, SAMLSPUtilities::sanitize_certificate($WZ));
        Zp:
    }
    private function parseEncryptionCertificate($jn)
    {
        $Sx = SAMLSPUtilities::xpQuery($jn, "\x2e\x2f\144\x73\x3a\113\145\171\x49\156\146\x6f\57\x64\163\72\x58\x35\x30\71\x44\x61\x74\141\x2f\144\163\72\x58\65\x30\71\103\x65\162\x74\x69\x66\x69\x63\141\164\145");
        $WZ = trim($Sx[0]->textContent);
        $WZ = str_replace(array("\15", "\12", "\11", "\x20"), '', $WZ);
        if (empty($Sx)) {
            goto Eo;
        }
        array_push($this->encryptionCertificate, $WZ);
        Eo:
    }
    public function getIdpName()
    {
        return $this->idpName;
    }
    public function getEntityID()
    {
        return $this->entityID;
    }
    public function getLoginURL($eS)
    {
        return $this->loginDetails[$eS];
    }
    public function getLogoutURL($eS)
    {
        return $this->logoutDetails[$eS];
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
