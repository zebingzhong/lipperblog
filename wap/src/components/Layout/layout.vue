<template>
    <div class="lipper-header">
        <img src="" alt="">
        <div class="lipper-nav">
            <ul>
                <li>1</li>
                <li>2</li>
                <li>3</li>
            </ul>
        </div>
    </div>
    <div class="lipper-body">
        <div class="left-box"></div>
        <div class="lipper-box">
            <router-view/>
        </div>
        <div class="right-box"></div>
    </div>

</template>

<script>
/* 引入home模块 */
export default {
    name: 'App',
    /* 组件*/
    components: {}
}
</script>
