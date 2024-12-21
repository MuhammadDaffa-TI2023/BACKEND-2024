// Import data students
const students = require('../models/Student');  // Ensure the path is correct

class StudentController {
    // Menampilkan semua siswa
    static index(req, res) {
        res.json({
            message: "Menampilkan semua data",
            data: students,
        });
    }

    // Menambahkan data siswa
    static store(req, res) {
        const { nama } = req.body;
        const id = students.length + 1; // Auto increment ID
        const newStudent = { id, nama };

        students.push(newStudent); // Tambahkan siswa ke array
        res.json({
            message: `Menambahkan data student: ${nama}`,
            data: newStudent,
        });
    }

    // Mengedit data siswa
    static update(req, res) {
        const { id } = req.params;
        const { nama } = req.body;

        // Temukan siswa berdasarkan ID
        const student = students.find(student => student.id == id);
        if (!student) {
            return res.status(404).json({ message: "Student not found" });
        }

        student.nama = nama; // Update nama siswa
        res.json({
            message: `Mengedit student id ${id}, nama ${nama}`,
            data: student,
        });
    }

    // Menghapus data siswa
    static destroy(req, res) {
        const { id } = req.params;

        // Temukan indeks siswa berdasarkan ID
        const studentIndex = students.findIndex(student => student.id == id);
        if (studentIndex === -1) {
            return res.status(404).json({ message: "Student not found" });
        }

        // Hapus siswa dari array
        const deletedStudent = students.splice(studentIndex, 1);
        res.json({
            message: `Menghapus data student id ${id}`,
            data: deletedStudent,
        });
    }
}

module.exports = StudentController;
