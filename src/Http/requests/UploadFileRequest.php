<?php

namespace Mintellity\UploadFile\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadFileRequest extends FormRequest
{

    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return string[]
     */
    public function rules()
    {
        return [
            'object_id' => 'required',
            'object_type' => 'required',
            'file' => 'required|file|max:10240',
        ];
    }
}
