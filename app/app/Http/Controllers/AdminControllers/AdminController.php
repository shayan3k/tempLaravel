<?php

namespace App\Http\Controllers\AdminControllers;
use App\CIA;
use App\Department;
use App\Hard;
use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Http\Requests\UserRequest;
use App\Jobs;
use App\Network;
use App\Off;
use App\Setting;
use App\Soft;
use App\System;
use App\User;
use App\Orders;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Testing\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function dashboard()
    {
        return View('admin.dashboard.index');
    }

    public function upload_img()
    {

        if (isset($_FILES['upload']['name'])) {
            $file = $_FILES['upload']['tmp_name'];
            $file_name = $_FILES['upload']['name'];
            $file_name_array = explode(".", $file_name);
            $extension = end($file_name_array);
            $new_image_name = rand() . '.' . $extension;
            $allowed_extension = array("jpg", "gif", "png");
            if (in_array($extension, $allowed_extension)) {
                move_uploaded_file($file, 'resources/upload/ck/' . $new_image_name);
                $function_number = $_GET['CKEditorFuncNum'];
                $url = url('resources/upload/ck/'.$new_image_name);
                $message = '';
                echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($function_number, '$url', '$message');</script>";
            }


        }
    }


}
