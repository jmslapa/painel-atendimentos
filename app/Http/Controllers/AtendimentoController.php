<?php

namespace App\Http\Controllers;

use App\Atendimento;
use App\Http\Requests\AtendimentoStoreUpdateRequest;
use App\Tipo;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atendimentos = Atendimento::paginate(25);
        return view('atendimentos.index', compact('atendimentos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos = Tipo::all();
        return view('atendimentos.create', compact('tipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\AtendimentoStoreUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AtendimentoStoreUpdateRequest $request)
    {
        try {
            $data = $request->all();
            $data['user_id'] = auth()->user()->id;
            Atendimento::create($data);
            $responseData = ['message' => 'Atendimento registrado com sucesso!', 'type' => 'success'];
            return view('atendimentos.response', compact('responseData'));
        }catch(\Exception $e) {
            $responseData = ['message' => $e->getMessage(), 'type' => 'danger'];
            return view('atendimentos.response', compact('responseData'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $atendimento = Atendimento::findOrFail($id);
        return view('atendimentos.show', compact('atendimento'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipos = Tipo::all();
        $atendimento = Atendimento::findOrFail($id);
        return view('atendimentos.edit', compact('atendimento', 'tipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\AtendimentoStoreUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AtendimentoStoreUpdateRequest $request, $id)
    {
        $atendimento = Atendimento::findOrFail($id);
        try {
            $data = $request->all();
            $atendimento->update($data);
            $responseData = ['message' => 'Atendimento atualizado com sucesso!', 'type' => 'success'];
            return view('atendimentos.response', compact('responseData'));
        }catch(\Exception $e) {
            $responseData = ['message' => $e->getMessage(), 'type' => 'danger'];
            return view('atendimentos.response', compact('responseData'));
        }
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }

    public function search(Request $request) {
        $filter = $request->search ?? null;
        $atendimentos = Atendimento::where(function($query) use($filter) {
            if($filter) {
                $query->where('cliente', 'like', "%$filter%")
                      ->orWhereHas('tipo', function($query) use($filter) {
                          $query->where('name', 'like', "%$filter%");
                      })->orWhereHas('user', function($query) use($filter) {
                          $query->where('name', 'like', "%$filter%");
                      });
            }
        })->paginate(25);        
        return view('atendimentos.index', compact('atendimentos', 'filter'));
    }
}
