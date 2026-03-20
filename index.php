<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
header('Content-Type: text/html; charset=utf-8');

require_once $_SERVER['DOCUMENT_ROOT'] . "/meto/cone.php";



?>






<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EmpregaMeto | Universidade Metodista de São Paulo</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>
<body>

<nav id="navbar">
  <div class="nav-inner">
    <a href="#hero" class="logo">
      <div class="logo-icon"><img src="img/icon.png" alt="Logo EmpregaMeto"></div>
      <div class="logo-text">
        <span class="logo-name">EmpregaMeto</span>
        <span class="logo-sub">Universidade Metodista de SP</span>
      </div>
    </a>
    <ul class="nav-links" id="navLinks">
      <li><a href="#sobre">Sobre</a></li>
      <li><a href="#impacto">Impacto</a></li>
      <li><a href="#capacitacoes">Capacitações</a></li>
      <li><a href="#contato">Contato</a></li>
      <li><a href="#inscricao" class="nav-cta">Participar</a></li>
      <li><a href="login.html" class="nav-ctl">Login</a></li>

    </ul>
    <button class="hamburger" id="hamburger" aria-label="Menu">
      <span></span><span></span><span></span>
    </button>
  </div>
</nav>

<section id="hero">
  <div class="hero-bg-shapes"></div>
  <div class="hero-grid"></div>
  <div class="hero-inner">
    <div class="hero-content">
      <div class="hero-badge">
        <div class="hero-dot"></div>
        <span>Programa de Empregabilidade Ativo</span>
      </div>
      <h1 class="hero-title display">
        Prepare-se para o <em>mercado de trabalho</em> com quem entende de educação
      </h1>
      <p class="hero-desc">
        O EmpregaMeto é o programa educacional da Universidade Metodista de São Paulo que conecta jovens e adultos às melhores oportunidades profissionais através de capacitações práticas e orientação personalizada.
      </p>
      <div class="hero-actions">
        <a href="#inscricao" class="btn-primary">✦ Participar do Projeto</a>
        <a href="#capacitacoes" class="btn-outline">Ver Capacitações →</a>
      </div>
      <div class="hero-stats">
        <div class="hero-stat"><span class="num">+2.400</span><span class="lbl">Alunos Capacitados</span></div>
        <div class="hero-stat"><span class="num">87%</span><span class="lbl">Empregados</span></div>
        <div class="hero-stat"><span class="num">+1.800</span><span class="lbl">Currículos Criados</span></div>
      </div>
    </div>
    <div class="hero-visual">
      <div class="hero-illustration">
        <div class="hero-ill-header">
          <div class="hero-ill-avatar">👩‍💼</div>
          <div class="hero-ill-info">
            <div class="name">Jornada Profissional</div>
            <div class="role">Seu plano de carreira</div>
          </div>
        </div>
        <div class="hero-ill-steps">
          <div class="step-item">
            <div class="step-ico amarelo">📝</div>
            <span class="step-txt">Monte seu currículo</span>
            <span class="step-badge done">✓ Feito</span>
          </div>
          <div class="step-item">
            <div class="step-ico azul">🎯</div>
            <span class="step-txt">Prepare-se para entrevistas</span>
            <span class="step-badge progress">Em progresso</span>
          </div>
          <div class="step-item">
            <div class="step-ico verde">💼</div>
            <span class="step-txt">Conquistar emprego</span>
            <span class="step-badge" style="background:rgba(255,255,255,0.1);color:rgba(255,255,255,0.5)">Em breve</span>
          </div>
          <div class="step-item">
            <div class="step-ico" style="background:rgba(167,139,250,0.2);">🚀</div>
            <span class="step-txt">Crescimento de carreira</span>
            <span class="step-badge" style="background:rgba(255,255,255,0.1);color:rgba(255,255,255,0.5)">Em breve</span>
          </div>
        </div>
      </div>
      <div class="floating-card card1">
        <span class="fc-icon">🎓</span>
        <div class="fc-text">
          <div class="fc-val">Metodista</div>
          <div class="fc-lbl">Universidade parceira</div>
        </div>
      </div>
      <div class="floating-card card2">
        <span class="fc-icon">⭐</span>
        <div class="fc-text">
          <div class="fc-val">4.9/5</div>
          <div class="fc-lbl">Avaliação dos alunos</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="sobre">
  <div class="container">
    <div class="sobre-grid">
      <div class="sobre-info reveal">
        <span class="section-label">Sobre o Projeto</span>
        <div class="yellow-line"></div>
        <h2 class="section-title display">O que é o EmpregaMeto?</h2>
        <p style="color:var(--cinza-texto);font-size:1rem;line-height:1.8;margin-bottom:1rem;">
          O <strong>EmpregaMeto</strong> é um programa educacional voltado à empregabilidade, desenvolvido e coordenado pela <strong>Universidade Metodista de São Paulo</strong>. Nascemos com a missão de reduzir o desemprego juvenil e promover o desenvolvimento profissional integral.
        </p>
        <p style="color:var(--cinza-texto);font-size:1rem;line-height:1.8;margin-bottom:2rem;">
          Através de capacitações práticas, mentorias e materiais didáticos de qualidade, preparamos jovens e adultos para as exigências reais do mercado de trabalho moderno.
        </p>
        <div class="sobre-metodista">
          <span class="metod-icon">🏛️</span>
          <div class="metod-txt">
            <strong>Universidade Metodista de São Paulo</strong>
            Vinculado à instituição com mais de 100 anos de tradição educacional no Brasil, garantindo qualidade e credibilidade em cada capacitação.
          </div>
        </div>
      </div>
      <div class="sobre-cards reveal">
        <div class="sobre-card">
          <div class="sobre-ico blue">🎯</div>
          <div class="sobre-card-txt">
            <h3>Nossa Missão</h3>
            <p>Democratizar o acesso à educação profissional de qualidade, preparando jovens e adultos para o mercado de trabalho com habilidades técnicas e comportamentais.</p>
          </div>
        </div>
        <div class="sobre-card">
          <div class="sobre-ico yellow">💡</div>
          <div class="sobre-card-txt">
            <h3>Habilidades Técnicas</h3>
            <p>Desenvolvemos competências práticas como elaboração de currículo, uso do LinkedIn, planejamento de carreira e comunicação profissional.</p>
          </div>
        </div>
        <div class="sobre-card">
          <div class="sobre-ico green">🤝</div>
          <div class="sobre-card-txt">
            <h3>Habilidades Comportamentais</h3>
            <p>Trabalhamos inteligência emocional, trabalho em equipe, liderança, proatividade e todas as competências que o mercado valoriza.</p>
          </div>
        </div>
        <div class="sobre-card">
          <div class="sobre-ico" style="background:rgba(167,139,250,0.1);">🌱</div>
          <div class="sobre-card-txt">
            <h3>Orientação de Carreira</h3>
            <p>Cada participante recebe acompanhamento personalizado para traçar seu caminho profissional com clareza e confiança.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="impacto">
  <div class="container impacto-inner">
    <div class="section-header center reveal">
      <span class="section-label" style="color:rgba(255,255,255,0.6)">Nosso Impacto</span>
      <div class="yellow-line" style="margin:0 auto 1.5rem;"></div>
      <h2 class="section-title display" style="color:var(--branco);">Resultados que transformam vidas</h2>
      <p class="section-desc" style="color:rgba(255,255,255,0.65);">Números reais de pessoas cujas trajetórias foram transformadas pelo EmpregaMeto.</p>
    </div>
    <div class="impacto-grid reveal">
      <div class="impacto-card">
        <span class="impacto-icon">🎓</span>
        <span class="impacto-num" data-target="2400">0</span>
        <span class="impacto-lbl">Alunos Capacitados</span>
        <div class="impacto-sub">desde o início do programa</div>
      </div>
      <div class="impacto-card">
        <span class="impacto-icon">📄</span>
        <span class="impacto-num" data-target="1800">0</span>
        <span class="impacto-lbl">Currículos Criados</span>
        <div class="impacto-sub">com modelo profissional</div>
      </div>
      <div class="impacto-card">
        <span class="impacto-icon">💼</span>
        <span class="impacto-num" data-target="2100">0</span>
        <span class="impacto-lbl">Pessoas Empregadas</span>
        <div class="impacto-sub">após participação no projeto</div>
      </div>
      <div class="impacto-card">
        <span class="impacto-icon">⭐</span>
        <span class="impacto-num" data-target="97">0</span>
        <span class="impacto-lbl">% de Satisfação</span>
        <div class="impacto-sub">avaliação dos participantes</div>
      </div>
    </div>
  </div>
