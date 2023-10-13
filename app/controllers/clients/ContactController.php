<?php

use App\Core\Controller;

class ContactController extends Controller
{
    private $data = [];
    public function __construct()
    {
    }
    public function index()
    {
        $this->data['title'] = 'Liên hệ';
        $this->data['view'] = $this->view(_CLENTS, 'contact/index');
        return $this->layout('client_layout', $this->data);
    }
}
