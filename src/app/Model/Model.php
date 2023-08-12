<?php

    namespace app\Model;

    use App\DB;

    class Model
    {
        protected DB $db;

        public function __construct()
        {
            $this->db = new DB();
        }
    }