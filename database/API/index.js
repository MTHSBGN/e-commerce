const express = require('express');
const exphbs = require('express-handlebars');
const bodyParser = require('body-parser');
const session = require('express-session');
const morgan = require('morgan');
const uuid = require('uuid');
const FileStore = require('session-file-store')(session);

const app = express();
const port = 3000;

// Static files
app.use(express.static('public'));

// Parsing body of requests
app.use(bodyParser.urlencoded({ extended: true }));

// Session management
app.use(
  session({
    genid: req => {
      return uuid();
    },
    cookie: { expires: new Date(253402300799999) },
    secret: 'Secret', // TODO Change secret with ENV Var
    resave: false,
    saveUninitialized: true,
    store: new FileStore()
  })
);

// Logging
app.use(morgan('combined'));

// View engine
app.engine('handlebars', exphbs({ defaultLayout: 'main' }));
app.set('view engine', 'handlebars');

//  CORS support
app.use((req, res, next) => {
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
const product = require('./routes/product');
const basket = require('./routes/basket');
const payement = require('./routes/payment');

app.use('/', home);
app.use('/', account);
app.use('/product', product);
app.use('/basket', basket);
app.use('/payment', payement);

app.listen(port);
