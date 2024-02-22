<?php
namespace App\Solid;

use Illuminate\Support\Facades\DB;

class SalesReport
{
    public function export($startDate, $endDate, $format ='CSV')
    {
        return DB::table('contact')
            ->whereBetween('create_at',[$startDate,$endDate])
            ->latest()
            ->get();

    }
}
