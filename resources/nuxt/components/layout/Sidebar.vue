<template>
    <nav
        id="sidebarMenu"
        class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
    >
        <div class="position-sticky pt-3">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <NuxtLink class="nav-link" to="/"> Home page </NuxtLink>
                </li>
                <li class="nav-item">
                    <NuxtLink class="nav-link" to="/test"> Test page </NuxtLink>
                </li>
            </ul>
        </div>
    </nav>
</template>

<script>
export default {};
</script>

<style scoped></style>
