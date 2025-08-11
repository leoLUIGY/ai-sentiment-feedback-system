# 📊 Sistema de Feedback com Análise de Sentimento  
*(PHP + MySQL + Python + OpenAI)*  

> Projeto que recebe feedbacks via formulário web, analisa o sentimento (**positivo**, **negativo** ou **neutro**) usando **Python** com a API da **OpenAI** e armazena os resultados no **MySQL**.

---

## 📌 Visão Geral  
- 📝 **Formulário HTML** para envio de comentários.  
- ⚙ **Endpoint PHP** (`submit_feedback.php`) que salva no banco e aciona a análise.  
- 🤖 **Script Python** (`analyze_sentiment.py`) que classifica o sentimento e atualiza o banco.  
- 🗄 **Script SQL** para criação da tabela.  

---

## 🚀 Funcionalidades  
✅ Recebimento de comentários.  
✅ Análise automática do sentimento (**positivo**, **negativo** ou **neutro**).  
✅ Armazenamento do comentário, sentimento, **score** e **timestamps**.  

---

## 🛠 Pré-requisitos  
- **PHP** >= 7.4  
- **Python** 3.8+  
- **MySQL** ou **MariaDB**  
- **pip**  
- **Chave da OpenAI** (`OPENAI_API_KEY`)  

---

## 📂 Estrutura de Arquivos  

feedback-system/
├─ backend/
│ ├─ form.php # Formulário
│ └─ db.php # Conexão com o banco
├─ python/
│ └─ analyze_sentiment.py # Script de análise
├─ sql/
│ └─ schema.sql # Criação da tabela
└─ README.md

pgsql
Copiar
Editar

---

## 🗄 Banco de Dados — `sql/schema.sql`  

```sql
CREATE DATABASE IF NOT EXISTS avaliacoes;
USE avaliacoes;

CREATE TABLE IF NOT EXISTS feedbacks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    texto TEXT NOT NULL,
    sentimento VARCHAR(20)
);
```
📋 Passo a Passo para Rodar
1️⃣ Criar banco e tabela com sql/schema.sql.

2️⃣ Ajustar credenciais do banco nos arquivos:

submit_feedback.php

analyze_sentiment.py

3️⃣ Configurar variável de ambiente com a chave da OpenAI:

bash
Copiar
Editar
export OPENAI_API_KEY="sua_chave_aqui"
4️⃣ Instalar dependências Python:

bash
Copiar
Editar
pip install openai mysql-connector-python
5️⃣ Iniciar servidor PHP:

bash
Copiar
Editar
php -S 127.0.0.1:8000 -t web
6️⃣ Acessar no navegador:

cpp
Copiar
Editar
http://127.0.0.1:8000
