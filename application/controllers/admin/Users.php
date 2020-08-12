<?php
class Users extends CI_Controller
{

    public function index()
    {
        $this->db->select();
        $this->db->from('user');
        $this->db->join('kota', 'user.id_kota=kota.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi=provinsi.id_provinsi');
        $this->db->where('role_id', 3);
        $data['users'] = $this->db->get()->result_array();

        $this->load->view("tamplate_dashboard/header", $data);
        $this->load->view("tamplate_dashboard/sidebar");
        $this->load->view("tamplate_dashboard/topbar");
        $this->load->view("admin/users/form_users");
        $this->load->view("tamplate_dashboard/footer");
    }

    public function edit_users($id)
    {
        $this->db->select();
        $this->db->from('user');
        $this->db->join('kota', 'user.id_kota=kota.id_kota');
        $this->db->join('provinsi', 'kota.id_provinsi=provinsi.id_provinsi');
        $this->db->where(['user.id' => $id, 'user.role_id' => 3]);
        $data['users'] = $this->db->get()->row_array();

        $data['provinsi'] = $this->db->get('provinsi')->result_array();

        foreach ($data['provinsi'] as $index => $p) {

            $kota = $this->db->get_where('kota', ['id_provinsi' => $p['id_provinsi']])->result_array();
            $tampung_kota[$index] = $kota;
        }
        $data['kota'] = $tampung_kota;




        $this->load->view("tamplate_dashboard/header", $data);
        $this->load->view("tamplate_dashboard/sidebar");
        $this->load->view("tamplate_dashboard/topbar");
        $this->load->view("admin/users/form_edit_users");
        $this->load->view("tamplate_dashboard/footer");
    }
}
