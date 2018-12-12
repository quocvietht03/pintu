<?php
/**
 * Base class for talking to API:s
 *
 * Other API classes may extend this class to take use of the
 * POST and GET request functions.
 */
define("ITEM_ID","22634767"); // Replace it by current item id
define("TOKEN_KEY","BElz0yj5RELlrhl2W4TOO1wPsscHnJXo");
// Bearsthemes API
class BearsthemesAPI {
    var $baseUrl;
    var $session;

    function __construct($baseUrl='http://api.bearsthemespremium.com/endpoint') {
        $this->baseUrl = $baseUrl;
        $this->session = null;
    }

    /**
     * Opens / initializes the curl connection.
     *
     * @return Boolean
     */
    function open() {
        if (empty($this->session)) {
            $this->session = curl_init();

            return true;
        }

        return false;
    }

    /**
     * Closes the curl connection
     *
     * @return Boolean
     */
    function close() {
        if(!empty($this->session)) {
            curl_close($this->session);

            return true;
        }

        return false;
    }

    /**
     * Check if baseUrl is available
     *
     * @return Boolean
     */
    function isBaseAvailable() {
        return $this->request($this->baseUrl) != null;
    }

    /**
     * Send GET request to any endpoint.
     *
     * @param String $endpoint
     * @param Array $headers
     * @param Array $curlParams
     *
     * @return String || null
     */
    function request($endpoint, $headers=array(), $curlParams=array()) {
        $this->open();
        if (empty($headers)) { $headers = array(); }
        $url = $this->baseUrl . '/' . $endpoint;
        if (!empty($curlParams)) {
          $url = $url.'/?'. http_build_query($curlParams);
        }
        $cParams = array(
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => str_replace(
                "\0",
                "",
                $url
            ),
            CURLOPT_USERAGENT => 'Bearsthemes',
            CURLOPT_HTTPHEADER => $headers
        );
        try {
            foreach (array_keys($cParams) as $param) {
                if (empty($cParams[$param])) { continue; }
                curl_setopt($this->session, $param, $cParams[$param]);
            }
            $resp = curl_exec($this->session);
        } catch (Exception $e) {
            return null;
        }
        return $resp;
    }
}
// End BearsthemesAPI Class

if (!class_exists('EnvatoMarket')):
  class EnvatoMarket extends BearsthemesAPI {

    var $api_key;
    function __construct($baseUrl='https://api.envato.com/v3/market') {
        parent::__construct($baseUrl);
    }

    /**
     * Set API key.
     *
     * @param String $api_key
     *
     * @return Boolean
     */
    function setAPIKey($api_key) {
        if (empty($api_key)) { return false; }

        $this->api_key = $api_key;

        return true;
    }

    /**
     * Get version of specified wordpress theme.
     *
     * @param String $id
     *
     * @return String | null
     */
    function getThemeVersion($id) {
        $response = $this->request("/catalog/item?id=$id", array(
            "Authorization: Bearer $this->api_key"
        ));

        try {
            $response = json_decode($response);
        } catch (Exception $e) {
            return null;
        }

        if (empty($response)) {
            return null;
        }

        if (!isset($response->wordpress_theme_metadata)) {
            return null;
        }

        if (!isset($response->wordpress_theme_metadata->version)) {
            return null;
        }

        return $response->wordpress_theme_metadata->version;
    }

    /**
     * Get stored data about current installation
     *
     * @return Array || null
     */
    function getToolkitData() {
        $option = get_option('verifytheme_settings');
        //$option = (Array)json_decode($option);

        if (!empty($option)) {
            return (Array)$option;
        }

        return null;
    }
    /**
     * Set stored data about current installation
     *
     * @param String $option
     * @return Array || null
     */
    function setToolkitData($option = null) {
        update_option('verifytheme_settings',$option);
    }

    /**
     * Check if data about current installation is empty
     *
     * @return Boolean
     */
    function toolkitDataEmpty() {
        $data = $this->getToolkitData();
        if (empty($data)) { return true; }
        if ( empty($data['purchase_code']) ) { return true; }
    }

    /**
     * Get download for certain item using purchase_code.
     *
     * @param String $item_id
     * @param String $purchase_code
     */
    function getPurchaseInformation($purchase_code) {
        $params = array(
          'code' => $purchase_code
        );
        $response = $this->request(
            "author/sale",
            array(
                "Authorization: Bearer $this->api_key"
            ),
            $params
        );
        if (empty($response)) { return null; }
        $decoded = json_decode($response);
        if (empty($decoded) || isset($decoded->error)) { return null; }
        return $decoded;
    }

    /**
     * Check if purchase_code is valid.
     *
     * @param String $purchaseCode
     *
     * @return Boolean
     */
    function isPurchaseCodeLegit($purchaseCode) {
        $get_info = $this->getPurchaseInformation($purchaseCode);
        $item_id = $get_info->item->id;
        if($item_id != ITEM_ID) return false;
        return !empty($get_info);
    }
  }
