<script setup>
import { Link }  from '@inertiajs/inertia-vue3';

defineProps({
    data: {
        type: Object,
        default: () => ({}),
    },
});
</script>

<template>
    <div v-if="data.links.length > 3" class="flex justify-center mt-4 space-x-4">
        <Link
            v-for="(link, k) in data.links"
            :key="k"
            class="px-4 py-3 text-sm leading-4 bg-white rounded hover:bg-white focus:text-indigo-500 hover:shadow"
            :class="{'bg-indigo-400 text-white': link.active}"
            :href="link.url"
            v-html="link.label"
        />
    </div>





<!--    <nav v-if="data.links.length > 3" aria-label="Navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <Link
                    :key="k"
                    class="px-4 py-3 text-sm leading-4 bg-white rounded hover:bg-white focus:text-indigo-500 hover:shadow"
                    :class="{'bg-indigo-400 text-white': link.active}"
                    :href="link.url"
                    v-html="link.label"
                />
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>-->

</template>
