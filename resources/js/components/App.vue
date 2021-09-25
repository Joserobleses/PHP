<template>
    <main>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="https://images.unsplash.com/photo-1603252109612-24fa03d145c8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1470&q=80" alt="logo PHP_M14" width="30" height="24" /></a>
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
        <router-link exact-active-class="active" to="/"  class="nav-link active" aria-current="page">Inici</router-link>
        </li>
        <li class="nav-item">
           <router-link exact-active-class="active" to="/quadres"  class="nav-link">Quadres</router-link>
        </li>
        <li class="nav-item">
           <router-link exact-active-class="active" to="/botigues"  class="nav-link">Botigues</router-link>
        </li>
        <li class="nav-item">
           <router-link exact-active-class="active" to="/contacte"  class="nav-link">Contacte</router-link>
        </li>
        <li class="nav-item dropdown">
           <router-link exact-active-class="active" to=""  class="nav-link"></router-link>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
<div>
    <router-view></router-view>
</div>
    </main>
</template>


