<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Clients
            </h2>
        </template>

        <div class="py-12">
            <div
                class="
                    max-w-7xl
                    mx-auto
                    grid
                    px-4
                    gap-4
                    sm:px-6
                    md:grid-cols-2
                    lg:px-8 lg:grid-cols-3
                "
            >
                <div class="bg-white p-4 pointer text-center">
                  <div class="w-1/4 mx-auto my-8">
                        <FolderAddIcon />
                    </div>
                    <div class="text-xl">
                        Add Client
                    </div>
                </div>
                <div
                    v-for="(client, index) in data"
                    :key="index"
                    class="bg-white p-4 pointer text-center"
                >
                    <div class="w-1/4 mx-auto my-8">
                        <FolderIcon />
                    </div>
                    <div class="text-xl">
                        {{ client.name }}
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from "./../Layouts/AppLayout";
import Welcome from "./../Jetstream/Welcome";
import { FolderIcon } from "@heroicons/vue/outline";
import { FolderAddIcon } from "@heroicons/vue/outline";

export default {
    components: {
        AppLayout,
        Welcome,
        FolderIcon,
        FolderAddIcon
    },
    props: ["data", "errors"],
    data() {
        return {};
    },
    methods: {},
};
</script>
