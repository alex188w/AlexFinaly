<template>
  <div>
    <div class="banner-blogsDetails"></div>
    <div class="blogs__sidebar">
      <div class="blogs__sidebar__content">
        <h3 class="blogs__sidebar__heading">Tags</h3>
        <div class="blogs__sidebar__buttons-box">
          <button v-for="button in buttonList" :key="button.id" @click="changeProject(button.id)" type="button" :class="[
            'blogs__sidebar__button',
            button.id === buttonIsActive
              ? 'blogs__sidebar__button_active'
              : false,
          ]">
            {{ button.title }}
          </button>
        </div>
      </div>
    </div>
    <div class="blogs center">
      <div class="blogs__details" v-for="project in currentProject" :key="project.id">
        <div class="blogs__content">
          <h2 class="blogs__content__title">{{ project.firstheading }}</h2>
          <img class="blogs__content__img" :src="project.src" alt="details" />
          <div class="blogs__content__date">
            <p class="blogs__content__date__text">{{ project.date }}</p>
            <div class="blogs__content__link">
              <a class="blogs__content__date__text" href="#">Interior</a>
              /
              <router-link to="/project-interno/" class="header__link">Home</router-link>
              /
              <a class="blogs__content__date__text" href="#">Decor</a>
            </div>
          </div>
          <p align="justify" class="blogs__content__desc">{{ project.firstparagraph }}</p>
          <br />
          <p align="justify" class="blogs__content__desc">{{ project.secondparagraph }}</p>
        </div>
        <div class="blogs__quotes">
          <div class="blogs__quotes__content">
            <img src="../assets/img/quotes1.png" alt="quotes" />
            <img src="../assets/img/quotes2.png" alt="quotes" />
          </div>
        </div>
        <div class="blogs__content">
          <h2 align="justify" class="blogs__content__title">{{ project.secondheading }}</h2>
          <p align="justify" class="blogs__content__desc">{{ project.thirdparagraph }}</p>
          <div class="blogs__content__points">
            <div class="blogs__content__points__item">
              <p class="blogs__content__points__item__text">
                {{ project.firstspan }}
              </p>
              <p align="justify" class="blogs__content__desc">{{ project.firstsubtext }}</p>
            </div>
            <div class="blogs__content__points__item">
              <p class="blogs__content__points__item__text">
                {{ project.secondspan }}
              </p>
              <p align="justify" class="blogs__content__desc">{{ project.secondsubtext }}</p>
            </div>
            <div class="blogs__content__points__item">
              <p class="blogs__content__points__item__text">
                {{ project.thirdspan }}
              </p>
              <p align="justify" class="blogs__content__desc">{{ project.thirdsubtext }}</p>
            </div>
          </div>
          <img class="blogs__content__img" :src="project.secondsrc" alt="details" />
          <p align="justify" class="blogs__content__desc thirds">
            {{ project.forthparagraph }}
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  name: "BlogDetails",

  data() {
    return {
      currentProject: [
        {
          id: "kitchen",
          firstheading: "Let’s Get Solution for Building Construction Work",
          src: require("../assets/img/kitchen1.png"),
          date: "26 December,2022",
          firstparagraph:
            "Lorem ipsum dolor sit amet, adipiscing Aliquam eu sem vitae turpmaximus.posuere in.Contrary to popular belief.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injecthumour.",
          secondparagraph:
            "Embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary.",
          secondheading: "Design sprints are great",
          thirdparagraph:
            "Lorem ipsum dolor sit amet, adipiscing Aliquam eu sem vitae turpmaximus.posuere in.Contrary to popular belief.There are many variations of passages of Lorem Ipsum available, but the majority have suffered.",
          firstspan: "1",
          firstsubtext:
            "Contrary to popular belief.There are many variations of passages of Lorem Ipsum available, but the majority have suffered.",
          secondspan: "2",
          secondsubtext:
            "Contrary to popular belief.There are many variations of passages of Lorem Ipsum available, but the majority have suffered.",
          thirdspan: "3",
          thirdsubtext:
            "Contrary to popular belief.There are many variations of passages of Lorem Ipsum available, but the majority have suffered.",
          secondsrc: require("../assets/img/kitchen1-1.png"),
          forthparagraph:
            "Contrary to popular belief.There are many variations of passages of Lorem Ipsum available, but the majority have suffered.",
        },
      ],
      buttonList: [
        { id: "kitchen", title: "Kitchen" },
        { id: "bedroom", title: "Bedroom" },
        { id: "building", title: "Building" },
        { id: "architecture", title: "Architecture" },
        { id: "kitchen-planning", title: "Kitchen Planning" },
        // { id: "bedroom-last", title: "Bedroom" },
      ],
      currentButton: [{ id: "kitchen", title: "Kitchen" }],
      buttonIsActive: "kitchen",
    };
  },

  methods: {
    changeProject(id) {
      const buttonId = id;
      this.getListOfProject.forEach((project) => {
        if (buttonId === project.id) {
          this.currentProject = [];
          this.buttonIsActive = id;
          return this.currentProject.push(project);
        }
      });
    },
  },

  computed: {
    ...mapGetters(["getListOfProject"]),
  },
};
</script>

