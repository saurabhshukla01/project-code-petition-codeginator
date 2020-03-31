<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once '/home/petition/public_html/vendor/autoload.php';

class Google
{
    public function __construct() {

        $this->load->config('google_config');
        $this->client = new Google_Client();
        
        $this->client->setApplicationName($this->config->item('google_application_name'));
        $this->client->setClientId($this->config->item('google_client_id'));
        $this->client->setClientSecret($this->config->item('google_client_secret'));
        $this->client->setRedirectUri($this->config->item('google_redirect_uri'));
        //$this->client->setDeveloperKey($this->config->item('google_api_key'));
        $this->client->setScopes($this->config->item('google_scopes'));
        $this->client->setAccessType('online');
        $this->client->setApprovalPrompt('auto');

        $this->oauth2 = new Google_Service_Oauth2($this->client);
    }

    public function loginURL() {

        return $this->client->createAuthUrl();
    }

    public function getAuthenticate($code) {

        return $this->client->authenticate($code);
    }

    public function getAccessToken() {

        return $this->client->getAccessToken();
    }

    public function setAccessToken() {

        return $this->client->setAccessToken();
    }

    public function revokeToken() {
        return $this->client->revokeToken();
    }

    public function getUserInfo() {

        return $this->oauth2->userinfo->get();
    }

    /**
     * Enables the use of CI super-global without having to define an extra variable.
     *
     * @param $var
     *
     * @return mixed
     */
    public function __get($var) {

        return get_instance()->$var;
    }
}
?>
