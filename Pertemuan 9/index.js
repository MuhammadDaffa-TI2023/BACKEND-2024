const { index, store } = require('./FruitController');

// Menggunakan Destructuring
const main = () => {
  console.log('Fruits List:', index());
  
  const newFruit = 'grape';
  console.log(`Adding ${newFruit}...`);
  console.log('Updated Fruits List:', store(newFruit));
};

main(); 