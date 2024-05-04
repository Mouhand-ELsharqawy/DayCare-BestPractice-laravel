<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\FemaleParentRequest;

interface FemaleParentInterface {
    public function getall();
    public function create( FemaleParentRequest $request );
    public function getone( string $id );
    public function update( FemaleParentRequest $request, string $id);
    public function delete( string $id );
}