var express = require('express');
var bodyParser = require('body-parser');
var mongoose = require('mongoose');
var passport = require('passport');

var authenticate = require('../authenticate');

var User = require('../models/users');

var userRouter = express.Router();
userRouter.use(bodyParser.json());

userRouter.post('/login', (req, res, next) => {
	passport.authenticate('local', (err, user, info) => {
		if(err) return next(err);
		if(!user) {
			res.statusCode = 401;
			res.setHeader('Content-Type', 'application/json');
			res.json({ success: false, status: 'Login Unsuccessful!', err: info });
		}

		req.logIn(user, (err) => {
			if(err) {
				res.statusCode = 401;
				res.setHeader('Content-Type', 'application/json');
				res.json({ success: false, status: 'Login Unsuccessful!', err: 'Could not login the user!' });
			}

			var token = authenticate.getToken({ _id: req.user._id});

			res.statusCode = 200;
			res.setHeader('Content-Type', 'application/json');
			res.json({ success: true, token: token, status: 'Login successful!' });

		});
	}) (req, res, next);
});

userRouter.get('/logout', (req, res) => {
	req.logout();
	// client side must clear the token

	res.statusCode = 200;
	res.setHeader('Content-Type', 'application/json');
	res.json({ success: true, status: 'Logout successful!' });
});


userRouter.route('/')
.get(authenticate.verifyUser, authenticate.verifyAdmin, (req, res, next) => {
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
.put(authenticate.verifyUser, authenticate.verifyAdmin, (req, res, next) => {
	res.statusCode = 403;
	res.setHeader('Content-Type', 'application/json');
	res.json({ err: 'PUT operation not supported on /users' });
})
.delete(authenticate.verifyUser, authenticate.verifyAdmin, (req, res, next) => {
	User.remove({})
	.then((resp) => {
		res.statusCode = 200;
		res.setHeader('Content-Type', 'application/json');
		res.json(resp);
	}, (err) => next(err))
	.catch((err) => next(err));
});

userRouter.route('/:userId')
.get(authenticate.verifyUser, (req, res, next) => {
	User.findById(req.params.userId)
	.then((user) => {
		res.statusCode = 200;
		res.setHeader('Content-Type', 'application/json');
		res.json(user);
	},(err) => next(err))
	.catch((err) => next(err));
})
.post(authenticate.verifyUser, (req, res, next) => {
	res.statusCode = 403;
	res.setHeader('Content-Type', 'application/json');
	res.json({ err: 'POST operation not supported on /users/' + req.params.userId });
})
.put(authenticate.verifyUser, (req, res, next) => {
	var upt = {};
	if(req.body.nome_completo) upt.nome_completo = req.body.nome_completo;
	if(req.body.email) upt.email = req.body.email;
	if(req.body.pronome) upt.pronome = req.body.pronome;
	if(req.body.telefone) upt.telefone = req.body.telefone;
	if(req.body.celular) upt.celular = req.body.celular;
	if(req.body.agencia) upt.agencia = req.body.agencia;
	if(req.body.conta) upt.conta = req.body.conta;
	if(req.body.banco) upt.banco = req.body.banco;
	if(req.body.password) upt.password = req.body.password;
	if(req.body.username) upt.username = req.body.username;
	
	User.findByIdAndUpdate(req.params.userId, {
		$set: upt
	}, { new: true })
	.then((user) => {
		res.statusCode = 200;
		res.setHeader('Content-Type', 'application/json');
		res.json(user);
	}, (err) => next(err))
	.catch((err) => next(err));
})
.delete(authenticate.verifyUser, (req, res, next) => {
	User.findByIdAndDelete(req.params.userId)
	.then((resp) => {
		res.statusCode = 200;
		res.setHeader('Content-Type', 'application/json');
		res.json(resp);
	}, (err) => next(err))
	.catch((err) => next(err));
});

module.exports = userRouter;