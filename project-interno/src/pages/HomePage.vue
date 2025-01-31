<template>
  <div class="home-page">
    <div class="top">
      <div class="banner center">
        <img src="@/assets/img/banner.png" alt="photo" class="banner__photo" />
        <div class="banner__intro">
          <h2 class="banner__intro__heading">Let Your Home Be Unique</h2>
          <p class="banner__intro__text">
            There are many variations of the passages of lorem Ipsum
            fromavailable, majority.
          </p>
          <router-link to="/project-interno/project"><button class="banner__intro__button">
              Get Started<svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.85938 8.43542L15.5826 8.29857M10.4776 1.91138L17.0005 8.43436L10.3461 15.0887"
                  stroke="#CDA274" stroke-width="2" stroke-linecap="square" stroke-linejoin="round" />
              </svg></button></router-link>
        </div>
      </div>
      <div class="project center">
        <div class="project__heading">
          <div class="project__heading__title">Follow Our Projects</div>
          <div class="project__heading__text">
            It is a long established fact that a reader will be distracted by
            the of readable content of page lookings at its layouts points.
          </div>
        </div>
        <div class="project__content">
          <div class="project__items">
            <div v-for="project in listOfProjects" :key="project.id" class="project__item">
              <img class="project__item-image" :src="project.src" :alt="project.alt" />
              <div class="project__item-content">
                <div class="project__item-box">
                  <p class="project__item-title">
                    {{ project.firstparagraph }}
                  </p>
                  <p class="project__item-subtitle">
                    {{ project.secondparagraph }}
                  </p>
                </div>
                <router-link to="/project-interno/project" class="project__item-button">
                  <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.27101 14.9525L7.21387 8.26683L1.27101 1.58112" stroke="#292F36" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round" />
                  </svg>
                </router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="counter center">
      <div class="counter__content">
        <div class="counter__item">
          <div class="counter__item__desc">
            <div class="counter__item__desc__count">12</div>
            <div class="counter__item__desc__text">Years Of Experiance</div>
          </div>
          <div class="counter__item__vertical"></div>
        </div>
        <div class="counter__item">
          <div class="counter__item__desc">
            <div class="counter__item__desc__count">85</div>
            <div class="counter__item__desc__text">Success Project</div>
          </div>
          <div class="counter__item__vertical"></div>
        </div>
        <div class="counter__item">
          <div class="counter__item__desc">
            <div class="counter__item__desc__count">15</div>
            <div class="counter__item__desc__text">Active Project</div>
          </div>
          <div class="counter__item__vertical"></div>
        </div>
        <div class="counter__item">
          <div class="counter__item__desc">
            <div class="counter__item__desc__count">95</div>
            <div class="counter__item__desc__text">Happy CUstomers</div>
          </div>
        </div>
      </div>
    </div>
    <div class="top"></div>
    <div class="blog center">
      <div class="blog__heading">
        <h2 class="blog__title">Articles & News</h2>
        <p class="blog__text">
          It is a long established fact that a reader will be distracted by the
          of readable content of a page when lookings at its layouts the points
          of using.
        </p>
      </div>
      <div class="blog__content">
        <div class="blog__item" v-for="item in listOfBlogs" :key="item.id">
          <div class="blog__item__content">
            <div class="blog__item__teg">
              <div class="blog__item__teg__text">{{ item.tag }}</div>
            </div>
            <div class="blog__img">
              <img :src="item.src" :alt="item.alt" />
            </div>
            <div class="blog__item__subcontent">
              <div class="blog__item__subcontent__title">{{ item.title }}</div>
              <div class="blog__item__subcontent__date">
                <div class="blog__item__subcontent__date__text">
                  {{ item.date }}
                </div>
                <router-link to="/project-interno/blog" class="blog__item__subcontent__button">
                  <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.27101 14.9525L7.21387 8.26683L1.27101 1.58112" stroke="#292F36" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round" />
                  </svg></router-link>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "HomePage",

  data() {
    return {
      listOfProjects: [
        {
          id: "first-project",
          src: require("@/assets/img/Image1-1.png"),
          alt: "first project",
          firstparagraph: "Modern Kitchen",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "second-project",
          src: require("@/assets/img/Image1-2.png"),
          alt: "second project",
          firstparagraph: "Modern Kitchen",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "third-project",
          src: require("@/assets/img/Image2-1.png"),
          alt: "third project",
          firstparagraph: "Modern Kitchen",
          secondparagraph: "Decor / Artchitecture",
        },
        {
          id: "fourth-project",
          src: require("@/assets/img/Image2-2.png"),
          alt: "fourth project",
          firstparagraph: "Modern Kitchen",
          secondparagraph: "Decor / Artchitecture",
        },
      ],
      // listOfCounters: [
      //   {
      //     id: "first-counter",
      //     number: "12",
      //     text: "Years Of Experiance",
      //   },
      //   {
      //     id: "second-counter",
      //     number: "85",
      //     text: "Success Project",
      //   },
      //   {
      //     id: "third-counter",
      //     number: "15",
      //     text: "Active Project",
      //   },
      //   {
      //     id: "fourth-counter",
      //     number: "95",
      //     text: "Happy Customers",
      //   },
      // ],
      listOfBlogs: [
        {
          id: "first-blog",
          src: require("@/assets/img/blogImage1.png"),
          alt: "first blog",
          tag: "Kitchen Design",
          title: "Let’s Get Solution For Building Construction Work",
          date: "26 December,2022",
        },
        {
          id: "second-blog",
          src: require("@/assets/img/blogImage2.png"),
          alt: "second blog",
          tag: "Living Design",
          title: "Low Cost Latest Invented Interior Designing Ideas",
          date: "22 December,2022",
        },
        {
          id: "third-blog",
          src: require("@/assets/img/blogImage3.png"),
          alt: "third blog",
          tag: "Interior Design",
          title: "Best For Any Office & Business Interior Solution",
          date: "25 December,2022",
        },
      ],
    };
  },
};
</script>

