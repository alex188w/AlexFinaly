<template>
  <div id="app">
    <HeaderBlog />
    <router-view />
    <FooterBlog />
  </div>
</template>

<script>
import HeaderBlog from "./components/HeaderBlog.vue";
import FooterBlog from "./components/FooterBlog.vue";

export default {
  name: "App",
  components: {
    HeaderBlog,
    FooterBlog,
  },
};
</script>

<style lang="scss">
#app {
  max-width: 1920px;
  margin: 0 auto;
}

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background: #fff;
}

img {
  max-width: 100%;
}

a {
  text-decoration: none;
}

.center {
  padding-left: calc(50% - 600px);
  padding-right: calc(50% - 600px);
}
</style>
