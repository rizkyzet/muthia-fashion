<?php

class Detail_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        akses_admin();
    }

    public function tampil($kd_barang)
    {
        $data['barang'] = $this->db->get_where('barang', ['kd_brg' => $kd_barang])->row_array();
        $this->db->order_by('warna', 'ASC');
        $data['detail_barang'] = $this->db->get_where('detail_barang', ['kd_brg' => $kd_barang])->result_array();
        $data['kd_barang'] = $kd_barang;

        $this->load->view("tamplate_dashboard/header", $data);
        $this->load->view("tamplate_dashboard/sidebar");
        $this->load->view("tamplate_dashboard/topbar");
        $this->load->view("admin/detail_barang/form_detail_barang");
        $this->load->view("tamplate_dashboard/footer");
    }

    public function tambah($kd_barang)
    {
        $data['barang'] = $this->db->get_where('barang', ['kd_brg' => $kd_barang])->row_array();
        $data['detail_barang'] = $this->db->get_where('detail_barang', ['kd_brg' => $kd_barang])->result_array();
        $data['kd_barang'] = $kd_barang;

        $this->form_validation->set_rules("warna", "Warna", "required|trim", ["required" => "Warna Barang harus diisi!"]);
        $this->form_validation->set_rules("ukuran", "Ukuran", "required|trim", ["required" => "Ukuran harus dipilih!"]);
        $this->form_validation->set_rules("stok", "Stok", "required|trim", ["required" => "Stok Barang Harus diisi"]);

        if ($this->form_validation->run() == false) {

            $this->load->view("tamplate_dashboard/header", $data);
            $this->load->view("tamplate_dashboard/sidebar");
            $this->load->view("tamplate_dashboard/topbar");
            $this->load->view("admin/detail_barang/form_tambah_detail");
            $this->load->view("tamplate_dashboard/footer");
        } else {
            $ukuran = $this->input->post('ukuran');
            $warna = strtolower($this->input->post('warna'));
            $stok = $this->input->post('stok');


            $cek_ukuran_dan_warna = $this->db->get_where('detail_barang', ['kd_brg' => $kd_barang, 'ukuran' => $ukuran, 'warna' => $warna])->num_rows();


            if ($cek_ukuran_dan_warna > 0) {

                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                List Barang ' . $data['barang']['nama_brg'] . ' warna ' . $warna . ' ukuran ' . $ukuran . ' sudah ada!
              </div>');
                redirect('admin/detail_barang/tampil/' . $kd_barang);
            }


            $set = ['kd_brg' => $kd_barang, 'warna' => $warna, 'ukuran' => $ukuran, 'stok' => $stok];


            $new_name = strtolower($data['barang']['nama_brg'] . '-' . $warna . '-' . $ukuran);

            $config['upload_path'] = './assets/upload/barang';
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['file_name'] = $new_name;
            $config['remove_spaces'] = true;
            $config['overwrite'] = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $data_image = ['gambar' => $this->upload->data('file_name')];
                $set = array_merge($set, $data_image);



                $this->db->insert('detail_barang', $set);

                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                List Barang ' . $data['barang']['nama_brg'] . ' berhasil ditambahkan!
              </div>');
                redirect('admin/detail_barang/tampil/' . $kd_barang);
            } else {

                $this->session->set_flashdata('pesan_upload', '<div class="alert alert-danger" role="alert"><h4 class="alert-heading">Upload failed!</h4><p>' . $this->upload->display_errors() . '</p></div>');
                redirect('admin/detail_barang/tampil/' . $kd_barang);
            }
        }
    }

    public function edit_detail($id)
    {
        $this->db->select('barang.nama_brg,detail_barang.*');
        $this->db->from('barang');
        $this->db->join('detail_barang', 'barang.kd_brg=detail_barang.kd_brg');
        $this->db->where(['detail_barang.id_detailbrg' => $id]);
        $data['detail_barang'] = $this->db->get()->row_array();

        $this->form_validation->set_rules("warna", "Warna", "required|trim", ["required" => "Warna Barang harus diisi!"]);
        $this->form_validation->set_rules("ukuran", "Ukuran", "required|trim", ["required" => "Ukuran harus dipilih!"]);

        if ($this->form_validation->run() == false) {

            $this->load->view("tamplate_dashboard/header", $data);
            $this->load->view("tamplate_dashboard/sidebar");
            $this->load->view("tamplate_dashboard/topbar");
            $this->load->view("admin/detail_barang/form_edit_detail");
            $this->load->view("tamplate_dashboard/footer");
        } else {
            $kd_brg = $this->input->post('kd_brg');
            $warna = $this->input->post('warna');
            $ukuran = $this->input->post('ukuran');

            $gambar = $_FILES['gambar']['name'];
            $set = ['warna' => strtolower($warna), 'ukuran' => $ukuran];
            $where = ['id_detailbrg' => $id];



            // $cek_ukuran_dan_warna = $this->db->get_where('detail_barang', ['kd_brg' => $kd_brg, 'ukuran' => $ukuran, 'warna' => $warna])->num_rows();
            // // jika warna atau ukuran sama pentalin
            // if ($cek_ukuran_dan_warna) {

            //     $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            //     List Barang ' . $data['detail_brg']['nama_brg'] . ' warna ' . strtoupper($warna) . ' ukuran ' . strtoupper($ukuran) . ' sudah ada!
            //   </div>');
            //     redirect('admin/detail_barang/tampil/' . $kd_brg);
            //     die;
            // }


            if ($gambar) {

                $config['upload_path'] = './assets/upload/barang';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);
                $old_image = $data['detail_barang']['gambar'];
                unlink(FCPATH . 'assets/upload/barang/' . $old_image);
                // unlink(base_url('assets/upload/barang/' . $old_image));
                if ($this->upload->do_upload('gambar')) {


                    $data_image = ['gambar' => $this->upload->data('file_name')];
                    $set = array_merge($set, $data_image);
                    $this->db->update('detail_barang', $set, $where);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                    List Barang ' . $data['detail_barang']['nama_brg'] . ' berhasil diubah!
                  </div>');
                    redirect('admin/detail_barang/tampil/' . $kd_brg);
                }
            };

            // if ($warna !== $data['detail_barang']['warna']  or $ukuran !== $data['detail_barang']['ukuran']) {
            //     $location = './assets/upload/barang/';
            //     $old_name =  $data['detail_barang']['gambar'];
            //     $extension = explode('.', $old_name)[1];
            //     $new_name = strtolower($data['detail_barang']['nama_brg'] . '-' . $warna . '-' . $ukuran);

            //     rename($location . $old_name, $location . $new_name . "." . $extension);
            //     $data_image = ['gambar' => $new_name . "." . $extension];
            //     $set = array_merge($set, $data_image);
            //     $this->db->update('detail_barang', $set, $where);
            //     $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            //     List Barang Berhasil diubah!
            //   </div>');
            //     redirect('admin/detail_barang/tampil/' . $kd_brg);
            // }


            $this->db->update('detail_barang', $set, $where);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            List Barang Berhasil diubah!
          </div>');
            redirect('admin/detail_barang/tampil/' . $kd_brg);
        }
    }

    public function hapus_detailbrg($id_detailbrg, $kd_barang)
    {
        $this->db->delete('detail_barang', ['id_detailbrg' => $id_detailbrg]);
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert"> Detail Barang Telah di Hapus!
        </div>');
        redirect("admin/detail_barang/tampil/" . $kd_barang);
    }

    public function ajax_detail_stok()
    {
        $stok = $this->input->post('stok');
        $id = $this->input->post('id');

        $set = ['stok' => $stok];
        $where = ['id_detailbrg' => $id];

        $this->db->update('detail_barang', $set, $where);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Stok Barang Berhasil diubah!
      </div>');
    }
}
