import express from 'express';
import path from 'path';

const router = express.Router();

router.get('/login', (req, res) => {
  res.sendFile(path.join(__dirname, '../public/html', 'login.html'));
});

router.post('/login', (req, res) => {
  console.log(req.body);
  if (req.body.username === 'admin' && req.body.password === 'admin') {
    console.log('redirect');
    res.redirect('/');
  } else {
    res.send({ message: 'Invalid credentials' });
  }
});

export default router;
