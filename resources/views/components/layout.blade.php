@php
  $currentUrls = explode("/",url()->full());
  $typeUser = $currentUrls[3];

  if(sizeof($currentUrls) <= 5){
    $currentUrl = end($currentUrls);
  }else{
    $currentUrl = $currentUrls[4];
  }
  try{
    $currentActive = explode('?',$currentUrl)[0];
  }catch(Exception $e){
    $currentActive = $currentUrl;
  }
@endphp
<x-header />
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('/')}}dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div> -->

  <!-- Navbar -->
  <x-navigation />
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
      <img src="{{asset('/')}}dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Toko Jago</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        @if($typeUser == "admin")
          <x-sidebarAdmin :currentActive="$currentActive"/>
        @else
          <x-sidebarKasir :currentActive="$currentActive"/>
        @endif
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <x-breadcrumbs :currentActive="ucfirst($currentActive)"/>
    <!-- /.content-header -->

    <!-- Main content -->
    {{$slot}}
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<x-footer />