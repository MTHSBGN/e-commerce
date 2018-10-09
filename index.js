const express = require('express');

const users = require('./routes/users');
const products = require('./routes/products');

const app = express();
const port = 3000; // Change this to 80 in production

app.use(express.static('public'));

app.get('/', (req, res) => {
  res.sendFile('public/index.html');
});

// Routes
app.use('/users', users);
app.use('/products', products);

app.listen(port, () => {
  console.log(`Address: http://localhost:${port}/`);
});
