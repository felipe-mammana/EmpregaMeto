<div align="center">
  <img src="public/img/icon.png" alt="EmpregaMeto" width="96" />

  <h1>EmpregaMeto</h1>

  <p>
    Plataforma web de empregabilidade educacional para inscrição, autenticação e primeiro acesso de participantes do programa EmpregaMeto.
  </p>

  <p>
    <img src="https://img.shields.io/badge/PHP-8.x-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
    <img src="https://img.shields.io/badge/MySQL%2FMariaDB-Relational-4479A1?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL MariaDB">
    <img src="https://img.shields.io/badge/JavaScript-Vanilla-F7DF1E?style=for-the-badge&logo=javascript&logoColor=111" alt="JavaScript">
    <img src="https://img.shields.io/badge/CSS3-Responsive-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3">
    <img src="https://img.shields.io/badge/Apache-.htaccess-D22128?style=for-the-badge&logo=apache&logoColor=white" alt="Apache">
  </p>
</div>

---

## ✨ Visão Geral

O **EmpregaMeto** é uma aplicação web desenvolvida para apoiar um programa educacional de empregabilidade da Universidade Metodista de São Paulo. O sistema oferece uma landing page institucional, formulário de inscrição, autenticação de participantes e fluxo obrigatório de troca de senha no primeiro acesso.

A aplicação foi construída em PHP procedural/orientado a classes, com frontend em HTML, CSS e JavaScript puro, persistência em MySQL/MariaDB e execução prevista em ambiente Apache/XAMPP.

---

## 🚀 Funcionalidades

| Módulo | Recursos implementados |
| --- | --- |
| Página institucional | Landing page com seções de apresentação, impacto, capacitações, materiais, contato e chamada para inscrição |
| Inscrição | Formulário público com validação de e-mail, telefone, idade, área de interesse e envio via `fetch` |
| Validação de duplicidade | Verificação de telefone, RA, nome/curso e e-mail antes de criar novos cadastros |
| Autenticação | Login com e-mail e senha usando `password_verify` e sessão PHP |
| Primeiro login | Redirecionamento para criação de nova senha quando `primeiro_login = 1` |
| Troca de senha | Validação de força de senha e atualização com `password_hash` |
| Banco de dados | Tabelas relacionais `user` e `login`, com chave estrangeira e exclusão em cascata |
| UI/UX | Páginas responsivas, popups de feedback, loading overlay, máscaras de telefone e assets próprios |

---

## 🧱 Arquitetura

O projeto segue uma arquitetura simples em camadas, separando entrada HTTP, controladores, modelos de persistência, views públicas e assets estáticos.

```text
meto/
├── api/
│   ├── config/
│   │   └── cone.php
│   ├── controllers/
│   │   ├── inscrever.php
│   │   ├── login.php
│   │   └── mudar_senha.php
│   ├── models/
│   │   ├── inscrever.php
│   │   ├── mudar_senha.php
│   │   └── user.php
│   ├── routes/
│   │   ├── api.php
│   │   ├── inscrever.php
│   │   └── mudar_senha.php
│   └── index_api.php
├── public/
│   ├── css/
│   │   ├── login.css
│   │   ├── primeiro_login.css
│   │   └── style.css
│   ├── database/
│   │   └── empegameto.sql
│   ├── html/
│   │   ├── index.php
│   │   ├── login.html
│   │   ├── primeiro_login.php
│   │   └── sucesso.html
│   ├── img/
│   │   └── icon.png
│   └── js/
│       ├── login.js
│       ├── primeiro_login.js
│       └── script.js
├── .env.example
├── .gitignore
├── .htaccess
└── README.md
```

### Responsabilidades

| Diretório | Descrição |
| --- | --- |
| `api/config` | Configuração de conexão com banco e carregamento de variáveis do `.env` |
| `api/controllers` | Orquestração das requisições HTTP, validações e respostas JSON |
| `api/models` | Operações de banco com `mysqli`, prepared statements e regras de persistência |
| `api/routes` | Entrypoints de API e roteamento simples por método/caminho |
| `public/html` | Páginas renderizadas no navegador |
| `public/css` | Estilos responsivos e identidade visual |
| `public/js` | Validações client-side, chamadas `fetch`, máscaras e interações |
| `public/database` | Schema SQL versionado da aplicação |

