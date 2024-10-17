<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contact()
    {
        return view(
            'contact',
            [
                'title' => 'Contact',
                'nama' => 'Aldiansyah Fayruz',
                'alamat' => 'Karangmalang Rt.1 Rw.1 Kec.Gebog Kab.Kudus ',
                'linkedin_link' => 'https://www.linkedin.com/in/aldiansyah-fayruz-74522018b/',
                'repository_link' => 'https://github.com/FayruzAldi'
            ]
        );
    }
}
