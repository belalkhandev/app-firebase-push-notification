<script setup>
    import NavLink from '@/Components/NavLink.vue';
</script>

<template>
    <aside class="sidebar">
        <div class="sidebar-items">
            <div class="sidebar-item">
                <NavLink :href="route('dashboard')" class="sidebar-item-header">
                        <span class="icon">
                            <i class='bx bxs-tachometer' ></i>
                        </span>
                    <h4>Dashboard</h4>
                </NavLink>
            </div>

            <div class="sidebar-item">
                <div class="sidebar-item-header">
                        <span class="icon">
                            <i class='bx bxs-bell-ring' ></i>
                        </span>
                    <h4>Notification</h4>
                </div>
                <div class="sidebar-item-body">
                    <ul>
                        <li><a href="">Add new</a></li>
                        <li>
                            <NavLink :href="route('notification.list')" :active="route().current('notification.list')">
                                Notifications
                            </NavLink>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-item-header">
                        <span class="icon">
                            <i class='bx bxs-user-account' ></i>
                        </span>
                    <h4>App Clients</h4>
                </div>
                <div class="sidebar-item-body">
                    <ul>
                        <li><a href="">All Clients</a></li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-item">
                <div class="sidebar-item-header">
                        <span class="icon">
                            <i class='bx bxs-cog' ></i>
                        </span>
                    <h4>Security & Settings</h4>
                </div>
                <div class="sidebar-item-body">
                    <ul>
                        <li><a href="">Applications</a></li>
                        <li><a href="">Timezones</a></li>
                        <li><a href="">Change Password</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </aside> <!-- /sidebar -->
</template>
