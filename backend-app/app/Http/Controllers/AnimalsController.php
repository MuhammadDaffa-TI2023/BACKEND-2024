<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    // Menyimpan data animals dalam array
    private $animals = ['kucing', 'ayam', 'ikan'];

    public function index() {
        // Menampilkan data animals menggunakan foreach
        $animalList = [];
        foreach ($this->animals as $animal) {
            $animalList[] = $animal;
        }
        return response()->json($animalList);
    }

    public function store(Request $request) {
        // Menambahkan hewan baru menggunakan array_push
        $newAnimal = 'musang';
        array_push($this->animals, $newAnimal);
        return response()->json($this->animals);
    }

    public function update(Request $request, $id) {
        // Mengambil data hewan dari request
        $animal = $request->input('animal');
    
        // Cek apakah data hewan dari request null atau tidak
        if (is_null($animal)) {
            return response()->json(['message' => 'Data hewan tidak boleh kosong'], 400);
        }
    
        // Pastikan ID yang diminta ada dalam array
        if (isset($this->animals[$id])) {
            // Mengupdate hewan dengan data dari request
            $this->animals[$id] = $animal; 
            return response()->json($this->animals);
        } else {
            // Jika ID tidak ditemukan, kembalikan pesan error
            return response()->json(['message' => 'ID tidak ditemukan'], 404);
        }
    }

    public function delete($id) {
        // Menghapus data hewan menggunakan array_splice
        if (isset($this->animals[$id])) {
            // Menghapus elemen berdasarkan indeks
            array_splice($this->animals, $id, 1); 
        }
        return response()->json($this->animals);
    }
}
