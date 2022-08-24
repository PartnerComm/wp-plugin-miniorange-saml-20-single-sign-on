<?php


class mo_saml_wp_cli_commands
{
    private function check_for_empty_or_null($wM, $N5)
    {
        if (!empty($wM)) {
            goto LT;
        }
        WP_CLI::error("\124\x68\145\162\145\x20\150\141\x73\x20\x62\145\145\x6e\x20\x65\162\x72\157\162\x20\160\162\x6f\x63\x65\163\x73\151\156\x67\x20\x79\x6f\x75\x72\x20\x72\145\161\165\x65\163\x74\x2e\x20" . $N5 . "\40\151\x73\x20\145\151\x74\x68\145\x72\x20\x65\x6d\160\164\x79\x20\x6f\x72\40\x6e\x75\x6c\154");
        LT:
    }
    private function file_checks($sx)
    {
        if (file_exists($sx)) {
            goto V0;
        }
        WP_CLI::error(mo_saml_cli_error::File_Not_Found);
        V0:
        $xZ = filetype($sx);
        if (!($xZ != "\152\163\157\156")) {
            goto e3;
        }
        WP_CLI::error(mo_saml_cli_error::Incorrect_File_Format);
        e3:
    }
    public function fetch($fa, $wA)
    {
        $this->check_for_empty_or_null($wA["\143\157\156\x66\x69\x67"], "\111\156\160\x75\x74");
        $sx = dirname(__FILE__) . "\57" . $wA["\x63\x6f\156\146\151\147"];
        $this->file_checks($sx);
        $yC = file_get_contents($sx);
        $yC = json_decode($yC, true);
        if (!(json_last_error() !== JSON_ERROR_NONE)) {
            goto NS;
        }
        WP_CLI::error(mo_saml_cli_error::Invalid_JSON);
        NS:
        mo_update_configuration_array($yC);
        WP_CLI::success("\x53\145\164\x74\151\x6e\147\163\40\141\x70\x70\x6c\151\x65\144\x20\x73\x75\x63\x63\x65\x73\163\146\x75\154\x6c\171\x2e");
        exit;
    }
    public function activate($fa, $wA)
    {
        $this->check_for_empty_or_null($wA["\146\151\x6c\145"], "\106\x69\x6c\x65");
        $this->check_for_empty_or_null($wA["\144\x6f\155\x61\x69\x6e"], "\x44\157\155\x61\x69\x6e");
        $sx = dirname(__FILE__) . "\57" . $wA["\x66\151\x6c\x65"];
        $this->file_checks($sx);
        $B1 = file_get_contents($sx);
        $rM = json_decode($B1);
        if (!(json_last_error() !== JSON_ERROR_NONE)) {
            goto fH;
        }
        WP_CLI::error(mo_saml_cli_error::Invalid_JSON);
        fH:
        $Ef = $rM->customer_key;
        $ry = $rM->customer_api_key;
        $m3 = $rM->customer_token_key;
        $Z3 = $rM->admin_email;
        $this->check_for_empty_or_null($Ef, "\x43\165\163\x74\x6f\155\x65\x72\x20\113\145\x79");
        $this->check_for_empty_or_null($ry, "\x43\x75\x73\164\157\155\x65\162\40\x41\120\x49\x20\113\145\171");
        $this->check_for_empty_or_null($m3, "\x43\165\163\x74\x6f\155\x65\162\x20\124\x6f\x6b\145\x6e");
        $this->check_for_empty_or_null($Z3, "\x41\144\155\x69\x6e\x20\105\x6d\x61\151\154");
        $ng = $wA["\x64\157\155\x61\151\x6e"];
        $x_ = $rM->{$ng};
        $ei = $x_->mo_saml_license_key;
        $this->check_for_empty_or_null($ei, "\x4c\x69\x63\145\156\x73\x65\40\113\145\x79");
        $p2 = new saml_mo_login();
        $p2->mo_sso_saml_deactivate();
        $p2->mo_cli_save_details($Ef, $ry, $m3, $Z3, $ei);
    }
}
WP_CLI::add_command("\163\141\155\x6c", "\155\x6f\137\x73\x61\155\154\x5f\x77\x70\137\143\154\151\x5f\x63\x6f\155\155\x61\x6e\x64\163");
