<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
class Notification extends CI_Controller
{

	// Website ini dibuat dan dikembangkan oleh awbimasakti
	// Nama Template : OnlineShop Non-Courir
	// Pencipta      : AWBimasakti and Yusuf1bimasakti
	// Author        : PT. Bimasakti Indera Gemilang
	// Creator       : https://ilmuparanormal.com

	public function __construct()
	{
		parent::__construct();
		$this->load->model('global_model');
		$this->set_timezone();
		$this->load->library('veritrans');
		// Midtrans Konfigurasi
		$config_midtrans2     = $this->db->get_where('config_midtrans')->row_array();
		$params               = array('server_key' => $config_midtrans2['server_key'], 'production' => false);
		$this->veritrans->config($params);
		$this->load->helper('url');
	}
	public function set_timezone()
	{
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{
		$json_result = file_get_contents('php://input');
		$result = json_decode($json_result, "true");

		$order_id 	 = $result['order_id'];
		$data = array(
			'status_transaksi' => $result['status_code']
		);
		$this->db->where('id_transaksi', $order_id);
		$this->db->update('tbl_transaksi', $data);
	}
}
