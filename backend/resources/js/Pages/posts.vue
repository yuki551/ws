<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Post
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
                    <form>
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="">
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2"
                                        >名前:{{ form.username }}
                                    </label>
                                    <input
                                        type="hidden"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="exampleFormControlInput1"
                                        placeholder="Enter Title"
                                        v-model="form.user"
                                    />
                                    <div v-if="$page.errors.title" class="text-red-500">
                                        {{ $page.errors.title[0] }}
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2"
                                        >報告日時:{{ form.date }}</label
                                    >
                                    <input
                                        type="hidden"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="exampleFormControlInput1"
                                        placeholder="Enter Title"
                                        v-model="form.date"
                                    />
                                    <div v-if="$page.errors.title" class="text-red-500">
                                        {{ $page.errors.title[0] }}
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2"
                                        >所属部署:{{ form.teamname }}</label
                                    >
                                    <input
                                        type="hidden"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="exampleFormControlInput1"
                                        placeholder="Enter Title"
                                        v-model="form.team"
                                    />
                                    <div v-if="$page.errors.title" class="text-red-500">
                                        {{ $page.errors.title[0] }}
                                    </div>
                                </div>

                                <hr>
                                <div class="mt-4 block text-gray-700 text-sm font-bold mb-2">業務報告(午前):</div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">
                                        取引先名:
                                        <select v-model="form.client_am">
                                            <option disabled value="">取引先を選択してください</option>
                                            <option v-for="client in client_am"
                                                v-bind:value="client.id">
                                                {{ client.name }}
                                            </option>
                                        </select>
                                    </label>
                                    <div v-if="$page.errors.title" class="text-red-500">
                                        {{ $page.errors.title[0] }}
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">
                                    <textarea
                                        class="shadow appearance-none border rounded w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="exampleFormControlInput2"
                                        v-model="form.summary_am"
                                        placeholder="業務"
                                    ></textarea>
                                    </label>
                                    <div v-if="$page.errors.title" class="text-red-500">
                                        {{ $page.errors.title[0] }}
                                    </div>
                                </div>


                                <div class="mb-4">
                                    <textarea
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="exampleFormControlInput2"
                                        v-model="form.contents_am"
                                        placeholder="内容"
                                    ></textarea>
                                    <div v-if="$page.errors.body" class="text-red-500">
                                        {{ $page.errors.body[0] }}
                                    </div>
                                </div>
                                <hr>
                                <div class="mt-4 block text-gray-700 text-sm font-bold mb-2">業務報告(午後):</div>
                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">
                                        取引先名:
                                        <select v-model="form.client_pm">
                                            <option disabled value="">取引先を選択してください</option>
                                            <option v-for="client in client_pm"
                                                v-bind:value="client.id">
                                                {{ client.name }}
                                            </option>
                                        </select>
                                    </label>
                                    <div v-if="$page.errors.title" class="text-red-500">
                                        {{ $page.errors.title[0] }}
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">
                                    <textarea
                                        class="shadow appearance-none border rounded w-full py-1 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="exampleFormControlInput2"
                                        v-model="form.summary_pm"
                                        placeholder="業務"
                                    ></textarea>
                                    </label>
                                    <div v-if="$page.errors.title" class="text-red-500">
                                        {{ $page.errors.title[0] }}
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <textarea
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        id="exampleFormControlInput2"
                                        v-model="form.contents_pm"
                                        placeholder="内容"
                                    ></textarea>
                                    <div v-if="$page.errors.body" class="text-red-500">
                                        {{ $page.errors.body[0] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button
                                    wire:click.prevent="store()"
                                    type="button"
                                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                    v-show="!editMode"
                                    @click="save(form)"
                                >
                                    提出
                                </button>
                                <!-- buttonのクリック時のメソッドを変更 02/02 -->
                            </span>
                            <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                <button
                                    wire:click.prevent="store()"
                                    type="button"
                                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5"
                                    v-show="editMode"
                                    @click="update(form)"
                                >
                                    Update
                                </button>
                            </span>
                        </div>
                        <input type="hidden" v-model="form.status" />
                        <input type="hidden" v-model="form.confirm" />
                        <!-- confirm送信input追加 02/02 -->
                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import FilterableDropdown from './components/FilterableDropdown.vue';
// 日付取得用
var today = new Date();
var today = today.getFullYear() + '/' + (today.getMonth() + 1) + '/' + today.getDate();

// vue
import AppLayout from './../Layouts/AppLayout';
export default {
    components: {
        AppLayout,
        FilterableDropdown,
    },
    props: ['data', 'data2', 'errors'],
    data() {
        return {
            editMode: false,
            isOpen: false,
            form: {
                username: this.$page.user.name,
                user: this.$page.user.id,
                teamname: this.$page.user.current_team.name,
                team: this.$page.user.current_team_id,
                date: today,
                contents_am: null,
                contents_pm: null,
                client_am: null,
                client_pm: null,
                status: 1,
                confirm: 1,
                // confirm追加 02/02
            },
            created_user_id: this.$page.user.id,
            summary_am: null,
            summary_pm: null,
            items: [
                { id: 1, name: '出張' },
                { id: 2, name: '会議' },
            ],
        };
    },
    computed: {
        // ログインしているユーザーの投稿のみデータを格納。
        client_am: function() {
            return this.data2;
        },
        client_pm: function() {
            return this.data2;
        },



    },
    methods: {
        openModal: function() {
            this.isOpen = true;
        },
        reset: function() {
            this.form = {
                title: null,
                body: null,
            };
        },
        save: function(data) {
            this.$inertia.post('/posts', data);
            this.reset();
            this.editMode = false;
        },
        edit: function(data) {
            this.form = Object.assign({}, data);
            this.editMode = true;
            this.openModal();
        },
        update: function(data) {
            data._method = 'PUT';
            this.$inertia.post('/posts/' + data.id, data);
            this.reset();
        },
        // confirm追加 02/02
        confirm(data){
            data._method = 'POST';
            this.form.post(route('post.confirm'));
        },
    },
};
</script>
