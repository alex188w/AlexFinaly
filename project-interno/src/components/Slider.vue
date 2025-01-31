<template>
  <div class="slider">
    <div class="item" v-for="(slide, index) in slides">
      <div v-if="slide.display">
        <img class="no-fullscreen-image" :src="slide.image" alt="Image" />
        <div v-show="isImageVisible" class="fullscreen-image">
          <!-- <span class="close-btn" @click="hideImage">&times;</span> -->
          <img @click="showImage" :src="slide.image" alt="Full screen Image" />
        </div>
      </div>
    </div>

    <div class="slider-navigation">
      <a @click="prevSlide" class="previous">&#10094;</a>
      <a @click="showImage" class="add"><img class="add-svg" src="@/assets/img/add.svg" alt="add-image" /></a>
      <div class="slider-dots">
        <div class="dot" v-for="(slide, index) in slides" @click="dotNavigation(index)"
          :class="{ 'dot-active': activeEl === index }">
          <!-- <svg width="50" height="50">
            <circle
              cx="20"
              cy="20"
              r="10"
              stroke="black"
              stroke-width="4"
              fill="none"
            />
          </svg> -->
        </div>
      </div>
      <a @click="nextSlide" class="next">&#10095;</a>
    </div>
  </div>
</template>

<script>
export default {
  name: "Slider",
  data() {
    return {
      isImageVisible: false,
      activeEl: 0,
    };
  },
  props: {
    slides: {
      type: Array,
      required: true,
    },
  },

  methods: {
    showImage() {
      if (!this.isImageVisible) {
        this.isImageVisible = true;
        document.body.style.overflow = "hidden"; // Disable scrolling
        console.log(this.isImageVisible);
        document.querySelectorAll(".no-fullscreen-image").forEach(a => a.style.display = "none");
      } else {
        this.isImageVisible = false;
        document.body.style.overflow = "auto"; // Enable scrolling
        document.querySelectorAll(".no-fullscreen-image").forEach(a => a.style.display = "initial");
        console.log(this.isImageVisible);
      }
    },
    // hideImage() {
    //   this.isImageVisible = false;
    //   document.body.style.overflow = "auto"; // Enable scrolling
    // },

    dotNavigation(index) {
      for (let i = 0; i < this.slides.length; i++) {
        this.slides[i].display = false;
        this.isActive = false;
        if (i === index) {
          this.slides[i].display = true;
          this.isActive = true;
          this.activeEl = i;
        }
      }
    },

    nextSlide() {
      const lastSlideIndex = this.slides.length - 1;
      const currentSlideIndex = this.slides.findIndex((slide) => slide.display);
      const nextSlideIndex =
        currentSlideIndex === lastSlideIndex ? 0 : currentSlideIndex + 1;
      this.slides[currentSlideIndex].display = false;
      this.slides[nextSlideIndex].display = true;
      this.activeEl =
        currentSlideIndex === lastSlideIndex ? 0 : currentSlideIndex + 1;
    },

    prevSlide() {
      const lastSlideIndex = this.slides.length - 1;
      const currentSlideIndex = this.slides.findIndex((slide) => slide.display);
      const prevSlideIndex =
        currentSlideIndex === 0 ? lastSlideIndex : currentSlideIndex - 1;
      this.slides[currentSlideIndex].display = false;
      this.slides[prevSlideIndex].display = true;
      this.activeEl =
        currentSlideIndex === 0 ? lastSlideIndex : currentSlideIndex - 1;
    },
  },
};
</script>

<style scoped>
.fullscreen-image {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  /* background-color: rgba(0, 0, 0, 0.9); */
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9;
  cursor: 'zoom-out';
}

.fullscreen-image img {
  width: 115%;
  height: 115%;
  object-fit: contain;
}

.add {
  position: absolute;
  width: 132px;
  height: 132px;
  top: 40%;
  left: 45%;
  cursor: pointer;
  font-weight: bold;
  font-size: 36px;
  color: #ffffff;
  z-index: 2;
  background: url(@/assets/img/circle.svg);
}

.add-svg {
  position: absolute;
  top: 40%;
  left: 39%;
}

.slider {
  display: flex;
  flex-direction: column;
  position: relative;
  /* Центрируем по горизонтали: */
  margin: auto;
}

/* Кнопки назад и вперёд: */
.slider .previous,
.slider .next {
  /* Добавляет курсору иконку, когда тот оказывается над кнопкой: */
  cursor: pointer;
  position: absolute;
  top: 45%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 36px;
  /* Плавное появление фона при наведении курсора: */
  transition: 0.6s ease;
  /* Скругление границ: */
  border-radius: 0 3px 3px 0;
}

.slider .next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* При наведении курсора на кнопки добавляем фон кнопок: */
.slider .previous:hover,
.slider .next:hover {
  background-color: rgba(0, 0, 0, 0.2);
}

/* точки навигации */
.slider-dots {
  height: 30px;
  display: flex;
  flex-direction: row;
  justify-content: center;
  gap: 25px;
  margin-top: 25px;
}

.dot {
  width: 30px;
  height: 30px;
  border: 4px solid #bbb;
  border-radius: 50%;
  cursor: pointer;
}

.dot-active {
  background-color: #bbb;
}

@media (max-width: 480px) {
  
  .add {
    width: 85px;
    height: 85px;
    top: 30%;
    left: 40%;
    background-size: contain;
  }

  .add-svg {
    top: 34%;
    left: 33%;
  }

  .next {
    top: 37%;
  }

  .slider .next, .slider .previous {
    top: 37%;
  }
}

</style>
