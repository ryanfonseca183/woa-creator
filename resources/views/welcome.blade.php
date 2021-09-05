@extends('layouts.app')

@section('title', 'Inicio')

@push('assets-head')
    <style>
        .hero-section {
            height: 50vh;
            background-image: url('img/hero-background.jpg');
            background-size:cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .section-title {

        }
        .section-separator {
          margin: 1.5rem auto;
          width: 200px;
          background: var(--orange);
          height: 10px !important;
        }
        .section-description {

        }
        section {
          background-repeat: no-repeat;
          background-position: top center;
          background-size:contain;
          padding: 3rem 0;
        }
        .artistas {
          padding-top: 500px;
          margin-top: -300px;
          position: relative;
          z-index: -1;
        }
        .section-overlay {
          background-color: #fafafa;
          width: 100%;
          height: calc(100% - 500px);
          position: absolute;
          z-index: -1;
          top: 350px;
          left: 0;
        }
        
    </style>
@endpush
@section('body')
    <div class="shadow-sm">
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3">
                <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">Logo</a>
                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="#" class="nav-link px-2 link-secondary">Inicio</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">Artistas</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">Portfólios</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">Contato</a></li>
                </ul>
                <div class="col-md-3 text-end">
                    <a href="{{ route('login') }}" class="btn app-btn-primary me-2">Login</a>
                    <button type="button" class="btn link-primary">Cadastro</button>
                </div>
            </header>
        </div>
    </div>
    
    
    <section class="hero-section">
        <div class="container text-center h-100 d-flex align-items-center justify-content-center flex-column">
            <h1>Cupidatat voluptate</h1>
            <p class="fs-3">Aliqua in aliquip amet proident duis voluptate veniam non.</p>
            {{-- BUSCAR PORTFÓLIOS/ARTITAS --}}
            <div class="input-group input-group-lg mb-3 w-50">
                <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Artistas</button>
                <ul class="dropdown-menu">
                    <li><x-controls.toggle type="radio" label="Artistas" /></li>
                    <li><x-controls.toggle type="radio" label="Projetos" /></li>
                </ul>
                <input type="text" class="form-control" aria-label="Text input with dropdown button">
                <button class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </section>

    <section class="portfolios" >
      <div class="container">
        <div class="text-center">
          <h2>Portfólios populares</h2>
          <hr class="section-separator">
          <p>Esse ex excepteur amet quis incididunt reprehenderit reprehenderit veniam laboris.</p>
        </div>
        <div class="row">
            <div class="col">
                <div class="card mb-3">
                    <img src="{{ asset('img/portfolio-1.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
            </div>
            <div class="col">
                <div class="card mb-3">
                    <img src="{{ asset('img/portfolio-2.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
            </div>
            <div class="col">
                <div class="card mb-3">
                    <img src="{{ asset('img/portfolio-1.jpg') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Card title</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                  </div>
            </div>
        </div>
      </div>
        
    </section>

    <section class="artistas" style="background-image: url({{ asset('img/waves.png') }});">
      <div class="section-overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-4">
            <h2>Artistas em destaque</h2>
            <hr class="section-separator" style="margin: 1.5rem 0;">
            Occaecat magna voluptate sit quis Lorem mollit enim commodo voluptate nostrud Lorem. Occaecat cillum ea sit non occaecat culpa do aute ex non dolor laboris.
          </div>
            <div class="col-4">
                <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4 d-flex align-items-center justify-content-center bg-warning p-3">
                        <img src="{{ asset('img/artista-1.jpg') }}" class="img-thumbnail rounded-circle" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card mb-3">
                    <div class="row g-0">
                      <div class="col-md-4 d-flex align-items-center justify-content-center bg-warning p-3">
                        <img src="{{ asset('img/artista-2.jpg') }}" class="img-thumbnail rounded-circle" alt="...">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h5 class="card-title">Card title</h5>
                          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                      </div>
                    </div>
                </div>
                <div class="card mb-3">
                  <div class="row g-0">
                    <div class="col-md-4 d-flex align-items-center justify-content-center bg-warning p-3">
                      <img src="{{ asset('img/artista-3.jpg') }}" class="img-thumbnail rounded-circle" alt="...">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
        </div>
      </div>
    </section>
@endsection
