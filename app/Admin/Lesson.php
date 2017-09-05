<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = [];//这里还声明了 是空数组！


//            hasMany就是一对多！ 一个课程对多个视屏!  就要需要这样!
    public function videos()
    {
        return $this->hasMany(Video::class);
    }
}