</section>

<section id="capacitacoes">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-label">Aprendizado</span>
      <div class="yellow-line"></div>
      <h2 class="section-title display">Capacitações e Conteúdos</h2>
      <p class="section-desc">Videoaulas e materiais criados por especialistas para acelerar sua entrada no mercado de trabalho.</p>
    </div>
    <div class="tab-bar reveal">
      <button class="tab-btn active">🎬 Videoaulas</button>
      <button class="tab-btn">📥 Materiais</button>
    </div>

    <!-- VIDEOS TAB -->
    <div class="tab-content active" id="tab-videos">
      <div class="videos-grid">
        <div class="video-card reveal">
          <div class="video-player">
            <iframe src="https://www.youtube.com/embed/x7vgEHkIFKM" title="Como montar um currículo" allowfullscreen loading="lazy"></iframe>
          </div>
          <div class="video-info">
            <span class="video-tag">Currículo</span>
            <h3>Como Montar um Currículo Profissional</h3>
            <p>Aprenda as melhores práticas para criar um currículo que se destaca e conquista recrutadores.</p>
          </div>
        </div>
        <div class="video-card reveal">
          <div class="video-player">
            <iframe src="https://www.youtube.com/embed/h3rTMRkAcuE" title="Como se preparar para entrevista" allowfullscreen loading="lazy"></iframe>
          </div>
          <div class="video-info">
            <span class="video-tag">Entrevista</span>
            <h3>Como se Preparar para uma Entrevista</h3>
            <p>Dicas práticas para se sair bem em entrevistas de emprego e causar uma boa primeira impressão.</p>
          </div>
        </div>
        <div class="video-card reveal">
          <div class="video-player">
            <iframe src="https://www.youtube.com/embed/DQXNqdHm-Oc" title="Comunicação profissional" allowfullscreen loading="lazy"></iframe>
          </div>
          <div class="video-info">
            <span class="video-tag">Comunicação</span>
            <h3>Comunicação Profissional no Trabalho</h3>
            <p>Desenvolva habilidades de comunicação verbal, escrita e não-verbal para ambientes corporativos.</p>
          </div>
        </div>
        <div class="video-card reveal">
          <div class="video-player">
            <iframe src="https://www.youtube.com/embed/Mss3NNQtBrw" title="Como usar o LinkedIn" allowfullscreen loading="lazy"></iframe>
          </div>
          <div class="video-info">
            <span class="video-tag">LinkedIn</span>
            <h3>Como Usar o LinkedIn para se Destacar</h3>
            <p>Otimize seu perfil do LinkedIn e use a maior rede profissional do mundo a seu favor.</p>
          </div>
        </div>
        <div class="video-card reveal">
          <div class="video-player">
            <iframe src="https://www.youtube.com/embed/A5UAm2BPbOc" title="Planejamento de carreira" allowfullscreen loading="lazy"></iframe>
          </div>
          <div class="video-info">
            <span class="video-tag">Carreira</span>
            <h3>Planejamento de Carreira a Longo Prazo</h3>
            <p>Aprenda a definir metas profissionais claras e construir uma trajetória de carreira sólida.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="tab-content" id="tab-materiais">
      <div class="materiais-grid">
        <div class="material-card reveal">
          <div class="material-ico">📄</div>
          <div class="material-txt">
            <h3>Modelo de Currículo em PDF</h3>
            <p>Template profissional e moderno para você preencher com seus dados e se destacar nas seleções.</p>
            <span class="material-dl">⬇ Baixar gratuitamente</span>
          </div>
        </div>
        <div class="material-card reveal">
          <div class="material-ico">🎯</div>
          <div class="material-txt">
            <h3>Guia para Entrevistas de Emprego</h3>
            <p>E-book completo com as perguntas mais frequentes, como respondê-las e dicas de postura.</p>
            <span class="material-dl">⬇ Baixar gratuitamente</span>
          </div>
        </div>
        <div class="material-card reveal">
          <div class="material-ico">🌟</div>
          <div class="material-txt">
            <h3>Dicas para Primeiro Emprego</h3>
            <p>Guia especial para quem está buscando a primeira oportunidade no mercado de trabalho.</p>
            <span class="material-dl">⬇ Baixar gratuitamente</span>
          </div>
        </div>
        <div class="material-card reveal">
          <div class="material-ico">✅</div>
          <div class="material-txt">
            <h3>Checklist para Busca de Emprego</h3>
            <p>Lista completa com todos os passos para organizar sua busca por emprego de forma estratégica.</p>
            <span class="material-dl">⬇ Baixar gratuitamente</span>
          </div>
        </div>
        <div class="material-card reveal">
          <div class="material-ico">💼</div>
          <div class="material-txt">
            <h3>Guia de Carreira Metodista</h3>
            <p>Material exclusivo desenvolvido pela Universidade Metodista com orientações de carreira para o mercado atual.</p>
            <span class="material-dl">⬇ Baixar gratuitamente</span>
          </div>
        </div>
        <div class="material-card reveal">
          <div class="material-ico">🔗</div>
          <div class="material-txt">
            <h3>Kit LinkedIn Profissional</h3>
            <p>Passo a passo para criar e otimizar seu perfil no LinkedIn e atrair oportunidades de emprego.</p>
            <span class="material-dl">⬇ Baixar gratuitamente</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="inscricao">
  <div class="container">
    <div class="inscricao-grid">
      <div class="inscricao-info reveal">
        <span class="section-label">Inscrição</span>
        <div class="yellow-line"></div>
        <h2 style="font-family:'DM Serif Display',serif;font-size:clamp(1.8rem,3vw,2.6rem);line-height:1.2;margin-bottom:1rem;">
          Comece sua jornada profissional hoje mesmo
        </h2>
        <p>Inscreva-se gratuitamente no EmpregaMeto e tenha acesso a todo o conteúdo, materiais e suporte para transformar sua carreira.</p>
        <div class="inscricao-perks">
          <div class="perk">Acesso a todas as videoaulas</div>
          <div class="perk">Materiais para download gratuitos</div>
          <div class="perk">Orientação personalizada de carreira</div>
          <div class="perk">Certificado de participação da Metodista</div>
          <div class="perk">Conexão com oportunidades de emprego</div>
        </div>
      </div>
     
      <!--<div class="form-card reveal">!-->
        <form method ="post" action ="inscrever.php" class="form-card reveal" onsubmit="return validarform(event)">
        <h3>Faça sua Inscrição</h3>
        <p>Preencha o formulário e entraremos em contato em até 48 horas.</p>
        <div id="form-fields">
          <div class="form-group">
            <label>Nome Completo *</label>
            <input type="text" name = "nome" id="nome" placeholder="Seu nome completo" required>
          </div>
          <div class="form-group">
            <label>RA (Registro Acadêmico) *</label>
            <input type="number" name = "RA" id="RA" placeholder="Seu RA na Metodista" required>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label>Email *</label>
              <input type="email" name = "email" id="email" placeholder="seu@email.com" required>
            </div>
            <div class="form-group">
              <label>Telefone *</label>
              <input type="tel" name = "telefone" id="telefone" class = "telefone" placeholder="(11) 99999-9999" pattern="\(\d{2}\) \d{5}-\d{4}" required>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group">
              <label>Idade *</label>
              <input type="number" name = "idade" id="idade" placeholder="Sua idade" min="14" max="99" required>
            </div>
            <div class="form-group">
              <label>Área de Interesse *</label>
              <select name = "curso" id= "curso" required>
                <option value="">Selecione...</option>
                <option>Administração e Gestão</option>
                <option>Tecnologia da Informação</option>
                <option>Saúde e Bem-estar</option>
                <option>Comunicação e Marketing</option>
                <option>Finanças e Contabilidade</option>
                <option>Educação e Pedagogia</option>
                <option>Engenharia e Produção</option>
                <option>Vendas e Atendimento</option>
                <option>Recursos Humanos</option>
                <option>Outra área</option>
              </select>
            </div>
          </div>
          <button id="btn-submit" class="btn-submit">Enviar Inscrição ✦</button>
          <div id="loading-overlay" class="loading-overlay" aria-hidden="true">
            <span class="loading-circle" aria-label="Carregando"></span>
          </div>
        </div>
          </form>
      </div>
    </div>
  </div>
