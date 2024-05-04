<?php

namespace App\Repositories\Interfaces;

use App\Http\Requests\ChildRequest;

interface ChildInterface {
        public function getall();
        public function create( ChildRequest $request );
        public function getone( string $id );
        public function update( ChildRequest $request, string $id);
        public function delete( string $id );
}