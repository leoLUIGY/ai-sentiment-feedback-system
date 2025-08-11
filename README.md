Sistema de Feedback com Análise de Sentimento (PHP + MySQL + Python + OpenAI)

Projeto que recebe feedbacks via formulário web, analisa o sentimento (positivo / negativo / neutro) usando Python com a API da OpenAI e armazena o resultado no MySQL.

Visão Geral

Formulário HTML para envio de comentários.

Endpoint PHP (submit_feedback.php) que salva no banco e aciona a análise.

Script Python (analyze_sentiment.py) que classifica o sentimento e atualiza o banco.

Script SQL para criação da tabela.

Funcionalidades

Recebimento de comentários.

Análise automática do sentimento (positivo, negativo ou neutro).

Armazenamento de comentário, sentimento, score e timestamps.

Pré-requisitos

PHP >= 7.4

Python 3.8+

MySQL ou MariaDB

pip

Chave da OpenAI (variável de ambiente OPENAI_API_KEY)

Estrutura de Arquivos

feedback-system/
├─ backend/
│  ├─ form.php            # Formulário
│  └─ db.php   # conectar ao db
├─ python/
│  └─ analyze_sentiment.py  # Script de análise
├─ sql/
│  └─ schema.sql            # Criação da tabela
└─ README.md

Banco de Dados

CREATE DATABASE IF NOT EXISTS avaliacoes;
USE avaliacoes;

CREATE TABLE IF NOT EXISTS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    texto TEXT NOT NULL,
    sentimento VARCHAR(20)
);

Passo a Passo para Rodar

Criar banco e tabela com sql/schema.sql.

Ajustar credenciais de banco em submit_feedback.php e analyze_sentiment.py.

Configurar variável de ambiente com a chave da OpenAI:

export OPENAI_API_KEY="sua_chave_aqui"

Instalar dependências Python:

pip install openai mysql-connector-python

Iniciar servidor PHP:

php -S 127.0.0.1:8000 -t web

Acessar http://127.0.0.1:8000 e enviar feedback.
