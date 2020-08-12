d<?php
    class Kategori extends CI_Controller
    {

        public function barang($kd_kategori)
        {

            // lOAD LIBRARY
            $this->load->library('pagination');

            // PAGINATION
            $config['base_url'] = base_url('kategori/barang/' . $kd_kategori);

            // CONFIG
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->where('kd_kategori', $kd_kategori);
            $config['total_rows'] = $this->db->count_all_results();
            $config['per_page'] = 3;
            $data['total_rows'] = $config['total_rows'];

            // INITIALIZE


            // STYLING PAGINATION
            $config['num_links'] = 5;

            // STYLING
            $config['full_tag_open'] = '<div class="page_nav">
        <ul class="d-flex flex-row align-items-start justify-content-center">';
            $config['full_tag_close'] = '</ul>
 </div>';

            $config['first_link'] = 'First';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';

            $config['last_link'] = 'Last';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';

            $config['next_link'] = '&raquo';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';

            $config['prev_link'] = '&laquo';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';

            $config['cur_tag_open'] = '<li class="active"><a href="#">';
            $config['cur_tag_close'] = '</a></li>';

            $config['num_tag_open'] = '<li ><a href="#">';
            $config['num_tag_close'] = '</a></li>';

            // $config['attributes'] = array('class' => 'page-link');


            $this->pagination->initialize($config);
            $data['start'] = $this->uri->segment(4);
            $this->db->select('*');
            $this->db->from('barang');
            $this->db->where(['kd_kategori' => $kd_kategori]);
            $this->db->limit($config['per_page'], $data['start']);
            $barang = $this->db->get()->result_array();
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


            $this->load->view('template_mutia/header_kategori', $data);
            $this->load->view('template_mutia/navbar_new');
            $this->load->view('mutia_fashion/kategori/form_kategori_beranda');
            $this->load->view('template_mutia/footer_kategori');
        }
    }
