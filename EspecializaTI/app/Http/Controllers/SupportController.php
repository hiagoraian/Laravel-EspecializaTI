<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
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


    public function store(StoreUpdateSupportRequest $request, Support $support){
        
        $data = $request->validated();
        $data['status'] = 'a';

        $support->create($data);

        return redirect()->route('index');
    }

    public function edit(Support $support, string|int $id){
        
        if(!$support = $support->where('id', $id)->first()){
            return redirect()->route('index');
        }

        return view('edit', compact('support'));
    }

    public function update(string $id, StoreUpdateSupportRequest $request, Support $support){
 
        if(!$support = $support->find($id)){
            return back();
        }

        $support->update($request->validated());

        return redirect()->route('index');
    }

    public function destroy (string|int $id){
        if(!$support = Support::find($id)){
            return back();
        }

        $support->delete();

        return redirect()->route('index');
    }
}