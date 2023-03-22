<template>
  <div id="error_page">
    <div class="noise"></div>
    <div class="overlay"></div>
    <div class="terminal">
      <h1>Error <span class="errorcode">{{ error.statusCode }}</span></h1>
      <p class="output" v-if="error.statusCode === 404">The page you are looking for might have been removed, had its name changed or is temporarily unavailable.</p>
      <p class="output" v-else>An error occurred - {{ error.statusCode }} </p>
      <p class="output">Please <nuxt-link to="/">return to the homepage</nuxt-link>.</p>
      <p class="output">Good luck.</p>
    </div>
  </div>
</template>
<script>
  export default {
    props: ['error'],
    layout: 'error'
  }
</script>
<style scoped>
  @import 'https://fonts.googleapis.com/css?family=Inconsolata';

  #error_page {
    margin: 0 !important;
    padding: 0 !important;
    box-sizing: border-box;
    height: 100vh;
    background-color: #000000 !important;
    background-image: radial-gradient(#11581E, #041607), url("https://media.giphy.com/media/oEI9uBYSzLpBK/giphy.gif");
    background-repeat: no-repeat;
    background-size: cover;
    font-family: 'Inconsolata', Helvetica, sans-serif;
    font-size: 1.5rem;
    color: rgba(128, 255, 128, 0.8);
    text-shadow:
        0 0 1ex rgba(51, 255, 51, 1),
        0 0 2px rgba(255, 255, 255, 0.8);
  }

  .noise {
    pointer-events: none;
    position: absolute;
    width: 100%;
    height: 100%;
    background-image: url("https://media.giphy.com/media/oEI9uBYSzLpBK/giphy.gif");
    background-repeat: no-repeat;
    background-size: cover;
    z-index: -1;
    opacity: .02;
  }

  .overlay {
    pointer-events: none;
    position: absolute;
    width: 100%;
    height: 100%;
    background:
        repeating-linear-gradient(
        180deg,
        rgba(0, 0, 0, 0) 0,
        rgba(0, 0, 0, 0.3) 50%,
        rgba(0, 0, 0, 0) 100%);
    background-size: auto 4px;
    z-index: 1;
  }

  .overlay::before {
    content: "";
    pointer-events: none;
    position: absolute;
    display: block;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    background-image: linear-gradient(
        0deg,
        transparent 0%,
        rgba(32, 128, 32, 0.2) 2%,
        rgba(32, 128, 32, 0.8) 3%,
        rgba(32, 128, 32, 0.2) 3%,
        transparent 100%);
    background-repeat: no-repeat;
    animation: scan 7.5s linear 0s infinite;
  }

  @keyframes scan {
    0%        { background-position: 0 -100vh; }
    35%, 100% { background-position: 0 100vh; }
  }

  .terminal {
    box-sizing: inherit;
    position: absolute;
    height: 100%;
    width: 1000px;
    max-width: 100%;
    padding: 4rem;
    text-transform: uppercase;
  }

  .output {
    color: rgba(128, 255, 128, 0.8);
    text-shadow:
        0 0 1px rgba(51, 255, 51, 0.4),
        0 0 2px rgba(255, 255, 255, 0.8);
  }

  .output::before {
    content: "> ";
  }

  a {
    color: #fff;
    text-decoration: none;
  }

  a:hover {
    color: #fff;
  }
  a::before {
    content: "[";
  }

  a::after {
    content: "]";
  }

  .errorcode {
    color: white;
  }
</style>
