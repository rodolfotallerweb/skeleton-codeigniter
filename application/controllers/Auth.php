<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->view('welcome_message');
    }

    public function view($page = 'login')
    {
        if (!file_exists(APPPATH.'views/Auth/'.$page.'.php')) {
            // Whoops, we don't have a page for that!
            show_404();
        }
        if ($page == 'login') {
            $config = array(
                array(
                        'field' => 'password',
                        'label' => 'Password',
                        'rules' => 'required',
                        'errors' => array(
                                'required' => 'You must provide a %s.',
                        ),
                ),
                array(
                        'field' => 'email',
                        'label' => 'Email',
                        'rules' => 'required'
                )
            );
            $this->form_validation->set_rules($config);
        }
        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('Auth/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }
}