<style lang="scss" scoped>
.banner-blogsDetails {
  max-width: 1920px;
  height: 351px;
  background: url(../assets/img/blog-details.jpg);
}

.blogs {
  display: flex;
  // max-width: 1201px;
  flex-direction: row;
  align-items: flex-start;
  gap: 52px;
  flex-wrap: wrap;
  // margin-top: 200px;

  &__details {
    display: flex;
    max-width: 804px;
    flex-direction: column;
    align-items: flex-start;
  }

  &__content {
    display: flex;
    width: 800px;
    flex-direction: column;
    align-items: flex-start;

    &__img {
      border-radius: 50px;
    }

    &__title {
      color: #292f36;
      font-family: DM Serif Display;
      font-size: 50px;
      font-style: normal;
      font-weight: 400;
      line-height: 125%;
      /* 62.5px */
      letter-spacing: 1px;
      margin-bottom: 21px;
    }

    &__date {
      display: flex;
      align-items: center;
      gap: 409px;
      margin-top: 44px;
      margin-bottom: 48px;

      &__text {
        color: #4d5053;
        font-family: Jost;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 150%;
        /* 24px */
        letter-spacing: 0.16px;
        text-transform: capitalize;
      }
    }

    &__desc {
      color: #4d5053;
      font-family: Jost;
      font-size: 22px;
      font-style: normal;
      font-weight: 400;
      line-height: 150%;
      /* 33px */
      letter-spacing: 0.22px;
    }

    &__points {
      display: flex;
      width: 732.389px;
      flex-direction: column;
      align-items: flex-start;
      gap: 32px;
      margin: 24px 0 44px 0;

      &__item {
        display: flex;
        width: 732.389px;
        align-items: flex-start;
        gap: 14px;

        &__text {
          color: #cda274;
          font-family: DM Serif Display;
          font-size: 20px;
          font-style: normal;
          font-weight: 400;
          line-height: 125%;
          /* 25px */
          letter-spacing: 0.4px;
        }
      }
    }
  }

  &__sidebar {
    &__content {
      display: flex;
      flex-direction: column;
      flex-wrap: wrap;
      // justify-content: flex-start;
      align-items: center;
      gap: 24px;
      margin-top: 100px;
      // max-width: 345px;
    }

    &__heading {
      color: #292f36;
      font-family: "DM Serif Display", sans-serif;
      font-size: 25px;
      font-style: normal;
      font-weight: 400;
      line-height: 1.25;
      letter-spacing: 0.5px;
      margin: 0;
    }

    &__buttons-box {
      display: flex;
      justify-content: center;
      align-content: center;
      flex-wrap: wrap;
      margin-bottom: 70px;
      gap: 10px;
    }

    &__button {
      width: 170px;
      height: 55px;
      color: #292f36;
      text-align: center;
      font-family: Jost;
      font-size: 18px;
      font-style: normal;
      font-weight: 400;
      line-height: 125%;
      letter-spacing: 0.36px;
      border: none;
      border-radius: 10px;
      background-color: #f4f0ec;
      padding: 9px 10px;

      &:hover {
        background-color: #cda274;
        transition: all 0.8s ease-out;
      }

      &_active {
        color: #ffffff;
        background-color: #292f36;
        transition: all 0.8s ease-out;
      }

      &:focus {
        color: #ffffff;
        background-color: #292f36;
        transition: all 0.8s ease-out;
      }
    }
  }

  &__quotes {
    border-radius: 50px;
    background: #f4f0ec;
    max-width: 799px;
    padding: 53px 227px;
    margin-top: 35px;
    margin-bottom: 27px;

    &__content {
      width: 345px;
      height: 161px;
      display: flex;
      // width: 799px;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      gap: 10px;
    }
  }

  .thirds {
    margin-top: 35px;
  }
}

@media (max-width: 480px) {

  .banner-blogsDetails {
    /* max-width: 480px; */
    height: 181px;
    background-size: 480px 170px;
    background-repeat: no-repeat;
  }

  .blogs {
    margin-right: 1%;
    margin-left: 1%;
    // justify-content: center;
  }

  .blogs__sidebar__content {
    margin-top: 70px;
}

  .blogs__content {
    width: 380px;
  }

  .blogs__content__img {
    height: 305px;
    max-width: 387px;
  }

  .blogs__content__title {
    font-size: 30px;
    text-align: center;
  }

  .blogs__content__date {
    gap: 68px;
  }

  .blogs__content__points {
    width: 388px;
    flex-wrap: wrap;

    &__item {
      width: 365px;
    }
  }

  .blogs__quotes {
    width: 388px;
    height: 255px;
    padding-left: 20px;
    // padding: 11px; 
  }
}
</style>
