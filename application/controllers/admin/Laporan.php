<?php

class Laporan extends CI_Controller
{

    public function penjualan()
    {

        $data['tanggal_awal'] = date('Y-m-01');
        $data['tanggal_akhir'] = date('Y-m-t');

        $this->db->select('pesanan.*,user.*');
        $this->db->from('pesanan');
        $this->db->join('user', 'pesanan.id=user.id');
        $this->db->where('pesanan.tgl_dibuat BETWEEN "' . $data['tanggal_awal'] . '" AND "' . $data['tanggal_akhir'] . '" AND status_pesanan ="dikirim" OR status_pesanan ="dibayar"');

        $data['penjualan'] = $this->db->get()->result_array();

        foreach ($data['penjualan'] as $jual) {

            $tampung_total_bayar[] = $jual['total_bayar'];
        }
        $data['total'] = array_sum($tampung_total_bayar);

        foreach ($data['penjualan'] as $index => $penjualan) {
            $this->db->select('barang.*,detail_pesanan.*,detail_barang.*');
            $this->db->from('detail_pesanan');
            $this->db->join('detail_barang', 'detail_pesanan.id_detailbrg=detail_barang.id_detailbrg');
            $this->db->join('barang', 'detail_barang.kd_brg=barang.kd_brg');
            $this->db->where('detail_pesanan.id_pesanan', $penjualan['id_pesanan']);
            $item = $this->db->get()->result_array();
            $tampung_detail[$index] = $item;
        }


        $data['detail_penjualan'] = $tampung_detail;


        $this->load->view("tamplate_dashboard/header", $data);
        $this->load->view("tamplate_dashboard/sidebar");
        $this->load->view("tamplate_dashboard/topbar");
        $this->load->view("admin/laporan/form_penjualan");
        $this->load->view("tamplate_dashboard/footer");
    }


    public function ajax_laporan_penjualan()
    {
        $tanggal_awal = $this->input->post('tanggal_awal');
        $tanggal_akhir = $this->input->post('tanggal_akhir');


        $this->db->select('pesanan.*,user.*');
        $this->db->from('pesanan');
        $this->db->join('user', 'pesanan.id=user.id');
        $this->db->where('pesanan.tgl_dibuat BETWEEN "' . $tanggal_awal . '" AND "' . $tanggal_akhir . '" AND status_pesanan ="dikirim" OR status_pesanan ="dibayar"');

        $data['penjualan'] = $this->db->get()->result_array();

        foreach ($data['penjualan'] as $jual) {

            $tampung_total_bayar[] = $jual['total_bayar'];
        }
        $data['total'] = array_sum($tampung_total_bayar);

        foreach ($data['penjualan'] as $index => $penjualan) {
            $this->db->select('barang.*,detail_pesanan.*,detail_barang.*');
            $this->db->from('detail_pesanan');
            $this->db->join('detail_barang', 'detail_pesanan.id_detailbrg=detail_barang.id_detailbrg');
            $this->db->join('barang', 'detail_barang.kd_brg=barang.kd_brg');
            $this->db->where('detail_pesanan.id_pesanan', $penjualan['id_pesanan']);
            $item = $this->db->get()->result_array();
            $tampung_detail[$index] = $item;
        }


        $data['detail_penjualan'] = $tampung_detail;

        $this->load->view("admin/laporan/ajax_laporan_penjualan", $data);
    }


    public function cetak_laporan_penjualan()
    {
        $mpdf = new \Mpdf\Mpdf();

        $data['tanggal_awal'] = $this->input->post('tanggal_awal');
        $data['tanggal_akhir'] = $this->input->post('tanggal_akhir');


        $this->db->select('pesanan.*,user.*');
        $this->db->from('pesanan');
        $this->db->join('user', 'pesanan.id=user.id');
        $this->db->where('pesanan.tgl_dibuat BETWEEN "' . $data['tanggal_awal'] . '" AND "' . $data['tanggal_akhir'] . '" AND status_pesanan ="dikirim" OR status_pesanan ="dibayar"');

        $data['penjualan'] = $this->db->get()->result_array();



        foreach ($data['penjualan'] as $index => $penjualan) {
            $this->db->select('barang.*,detail_pesanan.*,detail_barang.*');
            $this->db->from('detail_pesanan');
            $this->db->join('detail_barang', 'detail_pesanan.id_detailbrg=detail_barang.id_detailbrg');
            $this->db->join('barang', 'detail_barang.kd_brg=barang.kd_brg');
            $this->db->where('detail_pesanan.id_pesanan', $penjualan['id_pesanan']);
            $item = $this->db->get()->result_array();
            $tampung_detail[$index] = $item;
        }


        $data['detail_penjualan'] = $tampung_detail;

        foreach ($data['penjualan'] as $jual) {

            $tampung_total_bayar[] = $jual['total_bayar'];
        }
        $data['total'] = array_sum($tampung_total_bayar);


        $html = $this->load->view('admin/laporan/form_cetak_penjualan', $data, true);

        $mpdf->AddPage(
            'L' // L - landscape, P - portrait

        ); // margin footer
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }


    public function stok()
    {
        $this->db->select('barang.*,detail_barang.*');
        $this->db->from('barang');
        $this->db->join('detail_barang', 'barang.kd_brg=detail_barang.kd_brg');
        $data['stok'] = $this->db->get()->result_array();

        $this->load->view("tamplate_dashboard/header", $data);
        $this->load->view("tamplate_dashboard/sidebar");
        $this->load->view("tamplate_dashboard/topbar");
        $this->load->view("admin/laporan/form_stok");
        $this->load->view("tamplate_dashboard/footer");
    }
    public function cetak_stok()
    {
        $mpdf = new \Mpdf\Mpdf();
        $this->db->select('barang.*,detail_barang.*');
        $this->db->from('barang');
        $this->db->join('detail_barang', 'barang.kd_brg=detail_barang.kd_brg');
        $data['stok'] = $this->db->get()->result_array();

        $html = $this->load->view('admin/laporan/form_cetak_stok', $data, true);

        $mpdf->AddPage(
            'L' // L - landscape, P - portrait

        ); // margin footer
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}
