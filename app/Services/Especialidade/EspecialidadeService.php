<?php

namespace App\Services\Especialidade;

use App\Http\Resources\EspecialidadeResource;
use App\Interfaces\Especialidade\EspecialidadeServiceInterface;
use App\Models\Especialidade;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class EspecialidadeService implements EspecialidadeServiceInterface
{
    public function index()
    {

    }

    public function show($id)
    {
        try{
            $especialidade = Especialidade::findOrFail($id);

            return new EspecialidadeResource($especialidade);

        } catch(ModelNotFoundException $e){
            $data = [
                "error" => $e->getMessage()
            ];
            throw new ModelNotFoundException($data['error']);
        }
    }

    public function store($data)
    {   
        DB::beginTransaction();
        try{
            $especialidade = Especialidade::create([
                "especialidade" => "COREN",
                "comprovante" => "259875874"
            ]);
            DB::commit();

            return new EspecialidadeResource($especialidade);
        } catch(Exception $e){
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function update($data, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
