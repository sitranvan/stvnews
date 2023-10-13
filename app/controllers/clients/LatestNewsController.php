<?php

use App\Core\Controller;

class LatestNewsController extends Controller
{
    private $data = [];
    public function __construct()
    {
    }
    public function index()
    {
        $this->data['title'] = 'Tin mới nhất';
        $this->data['view'] = $this->view(_CLENTS, 'latest_news/index');
        return $this->layout('client_layout', $this->data);
    }
}
