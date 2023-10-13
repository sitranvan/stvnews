<?php

use App\Core\Controller;

class AboutController extends Controller
{
    private $data = [];
    public function __construct()
    {
    }
    public function index()
    {
        $this->data['title'] = 'Về chúng tôi';
        $this->data['view'] = $this->view(_CLENTS, 'about/index');
        return $this->layout('client_layout', $this->data);
    }
}
