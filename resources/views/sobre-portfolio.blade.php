<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sobre Jácila - Portfólio</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="stylesheet" href="{{ asset('css/sobreport.css') }}">
    </head>
    <body>
        <section id="about" class="about">
            <h2>SOBRE MIM</h2>
            <div class="about-content">
              <div class="about-image">
                <img src="{{ asset('img/rapha4.jpeg') }}" alt="rapha with cake">
              </div>
              <div class="about-text">
                <p>Minha jornada na fotografia começou há 5 anos, capturando momentos únicos e emocionantes. Especializada em fotografia de retratos, casamentos e eventos, busco sempre trazer à tona a verdadeira essência de cada momento.</p>
                <button class="consultation-btn">AGENDE UMA CONSULTA</button>
              </div>
            </div>
          </section>
    
          <section id="portfolio" class="portfolio">
            <h2>PORTFÓLIO</h2>
            <div class="portfolio-grid">
              <div class="portfolio-item">
                <img src="https://images.pexels.com/photos/1043902/pexels-photo-1043902.jpeg" alt="Wedding photography">
                <div class="portfolio-overlay">
                  <h3>CASAMENTOS</h3>
                  <button>VER MAIS</button>
                </div>
              </div>
              <div class="portfolio-item">
                <img src="https://images.pexels.com/photos/3875080/pexels-photo-3875080.jpeg" alt="Portrait photography">
                <div class="portfolio-overlay">
                  <h3>RETRATOS</h3>
                  <button>VER MAIS</button>
                </div>
              </div>
              <div class="portfolio-item">
                <img src="https://images.pexels.com/photos/3875084/pexels-photo-3875084.jpeg" alt="Family photography">
                <div class="portfolio-overlay">
                  <h3>FAMÍLIA</h3>
                  <button>VER MAIS</button>
                </div>
              </div>
            </div>
          </section>
        </main>
    
  
    </body>
</html>