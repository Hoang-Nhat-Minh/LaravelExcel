<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromQuery, WithHeadings
{
    public function query()
    {
        return User::query()->select('name', 'email', 'created_at');
    }

    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Created At',
        ];
    }
}
