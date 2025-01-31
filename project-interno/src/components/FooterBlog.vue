<template>
  <div class="footer center">
    <div class="footer__content">
      <div class="footer__interno">
        <div class="footer__logo">
          <router-link to="/project-interno/" class="footer__pages__link"><img src="../assets/img/Logo.png"
              alt="logo" /></router-link>
        </div>
        <div class="footer__interno__text">
          It is a long established fact that a reader will be distracted
          lookings.
        </div>
        <div class="footer__interno__icons">
          <a href="https://twitter.com/home"><img src="../assets/img/icon1.svg" alt="icon" /></a>
          <a href="https://www.linkedin.com/in"><img src="../assets/img/icon2.svg" alt="" /></a>
        </div>
      </div>
      <div class="footer__pages">
        <h3 class="footer__pages__title">Pages</h3>
        <router-link to="/project-interno/" class="footer__pages__link">Home</router-link>
        <router-link to="/project-interno/blog" class="footer__pages__link">Blog</router-link>
        <router-link to="/project-interno/project" class="footer__pages__link">Project</router-link>
      </div>
      <!-- <div class="footer__services"></div> -->
      <div class="footer__contact">
        <div class="footer__contact__contact">Contact</div>
        <div class="footer__contact__desc">
          55 East Birchwood Ave. Brooklyn, New York 11201
        </div>
        <div class="footer__contact__desc">contact@interno.com</div>
        <div class="footer__contact__desc">(123) 456 - 7890</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "FooterBlog",
};
</script>

<style lang="scss" scoped>
img {
  max-width: 100%;
}

.footer {
  display: flex;
  // width: 1920px;
  gap: 134px;
  margin-top: 76px;
  margin-bottom: 134px;

  &__logo {
    max-width: 177px;
  }

  &__content {
    display: flex;
    justify-content: center;
    flex-direction: row;
    flex-wrap: wrap;
    max-width: 1199px;
    align-items: center;
    gap: 101px;
  }

  &__interno {
    display: flex;
    width: 393px;
    flex-direction: column;
    align-items: flex-start;
    &__text {
      padding-bottom: 31px;
      color: #4d5053;
      font-family: Jost;
      font-size: 22px;
      font-style: normal;
      font-weight: 400;
      line-height: 150%;
      /* 33px */
      letter-spacing: 0.22px;
    }

    &__icons {
      display: flex;
      width: 225px;
      align-items: center;
      gap: 54px;
    }
  }

  &__pages {
    display: flex;
    width: 125px;
    flex-direction: column;
    align-items: flex-start;
    gap: 9px;

    &__title {
      color: #292f36;
      font-family: DM Serif Display;
      font-size: 25px;
      font-style: normal;
      font-weight: 400;
      line-height: 125%;
    }

    &__link {
      color: #4d5053;
      font-family: Jost;
      font-size: 22px;
      font-style: normal;
      font-weight: 400;
      line-height: 300%;
      letter-spacing: 0.22px;
    }
  }

  &__services {
    display: flex;
    width: 120px;
    height: 66px;
    flex-direction: column;
    align-items: flex-start;
    gap: 9px;
  }

  &__contact {
    display: flex;
    width: 258px;
    height: 272px;
    flex-direction: column;
    align-items: stretch;
    gap: 26px;
    flex-shrink: 0;

    &__contact {
      color: #292f36;
      font-family: DM Serif Display;
      font-size: 25px;
      font-style: normal;
      font-weight: 400;
      line-height: 125%;
      /* 31.25px */
    }

    &__desc {
      flex-direction: column;
      color: #4d5053;
      font-family: Jost;
      font-size: 22px;
      font-style: normal;
      font-weight: 400;
      line-height: 150%;
      /* 33px */
      letter-spacing: 0.22px;
    }
  }
}

@media (max-width: 768px) {
  .footer__interno {
    width: 370px;
    padding-left: 15px;
    &__content {
      gap: 51px;
    }
  }
}
</style>
