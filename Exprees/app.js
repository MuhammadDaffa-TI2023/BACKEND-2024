const express = require("express");
const app = express();

// Mengimpor routing API
const studentRoutes = require("./routes/api"); // Ensure this path is correct

// Middleware untuk parsing JSON
app.use(express.json());

// Menambahkan routing untuk /students (tanpa /api)
app.use("/api", studentRoutes); // Using prefix /api for all routes in api.js

// Halaman utama (optional)
app.get("/", (req, res) => {
    res.send("Hello, Express!");
});

// Menjalankan server
const port = 3000;
app.listen(port, () => {
    console.log(`Server berjalan di http://localhost:${port}`);
});
