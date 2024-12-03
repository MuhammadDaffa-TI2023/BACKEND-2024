const { fruits } = require('./data');

// Menggunakan Arrow Function untuk index
const index = () => {
  console.log('Menampilkan buah:', fruits);  // Menambahkan tulisan "Menampilkan buah"
  return fruits;
};

// Menggunakan Arrow Function untuk store (menambah buah baru)
const store = (newFruit) => {
  console.log(`Menambah buah ${newFruit}...`);  // Menambahkan tulisan "Menambah buah grape"
  fruits.push(newFruit);
  return fruits;
};

// Fungsi update untuk mengubah buah berdasarkan indeks
const update = (index, newFruit) => {
  if (index < 0 || index >= fruits.length) {
    return `Error: Index ${index} tidak valid.`;
  }
  console.log(`Update data ${index} menjadi ${newFruit}...`);  // Menambahkan tulisan "Update data 1 menjadi mango"
  fruits[index] = newFruit;
  return fruits;
};

// Fungsi destroy untuk menghapus buah berdasarkan indeks
const destroy = (index) => {
  if (index < 0 || index >= fruits.length) {
    return `Error: Index ${index} tidak valid.`;
  }
  console.log(`Menghapus data index ${index}...`);  // Menambahkan tulisan "Menghapus data index 0"
  fruits.splice(index, 1); // Menghapus elemen pada indeks yang ditentukan
  return fruits;
};

module.exports = { index, store, update, destroy };
