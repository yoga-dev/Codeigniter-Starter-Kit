<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;

class MY_Model extends Eloquent
{
    public function __construct()
    {
        parent::__construct();
    }
}
