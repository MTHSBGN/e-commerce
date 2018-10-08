const express = require('express');

const app = express();
const port = 3000; // Change this to 80 in production

app.get('/', (req, res) => {
  res.send('Hello World!');
});

app.listen(port, () => {
  console.log(`Address: http://localhost:${port}/`);
});
