<?php 
namespace App\Repositories;

use App\Models\BookingInstrument;

interface BookingInstrumentRepositoryInterface
{
    public function create(array $data): BookingInstrument;
    public function getAll(string $type);
    public function findById(int $id): ?BookingInstrument;
    public function getInstrumentsById(int $userId, string $type);
    public function getBothBooking();
}
