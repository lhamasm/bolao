const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const passportLocalMongoose = require('passport-local-mongoose');

const userSchema = new Schema({
	nome_completo: {
		type: String,
		required: true
	},
	email: {
		type: String,
		required: true
	},
	pronome: {
		type: String,
		required: true
	},
	rg: {
		type: Number,
		required: true,
		unique: true
	},
	cpf: {
		type: Number,
		required: true,
		unique: true
	},
	telefone: {
		type: Number
	},
	celular: {
		type: Number
	},
	agencia: {
		type: Number,
		required: true
	},
	conta: {
		type: Number,
		required: true
	},
	banco: {
		type: Number,
		required: true
	},
	data_de_nascimento: {
		type: Date,
		required: true
	},
	posicao: {
		type: Number
	},
	pontuacao: {
		type: Number,
		default: 0
	},
	adm: {
		type: Boolean,
		default: false
	}
},{
	timestamps: true
});

userSchema.plugin(passportLocalMongoose);

module.exports = mongoose.model('User', userSchema);