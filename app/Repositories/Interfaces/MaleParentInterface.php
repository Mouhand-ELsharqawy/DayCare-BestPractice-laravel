<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\MaleParentRequest;

interface MaleParentInterface {
    public function getall();
    public function create( MaleParentRequest $request );
    public function getone( string $id );
    public function update( MaleParentRequest $request, string $id);
    public function delete( string $id );
}