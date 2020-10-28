<?php


include_once "\x55\164\151\154\x69\164\x69\145\163\56\x70\x68\160";
include_once "\170\x6d\x6c\163\145\143\154\151\x62\x73\x2e\x70\x68\x70";
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
    public function __construct(DOMElement $aX = NULL, $ls)
    {
        $this->id = SAMLSPUtilities::generateId();
        $this->issueInstant = SAMLSPUtilities::generateTimestamp();
        $this->issuer = '';
        $this->authnInstant = SAMLSPUtilities::generateTimestamp();
        $this->attributes = array();
        $this->nameFormat = "\165\x72\156\72\x6f\x61\x73\151\163\x3a\x6e\141\x6d\145\163\x3a\164\x63\x3a\123\101\115\114\72\61\56\x31\72\156\141\155\x65\x69\x64\x2d\146\157\162\x6d\141\x74\x3a\165\156\163\x70\145\x63\151\146\151\x65\144";
        $this->certificates = array();
        $this->AuthenticatingAuthority = array();
        $this->SubjectConfirmation = array();
        if (!($aX === NULL)) {
            goto um;
        }
        return;
        um:
        if (!($aX->localName === "\105\156\x63\162\x79\160\x74\145\x64\101\163\163\x65\x72\164\x69\x6f\156")) {
            goto wm;
        }
        $cd = SAMLSPUtilities::xpQuery($aX, "\x2e\x2f\170\145\x6e\143\x3a\x45\x6e\x63\162\171\160\164\145\144\104\141\164\141");
        $g1 = SAMLSPUtilities::xpQuery($aX, "\57\57\x2a\133\154\x6f\x63\141\x6c\55\156\x61\155\x65\50\x29\x3d\47\x45\x6e\143\x72\171\x70\164\145\144\113\145\171\47\135\x2f\x2a\133\154\157\x63\141\154\x2d\x6e\141\155\x65\x28\51\x3d\x27\x45\156\143\162\171\x70\x74\x69\157\156\115\145\164\x68\157\144\47\x5d\x2f\100\101\x6c\147\157\x72\151\x74\150\155");
        $XC = $g1[0]->value;
        $P6 = SAMLSPUtilities::getEncryptionAlgorithm($XC);
        if (count($cd) === 0) {
            goto A9;
        }
        if (count($cd) > 1) {
            goto i_;
        }
        goto Of;
        A9:
        throw new Exception("\x4d\151\163\x73\151\x6e\x67\x20\x65\x6e\143\x72\171\x70\x74\x65\x64\x20\144\x61\x74\x61\40\151\156\40\74\163\x61\155\x6c\x3a\x45\x6e\x63\162\x79\160\164\x65\144\101\x73\x73\x65\x72\x74\x69\157\156\76\x2e");
        goto Of;
        i_:
        throw new Exception("\x4d\x6f\162\x65\40\x74\150\141\156\40\x6f\x6e\145\40\x65\156\143\162\x79\160\x74\x65\144\x20\x64\x61\164\x61\x20\x65\154\145\155\145\156\164\x20\151\156\x20\74\x73\141\155\154\x3a\105\x6e\143\162\x79\x70\x74\x65\x64\101\163\163\x65\162\164\x69\157\x6e\x3e\56");
        Of:
        $ES = new XMLSecurityKey($P6, array("\x74\x79\x70\x65" => "\x70\162\151\x76\141\x74\x65"));
        $ES->loadKey($ls, FALSE);
        $Bn = array();
        $aX = SAMLSPUtilities::decryptElement($cd[0], $ES, $Bn);
        wm:
        if ($aX->hasAttribute("\x49\104")) {
            goto Eq;
        }
        throw new Exception("\x4d\151\x73\163\151\x6e\x67\40\111\104\x20\x61\164\164\162\x69\142\165\x74\145\40\157\156\x20\123\101\x4d\x4c\x20\141\163\x73\x65\162\164\x69\157\x6e\56");
        Eq:
        $this->id = $aX->getAttribute("\x49\x44");
        if (!($aX->getAttribute("\126\145\x72\163\x69\157\x6e") !== "\x32\56\60")) {
            goto VR;
        }
        throw new Exception("\125\156\x73\x75\160\x70\x6f\x72\x74\145\144\x20\166\145\162\x73\151\157\x6e\x3a\40" . $aX->getAttribute("\126\145\162\163\151\x6f\x6e"));
        VR:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($aX->getAttribute("\x49\x73\x73\x75\145\x49\x6e\x73\164\141\156\164"));
        $Vs = SAMLSPUtilities::xpQuery($aX, "\x2e\57\x73\x61\x6d\x6c\x5f\141\x73\163\x65\x72\x74\151\x6f\x6e\72\111\163\163\x75\x65\x72");
        if (!empty($Vs)) {
            goto M_;
        }
        throw new Exception("\115\151\163\163\151\156\147\40\x3c\x73\141\x6d\154\x3a\111\x73\x73\165\x65\162\76\40\x69\156\x20\x61\x73\x73\145\x72\x74\x69\157\156\x2e");
        M_:
        $this->issuer = trim($Vs[0]->textContent);
        $this->parseConditions($aX);
        $this->parseAuthnStatement($aX);
        $this->parseAttributes($aX);
        $this->parseEncryptedAttributes($aX);
        $this->parseSignature($aX);
        $this->parseSubject($aX);
    }
    private function parseSubject(DOMElement $aX)
    {
        $W2 = SAMLSPUtilities::xpQuery($aX, "\x2e\57\x73\141\155\x6c\137\141\x73\163\x65\162\164\151\157\156\72\x53\x75\142\x6a\145\143\x74");
        if (empty($W2)) {
            goto ij;
        }
        if (count($W2) > 1) {
            goto ro;
        }
        goto lG;
        ij:
        return;
        goto lG;
        ro:
        throw new Exception("\x4d\157\162\x65\40\x74\x68\141\156\x20\x6f\x6e\x65\40\x3c\163\x61\x6d\x6c\72\x53\x75\x62\x6a\145\143\x74\x3e\x20\151\156\40\74\x73\x61\155\x6c\x3a\x41\163\x73\145\162\x74\x69\157\x6e\x3e\56");
        lG:
        $W2 = $W2[0];
        $Kt = SAMLSPUtilities::xpQuery($W2, "\56\57\163\141\155\154\x5f\x61\163\163\145\162\x74\151\x6f\156\x3a\x4e\141\x6d\145\x49\104\x20\x7c\40\x2e\57\163\x61\x6d\x6c\137\x61\163\163\145\x72\x74\x69\x6f\156\72\x45\156\143\162\x79\x70\164\145\144\x49\104\x2f\x78\145\156\143\x3a\105\x6e\x63\162\x79\x70\x74\145\144\104\141\164\x61");
        if (empty($Kt)) {
            goto vQ;
        }
        if (count($Kt) > 1) {
            goto o1;
        }
        goto CU;
        vQ:
        $pg = $_POST["\x52\145\x6c\x61\x79\x53\164\x61\x74\x65"];
        if ($pg == "\164\145\163\x74\x56\x61\154\x69\x64\141\164\x65" or $pg == "\x74\x65\163\164\x4e\x65\167\x43\145\162\164\x69\146\151\x63\141\x74\145") {
            goto vk;
        }
        wp_die("\127\x65\x20\143\x6f\165\154\x64\x20\156\x6f\x74\x20\163\151\x67\156\40\x79\157\165\40\x69\x6e\56\40\x50\154\145\x61\x73\145\x20\x63\x6f\156\164\x61\x63\x74\40\171\157\x75\162\x20\141\144\x6d\x69\x6e\151\163\x74\x72\x61\x74\x6f\162");
        goto Uw;
        vk:
        echo "\x3c\x64\x69\x76\x20\x73\164\171\x6c\x65\75\42\x66\157\156\x74\x2d\x66\141\155\151\154\171\72\103\141\x6c\151\x62\162\151\73\x70\141\x64\x64\x69\x6e\x67\x3a\60\40\x33\45\x3b\x22\76";
        echo "\x3c\x64\x69\x76\40\163\164\171\154\145\x3d\42\143\x6f\x6c\157\x72\x3a\x20\x23\141\71\64\x34\64\x32\x3b\142\x61\x63\153\147\162\x6f\165\x6e\x64\x2d\x63\x6f\154\x6f\162\72\x20\x23\146\62\144\145\144\145\x3b\160\141\144\x64\x69\156\147\72\x20\x31\x35\x70\x78\x3b\x6d\x61\162\147\x69\x6e\x2d\142\x6f\164\164\157\155\72\40\x32\60\x70\170\x3b\164\x65\x78\164\x2d\x61\x6c\x69\x67\x6e\72\143\x65\156\164\x65\162\x3b\x62\157\162\x64\x65\162\72\x31\160\x78\x20\163\x6f\x6c\151\x64\40\x23\105\66\102\63\102\x32\x3b\x66\157\x6e\x74\x2d\163\151\x7a\x65\72\61\70\x70\x74\73\42\x3e\40\105\x52\x52\x4f\122\x3c\57\144\x69\166\76\15\xa\40\40\40\x20\x20\x20\x20\x20\x20\x20\40\74\x64\x69\166\x20\163\164\171\154\x65\75\x22\x63\157\x6c\157\x72\x3a\40\x23\x61\x39\64\64\x34\x32\x3b\x66\x6f\156\164\55\x73\151\172\145\x3a\61\x34\160\164\x3b\40\155\141\162\147\x69\x6e\x2d\x62\157\164\x74\157\x6d\72\62\x30\160\x78\x3b\42\x3e\x3c\160\76\74\x73\x74\x72\157\x6e\x67\76\x45\x72\162\x6f\x72\x3a\x20\74\x2f\x73\x74\162\x6f\156\x67\x3e\115\151\x73\x73\151\156\147\40\40\x4e\141\x6d\145\x49\104\x20\157\x72\40\x45\156\143\162\x79\160\164\145\144\111\x44\x20\151\x6e\40\123\101\x4d\114\40\122\145\163\160\157\156\163\x65\x2e\74\57\x70\76\xd\xa\40\x20\40\x20\x20\40\x20\40\x20\40\40\40\40\40\40\x20\74\x70\x3e\120\154\x65\141\163\145\x20\143\x6f\x6e\164\x61\x63\164\x20\171\157\x75\162\40\x61\x64\x6d\x69\x6e\x69\x73\164\162\x61\164\157\x72\40\x61\x6e\x64\x20\162\x65\160\x6f\162\164\x20\164\x68\x65\x20\146\157\154\154\x6f\x77\x69\156\147\40\x65\162\x72\157\x72\x3a\74\x2f\x70\x3e\15\12\x20\x20\40\x20\40\x20\x20\x20\x20\40\40\40\x20\40\40\40\x3c\160\x3e\74\163\164\x72\x6f\x6e\x67\76\120\x6f\x73\163\x69\142\x6c\145\x20\x43\x61\165\163\x65\72\74\x2f\x73\x74\162\x6f\156\147\x3e\40\116\x61\x6d\145\x49\x44\x20\156\157\164\x20\146\x6f\x75\156\x64\40\151\156\x20\123\101\x4d\x4c\40\122\x65\163\x70\157\x6e\x73\145\40\x73\165\142\152\x65\x63\x74\56\x3c\x2f\x70\76\15\12\x20\40\x20\x20\x20\x20\40\x20\x20\x20\40\x20\x20\40\40\40\74\x2f\x64\151\166\76\xd\12\x20\x20\x20\40\x20\x20\x20\40\40\x20\40\x20\40\x20\x20\40\x3c\144\x69\166\40\163\x74\x79\154\x65\75\x22\155\x61\162\147\x69\x6e\72\x33\45\73\x64\x69\x73\160\x6c\141\x79\72\x62\154\x6f\x63\153\73\164\x65\x78\x74\x2d\141\154\x69\x67\156\72\x63\145\x6e\x74\145\x72\x3b\42\x3e\15\xa\x20\40\40\x20\40\x20\x20\40\40\x20\x20\40\x20\x20\40\40\x3c\x64\151\x76\x20\163\164\x79\x6c\x65\x3d\x22\x6d\141\162\x67\151\156\x3a\x33\x25\x3b\x64\151\x73\160\x6c\x61\x79\x3a\x62\154\157\143\x6b\x3b\x74\145\x78\164\55\141\154\151\147\x6e\72\143\x65\156\164\x65\x72\73\42\76\x3c\x69\156\160\x75\x74\x20\163\164\171\x6c\145\75\x22\x70\141\x64\144\151\156\147\x3a\x31\x25\73\x77\151\144\164\150\72\x31\x30\60\160\170\x3b\142\x61\x63\153\x67\x72\157\x75\156\x64\72\x20\43\60\60\71\x31\x43\104\40\156\x6f\156\145\x20\162\145\160\x65\x61\x74\x20\x73\143\162\157\x6c\154\40\x30\x25\40\x30\45\x3b\x63\165\x72\163\x6f\162\x3a\40\160\157\151\156\164\145\x72\73\x66\157\156\164\55\163\x69\172\x65\x3a\61\x35\x70\x78\x3b\x62\157\x72\x64\145\x72\x2d\167\x69\144\164\150\72\40\x31\160\170\x3b\x62\x6f\x72\x64\x65\x72\55\x73\x74\x79\x6c\x65\x3a\40\163\157\x6c\151\144\73\x62\x6f\x72\144\145\x72\55\162\141\144\x69\165\163\72\40\x33\x70\x78\73\167\x68\x69\164\x65\55\x73\x70\x61\x63\x65\72\40\x6e\157\167\162\141\x70\73\142\x6f\x78\x2d\163\x69\x7a\x69\156\x67\72\x20\x62\157\x72\144\x65\x72\55\142\157\170\73\x62\x6f\x72\144\x65\x72\55\x63\157\x6c\x6f\x72\72\40\x23\60\x30\67\x33\101\x41\73\x62\157\x78\55\163\x68\141\144\x6f\x77\72\40\x30\160\x78\40\61\160\170\x20\60\x70\x78\x20\x72\x67\x62\x61\x28\61\62\x30\54\40\x32\60\60\54\40\x32\x33\x30\x2c\40\60\x2e\x36\x29\x20\x69\x6e\x73\145\x74\x3b\143\x6f\x6c\157\162\72\40\x23\106\x46\x46\73\x22\164\x79\x70\x65\x3d\42\142\x75\x74\x74\157\x6e\x22\x20\166\x61\x6c\x75\x65\75\x22\104\157\x6e\x65\42\40\157\156\x43\154\x69\143\x6b\x3d\42\x73\145\154\146\x2e\x63\154\157\x73\x65\x28\x29\73\42\76\x3c\57\144\151\x76\76";
        die;
        Uw:
        goto CU;
        o1:
        throw new Exception("\x4d\157\162\145\40\164\150\x61\156\40\x6f\156\145\x20\x3c\x73\141\x6d\x6c\x3a\116\x61\155\145\111\x44\x3e\40\x6f\162\40\74\x73\141\155\154\72\105\x6e\x63\x72\x79\x70\x74\x65\x64\x44\x3e\x20\x69\156\40\74\163\141\155\x6c\72\x53\x75\x62\152\x65\143\164\76\x2e");
        CU:
        $Kt = $Kt[0];
        if ($Kt->localName === "\x45\x6e\143\x72\x79\x70\x74\145\144\104\141\164\141") {
            goto f6;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($Kt);
        goto ay;
        f6:
        $this->encryptedNameId = $Kt;
        ay:
    }
    private function parseConditions(DOMElement $aX)
    {
        $AW = SAMLSPUtilities::xpQuery($aX, "\x2e\x2f\x73\141\155\154\x5f\141\x73\163\145\162\x74\x69\157\156\x3a\103\157\156\144\x69\164\151\x6f\x6e\x73");
        if (empty($AW)) {
            goto Vp;
        }
        if (count($AW) > 1) {
            goto qg;
        }
        goto JR;
        Vp:
        return;
        goto JR;
        qg:
        throw new Exception("\115\157\162\x65\40\164\150\141\156\40\157\x6e\x65\40\74\x73\x61\x6d\x6c\x3a\103\157\156\x64\151\x74\151\x6f\x6e\x73\x3e\x20\x69\156\40\x3c\163\141\155\x6c\x3a\x41\163\x73\x65\162\164\151\157\x6e\x3e\x2e");
        JR:
        $AW = $AW[0];
        if (!$AW->hasAttribute("\x4e\x6f\164\x42\x65\x66\157\162\x65")) {
            goto D2;
        }
        $X2 = SAMLSPUtilities::xsDateTimeToTimestamp($AW->getAttribute("\x4e\x6f\x74\102\145\146\157\162\145"));
        if (!($this->notBefore === NULL || $this->notBefore < $X2)) {
            goto r6;
        }
        $this->notBefore = $X2;
        r6:
        D2:
        if (!$AW->hasAttribute("\116\x6f\x74\x4f\156\117\x72\101\146\x74\x65\x72")) {
            goto HT;
        }
        $BL = SAMLSPUtilities::xsDateTimeToTimestamp($AW->getAttribute("\x4e\157\164\x4f\156\117\x72\101\x66\164\x65\162"));
        if (!($this->notOnOrAfter === NULL || $this->notOnOrAfter > $BL)) {
            goto SG;
        }
        $this->notOnOrAfter = $BL;
        SG:
        HT:
        $e3 = $AW->firstChild;
        XQ:
        if (!($e3 !== NULL)) {
            goto Ob;
        }
        if (!$e3 instanceof DOMText) {
            goto un;
        }
        goto Ba;
        un:
        if (!($e3->namespaceURI !== "\x75\x72\x6e\72\157\141\x73\x69\x73\x3a\156\x61\x6d\145\x73\x3a\x74\x63\x3a\x53\x41\x4d\114\72\x32\56\x30\x3a\x61\x73\x73\145\x72\x74\151\x6f\x6e")) {
            goto oO;
        }
        throw new Exception("\125\x6e\x6b\156\157\x77\156\40\156\141\x6d\145\163\x70\141\143\x65\40\157\146\x20\143\157\x6e\x64\x69\x74\151\157\x6e\72\40" . var_export($e3->namespaceURI, TRUE));
        oO:
        switch ($e3->localName) {
            case "\101\165\x64\x69\x65\156\x63\x65\x52\x65\163\x74\x72\151\143\164\x69\157\x6e":
                $OF = SAMLSPUtilities::extractStrings($e3, "\x75\162\x6e\72\x6f\x61\x73\151\163\x3a\x6e\141\155\145\x73\x3a\164\x63\x3a\x53\101\x4d\114\72\x32\56\60\72\x61\163\163\145\162\x74\x69\157\x6e", "\x41\165\144\151\x65\156\x63\x65");
                if ($this->validAudiences === NULL) {
                    goto KX;
                }
                $this->validAudiences = array_intersect($this->validAudiences, $OF);
                goto OG;
                KX:
                $this->validAudiences = $OF;
                OG:
                goto aS1;
            case "\x4f\156\x65\x54\x69\x6d\145\x55\x73\x65":
                goto aS1;
            case "\120\x72\x6f\x78\171\122\145\x73\x74\162\x69\x63\x74\151\157\x6e":
                goto aS1;
            default:
                throw new Exception("\x55\156\153\156\x6f\167\156\40\143\157\156\144\151\x74\151\x6f\156\x3a\x20" . var_export($e3->localName, TRUE));
        }
        ey:
        aS1:
        Ba:
        $e3 = $e3->nextSibling;
        goto XQ;
        Ob:
    }
    private function parseAuthnStatement(DOMElement $aX)
    {
        $j_ = SAMLSPUtilities::xpQuery($aX, "\56\x2f\x73\141\x6d\x6c\137\x61\163\163\145\x72\x74\151\157\156\x3a\x41\165\164\150\156\123\164\141\164\x65\x6d\x65\x6e\164");
        if (empty($j_)) {
            goto qY;
        }
        if (count($j_) > 1) {
            goto Zr;
        }
        goto TK;
        qY:
        $this->authnInstant = NULL;
        return;
        goto TK;
        Zr:
        throw new Exception("\115\157\162\x65\40\x74\150\141\164\x20\157\156\x65\x20\74\x73\141\x6d\154\x3a\x41\165\x74\x68\156\123\x74\141\x74\145\155\x65\x6e\x74\x3e\40\x69\x6e\x20\74\163\141\155\154\72\x41\163\x73\145\162\x74\151\x6f\156\x3e\x20\156\x6f\164\x20\163\165\x70\160\x6f\162\164\x65\x64\56");
        TK:
        $RX = $j_[0];
        if ($RX->hasAttribute("\x41\x75\x74\150\x6e\111\x6e\163\x74\141\156\164")) {
            goto oy;
        }
        throw new Exception("\115\x69\163\163\x69\x6e\x67\x20\x72\x65\161\x75\151\x72\145\144\x20\101\165\164\x68\x6e\111\156\x73\164\x61\x6e\x74\40\141\x74\164\x72\151\142\165\164\145\x20\157\x6e\x20\x3c\x73\x61\155\154\x3a\101\165\164\x68\x6e\x53\x74\141\x74\145\x6d\145\156\x74\x3e\56");
        oy:
        $this->authnInstant = SAMLSPUtilities::xsDateTimeToTimestamp($RX->getAttribute("\101\165\164\150\156\111\x6e\163\x74\x61\x6e\x74"));
        if (!$RX->hasAttribute("\123\x65\163\163\x69\x6f\156\116\157\164\117\x6e\117\x72\101\x66\164\x65\162")) {
            goto ir;
        }
        $this->sessionNotOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($RX->getAttribute("\123\x65\x73\163\151\x6f\x6e\116\x6f\164\x4f\x6e\x4f\162\x41\x66\164\145\x72"));
        ir:
        if (!$RX->hasAttribute("\123\x65\163\163\151\157\x6e\x49\156\x64\145\x78")) {
            goto qw;
        }
        $this->sessionIndex = $RX->getAttribute("\x53\145\163\163\x69\x6f\x6e\111\x6e\x64\x65\170");
        qw:
        $this->parseAuthnContext($RX);
    }
    private function parseAuthnContext(DOMElement $wf)
    {
        $Gw = SAMLSPUtilities::xpQuery($wf, "\56\57\163\141\155\x6c\x5f\141\163\163\x65\162\164\151\157\156\72\101\165\x74\x68\x6e\103\157\156\x74\145\x78\164");
        if (count($Gw) > 1) {
            goto mu;
        }
        if (empty($Gw)) {
            goto Sf;
        }
        goto c4;
        mu:
        throw new Exception("\115\157\162\x65\40\x74\x68\x61\x6e\40\x6f\156\x65\40\x3c\163\141\155\154\x3a\101\165\164\x68\x6e\x43\157\156\x74\145\170\x74\76\40\151\156\x20\x3c\x73\141\x6d\x6c\72\101\165\164\150\x6e\x53\164\141\x74\145\x6d\145\x6e\x74\76\56");
        goto c4;
        Sf:
        throw new Exception("\x4d\x69\163\163\x69\x6e\x67\x20\162\145\x71\165\x69\162\145\x64\40\x3c\x73\141\155\154\72\x41\165\x74\x68\x6e\103\x6f\156\x74\145\170\x74\x3e\40\x69\x6e\40\74\163\141\x6d\154\x3a\x41\x75\x74\150\x6e\123\164\141\164\145\155\145\156\x74\x3e\x2e");
        c4:
        $Wm = $Gw[0];
        $Vf = SAMLSPUtilities::xpQuery($Wm, "\x2e\57\x73\141\x6d\x6c\x5f\x61\163\x73\145\x72\164\x69\x6f\156\x3a\x41\165\x74\150\156\x43\157\156\x74\145\170\164\x44\145\x63\154\122\x65\146");
        if (count($Vf) > 1) {
            goto KQ;
        }
        if (count($Vf) === 1) {
            goto W9;
        }
        goto z2;
        KQ:
        throw new Exception("\x4d\x6f\162\145\40\x74\150\141\x6e\x20\157\156\x65\40\x3c\163\x61\155\154\72\101\x75\164\150\x6e\x43\157\x6e\x74\145\x78\x74\x44\x65\143\x6c\x52\x65\146\x3e\40\x66\157\x75\156\144\x3f");
        goto z2;
        W9:
        $this->setAuthnContextDeclRef(trim($Vf[0]->textContent));
        z2:
        $SD = SAMLSPUtilities::xpQuery($Wm, "\56\57\163\141\155\x6c\137\141\163\163\145\162\x74\x69\157\x6e\72\x41\165\x74\150\x6e\x43\x6f\x6e\x74\145\x78\164\x44\145\x63\154");
        if (count($SD) > 1) {
            goto uv;
        }
        if (count($SD) === 1) {
            goto NS;
        }
        goto Ub;
        uv:
        throw new Exception("\115\x6f\162\145\x20\x74\x68\141\x6e\x20\157\x6e\x65\x20\x3c\x73\x61\x6d\154\72\x41\165\x74\150\x6e\x43\x6f\156\164\145\170\164\104\145\x63\x6c\x3e\x20\146\157\165\156\x64\77");
        goto Ub;
        NS:
        $this->setAuthnContextDecl(new SAML2_XML_Chunk($SD[0]));
        Ub:
        $hX = SAMLSPUtilities::xpQuery($Wm, "\56\x2f\163\x61\x6d\154\137\141\163\163\x65\x72\164\151\x6f\x6e\72\x41\165\164\150\x6e\x43\157\x6e\164\145\x78\164\x43\x6c\x61\x73\163\x52\x65\x66");
        if (count($hX) > 1) {
            goto uJ;
        }
        if (count($hX) === 1) {
            goto pE;
        }
        goto qo;
        uJ:
        throw new Exception("\115\157\x72\x65\40\x74\150\141\156\40\x6f\x6e\145\x20\74\163\x61\x6d\x6c\72\101\165\164\x68\156\x43\x6f\156\x74\x65\x78\164\103\154\x61\163\163\122\145\146\76\x20\x69\156\x20\74\163\141\155\x6c\72\x41\165\x74\150\156\x43\157\156\164\145\170\164\x3e\x2e");
        goto qo;
        pE:
        $this->setAuthnContextClassRef(trim($hX[0]->textContent));
        qo:
        if (!(empty($this->authnContextClassRef) && empty($this->authnContextDecl) && empty($this->authnContextDeclRef))) {
            goto x_;
        }
        throw new Exception("\x4d\151\x73\163\151\156\x67\x20\x65\x69\164\150\145\162\x20\x3c\163\141\155\x6c\x3a\101\x75\164\x68\x6e\x43\x6f\x6e\164\145\170\164\x43\154\141\x73\x73\122\x65\x66\x3e\x20\x6f\162\x20\74\x73\141\x6d\154\72\101\x75\164\x68\x6e\103\157\x6e\x74\x65\170\x74\104\145\x63\x6c\122\145\146\x3e\40\157\x72\x20\x3c\163\141\155\x6c\72\101\x75\x74\x68\x6e\x43\157\x6e\164\x65\x78\x74\104\145\x63\154\76");
        x_:
        $this->AuthenticatingAuthority = SAMLSPUtilities::extractStrings($Wm, "\x75\162\156\72\x6f\x61\x73\151\163\72\156\x61\x6d\x65\163\x3a\x74\x63\x3a\x53\101\115\114\x3a\62\x2e\x30\x3a\141\163\x73\145\x72\x74\x69\157\156", "\x41\165\164\x68\x65\156\164\x69\x63\x61\x74\151\156\x67\101\x75\164\x68\x6f\x72\x69\x74\171");
    }
    private function parseAttributes(DOMElement $aX)
    {
        $MB = TRUE;
        $ai = SAMLSPUtilities::xpQuery($aX, "\x2e\57\x73\141\x6d\x6c\x5f\141\x73\x73\x65\x72\x74\x69\157\156\x3a\x41\164\x74\162\x69\142\x75\x74\x65\x53\x74\141\164\x65\155\x65\x6e\x74\57\163\141\155\x6c\137\x61\x73\x73\x65\162\x74\151\x6f\156\x3a\101\x74\164\162\151\x62\x75\x74\145");
        foreach ($ai as $a4) {
            if ($a4->hasAttribute("\116\x61\x6d\x65")) {
                goto ku;
            }
            throw new Exception("\115\x69\163\163\x69\156\x67\40\156\x61\155\145\40\157\x6e\x20\x3c\x73\141\x6d\154\72\101\164\x74\x72\151\x62\165\164\145\76\40\145\154\145\x6d\x65\x6e\x74\56");
            ku:
            $ly = $a4->getAttribute("\116\141\x6d\x65");
            if ($a4->hasAttribute("\x4e\141\x6d\x65\106\x6f\x72\155\x61\164")) {
                goto xz;
            }
            $il = "\x75\162\x6e\x3a\x6f\141\163\x69\x73\72\156\x61\155\x65\163\x3a\164\143\x3a\x53\x41\x4d\x4c\x3a\x31\x2e\61\x3a\156\141\155\145\x69\144\x2d\x66\157\162\155\141\x74\x3a\x75\156\163\x70\x65\x63\x69\146\151\x65\x64";
            goto nC;
            xz:
            $il = $a4->getAttribute("\x4e\141\155\x65\106\x6f\x72\x6d\x61\x74");
            nC:
            if ($MB) {
                goto Hz;
            }
            if (!($this->nameFormat !== $il)) {
                goto OP;
            }
            $this->nameFormat = "\x75\162\156\72\157\141\163\151\x73\72\156\x61\155\145\x73\x3a\164\x63\x3a\x53\101\115\114\72\x31\56\x31\72\156\x61\155\145\x69\144\55\146\157\x72\155\x61\164\72\165\156\x73\x70\145\x63\151\x66\x69\145\x64";
            OP:
            goto jJ;
            Hz:
            $this->nameFormat = $il;
            $MB = FALSE;
            jJ:
            if (array_key_exists($ly, $this->attributes)) {
                goto ek;
            }
            $this->attributes[$ly] = array();
            ek:
            $XV = SAMLSPUtilities::xpQuery($a4, "\56\x2f\x73\141\x6d\154\x5f\141\163\163\x65\x72\x74\151\157\x6e\72\x41\164\164\162\x69\x62\x75\164\145\126\141\x6c\x75\x65");
            foreach ($XV as $DE) {
                $this->attributes[$ly][] = trim($DE->textContent);
                tj:
            }
            g7:
            dG:
        }
        yT:
    }
    private function parseEncryptedAttributes(DOMElement $aX)
    {
        $this->encryptedAttribute = SAMLSPUtilities::xpQuery($aX, "\x2e\57\x73\141\155\x6c\x5f\141\x73\163\145\x72\164\151\157\x6e\x3a\x41\x74\164\162\x69\x62\165\164\145\123\x74\x61\x74\145\x6d\145\x6e\164\57\163\141\155\154\x5f\x61\x73\163\x65\x72\164\x69\x6f\156\x3a\105\156\143\162\x79\160\x74\145\x64\x41\164\164\162\151\x62\165\x74\145");
    }
    private function parseSignature(DOMElement $aX)
    {
        $lf = SAMLSPUtilities::validateElement($aX);
        if (!($lf !== FALSE)) {
            goto Cj;
        }
        $this->wasSignedAtConstruction = TRUE;
        $this->certificates = $lf["\x43\145\x72\x74\151\x66\151\x63\x61\164\145\163"];
        $this->signatureData = $lf;
        Cj:
    }
    public function validate(XMLSecurityKey $ES)
    {
        if (!($this->signatureData === NULL)) {
            goto d8;
        }
        return FALSE;
        d8:
        SAMLSPUtilities::validateSignature($this->signatureData, $ES);
        return TRUE;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($uc)
    {
        $this->id = $uc;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($Rk)
    {
        $this->issueInstant = $Rk;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($Vs)
    {
        $this->issuer = $Vs;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto C1;
        }
        throw new Exception("\101\164\x74\145\x6d\160\164\x65\144\40\164\157\x20\162\x65\164\x72\151\x65\166\145\x20\145\x6e\143\x72\171\160\164\145\x64\x20\116\141\155\145\x49\104\x20\x77\x69\x74\150\157\x75\164\x20\144\145\x63\162\x79\160\x74\151\156\147\40\x69\x74\40\x66\151\x72\163\164\x2e");
        C1:
        return $this->nameId;
    }
    public function setNameId($Kt)
    {
        $this->nameId = $Kt;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto RC;
        }
        return TRUE;
        RC:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $ES)
    {
        $R0 = new DOMDocument();
        $z6 = $R0->createElement("\x72\x6f\157\x74");
        $R0->appendChild($z6);
        SAMLSPUtilities::addNameId($z6, $this->nameId);
        $Kt = $z6->firstChild;
        SAMLSPUtilities::getContainer()->debugMessage($Kt, "\145\156\x63\162\x79\x70\x74");
        $e0 = new XMLSecEnc();
        $e0->setNode($Kt);
        $e0->type = XMLSecEnc::Element;
        $L0 = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $L0->generateSessionKey();
        $e0->encryptKey($ES, $L0);
        $this->encryptedNameId = $e0->encryptNode($L0);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $ES, array $Bn = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto za;
        }
        return;
        za:
        $Kt = SAMLSPUtilities::decryptElement($this->encryptedNameId, $ES, $Bn);
        SAMLSPUtilities::getContainer()->debugMessage($Kt, "\144\145\143\162\171\160\x74");
        $this->nameId = SAMLSPUtilities::parseNameId($Kt);
        $this->encryptedNameId = NULL;
    }
    public function decryptAttributes(XMLSecurityKey $ES, array $Bn = array())
    {
        if (!($this->encryptedAttribute === NULL)) {
            goto XM;
        }
        return;
        XM:
        $MB = TRUE;
        $ai = $this->encryptedAttribute;
        foreach ($ai as $TB) {
            $a4 = SAMLSPUtilities::decryptElement($TB->getElementsByTagName("\x45\x6e\x63\162\x79\160\x74\x65\144\x44\141\x74\x61")->item(0), $ES, $Bn);
            if ($a4->hasAttribute("\x4e\x61\155\145")) {
                goto ap;
            }
            throw new Exception("\x4d\x69\163\x73\151\156\x67\40\x6e\141\x6d\x65\40\157\156\40\x3c\x73\141\x6d\x6c\72\101\x74\x74\162\x69\x62\165\164\x65\76\40\145\154\145\155\x65\x6e\x74\x2e");
            ap:
            $ly = $a4->getAttribute("\x4e\x61\155\x65");
            if ($a4->hasAttribute("\x4e\141\x6d\x65\106\157\162\155\141\x74")) {
                goto Re;
            }
            $il = "\x75\162\x6e\x3a\x6f\141\x73\x69\x73\72\x6e\x61\x6d\145\163\72\x74\x63\72\x53\101\x4d\x4c\72\62\56\x30\72\x61\164\x74\x72\x6e\141\155\x65\x2d\x66\157\x72\x6d\141\164\72\x75\156\163\160\145\x63\x69\146\x69\145\x64";
            goto vr;
            Re:
            $il = $a4->getAttribute("\116\x61\x6d\x65\x46\157\162\x6d\141\x74");
            vr:
            if ($MB) {
                goto lu;
            }
            if (!($this->nameFormat !== $il)) {
                goto Cq;
            }
            $this->nameFormat = "\x75\x72\156\x3a\x6f\x61\x73\x69\x73\x3a\156\x61\x6d\x65\163\x3a\164\x63\72\x53\x41\x4d\114\72\62\56\x30\72\x61\x74\x74\x72\x6e\x61\155\x65\x2d\x66\157\162\x6d\x61\164\72\x75\156\x73\x70\145\x63\x69\x66\151\x65\144";
            Cq:
            goto z4;
            lu:
            $this->nameFormat = $il;
            $MB = FALSE;
            z4:
            if (array_key_exists($ly, $this->attributes)) {
                goto NZ;
            }
            $this->attributes[$ly] = array();
            NZ:
            $XV = SAMLSPUtilities::xpQuery($a4, "\x2e\57\163\x61\155\x6c\137\x61\x73\163\x65\x72\164\151\x6f\156\72\101\x74\164\162\151\x62\x75\164\145\126\141\x6c\165\145");
            foreach ($XV as $DE) {
                $this->attributes[$ly][] = trim($DE->textContent);
                PF:
            }
            PU:
            sI:
        }
        te:
    }
    public function getNotBefore()
    {
        return $this->notBefore;
    }
    public function setNotBefore($X2)
    {
        $this->notBefore = $X2;
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($BL)
    {
        $this->notOnOrAfter = $BL;
    }
    public function setEncryptedAttributes($Im)
    {
        $this->requiredEncAttributes = $Im;
    }
    public function getValidAudiences()
    {
        return $this->validAudiences;
    }
    public function setValidAudiences(array $U_ = NULL)
    {
        $this->validAudiences = $U_;
    }
    public function getAuthnInstant()
    {
        return $this->authnInstant;
    }
    public function setAuthnInstant($jS)
    {
        $this->authnInstant = $jS;
    }
    public function getSessionNotOnOrAfter()
    {
        return $this->sessionNotOnOrAfter;
    }
    public function setSessionNotOnOrAfter($wC)
    {
        $this->sessionNotOnOrAfter = $wC;
    }
    public function getSessionIndex()
    {
        return $this->sessionIndex;
    }
    public function setSessionIndex($jO)
    {
        $this->sessionIndex = $jO;
    }
    public function getAuthnContext()
    {
        if (empty($this->authnContextClassRef)) {
            goto xe;
        }
        return $this->authnContextClassRef;
        xe:
        if (empty($this->authnContextDeclRef)) {
            goto BR;
        }
        return $this->authnContextDeclRef;
        BR:
        return NULL;
    }
    public function setAuthnContext($RQ)
    {
        $this->setAuthnContextClassRef($RQ);
    }
    public function getAuthnContextClassRef()
    {
        return $this->authnContextClassRef;
    }
    public function setAuthnContextClassRef($w4)
    {
        $this->authnContextClassRef = $w4;
    }
    public function setAuthnContextDecl(SAML2_XML_Chunk $Ac)
    {
        if (empty($this->authnContextDeclRef)) {
            goto YV;
        }
        throw new Exception("\x41\x75\x74\150\x6e\x43\157\156\164\x65\170\164\104\145\143\154\122\145\x66\x20\x69\x73\40\141\154\x72\x65\x61\x64\x79\40\162\x65\x67\x69\163\x74\145\x72\145\x64\x21\40\x4d\141\171\x20\x6f\156\x6c\x79\40\x68\141\166\x65\x20\145\x69\164\x68\145\162\x20\141\40\104\x65\143\154\40\157\x72\40\141\x20\104\x65\x63\154\122\145\x66\54\x20\x6e\157\x74\40\142\x6f\x74\x68\x21");
        YV:
        $this->authnContextDecl = $Ac;
    }
    public function getAuthnContextDecl()
    {
        return $this->authnContextDecl;
    }
    public function setAuthnContextDeclRef($lF)
    {
        if (empty($this->authnContextDecl)) {
            goto ex;
        }
        throw new Exception("\101\x75\164\150\156\103\x6f\156\x74\145\170\x74\x44\x65\x63\154\40\151\163\40\x61\x6c\162\x65\141\x64\171\x20\162\145\147\151\163\164\x65\162\145\144\41\40\x4d\x61\x79\40\157\x6e\x6c\x79\x20\x68\141\166\x65\x20\x65\151\x74\150\145\x72\x20\x61\x20\x44\145\143\154\x20\157\162\x20\x61\x20\x44\145\143\x6c\x52\x65\146\x2c\x20\156\157\x74\40\x62\157\164\x68\41");
        ex:
        $this->authnContextDeclRef = $lF;
    }
    public function getAuthnContextDeclRef()
    {
        return $this->authnContextDeclRef;
    }
    public function getAuthenticatingAuthority()
    {
        return $this->AuthenticatingAuthority;
    }
    public function setAuthenticatingAuthority($jI)
    {
        $this->AuthenticatingAuthority = $jI;
    }
    public function getAttributes()
    {
        return $this->attributes;
    }
    public function setAttributes(array $ai)
    {
        $this->attributes = $ai;
    }
    public function getAttributeNameFormat()
    {
        return $this->nameFormat;
    }
    public function setAttributeNameFormat($il)
    {
        $this->nameFormat = $il;
    }
    public function getSubjectConfirmation()
    {
        return $this->SubjectConfirmation;
    }
    public function setSubjectConfirmation(array $px)
    {
        $this->SubjectConfirmation = $px;
    }
    public function getSignatureKey()
    {
        return $this->signatureKey;
    }
    public function setSignatureKey(XMLsecurityKey $l0 = NULL)
    {
        $this->signatureKey = $l0;
    }
    public function getEncryptionKey()
    {
        return $this->encryptionKey;
    }
    public function setEncryptionKey(XMLSecurityKey $Ql = NULL)
    {
        $this->encryptionKey = $Ql;
    }
    public function setCertificates(array $AQ)
    {
        $this->certificates = $AQ;
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
    public function toXML(DOMNode $Yg = NULL)
    {
        if ($Yg === NULL) {
            goto Ci;
        }
        $qW = $Yg->ownerDocument;
        goto tO;
        Ci:
        $qW = new DOMDocument();
        $Yg = $qW;
        tO:
        $z6 = $qW->createElementNS("\165\x72\x6e\x3a\x6f\141\x73\151\163\72\156\141\155\x65\163\72\x74\143\x3a\x53\x41\115\x4c\x3a\x32\56\x30\72\141\163\163\x65\x72\164\151\x6f\x6e", "\163\x61\x6d\154\x3a" . "\101\x73\163\145\x72\x74\151\157\x6e");
        $Yg->appendChild($z6);
        $z6->setAttributeNS("\x75\x72\156\72\x6f\x61\163\151\163\72\x6e\x61\x6d\145\163\72\164\x63\72\x53\x41\x4d\x4c\x3a\62\56\60\x3a\160\162\x6f\x74\157\x63\x6f\154", "\163\x61\x6d\x6c\x70\x3a\164\x6d\x70", "\x74\x6d\x70");
        $z6->removeAttributeNS("\x75\162\156\x3a\x6f\x61\163\151\163\72\156\x61\155\x65\x73\72\x74\143\72\123\x41\115\x4c\72\62\x2e\60\72\160\162\x6f\x74\x6f\x63\157\154", "\164\x6d\x70");
        $z6->setAttributeNS("\150\164\164\160\x3a\57\x2f\167\167\167\56\167\63\56\x6f\x72\x67\x2f\62\60\60\61\x2f\130\x4d\x4c\x53\x63\150\x65\155\x61\x2d\151\156\163\164\141\x6e\x63\x65", "\x78\x73\151\72\x74\155\x70", "\x74\155\160");
        $z6->removeAttributeNS("\x68\164\164\x70\72\x2f\x2f\167\167\167\56\167\x33\x2e\x6f\x72\147\x2f\62\x30\x30\x31\57\130\115\114\123\143\x68\x65\x6d\141\x2d\151\x6e\163\164\x61\x6e\143\145", "\x74\x6d\160");
        $z6->setAttributeNS("\x68\164\164\160\x3a\x2f\x2f\167\x77\x77\x2e\167\63\x2e\157\x72\147\x2f\62\60\x30\x31\57\x58\x4d\x4c\123\x63\x68\x65\x6d\141", "\170\163\72\x74\155\x70", "\x74\155\160");
        $z6->removeAttributeNS("\x68\x74\164\160\72\x2f\x2f\x77\167\167\x2e\167\63\56\x6f\x72\147\57\62\60\60\x31\57\130\115\114\x53\143\150\x65\x6d\x61", "\x74\155\x70");
        $z6->setAttribute("\x49\x44", $this->id);
        $z6->setAttribute("\x56\145\162\163\x69\x6f\x6e", "\x32\x2e\x30");
        $z6->setAttribute("\x49\163\x73\x75\145\x49\x6e\x73\x74\x61\156\x74", gmdate("\x59\55\155\x2d\144\x5c\x54\x48\72\x69\72\x73\134\x5a", $this->issueInstant));
        $Vs = SAMLSPUtilities::addString($z6, "\x75\162\x6e\x3a\x6f\x61\x73\x69\x73\72\x6e\x61\x6d\x65\163\72\164\143\x3a\123\101\115\114\72\62\56\x30\72\141\x73\163\145\x72\x74\151\157\x6e", "\x73\141\x6d\154\72\111\163\x73\x75\x65\162", $this->issuer);
        $this->addSubject($z6);
        $this->addConditions($z6);
        $this->addAuthnStatement($z6);
        if ($this->requiredEncAttributes == FALSE) {
            goto gw;
        }
        $this->addEncryptedAttributeStatement($z6);
        goto rp;
        gw:
        $this->addAttributeStatement($z6);
        rp:
        if (!($this->signatureKey !== NULL)) {
            goto mN;
        }
        SAMLSPUtilities::insertSignature($this->signatureKey, $this->certificates, $z6, $Vs->nextSibling);
        mN:
        return $z6;
    }
    private function addSubject(DOMElement $z6)
    {
        if (!($this->nameId === NULL && $this->encryptedNameId === NULL)) {
            goto aP;
        }
        return;
        aP:
        $W2 = $z6->ownerDocument->createElementNS("\x75\162\156\72\157\x61\163\x69\163\x3a\156\x61\155\145\x73\72\164\x63\72\123\x41\115\x4c\x3a\62\x2e\x30\72\x61\x73\163\145\162\164\x69\x6f\156", "\163\141\x6d\x6c\72\x53\x75\142\x6a\145\x63\164");
        $z6->appendChild($W2);
        if ($this->encryptedNameId === NULL) {
            goto ri;
        }
        $tK = $W2->ownerDocument->createElementNS("\x75\162\x6e\x3a\157\x61\x73\x69\x73\x3a\156\x61\155\145\x73\x3a\164\143\72\123\x41\x4d\x4c\72\62\56\x30\72\x61\163\163\x65\x72\x74\x69\157\x6e", "\163\141\x6d\154\x3a" . "\x45\156\143\162\x79\x70\164\145\x64\111\104");
        $W2->appendChild($tK);
        $tK->appendChild($W2->ownerDocument->importNode($this->encryptedNameId, TRUE));
        goto ZV;
        ri:
        SAMLSPUtilities::addNameId($W2, $this->nameId);
        ZV:
        foreach ($this->SubjectConfirmation as $U4) {
            $U4->toXML($W2);
            TN:
        }
        Cr:
    }
    private function addConditions(DOMElement $z6)
    {
        $qW = $z6->ownerDocument;
        $AW = $qW->createElementNS("\165\162\156\x3a\157\x61\x73\x69\x73\x3a\x6e\x61\155\145\x73\72\x74\x63\x3a\x53\101\x4d\x4c\72\62\56\60\72\x61\163\163\145\162\164\151\x6f\x6e", "\163\141\x6d\154\x3a\x43\x6f\156\144\x69\x74\x69\157\x6e\x73");
        $z6->appendChild($AW);
        if (!($this->notBefore !== NULL)) {
            goto gU;
        }
        $AW->setAttribute("\x4e\x6f\164\x42\145\x66\157\162\145", gmdate("\x59\55\155\x2d\144\x5c\124\110\72\x69\x3a\x73\134\x5a", $this->notBefore));
        gU:
        if (!($this->notOnOrAfter !== NULL)) {
            goto u7;
        }
        $AW->setAttribute("\116\x6f\164\x4f\x6e\117\x72\101\x66\164\x65\x72", gmdate("\x59\x2d\155\55\x64\134\124\110\72\151\72\163\134\132", $this->notOnOrAfter));
        u7:
        if (!($this->validAudiences !== NULL)) {
            goto Ui;
        }
        $HM = $qW->createElementNS("\x75\x72\x6e\72\157\x61\163\151\163\72\x6e\x61\x6d\x65\163\x3a\x74\x63\x3a\x53\x41\115\114\x3a\62\x2e\60\x3a\x61\163\163\x65\x72\164\151\157\x6e", "\x73\x61\x6d\x6c\x3a\101\x75\144\x69\x65\x6e\x63\x65\x52\145\x73\x74\x72\x69\x63\x74\x69\157\x6e");
        $AW->appendChild($HM);
        SAMLSPUtilities::addStrings($HM, "\x75\162\x6e\72\x6f\141\x73\x69\x73\x3a\156\x61\x6d\x65\163\x3a\164\143\x3a\x53\x41\115\x4c\72\x32\x2e\60\x3a\141\x73\163\145\x72\164\151\157\156", "\163\141\155\154\x3a\x41\165\144\151\x65\x6e\x63\145", FALSE, $this->validAudiences);
        Ui:
    }
    private function addAuthnStatement(DOMElement $z6)
    {
        if (!($this->authnInstant === NULL || $this->authnContextClassRef === NULL && $this->authnContextDecl === NULL && $this->authnContextDeclRef === NULL)) {
            goto kR;
        }
        return;
        kR:
        $qW = $z6->ownerDocument;
        $wf = $qW->createElementNS("\x75\x72\x6e\x3a\157\x61\x73\151\x73\72\x6e\x61\155\145\163\x3a\x74\x63\x3a\x53\x41\115\x4c\x3a\62\x2e\60\x3a\141\x73\x73\145\162\164\151\157\156", "\163\x61\x6d\154\x3a\x41\165\164\150\156\x53\164\x61\x74\145\x6d\x65\156\x74");
        $z6->appendChild($wf);
        $wf->setAttribute("\101\x75\164\x68\x6e\111\x6e\163\164\x61\x6e\x74", gmdate("\x59\55\x6d\55\x64\x5c\124\110\x3a\151\72\x73\134\132", $this->authnInstant));
        if (!($this->sessionNotOnOrAfter !== NULL)) {
            goto Q1;
        }
        $wf->setAttribute("\123\145\x73\163\151\x6f\156\116\x6f\164\117\x6e\x4f\x72\x41\146\x74\145\162", gmdate("\131\x2d\155\x2d\144\x5c\124\110\72\x69\72\x73\134\x5a", $this->sessionNotOnOrAfter));
        Q1:
        if (!($this->sessionIndex !== NULL)) {
            goto uU;
        }
        $wf->setAttribute("\123\145\x73\163\x69\x6f\x6e\x49\156\x64\145\x78", $this->sessionIndex);
        uU:
        $Wm = $qW->createElementNS("\x75\x72\156\x3a\157\x61\x73\151\163\72\x6e\x61\155\x65\163\72\164\143\72\x53\x41\x4d\x4c\72\x32\56\x30\72\x61\163\163\x65\x72\x74\151\x6f\x6e", "\x73\141\x6d\154\x3a\x41\165\x74\150\156\103\157\156\x74\145\x78\164");
        $wf->appendChild($Wm);
        if (empty($this->authnContextClassRef)) {
            goto Nb;
        }
        SAMLSPUtilities::addString($Wm, "\x75\162\x6e\x3a\157\141\163\x69\x73\72\x6e\141\155\145\x73\72\164\143\72\123\101\x4d\114\x3a\x32\56\x30\x3a\x61\163\163\x65\x72\164\151\157\156", "\x73\141\155\154\x3a\101\165\164\x68\156\x43\x6f\x6e\x74\x65\x78\164\x43\154\x61\163\163\122\145\x66", $this->authnContextClassRef);
        Nb:
        if (empty($this->authnContextDecl)) {
            goto c0;
        }
        $this->authnContextDecl->toXML($Wm);
        c0:
        if (empty($this->authnContextDeclRef)) {
            goto NH;
        }
        SAMLSPUtilities::addString($Wm, "\x75\162\x6e\72\x6f\x61\163\x69\163\72\156\141\155\x65\163\x3a\164\143\x3a\123\101\x4d\x4c\72\62\56\60\72\x61\163\x73\x65\162\164\x69\157\x6e", "\x73\141\155\154\72\101\x75\x74\x68\x6e\103\157\x6e\x74\x65\x78\164\x44\145\x63\x6c\x52\145\x66", $this->authnContextDeclRef);
        NH:
        SAMLSPUtilities::addStrings($Wm, "\x75\162\x6e\x3a\157\x61\163\x69\x73\72\156\141\x6d\145\163\x3a\164\x63\x3a\x53\101\x4d\x4c\72\62\x2e\60\72\141\163\x73\145\162\x74\x69\x6f\x6e", "\x73\141\155\154\x3a\101\x75\x74\x68\145\156\164\151\143\141\164\x69\x6e\x67\101\x75\164\x68\157\162\x69\164\x79", FALSE, $this->AuthenticatingAuthority);
    }
    private function addAttributeStatement(DOMElement $z6)
    {
        if (!empty($this->attributes)) {
            goto YP;
        }
        return;
        YP:
        $qW = $z6->ownerDocument;
        $Vo = $qW->createElementNS("\165\162\156\x3a\157\141\163\x69\x73\72\x6e\x61\x6d\x65\163\72\x74\x63\72\x53\101\115\x4c\x3a\62\x2e\x30\72\x61\163\x73\x65\x72\x74\151\157\156", "\x73\141\x6d\154\72\101\x74\164\162\x69\142\165\x74\145\x53\x74\141\x74\x65\155\x65\x6e\164");
        $z6->appendChild($Vo);
        foreach ($this->attributes as $ly => $XV) {
            $a4 = $qW->createElementNS("\165\162\156\72\157\141\163\151\x73\72\156\141\155\x65\x73\72\x74\143\72\x53\x41\115\114\72\62\x2e\60\72\141\163\163\x65\162\164\151\x6f\x6e", "\x73\x61\x6d\x6c\x3a\x41\x74\x74\162\x69\142\x75\164\x65");
            $Vo->appendChild($a4);
            $a4->setAttribute("\116\x61\155\x65", $ly);
            if (!($this->nameFormat !== "\165\x72\156\x3a\157\141\163\151\163\72\156\141\x6d\x65\x73\x3a\164\143\x3a\x53\x41\115\x4c\72\62\x2e\60\72\x61\164\x74\x72\x6e\x61\155\x65\x2d\x66\x6f\162\155\141\x74\72\165\156\x73\x70\x65\x63\x69\x66\151\x65\144")) {
                goto vv;
            }
            $a4->setAttribute("\116\x61\x6d\145\x46\157\x72\155\141\x74", $this->nameFormat);
            vv:
            foreach ($XV as $DE) {
                if (is_string($DE)) {
                    goto YE;
                }
                if (is_int($DE)) {
                    goto x9;
                }
                $VL = NULL;
                goto ck;
                YE:
                $VL = "\x78\163\72\163\164\162\151\156\147";
                goto ck;
                x9:
                $VL = "\x78\163\x3a\151\x6e\x74\x65\x67\x65\162";
                ck:
                $HO = $qW->createElementNS("\165\162\x6e\72\x6f\x61\x73\151\x73\72\x6e\141\x6d\x65\x73\72\164\x63\x3a\123\x41\x4d\114\x3a\x32\x2e\60\x3a\x61\x73\x73\x65\162\164\151\x6f\x6e", "\x73\141\x6d\x6c\72\x41\164\x74\162\x69\142\165\164\145\126\141\154\x75\145");
                $a4->appendChild($HO);
                if (!($VL !== NULL)) {
                    goto iE;
                }
                $HO->setAttributeNS("\x68\x74\164\x70\x3a\x2f\57\x77\x77\x77\56\x77\x33\x2e\x6f\162\x67\x2f\x32\x30\x30\61\x2f\130\115\x4c\x53\x63\150\145\155\x61\55\151\156\x73\164\141\x6e\143\x65", "\170\163\x69\72\x74\x79\x70\x65", $VL);
                iE:
                if (!is_null($DE)) {
                    goto sG;
                }
                $HO->setAttributeNS("\150\164\x74\160\x3a\x2f\x2f\167\167\x77\56\167\63\x2e\157\162\x67\x2f\x32\x30\x30\61\57\x58\x4d\114\123\143\x68\x65\155\x61\x2d\x69\x6e\x73\x74\141\x6e\x63\145", "\170\163\x69\72\x6e\x69\x6c", "\x74\162\165\x65");
                sG:
                if ($DE instanceof DOMNodeList) {
                    goto zU;
                }
                $HO->appendChild($qW->createTextNode($DE));
                goto nx;
                zU:
                $gJ = 0;
                Cp:
                if (!($gJ < $DE->length)) {
                    goto fT;
                }
                $e3 = $qW->importNode($DE->item($gJ), TRUE);
                $HO->appendChild($e3);
                dy:
                $gJ++;
                goto Cp;
                fT:
                nx:
                F4:
            }
            E3:
            Dx:
        }
        ZS:
    }
    private function addEncryptedAttributeStatement(DOMElement $z6)
    {
        if (!($this->requiredEncAttributes == FALSE)) {
            goto JO;
        }
        return;
        JO:
        $qW = $z6->ownerDocument;
        $Vo = $qW->createElementNS("\x75\x72\x6e\x3a\157\141\163\151\x73\x3a\156\141\155\x65\x73\x3a\x74\143\72\123\101\115\114\72\62\x2e\60\x3a\x61\163\163\x65\x72\x74\x69\x6f\156", "\163\x61\155\154\x3a\101\164\x74\162\151\142\x75\164\x65\123\164\x61\x74\x65\155\x65\156\x74");
        $z6->appendChild($Vo);
        foreach ($this->attributes as $ly => $XV) {
            $Kg = new DOMDocument();
            $a4 = $Kg->createElementNS("\x75\x72\x6e\x3a\x6f\x61\163\151\x73\72\x6e\141\155\x65\x73\72\164\143\72\x53\101\x4d\x4c\x3a\x32\56\x30\x3a\x61\163\x73\x65\x72\x74\x69\157\x6e", "\x73\141\155\154\72\101\164\x74\x72\151\142\x75\164\x65");
            $a4->setAttribute("\x4e\141\x6d\x65", $ly);
            $Kg->appendChild($a4);
            if (!($this->nameFormat !== "\x75\162\156\x3a\157\x61\163\x69\x73\72\156\141\x6d\x65\163\x3a\x74\x63\72\x53\101\115\114\x3a\62\56\x30\x3a\x61\164\164\162\156\141\155\x65\x2d\146\157\162\x6d\x61\x74\72\x75\x6e\163\160\145\143\151\146\x69\145\144")) {
                goto Im;
            }
            $a4->setAttribute("\116\x61\x6d\x65\x46\x6f\x72\x6d\x61\164", $this->nameFormat);
            Im:
            foreach ($XV as $DE) {
                if (is_string($DE)) {
                    goto cK;
                }
                if (is_int($DE)) {
                    goto TE;
                }
                $VL = NULL;
                goto Ez;
                cK:
                $VL = "\x78\x73\72\163\164\162\151\x6e\x67";
                goto Ez;
                TE:
                $VL = "\170\x73\72\x69\156\164\145\x67\145\x72";
                Ez:
                $HO = $Kg->createElementNS("\165\162\x6e\x3a\x6f\x61\163\x69\163\72\x6e\141\155\x65\x73\x3a\x74\x63\x3a\123\101\115\x4c\x3a\x32\56\x30\72\141\x73\x73\x65\x72\164\x69\x6f\156", "\x73\x61\155\x6c\x3a\101\164\164\162\x69\142\x75\x74\x65\126\x61\x6c\165\x65");
                $a4->appendChild($HO);
                if (!($VL !== NULL)) {
                    goto O6;
                }
                $HO->setAttributeNS("\x68\x74\x74\160\x3a\x2f\x2f\167\167\167\56\167\63\56\x6f\162\x67\x2f\62\60\60\x31\57\x58\x4d\114\123\x63\x68\x65\x6d\141\x2d\x69\x6e\x73\x74\141\156\x63\145", "\x78\x73\x69\x3a\164\x79\160\x65", $VL);
                O6:
                if ($DE instanceof DOMNodeList) {
                    goto dE;
                }
                $HO->appendChild($Kg->createTextNode($DE));
                goto Ux;
                dE:
                $gJ = 0;
                Nt:
                if (!($gJ < $DE->length)) {
                    goto Zb;
                }
                $e3 = $Kg->importNode($DE->item($gJ), TRUE);
                $HO->appendChild($e3);
                jR:
                $gJ++;
                goto Nt;
                Zb:
                Ux:
                aG:
            }
            yO:
            $WX = new XMLSecEnc();
            $WX->setNode($Kg->documentElement);
            $WX->type = "\x68\x74\164\x70\x3a\57\x2f\x77\x77\x77\x2e\x77\x33\56\157\162\x67\x2f\x32\x30\60\61\x2f\60\x34\x2f\x78\x6d\x6c\x65\x6e\x63\43\105\x6c\x65\x6d\145\x6e\164";
            $L0 = new XMLSecurityKey(XMLSecurityKey::AES256_CBC);
            $L0->generateSessionKey();
            $WX->encryptKey($this->encryptionKey, $L0);
            $qq = $WX->encryptNode($L0);
            $QS = $qW->createElementNS("\165\x72\156\72\x6f\141\163\151\x73\72\156\141\x6d\145\x73\72\x74\143\72\x53\101\115\x4c\72\x32\56\x30\x3a\x61\x73\x73\145\x72\x74\151\157\156", "\x73\141\155\x6c\x3a\x45\156\x63\162\x79\x70\164\x65\x64\x41\164\x74\162\151\x62\x75\164\145");
            $Vo->appendChild($QS);
            $bG = $qW->importNode($qq, TRUE);
            $QS->appendChild($bG);
            oH:
        }
        Lb:
    }
    public function getPrivateKeyUrl()
    {
        return $this->privateKeyUrl;
    }
    public function setPrivateKeyUrl($ls)
    {
        $this->privateKeyUrl = $ls;
    }
}
