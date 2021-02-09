<template>
    <app-layout>
        <template #header>
            <h2 id="js-page-title" class="font-semibold text-xl text-gray-800 leading-tight">社員情報確認</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <div
                        class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                        role="alert"
                        v-if="$page.flash.message">
                        <div class="flex">
                            <div>
                                <p class="text-sm">{{ $page.flash.message }}</p>
                            </div>
                        </div>
                    </div>
                    <form class="cmn-form-wrap">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="form-inner">

                                <div v-if="form.confirm == 2">
                                    <input type="hidden" v-model="form.id"/>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">
                                    社員名:{{form.name}}
                                    <input
                                        type="hidden"
                                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline"
                                        placeholder="社員名を入力してください"
                                        v-model="form.name"

                                    />
                                    </label>
                                    <div v-if="$page.errors.name" class="text-red-500">
                                        {{ $page.errors.name[0] }}
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">
                                    メールアドレス:{{form.email}}
                                    <input
                                        type="hidden"
                                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline"
                                        placeholder="メールアドレスを入力してください"
                                        v-model="form.email"
                                    />
                                    </label>
                                    <div v-if="$page.errors.email" class="text-red-500">
                                        {{ $page.errors.email[0] }}
                                    </div>
                                </div>

                                <div v-if="form.confirm == 1">

                                    <div class="mb-4">
                                        <label class="block text-gray-700 text-sm font-bold mb-2">
                                        パスワード:非表示
                                        <input
                                            type="hidden"
                                            class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline"
                                            placeholder="パスワードを入力してください"
                                            v-model="form.password"
                                        />
                                        </label>
                                        <div v-if="$page.errors.password" class="text-red-500">
                                            {{ $page.errors.password[0] }}
                                        </div>
                                    </div>

                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">
                                    所属部署:{{form.team}}
                                    <input
                                        type="hidden"
                                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline"
                                        placeholder="パスワードを入力してください"
                                        v-model="form.current_team_id"
                                    />
                                    </label>
                                    <div v-if="$page.errors.current_team_id" class="text-red-500">
                                        {{ $page.errors.current_team_id[0] }}
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">
                                    役職:{{form.role}}
                                    <input
                                        type="hidden"
                                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline"
                                        placeholder="パスワードを入力してください"
                                        v-model="form.role_id"
                                    />
                                    </label>
                                    <div v-if="$page.errors.role_id" class="text-red-500">
                                        {{ $page.errors.role_id[0] }}
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label class="block text-gray-700 text-sm font-bold mb-2">
                                    管理者権限:{{form.auth}}
                                    <input
                                        type="hidden"
                                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:shadow-outline"
                                        placeholder="パスワードを入力してください"
                                        v-model="form.auth_id"
                                    />
                                    </label>
                                    <div v-if="$page.errors.auth_id" class="text-red-500">
                                        {{ $page.errors.auth_id[0] }}
                                    </div>
                                </div>

                                    <input
                                        type="hidden"
                                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                        v-model="form.back"
                                    />

                            </div>
                        </div>

                        <div v-if="form.confirm == 1">


                            <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button
                                        wire:click.prevent="store()"
                                        class="cmn-formbtn cmn-formbtn-main"
                                        v-show="!editMode"
                                        @click="save(form)">
                                        登録
                                    </button>
                                </span>
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button
                                        wire:click.prevent="store()"
                                        class="cmn-formbtn cmn-formbtn-back"
                                        v-show="!editMode"
                                        @click="back(form)">
                                        戻る
                                    </button>
                                </span>
                            </div>
                        </div>

                        <div v-else-if="form.confirm == 2">
                            <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <button
                                        wire:click.prevent="update()"
                                        type="button"
                                        class="cmn-formbtn cmn-formbtn-main"
                                        v-show="!editMode"
                                        @click="editUser(form)">
                                        更新
                                    </button>
                                </span>
                                <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                    <a :href="route('user.edit',form.id)">
                                        <button
                                            wire:click.prevent="update()"
                                            class="cmn-formbtn cmn-formbtn-back"
                                            v-show="!editMode"
                                            @click="editback(form)">
                                            戻る
                                        </button>
                                    </a>
                                </span>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
// vue
import AppLayout from './../../Layouts/AppLayout';
import JetFormSection from "@/Jetstream/FormSection";
import JetInput from "@/Jetstream/Input";
import JetLabel from "@/Jetstream/Label";
import JetButton from "@/Jetstream/Button";
import JetInputError from "@/Jetstream/InputError";

export default {
    components: {
        AppLayout,
        JetFormSection,
        JetInput,
        JetLabel,
        JetButton,
        JetInputError,
    },
    props: ['confirmuser'],
    data() {
        return {
            editMode: false,
            isOpen: false,
            form: this.$inertia.form( {
                id: this.confirmuser.id,
                name: this.confirmuser.name,
                email: this.confirmuser.email,
                password: this.confirmuser.password,
                current_team_id: this.confirmuser.current_team_id,
                team: this.confirmuser.team_name,
                role_id: this.confirmuser.role_id,
                role: this.confirmuser.role_name,
                auth_id: this.confirmuser.auth_id,
                auth: this.confirmuser.auth_name,
                confirm: this.confirmuser.confirm,
                back: false,
            },
            ),
            authItem: [
                { id: 0, name: '無し' },
                { id: 1, name: '有り' },
            ],
        };
    },
    mounted: function(){
        const pageTitle = document.getElementById("js-page-title").textContent;
		document.title = pageTitle + ' | 夢を叶え太郎';
	},
    computed: {
        // ログインしているユーザーの投稿のみデータを格納。

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
            data._method = "POST";
            this.$inertia.post('/users', data);
            this.reset();
        },

        back: function(data) {
            data._method = "POST";
            data['back'] = true;
            this.$inertia.post('/users', data);
        },

        confirm(data){
            data._method = 'POST';
            this.data.confirm = 3;
            this.form.post(route('user.confirm'));
        },

        edit: function(data) {
            this.form = Object.assign({}, data);
            this.editMode = true;
            this.openModal();
        },
        update: function(data) {
            data._method = 'PUT';
            this.$inertia.post('/user/' + data.id, data);
            this.reset();
        },

        createUser(){
            this.form.post(route("user.store"));
        },

        editUser: function(data){
            data._method = 'POST';
            this.$inertia.post('/users/' + data.id, data);
            this.reset();
        },
        editback: function(data){
            data._method = 'POST';
            data['back'] = true;
            this.$inertia.post('/users/' + data.id, data);
            this.reset();
        },
    },
};
</script>
