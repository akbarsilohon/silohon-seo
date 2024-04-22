<?php
/**
 * File for handler General settings
 * 
 * Silohon SEO Wordpress Theme
 * 
 * @package silohon-seo
 * 
 * @link https://github.com/akbarsilohon/silohon-seo.git
 */


// Section General ===============================
// ===============================================
add_settings_section( 'sls-general', null, null, 'sls' );
register_setting( 'sls-settings-group', 'sls_g_settings' );

// Custom Logo ======================
// ==================================
add_settings_field( 'sls-logo', 'Logo: ', 'sls_render_logo', 'sls', 'sls-general' );
function sls_render_logo(){
    $options = get_option( 'sls_g_settings' );
    $logo = $options[ 'logo' ]; ?>
    <input type="url" name="sls_g_settings[logo]" id="slsLogo" value="<?php echo esc_url( $logo ) ?>" placeholder="Recommended (380 x 80 px)" /><br>
    <button style="margin-top: 10px" id="slsChangeLogo" type="button" class="button button-primary">Change</button>
    <?php
}

// Data Schema Organisation =========
// ==================================
add_settings_section( 'sls-org', '<h3 class="slsSection">Organization Schema</h3>', null, 'sls' );

// Organization
add_settings_field( 'sls-og-check', 'Active?', 'sls_ogactive', 'sls', 'sls-org' );
function sls_ogactive(){
    $og = get_option( 'sls_g_settings' )['og']; ?>
    <input type="checkbox" name="sls_g_settings[og]" value="true" <?php if( $og === 'true') echo 'checked'; ?>>
    <?php
}

// Organization Name ----------
add_settings_field( 'sls-ogname', 'Organization Name', 'sls_ogname_render', 'sls', 'sls-org' );
function sls_ogname_render(){
    $ogName = get_option( 'sls_g_settings' )['ogName'];
    echo '<input type="text" name="sls_g_settings[ogName]" value="'. $ogName .'" placeholder="Your Organization Name..">';
}

// Organization URL ----------
add_settings_field( 'sls-ogurl', 'Website', 'sls_ogurl_render', 'sls', 'sls-org' );
function sls_ogurl_render(){
    $ogUrl = get_option( 'sls_g_settings' )['ogUrl'];
    echo '<input type="url" name="sls_g_settings[ogUrl]" value="'. $ogUrl .'" placeholder="Your Organization Website..">';
}

// Organization SameAs ----------
add_settings_field( 'sls-ogsameas', 'Social Media', 'sls_ogsameas_render', 'sls', 'sls-org' );
function sls_ogsameas_render(){
    $ogSameAs = get_option( 'sls_g_settings' )['ogSameAs']; ?>

    <ul class="multiInput" id="multiInput">
        <?php if( !empty($ogSameAs) ){
            foreach( $ogSameAs as $same ){ ?>
                <li class="listInput">
                    <input type="url" name="sls_g_settings[ogSameAs]" value="<?php echo esc_attr( $same ); ?>" />
                    <button type="button" id="remove-sameas">
                        <span class="dashicons dashicons-trash"></span>
                    </button>
                </li>
            <?php
            }
        } ?>
    </ul>

    <button class="button button-primary" type="button" id="add-sameas">
        Add Url
    </button>

    <script>
        jQuery(document).ready(function ($) {
            $('#add-sameas').on('click', function () {
                $('#multiInput').append(`
                    <li class="listInput">
                        <input type="text" name="sls_g_settings[ogSameAs][]">
                        <button type="button" id="remove-sameas"><span class="dashicons dashicons-trash"></span></button>
                    </li>
                `);
            });

            $('#multiInput').on('click', '#remove-sameas', function () {
                $(this).closest('.listInput').remove();
            });
        });
    </script>

    <?php
}

// Organization Image ----------
add_settings_field( 'sls-ogimage', 'Image', 'sls_ogimage_render', 'sls', 'sls-org' );
function sls_ogimage_render(){
    $ogImage = get_option( 'sls_g_settings' )['ogImage'];
    $btnImg = !empty($ogImage) ? 'Change' : 'Upload';
    echo '<input type="url" name="sls_g_settings[ogImage]" value="'. $ogImage .'" id="ogImg"><br>';
    echo '<button style="margin-top: 10px" id="ogImgChange" type="button" class="button button-primary">'.$btnImg.'</button>';
}

