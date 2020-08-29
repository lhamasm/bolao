const mongoose = require('mongoose');
const Schema = mongoose.Schema;

apostaSchema = new Schema({
	valor: {
		type: Number,
		required: true
	},
	opcao_apostada: {
		type: String,
		required: true
	},
	bolao: {
		type: mongoose.Schema.Types.ObjectId,
		ref: 'Bolao'
	},
	usuario: {
		type: mongoose.Schema.Types.ObjectId,
		ref: 'User'
	}
}, {
	timestamps: true
});

module.exports = mongoose.model('Aposta', apostaSchema);