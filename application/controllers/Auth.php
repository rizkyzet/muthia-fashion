<?php
class Auth extends CI_Controller
{
    // proses login
    public function index()
    {
        $data['title'] = 'User Login';
        $this->form_validation->set_rules("email", "e-mail", "required", [
            'required' => 'Email Belum Diisi'
        ]);
        $this->form_validation->set_rules("kata_sandi", "kata sandi", "required", [
            'required' => 'Kata Sandi Belum Diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view("template/header", $data);
            $this->load->view("auth/login");
            $this->load->view("template/footer");
        } else {
            $email = $this->input->post("email");
            $kata_sandi = $this->input->post("kata_sandi");
            // verifikasi email
            $user = $this->db->get_where("user", ["email" => $email]);
            if ($user->num_rows() > 0) {

                $dbuser = $user->row_array();
                //verifikasi password
                if (password_verify($kata_sandi, $dbuser['password'])) {
                    if ($dbuser['active'] == 1) {
                        if ($dbuser['role_id'] == 1) {
                            // buat/nyimpen session
                            $data_session = [
                                'email' => $dbuser['email'],
                                'role_id' => $dbuser['role_id']
                            ];
                            $this->session->set_userdata($data_session);
                            redirect('Beranda');
                        } elseif ($dbuser['role_id'] == 2) {
                            $data_session = [
                                'email' => $dbuser['email'],
                                'role_id' => $dbuser['role_id']
                            ];
                            $this->session->set_userdata($data_session);
                            redirect('admin');
                        } else {
                            $data_session = [
                                'email' => $dbuser['email'],
                                'role_id' => $dbuser['role_id']
                            ];
                            $this->session->set_userdata($data_session);
                            redirect('beranda');
                        }
                    } else {
                        $this->session->set_flashdata("pesan", '<div class="alert alert-danger" role="alert">
                    akun belum terverifikasi
                  </div>');
                        redirect("auth");
                    }
                } else {
                    $this->session->set_flashdata("pesan", '<div class="alert alert-danger" role="alert">
                kata sandi yang anda masukkan salah!
              </div>');
                    redirect("auth");
                }
            } else {
                $this->session->set_flashdata("pesan", '<div class="alert alert-danger" role="alert">
                Akun belum terdaftar!
              </div>');
                redirect("auth");
            }
        }
    }

    // proses logout
    public function logout()
    {
        $this->session->sess_destroy();

        redirect('auth');
    }
    // register
    public function register()
    {
        $data['title'] = 'User Register';
        $data["provinsi"] = $this->db->get("provinsi")->result_array();
        $data["kota"] = $this->db->get("kota")->result_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama Harus Diisi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email Harus Diisi',
            'valid_email' => 'Email Tidak Valid',
            'is_unique' => 'Email Sudah Pernah Terdaftar'
        ]);
        $this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'required|trim|min_length[6]|matches[kata_sandi2]', [
            'required' => 'Kata Sandi Harus Diisi',
            'min_length' => 'Kata Sandi Terlalu Pendek',
            'matches' => 'Kata Sandi Tidak Cocok'
        ]);
        $this->form_validation->set_rules('kata_sandi2', 'Kata Sandi', 'required|trim|matches[kata_sandi]');
        $this->form_validation->set_rules('no_tlp', 'Nomor Telepon', 'required|trim|numeric|max_length[13]', [
            'required' => 'Nomor Telepon Harus Diisi',
            'numeric' => 'Harus Angka',
            'max_length' => 'Melebihi 13 Angka'
        ]);
        $this->form_validation->set_rules('kota', 'Kota', 'required|trim', [
            'required' => 'Kota Harus Diisi'
        ]);
        $this->form_validation->set_rules('kode_pos', 'kode pos', 'required|trim|numeric', [
            'required' => 'Kode Pos Harus Diisi',
            'numeric' => 'Kode Pos Harus Angka'
        ]);
        $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
            'required' => 'Alamat Harus Diisi'
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view("template/header", $data);
            $this->load->view("auth/register", $data);
            $this->load->view("template/footer");
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_tlp' => htmlspecialchars($this->input->post('no_tlp', true)),
                'id_kota' => htmlspecialchars($this->input->post('kota', true)),
                'kode_pos' => htmlspecialchars($this->input->post('kode_pos', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'image' => 'no_image.png',
                'password' => password_hash($this->input->post('kata_sandi'), PASSWORD_DEFAULT),
                'role_id' => 3,
                'active' => 0,
                'tanggal_dibuat' => time()
            ];
            $token = base64_encode(rand());
            $data_token = [
                'email' => $this->input->post('email'),
                'token' => $token,
                'tanggal_dibuat' => time()
            ];
            $config = [
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => 'rizkyweb121@gmail.com',
                'smtp_pass' => 'hackgulink121',
                'smtp_port' => 465,
                'mailtype' => 'html',
                'charset' => 'utf-8',
                'newline' => "\r\n"
            ];
            $this->load->library('email', $config);
            $this->email->initialize($config);
            $this->email->from('rizkyweb121@gmail.com', 'Eka Nur Hajijah');

            $this->email->to($data['email']);
            $this->email->subject('verifikasi Akun');
            $message = 'Klik link ini untuk verifikasi akun anda : <a href="' . base_url('auth/verify_account?') . 'email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Aktifasi</a>';
            $this->email->message($message);

            if ($this->email->send()) {
                $this->db->insert('user', $data);
                $this->db->insert('user_token', $data_token);
                $this->session->set_flashdata("pesan", '<div class="alert alert-danger" role="alert">
                Selamat Akun Anda Berhasil Login!! Silahkan Cek Email Untuk Aktivasi
              </div>');
                redirect("auth");
            } else {
                echo $this->email->print_debugger();
                die;
            }
        }
    }
    public function verify_account()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user =  $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['tanggal_dibuat'] < (60 * 60 * 24)) {
                    $this->db->update('user', ['active ' => 1], ['email' => $email]);
                    $this->db->delete('user_token', ['token' => $token]);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  Aktifasi berhasil, silahkan login!
                   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                   </button>
                 </div>');
                    redirect('auth');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Aktifasi gagal, token expired!
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                     </button>
                   </div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Aktifasi gagal, token tidak ditemukan!
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Aktifasi gagal, akun tidak ditemukan!
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>');
            redirect('auth');
        }
    }

