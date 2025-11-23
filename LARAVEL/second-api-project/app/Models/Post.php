<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getAllPostsWithAuthorsQueryBuilder(){
        return  DB::table('posts')->join('users','posts.user_id', '=','users.id')
            ->select('posts.*','users.name as author')->get();
    }
}
