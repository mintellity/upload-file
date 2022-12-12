<?php

namespace Mintellity\UploadFile\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Mintellity\UploadFile\Http\Requests\UploadFileRequest;

class UploadFileController extends Controller
{
    /**
     * @param UploadFileRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UploadFileRequest $request)
    {
        $data = $request->all();
        $objectClass = $data['object_type'];
        $objectKey = $data['object_id'];
        $object = $objectClass::find($objectKey);

        $object->addMedia($request->file('file'))->toMediaCollection('files');
        return redirect()->back();
    }

    /**
     * @param string $media_id
     * @return RedirectResponse
     */
    public function destroy($media_id)
    {
        $mediaClass = config('media-library.media_model');
        $media = $mediaClass::find($media_id);

        $media->delete();
        return redirect()->back();
    }
}
