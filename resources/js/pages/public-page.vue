<script setup>
defineProps({
	id: {
		type: Number,
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
</script>

<template>
	<h1>{{ title }}</h1>
	<article v-html="content"></article>
</template>
