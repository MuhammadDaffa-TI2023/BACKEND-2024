const { index, store, update, destroy } = require('./FruitController');

const main = () => {
  // Menampilkan daftar buah
  console.log('Fruits List:', index());
  
  // Tambah buah baru (Grape)
  console.log('Updated Fruits List:', store('grape'));

  // Update buah di indeks ke-1
  console.log('Updated Fruits List:', update(1, 'mango'));

  // Hapus buah di indeks ke-0
  console.log('Updated Fruits List:', destroy(0));
};

main();
