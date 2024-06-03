<script setup>
import Admin from "@/layouts/admin.vue"
import { Link } from "@inertiajs/vue3"

defineOptions({
	layout: Admin,
})

const props = defineProps({
	id: {
		type: Number,
		required: true,
	},
	slug: {
		type: String,
		required: true,
	},
	title: {
		type: String,
		required: true,
	},
	content: {
		type: String,
		required: true,
	},
})

onMounted(() => {
	console.log(props.content)
})
</script>

<template>
	<article>
		<Link :href="route('pages.edit', { id })">Edit this page</Link>
		<Link :href="route('public-pages.show', { slug })">View public</Link>
		<h1>{{ title }}</h1>
		<article v-html="content" />
	</article>
</template>
