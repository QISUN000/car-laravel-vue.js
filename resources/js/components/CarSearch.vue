<template>
  <div class="mb-4">
    <div class="input-group">
      <input 
        type="text" 
        class="form-control" 
        placeholder="Search cars by make or model..." 
        v-model="searchTerm"
      >
      <button class="btn btn-outline-secondary" type="button" @click="clearSearch">Clear</button>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      searchTerm: ''
    }
  },
  watch: {
    searchTerm() {
      // Emit an event when search term changes
      this.$emit('search', this.searchTerm);
    }
  },
  methods: {
    clearSearch() {
      this.searchTerm = '';
    }
  }
}
</script>