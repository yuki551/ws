<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                社員一覧
            </h2>
        </template>
        <div class="py-12 user-list-wrap">
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

                    <div class="btn-create-user" v-if="this.$page.user.auth_id == 1">
                        <a class="action-btn" :href="route('user.create')">
                        <jet-button class="text-base">社員を登録</jet-button>
                        </a>
                    </div>

                    <!-- ***************************** -->

                        <div v-for="teamx in userteams">
                            <h2 class="team-title">{{ teamx.team }}</h2>

                            <table class="table-fixed w-full">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="px-4 py-2 w-2/12">役職</th>
                                        <th class="px-4 py-2 w-5/12">名前</th>
                                        <template v-if="userauth">
                                            <th class="px-4 py-2 w-2/12">編集</th>
                                            <th class="px-4 py-2 w-2/12">削除</th>
                                        </template>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="row in teamx.user">
                                        <td class="border px-4 py-2">{{ row.role_name }}</td>
                                        <td class="border px-4 py-2">{{ row.name }}</td>
                                        <template v-if="userauth">

                                            <td class="border px-4 py-2">
                                                <div>
                                                    <a :href="route('user.edit',row.id)">
                                                    <jet-button class="bg-blue-700 text-base">編集</jet-button>
                                                    </a>
                                                </div>
                                            </td>

                                            <td class="border px-4 py-2">
                                                <div>
                                                    <a :href="route('user.show', row.id)">
                                                    <jet-button class="bg-red-700 text-base"
                                                    >削除</jet-button>
                                                    </a>
                                                </div>
                                            </td>

                                        </template>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
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
        JetInputError,    },
    props: ['data', 'data2', 'errors', 'conf'],
    data() {
        return {
            editMode: false,
            isOpen: false,
            userPost: [],
            form: this.$inertia.form({
                status: 0,
                _method: "DELETE",
                confirm: 3,
            }),
        };
    },
    computed: {

        userteams: function(){
            this.alluser = [];
            for(let i = 0; i < this.data2.length; i++){
                this.userteam = [];
                this.users = [];
                for(let j = 0; j < this.data.length; j++){

                    if (this.data[j].current_team_id == i+1) {
                        this.users.push(this.data[j]);
                    }
                }
                this.userteam["team"] = this.data2[i].name;
                this.userteam["user"] = this.users;
                this.alluser.push(this.userteam);
            }
            return this.alluser;
        },

        userauth: function(){
            if (this.$page.user.auth_id == 1) {
                return true;
            }else{
                return false;
            }
        },

    },
    methods: {

        deleteUser(id){

            this.form.post(route("user.destroy", id), {
                preserveScroll: false,
            });
            this.reset();
        },

        editUser: function(id){
            this.$inertia.post(route('user.edit', id));
        },


        reset: function() {
            this.form = {
                title: null,
                body: null,
            };
        },
        save: function(data) {
            this.$inertia.post('/dashboard', data);
            this.reset();
            this.closeModal();
            this.editMode = false;
        },
        edit: function(data) {
            this.$inertia.post('/dashboard/' + data.id, data);
            // this.editMode = true;
        },
        update: function(data) {
            data._method = 'PUT';
            this.$inertia.post('/dashboard/' + data.id, data);
            this.reset();
            this.closeModal();
        },
        replyRow: function(data) {
            data._method = 'PUT';
            data['status'] = 3;
            this.$inertia.post('/dashboard/' + data.id, data);
            console.log(data);
        },
        // deleteRow: function(data) {
        //     if (!confirm('Are you sure want to remove?')) return;
        //     data._method = 'DELETE';
        //     this.$inertia.post('/dashboard/' + data.id, data);
        //     this.reset();
        //     this.closeModal();
        // },

        // 編集
        approve: function(data) {
            data._method = 'PUT';
            data['status'] = 2;
            this.$inertia.post('/dashboard/' + data.id, data);
            this.reset();
        },

        confirm(data){
            data._method = 'GET';
            this.form.get(route('user.show'), data);
        },
    },
};
</script>
<style></style>
