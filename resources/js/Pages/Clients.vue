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
                <!-- Add Client -->
                <div
                    @click="openModal()"
                    class="bg-white p-4 cursor-pointer text-center"
                >
                    <div class="w-1/4 mx-auto my-8">
                        <FolderAddIcon />
                    </div>
                    <div class="text-xl text-gray-600">Add Client</div>
                </div>
                <!-- List Clients -->
                <div
                    v-for="(client, index) in data"
                    :key="index"
                    class="bg-white p-4 cursor-pointer text-center"
                >
                    <div class="w-1/4 mx-auto my-8">
                        <FolderIcon />
                    </div>
                    <div class="text-xl text-gray-600">
                        {{ client.name }}
                    </div>
                </div>
                <!-- Modal -->
                <div
                    class="
                        fixed
                        z-10
                        inset-0
                        overflow-y-auto
                        ease-out
                        duration-400
                    "
                    v-if="isOpen"
                >
                    <div
                        class="
                            flex
                            items-end
                            justify-center
                            min-h-screen
                            pt-4
                            px-4
                            pb-20
                            text-center
                            sm:block sm:p-0
                        "
                    >
                        <div class="fixed inset-0 transition-opacity">
                            <div
                                class="absolute inset-0 bg-gray-500 opacity-75"
                            ></div>
                        </div>
                        <!-- This element is to trick the browser into centering the modal contents. -->
                        <span
                            class="
                                hidden
                                sm:inline-block sm:align-middle sm:h-screen
                            "
                        ></span
                        >​
                        <div
                            class="
                                inline-block
                                align-bottom
                                bg-white
                                rounded-lg
                                text-left
                                overflow-hidden
                                shadow-xl
                                transform
                                transition-all
                                sm:my-8 sm:align-middle sm:max-w-lg sm:w-full
                            "
                            role="dialog"
                            aria-modal="true"
                            aria-labelledby="modal-headline"
                        >
                            <!-- Add Client Form -->
                            <form>
                                <div
                                    class="
                                        bg-white
                                        px-4
                                        pt-5
                                        pb-4
                                        sm:p-6 sm:pb-4
                                    "
                                >
                                    <div class="">
                                        <div class="mb-4">
                                            <label
                                                for="name"
                                                class="
                                                    block
                                                    text-gray-700 text-sm
                                                    font-bold
                                                    mb-2
                                                "
                                                >Name:</label
                                            >
                                            <input
                                                type="text"
                                                class="
                                                    shadow
                                                    appearance-none
                                                    border
                                                    rounded
                                                    w-full
                                                    py-2
                                                    px-3
                                                    text-gray-700
                                                    leading-tight
                                                    focus:outline-none
                                                    focus:shadow-outline
                                                "
                                                id="name"
                                                placeholder="Enter Name"
                                                v-model="form.name"
                                            />
                                            <div
                                                v-if="
                                                    $page.props.errors &&
                                                    $page.props.errors.name
                                                "
                                                class="text-red-500 mt-4"
                                            >
                                                {{ $page.props.errors.name }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="
                                        bg-gray-50
                                        px-4
                                        py-3
                                        sm:px-6 sm:flex sm:flex-row-reverse
                                    "
                                >
                                    <span
                                        class="
                                            flex
                                            w-full
                                            rounded-md
                                            shadow-sm
                                            sm:ml-3 sm:w-auto
                                        "
                                    >
                                        <button
                                            wire:click.prevent="store()"
                                            type="button"
                                            class="
                                                inline-flex
                                                justify-center
                                                w-full
                                                rounded-md
                                                border border-transparent
                                                px-4
                                                py-2
                                                bg-green-600
                                                text-base
                                                leading-6
                                                font-medium
                                                text-white
                                                shadow-sm
                                                hover:bg-green-500
                                                focus:outline-none
                                                focus:border-green-700
                                                focus:shadow-outline-green
                                                transition
                                                ease-in-out
                                                duration-150
                                                sm:text-sm sm:leading-5
                                            "
                                            @click="save(form)"
                                        >
                                            Save
                                        </button>
                                    </span>
                                </div>
                            </form>
                        </div>
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
        FolderAddIcon,
    },
    props: ["data", "errors"],
    data() {
        return {
            isOpen: false,
            form: {
                name: null,
            },
        };
    },
    methods: {
        openModal: function () {
            this.isOpen = true;
        },
        closeModal: function () {
            this.isOpen = false;
            this.reset();
        },
        reset: function () {
            this.form = {
                name: null,
            };
        },
        save: function (data) {
            this.$inertia.post("/clients", data);

            if (
                data.name == null ||
                data.name == "" ||
                typeof data.name === "undefined"
            ) {
                this.openModal();
            } else {
                this.reset();
                this.closeModal();
            }
        },
    },
};
</script>
