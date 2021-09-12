@extends('layouts.app')

@section('title', 'Inicio')

@push('assets-head')
    <style>
        .hero-section {
            height: 60vh;
            background-image: url('img/hero.jpg');
            background-size:cover;
            background-position: center;
            background-repeat: no-repeat;
            border-bottom-left-radius: 300px;
            border-bottom-right-radius: 300px;
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
          position: relative;
          padding: 3rem 0;
        }
        .artistas {
        }
        .section-overlay {
          position: absolute;
          top: -150px;
          bottom: 0;
          right: 0;
          left: 0;
          width: 100%;
          height: 100%;
          background-image: linear-gradient(#ff9d2f, #ff6126);
          transform: skewY(-6deg);
          transform-origin: top right;
        }
        
    </style>
@endpush
@section('body')
    <section class="hero-section">
        <div class="container text-center h-100">
          <div class="row h-100">
            <div class="col-12">
              <header class="d-flex align-items-center w-100 justify-content-between">
                <a href="/">
                  <img src="{{ asset('img/logo.png') }}" alt="" class="img-fluid mb-4" style="max-height: 150px">
                </a>
                <ul class="nav ">
                    <li><a href="#" class="nav-link px-2 link-secondary">Inicio</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">Artistas</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">Portfólios</a></li>
                    <li><a href="#" class="nav-link px-2 link-dark">Contato</a></li>
                </ul>
                <div class="text-end">
                    <a href="{{ route('login') }}" class="btn app-btn-primary me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn link-primary">Cadastro</a>
                </div>
              </header>
            </div>
            <div class="col align-self-center">
              <h1>Cupidatat voluptate</h1>
              <p class="fs-3 mb-5">Aliqua in aliquip amet proident duis voluptate veniam non.</p>
              <div class="input-group input-group-lg mb-3 w-50 mx-auto">
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

    <section class="artistas">
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
