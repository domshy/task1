<?php

namespace App\Imports;

use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // $user = auth()->user();  
        // $user = Auth::user()->id;
        return
            new Post([
                'fullname' => $row['fullname'],
                'birth_place' => $row['birth_place'],
                'gender' => $row['gender'],
                'dob' => $row['dob'],
                'contact' => $row['contact'],
                'email' => $row['email'],
                'address' => $row['address'],
                'user_id' => Auth::user()->id,
            ]);
    }
    function rules(): array
    {
        return [
            '*.email' => ['email', 'unique:students,email'],
        ];
    }
}