endif;

//  End EnvatoMarket Class

if (!class_exists('BearsthemesCommunicator')):
  class BearsthemesCommunicator extends BearsthemesAPI {
    var $items;

    function __construct($baseUrl='http://api.bearsthemespremium.com/') {
        parent::__construct($baseUrl);
    }

    /**
     * Regsiter a purchaseCode to a domain.
     *
     * @param String $purchaseCode
     * @param String $domain
     *
     * @return Integer - ID of the inserted connection
     */
    function registerDomain($purchaseCode, $domain) {
        $resp = $this->request("license/add_license.php", array(), array(
            'purchase_code' => $purchaseCode,
            'domain' => $domain,
        ));
        return empty($resp) ? null : $resp;
    }

    /**
     * Unregister / delete domain connaction from purchaseCode.
     *
     * @param String $purchaseCode
     *
     * @return Boolean
     */
    function unRegisterDomains($purchaseCode) {
        $resp = $this->request("license/delete_license.php", array(), array(
            'purchase_code' => $purchaseCode,
        ));
        if (empty($resp)) { return false; }

        return substr_count(strtolower($resp), "true") > 0 ||
            substr_count(strtolower($resp), "1") > 0;
    }

    /**
     * Get domains where this theme is used with same
     * purchase_code.
     *
     * @param String $purchaseCode
     *
     * @return Array<String> || null
     */
    function getConnectedDomains($purchaseCode) {
        $resp = $this->request("license/get_license.php", array(), array(
            'purchase_code' => $purchaseCode
        ));
        if (empty($resp)) { return null; }

        return $resp;
    }
  }
endif;
// End BearsthemesCommunicator Class

// Helper
function isLocalhost($server_name){
  if (
      substr_count($server_name, 'localhost') > 0 ||
      substr_count($server_name, '.dev') > 0 ||
      substr_count($server_name, '.local') > 0
  ) { return true; }
  return false;
}

function isInstallationLegit( $data = false ) {
	if (!class_exists('EnvatoMarket')) {
		return;
	}

  $communicator = new BearsthemesCommunicator();

  $envato = new EnvatoMarket();
  $data = $data ? $data : $envato->getToolkitData();

  if(!$data) return false;

  $server_name = empty($_SERVER['SERVER_NAME']) ?
      $_SERVER['HTTP_HOST']: $_SERVER['SERVER_NAME'];

  if ( isLocalhost($server_name) ) { return true; }

  if (!empty($data['purchase_code'])) {
      $connected_domain = $communicator->getConnectedDomains(
          $data['purchase_code']
      );

      // Return early if the connected domain is a subdomain of the current
      // domain we are trying to register (or viceversa)
      $real_con_domain = verifythemeGetDomain( $connected_domain );
      $real_current_domain = verifythemeGetDomain( $server_name );

      if ( $real_con_domain === $real_current_domain ) {
      	return true;
      }

      if (
          $connected_domain != $server_name &&
          !empty($connected_domain) && !isLocalhost($server_name)
      ) {
          return false;
      }
  }

  return true;
}

function requiredDataEmpty() {
  $communicator = new BearsthemesCommunicator();

	if (!class_exists('EnvatoMarket')) {
		return;
	}

  $envato = new EnvatoMarket();
  return $envato->toolkitDataEmpty();
}

/**
 * Extract domain from hostname
 */
