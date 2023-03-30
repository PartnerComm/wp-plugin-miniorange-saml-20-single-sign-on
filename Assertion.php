<?php


include_once 'Utilities.php';
include_once 'xmlseclibs.php';
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
    public function __construct(DOMElement $l3 = NULL, $NI)
    {
        $this->id = SAMLSPUtilities::generateId();
        $this->issueInstant = SAMLSPUtilities::generateTimestamp();
        $this->issuer = '';
        $this->authnInstant = SAMLSPUtilities::generateTimestamp();
        $this->attributes = array();
        $this->nameFormat = "\x75\162\156\72\x6f\x61\x73\151\163\x3a\156\x61\155\145\x73\72\164\143\x3a\123\x41\x4d\x4c\x3a\61\x2e\x31\72\x6e\141\155\145\151\x64\x2d\146\x6f\162\x6d\x61\x74\x3a\x75\x6e\x73\x70\x65\143\151\146\x69\145\144";
        $this->certificates = array();
        $this->AuthenticatingAuthority = array();
        $this->SubjectConfirmation = array();
        if (!($l3 === NULL)) {
            goto WO;
        }
        return;
        WO:
        if (!($l3->localName === "\x45\x6e\x63\162\x79\160\x74\145\x64\x41\x73\x73\x65\x72\164\151\157\x6e")) {
            goto yj;
        }
        $h4 = SAMLSPUtilities::xpQuery($l3, "\56\57\170\145\156\143\72\x45\x6e\143\x72\171\160\x74\x65\x64\x44\x61\164\141");
        $N2 = SAMLSPUtilities::xpQuery($l3, "\x2f\x2f\x2a\x5b\x6c\x6f\x63\141\154\x2d\x6e\141\155\145\50\51\x3d\47\x45\156\x63\162\171\x70\x74\x65\144\113\x65\171\x27\135\x2f\x2a\x5b\154\x6f\x63\141\154\55\156\141\155\x65\x28\51\x3d\47\105\156\143\162\x79\160\164\x69\157\156\115\x65\164\150\x6f\x64\47\x5d\57\x40\101\154\147\x6f\162\x69\164\150\155");
        $u0 = $N2[0]->value;
        $yu = SAMLSPUtilities::getEncryptionAlgorithm($u0);
        if (count($h4) === 0) {
            goto q9;
        }
        if (count($h4) > 1) {
            goto Co;
        }
        goto cq;
        q9:
        throw new Exception("\x4d\x69\163\163\151\x6e\x67\40\145\156\x63\x72\171\160\164\x65\144\40\x64\x61\x74\x61\x20\x69\x6e\40\x3c\x73\141\155\x6c\72\105\156\x63\x72\171\x70\164\x65\x64\101\x73\163\x65\162\164\151\x6f\156\76\56");
        goto cq;
        Co:
        throw new Exception("\115\157\x72\x65\x20\x74\x68\141\x6e\x20\x6f\156\145\40\x65\156\x63\162\171\160\x74\x65\144\x20\x64\x61\164\x61\40\145\x6c\x65\155\x65\156\164\40\151\156\x20\x3c\163\141\155\x6c\x3a\x45\x6e\x63\162\x79\160\x74\x65\x64\x41\x73\x73\x65\x72\164\x69\x6f\156\x3e\56");
        cq:
        $WO = new XMLSecurityKey($yu, array("\164\x79\x70\x65" => "\x70\x72\151\x76\141\x74\x65"));
        $WO->loadKey($NI, FALSE);
        $io = array();
        $l3 = SAMLSPUtilities::decryptElement($h4[0], $WO, $io);
        yj:
        if ($l3->hasAttribute("\111\104")) {
            goto mo;
        }
        throw new Exception("\x4d\x69\163\163\151\x6e\147\40\x49\104\x20\141\x74\x74\162\151\x62\x75\x74\x65\40\x6f\156\40\123\101\x4d\x4c\x20\x61\163\163\145\x72\x74\x69\157\156\56");
        mo:
        $this->id = $l3->getAttribute("\x49\104");
        if (!($l3->getAttribute("\126\145\x72\x73\151\x6f\156") !== "\62\56\60")) {
            goto h1;
        }
        throw new Exception("\x55\x6e\x73\x75\160\160\x6f\x72\x74\145\144\40\x76\x65\162\x73\x69\x6f\156\72\40" . $l3->getAttribute("\x56\x65\162\163\x69\x6f\x6e"));
        h1:
        $this->issueInstant = SAMLSPUtilities::xsDateTimeToTimestamp($l3->getAttribute("\111\x73\x73\165\x65\111\x6e\x73\164\141\x6e\x74"));
        $Ai = SAMLSPUtilities::xpQuery($l3, "\56\57\163\141\155\154\137\x61\x73\x73\x65\x72\x74\x69\157\x6e\72\111\x73\x73\165\x65\x72");
        if (!empty($Ai)) {
            goto FW;
        }
        throw new Exception("\x4d\151\x73\163\x69\156\x67\40\74\x73\141\155\154\x3a\111\163\x73\165\x65\x72\x3e\40\x69\x6e\x20\x61\163\x73\145\x72\x74\x69\x6f\x6e\56");
        FW:
        $this->issuer = trim($Ai[0]->textContent);
        $this->parseConditions($l3);
        $this->parseAuthnStatement($l3);
        $this->parseAttributes($l3);
        $this->parseEncryptedAttributes($l3);
        $this->parseSignature($l3);
        $this->parseSubject($l3);
    }
    private function parseSubject(DOMElement $l3)
    {
        $Ja = SAMLSPUtilities::xpQuery($l3, "\56\x2f\163\141\155\x6c\137\x61\x73\x73\x65\x72\x74\x69\x6f\x6e\x3a\123\165\x62\x6a\x65\143\x74");
        if (empty($Ja)) {
            goto rY;
        }
        if (count($Ja) > 1) {
            goto yy;
        }
        goto lM;
        rY:
        return;
        goto lM;
        yy:
        throw new Exception("\x4d\x6f\162\x65\x20\x74\150\x61\x6e\40\x6f\156\x65\40\74\x73\x61\x6d\x6c\x3a\123\165\x62\x6a\145\x63\164\x3e\x20\151\156\40\x3c\163\x61\x6d\x6c\x3a\x41\163\x73\x65\x72\x74\151\157\156\76\x2e");
        lM:
        $Ja = $Ja[0];
        $OJ = SAMLSPUtilities::xpQuery($Ja, "\56\x2f\x73\141\155\154\x5f\x61\x73\x73\x65\162\164\151\157\156\x3a\116\141\x6d\x65\x49\104\40\174\40\x2e\57\163\141\x6d\154\137\x61\x73\163\x65\162\164\x69\x6f\x6e\x3a\105\x6e\143\162\171\x70\x74\x65\x64\111\104\x2f\170\145\156\x63\x3a\x45\156\143\x72\x79\x70\164\145\x64\x44\x61\x74\x61");
        if (empty($OJ)) {
            goto by;
        }
        if (count($OJ) > 1) {
            goto On;
        }
        goto zV;
        by:
        $tr = $_POST["\122\x65\154\141\x79\x53\164\x61\164\x65"];
        if ($tr == "\164\145\163\x74\126\x61\154\151\144\x61\164\145" or $tr == "\x74\x65\163\x74\x4e\x65\x77\x43\145\x72\164\x69\146\x69\x63\x61\164\x65") {
            goto YD;
        }
        wp_die("\127\x65\40\143\157\x75\154\x64\40\x6e\157\164\40\x73\x69\147\x6e\40\x79\x6f\x75\40\x69\x6e\56\x20\x50\x6c\x65\x61\x73\x65\40\x63\157\156\164\x61\x63\164\x20\x79\x6f\x75\x72\x20\141\144\155\151\x6e\x69\163\164\x72\141\164\157\x72");
        goto Tg;
        YD:
        echo "\x3c\144\x69\166\40\163\164\171\154\x65\75\42\x66\x6f\156\164\55\146\141\x6d\x69\154\171\x3a\x43\141\154\x69\x62\x72\151\x3b\160\x61\x64\144\151\156\x67\72\60\40\x33\45\73\x22\x3e";
        echo "\74\144\x69\166\x20\163\x74\x79\x6c\x65\75\x22\x63\157\x6c\157\x72\72\x20\x23\x61\x39\64\x34\x34\x32\x3b\142\141\x63\x6b\147\x72\x6f\165\156\144\55\143\157\154\157\x72\x3a\x20\43\x66\62\144\145\x64\145\x3b\x70\x61\144\144\x69\156\x67\x3a\40\x31\65\160\170\x3b\x6d\141\162\x67\x69\156\55\x62\157\164\164\x6f\155\72\x20\x32\60\160\170\x3b\x74\145\170\164\55\141\154\151\x67\x6e\72\x63\x65\156\164\145\x72\73\x62\157\162\x64\x65\x72\x3a\x31\x70\x78\x20\163\x6f\154\151\x64\x20\43\x45\x36\102\63\102\x32\x3b\x66\x6f\156\164\55\x73\151\172\x65\72\x31\70\160\164\73\42\76\40\x45\122\x52\117\x52\x3c\x2f\144\x69\166\x3e\12\x20\40\x20\x20\x20\40\x20\40\x20\x20\40\x3c\x64\151\166\40\163\x74\x79\154\145\75\42\x63\157\154\x6f\162\x3a\x20\x23\141\71\64\64\x34\62\73\x66\157\x6e\164\x2d\163\x69\172\x65\72\x31\x34\x70\x74\x3b\x20\155\141\x72\x67\x69\x6e\55\x62\157\x74\x74\157\x6d\x3a\x32\x30\160\170\x3b\x22\x3e\x3c\160\x3e\x3c\x73\x74\162\x6f\156\147\76\105\x72\162\x6f\162\x3a\x20\74\57\163\x74\x72\157\x6e\x67\x3e\115\151\163\x73\x69\156\147\x20\40\116\x61\x6d\x65\111\x44\40\x6f\162\40\105\156\x63\162\x79\x70\x74\145\144\111\x44\40\x69\156\x20\x53\x41\115\114\x20\x52\x65\163\x70\157\x6e\x73\x65\x2e\x3c\57\x70\x3e\xa\40\40\40\x20\x20\x20\40\40\40\x20\40\40\40\40\x20\40\74\160\x3e\120\154\x65\x61\x73\145\x20\x63\x6f\x6e\164\141\143\x74\x20\171\x6f\165\162\x20\x61\144\x6d\x69\156\x69\163\164\x72\141\x74\x6f\162\40\x61\156\144\40\162\x65\160\x6f\x72\164\x20\164\x68\x65\x20\x66\x6f\x6c\154\157\x77\151\x6e\x67\40\145\162\x72\157\162\72\x3c\x2f\160\x3e\xa\40\x20\40\40\x20\x20\x20\x20\x20\x20\40\40\x20\40\40\40\x3c\x70\76\74\163\164\x72\157\156\x67\x3e\120\x6f\163\x73\151\142\154\x65\x20\103\141\165\x73\x65\x3a\x3c\57\163\164\x72\157\156\147\x3e\x20\116\x61\x6d\x65\x49\x44\x20\x6e\x6f\164\40\146\x6f\165\x6e\144\x20\x69\x6e\x20\x53\101\115\114\x20\x52\145\x73\x70\157\x6e\163\x65\40\163\165\142\152\x65\143\164\56\74\x2f\x70\x3e\xa\x20\40\40\x20\40\x20\x20\x20\x20\x20\40\x20\40\x20\x20\x20\74\57\x64\151\166\x3e\xa\40\x20\40\40\x20\x20\40\40\40\40\x20\40\x20\40\x20\40\74\144\151\x76\x20\x73\x74\171\154\x65\x3d\x22\x6d\x61\162\147\151\x6e\72\63\x25\73\x64\x69\163\160\154\141\171\x3a\x62\x6c\x6f\x63\x6b\73\164\145\x78\x74\55\141\x6c\151\x67\x6e\72\x63\x65\156\x74\x65\162\x3b\42\x3e\xa\x20\40\x20\40\x20\x20\x20\40\x20\x20\x20\x20\x20\x20\x20\x20\74\x64\151\166\40\x73\164\171\154\x65\75\x22\x6d\x61\162\147\151\156\x3a\x33\x25\x3b\144\151\x73\x70\154\x61\x79\x3a\142\x6c\157\143\x6b\73\x74\145\170\164\x2d\141\154\151\147\156\72\143\145\156\x74\x65\x72\73\x22\76\74\x69\156\160\x75\x74\40\163\x74\171\x6c\x65\x3d\42\160\141\x64\x64\x69\156\x67\72\x31\45\73\167\x69\144\x74\x68\x3a\x31\x30\x30\x70\x78\73\x62\141\x63\x6b\x67\x72\157\x75\156\144\72\x20\43\60\x30\71\x31\x43\x44\40\156\157\156\145\x20\x72\145\160\145\141\164\x20\x73\143\162\x6f\154\x6c\x20\60\45\x20\x30\x25\73\x63\x75\x72\x73\157\x72\x3a\40\160\x6f\151\156\164\x65\x72\x3b\146\157\x6e\164\55\163\151\172\145\72\x31\x35\160\170\73\x62\x6f\162\144\145\162\55\x77\151\x64\164\150\72\x20\61\160\170\73\142\x6f\162\144\x65\162\x2d\x73\x74\x79\x6c\x65\72\40\x73\x6f\x6c\151\144\73\x62\157\x72\144\145\x72\55\162\141\144\x69\x75\x73\x3a\x20\63\160\170\x3b\167\x68\x69\164\145\x2d\163\x70\x61\143\145\x3a\40\156\157\x77\162\141\x70\73\x62\157\x78\x2d\x73\151\172\151\x6e\x67\72\40\142\157\162\x64\x65\x72\x2d\x62\x6f\x78\x3b\x62\x6f\x72\144\x65\162\55\143\x6f\x6c\x6f\162\x3a\x20\x23\60\60\67\x33\x41\x41\73\x62\x6f\170\55\163\x68\141\x64\157\x77\x3a\x20\60\160\170\x20\61\160\170\40\x30\160\x78\x20\x72\x67\x62\141\x28\x31\x32\x30\x2c\x20\62\x30\x30\54\40\62\63\60\54\40\60\x2e\x36\x29\40\x69\156\x73\145\164\73\x63\157\154\x6f\162\72\40\x23\106\106\106\73\x22\x74\x79\160\145\75\x22\x62\x75\x74\164\157\156\x22\x20\x76\x61\x6c\165\145\75\42\104\157\x6e\x65\x22\x20\157\156\103\154\x69\x63\153\x3d\x22\163\145\x6c\146\56\143\x6c\x6f\x73\x65\x28\51\73\42\x3e\74\x2f\144\151\166\76";
        exit;
        Tg:
        goto zV;
        On:
        throw new Exception("\x4d\157\x72\145\x20\x74\150\141\x6e\x20\157\x6e\145\x20\74\x73\141\x6d\x6c\x3a\x4e\x61\155\x65\x49\x44\x3e\x20\x6f\162\x20\74\x73\141\155\x6c\x3a\x45\156\143\x72\x79\x70\x74\145\x64\x44\76\x20\x69\x6e\40\74\163\x61\155\x6c\x3a\x53\x75\142\x6a\145\x63\164\76\x2e");
        zV:
        $OJ = $OJ[0];
        if ($OJ->localName === "\105\x6e\143\162\x79\160\164\x65\144\104\141\164\x61") {
            goto qm;
        }
        $this->nameId = SAMLSPUtilities::parseNameId($OJ);
        goto ia;
        qm:
        $this->encryptedNameId = $OJ;
        ia:
    }
    private function parseConditions(DOMElement $l3)
    {
        $Bc = SAMLSPUtilities::xpQuery($l3, "\56\x2f\163\141\x6d\x6c\x5f\x61\x73\x73\145\162\164\151\x6f\156\x3a\x43\x6f\x6e\144\151\x74\151\x6f\156\163");
        if (empty($Bc)) {
            goto XB;
        }
        if (count($Bc) > 1) {
            goto YW;
        }
        goto FH;
        XB:
        return;
        goto FH;
        YW:
        throw new Exception("\x4d\x6f\x72\145\40\164\150\141\x6e\x20\x6f\156\145\40\x3c\x73\x61\155\154\72\x43\x6f\156\144\x69\x74\151\x6f\x6e\x73\76\40\151\x6e\x20\74\x73\141\155\154\x3a\101\x73\x73\x65\162\164\x69\157\156\76\x2e");
        FH:
        $Bc = $Bc[0];
        if (!$Bc->hasAttribute("\116\157\x74\102\145\x66\x6f\162\x65")) {
            goto S9;
        }
        $vN = SAMLSPUtilities::xsDateTimeToTimestamp($Bc->getAttribute("\x4e\157\x74\102\x65\146\x6f\x72\x65"));
        if (!($this->notBefore === NULL || $this->notBefore < $vN)) {
            goto DG;
        }
        $this->notBefore = $vN;
        DG:
        S9:
        if (!$Bc->hasAttribute("\x4e\157\x74\117\156\x4f\162\101\x66\x74\145\x72")) {
            goto fR;
        }
        $ef = SAMLSPUtilities::xsDateTimeToTimestamp($Bc->getAttribute("\x4e\x6f\x74\x4f\156\117\162\x41\146\x74\145\x72"));
        if (!($this->notOnOrAfter === NULL || $this->notOnOrAfter > $ef)) {
            goto sz;
        }
        $this->notOnOrAfter = $ef;
        sz:
        fR:
        $Kp = $Bc->firstChild;
        qE:
        if (!($Kp !== NULL)) {
            goto RW;
        }
        if (!$Kp instanceof DOMText) {
            goto uz;
        }
        goto IV;
        uz:
        if (!($Kp->namespaceURI !== "\165\x72\156\72\157\x61\163\x69\x73\x3a\156\141\x6d\145\x73\x3a\x74\x63\72\123\101\x4d\x4c\72\62\x2e\x30\x3a\x61\163\x73\145\162\164\151\157\156")) {
            goto y8;
        }
        throw new Exception("\125\156\x6b\x6e\x6f\x77\x6e\x20\x6e\141\x6d\145\163\160\x61\143\x65\x20\157\x66\40\143\x6f\156\144\x69\x74\x69\157\156\x3a\40" . var_export($Kp->namespaceURI, TRUE));
        y8:
        switch ($Kp->localName) {
            case "\x41\165\x64\151\145\156\x63\x65\x52\x65\x73\164\162\151\x63\164\151\x6f\156":
                $lQ = SAMLSPUtilities::extractStrings($Kp, "\165\x72\156\x3a\x6f\x61\163\151\x73\72\x6e\x61\x6d\x65\x73\72\x74\143\x3a\123\101\115\x4c\x3a\62\x2e\60\72\141\x73\163\x65\162\x74\x69\157\x6e", "\101\x75\x64\151\145\156\143\x65");
                if ($this->validAudiences === NULL) {
                    goto J1;
                }
                $this->validAudiences = array_intersect($this->validAudiences, $lQ);
                goto cz;
                J1:
                $this->validAudiences = $lQ;
                cz:
                goto Lu;
            case "\x4f\x6e\145\x54\151\x6d\145\125\x73\145":
                goto Lu;
            case "\120\162\157\x78\x79\122\145\x73\x74\162\151\x63\x74\x69\x6f\x6e":
                goto Lu;
            default:
                throw new Exception("\125\x6e\x6b\x6e\157\x77\x6e\40\143\x6f\x6e\x64\x69\x74\151\157\x6e\72\40" . var_export($Kp->localName, TRUE));
        }
        UE:
        Lu:
        IV:
        $Kp = $Kp->nextSibling;
        goto qE;
        RW:
    }
    private function parseAuthnStatement(DOMElement $l3)
    {
        $FZ = SAMLSPUtilities::xpQuery($l3, "\56\x2f\x73\x61\155\x6c\137\141\163\163\145\x72\x74\151\157\156\72\x41\x75\x74\150\x6e\x53\x74\x61\164\x65\x6d\x65\156\164");
        if (empty($FZ)) {
            goto Bm;
        }
        if (count($FZ) > 1) {
            goto PD;
        }
        goto iJ;
        Bm:
        $this->authnInstant = NULL;
        return;
        goto iJ;
        PD:
        throw new Exception("\x4d\157\162\x65\40\x74\150\x61\x74\40\157\x6e\145\x20\74\163\141\x6d\x6c\x3a\101\165\164\x68\x6e\x53\164\x61\164\145\155\x65\x6e\x74\76\40\x69\156\40\74\163\x61\x6d\x6c\72\x41\x73\x73\x65\x72\x74\x69\x6f\156\x3e\x20\156\x6f\x74\x20\x73\x75\x70\160\157\162\x74\145\x64\56");
        iJ:
        $rW = $FZ[0];
        if ($rW->hasAttribute("\101\165\x74\x68\x6e\x49\156\x73\164\x61\156\164")) {
            goto IX;
        }
        throw new Exception("\115\151\x73\x73\151\x6e\147\x20\162\x65\161\x75\x69\x72\145\144\x20\101\x75\x74\150\x6e\111\156\163\x74\141\156\x74\x20\141\x74\164\162\151\142\x75\164\145\40\x6f\156\40\74\163\x61\155\154\x3a\101\165\x74\x68\x6e\123\164\x61\164\145\155\x65\156\164\x3e\x2e");
        IX:
        $this->authnInstant = SAMLSPUtilities::xsDateTimeToTimestamp($rW->getAttribute("\x41\x75\164\150\156\111\x6e\163\x74\141\156\164"));
        if (!$rW->hasAttribute("\x53\145\x73\x73\x69\x6f\156\116\157\164\117\x6e\117\x72\101\x66\x74\x65\x72")) {
            goto Xe;
        }
        $this->sessionNotOnOrAfter = SAMLSPUtilities::xsDateTimeToTimestamp($rW->getAttribute("\123\145\x73\x73\151\x6f\156\x4e\157\x74\x4f\156\x4f\162\x41\x66\x74\x65\162"));
        Xe:
        if (!$rW->hasAttribute("\123\x65\x73\163\x69\157\x6e\111\x6e\x64\145\170")) {
            goto KS;
        }
        $this->sessionIndex = $rW->getAttribute("\x53\145\163\163\x69\157\x6e\111\156\144\x65\x78");
        KS:
        $this->parseAuthnContext($rW);
    }
    private function parseAuthnContext(DOMElement $fb)
    {
        $x7 = SAMLSPUtilities::xpQuery($fb, "\56\57\x73\141\x6d\154\137\x61\163\163\145\x72\x74\x69\157\x6e\72\101\x75\164\x68\x6e\x43\x6f\156\x74\145\x78\x74");
        if (count($x7) > 1) {
            goto G4;
        }
        if (empty($x7)) {
            goto T5;
        }
        goto T4;
        G4:
        throw new Exception("\115\157\x72\x65\x20\164\150\x61\x6e\40\157\156\145\x20\74\x73\x61\x6d\x6c\72\x41\x75\164\150\x6e\x43\x6f\x6e\164\x65\170\164\x3e\40\x69\x6e\x20\74\163\141\155\x6c\x3a\x41\x75\164\150\156\x53\164\x61\164\x65\155\x65\156\x74\x3e\x2e");
        goto T4;
        T5:
        throw new Exception("\x4d\151\163\163\x69\x6e\x67\40\x72\145\x71\x75\x69\x72\x65\144\x20\x3c\163\141\155\x6c\x3a\101\x75\x74\x68\x6e\103\x6f\x6e\164\x65\170\x74\76\40\x69\156\40\74\163\x61\x6d\x6c\72\x41\x75\164\150\x6e\x53\164\141\x74\145\155\x65\156\x74\x3e\x2e");
        T4:
        $Yc = $x7[0];
        $PX = SAMLSPUtilities::xpQuery($Yc, "\x2e\57\163\141\155\154\x5f\141\x73\163\x65\162\164\151\x6f\156\72\x41\x75\164\x68\x6e\103\x6f\x6e\164\145\170\164\x44\x65\143\154\122\x65\x66");
        if (count($PX) > 1) {
            goto RI;
        }
        if (count($PX) === 1) {
            goto pY;
        }
        goto QK;
        RI:
        throw new Exception("\115\x6f\x72\145\40\x74\150\x61\x6e\x20\157\156\145\x20\x3c\x73\141\155\x6c\72\101\x75\164\x68\156\103\x6f\156\x74\x65\170\164\x44\x65\x63\x6c\x52\145\146\76\40\146\157\x75\156\x64\77");
        goto QK;
        pY:
        $this->setAuthnContextDeclRef(trim($PX[0]->textContent));
        QK:
        $Ab = SAMLSPUtilities::xpQuery($Yc, "\56\x2f\x73\141\x6d\x6c\x5f\x61\x73\163\x65\x72\x74\x69\157\156\72\x41\x75\164\150\156\103\x6f\x6e\164\145\x78\x74\104\145\x63\x6c");
        if (count($Ab) > 1) {
            goto lV;
        }
        if (count($Ab) === 1) {
            goto Z7;
        }
        goto Tt;
        lV:
        throw new Exception("\x4d\x6f\x72\x65\x20\164\x68\x61\x6e\40\x6f\156\x65\40\x3c\163\141\x6d\x6c\x3a\x41\x75\164\x68\156\103\157\156\x74\145\x78\x74\104\x65\x63\154\76\40\146\157\x75\156\x64\x3f");
        goto Tt;
        Z7:
        $this->setAuthnContextDecl(new SAML2_XML_Chunk($Ab[0]));
        Tt:
        $JG = SAMLSPUtilities::xpQuery($Yc, "\x2e\x2f\163\x61\155\154\x5f\141\163\163\145\x72\164\x69\157\156\x3a\101\165\x74\x68\x6e\103\x6f\156\164\x65\170\164\103\154\x61\163\x73\x52\x65\x66");
        if (count($JG) > 1) {
            goto oO;
        }
        if (count($JG) === 1) {
            goto S2;
        }
        goto vj;
        oO:
        throw new Exception("\115\x6f\x72\145\40\x74\x68\x61\156\x20\x6f\156\145\x20\x3c\163\x61\x6d\154\72\101\x75\x74\150\156\103\x6f\156\164\145\x78\164\103\x6c\141\163\163\122\145\x66\76\40\151\x6e\x20\74\x73\141\155\x6c\x3a\x41\165\x74\150\156\103\x6f\x6e\x74\145\x78\x74\76\x2e");
        goto vj;
        S2:
        $this->setAuthnContextClassRef(trim($JG[0]->textContent));
        vj:
        if (!(empty($this->authnContextClassRef) && empty($this->authnContextDecl) && empty($this->authnContextDeclRef))) {
            goto Vu;
        }
        throw new Exception("\x4d\151\163\x73\x69\x6e\x67\40\x65\151\x74\x68\x65\x72\x20\x3c\163\x61\155\154\x3a\101\165\164\150\156\x43\157\x6e\164\145\x78\x74\103\x6c\x61\x73\x73\x52\x65\146\x3e\40\x6f\162\x20\74\163\141\x6d\x6c\x3a\101\165\164\x68\x6e\103\157\156\x74\145\170\164\104\145\143\x6c\122\145\146\76\x20\157\x72\x20\74\163\141\x6d\x6c\x3a\x41\x75\164\x68\156\103\x6f\156\164\x65\170\x74\x44\x65\x63\x6c\x3e");
        Vu:
        $this->AuthenticatingAuthority = SAMLSPUtilities::extractStrings($Yc, "\165\162\x6e\x3a\157\141\163\151\163\x3a\156\x61\155\x65\163\72\164\x63\72\123\101\115\114\72\x32\x2e\x30\x3a\141\x73\163\145\x72\x74\x69\x6f\156", "\101\165\164\x68\x65\156\164\x69\143\x61\x74\151\x6e\147\x41\165\164\x68\x6f\162\x69\164\x79");
    }
    private function parseAttributes(DOMElement $l3)
    {
        $ji = TRUE;
        $QK = SAMLSPUtilities::xpQuery($l3, "\x2e\57\x73\x61\x6d\x6c\x5f\141\x73\x73\x65\162\x74\x69\x6f\156\x3a\x41\x74\164\162\151\142\x75\x74\x65\123\x74\x61\x74\x65\x6d\145\x6e\x74\x2f\163\141\x6d\x6c\x5f\141\163\163\x65\162\x74\x69\157\x6e\x3a\101\x74\x74\162\151\x62\165\164\145");
        foreach ($QK as $V0) {
            if ($V0->hasAttribute("\x4e\x61\x6d\x65")) {
                goto SE;
            }
            throw new Exception("\115\151\x73\x73\151\156\x67\x20\156\141\155\145\40\157\x6e\40\74\163\141\x6d\154\x3a\101\x74\x74\162\151\142\165\164\x65\x3e\40\145\154\145\x6d\145\x6e\164\x2e");
            SE:
            $YB = $V0->getAttribute("\x4e\x61\155\145");
            if ($V0->hasAttribute("\116\141\x6d\145\106\157\162\155\x61\x74")) {
                goto AF;
            }
            $rn = "\165\162\156\x3a\157\x61\163\x69\x73\x3a\156\141\155\x65\163\x3a\x74\x63\72\x53\101\x4d\114\72\x31\x2e\61\x3a\x6e\141\x6d\x65\151\x64\55\x66\157\x72\155\x61\x74\72\165\156\x73\x70\145\x63\151\x66\x69\145\x64";
            goto B0;
            AF:
            $rn = $V0->getAttribute("\x4e\x61\155\x65\x46\x6f\x72\x6d\x61\164");
            B0:
            if ($ji) {
                goto xB;
            }
            if (!($this->nameFormat !== $rn)) {
                goto ge;
            }
            $this->nameFormat = "\x75\162\x6e\x3a\x6f\141\163\x69\163\72\156\x61\x6d\145\163\72\164\143\72\x53\x41\x4d\x4c\72\x31\x2e\x31\x3a\x6e\141\155\145\151\x64\55\x66\x6f\x72\155\x61\164\x3a\165\x6e\163\x70\x65\x63\x69\x66\151\145\x64";
            ge:
            goto x8;
            xB:
            $this->nameFormat = $rn;
            $ji = FALSE;
            x8:
            if (isset($this->attributes[$YB])) {
                goto DX;
            }
            $this->attributes[$YB] = array();
            DX:
            $Yr = SAMLSPUtilities::xpQuery($V0, "\56\x2f\163\x61\x6d\154\137\141\x73\163\145\x72\x74\151\157\156\72\101\x74\x74\162\x69\x62\165\164\x65\126\x61\x6c\165\145");
            foreach ($Yr as $cK) {
                $this->attributes[$YB][] = trim($cK->textContent);
                wo:
            }
            rB:
            a5:
        }
        Zo:
    }
    private function parseEncryptedAttributes(DOMElement $l3)
    {
        $this->encryptedAttribute = SAMLSPUtilities::xpQuery($l3, "\56\x2f\x73\141\155\154\137\x61\163\163\x65\162\x74\151\x6f\x6e\72\101\x74\x74\x72\x69\142\x75\x74\x65\123\x74\x61\164\x65\x6d\145\156\164\x2f\x73\141\155\154\137\x61\x73\163\x65\x72\x74\151\157\x6e\72\105\x6e\x63\162\171\160\164\145\x64\101\x74\x74\162\151\x62\x75\x74\145");
    }
    private function parseSignature(DOMElement $l3)
    {
        $rl = SAMLSPUtilities::validateElement($l3);
        if (!($rl !== FALSE)) {
            goto Dm;
        }
        $this->wasSignedAtConstruction = TRUE;
        $this->certificates = $rl["\103\x65\x72\164\151\146\151\x63\141\x74\x65\163"];
        $this->signatureData = $rl;
        Dm:
    }
    public function validate(XMLSecurityKey $WO)
    {
        if (!($this->signatureData === NULL)) {
            goto eO;
        }
        return FALSE;
        eO:
        SAMLSPUtilities::validateSignature($this->signatureData, $WO);
        return TRUE;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($It)
    {
        $this->id = $It;
    }
    public function getIssueInstant()
    {
        return $this->issueInstant;
    }
    public function setIssueInstant($kC)
    {
        $this->issueInstant = $kC;
    }
    public function getIssuer()
    {
        return $this->issuer;
    }
    public function setIssuer($Ai)
    {
        $this->issuer = $Ai;
    }
    public function getNameId()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto w0;
        }
        throw new Exception("\x41\164\x74\145\155\160\164\x65\x64\40\164\x6f\x20\x72\x65\x74\162\151\x65\x76\x65\x20\x65\x6e\x63\162\171\x70\x74\x65\144\40\116\141\155\x65\111\x44\40\x77\151\x74\150\x6f\x75\x74\40\x64\x65\143\162\x79\x70\x74\x69\x6e\x67\40\151\x74\40\146\x69\x72\x73\x74\x2e");
        w0:
        return $this->nameId;
    }
    public function setNameId($OJ)
    {
        $this->nameId = $OJ;
    }
    public function isNameIdEncrypted()
    {
        if (!($this->encryptedNameId !== NULL)) {
            goto h3;
        }
        return TRUE;
        h3:
        return FALSE;
    }
    public function encryptNameId(XMLSecurityKey $WO)
    {
        $ik = new DOMDocument();
        $Bf = $ik->createElement("\162\x6f\x6f\164");
        $ik->appendChild($Bf);
        SAMLSPUtilities::addNameId($Bf, $this->nameId);
        $OJ = $Bf->firstChild;
        SAMLSPUtilities::getContainer()->debugMessage($OJ, "\x65\156\x63\x72\171\160\x74");
        $NA = new XMLSecEnc();
        $NA->setNode($OJ);
        $NA->type = XMLSecEnc::Element;
        $Z3 = new XMLSecurityKey(XMLSecurityKey::AES128_CBC);
        $Z3->generateSessionKey();
        $NA->encryptKey($WO, $Z3);
        $this->encryptedNameId = $NA->encryptNode($Z3);
        $this->nameId = NULL;
    }
    public function decryptNameId(XMLSecurityKey $WO, array $io = array())
    {
        if (!($this->encryptedNameId === NULL)) {
            goto mN;
        }
        return;
        mN:
        $OJ = SAMLSPUtilities::decryptElement($this->encryptedNameId, $WO, $io);
        SAMLSPUtilities::getContainer()->debugMessage($OJ, "\x64\x65\x63\x72\x79\x70\164");
        $this->nameId = SAMLSPUtilities::parseNameId($OJ);
        $this->encryptedNameId = NULL;
    }
    public function decryptAttributes(XMLSecurityKey $WO, array $io = array())
    {
        if (!($this->encryptedAttribute === NULL)) {
            goto rx;
        }
        return;
        rx:
        $ji = TRUE;
        $QK = $this->encryptedAttribute;
        foreach ($QK as $Yz) {
            $V0 = SAMLSPUtilities::decryptElement($Yz->getElementsByTagName("\105\x6e\x63\162\x79\160\164\x65\144\x44\x61\x74\141")->item(0), $WO, $io);
            if ($V0->hasAttribute("\x4e\x61\x6d\145")) {
                goto mk;
            }
            throw new Exception("\x4d\151\x73\x73\151\156\x67\40\156\141\155\x65\x20\157\x6e\40\x3c\x73\x61\155\x6c\x3a\x41\x74\164\162\x69\142\x75\x74\145\76\x20\x65\154\145\155\145\156\x74\x2e");
            mk:
            $YB = $V0->getAttribute("\x4e\141\155\145");
            if ($V0->hasAttribute("\116\141\x6d\x65\106\x6f\x72\155\x61\x74")) {
                goto KK;
            }
            $rn = "\x75\162\156\x3a\x6f\x61\x73\151\x73\x3a\x6e\x61\x6d\x65\163\72\x74\x63\72\123\101\115\x4c\x3a\62\56\x30\72\x61\164\164\x72\156\x61\x6d\x65\x2d\146\157\x72\x6d\141\x74\x3a\x75\156\x73\160\145\143\x69\x66\x69\145\144";
            goto NJ;
            KK:
            $rn = $V0->getAttribute("\116\141\x6d\x65\x46\x6f\162\155\x61\x74");
            NJ:
            if ($ji) {
                goto ph;
            }
            if (!($this->nameFormat !== $rn)) {
                goto KG;
            }
            $this->nameFormat = "\165\162\156\x3a\157\141\163\x69\163\x3a\156\141\x6d\145\163\72\x74\x63\x3a\123\101\x4d\114\72\62\56\60\x3a\x61\164\164\162\156\141\155\145\x2d\146\x6f\162\155\141\164\72\165\x6e\x73\x70\x65\x63\151\146\151\145\x64";
            KG:
            goto YZ;
            ph:
            $this->nameFormat = $rn;
            $ji = FALSE;
            YZ:
            if (isset($this->attributes[$YB])) {
                goto LP;
            }
            $this->attributes[$YB] = array();
            LP:
            $Yr = SAMLSPUtilities::xpQuery($V0, "\56\57\163\x61\x6d\x6c\x5f\141\x73\x73\145\x72\x74\x69\157\156\x3a\x41\164\x74\162\151\142\x75\x74\x65\x56\141\154\x75\145");
            foreach ($Yr as $cK) {
                $this->attributes[$YB][] = trim($cK->textContent);
                Pd:
            }
            vc:
            nv:
        }
        Rw:
    }
    public function getNotBefore()
    {
        return $this->notBefore;
    }
    public function setNotBefore($vN)
    {
        $this->notBefore = $vN;
    }
    public function getNotOnOrAfter()
    {
        return $this->notOnOrAfter;
    }
    public function setNotOnOrAfter($ef)
    {
        $this->notOnOrAfter = $ef;
    }
    public function setEncryptedAttributes($IN)
    {
        $this->requiredEncAttributes = $IN;
    }
    public function getValidAudiences()
    {
        return $this->validAudiences;
    }
    public function setValidAudiences(array $sQ = NULL)
    {
        $this->validAudiences = $sQ;
    }
    public function getAuthnInstant()
    {
        return $this->authnInstant;
    }
    public function setAuthnInstant($Rd)
    {
        $this->authnInstant = $Rd;
    }
    public function getSessionNotOnOrAfter()
    {
        return $this->sessionNotOnOrAfter;
    }
    public function setSessionNotOnOrAfter($Zm)
    {
        $this->sessionNotOnOrAfter = $Zm;
    }
    public function getSessionIndex()
    {
        return $this->sessionIndex;
    }
    public function setSessionIndex($VU)
    {
        $this->sessionIndex = $VU;
    }
    public function getAuthnContext()
    {
        if (empty($this->authnContextClassRef)) {
            goto v5;
        }
        return $this->authnContextClassRef;
        v5:
        if (empty($this->authnContextDeclRef)) {
            goto i4;
        }
        return $this->authnContextDeclRef;
        i4:
        return NULL;
    }
    public function setAuthnContext($Cb)
    {
        $this->setAuthnContextClassRef($Cb);
    }
    public function getAuthnContextClassRef()
    {
        return $this->authnContextClassRef;
    }
    public function setAuthnContextClassRef($uA)
    {
        $this->authnContextClassRef = $uA;
    }
    public function setAuthnContextDecl(SAML2_XML_Chunk $hv)
    {
        if (empty($this->authnContextDeclRef)) {
            goto Hp;
        }
        throw new Exception("\101\x75\x74\150\156\103\x6f\x6e\x74\x65\170\164\x44\x65\143\x6c\x52\145\x66\40\151\163\40\x61\154\x72\145\141\144\171\40\162\145\x67\151\x73\x74\x65\x72\145\144\x21\x20\115\x61\x79\x20\157\x6e\x6c\x79\x20\150\141\166\145\40\145\x69\164\x68\145\x72\40\141\40\104\x65\x63\x6c\40\x6f\x72\x20\x61\x20\104\145\x63\154\x52\145\x66\54\40\x6e\157\x74\40\x62\157\164\x68\41");
        Hp:
        $this->authnContextDecl = $hv;
    }
    public function getAuthnContextDecl()
    {
        return $this->authnContextDecl;
    }
    public function setAuthnContextDeclRef($gB)
    {
        if (empty($this->authnContextDecl)) {
            goto Q9;
        }
        throw new Exception("\101\x75\164\150\x6e\x43\157\156\164\x65\x78\164\x44\x65\143\x6c\40\151\x73\40\141\x6c\x72\x65\x61\144\x79\x20\162\x65\147\151\163\164\x65\x72\x65\144\x21\x20\x4d\141\171\x20\157\x6e\154\171\x20\x68\141\166\x65\40\145\151\164\150\x65\x72\x20\141\x20\x44\145\x63\154\40\x6f\x72\40\141\40\104\145\x63\x6c\122\145\x66\x2c\x20\x6e\x6f\x74\x20\142\157\x74\150\41");
        Q9:
        $this->authnContextDeclRef = $gB;
    }
    public function getAuthnContextDeclRef()
    {
        return $this->authnContextDeclRef;
    }
    public function getAuthenticatingAuthority()
    {
        return $this->AuthenticatingAuthority;
    }
    public function setAuthenticatingAuthority($ki)
    {
        $this->AuthenticatingAuthority = $ki;
    }
    public function getAttributes()
    {
        return $this->attributes;
    }
    public function setAttributes(array $QK)
    {
        $this->attributes = $QK;
    }
    public function getAttributeNameFormat()
    {
        return $this->nameFormat;
    }
    public function setAttributeNameFormat($rn)
    {
        $this->nameFormat = $rn;
    }
    public function getSubjectConfirmation()
    {
        return $this->SubjectConfirmation;
    }
    public function setSubjectConfirmation(array $XZ)
    {
        $this->SubjectConfirmation = $XZ;
    }
    public function getSignatureKey()
    {
        return $this->signatureKey;
    }
    public function setSignatureKey(XMLsecurityKey $Gc = NULL)
    {
        $this->signatureKey = $Gc;
    }
    public function getEncryptionKey()
    {
        return $this->encryptionKey;
    }
    public function setEncryptionKey(XMLSecurityKey $em = NULL)
    {
        $this->encryptionKey = $em;
    }
    public function setCertificates(array $mG)
    {
        $this->certificates = $mG;
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
    public function toXML(DOMNode $pR = NULL)
    {
        if ($pR === NULL) {
            goto qG;
        }
        $HL = $pR->ownerDocument;
        goto BZ;
        qG:
        $HL = new DOMDocument();
        $pR = $HL;
        BZ:
        $Bf = $HL->createElementNS("\165\x72\x6e\x3a\157\x61\163\x69\163\72\x6e\x61\155\x65\x73\x3a\164\143\72\x53\x41\115\x4c\72\62\x2e\60\72\x61\x73\x73\145\162\164\151\x6f\156", "\163\x61\x6d\x6c\x3a" . "\101\x73\163\145\162\x74\x69\157\156");
        $pR->appendChild($Bf);
        $Bf->setAttributeNS("\165\162\156\72\x6f\141\163\x69\x73\72\156\x61\x6d\x65\163\72\164\x63\x3a\123\101\x4d\114\x3a\x32\x2e\x30\x3a\x70\x72\157\164\x6f\x63\157\x6c", "\163\x61\155\154\160\72\164\x6d\x70", "\164\x6d\160");
        $Bf->removeAttributeNS("\x75\x72\156\x3a\157\x61\163\x69\x73\x3a\x6e\141\155\145\163\72\x74\x63\72\x53\101\x4d\x4c\72\62\x2e\60\x3a\x70\x72\157\164\x6f\x63\157\x6c", "\164\x6d\x70");
        $Bf->setAttributeNS("\150\164\164\x70\x3a\x2f\x2f\x77\x77\x77\56\167\x33\56\x6f\x72\x67\57\x32\x30\60\x31\x2f\130\x4d\x4c\x53\x63\150\x65\155\141\55\x69\156\x73\164\x61\156\x63\145", "\x78\x73\151\72\164\x6d\x70", "\x74\155\x70");
        $Bf->removeAttributeNS("\150\164\164\x70\72\x2f\57\167\167\x77\56\x77\x33\56\x6f\x72\x67\57\x32\x30\x30\61\57\130\x4d\x4c\123\x63\x68\x65\x6d\x61\55\x69\156\x73\164\x61\156\143\145", "\164\x6d\x70");
        $Bf->setAttributeNS("\150\x74\164\160\x3a\57\57\167\x77\x77\x2e\167\x33\56\x6f\162\x67\x2f\62\x30\60\x31\x2f\x58\115\x4c\123\x63\x68\145\155\141", "\170\163\72\x74\155\x70", "\x74\155\160");
        $Bf->removeAttributeNS("\150\164\164\160\72\x2f\x2f\167\x77\167\56\x77\x33\x2e\x6f\162\147\57\62\60\x30\61\x2f\130\x4d\x4c\123\x63\x68\x65\155\x61", "\x74\155\160");
        $Bf->setAttribute("\x49\x44", $this->id);
        $Bf->setAttribute("\x56\145\162\163\x69\157\x6e", "\x32\56\60");
        $Bf->setAttribute("\111\x73\163\165\x65\111\156\x73\x74\x61\x6e\x74", gmdate("\x59\55\x6d\55\x64\134\x54\110\x3a\x69\x3a\x73\x5c\x5a", $this->issueInstant));
        $Ai = SAMLSPUtilities::addString($Bf, "\x75\x72\x6e\72\x6f\141\163\x69\163\x3a\156\141\155\x65\x73\x3a\x74\x63\72\123\x41\x4d\x4c\72\62\56\60\72\141\x73\x73\x65\162\164\x69\157\156", "\163\x61\x6d\154\x3a\111\x73\x73\165\x65\x72", $this->issuer);
        $this->addSubject($Bf);
        $this->addConditions($Bf);
        $this->addAuthnStatement($Bf);
        if ($this->requiredEncAttributes == FALSE) {
            goto x7;
        }
        $this->addEncryptedAttributeStatement($Bf);
        goto kN;
        x7:
        $this->addAttributeStatement($Bf);
        kN:
        if (!($this->signatureKey !== NULL)) {
            goto p_;
        }
        SAMLSPUtilities::insertSignature($this->signatureKey, $this->certificates, $Bf, $Ai->nextSibling);
        p_:
        return $Bf;
    }
    private function addSubject(DOMElement $Bf)
    {
        if (!($this->nameId === NULL && $this->encryptedNameId === NULL)) {
            goto sR;
        }
        return;
        sR:
        $Ja = $Bf->ownerDocument->createElementNS("\x75\x72\x6e\72\157\141\163\x69\163\72\x6e\141\155\x65\163\72\164\143\x3a\x53\x41\115\114\72\x32\56\60\x3a\x61\163\163\x65\x72\x74\x69\x6f\x6e", "\163\141\155\x6c\x3a\123\165\x62\x6a\x65\x63\x74");
        $Bf->appendChild($Ja);
        if ($this->encryptedNameId === NULL) {
            goto Ex;
        }
        $Vr = $Ja->ownerDocument->createElementNS("\165\x72\156\x3a\157\x61\163\x69\x73\x3a\x6e\x61\155\145\x73\x3a\x74\x63\72\123\101\115\x4c\x3a\x32\56\60\x3a\141\x73\x73\x65\162\164\151\157\156", "\x73\x61\x6d\154\x3a" . "\x45\156\x63\x72\171\x70\164\145\x64\111\x44");
        $Ja->appendChild($Vr);
        $Vr->appendChild($Ja->ownerDocument->importNode($this->encryptedNameId, TRUE));
        goto vy;
        Ex:
        SAMLSPUtilities::addNameId($Ja, $this->nameId);
        vy:
        foreach ($this->SubjectConfirmation as $h9) {
            $h9->toXML($Ja);
            Xq:
        }
        rh:
    }
    private function addConditions(DOMElement $Bf)
    {
        $HL = $Bf->ownerDocument;
        $Bc = $HL->createElementNS("\x75\162\x6e\72\157\x61\x73\x69\163\72\x6e\x61\x6d\x65\x73\x3a\x74\x63\72\x53\x41\115\114\72\62\56\x30\72\141\x73\163\x65\x72\164\x69\x6f\156", "\163\x61\155\x6c\x3a\x43\157\x6e\144\x69\164\151\x6f\156\163");
        $Bf->appendChild($Bc);
        if (!($this->notBefore !== NULL)) {
            goto tS;
        }
        $Bc->setAttribute("\x4e\157\164\102\x65\146\x6f\162\x65", gmdate("\131\55\155\x2d\x64\134\124\110\x3a\151\x3a\x73\x5c\132", $this->notBefore));
        tS:
        if (!($this->notOnOrAfter !== NULL)) {
            goto Po;
        }
        $Bc->setAttribute("\x4e\x6f\164\117\x6e\117\x72\x41\146\x74\145\162", gmdate("\x59\x2d\155\55\144\134\x54\110\72\x69\72\x73\x5c\x5a", $this->notOnOrAfter));
        Po:
        if (!($this->validAudiences !== NULL)) {
            goto vG;
        }
        $za = $HL->createElementNS("\165\x72\x6e\x3a\x6f\141\163\151\x73\72\156\141\155\145\x73\72\164\143\72\x53\101\x4d\x4c\72\x32\x2e\60\x3a\x61\163\163\145\162\x74\151\157\156", "\163\141\x6d\x6c\72\101\165\x64\x69\145\x6e\x63\x65\122\x65\x73\164\162\x69\x63\164\151\x6f\156");
        $Bc->appendChild($za);
        SAMLSPUtilities::addStrings($za, "\x75\x72\x6e\x3a\157\141\163\151\163\x3a\x6e\x61\155\145\163\72\164\143\x3a\x53\x41\x4d\114\x3a\62\56\x30\x3a\x61\x73\x73\x65\x72\164\151\x6f\x6e", "\163\141\x6d\x6c\72\x41\x75\144\x69\x65\x6e\143\x65", FALSE, $this->validAudiences);
        vG:
    }
    private function addAuthnStatement(DOMElement $Bf)
    {
        if (!($this->authnInstant === NULL || $this->authnContextClassRef === NULL && $this->authnContextDecl === NULL && $this->authnContextDeclRef === NULL)) {
            goto v2;
        }
        return;
        v2:
        $HL = $Bf->ownerDocument;
        $fb = $HL->createElementNS("\x75\x72\x6e\72\157\141\163\151\x73\x3a\x6e\141\x6d\x65\163\x3a\x74\143\72\x53\x41\x4d\x4c\x3a\62\x2e\60\x3a\141\163\x73\x65\162\x74\x69\x6f\x6e", "\x73\141\x6d\154\72\101\165\x74\150\x6e\123\x74\141\164\145\x6d\145\x6e\164");
        $Bf->appendChild($fb);
        $fb->setAttribute("\x41\x75\x74\150\x6e\x49\156\163\x74\141\x6e\164", gmdate("\x59\x2d\x6d\55\144\134\124\x48\72\151\72\163\134\x5a", $this->authnInstant));
        if (!($this->sessionNotOnOrAfter !== NULL)) {
            goto EL;
        }
        $fb->setAttribute("\x53\x65\163\163\151\x6f\x6e\116\x6f\164\x4f\156\117\162\x41\x66\164\145\x72", gmdate("\x59\55\155\x2d\x64\x5c\x54\110\x3a\151\72\163\x5c\132", $this->sessionNotOnOrAfter));
        EL:
        if (!($this->sessionIndex !== NULL)) {
            goto yr;
        }
        $fb->setAttribute("\123\145\163\163\x69\x6f\x6e\111\x6e\x64\x65\170", $this->sessionIndex);
        yr:
        $Yc = $HL->createElementNS("\165\x72\x6e\72\157\141\x73\x69\163\72\x6e\141\155\x65\x73\x3a\x74\x63\x3a\x53\x41\x4d\114\72\62\56\x30\72\141\163\x73\145\x72\x74\x69\x6f\x6e", "\x73\141\x6d\154\72\x41\165\164\x68\x6e\103\x6f\156\164\145\x78\x74");
        $fb->appendChild($Yc);
        if (empty($this->authnContextClassRef)) {
            goto Bz;
        }
        SAMLSPUtilities::addString($Yc, "\x75\x72\156\x3a\157\x61\163\151\x73\72\156\141\155\145\163\x3a\x74\143\x3a\x53\x41\x4d\114\72\62\x2e\60\x3a\x61\x73\163\x65\x72\x74\x69\157\156", "\163\141\x6d\x6c\x3a\101\165\164\x68\156\x43\x6f\156\x74\145\170\x74\x43\x6c\x61\x73\163\x52\x65\x66", $this->authnContextClassRef);
        Bz:
        if (empty($this->authnContextDecl)) {
            goto kk;
        }
        $this->authnContextDecl->toXML($Yc);
        kk:
        if (empty($this->authnContextDeclRef)) {
            goto bm;
        }
        SAMLSPUtilities::addString($Yc, "\x75\162\x6e\x3a\157\x61\163\151\163\72\x6e\141\x6d\145\x73\72\x74\x63\72\123\101\115\x4c\72\x32\56\x30\72\x61\163\163\x65\x72\x74\151\x6f\156", "\163\x61\x6d\x6c\72\x41\x75\x74\x68\156\x43\x6f\156\164\145\170\164\104\145\143\x6c\x52\145\146", $this->authnContextDeclRef);
        bm:
        SAMLSPUtilities::addStrings($Yc, "\x75\x72\156\72\x6f\x61\163\x69\163\72\x6e\x61\155\145\163\x3a\164\x63\x3a\x53\x41\115\114\x3a\62\x2e\60\x3a\141\163\x73\145\x72\x74\151\157\x6e", "\163\141\x6d\154\x3a\x41\165\x74\150\145\x6e\164\x69\143\x61\164\151\156\147\101\165\x74\150\157\x72\x69\164\171", FALSE, $this->AuthenticatingAuthority);
    }
    private function addAttributeStatement(DOMElement $Bf)
    {
        if (!empty($this->attributes)) {
            goto R9;
        }
        return;
        R9:
        $HL = $Bf->ownerDocument;
        $dB = $HL->createElementNS("\x75\x72\x6e\72\157\x61\x73\x69\x73\x3a\x6e\141\155\x65\x73\72\164\x63\72\x53\x41\x4d\114\x3a\x32\56\60\x3a\x61\163\163\x65\x72\x74\151\x6f\x6e", "\163\x61\155\x6c\x3a\101\x74\x74\x72\151\142\165\164\145\x53\164\141\x74\145\155\145\156\164");
        $Bf->appendChild($dB);
        foreach ($this->attributes as $YB => $Yr) {
            $V0 = $HL->createElementNS("\x75\162\156\72\x6f\141\163\151\x73\x3a\x6e\141\x6d\x65\x73\x3a\x74\143\x3a\123\101\x4d\x4c\x3a\62\56\60\x3a\141\x73\163\x65\162\x74\151\157\x6e", "\163\141\155\154\x3a\x41\x74\164\x72\151\x62\x75\164\145");
            $dB->appendChild($V0);
            $V0->setAttribute("\x4e\x61\x6d\x65", $YB);
            if (!($this->nameFormat !== "\x75\162\x6e\x3a\157\141\x73\151\x73\72\156\141\155\145\x73\72\164\143\72\123\101\115\114\x3a\62\x2e\60\x3a\x61\164\x74\x72\156\141\x6d\x65\x2d\x66\x6f\162\155\141\164\72\x75\x6e\163\x70\x65\143\151\146\151\x65\144")) {
                goto mL;
            }
            $V0->setAttribute("\116\141\x6d\x65\106\157\x72\155\x61\x74", $this->nameFormat);
            mL:
            foreach ($Yr as $cK) {
                if (is_string($cK)) {
                    goto dr;
                }
                if (is_int($cK)) {
                    goto mR;
                }
                $YE = NULL;
                goto T2;
                dr:
                $YE = "\170\163\x3a\x73\x74\x72\x69\156\x67";
                goto T2;
                mR:
                $YE = "\x78\163\x3a\151\156\x74\x65\x67\145\162";
                T2:
                $uQ = $HL->createElementNS("\x75\162\156\x3a\157\141\163\151\163\72\156\x61\x6d\x65\x73\x3a\x74\x63\x3a\x53\x41\x4d\114\x3a\62\56\x30\x3a\x61\x73\x73\145\x72\164\x69\x6f\x6e", "\x73\141\155\x6c\72\x41\x74\x74\x72\151\142\x75\164\145\126\x61\x6c\x75\145");
                $V0->appendChild($uQ);
                if (!($YE !== NULL)) {
                    goto cX;
                }
                $uQ->setAttributeNS("\150\164\x74\x70\x3a\x2f\57\167\x77\167\x2e\167\63\x2e\x6f\x72\147\x2f\x32\60\60\61\57\x58\x4d\114\123\x63\150\145\155\141\55\151\x6e\163\164\x61\x6e\143\x65", "\170\x73\151\72\x74\171\160\x65", $YE);
                cX:
                if (!is_null($cK)) {
                    goto oM;
                }
                $uQ->setAttributeNS("\x68\164\x74\x70\x3a\57\57\167\167\x77\x2e\167\63\x2e\157\x72\x67\x2f\x32\60\60\61\x2f\x58\115\x4c\123\143\x68\145\x6d\x61\55\151\x6e\163\x74\141\156\x63\x65", "\x78\163\151\x3a\x6e\x69\x6c", "\x74\x72\x75\145");
                oM:
                if ($cK instanceof DOMNodeList) {
                    goto qA;
                }
                $uQ->appendChild($HL->createTextNode($cK));
                goto wh;
                qA:
                $lw = 0;
                yg:
                if (!($lw < $cK->length)) {
                    goto bD;
                }
                $Kp = $HL->importNode($cK->item($lw), TRUE);
                $uQ->appendChild($Kp);
                HF:
                $lw++;
                goto yg;
                bD:
                wh:
                eS:
            }
            Xd:
            Zj:
        }
        Tn:
    }
    private function addEncryptedAttributeStatement(DOMElement $Bf)
    {
        if (!($this->requiredEncAttributes == FALSE)) {
            goto fQ;
        }
        return;
        fQ:
        $HL = $Bf->ownerDocument;
        $dB = $HL->createElementNS("\165\162\156\x3a\x6f\141\x73\151\x73\72\x6e\141\155\x65\x73\x3a\x74\143\72\123\x41\x4d\x4c\72\62\x2e\x30\x3a\141\x73\x73\145\162\164\151\157\156", "\163\141\x6d\x6c\x3a\101\x74\x74\162\x69\142\x75\164\x65\x53\x74\x61\164\145\x6d\x65\x6e\164");
        $Bf->appendChild($dB);
        foreach ($this->attributes as $YB => $Yr) {
            $PN = new DOMDocument();
            $V0 = $PN->createElementNS("\x75\162\x6e\x3a\157\x61\x73\151\163\x3a\156\141\155\x65\163\72\164\143\x3a\x53\x41\x4d\114\x3a\x32\x2e\x30\x3a\141\x73\x73\145\162\164\x69\x6f\156", "\x73\x61\x6d\154\72\101\164\164\x72\151\142\x75\164\145");
            $V0->setAttribute("\116\x61\155\x65", $YB);
            $PN->appendChild($V0);
            if (!($this->nameFormat !== "\165\162\x6e\x3a\x6f\x61\163\151\163\72\x6e\141\155\145\163\72\x74\143\72\x53\x41\115\114\x3a\x32\x2e\x30\x3a\141\x74\164\162\x6e\141\155\145\55\x66\157\162\155\x61\x74\72\165\156\163\160\145\x63\151\146\151\145\144")) {
                goto DV;
            }
            $V0->setAttribute("\116\141\155\x65\106\x6f\162\155\x61\164", $this->nameFormat);
            DV:
            foreach ($Yr as $cK) {
                if (is_string($cK)) {
                    goto u9;
                }
                if (is_int($cK)) {
                    goto q0;
                }
                $YE = NULL;
                goto xm;
                u9:
                $YE = "\x78\163\72\x73\x74\162\x69\x6e\147";
                goto xm;
                q0:
                $YE = "\170\163\72\151\156\x74\145\x67\x65\x72";
                xm:
                $uQ = $PN->createElementNS("\x75\162\x6e\72\x6f\141\x73\151\163\x3a\x6e\141\x6d\145\x73\x3a\x74\x63\72\123\x41\115\x4c\72\62\x2e\60\72\141\163\x73\x65\162\x74\151\157\x6e", "\163\141\x6d\154\72\x41\164\164\162\x69\142\165\164\145\126\141\154\165\145");
                $V0->appendChild($uQ);
                if (!($YE !== NULL)) {
                    goto Nt;
                }
                $uQ->setAttributeNS("\150\164\164\x70\72\x2f\57\167\x77\x77\x2e\x77\x33\x2e\157\162\147\57\x32\x30\60\x31\57\130\x4d\114\x53\x63\x68\145\x6d\141\55\151\x6e\163\164\141\156\143\x65", "\170\x73\x69\72\x74\171\x70\x65", $YE);
                Nt:
                if ($cK instanceof DOMNodeList) {
                    goto ZY;
                }
                $uQ->appendChild($PN->createTextNode($cK));
                goto uy;
                ZY:
                $lw = 0;
                iY:
                if (!($lw < $cK->length)) {
                    goto QJ;
                }
                $Kp = $PN->importNode($cK->item($lw), TRUE);
                $uQ->appendChild($Kp);
                oh:
                $lw++;
                goto iY;
                QJ:
                uy:
                RV:
            }
            u7:
            $u_ = new XMLSecEnc();
            $u_->setNode($PN->documentElement);
            $u_->type = "\150\164\164\160\72\x2f\x2f\167\167\x77\56\167\63\x2e\x6f\162\x67\x2f\62\60\x30\61\x2f\60\64\x2f\170\155\x6c\145\x6e\x63\43\x45\154\145\x6d\x65\156\x74";
            $Z3 = new XMLSecurityKey(XMLSecurityKey::AES256_CBC);
            $Z3->generateSessionKey();
            $u_->encryptKey($this->encryptionKey, $Z3);
            $rK = $u_->encryptNode($Z3);
            $Ve = $HL->createElementNS("\x75\162\x6e\72\x6f\141\163\x69\x73\72\156\141\155\145\x73\72\x74\x63\72\123\101\x4d\114\x3a\62\x2e\x30\72\x61\x73\163\145\162\x74\x69\x6f\156", "\163\141\x6d\x6c\x3a\x45\x6e\x63\162\x79\160\164\145\144\x41\164\164\x72\151\142\165\164\x65");
            $dB->appendChild($Ve);
            $Lk = $HL->importNode($rK, TRUE);
            $Ve->appendChild($Lk);
            Xw:
        }
        yV:
    }
    public function getPrivateKeyUrl()
    {
        return $this->privateKeyUrl;
    }
    public function setPrivateKeyUrl($NI)
    {
        $this->privateKeyUrl = $NI;
    }
}
