<?php

namespace App\Http\Controllers;

use App\Services\Sanitize;
use Illuminate\Http\Request;


class TesteController extends Controller
{
    public function testSlug (Request $request)
    {
        $produto = 'viagra de teste';

        $dono = 'Harlan Victor'; 
        $produto = Sanitize::slugCreate($produto);
        $dono = Sanitize::slugCreate($dono);

        $teste2=$produto.'-'.$dono;

        return view('general.teste', compact('teste2'));
    }
    
}