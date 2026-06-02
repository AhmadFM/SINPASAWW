<?php

namespace App\Http\Controllers;

use App\Models\Denah;

class DenahController extends Controller
{
    public function index()
    {
        $denah = Denah::with('tenant')
            ->get();

        $slotData = $denah->map(function ($item) {

            return [
                'id' => $item->denah_id,
                'status' => $item->status,
                'tenant_id' => $item->tenant_id,
                'tenant' => $item->tenant?->nama_tenant,
                'blok' => $item->blok,
            ];

        });

        return view(
            'guest.denah',
            compact('denah')
        );
    }
}
