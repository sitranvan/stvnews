<?php

use App\Core\Controller;

class ElementController extends Controller
{
    private $data = [];
    public function __construct()
    {
    }
    public function index()
    {
        $this->data['title'] = 'Các phần tử';
        $this->data['view'] = $this->view(_CLENTS, 'element/index');
        return $this->layout('client_layout', $this->data);
    }
}
