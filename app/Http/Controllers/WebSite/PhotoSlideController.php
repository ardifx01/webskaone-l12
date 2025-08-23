<?php

namespace App\Http\Controllers\WebSite;

use App\DataTables\WebSite\PhotoSlideDataTable;
use App\Helpers\ImageHelper;
use App\Models\WebSite\PhotoSlide;
use App\Http\Controllers\Controller;
use App\Http\Requests\WebSite\PhotoSlideRequest;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Str;

class PhotoSlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PhotoSlideDataTable $photoSlideDataTable)
    {
        return $photoSlideDataTable->render('pages.website.uploadphoto.photo-slide');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.website.uploadphoto.photo-slide-form', [
            'data' => new PhotoSlide(),
            'action' => route('websiteapp.uploadphoto.photo-slides.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PhotoSlideRequest $request)
    {
        $photoSlide = new PhotoSlide($request->except(['image']));

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('image'),
                directory: 'images/photoslide',
                oldFileName: $photoSlide->image ?? null,
                maxWidth: 1200,
                quality: 100,
                prefix: 'slide_'
            );

            $photoSlide->image = $imageName;
        }

        // Menyimpan data gallery ke database
        $photoSlide->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PhotoSlide $photoSlide)
    {
        return view('pages.website.uploadphoto.photo-slide-form', [
            'data' => $photoSlide,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PhotoSlide $photoSlide)
    {
        return view('pages.website.uploadphoto.photo-slide-form', [
            'data' => $photoSlide,
            'action' => route('websiteapp.uploadphoto.photo-slides.update', $photoSlide->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PhotoSlideRequest $request, PhotoSlide $photoSlide)
    {
        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('image'),
                directory: 'images/photoslide',
                oldFileName: $photoSlide->image ?? null,
                maxWidth: 1200,
                quality: 100,
                prefix: 'slide_'
            );

            $photoSlide->image = $imageName;
        }

        // Simpan instance photoSlide ke database
        $photoSlide->fill($request->except(['image']));
        $photoSlide->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoSlide $photoSlide)
    {
        if ($photoSlide->image) {
            $imagePath = base_path('images/photoslide/' . $photoSlide->image);

            // Periksa dan hapus file image
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $photoSlide->delete();

        return responseSuccessDelete();
    }
}
