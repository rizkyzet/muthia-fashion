<?php

class Akun extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        akses_pelanggan();
    }

    public function index()
    {
        $this->db->select('user.*,provinsi.provinsi,kota.kota');
        $this->db->from('user');
        $this->db->join('kota', 'user.id_kota=kota.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi=provinsi.id_provinsi');
        $this->db->where('user.email', $this->session->userdata('email'));
        $data['user'] = $this->db->get()->row_array();
        $this->load->view('template_mutia/header_cart', $data);
        $this->load->view('template_mutia/navbar_new');
        $this->load->view('pelanggan/akun/form_informasi_akun');
        $this->load->view('template_mutia/footer_cart');
    }
    public function edit_akun()
    {
        $this->db->select('user.*,provinsi.provinsi,kota.kota');
        $this->db->from('user');
        $this->db->join('kota', 'user.id_kota=kota.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi=provinsi.id_provinsi');
        $this->db->where('user.email', $this->session->userdata('email'));
        $data['user'] = $this->db->get()->row_array();

        $data['provinsi'] = $this->db->get('provinsi')->result_array();

        foreach ($data['provinsi'] as $index => $p) {

            $kota = $this->db->get_where('kota', ['id_provinsi' => $p['id_provinsi']])->result_array();
            $tampung_kota[$index] = $kota;
        }
        $data['kota'] = $tampung_kota;

        $this->form_validation->set_rules("nama", "nama", "required|trim", ["required" => "nama harus diisi"]);
        $this->form_validation->set_rules("no_tlp", "no telepon", "required|trim|max_length[13]", ["required" => "masukkan nomor telepon dulu"]);
        $this->form_validation->set_rules("kota", "kota", "required|trim", ["required" => "kota Harus diisi"]);
        $this->form_validation->set_rules("alamat", "alamat", "required|trim", ["required" => "alamat Harus diisi"]);
        $this->form_validation->set_rules("kode_pos", "kode pos", "required|trim", ["required" => "kode pos Harus diisi"]);

        if ($this->form_validation->run() == false) {

            $this->load->view('template_mutia/header_cart', $data);
            $this->load->view('template_mutia/navbar_new');
            $this->load->view('pelanggan/akun/form_edit_akun');
            $this->load->view('template_mutia/footer_cart');
        } else {

            $nama = $this->input->post('nama');
            $no_tlp = $this->input->post('no_tlp');
            $id_kota = $this->input->post('kota');
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
                $config['file_name'] = $data['user']['id'];
                $config['overwrite'] = true;
                $config['upload_path'] = './assets/upload/profile';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar')) {
                    $foto_lama = strtolower($data['user']['image']);
                    $foto_baru = strtolower($this->upload->data('file_name'));
                    if ($foto_lama != 'default.png') {
                        if ($foto_lama != $foto_baru) {

                            array_map('unlink', glob(FCPATH . "assets/upload/profile/$foto_lama"));
                        }
                    }
                    $set = array_merge($set, ['image' => $foto_baru]);
                } else {
                    $this->session->set_flashdata('pesan_upload', '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Upload failed!</h4><p>' . $this->upload->display_errors() . '</p></div>');
                    redirect('pelanggan/akun/');
                }
            }

            $where = ['email' => $this->session->userdata('email')];
            $this->db->update("user", $set, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Akun Telah di Ubah!
          </div>');
            redirect("pelanggan/akun");
        }
    }
    public function ganti_password()
    {

        $this->db->select('user.*,provinsi.provinsi,kota.kota');
        $this->db->from('user');
        $this->db->join('kota', 'user.id_kota=kota.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi=provinsi.id_provinsi');
        $this->db->where('user.email', $this->session->userdata('email'));
        $data['user'] = $this->db->get()->row_array();

        $this->form_validation->set_rules('password_lama', 'password lama', 'required', ['required' => 'Kata Sandi Lama Harus Diisi']);
        $this->form_validation->set_rules('password_baru', 'password baru', 'required|matches[konfirmasi_password]', ['required' => 'Kata Sandi Baru Harus Diisi']);
        $this->form_validation->set_rules('konfirmasi_password', 'konfirmasi password', 'required|matches[password_baru]', ['required' => 'Konfirmasi Kata Sandi Baru']);
        if ($this->form_validation->run() == false) {

            $this->load->view('template_mutia/header_cart', $data);
            $this->load->view('template_mutia/navbar_new');
            $this->load->view('pelanggan/akun/form_ganti_password');
            $this->load->view('template_mutia/footer_cart');
        } else {


            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $cek = password_verify($this->input->post('password_lama'), $user['password']);

            if ($cek == false) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                Kata Sandi Lama Salah!
              </div>');
                redirect("pelanggan/akun/ganti_password");
            };
            $set = [
                'password' => password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT)
            ];
            $where = [
                'email' => $this->session->userdata('email')
            ];
            $this->db->update("user", $set, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Kata Sandi Telah Diubah!
          </div>');
            redirect("pelanggan/akun/ganti_password");
        }
    }
}
