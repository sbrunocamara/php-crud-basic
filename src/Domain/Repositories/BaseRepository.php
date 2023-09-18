<?php

namespace crudRepositories;

use Illuminate\Database\Query\Builder;

use Illuminate\Database\Capsule\Manager as Capsule;

class BaseRepository
{
    
    protected string $table = '';
    public Builder $db;
    public function __construct()
    {
        $this->db = Capsule::table($this->table);        
    }




}
