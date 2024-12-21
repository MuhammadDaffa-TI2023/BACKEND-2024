const express = require("express");
const router = express.Router();

// Mengimpor controller siswa
const StudentController = require("../controllers/StudentController");

// Menampilkan semua siswa
router.get("/students", StudentController.index);

// Menambahkan siswa baru
router.post("/students", StudentController.store);

// Mengedit siswa berdasarkan ID
router.put("/students/:id", StudentController.update);

// Menghapus siswa berdasarkan ID
router.delete("/students/:id", StudentController.destroy);

module.exports = router;
