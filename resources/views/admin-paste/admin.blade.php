<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Configurações básicas do documento -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Photography Admin</title>
  <!-- Estilo CSS externo -->
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
  <!-- Layout principal com barra lateral e conteúdo -->
  <div class="layout">
    
    <!-- Barra lateral de navegação -->
    <aside class="sidebar">
      
      <!-- Cabeçalho da barra lateral com logo -->
      <div class="sidebar-header">
        <div class="logo">
          <span class="logo-icon">📸</span>
          <span class="logo-text">Lims<span class="accent">Admin</span></span>
        </div>
      </div>
      
      <!-- Menu de navegação lateral -->
      <nav class="sidebar-nav">
        <!-- Item ativo: Galeria -->
        <a href="#" class="nav-item active">
          <span class="nav-icon">🖼️</span>
          <span class="nav-text">Gallery</span>
        </a>
        <!-- Outras seções do painel -->
        <a href="#" class="nav-item">
          <span class="nav-icon">📁</span>
          <span class="nav-text">Collections</span>
        </a>
        <a href="#" class="nav-item">
          <span class="nav-icon">🏷️</span>
          <span class="nav-text">Tags</span>
        </a>
        <a href="#" class="nav-item">
          <span class="nav-icon">⚙️</span>
          <span class="nav-text">Settings</span>
        </a>
      </nav>
      
      <!-- Rodapé da barra lateral com botão de logout -->
      <div class="sidebar-footer">
        <a href="#" class="nav-item">
          <span class="nav-icon">📤</span>
          <span class="nav-text">Logout</span>
        </a>
      </div>
    </aside>

    <!-- Área principal de conteúdo -->
    <div class="main-content">
      
      <!-- Barra superior com título e ações -->
      <header class="top-bar">
        <div class="header-left">
          <h1>Upload Photos</h1>
        </div>
        <div class="header-actions">
          <!-- Botão de notificações e avatar do usuário -->
          <button class="notification-btn">🔔</button>
          <div class="user-profile">
            <div class="avatar">PA</div>
          </div>
        </div>
      </header>

      <!-- Conteúdo principal -->
   <!-- Conteúdo principal -->
<main class="content">
  <div class="upload-section">
    <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="upload-flex">
        <!-- Área de upload da imagem -->
        <div class="upload-area">
          <input type="file" id="photo-upload" name="image" accept="image/*" class="file-input" hidden>
          <label for="photo-upload" class="upload-placeholder">
            <span class="upload-icon">📷</span>
            <p>Escolha um arquivo, arraste-o e solte aqui</p>
            <p class="upload-hint">JPG, PNG, WebP</p>
          </label>
        </div>

        <!-- Formulário de metadados -->
        <div class="metadata-form">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required placeholder="Enter photo title">
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="3" placeholder="Describe your photo"></textarea>
          </div>
          <div class="form-group">
            <label for="link">External Link</label>
            <input type="url" name="link" id="link" placeholder="https://example.com/photo">
          </div>
          <div class="form-group">
            <label for="folder">Collection</label>
            <select name="folder" id="folder">
              <option value="">Select a collection</option>
              <option value="landscapes">Landscapes</option>
              <option value="portraits">Portraits</option>
              <option value="events">Events</option>
              <option value="wildlife">Wildlife</option>
            </select>
          </div>
          <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" name="tags" id="tags" placeholder="Add tags (comma separated)">
          </div>
          <button type="submit" class="upload-btn">Upload Photo</button>
        </div>
      </div>
    </form>

    <!-- Rodapé com uploads recentes -->
    <div class="recent-uploads">
      <h2>Recent Uploads</h2>
      <div class="photo-grid">
        <!-- Itens mockados -->
        <div class="photo-item">
          <img src="https://images.pexels.com/photos/1770809/pexels-photo-1770809.jpeg" alt="Mountain Landscape">
          <div class="photo-info">
            <p class="photo-title">Mountain Sunset</p>
            <span class="photo-collection">Landscapes</span>
          </div>
        </div>
        <div class="photo-item">
          <img src="https://images.pexels.com/photos/2014422/pexels-photo-2014422.jpeg" alt="Portrait">
          <div class="photo-info">
            <p class="photo-title">Urban Portrait</p>
            <span class="photo-collection">Portraits</span>
          </div>
        </div>
        <div class="photo-item">
          <img src="https://images.pexels.com/photos/247431/pexels-photo-247431.jpeg" alt="Wildlife">
          <div class="photo-info">
            <p class="photo-title">Wild Fox</p>
            <span class="photo-collection">Wildlife</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
