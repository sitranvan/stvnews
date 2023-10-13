<?php

use App\Core\Controller;

class CategoryController extends Controller
{
    private $data = [];
    public function __construct()
    {
    }
    public function index()
    {
        $this->data['title'] = 'Danh mục';
        $this->data['view'] = $this->view(_CLENTS, 'categories/index');
        return $this->layout('client_layout', $this->data);
    }
}
