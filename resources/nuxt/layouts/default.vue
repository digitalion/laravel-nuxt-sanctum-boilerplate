<template>
  <div>
    <LayoutHeader />
    <div class="container-fluid">
      <div class="row">
        <LayoutSidebar />
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <Nuxt />
        </main>
      </div>
    </div>
  </div>
</template>

<style scoped src="@/assets/scss/default.scss" lang="scss" />
