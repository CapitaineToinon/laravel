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
	name: {
		type: String,
		required: true,
	},
})
</script>

<template>
	<article>
		<Link :href="route('games.edit', { id })">Edit this game</Link>
		<h1>{{ name }}</h1>
	</article>
</template>
