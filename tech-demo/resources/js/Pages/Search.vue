<template>
  <ais-instant-search index-name="ecommerce_juan" :search-client="searchClient">
    <div class="left-panel">
      <!-- <ais-clear-refinements /> -->
      <h2>Brands</h2>
      <ais-refinement-list attribute="brand" searchable />
      <ais-configure :hitsPerPage="8" />
    </div>
    <div class="right-panel">
      <ais-search-box />
      <ais-hits>
        <template v-slot:item="{ item }">
          <img :src="item.image" align="left" :alt="item.name" />
          <h2>{{ item.name }}</h2>
          <div class="hit-name">
            <ais-highlight attribute="name" :hit="item"></ais-highlight>
          </div>
          <div class="hit-description">
            <ais-highlight attribute="description" :hit="item"></ais-highlight>
          </div>
          <div class="hit-price">{{ item.price }}</div>
        </template>
      </ais-hits>
      <ais-pagination />
    </div>
  </ais-instant-search>
</template>

<script>
import algoliasearch from 'algoliasearch/lite';
import { AisInstantSearch, AisSearchBox, AisHits, AisHighlight, AisPagination, AisConfigure, AisRefinementList } from 'vue-instantsearch/vue3/es';
import 'instantsearch.css/themes/algolia-min.css';

export default {
  components: {
      AisInstantSearch,
      AisRefinementList,
      AisSearchBox,
      AisHits,
      AisHighlight,
      AisPagination,
      AisConfigure,
  },
  data() {
    return {
      searchClient: algoliasearch(
        'C8I82YB109',
        'af1ac62b1518d669445fffefa09ce16f'
      ),
    };
  },
};
</script>

<style>

body {
  font-family: sans-serif;
  padding: 1em;
}

.ais-Hits-list {
  margin-top: 0;
  margin-bottom: 1em;
}

.ais-InstantSearch {
  display: grid;
  grid-template-columns: 1fr 4fr;
  grid-gap: 1em;
}

.ais-Hits-item img {
  margin-right: 1em;
  padding: 0.5em;
}
.hit-name {
  margin-bottom: 0.5em;
}
.hit-description {
  color: #888;
  font-size: 0.8em;
  margin-bottom: 0.5em;
}

</style>
