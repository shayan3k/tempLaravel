<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagesRequest extends FormRequest
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

            'title'=>'required|unique:pages,title,'.$this->getSegmentFromEnd().',id',


        ];
    }

    public function attributes()

    {
        return [
        'title'=> 'عنوان برگه',


        ];

    }



    private function getSegmentFromEnd($position_from_end=1)
    {
        $segment =$this->segments();
        return $segment[sizeof($segment) - $position_from_end];
    }

}