<style lang="scss" scoped>
.top {
  max-width: 1210px;
  margin: 0 auto;
}

.banner {
  display: flex;
  max-width: 1201px;
  max-height: 758px;

  &__photo {
    position: relative;
  }

  &__intro {
    position: absolute;
    display: flex;
    margin-left: 52px;
    margin-top: 208px;
    justify-content: center;
    align-items: center;
    max-width: 434px;
    flex-direction: column;
    align-items: flex-start;
    gap: 21px;

    &__heading {
      color: #292f36;
      font-family: "Jost", sans-serif;
      font-size: 65px;
      font-style: normal;
      font-weight: 400;
      line-height: 125%;
    }

    &__text {
      color: #4d5053;
      font-family: "Jost", sans-serif;
      font-size: 22px;
      font-style: normal;
      font-weight: 400;
      line-height: 150%;
      letter-spacing: 0.22px;
    }

    &__button {
      cursor: pointer;
      display: flex;
      padding: 26px 54px;
      flex-direction: row;
      justify-content: center;
      align-items: center;
      gap: 10px;
      border-radius: 18px;
      background: #292f36;
      box-shadow: 0px 10px 20px 0px rgba(192, 192, 192, 0.35);
      color: #fff;
      text-align: center;
      font-family: "Jost", sans-serif;
      font-size: 18px;
      font-style: normal;
      font-weight: 600;
      line-height: 125%;
      letter-spacing: 0.36px;

      &:hover {
        background-color: #cda274;
        border: none;
        transition: all 0.5s ease-out;
      }
    }
  }
}

