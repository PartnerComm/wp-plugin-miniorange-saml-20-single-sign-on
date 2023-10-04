<?php
/**
 * This file is a part of the miniorange-saml-20-single-sign-on plugin.
 *
 * @link https://plugins.miniorange.com/
 * @author miniOrange
 * @package miniorange-saml-20-single-sign-on
 */


if (defined("\101\x42\123\x50\101\x54\110")) {
    goto FX;
}
exit;
FX:
class Mo_Saml_WP_CLI_Commands
{
    public function fetch($mH, $ec)
    {
        $e7 = array("\x63\x6f\156\x66\151\x67");
        $this->throw_cli_error_for_empty_values($ec, $e7);
        $rE = $this->fetch_and_validate_file_content($ec["\143\157\156\x66\x69\147"]);
        mo_update_configuration_array($rE);
        WP_CLI::success("\x53\145\x74\x74\x69\156\147\x73\x20\x61\x70\160\x6c\151\145\x64\40\x73\165\x63\x63\145\163\x73\x66\165\x6c\x6c\171\x2e");
        exit;
    }
    public function activate($mH, $ec)
    {
        if (!empty($ec)) {
            goto hJ;
        }
        WP_CLI::error(Mo_Saml_Cli_Error::INCORRECT_COMMAND);
        hJ:
        $g4 = array("\146\151\x6c\x65", "\144\x6f\x6d\x61\x69\x6e");
        $this->throw_cli_error_for_empty_values($ec, $g4);
        $dd = $ec["\x64\157\155\141\151\x6e"];
        $Vz = $this->fetch_and_validate_file_content($ec["\x66\151\154\145"]);
        if (!(empty($Vz) || !array($Vz))) {
            goto d_;
        }
        WP_CLI::error(Mo_Saml_Cli_Error::INVALID_JSON);
        d_:
        $e7 = array("\x61\144\x6d\151\x6e\137\145\x6d\141\x69\x6c", "\x63\x75\163\164\x6f\x6d\x65\x72\x5f\153\145\171", "\143\165\x73\x74\x6f\x6d\145\x72\137\141\x70\151\x5f\153\x65\171", "\x63\165\x73\x74\x6f\155\x65\162\137\164\x6f\153\x65\x6e\137\153\145\171", $dd);
        $this->throw_cli_error_for_empty_values($Vz, $e7);
        $r2 = $Vz[$dd];
        $e7 = array("\155\157\137\163\141\155\154\x5f\x6c\151\x63\145\x6e\x73\x65\x5f\153\145\171");
        $this->throw_cli_error_for_empty_values($r2, $e7);
        $MA = $Vz[$dd]["\x6d\x6f\137\163\x61\x6d\154\137\x6c\151\143\145\156\163\145\137\153\x65\x79"];
        $Z4 = new saml_mo_login();
        $Z4->mo_sso_saml_deactivate();
        $Z4->mo_cli_save_details($Vz["\x63\165\x73\164\157\155\x65\x72\137\x6b\145\171"], $Vz["\x63\165\163\164\157\x6d\145\162\137\141\160\151\x5f\x6b\x65\171"], $Vz["\143\165\x73\164\x6f\155\x65\x72\137\x74\x6f\153\x65\x6e\137\153\145\171"], $Vz["\141\x64\x6d\x69\x6e\x5f\x65\155\x61\x69\154"], $MA);
    }
    private function throw_cli_error_for_empty_values($vC, $e7)
    {
        foreach ($e7 as $mr) {
            if (!empty($vC[$mr])) {
                goto GA;
            }
            WP_CLI::error("\x54\150\x65\162\145\40\x77\x61\x73\x20\141\156\x20\145\162\x72\x6f\162\40\x70\162\157\x63\145\163\163\151\156\147\40\x79\x6f\165\162\x20\x72\x65\x71\x75\x65\x73\164\56\x20" . $mr . "\40\151\x73\40\145\151\x74\x68\145\x72\x20\145\x6d\x70\164\x79\x20\157\162\x20\156\165\154\154");
            GA:
            vk:
        }
        sq:
    }
    private function fetch_and_validate_file_content($pk)
    {
        $BV = dirname(__FILE__) . "\57" . $pk;
        $zT = $this->get_valid_file_data($BV);
        $tp = json_decode($zT, true);
        if (!(json_last_error() !== JSON_ERROR_NONE)) {
            goto BI;
        }
        WP_CLI::error(Mo_Saml_Cli_Error::INVALID_JSON);
        BI:
        return $tp;
    }
    private function json_validator($iZ)
    {
        if (empty($iZ)) {
            goto K8;
        }
        return is_string($iZ) && is_array(json_decode($iZ, true)) ? true : false;
        K8:
        return false;
    }
    private function get_valid_file_data($BV)
    {
        if (file_exists($BV)) {
            goto Tl;
        }
        WP_CLI::error(Mo_Saml_Cli_Error::FILE_NOT_FOUND);
        Tl:
        $iZ = file_get_contents($BV);
        if ($this->json_validator($iZ)) {
            goto KR;
        }
        WP_CLI::error(Mo_Saml_Cli_Error::INCORRECT_FILE_FORMAT);
        KR:
        return $iZ;
    }
}
WP_CLI::add_command("\x73\141\155\154", "\115\x6f\x5f\123\141\x6d\x6c\x5f\127\120\137\x43\114\111\137\x43\x6f\x6d\x6d\x61\156\144\163");
