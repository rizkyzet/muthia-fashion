<?php

class Administrator extends CI_Controller
{
    public function index()
    {
        $this->db->select();
        $this->db->from('user');
        $this->db->join('kota', 'user.id_kota=kota.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi=provinsi.id_provinsi');
        $this->db->where(['user.role_id' => 2]);
        $data['admin'] = $this->db->get()->result_array();


        $this->load->view("tamplate_dashboard/header", $data);
        $this->load->view("tamplate_dashboard/sidebar");
        $this->load->view("tamplate_dashboard/topbar");
        $this->load->view("admin/administrator/form_administrator");
        $this->load->view("tamplate_dashboard/footer");
    }

    public function tambah_admin()
    {

        $data['provinsi'] = $this->db->get('provinsi')->result_array();

        foreach ($data['provinsi'] as $index => $p) {

            $kota = $this->db->get_where('kota', ['id_provinsi' => $p['id_provinsi']])->result_array();
            $tampung_kota[$index] = $kota;
        }
        $data['kota'] = $tampung_kota;

        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]', ['required' => 'Nama Harus Diisi!', 'is_unique' => 'Email Sudah ada!']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password Harus Diisi!']);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama Harus Diisi!']);
        $this->form_validation->set_rules('no_tlp', 'Nomor Telepon', 'required|trim|numeric', ['required' => 'Nama Harus Diisi!', 'numeric' => 'No Telepon harus angka!']);
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim', ['required' => 'Kota Harus Diisi!']);
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim', ['required' => 'Kode Pos Harus Diisi!']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat Harus Diisi!']);

        if ($this->form_validation->run() == false) {

            $this->load->view("tamplate_dashboard/header", $data);
            $this->load->view("tamplate_dashboard/sidebar");
            $this->load->view("tamplate_dashboard/topbar");
            $this->load->view("admin/administrator/form_tambah_admin");
            $this->load->view("tamplate_dashboard/footer");
        } else {

            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_tlp = $this->input->post('no_tlp');
            $kota = $this->input->post('kota');
            $kode_pos = $this->input->post('kode_pos');
            $alamat = $this->input->post('alamat');
            $image = 'no_image.png';
            $password = $this->input->post('password');
            $role_id = 2;
            $active = 1;
            $tanggal_dibuat = time();

            $set = [
                'nama' => $nama,
                'email' => $email,
                'no_tlp' => $no_tlp,
                'id_kota' => $kota,
                'kode_pos' => $kode_pos,
                'alamat' => $alamat,
                'image' => $image,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role_id' => $role_id,
                'active' => $active,
                'tanggal_dibuat' => $tanggal_dibuat
            ];

            $this->db->insert('user', $set);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Admin Berhasil ditambahkan!
          </div>');
            redirect("admin/administrator");
        }
    }


    public function edit_admin($id)
    {
        $this->db->select();
        $this->db->from('user');
        $this->db->join('kota', 'user.id_kota=kota.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi=provinsi.id_provinsi');
        $this->db->where(['id' => $id, 'user.role_id' => 2]);
        $data['admin'] = $this->db->get()->row_array();
        $data['provinsi'] = $this->db->get('provinsi')->result_array();

        foreach ($data['provinsi'] as $index => $p) {

            $kota = $this->db->get_where('kota', ['id_provinsi' => $p['id_provinsi']])->result_array();
            $tampung_kota[$index] = $kota;
        }
        $data['kota'] = $tampung_kota;

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', ['required' => 'Nama Harus Diisi!']);
        $this->form_validation->set_rules('no_tlp', 'Nomor Telepon', 'required|trim|numeric', ['required' => 'Nama Harus Diisi!', 'numeric' => 'No Telepon harus angka!']);
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim', ['required' => 'Kota Harus Diisi!']);
        $this->form_validation->set_rules('kode_pos', 'Kode Pos', 'required|trim', ['required' => 'Kode Pos Harus Diisi!']);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat Harus Diisi!']);

        if ($this->form_validation->run() == false) {

            $this->load->view("tamplate_dashboard/header", $data);
            $this->load->view("tamplate_dashboard/sidebar");
            $this->load->view("tamplate_dashboard/topbar");
            $this->load->view("admin/administrator/form_edit_admin");
            $this->load->view("tamplate_dashboard/footer");
        } else {

            $nama = $this->input->post('nama');
            $password = $this->input->post('password');
            $no_tlp = $this->input->post('no_tlp');
            $kota = $this->input->post('kota');
            $kode_pos = $this->input->post('kode_pos');
            $alamat = $this->input->post('alamat');


            if (!empty($password)) {
                $set = [
                    'nama' => $nama,
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'no_tlp' => $no_tlp,
                    'id_kota' => $kota,
                    'kode_pos' => $kode_pos,
                    'alamat' => $alamat
                ];
            } else {
                $set = [
                    'nama' => $nama,
                    'no_tlp' => $no_tlp,
                    'id_kota' => $kota,
                    'kode_pos' => $kode_pos,
                    'alamat' => $alamat
                ];
            }

            $where = ['id' => $id];

            $this->db->update('user', $set, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Admin Telah di Ubah!
          </div>');
            redirect("admin/administrator");
        }
    }

    public function hapus_admin($id)
    {

        $where = ['id' => $id];
        $this->db->delete('user', $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Admin Telah di hapus!
      </div>');
        redirect("admin/administrator");
    }
}
