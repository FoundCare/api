<?php 

namespace App\Interfaces;

interface ServiceInterface
{
    public function index();
    public function show($id);
    public function store($data);
    public function update($id);
    public function destroy($id);
}