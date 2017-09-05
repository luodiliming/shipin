<?php

namespace App\Admin;
use App\User;//它命名空间是大写App    use引的时候就需要大写！


class AdminLoginModel extends User//继承User  的原因是  它会自动验证！
{
    protected $rememberTokenName = '';//  所有的字段都允许填充内容  在这声明下
}