---

## 🛠️ Tecnologias

| Categoria | Tecnologia | Uso no projeto |
| --- | --- | --- |
| Backend | [PHP](https://www.php.net/) | Controladores, modelos, sessão e APIs JSON |
| Servidor web | [Apache HTTP Server](https://httpd.apache.org/) | Execução via XAMPP e configuração `.htaccess` |
| Banco de dados | [MySQL](https://www.mysql.com/) / [MariaDB](https://mariadb.org/) | Persistência relacional dos usuários e credenciais |
| Driver | [MySQLi](https://www.php.net/manual/en/book.mysqli.php) | Conexão e prepared statements |
| Frontend | [HTML5](https://developer.mozilla.org/docs/Web/HTML), [CSS3](https://developer.mozilla.org/docs/Web/CSS), [JavaScript](https://developer.mozilla.org/docs/Web/JavaScript) | Interface pública, formulários e chamadas assíncronas |
| Biblioteca frontend | [jQuery](https://jquery.com/) | Inicialização da máscara de telefone |
| Plugin frontend | [jQuery Mask Plugin](https://igorescobar.github.io/jQuery-Mask-Plugin/) | Máscara `(00) 00000-0000` no campo telefone |
| Fonte | [Google Fonts](https://fonts.google.com/) | Tipografia `DM Serif Display` e `Plus Jakarta Sans` |

Não foram detectados Docker, Composer, Node.js, ORM, cache, mensageria, workers, WebSocket, IA, SDKs cloud ou framework backend neste repositório.

---

## ⚙️ Como Executar

### Pré-requisitos

- PHP 8.x
- Apache com suporte a PHP
- MySQL ou MariaDB
- XAMPP recomendado para ambiente local no Windows

### Instalação local

```bash
git clone <url-do-repositorio>
cd meto
```

Copie o arquivo de ambiente:

```bash
cp .env.example .env
```

Configure as variáveis no `.env`:

```env
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=empegameto
DB_USERNAME=root
DB_PASSWORD=
METO_INITIAL_PASSWORD=defina-uma-senha-inicial-forte
```

Importe o schema no MySQL/MariaDB:

```bash
mysql -u root -p < public/database/empegameto.sql
```

Em ambiente XAMPP, mantenha o projeto em:

```text
C:\xampp\htdocs\meto
```

Acesse no navegador:

```text
http://localhost/meto/public/html/index.php
```

### Execução Docker

Não há `Dockerfile`, `docker-compose.yml` ou configuração de container versionada neste projeto.

### Build

Não há etapa de build. Os arquivos CSS, JavaScript e PHP são servidos diretamente pelo Apache.

### Testes

Não há suíte automatizada configurada no repositório. A validação disponível atualmente é manual e pode ser complementada com lint PHP:

```bash
php -l api/config/cone.php
php -l api/controllers/login.php
php -l api/controllers/inscrever.php
php -l api/controllers/mudar_senha.php
```

---

## 🔐 Variáveis de Ambiente

| Variável | Descrição |
| --- | --- |
| `DB_HOST` | Host do servidor MySQL/MariaDB |
| `DB_PORT` | Porta do banco de dados |
| `DB_DATABASE` | Nome do banco utilizado pela aplicação |
| `DB_USERNAME` | Usuário de conexão com o banco |
| `DB_PASSWORD` | Senha do usuário de banco |
| `METO_INITIAL_PASSWORD` | Senha inicial temporária usada ao criar logins de novos inscritos |

O arquivo `.env` deve permanecer local e está protegido pelo `.gitignore`. Use `.env.example` como referência versionada.

---

## 🌐 Endpoints/API

| Método | Endpoint | Descrição |
| --- | --- | --- |
| `POST` | `/meto/api/login` | Realiza login por e-mail e senha via roteador central |
| `POST` | `/meto/api/inscrever` | Cria inscrição e login inicial via roteador central |
| `POST` | `/meto/api/mudar_senha` | Atualiza a senha do usuário autenticado via roteador central |
| `POST` | `/meto/api/controllers/login.php` | Entrypoint direto usado pelo frontend de login |
| `POST` | `/meto/api/routes/inscrever.php` | Entrypoint direto usado pelo formulário público de inscrição |
| `POST` | `/meto/api/controllers/mudar_senha.php` | Entrypoint direto usado pela tela de primeiro login |

As respostas dos controladores são JSON com o formato base:

```json
{
  "ok": true,
  "message": "Operação realizada com sucesso."
}
```

---

## 🗄️ Banco de Dados

O schema está versionado em `public/database/empegameto.sql` e contém duas entidades principais.

### `user`

Armazena os dados cadastrais do participante.

| Campo | Tipo | Descrição |
| --- | --- | --- |
| `id` | `int` | Identificador primário |
| `nome` | `varchar(255)` | Nome completo |
| `RA` | `int` | Registro acadêmico |
| `telefone` | `varchar(25)` | Telefone do participante |
| `idade` | `int(3)` | Idade |
| `curso` | `varchar(255)` | Área de interesse |
| `status` | `varchar(255)` | Estado do cadastro, como `pendente` ou `ativo` |

### `login`

Armazena credenciais e metadados de autenticação.

| Campo | Tipo | Descrição |
| --- | --- | --- |
| `id` | `int` | Identificador primário |
| `id_user` | `int` | Chave estrangeira para `user.id` |
| `email` | `varchar(150)` | E-mail único de autenticação |
| `senha` | `varchar(255)` | Hash gerado por `password_hash` |
| `tipo` | `enum('admin','user')` | Perfil de acesso |
| `primeiro_login` | `tinyint(1)` | Indica troca obrigatória de senha no primeiro acesso |

Relacionamento:

```text
user (1) ─── (1) login
```

A exclusão de um usuário remove o login relacionado por `ON DELETE CASCADE`.

---

## 🧪 Testes e Qualidade

Não foram detectados frameworks de teste, scripts de CI, testes unitários, testes de integração ou testes de carga.

Validações existentes:

- `php -l` para sintaxe PHP
- validação de e-mail no frontend e backend
- validação de telefone no frontend e backend
- prepared statements nas consultas SQL
- hashing de senha com `password_hash`
- verificação de senha com `password_verify`

---

## 🛡️ Segurança

Recursos implementados:

- Autenticação baseada em sessão PHP com `session_start`
- Hash de senha com `password_hash`
- Verificação de senha com `password_verify`
- Prepared statements com `mysqli`
- Validação server-side de e-mail
- Validação server-side de telefone
- Validação de força de senha no fluxo de primeiro acesso
- Proteção da tela `primeiro_login.php` por sessão
- Remoção de dados seed sensíveis do dump SQL
- Configuração de banco movida para variáveis de ambiente

Pontos ainda recomendados:

- Implementar proteção CSRF nos formulários
- Definir política de expiração e regeneração de sessão
- Evitar mensagens de erro detalhadas em produção
- Implementar fluxo formal de aprovação de usuários pendentes
- Criar middleware de autorização para perfis `admin` e `user`
- Adicionar rate limit para login
- Configurar HTTPS em produção

---

## 🧩 Integrações

| Integração | Uso |
| --- | --- |
| YouTube Embed | Videoaulas exibidas na seção de capacitações |
| Google Fonts | Carregamento das fontes da interface |
| jQuery CDN | Suporte à máscara de telefone |
| jQuery Mask CDN | Máscara visual para campos de telefone |
| WhatsApp link | Canal de contato público via `wa.me` |

---

## 📌 Status Técnico

| Item | Status |
| --- | --- |
| Backend PHP | Implementado |
| Frontend público | Implementado |
| Autenticação | Implementada com sessão |
| Banco relacional | Implementado |
| Docker | Não detectado |
| Testes automatizados | Não detectados |
| Workers/filas | Não detectados |
| Cache | Não detectado |
| WebSocket | Não detectado |
| IA/ML | Não detectado |

---

## 📄 Licença

Nenhum arquivo de licença foi detectado no repositório. Defina uma licença antes de publicar este projeto como open source.