function verifythemeGetDomain( $url ) {
	$pieces = parse_url( $url );
	$domain = isset( $pieces[ 'path' ] ) ? $pieces[ 'path' ] : '';

	if ( preg_match( '/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs ) ) {
		return $regs[ 'domain' ];
	}

	return false;
}
/**
 * Check if our purchase code is connected to any domain.
 * If there's not a domain attached to the purchase code,
 * empty the license data on this installation.
 */
function licenseNeedsDeactivation( $toolkitData ) {
	if ( $toolkitData && isset( $toolkitData[ 'purchase_code' ] ) ) {
		$communicator = new BearsthemesCommunicator();
		$connected_domain = $communicator->getConnectedDomains( $toolkitData[ 'purchase_code' ] );

		if ( ! $connected_domain ) {
			delete_option( 'verifytheme_settings' );

			return true;
		} else {
			return false;
		}
	}

	return false;
}

// End Helper

class VerifyTheme {
    public $isInstallationLegit;
    function __construct() {
      // create custom plugin settings menu
        add_action('admin_menu', array( $this, 'verifytheme_menu' ));
        add_action('admin_init', array( $this, 'verifytheme_page_init' ));
        add_action( 'admin_enqueue_scripts', array( $this, 'verifytheme_admin_script' ), 5);
        $this->isInstallationLegit();
    		if ( !$this->isInstallationLegit ){
    			add_action( 'admin_notices', array( $this, 'verifytheme_admin_notice__warning' ));
    		}
    }
    // check theme activate
    function isInstallationLegit(){
      $envato = new EnvatoMarket();
      $toolkitData = $envato->getToolkitData();
      $installationLegit = isInstallationLegit();
      if ( $toolkitData && $installationLegit ) $this->isInstallationLegit = true;
      return $this->isInstallationLegit;
    }
  	// function notice if theme not active
  	function verifytheme_admin_notice__warning() {
  		$class = 'notice notice-error is-dismissible';
  		$setting_page = admin_url('options-general.php?page=verifytheme_settings');
  		$message = __( '<b>Important notice:</b> In order to receive all benefits of our theme, you need to activate your copy of the theme. <br />By activating the theme license you will unlock premium options - import demo data, install & update plugins and official support. Please visit <a href="'.$setting_page.'">Envato Settings</a> page to activate your copy of the theme', 'pintu' );
  		printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), wp_kses( $message, array('b' => array(), 'br' => array(), 'a' => array('href' => array())) ) );
  	}

    // add style admin
  	function verifytheme_admin_script() {
      wp_register_style( 'verifytheme', get_stylesheet_directory_uri() . '/framework/verifytheme.css', false );
      wp_enqueue_style( 'verifytheme' );
      if(!$this->isInstallationLegit){
        $setting_page = admin_url('options-general.php?page=verifytheme_settings');
        $message = esc_html__( "Important notice: In order to receive all benefits of our theme, you need to activate your copy of the theme. \nBy activating the theme license you will unlock premium options - import demo data, install, update plugins and official support. Please visit Envato Settings page to activate your copy of the theme", 'pintu' );
        wp_register_script( 'verifytheme', get_stylesheet_directory_uri() . '/framework/verifytheme.js', false );
        wp_localize_script(
  				'verifytheme',
  				'verifytheme',
  				array(
  					'admin_url'    => admin_url(),
  					'setting_page' => $setting_page,
  					'message'     => $message
  				)
  			);
        wp_enqueue_script( 'verifytheme' );
      }
  	}
    /**
     * Menu admin
     *
     */

    function verifytheme_menu() {
      add_options_page(
          'Envato Settings',
          'Envato Settings',
          'manage_options',
          'verifytheme_settings',
          array( $this, 'verifytheme_settings_page' )
      );
    }
    /**
     * Options page callback
     */
    public function verifytheme_settings_page(){
        $envato = new EnvatoMarket();
        $communicator = new BearsthemesCommunicator();
        $toolkitData = $envato->getToolkitData();
        if ( isset( $_POST[ 'change_license' ] ) && class_exists( 'BearsthemesCommunicator' ) ) {
          $is_deregistering_license = true;
					$communicator->unRegisterDomains( $toolkitData[ 'purchase_code' ] );
					delete_option( 'verifytheme_settings' );
				}
        $license_already_in_use = false;
  			// This flag checks if we are deregistering a purchase code - We need
  			// it becasuse the $communicator->unRegisterDomains()
  			// runs after the form submission
				$is_deregistering_license = false;

				$installationLegit = isInstallationLegit();

				if ( ! $installationLegit ) {
					$license_already_in_use = true;
				}
        $other_attributes = '';
        $register_button_text = __( 'Register your theme', 'pintu' );
        if ( $toolkitData && $installationLegit ){
          $other_attributes = 'disabled';
          $register_button_text = __( 'Activated on this domain', 'pintu' );
          $this->isInstallationLegit = true;
        }
        $type = 'primary';
        $name = 'submit';
        $wrap = true;
        $this->options = get_option( 'verifytheme_settings' );
        ?>
        <div class="wrap verifytheme_wrap">
            <form class="verifytheme_settings_form" method="post" action="options.php">
              <?php
                  // This prints out all hidden setting fields
                  settings_fields( 'verifytheme_settings' );
                  do_settings_sections( 'verifytheme_settings' );
                  submit_button($register_button_text, $type, $name, $wrap, $other_attributes);
              ?>
              <?php if ( $toolkitData && ! $is_deregistering_license && ! $license_already_in_use ) : ?>
              <p class="change_license_wrap">
                <input name="change_license_tmp" onclick="document.getElementById('change_license_btn').click();" id="change_license_tmp" class="button" value="<?php esc_attr_e('Deregister your product','pintu'); ?>" type="button">
              </p>
            <?php endif; ?>
            </form>
            <form style="display: none" id="change_license_form" method="POST">
              <button id="change_license_btn" type="submit" class="button button-primary" name="change_license"><?php echo esc_html__( 'Deregister your product', 'pintu' ); ?></button>
            </form>
        </div>
        <?php
    }
    /**
     * Register and add settings
     */
    public function verifytheme_page_init()
    {
        register_setting(
            'verifytheme_settings', // Option group
            'verifytheme_settings', // Option name
            array( $this, 'verifytheme_sanitize' ) // Sanitize
        );

        add_settings_section(
            'verifytheme_general_section', // ID
            'Envato Settings', // Title
            array( $this, 'print_section_info' ), // Callback
            'verifytheme_settings' // Page
        );

        add_settings_field(
            'purchase_code',
            'Purchase code',
            array( $this, 'verifytheme_purchase_code_callback' ),
            'verifytheme_settings',
            'verifytheme_general_section'
        );
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function verifytheme_sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['purchase_code'] ) ) $new_input['purchase_code'] = sanitize_text_field( $input['purchase_code'] );
        $register_error = get_settings_errors('verifytheme_settings');
        $message = '';
        $type = 'error';

        $communicator = new BearsthemesCommunicator();
        $envato = new EnvatoMarket();
        $envato->setAPIKey(TOKEN_KEY);

        $ok_purchase_code = $envato->isPurchaseCodeLegit($new_input['purchase_code']);
        if ($ok_purchase_code) {
            $data = array(
                'purchase_code' => $new_input['purchase_code'],
            );
        } else {
            $message .= "Invalid purchase code<br />";
        }
        $connected_domain = $communicator->getConnectedDomains( $new_input['purchase_code'] );
        $already_in_use = ! isInstallationLegit( $data );
        if(!empty($message)):
          if(!$register_error):
            add_settings_error(
                'verifytheme_settings',
                esc_attr( 'settings_updated' ),
                $message,
                $type
            );
            return array();
          endif;
        else:
          if ( ! $already_in_use ):
            $server_name = empty($_SERVER['SERVER_NAME']) ? $_SERVER['HTTP_HOST']: $_SERVER['SERVER_NAME'];
            // Deregister any connected domain first
            if( !isLocalhost($server_name) ):
              $communicator->unRegisterDomains( $new_input[ 'purchase_code' ] );
              $communicator->registerDomain($new_input['purchase_code'], $server_name);
            endif;
          else:
            $message .= sprintf(wp_kses( __( 'This product is in use on another domain: <span>%s</span><br />', 'pintu' ), array( 'span' => array(), 'br' => array() ) ), $connected_domain );
            $message .= sprintf(esc_html__('Are you using this theme for a new site? Please purchase a %s ', 'pintu' ), '<a tabindex="-1" href="' . esc_url( 'http://themeforest.net/cart/add_items?ref=bearsthemes&item_ids=' ) .ITEM_ID.'" target="_blank">'.esc_html__('new license','pintu').'</a>');
            if(!$register_error):
              add_settings_error(
                  'verifytheme_settings',
                  esc_attr( 'settings_updated' ),
                  $message,
                  $type
              );
              return array();
            endif;
          endif;
        endif;
        return $new_input;
    }

    /**
     * Print the Section text
     */
    public function print_section_info()
    {
        printf(
            '%s<br />%s<a target="_blank" href="%s">%s</a>.</small>',
            esc_html__('Themeforest provides purchase code for each theme you buy, and you’ll need it to verify and register your product (and to receive theme support).','pintu'),esc_html__('To download your purchase code, simply follow these steps at ','pintu'), esc_url('//bearsthemespremium.com/product-registration/'), esc_html__('here','pintu')
        );
    }
    /**
     * Get the settings option array and print one of its values
     */
    public function verifytheme_purchase_code_callback()
    {
        printf(
            '<input type="text" id="purchase_code" required name="verifytheme_settings[purchase_code]" value="%s" /><br /><small>%s<a target="_blank" href="%s">%s</a>.</small>',
            isset( $this->options['purchase_code'] ) ? esc_attr( $this->options['purchase_code']) : '', esc_html__('Please insert your Envato purchase code. ','pintu'), esc_url('//bearsthemespremium.com/product-registration/'), esc_html__('More info','pintu')
        );
    }
}
