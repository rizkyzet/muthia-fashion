<?php
class Beranda extends CI_Controller
{
    public function index()
    {
        $data['profil'] = $this->M_user->getUserByLogin();
        $barang = $this->db->get('barang')->result_array();


        foreach ($barang as $index => $brg) {
            $ambil_gambar = $this->db->get_where('detail_barang', ['kd_brg' => $brg['kd_brg']])->row_array();
            if ($ambil_gambar) {

                $array = ['gambar' => $ambil_gambar['gambar']];
            } else {
                $array = ['gambar' => 'no_image.jpg'];
            }
            $barangs[$index] = array_merge($barang[$index], $array);
        }

        $data['barang'] = $barangs;

        // Terbaru
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->order_by('tanggal_masuk', 'DESC');
        $this->db->limit(3);
        $barang_terbaru = $this->db->get()->result_array();

        foreach ($barang_terbaru as $index => $terbaru) {
            $ambil_gambar = $this->db->get_where('detail_barang', ['kd_brg' => $terbaru['kd_brg']])->row_array();
            if ($ambil_gambar) {

                $array = ['gambar' => $ambil_gambar['gambar']];
            } else {
                $array = ['gambar' => 'no_image.jpg'];
            }
            $barangs_terbaru[$index] = array_merge($barang_terbaru[$index], $array);
        };

        $data['terbaru'] = $barangs_terbaru;

        // Terlaris
        $produk = $this->db->get('barang')->result_array();

        foreach ($produk as $p) {

            $this->db->select('barang.*,detail_pesanan.*');
            $this->db->from('detail_pesanan');
            $this->db->join('detail_barang', 'detail_pesanan.id_detailbrg=detail_barang.id_detailbrg');
            $this->db->join('barang', 'detail_barang.kd_brg=barang.kd_brg');
            $this->db->where(['barang.kd_brg' => $p['kd_brg']]);
            $jumlah = $this->db->get()->num_rows();
            if ($jumlah > 0) {

                $tampung_terbanyak[] = [
                    'kd_brg' => $p['kd_brg'],
                    'jumlah' => $jumlah
                ];
            }
        }
        usort($tampung_terbanyak, function ($a, $b) {
            return $b['jumlah'] <=> $a['jumlah'];
        });


        $terlaris[0] = $this->db->get_where('barang', ['kd_brg' => $tampung_terbanyak[0]['kd_brg']])->row_array();
        $terlaris[1] = $this->db->get_where('barang', ['kd_brg' => $tampung_terbanyak[1]['kd_brg']])->row_array();
        $terlaris[2] = $this->db->get_where('barang', ['kd_brg' => $tampung_terbanyak[2]['kd_brg']])->row_array();

        foreach ($terlaris as $index => $t) {
            $ambil_gambar = $this->db->get_where('detail_barang', ['kd_brg' => $t['kd_brg']])->row_array();
            if ($ambil_gambar) {

                $array = ['gambar' => $ambil_gambar['gambar']];
            } else {
                $array = ['gambar' => 'no_image.jpg'];
            }
            $terlaris[$index] = array_merge($barang[$index], $array);
        }

        $data['terlaris'] = $terlaris;

        // Cuci Gudang
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->order_by('tanggal_masuk', 'DESC');
        $this->db->limit(3);
        $barang_terbaru = $this->db->get()->result_array();

        foreach ($barang_terbaru as $index => $terbaru) {
            $ambil_gambar = $this->db->get_where('detail_barang', ['kd_brg' => $terbaru['kd_brg']])->row_array();
            if ($ambil_gambar) {

                $array = ['gambar' => $ambil_gambar['gambar']];
            } else {
                $array = ['gambar' => 'no_image.jpg'];
            }
            $barangs_terbaru[$index] = array_merge($barang_terbaru[$index], $array);
        };

        $data['terbaru'] = $barangs_terbaru;


        $this->load->view('template_mutia/header_beranda', $data);
        $this->load->view('template_mutia/navbar_new');
        $this->load->view('mutia_fashion/beranda/form_beranda');
        $this->load->view('template_mutia/footer_beranda');
    }
}
