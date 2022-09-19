<script setup>
import { ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/inertia-vue3';

const showingNavigationDropdown = ref(false);
</script>

<template>
    <div>
        <!-- header -->
        <header>
            <div class="apps">
                <div class="app-icon">
                    <img src="" alt="">
                </div>
                <div class="app-brand">
                    <h3>Right Academy</h3>
                </div>
            </div>
            <div class="header-navs">
                <div class="page-title">
                    <h5>Dashboard</h5>
                </div>
                <div class="nav-items">
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                </template>

                                <template #content>
                                    <DropdownLink :href="route('logout')" method="post" as="button">
                                        Log Out
                                    </DropdownLink>
                                </template>
                            </Dropdown>
                        </div>
                    </div>
                    <div class="nav-item">
                    <span class="nav-icon" data-bs-toggle="tooltip" data-bs-placement="left" title="Profile">
                        <i class='bx bx-user' ></i>
                    </span>
                    </div>
                </div>
            </div>
        </header> <!-- /header -->
        <!-- wrapper -->
        <div class="wrapper">
            <!-- sidebar -->
            <aside class="sidebar">
                <div class="sidebar-items">
                    <h3 class="sidebar-item-title">Users & Permissions</h3>
                    <div class="sidebar-item">
                        <div class="sidebar-item-header">
                        <span class="icon">
                            <i class="bx bx-group"></i>
                        </span>
                            <h4>Users</h4>
                        </div>
                        <div class="sidebar-item-body">
                            <ul>
                                <li><a href="">Add new user</a></li>
                                <li><a href="">Students list</a></li>
                                <li><a href="">Parents list</a></li>
                                <li><a href="">Teacher & Staff list</a></li>
                                <li><a href="">Inactive Users list</a></li>
                                <li><a href="">Black list users</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <div class="sidebar-item-header">
                        <span class="icon">
                            <i class="bx bx-lock"></i>
                        </span>
                            <h4>Roles & Permissions</h4>
                        </div>
                        <div class="sidebar-item-body">
                            <ul>
                                <li><a href="">Add new role</a></li>
                                <li><a href="">Role list</a></li>
                                <li><a href="">Manage Permissions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sidebar-item">
                        <div class="sidebar-item-header">
                        <span class="icon">
                            <i class="bx bx-lock"></i>
                        </span>
                            <h4>System Controls</h4>
                        </div>
                        <div class="sidebar-item-body">
                            <ul>
                                <li><a href="">All modules</a></li>
                                <li><a href="">Assign to role</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </aside> <!-- /sidebar -->

            <!-- main content -->
            <main class="main-content">
                <div class="content">
                    <div class="box">
                        <div class="box-header">
                            <div class="box-title">
                                <h4>User list: Students</h4>
                            </div>
                            <div class="box-action">
                                <ul>
                                    <li>
                                        <a href="" class="btn btn-rounded btn-sm btn-outline-primary">
                                            <i class="bx bx-search-alt"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" class="btn btn-rounded btn-sm btn-outline-warning">
                                            <i class="bx bx-filter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="" class="btn btn-rounded btn-sm btn-outline-info">
                                            <i class="bx bx-cloud-download"></i>
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="box-body">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                    </th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Created at/by</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>Md. Bellal Hossain</td>
                                    <td>belal13</td>
                                    <td>belalkhan.dev@gmail.com</td>
                                    <td>01798673163</td>
                                    <td>Active</td>
                                    <td>Student</td>
                                    <td>Mar 01, 22 / Belal</td>
                                    <td>
                                        <div class="action">
                                            <ul>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-show-alt"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>Md. Bellal Hossain</td>
                                    <td>belal13</td>
                                    <td>belalkhan.dev@gmail.com</td>
                                    <td>01798673163</td>
                                    <td>Active</td>
                                    <td>Student</td>
                                    <td>Mar 01, 22 / Belal</td>
                                    <td>
                                        <div class="action">
                                            <ul>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-show-alt"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>Md. Bellal Hossain</td>
                                    <td>belal13</td>
                                    <td>belalkhan.dev@gmail.com</td>
                                    <td>01798673163</td>
                                    <td>Active</td>
                                    <td>Student</td>
                                    <td>Mar 01, 22 / Belal</td>
                                    <td>
                                        <div class="action">
                                            <ul>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-show-alt"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>Md. Bellal Hossain</td>
                                    <td>belal13</td>
                                    <td>belalkhan.dev@gmail.com</td>
                                    <td>01798673163</td>
                                    <td>Active</td>
                                    <td>Student</td>
                                    <td>Mar 01, 22 / Belal</td>
                                    <td>
                                        <div class="action">
                                            <ul>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-show-alt"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>Md. Bellal Hossain</td>
                                    <td>belal13</td>
                                    <td>belalkhan.dev@gmail.com</td>
                                    <td>01798673163</td>
                                    <td>Active</td>
                                    <td>Student</td>
                                    <td>Mar 01, 22 / Belal</td>
                                    <td>
                                        <div class="action">
                                            <ul>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-show-alt"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>Md. Bellal Hossain</td>
                                    <td>belal13</td>
                                    <td>belalkhan.dev@gmail.com</td>
                                    <td>01798673163</td>
                                    <td>Active</td>
                                    <td>Student</td>
                                    <td>Mar 01, 22 / Belal</td>
                                    <td>
                                        <div class="action">
                                            <ul>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-show-alt"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>Md. Bellal Hossain</td>
                                    <td>belal13</td>
                                    <td>belalkhan.dev@gmail.com</td>
                                    <td>01798673163</td>
                                    <td>Active</td>
                                    <td>Student</td>
                                    <td>Mar 01, 22 / Belal</td>
                                    <td>
                                        <div class="action">
                                            <ul>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-show-alt"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>Md. Bellal Hossain</td>
                                    <td>belal13</td>
                                    <td>belalkhan.dev@gmail.com</td>
                                    <td>01798673163</td>
                                    <td>Active</td>
                                    <td>Student</td>
                                    <td>Mar 01, 22 / Belal</td>
                                    <td>
                                        <div class="action">
                                            <ul>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-show-alt"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>Md. Bellal Hossain</td>
                                    <td>belal13</td>
                                    <td>belalkhan.dev@gmail.com</td>
                                    <td>01798673163</td>
                                    <td>Active</td>
                                    <td>Student</td>
                                    <td>Mar 01, 22 / Belal</td>
                                    <td>
                                        <div class="action">
                                            <ul>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-show-alt"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>Md. Bellal Hossain</td>
                                    <td>belal13</td>
                                    <td>belalkhan.dev@gmail.com</td>
                                    <td>01798673163</td>
                                    <td>Active</td>
                                    <td>Student</td>
                                    <td>Mar 01, 22 / Belal</td>
                                    <td>
                                        <div class="action">
                                            <ul>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-show-alt"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>Md. Bellal Hossain</td>
                                    <td>belal13</td>
                                    <td>belalkhan.dev@gmail.com</td>
                                    <td>01798673163</td>
                                    <td>Active</td>
                                    <td>Student</td>
                                    <td>Mar 01, 22 / Belal</td>
                                    <td>
                                        <div class="action">
                                            <ul>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-show-alt"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>Md. Bellal Hossain</td>
                                    <td>belal13</td>
                                    <td>belalkhan.dev@gmail.com</td>
                                    <td>01798673163</td>
                                    <td>Active</td>
                                    <td>Student</td>
                                    <td>Mar 01, 22 / Belal</td>
                                    <td>
                                        <div class="action">
                                            <ul>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-show-alt"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input">
                                        </div>
                                    </td>
                                    <td>Md. Bellal Hossain</td>
                                    <td>belal13</td>
                                    <td>belalkhan.dev@gmail.com</td>
                                    <td>01798673163</td>
                                    <td>Active</td>
                                    <td>Student</td>
                                    <td>Mar 01, 22 / Belal</td>
                                    <td>
                                        <div class="action">
                                            <ul>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-success"><i class="bx bx-show-alt"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-warning"><i class="bx bx-edit"></i></a>
                                                </li>
                                                <li>
                                                    <a href="" class="btn btn-sm btn-rounded btn-outline-danger"><i class="bx bx-trash"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main> <!-- / main content -->
        </div> <!-- /wrapper -->
        <div class="min-h-screen bg-gray-100">
            <nav class="bg-white border-b border-gray-100">
                <!-- Primary Navigation Menu -->
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <!-- Logo -->
                            <div class="shrink-0 flex items-center">
                                <Link :href="route('dashboard')">
                                    <ApplicationLogo class="block h-9 w-auto" />
                                </Link>
                            </div>

                            <!-- Navigation Links -->
                            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                                <NavLink :href="route('dashboard')" :active="route().current('dashboard')">
                                    Dashboard
                                </NavLink>
                                <NavLink :href="route('application.list')" :active="route().current('application.list')">
                                    Applications
                                </NavLink>
                                <NavLink :href="route('notification.list')" :active="route().current('notification.list')">
                                    Notifications
                                </NavLink>
                                <NavLink :href="route('client.list')" :active="route().current('client.list')">
                                    App Clients
                                </NavLink>
                            </div>
                        </div>

                        <div class="hidden sm:flex sm:items-center sm:ml-6">
                            <!-- Settings Dropdown -->
                            <div class="ml-3 relative">
                                <Dropdown align="right" width="48">
                                    <template #trigger>
                                        <span class="inline-flex rounded-md">
                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                                {{ $page.props.auth.user.name }}

                                                <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                    </template>

                                    <template #content>
                                        <DropdownLink :href="route('logout')" method="post" as="button">
                                            Log Out
                                        </DropdownLink>
                                    </template>
                                </Dropdown>
                            </div>
                        </div>

                        <!-- Hamburger -->
                        <div class="-mr-2 flex items-center sm:hidden">
                            <button @click="showingNavigationDropdown = ! showingNavigationDropdown" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Responsive Navigation Menu -->
                <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                    <div class="pt-2 pb-3 space-y-1">
                        <ResponsiveNavLink :href="route('dashboard')" :active="route().current('dashboard')">
                            Dashboard
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('application.list')" :active="route().current('application.list')">
                            Applications
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('notification.list')" :active="route().current('notification.list')">
                            Notifications
                        </ResponsiveNavLink>
                        <ResponsiveNavLink :href="route('client.list')" :active="route().current('client.list')">
                            App Clients
                        </ResponsiveNavLink>
                    </div>

                    <!-- Responsive Settings Options -->
                    <div class="pt-4 pb-1 border-t border-gray-200">
                        <div class="px-4">
                            <div class="font-medium text-base text-gray-800">{{ $page.props.auth.user.name }}</div>
                            <div class="font-medium text-sm text-gray-500">{{ $page.props.auth.user.email }}</div>
                        </div>

                        <div class="mt-3 space-y-1">
                            <ResponsiveNavLink :href="route('logout')" method="post" as="button">
                                Log Out
                            </ResponsiveNavLink>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Page Heading -->
            <header class="bg-white" v-if="$slots.header">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <slot name="header" />
                </div>
            </header>

            <!-- Page Content -->
            <main>
                <slot />
            </main>
        </div>
    </div>
</template>
