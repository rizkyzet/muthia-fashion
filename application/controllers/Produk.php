<?php
class Produk extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function detail($kd_brg)
    {
        $data['kd_brg'] = $kd_brg;

        $data['barang'] = $this->db->get_where('barang', ['kd_brg' => $kd_brg])->row_array();


        $this->db->order_by('warna', 'ASC');
        $data['detail'] = $this->db->get_where('detail_barang', ['kd_brg' => $kd_brg])->result_array();

        // ambil warna
        foreach ($data['detail'] as $detail) {
            $tampung_warna[] =  $detail['warna'];
        }
        $tampung_warna = array_unique($tampung_warna);
        $data['warna'] = array_values($tampung_warna);

        //ukuran
        $ukuran = $this->db->get_where('detail_barang', ['warna' => $data['detail'][0]['warna'], 'kd_brg' => $kd_brg])->result_array();
        foreach ($ukuran as $uk) {
            $tampung_ukuran[] =  $uk['ukuran'];
        }

        $data['ukuran'] = $tampung_ukuran;
        $this->load->view('template_mutia/header_produk', $data);
        $this->load->view('template_mutia/navbar_new');
        $this->load->view('mutia_fashion/produk/form_produk');
        $this->load->view('template_mutia/footer_produk');
    }



    public function ajax_produk_warna()
    {
        $warna = $this->input->post('warna');
        $kd_brg = $this->input->post('kd_brg');

        $this->db->order_by('warna', 'ASC');
        $result = $this->db->get_where('detail_barang', ['warna' => $warna, 'kd_brg' => $kd_brg])->result_array();

        foreach ($result as $rslt) {

            $ukuran[] = $rslt['ukuran'];
        }

        $data['ukuran'] = $ukuran;
        $option =  $this->load->view('mutia_fashion/produk/ajax_combo_ukuran', $data, true);
        $image = base_url('assets/upload/barang/' . $result[0]['gambar']);
        $title = ucwords($result[0]['warna']) . ' - ' . strtoupper($result[0]['ukuran']);

        $json_data = [
            'option' => $option,
            'image' => $image,
            'title' => $title
        ];

        echo json_encode($json_data);
    }

    public function ajax_produk_ukuran()
    {
        $warna = $this->input->post('warna');
        $kd_brg = $this->input->post('kd_brg');
        $ukuran = $this->input->post('ukuran');

        $result = $this->db->get_where('detail_barang', ['warna' => $warna, 'kd_brg' => $kd_brg, 'ukuran' => $ukuran])->row_array();


        $image = base_url('assets/upload/barang/' . $result['gambar']);
        $title = ucwords($result['warna']) . ' - ' . strtoupper($result['ukuran']);

        $json_data = [

            'image' => $image,
            'title' => $title
        ];

        echo json_encode($json_data);
    }
}
