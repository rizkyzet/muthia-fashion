<?php

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        akses_pelanggan();
    }

    public function index()
    {
        $data['user'] = $this->M_user->getUserByLogin();

        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->where('id', $data['user']['id']);
        $this->db->order_by('tgl_dibuat', 'DESC');
        $data['pesanan'] = $this->db->get()->result_array();

        if ($data['pesanan']) {

            foreach ($data['pesanan'] as $index => $p) {
                $this->db->select('barang.*,detail_pesanan.*,detail_barang.*');
                $this->db->from('detail_pesanan');
                $this->db->join('detail_barang', 'detail_pesanan.id_detailbrg=detail_barang.id_detailbrg');
                $this->db->join('barang', 'detail_barang.kd_brg=barang.kd_brg');
                $this->db->where('detail_pesanan.id_pesanan', $p['id_pesanan']);
                $item = $this->db->get()->result_array();

                $tampung_item[$index] = $item;
            }

            $data['item'] = $tampung_item;
        } else {
            $data['item'] = null;
        }

        $this->load->view('template_mutia/header_cart', $data);
        $this->load->view('template_mutia/navbar_new');
        $this->load->view('pelanggan/pesanan/form_pesanan');
        $this->load->view('template_mutia/footer_cart');
    }

    public function detail($id)
    {
        $data['user'] = $this->M_user->getUserByLogin();
        $data['pesanan'] = $this->db->get_where('pesanan', ['id_pesanan' => $id])->row_array();

        $this->db->select('barang.*,detail_pesanan.*,detail_barang.*');
        $this->db->from('detail_pesanan');
        $this->db->join('detail_barang', 'detail_pesanan.id_detailbrg=detail_barang.id_detailbrg');
        $this->db->join('barang', 'detail_barang.kd_brg=barang.kd_brg');
        $this->db->where('detail_pesanan.id_pesanan', $id);
        $data['item'] = $this->db->get()->result_array();


        $this->db->select('pesanan.*,provinsi.*,kota.*');
        $this->db->from('pesanan');
        $this->db->join('kota', 'pesanan.id_kota=kota.id_kota',);
        $this->db->join('provinsi', 'kota.id_provinsi=provinsi.id_provinsi',);
        $this->db->where('pesanan.id_pesanan', $id);
        $pengiriman = $this->db->get()->row_array();
        $data['pengiriman'] = $pengiriman;



        $this->db->select('user.*,provinsi.*,kota.*');
        $this->db->from('user');
        $this->db->join('kota', 'user.id_kota=kota.id_kota',);
        $this->db->join('provinsi', 'kota.id_provinsi=provinsi.id_provinsi',);
        $this->db->where('user.id', $data['pesanan']['id']);
        $tagihan = $this->db->get()->row_array();
        $data['tagihan'] = $tagihan;



        foreach ($data['item'] as $item) {

            $tot_byr_item[] = $item['total_harga'];
        };

        $data['bayar_item'] = array_sum($tot_byr_item);
        $this->load->view('template_mutia/header_cart', $data);
        $this->load->view('pelanggan/pesanan/form_detail');
    }
}
