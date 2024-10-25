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

    public function update(Request $request, $id) {
        // Find the student by ID
        $student = Student::find($id);
        
        if (!$student) {
            return response()->json([
                'message' => 'Student not found',
            ], 404);
        }

        // Validate the request
        $validator = Validator::make($request->all(), [
            'nama' => 'sometimes|required|string|max:255',
            'nim' => 'sometimes|required|string|max:20|unique:students,nim,' . $student->id,
            'email' => 'sometimes|required|email|unique:students,email,' . $student->id,
            'jurusan' => 'sometimes|required|string|max:100',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Update the student
        $student->update($validator->validated());

        return response()->json([
            'message' => 'Student updated successfully',
            'data' => $student,
        ], 200);
    }
    
    public function destroy($id) {
        // Mencari mahasiswa berdasarkan ID
        $student = Student::find($id);
        
        if (!$student) {
            return response()->json([
                'message' => 'Student not found',
            ], 404);
        }
    
        // Menghapus mahasiswa
        $student->delete();
    
        return response()->json([
            'message' => 'Student deleted successfully',
        ], 200);
    }
    
}
