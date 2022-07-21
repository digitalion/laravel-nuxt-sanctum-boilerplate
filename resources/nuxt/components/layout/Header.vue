<template>
  <header
    class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow"
  >
    <div class="navbar-brand col-md-3 col-lg-2 me-0 px-3">Starter</div>
    <button
      class="navbar-toggler position-absolute d-md-none collapsed"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#sidebarMenu"
      aria-controls="sidebarMenu"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="w-100"></div>
    <div class="navbar-nav">
      <div class="nav-item text-nowrap">
        <a class="nav-link px-3" to="#" @click="logout()">Disconnettiti</a>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  data() {
    return {};
  },
  methods: {
    async logout() {
      await this.$auth.logout();
      // this.$auth.strategies.local.options.endpoints.user.headers[
      //   "Authorization"
      // ] = null;
      this.$auth.strategies.local.reset();
    },
  },
};
</script>

<style scoped></style>
