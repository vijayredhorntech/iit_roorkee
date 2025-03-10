<?php

namespace App\Contracts;

interface InstrumentRepositoryInterface
{
    public function all(); // Get all records
    public function find($id); // Find record by ID
    public function createInstrument(array $data); // Create a new record
    public function update($id, array $data); // Update a record
    public function delete($id); // Delete a record
}
