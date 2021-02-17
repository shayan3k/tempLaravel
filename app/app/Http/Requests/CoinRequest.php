<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoinRequest extends FormRequest
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
                'title'=>'required|unique:service,title,'.$this->getSegmentFromEnd().',id',
                'img'=>'required|image|max:2048'
            ];
        }else{
            $array =  [
                'title'=>'required|unique:service,title,'.$this->getSegmentFromEnd().',id',
                'img'=>'image|max:2048'
            ];
        }

        return $array;

    }

    public function attributes()

    {
        return [
            'title'=>'عنوان ارز',
            'img'=>'تصویر ارز '
        ];

    }
    private function getSegmentFromEnd($position_from_end=1)
    {
        $segment =$this->segments();
        return $segment[sizeof($segment) - $position_from_end];
    }


}
