const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const bolaoSchema = new Schema({
	campeonato: {
		type: String,
		required: true
	},
	publico: {
		type: Boolean,
		default: false
	},
	nome: {
		type: String,
		required: true
	},
	descricao: {
		type: String,
		required: true
	}, 
	numero_max_de_participantes: {
		type: Number,
		min: 2
	},
	tipo_de_jogo: {
		type: String,
		required: true
	},
	tipo_de_aposta: {
		type: String.
		required: true
	},
	escolhas_de_aposta: {
		type: [ String ],
		required: true
	},
	data_de_vencimento: {
		type: Date,
		required: true
	}
}, {
	timestamps: true
});

module.exports = mongoose.model('Bolao', bolaoSchema);