.project {
  display: flex;
  flex-direction: column;
  // align-items: center;
  margin-top: 96px;

  &__heading {
    display: flex;
    max-width: 737px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 8px;
    margin-right: auto;
    margin-left: auto;

    &__title {
      color: #292f36;
      text-align: center;
      font-family: "Jost", sans-serif;
      font-size: 50px;
      font-style: normal;
      font-weight: 400;
      line-height: 125%;
      /* 62.5px */
      letter-spacing: 1px;
    }

    &__text {
      color: #4d5053;
      text-align: center;
      font-family: "Jost", sans-serif;
      font-size: 22px;
      font-style: normal;
      font-weight: 400;
      line-height: 150%;
      /* 33px */
      letter-spacing: 0.22px;
    }
  }

  &__items {
    margin-top: 93px;
    display: grid;
    grid-template-columns: repeat(auto-fit, 548px);
    justify-content: center;
    column-gap: 104px;
    row-gap: 56px;
  }

  &__item-image {
    display: flex;
    width: 100%;
  }

  &__item-content {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    padding-top: 24px;
  }

  &__item-box {
    display: flex;
    max-width: 217px;
    height: 70px;
    flex-direction: column;
    align-items: flex-start;
    gap: 10px;
    align-content: flex-start;
    justify-content: flex-end;
  }

  &__item-title {
    color: #292f36;
    font-family: "DM Serif Display", sans-serif;
    font-size: 25px;
    font-style: normal;
    font-weight: 400;
    line-height: 1.25;
    letter-spacing: 0.5px;
    margin: 0;
  }

  &__item-subtitle {
    color: #4d5053;
    font-family: "Jost", sans-serif;
    font-size: 22px;
    font-style: normal;
    font-weight: 400;
    line-height: 1.5;
    letter-spacing: 0.22px;
    margin: 0;
  }

  &__item-button {
    display: flex;
    justify-content: center;
    align-items: center;
    border: none;
    height: 52px;
    width: 52px;
    border-radius: 50%;
    background-color: #f4f0ec;
    cursor: pointer;
    transition: all 0.8s ease-out;
    padding: 0;

    &:hover {
      background-color: #ffffff;
      border: 1px solid #e7e7e7;
      transition: all 0.8s ease-out;
    }

    &:active {
      background-color: #4d5053;
      border: none;
      transition: all 0.8s ease-out;
    }

    &:focus {
      background-color: #cda274;
      border: none;
      transition: all 0.8s ease-out;
    }
  }
}

.counter {
  margin-top: 96px;
  padding-top: 151px;
  padding-bottom: 151px;
  background: #f4f0ec;

  &__content {
    display: flex;
    padding-left: 33px;
    flex-wrap: wrap;
    max-width: 1182px;
    gap: 55px;
  }

  &__item {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
    width: 246px;

    &__desc {
      display: flex;
      justify-content: center;
      // max-width: 192px;
      flex-direction: column;
      align-items: center;
      gap: 16px;

      &__count {
        width: 77px;
        color: #cda274;
        font-family: "Jost", sans-serif;
        font-size: 85px;
        font-style: normal;
        font-weight: 400;
        line-height: 125%;
        letter-spacing: 1.7px;
      }

      &__text {
        color: #4d5053;
        font-family: "Jost", sans-serif;
        font-size: 22px;
        font-style: normal;
        font-weight: 400;
        line-height: 150%;
        letter-spacing: 0.22px;
      }
    }

    &__vertical {
      border-right: 1px solid #cda274;
      height: 130px;
    }
  }
}

