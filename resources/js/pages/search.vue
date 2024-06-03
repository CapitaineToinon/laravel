<script setup>
import { Link, useForm } from "@inertiajs/vue3"

const props = defineProps({
	hits: {
		type: Array,
		required: true,
	},
	query: {
		type: String,
		required: true,
	},
	processingTimeMs: {
		type: Number,
		required: true,
	},
	limit: {
		type: Number,
		required: true,
	},
	offset: {
		type: Number,
		required: true,
	},
	estimatedTotalHits: {
		type: Number,
		required: true,
	},
	nbHits: {
		type: Number,
		required: true,
	},
})

const form = useForm({
	search: "",
})

watch(
	props,
	(props) => {
		console.log(props)
	},
	{ deep: true, immediate: true },
)
</script>

<template>
	<input
		v-model="form.search"
		@keydown.enter="() => form.get('/search')"
	/>
	<ul class="[&_em]:bg-yellow-500">
		<li
			v-for="hit in hits"
			:key="hit.id"
		>
			<Link
				:href="
					route('pages.edit', {
						id: hit.id,
					})
				"
				>Edit this page</Link
			>
			<p v-html="hit._formatted.content"></p>
		</li>
	</ul>
</template>
