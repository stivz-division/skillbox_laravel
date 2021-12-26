<template>
    <div class="position-fixed" style="bottom: 25px; right: 25px">
        <div class="toast fade show" role="alert" aria-live="assertive" aria-atomic="true"
             v-for="(article, index) in articles" :key="index">
            <div class="toast-header">
                <strong class="me-auto">{{ article.article }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <p>
                    {{ article.dirty }}
                </p>

                <a class="btn btn-primary btn-sm" :href="article.url">Посмотреть</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "ArticleInformer",
    data() {
        return {
            articles: []
        }
    },
    mounted() {
        Echo.private('article-informer')
            .listen('ArticleInformer', e => {
                this.articles.push(e)
            })
    }
}
</script>

<style scoped>

</style>
