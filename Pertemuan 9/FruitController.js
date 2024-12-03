const { fruits } = require('./data');

// Menggunakan Arrow Function untuk index
const index = () => {
  return fruits;
};

// Menggunakan Arrow Function untuk store (menambah buah baru)
const store = (newFruit) => {
  fruits.push(newFruit);
  return fruits;
};

// Fungsi update untuk mengubah buah berdasarkan indeks
const update = (index, newFruit) => {
  if (index < 0 || index >= fruits.length) {
    return `Error: Index ${index} tidak valid.`;
  }
  fruits[index] = newFruit;
  return fruits;
};

// Fungsi destroy untuk menghapus buah berdasarkan indeks
const destroy = (index) => {
  if (index < 0 || index >= fruits.length) {
    return `Error: Index ${index} tidak valid.`;
  }
  fruits.splice(index, 1); // Menghapus elemen pada indeks yang ditentukan
  return fruits;
};

module.exports = { index, store, update, destroy };
