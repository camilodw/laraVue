<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info sticky-top pb-3 pt-3">
  <div class="container-fluid">
    <a class="navbar-brand">LaraGames</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <router-link to="/" class="nav-link">Home</router-link>
        </li>
<li class="nav-item">
    <a href="https://github.com/camilodw/laraVue" target="_blank" class="nav-link">Proyect</a> 
        </li>
      </ul>
    </div>
  </div>
</nav>
</template>
<script>
export default {
    name:'headerLayout'
}
</script>