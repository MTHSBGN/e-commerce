const express = require('express');
const exphbs = require('express-handlebars');
const bodyParser = require('body-parser');

const app = express();
const port = 3000;

// Static files
app.use(express.static('public'));

// Parsing body of requests
app.use(bodyParser.urlencoded({ extended: true }));

// View engine
app.engine('handlebars', exphbs({ defaultLayout: 'main' }));
app.set('view engine', 'handlebars');

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
const home = require('./routes/home');
const account = require('./routes/account');

app.use('/', home);
app.use('/', account);

// const product = require('./routes/product');
// const description = require('./routes/description');
// const category = require('./routes/category');
// const sku = require('./routes/sku');
// const variant = require('./routes/variant');

// app.use('/product', product);
// app.use('/description', description);
// app.use('/category', category);
// app.use('/sku', sku);
// app.use('/variant', variant);

app.listen(port);
