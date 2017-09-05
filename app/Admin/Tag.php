<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];//  所有的字段都允许填充内容  在这声明下
}
