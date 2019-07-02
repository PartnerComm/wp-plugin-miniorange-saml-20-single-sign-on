<?php


include "\x42\141\163\151\143\x45\x6e\x75\155\x2e\x70\150\160";
class mo_options_enum_sso_login extends BasicEnum
{
    const Relay_state = "\155\157\x5f\163\x61\155\x6c\137\x72\x65\154\141\171\137\163\x74\x61\x74\145";
    const Redirect_Idp = "\x6d\x6f\x5f\x73\x61\x6d\154\x5f\x72\145\x67\151\163\164\x65\x72\145\144\137\157\156\x6c\x79\x5f\x61\143\x63\145\163\x73";
    const Force_authentication = "\x6d\157\137\x73\141\155\x6c\137\146\157\x72\x63\x65\x5f\141\165\164\x68\x65\x6e\164\x69\143\x61\164\151\157\x6e";
    const Enable_access_RSS = "\x6d\x6f\137\x73\141\x6d\x6c\x5f\145\156\x61\142\154\145\x5f\x72\163\x73\137\141\143\143\145\163\x73";
    const Auto_redirect = "\155\157\137\163\141\155\x6c\137\x65\x6e\141\x62\x6c\x65\x5f\154\157\147\151\156\x5f\x72\x65\144\x69\x72\x65\143\x74";
    const Allow_wp_signin = "\x6d\x6f\137\x73\x61\x6d\154\137\141\154\x6c\157\167\x5f\167\160\137\x73\x69\x67\156\x69\x6e";
    const Backdoor_URL = "\x6d\x6f\137\x73\x61\155\154\x5f\142\141\x63\153\x64\157\157\162\x5f\165\x72\x6c";
    const Custom_login_button = "\155\x6f\137\x73\x61\155\154\x5f\143\x75\x73\x74\157\155\137\154\x6f\x67\151\x6e\137\x74\145\170\164";
    const Custom_greeting_text = "\x6d\157\137\163\x61\x6d\154\137\x63\x75\x73\164\x6f\155\x5f\147\162\x65\145\164\x69\x6e\147\137\x74\x65\170\x74";
    const Custom_greeting_name = "\155\x6f\137\163\x61\155\154\x5f\147\162\145\145\x74\151\156\x67\137\x6e\141\155\x65";
    const Custom_logout_button = "\155\x6f\x5f\x73\141\155\154\137\x63\165\x73\x74\x6f\155\x5f\154\x6f\x67\157\165\164\x5f\x74\x65\x78\x74";
    const Redirect_to_WP_login = "\x6d\157\137\x73\141\155\x6c\x5f\162\145\144\x69\162\145\143\x74\x5f\x74\x6f\137\x77\160\x5f\x6c\x6f\x67\x69\x6e";
    const Add_SSO_button = "\x6d\157\137\163\x61\155\x6c\x5f\x61\144\x64\x5f\x73\x73\x6f\x5f\142\x75\164\x74\157\x6e\x5f\x77\x70";
    const Use_Button_as_shortcode = "\x6d\157\137\163\x61\155\x6c\137\165\163\x65\137\142\x75\x74\x74\157\156\x5f\x61\163\x5f\163\x68\x6f\162\x74\143\157\x64\145";
    const Use_Button_as_widget = "\155\x6f\137\x73\141\155\154\x5f\165\x73\145\x5f\142\x75\164\164\157\x6e\137\x61\163\137\x77\x69\144\147\145\164";
    const SSO_Button_Size = "\155\157\x5f\163\x61\x6d\154\137\142\165\164\164\157\156\x5f\x73\x69\172\145";
    const SSO_Button_Width = "\155\157\137\x73\x61\155\154\x5f\x62\165\164\164\157\156\x5f\167\x69\144\164\150";
    const SSO_Button_Height = "\155\x6f\x5f\163\141\x6d\x6c\137\x62\165\164\x74\x6f\x6e\137\150\x65\151\147\150\x74";
    const SSO_Button_Curve = "\155\x6f\x5f\163\141\x6d\x6c\137\x62\165\164\x74\157\156\137\143\x75\x72\x76\145";
    const SSO_Button_Color = "\155\x6f\137\163\x61\155\x6c\137\142\x75\164\164\x6f\156\137\143\157\154\x6f\162";
    const SSO_Button_Text = "\155\157\137\x73\141\155\x6c\x5f\x62\165\164\164\157\x6e\x5f\164\x65\170\164";
    const SSO_Button_font_color = "\155\x6f\137\x73\x61\x6d\x6c\137\x66\157\156\164\137\143\x6f\154\x6f\162";
    const SSO_Button_font_size = "\x6d\157\x5f\x73\x61\155\154\137\x66\x6f\156\164\137\x73\x69\x7a\x65";
    const SSO_Button_position = "\x73\x73\x6f\x5f\142\x75\x74\164\157\156\x5f\154\x6f\147\x69\x6e\x5f\x66\x6f\x72\x6d\x5f\x70\x6f\x73\151\x74\x69\157\x6e";
    const Keep_Configuration_Intact = "\155\x6f\x5f\x73\141\x6d\154\137\153\145\x65\160\137\163\x65\164\164\151\x6e\x67\163\x5f\x6f\156\x5f\x64\145\x6c\x65\164\151\157\156";
}
class mo_options_enum_identity_provider extends BasicEnum
{
    const Broker_service = "\155\x6f\137\x73\x61\155\x6c\x5f\145\x6e\141\142\x6c\x65\x5f\x63\x6c\157\x75\144\137\x62\x72\x6f\153\145\x72";
    const SP_Base_Url = "\x6d\157\x5f\x73\141\x6d\154\137\x73\160\x5f\142\141\x73\x65\137\x75\162\x6c";
    const SP_Entity_ID = "\x6d\157\x5f\x73\141\x6d\154\137\x73\160\x5f\145\156\x74\x69\x74\171\x5f\x69\144";
}
class mo_options_enum_service_provider extends BasicEnum
{
    const Identity_name = "\x73\141\155\154\137\x69\x64\x65\156\x74\x69\164\171\x5f\x6e\141\x6d\x65";
    const Login_binding_type = "\163\x61\x6d\x6c\137\x6c\157\x67\151\x6e\x5f\142\151\x6e\144\151\x6e\x67\x5f\x74\x79\160\145";
    const Login_URL = "\x73\141\x6d\154\137\154\157\x67\x69\156\x5f\x75\x72\x6c";
    const Logout_binding_type = "\163\x61\x6d\154\x5f\x6c\157\147\x6f\165\164\x5f\x62\151\x6e\144\x69\156\147\x5f\x74\171\160\145";
    const Logout_URL = "\x73\141\x6d\154\x5f\x6c\157\147\x6f\165\x74\x5f\x75\162\154";
    const Issuer = "\163\141\x6d\154\x5f\x69\163\163\x75\145\x72";
    const X509_certificate = "\x73\141\x6d\x6c\x5f\170\x35\60\71\x5f\143\x65\162\x74\x69\146\x69\143\141\164\x65";
    const Request_signed = "\163\x61\155\x6c\137\x72\145\x71\x75\145\x73\164\x5f\x73\x69\x67\x6e\145\x64";
    const NameID_Format = "\x73\141\x6d\x6c\137\x6e\141\x6d\145\151\x64\137\x66\x6f\x72\x6d\x61\x74";
    const Guide_name = "\163\141\155\154\137\151\144\x65\x6e\x74\x69\164\x79\137\x70\x72\x6f\166\151\144\x65\x72\x5f\x67\x75\151\x64\145\x5f\156\x61\155\x65";
    const Is_encoding_enabled = "\155\157\x5f\x73\x61\155\154\137\x65\156\143\157\144\151\x6e\x67\x5f\145\156\141\142\x6c\145\x64";
}
class mo_options_enum_test_configuration extends BasicEnum
{
    const SAML_REQUEST = "\155\157\137\x73\141\x6d\154\x5f\162\145\161\x75\x65\163\x74";
    const SAML_RESPONSE = "\155\x6f\x5f\163\x61\x6d\154\x5f\x72\x65\x73\x70\157\156\163\x65";
    const TEST_CONFIG_ERROR_LOG = "\155\157\137\x73\x61\x6d\x6c\137\x74\x65\163\x74";
    const TEST_CONFIG_ATTIBUTES = "\x6d\157\137\x73\141\x6d\x6c\x5f\x74\x65\x73\x74\137\143\x6f\x6e\146\151\x67\137\x61\x74\164\x72\163";
}
class mo_options_enum_attribute_mapping extends BasicEnum
{
    const Attribute_Username = "\x73\x61\155\154\137\141\155\137\165\163\x65\162\x6e\141\x6d\x65";
    const Attribute_Email = "\163\141\x6d\x6c\x5f\x61\155\137\x65\155\141\151\x6c";
    const Attribute_First_name = "\163\141\155\x6c\x5f\141\155\137\146\x69\x72\163\x74\x5f\x6e\x61\155\145";
    const Attribute_Last_name = "\x73\x61\155\154\137\x61\155\137\x6c\x61\x73\164\137\156\141\155\x65";
    const Attribute_Group_name = "\x73\x61\155\154\137\x61\x6d\x5f\147\x72\x6f\165\160\x5f\x6e\x61\155\x65";
    const Attribute_Custom_mapping = "\155\157\x5f\x73\141\x6d\x6c\137\x63\x75\163\164\x6f\x6d\x5f\x61\x74\164\162\163\137\155\x61\x70\x70\x69\156\147";
    const Attribute_Account_matcher = "\163\141\155\154\137\x61\155\137\x61\143\143\157\x75\x6e\164\137\155\141\x74\143\150\x65\x72";
    const Attribute_Display_name = "\163\141\x6d\154\137\141\155\137\x64\x69\x73\x70\x6c\141\171\x5f\156\141\155\145";
}
class mo_options_enum_domain_restriction extends BasicEnum
{
    const Email_Domains = "\163\141\155\x6c\137\x61\x6d\x5f\x65\155\141\x69\154\x5f\x64\157\x6d\x61\x69\x6e\163";
    const Enable_Domain_Restriction_Login = "\x6d\157\x5f\x73\x61\155\154\x5f\x65\x6e\x61\x62\154\145\x5f\x64\157\155\141\151\156\x5f\162\x65\163\164\x72\151\143\164\151\157\156\x5f\154\x6f\x67\x69\156";
    const Allow_deny_user_with_Domain = "\155\157\x5f\163\141\155\x6c\x5f\x61\x6c\154\x6f\167\x5f\144\145\x6e\171\x5f\165\163\145\x72\x5f\x77\x69\x74\x68\137\144\157\155\141\151\x6e";
}
class mo_options_enum_role_mapping extends BasicEnum
{
    const Role_do_not_auto_create_users = "\x6d\x6f\x5f\163\x61\155\154\137\x64\x6f\x6e\164\137\143\162\x65\x61\x74\x65\x5f\x75\163\x65\x72\x5f\151\146\x5f\x72\x6f\x6c\x65\137\x6e\157\164\137\155\x61\160\160\145\144";
    const Role_do_not_assign_role_unlisted = "\163\141\155\154\x5f\x61\155\x5f\x64\157\x6e\164\x5f\141\x6c\x6c\157\167\137\x75\x6e\154\x69\163\x74\145\144\x5f\x75\x73\x65\162\x5f\x72\x6f\x6c\x65";
    const Role_do_not_update_existing_user = "\163\x61\x6d\x6c\137\x61\155\137\144\157\x6e\164\137\x75\160\144\x61\x74\145\137\x65\170\x69\163\164\x69\x6e\x67\137\165\x73\145\162\x5f\x72\x6f\154\145";
    const Role_default_role = "\163\141\155\154\137\x61\155\x5f\x64\x65\x66\141\165\154\164\x5f\165\163\x65\x72\137\x72\157\x6c\145";
    const Role_do_not_login_with_roles = "\163\141\155\x6c\137\141\x6d\137\144\157\x6e\164\137\x61\154\x6c\157\x77\x5f\x75\x73\145\x72\x5f\x74\x6f\154\157\147\151\x6e\137\143\x72\x65\141\x74\145\137\x77\x69\x74\x68\137\147\151\x76\145\156\x5f\147\x72\157\x75\160\x73";
    const Role_restrict_users_with_groups = "\x6d\x6f\137\x73\141\x6d\154\x5f\162\x65\x73\x74\x72\x69\143\164\x5f\x75\163\x65\x72\x73\x5f\167\x69\164\x68\x5f\147\162\157\165\x70\163";
    const Role_mapping = "\163\141\x6d\x6c\137\141\x6d\x5f\x72\x6f\x6c\145\x5f\x6d\x61\160\160\151\x6e\147";
}
class mo_options_enum_custom_certificate extends BasicEnum
{
    const Custom_Public_Certificate = "\155\157\137\163\x61\x6d\x6c\x5f\x63\x75\163\164\157\x6d\x5f\143\145\162\x74";
    const Custom_Private_Certificate = "\x6d\157\137\163\141\x6d\x6c\137\x63\x75\163\x74\157\x6d\x5f\x63\145\x72\x74\x5f\x70\162\x69\x76\141\164\x65\x5f\x6b\145\171";
}
class mo_options_enum_custom_messages extends BasicEnum
{
    const Custom_Account_Creation_Disabled_message = "\155\157\137\163\141\155\x6c\x5f\141\143\x63\157\x75\x6e\x74\x5f\x63\162\x65\x61\164\151\157\x6e\137\144\x69\x73\x61\142\154\145\144\137\155\163\x67";
    const Custom_Restricted_Domain_message = "\155\x6f\137\163\x61\x6d\154\137\x72\x65\x73\164\x72\x69\x63\164\x65\x64\137\x64\x6f\155\x61\151\x6e\137\145\x72\162\x6f\162\137\x6d\x73\147";
}
class mo_options_error_constants extends BasicEnum
{
    const Error_no_certificate = "\125\x6e\141\x62\154\145\x20\164\157\40\146\x69\156\144\40\x61\40\143\x65\162\164\x69\x66\x69\x63\x61\x74\x65\x20\56";
    const Cause_no_certificate = "\116\157\40\163\151\x67\x6e\141\x74\x75\162\145\x20\146\157\x75\x6e\x64\x20\x69\156\x20\x53\x41\x4d\x4c\40\122\145\163\x70\157\x6e\x73\x65\x20\157\162\x20\x41\x73\163\145\162\164\x69\x6f\x6e\56\x20\x50\154\x65\141\x73\x65\x20\x73\151\147\156\x20\x61\x74\40\154\x65\x61\x73\x74\40\157\156\x65\x20\x6f\146\40\x74\x68\x65\155\x2e";
    const Error_wrong_certificate = "\x55\x6e\x61\142\154\x65\x20\x74\157\40\x66\x69\x6e\x64\x20\141\x20\143\145\162\x74\151\146\151\143\x61\x74\145\40\155\x61\164\143\150\x69\x6e\147\x20\x74\x68\145\x20\143\x6f\x6e\x66\x69\147\x75\x72\145\x64\40\x66\x69\x6e\147\145\x72\160\162\x69\x6e\164\56";
    const Cause_wrong_certificate = "\x58\56\65\x30\71\x20\x43\x65\162\x74\151\146\151\x63\x61\164\145\40\146\151\145\154\144\40\151\x6e\40\x70\x6c\x75\147\x69\x6e\x20\144\x6f\x65\x73\40\x6e\x6f\164\40\x6d\x61\x74\143\x68\x20\x74\x68\145\x20\143\145\x72\x74\x69\146\151\143\x61\x74\x65\40\x66\x6f\165\x6e\144\x20\151\x6e\x20\123\x41\x4d\x4c\x20\x52\145\x73\x70\157\156\x73\x65\56";
    const Error_invalid_audience = "\111\156\166\x61\154\151\x64\x20\101\x75\x64\x69\145\x6e\x63\145\40\125\122\x49\56";
    const Cause_invalid_audience = "\124\x68\145\40\x76\141\x6c\165\x65\40\x6f\146\x20\47\x41\165\144\151\x65\x6e\143\x65\40\x55\122\111\x27\x20\146\151\x65\x6c\x64\x20\x6f\x6e\x20\x49\x64\x65\x6e\x74\151\164\x79\40\x50\162\x6f\166\x69\x64\145\x72\x27\x73\40\x73\x69\x64\x65\40\x69\x73\x20\x69\x6e\x63\x6f\x72\162\145\x63\164";
    const Error_issuer_not_verfied = "\111\163\163\165\x65\162\x20\143\141\156\x6e\x6f\164\40\x62\145\40\166\145\x72\151\146\151\145\x64\56";
    const Cause_issuer_not_verfied = "\111\x64\120\x20\x45\x6e\x74\x69\164\x79\40\111\x44\x20\143\x6f\x6e\146\x69\x67\x75\x72\145\144\x20\x61\156\144\40\164\150\x65\x20\157\x6e\x65\40\x66\157\165\156\x64\x20\151\x6e\40\x53\x41\115\114\40\122\x65\163\x70\x6f\x6e\163\145\x20\x64\x6f\x20\156\x6f\x74\x20\x6d\141\164\143\150";
}
class mo_options_enum_nameid_formats extends BasicEnum
{
    const EMAIL = "\165\162\156\x3a\157\x61\163\x69\163\72\156\x61\155\145\163\72\164\x63\72\x53\x41\115\x4c\72\61\56\61\72\x6e\x61\x6d\x65\151\x64\x2d\146\157\162\155\x61\164\x3a\x65\x6d\141\151\154\101\x64\144\162\145\x73\x73";
    const UNSPECIFIED = "\x75\162\x6e\72\157\141\x73\151\x73\72\x6e\141\x6d\x65\x73\72\164\x63\72\x53\x41\115\114\x3a\61\x2e\61\x3a\156\x61\x6d\x65\x69\144\55\146\157\162\x6d\x61\164\72\165\x6e\x73\160\145\x63\x69\146\151\x65\144";
    const TRANSIENT = "\x75\x72\x6e\72\x6f\x61\x73\151\x73\72\156\141\155\145\163\72\164\x63\x3a\123\x41\115\114\x3a\62\56\x30\x3a\156\141\x6d\x65\x69\144\55\146\x6f\162\x6d\141\x74\72\x74\x72\x61\156\x73\x69\x65\x6e\x74";
    const PERSISTENT = "\x75\x72\156\72\157\141\x73\151\163\72\156\x61\155\145\163\x3a\164\x63\72\x53\101\115\x4c\72\x32\56\60\x3a\x6e\141\155\145\151\x64\55\146\x6f\x72\x6d\x61\164\x3a\160\145\162\163\151\x73\x74\x65\156\x74";
}
class mo_options_plugin_constants extends BasicEnum
{
    const CMS_Name = "\127\x50";
    const Application_Name = "\x57\x50\40\x6d\151\156\x69\x4f\x72\141\156\x67\x65\40\123\101\115\114\x20\x32\x2e\60\40\123\123\117\x20\120\154\x75\x67\x69\156";
    const Application_type = "\123\101\115\114";
    const Version = "\x31\x31\x2e\64\x2e\62";
    const HOSTNAME = "\x68\164\x74\160\163\x3a\x2f\x2f\x6c\157\x67\151\156\x2e\x78\145\x63\165\x72\151\x66\x79\x2e\x63\157\x6d";
}
class mo_options_plugin_idp extends BasicEnum
{
    public static $IDP_GUIDES = array("\101\x44\106\x53" => "\141\144\146\x73", "\x4f\x6b\164\x61" => "\x6f\x6b\x74\x61", "\x53\x61\154\145\x73\x46\157\162\x63\145" => "\163\141\x6c\x65\x73\146\x6f\162\143\x65", "\x47\x6f\x6f\x67\154\x65\x20\x41\160\160\163" => "\147\x6f\x6f\147\x6c\x65\55\141\160\x70\x73", "\123\150\151\x62\x62\157\x6c\145\x74\150" => "\163\x68\151\142\142\x6f\x6c\145\164\150", "\x41\x7a\x75\x72\145\x20\x41\x44" => "\141\172\x75\x72\145\55\141\144", "\x4f\x6e\x65\x4c\157\147\x69\x6e" => "\x6f\x6e\145\x6c\157\147\151\156", "\103\x65\x6e\x74\x72\x69\146\x79" => "\143\x65\x6e\x74\162\x69\146\x79", "\x4b\x65\171\143\x6c\x6f\141\x6b" => "\152\142\x6f\163\x73\x2d\x6b\x65\171\143\x6c\157\141\153", "\115\x69\156\x69\x4f\x72\x61\156\x67\x65" => "\x6d\151\x6e\151\157\x72\141\156\x67\x65", "\102\151\x74\151\x75\155" => "\x62\151\x74\x69\x75\155", "\x4f\x74\150\x65\162" => "\x4f\x74\150\x65\162");
}
class mo_options_plugin_admin extends BasicEnum
{
    const HOST_NAME = "\155\x6f\x5f\163\141\x6d\x6c\x5f\150\157\163\164\x5f\x6e\141\x6d\x65";
    const New_Registration = "\x6d\157\137\163\141\155\x6c\x5f\x6e\x65\167\x5f\162\x65\x67\x69\x73\164\x72\x61\164\x69\157\x6e";
    const Admin_Phone = "\x6d\x6f\137\x73\x61\x6d\154\137\x61\144\x6d\151\x6e\x5f\x70\x68\157\x6e\145";
    const Admin_Email = "\155\157\x5f\163\x61\x6d\154\137\x61\x64\x6d\151\156\x5f\x65\155\x61\x69\x6c";
    const Admin_Pass = "\155\x6f\137\x73\141\x6d\x6c\x5f\x61\x64\155\x69\x6e\x5f\x70\141\x73\163\x77\x6f\162\144";
    const Verify_Customer = "\x6d\157\x5f\x73\141\x6d\x6c\x5f\166\145\162\151\x66\x79\x5f\x63\165\163\164\157\x6d\145\x72";
    const Admin_Customer_Key = "\155\x6f\137\163\x61\x6d\x6c\x5f\x61\x64\155\x69\156\x5f\x63\x75\x73\x74\157\x6d\145\162\x5f\153\145\x79";
    const Admin_Api_Key = "\x6d\x6f\137\163\141\x6d\x6c\137\x61\144\x6d\151\156\137\141\x70\151\137\153\145\x79";
    const Customer_Token = "\x6d\x6f\x5f\163\141\155\154\137\143\165\x73\164\x6f\x6d\145\x72\137\164\x6f\153\x65\x6e";
    const Admin_notices_Message = "\155\x6f\x5f\x73\141\x6d\154\x5f\155\x65\x73\x73\x61\147\145";
    const Registration_Status = "\x6d\x6f\x5f\x73\141\155\154\137\x72\145\147\151\x73\164\x72\x61\x74\x69\157\156\x5f\163\164\141\164\x75\163";
    const IDP_Config_ID = "\163\141\x6d\x6c\x5f\151\x64\160\137\x63\157\x6e\x66\x69\x67\x5f\x69\x64";
    const IDP_Config_Complete = "\155\x6f\137\163\x61\155\154\x5f\151\x64\160\137\x63\x6f\x6e\146\151\147\x5f\x63\157\x6d\160\x6c\145\164\145";
    const Transaction_ID = "\155\157\x5f\163\x61\155\154\137\x74\162\x61\156\163\141\x63\x74\x69\157\156\111\x64";
    const SML_LK = "\163\155\x6c\137\154\x6b";
    const Site_Status = "\164\x5f\163\x69\164\x65\137\x73\x74\x61\164\165\x73";
    const Site_Check = "\163\151\x74\x65\137\x63\x6b\x5f\154";
    const Free_Version = "\x6d\157\137\163\x61\x6d\x6c\x5f\x66\162\x65\145\137\x76\145\x72\163\x69\157\x6e";
    const Admin_company = "\155\x6f\x5f\x73\141\155\154\x5f\x61\144\x6d\151\156\137\x63\x6f\x6d\x70\141\156\x79";
    const Admin_First_Name = "\x6d\x6f\x5f\x73\141\155\154\137\141\x64\x6d\151\x6e\x5f\x66\151\162\163\x74\137\x6e\141\x6d\145";
    const Admin_Last_Name = "\x6d\x6f\137\163\x61\155\154\137\x61\x64\x6d\151\156\137\x6c\141\x73\x74\x5f\x6e\141\x6d\145";
    const License_Name = "\x6d\157\x5f\x73\x61\x6d\154\137\154\151\x63\x65\156\163\x65\x5f\156\x61\x6d\145";
    const User_Limit = "\155\x6f\x5f\x73\141\x6d\154\x5f\x75\x73\x72\137\154\x6d\164";
}
