<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Experiencia\ExperienciaRequest;
use App\Http\Resources\Experiencia\ExperienciaResource;
use App\Interfaces\Experiencia\ExperienciaInterfaceService;
use App\Models\Experiencia;
use App\Models\Profissional;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExperienciaController extends Controller
{
    public function __construct(
        private ExperienciaInterfaceService $experienciaService
    )
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->experienciaService->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExperienciaRequest $request, string $id)
    {
        DB::beginTransaction();

        try {
            $profissional = User::join('profissionais', 'profissionais.id_usuario', '=', 'users.id')
                            ->where('users.id', $id)
                            ->first();

            $experiencia = Experiencia::create([
                'empresa' => $request->input('empresa'),
                'cargo' => $request->input('cargo'),
                'data_inicio' => $request->input('data_inicio'),
                'data_fim' => $request->input('data_fim') ?? null,
                'id_profissional' => $profissional->id_profissional,
                'descricao' => $request->input('descricao')
            ]);

            DB::commit();

            $data = [
                'status' => true,
                'message' => "Criado com sucesso!",
                'data' => $experiencia
            ];

            return response()->json(new ExperienciaResource($data), 201);

        } catch(Exception $e){
            DB::rollBack();
            $data = [
                'status' => false,
                'message' => 'Algum erro ocorreu no servidor!',
                'error' => $e->getMessage()
            ];

            return response()->json(new ExperienciaResource($data), 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->experienciaService->show($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->experienciaService->destroy($id);
    }
}
