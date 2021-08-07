<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProfileModel');
        $this->load->model('PendidikanModel');
        $this->load->model('PekerjaanModel');
        $this->load->model('KeahlianModel');
        $this->load->model('KontakModel');
    }

    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('user/index', $data);
    }
    public function education()
    {
        $data['title'] = 'Riwayat Pendidikan';

        $data['pendidikan_list'] = $this->PendidikanModel->pendidikan_get_list();

        $this->load->view('user/education', $data, FALSE);
    }
    public function skill()
    {
        $data['title'] = 'Skills';

        $data['keahlian_list'] = $this->KeahlianModel->keahlian_get_list();

        $this->load->view('user/skill', $data, FALSE);
    }
    public function pekerjaan()
    {
        $data['title'] = 'Experience';

        $data['pekerjaan_list'] = $this->PekerjaanModel->pekerjaan_get_list();

        $this->load->view('user/pekerjaan', $data, FALSE);
    }
    public function profile()
    {
        $data['title'] = 'Profile';

        $data['profile_list'] = $this->ProfileModel->profile_get_list();

        $this->load->view('user/profile', $data, FALSE);
    }
    public function kontak()
    {
        $data['title'] = 'Kontak';

        $data['kontak_list'] = $this->KontakModel->kontak_get_list();

        $this->load->view('user/kontak', $data, FALSE);
    }
}
