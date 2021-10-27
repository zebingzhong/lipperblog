<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article', function (Blueprint $table) {
            $table->increments('id')->comment('ID');
            $table->unsignedTinyInteger('category_id')->default(0)->comment('分类id');
            $table->string('title',100)->comment('文章标题');
            $table->string('description')->default('')->comment('文章描述');
            $table->string('cover')->default('')->comment('封面图');
            $table->string('keywords')->default('')->comment('文章关键字');
            $table->MediumText('content')->comment('文章内容');
            $table->MediumText('html')->comment('文章内容转html');
            $table->string('video')->default('')->comment('视频链接');
            $table->integer('author_id')->default(0)->comment('作者id');
            $table->unsignedTinyInteger('is_top')->default(0)->comment('是否置顶 1是 0否');
            $table->integer('comments')->comment('文章评论数');
            $table->integer('view')->comment('文章观看数');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
