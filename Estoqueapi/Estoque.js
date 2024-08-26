const express = require('express');
const bodyParser = require('body-parser');

const app = express();
app.use(bodyParser.json());


let produtos = [];
let idAtual = 1;


app.get('/api/produto/:id', (req, res) => {
    const produto = produtos.find(p => p.id === parseInt(req.params.id));
    if (produto) {
        res.json(produto);
    } else {
        res.status(404).json({ message: 'Produto não encontrado' });
    }
});


app.get('/api/produtos', (req, res) => {
    res.json(produtos);
});


app.post('/api/produto/cadastrar', (req, res) => {
    const { nome, quantidade } = req.body;
    if (!nome || quantidade == null) {
        return res.status(400).json({ message: 'Nome e quantidade são obrigatórios' });
    }

    const novoProduto = {
        id: idAtual++,
        nome,
        quantidade
    };

    produtos.push(novoProduto);
    res.status(201).json(novoProduto);
});


app.post('/api/produto/atualizar', (req, res) => {
    const { id, quantidade } = req.body;
    const produto = produtos.find(p => p.id === id);

    if (produto) {
        produto.quantidade = quantidade;
        res.json(produto);
    } else {
        res.status(404).json({ message: 'Produto não encontrado' });
    }
});


app.post('/api/produto/excluir', (req, res) => {
    const { id } = req.body;
    const indice = produtos.findIndex(p => p.id === id);

    if (indice !== -1) {
        const produtoExcluido = produtos.splice(indice, 1);
        res.json(produtoExcluido);
    } else {
        res.status(404).json({ message: 'Produto não encontrado' });
    }
});


const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Servidor rodando na porta ${PORT}`);
});