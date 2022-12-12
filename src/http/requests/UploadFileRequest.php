<?php

namespace Mintellity\UploadFile\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadFileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'object_id' => 'required',
            'object_type' => 'required',
            'file' => 'required|file|max:10240',
        ];
    }
}
