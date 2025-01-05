// Import data siswa
const students = require('../models/Student'); // Pastikan path sudah benar

class StudentController {
    // Menampilkan semua data siswa
    static index(req, res) {
        if (students.length === 0) {
            return res.status(404).json({ message: "Data siswa kosong" });
        }
        res.json({
            message: "Menampilkan semua data siswa",
            data: students,
        });
    }

    // Menampilkan satu siswa berdasarkan ID
    static show(req, res) {
        const { id } = req.params;
        const student = students.find(student => student.id == id);

        if (!student) {
            return res.status(404).json({ message: `Siswa dengan ID ${id} tidak ditemukan` });
        }

        res.json({
            message: `Menampilkan data siswa dengan ID ${id}`,
            data: student,
        });
    }

    // Menambahkan data siswa
    static store(req, res) {
        const { nama } = req.body;

        if (!nama) {
            return res.status(400).json({ message: "Nama tidak boleh kosong" });
        }

        const id = students.length + 1; // Auto increment ID
        const newStudent = { id, nama };

        students.push(newStudent); // Tambahkan siswa ke array
        res.json({
            message: `Berhasil menambahkan data siswa: ${nama}`,
            data: newStudent,
        });
    }

    // Mengedit data siswa berdasarkan ID
    static update(req, res) {
        const { id } = req.params;
        const { nama } = req.body;

        if (!nama) {
            return res.status(400).json({ message: "Nama tidak boleh kosong" });
        }

        // Cari siswa berdasarkan ID
        const student = students.find(student => student.id == id);
        if (!student) {
            return res.status(404).json({ message: `Siswa dengan ID ${id} tidak ditemukan` });
        }

        student.nama = nama; // Update nama siswa
        res.json({
            message: `Berhasil mengedit siswa dengan ID ${id}, nama: ${nama}`,
            data: student,
        });
    }

    // Menghapus data siswa berdasarkan ID
    static destroy(req, res) {
        const { id } = req.params;

        // Cari indeks siswa berdasarkan ID
        const studentIndex = students.findIndex(student => student.id == id);
        if (studentIndex === -1) {
            return res.status(404).json({ message: `Siswa dengan ID ${id} tidak ditemukan` });
        }

        // Hapus siswa dari array
        const deletedStudent = students.splice(studentIndex, 1);
        res.json({
            message: `Berhasil menghapus siswa dengan ID ${id}`,
            data: deletedStudent,
        });
    }
}

module.exports = StudentController;
