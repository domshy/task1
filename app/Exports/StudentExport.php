<?php

namespace App\Exports;

use App\Post;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection, WithHeadings
{

    public function headings(): array
    {
        return [
            'fullname',
            'birth_place',
            'gender',
            'dob',
            'contact',
            'email',
            'address'
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // GET THE DATA THAT WILL RETURN IN EXCEL
        return Post::all(
            'fullname',
            'birth_place',
            'gender',
            'dob',
            'contact',
            'email',
            'address'
        );
    }
}
