<?php
class kategori extends CI_Controller
{
    public function index()
    {
        $data["kategori"] = $this->db->get('kategori')->result_array();
        $this->load->view("tamplate_dashboard/header", $data);
        $this->load->view("tamplate_dashboard/sidebar");
        $this->load->view("tamplate_dashboard/topbar");
        $this->load->view("admin/kategori/form_kategori");
        $this->load->view("tamplate_dashboard/footer");
    }
    public function tambah()
    {
        $this->form_validation->set_rules("nama_kategori", "Nama Kategori", "required|trim", ["required" => "Masukkan Kategori terlebih dahulu"]);
        if ($this->form_validation->run() == false) {
            $this->load->view("tamplate_dashboard/header");
            $this->load->view("tamplate_dashboard/sidebar");
            $this->load->view("tamplate_dashboard/topbar");
            $this->load->view("admin/kategori/form_tambahktgr");
            $this->load->view("tamplate_dashboard/footer");
        } else {
            $set = [
                "nama_kategori" => $this->input->post("nama_kategori")
            ];
            $this->db->insert("kategori", $set);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    kategori Telah di Tambahkan!
  </div>');
            redirect("admin/kategori/tambah");
        }
    }
    public function hapus_kategori($data)
    {
        $this->db->delete('kategori', ['kd_kategori' => $data]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Kategori Telah di Hapus!
        </div>');
        redirect("admin/kategori");
    }

    public function edit_kategori($kd_kategori)
    {
        $data['kategori'] = $this->db->get_where('kategori', ['kd_kategori' => $kd_kategori])->row_array();
        $this->form_validation->set_rules("kd_kategori", "kd_kategori", "required|trim", ["required" => "Kode kategori harus diisi"]);
        $this->form_validation->set_rules("nama_kategori", "nama_kategori", "required|trim", ["required" => "Nama kategori harus diisi"]);

        if ($this->form_validation->run() == false) {

            $this->load->view("tamplate_dashboard/header", $data);
            $this->load->view("tamplate_dashboard/sidebar");
            $this->load->view("tamplate_dashboard/topbar");
            $this->load->view("admin/kategori/form_editktgr");
            $this->load->view("tamplate_dashboard/footer");
        } else {

            $set = [
                "kd_kategori" => $this->input->post("kd_kategori"),
                "nama_kategori" => $this->input->post("nama_kategori"),
            ];
            $where = ['kd_kategori' => $kd_kategori];
            $this->db->update("kategori", $set, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            kategori Telah di Ubah!
          </div>');
            redirect("admin/kategori");
        }
    }
}
