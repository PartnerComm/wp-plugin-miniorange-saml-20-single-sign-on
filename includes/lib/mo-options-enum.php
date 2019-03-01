<?php


include "\102\x61\x73\151\143\x45\156\x75\x6d\56\160\150\160";
class mo_options_enum_sso_login extends BasicEnum
{
    const Relay_state = "\155\157\x5f\x73\141\x6d\x6c\x5f\x72\x65\154\x61\171\x5f\163\164\x61\164\145";
    const Redirect_Idp = "\155\157\137\163\141\x6d\x6c\137\x72\145\147\x69\x73\164\x65\x72\x65\144\137\x6f\x6e\x6c\x79\137\141\x63\x63\x65\x73\163";
    const Force_authentication = "\155\x6f\137\163\141\155\x6c\x5f\146\x6f\x72\x63\x65\137\x61\x75\164\150\x65\x6e\x74\x69\x63\x61\164\151\157\x6e";
    const Enable_access_RSS = "\x6d\157\137\x73\x61\155\154\137\x65\156\x61\142\154\x65\137\x72\x73\x73\x5f\x61\143\143\x65\x73\163";
    const Auto_redirect = "\155\x6f\x5f\x73\141\155\x6c\137\x65\x6e\x61\x62\x6c\145\137\x6c\157\147\151\156\x5f\162\x65\144\151\x72\x65\143\164";
}
class mo_options_enum_identity_provider extends BasicEnum
{
    const Broker_service = "\x6d\157\137\x73\x61\x6d\154\x5f\x65\156\x61\x62\x6c\145\x5f\143\154\157\165\144\137\x62\162\157\x6b\x65\x72";
    const SP_Base_Url = "\x6d\157\137\x73\x61\x6d\154\x5f\163\x70\x5f\142\141\x73\x65\137\165\x72\x6c";
    const SP_Entity_ID = "\x6d\x6f\x5f\x73\x61\155\154\137\163\x70\x5f\145\156\164\x69\164\171\x5f\x69\x64";
}
class mo_options_enum_service_provider extends BasicEnum
{
    const Identity_name = "\x73\x61\155\154\137\x69\144\x65\156\x74\151\x74\171\137\156\141\155\145";
    const Login_binding_type = "\x73\141\x6d\x6c\137\x6c\157\147\151\156\137\142\x69\x6e\144\x69\x6e\147\137\x74\x79\x70\x65";
    const Login_URL = "\163\141\x6d\154\x5f\x6c\157\x67\151\x6e\137\x75\162\154";
    const Logout_binding_type = "\163\x61\x6d\154\x5f\x6c\x6f\147\157\x75\164\137\x62\x69\156\x64\x69\x6e\x67\137\164\x79\x70\x65";
    const Logout_URL = "\163\x61\155\x6c\137\x6c\157\x67\157\165\164\137\165\162\x6c";
    const Issuer = "\x73\141\x6d\154\137\x69\x73\x73\x75\x65\162";
    const X509_certificate = "\163\x61\x6d\x6c\137\x78\x35\60\71\x5f\x63\145\162\x74\151\x66\x69\x63\x61\164\x65";
    const Request_signed = "\x73\141\x6d\154\137\162\145\x71\165\145\163\164\x5f\163\x69\x67\156\x65\144";
}
class mo_options_enum_attribute_mapping extends BasicEnum
{
    const Attribute_Username = "\x73\x61\x6d\x6c\x5f\141\155\137\165\x73\145\162\156\141\155\145";
    const Attribute_Email = "\x73\141\155\x6c\137\x61\155\x5f\145\155\141\x69\154";
    const Attribute_First_name = "\x73\x61\155\154\137\141\155\x5f\146\151\162\163\164\137\x6e\141\x6d\x65";
    const Attribute_Last_name = "\x73\141\x6d\x6c\137\x61\x6d\137\154\141\163\x74\x5f\x6e\x61\x6d\x65";
    const Attribute_Group_name = "\163\141\x6d\x6c\x5f\141\x6d\137\x67\162\x6f\165\x70\x5f\x6e\x61\x6d\145";
    const Attribute_Custom_mapping = "\x6d\157\x5f\163\x61\155\x6c\137\x63\165\x73\164\157\x6d\x5f\141\x74\x74\x72\x73\137\155\141\160\160\151\x6e\147";
    const Attribute_Account_matcher = "\163\x61\x6d\154\137\141\x6d\x5f\x61\143\143\x6f\x75\156\x74\137\155\x61\x74\x63\x68\145\x72";
}
class mo_options_enum_role_mapping extends BasicEnum
{
    const Role_do_not_auto_create_users = "\x6d\157\137\x73\141\155\x6c\x5f\144\157\156\164\137\x63\x72\145\141\x74\145\x5f\165\x73\145\x72\x5f\151\146\x5f\162\x6f\x6c\145\137\156\157\164\137\155\141\160\x70\x65\144";
    const Role_do_not_assign_role_unlisted = "\163\141\155\x6c\x5f\x61\155\x5f\144\x6f\156\x74\x5f\141\x6c\154\x6f\x77\x5f\x75\x6e\154\x69\x73\x74\x65\144\137\x75\163\x65\x72\137\162\157\154\145";
    const Role_do_not_update_existing_user = "\163\x61\155\154\x5f\x61\155\x5f\144\x6f\156\x74\137\165\x70\144\141\164\x65\x5f\145\170\x69\163\164\151\156\x67\x5f\x75\x73\x65\x72\x5f\162\x6f\x6c\145";
    const Role_default_role = "\x73\141\155\154\137\x61\x6d\x5f\144\145\146\141\165\x6c\x74\x5f\165\163\145\162\x5f\x72\x6f\154\145";
    const Roles = "\x73\141\x6d\154\x5f\141\x6d\x5f\x64\145\146\x61\x75\x6c\164\x5f\165\x73\x65\162\x5f\162\x6f\154\x65";
}
class mo_options_enum_proxy_setup extends BasicEnum
{
    const Proxy_host = "\x6d\157\x5f\x70\162\x6f\x78\171\137\x68\x6f\x73\164";
    const Proxy_port = "\155\x6f\x5f\x70\x72\x6f\x78\171\137\160\157\x72\x74";
    const Proxy_username = "\x6d\x6f\137\x70\x72\157\x78\171\x5f\165\x73\145\162\156\x61\155\145";
    const Proxy_password = "\155\x6f\137\x70\x72\x6f\170\x79\x5f\160\141\163\x73\167\x6f\162\144";
}
class mo_options_error_constants extends BasicEnum
{
    const Error_no_certificate = "\x55\x6e\141\x62\x6c\x65\x20\164\x6f\40\x66\x69\156\144\40\x61\x20\143\145\x72\x74\151\146\151\x63\x61\x74\x65\x20\x2e";
    const Cause_no_certificate = "\116\157\x20\163\x69\147\x6e\x61\x74\x75\162\x65\x20\x66\x6f\165\x6e\x64\x20\151\x6e\x20\x53\x41\115\114\40\x52\145\x73\x70\x6f\156\163\145\x20\x6f\x72\x20\x41\163\x73\145\x72\164\151\157\x6e\56\40\120\154\x65\x61\163\145\40\163\x69\x67\x6e\x20\x61\164\x20\154\145\141\163\164\40\157\x6e\x65\x20\157\x66\40\x74\150\x65\x6d\56";
    const Error_wrong_certificate = "\125\x6e\x61\x62\x6c\145\40\164\157\x20\x66\x69\156\144\40\141\x20\143\x65\x72\x74\x69\x66\x69\x63\141\164\x65\x20\155\141\x74\143\x68\x69\x6e\147\x20\x74\x68\x65\40\143\x6f\156\x66\x69\147\x75\162\145\144\x20\x66\151\156\x67\145\x72\x70\x72\151\156\164\56";
    const Cause_wrong_certificate = "\x58\x2e\65\x30\x39\40\x43\145\x72\164\151\146\x69\x63\x61\164\145\40\146\151\x65\154\x64\x20\x69\156\40\x70\x6c\165\x67\x69\156\x20\144\157\145\x73\40\x6e\x6f\164\40\155\141\164\143\150\x20\164\x68\x65\x20\143\145\x72\164\x69\146\151\x63\x61\x74\145\40\146\157\165\156\144\40\151\156\40\x53\101\115\x4c\x20\x52\145\x73\160\157\156\163\x65\56";
    const Error_invalid_audience = "\x49\x6e\x76\x61\154\x69\x64\x20\101\x75\x64\x69\x65\156\143\145\x20\x55\x52\111\56";
    const Cause_invalid_audience = "\x54\x68\x65\40\x76\141\154\165\145\x20\x6f\x66\40\x27\x41\x75\x64\x69\145\156\x63\145\40\x55\122\x49\x27\40\x66\151\x65\x6c\x64\x20\x6f\156\x20\x49\144\145\156\x74\151\x74\x79\x20\120\x72\x6f\x76\151\144\145\162\x27\x73\40\x73\x69\x64\x65\x20\x69\163\40\x69\x6e\x63\x6f\x72\x72\145\x63\x74";
    const Error_issuer_not_verfied = "\x49\x73\163\165\145\162\x20\x63\x61\156\156\157\x74\x20\x62\145\40\x76\x65\162\151\x66\x69\145\x64\56";
    const Cause_issuer_not_verfied = "\111\x64\x50\x20\105\156\164\x69\164\171\x20\111\104\x20\x63\157\x6e\x66\151\147\165\x72\145\144\x20\x61\x6e\144\40\164\x68\x65\40\157\x6e\145\x20\x66\x6f\x75\x6e\x64\40\x69\x6e\40\x53\x41\x4d\x4c\x20\122\x65\x73\x70\157\156\163\x65\40\x64\x6f\40\x6e\157\164\x20\155\x61\164\143\x68";
}
