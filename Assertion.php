<?php


include_once "\x55\x74\x69\154\x69\x74\151\145\x73\56\x70\x68\x70";
include_once "\170\x6d\x6c\163\x65\143\154\x69\x62\163\56\x70\x68\160";
use RobRichards\XMLSecLibs\XMLSecurityKey;
use RobRichards\XMLSecLibs\XMLSecurityDSig;
use RobRichards\XMLSecLibs\XMLSecEnc;
class SAML2SPAssertion
{
    private $id;
    private $issueInstant;
    private $issuer;
    private $nameId;
    private $encryptedNameId;
    private $encryptedAttribute;
    private $encryptionKey;
    private $notBefore;
    private $notOnOrAfter;
    private $validAudiences;
    private $sessionNotOnOrAfter;
    private $sessionIndex;
    private $authnInstant;
    private $authnContextClassRef;
    private $authnContextDecl;
    private $authnContextDeclRef;
    private $AuthenticatingAuthority;
    private $attributes;
    private $nameFormat;
    private $signatureKey;
    private $certificates;
    private $signatureData;
    private $requiredEncAttributes;
    private $SubjectConfirmation;
    private $privateKeyUrl;
    protected $wasSignedAtConstruction = FALSE;
    public function __construct(DOMElement $wI = NULL, $Xd)
    {
        $this->id = SAMLSPUtilities::generateId();
        $this->issueInstant = SAMLSPUtilities::generateTimestamp();
        $this->issuer = '';
        $this->authnInstant = SAMLSPUtilities::generateTimestamp();
        $this->attributes = array();
        $this->nameFormat = "\165\x72\156\x3a\157\141\163\x69\163\x3a\x6e\141\x6d\145\163\72\164\x63\x3a\123\101\x4d\114\72\x31\56\x31\x3a\x6e\141\x6d\x65\x69\144\55\146\x6f\162\x6d\141\164\72\x75\156\x73\x70\x65\x63\151\x66\x69\x65\x64";
        $this->certificates = array();
        $this->AuthenticatingAuthority = array();
        $this->SubjectConfirmation = array();
        if (!($wI === NULL)) {
            goto xe;
        }
        return;
        xe:
        if (!($wI->localName === "\x45\x6e\143\x72\x79\160\x74\x65\144\101\x73\x73\145\162\x74\151\157\x6e")) {
            goto sZ;
        }
        $WL = SAMLSPUtilities::xpQuery($wI, "\56\57\x78\x65\156\143\72\105\x6e\x63\x72\171\160\x74\145\144\x44\x61\x74\x61");
        $jg = SAMLSPUtilities::xpQuery($wI, "\x2f\x2f\x2a\x5b\154\x6f\143\x61\154\55\x6e\141\155\x65\x28\51\75\47\105\156\143\x72\x79\x70\x74\x65\144\x4b\145\171\47\135\x2f\x2a\x5b\154\157\143\141\154\x2d\156\141\x6d\145\50\51\75\47\105\156\x63\x72\171\160\x74\x69\157\156\x4d\x65\x74\x68\x6f\x64\47\135\57\x40\x41\154\x67\157\162\x69\164\150\155");
        $Hl = $jg[0]->value;
        $qv = SAMLSPUtilities::getEncryptionAlgorithm($Hl);
        if (count($WL) === 0) {
            goto KO;
        }
        if (count($WL) > 1) {
            goto yu;
        }
        goto w4;
        KO:
        throw new Exception("\x4d\151\163\x73\151\x6e\x67\40\145\156\x63\x72\171\160\x74\x65\x64\40\144\141\x74\x61\40\151\156\x20\74\x73\141\x6d\x6c\x3a\x45\156\143\162\x79\160\x74\145\144\101\163\163\145\162\x74\151\157\156\x3e\x2e");
        goto w4;
        yu:
        throw new Exception("\x4d\157\162\x65\x20\x74\x68\141\x6e\40\157\x6e\145\40\x65\156\143\x72\171\160\x74\145\144\x20\x64\141\164\x61\40\145\154\x65\x6d\x65\156\164\x20\x69\x6e\40\x3c\163\x61\155\x6c\x3a\105\x6e\x63\162\x79\160\164\x65\144\101\x73\x73\x65\x72\x74\x69\x6f\x6e\76\56");
        w4:
        $U6 = new XMLSecurityKey($qv, array("\164\x79\160\x65" => "\160\162\x69\x76\141\164\145"));
        $U6->loadKey($Xd, FALSE);
        $XR = array();
        $wI = SAMLSPUtilities::decryptElement($WL[0], $U6, $XR);
        sZ:
        if ($wI->hasAttribute("\111\104")) {
            goto m6;
        }
        throw new Exception("\115\151\x73\163\151\156\147\x20\111\x44\x20\141\164\164\x72\151\x62\165\164\145\40\x6f\x6e\40\x53\101\x4d\114\40\141\x73\x73\145\162\x74\x69\x6f\x6e\x2e");
        m6:
        $this->id = $wI->getAttribute("\111\104");
        if (!($wI->getAttribute("\126\x65\162\x73\151\157\156") !== "\x32\x2e\x30")) {
            goto yT;
        }
        throw new Exception("\125\156\x73\x75\160\x70\x6f\x72\x74\145\x64\40\x76\145\x72\163\151\157\156\72\40" . $wI->getAttribute("\x56\145\x72\x73\x69\x6f\x6e"));
        yT:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($wI->getAttribute("\x49\x73\163\165\x65\x49\x6e\163\x74\x61\156\164"));
        $rk = SAMLSPUtilities::xpQuery($wI, "\56\57\163\x61\x6d\x6c\x5f\x61\163\x73\x65\x72\x74\151\157\x6e\72\x49\163\x73\x75\145\162");
        if (!empty($rk)) {
            goto vs;
        }
        throw new Exception("\115\151\163\x73\151\156\147\40\74\163\x61\x6d\154\72\111\163\x73\165\x65\162\76\40\x69\x6e\x20\141\x73\163\145\x72\x74\x69\157\x6e\x2e");
        vs:
        $this->issuer = trim($rk[0]->textContent);
        $this->parseConditions($wI);
        $this->parseAuthnStatement($wI);
        $this->parseAttributes($wI);
        $this->parseEncryptedAttributes($wI);
        $this->parseSignature($wI);
        $this->parseSubject($wI);
    }
    private function parseSubject(DOMElement $wI)
    {
        $kX = SAMLSPUtilities::xpQuery($wI, "\56\57\x73\141\155\154\x5f\141\163\x73\x65\162\164\x69\157\156\x3a\123\165\x62\152\x65\143\164");
        if (empty($kX)) {
            goto pL;
        }
        if (count($kX) > 1) {
            goto ix;
        }
        goto m5;
        pL:
        return;
        goto m5;
        ix:
        throw new Exception("\115\157\162\x65\x20\164\x68\141\156\40\x6f\x6e\x65\x20\x3c\163\x61\x6d\x6c\x3a\123\x75\x62\x6a\145\x63\x74\76\40\x69\156\x20\74\163\141\155\x6c\x3a\101\163\163\145\x72\164\x69\157\156\76\56");
        m5:
        $kX = $kX[0];
        $vk = SAMLSPUtilities::xpQuery($kX, "\56\57\163\141\x6d\154\x5f\x61\163\x73\145\162\x74\x69\157\x6e\x3a\116\x61\155\145\x49\x44\40\174\x20\56\57\163\x61\155\x6c\x5f\x61\163\x73\145\162\x74\x69\x6f\x6e\72\105\156\x63\x72\171\160\x74\x65\144\x49\x44\57\170\145\156\x63\72\105\x6e\x63\x72\x79\x70\x74\145\144\104\141\164\141");
        if (empty($vk)) {
            goto WW;
        }
        if (count($vk) > 1) {
            goto B_;
        }
        goto WT;
        WW:
        $IJ = $_POST["\122\x65\154\141\x79\123\164\x61\x74\145"];
        if ($IJ == "\164\145\163\x74\x56\x61\154\151\144\x61\164\145" or $IJ == "\164\x65\163\x74\116\145\x77\103\x65\162\x74\x69\146\151\x63\x61\164\x65") {
            goto sH;
        }
        wp_die("\x57\x65\40\143\x6f\165\x6c\x64\40\156\157\x74\40\x73\151\x67\156\40\171\x6f\165\40\151\156\56\40\x50\x6c\x65\141\163\145\x20\143\x6f\x6e\164\x61\143\164\x20\x79\x6f\165\x72\40\x61\x64\x6d\151\156\x69\163\x74\162\141\164\157\162");
        goto au;
        sH:
        echo "\74\x64\x69\x76\40\163\x74\x79\x6c\x65\x3d\42\146\157\156\164\55\146\x61\x6d\x69\154\x79\x3a\103\141\154\x69\x62\162\x69\x3b\x70\x61\x64\144\151\156\147\x3a\60\x20\x33\x25\73\x22\x3e";
        echo "\74\x64\151\x76\x20\163\164\x79\x6c\145\x3d\42\x63\x6f\154\157\x72\72\x20\x23\141\71\x34\64\x34\62\x3b\x62\x61\143\x6b\147\x72\x6f\x75\x6e\x64\55\x63\x6f\x6c\157\x72\72\40\43\146\62\x64\145\x64\x65\x3b\x70\141\x64\x64\x69\156\147\72\40\x31\65\160\170\73\x6d\x61\x72\x67\x69\156\x2d\x62\157\164\164\157\155\x3a\40\x32\x30\x70\x78\x3b\x74\x65\x78\x74\x2d\141\x6c\151\147\x6e\72\x63\145\156\164\145\162\73\x62\157\162\144\x65\x72\72\x31\x70\x78\40\x73\157\x6c\151\144\40\x23\105\x36\102\63\x42\62\x3b\146\157\x6e\164\55\x73\x69\x7a\145\x3a\61\x38\x70\164\x3b\x22\76\x20\105\122\122\117\x52\74\x2f\144\x69\x76\76\xd\12\40\40\x20\40\40\40\40\x20\x20\x20\40\74\x64\151\166\x20\x73\164\x79\x6c\145\75\x22\x63\157\154\x6f\162\x3a\x20\x23\x61\x39\64\x34\64\62\x3b\146\157\x6e\x74\x2d\163\x69\x7a\145\x3a\61\x34\x70\x74\x3b\x20\x6d\x61\x72\x67\151\156\x2d\x62\157\x74\164\x6f\x6d\72\62\x30\160\170\x3b\x22\76\x3c\x70\76\x3c\163\x74\x72\x6f\156\147\x3e\x45\x72\162\x6f\162\72\x20\74\57\163\x74\162\x6f\156\x67\x3e\x4d\x69\163\163\x69\156\147\40\40\116\141\x6d\x65\111\104\40\157\x72\x20\105\156\x63\x72\x79\160\164\145\x64\111\104\x20\x69\x6e\x20\123\101\x4d\114\x20\122\145\x73\x70\157\x6e\x73\x65\56\x3c\57\x70\76\15\xa\40\x20\x20\40\x20\x20\x20\40\x20\x20\40\x20\x20\x20\x20\40\74\160\x3e\x50\x6c\145\x61\163\x65\40\143\157\x6e\164\x61\143\164\40\x79\x6f\x75\x72\40\x61\x64\x6d\x69\156\151\163\x74\x72\141\x74\157\x72\x20\x61\x6e\x64\x20\x72\145\x70\157\162\164\40\164\x68\x65\40\146\157\x6c\154\157\167\x69\x6e\147\x20\145\x72\162\x6f\x72\x3a\74\57\160\x3e\15\12\40\x20\40\x20\40\40\40\40\40\40\40\x20\40\40\x20\40\74\x70\x3e\x3c\163\164\x72\x6f\x6e\x67\x3e\x50\x6f\x73\x73\151\x62\x6c\x65\x20\x43\x61\165\x73\x65\72\74\57\x73\164\162\157\x6e\x67\76\x20\x4e\141\x6d\145\x49\x44\40\x6e\x6f\x74\x20\146\157\x75\x6e\x64\40\x69\156\x20\123\x41\115\114\x20\x52\145\163\160\x6f\156\163\x65\x20\163\x75\x62\152\x65\x63\x74\x2e\x3c\x2f\160\76\15\xa\40\x20\x20\40\40\40\x20\40\40\40\x20\40\x20\40\40\40\74\x2f\144\x69\166\76\15\xa\40\40\x20\x20\x20\40\x20\x20\40\x20\40\40\40\40\x20\x20\74\x64\151\x76\x20\163\164\x79\x6c\145\x3d\42\x6d\x61\x72\147\x69\x6e\x3a\63\45\73\144\x69\163\160\154\141\x79\72\142\154\157\x63\153\x3b\164\145\x78\164\x2d\141\x6c\151\x67\x6e\x3a\x63\x65\x6e\x74\145\162\73\42\x3e\xd\xa\x20\x20\x20\x20\40\x20\x20\40\x20\40\x20\40\40\x20\40\40\74\144\151\x76\40\x73\164\x79\154\145\75\42\x6d\141\162\147\x69\156\72\x33\45\x3b\144\x69\163\160\x6c\x61\x79\x3a\142\x6c\x6f\x63\153\73\164\x65\170\x74\55\x61\154\151\x67\x6e\72\143\x65\156\x74\145\x72\73\42\76\x3c\x69\x6e\x70\x75\164\x20\163\164\171\154\x65\75\42\x70\141\x64\144\x69\156\x67\x3a\61\x25\x3b\167\151\x64\x74\150\72\61\60\x30\160\170\x3b\142\141\143\153\147\x72\x6f\165\156\x64\x3a\x20\43\x30\60\x39\61\103\x44\x20\x6e\x6f\156\x65\x20\x72\x65\x70\x65\x61\x74\x20\163\x63\x72\x6f\x6c\154\x20\60\45\40\x30\x25\73\x63\x75\162\x73\x6f\162\x3a\x20\x70\x6f\x69\x6e\164\145\x72\73\146\x6f\x6e\164\55\x73\x69\x7a\145\x3a\61\x35\x70\x78\73\142\157\162\144\145\x72\55\167\x69\144\164\150\x3a\40\x31\x70\170\73\142\x6f\x72\x64\145\x72\55\163\x74\171\154\145\72\x20\163\x6f\154\151\144\73\x62\157\162\144\145\x72\55\162\x61\144\151\x75\x73\x3a\40\63\x70\x78\x3b\x77\150\x69\x74\145\x2d\x73\160\x61\x63\x65\x3a\40\156\x6f\x77\x72\141\160\73\x62\157\170\55\x73\x69\172\x69\x6e\147\x3a\40\x62\x6f\x72\x64\145\162\x2d\142\157\170\73\x62\157\162\x64\145\162\55\x63\157\154\x6f\162\72\x20\43\x30\60\67\63\101\x41\x3b\x62\157\170\55\163\150\x61\x64\x6f\167\x3a\x20\x30\x70\x78\x20\x31\x70\170\x20\60\160\170\x20\162\147\142\141\x28\x31\62\x30\54\40\x32\60\x30\x2c\x20\62\x33\x30\54\40\60\x2e\66\51\40\151\156\163\x65\164\x3b\143\157\154\157\162\x3a\x20\43\106\106\106\73\42\x74\171\160\x65\75\42\x62\x75\x74\x74\x6f\156\x22\x20\x76\141\x6c\165\x65\75\42\x44\x6f\x6e\145\42\x20\157\x6e\103\154\x69\143\x6b\75\x22\163\145\154\146\x2e\x63\154\157\x73\145\50\x29\x3b\x22\76\74\x2f\x64\151\x76\76";
        exit;
        au:
        goto WT;
        B_:
        throw new Exception("\x4d\x6f\162\145\40\164\x68\x61\x6e\40\157\x6e\x65\40\74\163\x61\x6d\x6c\72\x4e\x61\155\145\x49\x44\x3e\x20\x6f\x72\40\74\x73\141\155\x6c\72\105\156\143\162\x79\160\x74\x65\144\x44\x3e\x20\151\156\40\x3c\x73\141\155\154\x3a\123\165\142\152\x65\143\164\76\x2e");
        WT:
        $vk = $vk[0];
        if ($vk->localName === "\x45\156\x63\162\x79\160\164\145\x64\x44\x61\164\141") {
            goto x6;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($vk);
        goto c8;
        x6:
        $this->encryptedNameId = $vk;
        c8:
    }
    private function parseConditions(DOMElement $wI)
    {
        $Vc = SAMLSPUtilities::xpQuery($wI, "\x2e\57\x73\141\x6d\154\137\x61\x73\163\145\x72\164\151\157\156\x3a\103\x6f\156\144\151\164\x69\157\156\x73");
        if (empty($Vc)) {
            goto Oa;
        }
        if (count($Vc) > 1) {
            goto bS;
        }
        goto ER;
        Oa:
        return;
        goto ER;
        bS:
        throw new Exception("\115\x6f\162\x65\x20\164\x68\x61\156\x20\x6f\156\145\40\x3c\163\x61\x6d\x6c\72\x43\157\156\x64\151\x74\151\157\156\163\x3e\x20\x69\156\x20\x3c\x73\141\155\x6c\x3a\x41\x73\x73\145\162\164\x69\157\x6e\76\x2e");
        ER:
        $Vc = $Vc[0];
        if (!$Vc->hasAttribute("\x4e\x6f\164\x42\145\146\x6f\162\x65")) {
            goto D7;
        }
        $zW = SAMLSPUtilities::xsDateTimeToTimestamp($Vc->getAttribute("\x4e\x6f\164\x42\x65\x66\x6f\x72\x65"));
        if (!($this->notBefore === NULL || $this->notBefore < $zW)) {
            goto SY;
        }
        $this->notBefore = $zW;
        SY:
        D7:
        if (!$Vc->hasAttribute("\x4e\x6f\164\117\156\117\162\101\146\164\145\162")) {
            goto Xa;
        }
        $I3 = SAMLSPUtilities::xsDateTimeToTimestamp($Vc->getAttribute("\x4e\x6f\164\117\x6e\x4f\162\101\x66\x74\x65\162"));
        if (!($this->notOnOrAfter === NULL || $this->notOnOrAfter > $I3)) {
            goto aN;
        }
        $this->notOnOrAfter = $I3;
        aN:
        Xa:
        $Fr = $Vc->firstChild;
        Ni:
        if (!($Fr !== NULL)) {
            goto Pz;
        }
        if (!$Fr instanceof DOMText) {
            goto O0;
        }
        goto ZZ;
        O0:
        if (!($Fr->namespaceURI !== "\165\162\x6e\x3a\x6f\x61\163\x69\163\x3a\156\141\x6d\145\x73\x3a\x74\143\72\x53\x41\115\x4c\72\62\x2e\x30\x3a\x61\163\163\145\x72\164\x69\157\156")) {
            goto Z1;
        }
        throw new Exception("\125\x6e\153\x6e\x6f\167\x6e\x20\156\x61\155\x65\163\160\141\143\x65\40\157\x66\40\143\157\156\x64\151\x74\x69\157\x6e\72\40" . var_export($Fr->namespaceURI, TRUE));
        Z1:
        switch ($Fr->localName) {
            case "\x41\165\x64\151\x65\156\x63\x65\122\145\x73\164\x72\151\143\164\151\157\156":
                $ry = SAMLSPUtilities::extractStrings($Fr, "\165\x72\156\72\157\x61\x73\151\163\72\x6e\141\x6d\x65\163\x3a\x74\143\72\x53\x41\x4d\x4c\x3a\x32\x2e\60\72\141\x73\163\x65\x72\164\151\x6f\156", "\x41\165\x64\x69\145\x6e\143\145");
                if ($this->validAudiences === NULL) {
                    goto jb;
                }
                $this->validAudiences = array_intersect($this->validAudiences, $ry);
                goto kO;
                jb:
                $this->validAudiences = $ry;
                kO:
                goto PF;
            case "\117\x6e\x65\124\x69\155\145\x55\163\145":
                goto PF;
            case "\120\x72\x6f\170\x79\x52\x65\x73\x74\x72\x69\x63\164\151\157\x6e":
                goto PF;
            default:
                throw new Exception("\x55\x6e\x6b\156\157\x77\156\40\143\157\156\144\x69\x74\151\157\x6e\72\40" . var_export($Fr->localName, TRUE));
        }
        xK:
        PF:
        ZZ:
        $Fr = $Fr->nextSibling;
        goto Ni;
        Pz:
    }
    private function parseAuthnStatement(DOMElement $wI)
    {
        $cS = SAMLSPUtilities::xpQuery($wI, "\x2e\x2f\163\141\155\154\137\141\163\x73\145\162\164\x69\x6f\156\72\101\165\164\x68\x6e\123\164\141\164\145\155\x65\156\164");
        if (empty($cS)) {
            goto MB;
        }
        if (count($cS) > 1) {
            goto Bv;
        }
        goto XY;
        MB:
        $this->authnInstant = NULL;
        return;
        goto XY;
        Bv:
        throw new Exception("\115\x6f\x72\x65\x20\x74\x68\141\164\40\157\156\x65\x20\74\163\141\x6d\x6c\x3a\x41\x75\x74\150\x6e\x53\x74\x61\164\x65\155\x65\x6e\x74\x3e\x20\x69\x6e\x20\74\163\x61\x6d\154\x3a\101\x73\x73\145\162\x74\x69\157\156\x3e\x20\x6e\x6f\x74\x20\163\x75\160\160\157\162\164\x65\x64\x2e");
        XY:
        $JU = $cS[0];
        if ($JU->hasAttribute("\x41\x75\164\x68\x6e\x49\x6e\x73\x74\141\x6e\x74")) {
            goto qG;
        }
        throw new Exception("\115\151\163\x73\151\x6e\x67\40\x72\x65\161\x75\x69\162\x65\x64\40\x41\x75\164\150\156\x49\x6e\x73\x74\141\x6e\164\x20\141\x74\164\162\x69\142\x75\x74\145\40\x6f\156\40\x3c\x73\x61\155\x6c\x3a\x41\165\x74\150\156\x53\x74\141\x74\145\155\x65\x6e\164\76\56");
        qG:
        $this->authnInstant = SAMLSPUtilities::xsDateTimeToTimestamp($JU->getAttribute("\101\165\164\150\x6e\x49\156\x73\164\141\156\164"));
        if (!$JU->hasAttribute("\x53\x65\163\x73\x69\157\156\116\x6f\x74\x4f\156\x4f\x72\x41\146\164\x65\x72")) {
            goto vD;
        }
        $this->sessionNotOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($JU->getAttribute("\x53\145\x73\x73\x69\x6f\156\x4e\x6f\164\117\156\x4f\162\101\x66\x74\x65\x72"));
        vD:
        if (!$JU->hasAttribute("\123\145\x73\163\151\x6f\156\111\x6e\144\x65\x78")) {
            goto S9;
        }
        $this->sessionIndex = $JU->getAttribute("\x53\145\x73\x73\x69\157\156\111\156\x64\x65\170");
        S9:
        $this->parseAuthnContext($JU);
    }
    private function parseAuthnContext(DOMElement $jm)
    {
        $ra = SAMLSPUtilities::xpQuery($jm, "\56\x2f\163\x61\155\154\x5f\x61\163\x73\145\162\x74\x69\x6f\156\x3a\x41\x75\x74\150\156\103\157\156\x74\x65\x78\x74");
        if (count($ra) > 1) {
            goto fI;
        }
        if (empty($ra)) {
            goto gd;
        }
        goto L7;
        fI:
        throw new Exception("\115\x6f\x72\x65\40\x74\150\141\x6e\40\x6f\156\x65\x20\74\x73\141\155\x6c\x3a\101\165\x74\x68\x6e\103\157\156\x74\x65\170\164\76\x20\x69\156\x20\x3c\x73\141\155\154\x3a\101\165\x74\150\156\x53\x74\141\164\x65\x6d\145\156\164\76\56");
        goto L7;
        gd:
        throw new Exception("\115\151\x73\163\x69\x6e\147\x20\162\145\x71\x75\x69\x72\x65\144\40\x3c\x73\141\x6d\154\72\101\165\x74\150\156\x43\x6f\x6e\164\145\170\164\x3e\x20\x69\x6e\x20\74\x73\x61\x6d\154\x3a\101\165\164\x68\156\123\164\x61\x74\x65\155\x65\x6e\164\x3e\56");
        L7:
        $fo = $ra[0];
        $tF = SAMLSPUtilities::xpQuery($fo, "\56\x2f\163\141\x6d\x6c\x5f\141\163\x73\x65\162\164\x69\x6f\156\72\101\x75\x74\x68\x6e\x43\157\x6e\164\145\170\164\x44\x65\x63\x6c\x52\145\146");
        if (count($tF) > 1) {
            goto Sm;
        }
        if (count($tF) === 1) {
            goto uR;
        }
        goto Zg;
        Sm:
        throw new Exception("\115\x6f\x72\145\x20\164\150\141\x6e\x20\157\x6e\x65\x20\x3c\163\141\155\x6c\72\101\165\164\150\x6e\x43\157\156\164\x65\170\x74\x44\x65\143\154\122\x65\146\76\40\146\x6f\165\156\x64\x3f");
        goto Zg;
        uR:
        $this->setAuthnContextDeclRef(trim($tF[0]->textContent));
        Zg:
        $gE = SAMLSPUtilities::xpQuery($fo, "\56\x2f\x73\141\x6d\154\137\141\x73\x73\145\x72\x74\x69\x6f\156\72\x41\x75\164\150\x6e\x43\x6f\156\x74\x65\170\164\x44\145\x63\154");
        if (count($gE) > 1) {
            goto ND;
        }
        if (count($gE) === 1) {
            goto lW;
        }
        goto UW;
        ND:
        throw new Exception("\115\x6f\162\x65\x20\164\x68\x61\156\x20\x6f\x6e\145\40\74\x73\141\155\x6c\x3a\x41\165\x74\x68\x6e\103\157\x6e\164\x65\170\164\x44\x65\143\x6c\76\x20\146\157\165\x6e\144\77");
        goto UW;
        lW:
        $this->setAuthnContextDecl(new SAML2_XML_Chunk($gE[0]));
        UW:
        $MJ = SAMLSPUtilities::xpQuery($fo, "\x2e\57\163\x61\155\x6c\137\x61\x73\x73\x65\x72\164\x69\157\156\x3a\x41\x75\x74\x68\x6e\103\x6f\156\164\145\x78\x74\103\154\141\x73\163\122\145\x66");
        if (count($MJ) > 1) {
            goto My;
        }
        if (count($MJ) === 1) {
            goto cY;
        }
        goto GP;
        My:
        throw new Exception("\x4d\x6f\x72\x65\x20\x74\150\x61\x6e\40\x6f\156\145\40\74\x73\x61\155\x6c\72\x41\165\164\x68\x6e\103\157\156\164\x65\170\164\103\154\x61\x73\x73\x52\145\x66\76\x20\151\156\40\74\163\141\x6d\x6c\72\101\165\x74\x68\156\103\x6f\156\164\x65\170\x74\76\x2e");
        goto GP;
        cY:
        $this->setAuthnContextClassRef(trim($MJ[0]->textContent));
        GP:
        if (!(empty($this->authnContextClassRef) && empty($this->authnContextDecl) && empty($this->authnContextDeclRef))) {
            goto A6;
        }
        throw new Exception("\x4d\x69\x73\x73\151\156\147\40\x65\151\x74\150\x65\162\x20\74\163\141\155\154\x3a\101\165\x74\x68\x6e\103\157\x6e\164\x65\170\164\x43\x6c\141\x73\x73\x52\x65\x66\x3e\x20\157\162\40\74\x73\x61\155\154\72\x41\x75\x74\x68\x6e\x43\157\x6e\164\x65\x78\164\104\145\143\154\122\145\x66\x3e\40\157\x72\40\x3c\x73\141\x6d\x6c\x3a\101\165\164\150\x6e\103\157\x6e\164\145\170\x74\x44\145\x63\x6c\76");
        A6:
        $this->AuthenticatingAuthority = SAMLSPUtilities::extractStrings($fo, "\165\162\x6e\72\x6f\141\163\x69\163\x3a\x6e\x61\x6d\145\163\72\x74\143\x3a\x53\101\115\x4c\x3a\62\56\x30\72\141\x73\163\145\162\x74\151\x6f\x6e", "\x41\x75\164\150\145\x6e\164\151\143\x61\164\x69\x6e\x67\101\165\164\x68\x6f\x72\151\164\171");
    }
    private function parseAttributes(DOMElement $wI)
    {
        $Bu = TRUE;
        $QS = SAMLSPUtilities::xpQuery($wI, "\x2e\57\163\141\x6d\x6c\137\141\x73\163\145\162\x74\151\x6f\156\x3a\x41\x74\164\162\151\142\x75\164\145\x53\164\141\x74\x65\x6d\x65\x6e\164\57\x73\x61\155\x6c\137\141\x73\163\x65\x72\164\151\157\156\x3a\x41\164\164\x72\151\142\165\164\x65");
        foreach ($QS as $cX) {
            if ($cX->hasAttribute("\116\x61\x6d\x65")) {
                goto Ks;
            }
            throw new Exception("\x4d\151\x73\163\151\x6e\147\40\x6e\x61\155\x65\40\x6f\156\x20\74\x73\x61\x6d\154\x3a\101\164\164\x72\x69\x62\165\x74\145\x3e\40\145\x6c\x65\155\x65\156\x74\x2e");
            Ks:
            $JI = $cX->getAttribute("\116\141\x6d\145");
            if ($cX->hasAttribute("\116\x61\155\x65\x46\x6f\162\155\141\x74")) {
                goto UF;
            }
            $iO = "\165\162\156\x3a\157\141\163\x69\163\x3a\156\141\155\145\x73\72\x74\143\72\123\x41\x4d\x4c\x3a\61\x2e\x31\72\x6e\141\155\145\x69\x64\x2d\146\x6f\162\155\x61\x74\x3a\x75\x6e\x73\x70\x65\143\x69\146\151\145\x64";
            goto zH;
            UF:
            $iO = $cX->getAttribute("\x4e\141\155\x65\106\157\x72\x6d\x61\x74");
            zH:
            if ($Bu) {
                goto gD;
            }
            if (!($this->nameFormat !== $iO)) {
                goto we;
            }
            $this->nameFormat = "\x75\x72\156\72\x6f\x61\x73\x69\163\x3a\156\x61\x6d\x65\x73\x3a\x74\x63\x3a\123\101\115\114\72\61\56\x31\x3a\156\x61\155\145\151\x64\55\x66\x6f\162\155\x61\x74\72\x75\x6e\x73\x70\x65\x63\151\x66\151\x65\144";
            we:
            goto xl;
            gD:
            $this->nameFormat = $iO;
            $Bu = FALSE;
            xl:
            if (array_key_exists($JI, $this->attributes)) {
                goto TZ;
            }
            $this->attributes[$JI] = array();
            TZ:
            $go = SAMLSPUtilities::xpQuery($cX, "\56\x2f\x73\x61\x6d\x6c\x5f\141\163\x73\145\162\164\x69\x6f\156\72\101\164\164\x72\x69\142\x75\164\145\126\x61\x6c\165\x65");
            foreach ($go as $St) {
                $this->attributes[$JI][] = trim($St->textContent);
                Hm:
            }
            LP:
            S3:
        }
        lz:
    }
    private function parseEncryptedAttributes(DOMElement $wI)
    {
        $this->encryptedAttribute = SAMLSPUtilities::xpQuery($wI, "\56\57\x73\x61\155\154\x5f\x61\163\163\145\162\164\x69\157\156\x3a\101\164\x74\x72\x69\142\x75\x74\145\x53\x74\141\x74\145\155\145\156\x74\x2f\x73\141\155\x6c\137\141\163\x73\145\x72\x74\151\x6f\156\x3a\105\156\x63\x72\x79\x70\x74\x65\x64\x41\x74\164\x72\x69\x62\165\164\x65");
    }
    private function parseSignature(DOMElement $wI)
    {
        $fa = SAMLSPUtilities::validateElement($wI);
        if (!($fa !== FALSE)) {
            goto Zl;
        }
        $this->wasSignedAtConstruction = TRUE;
        $this->certificates = $fa["\103\145\162\x74\151\146\151\143\141\x74\x65\163"];
        $this->signatureData = $fa;
        Zl:
    }
    public function validate(XMLSecurityKey $U6)
    {
        if (!($this->signatureData === NULL)) {
            goto hL;
        }
        return FALSE;
        hL:
        SAMLSPUtilities::validateSignature($this->signatureData, $U6);
        return TRUE;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($Sy)
    {
        $this->id = $Sy;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($Oz)
    {
        $this->issueInstant = $Oz;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($rk)
    {
        $this->issuer = $rk;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto Qh;
        }
        throw new Exception("\101\x74\x74\145\x6d\160\164\145\x64\x20\164\x6f\x20\x72\x65\164\x72\151\x65\x76\145\40\145\156\x63\162\171\160\x74\145\x64\x20\x4e\141\155\x65\111\104\40\x77\x69\x74\150\x6f\165\x74\x20\144\x65\143\x72\171\x70\x74\x69\156\x67\40\151\x74\x20\x66\x69\162\x73\x74\56");
        Qh:
        return $this->nameId;
    }
    public function setNameId($vk)
    {
        $this->nameId = $vk;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto re;
        }
        return TRUE;
        re:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $U6)
    {
        $Ud = new DOMDocument();
        $gS = $Ud->createElement("\x72\157\x6f\x74");
        $Ud->appendChild($gS);
        SAMLSPUtilities::addNameId($gS, $this->nameId);
        $vk = $gS->firstChild;
        SAMLSPUtilities::getContainer()->debugMessage($vk, "\x65\x6e\143\x72\171\x70\x74");
        $vv = new XMLSecEnc();
        $vv->setNode($vk);
        $vv->type = XMLSecEnc::Element;
        $Bt = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $Bt->generateSessionKey();
        $vv->encryptKey($U6, $Bt);
        $this->encryptedNameId = $vv->encryptNode($Bt);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $U6, array $XR = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto W_;
        }
        return;
        W_:
        $vk = SAMLSPUtilities::decryptElement($this->encryptedNameId, $U6, $XR);
        SAMLSPUtilities::getContainer()->debugMessage($vk, "\144\145\143\x72\x79\x70\x74");
        $this->nameId = SAMLSPUtilities::parseNameId($vk);
        $this->encryptedNameId = NULL;
    }
    public function decryptAttributes(XMLSecurityKey $U6, array $XR = array())
    {
        if (!($this->encryptedAttribute === NULL)) {
            goto b_;
        }
        return;
        b_:
        $Bu = TRUE;
        $QS = $this->encryptedAttribute;
        foreach ($QS as $jX) {
            $cX = SAMLSPUtilities::decryptElement($jX->getElementsByTagName("\x45\156\x63\x72\x79\x70\x74\x65\144\104\141\164\x61")->item(0), $U6, $XR);
            if ($cX->hasAttribute("\116\x61\x6d\x65")) {
                goto ui;
            }
            throw new Exception("\115\x69\x73\x73\151\x6e\x67\x20\x6e\x61\155\x65\40\157\x6e\x20\74\163\x61\155\154\72\x41\164\x74\162\x69\x62\x75\164\145\x3e\x20\145\x6c\145\155\145\x6e\164\x2e");
            ui:
            $JI = $cX->getAttribute("\x4e\141\x6d\145");
            if ($cX->hasAttribute("\116\x61\x6d\145\106\x6f\162\155\141\164")) {
                goto Ht;
            }
            $iO = "\x75\x72\156\72\x6f\141\163\x69\x73\72\156\x61\155\x65\163\x3a\164\x63\72\x53\x41\115\114\x3a\x32\56\60\72\141\x74\164\162\x6e\x61\x6d\x65\x2d\146\x6f\x72\155\141\x74\x3a\165\156\163\160\x65\x63\x69\x66\151\145\x64";
            goto Lr;
            Ht:
            $iO = $cX->getAttribute("\x4e\x61\155\145\106\x6f\x72\x6d\x61\164");
            Lr:
            if ($Bu) {
                goto MI;
            }
            if (!($this->nameFormat !== $iO)) {
                goto r5;
            }
            $this->nameFormat = "\165\162\x6e\x3a\x6f\x61\x73\x69\163\72\156\x61\155\x65\x73\72\x74\143\72\x53\x41\115\x4c\x3a\x32\x2e\60\x3a\141\x74\164\162\x6e\x61\x6d\x65\x2d\146\x6f\x72\155\141\x74\x3a\x75\156\x73\x70\145\143\x69\146\x69\x65\144";
            r5:
            goto dx;
            MI:
            $this->nameFormat = $iO;
            $Bu = FALSE;
            dx:
            if (array_key_exists($JI, $this->attributes)) {
                goto ZK;
            }
            $this->attributes[$JI] = array();
            ZK:
            $go = SAMLSPUtilities::xpQuery($cX, "\56\x2f\x73\x61\x6d\154\137\141\163\163\x65\x72\164\151\x6f\x6e\x3a\101\x74\x74\162\151\142\165\x74\x65\x56\x61\x6c\165\145");
            foreach ($go as $St) {
                $this->attributes[$JI][] = trim($St->textContent);
                FC:
            }
            VD:
            U1:
        }
        sd:
    }
    public function getNotBefore()
    {
        return $this->notBefore;
    }
    public function setNotBefore($zW)
    {
        $this->notBefore = $zW;
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($I3)
    {
        $this->notOnOrAfter = $I3;
    }
    public function setEncryptedAttributes($om)
    {
        $this->requiredEncAttributes = $om;
    }
    public function getValidAudiences()
    {
        return $this->validAudiences;
    }
    public function setValidAudiences(array $fF = NULL)
    {
        $this->validAudiences = $fF;
    }
    public function getAuthnInstant()
    {
        return $this->authnInstant;
    }
    public function setAuthnInstant($Sw)
    {
        $this->authnInstant = $Sw;
    }
    public function getSessionNotOnOrAfter()
    {
        return $this->sessionNotOnOrAfter;
    }
    public function setSessionNotOnOrAfter($Pn)
    {
        $this->sessionNotOnOrAfter = $Pn;
    }
    public function getSessionIndex()
    {
        return $this->sessionIndex;
    }
    public function setSessionIndex($U2)
    {
        $this->sessionIndex = $U2;
    }
    public function getAuthnContext()
    {
        if (empty($this->authnContextClassRef)) {
            goto Lb;
        }
        return $this->authnContextClassRef;
        Lb:
        if (empty($this->authnContextDeclRef)) {
            goto Jj;
        }
        return $this->authnContextDeclRef;
        Jj:
        return NULL;
    }
    public function setAuthnContext($t_)
    {
        $this->setAuthnContextClassRef($t_);
    }
    public function getAuthnContextClassRef()
    {
        return $this->authnContextClassRef;
    }
    public function setAuthnContextClassRef($ih)
    {
        $this->authnContextClassRef = $ih;
    }
    public function setAuthnContextDecl(SAML2_XML_Chunk $KW)
    {
        if (empty($this->authnContextDeclRef)) {
            goto uP;
        }
        throw new Exception("\101\165\164\x68\156\x43\x6f\x6e\x74\x65\x78\164\104\145\x63\x6c\122\x65\146\40\x69\163\40\141\154\162\x65\x61\x64\x79\40\x72\145\x67\151\x73\164\x65\x72\x65\x64\41\40\115\141\171\40\x6f\156\154\x79\x20\150\141\x76\x65\x20\x65\151\164\x68\x65\x72\x20\x61\40\x44\145\x63\x6c\x20\157\x72\x20\x61\40\104\145\x63\154\122\x65\146\x2c\x20\156\x6f\x74\x20\x62\x6f\164\x68\x21");
        uP:
        $this->authnContextDecl = $KW;
    }
    public function getAuthnContextDecl()
    {
        return $this->authnContextDecl;
    }
    public function setAuthnContextDeclRef($Nd)
    {
        if (empty($this->authnContextDecl)) {
            goto sW;
        }
        throw new Exception("\x41\165\x74\x68\156\x43\157\x6e\x74\145\x78\x74\104\x65\143\154\x20\151\x73\40\x61\x6c\162\x65\141\144\x79\40\162\x65\147\151\163\164\145\x72\145\x64\41\x20\115\x61\171\40\x6f\x6e\154\171\x20\150\x61\166\x65\40\x65\151\x74\x68\145\x72\x20\141\40\x44\145\143\154\40\157\x72\x20\x61\x20\x44\145\143\x6c\x52\145\x66\x2c\x20\156\157\x74\40\142\x6f\x74\150\41");
        sW:
        $this->authnContextDeclRef = $Nd;
    }
    public function getAuthnContextDeclRef()
    {
        return $this->authnContextDeclRef;
    }
    public function getAuthenticatingAuthority()
    {
        return $this->AuthenticatingAuthority;
    }
    public function setAuthenticatingAuthority($Xh)
    {
        $this->AuthenticatingAuthority = $Xh;
    }
    public function getAttributes()
    {
        return $this->attributes;
    }
    public function setAttributes(array $QS)
    {
        $this->attributes = $QS;
    }
    public function getAttributeNameFormat()
    {
        return $this->nameFormat;
    }
    public function setAttributeNameFormat($iO)
    {
        $this->nameFormat = $iO;
    }
    public function getSubjectConfirmation()
    {
        return $this->SubjectConfirmation;
    }
    public function setSubjectConfirmation(array $Hf)
    {
        $this->SubjectConfirmation = $Hf;
    }
    public function getSignatureKey()
    {
        return $this->signatureKey;
    }
    public function setSignatureKey(XMLsecurityKey $FJ = NULL)
    {
        $this->signatureKey = $FJ;
    }
    public function getEncryptionKey()
    {
        return $this->encryptionKey;
    }
    public function setEncryptionKey(XMLSecurityKey $Td = NULL)
    {
        $this->encryptionKey = $Td;
    }
    public function setCertificates(array $Nw)
    {
        $this->certificates = $Nw;
    }
    public function getCertificates()
    {
        return $this->certificates;
    }
    public function getSignatureData()
    {
        return $this->signatureData;
    }
    public function getWasSignedAtConstruction()
    {
        return $this->wasSignedAtConstruction;
    }
    public function toXML(DOMNode $CH = NULL)
    {
        if ($CH === NULL) {
            goto v6;
        }
        $QQ = $CH->ownerDocument;
        goto N6;
        v6:
        $QQ = new DOMDocument();
        $CH = $QQ;
        N6:
        $gS = $QQ->createElementNS("\165\162\156\x3a\x6f\x61\x73\x69\163\72\156\141\155\x65\163\x3a\x74\143\72\x53\101\115\x4c\72\x32\x2e\x30\72\x61\163\163\x65\x72\164\x69\x6f\x6e", "\x73\141\x6d\x6c\x3a" . "\x41\163\163\x65\162\164\x69\157\156");
        $CH->appendChild($gS);
        $gS->setAttributeNS("\x75\162\156\72\157\141\x73\151\163\72\156\x61\x6d\x65\163\72\x74\143\x3a\x53\x41\x4d\x4c\x3a\x32\56\60\x3a\160\x72\x6f\164\x6f\143\157\x6c", "\x73\x61\x6d\154\x70\72\x74\x6d\160", "\164\155\160");
        $gS->removeAttributeNS("\x75\162\x6e\x3a\x6f\x61\x73\x69\163\72\x6e\x61\155\x65\163\72\164\x63\72\123\101\115\114\72\62\x2e\60\72\x70\x72\x6f\164\x6f\x63\157\x6c", "\164\155\x70");
        $gS->setAttributeNS("\150\x74\x74\x70\x3a\x2f\x2f\167\167\x77\x2e\167\63\56\157\162\147\57\62\60\60\61\57\130\x4d\114\x53\143\x68\x65\x6d\x61\55\x69\156\163\x74\141\x6e\x63\x65", "\x78\x73\x69\72\164\155\160", "\x74\155\x70");
        $gS->removeAttributeNS("\x68\164\x74\160\72\x2f\57\167\167\x77\x2e\167\x33\x2e\x6f\162\147\x2f\62\x30\x30\61\x2f\130\115\x4c\123\x63\150\145\155\141\55\x69\156\x73\164\141\x6e\x63\x65", "\x74\x6d\x70");
        $gS->setAttributeNS("\150\x74\164\x70\72\x2f\x2f\167\x77\167\56\167\x33\x2e\x6f\x72\x67\x2f\62\x30\60\61\x2f\130\115\114\123\143\x68\145\x6d\x61", "\x78\163\x3a\x74\155\160", "\164\155\160");
        $gS->removeAttributeNS("\x68\164\x74\x70\x3a\57\57\167\x77\167\56\167\63\56\157\162\147\x2f\62\60\60\61\x2f\130\x4d\114\x53\143\x68\x65\x6d\141", "\164\155\160");
        $gS->setAttribute("\x49\x44", $this->id);
        $gS->setAttribute("\x56\145\162\x73\x69\157\156", "\x32\56\60");
        $gS->setAttribute("\x49\x73\163\x75\145\x49\156\x73\164\141\x6e\x74", gmdate("\x59\x2d\155\55\144\x5c\x54\110\x3a\x69\x3a\x73\x5c\132", $this->issueInstant));
        $rk = SAMLSPUtilities::addString($gS, "\165\162\x6e\x3a\x6f\141\163\x69\x73\72\x6e\x61\x6d\145\x73\x3a\164\x63\72\123\x41\115\x4c\72\62\x2e\x30\72\141\x73\163\x65\162\x74\151\x6f\x6e", "\163\x61\x6d\x6c\72\x49\x73\x73\165\x65\162", $this->issuer);
        $this->addSubject($gS);
        $this->addConditions($gS);
        $this->addAuthnStatement($gS);
        if ($this->requiredEncAttributes == FALSE) {
            goto yQ;
        }
        $this->addEncryptedAttributeStatement($gS);
        goto ov;
        yQ:
        $this->addAttributeStatement($gS);
        ov:
        if (!($this->signatureKey !== NULL)) {
            goto J4;
        }
        SAMLSPUtilities::insertSignature($this->signatureKey, $this->certificates, $gS, $rk->nextSibling);
        J4:
        return $gS;
    }
    private function addSubject(DOMElement $gS)
    {
        if (!($this->nameId === NULL && $this->encryptedNameId === NULL)) {
            goto Fa;
        }
        return;
        Fa:
        $kX = $gS->ownerDocument->createElementNS("\x75\x72\156\x3a\157\141\163\151\x73\x3a\x6e\141\155\145\163\x3a\x74\143\72\x53\101\115\x4c\x3a\62\x2e\60\x3a\x61\x73\x73\145\x72\x74\x69\x6f\x6e", "\163\x61\155\154\x3a\x53\x75\x62\152\145\143\x74");
        $gS->appendChild($kX);
        if ($this->encryptedNameId === NULL) {
            goto Dy;
        }
        $JK = $kX->ownerDocument->createElementNS("\165\162\156\72\157\x61\x73\151\x73\72\156\141\x6d\145\163\x3a\x74\143\x3a\x53\x41\x4d\114\x3a\x32\56\x30\x3a\141\x73\163\145\162\x74\151\157\156", "\163\141\155\154\72" . "\105\x6e\143\x72\x79\160\x74\x65\144\111\104");
        $kX->appendChild($JK);
        $JK->appendChild($kX->ownerDocument->importNode($this->encryptedNameId, TRUE));
        goto N0;
        Dy:
        SAMLSPUtilities::addNameId($kX, $this->nameId);
        N0:
        foreach ($this->SubjectConfirmation as $q0) {
            $q0->toXML($kX);
            L2:
        }
        ZP:
    }
    private function addConditions(DOMElement $gS)
    {
        $QQ = $gS->ownerDocument;
        $Vc = $QQ->createElementNS("\165\x72\156\x3a\157\141\x73\x69\x73\72\x6e\x61\x6d\x65\x73\72\x74\x63\x3a\123\101\115\x4c\x3a\x32\56\60\x3a\141\163\163\145\162\164\x69\157\x6e", "\x73\141\155\x6c\x3a\x43\x6f\x6e\144\x69\164\151\157\156\x73");
        $gS->appendChild($Vc);
        if (!($this->notBefore !== NULL)) {
            goto qb;
        }
        $Vc->setAttribute("\x4e\x6f\164\102\145\146\x6f\x72\145", gmdate("\x59\55\x6d\x2d\x64\134\124\110\x3a\x69\x3a\x73\134\x5a", $this->notBefore));
        qb:
        if (!($this->notOnOrAfter !== NULL)) {
            goto r0;
        }
        $Vc->setAttribute("\116\x6f\x74\x4f\156\117\162\x41\x66\x74\x65\x72", gmdate("\x59\55\155\55\144\134\x54\x48\72\151\x3a\x73\134\132", $this->notOnOrAfter));
        r0:
        if (!($this->validAudiences !== NULL)) {
            goto u9;
        }
        $Sg = $QQ->createElementNS("\x75\162\x6e\x3a\x6f\141\163\x69\163\72\x6e\141\155\145\x73\x3a\164\143\x3a\x53\x41\115\114\x3a\62\56\x30\x3a\x61\163\x73\145\x72\x74\151\x6f\156", "\x73\x61\155\154\72\101\x75\x64\151\x65\x6e\143\145\x52\x65\163\x74\x72\151\143\x74\151\157\156");
        $Vc->appendChild($Sg);
        SAMLSPUtilities::addStrings($Sg, "\165\162\156\x3a\157\141\163\151\163\72\156\141\155\145\x73\72\x74\143\72\123\101\x4d\x4c\72\62\x2e\x30\72\x61\x73\163\x65\162\x74\151\x6f\x6e", "\163\141\x6d\154\72\x41\x75\x64\151\x65\156\143\145", FALSE, $this->validAudiences);
        u9:
    }
    private function addAuthnStatement(DOMElement $gS)
    {
        if (!($this->authnInstant === NULL || $this->authnContextClassRef === NULL && $this->authnContextDecl === NULL && $this->authnContextDeclRef === NULL)) {
            goto lM;
        }
        return;
        lM:
        $QQ = $gS->ownerDocument;
        $jm = $QQ->createElementNS("\x75\162\156\x3a\x6f\141\x73\151\x73\72\x6e\141\155\x65\163\x3a\x74\143\x3a\x53\101\115\114\72\62\x2e\60\72\141\163\x73\145\x72\164\x69\x6f\156", "\163\x61\x6d\154\x3a\101\165\x74\x68\x6e\123\x74\x61\x74\145\155\x65\x6e\x74");
        $gS->appendChild($jm);
        $jm->setAttribute("\101\165\164\150\x6e\x49\156\x73\x74\x61\156\x74", gmdate("\131\55\155\55\x64\134\124\110\x3a\x69\72\163\134\x5a", $this->authnInstant));
        if (!($this->sessionNotOnOrAfter !== NULL)) {
            goto Rf;
        }
        $jm->setAttribute("\x53\145\163\163\x69\157\156\x4e\x6f\164\x4f\x6e\x4f\x72\101\146\164\145\x72", gmdate("\131\55\x6d\55\x64\x5c\x54\110\x3a\x69\72\163\x5c\x5a", $this->sessionNotOnOrAfter));
        Rf:
        if (!($this->sessionIndex !== NULL)) {
            goto ay;
        }
        $jm->setAttribute("\x53\x65\163\163\151\157\x6e\111\x6e\x64\145\x78", $this->sessionIndex);
        ay:
        $fo = $QQ->createElementNS("\165\x72\156\72\157\x61\163\151\x73\72\156\x61\155\145\x73\72\164\x63\72\123\101\115\x4c\x3a\62\56\60\x3a\141\163\163\145\162\164\151\157\156", "\163\x61\155\x6c\72\101\165\164\x68\156\x43\x6f\156\x74\x65\170\164");
        $jm->appendChild($fo);
        if (empty($this->authnContextClassRef)) {
            goto lT;
        }
        SAMLSPUtilities::addString($fo, "\165\162\156\72\157\x61\163\x69\x73\72\x6e\141\x6d\145\163\x3a\x74\x63\x3a\x53\x41\115\x4c\72\x32\56\60\72\x61\x73\163\145\x72\164\151\x6f\156", "\163\x61\x6d\x6c\72\101\165\x74\150\156\103\x6f\156\x74\145\170\164\103\x6c\141\x73\163\x52\x65\x66", $this->authnContextClassRef);
        lT:
        if (empty($this->authnContextDecl)) {
            goto Gy;
        }
        $this->authnContextDecl->toXML($fo);
        Gy:
        if (empty($this->authnContextDeclRef)) {
            goto Yy;
        }
        SAMLSPUtilities::addString($fo, "\165\162\x6e\72\157\x61\163\151\x73\72\x6e\x61\x6d\x65\163\72\164\143\x3a\x53\x41\x4d\114\x3a\62\x2e\60\x3a\141\163\x73\145\x72\x74\151\x6f\x6e", "\163\141\155\x6c\x3a\x41\165\x74\150\x6e\103\157\156\164\145\170\164\104\145\x63\x6c\x52\x65\x66", $this->authnContextDeclRef);
        Yy:
        SAMLSPUtilities::addStrings($fo, "\165\x72\x6e\x3a\x6f\141\x73\151\x73\72\156\x61\x6d\x65\163\x3a\164\143\x3a\x53\x41\115\x4c\x3a\62\56\60\72\x61\x73\163\145\x72\x74\151\x6f\x6e", "\163\141\x6d\154\x3a\101\x75\164\x68\145\x6e\x74\151\x63\x61\x74\x69\156\x67\x41\x75\x74\x68\157\x72\x69\164\171", FALSE, $this->AuthenticatingAuthority);
    }
    private function addAttributeStatement(DOMElement $gS)
    {
        if (!empty($this->attributes)) {
            goto ij;
        }
        return;
        ij:
        $QQ = $gS->ownerDocument;
        $TT = $QQ->createElementNS("\x75\x72\156\72\157\141\x73\151\163\x3a\x6e\x61\x6d\145\x73\x3a\x74\143\x3a\123\101\115\114\x3a\62\x2e\60\72\x61\163\163\145\x72\164\151\x6f\x6e", "\x73\141\x6d\154\72\x41\164\164\162\x69\142\x75\164\x65\x53\164\141\x74\145\155\145\156\164");
        $gS->appendChild($TT);
        foreach ($this->attributes as $JI => $go) {
            $cX = $QQ->createElementNS("\x75\x72\x6e\x3a\x6f\x61\x73\151\163\72\156\141\x6d\x65\163\72\x74\143\72\123\x41\115\x4c\x3a\x32\x2e\x30\x3a\141\163\163\x65\162\x74\151\157\x6e", "\x73\141\155\x6c\72\101\x74\x74\x72\x69\x62\x75\164\145");
            $TT->appendChild($cX);
            $cX->setAttribute("\116\x61\155\145", $JI);
            if (!($this->nameFormat !== "\x75\x72\156\72\157\x61\163\x69\x73\x3a\156\x61\155\x65\163\72\164\143\72\123\x41\115\114\x3a\62\x2e\x30\x3a\141\x74\x74\x72\x6e\x61\155\x65\x2d\146\157\x72\x6d\x61\x74\x3a\165\156\163\160\x65\x63\151\146\151\145\144")) {
                goto t9;
            }
            $cX->setAttribute("\x4e\x61\x6d\145\x46\x6f\162\x6d\x61\x74", $this->nameFormat);
            t9:
            foreach ($go as $St) {
                if (is_string($St)) {
                    goto dK;
                }
                if (is_int($St)) {
                    goto L5;
                }
                $HA = NULL;
                goto wd;
                dK:
                $HA = "\170\163\x3a\163\x74\162\x69\x6e\x67";
                goto wd;
                L5:
                $HA = "\x78\163\x3a\151\x6e\164\145\147\x65\162";
                wd:
                $hn = $QQ->createElementNS("\165\162\156\72\x6f\x61\163\151\x73\72\156\141\155\x65\163\x3a\164\143\72\123\101\x4d\x4c\72\x32\56\60\72\x61\163\163\x65\162\x74\151\157\156", "\163\141\x6d\154\72\101\164\x74\162\x69\x62\x75\x74\x65\126\141\x6c\165\x65");
                $cX->appendChild($hn);
                if (!($HA !== NULL)) {
                    goto Pu;
                }
                $hn->setAttributeNS("\150\164\x74\160\72\57\57\x77\167\x77\56\167\x33\56\157\x72\147\57\62\x30\x30\61\57\x58\x4d\x4c\x53\x63\150\x65\155\x61\55\151\156\163\164\x61\156\143\145", "\x78\163\x69\72\164\171\160\x65", $HA);
                Pu:
                if (!is_null($St)) {
                    goto op;
                }
                $hn->setAttributeNS("\150\x74\x74\x70\x3a\x2f\57\167\x77\x77\56\167\63\56\x6f\162\x67\x2f\62\x30\60\x31\57\130\115\x4c\x53\143\x68\x65\155\141\55\x69\156\163\164\x61\x6e\143\x65", "\x78\163\151\x3a\x6e\151\x6c", "\164\162\x75\145");
                op:
                if ($St instanceof DOMNodeList) {
                    goto yV;
                }
                $hn->appendChild($QQ->createTextNode($St));
                goto fk;
                yV:
                $jb = 0;
                ML:
                if (!($jb < $St->length)) {
                    goto cU;
                }
                $Fr = $QQ->importNode($St->item($jb), TRUE);
                $hn->appendChild($Fr);
                sB:
                $jb++;
                goto ML;
                cU:
                fk:
                SZ:
            }
            Bw:
            cH:
        }
        qX:
    }
    private function addEncryptedAttributeStatement(DOMElement $gS)
    {
        if (!($this->requiredEncAttributes == FALSE)) {
            goto fz;
        }
        return;
        fz:
        $QQ = $gS->ownerDocument;
        $TT = $QQ->createElementNS("\x75\x72\x6e\x3a\157\x61\163\151\163\x3a\156\141\x6d\x65\x73\72\164\143\72\x53\101\x4d\114\x3a\62\x2e\60\x3a\141\163\163\x65\x72\x74\x69\x6f\x6e", "\163\x61\155\x6c\72\101\164\164\162\x69\142\x75\x74\x65\x53\x74\x61\164\x65\155\145\156\164");
        $gS->appendChild($TT);
        foreach ($this->attributes as $JI => $go) {
            $Qm = new DOMDocument();
            $cX = $Qm->createElementNS("\165\x72\x6e\x3a\x6f\141\163\151\x73\72\x6e\141\155\x65\163\72\164\143\72\x53\x41\x4d\114\x3a\x32\x2e\60\72\x61\x73\163\x65\162\164\151\157\156", "\163\141\x6d\x6c\72\x41\x74\x74\x72\x69\x62\165\164\x65");
            $cX->setAttribute("\116\x61\155\145", $JI);
            $Qm->appendChild($cX);
            if (!($this->nameFormat !== "\x75\x72\x6e\72\157\141\163\151\163\x3a\x6e\141\155\145\163\72\x74\143\x3a\123\101\115\114\x3a\x32\56\60\72\x61\164\164\162\156\141\155\145\x2d\x66\157\x72\155\x61\164\x3a\x75\x6e\163\x70\145\x63\151\x66\151\x65\144")) {
                goto eY;
            }
            $cX->setAttribute("\x4e\x61\155\x65\106\x6f\x72\x6d\x61\x74", $this->nameFormat);
            eY:
            foreach ($go as $St) {
                if (is_string($St)) {
                    goto rM;
                }
                if (is_int($St)) {
                    goto BC;
                }
                $HA = NULL;
                goto qh;
                rM:
                $HA = "\170\x73\72\163\164\x72\151\156\x67";
                goto qh;
                BC:
                $HA = "\170\163\x3a\151\x6e\164\145\x67\x65\x72";
                qh:
                $hn = $Qm->createElementNS("\165\162\156\72\157\x61\x73\x69\x73\x3a\x6e\141\155\145\163\72\x74\143\x3a\123\101\115\114\72\62\x2e\60\72\x61\163\163\x65\162\x74\x69\x6f\156", "\163\141\155\154\72\101\x74\x74\162\x69\x62\165\x74\145\x56\141\x6c\165\x65");
                $cX->appendChild($hn);
                if (!($HA !== NULL)) {
                    goto hU;
                }
                $hn->setAttributeNS("\150\164\x74\x70\72\57\x2f\167\x77\167\56\x77\63\56\157\162\147\x2f\62\x30\x30\x31\57\x58\115\x4c\123\143\x68\145\155\x61\x2d\151\x6e\x73\164\x61\x6e\x63\145", "\170\x73\x69\x3a\x74\171\160\x65", $HA);
                hU:
                if ($St instanceof DOMNodeList) {
                    goto A0;
                }
                $hn->appendChild($Qm->createTextNode($St));
                goto qZ;
                A0:
                $jb = 0;
                Sb:
                if (!($jb < $St->length)) {
                    goto YI;
                }
                $Fr = $Qm->importNode($St->item($jb), TRUE);
                $hn->appendChild($Fr);
                J9:
                $jb++;
                goto Sb;
                YI:
                qZ:
                Vc:
            }
            Mo:
            $GX = new XMLSecEnc();
            $GX->setNode($Qm->documentElement);
            $GX->type = "\150\x74\164\160\x3a\57\57\167\167\x77\56\x77\x33\56\157\x72\147\x2f\x32\60\x30\x31\57\60\64\57\x78\155\154\x65\x6e\x63\x23\x45\154\145\x6d\145\x6e\x74";
            $Bt = new XMLSecurityKey(XMLSecurityKey::AES256_CBC);
            $Bt->generateSessionKey();
            $GX->encryptKey($this->encryptionKey, $Bt);
            $Al = $GX->encryptNode($Bt);
            $xv = $QQ->createElementNS("\x75\162\156\x3a\x6f\x61\163\x69\x73\72\x6e\141\155\x65\163\x3a\x74\x63\x3a\x53\x41\115\114\72\x32\56\x30\72\x61\163\x73\x65\162\164\151\x6f\156", "\x73\141\155\x6c\x3a\x45\x6e\x63\x72\x79\160\x74\145\144\101\x74\164\162\x69\142\x75\164\x65");
            $TT->appendChild($xv);
            $sY = $QQ->importNode($Al, TRUE);
            $xv->appendChild($sY);
            JS:
        }
        ld:
    }
    public function getPrivateKeyUrl()
    {
        return $this->privateKeyUrl;
    }
    public function setPrivateKeyUrl($Xd)
    {
        $this->privateKeyUrl = $Xd;
    }
}
