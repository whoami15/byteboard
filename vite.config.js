import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import vue from "@vitejs/plugin-vue";
import autoimport from "unplugin-auto-import/vite";
import components from "unplugin-vue-components/vite";

export default defineConfig({
  resolve: {
    alias: {
      "@": "/resources",
      "~": "/node_modules",
    },
  },
  plugins: [
    laravel({
      input: "resources/js/app.js",
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          base: null,
          includeAbsolute: false,
        },
      },
    }),
    autoimport({
      vueTemplate: true,
      dirs: ["resources/js/composables", "resources/js/utils"],
      imports: [
        "vue",
        "@vueuse/core",
        {
          "@inertiajs/vue3": ["router", "usePage", "useRemember"],
          "laravel-precognition-vue-inertia": ["useForm"],
        },
      ],
    }),
    components({
      dirs: ["resources/js/Components"],
      resolvers: [
        // inertia components
        (name) => {
          const components = ["Link", "Head"];
          if (components.includes(name)) {
            return {
              name: name,
              from: "@inertiajs/vue3",
            };
          }
        },

        // layouts
        (name) => {
          if (name.startsWith("Layout")) {
            const componentName = name.substring("Layout".length);

            return {
              name: "default",
              from: `/resources/js/Layouts/${componentName}/Layout-${componentName}.vue`,
            };
          }
        },
      ],
    }),
  ],
});
