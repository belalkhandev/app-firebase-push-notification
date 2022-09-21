<script setup>
    import Navigation from '@/Layouts/Navigation.vue'
    import Header from '@/Layouts/Header.vue'
</script>

<template>
    <div>
        <!-- header -->
        <Header>
            <template #header>
                <slot name="header"/>
            </template>
        </Header>

        <!-- wrapper -->
        <div class="wrapper">
            <!-- navigation -->
            <Navigation/>

            <!-- main content -->
            <main class="main-content">
                <div class="content">
                    <slot />
                </div>
            </main> <!-- / main content -->
        </div> <!-- /wrapper -->
    </div>
</template>
