<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    protected $table = 'posts';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'fullname',
        'birth_place',
        'gender',
        'dob',
        'contact',
        'email',
        'address',
        'user_id'

    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function getStudents()
    {
        $records = DB::table('students')->select(
            'fullname',
            'birth_place',
            'gender',
            'dob',
            'contact',
            'email',
            'address',
            'user_id'
        )->get()->toArray();
        return $records;
    }
}
