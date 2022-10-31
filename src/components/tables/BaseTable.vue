<template>
  <div className="table-responsive">
    <TableLoading v-if="loading" />

    <table v-if="!loading">
      <thead>
        <tr>
          <th
            v-for="header in headers"
            :key="header"
          >
            {{ header }}
          </th>
        </tr>
      </thead>
      <tbody>
        <tr
          v-for="row in rows.data"
          :key="row.id"
        >
          <td
            v-for="key in headers"
            :key="key"
          >
            <div
              v-if="isHtml(key?.toLowerCase())"
              v-html="row?.[key?.toLowerCase()]"
            />
            <span v-else>{{ row?.[key?.toLowerCase()] }}</span>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import TableLoading from './TableLoading.vue';

export default {
    name: 'BaseTable',

    components: {
        TableLoading,
    },

    props: {
        headers: {
            type: Array,
            required: true,
        },
        rows: {
            type: Object,
            required: true,
        },
        loading: {
            type: Boolean,
            required: false,
            default: false,
        },
        htmlColumns: {
            type: Array,
            required: false,
            default: () => [],
        }
    },

    computed: {
        ...mapGetters(["settings"]),
    },

    methods: {
        isHtml(keyName) {
            return this.htmlColumns.includes(keyName);
        }
    }
};
</script>

<style lang="scss" scoped>
.table-responsive {
    overflow-x: auto;

    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #8080801a;

        th, td {
            background: var(--color-white);
            padding: 1rem .75rem 1rem .75rem;
            border-bottom: 1px solid #eee;
        }

        thead {
            tr {
                th {
                    text-align: left;
                    text-transform: uppercase;
                }
            }
        }
    }
}
</style>