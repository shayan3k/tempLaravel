<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpertsRequest extends FormRequest
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
        if($this->isMethod('post'))
        {
            $array =  [
                'name'=>'required|unique:experts,name,'.$this->getSegmentFromEnd().',id',
                'img'=>'required|image|max:2048',
                'role'=>'required'
            ];
        }else{
            $array =  [
                'name'=>'required|unique:experts,name,'.$this->getSegmentFromEnd().',id',
                'img'=>'image|max:2048',
                'role'=>'required'
            ];
        }

        return $array;
    }

    public function attributes()

    {
        return [
            'name'=>'نام و نام خانوادگی',
            'img'=>'تصویر کارشناس ',
            'role'=>'نقش کارشناس'
        ];

    }
    private function getSegmentFromEnd($position_from_end=1)
    {
        $segment =$this->segments();
        return $segment[sizeof($segment) - $position_from_end];
    }

}
