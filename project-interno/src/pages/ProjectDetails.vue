<template>
  <div>
    <div class="banner-projectDetails"></div>
    <div v-for="info in getProjectInfo" class="project-details center">
      <div class="project-details__text-block">
        <h2 align="center" class="project-details__heading">{{ info.heading }}</h2>
        <p align="justify" class="project-details__text">{{ info.firstparagraph }}</p>
        <p align="justify" class="project-details__text">{{ info.secondparagraph }}</p>
      </div>
      <Slider :slides="getProjectSlides" />
    </div>
  </div>
</template>

<script>
import Slider from "@/components/Slider.vue";
import { mapGetters } from "vuex";
export default {
  name: "PtojectDetails",
  components: {
    Slider,
  },

  data() {
    return {};
  },

  computed: mapGetters(["getProjectInfo", "getProjectSlides"]),
};
</script>

<style lang="scss" scoped>
.banner-projectDetails {
  max-width: 1920px;
  height: 351px;
  background: url(../assets/img/banner-projectDetails.jpg);
  margin-bottom: 200px;
}

.project-details {
  display: flex;
  flex-direction: column;
  flex-wrap: wrap;
  align-items: center;
  margin-right: 1%;
  margin-left: 1%;
  margin-bottom: 200px;

  &__text-block {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
    align-items: flex-start;
    max-width: 658px;
  }

  &__heading {
    color: #292f36;
    font-family: "DM Serif Display";
    font-size: 50px;
    font-style: normal;
    font-weight: 400;
    line-height: 125%;
    letter-spacing: 1px;
    margin-bottom: 11px;
  }

  &__text {
    color: #4d5053;
    font-family: "Jost";
    font-size: 22px;
    font-style: normal;
    font-weight: 400;
    line-height: 150%;
    letter-spacing: 0.22px;
    margin-bottom: 100px;
  }
}

@media (max-width: 480px) {

  .banner-projectDetails {
    margin-bottom: 120px;
  }

  .project-details {
    margin-bottom: 100px;
  }
}

</style>
