const { fruits } = require('./data');

// Menggunakan Arrow Function
const index = () => {
  return fruits;
};

const store = (newFruit) => {
  fruits.push(newFruit);
  return fruits;
};

module.exports = { index, store };
