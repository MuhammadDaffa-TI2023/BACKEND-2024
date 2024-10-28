<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index() {
        $students = Student::all();
    
        $data = [
            'message' => 'Get all students',
            'data' => $students
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        // menangkap data request
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan
        ];

        // menggunakan model Student untuk insert data
        $student = Student::create($input);

        // data yang akan dikirim ke client
        $data = [
            'message' => 'Student is created succesfully',
            'data' => $student,
        ];

        // mengembalikan data (json) dan kode 201
        return response()->json($data, 201);
    }

    
    public function update(Request $request, $id){
        //cari id student yang ingin di update
        $student = Student::find($id);

        if ($student) {
            $input = $request->only('nama', 'nim', 'email', 'jurusan');
            $student->update($input);
            $data = [
                'message' => 'Student is updated',
                'data' => $student
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'message' => 'Student not found'
            ];
            return response()->json($data, 404);
        }
    }
    
    public function destroy($id) {
        // Mencari Student berdasarkan ID
        $student = Student::find($id);
        
        if (!$student) {
            return response()->json([
                'message' => 'Student not found',
            ], 404);
        }
    
        // Menghapus student
        $student->delete();
    
        return response()->json([
            'message' => 'Student deleted successfully',
        ], 200);
    }
    
}
