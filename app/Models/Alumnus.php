<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnus extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getAll(array $filter, int $itemPerPage = 0, string $sort = ''): object
    {
        $alumni= $this->query();

        if (!empty($filter['nama'])) {
            $alumni->where('nama', 'LIKE', '%'.$filter['nama'].'%');
        }

        if (!empty($filter['email'])) {
            $alumni->where('email', 'LIKE', '%'.$filter['email'].'%');
        }

        if (!empty($filter['angkatan'])) {
            $alumni->where('angkatan', 'LIKE', '%'.$filter['angkatan'].'%');
        }

        if (!empty($filter['id'])) {
            $alumni->where('id', 'LIKE', '%'.$filter['id'].'%');
        }

        $sort = $sort ?: 'id DESC';
        $alumni->orderByRaw($sort);
        $itemPerPage = $itemPerPage > 0 ? $itemPerPage : false;
        
        return $alumni->paginate($itemPerPage)->appends('sort', $sort);
    }
}
