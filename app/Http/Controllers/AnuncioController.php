<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\AnuncioServiceInterface;

class AnuncioController extends Controller
{
    private AnuncioServiceInterface $anuncioService;

    public function __construct(AnuncioServiceInterface $anuncioService)
    {
        $this->anuncioService = $anuncioService;
    }

    public function index()
    {
        return $this->anuncioService->index();
    }

    public function show($id)
    {
        return $this->anuncioService->show($id);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'titulo' => 'required\string\max:255',
            'descricao' => 'required|string',
            'id_profissional' => 'required|integer|exists:profissionais,id',
        
    ]);
         return $this->anuncioService->store($data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        return $this->anuncioService->update($data, $id);
    }

    public function destroy($id)
    {
        return $this->anuncioService->destroy($id);
    }

    
}
