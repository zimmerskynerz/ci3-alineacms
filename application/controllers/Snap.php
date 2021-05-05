<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, OPTIONS");
class Snap extends CI_Controller
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
		$this->load->library('midtrans');
		// Midtrans Konfigurasi
		$config_midtrans2     = $this->db->get_where('config_midtrans')->row_array();
		$params              = array('server_key' => $config_midtrans2['server_key'], 'production' => true);
		$this->load->library('midtrans');
		$this->midtrans->config($params);
		$this->load->helper('url');
	}
	public function set_timezone()
	{
		date_default_timezone_set("Asia/Jakarta");
	}
	public function index()
	{
		$this->load->view('checkout_snap');
	}

	public function token()
	{
		$id_produk = $this->input->post('id_produk');
		$nm_produk = $this->input->post('nm_produk');
		$harga = $this->input->post('harga');
		$nm_pelanggan = $this->input->post('nm_pelanggan');
		$email = $this->input->post('email_aktif');
		$no_hp = $this->input->post('no_hp');
		$nama =  $nm_produk . ' ( ' . $id_produk . ' )';
		$tgl_ini = date('Ymd');
		$order_id = $tgl_ini . rand();
		$transaction_details = array(
			'order_id' => $order_id,
			'gross_amount' => $harga, // no decimal allowed for creditcard
		);
		$item1_details = array(
			'id' => $id_produk,
			'price' =>  $harga,
			'quantity' =>  1,
			'name' => $nama
		);
		$item_details = array($item1_details);

		// Optional
		$customer_details = array(
			'first_name'    => $nm_pelanggan,
			'email'         => $email,
			'phone'         => $no_hp
		);
		// Data yang akan dikirim untuk request redirect_url.
		$credit_card['secure'] = true;
		//ser save_card true to enable oneclick or 2click
		//$credit_card['save_card'] = true;

		$time = time();
		$custom_expiry = array(
			'start_time' => date("Y-m-d H:i:s O", $time),
			'unit' => 'day',
			'duration'  => 1
		);

		$transaction_data = array(
			'transaction_details' => $transaction_details,
			'item_details'       => $item_details,
			'customer_details'   => $customer_details,
			'credit_card'        => $credit_card,
			'expiry'             => $custom_expiry
		);

		error_log(json_encode($transaction_data));
		$snapToken = $this->midtrans->getSnapToken($transaction_data);
		error_log($snapToken);
		echo $snapToken;
	}

	public function finish()
	{
		$result = json_decode($this->input->post('result_data'));
		echo 'RESULT <br><pre>';
		var_dump($result);
		echo '</pre>';
	}
}
