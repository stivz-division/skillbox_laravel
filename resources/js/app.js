import { createApp } from "vue";
import ArticleInformer from "./components/ArticleInformer";

require('./bootstrap');

const app = createApp({})

app.component('article-informer', ArticleInformer)

app.mount('#app');
