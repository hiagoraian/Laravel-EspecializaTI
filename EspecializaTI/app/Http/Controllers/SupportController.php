<?php

namespace App\Http\Controllers;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupportRequest;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{   
    public function __construct(
        protected SupportService $service
    )
    {}

    public function index(Request $request){

        $supports = $this->service->paginate(page: $request->get('page', 1) , totalPerPage: $request->get('per_page', 10), filter:$request->filter,);

        return view('index', compact('supports'));
    }

    public function show(int $id){
        
        if(!$support = $this->service->findOne($id))
            return back();

        return view('show', compact('support'));
    }

    public function create(){
        
        return view('create');
    }


    public function store(StoreUpdateSupportRequest $request){
        
        $this->service->new(CreateSupportDTO::makeFromRequest($request));

        return redirect()->route('index');
    }

    public function edit(string $id){
        
        if(!$support = $this->service->findOne($id)){
            return redirect()->route('index');
        }

        return view('edit', compact('support'));
    }

    public function update(StoreUpdateSupportRequest $request){
        
        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));

        if(!$support){
            return back();
        }

        return redirect()->route('index');
        
    }

    public function destroy (string $id){
        
        $this->service->delete($id);

        return redirect()->route('index');
    }
}