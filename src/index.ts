import express from 'express';
import path from 'path';

import login from './routes/login';

const app = express();
const port = 3000;

app.use(express.static(path.join(__dirname, 'public')));

app.get('/', (req, res) => {
  res.sendFile(path.join(__dirname, 'public', 'index.html'));
});

// Routes
app.use('/', login);

app.listen(port, () => {
  console.log(`Listening at http://localhost:${port}/`);
});
