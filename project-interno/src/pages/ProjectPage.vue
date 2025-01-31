<template>
  <div>
    <!-- <div class="banner-project">
      <img src="@/assets/img/banner.png" alt="photo" class="banner-project__photo" />      
    </div> -->
    <div class="banner-project">
      <img src="@/assets/img/banner-project1.jpg" alt="photo" class="banner-project__photo" />
      <div class="banner-project__intro">
        <h2 class="banner-project__intro__title">Our Project</h2>
        <div class="banner-project__intro__link">
          <router-link to="/project-interno/" class="header__link">Home</router-link>
          /
          <router-link to="/project-interno/project" class="header__link">Project</router-link>
        </div>
      </div>
    </div>
    <div class="projects center">
      <div class="projects__content">
        <div class="categories">
          <div class="categories__content">
            <button v-for="button in listOfButtons" :key="button.id" @click="changeProject(button.id)" type="button"
              :class="[
                'categories__btn',
                button.id === buttonIsActive ? 'categories__btn_active' : false,
              ]">
              {{ button.title }}
            </button>
          </div>
        </div>
        <div class="projects__items">
          <ProjectComponent v-for="project in displayedProduct" :key="project.id" :projectData="project" />
        </div>
        <pagination :totalPages="setTotalPages()" :currentPage="currentPage" :pageKey="pageKey"
          @pagechanged="onPageChange" />
      </div>
    </div>
  </div>
</template>

<script>
import ProjectComponent from "@/components/ProjectComponent.vue";
import Pagination from "@/components/Pagination.vue";
import { mapGetters } from "vuex";

export default {
  name: "ProjectPage",
  components: { ProjectComponent, Pagination },
  data() {
    return {
      currentPage: 1,
      limitOfProductPerPage: 8,
      pageKey: "project-interno/project",
      currentCategoryList: [
        {
          id: "33",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom0.png"),
          alt: "bedroom one",
          firstparagraph: "Minimal Bedroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "34",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom1.png"),
          alt: "bedroom two",
          firstparagraph: "Classic Minimal Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "35",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom2.png"),
          alt: "bedroom three",
          firstparagraph: "Minimal Bathroom Table",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "36",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom3.png"),
          alt: "bedroom four",
          firstparagraph: "Modern Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "37",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom4.png"),
          alt: "bedroom five",
          firstparagraph: "Minimal Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "38",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom5.png"),
          alt: "bedroom six",
          firstparagraph: "Modern Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "39",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom6.png"),
          alt: "bedroom seven",
          firstparagraph: "System Table",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "40",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom7.png"),
          alt: "bedroom eight",
          firstparagraph: "Modern Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "41",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom8.png"),
          alt: "bedroom one",
          firstparagraph: "Minimal Bedroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "42",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom1.png"),
          alt: "bedroom two",
          firstparagraph: "Classic Minimal Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "43",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom2.png"),
          alt: "bedroom three",
          firstparagraph: "Minimal Bathroom Table",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "44",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom4.png"),
          alt: "bedroom four",
          firstparagraph: "Modern Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "45",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom12.png"),
          alt: "bedroom five",
          firstparagraph: "Minimal Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "46",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom5.png"),
          alt: "bedroom six",
          firstparagraph: "Modern Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "47",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom6.png"),
          alt: "bedroom seven",
          firstparagraph: "System Table",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "48",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom7.png"),
          alt: "bedroom eight",
          firstparagraph: "Modern Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "49",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom5.png"),
          alt: "bedroom one",
          firstparagraph: "Minimal Bedroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "50",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom1.png"),
          alt: "bedroom two",
          firstparagraph: "Classic Minimal Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "51",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom2.png"),
          alt: "bedroom three",
          firstparagraph: "Minimal Bathroom Table",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "52",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom3.png"),
          alt: "bedroom four",
          firstparagraph: "Modern Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "53",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom7.png"),
          alt: "bedroom five",
          firstparagraph: "Minimal Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "54",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom0.png"),
          alt: "bedroom six",
          firstparagraph: "Modern Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "55",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom6.png"),
          alt: "bedroom seven",
          firstparagraph: "System Table",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "56",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom2.png"),
          alt: "bedroom eight",
          firstparagraph: "Modern Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "57",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom8.png"),
          alt: "bedroom one",
          firstparagraph: "Minimal Bedroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "58",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom1.png"),
          alt: "bedroom two",
          firstparagraph: "Classic Minimal Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "59",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom0.png"),
          alt: "bedroom three",
          firstparagraph: "Minimal Bathroom Table",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "60",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom4.png"),
          alt: "bedroom four",
          firstparagraph: "Modern Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "61",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom12.png"),
          alt: "bedroom five",
          firstparagraph: "Minimal Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "62",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom5.png"),
          alt: "bedroom six",
          firstparagraph: "Modern Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "63",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom6.png"),
          alt: "bedroom seven",
          firstparagraph: "System Table",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "64",
          tag: "bedroom",
          src: require("@/assets/img/project-bedRoom3.png"),
          alt: "bedroom eight",
          firstparagraph: "Modern Bathroom",
          secondparagraph: "Decor / Artchitecture",
        },
      ],

      listOfButtons: [
        { id: "bathroom", title: "Bathroom" },
        { id: "bedroom", title: "Bedroom" },
        { id: "kitchen", title: "Kitchen" },
        { id: "livingroom", title: "LivingArea" },
      ],

      buttonIsActive: "bedroom",
    };
  },

  methods: {
    setTotalPages() {
      return Math.ceil(
        this.currentCategoryList.length / this.limitOfProductPerPage
      );
    },

    changeProject(id) {
      // this.currentPage = 1;
      // this.$router[''];
      const buttonId = id;
      this.currentCategoryList = [];
      this.getAllCategoriesList.forEach((project) => {
        if (project.tag === buttonId) {
          this.buttonIsActive = id;
          this.currentPage = 1;
          this.currentCategoryList.push(project);
        }
        return this.currentCategoryList;
      });
      this.$router.push(`/${this.pageKey}/${this.buttonIsActive}/ `);
    },

    paginateListOfProduct(listOfProduct) {
      let page = this.currentPage;
      let perPage = this.limitOfProductPerPage;
      let from = page * perPage - perPage;
      let to = page * perPage;
      return listOfProduct.slice(from, to);
    },
    onPageChange(page) {
      this.currentPage = page;
      this.$router.push(
        `/${this.pageKey}/${this.buttonIsActive}/${this.currentPage}`
      );
    },
  },
  computed: {
    ...mapGetters(["getAllCategoriesList"]),
    displayedProduct() {
      return this.paginateListOfProduct(this.currentCategoryList);
    },
  },
};
</script>
<style lang="scss" scoped>
.header {
  &__link {
    color: #292f36;
    text-align: center;
    font-family: " DM Serif Display", sans-serif;
    font-size: 20px;
    font-style: normal;
    font-weight: 400;
    line-height: 25px;
  }
}

