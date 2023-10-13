<?php

namespace App\Model;

use App\Core\Model;

class CreatorSession extends Model
{
    private $table = 'creator_sessions';

    public function insertCreatorSession($data = [])
    {
        return $this->insert($this->table, $data);
    }
    public function checkExists($condition = '')
    {

        return $this->exists($this->table, $condition);
    }
    public function deleteCreatorSession($condition = '')
    {
        return $this->delete($this->table, $condition);
    }
}
