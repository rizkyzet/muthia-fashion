<?php

/**
 * RajaOngkir Pro CodeIgniter Library
 * Digunakan untuk mengkonsumsi API RajaOngkir dengan mudah
 * 
 * @author Arif Budiarto <arif@makruvadigital.com>
 */

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Rajaongkir
{

    /**
     * URL API
     *
     * @var string
     */
    private $api_url = 'https://api.rajaongkir.com/starter/';

    /**
     * API KEY
     *
     * @var string
     */
    private $api_key;

    function __construct()
    {
        if (!function_exists('curl_init')) {
            log_message('error', 'cURL Class - PHP was not built with cURL enabled. Rebuild PHP with --with-curl to use cURL.');
        }
        $this->_ci = &get_instance();
        $this->_ci->load->config('rajaongkir', TRUE);
        // Pastikan Anda sudah memasukkan API Key di application/config/rajaongkir.php
        if ($this->_ci->config->item('rajaongkir_api_key', 'rajaongkir') == "") {
            log_message("error", "Harap masukkan API KEY Anda di config.");
        } else {
            $this->api_key = $this->_ci->config->item('rajaongkir_api_key', 'rajaongkir');
        }
    }

    /**
     * HTTP POST method
     * 
     * @param array Parameter yang dikirimkan
     * @return string Response dari cURL
     */
    function post($endpoint, $params)
    {
        $curl = curl_init();
        $header[] = "Content-Type: application/x-www-form-urlencoded";
        $header[] = "key: $this->api_key";
        $query = http_build_query($params);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_URL, $this->api_url .  $endpoint);
        curl_setopt($curl, CURLOPT_POST, TRUE);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $query);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        $request = curl_exec($curl);
        $return = ($request === FALSE) ? curl_error($curl) : $request;
        curl_close($curl);
        return $return;
    }

    /**
     * HTTP GET method
     * 
     * @param array Parameter yang dikirimkan
     * @return string Response dari cURL
     */
    function get($endpoint, $params)
    {
        $curl = curl_init();
        $header[] = "key: $this->api_key";
        $query = http_build_query($params);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_URL, $this->api_url . $endpoint . "?" . $query);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
        $request = curl_exec($curl);
        $return = ($request === FALSE) ? curl_error($curl) : $request;
        curl_close($curl);
        return $return;
    }

    /**
     * Fungsi untuk mendapatkan data propinsi di Indonesia
     *
     * @param integer $province_id ID propinsi, jika NULL tampilkan semua propinsi
     * @return string Response dari cURL, berupa string JSON balasan dari RajaOngkir
     */
    public function province($province_id = null)
    {
        $params = (is_null($province_id)) ? array() : array('id' => $province_id);
        return $this->get('province', $params);
    }

    /**
     * Fungsi untuk mendapatkan data kota/kabupaten di Indonesia
     *
     * @param integer $province_id ID propinsi
     * @param integer $city_id ID kota, jika ID propinsi dan kota NULL maka tampilkan semua kota
     * @return string Response dari cURL, berupa string JSON balasan dari RajaOngkir
     */
    public function city($province_id = null, $city_id = null)
    {
        $params = (is_null($province_id)) ? array() : array('province' => $province_id);
        if (!is_null($city_id)) {
            $params['id'] = $city_id;
        }
        return $this->get('city', $params);
    }

    /**
     * Fungsi untuk mendapatkan data kecamatan di Indonesia
     *
     * @param integer $city_id ID kabupaten/kota
     * @param integer $subdistrict_id ID kecamatan, jika ID kecamatan NULL maka tampilkan semua kecamatan
     * @return string Response dari cURL, berupa string JSON balasan dari RajaOngkir
     */
    public function subdistrict($city_id, $subdistrict_id = null)
    {
        $params = array('city' => $city_id);
        if (!is_null($subdistrict_id)) {
            $params['id'] = $subdistrict_id;
        }
        return $this->get('subdistrict', $params);
    }

    /**
     * Fungsi untuk mendapatkan data ongkos kirim
     *
     * @param array $params Parameter untuk mendapatkan ongkos kirim
     * @return string Response dari cURL, berupa string JSON balasan dari RajaOngkir
     */
    public function cost($origin, $destination, $weight, $courier)
    {
        $params = array(
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier
        );
        return $this->post('cost', $params);
    }

    /**
     * Fungsi untuk mendapatkan data kecamatan di Indonesia
     *
     * @param string $waybill nomor resi pengiriman
     * @param string $courier jenis kurir
     * @return string Response dari cURL, berupa string JSON balasan dari RajaOngkir
     */
    public function waybill($waybill, $courier)
    {
        $params = array('waybil' => $waybill, 'courier' => $courier);
        return $this->post('waybill', $params);
    }
}
