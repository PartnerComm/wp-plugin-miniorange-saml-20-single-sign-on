<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


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
    public function __construct(DOMElement $jn = NULL, $YS)
    {
        $this->id = SAMLSPUtilities::generateId();
        $this->issueInstant = SAMLSPUtilities::generateTimestamp();
        $this->issuer = '';
        $this->authnInstant = SAMLSPUtilities::generateTimestamp();
        $this->attributes = array();
        $this->nameFormat = "\165\162\x6e\72\157\141\x73\151\x73\72\156\141\155\x65\x73\72\x74\x63\x3a\123\x41\115\114\72\x31\x2e\x31\72\x6e\141\x6d\145\151\144\x2d\146\x6f\162\155\141\164\x3a\x75\x6e\163\160\x65\143\x69\146\151\145\144";
        $this->certificates = array();
        $this->AuthenticatingAuthority = array();
        $this->SubjectConfirmation = array();
        if (!($jn === NULL)) {
            goto ks;
        }
        return;
        ks:
        if (!($jn->localName === "\105\156\143\162\x79\160\x74\x65\x64\101\163\x73\x65\x72\x74\x69\x6f\156")) {
            goto ZN;
        }
        $iZ = SAMLSPUtilities::xpQuery($jn, "\56\x2f\x78\145\156\143\x3a\x45\156\x63\x72\171\160\x74\145\144\104\x61\x74\x61");
        $uO = SAMLSPUtilities::xpQuery($jn, "\57\x2f\x2a\x5b\x6c\157\x63\x61\154\55\156\x61\155\x65\x28\51\75\x27\105\156\143\x72\171\x70\x74\x65\144\113\145\x79\47\135\57\x2a\x5b\154\157\x63\x61\154\55\156\x61\155\145\x28\51\75\47\x45\156\143\162\x79\160\164\151\x6f\x6e\x4d\x65\x74\150\x6f\x64\x27\135\57\100\x41\154\147\157\x72\x69\164\150\x6d");
        $YW = $uO[0]->value;
        $qm = SAMLSPUtilities::getEncryptionAlgorithm($YW);
        if (count($iZ) === 0) {
            goto ZH;
        }
        if (count($iZ) > 1) {
            goto RU;
        }
        goto Oj;
        ZH:
        throw new Exception("\x4d\x69\x73\x73\x69\156\147\40\145\x6e\x63\x72\171\x70\164\x65\x64\x20\144\141\x74\141\40\151\x6e\x20\x3c\x73\141\155\x6c\x3a\x45\156\x63\162\x79\160\x74\x65\x64\x41\x73\x73\145\x72\x74\x69\x6f\156\76\56");
        goto Oj;
        RU:
        throw new Exception("\115\157\162\145\x20\164\150\x61\156\40\x6f\x6e\x65\x20\145\156\143\162\x79\160\x74\x65\x64\x20\144\141\164\x61\40\145\154\x65\155\145\x6e\x74\40\x69\x6e\40\74\x73\141\155\154\x3a\x45\x6e\143\162\x79\160\x74\x65\x64\101\163\x73\x65\x72\x74\151\x6f\156\76\56");
        Oj:
        $mr = new XMLSecurityKey($qm, array("\164\x79\160\145" => "\x70\x72\x69\166\x61\x74\x65"));
        $mr->loadKey($YS, FALSE);
        $a6 = array();
        $WF = isset($_POST["\122\x65\154\141\171\123\164\141\164\145"]) ? $_POST["\x52\145\x6c\141\171\x53\x74\141\164\145"] : null;
        $jn = SAMLSPUtilities::decryptElement($iZ[0], $mr, $a6, null, $WF);
        ZN:
        if ($jn->hasAttribute("\x49\x44")) {
            goto dN;
        }
        throw new Exception("\x4d\x69\x73\x73\x69\156\147\40\x49\104\40\141\x74\164\x72\151\142\165\x74\145\40\x6f\x6e\x20\x53\101\115\x4c\x20\141\x73\x73\x65\162\x74\x69\x6f\x6e\56");
        dN:
        $this->id = $jn->getAttribute("\111\104");
        if (!($jn->getAttribute("\x56\145\x72\163\x69\157\156") !== "\x32\56\60")) {
            goto bd;
        }
        throw new Exception("\125\156\x73\165\x70\x70\x6f\x72\164\145\144\40\x76\x65\162\x73\x69\x6f\x6e\x3a\40" . $jn->getAttribute("\126\x65\x72\x73\x69\157\156"));
        bd:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($jn->getAttribute("\111\x73\163\x75\x65\111\x6e\163\164\x61\x6e\x74"));
        $Og = SAMLSPUtilities::xpQuery($jn, "\x2e\x2f\163\141\x6d\x6c\137\141\163\163\145\x72\164\151\x6f\156\72\111\x73\x73\x75\x65\162");
        if (!empty($Og)) {
            goto bS;
        }
        throw new Exception("\115\151\x73\163\151\156\x67\x20\74\163\x61\x6d\x6c\72\x49\x73\163\165\x65\x72\76\40\151\x6e\x20\141\x73\163\145\x72\x74\151\x6f\x6e\x2e");
        bS:
        $this->issuer = trim($Og[0]->textContent);
        $this->parseConditions($jn);
        $this->parseAuthnStatement($jn);
        $this->parseAttributes($jn);
        $this->parseEncryptedAttributes($jn);
        $this->parseSignature($jn);
        $this->parseSubject($jn);
    }
    private function parseSubject(DOMElement $jn)
    {
        $fP = SAMLSPUtilities::xpQuery($jn, "\56\x2f\163\x61\155\154\x5f\141\x73\x73\x65\x72\x74\151\157\156\72\123\165\x62\x6a\x65\x63\x74");
        if (empty($fP)) {
            goto pK;
        }
        if (count($fP) > 1) {
            goto f2;
        }
        goto I8;
        pK:
        return;
        goto I8;
        f2:
        throw new Exception("\115\157\x72\145\x20\x74\150\x61\156\40\x6f\156\145\40\x3c\x73\141\x6d\x6c\72\123\x75\x62\x6a\x65\143\164\x3e\40\x69\x6e\40\74\163\141\155\154\72\101\x73\x73\145\162\x74\x69\x6f\156\76\x2e");
        I8:
        $fP = $fP[0];
        $Ag = SAMLSPUtilities::xpQuery($fP, "\x2e\57\x73\141\155\154\137\x61\x73\x73\x65\162\x74\x69\x6f\156\72\x4e\x61\155\145\x49\104\x20\x7c\40\56\57\x73\141\x6d\x6c\x5f\x61\163\163\x65\162\164\x69\x6f\156\72\105\156\143\x72\171\x70\164\145\144\x49\x44\57\170\145\x6e\x63\72\105\x6e\143\162\171\160\164\x65\x64\104\141\x74\x61");
        if (empty($Ag)) {
            goto wu;
        }
        if (count($Ag) > 1) {
            goto Q3;
        }
        goto iq;
        wu:
        $WF = $_POST["\x52\x65\x6c\x61\171\123\x74\141\164\145"];
        if ($WF === "\164\145\x73\x74\x56\141\154\151\144\141\x74\x65" or $WF === "\x74\145\163\164\116\145\x77\x43\145\x72\164\151\x66\x69\x63\141\x74\x65") {
            goto JL;
        }
        wp_die("\127\145\40\x63\157\165\x6c\144\x20\x6e\157\164\40\163\151\x67\x6e\40\171\x6f\165\x20\x69\156\56\40\120\x6c\x65\141\x73\x65\x20\143\x6f\156\x74\x61\x63\164\40\171\x6f\165\x72\40\141\x64\x6d\151\x6e\151\163\164\162\x61\164\157\x72");
        goto qA;
        JL:
        echo "\74\144\151\x76\x20\163\164\x79\x6c\145\x3d\42\146\157\156\x74\x2d\x66\x61\155\151\154\171\72\103\x61\x6c\x69\142\162\x69\x3b\160\141\x64\144\x69\156\147\72\60\x20\x33\45\x3b\42\x3e";
        echo "\74\x64\x69\x76\x20\x73\164\x79\154\145\x3d\x22\x63\x6f\154\x6f\162\x3a\x20\43\141\71\64\64\x34\x32\x3b\x62\x61\x63\153\x67\162\x6f\165\156\x64\55\x63\x6f\x6c\x6f\162\72\x20\43\x66\62\144\x65\x64\145\73\160\x61\x64\144\x69\x6e\147\72\40\x31\x35\160\x78\73\x6d\141\162\x67\x69\156\x2d\x62\x6f\x74\x74\x6f\155\72\x20\62\x30\x70\170\x3b\x74\145\x78\x74\55\x61\154\x69\x67\x6e\x3a\x63\x65\156\x74\x65\162\x3b\x62\x6f\x72\144\145\162\x3a\x31\160\x78\40\163\157\154\x69\144\x20\x23\x45\66\x42\x33\x42\62\x3b\x66\157\x6e\164\x2d\x73\151\172\x65\x3a\61\x38\160\x74\x3b\42\76\x20\x45\122\122\117\122\74\57\x64\x69\x76\x3e\xd\xa\x20\x20\x20\x20\x20\40\x20\40\x20\40\x20\x3c\144\151\x76\x20\163\x74\171\x6c\x65\x3d\x22\143\157\x6c\x6f\x72\x3a\40\43\141\71\64\x34\64\x32\73\146\x6f\156\164\x2d\x73\x69\x7a\x65\x3a\61\x34\x70\x74\73\x20\155\141\x72\x67\151\156\55\142\157\164\164\157\x6d\x3a\x32\x30\x70\170\x3b\42\x3e\x3c\x70\76\x3c\163\x74\x72\157\156\x67\x3e\x45\x72\162\157\x72\72\x20\74\57\x73\x74\162\157\x6e\147\x3e\x4d\151\163\x73\151\156\147\40\x20\x4e\x61\x6d\145\111\104\40\x6f\x72\40\105\x6e\143\162\x79\x70\164\x65\144\111\x44\40\151\156\40\123\x41\x4d\x4c\40\122\x65\x73\160\157\x6e\163\x65\x2e\74\57\x70\76\15\xa\x20\x20\40\40\40\40\40\40\x20\x20\40\x20\40\40\40\x20\x3c\x70\76\x50\154\145\x61\x73\x65\x20\x63\157\x6e\x74\x61\143\x74\40\171\x6f\x75\162\40\x61\x64\155\x69\156\151\x73\164\x72\141\164\x6f\x72\40\141\x6e\144\40\162\x65\x70\x6f\162\164\40\x74\x68\x65\x20\x66\x6f\x6c\x6c\157\x77\x69\156\x67\40\x65\162\x72\x6f\x72\x3a\74\x2f\x70\76\15\12\40\x20\40\40\x20\40\40\x20\x20\40\40\40\x20\40\40\40\x3c\x70\x3e\74\x73\x74\x72\x6f\x6e\x67\x3e\x50\x6f\163\x73\x69\142\154\145\40\x43\x61\x75\163\x65\x3a\x3c\x2f\163\x74\x72\157\156\x67\x3e\40\116\141\x6d\145\x49\104\x20\x6e\x6f\164\40\146\157\165\x6e\144\x20\151\156\x20\x53\x41\x4d\x4c\40\122\145\163\160\x6f\156\163\145\40\x73\165\x62\152\145\x63\164\x2e\x3c\57\x70\x3e\xd\xa\40\x20\40\x20\40\40\40\40\x20\x20\x20\x20\x20\x20\40\x20\x3c\57\x64\151\x76\x3e\xd\xa\40\40\x20\40\x20\x20\40\40\x20\40\x20\40\x20\x20\40\x20\x3c\144\x69\x76\40\163\x74\171\154\145\x3d\x22\155\x61\x72\x67\x69\x6e\x3a\63\45\x3b\144\x69\x73\x70\154\141\171\x3a\x62\x6c\157\143\153\73\164\x65\x78\x74\55\x61\154\x69\x67\x6e\72\143\x65\156\x74\145\162\73\42\76\xd\xa\x20\x20\x20\x20\40\x20\x20\x20\40\40\40\x20\x20\40\40\x20\x3c\144\x69\166\x20\163\164\171\154\145\75\x22\x6d\141\162\147\x69\x6e\72\x33\x25\73\x64\x69\x73\160\x6c\141\171\x3a\142\x6c\157\x63\x6b\x3b\164\145\170\x74\x2d\x61\x6c\151\x67\x6e\72\x63\x65\156\164\145\162\73\x22\76\x3c\151\156\x70\x75\164\x20\163\164\x79\x6c\145\75\x22\x70\141\x64\x64\151\156\x67\x3a\61\x25\x3b\x77\151\144\164\x68\x3a\x31\60\60\x70\x78\x3b\142\141\x63\153\x67\162\x6f\165\x6e\144\72\40\43\x30\60\71\61\103\x44\40\x6e\157\x6e\x65\x20\x72\x65\x70\x65\141\164\x20\x73\143\x72\157\x6c\x6c\40\60\x25\40\x30\x25\x3b\x63\165\x72\163\157\x72\72\40\160\157\151\156\x74\x65\162\73\x66\x6f\x6e\164\55\x73\x69\x7a\x65\x3a\x31\x35\x70\x78\x3b\x62\x6f\162\x64\x65\x72\55\x77\151\x64\x74\150\x3a\x20\61\x70\x78\x3b\x62\157\162\144\145\x72\x2d\163\164\171\x6c\x65\x3a\x20\x73\x6f\x6c\x69\144\73\x62\157\162\144\x65\162\55\x72\x61\x64\x69\x75\163\72\x20\63\x70\x78\x3b\x77\x68\x69\164\145\x2d\x73\x70\141\143\145\x3a\40\156\x6f\x77\162\x61\160\73\x62\x6f\x78\x2d\163\x69\x7a\151\x6e\x67\72\x20\x62\x6f\x72\144\x65\x72\55\x62\x6f\x78\73\x62\x6f\x72\144\145\x72\55\143\x6f\154\157\162\72\40\43\60\60\67\63\101\x41\x3b\x62\157\170\x2d\x73\x68\141\x64\157\167\x3a\40\x30\x70\x78\40\61\160\170\40\x30\160\170\40\x72\147\x62\141\50\x31\62\60\54\x20\62\x30\x30\54\40\x32\x33\x30\x2c\x20\x30\56\x36\51\40\151\156\x73\x65\x74\73\143\x6f\x6c\x6f\162\72\40\x23\106\106\x46\x3b\x22\x74\171\x70\x65\75\42\142\x75\x74\164\x6f\156\x22\40\166\x61\154\x75\145\x3d\42\x44\157\x6e\145\x22\x20\x6f\156\x43\x6c\x69\x63\x6b\75\42\163\x65\154\146\x2e\x63\x6c\157\x73\x65\50\x29\x3b\42\x3e\x3c\x2f\144\x69\166\x3e";
        exit;
        qA:
        goto iq;
        Q3:
        throw new Exception("\115\157\162\x65\x20\x74\x68\x61\156\x20\157\156\145\x20\74\163\141\155\154\x3a\116\x61\155\145\x49\104\76\40\x6f\x72\x20\x3c\x73\x61\155\154\72\105\x6e\143\x72\171\160\164\x65\x64\104\x3e\40\x69\x6e\x20\74\163\141\155\x6c\x3a\123\x75\x62\x6a\x65\143\x74\76\x2e");
        iq:
        $Ag = $Ag[0];
        if ($Ag->localName === "\105\x6e\143\x72\171\x70\164\x65\144\x44\x61\164\x61") {
            goto Ga;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($Ag);
        goto y2;
        Ga:
        $this->encryptedNameId = $Ag;
        y2:
    }
    private function parseConditions(DOMElement $jn)
    {
        $yD = SAMLSPUtilities::xpQuery($jn, "\56\x2f\163\141\155\x6c\x5f\141\x73\163\x65\162\x74\151\x6f\156\x3a\x43\x6f\156\144\151\164\x69\x6f\156\x73");
        if (empty($yD)) {
            goto Df;
        }
        if (count($yD) > 1) {
            goto jv;
        }
        goto K9;
        Df:
        return;
        goto K9;
        jv:
        throw new Exception("\x4d\157\162\x65\x20\164\x68\x61\x6e\40\157\x6e\145\x20\74\x73\141\x6d\x6c\x3a\103\x6f\x6e\x64\151\164\151\x6f\x6e\x73\76\40\151\x6e\x20\x3c\x73\x61\155\154\72\101\163\163\145\162\164\x69\157\156\x3e\x2e");
        K9:
        $yD = $yD[0];
        if (!$yD->hasAttribute("\x4e\x6f\164\102\145\146\157\162\x65")) {
            goto qM;
        }
        $UX = SAMLSPUtilities::xsDateTimeToTimestamp($yD->getAttribute("\116\157\x74\x42\145\x66\157\x72\145"));
        if (!($this->notBefore === NULL || $this->notBefore < $UX)) {
            goto bE;
        }
        $this->notBefore = $UX;
        bE:
        qM:
        if (!$yD->hasAttribute("\x4e\157\x74\x4f\156\x4f\x72\101\x66\x74\145\x72")) {
            goto H6;
        }
        $WB = SAMLSPUtilities::xsDateTimeToTimestamp($yD->getAttribute("\116\x6f\x74\x4f\156\117\x72\101\146\x74\145\x72"));
        if (!($this->notOnOrAfter === NULL || $this->notOnOrAfter > $WB)) {
            goto iK;
        }
        $this->notOnOrAfter = $WB;
        iK:
        H6:
        $XX = $yD->firstChild;
        qc:
        if (!($XX !== NULL)) {
            goto RN;
        }
        if (!$XX instanceof DOMText) {
            goto L_;
        }
        goto M3;
        L_:
        if (!($XX->namespaceURI !== "\x75\x72\x6e\x3a\x6f\x61\x73\151\163\72\156\x61\x6d\145\163\x3a\x74\x63\72\123\101\115\x4c\x3a\x32\56\x30\72\x61\x73\163\145\162\x74\151\157\156")) {
            goto E9;
        }
        throw new Exception("\125\x6e\x6b\156\x6f\x77\156\40\156\x61\155\145\163\x70\x61\x63\145\x20\157\x66\40\143\157\x6e\144\x69\x74\x69\x6f\x6e\x3a\40" . var_export($XX->namespaceURI, TRUE));
        E9:
        switch ($XX->localName) {
            case "\101\x75\x64\151\x65\156\x63\145\x52\x65\x73\x74\162\x69\x63\x74\x69\x6f\x6e":
                $Hy = SAMLSPUtilities::extractStrings($XX, "\x75\162\x6e\72\157\141\163\x69\163\72\x6e\141\x6d\x65\163\72\x74\x63\72\123\x41\115\114\72\x32\56\60\x3a\141\x73\x73\x65\162\x74\151\157\x6e", "\101\x75\x64\151\145\156\143\x65");
                if ($this->validAudiences === NULL) {
                    goto Pa;
                }
                $this->validAudiences = array_intersect($this->validAudiences, $Hy);
                goto bH;
                Pa:
                $this->validAudiences = $Hy;
                bH:
                goto Zc;
            case "\117\156\x65\124\151\155\x65\x55\x73\x65":
                goto Zc;
            case "\120\x72\157\170\x79\122\145\163\164\162\x69\x63\164\x69\157\156":
                goto Zc;
            default:
                throw new Exception("\x55\x6e\153\x6e\x6f\167\156\40\143\x6f\156\144\151\164\151\157\x6e\x3a\x20" . var_export($XX->localName, TRUE));
        }
        rA:
        Zc:
        M3:
        $XX = $XX->nextSibling;
        goto qc;
        RN:
    }
    private function parseAuthnStatement(DOMElement $jn)
    {
        $cB = SAMLSPUtilities::xpQuery($jn, "\56\x2f\x73\141\155\154\x5f\141\163\163\145\x72\164\x69\157\156\x3a\101\x75\164\150\156\x53\164\141\164\x65\155\145\x6e\x74");
        if (empty($cB)) {
            goto OA;
        }
        if (count($cB) > 1) {
            goto ld;
        }
        goto BK;
        OA:
        $this->authnInstant = NULL;
        return;
        goto BK;
        ld:
        throw new Exception("\115\x6f\162\145\x20\164\150\141\164\40\x6f\x6e\x65\x20\x3c\x73\x61\x6d\154\72\101\x75\164\x68\x6e\123\164\x61\x74\145\155\145\156\164\x3e\40\x69\x6e\x20\74\163\141\155\x6c\x3a\101\163\163\145\162\164\x69\x6f\156\76\40\x6e\x6f\x74\x20\x73\x75\160\x70\157\x72\x74\x65\x64\x2e");
        BK:
        $rz = $cB[0];
        if ($rz->hasAttribute("\x41\x75\x74\x68\x6e\111\156\163\164\x61\x6e\x74")) {
            goto ny;
        }
        throw new Exception("\x4d\151\163\x73\151\156\147\40\x72\145\x71\x75\x69\162\145\144\x20\101\165\x74\x68\156\111\x6e\x73\x74\x61\156\x74\x20\141\164\x74\x72\151\x62\x75\x74\x65\40\157\156\40\x3c\x73\x61\x6d\154\x3a\101\165\x74\x68\x6e\123\x74\141\x74\x65\155\145\156\164\x3e\56");
        ny:
        $this->authnInstant = SAMLSPUtilities::xsDateTimeToTimestamp($rz->getAttribute("\x41\165\164\x68\156\x49\156\163\164\x61\156\164"));
        if (!$rz->hasAttribute("\x53\145\x73\x73\151\x6f\x6e\x4e\157\x74\117\x6e\117\162\x41\x66\164\x65\162")) {
            goto vT;
        }
        $this->sessionNotOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($rz->getAttribute("\123\x65\163\163\151\157\156\116\x6f\x74\x4f\156\x4f\x72\101\x66\x74\145\x72"));
        vT:
        if (!$rz->hasAttribute("\x53\x65\163\x73\151\157\156\111\156\x64\145\x78")) {
            goto tA;
        }
        $this->sessionIndex = $rz->getAttribute("\x53\x65\163\163\x69\x6f\x6e\x49\x6e\144\x65\170");
        tA:
        $this->parseAuthnContext($rz);
    }
    private function parseAuthnContext(DOMElement $ks)
    {
        $lv = SAMLSPUtilities::xpQuery($ks, "\x2e\57\x73\x61\155\x6c\x5f\x61\x73\x73\x65\162\x74\151\x6f\156\x3a\101\165\164\150\x6e\103\157\156\x74\145\x78\x74");
        if (count($lv) > 1) {
            goto j8;
        }
        if (empty($lv)) {
            goto Bt;
        }
        goto VY;
        j8:
        throw new Exception("\115\x6f\x72\x65\40\164\x68\141\x6e\40\x6f\156\x65\40\74\x73\x61\x6d\154\x3a\101\165\x74\150\x6e\x43\157\156\x74\145\x78\164\76\x20\x69\x6e\40\x3c\x73\x61\x6d\x6c\72\x41\165\164\x68\x6e\x53\164\x61\164\145\x6d\x65\x6e\164\x3e\x2e");
        goto VY;
        Bt:
        throw new Exception("\115\x69\163\163\x69\156\x67\x20\x72\145\161\x75\151\162\x65\144\x20\74\163\x61\x6d\x6c\x3a\101\x75\x74\150\156\x43\x6f\x6e\164\145\x78\164\x3e\40\151\156\40\x3c\x73\x61\155\x6c\x3a\101\x75\164\x68\156\x53\164\x61\164\x65\155\145\x6e\164\x3e\56");
        VY:
        $Iv = $lv[0];
        $dR = SAMLSPUtilities::xpQuery($Iv, "\x2e\x2f\163\141\155\154\x5f\x61\x73\163\x65\162\164\x69\x6f\156\72\x41\x75\x74\x68\x6e\x43\157\156\164\x65\170\164\104\145\x63\x6c\122\145\x66");
        if (count($dR) > 1) {
            goto zP;
        }
        if (count($dR) === 1) {
            goto E_;
        }
        goto gp;
        zP:
        throw new Exception("\x4d\157\162\x65\40\164\150\141\156\40\157\156\145\40\74\x73\x61\x6d\154\x3a\101\165\164\150\x6e\x43\157\x6e\x74\x65\x78\164\104\145\x63\154\122\145\146\x3e\40\146\157\x75\156\x64\x3f");
        goto gp;
        E_:
        $this->setAuthnContextDeclRef(trim($dR[0]->textContent));
        gp:
        $v_ = SAMLSPUtilities::xpQuery($Iv, "\56\57\163\x61\155\x6c\137\x61\x73\x73\x65\x72\x74\151\x6f\x6e\x3a\101\x75\x74\150\x6e\x43\157\156\164\x65\x78\x74\x44\145\143\154");
        if (count($v_) > 1) {
            goto ce;
        }
        if (count($v_) === 1) {
            goto T_;
        }
        goto yj;
        ce:
        throw new Exception("\x4d\157\x72\x65\40\x74\x68\141\x6e\x20\x6f\156\x65\40\x3c\163\x61\x6d\x6c\x3a\101\165\x74\x68\x6e\103\157\x6e\164\145\170\164\x44\x65\x63\x6c\x3e\x20\x66\x6f\x75\x6e\144\x3f");
        goto yj;
        T_:
        $this->setAuthnContextDecl(new SAML2_XML_Chunk($v_[0]));
        yj:
        $Nh = SAMLSPUtilities::xpQuery($Iv, "\x2e\57\163\141\x6d\154\x5f\141\163\163\145\x72\164\x69\x6f\x6e\x3a\x41\165\164\x68\x6e\x43\157\156\164\145\x78\x74\x43\x6c\x61\163\x73\x52\145\x66");
        if (count($Nh) > 1) {
            goto ID;
        }
        if (count($Nh) === 1) {
            goto dM;
        }
        goto bt;
        ID:
        throw new Exception("\x4d\157\162\145\40\x74\x68\x61\156\40\157\x6e\x65\x20\74\x73\141\155\x6c\x3a\x41\x75\164\150\x6e\103\x6f\156\164\x65\170\x74\103\x6c\141\163\x73\122\x65\146\76\x20\x69\156\x20\74\163\x61\155\x6c\72\x41\x75\x74\150\156\103\157\156\164\145\170\164\x3e\x2e");
        goto bt;
        dM:
        $this->setAuthnContextClassRef(trim($Nh[0]->textContent));
        bt:
        if (!(empty($this->authnContextClassRef) && empty($this->authnContextDecl) && empty($this->authnContextDeclRef))) {
            goto yc;
        }
        throw new Exception("\115\x69\x73\163\x69\x6e\x67\x20\145\x69\164\x68\145\162\x20\74\x73\x61\155\x6c\72\x41\x75\x74\150\156\103\157\156\164\x65\x78\164\x43\154\141\x73\x73\122\145\x66\76\40\157\162\40\x3c\163\141\155\x6c\x3a\101\x75\164\150\156\x43\x6f\156\164\145\x78\164\104\x65\x63\x6c\122\x65\146\76\40\x6f\162\40\x3c\163\141\155\x6c\x3a\101\x75\x74\x68\x6e\103\157\156\164\x65\x78\x74\104\145\143\154\76");
        yc:
        $this->AuthenticatingAuthority = SAMLSPUtilities::extractStrings($Iv, "\165\162\156\72\x6f\141\163\x69\163\x3a\156\x61\x6d\145\x73\72\164\x63\x3a\123\101\115\x4c\x3a\x32\x2e\60\x3a\141\x73\x73\x65\x72\164\x69\157\x6e", "\x41\x75\164\150\145\x6e\x74\151\x63\x61\164\x69\156\x67\101\x75\164\x68\157\x72\151\164\171");
    }
    private function parseAttributes(DOMElement $jn)
    {
        $Ra = TRUE;
        $Ax = SAMLSPUtilities::xpQuery($jn, "\x2e\57\x73\141\155\154\x5f\x61\163\x73\x65\162\x74\x69\x6f\156\x3a\x41\164\x74\162\x69\142\x75\164\145\123\164\x61\x74\x65\155\x65\156\x74\x2f\163\141\155\154\x5f\141\x73\x73\x65\x72\164\151\157\156\72\101\x74\164\x72\151\x62\165\164\145");
        foreach ($Ax as $f7) {
            if ($f7->hasAttribute("\116\x61\x6d\145")) {
                goto r4;
            }
            throw new Exception("\115\x69\163\x73\151\x6e\147\40\156\x61\155\x65\40\157\156\x20\74\x73\141\x6d\154\x3a\x41\x74\164\162\x69\x62\x75\164\145\x3e\x20\145\x6c\145\x6d\145\x6e\164\x2e");
            r4:
            $Zz = $f7->getAttribute("\116\x61\155\145");
            if ($f7->hasAttribute("\116\x61\x6d\145\x46\x6f\x72\155\141\164")) {
                goto va;
            }
            $nr = "\x75\162\x6e\x3a\x6f\141\x73\x69\163\x3a\156\x61\x6d\145\x73\x3a\164\143\x3a\x53\x41\115\114\72\61\x2e\61\x3a\x6e\x61\155\145\151\144\x2d\x66\157\x72\155\141\x74\72\165\156\163\x70\x65\x63\x69\x66\151\145\x64";
            goto bp;
            va:
            $nr = $f7->getAttribute("\116\x61\x6d\x65\106\157\x72\x6d\x61\164");
            bp:
            if ($Ra) {
                goto Xe;
            }
            if (!($this->nameFormat !== $nr)) {
                goto sG;
            }
            $this->nameFormat = "\x75\x72\156\72\157\141\163\151\x73\x3a\156\x61\155\145\163\72\164\143\72\x53\x41\x4d\114\x3a\x31\56\61\72\x6e\141\x6d\x65\151\144\55\146\157\162\x6d\x61\164\72\165\156\163\160\x65\x63\151\146\x69\145\144";
            sG:
            goto tz;
            Xe:
            $this->nameFormat = $nr;
            $Ra = FALSE;
            tz:
            if (isset($this->attributes[$Zz])) {
                goto xL;
            }
            $this->attributes[$Zz] = array();
            xL:
            $o9 = SAMLSPUtilities::xpQuery($f7, "\x2e\x2f\163\x61\155\154\137\x61\163\163\145\162\x74\151\157\156\x3a\x41\x74\164\162\151\x62\x75\164\145\126\141\x6c\x75\x65");
            foreach ($o9 as $Wl) {
                $this->attributes[$Zz][] = trim($Wl->textContent);
                w8:
            }
            eZ:
            bV:
        }
        kD:
    }
    private function parseEncryptedAttributes(DOMElement $jn)
    {
        $this->encryptedAttribute = SAMLSPUtilities::xpQuery($jn, "\56\x2f\x73\x61\x6d\154\137\x61\163\163\x65\162\x74\x69\157\x6e\x3a\101\x74\164\x72\151\x62\x75\x74\145\x53\164\x61\x74\145\155\145\156\164\x2f\163\141\155\154\x5f\x61\163\x73\145\x72\x74\151\157\156\x3a\x45\156\x63\x72\171\160\164\x65\x64\101\x74\x74\x72\151\x62\x75\x74\145");
    }
    private function parseSignature(DOMElement $jn)
    {
        $Uz = SAMLSPUtilities::validateElement($jn);
        if (!($Uz !== FALSE)) {
            goto zx;
        }
        $this->wasSignedAtConstruction = TRUE;
        $this->certificates = $Uz["\x43\145\162\164\x69\146\x69\x63\x61\x74\x65\163"];
        $this->signatureData = $Uz;
        zx:
    }
    public function validate(XMLSecurityKey $mr)
    {
        if (!($this->signatureData === NULL)) {
            goto Pp;
        }
        return FALSE;
        Pp:
        SAMLSPUtilities::validateSignature($this->signatureData, $mr);
        return TRUE;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($Vc)
    {
        $this->id = $Vc;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($ok)
    {
        $this->issueInstant = $ok;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($Og)
    {
        $this->issuer = $Og;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto XX;
        }
        throw new Exception("\101\164\164\145\x6d\160\164\x65\x64\40\164\157\x20\x72\x65\x74\x72\x69\145\x76\x65\40\145\156\143\162\171\x70\164\145\144\40\116\141\x6d\x65\111\x44\40\x77\151\164\x68\x6f\x75\164\40\144\x65\143\162\x79\160\164\x69\x6e\x67\40\151\x74\40\146\x69\162\x73\x74\56");
        XX:
        return $this->nameId;
    }
    public function setNameId($Ag)
    {
        $this->nameId = $Ag;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto kM;
        }
        return TRUE;
        kM:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $mr)
    {
        $GD = new DOMDocument();
        $Z0 = $GD->createElement("\x72\x6f\157\x74");
        $GD->appendChild($Z0);
        SAMLSPUtilities::addNameId($Z0, $this->nameId);
        $Ag = $Z0->firstChild;
        SAMLSPUtilities::getContainer()->debugMessage($Ag, "\145\x6e\x63\162\x79\x70\x74");
        $tM = new XMLSecEnc();
        $tM->setNode($Ag);
        $tM->type = XMLSecEnc::Element;
        $Y0 = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $Y0->generateSessionKey();
        $tM->encryptKey($mr, $Y0);
        $this->encryptedNameId = $tM->encryptNode($Y0);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $mr, array $a6 = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto Yg;
        }
        return;
        Yg:
        $Ag = SAMLSPUtilities::decryptElement($this->encryptedNameId, $mr, $a6);
        SAMLSPUtilities::getContainer()->debugMessage($Ag, "\144\x65\x63\x72\x79\x70\x74");
        $this->nameId = SAMLSPUtilities::parseNameId($Ag);
        $this->encryptedNameId = NULL;
    }
    public function decryptAttributes(XMLSecurityKey $mr, array $a6 = array())
    {
        if (!($this->encryptedAttribute === NULL)) {
            goto aB;
        }
        return;
        aB:
        $Ra = TRUE;
        $Ax = $this->encryptedAttribute;
        foreach ($Ax as $VR) {
            $f7 = SAMLSPUtilities::decryptElement($VR->getElementsByTagName("\x45\x6e\x63\x72\x79\x70\x74\145\x64\x44\x61\x74\141")->item(0), $mr, $a6);
            if ($f7->hasAttribute("\116\x61\x6d\145")) {
                goto Ir;
            }
            throw new Exception("\x4d\x69\x73\163\x69\156\x67\40\156\x61\155\x65\40\157\x6e\40\x3c\163\x61\x6d\x6c\x3a\x41\164\x74\162\151\142\165\x74\x65\76\x20\x65\x6c\x65\x6d\x65\x6e\164\56");
            Ir:
            $Zz = $f7->getAttribute("\116\x61\x6d\145");
            if ($f7->hasAttribute("\x4e\x61\x6d\x65\x46\157\162\x6d\141\x74")) {
                goto Je;
            }
            $nr = "\x75\x72\156\72\x6f\x61\163\x69\x73\72\156\141\x6d\x65\163\72\164\x63\72\x53\x41\115\114\72\x32\x2e\x30\x3a\141\164\164\x72\156\141\155\x65\x2d\x66\157\162\x6d\141\x74\72\x75\x6e\163\160\x65\143\x69\x66\x69\x65\x64";
            goto VP;
            Je:
            $nr = $f7->getAttribute("\x4e\141\x6d\145\106\157\x72\155\141\x74");
            VP:
            if ($Ra) {
                goto o6;
            }
            if (!($this->nameFormat !== $nr)) {
                goto nM;
            }
            $this->nameFormat = "\x75\162\x6e\x3a\x6f\x61\163\x69\x73\x3a\x6e\141\155\x65\x73\x3a\164\143\x3a\x53\x41\115\114\72\62\x2e\x30\72\x61\164\x74\162\156\141\155\145\55\146\157\x72\155\x61\164\x3a\x75\x6e\163\x70\145\x63\x69\x66\x69\145\144";
            nM:
            goto vb;
            o6:
            $this->nameFormat = $nr;
            $Ra = FALSE;
            vb:
            if (isset($this->attributes[$Zz])) {
                goto XM;
            }
            $this->attributes[$Zz] = array();
            XM:
            $o9 = SAMLSPUtilities::xpQuery($f7, "\56\57\x73\x61\x6d\x6c\137\141\163\163\145\162\x74\151\157\x6e\x3a\x41\164\x74\x72\x69\x62\x75\x74\x65\126\x61\x6c\165\145");
            foreach ($o9 as $Wl) {
                $this->attributes[$Zz][] = trim($Wl->textContent);
                RZ:
            }
            nD:
            yD:
        }
        sl:
    }
    public function getNotBefore()
    {
        return $this->notBefore;
    }
    public function setNotBefore($UX)
    {
        $this->notBefore = $UX;
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($WB)
    {
        $this->notOnOrAfter = $WB;
    }
    public function setEncryptedAttributes($jf)
    {
        $this->requiredEncAttributes = $jf;
    }
    public function getValidAudiences()
    {
        return $this->validAudiences;
    }
    public function setValidAudiences(array $qc = NULL)
    {
        $this->validAudiences = $qc;
    }
    public function getAuthnInstant()
    {
        return $this->authnInstant;
    }
    public function setAuthnInstant($iQ)
    {
        $this->authnInstant = $iQ;
    }
    public function getSessionNotOnOrAfter()
    {
        return $this->sessionNotOnOrAfter;
    }
    public function setSessionNotOnOrAfter($ly)
    {
        $this->sessionNotOnOrAfter = $ly;
    }
    public function getSessionIndex()
    {
        return $this->sessionIndex;
    }
    public function setSessionIndex($bZ)
    {
        $this->sessionIndex = $bZ;
    }
    public function getAuthnContext()
    {
        if (empty($this->authnContextClassRef)) {
            goto ub;
        }
        return $this->authnContextClassRef;
        ub:
        if (empty($this->authnContextDeclRef)) {
            goto yb;
        }
        return $this->authnContextDeclRef;
        yb:
        return NULL;
    }
    public function setAuthnContext($S_)
    {
        $this->setAuthnContextClassRef($S_);
    }
    public function getAuthnContextClassRef()
    {
        return $this->authnContextClassRef;
    }
    public function setAuthnContextClassRef($E5)
    {
        $this->authnContextClassRef = $E5;
    }
    public function setAuthnContextDecl(SAML2_XML_Chunk $b9)
    {
        if (empty($this->authnContextDeclRef)) {
            goto pO;
        }
        throw new Exception("\101\x75\x74\x68\156\x43\157\x6e\164\145\x78\x74\104\x65\143\154\x52\x65\x66\x20\151\163\x20\141\154\162\x65\x61\x64\171\x20\x72\x65\x67\151\x73\x74\x65\162\x65\x64\41\40\115\x61\x79\x20\157\156\154\171\40\x68\x61\x76\x65\40\x65\x69\164\150\145\x72\x20\x61\40\104\x65\143\154\40\x6f\162\x20\141\x20\x44\145\143\x6c\x52\x65\x66\54\x20\156\x6f\164\x20\142\157\x74\150\x21");
        pO:
        $this->authnContextDecl = $b9;
    }
    public function getAuthnContextDecl()
    {
        return $this->authnContextDecl;
    }
    public function setAuthnContextDeclRef($RQ)
    {
        if (empty($this->authnContextDecl)) {
            goto x9;
        }
        throw new Exception("\101\165\164\x68\x6e\x43\x6f\156\x74\x65\x78\x74\104\x65\x63\154\40\x69\163\40\141\x6c\162\145\141\x64\x79\40\x72\x65\147\x69\163\164\x65\x72\145\x64\41\40\x4d\141\171\40\x6f\156\x6c\x79\40\x68\x61\166\x65\40\x65\x69\x74\150\x65\162\40\141\40\104\x65\x63\x6c\40\x6f\162\x20\141\x20\x44\x65\x63\154\122\x65\x66\54\x20\x6e\157\x74\x20\x62\157\x74\150\x21");
        x9:
        $this->authnContextDeclRef = $RQ;
    }
    public function getAuthnContextDeclRef()
    {
        return $this->authnContextDeclRef;
    }
    public function getAuthenticatingAuthority()
    {
        return $this->AuthenticatingAuthority;
    }
    public function setAuthenticatingAuthority($nZ)
    {
        $this->AuthenticatingAuthority = $nZ;
    }
    public function getAttributes()
    {
        return $this->attributes;
    }
    public function setAttributes(array $Ax)
    {
        $this->attributes = $Ax;
    }
    public function getAttributeNameFormat()
    {
        return $this->nameFormat;
    }
    public function setAttributeNameFormat($nr)
    {
        $this->nameFormat = $nr;
    }
    public function getSubjectConfirmation()
    {
        return $this->SubjectConfirmation;
    }
    public function setSubjectConfirmation(array $IL)
    {
        $this->SubjectConfirmation = $IL;
    }
    public function getSignatureKey()
    {
        return $this->signatureKey;
    }
    public function setSignatureKey(XMLsecurityKey $ai = NULL)
    {
        $this->signatureKey = $ai;
    }
    public function getEncryptionKey()
    {
        return $this->encryptionKey;
    }
    public function setEncryptionKey(XMLSecurityKey $EG = NULL)
    {
        $this->encryptionKey = $EG;
    }
    public function setCertificates(array $GU)
    {
        $this->certificates = $GU;
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
    public function toXML(DOMNode $es = NULL)
    {
        if ($es === NULL) {
            goto ah;
        }
        $tR = $es->ownerDocument;
        goto Jy;
        ah:
        $tR = new DOMDocument();
        $es = $tR;
        Jy:
        $Z0 = $tR->createElementNS("\x75\162\156\x3a\157\141\x73\151\163\72\x6e\141\x6d\x65\163\x3a\164\143\x3a\123\x41\115\114\x3a\x32\56\60\x3a\x61\163\x73\x65\x72\164\x69\157\x6e", "\x73\x61\x6d\154\72" . "\x41\x73\x73\145\x72\x74\151\157\x6e");
        $es->appendChild($Z0);
        $Z0->setAttributeNS("\165\x72\156\72\x6f\141\163\x69\x73\x3a\x6e\x61\x6d\x65\163\72\x74\143\72\123\101\115\114\72\62\x2e\x30\72\x70\162\157\164\x6f\143\x6f\x6c", "\x73\141\x6d\x6c\x70\x3a\x74\155\x70", "\x74\x6d\x70");
        $Z0->removeAttributeNS("\165\x72\156\72\x6f\141\x73\151\x73\72\x6e\x61\155\145\x73\x3a\x74\x63\x3a\123\101\x4d\x4c\72\62\56\x30\x3a\160\162\157\x74\x6f\x63\157\x6c", "\164\x6d\160");
        $Z0->setAttributeNS("\150\164\x74\160\72\57\57\167\167\167\56\167\x33\56\157\162\147\57\x32\60\60\x31\57\x58\115\x4c\x53\x63\150\145\x6d\x61\x2d\x69\156\163\164\141\x6e\x63\145", "\170\163\x69\72\x74\x6d\160", "\x74\155\x70");
        $Z0->removeAttributeNS("\x68\x74\164\160\72\x2f\x2f\167\167\167\x2e\167\63\x2e\x6f\x72\147\57\62\x30\x30\x31\x2f\x58\x4d\x4c\x53\143\x68\x65\x6d\x61\x2d\151\156\x73\x74\x61\x6e\143\x65", "\x74\155\160");
        $Z0->setAttributeNS("\150\164\x74\160\x3a\x2f\57\x77\x77\167\56\x77\63\56\157\x72\147\x2f\x32\60\x30\61\57\130\x4d\x4c\x53\143\x68\x65\155\141", "\170\x73\x3a\x74\x6d\160", "\x74\155\x70");
        $Z0->removeAttributeNS("\150\164\x74\x70\72\x2f\57\167\x77\167\56\167\63\x2e\x6f\x72\x67\57\62\60\60\61\x2f\130\115\x4c\x53\x63\x68\x65\155\x61", "\164\x6d\x70");
        $Z0->setAttribute("\x49\104", $this->id);
        $Z0->setAttribute("\126\145\x72\163\x69\157\156", "\62\x2e\x30");
        $Z0->setAttribute("\111\x73\x73\x75\145\x49\x6e\163\x74\x61\x6e\x74", gmdate("\x59\x2d\x6d\x2d\144\x5c\x54\110\x3a\151\72\163\134\x5a", $this->issueInstant));
        $Og = SAMLSPUtilities::addString($Z0, "\165\162\156\x3a\157\141\x73\151\x73\x3a\156\x61\155\x65\x73\72\x74\x63\x3a\x53\x41\x4d\114\x3a\62\x2e\60\72\x61\x73\x73\x65\x72\164\151\157\156", "\163\141\x6d\154\x3a\111\x73\163\165\x65\162", $this->issuer);
        $this->addSubject($Z0);
        $this->addConditions($Z0);
        $this->addAuthnStatement($Z0);
        if ($this->requiredEncAttributes == FALSE) {
            goto Ol;
        }
        $this->addEncryptedAttributeStatement($Z0);
        goto bY;
        Ol:
        $this->addAttributeStatement($Z0);
        bY:
        if (!($this->signatureKey !== NULL)) {
            goto gN;
        }
        SAMLSPUtilities::insertSignature($this->signatureKey, $this->certificates, $Z0, $Og->nextSibling);
        gN:
        return $Z0;
    }
    private function addSubject(DOMElement $Z0)
    {
        if (!($this->nameId === NULL && $this->encryptedNameId === NULL)) {
            goto zD;
        }
        return;
        zD:
        $fP = $Z0->ownerDocument->createElementNS("\x75\162\156\72\157\141\x73\151\x73\72\x6e\141\x6d\x65\163\72\x74\x63\72\123\x41\115\x4c\72\x32\x2e\x30\72\x61\x73\163\145\162\164\x69\x6f\156", "\x73\141\155\154\x3a\x53\x75\x62\152\145\x63\x74");
        $Z0->appendChild($fP);
        if ($this->encryptedNameId === NULL) {
            goto Tp;
        }
        $MT = $fP->ownerDocument->createElementNS("\x75\162\156\72\x6f\x61\x73\x69\163\x3a\156\141\155\x65\x73\x3a\164\143\72\x53\x41\x4d\114\72\62\56\x30\x3a\141\163\163\145\x72\x74\151\157\x6e", "\x73\x61\155\x6c\72" . "\105\x6e\x63\162\171\160\164\x65\x64\111\104");
        $fP->appendChild($MT);
        $MT->appendChild($fP->ownerDocument->importNode($this->encryptedNameId, TRUE));
        goto gP;
        Tp:
        SAMLSPUtilities::addNameId($fP, $this->nameId);
        gP:
        foreach ($this->SubjectConfirmation as $GS) {
            $GS->toXML($fP);
            PU:
        }
        nI:
    }
    private function addConditions(DOMElement $Z0)
    {
        $tR = $Z0->ownerDocument;
        $yD = $tR->createElementNS("\165\162\x6e\72\157\141\163\151\163\x3a\156\x61\x6d\x65\163\x3a\164\x63\x3a\x53\x41\x4d\114\x3a\62\56\60\x3a\141\163\x73\145\162\x74\x69\157\156", "\x73\x61\x6d\x6c\x3a\103\157\x6e\144\151\x74\x69\x6f\x6e\163");
        $Z0->appendChild($yD);
        if (!($this->notBefore !== NULL)) {
            goto PJ;
        }
        $yD->setAttribute("\116\157\164\102\145\146\x6f\162\x65", gmdate("\131\x2d\x6d\55\x64\x5c\x54\110\72\x69\72\163\134\132", $this->notBefore));
        PJ:
        if (!($this->notOnOrAfter !== NULL)) {
            goto Ux;
        }
        $yD->setAttribute("\x4e\x6f\x74\x4f\156\117\162\x41\146\164\x65\162", gmdate("\131\x2d\x6d\55\x64\134\x54\110\x3a\151\x3a\163\x5c\x5a", $this->notOnOrAfter));
        Ux:
        if (!($this->validAudiences !== NULL)) {
            goto sj;
        }
        $R5 = $tR->createElementNS("\x75\x72\x6e\x3a\x6f\x61\x73\x69\x73\72\156\x61\x6d\x65\x73\72\164\143\72\123\101\115\114\72\62\56\60\72\x61\x73\x73\145\162\x74\151\x6f\156", "\x73\141\x6d\x6c\72\101\x75\x64\x69\145\156\143\x65\x52\x65\163\x74\x72\x69\x63\164\151\157\x6e");
        $yD->appendChild($R5);
        SAMLSPUtilities::addStrings($R5, "\x75\x72\156\72\157\141\163\151\163\72\156\x61\x6d\145\x73\72\x74\x63\72\x53\101\x4d\114\72\62\56\60\72\141\163\x73\x65\x72\x74\x69\x6f\x6e", "\x73\141\155\154\72\x41\x75\x64\x69\145\x6e\x63\145", FALSE, $this->validAudiences);
        sj:
    }
    private function addAuthnStatement(DOMElement $Z0)
    {
        if (!($this->authnInstant === NULL || $this->authnContextClassRef === NULL && $this->authnContextDecl === NULL && $this->authnContextDeclRef === NULL)) {
            goto sP;
        }
        return;
        sP:
        $tR = $Z0->ownerDocument;
        $ks = $tR->createElementNS("\165\x72\x6e\x3a\157\x61\x73\x69\163\x3a\156\141\x6d\145\163\x3a\164\x63\x3a\x53\101\115\114\72\62\56\60\72\141\x73\163\x65\162\164\151\x6f\156", "\163\141\155\x6c\72\x41\165\164\x68\156\x53\x74\141\164\x65\x6d\145\x6e\x74");
        $Z0->appendChild($ks);
        $ks->setAttribute("\x41\165\x74\x68\x6e\111\x6e\x73\x74\141\156\x74", gmdate("\x59\x2d\155\55\144\x5c\x54\x48\72\151\72\x73\x5c\x5a", $this->authnInstant));
        if (!($this->sessionNotOnOrAfter !== NULL)) {
            goto gz;
        }
        $ks->setAttribute("\x53\x65\x73\163\151\157\156\x4e\x6f\164\117\156\117\x72\x41\x66\x74\145\162", gmdate("\131\x2d\155\55\144\x5c\x54\110\x3a\x69\72\163\134\x5a", $this->sessionNotOnOrAfter));
        gz:
        if (!($this->sessionIndex !== NULL)) {
            goto Gk;
        }
        $ks->setAttribute("\123\145\163\x73\x69\157\156\111\156\144\x65\170", $this->sessionIndex);
        Gk:
        $Iv = $tR->createElementNS("\165\x72\156\x3a\x6f\141\163\151\x73\72\156\x61\x6d\x65\163\72\164\x63\x3a\x53\101\115\x4c\72\62\56\x30\x3a\x61\x73\x73\x65\162\164\151\x6f\156", "\x73\x61\x6d\154\72\101\x75\164\150\x6e\103\x6f\x6e\x74\145\x78\164");
        $ks->appendChild($Iv);
        if (empty($this->authnContextClassRef)) {
            goto OP;
        }
        SAMLSPUtilities::addString($Iv, "\x75\162\156\72\x6f\x61\163\151\163\x3a\156\141\155\x65\x73\x3a\x74\x63\72\x53\101\x4d\114\x3a\x32\x2e\x30\x3a\141\163\163\145\x72\164\151\157\156", "\x73\141\x6d\x6c\72\101\x75\x74\150\x6e\103\157\156\x74\145\170\x74\103\154\141\163\x73\122\x65\146", $this->authnContextClassRef);
        OP:
        if (empty($this->authnContextDecl)) {
            goto Qp;
        }
        $this->authnContextDecl->toXML($Iv);
        Qp:
        if (empty($this->authnContextDeclRef)) {
            goto M7;
        }
        SAMLSPUtilities::addString($Iv, "\165\162\156\x3a\157\x61\163\151\x73\72\156\141\155\145\x73\x3a\164\x63\x3a\x53\101\x4d\x4c\72\62\56\x30\x3a\x61\163\163\145\x72\x74\x69\x6f\x6e", "\x73\x61\x6d\x6c\x3a\101\x75\x74\150\156\x43\x6f\156\x74\145\170\x74\104\x65\x63\154\x52\145\x66", $this->authnContextDeclRef);
        M7:
        SAMLSPUtilities::addStrings($Iv, "\x75\162\x6e\x3a\157\x61\163\x69\x73\72\x6e\141\x6d\145\163\72\164\x63\x3a\123\101\115\114\72\62\x2e\60\x3a\141\x73\163\x65\x72\164\x69\x6f\x6e", "\163\141\x6d\154\x3a\101\165\164\150\145\x6e\164\x69\143\141\164\151\156\x67\x41\x75\164\150\x6f\162\151\x74\x79", FALSE, $this->AuthenticatingAuthority);
    }
    private function addAttributeStatement(DOMElement $Z0)
    {
        if (!empty($this->attributes)) {
            goto wy;
        }
        return;
        wy:
        $tR = $Z0->ownerDocument;
        $xO = $tR->createElementNS("\165\162\156\x3a\x6f\141\163\x69\x73\x3a\156\x61\x6d\x65\x73\x3a\x74\143\72\123\101\x4d\114\x3a\62\x2e\60\72\x61\x73\x73\x65\x72\x74\151\157\x6e", "\163\x61\155\154\x3a\x41\164\x74\x72\x69\x62\165\164\x65\x53\164\141\x74\145\155\x65\x6e\x74");
        $Z0->appendChild($xO);
        foreach ($this->attributes as $Zz => $o9) {
            $f7 = $tR->createElementNS("\165\162\x6e\x3a\157\x61\163\151\163\72\x6e\x61\x6d\145\163\72\x74\143\x3a\123\x41\115\x4c\72\62\56\60\72\141\163\163\145\162\164\x69\157\156", "\163\x61\155\x6c\72\101\164\x74\x72\151\142\165\164\145");
            $xO->appendChild($f7);
            $f7->setAttribute("\x4e\141\x6d\x65", $Zz);
            if (!($this->nameFormat !== "\x75\162\x6e\x3a\x6f\x61\163\151\163\x3a\x6e\x61\x6d\145\x73\x3a\164\x63\x3a\x53\101\x4d\x4c\72\62\56\60\72\x61\164\x74\162\x6e\x61\x6d\145\55\146\157\162\155\x61\x74\x3a\x75\156\x73\x70\145\x63\151\x66\x69\x65\x64")) {
                goto xx;
            }
            $f7->setAttribute("\116\141\155\x65\106\x6f\x72\155\x61\x74", $this->nameFormat);
            xx:
            foreach ($o9 as $Wl) {
                if (is_string($Wl)) {
                    goto EZ;
                }
                if (is_int($Wl)) {
                    goto ZV;
                }
                $PU = NULL;
                goto Pz;
                EZ:
                $PU = "\x78\x73\72\x73\164\x72\x69\156\x67";
                goto Pz;
                ZV:
                $PU = "\x78\x73\x3a\151\x6e\164\145\x67\145\162";
                Pz:
                $gK = $tR->createElementNS("\x75\x72\x6e\72\x6f\141\x73\151\163\x3a\156\x61\x6d\145\x73\72\x74\x63\x3a\123\x41\x4d\114\72\x32\56\60\72\x61\163\163\145\162\164\x69\157\156", "\163\141\155\154\72\101\x74\x74\162\151\x62\x75\164\145\x56\x61\x6c\165\145");
                $f7->appendChild($gK);
                if (!($PU !== NULL)) {
                    goto Dr;
                }
                $gK->setAttributeNS("\x68\x74\x74\x70\x3a\57\x2f\167\167\x77\x2e\167\x33\56\x6f\x72\147\x2f\x32\x30\60\x31\57\130\x4d\114\x53\x63\150\x65\x6d\x61\55\x69\x6e\163\164\141\156\143\145", "\x78\163\x69\72\x74\x79\160\145", $PU);
                Dr:
                if (!is_null($Wl)) {
                    goto SK;
                }
                $gK->setAttributeNS("\x68\164\x74\160\72\57\57\167\167\167\56\x77\63\x2e\157\162\x67\x2f\x32\x30\x30\x31\57\130\115\x4c\x53\143\150\145\x6d\141\55\151\x6e\163\x74\141\x6e\x63\x65", "\170\163\x69\72\x6e\x69\x6c", "\164\x72\x75\x65");
                SK:
                if ($Wl instanceof DOMNodeList) {
                    goto Yx;
                }
                $gK->appendChild($tR->createTextNode($Wl));
                goto hU;
                Yx:
                $p0 = 0;
                dv:
                if (!($p0 < $Wl->length)) {
                    goto IC;
                }
                $XX = $tR->importNode($Wl->item($p0), TRUE);
                $gK->appendChild($XX);
                HH:
                $p0++;
                goto dv;
                IC:
                hU:
                br:
            }
            rt:
            Z1:
        }
        XU:
    }
    private function addEncryptedAttributeStatement(DOMElement $Z0)
    {
        if (!($this->requiredEncAttributes == FALSE)) {
            goto Cb;
        }
        return;
        Cb:
        $tR = $Z0->ownerDocument;
        $xO = $tR->createElementNS("\165\x72\x6e\72\157\x61\x73\x69\x73\x3a\x6e\x61\155\x65\163\x3a\164\143\72\x53\101\x4d\114\72\62\56\x30\72\141\x73\163\x65\162\164\x69\x6f\x6e", "\x73\141\155\154\x3a\x41\x74\x74\162\x69\x62\165\164\145\123\164\141\164\x65\x6d\145\156\x74");
        $Z0->appendChild($xO);
        foreach ($this->attributes as $Zz => $o9) {
            $gB = new DOMDocument();
            $f7 = $gB->createElementNS("\x75\162\x6e\x3a\x6f\x61\x73\151\x73\72\x6e\x61\155\145\x73\x3a\164\x63\72\123\101\115\x4c\72\x32\56\60\72\x61\x73\x73\x65\162\164\151\157\156", "\x73\141\155\154\x3a\101\164\x74\162\151\142\x75\x74\145");
            $f7->setAttribute("\x4e\141\x6d\145", $Zz);
            $gB->appendChild($f7);
            if (!($this->nameFormat !== "\165\162\x6e\72\x6f\x61\x73\151\x73\72\156\x61\x6d\x65\x73\72\x74\x63\72\123\101\115\114\72\x32\56\60\72\141\164\x74\x72\156\141\155\x65\55\x66\157\x72\x6d\141\164\72\x75\x6e\163\160\145\143\x69\x66\151\x65\x64")) {
                goto qt;
            }
            $f7->setAttribute("\116\141\155\145\106\x6f\162\x6d\x61\x74", $this->nameFormat);
            qt:
            foreach ($o9 as $Wl) {
                if (is_string($Wl)) {
                    goto E6;
                }
                if (is_int($Wl)) {
                    goto VH;
                }
                $PU = NULL;
                goto S9;
                E6:
                $PU = "\x78\x73\72\x73\164\x72\151\x6e\147";
                goto S9;
                VH:
                $PU = "\170\x73\x3a\151\156\164\145\x67\x65\x72";
                S9:
                $gK = $gB->createElementNS("\x75\162\156\x3a\157\141\x73\151\163\72\156\141\155\145\163\x3a\164\x63\x3a\x53\101\115\114\x3a\62\56\60\x3a\x61\x73\163\145\162\x74\x69\157\x6e", "\163\141\155\x6c\72\101\164\164\x72\x69\142\165\164\145\x56\x61\154\165\145");
                $f7->appendChild($gK);
                if (!($PU !== NULL)) {
                    goto Ym;
                }
                $gK->setAttributeNS("\x68\x74\x74\x70\72\x2f\x2f\x77\x77\167\x2e\x77\63\56\x6f\162\x67\x2f\62\x30\60\61\57\130\115\x4c\x53\143\150\145\x6d\141\x2d\x69\x6e\163\164\141\x6e\x63\x65", "\170\x73\x69\72\x74\x79\x70\x65", $PU);
                Ym:
                if ($Wl instanceof DOMNodeList) {
                    goto xf;
                }
                $gK->appendChild($gB->createTextNode($Wl));
                goto Tg;
                xf:
                $p0 = 0;
                dr:
                if (!($p0 < $Wl->length)) {
                    goto XV;
                }
                $XX = $gB->importNode($Wl->item($p0), TRUE);
                $gK->appendChild($XX);
                u3:
                $p0++;
                goto dr;
                XV:
                Tg:
                ZD:
            }
            AJ:
            $QX = new XMLSecEnc();
            $QX->setNode($gB->documentElement);
            $QX->type = "\x68\x74\164\x70\72\57\x2f\167\x77\167\56\x77\63\56\x6f\x72\147\57\x32\x30\x30\x31\x2f\60\64\57\170\155\x6c\x65\156\x63\43\105\154\x65\155\145\156\x74";
            $Y0 = new XMLSecurityKey(XMLSecurityKey::AES256_CBC);
            $Y0->generateSessionKey();
            $QX->encryptKey($this->encryptionKey, $Y0);
            $m2 = $QX->encryptNode($Y0);
            $KC = $tR->createElementNS("\x75\162\x6e\x3a\x6f\x61\x73\x69\163\x3a\x6e\141\x6d\145\163\72\x74\x63\x3a\123\x41\x4d\114\x3a\x32\x2e\60\x3a\141\x73\x73\x65\162\164\151\157\156", "\x73\141\155\x6c\72\105\156\143\x72\171\160\x74\x65\144\101\164\164\162\151\x62\165\164\x65");
            $xO->appendChild($KC);
            $aC = $tR->importNode($m2, TRUE);
            $KC->appendChild($aC);
            OK:
        }
        JU:
    }
    public function getPrivateKeyUrl()
    {
        return $this->privateKeyUrl;
    }
    public function setPrivateKeyUrl($YS)
    {
        $this->privateKeyUrl = $YS;
    }
}
