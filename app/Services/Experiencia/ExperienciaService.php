<?php

namespace App\Services\Experiencia;

use App\Interfaces\Experiencia\ExperienciaInterfaceService;
use App\Models\Experiencia;

class ExperienciaService implements ExperienciaInterfaceService
{
    public function index()
    {
        return Experiencia::all();
    }

    public function show($id)
    {
        
    }

    public function store($data)
    {
        
    }

    public function update($data, $id)
    {

    }

    public function destroy($id)
    {

    }
}