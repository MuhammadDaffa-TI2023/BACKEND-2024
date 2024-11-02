<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();
    
        // Cek apakah koleksi kosong
        if ($students->isEmpty()) {
            return response()->json([
                // Menghandle jika data kosong
                'message' => 'Tidak ada data siswa ditemukan', 
                'data' => []
            ], 404);
        }
    
        $data = [
            'message' => 'Mengambil semua data siswa',
            'data' => $students
        ];
    
        return response()->json($data, 200);
    }
    
    public function store(Request $request) {
        // Validasi data yang wajib diisi
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'jurusan' => 'required|string|max:255',
        ]);
    
        // Menangkap data dari request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];
    
        // Menggunakan model Student untuk menyimpan data
        $student = Student::create($input);
    
        $data = [
            'message' => 'Student is created successfully',
            'data' => $student,
        ];
    
        // Mengembalikan data dalam format JSON dengan kode status 201
        return response()->json($data, 201);
    }
    
    public function update(Request $request, $id) {
        // Cari student berdasarkan id
        $student = Student::find($id);
    
        if ($student) {
            // Validasi data yang dikirim dalam request
            $request->validate([
                'nama' => 'nullable|string|max:255',
                'nim' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:255',
                'jurusan' => 'nullable|string|max:255',
            ]);
    
            // Menangkap data request, mempertahankan data lama jika field tidak dikirim
            $input = [
                'nama' => $request->nama ?? $student->nama,
                'nim' => $request->nim ?? $student->nim,
                'email' => $request->email ?? $student->email,
                'jurusan' => $request->jurusan ?? $student->jurusan
            ];
    
            // Melakukan update data
            $student->update($input);
    
            $data = [
                'message' => 'Student is updated',
                'data' => $student
            ];
    
            // Mengembalikan data dalam format JSON dengan kode status 200
            return response()->json($data, 200);
        } else {
            // Mengembalikan pesan error jika student tidak ditemukan
            $data = [
                'message' => 'Student not found'
            ];
    
            return response()->json($data, 404);
        }
    }
    

    public function destroy($id) {
        // Cari student berdasarkan id
        $student = Student::find($id);
    
        if ($student) {
            // Jika student ditemukan, hapus student tersebut
            $student->delete();
    
            $data = [
                'message' => 'Student is deleted'
            ];
    
            // Mengembalikan respon sukses dalam format JSON dengan status 200
            return response()->json($data, 200);
        } else {
            // Jika student tidak ditemukan, kembalikan pesan error dengan status 404
            $data = [
                'message' => 'Student not found'
            ];
    
            return response()->json($data, 404);
        }
    }
    

    public function show($id) {
        $student = Student::find($id);

        if ($student) {
            $data = [
                'message' => 'Get detail Data',
                'data' => $student
            ];

            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found',
                'data' => null
            ];

            return response()->json($data, 404);
        }
    }
}
