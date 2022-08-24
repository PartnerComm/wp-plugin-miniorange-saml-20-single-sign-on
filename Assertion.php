<?php


include_once "\125\x74\151\x6c\151\x74\x69\x65\x73\x2e\160\x68\x70";
include_once "\x78\x6d\x6c\163\145\x63\x6c\151\142\x73\56\x70\150\x70";
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
    public function __construct(DOMElement $rS = NULL, $ym)
    {
        $this->id = SAMLSPUtilities::generateId();
        $this->issueInstant = SAMLSPUtilities::generateTimestamp();
        $this->issuer = '';
        $this->authnInstant = SAMLSPUtilities::generateTimestamp();
        $this->attributes = array();
        $this->nameFormat = "\165\162\156\x3a\x6f\141\163\x69\163\x3a\x6e\x61\x6d\x65\163\72\x74\x63\72\123\101\115\114\72\x31\56\61\x3a\x6e\x61\x6d\x65\151\x64\55\x66\157\162\155\141\x74\x3a\165\x6e\163\160\x65\x63\x69\146\151\x65\x64";
        $this->certificates = array();
        $this->AuthenticatingAuthority = array();
        $this->SubjectConfirmation = array();
        if (!($rS === NULL)) {
            goto HH;
        }
        return;
        HH:
        if (!($rS->localName === "\105\156\x63\x72\x79\x70\x74\x65\x64\x41\163\163\x65\162\x74\x69\x6f\x6e")) {
            goto uT;
        }
        $pm = SAMLSPUtilities::xpQuery($rS, "\56\57\x78\x65\156\x63\x3a\105\x6e\x63\x72\x79\160\164\x65\144\104\141\x74\141");
        $RK = SAMLSPUtilities::xpQuery($rS, "\x2f\x2f\52\x5b\154\157\143\141\x6c\x2d\156\x61\155\x65\50\x29\75\x27\105\x6e\x63\x72\x79\160\x74\145\x64\113\145\171\x27\135\x2f\52\x5b\154\x6f\x63\141\x6c\x2d\x6e\141\155\145\50\51\x3d\x27\x45\x6e\x63\162\171\160\x74\151\157\156\115\x65\x74\150\x6f\x64\47\x5d\57\100\x41\154\x67\x6f\162\151\164\x68\155");
        $Hu = $RK[0]->value;
        $WV = SAMLSPUtilities::getEncryptionAlgorithm($Hu);
        if (count($pm) === 0) {
            goto ap;
        }
        if (count($pm) > 1) {
            goto wD;
        }
        goto vb;
        ap:
        throw new Exception("\x4d\151\x73\x73\151\156\x67\x20\x65\156\x63\x72\171\x70\x74\145\144\40\x64\141\164\x61\40\151\156\x20\x3c\x73\x61\x6d\x6c\72\x45\156\x63\x72\171\160\164\145\x64\x41\163\163\145\162\164\151\157\156\x3e\x2e");
        goto vb;
        wD:
        throw new Exception("\115\x6f\162\145\x20\164\x68\x61\156\40\157\156\x65\x20\145\156\143\162\x79\x70\x74\x65\x64\x20\x64\141\164\141\x20\x65\154\145\155\x65\x6e\164\x20\x69\156\x20\x3c\163\141\155\154\72\x45\156\x63\162\x79\x70\164\145\144\101\163\x73\x65\162\164\151\157\156\76\56");
        vb:
        $N5 = new XMLSecurityKey($WV, array("\x74\x79\x70\x65" => "\x70\162\151\x76\x61\164\145"));
        $N5->loadKey($ym, FALSE);
        $EU = array();
        $rS = SAMLSPUtilities::decryptElement($pm[0], $N5, $EU);
        uT:
        if ($rS->hasAttribute("\x49\x44")) {
            goto u7;
        }
        throw new Exception("\115\x69\163\x73\x69\156\147\x20\x49\x44\40\x61\x74\164\x72\151\x62\x75\164\145\x20\157\x6e\x20\123\101\115\x4c\x20\141\x73\163\145\162\x74\x69\x6f\x6e\56");
        u7:
        $this->id = $rS->getAttribute("\111\104");
        if (!($rS->getAttribute("\x56\x65\162\x73\x69\157\156") !== "\62\x2e\60")) {
            goto m7;
        }
        throw new Exception("\x55\156\x73\x75\x70\160\x6f\162\164\145\144\40\166\145\162\x73\151\x6f\156\72\40" . $rS->getAttribute("\x56\145\x72\x73\151\157\156"));
        m7:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($rS->getAttribute("\111\163\x73\165\x65\x49\x6e\163\164\141\x6e\164"));
        $gu = SAMLSPUtilities::xpQuery($rS, "\x2e\57\163\x61\155\154\x5f\x61\x73\x73\x65\162\164\151\157\x6e\72\x49\x73\x73\x75\x65\x72");
        if (!empty($gu)) {
            goto YQ;
        }
        throw new Exception("\115\151\163\x73\151\x6e\147\x20\x3c\163\141\155\x6c\x3a\111\x73\x73\x75\145\162\x3e\40\151\x6e\x20\x61\x73\x73\145\162\x74\x69\x6f\x6e\x2e");
        YQ:
        $this->issuer = trim($gu[0]->textContent);
        $this->parseConditions($rS);
        $this->parseAuthnStatement($rS);
        $this->parseAttributes($rS);
        $this->parseEncryptedAttributes($rS);
        $this->parseSignature($rS);
        $this->parseSubject($rS);
    }
    private function parseSubject(DOMElement $rS)
    {
        $kt = SAMLSPUtilities::xpQuery($rS, "\x2e\x2f\x73\141\155\154\x5f\x61\x73\163\x65\162\164\x69\157\156\72\123\x75\x62\x6a\145\143\x74");
        if (empty($kt)) {
            goto ak;
        }
        if (count($kt) > 1) {
            goto ZD;
        }
        goto II;
        ak:
        return;
        goto II;
        ZD:
        throw new Exception("\x4d\x6f\x72\145\40\164\x68\141\x6e\40\157\x6e\x65\x20\x3c\163\141\x6d\154\72\123\165\142\152\x65\143\x74\x3e\40\x69\x6e\x20\74\x73\141\155\x6c\x3a\101\163\x73\x65\162\164\x69\x6f\x6e\76\56");
        II:
        $kt = $kt[0];
        $vQ = SAMLSPUtilities::xpQuery($kt, "\56\57\x73\141\155\x6c\x5f\141\x73\x73\145\x72\164\151\x6f\156\x3a\116\141\155\x65\111\x44\40\174\40\x2e\57\163\x61\155\154\137\141\x73\163\145\162\x74\151\x6f\156\72\105\x6e\143\162\171\160\164\145\x64\111\x44\x2f\170\145\x6e\143\72\105\156\143\162\171\x70\164\145\x64\x44\x61\x74\x61");
        if (empty($vQ)) {
            goto da;
        }
        if (count($vQ) > 1) {
            goto FO;
        }
        goto x2;
        da:
        $oK = $_POST["\x52\145\154\141\x79\x53\164\141\164\x65"];
        if ($oK == "\x74\x65\x73\164\126\141\154\x69\x64\141\164\145" or $oK == "\164\x65\x73\x74\x4e\145\x77\x43\145\162\164\151\x66\151\x63\x61\x74\x65") {
            goto sZ;
        }
        wp_die("\x57\145\40\143\x6f\165\x6c\x64\x20\156\157\164\x20\163\x69\147\x6e\x20\x79\x6f\x75\x20\151\x6e\x2e\40\120\154\145\x61\x73\145\40\143\157\x6e\x74\141\143\x74\x20\x79\x6f\x75\x72\40\x61\x64\x6d\151\x6e\x69\163\x74\162\141\164\x6f\x72");
        goto O6;
        sZ:
        echo "\74\144\151\x76\x20\163\x74\x79\x6c\x65\75\x22\x66\157\156\164\x2d\146\141\x6d\151\154\x79\x3a\x43\x61\x6c\151\142\162\x69\x3b\x70\x61\144\144\x69\x6e\x67\72\x30\x20\x33\45\73\x22\76";
        echo "\74\144\151\166\40\163\x74\x79\x6c\145\75\x22\143\157\x6c\x6f\162\72\40\x23\x61\x39\64\x34\x34\x32\x3b\x62\x61\143\153\x67\x72\157\165\x6e\x64\x2d\143\x6f\x6c\x6f\x72\72\40\43\146\x32\144\145\x64\145\73\x70\x61\x64\144\x69\156\147\72\40\x31\x35\x70\x78\x3b\155\141\x72\x67\151\x6e\55\142\x6f\x74\x74\157\x6d\x3a\40\x32\x30\x70\170\x3b\164\145\170\164\55\x61\x6c\x69\x67\156\x3a\x63\145\x6e\x74\x65\162\x3b\142\157\162\144\x65\x72\72\61\160\x78\40\x73\157\x6c\x69\144\x20\x23\x45\66\x42\63\102\62\x3b\x66\157\156\164\55\163\x69\172\145\x3a\x31\x38\x70\164\73\x22\76\x20\105\122\x52\x4f\x52\74\x2f\144\x69\166\x3e\xd\xa\x20\x20\40\x20\x20\x20\40\x20\40\40\40\x3c\144\x69\166\40\x73\x74\171\154\145\75\x22\143\x6f\x6c\x6f\162\x3a\40\43\x61\71\64\x34\x34\62\73\x66\157\x6e\164\55\163\151\x7a\x65\x3a\x31\64\160\x74\x3b\x20\155\141\x72\147\151\x6e\55\x62\157\x74\164\x6f\155\x3a\62\x30\160\x78\x3b\42\76\74\x70\76\74\163\x74\x72\157\x6e\x67\x3e\x45\x72\162\x6f\x72\x3a\x20\x3c\x2f\x73\x74\162\x6f\156\x67\x3e\115\x69\163\163\x69\156\x67\40\40\x4e\141\x6d\x65\x49\x44\x20\157\162\40\105\x6e\143\x72\171\160\164\x65\x64\x49\x44\40\151\x6e\40\123\101\115\114\x20\x52\x65\x73\160\x6f\x6e\x73\x65\x2e\x3c\x2f\x70\76\xd\12\40\x20\40\40\40\40\x20\x20\x20\x20\40\40\x20\40\40\x20\74\160\x3e\x50\x6c\x65\141\163\x65\x20\x63\x6f\x6e\x74\x61\x63\164\x20\x79\x6f\165\x72\40\x61\144\155\x69\156\x69\163\164\162\141\x74\157\162\x20\141\x6e\x64\40\x72\145\160\157\x72\164\x20\164\150\145\x20\146\x6f\x6c\x6c\x6f\167\151\156\x67\x20\145\162\x72\x6f\x72\72\x3c\x2f\x70\76\xd\xa\x20\x20\40\x20\x20\x20\x20\x20\x20\x20\x20\40\x20\40\x20\40\x3c\160\x3e\x3c\x73\164\x72\x6f\x6e\147\76\x50\x6f\x73\163\151\x62\x6c\145\x20\103\x61\165\163\x65\72\x3c\x2f\163\164\x72\x6f\156\x67\76\40\116\141\155\145\x49\x44\x20\156\157\x74\40\x66\157\x75\x6e\144\40\x69\156\40\x53\x41\x4d\114\x20\122\145\x73\160\x6f\156\x73\145\40\x73\x75\x62\x6a\145\143\x74\x2e\x3c\57\160\x3e\15\12\40\x20\40\x20\x20\40\x20\x20\x20\40\x20\40\40\x20\x20\40\x3c\x2f\144\x69\166\x3e\xd\12\40\x20\40\x20\x20\40\40\40\x20\40\x20\40\x20\x20\40\40\x3c\x64\x69\x76\x20\163\164\171\154\x65\75\x22\155\141\162\x67\x69\156\x3a\x33\45\x3b\144\x69\163\x70\154\x61\x79\72\142\x6c\157\143\x6b\73\x74\x65\170\x74\55\141\154\x69\x67\x6e\72\x63\145\x6e\x74\x65\162\73\42\x3e\15\12\40\x20\40\40\x20\x20\40\x20\x20\40\x20\x20\x20\x20\40\40\74\144\151\x76\x20\x73\x74\x79\x6c\145\75\42\x6d\141\x72\147\151\156\72\x33\x25\73\144\151\x73\x70\154\141\171\x3a\142\154\x6f\x63\153\73\x74\145\170\164\x2d\x61\x6c\151\x67\156\x3a\x63\145\x6e\x74\x65\x72\x3b\42\x3e\74\151\x6e\160\165\164\40\163\x74\171\x6c\x65\75\x22\x70\x61\144\144\x69\156\147\72\x31\x25\x3b\167\x69\144\x74\150\x3a\61\60\60\160\x78\x3b\x62\141\143\153\147\162\x6f\165\156\144\72\x20\43\60\x30\71\x31\x43\x44\40\156\157\156\x65\40\x72\145\x70\145\x61\164\x20\163\143\162\157\154\x6c\40\60\45\40\60\45\73\143\x75\162\x73\x6f\x72\72\x20\160\x6f\151\x6e\x74\x65\162\x3b\146\x6f\x6e\164\x2d\163\x69\172\x65\x3a\61\65\x70\x78\73\x62\157\162\x64\x65\x72\55\167\151\x64\x74\x68\x3a\40\x31\160\170\x3b\142\x6f\162\x64\x65\x72\55\163\x74\x79\154\145\x3a\x20\163\157\x6c\151\144\73\x62\157\x72\144\x65\162\55\162\141\x64\151\165\163\72\x20\63\160\x78\x3b\x77\150\151\x74\145\x2d\x73\x70\141\x63\145\x3a\40\156\157\x77\x72\141\x70\73\142\x6f\x78\55\x73\x69\172\151\156\147\x3a\x20\x62\x6f\162\x64\145\162\x2d\x62\157\170\x3b\142\x6f\x72\x64\145\x72\x2d\x63\157\154\157\x72\72\x20\43\x30\60\x37\63\101\101\x3b\x62\157\x78\x2d\163\x68\x61\144\157\x77\x3a\40\60\160\x78\40\61\160\170\40\60\160\170\x20\162\147\x62\x61\x28\x31\x32\x30\x2c\x20\x32\x30\x30\54\40\x32\x33\x30\54\x20\x30\56\x36\51\40\151\x6e\163\145\164\x3b\x63\x6f\x6c\x6f\x72\x3a\x20\43\x46\106\106\x3b\x22\164\x79\160\145\75\42\142\x75\164\164\x6f\x6e\42\40\x76\x61\154\x75\145\x3d\x22\104\x6f\156\145\42\x20\157\156\103\x6c\151\x63\x6b\x3d\42\163\x65\154\146\x2e\143\154\x6f\163\x65\50\51\73\42\x3e\74\x2f\144\x69\166\76";
        exit;
        O6:
        goto x2;
        FO:
        throw new Exception("\115\x6f\162\x65\40\x74\150\x61\156\x20\x6f\156\x65\40\74\163\141\155\x6c\x3a\116\141\x6d\x65\111\104\x3e\40\157\x72\x20\x3c\163\x61\155\x6c\x3a\x45\x6e\x63\x72\x79\x70\x74\145\x64\104\76\x20\151\156\x20\x3c\163\x61\155\154\x3a\x53\x75\x62\x6a\x65\x63\x74\76\x2e");
        x2:
        $vQ = $vQ[0];
        if ($vQ->localName === "\105\x6e\143\x72\171\160\x74\x65\x64\x44\141\x74\x61") {
            goto CC;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($vQ);
        goto dp;
        CC:
        $this->encryptedNameId = $vQ;
        dp:
    }
    private function parseConditions(DOMElement $rS)
    {
        $q8 = SAMLSPUtilities::xpQuery($rS, "\x2e\57\x73\141\x6d\154\x5f\x61\x73\x73\145\x72\164\x69\x6f\x6e\72\103\157\156\x64\151\164\x69\x6f\156\x73");
        if (empty($q8)) {
            goto Be;
        }
        if (count($q8) > 1) {
            goto d1;
        }
        goto d5;
        Be:
        return;
        goto d5;
        d1:
        throw new Exception("\x4d\x6f\x72\145\40\x74\x68\141\156\x20\157\156\145\x20\74\x73\141\155\154\72\103\157\156\144\x69\x74\151\x6f\156\163\x3e\x20\x69\x6e\40\74\x73\141\x6d\154\72\x41\163\163\145\x72\164\x69\157\156\x3e\56");
        d5:
        $q8 = $q8[0];
        if (!$q8->hasAttribute("\116\157\164\102\145\146\157\162\145")) {
            goto ZM;
        }
        $lt = SAMLSPUtilities::xsDateTimeToTimestamp($q8->getAttribute("\116\x6f\x74\102\x65\146\157\x72\145"));
        if (!($this->notBefore === NULL || $this->notBefore < $lt)) {
            goto Qj;
        }
        $this->notBefore = $lt;
        Qj:
        ZM:
        if (!$q8->hasAttribute("\x4e\157\164\x4f\156\117\x72\x41\x66\x74\145\162")) {
            goto b4;
        }
        $kq = SAMLSPUtilities::xsDateTimeToTimestamp($q8->getAttribute("\116\x6f\x74\x4f\156\117\162\101\x66\x74\x65\x72"));
        if (!($this->notOnOrAfter === NULL || $this->notOnOrAfter > $kq)) {
            goto vL;
        }
        $this->notOnOrAfter = $kq;
        vL:
        b4:
        $Ak = $q8->firstChild;
        D4:
        if (!($Ak !== NULL)) {
            goto TH;
        }
        if (!$Ak instanceof DOMText) {
            goto JD;
        }
        goto DM;
        JD:
        if (!($Ak->namespaceURI !== "\x75\x72\156\x3a\x6f\x61\x73\151\163\72\x6e\x61\x6d\x65\x73\72\x74\143\72\123\101\115\114\x3a\x32\x2e\60\72\x61\x73\x73\145\x72\164\x69\157\156")) {
            goto Nu;
        }
        throw new Exception("\125\x6e\153\156\x6f\x77\156\40\x6e\141\x6d\x65\163\160\x61\143\145\40\x6f\146\x20\x63\x6f\156\x64\151\x74\x69\157\x6e\x3a\40" . var_export($Ak->namespaceURI, TRUE));
        Nu:
        switch ($Ak->localName) {
            case "\x41\165\x64\151\145\156\x63\x65\x52\145\x73\x74\162\151\x63\x74\x69\x6f\156":
                $ez = SAMLSPUtilities::extractStrings($Ak, "\x75\162\x6e\x3a\157\x61\x73\151\163\72\156\x61\155\145\x73\x3a\164\143\72\123\101\115\x4c\x3a\62\x2e\x30\x3a\x61\163\x73\x65\x72\164\x69\157\x6e", "\x41\165\144\151\145\x6e\x63\145");
                if ($this->validAudiences === NULL) {
                    goto b0;
                }
                $this->validAudiences = array_intersect($this->validAudiences, $ez);
                goto Al;
                b0:
                $this->validAudiences = $ez;
                Al:
                goto ma;
            case "\x4f\x6e\x65\x54\x69\155\x65\125\x73\x65":
                goto ma;
            case "\x50\x72\157\170\171\122\145\163\x74\x72\x69\x63\164\x69\x6f\156":
                goto ma;
            default:
                throw new Exception("\x55\x6e\153\156\157\167\x6e\40\x63\157\156\144\x69\164\x69\157\x6e\x3a\40" . var_export($Ak->localName, TRUE));
        }
        Yd:
        ma:
        DM:
        $Ak = $Ak->nextSibling;
        goto D4;
        TH:
    }
    private function parseAuthnStatement(DOMElement $rS)
    {
        $Xr = SAMLSPUtilities::xpQuery($rS, "\56\57\163\x61\x6d\154\x5f\141\163\163\145\162\164\151\x6f\156\x3a\101\165\164\150\156\123\x74\x61\x74\x65\155\x65\156\x74");
        if (empty($Xr)) {
            goto aL;
        }
        if (count($Xr) > 1) {
            goto Ai;
        }
        goto IB;
        aL:
        $this->authnInstant = NULL;
        return;
        goto IB;
        Ai:
        throw new Exception("\x4d\157\x72\x65\x20\x74\150\141\x74\x20\x6f\x6e\x65\40\x3c\x73\x61\155\154\x3a\101\165\x74\x68\x6e\x53\x74\141\164\145\155\x65\156\x74\x3e\40\x69\156\x20\x3c\x73\141\x6d\154\72\101\x73\163\145\x72\164\151\157\x6e\76\x20\x6e\x6f\164\40\163\165\x70\160\x6f\x72\164\x65\144\56");
        IB:
        $AX = $Xr[0];
        if ($AX->hasAttribute("\101\165\x74\x68\156\x49\x6e\163\x74\141\156\x74")) {
            goto wI;
        }
        throw new Exception("\115\151\x73\x73\x69\x6e\x67\x20\162\145\161\x75\151\162\x65\x64\x20\x41\x75\164\x68\156\x49\156\163\164\x61\x6e\x74\x20\141\164\x74\162\151\x62\x75\x74\145\40\157\x6e\x20\74\x73\x61\155\x6c\x3a\x41\165\164\x68\x6e\123\164\x61\x74\145\x6d\x65\156\x74\76\x2e");
        wI:
        $this->authnInstant = SAMLSPUtilities::xsDateTimeToTimestamp($AX->getAttribute("\x41\165\164\x68\x6e\x49\x6e\x73\x74\141\x6e\164"));
        if (!$AX->hasAttribute("\123\145\163\163\151\x6f\156\116\x6f\x74\x4f\x6e\117\x72\x41\x66\x74\x65\x72")) {
            goto uW;
        }
        $this->sessionNotOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($AX->getAttribute("\123\145\163\163\x69\157\x6e\x4e\157\x74\x4f\156\117\x72\x41\x66\164\145\162"));
        uW:
        if (!$AX->hasAttribute("\123\145\x73\163\151\157\156\x49\156\144\x65\x78")) {
            goto VW;
        }
        $this->sessionIndex = $AX->getAttribute("\123\145\163\x73\151\x6f\x6e\x49\x6e\x64\x65\x78");
        VW:
        $this->parseAuthnContext($AX);
    }
    private function parseAuthnContext(DOMElement $qJ)
    {
        $fI = SAMLSPUtilities::xpQuery($qJ, "\56\57\x73\141\155\154\137\141\163\x73\x65\162\x74\151\x6f\x6e\x3a\x41\165\164\150\156\x43\x6f\x6e\x74\x65\x78\164");
        if (count($fI) > 1) {
            goto tP;
        }
        if (empty($fI)) {
            goto Wx;
        }
        goto yK;
        tP:
        throw new Exception("\x4d\157\162\x65\40\164\150\141\156\x20\157\156\x65\40\74\163\141\x6d\154\x3a\x41\165\x74\x68\x6e\x43\x6f\156\x74\x65\x78\164\x3e\x20\x69\156\40\x3c\x73\x61\155\x6c\x3a\101\165\x74\x68\156\x53\164\x61\x74\x65\x6d\145\x6e\x74\76\x2e");
        goto yK;
        Wx:
        throw new Exception("\115\151\163\163\151\156\x67\40\x72\145\161\165\151\162\145\144\40\x3c\163\141\x6d\154\x3a\101\165\x74\x68\x6e\x43\157\x6e\x74\x65\170\164\x3e\40\151\x6e\x20\x3c\x73\141\155\154\x3a\101\165\x74\150\x6e\123\164\x61\x74\145\155\x65\156\164\76\56");
        yK:
        $mm = $fI[0];
        $O9 = SAMLSPUtilities::xpQuery($mm, "\x2e\57\x73\141\x6d\154\x5f\141\x73\x73\x65\162\164\x69\x6f\x6e\72\101\165\164\x68\x6e\x43\x6f\x6e\x74\145\x78\164\104\145\x63\x6c\122\145\146");
        if (count($O9) > 1) {
            goto r4;
        }
        if (count($O9) === 1) {
            goto g4;
        }
        goto XH;
        r4:
        throw new Exception("\115\157\162\x65\40\x74\x68\141\x6e\40\x6f\x6e\145\x20\74\163\x61\x6d\154\72\x41\165\x74\x68\156\103\x6f\156\x74\145\x78\x74\104\145\x63\x6c\122\x65\146\76\40\146\157\x75\x6e\144\77");
        goto XH;
        g4:
        $this->setAuthnContextDeclRef(trim($O9[0]->textContent));
        XH:
        $U2 = SAMLSPUtilities::xpQuery($mm, "\56\57\163\141\155\x6c\137\141\x73\x73\145\162\164\151\x6f\x6e\x3a\101\x75\x74\150\x6e\x43\x6f\156\x74\x65\x78\x74\x44\x65\x63\x6c");
        if (count($U2) > 1) {
            goto Q1;
        }
        if (count($U2) === 1) {
            goto EJ;
        }
        goto Fg;
        Q1:
        throw new Exception("\x4d\157\x72\x65\x20\x74\x68\x61\156\x20\157\156\x65\x20\74\163\141\155\154\x3a\101\x75\164\x68\x6e\x43\157\x6e\x74\145\x78\x74\x44\x65\143\154\76\40\146\157\165\x6e\144\77");
        goto Fg;
        EJ:
        $this->setAuthnContextDecl(new SAML2_XML_Chunk($U2[0]));
        Fg:
        $cJ = SAMLSPUtilities::xpQuery($mm, "\56\57\163\x61\155\154\x5f\141\163\163\x65\x72\x74\151\157\156\x3a\x41\x75\x74\x68\156\x43\x6f\x6e\164\145\170\164\103\x6c\141\x73\x73\122\145\146");
        if (count($cJ) > 1) {
            goto UL;
        }
        if (count($cJ) === 1) {
            goto DL;
        }
        goto qI;
        UL:
        throw new Exception("\115\x6f\x72\145\40\164\150\x61\156\x20\157\156\x65\40\x3c\x73\x61\x6d\154\72\101\165\x74\x68\x6e\x43\157\156\x74\145\x78\x74\103\154\141\163\163\122\145\146\x3e\40\x69\156\x20\x3c\x73\x61\x6d\x6c\x3a\x41\165\164\x68\156\x43\x6f\156\x74\145\x78\x74\76\x2e");
        goto qI;
        DL:
        $this->setAuthnContextClassRef(trim($cJ[0]->textContent));
        qI:
        if (!(empty($this->authnContextClassRef) && empty($this->authnContextDecl) && empty($this->authnContextDeclRef))) {
            goto eI;
        }
        throw new Exception("\x4d\151\163\163\151\x6e\x67\40\x65\x69\x74\x68\x65\x72\40\74\x73\x61\x6d\x6c\72\x41\x75\x74\x68\156\103\x6f\156\x74\x65\x78\164\103\x6c\x61\163\x73\122\x65\146\76\40\x6f\162\40\74\x73\141\x6d\x6c\72\101\165\164\x68\x6e\103\x6f\x6e\164\145\x78\x74\x44\145\x63\154\122\145\146\76\x20\x6f\162\x20\74\163\x61\155\154\72\101\165\x74\x68\156\x43\x6f\x6e\164\145\170\x74\x44\x65\x63\154\x3e");
        eI:
        $this->AuthenticatingAuthority = SAMLSPUtilities::extractStrings($mm, "\x75\162\156\72\157\x61\x73\x69\163\x3a\156\141\155\145\x73\72\164\143\72\123\x41\x4d\x4c\x3a\x32\56\60\x3a\141\163\163\145\162\164\x69\x6f\x6e", "\101\x75\x74\150\145\x6e\164\x69\143\141\x74\151\x6e\x67\101\165\164\150\157\162\151\x74\x79");
    }
    private function parseAttributes(DOMElement $rS)
    {
        $z4 = TRUE;
        $vA = SAMLSPUtilities::xpQuery($rS, "\x2e\x2f\163\141\x6d\154\x5f\141\163\x73\145\x72\x74\151\157\156\x3a\101\x74\x74\x72\x69\142\x75\x74\145\x53\164\x61\x74\145\x6d\x65\156\x74\x2f\163\141\x6d\x6c\137\141\163\x73\145\162\x74\151\157\156\x3a\x41\164\164\x72\151\x62\x75\164\x65");
        foreach ($vA as $Ai) {
            if ($Ai->hasAttribute("\x4e\141\x6d\x65")) {
                goto v3;
            }
            throw new Exception("\x4d\151\x73\x73\x69\x6e\x67\x20\156\x61\155\145\40\157\x6e\x20\74\x73\141\155\154\x3a\x41\x74\x74\x72\151\x62\165\164\x65\x3e\x20\145\154\145\x6d\145\156\164\56");
            v3:
            $lK = $Ai->getAttribute("\116\141\155\145");
            if ($Ai->hasAttribute("\x4e\x61\155\x65\106\x6f\x72\x6d\141\164")) {
                goto nx;
            }
            $Hm = "\165\x72\156\x3a\157\x61\163\x69\x73\x3a\156\x61\155\145\x73\x3a\164\x63\x3a\123\101\115\x4c\72\61\56\61\72\156\141\155\x65\151\x64\55\x66\157\x72\155\x61\x74\x3a\x75\156\163\160\x65\x63\x69\146\151\x65\x64";
            goto cQ;
            nx:
            $Hm = $Ai->getAttribute("\116\141\x6d\145\x46\x6f\x72\155\141\x74");
            cQ:
            if ($z4) {
                goto bV;
            }
            if (!($this->nameFormat !== $Hm)) {
                goto FP;
            }
            $this->nameFormat = "\x75\162\156\72\x6f\x61\163\151\163\x3a\x6e\141\155\x65\x73\x3a\x74\143\x3a\x53\x41\x4d\x4c\x3a\61\x2e\61\72\156\141\155\145\x69\144\x2d\x66\157\x72\x6d\141\164\72\165\156\163\160\145\143\x69\x66\x69\145\144";
            FP:
            goto ZX;
            bV:
            $this->nameFormat = $Hm;
            $z4 = FALSE;
            ZX:
            if (array_key_exists($lK, $this->attributes)) {
                goto co;
            }
            $this->attributes[$lK] = array();
            co:
            $oG = SAMLSPUtilities::xpQuery($Ai, "\56\57\163\x61\155\154\x5f\x61\163\163\145\x72\164\151\157\x6e\x3a\101\x74\164\x72\x69\x62\x75\x74\x65\x56\141\154\165\145");
            foreach ($oG as $x9) {
                $this->attributes[$lK][] = trim($x9->textContent);
                ec:
            }
            CS:
            AE:
        }
        Ij:
    }
    private function parseEncryptedAttributes(DOMElement $rS)
    {
        $this->encryptedAttribute = SAMLSPUtilities::xpQuery($rS, "\56\x2f\163\141\155\154\x5f\x61\x73\163\x65\162\164\x69\157\156\x3a\x41\x74\164\162\151\x62\x75\164\145\x53\164\141\x74\145\155\145\x6e\164\x2f\163\141\x6d\154\x5f\141\x73\x73\145\x72\164\x69\157\x6e\x3a\x45\156\x63\162\171\x70\x74\145\144\x41\x74\x74\x72\151\142\165\164\145");
    }
    private function parseSignature(DOMElement $rS)
    {
        $le = SAMLSPUtilities::validateElement($rS);
        if (!($le !== FALSE)) {
            goto rW;
        }
        $this->wasSignedAtConstruction = TRUE;
        $this->certificates = $le["\103\x65\x72\164\151\x66\x69\143\141\164\x65\163"];
        $this->signatureData = $le;
        rW:
    }
    public function validate(XMLSecurityKey $N5)
    {
        if (!($this->signatureData === NULL)) {
            goto Ku;
        }
        return FALSE;
        Ku:
        SAMLSPUtilities::validateSignature($this->signatureData, $N5);
        return TRUE;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($M0)
    {
        $this->id = $M0;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($Ul)
    {
        $this->issueInstant = $Ul;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($gu)
    {
        $this->issuer = $gu;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto Z2;
        }
        throw new Exception("\101\x74\164\145\155\160\164\x65\x64\x20\164\157\x20\x72\x65\x74\x72\x69\145\166\145\x20\145\156\x63\162\171\x70\x74\x65\144\x20\x4e\141\155\145\x49\104\40\x77\x69\x74\x68\x6f\165\x74\40\144\145\x63\162\171\x70\164\151\x6e\x67\x20\151\x74\40\x66\151\x72\x73\x74\56");
        Z2:
        return $this->nameId;
    }
    public function setNameId($vQ)
    {
        $this->nameId = $vQ;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto Y4;
        }
        return TRUE;
        Y4:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $N5)
    {
        $JR = new DOMDocument();
        $vS = $JR->createElement("\x72\x6f\157\x74");
        $JR->appendChild($vS);
        SAMLSPUtilities::addNameId($vS, $this->nameId);
        $vQ = $vS->firstChild;
        SAMLSPUtilities::getContainer()->debugMessage($vQ, "\x65\x6e\x63\162\171\x70\x74");
        $zK = new XMLSecEnc();
        $zK->setNode($vQ);
        $zK->type = XMLSecEnc::Element;
        $VM = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $VM->generateSessionKey();
        $zK->encryptKey($N5, $VM);
        $this->encryptedNameId = $zK->encryptNode($VM);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $N5, array $EU = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto EB;
        }
        return;
        EB:
        $vQ = SAMLSPUtilities::decryptElement($this->encryptedNameId, $N5, $EU);
        SAMLSPUtilities::getContainer()->debugMessage($vQ, "\x64\145\143\x72\171\160\x74");
        $this->nameId = SAMLSPUtilities::parseNameId($vQ);
        $this->encryptedNameId = NULL;
    }
    public function decryptAttributes(XMLSecurityKey $N5, array $EU = array())
    {
        if (!($this->encryptedAttribute === NULL)) {
            goto O1;
        }
        return;
        O1:
        $z4 = TRUE;
        $vA = $this->encryptedAttribute;
        foreach ($vA as $Uv) {
            $Ai = SAMLSPUtilities::decryptElement($Uv->getElementsByTagName("\105\x6e\x63\x72\x79\160\x74\145\144\104\x61\x74\141")->item(0), $N5, $EU);
            if ($Ai->hasAttribute("\116\141\155\145")) {
                goto Ii;
            }
            throw new Exception("\115\x69\x73\163\151\x6e\x67\40\156\x61\x6d\x65\40\x6f\156\40\x3c\x73\141\155\x6c\x3a\x41\x74\164\162\151\142\x75\x74\145\76\40\145\154\x65\155\145\156\x74\56");
            Ii:
            $lK = $Ai->getAttribute("\x4e\141\x6d\x65");
            if ($Ai->hasAttribute("\116\141\x6d\x65\x46\x6f\x72\x6d\x61\164")) {
                goto Hp;
            }
            $Hm = "\x75\162\156\72\157\x61\x73\151\x73\x3a\x6e\141\155\x65\x73\x3a\164\143\72\x53\101\x4d\114\x3a\62\x2e\x30\72\x61\164\x74\162\156\x61\x6d\x65\x2d\x66\157\x72\x6d\141\x74\x3a\165\156\x73\160\x65\143\x69\146\151\x65\144";
            goto tO;
            Hp:
            $Hm = $Ai->getAttribute("\116\141\x6d\145\106\x6f\x72\x6d\141\164");
            tO:
            if ($z4) {
                goto iA;
            }
            if (!($this->nameFormat !== $Hm)) {
                goto IP;
            }
            $this->nameFormat = "\x75\162\x6e\72\x6f\141\163\151\163\72\x6e\141\155\145\x73\x3a\164\143\72\x53\101\115\114\72\62\x2e\60\72\141\164\x74\162\x6e\x61\x6d\x65\55\x66\157\x72\155\141\164\x3a\165\x6e\163\x70\x65\x63\151\146\x69\145\144";
            IP:
            goto Cp;
            iA:
            $this->nameFormat = $Hm;
            $z4 = FALSE;
            Cp:
            if (array_key_exists($lK, $this->attributes)) {
                goto s3;
            }
            $this->attributes[$lK] = array();
            s3:
            $oG = SAMLSPUtilities::xpQuery($Ai, "\56\57\x73\x61\155\154\137\x61\x73\163\145\x72\x74\x69\157\x6e\x3a\101\164\164\x72\151\142\165\x74\145\x56\x61\154\165\145");
            foreach ($oG as $x9) {
                $this->attributes[$lK][] = trim($x9->textContent);
                VS:
            }
            h4:
            pM:
        }
        gE:
    }
    public function getNotBefore()
    {
        return $this->notBefore;
    }
    public function setNotBefore($lt)
    {
        $this->notBefore = $lt;
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($kq)
    {
        $this->notOnOrAfter = $kq;
    }
    public function setEncryptedAttributes($Us)
    {
        $this->requiredEncAttributes = $Us;
    }
    public function getValidAudiences()
    {
        return $this->validAudiences;
    }
    public function setValidAudiences(array $fP = NULL)
    {
        $this->validAudiences = $fP;
    }
    public function getAuthnInstant()
    {
        return $this->authnInstant;
    }
    public function setAuthnInstant($Mo)
    {
        $this->authnInstant = $Mo;
    }
    public function getSessionNotOnOrAfter()
    {
        return $this->sessionNotOnOrAfter;
    }
    public function setSessionNotOnOrAfter($k3)
    {
        $this->sessionNotOnOrAfter = $k3;
    }
    public function getSessionIndex()
    {
        return $this->sessionIndex;
    }
    public function setSessionIndex($pK)
    {
        $this->sessionIndex = $pK;
    }
    public function getAuthnContext()
    {
        if (empty($this->authnContextClassRef)) {
            goto PL;
        }
        return $this->authnContextClassRef;
        PL:
        if (empty($this->authnContextDeclRef)) {
            goto SD;
        }
        return $this->authnContextDeclRef;
        SD:
        return NULL;
    }
    public function setAuthnContext($QI)
    {
        $this->setAuthnContextClassRef($QI);
    }
    public function getAuthnContextClassRef()
    {
        return $this->authnContextClassRef;
    }
    public function setAuthnContextClassRef($wr)
    {
        $this->authnContextClassRef = $wr;
    }
    public function setAuthnContextDecl(SAML2_XML_Chunk $WS)
    {
        if (empty($this->authnContextDeclRef)) {
            goto kx;
        }
        throw new Exception("\101\x75\x74\x68\x6e\x43\x6f\156\164\145\170\164\104\145\x63\154\122\x65\146\x20\x69\x73\40\141\154\x72\145\x61\144\x79\40\x72\x65\x67\151\x73\164\145\x72\145\144\x21\40\115\x61\x79\x20\157\x6e\x6c\171\40\x68\x61\166\145\x20\145\151\164\x68\x65\x72\40\141\x20\104\145\x63\x6c\x20\x6f\x72\40\141\x20\x44\145\143\154\122\145\146\54\x20\x6e\157\164\x20\142\157\164\x68\x21");
        kx:
        $this->authnContextDecl = $WS;
    }
    public function getAuthnContextDecl()
    {
        return $this->authnContextDecl;
    }
    public function setAuthnContextDeclRef($y6)
    {
        if (empty($this->authnContextDecl)) {
            goto MH;
        }
        throw new Exception("\x41\165\x74\150\156\103\157\156\164\145\x78\x74\x44\145\x63\x6c\40\x69\163\x20\x61\154\162\x65\141\x64\x79\40\162\145\x67\151\x73\x74\x65\162\x65\144\41\x20\x4d\141\x79\40\157\x6e\154\x79\40\150\x61\x76\x65\x20\145\x69\x74\150\x65\162\x20\x61\40\104\x65\x63\x6c\x20\157\162\40\x61\x20\104\x65\143\154\x52\145\146\x2c\x20\156\157\x74\x20\142\x6f\x74\x68\41");
        MH:
        $this->authnContextDeclRef = $y6;
    }
    public function getAuthnContextDeclRef()
    {
        return $this->authnContextDeclRef;
    }
    public function getAuthenticatingAuthority()
    {
        return $this->AuthenticatingAuthority;
    }
    public function setAuthenticatingAuthority($mg)
    {
        $this->AuthenticatingAuthority = $mg;
    }
    public function getAttributes()
    {
        return $this->attributes;
    }
    public function setAttributes(array $vA)
    {
        $this->attributes = $vA;
    }
    public function getAttributeNameFormat()
    {
        return $this->nameFormat;
    }
    public function setAttributeNameFormat($Hm)
    {
        $this->nameFormat = $Hm;
    }
    public function getSubjectConfirmation()
    {
        return $this->SubjectConfirmation;
    }
    public function setSubjectConfirmation(array $UP)
    {
        $this->SubjectConfirmation = $UP;
    }
    public function getSignatureKey()
    {
        return $this->signatureKey;
    }
    public function setSignatureKey(XMLsecurityKey $Kw = NULL)
    {
        $this->signatureKey = $Kw;
    }
    public function getEncryptionKey()
    {
        return $this->encryptionKey;
    }
    public function setEncryptionKey(XMLSecurityKey $qi = NULL)
    {
        $this->encryptionKey = $qi;
    }
    public function setCertificates(array $Z2)
    {
        $this->certificates = $Z2;
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
    public function toXML(DOMNode $H9 = NULL)
    {
        if ($H9 === NULL) {
            goto ry;
        }
        $yP = $H9->ownerDocument;
        goto ad;
        ry:
        $yP = new DOMDocument();
        $H9 = $yP;
        ad:
        $vS = $yP->createElementNS("\x75\162\x6e\72\x6f\x61\x73\x69\x73\72\x6e\x61\x6d\x65\x73\x3a\x74\143\72\123\101\x4d\114\72\62\56\x30\72\x61\x73\x73\145\x72\164\x69\x6f\156", "\163\x61\x6d\x6c\72" . "\101\x73\163\145\162\164\x69\157\156");
        $H9->appendChild($vS);
        $vS->setAttributeNS("\x75\x72\156\x3a\x6f\x61\163\x69\x73\72\x6e\141\155\x65\x73\x3a\x74\143\72\x53\x41\x4d\x4c\x3a\x32\56\x30\x3a\x70\162\x6f\x74\157\143\x6f\x6c", "\163\141\155\x6c\160\x3a\x74\x6d\160", "\164\x6d\160");
        $vS->removeAttributeNS("\x75\162\156\x3a\x6f\141\163\x69\x73\72\156\141\155\x65\x73\x3a\x74\x63\72\x53\x41\x4d\114\x3a\62\x2e\x30\72\160\x72\x6f\x74\x6f\x63\157\x6c", "\164\x6d\x70");
        $vS->setAttributeNS("\150\164\164\x70\x3a\x2f\x2f\x77\167\167\x2e\x77\63\x2e\157\162\x67\x2f\62\60\x30\x31\57\130\115\114\x53\x63\x68\x65\155\x61\x2d\151\x6e\x73\x74\x61\x6e\x63\145", "\x78\x73\x69\72\164\x6d\x70", "\164\155\x70");
        $vS->removeAttributeNS("\150\164\164\x70\72\x2f\x2f\x77\167\x77\56\167\63\x2e\157\x72\147\x2f\x32\x30\60\x31\57\130\115\114\x53\143\150\x65\x6d\141\x2d\x69\x6e\163\164\141\x6e\143\x65", "\x74\155\x70");
        $vS->setAttributeNS("\x68\164\164\160\x3a\x2f\x2f\x77\167\167\x2e\167\63\56\x6f\x72\x67\57\62\60\60\x31\57\x58\x4d\x4c\x53\143\150\145\x6d\x61", "\170\163\72\164\x6d\160", "\164\155\x70");
        $vS->removeAttributeNS("\150\164\x74\x70\x3a\57\x2f\x77\x77\167\x2e\167\63\x2e\x6f\x72\147\57\62\60\x30\61\57\x58\115\x4c\123\143\150\x65\155\x61", "\x74\x6d\160");
        $vS->setAttribute("\111\104", $this->id);
        $vS->setAttribute("\x56\145\x72\x73\x69\x6f\x6e", "\62\x2e\60");
        $vS->setAttribute("\x49\163\x73\165\145\x49\x6e\x73\x74\x61\x6e\164", gmdate("\131\55\155\55\144\x5c\x54\110\72\151\72\x73\134\132", $this->issueInstant));
        $gu = SAMLSPUtilities::addString($vS, "\x75\x72\156\72\x6f\x61\163\x69\163\72\x6e\141\x6d\145\163\x3a\x74\143\72\123\x41\115\x4c\x3a\x32\x2e\60\72\141\163\x73\145\162\164\x69\x6f\156", "\x73\141\x6d\x6c\72\111\163\x73\165\x65\162", $this->issuer);
        $this->addSubject($vS);
        $this->addConditions($vS);
        $this->addAuthnStatement($vS);
        if ($this->requiredEncAttributes == FALSE) {
            goto Uq;
        }
        $this->addEncryptedAttributeStatement($vS);
        goto mL;
        Uq:
        $this->addAttributeStatement($vS);
        mL:
        if (!($this->signatureKey !== NULL)) {
            goto bs;
        }
        SAMLSPUtilities::insertSignature($this->signatureKey, $this->certificates, $vS, $gu->nextSibling);
        bs:
        return $vS;
    }
    private function addSubject(DOMElement $vS)
    {
        if (!($this->nameId === NULL && $this->encryptedNameId === NULL)) {
            goto Uf;
        }
        return;
        Uf:
        $kt = $vS->ownerDocument->createElementNS("\165\162\x6e\x3a\157\141\x73\151\163\x3a\x6e\x61\155\145\163\x3a\164\x63\x3a\x53\x41\x4d\114\72\x32\x2e\60\x3a\141\163\163\145\162\x74\151\x6f\156", "\163\141\155\154\x3a\x53\165\x62\x6a\x65\x63\x74");
        $vS->appendChild($kt);
        if ($this->encryptedNameId === NULL) {
            goto qD;
        }
        $C3 = $kt->ownerDocument->createElementNS("\165\x72\156\72\157\141\163\x69\x73\x3a\x6e\x61\x6d\145\163\72\x74\143\72\x53\101\x4d\x4c\72\62\x2e\x30\x3a\141\x73\163\x65\x72\x74\x69\x6f\x6e", "\x73\141\x6d\x6c\72" . "\105\156\x63\x72\171\x70\x74\145\x64\111\x44");
        $kt->appendChild($C3);
        $C3->appendChild($kt->ownerDocument->importNode($this->encryptedNameId, TRUE));
        goto Je;
        qD:
        SAMLSPUtilities::addNameId($kt, $this->nameId);
        Je:
        foreach ($this->SubjectConfirmation as $l3) {
            $l3->toXML($kt);
            vV:
        }
        Gg:
    }
    private function addConditions(DOMElement $vS)
    {
        $yP = $vS->ownerDocument;
        $q8 = $yP->createElementNS("\x75\x72\x6e\x3a\157\x61\x73\151\163\72\x6e\x61\155\145\163\72\164\x63\x3a\123\x41\115\114\x3a\62\x2e\60\x3a\x61\x73\163\x65\x72\x74\151\x6f\156", "\163\x61\155\x6c\x3a\x43\x6f\156\x64\x69\x74\151\157\156\163");
        $vS->appendChild($q8);
        if (!($this->notBefore !== NULL)) {
            goto UR;
        }
        $q8->setAttribute("\x4e\157\x74\x42\x65\146\x6f\x72\145", gmdate("\x59\x2d\155\55\144\134\x54\110\72\x69\72\x73\134\x5a", $this->notBefore));
        UR:
        if (!($this->notOnOrAfter !== NULL)) {
            goto CX;
        }
        $q8->setAttribute("\x4e\157\164\x4f\x6e\117\x72\101\x66\164\x65\162", gmdate("\x59\x2d\x6d\55\144\134\x54\110\x3a\151\72\x73\x5c\132", $this->notOnOrAfter));
        CX:
        if (!($this->validAudiences !== NULL)) {
            goto mt;
        }
        $VE = $yP->createElementNS("\165\x72\x6e\x3a\157\x61\x73\151\x73\72\x6e\x61\x6d\145\x73\72\164\x63\x3a\x53\x41\x4d\114\x3a\x32\56\x30\72\x61\x73\163\145\x72\164\x69\x6f\156", "\163\141\x6d\x6c\72\101\x75\x64\x69\x65\156\x63\x65\122\145\163\x74\x72\151\143\x74\x69\157\156");
        $q8->appendChild($VE);
        SAMLSPUtilities::addStrings($VE, "\x75\162\156\x3a\x6f\x61\163\x69\x73\x3a\156\141\x6d\145\x73\72\164\143\72\123\101\115\x4c\x3a\x32\x2e\60\72\x61\163\x73\x65\162\164\151\157\x6e", "\x73\x61\x6d\154\x3a\101\165\x64\x69\145\156\143\x65", FALSE, $this->validAudiences);
        mt:
    }
    private function addAuthnStatement(DOMElement $vS)
    {
        if (!($this->authnInstant === NULL || $this->authnContextClassRef === NULL && $this->authnContextDecl === NULL && $this->authnContextDeclRef === NULL)) {
            goto ek;
        }
        return;
        ek:
        $yP = $vS->ownerDocument;
        $qJ = $yP->createElementNS("\165\x72\x6e\x3a\157\x61\x73\151\163\72\x6e\141\x6d\x65\163\72\164\143\x3a\x53\x41\115\x4c\72\x32\56\60\72\141\x73\163\145\x72\x74\151\157\156", "\x73\141\x6d\x6c\x3a\101\165\x74\x68\156\x53\164\141\x74\145\155\x65\x6e\164");
        $vS->appendChild($qJ);
        $qJ->setAttribute("\101\165\x74\x68\156\111\x6e\x73\x74\141\156\x74", gmdate("\131\55\x6d\55\x64\134\x54\x48\72\x69\x3a\x73\134\132", $this->authnInstant));
        if (!($this->sessionNotOnOrAfter !== NULL)) {
            goto WN;
        }
        $qJ->setAttribute("\123\145\x73\163\x69\157\x6e\x4e\157\x74\x4f\x6e\x4f\x72\x41\146\164\x65\162", gmdate("\131\x2d\155\x2d\x64\x5c\124\x48\x3a\x69\x3a\x73\134\x5a", $this->sessionNotOnOrAfter));
        WN:
        if (!($this->sessionIndex !== NULL)) {
            goto uf;
        }
        $qJ->setAttribute("\x53\x65\163\x73\151\157\x6e\x49\x6e\x64\x65\x78", $this->sessionIndex);
        uf:
        $mm = $yP->createElementNS("\165\x72\x6e\72\x6f\x61\x73\151\x73\x3a\156\x61\x6d\145\163\72\164\143\x3a\x53\x41\x4d\114\72\62\x2e\60\72\x61\x73\163\145\162\x74\x69\x6f\x6e", "\163\141\155\154\72\101\165\x74\150\156\103\157\156\x74\145\x78\x74");
        $qJ->appendChild($mm);
        if (empty($this->authnContextClassRef)) {
            goto cS;
        }
        SAMLSPUtilities::addString($mm, "\x75\x72\x6e\x3a\x6f\x61\x73\151\163\72\x6e\141\155\x65\x73\72\x74\143\72\x53\101\115\x4c\x3a\x32\56\x30\x3a\x61\163\x73\x65\x72\x74\x69\157\x6e", "\x73\x61\155\154\x3a\101\165\164\150\x6e\x43\x6f\x6e\x74\x65\x78\x74\x43\154\141\x73\163\122\x65\x66", $this->authnContextClassRef);
        cS:
        if (empty($this->authnContextDecl)) {
            goto we;
        }
        $this->authnContextDecl->toXML($mm);
        we:
        if (empty($this->authnContextDeclRef)) {
            goto Yl;
        }
        SAMLSPUtilities::addString($mm, "\165\x72\156\72\157\141\x73\151\x73\x3a\x6e\x61\x6d\145\x73\72\x74\x63\x3a\123\x41\115\114\72\x32\x2e\60\x3a\141\x73\x73\145\162\164\x69\x6f\x6e", "\163\141\x6d\x6c\72\x41\x75\164\150\156\x43\x6f\156\164\x65\170\x74\104\x65\143\154\122\145\146", $this->authnContextDeclRef);
        Yl:
        SAMLSPUtilities::addStrings($mm, "\165\x72\x6e\x3a\x6f\141\163\x69\x73\72\x6e\141\x6d\x65\x73\72\164\143\x3a\123\101\x4d\114\x3a\62\56\x30\72\x61\x73\x73\x65\x72\164\x69\x6f\156", "\x73\141\155\154\72\101\x75\x74\x68\x65\x6e\x74\151\x63\141\x74\x69\x6e\x67\101\165\x74\150\x6f\162\x69\x74\171", FALSE, $this->AuthenticatingAuthority);
    }
    private function addAttributeStatement(DOMElement $vS)
    {
        if (!empty($this->attributes)) {
            goto qX;
        }
        return;
        qX:
        $yP = $vS->ownerDocument;
        $EX = $yP->createElementNS("\x75\x72\156\72\x6f\141\163\x69\x73\x3a\x6e\141\155\x65\x73\x3a\x74\x63\x3a\123\101\115\114\x3a\62\x2e\60\72\x61\163\x73\145\162\x74\x69\x6f\x6e", "\x73\x61\155\154\x3a\101\x74\164\x72\151\x62\x75\x74\x65\x53\164\x61\164\145\155\145\x6e\x74");
        $vS->appendChild($EX);
        foreach ($this->attributes as $lK => $oG) {
            $Ai = $yP->createElementNS("\165\162\156\x3a\x6f\141\x73\151\x73\x3a\x6e\141\x6d\145\x73\72\164\x63\72\123\101\x4d\x4c\x3a\62\56\x30\72\x61\x73\163\145\x72\164\151\157\156", "\163\141\x6d\x6c\x3a\x41\x74\x74\x72\x69\142\x75\x74\145");
            $EX->appendChild($Ai);
            $Ai->setAttribute("\116\141\155\x65", $lK);
            if (!($this->nameFormat !== "\x75\x72\156\72\157\141\x73\151\163\72\156\141\x6d\x65\x73\72\164\x63\72\x53\x41\x4d\x4c\72\x32\56\60\x3a\x61\x74\x74\x72\x6e\141\x6d\145\55\146\157\x72\x6d\x61\164\x3a\x75\156\163\160\145\143\151\x66\151\145\144")) {
                goto YB;
            }
            $Ai->setAttribute("\116\x61\155\145\106\157\x72\x6d\141\164", $this->nameFormat);
            YB:
            foreach ($oG as $x9) {
                if (is_string($x9)) {
                    goto xz;
                }
                if (is_int($x9)) {
                    goto nY;
                }
                $nF = NULL;
                goto X0;
                xz:
                $nF = "\170\x73\x3a\x73\164\x72\151\156\147";
                goto X0;
                nY:
                $nF = "\170\163\72\151\x6e\x74\x65\x67\145\x72";
                X0:
                $Ri = $yP->createElementNS("\x75\162\156\x3a\157\141\x73\151\x73\x3a\156\141\155\x65\163\72\x74\143\72\123\x41\115\x4c\x3a\x32\56\x30\72\141\x73\163\145\162\x74\x69\157\156", "\163\x61\x6d\x6c\72\101\x74\164\x72\151\142\165\164\x65\126\x61\x6c\165\x65");
                $Ai->appendChild($Ri);
                if (!($nF !== NULL)) {
                    goto p0;
                }
                $Ri->setAttributeNS("\150\x74\164\160\72\57\x2f\x77\x77\167\x2e\x77\x33\x2e\x6f\162\x67\57\62\x30\60\61\57\130\x4d\x4c\x53\x63\150\145\155\x61\55\151\156\x73\x74\x61\x6e\x63\x65", "\x78\163\x69\72\164\171\160\145", $nF);
                p0:
                if (!is_null($x9)) {
                    goto VZ;
                }
                $Ri->setAttributeNS("\x68\x74\164\160\72\x2f\57\167\167\167\56\167\63\56\157\162\x67\x2f\62\x30\60\61\x2f\130\115\x4c\123\x63\150\x65\x6d\141\x2d\151\x6e\x73\164\x61\156\143\145", "\170\x73\151\72\x6e\x69\x6c", "\164\x72\165\145");
                VZ:
                if ($x9 instanceof DOMNodeList) {
                    goto Qh;
                }
                $Ri->appendChild($yP->createTextNode($x9));
                goto P_;
                Qh:
                $Sm = 0;
                ig:
                if (!($Sm < $x9->length)) {
                    goto Fm;
                }
                $Ak = $yP->importNode($x9->item($Sm), TRUE);
                $Ri->appendChild($Ak);
                wn:
                $Sm++;
                goto ig;
                Fm:
                P_:
                n7:
            }
            rZ:
            vX:
        }
        id:
    }
    private function addEncryptedAttributeStatement(DOMElement $vS)
    {
        if (!($this->requiredEncAttributes == FALSE)) {
            goto G4;
        }
        return;
        G4:
        $yP = $vS->ownerDocument;
        $EX = $yP->createElementNS("\165\162\x6e\72\157\141\x73\x69\163\x3a\x6e\141\x6d\145\x73\72\x74\143\x3a\123\101\x4d\x4c\x3a\62\x2e\x30\72\141\x73\x73\145\162\164\151\x6f\x6e", "\163\141\155\154\x3a\101\164\164\x72\x69\x62\x75\x74\x65\123\x74\141\x74\x65\x6d\x65\156\x74");
        $vS->appendChild($EX);
        foreach ($this->attributes as $lK => $oG) {
            $xU = new DOMDocument();
            $Ai = $xU->createElementNS("\x75\162\156\x3a\157\141\x73\151\x73\x3a\156\141\155\145\x73\72\164\143\x3a\x53\101\x4d\x4c\72\x32\56\x30\72\x61\163\x73\x65\162\x74\151\x6f\156", "\163\x61\155\154\x3a\x41\x74\164\x72\x69\142\x75\x74\x65");
            $Ai->setAttribute("\116\x61\155\x65", $lK);
            $xU->appendChild($Ai);
            if (!($this->nameFormat !== "\165\x72\x6e\x3a\x6f\141\x73\x69\x73\72\156\141\x6d\145\x73\x3a\x74\143\72\x53\101\115\114\x3a\62\x2e\60\x3a\x61\164\164\x72\x6e\141\x6d\x65\55\x66\x6f\x72\155\141\164\x3a\165\x6e\163\x70\145\x63\x69\x66\151\145\144")) {
                goto Cd;
            }
            $Ai->setAttribute("\x4e\141\x6d\x65\x46\157\x72\155\141\x74", $this->nameFormat);
            Cd:
            foreach ($oG as $x9) {
                if (is_string($x9)) {
                    goto tg;
                }
                if (is_int($x9)) {
                    goto oM;
                }
                $nF = NULL;
                goto hZ;
                tg:
                $nF = "\x78\x73\72\x73\164\162\x69\x6e\x67";
                goto hZ;
                oM:
                $nF = "\170\x73\72\151\x6e\164\145\x67\145\162";
                hZ:
                $Ri = $xU->createElementNS("\165\x72\x6e\72\157\x61\163\x69\163\x3a\156\141\x6d\x65\x73\72\x74\x63\72\x53\x41\115\x4c\72\x32\56\60\x3a\141\163\163\145\162\x74\151\x6f\x6e", "\163\141\155\x6c\72\x41\164\164\x72\x69\x62\x75\x74\x65\x56\x61\x6c\165\145");
                $Ai->appendChild($Ri);
                if (!($nF !== NULL)) {
                    goto ym;
                }
                $Ri->setAttributeNS("\x68\x74\x74\x70\72\x2f\57\167\167\x77\56\167\x33\x2e\x6f\162\x67\57\62\60\x30\x31\57\130\115\x4c\123\x63\x68\145\x6d\141\x2d\151\156\x73\164\141\156\x63\145", "\x78\x73\x69\72\x74\x79\x70\145", $nF);
                ym:
                if ($x9 instanceof DOMNodeList) {
                    goto gg;
                }
                $Ri->appendChild($xU->createTextNode($x9));
                goto nU;
                gg:
                $Sm = 0;
                wl:
                if (!($Sm < $x9->length)) {
                    goto S1;
                }
                $Ak = $xU->importNode($x9->item($Sm), TRUE);
                $Ri->appendChild($Ak);
                Kc:
                $Sm++;
                goto wl;
                S1:
                nU:
                gL:
            }
            u6:
            $gU = new XMLSecEnc();
            $gU->setNode($xU->documentElement);
            $gU->type = "\150\x74\x74\160\72\x2f\57\167\x77\167\56\x77\63\x2e\157\x72\147\x2f\x32\x30\60\61\x2f\60\x34\57\x78\x6d\x6c\145\x6e\x63\x23\105\154\x65\155\x65\156\x74";
            $VM = new XMLSecurityKey(XMLSecurityKey::AES256_CBC);
            $VM->generateSessionKey();
            $gU->encryptKey($this->encryptionKey, $VM);
            $Ba = $gU->encryptNode($VM);
            $Jp = $yP->createElementNS("\x75\x72\x6e\x3a\x6f\141\163\151\163\x3a\156\141\x6d\145\x73\x3a\164\x63\x3a\x53\x41\115\x4c\72\x32\56\60\72\x61\x73\x73\145\162\164\151\x6f\x6e", "\163\x61\155\x6c\x3a\x45\156\x63\162\x79\x70\164\x65\x64\101\164\x74\162\151\142\x75\x74\x65");
            $EX->appendChild($Jp);
            $J4 = $yP->importNode($Ba, TRUE);
            $Jp->appendChild($J4);
            WW:
        }
        ki:
    }
    public function getPrivateKeyUrl()
    {
        return $this->privateKeyUrl;
    }
    public function setPrivateKeyUrl($ym)
    {
        $this->privateKeyUrl = $ym;
    }
}
