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

app.use('/product', product);

app.listen(port);
