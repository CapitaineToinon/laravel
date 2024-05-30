import { defineConfig } from "vite"
import laravel from "laravel-vite-plugin"
import vue from "@vitejs/plugin-vue"
import autoImport from "unplugin-auto-import/vite"

export default defineConfig({
	plugins: [
		laravel({
			input: "resources/js/app.js",
			ssr: "resources/js/ssr.js",
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
		autoImport({
			imports: ["vue"],
			dts: "resources/js/types/auto-imports.d.ts",
		}),
	],
})
