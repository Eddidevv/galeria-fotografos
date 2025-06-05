<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Ícones Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <!-- Style CSS -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

    </head>
    <body>
        <header>
            <div class="head_left">
              <a href="#">JÁCILA LIMA</a>
            </div>
            <nav class="head_right">
              <button>SOBRE MIM</button>
              <button>PORTIFÓLIO</button>
              <button>CONTATO</button>
            </nav>
          </header>
      
          <section>
            <div class="background">
              <div class="bg-left">
                <h1>OLÁ, TUDO BEM?</h1>
                <div class="bg-left-children">
                  <p>
                    SOU FOTÓGRAFA PROFISSIONAL E ESTOU AQUI
                    PARA IMORTALIZAR SUA HISTÓRIA ATRAVÉS DAS
                    LENTES.
                  </p>
                </div>
                <div class="btn">
                  <button>MEUS TRABALHOS</button>
                  <div class="social-icons">
                    <a href="https://wa.me/5511999999999" target="_blank" rel="noopener noreferrer">
                      <i class="fab fa-whatsapp"></i>
                    </a>
                    <a href="https://instagram.com/seuinstagram" target="_blank" rel="noopener noreferrer">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </div>
                </div>
              </div>
              <div class="bg-right">
                <img 
                    src="{{ asset('img/rapha2.jpeg') }}" 
                    alt="Photographer taking photos"
                />
                <div class="photo-stack">
                    <div class="polaroid polaroid-1">
                        <img 
                            src="{{ asset('img/betinho.jpeg') }}" 
                            alt="Portrait photo"
                        />
                    </div>
                    <div class="polaroid polaroid-2">
                        <img 
                            src="{{ asset('img/rapha3.jpeg') }}" 
                            alt="Portrait photo"
                        />
                    </div>
                </div>
              </div>
            </div>
          </section>
      
          <footer>
            <div class="footer-content">
              <p>© 2025 Jácila Lima - Todos os direitos reservados.</p>
            </div>
          </footer>
    </body>
</html>