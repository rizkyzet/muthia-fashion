<?php
class Barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        akses_admin();
    }
    public function index()
    {
        $data["barang"] = $this->db->get('barang')->result_array();
        $this->load->view("tamplate_dashboard/header", $data);
        $this->load->view("tamplate_dashboard/sidebar");
        $this->load->view("tamplate_dashboard/topbar");
        $this->load->view("admin/barang/form_barang");
        $this->load->view("tamplate_dashboard/footer");
    }


    public function tambah()
    {
        $this->form_validation->set_rules("kd_brg", "kd_barang", "required|trim|is_unique[barang.kd_brg]", [
            "required" => "Kode Barang harus diisi",
            "is_unique" => "Kode Barang sudah ada"
        ]);
        $this->form_validation->set_rules("nama_kategori", "Nama Kategori", "required|trim", ["required" => "Pilih Kategori dulu"]);
        $this->form_validation->set_rules("nama_brg", "Nama Barang", "required|trim", ["required" => "Nama Barang Harus diisi"]);
        $this->form_validation->set_rules("harga", "Harga", "required|trim", ["required" => "Harga Harus diisi"]);
        $this->form_validation->set_rules("berat", "Berat", "required|trim", ["required" => "Berat Harus diisi"]);
        $this->form_validation->set_rules("tanggal", "Tanggal Masuk Barang", "required|trim", ["required" => "Tanggal Masuk Barang Harus diisi"]);
        $this->form_validation->set_rules("deskripsi", "Deskripsi Barang", "required|trim", ["required" => "Deskripsi Barang Harus diisi"]);
        $data["kategori"] = $this->db->get("kategori")->result_array();
        if ($this->form_validation->run() == false) {

            $this->load->view("tamplate_dashboard/header", $data);
            $this->load->view("tamplate_dashboard/sidebar");
            $this->load->view("tamplate_dashboard/topbar");
            $this->load->view("admin/barang/form_tambahbrg");
            $this->load->view("tamplate_dashboard/footer");
        } else {
            $set = [
                "kd_brg" => $this->input->post("kd_brg"),
                "nama_brg" => $this->input->post("nama_brg"),
                "kd_kategori" => $this->input->post("nama_kategori"),
                "tanggal_masuk" => $this->input->post("tanggal"),
                "deskripsi" => $this->input->post("deskripsi"),
                "harga" => $this->input->post("harga"),
                "berat" => $this->input->post('berat')
            ];
            $this->db->insert("barang", $set);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Barang Telah di Tambahkan!
          </div>');
            redirect("admin/barang");
        }
    }
    public function hapus_barang($data)
    {
        $this->db->delete('barang', ['kd_brg' => $data]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Barang Telah di Hapus!
        </div>');
        redirect("admin/barang");
    }
    public function edit_barang($kd_brg)
    {
        $data['barang'] = $this->db->get_where('barang', ['kd_brg' => $kd_brg])->row_array();
        $this->form_validation->set_rules("kd_brg", "kd_barang", "required|trim", ["required" => "Kode Barang harus diisi"]);
        $this->form_validation->set_rules("nama_kategori", "Nama Kategori", "required|trim", ["required" => "Pilih Kategori dulu"]);
        $this->form_validation->set_rules("nama_brg", "Nama Barang", "required|trim", ["required" => "Nama Barang Harus diisi"]);
        $this->form_validation->set_rules("harga", "Harga", "required|trim", ["required" => "Harga Harus diisi"]);
        $this->form_validation->set_rules("berat", "Berat", "required|trim", ["required" => "Harga Harus diisi"]);
        $this->form_validation->set_rules("tanggal", "Tanggal Masuk Barang", "required|trim", ["required" => "Tanggal Masuk Barang Harus diisi"]);
        $this->form_validation->set_rules("deskripsi", "Deskripsi Barang", "required|trim", ["required" => "Deskripsi Barang Harus diisi"]);
        $data["kategori"] = $this->db->get("kategori")->result_array();
        if ($this->form_validation->run() == false) {

            $this->load->view("tamplate_dashboard/header", $data);
            $this->load->view("tamplate_dashboard/sidebar");
            $this->load->view("tamplate_dashboard/topbar");
            $this->load->view("admin/barang/form_editbrg");
            $this->load->view("tamplate_dashboard/footer");
        } else {

            $set = [
                "kd_brg" => $this->input->post("kd_brg"),
                "nama_brg" => $this->input->post("nama_brg"),
                "kd_kategori" => $this->input->post("nama_kategori"),
                "tanggal_masuk" => $this->input->post("tanggal"),
                "deskripsi" => $this->input->post("deskripsi"),
                "harga" => $this->input->post("harga"),
                "berat" => $this->input->post("berat")
            ];
            $where = ['kd_brg' => $kd_brg];
            $this->db->update("barang", $set, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Barang Telah di Ubah!
          </div>');
            redirect("admin/barang");
        }
    }
}
