<?php

namespace Mintellity\UploadFile\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\RedirectResponse;
use Mintellity\UploadFile\Http\Requests\UploadFileRequest;

class UploadFileController extends Controller
{
    /**
     * @param UploadFileRequest $request
     * @return RedirectResponse
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
    public function destroy(string $media_id)
    {
        $mediaClass = config('media-library.media_model');
        $media = $mediaClass::find($media_id);

        $media->delete();
        return redirect()->back();
    }
}
