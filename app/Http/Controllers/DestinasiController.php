<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class DestinasiController extends Controller
{
    public function index()
    {
        $destinations = Destinasi::paginate(10);
        return view('pages.destinasiAdmins', compact('destinations'));
    }

    public function create()
    {
        // return view('admin.destinations.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'image' => 'nullable|image|max:2048',
                'latitude' => 'nullable|numeric',
                'longitude' => 'nullable|numeric',
                'region' => 'nullable|string',
            ]);
        } catch (ValidationException $e) {
            dd($e->errors()); // Menampilkan semua error validasi
        }
        // dd($tes);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // $data['image'] = $request->file('image')->store('destinations', 'public');
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $filename);
            $data['image'] = 'images/' . $filename;
        }

        Destinasi::create($data);
        return redirect()->route('destinations.index')->with('success', 'Destinasi berhasil ditambahkan.');
    }

    public function show(Destinasi $destination)
    {
        return view('destinations.show', compact('destination'));
    }

    public function edit(Destinasi $destination)
    {
        return view('pages.editDestinasis', compact('destination'));
    }

    public function update(Request $request, Destinasi $destination)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            // Hapus file lama jika ada
            // if ($destination->image) {
            //     Storage::disk('public')->delete($destination->image);
            // }
            if ($data['image'] && file_exists(public_path($data['image']))) {
                unlink(public_path($data['image']));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $request->file('image')->move(public_path('images'), $filename);
            $data['image'] = 'images/' . $filename;
            // $data['image'] = $request->file('image')->store('destinations', 'public');
        }

        $destination->update($data);

        return redirect()->route('destinations.index')->with('success', 'Destinasi berhasil diperbarui.');
    }

    public function destroy(Destinasi $destination)
    {
        if ($destination->image) {
            // Storage::disk('public')->delete($destination->image);
            if ($destination->image && file_exists(public_path($destination->image))) {
                unlink(public_path($destination->image));
            }
        }

        $destination->delete();

        return redirect()->route('destinations.index')->with('success', 'Destinasi berhasil dihapus.');
    }
}
