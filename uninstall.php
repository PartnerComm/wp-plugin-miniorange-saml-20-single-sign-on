<?php


require_once dirname(__FILE__) . "\x2f\151\156\143\x6c\x75\x64\145\163\57\154\x69\142\x2f\x6d\x6f\x2d\x6f\160\x74\151\157\x6e\x73\x2d\x65\x6e\165\x6d\56\x70\150\160";
require_once dirname(__FILE__) . "\57\x49\x6d\160\x6f\162\x74\55\x65\170\160\x6f\x72\164\x2e\160\150\160";
define("\125\156\x69\x6e\163\x74\x61\154\154\x5f\x43\154\x61\x73\x73\137\x4e\141\155\145\x73", serialize(array("\x53\123\117\x5f\114\157\x67\151\x6e" => "\x6d\x6f\137\157\x70\164\x69\x6f\156\163\137\x65\x6e\165\155\x5f\163\163\157\x5f\x6c\x6f\147\151\x6e", "\x49\x64\145\x6e\164\151\164\171\x5f\x50\162\x6f\x76\151\144\x65\162" => "\155\x6f\137\x6f\x70\164\151\x6f\156\x73\x5f\x65\x6e\x75\x6d\x5f\x69\x64\x65\x6e\x74\151\x74\x79\x5f\x70\x72\157\x76\151\x64\145\162", "\x53\x65\x72\x76\151\143\x65\x5f\x50\x72\157\166\x69\144\x65\x72" => "\155\157\137\x6f\x70\x74\x69\x6f\x6e\x73\x5f\145\x6e\x75\155\x5f\163\x65\x72\x76\x69\143\145\137\x70\162\157\x76\x69\144\x65\x72", "\x41\x74\164\x72\151\x62\x75\x74\x65\x5f\115\141\160\160\151\x6e\x67" => "\x6d\x6f\137\157\x70\x74\151\x6f\156\163\x5f\145\156\165\x6d\137\141\x74\x74\x72\151\x62\165\164\145\137\155\x61\160\x70\x69\x6e\x67", "\x44\x6f\155\x61\x69\156\137\x52\x65\x73\x74\x72\x69\x63\x74\x69\157\x6e" => "\x6d\x6f\137\157\160\164\x69\x6f\x6e\x73\137\x65\156\165\x6d\x5f\144\x6f\155\141\151\x6e\x5f\x72\x65\x73\164\162\151\143\164\x69\x6f\156", "\122\x6f\154\145\x5f\x4d\141\x70\160\x69\x6e\x67" => "\x6d\x6f\x5f\x6f\x70\x74\151\157\156\x73\x5f\145\x6e\165\155\x5f\162\x6f\x6c\145\137\x6d\141\160\160\x69\x6e\x67", "\124\145\x73\164\137\103\x6f\x6e\146\x69\147\x75\162\x61\x74\x69\157\156" => "\155\x6f\x5f\157\x70\164\x69\x6f\156\x73\137\145\x6e\165\x6d\137\x74\145\163\x74\137\x63\x6f\156\146\151\x67\x75\162\x61\x74\x69\x6f\x6e", "\103\x75\x73\x74\x6f\x6d\137\x43\x65\162\164\x69\x66\151\x63\141\x74\145" => "\x6d\157\137\x6f\160\x74\x69\157\x6e\x73\137\145\156\x75\x6d\x5f\x63\165\163\164\x6f\155\137\143\x65\x72\164\x69\x66\x69\143\x61\164\145", "\103\165\x73\x74\x6f\155\x5f\115\x65\163\x73\x61\147\145" => "\155\157\x5f\157\160\164\151\157\x6e\163\x5f\x65\156\x75\155\137\143\165\x73\x74\x6f\155\137\155\145\x73\163\x61\147\145\163", "\x50\154\165\147\x69\x6e\x5f\x41\x64\155\x69\x6e" => "\x6d\157\x5f\x6f\160\x74\x69\157\156\x73\137\x70\154\165\x67\x69\x6e\137\x61\x64\x6d\151\156", "\105\156\166\151\162\x6f\156\x6d\145\156\164\163" => "\155\157\137\x6f\x70\164\151\157\x6e\163\137\145\x6e\166\x69\x72\x6f\156\x6d\x65\156\x74\x73")));
if (defined("\x57\120\137\125\x4e\x49\x4e\123\124\101\x4c\114\137\120\x4c\125\107\111\116")) {
    goto od1;
}
exit;
od1:
if (!(get_option("\x6d\x6f\x5f\163\x61\155\x6c\x5f\x6b\x65\145\x70\137\163\x65\164\x74\151\x6e\x67\163\x5f\x6f\x6e\x5f\144\145\x6c\x65\x74\x69\157\156") !== "\164\162\165\x65")) {
    goto kkS;
}
if (!is_multisite()) {
    goto PkK;
}
global $wpdb;
$uq = $wpdb->get_col("\x53\105\x4c\105\x43\x54\x20\x62\x6c\157\147\x5f\x69\144\40\106\122\x4f\x4d\40{$wpdb->blogs}");
$hv = get_current_blog_id();
foreach ($uq as $blog_id) {
    switch_to_blog($blog_id);
    mo_saml_delete_plugin_configuration();
    mo_saml_delete_user_meta();
    W6a:
}
XT8:
switch_to_blog($hv);
goto d3B;
PkK:
mo_saml_delete_plugin_configuration();
mo_saml_delete_user_meta();
d3B:
kkS:
function mo_saml_delete_plugin_configuration()
{
    $C9 = unserialize(Uninstall_Class_Names);
    $s0 = array();
    foreach ($C9 as $U6 => $St) {
        $s0[$U6] = mo_get_configuration_array($St, true);
        EaQ:
    }
    oop:
    foreach ($s0 as $cT => $kf) {
        foreach ($kf as $yQ => $en) {
            delete_option($en);
            BEC:
        }
        vDE:
        sIZ:
    }
    k_c:
}
function mo_saml_delete_user_meta()
{
    $L8 = get_users(array());
    foreach ($L8 as $user) {
        delete_user_meta($user->ID, "\155\157\137\x73\x61\155\x6c\x5f\165\163\x65\x72\137\141\x74\164\x72\151\x62\x75\164\x65\163");
        delete_user_meta($user->ID, "\x6d\x6f\x5f\x73\x61\155\x6c\137\163\145\163\163\151\157\x6e\x5f\x69\156\144\145\170");
        delete_user_meta($user->ID, "\155\157\137\x73\x61\155\x6c\x5f\x6e\141\x6d\x65\137\151\x64");
        mVX:
    }
    DQ9:
}
