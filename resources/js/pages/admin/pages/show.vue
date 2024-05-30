<script setup>
import Admin from "@/layouts/admin.vue"

defineOptions({
	layout: Admin,
})

defineProps({
	page: {
		type: Object,
		required: true,
	},
})
</script>

<template>
	<article>
		<h1>{{ page.title }}</h1>
		<p>{{ page.content }}</p>
	</article>
</template>
