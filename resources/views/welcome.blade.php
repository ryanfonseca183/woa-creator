@extends('layouts.app')

@section('title', 'Inicio')

@section('body')
  {{-- CAMPO DE BUSCA --}}
  <section class="home-section hero-section ">
    <div class="container-md">
      <h1 class="mb-1">Explore o mundo criativo</h1>
      <p class="fs-4 text-muted mb-5">Navegue pelos trabalhos de nossos melhores artistas</p>
      <div class="card card-body card-search">
          <div class="input-group input-group-search">
              <button class="btn dropdown-toggle btn-type" type="button" data-bs-toggle="dropdown">Trabalhos</button>
              <ul class="dropdown-menu">
                  <li class="dropdown-item">
                    <x-controls.toggle type="radio" label="Trabalhos" name="type" id="type1" />
                  </li>
                  <li class="dropdown-item">
                    <x-controls.toggle type="radio" label="Artistas" name="type" id="type2" />
                  </li>
              </ul>
              <input type="text" class="form-control">
              <button class="btn btn-search"><i class="fas fa-search"></i></button>
          </div>
      </div>
    </div>
    
  </section>

  {{-- TRABALHOS POPULARES --}}
  <section class="home-section">
      <div class="container">
          <div class="text-center">
              <h2 class="mb-0">Trabalhos populares</h2>
              <p class="section-description">Esse ex excepteur amet quis incididunt reprehenderit reprehenderit veniam laboris.</p>
          </div>
          <div class="row">
              <div class="col-md-6 col-lg-4">
                  <x-trabalho />
              </div>
              <div class="col-md-6 col-lg-4">
                  <x-trabalho />
              </div>
              <div class="col-md-6 col-lg-4">
                  <x-trabalho />
              </div>
          </div>
      </div>
  </section>

  {{-- PASSOS --}}
  <section class="home-section teps-section">
      <div class="container">
          <div class="row gx-2 align-items-center">
              <div class="col">
                  <div class="step">
                      <i class="fas fa-sign-in-alt"></i>
                      <h5>Crie uma conta</h5>
                      <p>Aliquip mollit aute duis laboris adipisicing reprehenderit qui sint nostrud</p>
                  </div>
              </div>
              <div class="col-auto">
                  <img src="{{ asset('img/arrow-right.png') }}" class="step-arrow">
              </div>
              <div class="col">
                  <div class="step">
                      <i class="fas fa-sliders-h"></i>
                      <h5>Configure seu portfólio</h5>
                      <p>Anim aliqua ea proident reprehenderit cupidatat nostrud.</p>
                  </div>
              </div>
              <div class="col-auto">
                  <img src="{{ asset('img/arrow-right.png') }}" class="step-arrow">
              </div>
              <div class="col">
                  <div class="step">
                      <i class="far fa-laugh-beam"></i>
                      <h5>Divulgue seu trabalho</h5>
                      <p>Aliquip mollit aute duis laboris adipisicing reprehenderit qui sint nostrud</p>
                  </div>
              </div>
          </div>
      </div>
  </section>

  {{-- ARTISTAS POPULARES --}}
  <section class="home-section artists-section">
      <div class="container text-center">
          <h2 class="mb-0">Artistas em destaque</h2>
          <p class="section-description">Aliqua mollit eiusmod culpa laboris occaecat consequat dolor exercitation incididunt. Minim pariatur velit irure veniam. Consectetur aute qui in id incididunt irure irure mollit dolore magna culpa reprehenderit pariatur veniam.</p>
          <div class="row">
              <div class="col-md-6 col-lg-4">
                  <x-artista />
              </div>
              <div class="col-md-6 col-lg-4">
                  <x-artista />
              </div>
              <div class="col-md-6 col-lg-4">
                  <x-artista />
              </div>
          </div>
      </div>
  </section>
@endsection
