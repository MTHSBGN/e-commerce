const express = require('express');

const app = express();
const port = 3000;

//  CORS support
app.use(function(req, res, next) {
  res.header('Access-Control-Allow-Origin', '*');
  res.header(
    'Access-Control-Allow-Headers',
    'Origin, X-Requested-With, Content-Type, Accept'
  );
  next();
});

// API Routes
const product = require('./routes/product');
const description = require('./routes/description');
const category = require('./routes/category');
const sku = require('./routes/sku');
const variant = require('./routes/variant');

app.use('/product', product);
app.use('/description', description);
app.use('/category', category);
app.use('/sku', sku);
app.use('/variant', variant);

app.listen(port);
