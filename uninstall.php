<?php


require_once dirname(__FILE__) . "\57\151\156\x63\x6c\x75\x64\x65\163\57\x6c\151\142\57\x6d\157\x2d\x6f\160\x74\x69\x6f\x6e\163\55\145\x6e\x75\x6d\x2e\160\x68\x70";
require_once dirname(__FILE__) . "\x2f\x49\155\x70\157\162\164\55\x65\x78\160\157\x72\x74\x2e\160\150\160";
define("\x55\x6e\x69\x6e\163\x74\x61\x6c\x6c\x5f\x43\154\x61\x73\x73\x5f\x4e\x61\155\x65\x73", serialize(array("\123\x53\117\x5f\114\x6f\147\151\156" => "\155\x6f\x5f\157\x70\x74\151\x6f\156\163\x5f\x65\156\165\155\x5f\163\163\157\137\154\x6f\147\151\x6e", "\111\144\x65\x6e\164\x69\164\x79\x5f\x50\162\x6f\x76\151\144\x65\x72" => "\155\x6f\x5f\157\160\x74\151\x6f\156\x73\137\x65\x6e\165\x6d\x5f\x69\144\x65\156\x74\x69\164\171\x5f\160\x72\x6f\166\151\x64\145\162", "\x53\x65\162\x76\151\143\x65\x5f\120\162\x6f\166\x69\x64\145\162" => "\155\x6f\137\x6f\x70\x74\151\x6f\x6e\x73\137\x65\156\165\155\137\x73\145\x72\166\151\143\x65\137\x70\162\157\x76\x69\144\145\162", "\101\164\164\162\x69\x62\x75\164\x65\x5f\115\141\160\160\x69\156\x67" => "\x6d\x6f\x5f\x6f\160\164\151\x6f\x6e\163\137\145\156\165\155\137\141\x74\164\x72\151\x62\x75\164\145\x5f\155\x61\x70\x70\x69\x6e\147", "\x44\x6f\155\141\x69\156\x5f\x52\145\x73\164\x72\151\x63\164\151\x6f\156" => "\x6d\157\137\x6f\x70\164\x69\x6f\x6e\x73\137\x65\x6e\x75\155\137\x64\157\x6d\x61\151\x6e\137\162\145\x73\164\162\x69\x63\x74\151\x6f\x6e", "\x52\x6f\x6c\145\137\115\x61\160\x70\151\x6e\x67" => "\155\x6f\x5f\157\160\164\x69\157\156\163\137\145\x6e\x75\x6d\137\x72\x6f\154\145\x5f\155\x61\160\160\151\x6e\x67", "\124\145\x73\164\137\x43\157\156\146\x69\147\165\162\x61\164\x69\157\156" => "\155\x6f\137\157\160\164\151\x6f\x6e\x73\137\145\x6e\x75\x6d\x5f\164\145\x73\164\137\x63\157\156\x66\151\x67\165\x72\141\x74\x69\157\x6e", "\103\165\163\x74\x6f\x6d\x5f\103\x65\162\x74\151\x66\151\143\x61\164\x65" => "\x6d\157\x5f\157\160\164\x69\157\x6e\163\137\x65\156\x75\x6d\137\143\165\x73\x74\x6f\x6d\137\x63\145\x72\164\x69\x66\151\x63\141\164\x65", "\103\165\163\x74\x6f\x6d\x5f\115\x65\163\163\141\x67\145" => "\x6d\x6f\137\157\x70\164\151\x6f\156\x73\x5f\x65\156\165\155\137\x63\x75\x73\164\x6f\155\x5f\155\145\163\x73\141\147\145\163", "\120\x6c\x75\147\x69\156\137\101\x64\x6d\x69\x6e" => "\x6d\157\x5f\157\160\x74\151\157\156\x73\137\x70\x6c\x75\x67\151\x6e\x5f\x61\x64\x6d\151\156")));
if (defined("\x57\x50\137\x55\x4e\x49\x4e\x53\124\101\114\114\x5f\120\114\x55\107\111\116")) {
    goto fM;
}
die;
fM:
if (!(get_option("\x6d\157\137\163\141\155\x6c\x5f\153\x65\x65\x70\137\x73\145\164\x74\x69\156\x67\163\x5f\157\156\137\x64\x65\x6c\x65\164\x69\157\156") !== "\x74\x72\x75\x65")) {
    goto S9;
}
if (!is_multisite()) {
    goto GV;
}
global $wpdb;
$o2 = $wpdb->get_col("\x53\105\x4c\105\x43\x54\x20\x62\x6c\x6f\147\x5f\151\144\x20\106\x52\117\115\40{$wpdb->blogs}");
$SP = get_current_blog_id();
foreach ($o2 as $blog_id) {
    switch_to_blog($blog_id);
    mo_saml_delete_plugin_configuration();
    mo_saml_delete_user_meta();
    AA:
}
yG:
switch_to_blog($SP);
goto gf;
GV:
mo_saml_delete_plugin_configuration();
mo_saml_delete_user_meta();
gf:
S9:
function mo_saml_delete_plugin_configuration()
{
    $sl = unserialize(Uninstall_Class_Names);
    $ll = array();
    foreach ($sl as $ES => $DE) {
        $ll[$ES] = mo_get_configuration_array($DE, true);
        M0:
    }
    Dm:
    foreach ($ll as $So => $dC) {
        foreach ($dC as $ux => $un) {
            delete_option($un);
            z9:
        }
        oe:
        J3:
    }
    pp:
}
function mo_saml_delete_user_meta()
{
    $sp = get_users(array());
    foreach ($sp as $user) {
        delete_user_meta($user->ID, "\x6d\x6f\137\163\141\x6d\154\x5f\165\163\145\x72\x5f\141\164\164\162\x69\x62\x75\x74\x65\x73");
        delete_user_meta($user->ID, "\155\157\137\163\141\155\x6c\137\163\145\163\x73\x69\x6f\x6e\x5f\151\x6e\x64\145\x78");
        delete_user_meta($user->ID, "\155\x6f\x5f\163\141\x6d\x6c\x5f\156\x61\x6d\x65\x5f\x69\144");
        Jq:
    }
    qt:
}
?>
