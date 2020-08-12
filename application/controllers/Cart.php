<?php
class Cart extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-Y4b4Br-SYvKkVi8DPQGTvwbT', 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
        akses_pelanggan();
    }

    public function index()
    {
        $data['profil'] = $this->M_user->getUserByLogin();
        $this->load->view('template_mutia/header_cart', $data);
        $this->load->view('template_mutia/navbar_new');
        $this->load->view('mutia_fashion/cart/form_cart');
        $this->load->view('template_mutia/footer_cart');
    }

    public function tambah()
    {

        $kd_barang = $this->input->post('kd');
        $ukuran = $this->input->post('ukuran');
        $warna = $this->input->post('warna');
        $jumlah = $this->input->post('jumlah');
        $where = [
            'detail_barang.kd_brg' => $kd_barang,
            'detail_barang.ukuran' => $ukuran,
            'detail_barang.warna' => $warna,
        ];
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('detail_barang', 'barang.kd_brg=detail_barang.kd_brg');
        $this->db->where($where);
        $barang = $this->db->get()->row_array();



        if ($barang['stok'] >= $jumlah) {
            $data = array(
                'id'      => $barang['id_detailbrg'],
                'qty'     => $jumlah,
                'price'   => $barang['harga'],
                'name'    => $barang['nama_brg'],
                'options' => array('Size' => $barang['ukuran'], 'Color' => $barang['warna'], 'Gambar' => $barang['gambar'], 'Weight' => $barang['berat'])
            );

            $this->cart->insert($data);
            redirect('cart');
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Stok tidak cukup!
          </div>');
            redirect('produk/detail/' . $kd_barang);
        }
    }
    public function hapus_keranjang()
    {
        $this->cart->destroy();
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Keranjang Berhasil Dihapus!
          </div>');
        redirect('cart');
    }
    public function ajax_cart_jumlah()
    {
        $jumlah = $this->input->post('jumlah');
        $rowid = $this->input->post('rowid');

        if ($jumlah == 0) {

            $data_cart = [
                'rowid' => $rowid,
                'qty' => $jumlah
            ];
            $this->cart->update($data_cart);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
         keranjang berhasil dihapus!
      </div>');
        } else {

            $data_cart = [
                'rowid' => $rowid,
                'qty' => $jumlah
            ];
            $this->cart->update($data_cart);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Jumlah keranjang berhasil ditambah!
          </div>');
        }
    }

    public function ajax_cart_hapus()
    {
        $rowid = $this->input->post('rowid');
        $this->cart->remove($rowid);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Keranjang berhasil dihapus!
      </div>');
    }

    public function checkout()
    {
        $data['profil'] = $this->M_user->getUserByLogin();

        $this->db->select('user.nama,user.alamat,user.email,user.no_tlp,user.kode_pos,provinsi.*,kota.*');
        $this->db->from('user');
        $this->db->join('kota', 'user.id_kota=kota.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi=provinsi.id_provinsi');
        $this->db->where('user.email', $this->session->userdata('email'));
        $data['user'] = $this->db->get()->row_array();
        $data['asal'] = $this->db->get_where('kota', ['id_kota' => 403])->row_array();
        $data['provinsi'] = $this->db->get('provinsi')->result_array();
        $data['kota'] = $this->db->get_where('kota', ['id_provinsi' => $data['user']['id_provinsi']])->result_array();
        foreach ($this->cart->contents() as $cart) {
            $tampung_berat[] = $cart['qty'] * $cart['options']['Weight'];
        }
        $total_berat = array_sum($tampung_berat) * 1000;
        $data['total_berat'] = $total_berat;


        $data['ongkir_pos'] = json_decode($this->rajaongkir->cost($data['asal']['id_kota'], $data['user']['id_kota'], $total_berat, "pos"), true);
        $data['ongkir_jne'] = json_decode($this->rajaongkir->cost($data['asal']['id_kota'], $data['user']['id_kota'], $total_berat, "jne"), true);
        $data['ongkir_tiki'] = json_decode($this->rajaongkir->cost($data['asal']['id_kota'], $data['user']['id_kota'], $total_berat, "tiki"), true);

        $this->load->view('template_mutia/header_checkout', $data);
        $this->load->view('template_mutia/navbar_new');
        $this->load->view('mutia_fashion/checkout/form_checkout');
        $this->load->view('template_mutia/footer_checkout');
    }

    public function ajax_provinsi()
    {
        $id_provinsi = $this->input->post('id_provinsi');
        $id_kota = $this->input->post('id_kota');
        $data['kota'] = $this->db->get_where('kota', ['id_provinsi' => $id_provinsi])->result_array();
        $this->load->view('mutia_fashion/checkout/ajax_provinsi', $data);
    }

    public function ajax_kota()
    {

        $data['tujuan'] = $this->input->post('id_kota');
        $data['asal'] = $this->input->post('asal');
        $data['berat'] = $this->input->post('gram');

        $data['ongkir_pos'] = json_decode($this->rajaongkir->cost($data['asal'], $data['tujuan'], $data['berat'], "pos"), true);
        $data['ongkir_jne'] = json_decode($this->rajaongkir->cost($data['asal'], $data['tujuan'], $data['berat'], "jne"), true);
        $data['ongkir_tiki'] = json_decode($this->rajaongkir->cost($data['asal'], $data['tujuan'], $data['berat'], "tiki"), true);

        $this->load->view('mutia_fashion/checkout/ajax_kota', $data);
    }

    public function token()
    {
        $gross_amount = $this->input->post('total_bayar');
        $harga_ongkir = $this->input->post('ongkir');
        $layanan = $this->input->post('layanan');
        $user = $this->M_user->getUserByLogin();

        // shipping
        $shipping_nama = $this->input->post('shipping_nama');
        $shipping_kota = $this->input->post('shipping_kota');
        $shipping_alamat = $this->input->post('shipping_alamat');
        $shipping_no_tlp = $this->input->post('shipping_no_tlp');
        $shipping_kode_pos = $this->input->post('shipping_kode_pos');

        // Required
        $transaction_details = array(
            'order_id' => date('Y') . date('d') . substr(time(), 6),
            'gross_amount' => $gross_amount, // no decimal allowed for creditcard
        );

        // // Optional
        // $item1_details = array(
        //     'id' => 'a1',
        //     'price' => 18000,
        //     'quantity' => 3,
        //     'name' => "Apple"
        // );

        // // Optional
        // $item2_details = array(
        //     'id' => 'a2',
        //     'price' => 20000,
        //     'quantity' => 2,
        //     'name' => "Orange"
        // );


        foreach ($this->cart->contents() as $cart) {
            $item = array(
                'id' => $cart['id'],
                'price' => $cart['price'],
                'quantity' => $cart['qty'],
                'name' => $cart['name']
            );

            $item_details[] = $item;
        }


        $ongkir[] = array(
            'id' => 'ongkir01',
            'price' => $harga_ongkir,
            'quantity' => 1,
            'name' => $layanan
        );

        $item_details = array_merge($item_details, $ongkir);

        // Optional
        // $item_details = array($item1_details, $item2_details);

        $user_kota = $this->db->get_where('kota', ['id_kota' => $user['id_kota']])->row_array();
        $kota_tujuan = $this->db->get_where('kota', ['id_kota' => $shipping_kota])->row_array();
        // Optional
        $billing_address = array(
            'first_name'    => $user['nama'],
            'last_name'     => "",
            'address'       => $user['alamat'],
            'city'          => $user_kota['kota'],
            'postal_code'   => $user['kode_pos'],
            'phone'         => $user['no_tlp'],
            'country_code'  => 'IDN'
        );
        // Optional
        $shipping_address = array(
            'first_name'    => $shipping_nama,
            'last_name'     => "",
            'address'       => $shipping_alamat,
            'city'          => $kota_tujuan['kota'],
            'postal_code'   => $shipping_kode_pos,
            'phone'         => $shipping_no_tlp,
            'country_code'  => 'IDN'
        );

        // Optional
        $customer_details = array(
            'first_name'    => $user['nama'],
            'last_name'     => "",
            'email'         => $user['email'],
            'phone'         => $user['no_tlp'],
            'billing_address'  => $billing_address,
            'shipping_address' => $shipping_address
        );

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O", $time),
            'unit' => 'minute',
            'duration'  => 1440
        );

        $transaction_data = array(
            'transaction_details' => $transaction_details,
            'item_details'       => $item_details,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry,
            // 'enabled_payments'	 => ['bca_va', 'bni_va', 'permata_va']
        );

        error_log(json_encode($transaction_data));
        $snapToken = $this->midtrans->getSnapToken($transaction_data);
        error_log($snapToken);
        echo $snapToken;
    }

    public function tambah_pemesanan()
    {

        $midtrans = json_decode($this->input->post('result_data'), true);
        $user = $this->M_user->getUserByLogin();

        //data pesanan
        $id_pesanan = $midtrans['order_id'];
        $id = $user['id'];
        $email = $this->input->post('email');
        $nama = $this->input->post('nama');
        $no_tlp = $this->input->post('no_tlp');
        $alamat = $this->input->post('alamat');
        $id_kota = $this->input->post('kota');
        $kode_pos = $this->input->post('kode_pos');
        $total_berat = $this->input->post('total_berat');
        $kurir = $this->input->post('kurir');
        $layanan = $this->input->post('layanan');
        $ongkir = $this->input->post('ongkir');
        $jenis_pembayaran = $midtrans['payment_type'];
        $bank = $midtrans['va_numbers'][0]['bank'];
        $va_number = $midtrans['va_numbers'][0]['va_number'];
        $tgl_dibuat = $midtrans['transaction_time'];

        $total_bayar = $this->input->post('total_bayar');
        $instruksi = $midtrans['pdf_url'];
        $status_pesanan = getStatusPesanan($midtrans['transaction_status']);


        $data_pesanan = [
            'id_pesanan' => $id_pesanan,
            'id' => $id,
            'email' => $email,
            'nama' => $nama,
            'no_tlp' => $no_tlp,
            'alamat' => $alamat,
            'id_kota' => $id_kota,
            'kode_pos' => $kode_pos,
            'total_berat' => $total_berat / 1000,
            'kurir' => $kurir,
            'layanan' => $layanan,
            'ongkir' => $ongkir,
            'jenis_pembayaran' => $jenis_pembayaran,
            'bank' => $bank,
            'va_number' => $va_number,
            'tgl_dibuat' => $tgl_dibuat,
            'tgl_dibayar' => '',
            'total_bayar' => $total_bayar,
            'instruksi' => $instruksi,
            'resi' => '',
            'keterangan' => 'silahkan transfer ke no.virtual account : ' . $va_number . ' (' . strtoupper($bank) . ')',
            'status_pesanan' => $status_pesanan
        ];

        $this->db->insert('pesanan', $data_pesanan);

        // data detail pesanan

        foreach ($this->cart->contents() as $cart) {

            $data_detail_pesanan = [
                'id_pesanan' => $id_pesanan,
                'id_detailbrg' => $cart['id'],
                'warna' => $cart['options']['Color'],
                'ukuran' => $cart['options']['Size'],
                'jumlah' => $cart['qty'],
                'total_harga' => $cart['subtotal']
            ];

            $this->db->insert('detail_pesanan', $data_detail_pesanan);

            // stok
            $detail_barang = $this->db->get_where('detail_barang', ['id_detailbrg' => $cart['id']])->row_array();
            $stok_baru = $detail_barang['stok'] - $cart['qty'];
            $set = [

                'stok' => $stok_baru
            ];
            $where = [
                'id_detailbrg' => $cart['id']
            ];
            $this->db->update('detail_barang', $set, $where);
        }

        $this->cart->destroy();
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Pesanan berhasil dibuat!
     </div>');
        redirect(base_url('pelanggan/pesanan'));
    }
}
