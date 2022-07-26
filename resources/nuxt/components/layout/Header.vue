<template>
  <header
    class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow"
  >
    <div class="navbar-brand col-md-3 col-lg-2 me-0 px-3">
      <img src="/images/favicon.png" class="me-2" height="28" />Boilerplate
    </div>
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
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link btn btn-link px-3" href="#" @click="logout()">
              Logout
            </a>
          </li>
        </ul>
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
      const result = await this.$swal.question(
        `Do you want to logout and get out?`,
        {
          confirmButtonColor: this.$ui.colors.danger,
        }
      );
      if (result.isConfirmed) {
        await this.$auth.logout();
        this.$auth.strategies.local.reset();
      }
      // this.$auth.strategies.local.options.endpoints.user.headers[
      //   "Authorization"
      // ] = null;
    },
  },
};
</script>

<style scoped></style>
