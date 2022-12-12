<?php

namespace Mintellity\UploadFile\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class UploadFileController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $objectClass = $data['object_type'];
        $objectKey = $data['object_id'];
        $object = $objectClass::find($objectKey);

        $object->addMedia($request->file('file'))->toMediaCollection('files');
        return redirect()->back();
    }

    /**
     * @param $mediaid
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Media $media)
    {
        $media->delete();
        return redirect()->back();
    }
}

