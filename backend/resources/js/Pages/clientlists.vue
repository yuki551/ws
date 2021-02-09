<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                取引先一覧
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div
                        class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                        role="alert"
                        v-if="$page.flash.message"
                    >
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ $page.flash.message }}</p>
                            </div>
                        </div>
                    </div>
                    <table class="client-list table-fixed w-full">
                        <thead>
                            <tr class="client-name">
                                <th class="px-4 py-2">取引先名</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="row in userPosts">
                                <td class="border px-4 py-2">{{ row.name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import AppLayout from './../Layouts/AppLayout';
export default {
    components: {
        AppLayout,
    },
    props: ['data', 'errors', 'conf'],
    data() {
        return {
            userPost: [],
            form: {
                status: 0,
            },
        };
    },
    computed: {
        userPosts: function() {
            return this.data;
        },
    },
};
</script>
<style></style>
