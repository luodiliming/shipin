<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTablel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');//id
            $table->timestamps();
            $table->string('ltitle');//名字
            $table->string('introduce');//介绍
            $table->string('pic');
            $table->string('author');
            $table->string('tag_ids');//标签的id关联  前面是tag表的名字 后面是它的id  lavarel 会自动管理关联到
            $table->enum('iscommond', [1, 0])->default(0);//枚举就是一一列举，将所有的情况都列举出来，那么取值的时候只能是这几种情况的一种，不能是别的。
            $table->enum('ishot', [1, 0])->default(0);//枚举就是一一列举，将所有的情况都列举出来，那么取值的时候只能是这几种情况的一种，不能是别的。
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}
