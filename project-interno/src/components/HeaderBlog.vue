<template>
  <header class="header center">
    <div class="header__left">
      <router-link to="/project-interno/" class="header__link"
        ><img src="../assets/img/Logo.png" alt="logo"
      /></router-link>
    </div>
    <div class="header__right">
      <router-link to="/project-interno/" class="header__link"
        >Home</router-link
      >
      <router-link to="/project-interno/project" class="header__link"
        >Project</router-link
      >
      <router-link to="/project-interno/blog" class="header__link"
        >Blog</router-link
      >
    </div>
  </header>
</template>

<script>
export default {
  name: "HeaderBlog",
};
</script>

<style lang="scss" scoped>
img {
  max-width: 100%;
}

.header {
  min-height: 50px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-direction: row;
  flex-wrap: wrap;
  margin-top: 53px;
  margin-bottom: 53px;
  margin-left: 2%;

  &__left {
    max-width: 177px;
    display: flex;
    align-items: center;
    // padding-left: 1%;
  }

  &__right {
    display: flex;
    flex-wrap: wrap;
    gap: 50px;
    padding-right: 1%;
  }

  &__link {
    color: #292f36;
    text-align: center;
    font-family: "Jost", sans-serif;
    font-size: 20px;
    font-style: normal;
    font-weight: 400;
    line-height: 1.25;

    &:hover {
        color: #CDA274;
        transition: all 0.5s ease-out;
    }

    &:active {
        color: #4D5053;
        transition: all 0.5s ease-out;
    }

    &:focus {
        color: #CDA274;
        transition: all 0.5s ease-out;
    }
  }
}
</style>
