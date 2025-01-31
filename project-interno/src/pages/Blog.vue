<template>
  <div class="top">
    <div class="banner-blog center">
      <div class="banner-blog__intro">
        <h3 class="banner-blog__intro__title">Articles & News</h3>
        <div class="banner-blog__intro__link">
          <router-link to="/project-interno/" class="header__link">Home</router-link>
          /
          <router-link to="/project-interno/blog" class="header__link">Blog</router-link>
        </div>
      </div>
    </div>
    <section class="latest center">
      <h2 class="latest__title">Latest Post</h2>
      <div v-for="item in currentPost" :key="item.id" class="latest__post">
        <img :src="item.src" :alt="item.alt" class="latest__photo" />
        <div class="latest__content">
          <div class="latest__content__subcontent">
            <h3 class="latest__content__subcontent__title">
              {{ item.title }}
            </h3>
            <p class="latest__content__subcontent__text">
              {{ item.firstparagraph }}
            </p>
            <p class="latest__content__subcontent__text">
              {{ item.secondparagraph }}
            </p>
          </div>
          <div class="latest__content__date">
            <p div class="latest__content__date__text">{{ item.date }}</p>
            <button @click="getLatestPost" title="change latest post" class="latest__content__date__link">
              <svg width="9" height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1.27101 14.9525L7.21387 8.26683L1.27101 1.58112" stroke="#292F36" stroke-width="2"
                  stroke-linecap="round" stroke-linejoin="round" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </section>
    <section class="news center">
      <div class="news__heading">Articles & News</div>
      <div class="news__content">
        <div class="news__item" v-for="item in displayedProduct" :item="item">
          <div :id="`${item.id}`" class="news__item__content">
            <div class="news__item__teg">
              <p class="news__item__teg__text">{{ item.tag }}</p>
            </div>
            <div class="news__img">
              <img :src="item.src" :alt="item.alt" />
            </div>
            <div class="news__item__subcontent">
              <p class="news__item__subcontent__title">
                {{ item.title }}
              </p>
              <div class="news__item__subcontent__date">
                <p class="news__item__subcontent__date__text">
                  {{ item.date }}
                </p>
                <router-link to="/project-interno/blogdetails" class="news__item__subcontent__date__link"><svg width="9"
                    height="16" viewBox="0 0 9 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M1.27101 14.9525L7.21387 8.26683L1.27101 1.58112" stroke="#292F36" stroke-width="2"
                      stroke-linecap="round" stroke-linejoin="round" />
                  </svg></router-link>
              </div>
            </div>
          </div>
        </div>
        <pagination :totalPages="setTotalPages()" :currentPage="currentPage" :pageKey="pageKey"
          @pagechanged="onPageChange" />
      </div>
    </section>
  </div>
</template>

<script>
import Pagination from "@/components/Pagination.vue";
import { mapGetters } from "vuex";
export default {
  name: "Blog",
  components: {
    Pagination,
  },
  data() {
    return {
      currentPage: 1,
      limitOfProductPerPage: 6,
      pageKey: "project-interno/blog",
      currentPost: [
        {
          id: 1,
          src: require("@/assets/img/latest1.png"),
          alt: "post image",
          title: "Best For Any Office & Business Interior Solution",
          firstparagraph:
            " Lorem ipsum dolor sit amet, adipiscing Aliquam eusem vitae turpis dignissim maximus.posuere in. Contrary to popular belief.",
          secondparagraph:
            "Lorem Ipsum is not simply random text. It has roots in a piece of classica.",
          date: "26 December, 2022",
        },
      ],
    };
  },
  methods: {
    setTotalPages() {
      return Math.ceil(this.getListOfProducts.length / this.limitOfProductPerPage);
    },
    paginateListOfProduct(listOfProduct) {
      const newList = listOfProduct;
      let page = this.currentPage;
      let perPage = this.limitOfProductPerPage;
      let from = page * perPage - perPage;
      let to = page * perPage;
      return newList.slice(from, to);
    },
    onPageChange(page) {
      this.currentPage = page;
      this.$router.push(`/${this.pageKey}/${this.currentPage}`);
    },
    getLatestPost() {
      for (let i = 0; i < this.getlistOfPosts.length; i++) {
        if (i === this.currentPost[0].id) {
          this.currentPost = [];
          return this.currentPost.push(this.getlistOfPosts[i]);
        }
      }
    },
  },

  computed: {
    ...mapGetters(["getListOfProducts", "getlistOfPosts"]),
    displayedProduct() {
      return this.paginateListOfProduct(this.getListOfProducts);
    },
  },
};
</script>

<style lang="scss" scoped>
.top {
  max-width: 1920px;
  margin: 0 auto;
}

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

.banner-blog {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: end;
  height: 356px;
  background: url(@/assets/img/banner-blog.jpg);
  background-size: cover;
  background-repeat: no-repeat;

  &__intro {
    position: absolute;
    display: flex;
    max-width: 503px;
    height: 178px;
    padding: 41px 78px;
    flex-direction: column;
    align-items: center;
    gap: 10px;
    border-radius: 37px 37px 0px 0px;
    background: #fff;

    &__title {
      color: #292F36;
      font-family: DM Serif Display;
      font-size: 50px;
      font-weight: 400;
      line-height: 63px;
      letter-spacing: 0em;
      text-align: left;
    }

    &__link {
      color: #4d5053;
      font-family: "Jost", sans-serif;
      ;
      font-size: 22px;
      font-weight: 400;
      line-height: 33px;
      letter-spacing: 0.01em;
      text-align: left;
    }
  }
}

