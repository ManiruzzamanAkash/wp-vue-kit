<script setup>
import { __ } from '@wordpress/i18n';
</script>

<template>
  <div class="flex justify-between">
    <div>
      <p>
        {{ currentPage }}/{{ totalPages }} {{ totalPages < 2 ? __('page', 'wp-vue-kit') : __('pages', 'wp-vue-kit') }}
      </p>
    </div>
    <ul class="pagination">
      <li class="pagination-item">
        <button
          type="button"
          class="previous-item"
          :disabled="isInFirstPage"
          @click="onClickPreviousPage"
        >
          <span aria-hidden="true">&laquo;</span>
          <span class="sr-only">&nbsp;&nbsp; {{ __('Previous', 'wp-vue-kit') }}</span>
        </button>
      </li>

      <li class="pagination-item">
        <button
          type="button"
          class="next-item"
          :disabled="isInLastPage"
          @click="onClickNextPage"
        >
          <span class="sr-only">{{ __('Next', 'wp-vue-kit') }} &nbsp;&nbsp;</span>
          <span aria-hidden="true">&raquo;</span>
        </button>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
    name: "BasePagination",

    props: {
        maxVisibleButtons: {
            type: Number,
            required: false,
            default: 3
        },
        totalPages: {
            type: Number,
            required: true
        },
        perPage: {
            type: Number,
            required: true
        },
        currentPage: {
            type: Number,
            required: true
        },
        totalItems: {
            type: Number,
            default: 0,
        }
    },

    computed: {
        isInFirstPage() {
            return this.currentPage === 1;
        },
        isInLastPage() {
            return this.currentPage === this.totalPages;
        },
    },

    methods: {
        onClickPreviousPage() {
            this.$emit('pagechanged', this.currentPage - 1);
        },

        onClickNextPage() {
            this.$emit('pagechanged', this.currentPage + 1);
        },
    }
};
</script>

<style lang="scss" scoped>
.pagination {
    list-style-type: none;
  }

  .pagination-item {
    display: inline-block;

    button {
        background: #fff;
        padding: 10px 15px;
        border: 1px solid #ccc;
        cursor: pointer;

        &:is(:disabled) {
          cursor: not-allowed;
        }

        &:hover {
            opacity: 0.9;
            color: var(--color-primary);
        }

        &.previous-item {
            border-radius: 5px 0px 0px 5px;
        }

        &.next-item {
            border-left: 0px solid transparent;
            border-radius: 0px 5px 5px 0px;
        }
    }
  }

  .active {
    background-color: #4AAE9B;
    color: #ffffff;
  }
</style>