<?php

namespace App\Admin\Controllers;

use App\User;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Layout\Content;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\ModelForm;

class UserController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Admin::content(function (Content $content) {

            $content->header('會員管理');
            $content->description('會員列表');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     * @return Content
     */
    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('編輯');
            $content->description('編輯會員資料');

            $content->body($this->form()->edit($id));

        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Admin::content(function (Content  $content) {

            $content->header('新增會員');
            $content->description('增加新會員');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Admin::grid(User::class, function (Grid $grid) {

            $grid->id('ID')->sortable();
            $grid->columns('name' , 'email'); 
            
            $grid->created_at();
            $grid->updated_at();

        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Admin::form(User::class, function (Form $form) {

            $form->display('id', 'ID');

            $form->text('name', '姓名');
            $form->email('email', 'E-mail');
            $form->password('password','密碼')->rules('confirmed');
            $form->password('password_confirmation','確認密碼');
            $form->ignore(['password_confirmation']);
            $form->display('created_at', '建立時間');

            $form->display('updated_at', '更新時間');
        });
        
    }
}