</section>

<section id="contato">
  <div class="container">
    <div class="section-header center reveal">
      <span class="section-label">Fale Conosco</span>
      <div class="yellow-line"></div>
      <h2 class="section-title display">Entre em Contato</h2>
      <p class="section-desc">Tem dúvidas sobre o programa? Nossa equipe está pronta para ajudar você.</p>
    </div>
    <div class="contato-grid reveal">
      <div class="contato-card">
        <span class="contato-ico">✉️</span>
        <h3>E-mail</h3>
        <p>Envie suas dúvidas para<br><a href="mailto:empregamoto@metodista.br">empregamoto@metodista.br</a></p>
      </div>
      <div class="contato-card">
        <span class="contato-ico">💬</span>
        <h3>WhatsApp</h3>
        <p>Fale diretamente com nossa equipe<br><a href="https://wa.me/5511999999999" target="_blank">(11) 99999-9999</a></p>
      </div>
      <div class="contato-card">
        <span class="contato-ico">🏛️</span>
        <h3>Universidade Metodista de São Paulo</h3>
        <p>R. do Sacramento, 230 - Rudge Ramos<br>São Bernardo do Campo – SP<br><a href="https://www.metodista.br" target="_blank">www.metodista.br</a></p>
      </div>
    </div>
  </div>
