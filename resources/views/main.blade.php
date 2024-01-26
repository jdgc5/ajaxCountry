<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="url-base" content="{{ url('') }}">

    <title>Dashboard Template · Bootstrap v5.3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ url('assets/style/dashboard.css') }}" rel="stylesheet">
    <style>
      a {
        cursor: pointer;
      }
    </style>
  </head>
  <body>

    <!-- incluir las definiciones de símbolos de la fuente -->
    @include('extra.definition')
    @include('modal.create')
    @include('modal.edit')
    @include('modal.delete')
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
      <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" >ArgoApp</a>
      <ul class="navbar-nav flex-row d-md-none">
        <li class="nav-item text-nowrap">
          <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSearch"
            aria-controls="navbarSearch" aria-expanded="false" aria-label="Toggle search">
            <svg class="bi">
              <use xlink:href="#search" />
            </svg>
          </button>
        </li>
        <li class="nav-item text-nowrap">
          <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <svg class="bi">
              <use xlink:href="#list" />
            </svg>
          </button>
        </li>
      </ul>
      <div id="navbarSearch" class="navbar-search w-100 collapse">
        <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
      </div>
    </header>
    <div class="container-fluid">
      <div class="row">
        <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
          <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
            aria-labelledby="sidebarMenuLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2 active" aria-current="page" data-href="{{url('/')}}">
                    <svg class="bi">
                      <use xlink:href="#house-fill" />
                    </svg>
                    Dashboard
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" >
                    <svg class="bi">
                      <use xlink:href="#file-earmark" />
                    </svg>
                    Orders
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" >
                    <svg class="bi">
                      <use xlink:href="#cart" />
                    </svg>
                    Products
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" >
                    <svg class="bi">
                      <use xlink:href="#people" />
                    </svg>
                    Customers
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" >
                    <svg class="bi">
                      <use xlink:href="#graph-up" />
                    </svg>
                    Reports
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" >
                    <svg class="bi">
                      <use xlink:href="#puzzle" />
                    </svg>
                    Integrations
                  </a>
                </li>
              </ul>
              <h6
                class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-body-secondary text-uppercase">
                <span>Saved reports</span>
                <a class="link-secondary"  aria-label="Add a new report">
                  <svg class="bi">
                    <use xlink:href="#plus-circle" />
                  </svg>
                </a>
              </h6>
              <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" >
                    <svg class="bi">
                      <use xlink:href="#file-earmark-text" />
                    </svg>
                    Current month
                  </a>
                </li>
              </ul>
              <hr class="my-3">
              <ul class="nav flex-column mb-auto">
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" data-href="{{url('setting')}}">
                    <svg class="bi">
                      <use xlink:href="#gear-wide-connected" />
                    </svg>
                    Settings
                  </a>
                </li>
                <li class="nav-item">
                  <a id="moviesHref" class="nav-link d-flex align-items-center gap-2" data-href="{{ url('ajax') }}">
                    <svg class="bi">
                      <use xlink:href="#movie" />
                    </svg>
                    Movies
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" data-href="{{ url('artist') }}">
                    <svg class="bi">
                      <use xlink:href="#artist" />
                    </svg>
                    Artists
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" data-href="{{ url('disk') }}">
                    <svg class="bi">
                      <use xlink:href="#disk" />
                    </svg>
                    Disks
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" >
                    <svg class="bi">
                      <use xlink:href="#door-closed" />
                    </svg>
                    Sign out
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-flex align-items-center gap-2" >
                    <svg class="bi">
                      <use xlink:href="#door-opened" />
                    </svg>
                    Sign in
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <!-- header -->
          <div
            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Dashboard</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button type="button"
                class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                <svg class="bi">
                  <use xlink:href="#calendar3" />
                </svg>
                This week
              </button>
            </div>
          </div>
          <div id="successAlert" class="alert" style="display: none;"></div>
          <div id="errorAlert" class="alert" style="display: none;"></div>
          <div id="content"></div>
        </main>
      </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="{{ url('assets/script/dashboard.js?r=' . rand(0, 100000)) }}"></script>