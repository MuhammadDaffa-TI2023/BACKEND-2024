const { index, store, update, destroy } = require('./FruitController');

const main = () => {
  console.log('Fruits List:', index());
  
  // Tambah buah baru
  console.log('Adding grape...');
  console.log('Updated Fruits List:', store('grape'));

  // Update buah di indeks ke-1
  console.log('Updating index 1 to mango...');
  console.log('Updated Fruits List:', update(1, 'mango'));

  // Hapus buah di indeks ke-0
  console.log('Deleting index 0...');
  console.log('Updated Fruits List:', destroy(0));
};

main();
