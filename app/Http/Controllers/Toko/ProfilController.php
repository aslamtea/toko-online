<?php

namespace App\Http\Controllers\Toko;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->sub_menu['m_url'] = 'profil';
    }
    public function index()
    {
        return view('toko.profil.index', $this->sub_menu);
    }
}