</section>

<footer>
  <div class="footer-inner">
    <div class="footer-top">
      <div class="footer-brand">
        <div class="footer-logo">
          <div class="footer-logo-icon">EM</div>
          <div>
            <div class="footer-logo-name">EmpregaMeto</div>
            <div class="footer-logo-sub">Universidade Metodista de SP</div>
          </div>
        </div>
        <p class="footer-desc">Capacitando jovens e adultos para o mercado de trabalho com educação de qualidade e compromisso social. Um projeto da Universidade Metodista de São Paulo.</p>
        <div class="social-links">
          <a href="#" class="social-link" aria-label="Instagram">📷</a>
          <a href="#" class="social-link" aria-label="LinkedIn">💼</a>
          <a href="#" class="social-link" aria-label="YouTube">▶️</a>
          <a href="#" class="social-link" aria-label="Facebook">📘</a>
        </div>
      </div>
      <div class="footer-col">
        <h4>Navegação</h4>
        <ul>
          <li><a href="#sobre">Sobre o Projeto</a></li>
          <li><a href="#capacitacoes">Videoaulas</a></li>
          <li><a href="#capacitacoes">Materiais</a></li>
          <li><a href="#impacto">Nosso Impacto</a></li>
          <li><a href="#inscricao">Inscrição</a></li>
          <li><a href="#contato">Contato</a></li>
        </ul>
      </div>
      <div class="footer-col">
        <h4>Capacitações</h4>
        <ul>
          <li><a href="#capacitacoes">Como Montar um Currículo</a></li>
          <li><a href="#capacitacoes">Preparação para Entrevistas</a></li>
          <li><a href="#capacitacoes">Comunicação Profissional</a></li>
          <li><a href="#capacitacoes">Como Usar o LinkedIn</a></li>
          <li><a href="#capacitacoes">Planejamento de Carreira</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <span>© 2025 EmpregaMeto — Universidade Metodista de São Paulo. Todos os direitos reservados.</span>
      <span>Desenvolvido com 💛 para transformar carreiras</span>
    </div>
  </div>
</footer>

  <div id="popup" class="popup" aria-hidden="true">
    <div class="popup-card" role="alertdialog" aria-modal="true" aria-labelledby="popup-title">
      <div class="popup-header">
        <span id="popup-title">Atenção</span>
        <button id="popup-close" class="popup-close" type="button" aria-label="Fechar">X</button>
      </div>
      <p id="popup-message" class="popup-message"></p>
      <div class="popup-actions">
        <button id="popup-ok" class="btn-primary" type="button">Ok</button>
      </div>
    </div>
  </div>
</body>

<script src="script.js?v=2"></script>
<!-- Incluir JQuery e JQuery Mask -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>


<script>
  $(document).ready(function(){
    $('.telefone').mask('(00) 00000-0000');
  });
</script>
</html> 



