<?php


include_once "\x55\164\x69\154\x69\x74\x69\x65\x73\56\160\x68\x70";
include_once "\x78\x6d\x6c\x73\x65\x63\x6c\x69\x62\163\56\160\x68\160";
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
    public function __construct(DOMElement $DG = NULL, $ou)
    {
        $this->id = SAMLSPUtilities::generateId();
        $this->issueInstant = SAMLSPUtilities::generateTimestamp();
        $this->issuer = '';
        $this->authnInstant = SAMLSPUtilities::generateTimestamp();
        $this->attributes = array();
        $this->nameFormat = "\165\162\x6e\72\x6f\141\x73\x69\x73\x3a\x6e\x61\155\x65\163\72\164\143\x3a\123\x41\115\114\x3a\x31\56\x31\72\x6e\x61\x6d\145\151\x64\55\x66\x6f\x72\155\141\x74\72\165\x6e\163\160\145\x63\x69\x66\x69\145\144";
        $this->certificates = array();
        $this->AuthenticatingAuthority = array();
        $this->SubjectConfirmation = array();
        if (!($DG === NULL)) {
            goto tv;
        }
        return;
        tv:
        if (!($DG->localName === "\x45\x6e\x63\162\171\160\164\x65\x64\x41\163\163\x65\x72\164\x69\x6f\156")) {
            goto Y3;
        }
        $u_ = SAMLSPUtilities::xpQuery($DG, "\56\57\x78\x65\156\143\x3a\105\x6e\143\162\171\160\x74\x65\144\x44\141\164\141");
        $Cx = SAMLSPUtilities::xpQuery($DG, "\57\57\52\133\x6c\157\143\x61\154\55\156\x61\155\145\50\51\x3d\47\x45\156\143\x72\171\160\x74\x65\144\x4b\x65\171\47\x5d\x2f\52\133\154\x6f\143\x61\154\x2d\156\141\x6d\145\50\x29\75\x27\x45\x6e\x63\x72\171\160\164\x69\x6f\156\x4d\x65\164\150\x6f\x64\47\135\57\100\x41\x6c\x67\157\x72\x69\164\150\x6d");
        $De = $Cx[0]->value;
        $lM = SAMLSPUtilities::getEncryptionAlgorithm($De);
        if (count($u_) === 0) {
            goto ZQ;
        }
        if (count($u_) > 1) {
            goto O9;
        }
        goto Un;
        ZQ:
        throw new Exception("\x4d\151\163\163\151\156\x67\40\x65\x6e\143\162\171\x70\164\145\144\x20\x64\141\x74\x61\x20\x69\x6e\40\x3c\x73\x61\x6d\154\x3a\105\156\143\162\171\x70\164\x65\x64\101\x73\x73\x65\x72\x74\x69\157\x6e\76\56");
        goto Un;
        O9:
        throw new Exception("\115\157\162\145\x20\x74\x68\x61\156\x20\157\x6e\x65\40\145\156\x63\x72\x79\x70\x74\x65\x64\x20\144\141\x74\141\40\x65\x6c\145\x6d\145\x6e\x74\40\x69\x6e\40\x3c\x73\x61\x6d\x6c\x3a\105\156\x63\162\171\x70\164\145\144\101\x73\163\x65\162\164\151\x6f\x6e\76\56");
        Un:
        $Ej = new XMLSecurityKey($lM, array("\164\x79\160\145" => "\x70\162\151\x76\x61\x74\x65"));
        $Ej->loadKey($ou, FALSE);
        $xx = array();
        $DG = SAMLSPUtilities::decryptElement($u_[0], $Ej, $xx);
        Y3:
        if ($DG->hasAttribute("\x49\x44")) {
            goto Vi;
        }
        throw new Exception("\115\x69\x73\x73\x69\x6e\147\x20\111\104\40\141\x74\164\162\151\x62\x75\164\145\40\x6f\x6e\40\x53\101\x4d\x4c\40\x61\x73\x73\x65\162\x74\151\157\x6e\x2e");
        Vi:
        $this->id = $DG->getAttribute("\111\104");
        if (!($DG->getAttribute("\126\145\162\163\151\x6f\x6e") !== "\62\x2e\x30")) {
            goto t7;
        }
        throw new Exception("\x55\x6e\x73\165\x70\x70\x6f\x72\164\145\x64\40\x76\x65\162\x73\151\157\156\72\x20" . $DG->getAttribute("\126\145\162\x73\x69\157\x6e"));
        t7:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($DG->getAttribute("\111\x73\x73\x75\145\x49\x6e\x73\x74\x61\x6e\x74"));
        $e8 = SAMLSPUtilities::xpQuery($DG, "\x2e\x2f\163\141\x6d\154\137\141\x73\163\x65\162\164\151\157\156\72\111\163\163\165\145\162");
        if (!empty($e8)) {
            goto Hz;
        }
        throw new Exception("\x4d\151\x73\x73\x69\156\147\40\74\163\x61\155\x6c\72\111\x73\163\165\145\x72\76\40\151\x6e\x20\141\163\163\x65\x72\164\151\157\156\56");
        Hz:
        $this->issuer = trim($e8[0]->textContent);
        $this->parseConditions($DG);
        $this->parseAuthnStatement($DG);
        $this->parseAttributes($DG);
        $this->parseEncryptedAttributes($DG);
        $this->parseSignature($DG);
        $this->parseSubject($DG);
    }
    private function parseSubject(DOMElement $DG)
    {
        $Sf = SAMLSPUtilities::xpQuery($DG, "\x2e\x2f\163\141\x6d\154\137\141\x73\x73\145\x72\x74\x69\x6f\x6e\x3a\123\x75\142\x6a\x65\x63\x74");
        if (empty($Sf)) {
            goto xd;
        }
        if (count($Sf) > 1) {
            goto G7;
        }
        goto B9;
        xd:
        return;
        goto B9;
        G7:
        throw new Exception("\115\157\162\x65\x20\164\x68\x61\x6e\x20\157\x6e\x65\40\x3c\x73\x61\x6d\x6c\x3a\123\x75\x62\152\145\143\x74\76\40\151\156\x20\74\x73\141\x6d\x6c\x3a\101\163\163\x65\162\164\151\x6f\x6e\76\56");
        B9:
        $Sf = $Sf[0];
        $t0 = SAMLSPUtilities::xpQuery($Sf, "\56\x2f\x73\141\x6d\x6c\137\x61\163\163\145\162\164\x69\157\156\72\116\x61\x6d\x65\x49\104\40\174\x20\56\57\x73\141\x6d\154\137\141\163\x73\x65\x72\x74\x69\157\156\x3a\105\156\x63\x72\171\160\164\145\144\111\104\57\170\145\x6e\143\72\x45\156\x63\162\x79\160\164\x65\144\104\x61\164\x61");
        if (empty($t0)) {
            goto qj;
        }
        if (count($t0) > 1) {
            goto sy;
        }
        goto Uv;
        qj:
        $cL = $_POST["\122\x65\154\x61\x79\x53\x74\x61\164\x65"];
        if ($cL == "\164\x65\x73\164\x56\141\154\x69\x64\x61\164\x65" or $cL == "\164\x65\163\164\116\x65\x77\x43\x65\x72\x74\x69\146\x69\143\141\x74\145") {
            goto kF;
        }
        wp_die("\x57\145\40\x63\x6f\165\x6c\144\40\156\157\164\x20\163\151\x67\x6e\40\171\157\x75\40\x69\x6e\x2e\40\120\154\145\x61\x73\145\x20\x63\x6f\156\164\x61\x63\x74\x20\x79\157\165\x72\x20\141\144\x6d\x69\x6e\151\x73\164\162\141\x74\157\x72");
        goto TV;
        kF:
        echo "\74\x64\151\x76\x20\163\x74\x79\154\145\x3d\x22\x66\157\x6e\x74\55\x66\141\x6d\x69\154\171\72\x43\x61\154\x69\142\162\x69\73\160\x61\x64\144\151\156\x67\x3a\x30\x20\63\45\x3b\x22\x3e";
        echo "\x3c\144\151\166\x20\163\164\171\154\x65\x3d\x22\x63\157\154\157\162\x3a\40\43\x61\71\64\64\64\62\x3b\x62\x61\143\x6b\147\x72\x6f\165\156\144\55\x63\x6f\x6c\157\x72\72\x20\43\146\62\x64\145\144\x65\x3b\160\x61\144\x64\151\x6e\x67\72\x20\x31\65\x70\x78\73\x6d\141\x72\147\x69\x6e\x2d\x62\x6f\164\x74\x6f\x6d\x3a\40\62\x30\160\170\x3b\164\145\170\164\x2d\141\x6c\x69\147\x6e\x3a\x63\145\x6e\x74\145\x72\73\142\x6f\162\x64\x65\162\72\61\x70\x78\x20\x73\x6f\154\x69\x64\40\43\105\x36\x42\63\x42\x32\x3b\x66\x6f\x6e\164\x2d\x73\x69\172\145\x3a\x31\x38\160\x74\x3b\42\76\x20\105\x52\x52\117\122\x3c\x2f\144\x69\x76\x3e\xd\12\40\x20\x20\40\40\40\40\40\40\40\x20\x3c\144\x69\x76\40\x73\x74\171\154\145\x3d\x22\143\x6f\x6c\x6f\162\72\40\x23\141\x39\64\64\64\62\x3b\x66\x6f\x6e\164\x2d\163\151\172\x65\x3a\61\64\160\164\73\x20\x6d\x61\162\147\151\156\55\x62\157\164\x74\x6f\x6d\x3a\62\x30\x70\170\73\42\x3e\74\x70\76\74\163\x74\x72\x6f\x6e\147\x3e\105\162\x72\157\x72\x3a\x20\x3c\x2f\163\x74\x72\x6f\x6e\147\76\115\x69\163\x73\x69\156\147\x20\x20\116\x61\x6d\x65\x49\104\x20\157\162\x20\105\x6e\143\162\171\160\164\145\144\x49\x44\40\x69\156\40\x53\x41\115\114\40\122\145\163\x70\x6f\x6e\x73\x65\x2e\74\57\160\76\xd\xa\x20\x20\x20\x20\x20\x20\40\x20\40\40\x20\x20\x20\40\40\x20\74\160\x3e\x50\154\x65\141\163\x65\40\143\x6f\x6e\x74\141\143\x74\x20\171\157\x75\x72\x20\141\x64\155\x69\156\x69\163\164\162\x61\164\x6f\x72\x20\141\x6e\x64\x20\162\x65\160\x6f\162\x74\40\164\x68\x65\x20\146\x6f\x6c\154\x6f\x77\151\x6e\147\x20\x65\x72\x72\157\x72\72\x3c\57\x70\x3e\xd\xa\40\40\40\x20\x20\x20\x20\40\40\40\40\40\x20\x20\x20\x20\x3c\160\x3e\74\163\164\162\157\156\147\76\120\x6f\x73\163\x69\x62\x6c\145\x20\x43\141\165\x73\145\72\x3c\57\163\164\162\157\x6e\x67\76\40\x4e\141\x6d\145\111\104\x20\x6e\157\x74\40\146\x6f\165\156\144\40\151\156\x20\123\x41\115\x4c\x20\x52\x65\x73\x70\x6f\156\x73\x65\40\x73\165\x62\152\145\x63\164\56\x3c\x2f\160\x3e\xd\12\x20\x20\x20\x20\x20\40\x20\40\x20\x20\x20\x20\40\x20\x20\40\74\x2f\144\x69\166\x3e\15\xa\x20\x20\40\40\40\40\x20\40\40\40\x20\x20\x20\x20\40\x20\x3c\x64\151\166\40\163\164\x79\x6c\145\75\42\x6d\x61\162\147\151\x6e\x3a\63\45\x3b\144\x69\x73\x70\x6c\141\x79\72\x62\154\x6f\x63\153\x3b\164\x65\170\164\x2d\141\154\x69\x67\x6e\72\x63\x65\x6e\x74\x65\162\73\42\x3e\xd\12\x20\40\x20\x20\40\40\x20\x20\x20\40\x20\x20\x20\x20\40\40\74\144\x69\x76\40\163\164\x79\154\145\x3d\42\155\141\x72\147\151\156\72\x33\45\x3b\144\x69\163\x70\154\x61\171\72\x62\154\x6f\x63\x6b\x3b\x74\x65\x78\164\55\x61\x6c\151\147\x6e\x3a\143\145\x6e\164\145\162\x3b\x22\76\x3c\151\156\160\x75\164\x20\163\x74\171\154\x65\x3d\42\160\141\x64\x64\x69\x6e\x67\72\61\x25\x3b\167\151\x64\164\x68\x3a\61\x30\x30\160\x78\x3b\x62\x61\x63\153\x67\x72\x6f\x75\x6e\x64\x3a\x20\x23\x30\60\71\x31\x43\x44\40\156\x6f\x6e\145\40\162\145\x70\145\141\x74\x20\x73\143\162\157\x6c\154\x20\x30\45\x20\x30\45\73\143\x75\x72\163\x6f\x72\72\40\x70\x6f\x69\156\x74\145\x72\73\146\157\x6e\164\x2d\x73\x69\x7a\x65\x3a\x31\65\160\x78\x3b\142\x6f\162\x64\145\162\x2d\167\151\x64\164\x68\x3a\40\61\160\170\73\x62\x6f\x72\x64\145\x72\x2d\x73\164\171\154\145\72\40\163\157\x6c\x69\x64\x3b\142\x6f\162\x64\x65\162\55\x72\141\x64\151\165\163\72\40\63\x70\170\x3b\x77\x68\151\x74\x65\55\163\160\x61\143\145\x3a\40\156\157\167\x72\x61\160\x3b\142\x6f\170\55\x73\x69\172\x69\156\147\72\40\x62\x6f\x72\144\x65\x72\55\x62\157\x78\x3b\142\157\162\144\x65\x72\x2d\x63\x6f\154\x6f\x72\72\40\x23\60\x30\x37\x33\x41\x41\x3b\142\x6f\x78\55\x73\150\x61\x64\x6f\167\x3a\x20\x30\x70\170\40\61\x70\x78\40\x30\x70\170\x20\x72\147\142\141\x28\61\62\60\54\40\x32\60\x30\54\40\x32\x33\x30\54\40\x30\56\66\x29\x20\x69\156\163\x65\164\x3b\143\x6f\154\x6f\162\72\40\x23\106\106\106\x3b\x22\x74\x79\160\x65\x3d\x22\x62\165\x74\x74\x6f\156\42\x20\x76\141\154\165\145\x3d\x22\x44\x6f\x6e\145\x22\x20\x6f\156\103\154\x69\x63\x6b\75\42\163\x65\x6c\146\x2e\x63\x6c\x6f\163\145\50\51\x3b\x22\x3e\x3c\57\x64\151\x76\76";
        die;
        TV:
        goto Uv;
        sy:
        throw new Exception("\x4d\x6f\162\145\40\164\150\x61\156\x20\157\x6e\145\x20\74\163\141\155\154\72\116\x61\x6d\x65\111\104\x3e\x20\157\162\40\x3c\163\x61\155\x6c\x3a\105\156\x63\162\171\160\x74\x65\x64\104\76\40\x69\156\x20\x3c\163\141\155\x6c\72\123\x75\x62\x6a\x65\x63\164\x3e\56");
        Uv:
        $t0 = $t0[0];
        if ($t0->localName === "\105\156\x63\162\x79\160\x74\x65\x64\x44\x61\164\x61") {
            goto vF;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($t0);
        goto OO;
        vF:
        $this->encryptedNameId = $t0;
        OO:
    }
    private function parseConditions(DOMElement $DG)
    {
        $rK = SAMLSPUtilities::xpQuery($DG, "\56\57\x73\141\155\154\137\141\x73\163\x65\x72\164\x69\157\x6e\72\103\x6f\x6e\144\x69\164\x69\157\x6e\x73");
        if (empty($rK)) {
            goto hM;
        }
        if (count($rK) > 1) {
            goto sS;
        }
        goto AZ;
        hM:
        return;
        goto AZ;
        sS:
        throw new Exception("\115\157\162\x65\40\164\x68\x61\x6e\40\x6f\x6e\x65\40\x3c\163\141\155\154\72\103\157\156\x64\x69\164\151\x6f\156\x73\76\40\x69\156\x20\x3c\163\141\x6d\154\x3a\x41\163\x73\145\162\x74\x69\157\x6e\x3e\x2e");
        AZ:
        $rK = $rK[0];
        if (!$rK->hasAttribute("\116\157\164\x42\x65\x66\x6f\162\145")) {
            goto yq;
        }
        $lc = SAMLSPUtilities::xsDateTimeToTimestamp($rK->getAttribute("\x4e\157\164\102\145\146\157\162\x65"));
        if (!($this->notBefore === NULL || $this->notBefore < $lc)) {
            goto Yp;
        }
        $this->notBefore = $lc;
        Yp:
        yq:
        if (!$rK->hasAttribute("\116\157\164\117\x6e\x4f\x72\x41\x66\164\x65\x72")) {
            goto Fv;
        }
        $uC = SAMLSPUtilities::xsDateTimeToTimestamp($rK->getAttribute("\116\x6f\x74\x4f\156\x4f\162\x41\146\x74\x65\x72"));
        if (!($this->notOnOrAfter === NULL || $this->notOnOrAfter > $uC)) {
            goto hk;
        }
        $this->notOnOrAfter = $uC;
        hk:
        Fv:
        $gC = $rK->firstChild;
        hL:
        if (!($gC !== NULL)) {
            goto MI;
        }
        if (!$gC instanceof DOMText) {
            goto F4;
        }
        goto JX;
        F4:
        if (!($gC->namespaceURI !== "\165\162\x6e\x3a\157\x61\x73\151\163\x3a\156\x61\155\145\x73\x3a\164\143\x3a\x53\x41\115\114\x3a\x32\56\60\x3a\141\x73\163\x65\x72\x74\151\157\156")) {
            goto Kq;
        }
        throw new Exception("\125\156\x6b\x6e\x6f\167\x6e\40\156\x61\155\145\x73\160\141\x63\145\40\x6f\146\x20\143\x6f\156\x64\x69\x74\151\x6f\156\x3a\x20" . var_export($gC->namespaceURI, TRUE));
        Kq:
        switch ($gC->localName) {
            case "\101\165\144\x69\x65\x6e\x63\145\x52\x65\x73\x74\162\x69\x63\164\x69\157\x6e":
                $tF = SAMLSPUtilities::extractStrings($gC, "\165\162\156\x3a\157\x61\163\151\x73\72\156\141\155\x65\x73\x3a\164\143\72\123\101\115\x4c\72\x32\x2e\60\72\141\163\x73\x65\162\164\x69\157\156", "\101\x75\144\151\x65\x6e\143\x65");
                if ($this->validAudiences === NULL) {
                    goto Au;
                }
                $this->validAudiences = array_intersect($this->validAudiences, $tF);
                goto Qs;
                Au:
                $this->validAudiences = $tF;
                Qs:
                goto TL;
            case "\117\x6e\145\124\x69\155\145\125\x73\x65":
                goto TL;
            case "\120\x72\x6f\x78\x79\x52\145\163\x74\162\x69\143\x74\x69\x6f\x6e":
                goto TL;
            default:
                throw new Exception("\125\156\x6b\156\x6f\x77\x6e\x20\143\157\x6e\144\151\164\151\x6f\x6e\x3a\40" . var_export($gC->localName, TRUE));
        }
        l8:
        TL:
        JX:
        $gC = $gC->nextSibling;
        goto hL;
        MI:
    }
    private function parseAuthnStatement(DOMElement $DG)
    {
        $Pm = SAMLSPUtilities::xpQuery($DG, "\56\57\x73\x61\x6d\154\x5f\141\163\x73\x65\162\x74\151\x6f\156\x3a\101\165\x74\150\156\123\164\x61\x74\145\x6d\145\x6e\x74");
        if (empty($Pm)) {
            goto CD;
        }
        if (count($Pm) > 1) {
            goto lt;
        }
        goto wi;
        CD:
        $this->authnInstant = NULL;
        return;
        goto wi;
        lt:
        throw new Exception("\x4d\157\162\x65\40\164\x68\141\164\x20\x6f\x6e\x65\x20\x3c\x73\x61\155\x6c\72\x41\x75\x74\x68\156\x53\164\141\x74\x65\x6d\145\x6e\164\x3e\x20\x69\x6e\40\x3c\x73\x61\x6d\154\72\x41\x73\163\145\x72\164\x69\x6f\x6e\x3e\x20\x6e\157\164\x20\163\x75\x70\x70\157\162\x74\145\144\x2e");
        wi:
        $Ks = $Pm[0];
        if ($Ks->hasAttribute("\101\165\164\x68\x6e\x49\x6e\163\x74\141\x6e\x74")) {
            goto P9;
        }
        throw new Exception("\115\x69\163\x73\151\156\147\x20\x72\x65\x71\165\151\x72\x65\144\40\x41\165\164\x68\x6e\x49\156\x73\x74\141\x6e\x74\40\x61\x74\164\x72\x69\x62\x75\x74\145\40\x6f\x6e\x20\74\x73\x61\x6d\154\72\x41\165\164\150\156\x53\x74\141\164\145\155\145\156\164\x3e\56");
        P9:
        $this->authnInstant = SAMLSPUtilities::xsDateTimeToTimestamp($Ks->getAttribute("\101\165\x74\x68\x6e\x49\156\163\164\x61\156\164"));
        if (!$Ks->hasAttribute("\x53\145\x73\163\x69\x6f\156\x4e\157\164\117\156\117\x72\101\x66\x74\145\x72")) {
            goto YX;
        }
        $this->sessionNotOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($Ks->getAttribute("\123\145\x73\x73\151\x6f\156\116\x6f\164\x4f\x6e\117\162\x41\x66\164\145\x72"));
        YX:
        if (!$Ks->hasAttribute("\123\145\163\x73\151\157\156\x49\x6e\x64\145\170")) {
            goto I2;
        }
        $this->sessionIndex = $Ks->getAttribute("\x53\145\163\x73\x69\x6f\x6e\x49\x6e\144\x65\x78");
        I2:
        $this->parseAuthnContext($Ks);
    }
    private function parseAuthnContext(DOMElement $gi)
    {
        $ze = SAMLSPUtilities::xpQuery($gi, "\x2e\57\163\141\155\x6c\137\141\x73\x73\145\162\x74\151\x6f\x6e\72\x41\x75\x74\150\x6e\x43\157\156\164\145\x78\x74");
        if (count($ze) > 1) {
            goto bI;
        }
        if (empty($ze)) {
            goto hS;
        }
        goto WH;
        bI:
        throw new Exception("\115\157\162\145\40\x74\150\x61\156\x20\x6f\x6e\x65\40\x3c\163\141\155\x6c\72\101\165\x74\150\156\103\x6f\x6e\x74\x65\170\164\76\40\151\156\40\74\163\x61\x6d\x6c\x3a\x41\x75\x74\x68\156\x53\x74\141\164\x65\155\145\156\164\76\56");
        goto WH;
        hS:
        throw new Exception("\115\x69\163\x73\151\x6e\x67\x20\x72\x65\161\165\x69\162\145\x64\x20\74\x73\x61\x6d\154\72\x41\x75\164\x68\x6e\x43\157\156\x74\x65\170\x74\76\40\x69\156\x20\74\163\141\155\154\72\101\x75\164\150\156\123\164\x61\x74\x65\155\x65\156\x74\76\x2e");
        WH:
        $fA = $ze[0];
        $bI = SAMLSPUtilities::xpQuery($fA, "\56\x2f\x73\x61\x6d\154\x5f\x61\163\x73\145\x72\164\151\157\156\x3a\x41\165\164\x68\156\103\157\x6e\164\145\x78\x74\104\145\143\154\x52\x65\x66");
        if (count($bI) > 1) {
            goto Pp;
        }
        if (count($bI) === 1) {
            goto Af;
        }
        goto tY;
        Pp:
        throw new Exception("\x4d\157\x72\145\x20\164\x68\x61\x6e\x20\x6f\156\145\40\x3c\163\x61\155\154\x3a\x41\x75\x74\150\x6e\103\157\156\164\x65\170\x74\x44\x65\143\x6c\122\145\x66\x3e\40\x66\157\165\x6e\144\x3f");
        goto tY;
        Af:
        $this->setAuthnContextDeclRef(trim($bI[0]->textContent));
        tY:
        $s7 = SAMLSPUtilities::xpQuery($fA, "\x2e\57\163\x61\x6d\154\x5f\141\x73\163\145\x72\x74\x69\x6f\x6e\x3a\101\165\x74\x68\x6e\x43\x6f\x6e\164\x65\170\164\104\145\x63\154");
        if (count($s7) > 1) {
            goto WN;
        }
        if (count($s7) === 1) {
            goto MM;
        }
        goto Do1;
        WN:
        throw new Exception("\115\157\162\x65\40\164\150\141\x6e\40\x6f\156\x65\x20\x3c\x73\141\x6d\x6c\x3a\101\165\x74\150\156\x43\157\x6e\x74\145\x78\164\x44\145\143\154\76\x20\146\x6f\165\156\144\77");
        goto Do1;
        MM:
        $this->setAuthnContextDecl(new SAML2_XML_Chunk($s7[0]));
        Do1:
        $pz = SAMLSPUtilities::xpQuery($fA, "\56\x2f\163\141\155\x6c\x5f\141\163\x73\x65\x72\164\x69\x6f\x6e\72\x41\x75\164\x68\156\103\x6f\x6e\x74\x65\170\164\103\x6c\141\x73\x73\122\x65\x66");
        if (count($pz) > 1) {
            goto xb;
        }
        if (count($pz) === 1) {
            goto ud;
        }
        goto fa;
        xb:
        throw new Exception("\115\157\x72\145\x20\x74\x68\141\x6e\40\x6f\156\145\x20\74\x73\x61\155\154\72\101\165\164\150\156\103\x6f\x6e\x74\145\170\x74\103\154\141\x73\163\x52\x65\x66\x3e\x20\x69\x6e\40\x3c\163\x61\155\154\72\x41\165\x74\x68\156\x43\157\x6e\164\145\170\x74\76\56");
        goto fa;
        ud:
        $this->setAuthnContextClassRef(trim($pz[0]->textContent));
        fa:
        if (!(empty($this->authnContextClassRef) && empty($this->authnContextDecl) && empty($this->authnContextDeclRef))) {
            goto BR;
        }
        throw new Exception("\x4d\x69\163\x73\x69\x6e\147\x20\x65\151\164\150\x65\x72\40\74\x73\141\155\x6c\72\x41\x75\164\150\x6e\103\157\x6e\x74\145\170\x74\x43\154\141\x73\163\x52\145\146\76\40\157\162\x20\74\x73\141\155\x6c\x3a\101\165\x74\150\x6e\103\x6f\156\x74\145\170\x74\104\x65\x63\154\x52\x65\x66\76\x20\x6f\162\x20\74\163\x61\155\154\x3a\x41\x75\x74\150\156\103\157\x6e\x74\145\170\164\104\x65\143\x6c\76");
        BR:
        $this->AuthenticatingAuthority = SAMLSPUtilities::extractStrings($fA, "\x75\162\156\72\157\x61\163\x69\163\72\156\141\155\145\163\x3a\x74\143\72\x53\101\x4d\x4c\72\x32\56\60\x3a\x61\x73\x73\x65\162\x74\151\x6f\156", "\x41\165\x74\x68\145\156\x74\x69\x63\x61\x74\x69\x6e\147\x41\165\x74\x68\x6f\x72\x69\164\x79");
    }
    private function parseAttributes(DOMElement $DG)
    {
        $f3 = TRUE;
        $Bp = SAMLSPUtilities::xpQuery($DG, "\56\57\163\x61\x6d\154\x5f\x61\x73\163\x65\x72\164\151\x6f\x6e\72\101\x74\x74\x72\151\142\x75\164\145\123\x74\141\164\x65\x6d\145\156\164\x2f\163\x61\x6d\154\x5f\x61\x73\163\145\162\x74\x69\x6f\156\72\101\164\164\x72\x69\142\165\x74\145");
        foreach ($Bp as $Ho) {
            if ($Ho->hasAttribute("\116\141\x6d\x65")) {
                goto Iy;
            }
            throw new Exception("\115\x69\163\163\x69\x6e\x67\x20\156\x61\155\x65\40\157\x6e\x20\x3c\163\x61\155\x6c\x3a\101\x74\x74\x72\151\142\165\164\145\x3e\40\x65\154\x65\x6d\x65\156\164\56");
            Iy:
            $Ze = $Ho->getAttribute("\116\x61\155\145");
            if ($Ho->hasAttribute("\x4e\x61\x6d\145\x46\x6f\x72\x6d\141\x74")) {
                goto Cn;
            }
            $az = "\x75\x72\156\x3a\157\x61\x73\x69\163\x3a\x6e\x61\x6d\x65\x73\72\164\x63\x3a\123\x41\115\114\72\x31\x2e\61\x3a\x6e\141\x6d\x65\151\x64\55\146\x6f\162\155\141\x74\x3a\165\156\163\160\x65\x63\x69\x66\151\x65\x64";
            goto U0;
            Cn:
            $az = $Ho->getAttribute("\116\x61\x6d\145\106\157\x72\x6d\x61\x74");
            U0:
            if ($f3) {
                goto XN;
            }
            if (!($this->nameFormat !== $az)) {
                goto U9;
            }
            $this->nameFormat = "\165\x72\x6e\72\157\x61\x73\x69\163\x3a\156\141\155\x65\x73\72\x74\x63\x3a\x53\101\x4d\114\x3a\x31\x2e\x31\x3a\x6e\141\x6d\145\x69\x64\x2d\146\x6f\162\155\x61\x74\x3a\x75\x6e\163\160\145\x63\x69\146\151\145\144";
            U9:
            goto sD;
            XN:
            $this->nameFormat = $az;
            $f3 = FALSE;
            sD:
            if (array_key_exists($Ze, $this->attributes)) {
                goto HZ;
            }
            $this->attributes[$Ze] = array();
            HZ:
            $Sr = SAMLSPUtilities::xpQuery($Ho, "\x2e\x2f\163\141\155\x6c\x5f\x61\163\163\x65\x72\x74\151\x6f\x6e\x3a\x41\x74\x74\162\x69\142\x75\164\145\x56\x61\154\165\x65");
            foreach ($Sr as $j1) {
                $this->attributes[$Ze][] = trim($j1->textContent);
                cv:
            }
            Hh:
            dQ:
        }
        TW:
    }
    private function parseEncryptedAttributes(DOMElement $DG)
    {
        $this->encryptedAttribute = SAMLSPUtilities::xpQuery($DG, "\56\x2f\x73\141\x6d\x6c\x5f\141\x73\x73\145\162\x74\x69\157\x6e\x3a\101\164\x74\x72\151\x62\x75\x74\x65\x53\164\x61\x74\145\x6d\145\x6e\x74\57\163\141\x6d\x6c\137\141\163\163\x65\x72\x74\151\157\x6e\x3a\105\156\143\x72\171\160\x74\x65\144\x41\164\164\x72\x69\x62\x75\164\145");
    }
    private function parseSignature(DOMElement $DG)
    {
        $uZ = SAMLSPUtilities::validateElement($DG);
        if (!($uZ !== FALSE)) {
            goto si;
        }
        $this->wasSignedAtConstruction = TRUE;
        $this->certificates = $uZ["\x43\145\x72\164\x69\146\151\143\141\164\145\x73"];
        $this->signatureData = $uZ;
        si:
    }
    public function validate(XMLSecurityKey $Ej)
    {
        if (!($this->signatureData === NULL)) {
            goto s9;
        }
        return FALSE;
        s9:
        SAMLSPUtilities::validateSignature($this->signatureData, $Ej);
        return TRUE;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($zM)
    {
        $this->id = $zM;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($qq)
    {
        $this->issueInstant = $qq;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($e8)
    {
        $this->issuer = $e8;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto sG;
        }
        throw new Exception("\x41\x74\x74\x65\155\160\x74\x65\144\x20\x74\x6f\40\162\145\x74\162\151\x65\x76\145\x20\145\x6e\143\162\x79\160\x74\x65\x64\x20\116\141\155\145\x49\x44\x20\167\151\164\150\157\165\164\x20\144\145\x63\x72\x79\x70\164\151\x6e\147\40\x69\x74\x20\146\151\x72\163\164\x2e");
        sG:
        return $this->nameId;
    }
    public function setNameId($t0)
    {
        $this->nameId = $t0;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto rq;
        }
        return TRUE;
        rq:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $Ej)
    {
        $rq = new DOMDocument();
        $Kg = $rq->createElement("\x72\157\157\164");
        $rq->appendChild($Kg);
        SAMLSPUtilities::addNameId($Kg, $this->nameId);
        $t0 = $Kg->firstChild;
        SAMLSPUtilities::getContainer()->debugMessage($t0, "\145\156\143\162\171\x70\164");
        $pM = new XMLSecEnc();
        $pM->setNode($t0);
        $pM->type = XMLSecEnc::Element;
        $O8 = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $O8->generateSessionKey();
        $pM->encryptKey($Ej, $O8);
        $this->encryptedNameId = $pM->encryptNode($O8);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $Ej, array $xx = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto Dx;
        }
        return;
        Dx:
        $t0 = SAMLSPUtilities::decryptElement($this->encryptedNameId, $Ej, $xx);
        SAMLSPUtilities::getContainer()->debugMessage($t0, "\144\x65\x63\162\x79\x70\164");
        $this->nameId = SAMLSPUtilities::parseNameId($t0);
        $this->encryptedNameId = NULL;
    }
    public function decryptAttributes(XMLSecurityKey $Ej, array $xx = array())
    {
        if (!($this->encryptedAttribute === NULL)) {
            goto kZ;
        }
        return;
        kZ:
        $f3 = TRUE;
        $Bp = $this->encryptedAttribute;
        foreach ($Bp as $kb) {
            $Ho = SAMLSPUtilities::decryptElement($kb->getElementsByTagName("\x45\x6e\x63\162\171\160\164\x65\x64\104\x61\164\141")->item(0), $Ej, $xx);
            if ($Ho->hasAttribute("\x4e\x61\155\145")) {
                goto mZ;
            }
            throw new Exception("\115\151\163\x73\151\156\147\x20\x6e\141\155\x65\x20\157\x6e\40\74\163\141\x6d\x6c\72\101\164\x74\x72\151\x62\x75\164\145\76\40\145\154\x65\155\x65\156\x74\56");
            mZ:
            $Ze = $Ho->getAttribute("\x4e\x61\x6d\145");
            if ($Ho->hasAttribute("\x4e\x61\155\x65\106\x6f\162\155\141\164")) {
                goto du;
            }
            $az = "\x75\x72\156\x3a\157\141\163\x69\x73\72\156\x61\155\x65\163\72\x74\x63\72\123\x41\x4d\114\72\62\56\x30\x3a\x61\164\164\x72\156\141\155\145\x2d\x66\x6f\x72\x6d\x61\164\x3a\x75\156\x73\160\x65\143\151\x66\x69\145\144";
            goto rx;
            du:
            $az = $Ho->getAttribute("\116\x61\155\145\x46\157\162\x6d\141\x74");
            rx:
            if ($f3) {
                goto Ne;
            }
            if (!($this->nameFormat !== $az)) {
                goto FE;
            }
            $this->nameFormat = "\165\x72\156\x3a\157\141\x73\151\163\x3a\x6e\x61\x6d\145\x73\x3a\x74\143\x3a\123\101\x4d\114\72\x32\x2e\60\72\141\164\x74\162\156\x61\155\x65\x2d\x66\x6f\x72\155\141\164\72\x75\x6e\x73\x70\x65\x63\x69\x66\151\145\144";
            FE:
            goto vv;
            Ne:
            $this->nameFormat = $az;
            $f3 = FALSE;
            vv:
            if (array_key_exists($Ze, $this->attributes)) {
                goto Ng;
            }
            $this->attributes[$Ze] = array();
            Ng:
            $Sr = SAMLSPUtilities::xpQuery($Ho, "\x2e\x2f\163\141\x6d\x6c\x5f\141\x73\163\145\162\164\x69\x6f\x6e\x3a\x41\x74\x74\x72\x69\142\x75\164\145\x56\141\154\165\145");
            foreach ($Sr as $j1) {
                $this->attributes[$Ze][] = trim($j1->textContent);
                jz:
            }
            NP:
            FN1:
        }
        wy:
    }
    public function getNotBefore()
    {
        return $this->notBefore;
    }
    public function setNotBefore($lc)
    {
        $this->notBefore = $lc;
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($uC)
    {
        $this->notOnOrAfter = $uC;
    }
    public function setEncryptedAttributes($Yg)
    {
        $this->requiredEncAttributes = $Yg;
    }
    public function getValidAudiences()
    {
        return $this->validAudiences;
    }
    public function setValidAudiences(array $Ny = NULL)
    {
        $this->validAudiences = $Ny;
    }
    public function getAuthnInstant()
    {
        return $this->authnInstant;
    }
    public function setAuthnInstant($RJ)
    {
        $this->authnInstant = $RJ;
    }
    public function getSessionNotOnOrAfter()
    {
        return $this->sessionNotOnOrAfter;
    }
    public function setSessionNotOnOrAfter($pb)
    {
        $this->sessionNotOnOrAfter = $pb;
    }
    public function getSessionIndex()
    {
        return $this->sessionIndex;
    }
    public function setSessionIndex($vq)
    {
        $this->sessionIndex = $vq;
    }
    public function getAuthnContext()
    {
        if (empty($this->authnContextClassRef)) {
            goto ns;
        }
        return $this->authnContextClassRef;
        ns:
        if (empty($this->authnContextDeclRef)) {
            goto v2;
        }
        return $this->authnContextDeclRef;
        v2:
        return NULL;
    }
    public function setAuthnContext($C7)
    {
        $this->setAuthnContextClassRef($C7);
    }
    public function getAuthnContextClassRef()
    {
        return $this->authnContextClassRef;
    }
    public function setAuthnContextClassRef($we)
    {
        $this->authnContextClassRef = $we;
    }
    public function setAuthnContextDecl(SAML2_XML_Chunk $iO)
    {
        if (empty($this->authnContextDeclRef)) {
            goto No;
        }
        throw new Exception("\x41\165\x74\150\x6e\x43\x6f\156\164\x65\x78\x74\104\x65\143\x6c\x52\145\146\x20\x69\x73\40\x61\x6c\x72\145\x61\x64\x79\x20\x72\145\147\151\x73\164\x65\x72\145\144\41\x20\115\141\171\x20\157\156\154\x79\x20\150\141\x76\145\40\145\x69\x74\x68\145\162\x20\141\x20\x44\145\x63\x6c\40\x6f\162\x20\x61\x20\x44\145\x63\154\122\x65\x66\x2c\x20\156\x6f\164\40\142\157\x74\x68\41");
        No:
        $this->authnContextDecl = $iO;
    }
    public function getAuthnContextDecl()
    {
        return $this->authnContextDecl;
    }
    public function setAuthnContextDeclRef($bT)
    {
        if (empty($this->authnContextDecl)) {
            goto C4;
        }
        throw new Exception("\x41\165\x74\150\156\x43\x6f\156\x74\x65\170\164\x44\145\x63\154\40\151\163\40\141\x6c\162\145\141\144\171\40\x72\145\147\x69\x73\164\x65\162\x65\x64\41\x20\x4d\x61\x79\40\157\x6e\x6c\171\x20\150\141\x76\x65\40\145\x69\164\150\x65\162\40\141\40\104\x65\143\154\40\x6f\x72\40\141\x20\x44\x65\143\x6c\122\x65\x66\54\x20\x6e\x6f\164\x20\x62\157\164\150\x21");
        C4:
        $this->authnContextDeclRef = $bT;
    }
    public function getAuthnContextDeclRef()
    {
        return $this->authnContextDeclRef;
    }
    public function getAuthenticatingAuthority()
    {
        return $this->AuthenticatingAuthority;
    }
    public function setAuthenticatingAuthority($VN)
    {
        $this->AuthenticatingAuthority = $VN;
    }
    public function getAttributes()
    {
        return $this->attributes;
    }
    public function setAttributes(array $Bp)
    {
        $this->attributes = $Bp;
    }
    public function getAttributeNameFormat()
    {
        return $this->nameFormat;
    }
    public function setAttributeNameFormat($az)
    {
        $this->nameFormat = $az;
    }
    public function getSubjectConfirmation()
    {
        return $this->SubjectConfirmation;
    }
    public function setSubjectConfirmation(array $mS)
    {
        $this->SubjectConfirmation = $mS;
    }
    public function getSignatureKey()
    {
        return $this->signatureKey;
    }
    public function setSignatureKey(XMLsecurityKey $p8 = NULL)
    {
        $this->signatureKey = $p8;
    }
    public function getEncryptionKey()
    {
        return $this->encryptionKey;
    }
    public function setEncryptionKey(XMLSecurityKey $qO = NULL)
    {
        $this->encryptionKey = $qO;
    }
    public function setCertificates(array $VZ)
    {
        $this->certificates = $VZ;
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
    public function toXML(DOMNode $Ye = NULL)
    {
        if ($Ye === NULL) {
            goto Er;
        }
        $eB = $Ye->ownerDocument;
        goto qG;
        Er:
        $eB = new DOMDocument();
        $Ye = $eB;
        qG:
        $Kg = $eB->createElementNS("\x75\162\156\72\157\141\x73\x69\x73\x3a\x6e\x61\155\145\163\x3a\x74\143\72\x53\101\115\114\72\62\56\60\72\x61\x73\163\x65\x72\x74\x69\157\x6e", "\x73\x61\155\x6c\72" . "\101\163\x73\x65\x72\164\x69\157\x6e");
        $Ye->appendChild($Kg);
        $Kg->setAttributeNS("\165\162\x6e\72\157\x61\x73\x69\x73\x3a\156\x61\x6d\145\x73\x3a\164\x63\x3a\123\101\115\x4c\72\x32\56\60\72\x70\162\157\164\x6f\x63\x6f\154", "\x73\x61\155\154\x70\x3a\x74\x6d\x70", "\164\x6d\160");
        $Kg->removeAttributeNS("\165\162\x6e\72\x6f\x61\x73\151\163\x3a\156\x61\155\145\x73\x3a\x74\143\72\x53\101\115\x4c\x3a\62\x2e\x30\x3a\160\162\157\164\157\x63\x6f\x6c", "\x74\155\160");
        $Kg->setAttributeNS("\150\x74\164\160\72\x2f\x2f\167\x77\x77\x2e\x77\63\x2e\x6f\x72\147\x2f\x32\x30\x30\61\57\130\x4d\x4c\123\143\x68\145\x6d\141\x2d\151\156\163\164\141\156\x63\145", "\x78\163\x69\x3a\x74\x6d\160", "\x74\155\x70");
        $Kg->removeAttributeNS("\x68\x74\x74\x70\72\x2f\57\x77\167\167\56\167\x33\x2e\x6f\x72\x67\x2f\x32\60\x30\61\x2f\x58\115\x4c\x53\x63\x68\145\155\141\x2d\151\x6e\x73\164\141\x6e\x63\145", "\164\x6d\x70");
        $Kg->setAttributeNS("\150\164\x74\x70\x3a\x2f\57\x77\167\x77\x2e\167\x33\56\x6f\162\x67\x2f\x32\60\x30\x31\x2f\130\x4d\114\x53\143\150\145\155\141", "\x78\163\x3a\164\155\160", "\x74\155\160");
        $Kg->removeAttributeNS("\x68\164\164\x70\72\57\x2f\x77\x77\167\x2e\167\63\x2e\x6f\x72\147\x2f\x32\x30\x30\61\57\x58\115\114\123\x63\x68\145\x6d\x61", "\x74\155\160");
        $Kg->setAttribute("\111\x44", $this->id);
        $Kg->setAttribute("\126\145\x72\x73\151\157\x6e", "\x32\x2e\60");
        $Kg->setAttribute("\x49\163\x73\165\x65\x49\x6e\x73\x74\141\156\x74", gmdate("\131\55\155\x2d\x64\134\124\110\72\x69\72\163\134\132", $this->issueInstant));
        $e8 = SAMLSPUtilities::addString($Kg, "\165\162\x6e\x3a\157\141\163\151\x73\72\156\141\155\x65\163\72\x74\x63\x3a\123\x41\115\114\x3a\x32\56\x30\72\141\163\163\145\162\x74\151\157\x6e", "\x73\x61\x6d\154\x3a\x49\163\x73\165\x65\x72", $this->issuer);
        $this->addSubject($Kg);
        $this->addConditions($Kg);
        $this->addAuthnStatement($Kg);
        if ($this->requiredEncAttributes == FALSE) {
            goto dy;
        }
        $this->addEncryptedAttributeStatement($Kg);
        goto Zu;
        dy:
        $this->addAttributeStatement($Kg);
        Zu:
        if (!($this->signatureKey !== NULL)) {
            goto nJ;
        }
        SAMLSPUtilities::insertSignature($this->signatureKey, $this->certificates, $Kg, $e8->nextSibling);
        nJ:
        return $Kg;
    }
    private function addSubject(DOMElement $Kg)
    {
        if (!($this->nameId === NULL && $this->encryptedNameId === NULL)) {
            goto JY;
        }
        return;
        JY:
        $Sf = $Kg->ownerDocument->createElementNS("\x75\162\x6e\x3a\x6f\x61\x73\151\163\72\x6e\141\155\145\x73\72\x74\x63\x3a\x53\x41\x4d\x4c\72\62\x2e\x30\x3a\x61\x73\163\x65\162\x74\151\157\x6e", "\x73\141\x6d\x6c\x3a\x53\x75\x62\x6a\145\x63\164");
        $Kg->appendChild($Sf);
        if ($this->encryptedNameId === NULL) {
            goto lj;
        }
        $Nf = $Sf->ownerDocument->createElementNS("\165\x72\156\72\157\x61\x73\x69\163\72\x6e\x61\x6d\x65\x73\72\x74\143\72\123\x41\x4d\114\72\x32\x2e\60\x3a\141\163\x73\145\x72\x74\x69\x6f\156", "\x73\x61\x6d\154\72" . "\105\156\x63\162\171\x70\164\x65\144\x49\104");
        $Sf->appendChild($Nf);
        $Nf->appendChild($Sf->ownerDocument->importNode($this->encryptedNameId, TRUE));
        goto qe;
        lj:
        SAMLSPUtilities::addNameId($Sf, $this->nameId);
        qe:
        foreach ($this->SubjectConfirmation as $c5) {
            $c5->toXML($Sf);
            wY:
        }
        KK:
    }
    private function addConditions(DOMElement $Kg)
    {
        $eB = $Kg->ownerDocument;
        $rK = $eB->createElementNS("\165\x72\x6e\72\157\x61\x73\151\163\72\156\141\155\x65\163\72\164\143\72\123\101\115\114\x3a\x32\x2e\x30\72\x61\163\x73\145\x72\x74\x69\x6f\x6e", "\x73\141\155\154\x3a\x43\157\156\x64\x69\x74\x69\x6f\156\163");
        $Kg->appendChild($rK);
        if (!($this->notBefore !== NULL)) {
            goto z5;
        }
        $rK->setAttribute("\x4e\157\164\x42\x65\146\x6f\162\x65", gmdate("\131\x2d\155\x2d\x64\x5c\124\x48\72\x69\72\163\x5c\132", $this->notBefore));
        z5:
        if (!($this->notOnOrAfter !== NULL)) {
            goto GW;
        }
        $rK->setAttribute("\116\157\x74\117\x6e\117\x72\101\146\x74\x65\x72", gmdate("\x59\55\155\55\x64\134\x54\110\x3a\151\x3a\163\134\x5a", $this->notOnOrAfter));
        GW:
        if (!($this->validAudiences !== NULL)) {
            goto eg;
        }
        $Ee = $eB->createElementNS("\x75\162\x6e\72\x6f\141\x73\151\x73\x3a\x6e\141\x6d\x65\x73\x3a\x74\143\x3a\x53\101\x4d\114\x3a\62\x2e\60\x3a\x61\x73\x73\x65\x72\164\151\x6f\156", "\163\141\x6d\154\72\101\165\144\151\x65\x6e\x63\x65\122\145\x73\164\162\151\143\x74\x69\x6f\x6e");
        $rK->appendChild($Ee);
        SAMLSPUtilities::addStrings($Ee, "\x75\162\x6e\72\x6f\x61\x73\151\x73\x3a\x6e\x61\x6d\145\x73\x3a\164\x63\72\123\101\x4d\114\72\62\56\x30\72\141\x73\x73\145\x72\164\x69\x6f\x6e", "\163\141\x6d\154\72\x41\165\144\x69\145\156\143\145", FALSE, $this->validAudiences);
        eg:
    }
    private function addAuthnStatement(DOMElement $Kg)
    {
        if (!($this->authnInstant === NULL || $this->authnContextClassRef === NULL && $this->authnContextDecl === NULL && $this->authnContextDeclRef === NULL)) {
            goto Kc;
        }
        return;
        Kc:
        $eB = $Kg->ownerDocument;
        $gi = $eB->createElementNS("\x75\162\156\x3a\x6f\141\x73\x69\x73\x3a\156\x61\x6d\x65\163\72\164\x63\72\x53\101\115\x4c\x3a\62\x2e\60\72\141\163\163\x65\x72\x74\151\x6f\156", "\163\x61\x6d\154\72\101\x75\164\150\x6e\x53\164\141\x74\x65\155\145\156\x74");
        $Kg->appendChild($gi);
        $gi->setAttribute("\101\165\x74\150\156\x49\x6e\163\x74\x61\x6e\164", gmdate("\x59\x2d\155\55\x64\x5c\x54\110\x3a\x69\72\163\134\x5a", $this->authnInstant));
        if (!($this->sessionNotOnOrAfter !== NULL)) {
            goto mU;
        }
        $gi->setAttribute("\123\145\x73\163\151\x6f\x6e\116\x6f\x74\117\x6e\x4f\x72\x41\146\x74\145\x72", gmdate("\x59\55\155\x2d\x64\x5c\x54\x48\72\x69\72\163\x5c\x5a", $this->sessionNotOnOrAfter));
        mU:
        if (!($this->sessionIndex !== NULL)) {
            goto zA;
        }
        $gi->setAttribute("\x53\145\163\163\151\157\x6e\x49\x6e\144\x65\x78", $this->sessionIndex);
        zA:
        $fA = $eB->createElementNS("\x75\162\x6e\72\x6f\141\163\x69\163\72\156\x61\155\x65\163\x3a\164\143\x3a\123\101\x4d\114\72\62\x2e\60\x3a\141\x73\x73\145\162\164\x69\157\x6e", "\163\141\155\x6c\72\101\165\164\150\156\x43\x6f\156\x74\x65\x78\x74");
        $gi->appendChild($fA);
        if (empty($this->authnContextClassRef)) {
            goto hu;
        }
        SAMLSPUtilities::addString($fA, "\165\x72\156\72\157\x61\x73\151\x73\x3a\156\141\155\145\x73\x3a\164\x63\x3a\x53\x41\115\x4c\72\62\x2e\60\72\x61\x73\x73\x65\162\x74\151\x6f\156", "\163\141\155\154\x3a\101\x75\164\150\x6e\x43\x6f\x6e\164\145\x78\164\x43\x6c\141\x73\163\x52\145\x66", $this->authnContextClassRef);
        hu:
        if (empty($this->authnContextDecl)) {
            goto wH;
        }
        $this->authnContextDecl->toXML($fA);
        wH:
        if (empty($this->authnContextDeclRef)) {
            goto jw;
        }
        SAMLSPUtilities::addString($fA, "\165\x72\156\72\157\x61\x73\151\x73\72\156\141\x6d\145\x73\72\164\x63\x3a\123\101\115\114\72\62\56\60\x3a\141\x73\163\145\162\164\151\157\156", "\163\141\x6d\154\72\101\165\164\x68\156\103\x6f\156\164\145\170\164\x44\145\x63\x6c\x52\145\x66", $this->authnContextDeclRef);
        jw:
        SAMLSPUtilities::addStrings($fA, "\165\x72\x6e\72\157\141\x73\x69\x73\72\156\x61\155\x65\163\x3a\x74\143\x3a\x53\x41\115\x4c\72\x32\x2e\x30\72\141\163\163\x65\x72\164\151\x6f\156", "\x73\141\x6d\x6c\72\101\165\x74\x68\145\x6e\164\x69\143\x61\x74\x69\x6e\x67\101\x75\x74\150\157\x72\151\x74\171", FALSE, $this->AuthenticatingAuthority);
    }
    private function addAttributeStatement(DOMElement $Kg)
    {
        if (!empty($this->attributes)) {
            goto Da;
        }
        return;
        Da:
        $eB = $Kg->ownerDocument;
        $gI = $eB->createElementNS("\165\x72\156\x3a\x6f\141\x73\x69\163\x3a\156\x61\155\x65\163\x3a\164\143\72\123\101\115\x4c\x3a\62\x2e\x30\x3a\x61\163\163\x65\162\x74\151\x6f\x6e", "\163\x61\155\154\x3a\x41\x74\x74\162\x69\142\165\164\x65\123\x74\141\x74\x65\x6d\x65\x6e\x74");
        $Kg->appendChild($gI);
        foreach ($this->attributes as $Ze => $Sr) {
            $Ho = $eB->createElementNS("\x75\x72\156\x3a\x6f\141\163\151\163\72\x6e\x61\x6d\145\x73\72\164\143\x3a\x53\101\115\x4c\72\62\56\x30\72\141\163\163\x65\x72\x74\151\157\156", "\163\x61\155\154\72\x41\164\x74\162\x69\x62\165\x74\145");
            $gI->appendChild($Ho);
            $Ho->setAttribute("\x4e\141\155\x65", $Ze);
            if (!($this->nameFormat !== "\165\162\x6e\x3a\157\141\x73\x69\163\72\x6e\141\155\145\x73\x3a\x74\x63\x3a\x53\x41\115\x4c\72\x32\x2e\60\72\141\x74\164\162\x6e\x61\x6d\x65\x2d\146\157\x72\155\x61\x74\72\165\x6e\163\x70\x65\x63\151\146\151\145\x64")) {
                goto ed;
            }
            $Ho->setAttribute("\x4e\x61\x6d\x65\x46\x6f\x72\x6d\141\x74", $this->nameFormat);
            ed:
            foreach ($Sr as $j1) {
                if (is_string($j1)) {
                    goto xT;
                }
                if (is_int($j1)) {
                    goto DD;
                }
                $dQ = NULL;
                goto Ib;
                xT:
                $dQ = "\x78\163\72\x73\164\162\x69\156\147";
                goto Ib;
                DD:
                $dQ = "\170\163\72\151\156\164\x65\x67\145\x72";
                Ib:
                $ur = $eB->createElementNS("\165\x72\x6e\72\x6f\141\x73\x69\x73\72\156\x61\x6d\145\163\72\x74\143\x3a\123\x41\115\x4c\x3a\62\56\60\72\141\163\x73\x65\x72\x74\x69\x6f\x6e", "\163\141\x6d\x6c\72\101\164\x74\x72\x69\142\x75\164\145\126\141\x6c\165\145");
                $Ho->appendChild($ur);
                if (!($dQ !== NULL)) {
                    goto DR;
                }
                $ur->setAttributeNS("\x68\164\164\160\72\x2f\57\167\x77\167\x2e\x77\63\56\x6f\162\x67\x2f\62\x30\x30\61\57\130\115\x4c\123\x63\150\145\x6d\141\x2d\151\156\163\x74\141\x6e\x63\x65", "\x78\x73\x69\x3a\164\171\x70\x65", $dQ);
                DR:
                if (!is_null($j1)) {
                    goto mq;
                }
                $ur->setAttributeNS("\x68\x74\x74\160\72\x2f\x2f\167\167\167\56\167\63\56\x6f\162\147\57\x32\x30\60\61\x2f\x58\115\x4c\x53\x63\x68\145\x6d\x61\x2d\x69\x6e\163\x74\x61\156\x63\145", "\x78\x73\151\x3a\156\x69\154", "\x74\x72\165\x65");
                mq:
                if ($j1 instanceof DOMNodeList) {
                    goto FT;
                }
                $ur->appendChild($eB->createTextNode($j1));
                goto dE;
                FT:
                $Eh = 0;
                l5:
                if (!($Eh < $j1->length)) {
                    goto On;
                }
                $gC = $eB->importNode($j1->item($Eh), TRUE);
                $ur->appendChild($gC);
                sw:
                $Eh++;
                goto l5;
                On:
                dE:
                Sh:
            }
            Lo:
            HQ:
        }
        lp:
    }
    private function addEncryptedAttributeStatement(DOMElement $Kg)
    {
        if (!($this->requiredEncAttributes == FALSE)) {
            goto Op;
        }
        return;
        Op:
        $eB = $Kg->ownerDocument;
        $gI = $eB->createElementNS("\165\x72\156\x3a\x6f\141\x73\x69\x73\x3a\156\141\155\145\163\x3a\x74\x63\x3a\x53\101\115\114\72\x32\56\60\x3a\x61\x73\x73\x65\x72\x74\151\157\x6e", "\x73\x61\155\154\72\x41\x74\164\x72\x69\x62\x75\164\x65\123\164\141\164\x65\x6d\x65\156\164");
        $Kg->appendChild($gI);
        foreach ($this->attributes as $Ze => $Sr) {
            $er = new DOMDocument();
            $Ho = $er->createElementNS("\165\x72\156\72\157\141\x73\x69\x73\x3a\x6e\141\x6d\x65\x73\x3a\164\143\x3a\123\x41\115\x4c\72\x32\x2e\60\72\x61\163\x73\145\162\x74\151\x6f\156", "\x73\x61\155\x6c\72\x41\164\x74\162\151\142\x75\164\145");
            $Ho->setAttribute("\116\141\155\x65", $Ze);
            $er->appendChild($Ho);
            if (!($this->nameFormat !== "\x75\x72\x6e\x3a\157\x61\163\x69\163\x3a\x6e\x61\x6d\x65\x73\72\x74\143\x3a\123\101\x4d\114\72\x32\x2e\x30\72\141\164\x74\162\156\141\155\x65\55\146\x6f\162\x6d\141\164\x3a\x75\156\x73\160\x65\143\x69\146\x69\x65\144")) {
                goto wd;
            }
            $Ho->setAttribute("\116\x61\x6d\145\106\x6f\x72\x6d\141\164", $this->nameFormat);
            wd:
            foreach ($Sr as $j1) {
                if (is_string($j1)) {
                    goto BU;
                }
                if (is_int($j1)) {
                    goto aI;
                }
                $dQ = NULL;
                goto b_;
                BU:
                $dQ = "\170\163\x3a\x73\164\162\151\156\x67";
                goto b_;
                aI:
                $dQ = "\170\163\72\151\x6e\x74\x65\x67\x65\x72";
                b_:
                $ur = $er->createElementNS("\165\162\x6e\72\x6f\141\163\151\x73\x3a\x6e\141\x6d\145\x73\x3a\x74\143\x3a\x53\x41\x4d\x4c\x3a\62\56\60\x3a\x61\x73\163\x65\x72\x74\151\x6f\x6e", "\x73\141\155\x6c\x3a\101\x74\x74\162\x69\142\165\164\x65\126\141\154\165\145");
                $Ho->appendChild($ur);
                if (!($dQ !== NULL)) {
                    goto zr;
                }
                $ur->setAttributeNS("\150\x74\164\160\72\57\57\x77\x77\167\x2e\167\x33\56\x6f\x72\147\57\62\x30\x30\61\x2f\130\115\x4c\x53\x63\x68\145\155\141\x2d\151\156\x73\x74\x61\156\x63\145", "\x78\x73\x69\x3a\x74\x79\160\x65", $dQ);
                zr:
                if ($j1 instanceof DOMNodeList) {
                    goto Yo;
                }
                $ur->appendChild($er->createTextNode($j1));
                goto kW;
                Yo:
                $Eh = 0;
                mE:
                if (!($Eh < $j1->length)) {
                    goto BO;
                }
                $gC = $er->importNode($j1->item($Eh), TRUE);
                $ur->appendChild($gC);
                qv:
                $Eh++;
                goto mE;
                BO:
                kW:
                UY:
            }
            SR:
            $Sv = new XMLSecEnc();
            $Sv->setNode($er->documentElement);
            $Sv->type = "\150\x74\164\x70\72\57\x2f\x77\167\x77\x2e\167\63\x2e\157\162\147\x2f\x32\60\60\61\57\60\x34\x2f\x78\155\x6c\145\x6e\143\x23\x45\154\145\155\x65\156\x74";
            $O8 = new XMLSecurityKey(XMLSecurityKey::AES256_CBC);
            $O8->generateSessionKey();
            $Sv->encryptKey($this->encryptionKey, $O8);
            $bF = $Sv->encryptNode($O8);
            $C1 = $eB->createElementNS("\x75\162\x6e\x3a\x6f\141\163\x69\163\72\x6e\x61\155\x65\163\72\164\x63\72\123\101\x4d\114\x3a\x32\56\60\x3a\x61\163\x73\x65\162\x74\151\x6f\156", "\163\x61\x6d\x6c\72\x45\156\143\x72\171\160\164\x65\x64\101\164\164\162\151\142\165\164\145");
            $gI->appendChild($C1);
            $AM = $eB->importNode($bF, TRUE);
            $C1->appendChild($AM);
            g6:
        }
        jL:
    }
    public function getPrivateKeyUrl()
    {
        return $this->privateKeyUrl;
    }
    public function setPrivateKeyUrl($ou)
    {
        $this->privateKeyUrl = $ou;
    }
}
