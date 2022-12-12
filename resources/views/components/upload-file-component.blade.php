<div>
    <div class="border-bottom p-2 mb-5">
        <h3 class="box-title"><i class="fa fa-cloud-upload-alt"></i> Upload Files</h3>
    </div>
    <div class="box-body">
        <div class="bg-gray-light">
            <form class="form-inline" method="POST" action="{{route('uploadFile.store')}}"
                  enctype="multipart/form-data">
                <input type="hidden" value="{{ csrf_token() }}" name="_token">
                <input type="hidden" name="object_id" value="{{ $object->getKey() }}">
                <input type="hidden" name="object_type" value="{{ get_class($object) }}">

                <div class="form-group border-dashed mb-6 p-5 d-flex justify-content-center align-items-center">
                    <input type="file" class="form-control-file" name="file">
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-cloud-upload-alt"></i> Upload</button>
                </div>
            </form>
        </div>
        <table class="table table-hover">
            <tbody>
            <tr>
                <th>Type</th>
                <th>Path</th>
                <th>Link</th>
                <th>Size</th>
                <th>
                    <div class="pull-right">Aktionen</div>
                </th>
            </tr>
            @forelse($object->getMedia('files') as $file)
                @if(!is_null($file))
                    <tr>
                        <td>{{$file->mime_type}}</td>
                        <td><label>{{$file->getFullUrl()}}</label></td>
                        <td><a target="_blank" href="{{$file->getFullUrl()}}">Open</a></td>
                        <td>{{ round($file->size / 1000) }}&nbsp;KB</td>
                        <td>
                            <a class="btn btn-sm btn-icon btn-light-danger btn-active-light-primary"
                               href="{{route('uploadFile.destroy', $file)}}" data-remove="tr">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="4">Keine Anhänge gefunden</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
