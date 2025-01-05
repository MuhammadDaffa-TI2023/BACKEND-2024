const express = require("express");
const router = express.Router();

// Mengimpor controller siswa
const StudentController = require("../controllers/StudentController");

// Endpoint untuk menampilkan semua siswa
router.get("/students", StudentController.index);

// Endpoint untuk menampilkan satu siswa berdasarkan ID
router.get("/students/:id", StudentController.show);

// Endpoint untuk menambahkan siswa baru
router.post("/students", StudentController.store);

// Endpoint untuk mengedit siswa berdasarkan ID
router.put("/students/:id", StudentController.update);

// Endpoint untuk menghapus siswa berdasarkan ID
router.delete("/students/:id", StudentController.destroy);

module.exports = router;
