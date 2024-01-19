<?php

namespace App\Classes;

class QueryParam {
    public string|int $per_page;
    public string|int $page;
    public array $filter;
    
    public function __construct(string|int|null $per_page = 15, string|int|null $page = 1, array $filter = [])
    {
        $this->per_page = $per_page ?? 15;
        $this->page = $page ?? 1;
        $this->filter = $filter;
    }
}