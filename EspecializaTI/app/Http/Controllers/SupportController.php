<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support){

        $supports = $support->all();

        return view('index', compact('supports'));
    }

    public function show(string|int $id){
        
        if(!$support = Support::find($id))
            return back();

        return view('show', compact('support'));
    }

    public function create(){
        
        return view('create');
    }

    public function store(Request $request, Support $support){
        
        $data = $request->all();
        $data['status'] = 'a';

        $support->create($data);

        return redirect()->route('index');
    }
}