<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Article';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());
        $grid->column('id', __('Id'));
        $grid->column('categories.name', __('Category Name'));
        $grid->column('cover', __('Cover'))->image('https://www.pexels.com',100,100);
        $grid->column('author.name', __('Author Name'));
        $grid->column('is_top', __('Is Top'))->display(function ($released) {
            return $released == 1 ? '是' : '否';
        })->label([
            1 => 'success',
            0 => 'default',
        ]);;
        $grid->column('comments', __('Comments'));
        $grid->column('view', __('View'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Article::findOrFail($id));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Article());
        $form->text('title', '文章标题');
        $form->select('category','选择分类')->options([1 => 'foo', 2 => 'bar', 'val' => 'Option name']);
        $form->text('title', '文章标题');
        $form->editor('content');

        return $form;
    }
}
