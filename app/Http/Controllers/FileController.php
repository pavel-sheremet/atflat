<?php

namespace App\Http\Controllers;

use App\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\File as FileResource;
use App\Http\Requests\ImageRequest;
use Intervention\Image\ImageManagerStatic as Image;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    public function upload (ImageRequest $request)
    {

        $file = $request->file('file');
        $path = $file->hashName();

        $model = \Auth::user()->files()->create([
            'mime_type' => $request->file('file')->getMimeType(),
            'bytes' => $request->file('file')->getSize(),
            'disk' => 'upload',
            'path' => $path,
            'client_name' => $request->file('file')->getClientOriginalName(),
        ]);

        $image = Image::make($file)->widen(600, function ($constraint) {
            $constraint->upsize();
        });

        Storage::disk($model->disk)->put($path, $image->stream());

        return new FileResource($model);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param File $file
     * @return Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param File $file
     * @return Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param File $file
     * @return Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return Response
     * @throws Exception
     */
    public function destroy(Request $request)
    {
        $file = \Auth::user()->files()->find($request->input('id'));

        return response()->json($file->delete());
    }
}
