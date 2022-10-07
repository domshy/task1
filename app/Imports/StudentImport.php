<?php

namespace App\Imports;

use App\Student;
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
        return new Student([
            "fullname" => $row["fullname"],
            "birth_place" => $row["birth_place"],
            "gender" => $row["gender"],
            "dob" => $row["dob"],
            "contact" => $row["contact"],
            "email" => $row["email"],
            "address" => $row["address"],
        ]);
    }
}
