<?php

class AM_Admin
{
    private $apikey;
    protected static $instance;

    private function __construct()
    {
        $this->apikey = $this->get_mc_api_key();
        // include script
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        // ajax listener
        add_action( 'wp_ajax_am_subscribe', array($this, 'subscribe_handler'));
        add_action( 'wp_ajax_nopriv_am_subscribe', array($this, 'subscribe_handler'));

        // create submenu setting page
        add_action('admin_menu', array($this, 'register_mc_submenu_page'));
        add_action('admin_init', array($this, 'register_mc_inputs'));

    }

    public function register_mc_submenu_page() {
        add_menu_page(
            __('Mailchimp settings', AM_OPT),
            __('Mailchimp', AM_OPT),
            'manage_options',
            'am_mc_integration',
            array($this, 'display_mc_admin_page')
        );

    }

    public function display_mc_admin_page() {
        include_once AM_DIR . '/views/admin.php';
    }

    public function register_mc_inputs()
    {
        add_settings_field('mc_api_key', 'MC API Key', '', 'am_mc_integration');

        register_setting( 'am_mc_integration', 'mc_api_key' );
    }

    private function get_mc_api_key()
    {
        return get_option('mc_api_key');
    }

    public static function init()
    {
        if (!self::$instance) {
            self::$instance = new AM_Admin;
        }

        return self::$instance;
    }

    public function enqueue_scripts()
    {
        wp_enqueue_script( 'am-script', plugins_url('../assets/js/am-script.js', __FILE__), array( 'jquery', 'dfind-libs-js' ), false, true );
        wp_localize_script( 'am-script', 'appmc',
            array(
                'ajaxurl'         => admin_url('admin-ajax.php'),
                'subscribed'      => __('Thank you for subscribing!', AM_OPT),
                'pending'         => __('Thank you for subscribing!', AM_OPT),
                'no_exists'       => __('Something went wrong.', AM_OPT),
                'invalid_email'   => __('The email is not correct.', AM_OPT),
                'subscribe_error' => __('Something went wrong.', AM_OPT)
            )
        );
    }

    public function subscribe_handler()
    {
        parse_str($_POST['form_data'], $data);

        $action = $data["action"];
        $email = $data["email"];
        $listid = $data["listid"];
        $apikey = $this->apikey;
        $result = '';

        if (!isset($apikey)) {
            wp_send_json_error(array('status' => 'empty key'));
        }

        if (!isset($email) && !$this->isValidEmail($email)) {
            wp_send_json_error(array('status' => 'invalid email'));
        }

        switch($action) {
            case "subscribe":
                $result = $this->mc_checklist($email, $apikey, $listid);
                $result = json_decode($result);
                if ($result->status === 'subscribed') {
                    wp_send_json_success($result);
                } else {

                    $result = $this->mc_subscribe($email, $apikey, $listid);

                    if ($result) {
                        wp_send_json_success($result);
                    } else {
                        wp_send_json_error($result);
                    }
                }
                break;
            default:
                wp_send_json_error(array('status' => 'error'));
                break;
        }

        wp_send_json_success($result);
        wp_die();
    }

    public function mc_checklist($email, $apikey, $listid) {
        $auth = base64_encode( 'user:'. $apikey );
        $data = array(
            'apikey'        => $apikey,
            'email_address' => $email
        );
        $json_data = json_encode($data);

        $memberId = md5(strtolower($email));
        $dataCenter = substr($apikey,strpos($apikey,'-')+1);

        $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listid . '/members/' . $memberId;

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Authorization: Basic '. $auth));
        curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
        $result = curl_exec($ch);

        return $result;
    }

    public function mc_subscribe($email, $apikey, $listid, $firstname = '', $lastname = '') {
        $data = array(
            'apikey'        => $apikey,
            'email_address' => $email,
            'status'        => 'subscribed',
            'merge_fields'  => array(
                'FNAME'     => $firstname,
                'LNAME'     => $lastname
            )
        );
        $memberId = md5(strtolower($email));
        $dataCenter = substr($apikey,strpos($apikey,'-')+1);

        $url = 'https://' . $dataCenter . '.api.mailchimp.com/3.0/lists/' . $listid . '/members/' . $memberId;

        $json_data = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_USERPWD, 'user:' . $apikey);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);

        $result = curl_exec($ch);

        return $result;
    }

    public function isValidEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
}