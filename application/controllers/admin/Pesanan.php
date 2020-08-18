<?php

class Pesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-Y4b4Br-SYvKkVi8DPQGTvwbT', 'production' => false);
        $this->load->library('midtrans');
        $this->midtrans->config($params);
    }

    public function index()
    {
        $this->db->select('pesanan.nama as nama_kirim,user.nama as nama_user,user.*,pesanan.*');
        $this->db->from('pesanan');
        $this->db->join('user', 'pesanan.id=user.id');
        $this->db->order_by('tgl_dibuat', 'DESC');
        $data['pesanan'] = $this->db->get()->result_array();

        $this->load->view("tamplate_dashboard/header", $data);
        $this->load->view("tamplate_dashboard/sidebar");
        $this->load->view("tamplate_dashboard/topbar");
        $this->load->view("admin/pesanan/form_pesanan");
        $this->load->view("tamplate_dashboard/footer");
    }

    public function detail($id)
    {
        $data['pesanan'] = $this->db->get_where('pesanan', ['id_pesanan' => $id])->row_array();
        $data['detail'] = $this->db->get_where('detail_pesanan', ['id_pesanan' => $id])->row_array();
        $data['pelanggan'] = $this->db->get_where('user', ['id' => $data['pesanan']['id']])->row_array();

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

        $this->db->select('barang.*,detail_pesanan.*,detail_barang.*');
        $this->db->from('detail_pesanan');
        $this->db->join('detail_barang', 'detail_pesanan.id_detailbrg=detail_barang.id_detailbrg');
        $this->db->join('barang', 'detail_barang.kd_brg=barang.kd_brg');
        $this->db->where('detail_pesanan.id_pesanan', $id);
        $data['item'] = $this->db->get()->result_array();

        foreach ($data['item'] as $item) {

            $tot_byr_item[] = $item['total_harga'];
        };

        $data['bayar_item'] = array_sum($tot_byr_item);

        $this->load->view("tamplate_dashboard/header", $data);
        $this->load->view("tamplate_dashboard/sidebar");
        $this->load->view("tamplate_dashboard/topbar");
        $this->load->view("admin/pesanan/form_detail_pesanan");
        $this->load->view("tamplate_dashboard/footer");
    }


    public function cetak_pesanan($id)
    {
        $mpdf = new \Mpdf\Mpdf();

        $data['pesanan'] = $this->db->get_where('pesanan', ['id_pesanan' => $id])->row_array();
        $data['detail'] = $this->db->get_where('detail_pesanan', ['id_pesanan' => $id])->row_array();
        $data['pelanggan'] = $this->db->get_where('user', ['id' => $data['pesanan']['id']])->row_array();

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

        $this->db->select('barang.*,detail_pesanan.*,detail_barang.*');
        $this->db->from('detail_pesanan');
        $this->db->join('detail_barang', 'detail_pesanan.id_detailbrg=detail_barang.id_detailbrg');
        $this->db->join('barang', 'detail_barang.kd_brg=barang.kd_brg');
        $this->db->where('detail_pesanan.id_pesanan', $id);
        $data['item'] = $this->db->get()->result_array();

        foreach ($data['item'] as $item) {

            $tot_byr_item[] = $item['total_harga'];
        };

        $data['bayar_item'] = array_sum($tot_byr_item);

        $html = $this->load->view('admin/pesanan/form_cetak_pesanan', $data, true);

        $mpdf->AddPage(
            'L' // L - landscape, P - portrait

        ); // margin footer
        $mpdf->WriteHTML($html);
        $mpdf->Output('pesanan ' . $id . '.pdf', 'I');
    }

    public function update_midtrans()
    {
        $pesanan = $this->db->get_where('pesanan', ['status_pesanan' => 'belum dibayar'])->result_array();

        foreach ($pesanan as $p) {


            $id_pesanan = $p['id_pesanan'];

            $result = get_object_vars($this->midtrans->status($id_pesanan));

            if ($result['transaction_status'] == 'expire' or $result['transaction_status'] == 'cancel') {

                // $this->db->delete('pesanan', ['id_pesanan' => $id_pesanan]);
                // $this->db->delete('detail_pesanan', ['id_pesanan' => $id_pesanan]);

                // stok
                $result_pesanan = $this->db->get_where('detail_pesanan', ['id_pesanan' => $id_pesanan])->result_array();

                foreach ($result_pesanan as $psn) {

                    $detail_barang = $this->db->get_where('detail_barang', ['id_detailbrg' => $psn['id_detailbrg']])->row_array();
                    $stok_baru = $detail_barang['stok'] + $psn['jumlah'];
                    $set = [

                        'stok' => $stok_baru
                    ];
                    $where = [
                        'id_detailbrg' => $psn['id_detailbrg']
                    ];
                    $this->db->update('detail_barang', $set, $where);
                }


                $set = [
                    'keterangan' => 'pesanan dibatalkan karena melewati batas waktu pembayaran',
                    'status_pesanan' => 'expired'
                ];

                $where = [
                    'id_pesanan' => $id_pesanan
                ];

                $this->db->update('pesanan', $set, $where);
            } elseif ($result['transaction_status'] == 'settlement') {

                $set = [
                    'tgl_dibayar' => $result['settlement_time'],
                    'keterangan' => 'pesanan sedang dalam proses packing',
                    'status_pesanan' => 'dibayar'
                ];

                $where = [
                    'id_pesanan' => $id_pesanan
                ];

                $this->db->update('pesanan', $set, $where);
            }
        }



        redirect('admin/pesanan');
    }

    public function resi($id)
    {
        $this->form_validation->set_rules('resi', 'Resi', 'required|trim', ['required' => 'Resi Harus Diisi!']);
        $data['id_pesanan'] = $id;
        $data['pesanan'] = $this->db->get_where('pesanan', ['id_pesanan' => $id])->row_array();
        if ($this->form_validation->run() == false) {

            $this->load->view("tamplate_dashboard/header", $data);
            $this->load->view("tamplate_dashboard/sidebar");
            $this->load->view("tamplate_dashboard/topbar");
            $this->load->view("admin/pesanan/form_resi");
            $this->load->view("tamplate_dashboard/footer");
        } else {

            $resi = $this->input->post('resi');

            $set = [
                'resi' => $resi,
                'keterangan' => 'Cek No. resi : ' . $resi . ' (' . strtoupper($data['pesanan']['kurir']) . ')',
                'status_pesanan' => 'dikirim'
            ];

            $where = [
                'id_pesanan' => $id
            ];

            $this->db->update('pesanan', $set, $where);

            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Resi Berhasil diinput!
          </div>');
            redirect("admin/pesanan/");
        }
    }
}