.latest {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 27px;
  margin-top: 200px;
  margin-bottom: 150px;

  &__photo {
    max-width: 569px;
    height: auto;
    border-radius: 10%;
  }

  &__title {
    width: 300px;
    color: #292f36;
    font-family: "DM Serif Display";
    font-size: 50px;
    font-style: normal;
    font-weight: 400;
    line-height: 31.25px;
    /* 62.5px */
    letter-spacing: 1.5px;
  }

  &__post {
    display: flex;
    font-family: Jost;
    ;
    align-items: center;
    gap: 65px;
    flex-wrap: wrap;
    padding: 21px;
    border-radius: 62px;
    border: 1px solid #e7e7e7;
    box-shadow: 0px 10px 30px 0px rgba(255, 255, 255, 0.25);
  }

  &__content {
    display: flex;
    width: 489px;
    flex-direction: column;
    align-items: flex-start;
    gap: 41px;

    &__subcontent {
      display: flex;
      width: 469px;
      flex-direction: column;
      align-items: flex-start;
      gap: 22px;

      &__title {
        color: #292f36;
        font-family: "DM Serif Display";
        font-size: 25px;
        font-style: normal;
        font-weight: 400;
        line-height: 31.25px;
        /* 31.25px */
        letter-spacing: 1px;
      }

      &__text {
        color: #4d5053;
        font-family: "Jost", sans-serif;
        font-size: 22px;
        font-style: normal;
        font-weight: 400;
        line-height: 150%;
        /* 33px */
        letter-spacing: 0.22px;
      }
    }

    &__date {
      display: flex;
      width: 489px;
      height: 45px;
      align-items: center;
      justify-content: space-between;

      &__link {
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
          transition: all 1.0s ease-out;
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

      &__text {
        color: #4D5053;
        font-family: "Jost", sans-serif;
        font-size: 16px;
        font-weight: 400;
        line-height: 24px;
        letter-spacing: 0.16px;
        text-align: left;
      }
    }
  }
}

.news {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 27px;

  &__heading {
    color: #292f36;
    font-family: "Jost", sans-serif;
    font-size: 50px;
    font-style: normal;
    font-weight: 400;
    line-height: 125%;
    /* 62.5px */
    letter-spacing: 1px;
  }

  &__content {
    max-width: 1201px;
    flex-wrap: wrap;
    gap: 28px;
    justify-content: center;
    display: flex;
    flex-direction: row;
  }

  &__item {
    position: relative;
    max-width: 380px;
    max-height: 521px;
    display: flex;
    padding: 21px;
    border-radius: 62px;
    border: 1px solid #e7e7e7;
    box-shadow: 0px 10px 30px 0px rgba(255, 255, 255, 0.25);
    justify-content: center;
    align-items: flex-start;
    gap: 10px;

    &:hover .news__item__subcontent__date__link {
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
      margin-left: 21px;
      margin-top: 225px;
      border-radius: 8px 8px 8px 0px;
      background: #fff;
    }

    &__content {
      display: flex;
      width: 340px;
      height: 459px;
      flex-direction: column;
      align-items: flex-start;
      gap: 10px;
    }

    &__subcontent {
      display: flex;
      width: 350px;
      flex-direction: column;
      align-items: flex-start;
      gap: 20px;

      &__title {
        // width: 300px;
        padding-right: 12px;
        color: #292f36;
        font-family: "DM Serif Display";
        font-size: 25px;
        font-style: normal;
        font-weight: 400;
        line-height: 1.25;
        /* 31.25px */
        letter-spacing: 0.5px;
      }

      &__date {
        display: flex;
        width: 340px;
        align-items: center;
        justify-content: space-between;

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

        &__link {
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

    &:hover {
      background: #f4f0ec;
      transition: all 0.8s ease-out;
    }
  }
}

@media (max-width: 1200px) {
  .latest {
    margin-top: 100px;
    margin-bottom: 100px;
    align-items: center;
  }

  .latest__post {
    flex-direction: column;
    align-items: center;
  }

  .news {
    align-items: center;
  }
}

@media (max-width: 768px) {
  .banner-blog {
    // max-width: 740px;
    height: 256px;
  }

  .banner-blog__intro {
    // max-width: 465px;
    height: 128px;
    padding: 11px 38px;
    gap: 0px;
  }

  .banner-blog__intro__title {
    font-size: 42px;
  }

  .latest__photo {
    max-width: 410px;
  }

  .latest__content {
    width: 410px;
  }

  .latest__content__subcontent {
    width: 408px;
  }

  .latest__content__date {
    width: 410px;
  }
}

@media (max-width: 480px) {
  .banner-blog {
    height: 206px;
  }

  .banner-blog__intro {
    height: 98px;
    padding: 5px 28px;
  }

  .banner-blog__intro__title {
    font-size: 32px;
  }

  .banner-blog__intro__link { 
    font-size: 16px;
  }

  .latest__post {
    padding: 12px;
  }

  .latest__photo {
    max-width: 355px;
  }

  .latest__content {
    width: 355px;
    gap: 21px;
  }

  .latest__content__subcontent {
    width: 350px;
  }

  .latest__content__date {
    width: 345px;
    padding-left: 10px;
    padding-bottom: 15px;
  }

  .news__heading {
    font-size: 45px;
  }
}

// .project__subContent__button {
//   background-image: url(@/assets/img/direct.svg);
//   width: 52px;
//   height: 52px;
//   border: none;
//   background: none;
// }</style>
