<?php


include_once "\125\164\151\154\151\164\x69\145\x73\x2e\160\150\x70";
include_once "\170\155\x6c\163\x65\x63\154\151\x62\163\56\160\x68\160";
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
    protected $wasSignedAtConstruction = FALSE;
    public function __construct(DOMElement $BO = NULL)
    {
        $this->id = SAMLSPUtilities::generateId();
        $this->issueInstant = SAMLSPUtilities::generateTimestamp();
        $this->issuer = '';
        $this->authnInstant = SAMLSPUtilities::generateTimestamp();
        $this->attributes = array();
        $this->nameFormat = "\165\162\156\72\x6f\141\x73\x69\x73\x3a\156\x61\x6d\x65\163\x3a\164\143\72\123\x41\x4d\x4c\x3a\x31\56\x31\x3a\x6e\x61\x6d\145\151\x64\55\x66\x6f\x72\x6d\x61\x74\x3a\165\x6e\163\160\145\x63\151\146\x69\x65\144";
        $this->certificates = array();
        $this->AuthenticatingAuthority = array();
        $this->SubjectConfirmation = array();
        if (!($BO === NULL)) {
            goto lS;
        }
        return;
        lS:
        if (!($BO->localName === "\105\x6e\143\162\x79\160\x74\145\x64\x41\x73\x73\145\x72\x74\x69\157\x6e")) {
            goto Jg;
        }
        $aS = SAMLSPUtilities::xpQuery($BO, "\x2e\57\170\x65\156\x63\x3a\105\156\143\162\x79\x70\164\x65\x64\x44\141\x74\x61");
        $Dd = SAMLSPUtilities::xpQuery($BO, "\x2f\57\x2a\x5b\154\157\143\x61\x6c\55\x6e\141\x6d\145\50\51\x3d\x27\105\156\x63\162\x79\x70\164\x65\144\113\145\x79\x27\x5d\x2f\x2a\133\x6c\x6f\143\141\x6c\55\x6e\x61\155\x65\50\x29\75\47\x45\x6e\x63\x72\171\160\164\x69\157\x6e\x4d\145\164\150\157\144\47\x5d\x2f\100\101\x6c\x67\x6f\162\151\x74\x68\x6d");
        $N0 = $Dd[0]->value;
        $H3 = SAMLSPUtilities::getEncryptionAlgorithm($N0);
        if (count($aS) === 0) {
            goto ry;
        }
        if (count($aS) > 1) {
            goto np;
        }
        goto BR;
        ry:
        throw new Exception("\x4d\x69\x73\163\151\156\147\40\x65\156\143\x72\171\x70\x74\x65\144\x20\x64\141\x74\x61\40\151\156\x20\74\163\x61\x6d\x6c\72\105\156\x63\x72\x79\160\164\145\144\x41\x73\163\x65\162\x74\151\x6f\x6e\x3e\x2e");
        goto BR;
        np:
        throw new Exception("\x4d\x6f\x72\x65\40\x74\150\x61\x6e\x20\157\x6e\x65\40\x65\x6e\143\162\x79\160\x74\145\144\40\x64\x61\164\141\40\x65\x6c\x65\x6d\145\156\x74\40\x69\156\x20\x3c\163\141\155\154\72\105\156\x63\162\x79\160\x74\x65\144\x41\163\x73\x65\162\164\151\157\x6e\76\56");
        BR:
        $Kn = new XMLSecurityKey($H3, array("\164\x79\x70\145" => "\160\162\x69\166\x61\164\x65"));
        $AP = get_option("\x6d\157\x5f\163\141\x6d\x6c\137\143\165\162\x72\145\156\x74\137\x63\x65\162\164\137\160\162\x69\166\x61\x74\145\137\153\145\x79");
        $Kn->loadKey($AP, FALSE);
        $VU = new XMLSecurityKey($H3, array("\x74\171\160\145" => "\160\x72\x69\166\141\x74\x65"));
        $TA = plugin_dir_path(__FILE__) . "\162\x65\x73\157\x75\x72\143\145\163" . DIRECTORY_SEPARATOR . "\155\x69\x6e\151\157\162\x61\156\x67\145\137\163\x70\137\160\162\151\x76\137\x6b\145\x79\56\153\x65\171";
        $VU->loadKey($TA, TRUE);
        $El = array();
        $BO = SAMLSPUtilities::decryptElement($aS[0], $Kn, $El, $VU);
        Jg:
        if ($BO->hasAttribute("\x49\x44")) {
            goto qy;
        }
        throw new Exception("\115\151\x73\163\151\156\147\40\111\x44\x20\x61\164\164\162\x69\142\165\164\x65\x20\x6f\156\x20\123\101\115\114\40\141\x73\163\x65\x72\164\x69\157\x6e\56");
        qy:
        $this->id = $BO->getAttribute("\111\104");
        if (!($BO->getAttribute("\x56\145\x72\163\151\157\156") !== "\x32\x2e\x30")) {
            goto Jq;
        }
        throw new Exception("\125\x6e\163\x75\160\x70\x6f\x72\x74\145\144\40\x76\x65\162\x73\x69\157\156\x3a\40" . $BO->getAttribute("\x56\145\162\163\x69\x6f\x6e"));
        Jq:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($BO->getAttribute("\x49\x73\163\x75\x65\111\156\x73\164\141\x6e\164"));
        $pY = SAMLSPUtilities::xpQuery($BO, "\56\57\163\x61\x6d\x6c\x5f\x61\x73\163\145\x72\164\x69\157\x6e\72\111\x73\x73\165\x65\x72");
        if (!empty($pY)) {
            goto tI;
        }
        throw new Exception("\115\151\163\x73\x69\x6e\x67\40\74\x73\x61\155\154\72\x49\163\163\x75\x65\162\76\40\x69\x6e\40\141\163\163\x65\x72\164\x69\157\x6e\x2e");
        tI:
        $this->issuer = trim($pY[0]->textContent);
        $this->parseConditions($BO);
        $this->parseAuthnStatement($BO);
        $this->parseAttributes($BO);
        $this->parseEncryptedAttributes($BO);
        $this->parseSignature($BO);
        $this->parseSubject($BO);
    }
    private function parseSubject(DOMElement $BO)
    {
        $BN = SAMLSPUtilities::xpQuery($BO, "\56\x2f\163\x61\155\x6c\137\x61\163\163\145\x72\x74\x69\157\x6e\x3a\x53\x75\142\x6a\145\143\x74");
        if (empty($BN)) {
            goto GV;
        }
        if (count($BN) > 1) {
            goto dB;
        }
        goto DN;
        GV:
        return;
        goto DN;
        dB:
        throw new Exception("\115\157\162\x65\x20\x74\x68\x61\156\40\x6f\x6e\145\40\x3c\x73\141\155\x6c\72\x53\x75\x62\x6a\x65\x63\x74\76\40\151\156\40\x3c\163\x61\155\x6c\x3a\101\x73\163\x65\x72\x74\x69\x6f\156\76\x2e");
        DN:
        $BN = $BN[0];
        $rB = SAMLSPUtilities::xpQuery($BN, "\56\57\163\141\155\154\137\x61\163\x73\145\x72\x74\151\x6f\156\x3a\116\x61\155\x65\111\x44\40\174\x20\x2e\x2f\x73\141\x6d\154\137\141\x73\163\145\x72\x74\x69\157\x6e\72\x45\156\x63\x72\x79\x70\164\x65\x64\111\104\57\x78\145\x6e\143\72\x45\x6e\x63\162\171\160\x74\x65\x64\x44\x61\164\141");
        if (empty($rB)) {
            goto pD;
        }
        if (count($rB) > 1) {
            goto VO;
        }
        goto Nq;
        pD:
        if ($_POST["\x52\145\x6c\x61\171\123\164\x61\164\x65"] == "\164\x65\163\x74\126\141\x6c\151\x64\x61\x74\145") {
            goto DQ;
        }
        wp_die("\x57\145\x20\143\157\x75\154\144\40\x6e\157\164\40\x73\x69\147\156\40\171\157\x75\40\151\156\56\40\x50\154\145\141\163\145\40\x63\x6f\x6e\x74\141\x63\x74\x20\171\x6f\x75\162\x20\141\144\155\x69\x6e\151\163\x74\x72\141\164\x6f\x72");
        goto Aq;
        DQ:
        echo "\x3c\x64\151\x76\40\x73\164\171\154\x65\75\42\146\x6f\156\164\x2d\146\141\155\x69\x6c\171\x3a\103\141\x6c\x69\142\162\x69\x3b\x70\141\144\144\151\x6e\x67\72\x30\x20\63\x25\x3b\42\76";
        echo "\74\144\151\x76\40\163\164\171\154\x65\x3d\x22\x63\157\x6c\157\x72\72\x20\43\x61\71\64\x34\x34\x32\x3b\x62\x61\143\153\147\x72\157\165\156\x64\x2d\x63\157\x6c\157\x72\72\40\43\146\x32\x64\x65\144\x65\x3b\160\141\144\x64\151\156\x67\x3a\x20\61\x35\160\170\73\155\141\162\x67\151\x6e\x2d\x62\x6f\164\x74\x6f\155\x3a\x20\62\x30\x70\170\x3b\164\x65\170\x74\x2d\x61\154\x69\x67\x6e\x3a\143\145\x6e\164\145\162\x3b\142\157\x72\144\145\x72\72\61\x70\170\40\x73\157\154\151\x64\x20\x23\105\66\102\x33\102\x32\x3b\146\157\x6e\x74\55\163\x69\x7a\x65\x3a\x31\x38\160\164\x3b\42\x3e\x20\x45\x52\x52\117\x52\x3c\57\144\x69\x76\x3e\12\x20\40\40\40\40\x20\40\x20\40\40\40\74\144\x69\166\40\163\x74\171\x6c\x65\x3d\x22\x63\157\154\157\162\x3a\x20\43\x61\71\64\x34\x34\62\73\x66\x6f\x6e\x74\x2d\163\151\x7a\145\72\x31\64\160\x74\73\40\155\x61\x72\x67\x69\x6e\55\142\157\164\164\x6f\155\x3a\62\60\x70\x78\73\42\76\x3c\x70\76\74\x73\164\x72\157\156\147\76\x45\x72\x72\x6f\162\x3a\40\x3c\x2f\x73\164\x72\x6f\x6e\x67\x3e\x4d\151\163\x73\151\x6e\x67\40\x20\116\x61\155\x65\111\x44\x20\x6f\x72\x20\105\x6e\x63\162\171\x70\x74\145\144\x49\104\40\151\x6e\40\123\101\115\114\40\x52\x65\x73\160\x6f\x6e\163\145\x2e\x3c\x2f\x70\x3e\12\40\x20\40\x20\40\x20\x20\40\40\x20\40\x20\x20\x20\40\x20\74\160\x3e\120\154\145\x61\x73\145\40\143\157\156\x74\141\x63\x74\x20\171\x6f\165\x72\x20\141\x64\155\x69\x6e\151\x73\164\x72\x61\164\157\162\40\141\x6e\x64\40\162\145\x70\x6f\x72\164\x20\x74\150\x65\40\146\x6f\154\154\157\167\x69\156\147\40\x65\x72\162\157\x72\72\74\57\160\x3e\12\40\x20\40\40\40\40\x20\40\40\x20\40\40\x20\x20\x20\x20\x3c\160\x3e\x3c\x73\x74\162\157\156\x67\x3e\x50\x6f\x73\163\x69\x62\154\x65\x20\x43\x61\x75\163\145\x3a\74\57\163\164\x72\x6f\156\x67\x3e\40\116\141\x6d\145\x49\104\40\x6e\x6f\x74\x20\146\157\165\x6e\144\x20\x69\x6e\40\123\101\x4d\114\40\122\145\x73\160\157\x6e\x73\x65\x20\163\x75\142\152\145\143\164\56\x3c\x2f\x70\76\12\x20\x20\x20\x20\40\x20\x20\x20\40\x20\x20\x20\40\40\x20\40\x3c\57\144\x69\166\76\xa\40\x20\40\40\40\x20\40\x20\40\40\x20\40\x20\x20\40\40\74\x64\x69\166\x20\x73\x74\x79\x6c\x65\x3d\42\x6d\x61\162\x67\x69\x6e\x3a\x33\x25\x3b\144\151\x73\x70\154\141\x79\72\142\154\x6f\143\x6b\x3b\x74\145\170\164\x2d\x61\154\x69\147\x6e\72\143\x65\156\164\x65\162\x3b\x22\76\xa\40\x20\x20\40\x20\40\x20\x20\40\40\40\x20\40\40\x20\x20\x3c\x64\151\x76\x20\163\x74\x79\x6c\x65\x3d\42\x6d\141\x72\147\151\156\72\x33\x25\73\x64\x69\163\160\x6c\141\x79\72\x62\x6c\157\x63\x6b\x3b\x74\145\x78\x74\55\x61\x6c\151\x67\156\72\143\x65\x6e\164\145\162\73\x22\76\x3c\151\x6e\160\x75\164\40\x73\164\171\154\x65\x3d\x22\160\x61\144\x64\151\x6e\147\72\61\x25\73\167\151\x64\x74\150\72\x31\60\60\160\x78\x3b\142\141\143\153\147\x72\157\165\x6e\144\72\x20\43\x30\x30\71\x31\x43\104\x20\156\x6f\x6e\145\x20\162\145\160\x65\x61\164\x20\163\143\x72\157\x6c\154\x20\x30\x25\40\60\x25\x3b\x63\165\162\x73\157\162\x3a\40\160\x6f\151\156\x74\x65\162\73\x66\157\x6e\x74\x2d\163\151\x7a\145\72\x31\x35\x70\x78\x3b\142\157\162\144\x65\162\x2d\x77\x69\144\x74\x68\x3a\40\61\x70\170\73\x62\x6f\x72\x64\145\162\55\x73\164\171\154\x65\x3a\40\163\157\154\151\x64\73\142\157\162\144\145\162\55\162\x61\x64\151\x75\x73\x3a\40\63\160\170\x3b\x77\150\151\x74\145\x2d\163\x70\x61\143\145\72\40\156\x6f\x77\162\x61\160\73\142\x6f\x78\55\163\x69\172\151\x6e\x67\x3a\x20\x62\157\162\144\x65\162\x2d\x62\157\170\73\142\157\x72\x64\145\162\55\x63\157\x6c\x6f\x72\x3a\x20\x23\60\x30\67\63\x41\101\x3b\142\x6f\170\x2d\x73\x68\141\144\157\167\72\x20\x30\x70\170\x20\x31\x70\170\40\60\160\170\x20\x72\x67\x62\141\50\x31\62\x30\x2c\x20\62\60\x30\54\40\x32\63\x30\54\x20\x30\56\66\51\40\151\x6e\x73\145\x74\73\x63\157\x6c\x6f\162\72\x20\43\106\106\106\x3b\x22\x74\x79\x70\145\x3d\42\142\165\164\164\157\x6e\x22\x20\166\141\154\165\x65\75\42\x44\x6f\156\x65\42\x20\x6f\x6e\103\x6c\x69\143\x6b\75\x22\x73\145\154\x66\x2e\143\154\157\x73\x65\50\x29\x3b\x22\x3e\x3c\x2f\144\151\166\76";
        die;
        Aq:
        goto Nq;
        VO:
        throw new Exception("\x4d\157\x72\x65\x20\x74\x68\141\156\40\157\x6e\x65\x20\74\x73\141\155\154\x3a\x4e\141\x6d\145\x49\x44\76\x20\x6f\162\40\x3c\163\141\x6d\154\72\x45\156\x63\162\171\160\164\x65\144\x44\76\x20\151\x6e\40\x3c\x73\141\x6d\x6c\x3a\123\165\142\x6a\x65\143\164\76\56");
        Nq:
        $rB = $rB[0];
        if ($rB->localName === "\x45\x6e\143\x72\x79\160\x74\145\x64\104\x61\x74\141") {
            goto gI;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($rB);
        goto aU;
        gI:
        $this->encryptedNameId = $rB;
        aU:
    }
    private function parseConditions(DOMElement $BO)
    {
        $s8 = SAMLSPUtilities::xpQuery($BO, "\x2e\x2f\163\x61\155\x6c\137\141\x73\x73\x65\x72\x74\151\x6f\156\x3a\103\x6f\x6e\x64\151\x74\151\x6f\156\x73");
        if (empty($s8)) {
            goto vH;
        }
        if (count($s8) > 1) {
            goto lF;
        }
        goto zk;
        vH:
        return;
        goto zk;
        lF:
        throw new Exception("\x4d\x6f\162\145\40\164\x68\141\x6e\40\x6f\x6e\x65\40\74\x73\x61\155\154\72\x43\x6f\x6e\144\151\164\151\x6f\x6e\x73\x3e\40\x69\156\40\x3c\x73\141\155\x6c\72\x41\163\163\145\x72\164\151\x6f\x6e\x3e\56");
        zk:
        $s8 = $s8[0];
        if (!$s8->hasAttribute("\x4e\x6f\164\x42\x65\x66\x6f\162\145")) {
            goto v1;
        }
        $So = SAMLSPUtilities::xsDateTimeToTimestamp($s8->getAttribute("\116\x6f\164\102\145\146\157\x72\145"));
        if (!($this->notBefore === NULL || $this->notBefore < $So)) {
            goto bX;
        }
        $this->notBefore = $So;
        bX:
        v1:
        if (!$s8->hasAttribute("\x4e\x6f\164\117\x6e\x4f\162\x41\146\164\x65\162")) {
            goto Nv;
        }
        $SN = SAMLSPUtilities::xsDateTimeToTimestamp($s8->getAttribute("\x4e\x6f\164\117\x6e\x4f\x72\x41\x66\164\145\162"));
        if (!($this->notOnOrAfter === NULL || $this->notOnOrAfter > $SN)) {
            goto OR1;
        }
        $this->notOnOrAfter = $SN;
        OR1:
        Nv:
        $pu = $s8->firstChild;
        j1:
        if (!($pu !== NULL)) {
            goto mm;
        }
        if (!$pu instanceof DOMText) {
            goto sn;
        }
        goto rC;
        sn:
        if (!($pu->namespaceURI !== "\165\x72\156\x3a\x6f\141\x73\x69\163\72\156\141\155\x65\x73\72\164\143\72\123\x41\x4d\x4c\x3a\62\x2e\x30\72\141\163\163\145\162\164\x69\x6f\156")) {
            goto O0;
        }
        throw new Exception("\x55\x6e\153\156\x6f\x77\x6e\x20\156\x61\155\145\x73\x70\141\x63\x65\40\157\146\40\143\x6f\x6e\144\x69\x74\151\x6f\156\x3a\40" . var_export($pu->namespaceURI, TRUE));
        O0:
        switch ($pu->localName) {
            case "\101\165\x64\151\145\156\143\145\x52\145\163\x74\x72\x69\x63\x74\151\157\x6e":
                $Sz = SAMLSPUtilities::extractStrings($pu, "\165\162\156\x3a\x6f\x61\163\x69\163\72\x6e\141\155\145\x73\72\164\143\x3a\x53\101\115\114\72\x32\56\60\72\x61\163\163\145\x72\x74\x69\x6f\x6e", "\x41\x75\144\x69\x65\x6e\x63\x65");
                if ($this->validAudiences === NULL) {
                    goto sO;
                }
                $this->validAudiences = array_intersect($this->validAudiences, $Sz);
                goto dw;
                sO:
                $this->validAudiences = $Sz;
                dw:
                goto wr;
            case "\x4f\x6e\x65\x54\151\155\x65\125\163\x65":
                goto wr;
            case "\x50\162\157\x78\x79\x52\145\x73\164\162\151\143\x74\151\x6f\156":
                goto wr;
            default:
                throw new Exception("\125\156\x6b\x6e\157\x77\156\40\143\x6f\156\x64\151\164\x69\157\156\72\x20" . var_export($pu->localName, TRUE));
        }
        Bf:
        wr:
        rC:
        $pu = $pu->nextSibling;
        goto j1;
        mm:
    }
    private function parseAuthnStatement(DOMElement $BO)
    {
        $f8 = SAMLSPUtilities::xpQuery($BO, "\x2e\57\x73\x61\x6d\154\x5f\141\163\x73\145\162\164\x69\x6f\x6e\x3a\x41\x75\x74\x68\x6e\x53\x74\x61\x74\145\x6d\x65\x6e\x74");
        if (empty($f8)) {
            goto TO;
        }
        if (count($f8) > 1) {
            goto re;
        }
        goto hj;
        TO:
        $this->authnInstant = NULL;
        return;
        goto hj;
        re:
        throw new Exception("\115\x6f\162\145\40\x74\150\141\164\40\157\x6e\x65\40\74\163\141\155\x6c\72\101\x75\164\x68\x6e\123\164\x61\164\x65\x6d\x65\156\x74\76\40\151\156\40\74\163\141\x6d\x6c\x3a\101\163\163\x65\162\164\x69\x6f\x6e\76\x20\156\157\164\x20\163\165\x70\160\x6f\x72\x74\145\x64\56");
        hj:
        $rD = $f8[0];
        if ($rD->hasAttribute("\101\x75\x74\150\156\x49\156\163\164\x61\x6e\164")) {
            goto te;
        }
        throw new Exception("\115\x69\x73\163\x69\156\147\40\x72\145\x71\x75\x69\x72\145\144\40\101\165\x74\150\x6e\x49\156\x73\164\x61\156\x74\40\141\x74\x74\162\x69\x62\165\x74\145\x20\157\x6e\x20\74\163\141\155\x6c\x3a\x41\x75\x74\150\x6e\123\164\141\164\x65\x6d\x65\x6e\164\x3e\56");
        te:
        $this->authnInstant = SAMLSPUtilities::xsDateTimeToTimestamp($rD->getAttribute("\101\x75\x74\150\x6e\x49\156\163\x74\x61\156\164"));
        if (!$rD->hasAttribute("\123\x65\x73\x73\x69\x6f\x6e\116\157\x74\117\x6e\x4f\162\101\146\164\x65\162")) {
            goto E3;
        }
        $this->sessionNotOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($rD->getAttribute("\123\x65\x73\x73\x69\157\x6e\x4e\x6f\164\117\x6e\x4f\162\101\x66\164\145\162"));
        E3:
        if (!$rD->hasAttribute("\123\145\x73\163\151\x6f\x6e\x49\x6e\144\x65\x78")) {
            goto WN;
        }
        $this->sessionIndex = $rD->getAttribute("\123\145\163\x73\x69\x6f\156\x49\156\x64\145\170");
        WN:
        $this->parseAuthnContext($rD);
    }
    private function parseAuthnContext(DOMElement $q9)
    {
        $Ze = SAMLSPUtilities::xpQuery($q9, "\x2e\57\163\141\155\154\x5f\141\163\163\145\x72\164\x69\x6f\x6e\x3a\x41\x75\164\x68\156\x43\x6f\156\164\145\x78\164");
        if (count($Ze) > 1) {
            goto FQ;
        }
        if (empty($Ze)) {
            goto Lq;
        }
        goto Xt;
        FQ:
        throw new Exception("\x4d\157\162\145\40\164\x68\141\x6e\x20\x6f\156\145\40\74\x73\141\x6d\154\72\101\165\x74\x68\156\103\x6f\x6e\164\x65\170\x74\x3e\40\151\156\40\74\163\141\155\x6c\x3a\101\165\x74\150\156\x53\x74\x61\x74\x65\x6d\x65\x6e\x74\76\x2e");
        goto Xt;
        Lq:
        throw new Exception("\x4d\151\x73\163\151\x6e\x67\40\162\145\161\165\x69\x72\145\144\40\74\163\x61\155\154\72\x41\x75\x74\x68\x6e\x43\x6f\x6e\164\145\x78\x74\x3e\40\x69\156\40\x3c\163\141\155\x6c\x3a\x41\165\x74\150\x6e\123\164\x61\x74\145\x6d\x65\x6e\164\76\56");
        Xt:
        $ZO = $Ze[0];
        $JE = SAMLSPUtilities::xpQuery($ZO, "\x2e\x2f\x73\141\155\x6c\137\x61\x73\163\145\162\164\151\x6f\156\x3a\x41\165\x74\x68\x6e\103\x6f\x6e\164\x65\170\x74\x44\145\x63\x6c\x52\145\146");
        if (count($JE) > 1) {
            goto zy;
        }
        if (count($JE) === 1) {
            goto fn;
        }
        goto Z0;
        zy:
        throw new Exception("\115\x6f\x72\x65\x20\x74\150\141\156\x20\157\x6e\x65\40\x3c\x73\141\155\154\x3a\101\x75\164\x68\156\x43\157\x6e\x74\145\x78\x74\104\145\x63\154\x52\x65\x66\x3e\x20\146\157\x75\x6e\x64\77");
        goto Z0;
        fn:
        $this->setAuthnContextDeclRef(trim($JE[0]->textContent));
        Z0:
        $YG = SAMLSPUtilities::xpQuery($ZO, "\x2e\57\x73\141\155\154\137\141\x73\x73\x65\162\164\x69\157\x6e\72\x41\165\164\150\x6e\103\157\156\x74\145\170\164\x44\145\x63\x6c");
        if (count($YG) > 1) {
            goto dT;
        }
        if (count($YG) === 1) {
            goto zs;
        }
        goto Iw;
        dT:
        throw new Exception("\x4d\157\x72\x65\40\164\150\141\x6e\x20\x6f\x6e\x65\x20\74\163\141\155\x6c\x3a\101\x75\164\150\x6e\103\x6f\x6e\164\145\170\x74\104\145\x63\154\x3e\x20\x66\157\x75\x6e\x64\x3f");
        goto Iw;
        zs:
        $this->setAuthnContextDecl(new SAML2_XML_Chunk($YG[0]));
        Iw:
        $g0 = SAMLSPUtilities::xpQuery($ZO, "\x2e\57\x73\x61\155\154\137\x61\163\163\145\x72\x74\x69\x6f\156\x3a\x41\165\x74\150\156\103\x6f\156\164\145\x78\x74\x43\154\x61\163\163\x52\x65\x66");
        if (count($g0) > 1) {
            goto fi;
        }
        if (count($g0) === 1) {
            goto s8;
        }
        goto DP;
        fi:
        throw new Exception("\115\157\162\145\40\x74\150\141\156\x20\157\156\145\x20\x3c\163\x61\x6d\x6c\72\x41\x75\x74\x68\156\103\x6f\x6e\x74\x65\170\164\103\154\141\x73\x73\122\145\x66\76\x20\151\x6e\x20\74\163\x61\155\154\x3a\x41\x75\x74\150\x6e\103\157\156\164\x65\170\164\76\56");
        goto DP;
        s8:
        $this->setAuthnContextClassRef(trim($g0[0]->textContent));
        DP:
        if (!(empty($this->authnContextClassRef) && empty($this->authnContextDecl) && empty($this->authnContextDeclRef))) {
            goto Si;
        }
        throw new Exception("\x4d\x69\x73\163\151\x6e\x67\x20\145\x69\164\x68\145\x72\40\x3c\x73\x61\155\154\72\101\165\x74\150\x6e\103\x6f\x6e\164\145\170\x74\x43\154\x61\x73\163\x52\x65\x66\x3e\40\157\x72\40\x3c\x73\x61\x6d\x6c\x3a\101\165\164\150\156\x43\x6f\x6e\164\145\170\164\104\145\x63\x6c\122\x65\x66\76\x20\157\x72\40\x3c\163\x61\x6d\154\72\x41\x75\164\150\156\x43\x6f\x6e\164\x65\x78\x74\104\145\x63\154\76");
        Si:
        $this->AuthenticatingAuthority = SAMLSPUtilities::extractStrings($ZO, "\x75\162\x6e\72\157\141\x73\151\x73\x3a\156\141\155\145\163\72\164\143\72\x53\x41\x4d\x4c\72\62\x2e\x30\72\141\x73\x73\x65\x72\164\x69\157\x6e", "\x41\x75\x74\150\x65\x6e\164\x69\x63\141\164\151\156\x67\x41\x75\164\150\x6f\162\x69\x74\171");
    }
    private function parseAttributes(DOMElement $BO)
    {
        $U0 = TRUE;
        $Fl = SAMLSPUtilities::xpQuery($BO, "\x2e\x2f\x73\x61\x6d\x6c\137\141\x73\x73\x65\x72\x74\151\157\x6e\72\x41\164\164\162\x69\x62\x75\164\145\123\164\141\x74\x65\155\145\x6e\164\x2f\x73\141\x6d\154\x5f\x61\x73\x73\145\162\x74\151\157\x6e\72\101\164\x74\162\x69\142\165\164\145");
        foreach ($Fl as $Rj) {
            if ($Rj->hasAttribute("\116\x61\x6d\x65")) {
                goto Kv;
            }
            throw new Exception("\x4d\x69\163\x73\151\156\147\x20\x6e\141\155\145\x20\x6f\x6e\x20\x3c\x73\141\x6d\154\72\x41\164\x74\x72\151\x62\x75\x74\x65\x3e\40\145\154\145\x6d\145\x6e\164\x2e");
            Kv:
            $vd = $Rj->getAttribute("\x4e\x61\x6d\x65");
            if ($Rj->hasAttribute("\x4e\141\155\x65\106\157\x72\155\x61\164")) {
                goto cA;
            }
            $Xs = "\x75\162\x6e\72\157\141\x73\x69\x73\x3a\x6e\x61\155\145\x73\72\x74\143\x3a\x53\101\x4d\x4c\x3a\x31\x2e\61\x3a\156\141\x6d\x65\151\x64\x2d\x66\157\x72\x6d\x61\x74\72\165\156\163\160\145\x63\151\x66\151\145\x64";
            goto po;
            cA:
            $Xs = $Rj->getAttribute("\x4e\x61\x6d\x65\106\157\x72\x6d\x61\164");
            po:
            if ($U0) {
                goto qf;
            }
            if (!($this->nameFormat !== $Xs)) {
                goto QS;
            }
            $this->nameFormat = "\x75\x72\156\x3a\157\x61\163\x69\163\72\x6e\141\155\145\163\72\x74\143\x3a\x53\x41\x4d\114\72\61\x2e\61\72\156\141\x6d\145\151\144\x2d\146\x6f\162\x6d\141\164\x3a\x75\x6e\163\160\145\x63\151\146\x69\x65\144";
            QS:
            goto nq;
            qf:
            $this->nameFormat = $Xs;
            $U0 = FALSE;
            nq:
            if (array_key_exists($vd, $this->attributes)) {
                goto Cs;
            }
            $this->attributes[$vd] = array();
            Cs:
            $o0 = SAMLSPUtilities::xpQuery($Rj, "\x2e\57\x73\x61\155\154\x5f\141\163\x73\x65\162\x74\151\x6f\x6e\72\x41\x74\x74\x72\151\x62\x75\x74\x65\x56\x61\x6c\165\145");
            foreach ($o0 as $Iy) {
                $this->attributes[$vd][] = trim($Iy->textContent);
                gQ:
            }
            ia:
            um:
        }
        ic:
    }
    private function parseEncryptedAttributes(DOMElement $BO)
    {
        $this->encryptedAttribute = SAMLSPUtilities::xpQuery($BO, "\x2e\x2f\x73\x61\x6d\154\137\141\x73\163\x65\162\164\x69\157\x6e\x3a\x41\164\164\162\x69\142\x75\x74\145\x53\164\x61\164\145\155\145\x6e\164\57\163\x61\x6d\154\x5f\141\x73\163\145\162\x74\151\x6f\x6e\x3a\105\x6e\143\x72\171\160\164\145\144\x41\x74\164\162\x69\142\165\164\145");
    }
    private function parseSignature(DOMElement $BO)
    {
        $XS = SAMLSPUtilities::validateElement($BO);
        if (!($XS !== FALSE)) {
            goto cw;
        }
        $this->wasSignedAtConstruction = TRUE;
        $this->certificates = $XS["\103\x65\162\x74\151\146\x69\143\x61\x74\145\x73"];
        $this->signatureData = $XS;
        cw:
    }
    public function validate(XMLSecurityKey $Kn)
    {
        if (!($this->signatureData === NULL)) {
            goto mf;
        }
        return FALSE;
        mf:
        SAMLSPUtilities::validateSignature($this->signatureData, $Kn);
        return TRUE;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($am)
    {
        $this->id = $am;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($V1)
    {
        $this->issueInstant = $V1;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($pY)
    {
        $this->issuer = $pY;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto UF;
        }
        throw new Exception("\101\x74\164\145\155\160\x74\145\144\40\x74\157\40\x72\x65\x74\162\151\145\166\145\x20\145\156\x63\162\171\x70\x74\x65\x64\x20\x4e\x61\155\x65\111\104\x20\167\x69\x74\150\x6f\165\x74\40\144\x65\x63\162\171\x70\164\151\156\147\x20\x69\164\x20\146\151\162\x73\164\x2e");
        UF:
        return $this->nameId;
    }
    public function setNameId($rB)
    {
        $this->nameId = $rB;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto w5;
        }
        return TRUE;
        w5:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $Kn)
    {
        $tW = new DOMDocument();
        $wP = $tW->createElement("\x72\x6f\157\x74");
        $tW->appendChild($wP);
        SAMLSPUtilities::addNameId($wP, $this->nameId);
        $rB = $wP->firstChild;
        SAMLSPUtilities::getContainer()->debugMessage($rB, "\x65\156\143\162\171\160\164");
        $YO = new XMLSecEnc();
        $YO->setNode($rB);
        $YO->type = XMLSecEnc::Element;
        $A2 = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $A2->generateSessionKey();
        $YO->encryptKey($Kn, $A2);
        $this->encryptedNameId = $YO->encryptNode($A2);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $Kn, array $El = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto Hw;
        }
        return;
        Hw:
        $rB = SAMLSPUtilities::decryptElement($this->encryptedNameId, $Kn, $El);
        SAMLSPUtilities::getContainer()->debugMessage($rB, "\x64\x65\x63\162\x79\x70\x74");
        $this->nameId = SAMLSPUtilities::parseNameId($rB);
        $this->encryptedNameId = NULL;
    }
    public function decryptAttributes(XMLSecurityKey $Kn, array $El = array())
    {
        if (!($this->encryptedAttribute === NULL)) {
            goto tB;
        }
        return;
        tB:
        $U0 = TRUE;
        $Fl = $this->encryptedAttribute;
        foreach ($Fl as $Na) {
            $Rj = SAMLSPUtilities::decryptElement($Na->getElementsByTagName("\x45\156\x63\162\171\x70\x74\x65\x64\104\x61\164\141")->item(0), $Kn, $El);
            if ($Rj->hasAttribute("\116\x61\155\x65")) {
                goto Sk;
            }
            throw new Exception("\115\151\x73\163\151\x6e\147\x20\156\141\x6d\145\40\x6f\156\40\x3c\163\141\x6d\154\72\x41\164\164\x72\x69\142\165\x74\145\76\x20\145\x6c\145\155\145\156\x74\x2e");
            Sk:
            $vd = $Rj->getAttribute("\116\141\x6d\x65");
            if ($Rj->hasAttribute("\x4e\x61\155\145\106\x6f\x72\155\x61\x74")) {
                goto X9;
            }
            $Xs = "\x75\162\156\72\157\x61\x73\151\163\72\156\141\x6d\145\163\72\x74\x63\x3a\x53\x41\115\114\x3a\x32\56\60\72\141\164\x74\162\156\x61\155\x65\55\146\157\x72\155\x61\x74\72\165\x6e\163\x70\145\x63\x69\146\151\145\144";
            goto PW;
            X9:
            $Xs = $Rj->getAttribute("\x4e\141\x6d\x65\106\157\162\x6d\141\164");
            PW:
            if ($U0) {
                goto wS;
            }
            if (!($this->nameFormat !== $Xs)) {
                goto g5;
            }
            $this->nameFormat = "\165\162\x6e\x3a\157\141\163\x69\163\72\156\x61\155\145\163\72\x74\x63\x3a\x53\101\x4d\x4c\72\x32\x2e\x30\72\141\x74\x74\x72\156\141\155\x65\55\x66\x6f\x72\155\x61\164\72\165\156\163\x70\145\143\x69\146\151\x65\x64";
            g5:
            goto jS;
            wS:
            $this->nameFormat = $Xs;
            $U0 = FALSE;
            jS:
            if (array_key_exists($vd, $this->attributes)) {
                goto Nj;
            }
            $this->attributes[$vd] = array();
            Nj:
            $o0 = SAMLSPUtilities::xpQuery($Rj, "\x2e\57\x73\141\x6d\x6c\x5f\x61\163\x73\145\x72\x74\x69\157\x6e\x3a\x41\164\164\162\151\x62\x75\164\x65\126\x61\x6c\x75\x65");
            foreach ($o0 as $Iy) {
                $this->attributes[$vd][] = trim($Iy->textContent);
                op:
            }
            qS:
            Q5:
        }
        uq:
    }
    public function getNotBefore()
    {
        return $this->notBefore;
    }
    public function setNotBefore($So)
    {
        $this->notBefore = $So;
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($SN)
    {
        $this->notOnOrAfter = $SN;
    }
    public function setEncryptedAttributes($PG)
    {
        $this->requiredEncAttributes = $PG;
    }
    public function getValidAudiences()
    {
        return $this->validAudiences;
    }
    public function setValidAudiences(array $Wq = NULL)
    {
        $this->validAudiences = $Wq;
    }
    public function getAuthnInstant()
    {
        return $this->authnInstant;
    }
    public function setAuthnInstant($Uj)
    {
        $this->authnInstant = $Uj;
    }
    public function getSessionNotOnOrAfter()
    {
        return $this->sessionNotOnOrAfter;
    }
    public function setSessionNotOnOrAfter($jS)
    {
        $this->sessionNotOnOrAfter = $jS;
    }
    public function getSessionIndex()
    {
        return $this->sessionIndex;
    }
    public function setSessionIndex($jk)
    {
        $this->sessionIndex = $jk;
    }
    public function getAuthnContext()
    {
        if (empty($this->authnContextClassRef)) {
            goto Gm;
        }
        return $this->authnContextClassRef;
        Gm:
        if (empty($this->authnContextDeclRef)) {
            goto l9;
        }
        return $this->authnContextDeclRef;
        l9:
        return NULL;
    }
    public function setAuthnContext($dG)
    {
        $this->setAuthnContextClassRef($dG);
    }
    public function getAuthnContextClassRef()
    {
        return $this->authnContextClassRef;
    }
    public function setAuthnContextClassRef($bj)
    {
        $this->authnContextClassRef = $bj;
    }
    public function setAuthnContextDecl(SAML2_XML_Chunk $ZH)
    {
        if (empty($this->authnContextDeclRef)) {
            goto Oc;
        }
        throw new Exception("\101\165\164\x68\156\x43\x6f\x6e\164\145\x78\164\104\145\x63\x6c\122\x65\146\x20\x69\163\x20\x61\x6c\x72\x65\x61\x64\x79\40\162\145\x67\x69\x73\164\145\x72\x65\144\x21\40\115\141\x79\x20\157\156\x6c\x79\x20\x68\x61\x76\x65\x20\145\x69\164\x68\145\x72\40\141\x20\104\145\x63\154\x20\157\x72\40\x61\40\x44\x65\143\154\122\145\x66\54\x20\x6e\x6f\164\x20\x62\157\x74\150\41");
        Oc:
        $this->authnContextDecl = $ZH;
    }
    public function getAuthnContextDecl()
    {
        return $this->authnContextDecl;
    }
    public function setAuthnContextDeclRef($jB)
    {
        if (empty($this->authnContextDecl)) {
            goto J5;
        }
        throw new Exception("\x41\x75\x74\x68\156\x43\x6f\x6e\164\145\x78\x74\x44\x65\143\x6c\x20\151\x73\40\141\x6c\162\x65\141\144\x79\x20\162\145\147\x69\x73\164\x65\x72\x65\x64\41\x20\115\141\171\40\x6f\x6e\154\171\x20\150\x61\x76\x65\x20\x65\x69\x74\x68\145\162\40\x61\x20\104\x65\x63\x6c\x20\157\x72\x20\141\x20\x44\x65\x63\x6c\x52\145\146\x2c\x20\156\x6f\164\40\142\x6f\x74\150\41");
        J5:
        $this->authnContextDeclRef = $jB;
    }
    public function getAuthnContextDeclRef()
    {
        return $this->authnContextDeclRef;
    }
    public function getAuthenticatingAuthority()
    {
        return $this->AuthenticatingAuthority;
    }
    public function setAuthenticatingAuthority($Mw)
    {
        $this->AuthenticatingAuthority = $Mw;
    }
    public function getAttributes()
    {
        return $this->attributes;
    }
    public function setAttributes(array $Fl)
    {
        $this->attributes = $Fl;
    }
    public function getAttributeNameFormat()
    {
        return $this->nameFormat;
    }
    public function setAttributeNameFormat($Xs)
    {
        $this->nameFormat = $Xs;
    }
    public function getSubjectConfirmation()
    {
        return $this->SubjectConfirmation;
    }
    public function setSubjectConfirmation(array $Zi)
    {
        $this->SubjectConfirmation = $Zi;
    }
    public function getSignatureKey()
    {
        return $this->signatureKey;
    }
    public function setSignatureKey(XMLsecurityKey $VA = NULL)
    {
        $this->signatureKey = $VA;
    }
    public function getEncryptionKey()
    {
        return $this->encryptionKey;
    }
    public function setEncryptionKey(XMLSecurityKey $Jb = NULL)
    {
        $this->encryptionKey = $Jb;
    }
    public function setCertificates(array $pj)
    {
        $this->certificates = $pj;
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
    public function toXML(DOMNode $DW = NULL)
    {
        if ($DW === NULL) {
            goto WH;
        }
        $vq = $DW->ownerDocument;
        goto Y0;
        WH:
        $vq = new DOMDocument();
        $DW = $vq;
        Y0:
        $wP = $vq->createElementNS("\x75\162\x6e\72\157\x61\163\x69\x73\x3a\156\141\x6d\145\163\72\164\x63\x3a\x53\x41\x4d\x4c\x3a\x32\x2e\60\x3a\x61\163\163\x65\x72\164\151\x6f\x6e", "\163\141\x6d\154\x3a" . "\101\163\x73\x65\x72\164\x69\157\156");
        $DW->appendChild($wP);
        $wP->setAttributeNS("\165\x72\156\72\x6f\141\163\151\x73\72\x6e\141\x6d\145\163\72\x74\143\x3a\x53\101\x4d\x4c\x3a\62\x2e\60\x3a\x70\x72\x6f\164\x6f\x63\x6f\154", "\163\x61\155\154\x70\72\x74\155\x70", "\164\x6d\x70");
        $wP->removeAttributeNS("\165\162\x6e\x3a\x6f\141\x73\x69\163\x3a\156\141\155\145\x73\72\164\x63\x3a\x53\101\x4d\x4c\72\x32\56\60\x3a\x70\x72\157\x74\x6f\x63\x6f\x6c", "\164\x6d\x70");
        $wP->setAttributeNS("\x68\164\x74\x70\72\57\x2f\167\x77\167\x2e\167\63\56\157\x72\147\57\62\x30\x30\61\x2f\130\x4d\x4c\x53\x63\x68\x65\x6d\141\x2d\x69\x6e\163\164\x61\x6e\143\145", "\x78\x73\x69\72\164\x6d\x70", "\x74\155\x70");
        $wP->removeAttributeNS("\x68\x74\x74\160\72\x2f\57\x77\167\x77\56\x77\x33\x2e\157\x72\x67\57\62\x30\60\61\57\x58\115\x4c\x53\x63\150\x65\x6d\x61\55\x69\156\163\164\x61\156\143\x65", "\164\x6d\x70");
        $wP->setAttributeNS("\150\164\x74\x70\x3a\57\57\x77\x77\167\x2e\x77\63\x2e\157\162\x67\x2f\x32\60\60\61\x2f\130\115\114\123\143\150\x65\x6d\x61", "\170\163\x3a\x74\155\x70", "\x74\155\x70");
        $wP->removeAttributeNS("\x68\164\164\160\72\57\x2f\x77\167\x77\56\167\x33\56\157\x72\x67\57\x32\x30\60\x31\x2f\130\115\x4c\123\143\x68\x65\x6d\x61", "\x74\155\x70");
        $wP->setAttribute("\111\104", $this->id);
        $wP->setAttribute("\126\x65\162\x73\x69\x6f\x6e", "\x32\56\60");
        $wP->setAttribute("\111\163\x73\x75\x65\111\156\163\164\141\156\164", gmdate("\131\x2d\155\x2d\x64\134\x54\x48\72\151\72\163\134\x5a", $this->issueInstant));
        $pY = SAMLSPUtilities::addString($wP, "\x75\x72\x6e\x3a\157\141\163\x69\x73\72\156\141\x6d\x65\163\x3a\164\x63\72\123\101\115\x4c\72\x32\x2e\x30\x3a\141\163\x73\x65\162\164\151\157\x6e", "\163\141\x6d\154\x3a\111\x73\x73\x75\145\162", $this->issuer);
        $this->addSubject($wP);
        $this->addConditions($wP);
        $this->addAuthnStatement($wP);
        if ($this->requiredEncAttributes == FALSE) {
            goto Qi;
        }
        $this->addEncryptedAttributeStatement($wP);
        goto y8;
        Qi:
        $this->addAttributeStatement($wP);
        y8:
        if (!($this->signatureKey !== NULL)) {
            goto f8;
        }
        SAMLSPUtilities::insertSignature($this->signatureKey, $this->certificates, $wP, $pY->nextSibling);
        f8:
        return $wP;
    }
    private function addSubject(DOMElement $wP)
    {
        if (!($this->nameId === NULL && $this->encryptedNameId === NULL)) {
            goto uD;
        }
        return;
        uD:
        $BN = $wP->ownerDocument->createElementNS("\x75\162\x6e\x3a\157\141\163\151\163\72\x6e\141\x6d\x65\x73\x3a\164\143\x3a\123\101\115\114\72\62\x2e\x30\72\141\x73\163\x65\162\164\x69\157\156", "\163\141\155\x6c\72\123\x75\142\x6a\145\143\164");
        $wP->appendChild($BN);
        if ($this->encryptedNameId === NULL) {
            goto qo;
        }
        $ck = $BN->ownerDocument->createElementNS("\x75\162\x6e\x3a\x6f\141\163\x69\163\72\x6e\x61\x6d\x65\163\72\x74\143\x3a\123\x41\115\114\x3a\62\x2e\x30\x3a\x61\x73\163\x65\162\x74\x69\x6f\156", "\163\141\155\x6c\x3a" . "\x45\x6e\143\x72\171\160\x74\145\x64\x49\104");
        $BN->appendChild($ck);
        $ck->appendChild($BN->ownerDocument->importNode($this->encryptedNameId, TRUE));
        goto P6;
        qo:
        SAMLSPUtilities::addNameId($BN, $this->nameId);
        P6:
        foreach ($this->SubjectConfirmation as $XF) {
            $XF->toXML($BN);
            F6:
        }
        U3:
    }
    private function addConditions(DOMElement $wP)
    {
        $vq = $wP->ownerDocument;
        $s8 = $vq->createElementNS("\x75\x72\x6e\72\157\141\163\x69\x73\72\x6e\x61\x6d\145\163\72\164\143\x3a\x53\101\115\x4c\x3a\62\x2e\x30\72\x61\163\x73\145\x72\164\x69\x6f\x6e", "\163\x61\155\x6c\72\103\157\156\x64\151\164\x69\x6f\x6e\163");
        $wP->appendChild($s8);
        if (!($this->notBefore !== NULL)) {
            goto DD;
        }
        $s8->setAttribute("\116\157\x74\x42\145\x66\157\x72\145", gmdate("\131\55\x6d\x2d\144\x5c\124\x48\x3a\151\x3a\163\x5c\132", $this->notBefore));
        DD:
        if (!($this->notOnOrAfter !== NULL)) {
            goto v2;
        }
        $s8->setAttribute("\116\x6f\164\117\x6e\x4f\162\x41\x66\164\145\x72", gmdate("\131\55\x6d\55\144\134\x54\x48\x3a\151\x3a\163\x5c\x5a", $this->notOnOrAfter));
        v2:
        if (!($this->validAudiences !== NULL)) {
            goto Hz;
        }
        $Dh = $vq->createElementNS("\x75\162\x6e\72\x6f\141\x73\x69\x73\x3a\156\141\155\x65\x73\72\x74\143\x3a\x53\101\x4d\x4c\72\x32\x2e\60\72\141\x73\163\x65\162\164\151\x6f\x6e", "\163\x61\x6d\154\72\x41\x75\x64\151\x65\156\x63\x65\x52\x65\163\164\x72\151\143\164\x69\157\156");
        $s8->appendChild($Dh);
        SAMLSPUtilities::addStrings($Dh, "\x75\x72\156\x3a\x6f\x61\163\151\x73\72\156\x61\x6d\145\163\x3a\164\x63\72\123\101\x4d\x4c\x3a\x32\x2e\x30\72\141\x73\163\x65\162\x74\x69\x6f\156", "\163\x61\155\x6c\x3a\x41\165\144\151\x65\x6e\143\145", FALSE, $this->validAudiences);
        Hz:
    }
    private function addAuthnStatement(DOMElement $wP)
    {
        if (!($this->authnInstant === NULL || $this->authnContextClassRef === NULL && $this->authnContextDecl === NULL && $this->authnContextDeclRef === NULL)) {
            goto eM;
        }
        return;
        eM:
        $vq = $wP->ownerDocument;
        $q9 = $vq->createElementNS("\x75\162\156\x3a\157\141\163\x69\163\x3a\156\141\155\x65\x73\72\164\143\x3a\x53\101\x4d\x4c\x3a\x32\56\60\72\x61\x73\163\x65\162\164\151\x6f\156", "\163\141\155\x6c\72\x41\x75\164\x68\x6e\x53\x74\x61\164\x65\155\x65\156\x74");
        $wP->appendChild($q9);
        $q9->setAttribute("\101\165\x74\150\156\111\x6e\163\x74\x61\156\164", gmdate("\x59\x2d\155\x2d\144\134\124\x48\x3a\x69\72\163\134\132", $this->authnInstant));
        if (!($this->sessionNotOnOrAfter !== NULL)) {
            goto hh;
        }
        $q9->setAttribute("\123\145\163\x73\151\x6f\156\116\x6f\164\117\x6e\117\x72\x41\146\x74\x65\x72", gmdate("\131\x2d\x6d\x2d\x64\134\124\x48\x3a\x69\x3a\x73\134\132", $this->sessionNotOnOrAfter));
        hh:
        if (!($this->sessionIndex !== NULL)) {
            goto nc;
        }
        $q9->setAttribute("\123\145\x73\x73\151\157\x6e\x49\x6e\x64\x65\170", $this->sessionIndex);
        nc:
        $ZO = $vq->createElementNS("\165\x72\156\x3a\x6f\x61\163\x69\163\x3a\156\141\155\145\163\x3a\x74\x63\72\123\101\115\x4c\72\62\x2e\60\72\x61\163\x73\x65\162\164\151\x6f\x6e", "\x73\141\x6d\x6c\x3a\x41\165\x74\150\156\x43\x6f\x6e\x74\x65\170\x74");
        $q9->appendChild($ZO);
        if (empty($this->authnContextClassRef)) {
            goto RV;
        }
        SAMLSPUtilities::addString($ZO, "\165\x72\156\x3a\157\x61\x73\151\x73\x3a\x6e\141\155\x65\163\x3a\x74\143\72\x53\101\115\x4c\x3a\x32\56\60\72\x61\x73\163\x65\162\x74\151\157\156", "\163\x61\x6d\x6c\x3a\101\165\x74\150\x6e\x43\x6f\x6e\x74\145\170\164\x43\x6c\141\163\x73\122\x65\146", $this->authnContextClassRef);
        RV:
        if (empty($this->authnContextDecl)) {
            goto ck;
        }
        $this->authnContextDecl->toXML($ZO);
        ck:
        if (empty($this->authnContextDeclRef)) {
            goto ui;
        }
        SAMLSPUtilities::addString($ZO, "\x75\x72\156\72\157\141\x73\x69\163\72\x6e\141\155\x65\163\72\164\x63\x3a\x53\101\x4d\114\72\62\x2e\x30\x3a\x61\x73\x73\145\162\164\151\157\x6e", "\163\141\155\154\x3a\x41\165\164\150\x6e\103\157\156\164\145\170\x74\104\x65\143\154\122\x65\x66", $this->authnContextDeclRef);
        ui:
        SAMLSPUtilities::addStrings($ZO, "\165\x72\156\72\x6f\x61\x73\151\x73\x3a\156\x61\x6d\145\163\x3a\x74\143\x3a\x53\x41\115\x4c\72\x32\56\x30\x3a\141\163\163\x65\162\164\x69\x6f\156", "\163\x61\155\154\x3a\101\165\164\x68\x65\156\x74\x69\x63\141\x74\x69\156\147\101\x75\164\x68\157\162\x69\164\x79", FALSE, $this->AuthenticatingAuthority);
    }
    private function addAttributeStatement(DOMElement $wP)
    {
        if (!empty($this->attributes)) {
            goto BE;
        }
        return;
        BE:
        $vq = $wP->ownerDocument;
        $JC = $vq->createElementNS("\x75\x72\x6e\x3a\x6f\141\163\x69\163\72\x6e\141\155\145\x73\x3a\164\x63\72\x53\x41\115\114\x3a\x32\x2e\x30\72\x61\x73\163\145\162\x74\151\157\x6e", "\163\141\x6d\x6c\72\x41\x74\x74\162\x69\142\x75\164\x65\x53\164\141\x74\145\155\x65\156\164");
        $wP->appendChild($JC);
        foreach ($this->attributes as $vd => $o0) {
            $Rj = $vq->createElementNS("\165\162\156\72\157\x61\x73\x69\163\72\x6e\141\x6d\145\163\72\x74\143\x3a\x53\101\x4d\x4c\x3a\x32\x2e\60\x3a\141\163\163\x65\x72\164\151\x6f\x6e", "\163\141\x6d\x6c\72\x41\164\164\162\x69\x62\x75\164\x65");
            $JC->appendChild($Rj);
            $Rj->setAttribute("\116\x61\x6d\x65", $vd);
            if (!($this->nameFormat !== "\165\162\x6e\72\157\141\163\151\163\x3a\x6e\x61\x6d\145\x73\x3a\164\143\x3a\x53\101\115\114\x3a\x32\x2e\x30\x3a\141\164\164\x72\156\141\x6d\145\x2d\146\157\x72\x6d\141\x74\72\165\x6e\x73\160\145\x63\151\x66\151\145\x64")) {
                goto xc;
            }
            $Rj->setAttribute("\x4e\141\x6d\x65\x46\157\162\x6d\x61\164", $this->nameFormat);
            xc:
            foreach ($o0 as $Iy) {
                if (is_string($Iy)) {
                    goto nC;
                }
                if (is_int($Iy)) {
                    goto s3;
                }
                $rj = NULL;
                goto jO;
                nC:
                $rj = "\x78\163\x3a\163\x74\x72\151\x6e\147";
                goto jO;
                s3:
                $rj = "\x78\x73\72\x69\x6e\x74\x65\147\145\x72";
                jO:
                $gK = $vq->createElementNS("\x75\x72\x6e\x3a\x6f\x61\163\x69\163\72\x6e\x61\x6d\145\163\x3a\164\143\x3a\x53\101\x4d\x4c\72\x32\56\60\72\141\163\x73\x65\x72\x74\151\157\156", "\163\141\x6d\x6c\x3a\101\164\x74\x72\151\x62\x75\x74\145\x56\x61\x6c\165\145");
                $Rj->appendChild($gK);
                if (!($rj !== NULL)) {
                    goto Ww;
                }
                $gK->setAttributeNS("\x68\x74\x74\160\72\x2f\57\x77\167\x77\x2e\167\63\56\157\x72\x67\x2f\x32\x30\60\61\57\x58\x4d\114\x53\x63\150\x65\155\141\x2d\x69\x6e\x73\164\x61\x6e\143\145", "\170\x73\151\72\164\x79\x70\145", $rj);
                Ww:
                if (!is_null($Iy)) {
                    goto B7;
                }
                $gK->setAttributeNS("\150\x74\164\x70\x3a\57\x2f\x77\x77\167\56\167\x33\x2e\157\162\x67\57\62\60\60\x31\x2f\x58\x4d\114\123\143\150\145\155\141\x2d\x69\156\163\164\x61\x6e\x63\x65", "\x78\163\x69\72\156\151\x6c", "\x74\162\165\145");
                B7:
                if ($Iy instanceof DOMNodeList) {
                    goto cj;
                }
                $gK->appendChild($vq->createTextNode($Iy));
                goto YY;
                cj:
                $W0 = 0;
                vb:
                if (!($W0 < $Iy->length)) {
                    goto Le;
                }
                $pu = $vq->importNode($Iy->item($W0), TRUE);
                $gK->appendChild($pu);
                Kc:
                $W0++;
                goto vb;
                Le:
                YY:
                Zg:
            }
            ws:
            u8:
        }
        SW:
    }
    private function addEncryptedAttributeStatement(DOMElement $wP)
    {
        if (!($this->requiredEncAttributes == FALSE)) {
            goto rl;
        }
        return;
        rl:
        $vq = $wP->ownerDocument;
        $JC = $vq->createElementNS("\x75\162\x6e\72\157\x61\x73\151\163\x3a\156\141\155\145\x73\72\164\x63\x3a\x53\101\x4d\x4c\72\62\x2e\60\x3a\141\163\x73\145\162\x74\x69\x6f\156", "\x73\141\x6d\154\72\x41\164\164\162\x69\142\x75\x74\x65\x53\164\141\164\x65\x6d\145\156\164");
        $wP->appendChild($JC);
        foreach ($this->attributes as $vd => $o0) {
            $Ef = new DOMDocument();
            $Rj = $Ef->createElementNS("\x75\x72\156\x3a\157\141\x73\151\163\72\x6e\141\x6d\x65\163\x3a\x74\x63\72\123\101\x4d\x4c\x3a\62\x2e\x30\72\141\163\163\x65\x72\164\151\157\x6e", "\163\x61\x6d\154\72\101\x74\164\x72\151\142\x75\164\x65");
            $Rj->setAttribute("\x4e\x61\x6d\x65", $vd);
            $Ef->appendChild($Rj);
            if (!($this->nameFormat !== "\165\x72\156\72\x6f\x61\163\x69\x73\72\156\141\x6d\x65\163\72\x74\143\x3a\123\x41\115\x4c\x3a\62\x2e\60\72\141\164\164\162\156\x61\155\145\55\146\157\x72\x6d\x61\x74\x3a\x75\x6e\x73\160\x65\x63\151\146\x69\x65\x64")) {
                goto Wc;
            }
            $Rj->setAttribute("\x4e\141\155\145\x46\x6f\162\x6d\x61\x74", $this->nameFormat);
            Wc:
            foreach ($o0 as $Iy) {
                if (is_string($Iy)) {
                    goto V6;
                }
                if (is_int($Iy)) {
                    goto kw;
                }
                $rj = NULL;
                goto J2;
                V6:
                $rj = "\x78\x73\x3a\x73\164\162\151\x6e\147";
                goto J2;
                kw:
                $rj = "\x78\163\72\151\156\164\145\x67\145\162";
                J2:
                $gK = $Ef->createElementNS("\x75\162\156\72\157\141\163\151\x73\72\x6e\141\155\x65\163\x3a\x74\143\x3a\123\101\x4d\x4c\72\x32\56\x30\72\x61\x73\163\145\162\164\x69\157\156", "\x73\141\x6d\x6c\x3a\101\x74\164\x72\151\142\165\164\145\126\141\x6c\x75\145");
                $Rj->appendChild($gK);
                if (!($rj !== NULL)) {
                    goto Md;
                }
                $gK->setAttributeNS("\x68\x74\164\x70\72\57\57\x77\x77\x77\56\x77\63\x2e\x6f\162\147\x2f\x32\60\x30\61\x2f\130\x4d\x4c\123\x63\150\145\155\x61\55\x69\x6e\x73\x74\x61\x6e\143\145", "\170\163\x69\72\164\x79\x70\x65", $rj);
                Md:
                if ($Iy instanceof DOMNodeList) {
                    goto EU;
                }
                $gK->appendChild($Ef->createTextNode($Iy));
                goto Bu;
                EU:
                $W0 = 0;
                Tx:
                if (!($W0 < $Iy->length)) {
                    goto Wp;
                }
                $pu = $Ef->importNode($Iy->item($W0), TRUE);
                $gK->appendChild($pu);
                HP:
                $W0++;
                goto Tx;
                Wp:
                Bu:
                BC:
            }
            gU:
            $WH = new XMLSecEnc();
            $WH->setNode($Ef->documentElement);
            $WH->type = "\x68\164\x74\160\72\57\57\167\x77\x77\x2e\167\x33\56\157\x72\147\x2f\x32\x30\x30\61\57\60\64\x2f\170\155\154\x65\x6e\x63\43\105\154\145\155\145\156\164";
            $A2 = new XMLSecurityKey(XMLSecurityKey::AES256_CBC);
            $A2->generateSessionKey();
            $WH->encryptKey($this->encryptionKey, $A2);
            $L0 = $WH->encryptNode($A2);
            $hg = $vq->createElementNS("\x75\x72\x6e\72\x6f\x61\163\x69\163\x3a\x6e\141\155\145\163\72\164\x63\x3a\x53\x41\115\114\72\62\x2e\x30\72\141\x73\x73\145\x72\x74\x69\x6f\x6e", "\163\x61\155\154\72\x45\156\x63\162\171\x70\164\145\144\x41\164\x74\x72\x69\142\165\164\145");
            $JC->appendChild($hg);
            $lI = $vq->importNode($L0, TRUE);
            $hg->appendChild($lI);
            lT:
        }
        a0:
    }
}
