<template>
    <div>
        <a-layout id="components-layout-demo-custom-trigger">
            <a-layout-sider :trigger="null">
                <div class="logo" />
                <a-menu theme="dark" mode="inline" :defaultSelectedKeys="['1']">
                    <a-menu-item key="1">
                        <a-icon type="user" />
                        <span>Personal</span>
                        <router-link to="/">Go to Foo</router-link>

                    </a-menu-item>
                    <a-menu-item key="2">
                        <a-icon type="bar-chart" />
                        <span>Ptto Ventas</span>
                        <router-link to="/createPersonal">Go to Bar</router-link>
                    </a-menu-item>
                </a-menu>
            </a-layout-sider>
            <a-layout>
                <a-layout-header style="background: #fff; padding: 0">
                </a-layout-header>
                <a-layout-content
                        :style="{ margin: '24px 16px', padding: '24px', background: '#fff', minHeight: '280px' }">
                    <router-view></router-view>
                </a-layout-content>
            </a-layout>
        </a-layout>
    </div>
</template>
<script>
    export default {
        components:{
        },
    };
</script>
<style>
    #components-layout-demo-custom-trigger .trigger {
        font-size: 18px;
        line-height: 64px;
        padding: 0 24px;
        cursor: pointer;
        transition: color 0.3s;
    }

    #components-layout-demo-custom-trigger .trigger:hover {
        color: #1890ff;
    }

    #components-layout-demo-custom-trigger .logo {
        height: 32px;
        background: rgba(255, 255, 255, 0.2);
        margin: 16px;
    }
</style>