.blog {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 52px;
  margin-top: 96px;

  &__heading {
    display: flex;
    max-width: 811px;
    flex-direction: column;
    align-items: center;
    gap: 12px;
  }

  &__title {
    color: #292f36;
    text-align: center;
    font-family: "Jost", sans-serif;
    font-size: 50px;
    font-style: normal;
    font-weight: 400;
    line-height: 125%;
    letter-spacing: 1px;
  }

  &__text {
    color: #4d5053;
    text-align: center;
    font-family: "Jost", sans-serif;
    font-size: 22px;
    font-style: normal;
    font-weight: 400;
    line-height: 150%;
    letter-spacing: 0.22px;
  }

  &__content {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 27px;
  }

  &__item {
    position: relative;
    width: 382px;
    padding: 21px;
    border-radius: 62px;
    border: 1px solid #e7e7e7;
    box-shadow: 0px 10px 30px 0px rgba(255, 255, 255, 0.25);

    &:hover {
      background-color: #f4f0ec;
      transition: all 0.8s ease-out;
    }

    &:hover .blog__item__subcontent__button {
      background-color: #ffffff;
      transition: all 0.8s ease-out;
    }

    &__teg {
      position: absolute;
      width: 129px;
      height: 41px;
      display: flex;
      justify-content: center;
      align-items: center;
      left: 41px;
      top: 250px;
      border-radius: 8px 8px 8px 0px;
      background: #fff;

      &__text {
        color: #4d5053;
        font-family: "Jost", sans-serif;
        font-size: 16px;
        font-style: normal;
        font-weight: 400;
        line-height: 150%;
        /* 24px */
        letter-spacing: 0.16px;
        text-transform: capitalize;
      }
    }

    &__content {
      display: flex;
      width: 340px;
      height: 479px;
      flex-direction: column;
      align-items: center;
      gap: 21px;
    }

    &__subcontent {
      display: flex;
      width: 340px;
      flex-direction: column;
      align-items: flex-start;
      gap: 30px;

      &__title {
        color: #292f36;
        font-family: "DM Serif Display";
        font-size: 25px;
        font-style: normal;
        font-weight: 400;
        line-height: 125%;
        letter-spacing: 2.5;
      }

      &__date {
        display: flex;
        width: 340px;
        align-items: center;
        justify-content: space-between;

        &__text {
          color: #4d5053;
          font-family: "Jost", sans-serif;
          font-size: 16px;
          font-style: normal;
          font-weight: 400;
          line-height: 150%;
          letter-spacing: 0.16px;
          text-transform: capitalize;
        }
      }

      &__button {
        display: flex;
        justify-content: center;
        align-items: center;
        border: none;
        height: 52px;
        width: 52px;
        border-radius: 50%;
        background-color: #f4f0ec;
        cursor: pointer;
        padding: 0;
        transition: all 0.8s ease-out;

        &:active {
          background-color: #4d5053;
          transition: all 0.8s ease-out;
        }

        &:focus {
          background-color: #cda274;
          transition: all 0.8s ease-out;
        }
      }
    }
  }
}

@media (max-width: 991px) {
  .banner__intro {
    margin-top: 108px;
    max-width: 334px;
  }

  .banner__intro__heading {
    font-size: 37px;
  }

  .banner__intro__text {
    font-size: 16px;
  }
}



@media (max-width: 768px) {

  .banner__intro {
    margin-top: 58px;
    max-width: 204px;
    gap: 16px;
  }

  .banner__intro__heading {
    font-size: 27px;
  }

  .banner__intro__text {
    font-size: 14px;
  }

  .banner__intro__button {
    padding: 16px 24px;
    border-radius: 8px;
    font-size: 14px;
  }

  .project__heading__title {
    font-size: 30px;
  }

  .project__heading__text {
    font-size: 18px;
  }

  .project__items {
    margin-top: 63px;
    grid-template-columns: repeat(auto-fit, 448px);
    column-gap: 0px;
    row-gap: 56px;
  }

  .counter__content {
    display: flex;
    justify-content: center;
    align-items: center;
  }
}

@media (max-width: 480px) {

  .banner__intro {
    margin-top: 28px;
    max-width: 204px;
    gap: 11px;
  }

  .banner__intro__heading {
    font-size: 28px;
  }

  .banner__intro__text {
    font-size: 14px;
  }

  .banner__intro__button {
    padding: 12px 16px;
    border-radius: 12px;
    font-size: 12px;
  }

  .project__heading {
    max-width: 350px;
  }

  .project__heading__title {
    font-size: 26px;
  }

  .project__heading__text {
    font-size: 16px;
  }

  .project__items {
    margin-top: 63px;
    grid-template-columns: repeat(auto-fit, 368px);
    column-gap: 0px;
    row-gap: 56px;
  }
}
</style>
