<template>
  <div class="pagination">
    <ul class="pagination__box">
      <li class="pagination__item">
        <button
          class="pagination__button"
          :class="{ pagination__button_inactive: isInFirstPage }"
          type="button"
          @click="onClickPreviousPage"
        >
          <svg
            class="pagination__button-svg"
            xmlns="http://www.w3.org/2000/svg"
            width="53"
            height="52"
            viewBox="0 0 53 52"
            fill="none"
          >
            <circle cx="26.5" cy="26" r="25.5" stroke="#FFFFF" />
            <path
              d="M23.5571 32L29.5 25.3143L23.5571 18.6286"
              stroke="#292F36"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </button>
      </li>

      <li v-for="page in pages" class="pagination__item">
        <button
          type="button"
          class="pagination__button"
          :class="{ pagination__button_active: isPageActive(page.name) }"
          @click="onClickPage(page.name)"
          :disabled="page.isDisabled"
          :aria-label="`Go to page number ${page.name}`"
        >
          0{{ page.name }}
        </button>
      </li>

      <li class="pagination__item">
        <button
          class="pagination__button"
          type="button"
          @click="onClickNextPage"
          :class="{ pagination__button_inactive: isInLastPage }"
          :disabled="isInLastPage"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="53"
            height="52"
            viewBox="0 0 53 52"
            fill="none"
          >
            <circle cx="26.5" cy="26" r="25.5" stroke="#FFFFF" />
            <path
              d="M23.5571 32L29.5 25.3143L23.5571 18.6286"
              stroke="#292F36"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
            />
          </svg>
        </button>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
  name: "Pagination",
  props: {
    maxVisibleButtons: {
      type: Number,
      required: false,
      default: 3,
      validator: function (value) {
        return value >= 0;
      },
    },
    totalPages: {
      type: Number,
      required: true,
      validator: function (value) {
        return value >= 0;
      },
    },
    currentPage: {
      type: Number,
      required: true,
      validator: function (value) {
        return value >= 0;
      },
    },
    pageKey: {
      type: String,
      required: true,
      validator: function (value) {
        if (typeof value === "string") return value;
      },
    },
  },

  methods: {
    isPageActive(page) {
      return this.currentPage === page;
    },
    onClickFirstPage() {
      this.$emit("pagechanged", 1);
    },
    onClickPreviousPage() {
      this.$emit("pagechanged", this.currentPage - 1);
    },
    onClickPage(page) {
      this.$emit("pagechanged", page);
    },
    onClickNextPage() {
      this.$emit("pagechanged", this.currentPage + 1);
    },
    onClickLastPage() {
      this.$emit("pagechanged", this.totalPages);
    },
  },

  computed: {
    isInFirstPage() {
      return this.currentPage === 1;
    },
    isInLastPage() {
      return this.currentPage === this.totalPages;
    },

    startPage() {
      // When on the first page
      if (this.currentPage === 1) {
        return 1;
      }

      // When on the last page
      if (this.currentPage === this.totalPages) {
        return this.totalPages - this.maxVisibleButtons + 1;
      }

      // When inbetween
      return this.currentPage - 1;
    },

    endPage() {
      return Math.min(
        this.startPage + this.maxVisibleButtons - 1,
        this.totalPages
      );
    },

    pages() {
      const range = [];
      for (let i = this.startPage; i <= this.endPage; i++) {
        range.push({
          name: i,
          isDisabled: i === this.currentPage,
        });
      }
      return range;
    },
  },
};
</script>

<style lang="scss" scoped>
.pagination {
  display: flex;
  justify-content: center;
  align-items: center;
  margin-top: 23px;

  &__box {
    display: flex;
    flex-direction: row;
    justify-content: center;
    margin: 0;
    gap: 20px;
  }

  &__item {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  &__button {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 52px;
    height: 52px;
    border: 1px solid #cda274;
    border-radius: 50%;
    color: #292f36;
    font-family: "Jost", sans-serif;
    font-weight: 600;
    font-style: normal;
    font-size: 16px;
    line-height: 1.5;
    text-transform: capitalize;
    transition: all 0.5s ease-out;
    cursor: pointer;

    &:hover {
      background-color: #cda274;
      border: 1px solid #cda274;
      transition: all 0.5s ease-out;
    }
  }

  &__button-svg {
    transform: rotate(180deg);
    transform-origin: 50% 50%;
  }

  &__button_inactive {
    background-color: #4d5053;
    border: 1px solid #4d5053;
    pointer-events: none;
    cursor: default;
  }

  &__button_active {
    background-color: #f4f0ec;
    border: none;
  }
}

button {
  background: none;
  border: none;
  padding: 0;
}
</style>