// Organization Logo ----------
add_settings_field( 'sls-oglogo', 'Logo', 'sls_oglogo_render', 'sls', 'sls-org' );
function sls_oglogo_render(){
    $ogLogo = get_option( 'sls_g_settings' )['ogLogo'];
    $btLogo = !empty($ogLogo) ? 'Change' : 'Upload';
    echo '<input type="url" name="sls_g_settings[ogLogo]" value="'. $ogLogo .'" id="ogLogo"><br>';
    echo '<button style="margin-top: 10px" id="ogLogoChange" type="button" class="button button-primary">'.$btLogo.'</button>';
}

// Organization Description ----------
add_settings_field( 'sls-ogdesc', 'Description', 'sls_ogdesc_render', 'sls', 'sls-org' );
function sls_ogdesc_render(){
    $ogDesc = get_option( 'sls_g_settings' )['ogDesc']; ?>

<textarea name="sls_g_settings[ogDesc]" cols="60" rows="5"><?php echo $ogDesc; ?></textarea>

<?php
}

// Organization Email ----------
add_settings_field( 'sls-ogemail', 'Email', 'sls_ogemail_render', 'sls', 'sls-org' );
function sls_ogemail_render(){
    $ogEmail = get_option( 'sls_g_settings' )['ogEmail'];
    echo '<input type="email" name="sls_g_settings[ogEmail]" value="'. $ogEmail .'">';
}

// Organization Telephone ----------
add_settings_field( 'sls-ogtel', 'Telephone', 'sls_ogtel_render', 'sls', 'sls-org' );
function sls_ogtel_render(){
    $ogTel = get_option( 'sls_g_settings' )['ogTel'];
    echo '<input type="tel" name="sls_g_settings[ogTel]" value="'. $ogTel .'">';
}

// Organization StreetAddress ----------
add_settings_field( 'sls-ogstreet', 'Address', 'sls_ogstreet_render', 'sls', 'sls-org' );
function sls_ogstreet_render(){
    $ogStreet = get_option( 'sls_g_settings' )['ogStreet']; ?>

<textarea name="sls_g_settings[ogStreet]" cols="60" rows="5"><?php echo $ogStreet; ?></textarea>

    <?php
}

// Organization AddressLocality ----------
add_settings_field( 'sls-oglocality', 'City', 'sls_oglocality_render', 'sls', 'sls-org' );
function sls_oglocality_render(){
    $ogLocality = get_option( 'sls_g_settings' )['ogLocality'];
    echo '<input type="text" name="sls_g_settings[ogLocality]" value="'. $ogLocality .'">';
}

// Organization AddressCountry ----------
add_settings_field( 'sls-ogcountry', 'Country', 'sls_ogcountry_render', 'sls', 'sls-org' );
function sls_ogcountry_render(){
    $ogCountry = get_option( 'sls_g_settings' )['ogCountry'];
    echo '<input type="text" name="sls_g_settings[ogCountry]" value="'. $ogCountry .'">';
}

// Organization AddressRegion ----------
add_settings_field( 'sls-ogregion', 'Region', 'sls_ogregion_render', 'sls', 'sls-org' );
function sls_ogregion_render(){
    $ogRegion = get_option( 'sls_g_settings' )['ogRegion'];
    echo '<input type="text" name="sls_g_settings[ogRegion]" value="'. $ogRegion .'">';
}

// Organization PostalCode ----------
add_settings_field( 'sls-ogpostal', 'PostalCode', 'sls_ogpostal_render', 'sls', 'sls-org' );
function sls_ogpostal_render(){
    $ogPostal = get_option( 'sls_g_settings' )['ogPostal'];
    echo '<input type="text" name="sls_g_settings[ogPostal]" value="'. $ogPostal .'">';
}

// Organization VatID ----------
add_settings_field( 'sls-ogvat', 'VatID', 'sls_ogvat_render', 'sls', 'sls-org' );
function sls_ogvat_render(){
    $ogVat = get_option( 'sls_g_settings' )['ogVat'];
    echo '<input type="text" name="sls_g_settings[ogVat]" value="'. $ogVat .'">';
}

// Organization Iso6523Code ----------
add_settings_field( 'sls-ogiso', 'Iso6523Code', 'sls_ogiso_render', 'sls', 'sls-org' );
function sls_ogiso_render(){
    $ogIso = get_option( 'sls_g_settings' )['ogIso'];
    echo '<input type="text" name="sls_g_settings[ogIso]" value="'. $ogIso .'">';
}