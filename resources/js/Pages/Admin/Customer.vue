<template>
    <div>
        <Modal :show="confirmingUserDeletion" @close="closeModal">
            <div class="p-6">
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                    Are you sure you want to verify this customer?
                </h2>

                <div class="mt-6 flex justify-end">
                    <SecondaryButton @click="closeModalDelete"> Cancel </SecondaryButton>

                    <DangerButton
                        class="ms-3"
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                        @click="updateData()"
                    >
                        Verify
                    </DangerButton>
                </div>
            </div>
        </Modal>
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('adminDashboard')">
                                    <ApplicationLogo
                                        class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
                                    />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                                <NavLink :href="route('adminDashboard')" :active="route().current('adminDashboard')">
                                    Dashboard
                                </NavLink>
                                <NavLink :href="route('paketPenjualan')" :active="route().current('paketPenjualan')">
                                    Paket Penjualan
                                </NavLink>
                                <NavLink :href="route('sales')" :active="route().current('sales')">
                                    Sales
                                </NavLink>
                                <NavLink :href="route('verifyCustomer')" :active="route().current('verifyCustomer')">
                                    Verify Customer
                                </NavLink>
                                <NavLink :href="route('report')" :active="route().current('report')">
                                    Report
                                </NavLink>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <!-- Settings Dropdown -->
                            <div class="ms-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button
                                                type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150"
                                            >
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ms-2 -me-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        fill-rule="evenodd"
                                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                        clip-rule="evenodd"
                                                    />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('profile.edit')"> Profile </DropdownLink>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-me-2 flex items-center sm:hidden">
                            <button
                                @click="showingNavigationDropdown = !showingNavigationDropdown"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out"
                            >
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path
                                        :class="{
                                            hidden: showingNavigationDropdown,
                                            'inline-flex': !showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16"
                                    />
                                    <path
                                        :class="{
                                            hidden: !showingNavigationDropdown,
                                            'inline-flex': showingNavigationDropdown,
                                        }"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"
                                    />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div
                    :class="{ block: showingNavigationDropdown, hidden: !showingNavigationDropdown }"
                    class="sm:hidden"
                >
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                                {{ $page.props.auth.user.nama_customer }}
                            </div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('profile.edit')"> Profile </ResponsiveNavLink>
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white dark:bg-gray-800 shadow" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot nama_customer="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <div class="py-12">
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div class="overflow-hidden overflow-x-auto border-b border-gray-200 bg-white p-6">

                                <PrimaryButton @click="openModal">Create</PrimaryButton>
                                <br>
                                <div class="min-w-full align-middle">
                                    <table class="min-w-full border divide-y divide-gray-200">
                                        <thead>
                                        <tr>
                                            <th class="bg-gray-50 px-6 py-3 text-left">
                                                <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Nama</span>
                                            </th>
                                            <th class="bg-gray-50 px-6 py-3 text-left">
                                                <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Nomor Telepon</span>
                                            </th>
                                            <th class="bg-gray-50 px-6 py-3 text-left">
                                                <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Alamat</span>
                                            </th>
                                            <th class="bg-gray-50 px-6 py-3 text-left">
                                                <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Paket</span>
                                            </th>
                                            <th class="bg-gray-50 px-6 py-3 text-left">
                                                <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Status</span>
                                            </th>
                                            <th class="w-56 bg-gray-50 px-6 py-3 text-center">
                                                <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">...</span>
                                            </th>
                                        </tr>
                                        </thead>
            
                                        <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                            <tr class="bg-white" v-for="item in customer.data">
                                                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                                    {{ item.nama_customer }}
                                                </td>
                                                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                                    {{ item.nomor_telepon }}
                                                </td>
                                                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                                    {{ item.alamat }}
                                                </td>
                                                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                                    {{ item.nama_paket }}
                                                </td>
                                                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                                    {{ item.status }}
                                                </td>
                                                <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                                    <PrimaryButton @click="openModalDelete(item)">Verify</PrimaryButton>
                                                    <!-- <DangerButton @click="openModalDelete(item)">Delete</DangerButton> -->
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <TailwindPagination
                                        :data="customer"
                                        @pagination-change-page="getResults"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</template>

<script setup>
import { nextTick, ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import DangerButton from '@/Components/DangerButton.vue';
import Modal from '@/Components/Modal.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import SecondaryButton from '@/Components/SecondaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import SelectInput from '@/Components/SelectInput.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import { Link, useForm } from '@inertiajs/vue3';
import { TailwindPagination } from 'laravel-vue-pagination';

const showingNavigationDropdown = ref(false);

const form = useForm({

});
</script>

<script>
import axios from 'axios';
import {useToast} from 'vue-toast-notification';
import 'vue-toast-notification/dist/theme-sugar.css';

const $toast = useToast();

const openingModal = ref(false);

const confirmingUserDeletion = ref(false);

export default {
    nama_customer: 'PaketList',
    data() {
        return {
            'url': 'http://localhost:8000/api/customer',
            'customer': {
                'id': '',
                'nama_customer': '',
                'nomor_telepon': '',
                'alamat': '',
                'nama_paket': '',
                'foto_ktp': '',
                'foto_rumah': ''
            },
            'packages': {
                'id': '',
                'nama_paket': '',
                'harga_paket': ''
            },
            'isUpdate': false
        }
    },
    created() {
        this.getData();
    },
    methods: {
        openModalDelete(item) {
            confirmingUserDeletion.value = true;
            this.customer.id = item.id;
            this.isUpdate = true;
        },

        closeModalDelete() {
            confirmingUserDeletion.value = false;
        },

        async getData() {
            await axios.get(this.url).then(response => {
                this.customer = response.data.data;
            }).catch(error => {
                console.log(error);
            });
        },

        async updateData() {
            let formData = new FormData();
            formData.append("_method", "put");

            await axios.post(this.url + '/verify/' + this.customer.id, formData).then(response => {
                this.$toast.success('Data Updated Successfully', {
                    position: 'top-right'
                });
                confirmingUserDeletion.value = false;
                this.getData();
            }).catch(error => {
                console.log(error);
            });
        },

        async getResults(page = 1) {
            await axios.get(this.url + `?page=${page}`).then(response => {
                this.customer = response.data.data;
            }).catch(error => {
                console.log(error);
            });
        },
    }
}
</script>
