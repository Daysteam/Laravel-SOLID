<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSiswaRequest;
use App\Http\Requests\UpdateSiswaRequest;
use App\Http\Resources\SiswaResource;
use App\Services\SiswaService;

class SiswaController extends Controller
{
    public function __construct(private SiswaService $siswa_service){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswas = $this->siswa_service->getAll();
        
        return SiswaResource::collection($siswas)->additional([
            'status' => true,
            'code' => 200,
            'message' => 'Berhasil menampilkan data siswa'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSiswaRequest $request)
    {
        $validated = $request->validated();

        $siswa = $this->siswa_service->store($validated);

        return (new SiswaResource($siswa))
            ->additional([
                'status' => true,
                'code' => '201',
                'message' => 'Berhasil membuat data siswa'
            ])
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $siswa = $this->siswa_service->show($id);

        return (new SiswaResource($siswa))
            ->additional([
                'status' => true,
                'code' => '201',
                'message' => 'Berhasil menampilkan data siswa'
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSiswaRequest $request, string $id)
    {
        $validated = $request->validated();
        $siswa = $this->siswa_service->update($validated,$id);
            
        return (new SiswaResource($siswa))
            ->additional([
                'status' => true,
                'code' => '200',
                'message' => 'Berhasil menampilkan data siswa'
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->siswa_service->delete($id);
        
        return response()->json([
            'status' => true,
            'code' => 200,
            'message' => 'Berhasil menghapus data siswa'
        ],200);
    }
}
