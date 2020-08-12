<?php
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        akses_admin();
    }
    public function index()
    {

        //   pendapatan bulanan
        $query = $this->db->query("select sum(total_bayar) as pendapatan from pesanan where month(tgl_dibayar) = '" . date('m') . "' and status_pesanan = 'dibayar' or month(tgl_dibayar) = '" . date('m') . "' and status_pesanan = 'dikirim'; ");
        $data['pendapatan'] =  $query->row_array();

        $data['dikirim'] = $this->db->get_where('pesanan', ['status_pesanan' => 'dikirim'])->num_rows();
        $data['dibayar'] = $this->db->get_where('pesanan', ['status_pesanan' => 'dibayar'])->num_rows();
        $data['expired'] = $this->db->get_where('pesanan', ['status_pesanan' => 'expired'])->num_rows();

        for ($bulan = 01; $bulan <= 12; $bulan++) {
            $nama_bulan = date('F', strtotime("01-$bulan-2020"));
            $query = $this->db->query("select sum(total_bayar) as pendapatan from pesanan where month(tgl_dibayar) = '" . $bulan . "' and status_pesanan = 'dibayar' or month(tgl_dibayar) = '" . $bulan . "' and status_pesanan = 'dikirim'; ");
            $pendapatan =  $query->row_array();
            // $pendapatan_format = thousandsCurrencyFormat($pendapatan['total']);
            if ($pendapatan['pendapatan'] == null) {
                $tampung_pendapatan[strtolower($nama_bulan)] = 0;
            } else {

                $tampung_pendapatan[strtolower($nama_bulan)] = $pendapatan['pendapatan'];
            }
        };

        $data['chart_pendapatan'] = $tampung_pendapatan;


        $this->load->view("tamplate_dashboard/header", $data);
        $this->load->view("tamplate_dashboard/sidebar");
        $this->load->view("tamplate_dashboard/topbar");
        $this->load->view("admin/form_dashboard");
        $this->load->view("tamplate_dashboard/footer");
        $this->load->view("tamplate_dashboard/area_chart.php");
    }
}
