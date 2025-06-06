<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Configurações básicas do documento -->
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Photography Admin</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>
<body>
  <div class="layout">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="sidebar-header">
        <div class="logo">
          <span class="logo-icon">📸</span>
          <span class="logo-text">Lims<span class="accent">Admin</span></span>
        </div>
      </div>
      <nav class="sidebar-nav">
        <a href="#" class="nav-item active">
          <span class="nav-icon">🖼️</span>
          <span class="nav-text">Gallery</span>
        </a>
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
      <div class="sidebar-footer">
        <a href="#" class="nav-item">
          <span class="nav-icon">📤</span>
          <span class="nav-text">Logout</span>
        </a>
      </div>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
      <header class="top-bar">
        <div class="header-left">
          <h1>Upload Photos</h1>
        </div>
        <div class="header-actions">
          <button class="notification-btn">🔔</button>
          <div class="user-profile">
            <div class="avatar">PA</div>
          </div>
        </div>
      </header>

      <main class="content">
        <div class="upload-section">
          <!-- Upload Form -->
          <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="upload-flex">
              <div class="upload-area">
                <input type="file" id="photo-upload" name="image" accept="image/*" class="file-input" hidden />
                <label for="photo-upload" class="upload-placeholder">
                  <span class="upload-icon">📷</span>
                  <p>Escolha um arquivo, arraste-o e solte aqui</p>
                  <p class="upload-hint">JPG, PNG, WebP</p>
                </label>
                @error('image')
                  <p class="error">{{ $message }}</p>
                @enderror
              </div>

              <div class="metadata-form">
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" name="title" id="title" required placeholder="Enter photo title" value="{{ old('title') }}" />
                  @error('title')
                    <p class="error">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="description">Description</label>
                  <textarea name="description" id="description" rows="3" placeholder="Describe your photo">{{ old('description') }}</textarea>
                  @error('description')
                    <p class="error">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="link">External Link</label>
                  <input type="url" name="link" id="link" placeholder="https://example.com/photo" value="{{ old('link') }}" />
                  @error('link')
                    <p class="error">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="folder">Collection</label>
                  <select name="folder" id="folder">
                    <option value="" {{ old('folder') == '' ? 'selected' : '' }}>Select a collection</option>
                    <option value="landscapes" {{ old('folder') == 'landscapes' ? 'selected' : '' }}>Casamento</option>
                    <option value="portraits" {{ old('folder') == 'portraits' ? 'selected' : '' }}>Festas</option>
                    <option value="events" {{ old('folder') == 'events' ? 'selected' : '' }}>Eventos</option>
                    <option value="wildlife" {{ old('folder') == 'wildlife' ? 'selected' : '' }}>Individual</option>
                  </select>
                  @error('folder')
                    <p class="error">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="tags">Tags</label>
                  <input type="text" name="tags" id="tags" placeholder="Add tags (comma separated)" value="{{ old('tags') }}" />
                  @error('tags')
                    <p class="error">{{ $message }}</p>
                  @enderror
                </div>

                <button type="submit" class="upload-btn">Upload Photo</button>
              </div>
            </div>
          </form>

                <!-- Recent Uploads -->
          <div class="recent-uploads">
            <h2>Recent Uploads</h2>
            <div class="photo-grid">
              @forelse ($photos as $photo)
                <div class="photo-item">
                  <img src="{{ asset($photo->path) }}" alt="{{ $photo->title }}" />
                  <div class="photo-info">
                    <p class="photo-title">{{ $photo->title }}</p>
                    <span class="photo-collection">{{ $photo->collection ?? 'No Collection' }}</span>

                    <!-- Botão de deletar -->
                    <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir esta foto?');" style="margin-top: 8px;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="delete-btn">🗑️ Delete</button>
                    </form>
                  </div>
                </div>
              @empty
                <p>Sem foto</p>
              @endforelse
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</body>
</html>
