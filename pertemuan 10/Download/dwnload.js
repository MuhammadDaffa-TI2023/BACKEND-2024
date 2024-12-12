const download = () => {
    return new Promise((resolve, reject) => {
        const status = true;

        setTimeout(() => {
            if (status) {
                resolve("Download Selesai");
            } else {
                reject("Download Gagal");
            }
        }, 5000);
    });
};

// Memanggil fungsi download dan menangani Promise
download()
    .then((message) => {
        console.log(message); // Output jika sukses
    })
    .catch((error) => {
        console.log(error); // Output jika gagal
    });
