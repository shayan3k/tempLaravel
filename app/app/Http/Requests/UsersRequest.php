<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'username'=>'required|numeric|digits:11|unique:users,username,'.$this->getSegmentFromEnd().',id',
            'fname'=>'required',
            'lname'=>'required',
            'password'=>'required'

        ];
    }

    public function attributes()

    {
        return [
            'username'=>'شماره همراه',
            'fname'=>'نام',
            'lname'=>'نام خانوادگی',
            'password'=>'رمز عبور'

        ];

    }



    private function getSegmentFromEnd($position_from_end=1)
    {
        $segment =$this->segments();
        return $segment[sizeof($segment) - $position_from_end];
    }

}
