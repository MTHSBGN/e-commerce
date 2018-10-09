const express = require('express');

const app = express();
const port = 3000; // Change this to 80 in production

app.use(express.static('public'));

app.get('/', (req, res) => {
  res.sendFile('public/index.html');
});

app.listen(port, () => {
  console.log(`Address: http://localhost:${port}/`);
});
