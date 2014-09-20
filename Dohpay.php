<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Dohpay
 *
 * @author NGOCSON
 */
class Dohpay {

    /**
     * @var string The Stripe API key to be used for requests.
     */
    public $apiKey;

    /**
     * @var string The base URL for the Stripe API.
     */
    //public $apiBase = 'https://dohpay.usgw001.dotohsoft.com';
    public $apiBase = 'http://dohpay.mac';

    public function __construct($apiKey) {
        //Check some function exists
        if (!function_exists('curl_init')) {
            throw new Exception('Stripe needs the CURL PHP extension.');
        }
        if (!function_exists('json_decode')) {
            throw new Exception('Stripe needs the JSON PHP extension.');
        }
        if (!function_exists('mb_detect_encoding')) {
            throw new Exception('Stripe needs the Multibyte String PHP extension.');
        }
        $this->setApiKey($apiKey);
    }

    public function setApiKey($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function getApiKey() {
        return $this->apiKey;
    }

    public function charge_list($limit = 10) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $data['limit'] = $limit;
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('GET', '/charges/', $new_data);
        return $json_retval;
    }

    public function charge_create($data) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('POST', '/charges/', $new_data);
        return $json_retval;
    }

    public function charge_refund($charge_id) {
        $data = array(
            'type' => 'refund',
            'dohpay_api_key' => $this->getApiKey(),
        );
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('PUT', '/charges/' . $charge_id, $new_data);
        return $json_retval;
    }

    public function charge_retrieve($charge_id) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('GET', '/charges/' . $charge_id, $new_data);
        return $json_retval;
    }

    public function charge_edit($charge_id, $data) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('PUT', '/charges/' . $charge_id, $new_data);
        return $json_retval;
    }

    public function customer_list($limit = 10) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $data['limit'] = $limit;
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('GET', '/customers/', $new_data);
        return $json_retval;
    }

    public function customer_create($data) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('POST', '/customers/', $new_data);
        return $json_retval;
    }

    public function customer_retrieve($cus_id) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('GET', '/customers/' . $cus_id, $new_data);
        return $json_retval;
    }

    public function customer_edit($charge_id, $data) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('PUT', '/customers/' . $charge_id, $new_data);
        return $json_retval;
    }

    public function customer_subscript($data) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('POST', '/subscriptions/', $new_data);
        return $json_retval;
    }

    public function card_list($limit = 10) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $data['limit'] = $limit;
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('GET', '/cards/', $new_data);
        return $json_retval;
    }

    public function card_create($data) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('POST', '/cards/', $new_data);
        return $json_retval;
    }

    public function card_retrieve($card_token) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('GET', '/cards/' . $card_token, $new_data);
        return $json_retval;
    }

    public function card_edit($card_token, $data) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('PUT', '/cards/' . $card_token, $new_data);
        return $json_retval;
    }

    public function plan_list($limit = 10) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $data['limit'] = $limit;
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('GET', '/plans/', $new_data);
        return $json_retval;
    }

    public function plan_create($data) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('POST', '/plans/', $new_data);
        return $json_retval;
    }

    public function plan_retrieve($id) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('GET', '/plans/' . $id, $new_data);
        return $json_retval;
    }

    public function plan_edit($id, $data) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('PUT', '/plans/' . $id, $new_data);
        return $json_retval;
    }

    public function transfer_list($limit = 10) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $data['limit'] = $limit;
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('GET', '/transfers/', $new_data);
        return $json_retval;
    }

    public function transfer_create($data) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('POST', '/transfers/', $new_data);
        return $json_retval;
    }

    public function transfer_retrieve($token) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('GET', '/transfers/' . $token, $new_data);
        return $json_retval;
    }

    public function next_transfer($id) {
        $data['dohpay_api_key'] = $this->getApiKey();
        $this->http_build_query_for_curl($data, $new_data);
        $json_retval = $this->callAPI('GET', '/transfers/next_transfer/' . $id, $new_data);
        return $json_retval;
    }

    private function callAPI($method, $endpoint, $data = array()) {
        $curl = curl_init();
        $url = $this->apiBase . $endpoint;
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: multipart/form-data"));
        switch ($method) {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
        //echo $curl;
        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

    public function http_build_query_for_curl($arrays, &$new = array(), $prefix = null) {

        if (is_object($arrays)) {
            $arrays = get_object_vars($arrays);
        }

        foreach ($arrays AS $key => $value) {
            $k = isset($prefix) ? $prefix . '[' . $key . ']' : $key;
            if (is_array($value) OR is_object($value)) {
                $this->http_build_query_for_curl($value, $new, $k);
            } else {
                $new[$k] = $value;
            }
        }
    }

}
