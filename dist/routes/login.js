"use strict";
var __importDefault = (this && this.__importDefault) || function (mod) {
    return (mod && mod.__esModule) ? mod : { "default": mod };
};
Object.defineProperty(exports, "__esModule", { value: true });
const express_1 = __importDefault(require("express"));
const path_1 = __importDefault(require("path"));
const router = express_1.default.Router();
router.get('/login', (req, res) => {
    res.sendFile(path_1.default.join(__dirname, '../public/html', 'login.html'));
});
router.post('/login', (req, res) => {
    console.log(req.body);
    if (req.body.username === 'admin' && req.body.password === 'admin') {
        console.log('redirect');
        res.redirect('/');
    }
    else {
        res.send({ message: 'Invalid credentials' });
    }
});
exports.default = router;
