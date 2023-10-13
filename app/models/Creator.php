<?php

namespace App\Model;

use App\Core\Model;

class Creator extends Model
{
    protected  $table = "creators";

    public function getCreator($condition = '')
    {
        return $this->get($this->table, 'WHERE ' . $condition);
    }
    public function checkExists($condition = '')
    {
        return $this->exists($this->table, $condition);
    }
}
