import { createApp, h } from "vue";
import { createInertiaApp, Link, Head } from "@inertiajs/vue3";
import Layout from "./shared/Layout.vue";
import Vue3Toastify from "vue3-toastify";
import AOS from "aos";
import "aos/dist/aos.css";

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob("./Pages/**/*.vue", { eager: true });
        const page = pages[`./Pages/${name}.vue`];

        page.default.layout = page.default.layout || Layout;
        return page;
    },
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(Vue3Toastify)
            .component("Link", Link)
            .component("Head", Head)
            .mount(el);

        AOS.init();
    },
    progress: {
        color: "red",
    },
    title: (title) => (title ? `CatOLX - ${title}` : "CatOLX"),
});
