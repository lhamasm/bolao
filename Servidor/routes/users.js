var express = require('express');
var bodyParser = require('body-parser');
var mongoose = require('mongoose');
var passport = require('passport');

var User = require('../models/users');

var userRouter = express.Router();
userRouter.use(bodyParser.json());

userRouter.route('/')
.get((req, res, next) => {
	User.find()
	.then((users) => {
		res.statusCode = 200;
		res.setHeader('Content-Type', 'application/json');
		res.json(users);
	},(err) => next(err))
	.catch((err) => next(err));
})
.post((req, res, next) => {
	User.register(new User({
		username: req.body.username,
		nome_completo: req.body.nome_completo,
		email: req.body.email,
		pronome: req.body.pronome,
		rg: req.body.rg,
		cpf: req.body.cpf,
		telefone: req.body.telefone,
		celular: req.body.celular,
		agencia: req.body.agencia,
		conta: req.body.conta,
		banco: req.body.conta,
		data_de_nascimento: req.body.data_de_nascimento
	}), 
	req.body.password, 
	(err, user) => {
		if(err) {
			res.statusCode = 500;
			res.setHeader('Content-Type', 'application/json');
			res.json({ err: err });
		}
		else {
			passport.authenticate('local')(req, res, () => {
				res.statusCode = 200;
				res.setHeader('Content-Type', 'application/json');
				res.json({ success: true, status: 'Registration successful!' });
			});
		}
	});
})
.put((req, res, next) => {
	res.statusCode = 403;
	res.setHeader('Content-Type', 'application/json');
	res.json({ err: 'PUT operation not supported on /users' });
})
.delete((req, res, next) => {
	User.remove({})
	.then((resp) => {
		res.statusCode = 200;
		res.setHeader('Content-Type', 'application/json');
		res.json(resp);
	}, (err) => next(err))
	.catch((err) => next(err));
});

userRouter.post('/login', passport.authenticate('local'), (req, res) => {
	res.statusCode = 200;
	res.setHeader('Content-Type', 'application/json');
	res.json({ success: true, status: 'Login successful!' });
});

userRouter.get('/logout', (req, res) => {
	req.logout();

	res.statusCode = 200;
	res.setHeader('Content-Type', 'application/json');
	res.json({ success: true, status: 'Logout successful!' });
});

module.exports = userRouter;