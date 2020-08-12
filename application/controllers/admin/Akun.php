<?php
class Akun extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        akses_admin();
    }

    public function index()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('kota', 'user.id_kota=kota.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi=provinsi.id_provinsi');
        $this->db->where('email', $this->session->userdata('email'));
        $data["usr"] = $this->db->get()->row_array();
        $this->load->view("tamplate_dashboard/header", $data);
        $this->load->view("tamplate_dashboard/sidebar");
        $this->load->view("tamplate_dashboard/topbar");
        $this->load->view("admin/akun/form_akun");
        $this->load->view("tamplate_dashboard/footer");
    }
    public function edit_akun()
    {

        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('kota', 'user.id_kota=kota.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi=provinsi.id_provinsi');
        $this->db->where('email', $this->session->userdata('email'));
        $data["usr"] = $this->db->get()->row_array();

        $data['provinsi'] = $this->db->get('provinsi')->result_array();
        $data['kota'] = $this->db->get_where('kota', ['id_provinsi' => $data['usr']['id_provinsi']])->result_array();
        $this->form_validation->set_rules("nama", "nama", "required|trim", ["required" => "nama harus diisi"]);
        $this->form_validation->set_rules("no_tlp", "no_tlp", "required|trim", ["required" => "masukkan nomor telepon dulu"]);
        $this->form_validation->set_rules("provinsi", "provinsi", "required|trim", ["required" => "provinsi Harus diisi"]);
        $this->form_validation->set_rules("id_kota", "kota", "required|trim", ["required" => "kota Harus diisi"]);
        $this->form_validation->set_rules("alamat", "alamat", "required|trim", ["required" => "alamat Harus diisi"]);
        if ($this->form_validation->run() == false) {

            $this->load->view("tamplate_dashboard/header", $data);
            $this->load->view("tamplate_dashboard/sidebar");
            $this->load->view("tamplate_dashboard/topbar");
            $this->load->view("admin/akun/form_editakun");
            $this->load->view("tamplate_dashboard/footer");
        } else {
            $nama = $this->input->post('nama');
            $no_tlp = $this->input->post('no_tlp');
            $id_kota = $this->input->post('id_kota');
            $kode_pos = $this->input->post('kode_pos');
            $alamat = $this->input->post('alamat');
            $gambar = $_FILES['gambar']['name'];

            $set = [
                "nama" => $nama,
                "no_tlp" => $no_tlp,
                "id_kota" => $id_kota,
                "kode_pos" => $kode_pos,
                "alamat" => $alamat
            ];


            if ($gambar) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '20048';
                $config['file_name'] = $data['usr']['id'];
                $config['overwrite'] = true;
                $config['upload_path'] = './assets/upload/profile';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $foto_lama = strtolower($data['usr']['image']);
                    $foto_baru = strtolower($this->upload->data('file_name'));
                    if ($foto_lama != 'default.png') {
                        if ($foto_lama != $foto_baru) {

                            array_map('unlink', glob(FCPATH . "assets/upload/profile/$foto_lama"));
                        }
                    }
                    $set = array_merge($set, ['image' => $foto_baru]);
                } else {
                    $this->session->set_flashdata('pesan_upload', '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Upload failed!</h4><p>' . $this->upload->display_errors() . '</p></div>');
                    redirect('admin/akun/');
                }
            }

            $where = ['email' => $this->session->userdata('email')];
            $this->db->update("user", $set, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Akun Telah di Ubah!
          </div>');
            redirect("admin/akun");
        }
    }
    public function gantisandi()
    {
        $this->form_validation->set_rules('sandi_lama', 'passwordlama', 'required', ['required' => 'Kata Sandi Lama Harus Diisi']);
        $this->form_validation->set_rules('sandi_baru1', 'passwordnew1', 'required|matches[sandi_baru2]', ['required' => 'Kata Sandi Baru Harus Diisi']);
        $this->form_validation->set_rules('sandi_baru2', 'passwordnew2', 'required|matches[sandi_baru1]', ['required' => 'Konfirmasi Kata Sandi Baru']);
        if ($this->form_validation->run() == false) {

            $this->load->view("tamplate_dashboard/header");
            $this->load->view("tamplate_dashboard/sidebar");
            $this->load->view("tamplate_dashboard/topbar");
            $this->load->view("admin/akun/form_gantisandi");
            $this->load->view("tamplate_dashboard/footer");
        } else {
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $cek = password_verify($this->input->post('password_lama'), $user['password']);

            if ($cek == false) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Kata Sandi Lama Salah!
              </div>');
                redirect("admin/akun/gantisandi");
            };
            $set = [
                'password' => password_hash($this->input->post('sandi_baru1'), PASSWORD_DEFAULT)
            ];
            $where = [
                'email' => $this->session->userdata('email')
            ];
            $this->db->update("user", $set, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Kata Sandi Telah Diubah!
          </div>');
            redirect("admin/akun/gantisandi");
        }
    }

    public function ajax_provinsi()
    {
        $id_provinsi = $this->input->post('id_provinsi');

        $data['kota'] = $this->db->get_where('kota', ['id_provinsi' => $id_provinsi])->result_array();
        $this->load->view('admin/akun/ajax_provinsi', $data);
    }
}
