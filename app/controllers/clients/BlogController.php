<?php

use App\Core\Controller;

class BlogController extends Controller
{
    private $data = [];
    public function __construct()
    {
    }
    public function index()
    {
        $this->data['title'] = 'Blog';
        $this->data['view'] = $this->view(_CLENTS, 'blog/index');
        return $this->layout('client_layout', $this->data);
    }
}
