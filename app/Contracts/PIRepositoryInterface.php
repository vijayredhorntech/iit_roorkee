<?php

namespace App\Contracts;

use App\Models\User;

interface PIRepositoryInterface
{
    public function all(); // Get all PI users
    public function find($id); // Find PI by ID
    public function create(array $data); // Create new PI
    public function update($id, array $data); // Update PI details
    public function delete($id); // Delete PI
}