.banner-project {
  // max-width: 1920px;
  // height: auto;
  // position: relative;
  display: flex;
  justify-content: center;
  align-items: end;
  // height: 356px;
  // background: url(../assets/img/banner-project1.jpg);
  // background-repeat: no-repeat;

  &__photo {
    // display: flex;
    // max-width: 1910px;
    height: 365px;
    // position: relative;
    // object-fit: contain;
  }

  &__intro {
    position: absolute;
    display: flex;
    width: 503px;
    height: 178px;
    padding: 41px 78px;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    border-radius: 37px 37px 0px 0px;
    background: #fff;

    &__title {
      color: #292f36;
      font-family: DM Serif Display;
      font-size: 50px;
      font-style: normal;
      font-weight: 400;
      line-height: 125%;
      /* 62.5px */
    }

    &__link {
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

.categories {
  margin-bottom: 61px;

  &__content {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    border-radius: 18px;
    border: 1px solid #e7e7e7;
    margin-left: 50px;
    margin-right: 50px;
  }

  &__btn {
    text-align: center;
    letter-spacing: 0.36px;
    border: 1px;
    border-radius: 18px;
    background-color: #ffffff;
    padding: 26px 66px;
    width: 230px;
    color: #292f36;
    font-family: "Jost", sans-serif;
    font-weight: 600;
    font-style: normal;
    font-size: 18px;
    line-height: 1.25;
    transition: all 0.5s ease-out;

    &:hover {
      background-color: #cda274;
      transition: all 0.8s ease-out;
    }

    &:focus {
      color: #ffffff;
      background-color: #292f36;
      transition: all 0.8s ease-out;
    }
  }

  &__btn_active {
    color: #ffffff;
    background-color: #292f36;
  }
}

.projects {
  margin-top: 175px;

  &__items {
    display: flex;
    flex-direction: column;
    align-items: center;
    flex-wrap: wrap;
    gap: 30px;
    height: 3230px;
    margin-bottom: 61px;
  }

  &__item {
    position: relative;
  }
}

@media (max-width: 1240px) {
  .banner-project {
    max-width: 1220px;

    &__photo {
      height: 275px;
    }

    &__intro {
      width: 353px;
      height: 128px;
      padding: 21px 32px;
      gap: 8px;
      font-size: 42px;
    }
  }

  .projects {
    margin-top: 155px;
    &__items {
      height: 2770px;
      gap: 20px;
    }
  }
}

@media (max-width: 992px) {
  .banner-project {
    max-width: 1220px;
    &__photo {
      height: 275px;
    }
    &__intro {
      width: 353px;
      height: 128px;
      padding: 21px 32px;
      gap: 8px;
    }
  }

  .projects {
    margin-top: 75px;

    &__items {
      height: 2130px;
      gap: 10px;
    }
  }
}

@media (max-width: 768px) {
  
  .banner-project {
    max-width: 1220px;
    &__photo {
      height: 185px;
    }
    &__intro {
      width: 253px;
      height: 88px;
      padding: 11px 21px;
      &__title {
        font-size: 34px;
      }
      &__link {
        font-size: 18px;
      }
    }
  }

  .projects {
    margin-top: 75px;
    &__items {
      height: auto;
      gap: 50px;
    }
  }
}

@media (max-width: 480px) {
  .banner-project {
    max-width: 1220px;
    &__photo {
      height: 175px;
    }
    &__intro {
      width: 223px;
      height: 78px;
      padding: 11px 21px;
      &__title {
        font-size: 28px;
      }
      &__link {
        font-size: 14px;
      }
    }
  }

  .projects {
    margin-top: 75px;
    &__items {
      height: auto;
      gap: 50px;
    }
  }
}
</style>
