<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalsController extends Controller
{
    // Menyimpan data animals dalam array
    private $animals = ['kucing', 'ayam', 'ikan'];

    public function index() {
        // Menampilkan data animals
        return response()->json($this->animals);
    }

    public function store(Request $request) {
        // Menambahkan hewan baru
        $newAnimals = ['musang'];
        $this->animals = array_merge($this->animals, $newAnimals);
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
            return response()->json(['message' => 'ID tidak ditemukan'],404);
    }
    }
    public function delete($id) {
        // Menghapus data hewan
        if ($id == 2) { // Misalkan id 3 adalah 'musang'
            unset($this->animals[$id]);
            $this->animals = array_values($this->animals); // Re-indexing array
        }
        return response()->json($this->animals);
    }
}