    public function lupasandi()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email Harus diisi']);

        if ($this->form_validation->run() == false) {
            $this->load->view("template/header");
            $this->load->view("auth/lupasandi");
            $this->load->view("template/footer");
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email])->row_array();
            if ($user) {
                $token = base64_encode(random_bytes(32));
                $data_token = [
                    'email' => $email,
                    'token' => $token,
                    'tanggal_dibuat' => time()
                ];
                $this->db->insert('user_token', $data_token);
                $config = [
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_user' => 'rizkyweb121@gmail.com',
                    'smtp_pass' => 'hackgulink121',
                    'smtp_port' => 465,
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'newline' => "\r\n"
                ];
                $this->load->library('email', $config);
                $this->email->initialize($config);
                $this->email->from('rizkyweb121@gmail.com', 'Eka Nur Hajijah');

                $this->email->to($email);
                $this->email->subject('Reset Password');
                $message = 'Klik link ini untuk reset password : <a href="' . base_url('auth/verify_lupasandi?email=') . $email . '&token=' . urlencode($token) . '">Reset Password</a>';
                $this->email->message($message);

                if ($this->email->send()) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Silahkan cek email anda untuk reset password!
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>');
                    redirect('auth');
                } else {
                    echo $this->email->print_debugger();
                    die;
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Email belum terdaftar!
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>');
                redirect('auth/lupasandi');
            }
        }
    }

    public function verify_lupasandi()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email, 'active' => 1])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                redirect('auth/reset_katasandi');
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Reset password gagal, token tidak cocok!
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Reset password gagal, email belum terdaftar atau teraktifasi!
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>');
            redirect('auth');
        }
    }

    public function reset_katasandi()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        };
        $data['email'] = $this->session->userdata('reset_email');
        $this->form_validation->set_rules('kata_sandi', 'Kata Sandi', 'required', ['required' => 'Kata Sandi Harus Diisi!', 'min_legth[6]' => 'Kata Sandi Terlalu Pendek']);
        $this->form_validation->set_rules('kata_sandi2', 'Konfirmasi Kata Sandi', 'required|trim|matches[kata_sandi]', ['matches' => 'Konfirmasi Kata Sandi Tidak Sama!', 'required' => 'Konfirmasi Kata Sandi Harus Diisi!']);
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header');
            $this->load->view('auth/reset_katasandi');
            $this->load->view('template/footer');
        } else {
            $kata_sandi = $this->input->post('kata_sandi');
            $email = $this->session->userdata('reset_email');

            $where = ['email' => $email];
            $set = ['password' => password_hash($kata_sandi, PASSWORD_DEFAULT)];

            $this->db->update('user', $set, $where);
            $this->db->delete('user_token', ['email' => $email]);
            $this->session->unset_userdata('reset_email');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        Reset password sukses, silahkan login!
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>');
            redirect('auth');
        }
    }

    public function ajax_provinsi()
    {
        $id_provinsi = $this->input->post('id_provinsi');

        $data['kota'] = $this->db->get_where('kota', ['id_provinsi' => $id_provinsi])->result_array();
        $this->load->view('admin/akun/ajax_provinsi', $data);
    }
}
